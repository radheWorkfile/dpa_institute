<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
        $this->logID = $this->session->userdata['user_id'];
        error_reporting(0);
    }


	public function manage()   
    {
		$value = $this->session->userdata('user_id');
        $data = $this->db->select('*')->from('cordinator_manage')->where('id',$value)->get()->row();
        $return = array(
            'title' => 'Admin Panel',
            'isMember' => $data,
            'createAction' => base_url('employee/profile/update_profile/'),
            'layout' => 'profile.php',
            );
        $this->load->view('employee/base', $return);
    }

	public function update_profile()
    {
        $this->form_validation->set_rules('frstName', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|xss_clean|valid_email|is_unique[staff.email]');
        $this->form_validation->set_rules('mobileNu', 'Mobile No.', 'trim|required|xss_clean|numeric|max_length[10]');
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post();
            $insertArr = array(
                'first_name' => $post['frstName'],
                'email_id' => $post['email_id'],
                'mobile_number' => $post['mobileNu'],
                'password' => md5($post['password']),
                'show_password' => $post['password'],
                'address' => $post['membrAddr'],
                'created_date' => date('Y-m-d'),
            );
            if ($this->common->update_data('cordinator_manage', array('id' => $post['id']), $insertArr)) {
                $msg = array(' Thank You! you have successfully update details');
                $data = array('addClas' => 'tSuccess', 'msg' => $msg, 'icon' => '<i class="fa-regular fa-circle-check"></i>', 'returnLoc' => base_url('employee/dashboard/' . $empLoc));
            } else {
                $msg = array('Oops it seems error.please refresh you page.');
                $data = array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }
        } else {
            $msg = array( 
                'frstName' => form_error('frstName'),
                 'email_id' => form_error('email_id'), 
                 'mobileNu' => form_error('mobileNu'), 
            );
            $data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="pe-7s-sun bx-spin"></i>');
        }
        echo json_encode($data); 
    }


	public function index()
	{
		$getProDetails = $this->common->getRowData('manage_member', 'id', $this->logID);

		$job_sector = $this->common->getDataList('job_sector', array('status' => 'Active'), '*');
		$state = $this->common->getDataListByOrder('states_cities', array('parent_id' => '729'), '*', 'state_cities');

		$district = $this->common->getDataListByOrder('states_cities', array('parent_id' => $getProDetails->state_id), '*', 'state_cities');
		$industries = $this->common->getDataListByOrder('job_industry', array('sector_id' => $getProDetails->job_section), '*', 'industry_name');

		$getBusiness = $this->common->getDataList('member_business', array('status' => 'Active'), '*');
		$return = array(
			'title' => 'Profile',
			'breadcrums' => 'Profile',
			'layout' => 'member/profile.php',
			'state' => $state,
			'district' => $district,
			'findDetails' => base_url('site/finDetails'),
			'getProDetails' => $getProDetails,
			'job_sector' => $job_sector,
			'industries' => $industries,
			'getBusiness' => $getBusiness,
			'profileUpgrade' => base_url('member/profile/upgrade')
		);
		$this->load->view('base_member', $return);
	}
	public function upgrade()
	{
		$this->form_validation->set_rules('father_name', "Father's name", 'trim|required|xss_clean');
		$this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mobile', 'Mobile number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sector', 'Working sector', 'trim|required|xss_clean');
		$this->form_validation->set_rules('industries', 'Working industry', 'trim|required|xss_clean');
		$this->form_validation->set_rules('registration_address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('district', 'District', 'trim|required|xss_clean');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|xss_clean');


		if ($this->form_validation->run() == TRUE) {
			$post = $this->input->post();
			print_r($post);
		} else {
			$msg = array(
				'father_name' => form_error('father_name'),
				'dob' => form_error('dob'),
				'mobile' => form_error('mobile'),
				'email' => form_error('email'),
				'sector' => form_error('sector'),
				'industries' => form_error('industries'),
				'registration_address' => form_error('registration_address'),
				'state' => form_error('state'),
				'district' => form_error('district'),
				'zipcode' => form_error('zipcode')
			);
			$return = array('adClass' => 'tDanger', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
		}
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
	public function change_password($id)
	{
		$getIDCardDetails = $this->common->getRowData('manage_member', 'id', $id);
		$data['getIDCardDetails'] = $getIDCardDetails;
		$data['title'] = 'Change Password';
		$data['layout'] = 'member/change_password.php';
		$this->load->view('base_member', $data);
	}
	public function reset_password()
	{    
		$data = $this->input->post();
		if ($data['new_password'] == $data['confirm_password']) 
		{
			$mem_details = $this->common->getRowData('manage_member', 'id', $data['mem_id']);
           	if ($mem_details->show_password == $data['old_password']){
            $value = array('show_password' => $data['new_password'],'password' => md5($data['new_password']),);
			$this->db->where('id', $data['mem_id']);
			$update_pass = $this->db->update('manage_member', $value);
			if ($update_pass) {echo json_encode(['status' => 'success', 'message' => 'Password updated successfully']);
			} else {echo json_encode(['status' => 'error', 'message' => 'Failed to update password']);
			}}else{echo json_encode(['status' => 'error', 'message' => 'Old password is incorrect']);
			}}else{echo json_encode(['status' => 'error', 'message' => 'New password and confirm password do not match']);
		}}

	 



}
