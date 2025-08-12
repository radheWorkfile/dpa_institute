<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : '';
		$this->load->model(array('administrator/member_model' => 'member'));
		$this->logID = $this->session->userdata['user_id'];
		$this->lgCat = $this->session->userdata['user_cate'];
		error_reporting(0);
	}
	public function index()
	{
		$return = array('title' => 'Dashboard', 'breadcrums' => 'Dashboard Administrator');
		$this->load->view('base', $return);
	}

	public function create()
	{   
		$post = $this->input->post();
		if ($post['actnOper'] == 'create') {
			$this->form_validation->set_rules('frstName', 'First name', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('email_id', 'Email ID', 'trim|required|xss_clean|valid_email|is_unique[manage_member.email_id]');
			$this->form_validation->set_rules('mobileNu', 'Mobile No.', 'trim|required|xss_clean|numeric|max_length[10]');
			$this->form_validation->set_rules('membrAddr', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('empPassword', 'Password', 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE) {
				$getID = rand(100000000, 999999999);
				$insertArr = array(
					'member_id' => $getID,
					'name' => $post['frstName'],
					'email_id' => $post['email_id'],
					'mobile_number' => $post['mobileNu'],
					'address' => $post['membrAddr'],
					'date_of_birth' => $post['dob'],
					'date_of_birth' => $post['joingData'],
					'father_name' => $post['fatherName'],
					'gender' => $post['gender'],
					'state_id' => $post['state_id'],
					'district_id' => $post['district_id'],
					'password' => md5($post['empPassword']),
					'show_password' => $post['empPassword'],
					'status' => 'Active',
					'created_by' => 1,
					'created_type' => $this->lgCat,
					'create_date' => date('Y-m-d H:i:s')
				); 
				if ($this->common->save_data('manage_member', $insertArr)) {
					$msg = array('Thank you! You have successfully created the member.');
					$data = array('addClas' => 'tSuccess','msg' => $msg, 'icon' => '<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('administrator/member/manage'));
				} else {
					$msg = array('Oops it seems error.please refresh you page.');
					$data = array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
				}  // membrName    ftherName   email_id   mobileNu   membrAddr   approval_status   empPassword
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
		} else {
			$stateList = $this->common->getDataList('states_cities', array('parent_id' => '729'), '*'); // + "admin/employee/findDetails"
			$job_sector = $this->common->getDataList('job_sector', array('status' => 'Active'), '*');
			$getBusiness = $this->common->getDataList('member_business', array('status' => 'Active'), '*');
			$return = array(
				'title' => 'Create Member',
				'breadcrums' => 'Create New Member',
				'layout' => 'admin/member/create.php',
				'actnOper' => 'create',
				'createItem' => base_url('administrator/member/create'),
				'arvActionTrgt' => base_url('administrator/member/findDetails'),
				'job_sector' => $job_sector,
				'getBusiness' => $getBusiness,
				'stateList' => $stateList
			);
			$this->load->view('base', $return);
		}
	}
	public function findDetails()
	{
		$post = $this->input->post();
		if ($post['actnType'] == 'inputIndustry') {
			$resultList = $this->common->getDataListByOrder('job_industry', array('sector_id' => $post['id']), 'id,industry_name as targetName', 'industry_name');
		} else if ($post['actnType'] == 'inputDistrict') {
			$resultList = $this->common->getDataListByOrder('states_cities', array('parent_id' => $post['id']), 'id,state_cities as targetName', 'state_cities');
		} else {
			$resultList = array((object)array('id' => '', 'targetName' => 'Not Available'));
		}
		echo json_encode($resultList);
	}



	public function guest($lists = NULL, $actn = NULL)
	{
		if ($lists == 'viewList') {
			$post_data = $this->input->post();
			$record = $this->member->guest_member($post_data);
			$i = $post_data['start'] + 1;
			$return['data'] = array();
			foreach ($record as $row) {
				$editUid = base_url('administrator/member/guest_details/' . $row->id);
				$viewUid = base_url('administrator/member/viewGuest/' . $row->id);
			    $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/member/accPermisionGuest===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
				$actionBtn='<div style="text-align:center;"><a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
						<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
						'.$isDel.'
					</div>';
				$return['data'][] = array(
					'<div class="text-center"><strong>' . $i . '.</strong></div>',
					'<div class="text-center">'.$row->guest_id.'</div>',
					'<div class="text-center">'.$row->name.'</div>',
					'<div class="text-center">'.$row->mobile_number.'</div>',
					'<div class="text-center">'.$row->email_id.'</div>',
					'<div class="text-center">'.date('d-M-Y', strtotime($row->create_date)).'</div>',
					$actionBtn
				);
				$i++;
			}
			$return['recordsTotal'] = $this->member->count_guest();
			$return['recordsFiltered'] = $this->member->filter_guest($post_data);
			$return['draw'] = $post_data['draw'];
			echo json_encode($return);
		} else if ($lists == 'approval') {

			$this->form_validation->set_rules('approval_status', 'Registration Type', 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE) {
				$post = $this->input->post();
				$getPassword = $this->common->getRowData('guest_member', 'id', $post['actnOper']);
				$getID = rand(100000000, 999999999);
				$insertArr = array(
					'member_id' => $getID,
					'm_type' => $post['approval_status'],
					'name' => $post['membrName'],
					'father_name' => $post['ftherName'],
					'gender' => $post['gender'],
					'date_of_birth' => date('Y-m-d', strtotime($post['date_of_birth'])),
					'mobile_number' => $post['mobileNu'],
					'email_id' => $post['email_id'],
					'address' => $post['membrAddr'],
					'state_id' => $post['inputState'],
					'district_id' => $post['inputDistrict'],
					'zipcode' => $post['zipcode'],
					'password' => md5($getPassword->show_password),
					'show_password' => $getPassword->show_password,
					'status' => 'Active',
					'created_by' => $this->logID,
					'created_by_user_type_id' => $this->session->userdata('user_id'),
					'created_type' => $this->lgCat,
					'create_date' => date('Y-m-d H:i:s')
				);
				$isRegister = $this->common->save_data('manage_member', $insertArr);
				if ($isRegister) {
					if ($this->common->del_data(array('id' => $post['actnOper'], 'table' => 'guest_member'))) {
						$data = array('addClas' => 'tSuccess', 'msg' => array(' Thank You! you have successfully approved details'), 'icon' => '<i class="fa-regular fa-circle-check"></i>','returnLoc' => base_url('administrator/member/guest'));
					} else {
						$data = array('addClas' => 'tWarning', 'msg' => array('Oops it seems error.please refresh you page.'), 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
					}
				} else {
					$msg = array('Oops it seems error.please refresh you page.');
					$data = array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
				}
			} else {
				$data = array('addClas' => 'tDanger', 'msg' => array('approval_status' => form_error('approval_status')), 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
			}
			echo json_encode($data);
		} else {
			$return = array('title' => 'Guest Member', 'breadcrums' => 'Guest Member', 'layout' => 'admin/member/member_list.php', 'targetAction' => base_url('administrator/member/guest/viewList'));
			$this->load->view('base', $return);
		}
	}


	public function viewGuest($id){

        $getGuest = $this->common->getRowData('guest_member', 'id', $id);
		$return = array(
			'title' => 'Guest Member Details',
			'breadcrums' => 'Guest Member Details',
			'layout' => 'admin/guest/profile.php',
			'isMember' => $getGuest,
			// 'arvActionTrgt' => base_url('administrator/member/findDetails')
		);
		$this->load->view('base', $return);
	}



	public function guest_details($id)
	{
		$stateList = $this->common->getDataList('states_cities', array('parent_id' => '729'), '*');
		$job_sector = $this->common->getDataList('job_sector', array('status' => 'Active'), '*');
		$getBusiness = $this->common->getDataList('member_business', array('status' => 'Active'), '*');
		$getMember = $this->common->getRowData('guest_member', 'id', $id);
		$districtList = $this->common->getDataList('states_cities', array('parent_id' => $getMember->state_id), '*');
		$getIndustries = $this->common->getDataList('job_industry', array('status' => 'Active', 'sector_id' => $getMember->job_section), '*');
		$return = array(
			'title' => 'Guest Member Details',
			'breadcrums' => 'Guest Member Details',
			'layout' => 'admin/member/guest_details.php',
			'job_sector' => $job_sector,
			'getBusiness' => $getBusiness,
			'stateList' => $stateList,
			'districtList' => $districtList,
			'createAction' => base_url('administrator/member/guest/approval'),
			'getIndustries' => $getIndustries,
			'guestDetails' => $getMember,
			'arvActionTrgt' => base_url('administrator/member/findDetails')
		);
		$this->load->view('base', $return);
	}
	public function deactive()
	{
		$getArr = urlencode(base64_encode(json_encode(array('targetData' => 'deactive', 'm_type' => '3'))));
		$return = array(
			'title' => 'Deactive Member',
			'breadcrums' => 'Deactive Member',
			'layout' => 'admin/member/member_list.php',
			'targetAction' => base_url('administrator/member/showList/' . $getArr)
		);
		$this->load->view('base', $return);
	}
	public function founder()
	{
		$getArr = urlencode(base64_encode(json_encode(array('targetData' => 'allMember', 'm_type' => '1'))));
		$return = array(
			'title' => 'Founder Members',
			'breadcrums' => 'Founder Members',
			'layout' => 'admin/member/member_list.php',
			'tblDeactive' => base_url('administrator/member/showList/' . urlencode(base64_encode(json_encode(array('targetData' => 'deactive', 'm_type' => '1'))))),
			'tblActiveMember' => base_url('administrator/member/showList/' . urlencode(base64_encode(json_encode(array('targetData' => 'active', 'm_type' => '1'))))),
			'targetAction' => base_url('administrator/member/showList/' . $getArr)
		);
		$this->load->view('base', $return);
	}
	public function mentor()
	{
		$getArr = urlencode(base64_encode(json_encode(array('targetData' => 'allMember', 'm_type' => '2'))));
		$return = array(
			'title' => 'Mentor Members',
			'breadcrums' => 'Mentor Members',
			'layout' => 'admin/member/member_list.php',
			'tblDeactive' => base_url('administrator/member/showList/' . urlencode(base64_encode(json_encode(array('targetData' => 'deactive', 'm_type' => '2'))))),
			'tblActiveMember' => base_url('administrator/member/showList/' . urlencode(base64_encode(json_encode(array('targetData' => 'active', 'm_type' => '2'))))),
			'targetAction' => base_url('administrator/member/showList/' . $getArr)
		);
		$this->load->view('base', $return);
	}
	public function showList($whereCn = NULL)
	{
		$post_data = $this->input->post();
		$record = $this->member->member_data($post_data, $whereCn);
		$i = $post_data['start'] + 1;
		$return['data'] = array();
		foreach ($record as $row) {
			$viewUid = base_url('administrator/member/manage/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'existMember' => $row->id)))));
			$editUid = base_url('administrator/member/manage/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
			$isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/member/accPermision===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';

			$actionBtn = '<div style="text-align:right;">
							<a href="javascript:void(0)" class="btn btn-warning shadow btn-xs sharp ActnCmdByAmi" title="Certificate" data-id="certift===administrator/member/certificate/' . $row->id . '" id="crTft' . $row->id . '"><i class="las la-certificate"></i></a>
							<a href="javascript:void(0)" class="btn btn-info shadow btn-xs sharp ActnCmdByAmi" data-id="idcrd===administrator/member/idCard/' . $row->id . '" id="idCrD' . $row->id . '" title="Id-Card"><i class="las la-id-card"></i></a>
							<a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
							<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
							' . $isDel . '
						</div>';
				
						$status=($row->status == 'Active')?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===administrator/member/manStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/member/manStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';						


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
	}

	public function manage($actn = NULL)
	{
		$whereCon = json_decode(base64_decode(urldecode($actn)));
		if ($whereCon->action == 'viewDetails') {
			$mem_id = json_decode(base64_decode(urldecode($actn)));
			$isMember = $this->common->getRowData('manage_member', 'id', $mem_id->existMember);
			$return = array(
				'layout' => 'admin/member/profile.php',
				'actnOper' => $isMember->id,
				'isMember' => $isMember
			);
			$this->load->view('base', $return);
		} elseif ($whereCon->action == 'editDetails') {
			$isMember = $this->db->select('*')->from('manage_member')->where('id',$whereCon->existMember)->get()->row();
			$stateList = $this->common->getDataList('states_cities', array('parent_id' => '729'), '*');
			$distrctList = $this->common->getDataList('states_cities', array('parent_id' => $isMember->state_id), '*');
			$blockList = $this->common->getDataList('manage_block', array('district_id' => $isMember->district_id), '*');
			$panchayatList = $this->common->getDataList('manage_panchayat', array('block_id' => $isMember->block_id), '*');
			$villageList = $this->common->getDataList('manage_village', array('panchayat_id' => $isMember->panchayat_id), '*');

			$return = array(
				'title' => 'Edit Member',
				'breadcrums' => 'Edit Member',
				'layout' => 'admin/member/create.php',
				'actnOper' => $isMember->id,
				'createItem' => base_url('administrator/member/manage/' . urlencode(base64_encode(json_encode(array('action' => 'updateDetails', 'existMember' => $whereCon->existMember))))),
				'arvActionTrgt' => base_url('administrator/member/findDetails'),
				'stateList' => $stateList,
				'isMember' => $isMember,
				'district' => $distrctList,
				'blockWise' => $blockList,
				'panchayat' => $panchayatList,
				'villageWise' => $villageList
			);
			$this->load->view('base', $return);
		} else if ($whereCon->action == 'updateDetails') {
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('frstName', 'Date of Birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|xss_clean|valid_email|is_unique[staff.email]');
			$this->form_validation->set_rules('mobileNu', 'Mobile No.', 'trim|required|xss_clean|numeric|max_length[10]');
			$this->form_validation->set_rules('empPassword', 'Password', 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE) {
				$getRole = array('1' => 'statewise', '2' => 'districtwise', '3' => 'blockwise', '4' => 'panchayatwise', '5' => 'villagewise');
				$empLoc = $getRole[$post['empRole']];
				$post = $this->input->post();
				$insertArr = array(
					'name' => $post['frstName'],
					'father_name' => $post['fatherName'],
					'gender' => $post['gender'],
					'email_id' => $post['email_id'],
					'mobile_number' => $post['mobileNu'],
					'state_id' => $post['state_id'],
					'district_id' => $post['district_id'],
					'address' => $post['membrAddr'],
					'show_password' => $post['empPassword'],
					'password' => md5($post['empPassword']),
					'modified_by' => $this->logID,
					'modified_type' => $this->lgCat,
					'modified_date' => date('Y-m-d H:i:s')
				);
				if ($this->common->update_data('manage_member', array('id' => $post['actnOper']), $insertArr)) {
					$msg = array(' Thank You! you have successfully update details');
					$data = array('addClas' => 'tSuccess', 'msg' => $msg, 'icon' => '<i class="fa-regular fa-circle-check"></i>', 'returnLoc' => base_url('administrator/member/manage'));
				} else {
					$msg = array('Oops it seems error.please refresh you page.');
					$data = array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
				}
			} else {
				$msg = array('gender' => form_error('gender'), 'frstName' => form_error('frstName'), 'email_id' => form_error('email_id'), 'mobileNu' => form_error('mobileNu'), 'empRole' => form_error('empRole'), 'empPassword' => form_error('empPassword'));
				$data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="pe-7s-sun bx-spin"></i>');
			}
			echo json_encode($data); 

		} else {
			$getArr = urlencode(base64_encode(json_encode(array('targetData' => 'allMember', 'm_type' => '3'))));
			$return = array(
				'title' => 'Members List',
				'breadcrums' => 'Members List',
				'layout' => 'admin/member/member_list.php',
				'tblDeactive' => base_url('administrator/member/showList/' . urlencode(base64_encode(json_encode(array('targetData' => 'deactive', 'm_type' => '3'))))),
				'tblActiveMember' => base_url('administrator/member/showList/' . urlencode(base64_encode(json_encode(array('targetData' => 'active', 'm_type' => '3'))))),
				'targetAction' => base_url('administrator/member/showList/' . $getArr)
			);
			$this->load->view('base', $return);
		}
	}



	public function accPermisionGuest()
	{
		$post = $this->input->post();
		$return = '';
		if ($post['oprType'] == 'viewDelete') {
			$isGuest = $this->common->getRowData('guest_member', 'id', $post['id']);
			
			if ($isGuest) {
				$return = array('msg' => '<i class="fa-solid fa-circle-exclamation"></i> Do you wish to delete <span style="font-weight:900;">' . $isGuest->name . ' (ID #' . $isGuest->guest_id . ') </span> ?.', 'action' => 'cnfDeleteDetail===administrator/member/accPermisionGuest===' . $isGuest->id, 'tClor' => '#db3704');
			} else {
				$return = array('msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704');
			}
		} else if ($post['oprType'] == 'cnfDeleteDetail') {
			$isGuest = $this->common->getRowData('guest_member', 'id', $post['id']);
			if ($isGuest) {
				$deltResult = $this->common->del_data_multi_con('guest_member', array('id' => $post['id']));
				if ($deltResult) {
					$return = array(
						'msg' => '<i class="fa-regular fa-circle-check"></i> Data deletion completed.<br> <span style="font-weight:900;">' . $isGuest->name . ' (ID #' . $isGuest->guest_id . ') </span>  has been removed.',
						'action' => 'success',
						'tClor' => '#008038'
					);
				} else {
					$return = array(
						'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Deletion failed for  <span style="font-weight:900;">' . $isGuest->name . ' (ID #' . $isGuest->guest_id . ') </span>.<br> Please check the details and try again.',
						'action' => 'errorShw',
						'tClor' => '#db3704'
					);
				}
			} else {
				$return = array('msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704');
			}
		}
		sleep(1);
		echo json_encode($return);
	}


	public function accPermision()
	{
		$post = $this->input->post();
		$return = '';
		if ($post['oprType'] == 'viewDelete') {
			$isMember = $this->common->getRowData('manage_member', 'id', $post['id']);
			if ($isMember) {
				$return = array('msg' => '<i class="fa-solid fa-circle-exclamation"></i> Do you wish to delete <span style="font-weight:900;">' . $isMember->name . ' (ID #' . $isMember->member_id . ') </span> ?.', 'action' => 'cnfDeleteDetail===administrator/member/accPermision===' . $isMember->id, 'tClor' => '#db3704');
			} else {
				$return = array('msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704');
			}
		} else if ($post['oprType'] == 'cnfDeleteDetail') {
			$isMember = $this->common->getRowData('manage_member', 'id', $post['id']);
			if ($isMember) {
				$deltResult = $this->common->del_data_multi_con('manage_member', array('id' => $post['id']));
				if ($deltResult) {
					$return = array(
						'msg' => '<i class="fa-regular fa-circle-check"></i> Data deletion completed.<br> <span style="font-weight:900;">' . $isMember->name . ' (ID #' . $isMember->member_id . ') </span>  has been removed.',
						'action' => 'success',
						'tClor' => '#008038'
					);
				} else {
					$return = array(
						'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Deletion failed for  <span style="font-weight:900;">' . $isMember->name . ' (ID #' . $isMember->member_id . ') </span>.<br> Please check the details and try again.',
						'action' => 'errorShw',
						'tClor' => '#db3704'
					);
				}
			} else {
				$return = array('msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704');
			}
		}
		sleep(1);
		echo json_encode($return);
	}
	public function idCard($id)
	{
		$getIDCardDetails = $this->common->getRowData('manage_member', 'id', $id);
		$data['getIDCardDetails'] = $getIDCardDetails;

		$data['title'] = 'Member Id Card';
		$this->load->view('member/i_card_download', $data);
	}
	public function certificate($id)
	{
		$getIDCardDetails = $this->common->getRowData('manage_member', 'id', $id);
		$data['getIDCardDetails'] = $getIDCardDetails;
		$data['title'] = 'Member Certificate';
		$this->load->view('member/certificate', $data);
	}



	public function manStatus(){
		$where=array('tblName'=>'manage_member','actnUrl'=>'miStatusChange===administrator/member/manStatus===');
		$this->manageStatus($where);
	}


	public function manageStatus($where){
	$post=$this->input->post();
	if($post['oprType']=='miStatusView')
	{$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
	 if($getData){
	 if($getData->status == 'Active'){	
	 $msg=array(
	 'msg'=>'<i class="fa fa-power-off"></i> Are you sure want to deactivate '.$getData->name.' of ID #'.$getData->id,
	 'action'=>$where['actnUrl'].$getData->id);
	 }else{
	 $msg=array(
	'msg'=>'<i class="fa fa-power-off"></i> Are you sure want to activate '.$getData->name.' of ID #'.$getData->id,
	'action'=>$where['actnUrl'].$getData->id)
	;}}else{
	$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
	}echo json_encode($msg);}
	elseif($post['oprType']=='miStatusChange')
	{sleep(2);
	$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
	if($getData->status == 'Active'){
	$change='Block';$msg=array('msg'=>'<span class="text-success"><i class="fa fa-check-circle"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
	}else{
	$change='Active';$msg=array('msg'=>'<i class="fa fa-check-circle text-success"></i><span class="text-success"> You have successfully activate '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
	$changeArr=array('status'=>$change);
	$result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
	if ($result) {
		$msg = $msg;
		$msg['reloadPage'] = base_url('administrator/member/manage'); 
	} else {
		$msg = array('msg' => '<span class="text-danger">Oops, it seems something went wrong while updating.</span>');
	}
	echo json_encode($msg); 
	}
	}



}
