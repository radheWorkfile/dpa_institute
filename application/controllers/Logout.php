<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller
{
	 public function __construct()
	{
		parent::__construct();
		error_reporting(0);
	 }
	  public function index()
	  {
	  	 
          $this->session->sess_destroy();
 		  $data=array('title'=>'Login Panel');
          $this->load->view('auth/login', $data);
######		 $session_array=array('_USER_AGENT'=>'','_USER_ACCEPT'=>'','_USER_ACCEPT_ENCODING'=>'','_USER_ACCEPT_LANG'=>'','_USER_LOOSE_IP'=>'',
######							  'REPO_SESSION'=>false,'SESSION_START_TIME'=>'','_USER_LAST_ACTIVITY'=>'','user_id'=>'','name'=>'',
######							  'memCode'=>'','email'=>'','user_cate'=>'','photo'=>'','company_name'=>'','company_address'=>'','company_url'=>'',
######							  'system_session_timeout'=>'','system_inactive_timeout'=>'','system_max_filesize'=>'',
######							  'system_allowed_file_types'=>'','system_error_reporting'=>'','is_logged_in' => false);
######		$this->session->unset_userdata($session_array);
######		redirect(base_url());
    
	    }
	  public function user()
	  {
          $this->session->sess_destroy();
 		  $data=array('title'=>'Login Panel');
          $this->load->view('auth/login', $data);
	    }						
}
