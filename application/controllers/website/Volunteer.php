<?php
  defined('BASEPATH') or exit('No direct script access allowed');
class Volunteer extends CI_Controller
{
        public function __construct()
        {
        parent::__construct();
        $this->load->model(array('website/front_model' => 'cmsModel'));
        error_reporting(0);
        }

        public function index($action = Null, $getId = Null)
        {
          if($action === 'editVolunteer'){
            $getArr=json_decode(base64_decode(urldecode($getId)));
            $getVolunData = $this->db->select('*')->from('cms_volunteer')->where(array('id'=>$getArr->id))->get()->row();
            $return = array(
              'title' => 'Edit Volunteer Data',
              'breadcrums' => 'Edit Volunteer',
              'getVolunData' => $getVolunData,
              'layout' => 'front_cms/volunteer/editVolunteer.php',
              'targetItem' => base_url('website/volunteer/index/updateVolunteerData'),);
              $this->load->view('base', $return);
          }elseif($action === 'create'){
              $uploaded_image = $this->upload_image('volunteer', 'previewImage');
              $value = $this->input->post();
              $volunteerId = $this->db->select('volunteer_id')->from('cms_volunteer')->order_by('id', 'DESC')->limit(1)->get()->row();
              if (!empty($volunteerId)) {
                  if (preg_match('/^VOL(\d+)$/', $volunteerId->volunteer_id, $matches)) {
                      $numericPart = (int)$matches[1] + 1;
                      $volId = 'VOL' . str_pad($numericPart, 4, '0', STR_PAD_LEFT);
                  } else {
                      $volId = 'VOL1001';
                  }
              } else {
                  $volId = 'VOL1001';
              }
              if ($uploaded_image['icon'] === 'success') {
              $volunterData = [
                  'image'        => $uploaded_image['text'],         
                  'name'          => $value['name'], 
                  'mem_id'        => '1001', 
                  'volunteer_id'  => $volId, 
                  'email'         => $value['email'], 
                  'mobile'        => $value['mobile'], 
                  'address'       => $value['address'], 
                  'date'          => $value['joining_date'], 
                  'gender'        => $value['gender'], 
                  'created_at'    => date('Y-m-d'),    
                  'status'        => 1,  
              ];
              if ($this->db->insert('cms_volunteer', $volunterData)) {
                  $msg = ['Thank You! You have created successfully.'];
                  $return = ['addClas' => 'tSuccess','msg' => $msg,'icon' => '<i class="fa-regular fa-circle-check"></i>',
                      'returnLoc' => base_url('website/volunteer')];
                  } else {$msg = ['Oops, it seems there was an error. Please refresh your page.'];
                  $return = ['addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'];
              }} else {$msg = [$uploaded_image['text']];$return = ['addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'];}
              echo json_encode($return);
            }elseif($action === 'updateVolunteerData'){
              $uploaded_image = $this->upload_image('volunteer', 'previewImage');
              $value = $this->input->post();
              if ($uploaded_image['icon'] === 'success') {
              $volunterData = [
                  'image'        => $uploaded_image['text'],         
                  'name'          => $value['name'], 
                  'mem_id'        => '1001', 
                  'volunteer_id'  => '1001', 
                  'email'         => $value['email'], 
                  'mobile'        => $value['mobile'], 
                  'address'       => $value['address'], 
                  'date'          => $value['joining_date'], 
                  'gender'        => $value['gender'], 
                  'created_at'    => date('Y-m-d'),    
                  'status'        => 1,  
              ];
              $updateData = $this->db->where('id',$value['id'])->update('cms_volunteer',$volunterData);
              if ($updateData){
                  $msg = ['Thank You! You have successfully uploaded details.'];
                  $return = ['addClas' => 'tSuccess','msg' => $msg,'icon' => '<i class="fa-regular fa-circle-check"></i>',
                      'returnLoc' => base_url('website/volunteer')];
                  } else {$msg = ['Oops, it seems there was an error. Please refresh your page.'];
                  $return = ['addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'];
              }} else {$msg = [$uploaded_image['text']];$return = ['addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'];}
              echo json_encode($return);
            }else{
            $return = array(
            'title' => 'Create Volunteer',
            'breadcrums' => 'Create Volunteer',
            'layout' => 'front_cms/volunteer/volenteer.php',
            'targetItem' => base_url('website/volunteer/index/create'),
            'targetList' => base_url('website/volunteer/showList/volunteerList'),);
            $this->load->view('base', $return);
            }
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
          if ($type == 'volunteerList') 
          {  
          $record = $this->cmsModel->volunteerListModel($post_data);
          foreach ($record as $row) {
          $editUid = base_url('website/volunteer/index/editVolunteer/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
          //$deleteUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
          $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/volunteer/accPermision===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
          $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
              // $status = ($row->status == 'Active') ? '<span class="sRvActive"> Active </span>' : (($row->status == 'Block') ? '<span class="sRvDeactive"> Deactive </span>' : '<span class="sRvSuspnd"> Suspend </span>');

              if(($row->mem_id != '1001') && ($row->status == 2))
              {
                $volRequest = ($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===employee/front_cms/manageVolSta==='.$row->id.'"  data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===employee/front_cms/manageVolSta==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-warning getAction" id="arvs--'.$row->id.'">Mem-Req</a>';
              }else{
                 $volRequest = ($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===employee/front_cms/manageVolSta==='.$row->id.'"  data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===employee/front_cms/manageVolSta==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
              }

              $Address = (mb_strlen($row->address) > 20) ? mb_substr($row->address, 0, 20) . '...' : $row->address;
              $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
              '<div class="text-center">'.$row->volunteer_id.'</div>',
              '<div class="text-center">'.$row->name.'</div>',
              '<div class="text-center">'.$row->mobile.'</div>',
              '<div class="text-center">'.$row->email.'</div>',
              '<div class="text-center">'.$Address?$Address:'<span>N/A</span>'.'</div>',
              '<div class="text-center">'.$volRequest.'</div>',
              $actionBtn
              );
              $i++;
          }
          $return['recordsTotal'] = $this->cmsModel->volunteerList_total_count($whereCn);
          $return['recordsFiltered'] = $this->cmsModel->volunteerList_filter_count($post_data, $whereCn);
          }$return['draw'] = $post_data['draw'];
          echo json_encode($return);
        } 
           
  public function accPermision(){$this->accPermissionUnified();}
  public function accPermissionUnified()
  {
      $post = $this->input->post();
      $return = '';
      $tableMap = ['cms_volunteer' => 'accPermision',];
      $tableName = array_search($this->router->fetch_method(), $tableMap); 
      if (!$tableName) {
      $return = ['msg' => "Invalid operation.", 'action' => '', 'tClor' => '#db3704'];echo json_encode($return);return;
      }if ($post['oprType'] == 'viewDelete') {
      $isMember = $this->common->getRowData($tableName, 'id', $post['id']);if ($isMember) {
      $return = ['msg' => '<i class="fa-solid fa-circle-exclamation"></i> Do you wish to delete <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span> ?.',
      'action' => 'cnfDeleteDetail===website/volunteer/' . $this->router->fetch_method() . '===' . $isMember->id,'tClor' => '#db3704'];
      } else {$return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];}
      } else if ($post['oprType'] == 'cnfDeleteDetail') {
        $isMember = $this->common->getRowData($tableName, 'id', $post['id']);
        if ($isMember) {$deltResult = $this->common->del_data_multi_con($tableName, ['id' => $post['id']]);
        if ($deltResult) {$return = [
        'msg' => '<i class="fa-regular fa-circle-check"></i> Data deletion completed.<br>
        <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span> has been removed.',
        'action' => 'success',
        'tClor' => '#008038'
         ];} else {
         $return = ['msg' => '<i class="fa-solid fa-circle-exclamation"></i> Deletion failed for <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span>.<br>
         Please check the details and try again.','action' => 'errorShw','tClor' => '#db3704'];}
         } else { $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];}
         } else { $return = ['msg' => "Invalid operation type.", 'action' => '', 'tClor' => '#db3704'];}
         sleep(1);echo json_encode($return);
     }



        public function manage(){
        $post=$this->input->post();
        if($post['oprType']=='miStatusView'){
        $getData=$this->common->getRowData('cms_volunteer','id',$post['id']);
        if($getData)
        {if($getData->status=='Active'){	
        $msg=array(
        'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->shift_name.' of ID #'.$getData->id,
        'action'=>'miStatusChange===website/volunteer/manage==='.$getData->id);
        }else{
        $msg=array(
        'msg'=>'Are you sure want to activate '.$getData->cms_volunteer.' of ID #'.$getData->id,
        'action'=>'miStatusChange===website/volunteer/manage==='.$getData->id)
        ;}}else{
        $msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
        }echo json_encode($msg);}
        elseif($post['oprType']=='miStatusChange')
        {sleep(2);
        $getData=$this->common->getRowData('cms_volunteer','id',$post['id']);
        if($getData->status==1){
        $change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
        }else{
        $change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
        $changeArr=array('status'=>$change);
        $result=$this->common->update_data('cms_volunteer',array('id'=>$post['id']),$changeArr);
        if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
        echo json_encode($msg);
        }
        }

        public function becomeAvolunteer()
        {
          $data = $this->input->post();
          $oldVolunteer = $this->db->select('mem_id')->from('cms_volunteer')->where('mem_id',$data['id'])->get()->row();
          if($oldVolunteer->mem_id != $data['id']){

            $volunteerId = $this->db->select('volunteer_id')->from('cms_volunteer')->order_by('id', 'DESC')->limit(1)->get()->row();
            if (!empty($volunteerId)) {
                if (preg_match('/^VOL(\d+)$/', $volunteerId->volunteer_id, $matches)) {
                    $numericPart = (int)$matches[1] + 1;
                    $getVolId = 'VOL' . str_pad($numericPart, 4, '0', STR_PAD_LEFT);
                } else { $getVolId = 'VOL1001';
                }} else {$getVolId = 'VOL1001';}
          $value = array(
            'volunteer_id' => $getVolId,
            'mem_id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email_id'],
            'mobile' => $data['mobile_number'],
            'created_by_user_type_id' => $data['id'],
            'status' => 2,
          );
          if ($this->db->insert('cms_volunteer',$value)) {
              $this->session->set_flashdata('success', 'Volunteer Request Submitted Successfully.');
              redirect('member/dashboard');
          } else {
              $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
              redirect('member/dashboard');
          }
          }else{
                $this->session->set_flashdata('error', 'Your request has already been submitted...');
                redirect('member/dashboard');
          }
          
        }



}
?>
