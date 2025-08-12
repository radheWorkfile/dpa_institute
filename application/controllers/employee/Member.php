<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
        $this->logID = $this->session->userdata['user_id'];
        error_reporting(0);  
		$this->load->model(array('employee/Member_model' => 'member'));
    }

	public function index()
	{
		$return = array('title' => 'Dashboard', 'breadcrums' => 'Dashboard Administrator');
		$this->load->view('employee/base', $return);
	}

	

	public function create($action = NULL, $getId = NULL)
	{
        if($action === 'MemList'){
			$post_data = $this->input->post();
           $return['data'] = array();
            $i = $post_data['start'] + 1;           
            $record = $this->member->showMemList($post_data);
            foreach ($record as $row) {
				
				$viewUid = base_url('employee/member/view_member/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'existMember' => $row->id)))));  
				$editUid = base_url('employee/member/create/editItem/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
				$isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/member/delItem===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
				$actionBtn = '<div style="text-align:right;">
								<a href="javascript:void(0)" class="btn btn-warning shadow btn-xs sharp ActnCmdByAmi" title="Certificate" data-id="certift===employee/member/certificate/' . $row->id . '" id="crTft' . $row->id . '"><i class="las la-certificate"></i></a>
								<a href="javascript:void(0)" class="btn btn-info shadow btn-xs sharp ActnCmdByAmi" data-id="idcrd===employee/member/idCard/' . $row->id . '" id="idCrD' . $row->id . '" title="Id-card"><i class="las la-id-card"></i></a>
								<a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
								<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
								' . $isDel . '
							</div>';


							if($row->status==1)					
							{
								$manStatus = 'Active';
							}elseif($row->status==2){
								$manStatus = 'Deactive';
							}
					
							$status=($manStatus== 'Active')?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===employee/member/manStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===employee/member/manStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';						

				$return['data'][] = array(
					'<div class="text-center"><strong>' . $i . '.</strong></div>',
					'<div class="text-center">'.$row->member_id.'</div>',
					'<div class="text-center">'.$row->name.'</div>',
					'<div class="text-center">'.$row->mobile_number.'</div>',
					'<div class="text-center">'.$row->email_id.'</div>',
					'<div class="text-center">'.date('d-M-Y', strtotime($row->create_date)).'</div>',
					'<div class="text-center">'.$status.'</div>',
					$actionBtn
				);
				$i++;
            }
            $return['recordsTotal'] = $this->member->total_count($whereCn);
            $return['recordsFiltered'] = $this->member->total_filter_count($post_data, $whereCn);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
		    }elseif($action === 'editItem'){
			$whereCon = json_decode(base64_decode(urldecode($getId)));
			$mem_detials = $this->db->select('*')->from('manage_member')->where(array('id'=>$whereCon->existMember))->get()->row();
			$return = array(
				'title' => 'Edit Member',
			    'breadcrums' => 'Edit Member',
				'layout' => 'member/create.php',
				'actnOper' => 'create',
				'createItem' => base_url('employee/member/create/updateMem'),
				'isMember' => $mem_detials,
			);
            $this->load->view('employee/base', $return);
		   }elseif($action === 'updateMem'){
            $session = $this->session->userdata('user_id');
			$post = $this->input->post();
			$this->form_validation->set_rules('frstName', 'First name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('mobileNu', 'Mobile No.', 'trim|required|xss_clean|numeric|max_length[10]');
			$this->form_validation->set_rules('empPassword', 'Password', 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE) {
				$insertArr = array(
					'name' => $post['frstName'],
					'email_id' => $post['email_id'],
					'mobile_number' => $post['mobileNu'],
					'address' => $post['membrAddr'],
					'gender' => $post['gender'],
					'state_id' => $post['inputState'],
					'district_id' => $post['inputDistrict'],
					'password' => md5($post['empPassword']),
					'show_password' => $post['empPassword'],
					'status' => 'Active',
					'created_by' => 1,
					'created_type' => $this->lgCat,
					'create_date' => date('Y-m-d H:i:s'),
					'created_by_user_type_id' => $session
				); 
				$update = $this->db->where('id', $post['getId'])->update('manage_member', $insertArr);
				if ($update) {
					$msg = array(' Thank You! you have successfully update your details');
					$data = array('addClas' => 'tSuccess','msg' => $msg, 'icon' => '<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('employee/member/manage'));
				} else {
					$msg = array('Oops it seems error.please refresh you page.');
					$data = array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
				} }elseif($action === 'delItem'){
					$where=array('tblName'=>'cms_team','actnUrl'=>'miStatusChange===employee/member/manage/manageAcc===');$this->manageStatus($where);
				} else {
				$msg = array(
					'frstName' => form_error('frstName'),
					'email_id' => form_error('email_id'),
					'mobileNu' => form_error('mobileNu'),
					'membrAddr' => form_error('membrAddr'),
					'zipcode' => form_error('zipcode'),
					'empPassword' => form_error('empPassword'),
					'empConPassword' => form_error('empConPassword')
				);
				$data = array('addClas' => 'tDanger', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
			}
			echo json_encode($data);
		}elseif($action === 'create_member'){
			$session = $this->session->userdata('user_id');
			$post = $this->input->post();
			$this->form_validation->set_rules('frstName', 'First name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('mobileNu', 'Mobile No.', 'trim|required|xss_clean|numeric|max_length[10]');
			$this->form_validation->set_rules('membrAddr', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('empPassword', 'Password', 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE) {
				$getID = rand(100000000, 999999999);
				$insertArr = array(
					'member_id' => $getID,
					'name' => $post['frstName'],
					'father_name ' => $post['father_name'],
					'email_id ' => $post['email_id'],
					'mobile_number' => $post['mobileNu'],
					'gender ' => $post['gender'],

					'address' => $post['membrAddr'],
					'district_id' => $post['district_id'],
					'state_id' => $post['state_id'],
					'password' => md5($post['empPassword']),
					'show_password' => $post['empPassword'],
					'date_of_birth' => $post['dob'],
					'status' => 'Active',
					'created_by' => 1,
					'created_type' => $this->lgCat,
					'create_date' => date('Y-m-d H:i:s'),
					'created_by_user_type_id' => $session
				); 
				if ($this->common->save_data('manage_member', $insertArr)) {
					$msg = array(' Thank You! you have created successfully.');
					$data = array('addClas' => 'tSuccess','msg' => $msg, 'icon' => '<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('employee/member/manage'));
				} else {
					$msg = array('Oops it seems error.please refresh you page.');
					$data = array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
				} }elseif($action === 'delItem'){
					$where=array('tblName'=>'cms_team','actnUrl'=>'miStatusChange===employee/member/manage/manageAcc===');$this->manageStatus($where);
				} else {
				$msg = array(
					'membrName' => form_error('membrName'),
					'email_id' => form_error('email_id'),
					'mobileNu' => form_error('mobileNu'),
					'membrAddr' => form_error('membrAddr'),
					'zipcode' => form_error('zipcode'),
					'empPassword' => form_error('empPassword'),
					'empConPassword' => form_error('empConPassword')
				);
				$data = array('addClas' => 'tDanger', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
			}
			echo json_encode($data);
		}else{
            // $stateList = $this->common->getDataList('states_cities', array('parent_id' => '729'), '*'); // + "admin/employee/findDetails"
			// $job_sector = $this->common->getDataList('job_sector', array('status' => 'Active'), '*');
			// $getBusiness = $this->common->getDataList('member_business', array('status' => 'Active'), '*');
			$return = array(
				'title' => 'Create Member',
			    'breadcrums' => 'Create Member',
				'layout' => 'member/create.php',
				'actnOper' => 'create',
				'createItem' => base_url('employee/member/create/create_member'),
				// 'arvActionTrgt' => base_url('administrator/member/findDetails'),
				// 'job_sector' => $job_sector,
				// 'getBusiness' => $getBusiness,
				// 'stateList' => $stateList
			);
            $this->load->view('employee/base', $return);
		}
      }  

	  public function view_member($getId = NULL)
	  {
		$id = json_decode(base64_decode(urldecode($getId)));
        $mem_detials = $this->db->select('*')->from('manage_member')->where('id',$id->existMember)->get()->row();
		$return = array(
			'title' => 'Create Member',
			'breadcrums' => 'Create Member',
			'isMember' => $mem_detials,
			'layout' => 'member/profile.php',
			'actnOper' => 'create',
			'createItem' => base_url('employee/member/create/create_member'),
		);
		$this->load->view('employee/base', $return);
	  }
	
	  public function idCard($id)
	{
		$getIDCardDetails = $this->common->getRowData('manage_member', 'id', $id);
		$data['getIDCardDetails'] = $getIDCardDetails;
		$data['title'] = 'Member Id Card';
		$this->load->view('employee/member/i_card_download', $data);
	}
	public function certificate($id)
	{
		$getIDCardDetails = $this->common->getRowData('manage_member', 'id', $id);
		$data['getIDCardDetails'] = $getIDCardDetails;
		$data['title'] = 'Member Certificate';
		$this->load->view('employee/member/certificate', $data);
	}


	public function manage()
	{
		$return = array(
			'title' => 'Manage Member',
			'breadcrums' => 'Manage Member',
			'layout' => 'member/member_list.php',
			'actnOper' => 'create',
			'memListItem' => base_url('employee/member/create/MemList'),
		);
		$this->load->view('employee/base', $return);
	}

	public function accPermissionStatus($where){
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

		public function delItem(){$this->accPermissionUnified();}
		public function accPermissionUnified()
		{
			$post = $this->input->post();
			$return = '';
			$tableMap = [
				'manage_member' => 'delItem',
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
			   'action' => 'cnfDeleteDetail===employee/member/' . $this->router->fetch_method() . '===' . $isMember->id,
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

		

		public function manStatus(){
			$where=array('tblName'=>'manage_member','actnUrl'=>'miStatusChange===employee/member/manStatus===');
			$this->manageStatus($where);
		}
	
	
		public function manageStatus($where){
		$post=$this->input->post();
		if($post['oprType']=='miStatusView')
		{$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
		 if($getData){
		 if($getData->status == 1){	
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
		if($getData->status == 1){
		$change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
		}else{
		$change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
		$changeArr=array('status'=>$change);
		$result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
		if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
		echo json_encode($msg);
		}
		}

     
    

  
}

