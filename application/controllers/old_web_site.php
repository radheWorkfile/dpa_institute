<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('user_agent');
		$this->load->library('form_validation');
		error_reporting(0);
	}

	public function index()
	{
		$data['bannerList'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_slider')->result_array();
		$data['newsList'] = $this->db->select('*')->where(array('id'=>'1','status' => 1))->order_by('id', 'ASC')->get('cms_news')->row_array();
		$data['eventList'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_event')->result_array();
		$data['teamMem'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_team')->result_array();
		$this->load->view('website/Home',$data);
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
			$this->load->view('front/dashboard');
		}
	}
	public function login1()
	{
		$this->load->view('website/signin');

	}
	public function forget()
	{
		$this->load->view('website/forget');

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
		//echo"<pre>";print_r($data);die;
		$this->login_model->log_add($data);
	}

	public function about1()
	{
		$this->load->view('front/about');
	}
	public function about()
	{
		$this->load->view('website/about');
	}
	public function projectComplete1()
	{
		$this->load->view('front/project-complete');
	}
	public function projectComplete()
	{
		$this->load->view('website/project-complete');
	}
	public function media1()
	{
		$data['galleryItem'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_gallery')->result_array();
		$this->load->view('front/media', $data);
	}
	public function media()
	{

		$this->load->view('website/media');
	}
	public function event1()
	{
		$data['eventList'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_event')->result_array();
		$this->load->view('front/event', $data);
	}
	public function event()
	{
		$this->load->view('website/event');
	}
	public function our_volunteer1()
	{
		$this->load->view('front/our_volunteer');
	}
	public function our_volunteer()
	{
		$this->load->view('website/our_volunter');
	}
	public function get_opportunity1()
	{
		$this->load->view('front/get_opportunity');
	}
	public function get_opportunity()
	{
		$this->load->view('website/get_opportunity');
	}
	public function upcoming_event()
	{
		$this->load->view('front/event');
	}
	public function team1()
	{
		$data['teamMem'] = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_team')->result_array();
		// echo "<pre>"; print_r($data['teamMem']);die;
		$this->load->view('front/our_team', $data);
	}
	public function team()
	{

		$this->load->view('website/team');
	}
	public function contact1()
	{
		$this->load->view('front/contact');
	}
	public function contact()
	{
		$this->load->view('website/contact');
	}
	public function chapters()
	{
		$this->load->view('front/chapters');
	}
	public function startup()
	{
		$this->load->view('front/startup');
	}
	public function donate1()
	{
		$this->load->view('front/donate');
	}
	public function donate()
	{
		$this->load->view('website/donate');
	}
	public function donarList1()
	{
		$data['doListMan'] = $this->db->select('*')->order_by('id', 'DESC')->limit(6)->get('donate')->result_array();
		$this->load->view('front/donar_list', $data);
	}
	public function donarList()
	{
		$data['doListMan'] = $this->db->select('*')->order_by('id', 'DESC')->limit(6)->get('donate')->result_array();
		$this->load->view('website/donar_list', $data);
	}




	public function member_login()
	{
		$this->load->view('front/member_login');
	}

	public function donation()
	{
		$donationId = $this->db->select('donation_id')->from('donate')->order_by('id', 'DESC')->limit(1)->get()->row();
		if (!empty($donationId)) {
			$donId = $donationId->donation_id + 1;
		} else {
			$donId = 1001;
		}
		$uploaded_image = $this->upload_image('donation', 'previewImage');
		if ($uploaded_image['icon'] === 'success') {
			$value = $this->input->post();
			$item = array(
				'image' => $uploaded_image['text'],
				'name' => $value['name'],
				'donation_id' => $donId,
				'f_name' => $value['f_name'],
				'mobile_no' => $value['mobile_no'],
				'email' => $value['email'],
				'subject' => $value['subject'],
				'amount' => $value['amount'],
				'address' => $value['address'],
				'message' => $value['message']
			);
			if ($this->db->insert('donate', $item)) {
				$data = $this->donatePaymentMess($value['name'], $value['f_name'], $value['mobile_no'], $value['email'], $value['amount']);
				echo json_encode(array('status' => 'success', 'message' => 'Created successfully!', 'data' => $data));
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'Please try again later.'));
				return;
			}
		} else {
			echo json_encode(array('status' => 'error', 'message' => $uploaded_image['text']));
			return;
		}
	}

	function upload_image($path, $name)
	{
		$config['upload_path'] = './uploads/' . $path;
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 2048;
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

	// Array ( [name] => Admin [email] => admin@g.com [mobile] => 8709732111 [password] => 1 ) 

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email id', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile number', 'trim|required|xss_clean|numeric|max_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == TRUE) {
			$value = $this->input->post();
			$getID = rand(100000, 99999) . rand(100000, 99999);
			$insertArr = array(
				'guest_id' => $getID,
				'name' => $value['name'],
				'email_id' => $value['email'],
				'mobile_number' => $value['mobile'],
				'password' => md5($value['password']),
				'show_password' => $value['password'],
				'create_date' => date('Y-m-d H:i:s'),
			);
			if ($this->common->save_data('guest_member', $insertArr)) {
				$msg = array('Thank you! Your registration successfully completed.');
				$data = array('adClass' => 'tSuccess', 'msg' => $msg, 'icon' => '<i class="fa-regular fa-circle-check"></i>', 'targetLoc' => base_url('site/sign_up'));
			} else {
				$msg = array('Oops it seems error.please refresh you page.');
				$data = array('adClass' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
			}
		} else {
			$msg = array(
				'name' => form_error('name'),
				'mobile' => form_error('mobile'),
				'email' => form_error('email'),
				'password' => form_error('password'),
			);
			$data = array('adClass' => 'tDanger', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
		}
		echo json_encode($data);
	}



	public function donatePaymentMess($userName, $fatName, $mobileNo, $emailId, $amount)
	{
		$name = $userName;
		$email = $emailId;
		$fatName = $fatName;
		$mobile = $mobileNo;
		$amount = $amount;

		$company_name = "Ngo";
		$support_email = "radhe.camwel@gmail.com";
		$mobile = "+91 8709732783";
		$mobile_2 = "+91 8709732783";

		$to = "NGO@example.com";
		$subject = "Enquiry From " . $company_name;

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "From: " . $company_name . " <" . $support_email . ">\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";

		$full_message = "
		<html>
		<head>
			<title>Enquiry Data</title>
		</head>
		<body>
			<table>
				<tr><td>Name :</td><td>: $name</td></tr>
				<tr><td>Email :</td><td>: $email</td></tr>
				<tr><td>Father Name :</td><td>: $fatName</td></tr>
				<tr><td>Mobile Number :</td><td>: $mobile</td></tr>
				<tr><td>donation Amount :</td><td>: $amount</td></tr>
			</table>
		</body>
		</html>";

		$user_subject = "Thank You $name";
		$user_headers = "From: " . $support_email . "\r\n";
		$user_message = "Dear $name,\n\nThank you for contacting " . $company_name . ".\nWe have received your query and will get back to you soon.\n\nBest regards,\n" . $company_name;

		if (mail($to, $subject, $full_message, $headers)) {
			mail($email, $user_subject, $user_message, $user_headers);

			$response = "
			<h3>Dear <span style='color:#e70780;'>$userName</span>,</h3>
			<blockquote>
			<p>Your donation of ₹$amount has been successfully received. We will be using this donation to further our mission of helping those in need.</p>
			<p>If you have any questions or need further assistance, please don't hesitate to reach out to us at <span><i class='fas fa-phone-alt px-2'></i>+91 $mobileNo</span> or via email at <a href='mailto:$emailId'>$emailId</a>.</p>
			<p>Thank you again for your generous contribution!</p>
			</blockquote>";
		} else {
			$response = "
			<h3>Dear <span style='color:#e70780;'>$userName</span>,</h3>
			<blockquote>
			<p>Something went wrong. It seems like we encountered an issue while processing your donation. Please try again later.</p>
			<p>If you need immediate assistance, you can reach us at <span><i class='fas fa-phone-alt px-2'></i>+91 $mobileNo</span> or via email at <a href='mailto:$emailId'>$emailId</a>.</p>
			<p>We apologize for the inconvenience and appreciate your patience!</p>
			</blockquote>";
		}
		$data['response'] = $response;
		return $response;
		//    $this->load->view('front/donate',$data);  

	}



	public function formhandler()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$message = $this->input->post('message');

		$company_name = "Ngo";
		$support_email = "radhekumar@gmail.com";
		$mobile = "+91 879711111";
		$mobile_2 = "+91 9999999999";

		$to = "NGO@example.com";
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
            <span><i class='fas fa-phone-alt px-2'></i>+91 " . $mobile . " / " . $mobile_2 . "</span></p>
            <p>Thank You!</p>
        </blockquote>";
		} else {
			$response = "
        <h3>Dear <span style='color:#e70780;'>$name</span>,</h3>
        <blockquote>
            <p>Something went wrong. It seems like the internet is not working well.<br/>
            For quick enquiries, <span style='color:#e70780;'>Call Us</span> at:
            <span><i class='fas fa-phone-alt px-2'></i>+91 " . $mobile . " / " . $mobile_2 . "</span></p>
            <p>Please try again!</p>
            <p>Thank You!</p>
        </blockquote>";
		}
		$data['response'] = $response;
		$this->load->view('front/thanku', $data);
	}


}
