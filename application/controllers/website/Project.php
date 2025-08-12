<?php
  defined('BASEPATH') or exit('No direct script access allowed');
class Project extends CI_Controller
{
        public function __construct()
        {
        parent::__construct();
        $this->load->model(array('website/project_model' => 'proModel'));
        error_reporting(0);
        }


        public function index($action = Null, $id = Null)       {
            if ($action === 'create_project') {
              $uploaded_image = $this->upload_image('project', 'previewImage');
              if ($uploaded_image['icon'] === 'success') {
              $value = array(
              'program_id' => $this->input->post('projId'), 
              'images'  => $uploaded_image['text'],         
              'project_name' => $this->input->post('projectName'), 
              'emp_id' => $this->input->post('employee_id'), 
              'amount' => $this->input->post('proAmount'), 
              'location' => $this->input->post('location'), 
              'start_date' => $this->input->post('s_date'), 
              'end_date' => $this->input->post('end_date'), 
              'message' => $this->input->post('text'), 
              'created_at' => date('Y-m-d')     
              );
              if($this->db->insert('project', $value)){
              $msg=array(' Thank You! you have successfully upload details');
              $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
              'returnLoc'=>base_url('website/Project'));
              } else {
              $msg=array('Oops it seems error.please refresh you page.');
              $return=array('addClas' => 'tWarning', 'msg' => $msg, 
              'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
               }
               } else {
              $msg=array($uploaded_image['text']);
              $return=array('addClas' => 'tWarning', 'msg' => $msg, 
              'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
               } 
              echo json_encode($return);

             }elseif($action === 'projectList') 
             { 
              $post_data = $this->input->post();
              $return['data'] = array();
              $i = $post_data['start'] + 1;           
              $record = $this->proModel->projectList_model($post_data);
              foreach ($record as $row) {
                $editUid = base_url('website/Project/index/editProject/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
                $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
                $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/project/accPermision===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a></div>';
                $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
                $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===website/Project/projectStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===website/Project/projectStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
                $shortText = (mb_strlen($row->e_text) > 20) ? mb_substr($row->e_text, 0, 20) . '...' : $row->e_text;
                $image= '<span><img src="' . base_url($row->images) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
                $return['data'][] = array(
                      '
                  <div style="padding-left:10px"><strong>' . $i . '.</strong></div>
                  ',
                  $row->proName,
                  $row->emp_name,
                  $row->location,
                  $row->start_date,
                  $image,
                  '<span> ₹&nbsp;'.$row->amount.'.00</span>',
                  $status,
                  $actionBtn
                  );
                  $i++;
              }
              $return['recordsTotal'] = $this->proModel->projectList_total_count($whereCn);
              $return['recordsFiltered'] = $this->proModel->projectList_filter_count($post_data, $whereCn);
              $return['draw'] = $post_data['draw'];
              echo json_encode($return);
             }elseif($action === 'editProject'){
                $getArr=json_decode(base64_decode(urldecode($id)));
                $projectDetails = $this->db->select('*')->from('project')->where(array('id'=>$getArr->id))->get()->row();
                $allEmpLIst = $this->db->select('*')->from('cordinator_manage')->order_by('id','DESC')->get()->result_array();
                $getProject = $this->db->select('*')->from('category_project')->get()->result_array();
              
                  $return = array(
                    'title' => 'Edit Project','isedited'=>'performEdit',
                    'breadcrums' => 'Edit Project',
                    'protDet' => $projectDetails,
                    'allEmpLIst' => $allEmpLIst,
                    'getProject' => $getProject,
                    'tergetItem' => base_url('website/project/index/updateData'),
                    'layout' => 'front_cms/project/editProject.php',
                    );
                    $this->load->view('base', $return);
                 }elseif($action === 'updateData'){
                $uploaded_image = $this->upload_image('project', 'previewImage');
                $data = $this->input->post();
                if ($uploaded_image['icon'] === 'success') {
                $value = array(
                'program_id' => $this->input->post('projId'), 
                'images'  => $uploaded_image['text'],         
                'project_name' => $this->input->post('projectName'), 
                'emp_id' => $this->input->post('employee_id'), 
                'amount' => $this->input->post('proAmount'), 
                'location' => $this->input->post('location'), 
                'start_date' => $this->input->post('s_date'), 
                'end_date' => $this->input->post('end_date'), 
                'message' => $this->input->post('text'), 
                'created_at' => date('Y-m-d')  
                );
                $updateData = $this->db->where('id', $data['projId'])->update('project', $value);
                if($updateData){
                $msg=array(' Thank You! you have successfully upload details');
                $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                'returnLoc'=>base_url('website/Project'));
                } else {
                $msg=array('Oops it seems error.please refresh you page.');
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                 }
                 } else {
                $msg=array($uploaded_image['text']);
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                 } 
                echo json_encode($return);
             }else {
              $allProject = $this->db->select('*')->from('category_project')->order_by('id','DESC')->get()->result_array();
              $allEmpLIst = $this->db->select('*')->from('cordinator_manage')->order_by('id','DESC')->get()->result_array();
              $return = array(
                'title' => 'Create Project',
                'allProject' => $allProject,
                'allEmpLIst' => $allEmpLIst,
                'breadcrums' => 'Create Project',
                'layout' => 'front_cms/project/manage_project.php',
                'targetItem' => base_url('website/project/index/create_project'),
                'targetList' => base_url('website/project/index/projectList'),
                );
            $this->load->view('base', $return); 
        }       
      }

  


         public function manage_program( $action = Null, $id = Null)
         {
              if($action === 'create_program'){   
                $uploaded_image = $this->upload_image('project', 'previewImage');
                if ($uploaded_image['icon'] === 'success') {
                $value = array(
                'program_id'   =>   $this->input->post('programName'), 
                'emp_id'       =>   $this->input->post('employee_id'), 
                'amount'       =>   $this->input->post('amount'), 
                'images'       =>   $uploaded_image['text'],         
                'program_name' =>   $this->input->post('programName'), 
                'location'     =>   $this->input->post('location'), 
                'start_date'   =>   $this->input->post('start_date'), 
                'end_date'     =>   $this->input->post('end_date'), 
                'message'      =>   $this->input->post('text'), 
                'created_at'   =>   date('Y-m-d')     
                );
                if($this->db->insert('program', $value)){
                $msg=array(' Thank You! you have successfully upload details');
                $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                'returnLoc'=>base_url('website/project/manage_program'));
                } else {
                $msg=array('Oops it seems error.please refresh you page.');
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                 }
                 } else {
                $msg=array($uploaded_image['text']);
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                 } 
                echo json_encode($return);
               }elseif($action === 'programList')
               {
                $post_data = $this->input->post();
                $return = array();
                $i = $post_data['start'] + 1;           
                $record = $this->proModel->programListModel($post_data);
                foreach ($record as $row) {
                    $editUid = base_url('website/Project/manage_program/editProgram/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
                    $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
                    $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/project/accPermisionFPro===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a></div>';
                    $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
                    $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===website/Project/programStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===website/Project/programStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
                    $image= '<span><img src="' . base_url($row->images) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
                    $shortText = (mb_strlen($row->e_text) > 20) ? mb_substr($row->e_text, 0, 20) . '...' : $row->e_text;
                    $return['data'][] = array('<div style="padding-left:10px"><strong>' . $i . '.</strong></div>',
                    $row->proGName,
                    $row->emp_name,
                    $row->location,
                    $row->created_at,
                    '&nbsp;&nbsp;₹ '.$row->amount.'.00',
                    $image,
                    $status,
                    $actionBtn
                    );
                    $i++;
                }
                $return['recordsTotal'] = $this->proModel->programLis_total_count($whereCn);
                $return['recordsFiltered'] = $this->proModel->programLis_filter_count($post_data, $whereCn);
                $return['draw'] = $post_data['draw'];
                echo json_encode($return);
               }elseif($action === 'editProgram'){
                $getArr=json_decode(base64_decode(urldecode($id)));
                $allEmpLIst = $this->db->select('*')->from('cordinator_manage')->order_by('id','DESC')->get()->result_array();
                $getProgram = $this->db->select('*')->from('category_program')->get()->result_array();
                $programDetails = $this->db->select('*')->from('program')->where(array('id'=>$getArr->id))->get()->row();
                  $return = array(
                    'title' => 'Edit program',
                    'breadcrums' => 'Edit Program',
                    'getProgram' => $getProgram,
                    'programDetails' => $programDetails,
                    'allEmpLIst' => $allEmpLIst,
                    'targetItem' => base_url('website/project/manage_program/updateData'),
                    'layout' => 'front_cms/project/editProgram.php',
                    );
                    $this->load->view('base', $return);
               }elseif($action === 'updateData'){
                $data = $this->input->post();
                $uploaded_image = $this->upload_image('project', 'previewImage');
                if ($uploaded_image['icon'] === 'success') {
                $value = array(
                'emp_id'       =>   $this->input->post('employee_id'), 
                'amount'       =>   $this->input->post('amount'), 
                'images'  => $uploaded_image['text'],         
                'program_name' => $this->input->post('employee_id'), 
                'location' => $this->input->post('location'), 
                'start_date' => $this->input->post('s_date'), 
                'end_date' => $this->input->post('end_date'), 
                'message' => $this->input->post('text'), 
                'created_at' => date('Y-m-d')     
                );
                $updateData = $this->db->where('id', $data['id'])->update('program', $value);
                if($updateData){
                $msg=array(' Thank You! you have successfully upload details');
                $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                'returnLoc'=>base_url('website/project/manage_program'));
                } else {
                $msg=array('Oops it seems error.please refresh you page.');
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                 }
                 } else {
                $msg=array($uploaded_image['text']);
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                 } 
                echo json_encode($return);
               }else{
                $allProgram = $this->db->select('*')->from('category_program')->order_by('id','DESC')->get()->result_array();
                $allEmpLIst = $this->db->select('*')->from('cordinator_manage')->order_by('id','DESC')->get()->result_array();
               $return = array(
               'title' => 'Manage Program',
               'breadcrums' => 'Create Program',
               'allProgram' => $allProgram,
               'allEmpLIst' => $allEmpLIst,
               'layout' => 'front_cms/project/manage_program.php',
               'targetList' => base_url('website/Project/manage_program/programList'),
               );
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

 

           
  public function accPermision(){$this->accPermissionUnified();}
  public function accPermisionFPro(){$this->accPermissionUnified();}


  public function accPermissionUnified()
  {
      $post = $this->input->post();
      $return = '';
      $tableMap = [
          'project' => 'accPermision',
          'program' => 'accPermisionFPro',
      ];
      $tableName = array_search($this->router->fetch_method(), $tableMap); 
      if (!$tableName) {
          $return = ['msg' => "Invalid operation.", 'action' => '', 'tClor' => '#db3704'];
          echo json_encode($return);
          return;
      }
      if ($post['oprType'] == 'viewDelete') {
          $isMember = $this->common->getRowData($tableName, 'id', $post['id']);
          if ($isMember) {
         $return = [
         'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Do you wish to delete <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span> ?.',
         'action' => 'cnfDeleteDetail===website/Project/' . $this->router->fetch_method() . '===' . $isMember->id,
         'tClor' => '#db3704'
         ];
         } else {
         $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];
         }
      } else if ($post['oprType'] == 'cnfDeleteDetail') {
        $isMember = $this->common->getRowData($tableName, 'id', $post['id']);
        if ($isMember) {
        $deltResult = $this->common->del_data_multi_con($tableName, ['id' => $post['id']]);
        if ($deltResult) {
        $return = [
        'msg' => '<i class="fa-regular fa-circle-check"></i> Data deletion completed.<br>
        <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span> has been removed.',
        'action' => 'success',
        'tClor' => '#008038'
         ];} else {
        $return = [
        'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Deletion failed for <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span>.<br>
         Please check the details and try again.',
         'action' => 'errorShw',
         'tClor' => '#db3704'
         ];
         }
         } else {
         $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];
          }
      } else {
          $return = ['msg' => "Invalid operation type.", 'action' => '', 'tClor' => '#db3704'];
      }
      sleep(1);
      echo json_encode($return);
  }

  public function projectStatus(){$where=array('tblName'=>'project','actnUrl'=>'miStatusChange===website/Project/projectStatus===');$this->manageStatus($where);}
  public function programStatus(){$where=array('tblName'=>'program','actnUrl'=>'miStatusChange===website/Project/programStatus===');$this->manageStatus($where);}


  public function manageStatus($where){
  $post=$this->input->post();
  if($post['oprType']=='miStatusView')
  {$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
   if($getData){
   if($getData->status=='Active'){	
   $msg=array(
   'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->name.' of ID #'.$getData->id,
   'action'=>$where['actnUrl'].$getData->id);
   }else{
   $msg=array(
  'msg'=>'Are you sure want to activate '.$getData->name.' of ID #'.$getData->id,
  'action'=>$where['actnUrl'].$getData->id)
  ;}}else{
  $msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
  }echo json_encode($msg);}
  elseif($post['oprType']=='miStatusChange')
  {sleep(2);
  $getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
  if($getData->status==1){
  $change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
  }else{
  $change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
  $changeArr=array('status'=>$change);
  $result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
  if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
  echo json_encode($msg);
  }
  }
  
       



}
?>
