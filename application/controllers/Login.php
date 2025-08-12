<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->library('user_agent');
		$this->target=base_url('login/reset_password');
        error_reporting(0);
    }
    public function index()
    {
        $user_cate = $this->session->userdata('user_cate'); 
        if ($user_cate == 1) {
            redirect('' . base_url() . 'super_admin/dashboard', 'refresh');
        } else
		{
            // redirect(base_url('logout/user'));
			$data=array('title'=>'Login Panel');
			$this->load->view('auth/login',$data);
        }
    }


  public function auth()
  {
        $this->form_validation->set_rules('email_id', 'E-mail Address', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            $result =  $this->login_model->can_login($data['email_id'], $data['password']);
			/*print_r($result);
           	exit;*/
		    $count =  count($result);
		    if ($count === 1) {
		    if($result[0]['status']=='1')
		    {
                $system_configs =   $this->login_model->system_config();
                $this->setUserLog($result[0]['email'], $result[0]['department_type']);
                $sessiondata = array(
                    '_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                    '_USER_ACCEPT' => $_SERVER['HTTP_ACCEPT'],
                    '_USER_ACCEPT_ENCODING' => $_SERVER['HTTP_ACCEPT_ENCODING'],
                    '_USER_ACCEPT_LANG' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
                    '_USER_LOOSE_IP' => long2ip(ip2long($_SERVER['REMOTE_ADDR']) & ip2long("255.255.0.0")),
                    'REPO_SESSION' => TRUE,
                    'SESSION_START_TIME' => time(),
                    '_USER_LAST_ACTIVITY' => time(),
                    'user_id' => $result[0]['id'],
                    'name' => $result[0]['name'],
					'memCode'=> $result[0]['employee_id'],
                    'email' => $result[0]['email'],
                    'user_cate' => $result[0]['user_type'],
					'memberType' => $result[0]['memberType'],
                    'photo' => $result[0]['photo'],
                    'company_name' => $system_configs[0]['company_name'],
                    'company_address' => $system_configs[0]['company_address'],
                    'company_url' => $system_configs[0]['company_url'],
                    'system_session_timeout' => $system_configs[0]['session_timeout'],
                    'system_inactive_timeout' => $system_configs[0]['inactive_timeout'],
                    'system_max_filesize' => $system_configs[0]['max_file_size'],
                    'system_allowed_file_types' => $system_configs[0]['allowed_file_types'],
                    'system_error_reporting' => $system_configs[0]['error_reporting'],
                    'is_logged_in' => true
                );
                $this->session->set_userdata($sessiondata);
                if ($sessiondata['user_id'] != ''&& ($sessiondata['memberType'] == 'superadmin')) {// && ($sessiondata['user_cate'] == 1)
                    redirect('' . base_url() . 'administrator/dashboard', 'refresh');// 
                } elseif ($sessiondata['user_id'] != '' && ($sessiondata['memberType'] == "employee")) {
                    redirect('' . base_url() . 'employee/dashboard', 'refresh');
                }/* elseif ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 3)) {
                    redirect('' . base_url() . 'kata/dashboard', 'refresh');
                } elseif ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 4)) {
                    redirect('' . base_url() . 'accountant/dashboard', 'refresh');
                } */else {
                    redirect(base_url() . 'login?msg=invalid');
                }
			}
			else
			{redirect(base_url() . 'login?msg=impassable');}	
			}  
            else {
                redirect(base_url() . 'login?msg=invalid');
            }
        } 
		else
		{
			$this->index();
        }
    }
    public function setUserLog($username, $role)
    {
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }
        $data = array(
            'user' => $username,
            'role' => $role,
            'ipaddress' => $this->input->ip_address(),
            'user_agent' => $agent . ", " . $this->agent->platform(),
        );
        //echo"<pre>";print_r($data);die;
        $this->login_model->log_add($data);
    }
	public function reset_password()
	{
		$post=$this->input->post('usrEmail');
		if(!$post)
		{
			$data=array('result'=>'error','msg'=>'Please input valid email');
			
			}
		else 
		{
			$data=array('result'=>'success','msg'=>'Thank You! Your reset password link is sent to your mail id ');
			}
			sleep(5);
		 echo json_encode($data);
		//print_r($post);
		}
	
}
