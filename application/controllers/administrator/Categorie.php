<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categorie extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
        $this->load->model(array('administrator/Project_model' => 'proModel'));
        $this->load->model(array('administrator/Categorie_model' => 'category'));
        error_reporting(0);
    }
  

    public function project($action = null,$id=NULL)
    {
        if($action === 'projectList')
		{
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;           
            $record = $this->proModel->projectList_model($post_data);
            foreach ($record as $row) {
              $editUid = base_url('administrator/categorie/project/editProject/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
              $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
              $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/categorie/accPermisionForProject===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
              $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
              $image= '<span><img src="' . base_url($row->project_img) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';

              $status=($row->status==1)?'<a class="badge bg-success getAction miLvs"   href="javascript:void(0)" data-id="miStatusView===administrator/categorie/manageProject==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/categorie/manageProject==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';

            //   $shortDescription = (mb_strlen($row->discription) > 15) ? mb_substr($row->discription, 0, 15) . '...': $row->discription;
                  $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
                  '<div class="text-center">'.$row->project_id.'</div>',
                  '<div class="text-center">'.$row->project_name.'</div>',
                  '<div class="text-center">'.$image.'</div>',
                  '<div class="text-center">'.$row->location.'</div>',
                  '<div class="text-center">'.$status.'</div>',
                
                  $actionBtn
              );
              $i++;
              }
            $return['recordsTotal'] = $this->proModel->projectList_total_count($whereCn);
            $return['recordsFiltered'] = $this->proModel->projectList_filter_count($post_data, $whereCn);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);

           }
           elseif($action === 'editProject')
            {    
              $getArr=json_decode(base64_decode(urldecode($id)));
              $proItemData = $this->db->select('*')->from('category_project')->where(array('id'=>$getArr->id))->get()->row();
                $return = array(
                  'title' => 'Manage Project','isedited'=>'performEdit',
                  'breadcrums' => 'Manage Project',
                  'project' => $proItemData,
                  'updateProject' => base_url('administrator/categorie/project/updateProject'),
                  'targetItem' => base_url('administrator/categorie/project/projectList'),
                  'layout' => 'admin/categorie/editProject.php',
                  );
                  $this->load->view('base', $return);

            }elseif($action === 'updateProject'){
              $data = $this->input->post();
              $uploaded_image = $this->upload_image('project', 'proImg');
              if ($uploaded_image !== false) { 
              $value = array(
                  'project_name' => $data['project_name'],
                  'location' => $data['location'],
                  'project_img' => $uploaded_image['text'],
                  'description' => $data['message'],
                  'created_at' => date('Y-m-d')
              );
              $this->db->where('id', $data['id']);
              $update = $this->db->update('category_project', $value);
              if ($update) {
                  $msg = array('Thank You! You have successfully updated.');
                  $response = array('addClas' => 'tSuccess', 'msg' => $msg, 'icon' => '<i class="fa-regular fa-circle-check"></i>', 'returnLoc' => base_url('administrator/categorie/project'));
              } else {
                  $msg = array('Oops! It seems there was an error. Please refresh your page.');
                  $response = array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
              }}else{
                $msg = array('Oops! Image upload failed. Please try again.');
                $data = array('addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
              }
             echo json_encode($response);
             }elseif($action === 'create'){
              $getID = 'PRO' . random_int(10000, 99999);
              $uploaded_image = $this->upload_image('project', 'proImg');
              if ($uploaded_image !== false) { 
                
              $value = array(
              'project_id' => $getID,
              'project_img' => $uploaded_image['text'],
              'project_name' => $this->input->post('project_name'),
              'location' => $this->input->post('location'),
              'description' => $this->input->post('message'),
              'created_at' => date('Y-m-d')
              );
              if ($this->db->insert('category_project', $value)) {
              $msg = array('Thank you! You have successfully created the project.');
              $data = array('addClas' => 'tSuccess','msg' => $msg,'icon' => '<i class="fa-regular fa-circle-check"></i>','returnLoc' => base_url('administrator/categorie/project'));
              } else {
              $msg = array('Oops! It seems there was an error. Please refresh your page.');
              $data = array('addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
              }
              echo json_encode($data);
              } else {
              $msg = array('Oops! Image upload failed. Please try again.');
              $data = array('addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
              echo json_encode($data);
              }}else{
            $return = array(
            'title' => 'Manage Project',
            'breadcrums' => 'Create Project','isedited'=>'performEdit',
            'createProject' => base_url('administrator/categorie/project/create'),
            'targetItem' => base_url('administrator/categorie/project/projectList'),
            'layout' => 'admin/categorie/project.php',
            );
            $this->load->view('base', $return);
            }
        
    }


        function upload_image($path, $name){
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



    public function program($type = Null, $id = Null)
    {
       if($type === 'programList')
       {
        $post_data = $this->input->post();
        $return['data'] = array();
        $i = $post_data['start'] + 1;           
        $record = $this->proModel->programList_model($post_data);
        foreach ($record as $row) {
          $editUid = base_url('administrator/categorie/program/editProgram/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
          $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
          $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/categorie/accPermisionPro===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
          $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
          $image= '<span><img src="' . base_url($row->program_img) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
          $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===administrator/categorie/manageProgram==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/categorie/manageProgram==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
          //$shortDescription = (mb_strlen($row->discription) > 15) ? mb_substr($row->discription, 0, 15) . '...': $row->discription;
          $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
          '<div class="text-center">'.$row->program_id.'</div>',
          '<div class="text-center">'.$row->program_name.'</div>',
          '<div class="text-center">'.$image.'</div>',
          '<div class="text-center">'.$row->location.'</div>',
          '<div class="text-center">'.$status.'</div>',
              $actionBtn
          );
          $i++;
          }
        $return['recordsTotal'] = $this->proModel->programList_count($whereCn);
        $return['recordsFiltered'] = $this->proModel->programList_filter_count($post_data, $whereCn);
        $return['draw'] = $post_data['draw'];
        echo json_encode($return);
       }elseif($type === 'create'){
        $getID = 'PRO' . random_int(1000, 9999);
        $uploaded_image = $this->upload_image('program', 'programImg');
        if ($uploaded_image !== false) { 
        $value = array(
        'program_img'   => $uploaded_image['text'],
        'program_id'    => $getID,
        'program_name'  => $this->input->post('project_name'),
        'location'      => $this->input->post('location'),
        'description'   => $this->input->post('message'),
        'created_at '   => date('Y-m-d'),
        'status '       => 2,
        );
        $programData = $this->db->insert('category_program', $value);
        if ($programData) {
        $msg = array('Thank you! You have successfully created the program.');
        $data = array('addClas' => 'tSuccess','msg' => $msg,'icon' => '<i class="fa-regular fa-circle-check"></i>','returnLoc' => base_url('administrator/categorie/program'));
        } else {
        $msg = array('Oops! It seems there was an error. Please refresh your page.');
        $data = array('addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
        }
        echo json_encode($data);
        } else {
        $msg = array('Oops! Image upload failed. Please try again.');
        $data = array('addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
        echo json_encode($data);
        }}elseif($type === 'editProgram'){ 
              $getArr=json_decode(base64_decode(urldecode($id)));
              $programItem = $this->db->select('*')->from('category_program')->where(array('id'=>$getArr->id))->get()->row();
                $return = array(
                  'title' => 'Manage Program','isedited'=>'performEdit',
                  'breadcrums' => 'Manage Project',
                  'program' => $programItem,
                  'createProgram' => base_url('administrator/categorie/program/updateProgram'),
                  'targetItem' => base_url('administrator/categorie/project/projectList'),
                  'layout' => 'admin/categorie/editProgram.php',
                  );
                  $this->load->view('base', $return);

            }elseif($type === 'updateProgram'){
              $data = $this->input->post();  
              $uploaded_image = $this->upload_image('program', 'proImg');  
              if ($uploaded_image !== false) {
                  $value = array(
                      'program_img'   => $uploaded_image['text'], 
                      'program_name'  => $this->input->post('project_name'),
                      'location'      => $this->input->post('location'),
                      'description'   => $this->input->post('message'),
                      'created_at'    => date('Y-m-d')  
                  );
                  $this->db->where('id', $data['id']);
                  $update = $this->db->update('category_program', $value);  
                  if ($update) {
                      $msg = array('Thank You! You have successfully updated.');
                      $response = array(
                          'addClas'     => 'tSuccess',
                          'msg'         => $msg,
                          'icon'        => '<i class="fa-regular fa-circle-check"></i>',
                          'returnLoc'   => base_url('administrator/categorie/project') 
                      );
                  } else {
                      $msg = array('Oops! It seems there was an error. Please refresh your page.');
                      $response = array(
                          'addClas'     => 'tWarning',
                          'msg'         => $msg,
                          'icon'        => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                      );
                  }
              } else {
                  $msg = array('Oops! Image upload failed. Please try again.');
                  $response = array(
                      'addClas'     => 'tWarning',
                      'msg'         => $msg,
                      'icon'        => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                  );
              }
              echo json_encode($response);
            }else{
            $return = array(
            'title' => 'Manage program',
            'breadcrums' => 'Create program',
            'programListItem' => base_url('administrator/categorie/program/programList'),
            'createProgram' => base_url('administrator/categorie/program/create'),
            'layout' => 'admin/categorie/program.php',
            );
            $this->load->view('base', $return);
       }
       
    }






    public function accPermisionForProject(){$this->accPermissionUnified();}
    public function accPermisionPro(){$this->accPermissionUnified();}
    public function accPermForInc(){$this->accPermissionUnified();}
    public function accPerForExp(){$this->accPermissionUnified();}

    public function accPermissionUnified(){
        $post = $this->input->post();
        $return = '';
        $tableMap = ['category_expense' => 'accPerForExp','category_program' => 'accPermisionPro','category_project' => 'accPermisionForProject','expense' => 'accPerForExpense', 'cordinator_manage' => 'accPermForInc']; 
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
           'action' => 'cnfDeleteDetail===administrator/categorie/' . $this->router->fetch_method() . '===' . $isMember->id,
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
          'action' => 'success','tClor' => '#008038'
           ];} else {
          $return = [
          'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Deletion failed for <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span>.<br>
           Please check the details and try again.',
           'action' => 'errorShw','tClor' => '#db3704'
           ];
           }} else {
           $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];
           }} else {
           $return = ['msg' => "Invalid operation type.", 'action' => '', 'tClor' => '#db3704'];
           }sleep(1);echo json_encode($return);
    }
    
  
       public function manageProject()
       {$where=array('tblName'=>'category_project','actnUrl'=>'miStatusChange===administrator/categorie/manageProject===');$this->manage($where);}
       public function manageProgram()
        {
           $where=array('tblName'=>'category_program','actnUrl'=>'miStatusChange===administrator/categorie/manageProgram===');
           $this->manage($where);
        }
        public function manage($where)
		  {
          $post=$this->input->post();
          if($post['oprType']=='miStatusView')
		  {$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
		   if($getData){
		   if($getData->status=='Active'){	
           $msg=array(
		   'msg'=>'<i class="fa fa-power-off" aria-hidden="true"></i> Are you sure want to deactivate '.$getData->shift_name.' of ID #'.$getData->id,
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



          public function income($type = NULL, $getId = NULL)
          {

            if($type === 'showList'){
              $post_data = $this->input->post();
              $return['data'] = array();
              $i = $post_data['start'] + 1;           
              $record = $this->category->incomeList_model($post_data);
              foreach ($record as $row) {
                $editUid = base_url('administrator/categorie/income/ecitIncome/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
                $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
                $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/categorie/accPermForInc===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
                $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
                $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===administrator/categorie/manageProgram==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/categorie/manageProgram==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
                $shortDescription = (mb_strlen($row->description) > 20) ? mb_substr($row->description, 0, 20) . '...' : $row->description;
                $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
                '<div class="text-center">'.$row->income_sources.'</div>',
                '<div class="text-center">'.$shortDescription.'</div>',
                 $actionBtn
                );
                $i++;
                }
              $return['recordsTotal'] = $this->category->incomeList_count($whereCn);
              $return['recordsFiltered'] = $this->category->incomeList_filter_count($post_data, $whereCn);
              $return['draw'] = $post_data['draw'];
              echo json_encode($return);
            }elseif($type === 'ecitIncome'){
                 $getArr=json_decode(base64_decode(urldecode($getId)));
                 $result = $this->db->select('*')->from('category_income')->where('id',$getArr->id)->get()->row();
                  $return = array(
                  'title' => 'Edit Income Source ',
                  'breadcrums' => 'Manage All Income Sources ',
                  'income_data' => $result,
                  'createProject' => base_url('administrator/categorie/income/update'),
                  'layout' => 'admin/categorie/edit_income.php',
                  );
                  $this->load->view('base', $return);
            }elseif($type === 'update'){
              $this->form_validation->set_rules('income','Enter Source Name','trim|required|xss_clean');
              $this->form_validation->set_rules('message','Enter Description','trim|required|xss_clean');
              if($this->form_validation->run()==TRUE)
              {
                  $value = $this->input->post();
                  $insrtArray = array(
                       'income_sources'  => $value['income'],
                       'description' => $value['message'],
                       'created_at' => date('Y-m-d'),
                  );

                 if($this->db->where('id',$value['id'])->update('category_income',$insrtArray)){
                 $msg=array('Thank you! You have updated successfully.');
                 $data=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('administrator/categorie/income'));
                 }
                 else{$msg=array('Oops it seems error.please refresh you page.');$data=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
                 }
                 else
                 {
                 $msg=array('income'=>form_error('income'),'message'=>form_error('message'));
                       $data=array('addClas'=>'tDanger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');
                 }
                   echo json_encode($data);
              }elseif($type === 'create'){
              $this->form_validation->set_rules('income','Enter Source Name','trim|required|xss_clean');
              $this->form_validation->set_rules('message','Enter Description','trim|required|xss_clean');
              if($this->form_validation->run()==TRUE)
              {
                  $value = $this->input->post();
                  $insrtArray = array(
                       'income_sources'  => $value['income'],
                       'description' => $value['message'],
                       'created_at' => date('Y-m-d'),
                  );
                 if($this->common->save_data('category_income',$insrtArray))
                 {
                 $msg=array('Thank you! You have successfully created it.');
                 $data=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('administrator/categorie/income'));
                 }
                 else{$msg=array('Oops it seems error.please refresh you page.');$data=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
                 }
                 else
                 {
                 $msg=array('income'=>form_error('income'),'message'=>form_error('message'));
                       $data=array('addClas'=>'tDanger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');
                 }
                   echo json_encode($data);
                  
             }else{
              $return = array(
                'title' => 'Manage All Income Sources ',
                'breadcrums' => 'Manage All Income Sources ',
                'targetListItem' => base_url('administrator/categorie/income/showList'),
                'createProject' => base_url('administrator/categorie/income/create'),
                'layout' => 'admin/categorie/income.php',
                );
                $this->load->view('base', $return);
             }
          }



          public function expense($action = NULL, $getId = NULL)
          {
            if($action === 'showList'){
              $post_data = $this->input->post();
              $return['data'] = array();
              $i = $post_data['start'] + 1;           
              $record = $this->category->expenseList_model($post_data);

              foreach ($record as $row) {
                $editUid = base_url('administrator/categorie/expense/editExpense/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
                $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
                $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/categorie/accPerForExp===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
                $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
                $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===administrator/categorie/manageProgram==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/categorie/manageProgram==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
                $shortDescription = (mb_strlen($row->description) > 20) ? mb_substr($row->description, 0, 20) . '...' : $row->description;
                $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
                '<div class="text-center">'.$row->expense_name.'</div>',
                '<div class="text-center">'.$shortDescription.'</div>',
                 $actionBtn
                );
                $i++;
                }
              $return['recordsTotal'] = $this->category->expenseList_count($whereCn);
              $return['recordsFiltered'] = $this->category->expenseList_filter_count($post_data, $whereCn);
              $return['draw'] = $post_data['draw'];
              echo json_encode($return);
              }elseif($action === 'create'){
              $this->form_validation->set_rules('expenseName','Enter Expense Name','trim|required|xss_clean');
              $this->form_validation->set_rules('message','Enter Description','trim|required|xss_clean');
              if($this->form_validation->run()==TRUE)
              {
                  $value = $this->input->post();
                  $insrtArray = array(
                    'expense_name'  => $value['expenseName'],
                    'description' => $value['message'],
                    'created_at' => date('Y-m-d'),
                  );
                 if($this->common->save_data('category_expense',$insrtArray))
                 {
                 $msg=array(' Thank you! You have successfully created it.');
                 $data=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('administrator/categorie/expense'));
                 }
                 else{$msg=array('Oops it seems error.please refresh you page.');$data=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
                 }
                 else
                 {
                 $msg=array('expenseName'=>form_error('expenseName'),'message'=>form_error('message'));
                       $data=array('addClas'=>'tDanger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');
                 }
                   echo json_encode($data);
               }elseif($action === 'editExpense'){
               $getArr=json_decode(base64_decode(urldecode($getId)));
                 $result = $this->db->select('*')->from('category_expense')->where('id',$getArr->id)->get()->row();
                  $return = array(
                  'title' => 'Edit Expense',
                  'breadcrums' => 'Manage All Income Sources ',
                  'expense_data' => $result,
                  'targetValue' => base_url('administrator/categorie/expense/update'),
                  'layout' => 'admin/categorie/edit_expense.php',
                  );
                  $this->load->view('base', $return);
              }elseif($action === 'update'){
                $this->form_validation->set_rules('expenseName','Enter Expense Name','trim|required|xss_clean');
                $this->form_validation->set_rules('message','Enter Description','trim|required|xss_clean');
                if($this->form_validation->run()==TRUE)
                {
                    $value = $this->input->post();
                    $insrtArray = array(
                         'expense_name'  => $value['expenseName'],
                         'description' => $value['message'],
                         'created_at' => date('Y-m-d'),
                    );
  
                   if($this->db->where('id',$value['id'])->update('category_expense',$insrtArray)){
                   $msg=array('Thank you! You have updated successfully.');
                   $data=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('administrator/categorie/expense'));
                   }
                   else{$msg=array('Oops it seems error.please refresh you page.');$data=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
                   }
                   else
                   {
                   $msg=array('expenseName'=>form_error('expenseName'),'message'=>form_error('message'));
                         $data=array('addClas'=>'tDanger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');
                   }
                     echo json_encode($data);
              }else{
              $return = array(
                'title' => 'Manage Expense ',
                'breadcrums' => 'Manage All Income Sources ',
                'targetListItem' => base_url('administrator/categorie/expense/showList'),
                'targetValue' => base_url('administrator/categorie/expense/create'),
                'layout' => 'admin/categorie/expense.php',
                );
                $this->load->view('base', $return);
            }
           
          }








         




  
    

  
} 