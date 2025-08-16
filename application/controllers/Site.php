<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('custom');
		$this->load->model('login_model');
		$this->load->library('user_agent');
		$this->load->library('form_validation');
		error_reporting(0);
	}


	public function test_3()
	{
		$email = $this->input->post('email');
		if (!empty($email)) {
			$memberData = $this->db->select('name,father_name,address,mobile_number')->where('email_id', $email)->get('manage_member')->row();
			if ($memberData) {
				$data = array(
					'mobile_number' => $memberData->mobile_number,
					'name' => $memberData->name,
					'father_name' => $memberData->father_name,
					'address' => $memberData->address
				);
			}
		}
		echo json_encode($data);
	}




	public function index()
	{
		$data['bannerList'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_slider')->result_array();
		$data['newsList'] = $this->db->select('*')->where(array('id' => '1', 'status' => 1))->order_by('id', 'ASC')->get('cms_news')->row_array();
		$data['eventList'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_event')->result_array();
		$data['teamMem'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_team')->result_array();
		$this->load->view('website/Home', $data);
	}
	public function test()
	{
		$data['custom_setting'] = $this->db->select('*')->get('setting')->row();
	}


	public function login($getAction = NULL)
	{
		if ($getAction == 'process') {
			$this->form_validation->set_rules('login_id', 'Login id', 'trim|required|xss_clean');
			$this->form_validation->set_rules('loginPassword', "Password", 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE) {
				$post = $this->input->post();
				$result = $this->login_model->member_login($post['login_id'], $post['loginPassword']);
				if ($result) {
					if ($result->status == 'Active') {
						$system_configs = $this->login_model->system_config();
						$this->setUserLog($result->email_id, 'member');
						$sessiondata = array(
							'_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
							'_USER_ACCEPT' => $_SERVER['HTTP_ACCEPT'],
							'_USER_ACCEPT_ENCODING' => $_SERVER['HTTP_ACCEPT_ENCODING'],
							'_USER_ACCEPT_LANG' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
							'_USER_LOOSE_IP' => long2ip(ip2long($_SERVER['REMOTE_ADDR']) & ip2long("255.255.0.0")),
							'REPO_SESSION' => TRUE,
							'SESSION_START_TIME' => time(),
							'_USER_LAST_ACTIVITY' => time(),
							'mem_id' => $result->id,
							'mem_name' => $result->name,
							'memCode' => $result->member_id,
							'mem_email' => $result->email_id,
							'mobile_number' => $result->mobile_number,
							'address' => $result->address,
							'busi_profile_name' => $result->busi_profile_name,
							'photo' => $result->profile_image,
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
						if ($sessiondata['mem_id'] != '') { // && ($sessiondata['user_cate'] == 1)
							//redirect(base_url('administrator/dashboard'), 'refresh');
							$data = array('adClass' => 'softArena', 'targetLog' => base_url('member/dashboard'));
						} /*elseif ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 2)) {
							redirect('' . base_url() . 'entry/entry', 'refresh');
						} elseif ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 3)) {
							redirect('' . base_url() . 'kata/dashboard', 'refresh');
						} elseif ($sessiondata['user_id'] != '' && ($sessiondata['user_cate'] == 4)) {
							redirect('' . base_url() . 'accountant/dashboard', 'refresh');
						} */ else {
							//redirect(base_url('site/login?msg=invalid'));
							$data = array('adClass' => 'softArena', 'targetLog' => base_url('site/login?msg=invalid'));
						}
					} else if ($result->status == 'guest') {
						$system_configs = $this->login_model->system_config();
						$this->setUserLog($result->email_id, 'member');
						$sessiondata = array(
							'_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
							'_USER_ACCEPT' => $_SERVER['HTTP_ACCEPT'],
							'_USER_ACCEPT_ENCODING' => $_SERVER['HTTP_ACCEPT_ENCODING'],
							'_USER_ACCEPT_LANG' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
							'_USER_LOOSE_IP' => long2ip(ip2long($_SERVER['REMOTE_ADDR']) & ip2long("255.255.0.0")),
							'REPO_SESSION' => TRUE,
							'SESSION_START_TIME' => time(),
							'_USER_LAST_ACTIVITY' => time(),
							'id' => $result->id,
							'name' => $result->name,
							'member_id' => $result->member_id,
							'email_id' => $result->email_id,
							'status' => $result->mobile_number,
							'photo' => $result->profile_image,
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
						// member_id
						$this->session->set_userdata($sessiondata);
						if ($sessiondata['member_id'] != '') {
							$data = array('adClass' => 'softArena', 'targetLog' => base_url('guest/dashboard'));
						} else {
							$data = array('adClass' => 'softArena', 'targetLog' => base_url('site/login?msg=invalid'));
						}
					} else {
						//redirect(base_url('site/login?msg=impassable'));
						$data = array('adClass' => 'softArena', 'targetLog' => base_url('site/login?msg=impassable'));
					}
				} else {
					//redirect(base_url('site/login?msg=invalid'));
					$data = array('adClass' => 'softArena', 'targetLog' => base_url('site/login?msg=invalid'));
				}
			} else {
				$msg = array('login_id' => form_error('login_id'), 'loginPassword' => form_error('loginPassword'));
				$data = array('adClass' => 'tDanger', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
			}
			echo json_encode($data);
		} else {
			$data = array('targetLogin' => base_url('site/login/process'));
			$this->load->view('website/signin', $data);
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		$data = array('title' => 'Login Panel', 'targetLogin' => base_url('site/login/process'));
		$this->load->view('website/signin', $data);
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
		$this->login_model->log_add($data);
	}

	public function about()
	{
		$this->load->view('website/about');
	}

	public function c()
	{
		$this->load->view('website/course_c');
	}
	public function c_plus()
	{
		$this->load->view('website/course_c_plus');
	}
	public function java()
	{
		$this->load->view('website/course_java');
	}
	public function python()
	{
		$this->load->view('website/course_python');
	}
	public function course_html()
	{
		$this->load->view('website/course_html');
	}
	public function css()
	{
		$this->load->view('website/course_css');
	}
	public function javascript()
	{
		$this->load->view('website/course_javascript');
	}
	public function sql()
	{
		$this->load->view('website/course_sql');
	}

	public function web_development()
	{
		$this->load->view('website/course_web_development');
	}
	public function software_development()
	{
		$this->load->view('website/course_software_dev');
	}
	public function full_stack_development()
	{
		$this->load->view('website/course_full_stack_dev');
	}
	public function app_development()
	{
		$this->load->view('website/course_app_dev');
	}
	public function digital_marketing()
	{
		$this->load->view('website/course_digital_mar');
	}

	public function annual_report()
	{
		$this->load->view('website/annual_report');
	}
	public function people_behind()
	{
		$this->load->view('website/people_behind');
	}
	public function presense()
	{
		$this->load->view('website/presense');
	}
	public function health()
	{
		$this->load->view('website/health');
	}
	public function education()
	{
		$this->load->view('website/education');
	}
	public function environment()
	{
		$this->load->view('website/environment');
	}
	public function Women()
	{
		$this->load->view('website/Women_empowerment');
	}
	public function child()
	{
		$this->load->view('website/child');
	}
	public function impact()
	{
		$this->load->view('website/impact');
	}

	public function projectComplete()
	{
		$data['projectData'] = $this->db->select('project_name,description,project_img,location')->from('category_project')->where('status', 1)->order_by('id', 'DICS')->get()->result_array();
		$this->load->view('website/project-complete', $data);
	}
	public function media()
	{
		$data['galleryItem'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_gallery')->result_array();
		$this->load->view('website/media', $data);
	}
	public function forget()
	{
		$this->load->view('website/forget');
	}
	public function team()
	{
		$data['teamMem'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_team')->result_array();
		$this->load->view('website/team', $data);
	}
	public function event()
	{
		$data['eventList'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_event')->result_array();
		$this->load->view('website/event', $data);
	}
	public function our_volunteer()
	{
		$data['volunteer'] = $this->db->select('*')->from('cms_volunteer')->where('status', 1)->get()->result_array();
		$this->load->view('website/our_volunter', $data);
	}
	public function get_opportunity()
	{
		$this->load->view('website/get_opportunity');
	}
	public function donarList()
	{
		$data['doListMan'] = $this->db->select('*')->order_by('id', 'DESC')->limit(6)->get('donate')->result_array();
		$this->load->view('website/donar_list', $data);
	}
	public function upcoming_event()
	{
		$this->load->view('website/event');
	}

	public function contact()
	{
		$data['custom_setting'] = $this->db->select('*')->get('setting')->row();
		$this->load->view('website/contact', $data);
	}
	public function chapters()
	{
		$this->load->view('website/chapters');
	}
	public function startup()
	{
		$this->load->view('website/startup');
	}
	public function donate()
	{
		$this->load->view('website/donate');
	}

	public function member_login()
	{
		$this->load->view('website/member_login');
	}



	public function donation()
	{

		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|xss_clean|valid_email|is_unique[donate.email]');

		if ($this->form_validation->run() == TRUE) {

		$last_don_id = $this->db->select('donation_id')->from('donate')->order_by('id', 'DESC')->limit(1)->get()->row_array();
		$new_don_id = empty($last_don_id) ? 'DAMO1001' : 'DAMO' . str_pad((int) substr($last_don_id['donation_id'], 4) + 1, 4, '0');

		$uploaded_image = $this->upload_image('donation', 'payment_img');

			if ($uploaded_image['icon'] === 'success') {
				$value = $this->input->post();
				$item = array(
					'image'         => $uploaded_image['text'],
					'name'          => $value['name'],
					'donation_id'   => $new_don_id,
					'f_name'        => $value['f_name'],
					'mobile_no'     => $value['mobile'],
					'email'         => $value['email'],
					'amount'        => $value['amount'],
					'address'       => $value['address'],
					'message'       => $value['message'],
					'created_at'    => date('Y-m-d'),
					'create_user_type_id' => '100',
					'status'        => 2,
				);

				if ($this->common->save_data('donate', $item)) {

					$donationId = $this->db->select('email_id')->from('manage_member')->where('email_id', $value['email'])->get()->row();

					if (empty($donationId)) {
						$getID = rand(100000, 99999) . rand(100000, 99999);
						$beAguest = array(
							'guest_id'                    => $getID,
							'name'                         => $value['name'],
							'email_id'                     => $value['email'],
							'mobile_number'                => $value['mobile'],
							'father_name'                  => $value['f_name'],
							'address'                      => $value['address'],
							'password'                     => md5($value['mobile']),
							'show_password'                => $value['mobile'],
							'created_by_user_type_id'      => '100',
							'create_date'                  => date('Y-m-d H:i:s'),
						);
						$this->common->save_data('guest_member', $beAguest);
					}

					$data = donatePaymentMess($value['name'], $value['f_name'], $value['mobile_no'], $value['email'], $value['amount']);
					$data = array('status' => 'success', 'message' => 'Created successfully!', 'data' => $data);
				} else {
					$data = array('status' => 'error', 'message' => 'Please try again later.');
					echo json_encode($data);
					return;
				}
			} else {
				$data = array('status' => 'error', 'message' => $uploaded_image['text']);
				echo json_encode($data);
				return;
			}
		} else {
			$msg = array(
				'email' => form_error('email'),
			);

			$data = array(
				'adClass' => 'tDanger',
				'msg'     => $msg,
				'icon'    => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
			);
		}
		echo json_encode($data);
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

	public function sign_up()
	{
		$job_sector = $this->common->getDataList('job_sector', array('status' => 'Active'), '*');
		$state = $this->common->getDataListByOrder('states_cities', array('parent_id' => '729'), '*', 'state_cities');
		$getBusiness = $this->common->getDataList('member_business', array('status' => 'Active'), '*');
		$data = array('state' => $state, 'findDetails' => base_url('site/finDetails'), 'job_sector' => $job_sector, 'getBusiness' => $getBusiness, 'newRegisteration' => base_url('site/register'));
		$this->load->view('website/signup', $data);
	}
	public function finDetails()
	{

		$post = $this->input->post();
		if ($post['actionBase'] == 'state') {
			$getCity = $this->common->getDataListByOrder('states_cities', array('parent_id' => $post['id']), '*', 'state_cities');
			sleep(1);
			echo '<option value=" "> Choose one </option>';
			if ($getCity) {
				foreach ($getCity as $list) {
					echo '<option value="' . $list->id . '">' . $list->state_cities . '</option>';
				}
			}
		} else if ($post['actionBase'] == 'sector') {
			$getIndustry = $this->common->getDataList('job_industry', array('sector_id' => $post['id']), '*');
			sleep(1);
			echo '<option value=" "> Choose one </option>';
			if ($getIndustry) {
				foreach ($getIndustry as $list) {
					echo '<option value="' . $list->id . '">' . $list->industry_name . '</option>';
				}
			}
		}
	}




	public function register() 
	{

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|xss_clean|valid_email|is_unique[manage_member.email]');
		$this->form_validation->set_rules('phone', 'Mobile number', 'trim|required|xss_clean|numeric|max_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == TRUE) {
			$value = $this->input->post();
			$getID = rand(100000, 99999) . rand(100000, 99999);
			$insertArr = array(
				'guest_id' => $getID,
				'name' => $value['name'],
				'email_id' => $value['email'],
				'mobile_number' => $value['phone'],
				'password' => md5($value['password']),
				'show_password' => $value['password'],
				'create_date' => date('Y-m-d H:i:s'),
			);
			if ($this->common->save_data('guest_member', $insertArr)) {

				$getSuccMess = $this->RegSuccessMess($value['name'],$value['phone'],$value['email'],$value['password']);
				$msg = array('Thank you! Your registration successfully completed.');
				$data = array('getSuccMess' => $getSuccMess, 'adClass' => 'tSuccess', 'msg' => $msg, 'icon' => '<i class="fa-regular fa-circle-check"></i>','targetLoc'=>base_url('site/sign_up'));

			} else {
				$msg = array('Oops it seems error.please refresh you page.');
				$data = array('adClass' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
			}
		} else {
			$msg = array(
				'name' => form_error('name'),
				'phone' => form_error('phone'),
				'email' => form_error('email'),
				'password' => form_error('password'),
			);
			$data = array('adClass' => 'tDanger', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
		}
		echo json_encode($data);
	}





	public function RegSuccessMess($userName, $userMobile, $userEmail, $userPassword)
	{

		$name = $userName;
		$email = $userEmail;
		$mobile = $userMobile;
		$message = $userPassword;

		$company_name = config_item('companyName');
		$support_email = config_item('email');
		$mobile_1 =  config_item('mobile_number_1');
		$mobile_2 = config_item('mobile_number_2');

		$to = config_item('email');
		$subject = "Enquiry From " . $company_name;

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "From: " . $company_name . " <" . $support_email . ">\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";

		$full_message = "
		<html>
		<head><title>Registration Successfully.</title></head>
		<body>
			<table>
				<tr><td>Name</td><td>: $name</td></tr>
				<tr><td>Email</td><td>: $email</td></tr>
				<tr><td>Mobile</td><td>: $mobile</td></tr>
				<tr><td>Message</td><td>: $message</td></tr>
			</table>
		</body></html>";

		$user_subject = "Thank You $name";
		$user_headers = "From: " . $support_email . "\r\n";
		$user_message = "Dear $name,\n\nThank you for registering with " . $company_name . ".\nWe have received your registration and will get back to you soon.\n\nBest regards,\n" . $company_name;
		if (mail($to, $subject, $full_message, $headers)) {
			mail($email, $user_subject, $user_message, $user_headers);

			$response = "
			<h3>Dear <span style='color:#e70780;'>$name</span>,</h3>
			<blockquote>
				<p>We have received your registration. We will contact you soon.<br/>
				For quick enquiries, <span style='color:#e70780;'>Call Us</span> at:
				<span><i class='fas fa-phone-alt px-2'></i>+91 " . $mobile_1 . " / " . $mobile_2 . "</span></p>
				<p>Thank You!</p>
			</blockquote>";
		} else {
			$response = "
			<h3>Dear <span style='color:#e70780;'>$name</span>,</h3>
			<blockquote>
				<p>Something went wrong. It seems like the internet is not working well.<br/>
				For quick enquiries, <span style='color:#e70780;'>Call Us</span> at:
				<span><i class='fas fa-phone-alt px-2'></i>+91 " . $mobile_1 . " / " . $mobile_2 . "</span></p>
				<p>Please try again!</p>
				<p>Thank You!</p>
			</blockquote>";
		}

		return $response;
	}






	public function formhandler()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$course = $this->input->post('course');
		$message = $this->input->post('message');

		$company_name = config_item('companyName');
		$support_email = config_item('email');
		$mobile_1 =  config_item('mobile_number_1');
		$mobile_2 = config_item('mobile_number_2');

		$to = config_item('email');
		$subject = "Enquiry From " . $company_name;

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "From: " . config_item('company_name') . " <" . $support_email . ">\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";

		$full_message = "
    <html>
    <head>
        <title>Enquiry Data</title>
    </head>
    <body>
        <table>
            <tr><td>Name</td><td>: $name</td></tr>
            <tr><td>Email</td><td>: $email</td></tr>
            <tr><td>Mobile</td><td>: $mobile</td></tr>
            <tr><td>Course</td><td>: $course</td></tr>
            <tr><td>Message</td><td>: $message</td></tr>
        </table>
    </body>
    </html>";

		$user_subject = "Thank You $name";
		$user_headers = "From: " . $support_email . "\r\n";
		$user_message = "Dear $name,\n\nThank you for contacting " . $company_name . ".\nWe have received your query and will get back to you soon.\n\nBest regards,\n" . $company_name;

		if (mail($to, $subject, $full_message, $headers)) {
			mail($email, $user_subject, $user_message, $user_headers);

			$response = "
        <h3>Dear <span style='color:#e70780;'>$name</span>,</h3>
        <blockquote>
            <p>We have received your query. We will contact you soon.<br/>
            For quick enquiries, <span style='color:#e70780;'>Call Us</span> at:
            <span><i class='fas fa-phone-alt px-2'></i>+91 " . $mobile_1 . " / " . $mobile_2 . "</span></p>
            <p>Thank You!</p>
        </blockquote>";
		} else {
			$response = "
        <h3>Dear <span style='color:#e70780;'>$name</span>,</h3>
        <blockquote>
            <p>Something went wrong. It seems like the internet is not working well.<br/>
            For quick enquiries, <span style='color:#e70780;'>Call Us</span> at:
            <span><i class='fas fa-phone-alt px-2'></i>+91 " . $mobile . "</span></p>
            <p>Please try again!</p>
            <p>Thank You!</p>
        </blockquote>";
		}
		$data['response'] = $response;
		$this->load->view('website/thanku', $data);
	}
}
