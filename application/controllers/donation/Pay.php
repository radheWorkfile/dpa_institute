        <?php
        defined('BASEPATH') or exit('No direct script access allowed');       
        class Pay extends CI_Controller       
        {
        public function __construct()
        {
        parent::__construct();
        $this->load->model(array('donation/Donation_model' => 'donate_model'));
        error_reporting(0);
        }


        public function index($action = null){
        if($action === 'donate_now'){
        $user_id = $this->session->userdata('user_id');
        $last_don_id = $this->db->select('donation_id')->from('donate')->order_by('id', 'DESC')->limit(1)->get()->row_array();
        $new_don_id = empty($last_don_id) ? 'DAMO1001' : 'DAMO' . str_pad((int) substr($last_don_id['donation_id'], 4) + 1, 4, '0');

        $uploaded_image = $this->upload_image('donation', 'previewImage');
                if ($uploaded_image['icon'] === 'success') {
                $item = array(
                    'image'                => $uploaded_image['text'],
                    'donation_id'          => $new_don_id, 
                    'name'                 => $this->input->post('name'),
                    'f_name'               => $this->input->post('f_name'),
                    'mobile_no'            => $this->input->post('mobile'),
                    'email'                => $this->input->post('email'),
                    'address'              => $this->input->post('address'),
                    'amount'               => $this->input->post('amount'),
                    'message'              => $this->input->post('text'),
                    'create_user_type_id'  => 1001,
                    'status'               => 2,
                    'created_at'           => date('Y-m-d'),
                  );

                if ($this->db->insert('donate', $item)) {

                $donationId = $this->db->select('email_id')->from('manage_member')->where('email_id', $this->input->post('email'))->get()->row();

                if (empty($donationId)) {
                        $getID = rand(100000, 99999) . rand(100000, 99999);
                        $beAguest = array(
                        'guest_id'                     => $getID,
		   	'name'                         =>  $this->input->post('name'),
		   	'email_id'                     =>  $this->input->post('email'),
		   	'mobile_number'                =>  $this->input->post('mobile'),
		   	'father_name'                  =>  $this->input->post('f_name'),
		   	'address'                      =>  $this->input->post('address'),
		   	'password'                     =>  md5( $this->input->post('mobile')),
		   	'show_password'                =>  $this->input->post('mobile'),
		   	'created_by_user_type_id'      => '1001',
		   	'create_date'                  => date('Y-m-d H:i:s'),
		   );
		   $this->common->save_data('guest_member', $beAguest);
		}

                $msg=array('Thank you! Your donation was successfully completed.');
                $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i> ',
                'returnLoc'=>base_url('donation/donatePay'));
                } else {
                $msg=array('Oops it seems error.please refresh you page.');
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                }
                } else {
                $msg=array($uploaded_image['text']);
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                } 
                echo json_encode($return);
                }else{
                $return = array(
                'title'      => 'Add Donation',
                'breadcrums' => 'Manage Donation',
                'layout'     => 'donation/add_donation.php',
                // 'targetDonationList' => base_url('donation/donatePay/index/showDonationList')
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


        




}