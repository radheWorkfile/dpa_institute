<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('member_id') == '') ? redirect(base_url(), 'refresh') : ''; //$this->session->userdata('user_id') != '')
        $this->logID = $this->session->userdata['member_id'];
        error_reporting(0);
    }
  


    public function index()
    {
        $sessionData = $this->session->userdata();
        $guestData = $this->db->select("*")->from("guest_member")->where('guest_id', $sessionData['member_id'])->get()->row_array();
        $data = array_merge($sessionData, $guestData, [
            'title' => 'Dashboard',
            'breadcrums' => 'Dashboard Member',
            'MemberDet' => $guestData,
            'guest' => 'Yes',
        ]);
        $this->load->view('base_member', $data);
    }

    public function id_card_download()
    {
        $this->load->view('front/id_card_download');
    }

    public function LogedMemDonation()  
	{    
		$uploaded_image = $this->upload_image('donation', 'reciept_Img');
		if($uploaded_image['icon'] === 'success') {

        $last_don_id = $this->db->select('donation_id')->from('donate')->order_by('id', 'DESC')->limit(1)->get()->row_array();
        $new_don_id = empty($last_don_id) ? 'DAMO1001' : 'DAMO' . str_pad((int) substr($last_don_id['donation_id'], 4) + 1, 4, '0');

        $value = $this->input->post();            
		$item = array(
		'image'                 => 	$uploaded_image['text'],         
		'name'                  => 	$this->input->post('name'), 
		'donation_id'           => 	$new_don_id, 
		'f_name'                => 	$this->input->post('f_name'), 
		'mobile_no'             => 	$this->input->post('mobile_no'), 
		'email' 	            => 	$this->input->post('email'), 
		'subject'               =>  $this->input->post('subject'), 
		'amount'                =>  $this->input->post('donAmount'),
		'address'               =>  $this->input->post('address'), 
		'message'               =>  $this->input->post('message'),
		'create_user_type_id'   => 	$this->input->post('logMemId'), 
		);
      
		if ( $this->db->insert('donate', $item) ) {

        $donationId = $this->db->select('email_id')->from('manage_member')->where('email_id', $this->input->post('email'))->get()->row();

		if (empty($donationId)) {
			$getID = rand(100000, 99999) . rand(100000, 99999);
			$beAguest = array(
				'guest_id'                    => $getID,
				'name'                        => $value['name'],
				'email_id'                    => $value['email'],
				'mobile_number'               => $value['mobile_no'],
				'father_name'                 => $value['f_name'],
				'password'                    => md5($value['mobile_no']),
				'show_password'               => $value['mobile_no'],
				'create_user_type_id'         => $value['logMemId'],
				'create_date'                 => date('Y-m-d'),
			);
			$this->common->save_data('guest_member', $beAguest);
		}

		echo json_encode(array('status' => 'success', 'message' => 'Created successfully!'));
		return;
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
     
    

  
}
