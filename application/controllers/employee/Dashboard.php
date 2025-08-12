<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
        $this->logID = $this->session->userdata['user_id'];
        error_reporting(0);
    }

    public function index(){	
    $sessionData = $this->session->userdata('user_id');

    $donation_amount = $this->db->select_sum('amount')->from('donate')->where(array('create_user_type_id' => $sessionData, 'status' => 1 ))->get()->row(); 
    
    $volunteer = $this->db->select('id')->from('cms_volunteer')->where('created_by_user_type_id', $sessionData )->get()->result_array(); 
    
    $event = $this->db->select('id')->from('cms_event')->where('created_user_type_id', $sessionData )->get()->result_array(); 

    $kyc_update = $this->db->select('kyc_status')->from('cordinator_manage')->where(array('id'=>$sessionData))->get()->row();

    $fiveEmployee = $this->db->select('first_name,last_name,')->from('cordinator_manage')->where('status','Active')->order_by('id',5)->get()->result_array();
    
    $assignProject = $this->db->select('id')->from('work_running')->where(array('emp_id' => $sessionData, 'status' => 1, 'working_status' => 1 ))->get()->result_array();
    $runningProject = $this->db->select('id')->from('work_running')->where(array('emp_id' => $sessionData, 'status' => 1, 'working_status' => 2 ))->get()->result_array();

    $countAssignPro = count($assignProject);
    $countRunnPro = count($runningProject);
    $countVolunteer = count($volunteer);
    $countEvent = count($event);
     
	$return=array(
     'title'=>'Dashboard',
     'breadcrums'=>'Dashboard Administrator',
     'donation_amount' => $donation_amount, 
     'countVolunteer' => $countVolunteer, 
     'countEvent' => $countEvent, 
     'fiveEmployee' => $fiveEmployee, 
     'kyc_update' => $kyc_update,
     'countAssignPro' => $countAssignPro, 
     'countRunnPro' => $countRunnPro, 
    );
	 $this->load->view('employee/base',$return);

	}

   

     
    

  
}
