<?php
  defined('BASEPATH') or exit('No direct script access allowed');
class Recent_activity extends CI_Controller
{
        public function __construct()
        {
        parent::__construct();
        $this->load->model(array('website/RecentActModel' => 'recActModel'));
        error_reporting(0);
        }


        public function media( $action = null) 
        {
          if($action === 'create_gallery')
          {
            $uploaded_image = $this->upload_image('gallery', 'previewImage');
            if($uploaded_image['icon'] === 'success') {
            $image_item = array(
            'image'  => $uploaded_image['text'],         
            'heading' => $this->input->post('user_name'), 
            );
            $this->db->insert('cms_gallery', $image_item);
            if ($this->db->insert('cms_gallery', $image_item)){
            $msg=array(' Thank You! you have successfully upload details');
				    $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
            'returnLoc'=>base_url('website/Recent_activity/create_gallery'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }} else {$msg=array($uploaded_image['text']);
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');} 
            echo json_encode($return);
            }else{
            $return = array(
            'title' => 'Media / Gallery',
            'breadcrums' => 'Create Media / Gallery',
            'layout' => 'front_cms/Recent_activity/gallery.php',
            'galleryItem' => 'website/front_cms/media/create_gallery',
            'targetList' => base_url('website/Recent_activity/showList/galleryList'),
            );
            $this->load->view('base', $return);
          }
        }

        public function new_event($action = null)
        {
          if($action === 'eventList'){
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;           
            $record = $this->recActModel->eventListModel($post_data);
            foreach ($record as $row) {
            // $editUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
            //$deleteUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
            $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/front_cms/accPerForEvent===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';
            $actionBtn = '<div style="text-align:center;"> <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>' ."   ".$isDel . '</div>';
            $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===website/recent_activity/manageEvent==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===website/recent_activity/manageEvent==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
            $shortText = (mb_strlen($row->e_text) > 20) ? mb_substr($row->e_text, 0, 20) . '...' : $row->e_text;
            $image= '<span><img src="' . base_url($row->e_images) . '" alt="" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
            $return['data'][] = array('<div style="padding-left:10px"><strong>' . $i . '.</strong></div>',
            $row->e_heading,
            $shortText,
            $image,
            $status,
            $actionBtn
            );
            $i++;
            }
            $return['recordsTotal'] = $this->recActModel->eventList_total_count($whereCn);
            $return['recordsFiltered'] = $this->recActModel->eventList_total_filter_count($post_data, $whereCn);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
            }elseif($action === 'create_event'){
            $uploaded_image = $this->upload_image('event', 'previewImage');
            if ($uploaded_image['icon'] === 'success') {
            $image_item = array(
            'e_images'  => $uploaded_image['text'],         
            'e_heading' => $this->input->post('slider_heading'), 
            'e_text' => $this->input->post('slider_text'));
            if($this->db->insert('cms_event', $image_item)) 
            {$msg=array(' Thank You! you have successfully upload details');
            $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('website/Recent_activity/events'));
            } else {$msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }} else {$msg=array($uploaded_image['text']);
            $return=array('addClas' => 'tWarning', 'msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            } echo json_encode($return);
            }else{
            $return = array(
            'title' => 'New Event',
            'breadcrums' => 'Create Event',
            'layout' => 'front_cms/Recent_activity/new_event.php',
            'eventListItem' => 'website/Recent_activity/new_event/create_event',
            'targeteventList' => base_url('website/Recent_activity/new_event/eventList'),
            );
            $this->load->view('base', $return);
          }
        }

        public function activity($action = null)
        {
          if($action === 'create_activity')
          {
            $data = $this->input->post();
            $this->form_validation->set_rules('news_heading', 'News Heading', 'required|trim');
            $this->form_validation->set_rules('news', 'News', 'required|trim');
            if ($this->form_validation->run() == TRUE) {
            $news_data = array(
            'news_heading' => $data['news_heading'],
            'news' => $data['news'],
            'status' => 2, 
            );
            if($this->db->where('id','1')->update('cms_news', $news_data)){
            $msg=array(' Thank You! you have successfully added');
            $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
            'returnLoc'=>base_url('website/recent_activity/activity'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 
            'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
            } else {
            $msg=array( 'news_heading' => form_error('news_heading'), 'news' => form_error('news'),);
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 
            'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');} 
            echo json_encode($return);
            }else{
             $return = array(
            'title' => 'Recent Activity',
            'breadcrums' => 'Manage Recent Activity',
            'layout' => 'front_cms/recent_activity/recent_activity.php',
            'createAction' => base_url('website/recent_activity/activity/create_activity'),
            'targetList' => base_url('website/Recent_activity/showList/recent_activity'),
            );
            $this->load->view('base', $return);
          }
        }

     

        public function notification() 
        {
          $return = array(
            'title' => 'Media / Gallery',
            'breadcrums' => 'Create Media / Gallery',
            'layout' => 'front_cms/Recent_activity/gallery.php',
            'targetList' => base_url('website/Recent_activity/showList/galleryList'),
            );
            $this->load->view('base', $return);
        }

      

             function upload_image($path, $name)
         {
             $config['upload_path']   = './uploads/' . $path; 
             $config['allowed_types'] = 'jpg|png|jpeg';      
             $config['max_size']      = 2048;               
             $this->load->library('upload', $config);
             if ($this->upload->do_upload($name)) {
             $upload_data = $this->upload->data();
             $image_path = "uploads/" . $path . '/' . $upload_data['file_name'];
             return array('text' => $image_path, 'icon' => 'success');
             } else {
             return array('text' => $this->upload->display_errors(), 'icon' => 'error');
             }
         }


        public function showList($type, $whereCn = NULL){
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;           
          if ($type == 'recent_activity') {
          $record = $this->recActModel->news_data($post_data);
          foreach ($record as $row) {
          $editUid = base_url('website/front_cms/manage/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
          $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/front_cms/accPerForNews===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';
          $actionBtn = '
          <div style="text-align:center;"> <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>' ."   ".$isDel . '</div>';
          $status = ($row->status == 'Active') ? '<span class="sRvActive"> Active </span>' : (($row->status == 'Block') ? '<span class="sRvDeactive"> Deactive </span>' : '<span class="sRvSuspnd"> Suspend </span>');
          $shortText = (mb_strlen($row->news) > 20) ? mb_substr($row->news, 0, 30) . '...' : $row->news;
          $return['data'][] = array(
          '<div style="padding-left:10px"><strong>' . $i . '.</strong></div>',
          $row->updated_at,
          $row->news_heading,
          $shortText,
          $status,
          $actionBtn
         );$i++;
          }
          $return['recordsTotal'] = $this->recActModel->total_count($whereCn);
          $return['recordsFiltered'] = $this->recActModel->total_filter_count($post_data, $whereCn);
  
      } else if ($type == 'galleryList') { 
        $record = $this->recActModel->galleryListModel($post_data);
        foreach ($record as $row) {
           $editUid = base_url('website/front_cms/manageGalleryList/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
           $isDel = '<div style="text-align:center;"> <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/front_cms/accPerForGall===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a></div>';
           $actionBtn = '
            <div style="text-align:right;"> <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>' ."    ". $isDel . '</div>
            ';
           $status = ($row->status == 'Active') ? '<span class="sRvActive"> Active </span>' : (($row->status == 'Block') ? '<span class="sRvDeactive"> Deactive </span>' : '<span class="sRvSuspnd"> Suspend </span>');
           $return['data'][] = array(
               '
            <div style="padding-left:10px"><strong>' . $i . '.</strong></div>
                ',
               $row->updated_at,
               $row->heading,
               $row->image,
               $isDel
           );
           $i++;
       }
       $return['recordsTotal'] = $this->recActModel->galleryList_total_count($whereCn);
       $return['recordsFiltered'] = $this->recActModel->galleryList_total_filter_count($post_data, $whereCn);

   }
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
    } 


public function manageEvent()
{
  echo "hello con";die;
  $where=array('tblName'=>'cms_event','actnUrl'=>'miStatusChange===website/recent_activity/manageEvent===');$this->manageStatus($where);
}





public function manageStatus($where){
$post=$this->input->post();
if($post['oprType']=='miStatusView')
{$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
 if($getData){
 if($getData->status=='Active'){	
 $msg=array(
 'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->shift_name.' of ID #'.$getData->id,
 'action'=>$where['actnUrl'].$getData->id);
 }else{
 $msg=array(
'msg'=>'Are you sure want to activate '.$getData->cms_volunteer.' of ID #'.$getData->id,
'action'=>$where['actnUrl'].$getData->id)
;}}else{
$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
}echo json_encode($msg);}
elseif($post['oprType']=='miStatusChange')
{sleep(2);
$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
if($getData->status==1){
$change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
}else{
$change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
$changeArr=array('status'=>$change);
$result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
echo json_encode($msg);
}
}


}
?>
