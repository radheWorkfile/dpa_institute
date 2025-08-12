<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('mem_id') == '') ? redirect(base_url(), 'refresh') : ''; //$this->session->userdata('user_id') != '')
        $this->logID = $this->session->userdata('mem_id');
        error_reporting(0);
    }

    public function index($type = null)
    {   
        if($type === 'register'){ 
                $value = $this->input->post();
                $getID = rand(100000, 99999) . rand(100000, 99999);
                $insertArr = array(
                    'guest_id' => $getID,
                    'name' => $value['newName'],
                    'email_id' => $value['newEmail'],
                    'mobile_number' => $value['newMobile'],
                    'password' => md5($value['password']),
                    'show_password' => $value['password'],
                    'create_date' => date('Y-m-d H:i:s'),
                    'created_by_user_type_id' => $value['oldLogMemId'],
                );
                if ($this->db->insert('guest_member',$insertArr)) {
                    $this->session->set_flashdata('success', 'Your Member Request has been submitted successfully.');
                    redirect(base_url('member/dashboard'));
                } else {
                    $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
                    redirect('member/dashboard');
                }
        }else{
            $sessData = $this->session->userdata('mem_id');

            $donationList = $this->db->select('*')->from('donate')->where(array('create_user_type_id' => $sessData, 'status' => 1 ))->order_by('id', 'DESC')->get()->result_array();
           
            $ticketListing = $this->db->select('*')->from('ticket')->where(array('mem_id' => $sessData))->order_by('id', 'ASC')->get()->result_array();

            $memberData = $this->db->select("*")->from("manage_member")->where('id', $sessData)->get()->row_array();

            $actMemberCount = $this->db->select('id')->from("manage_member")->where('status',1)->get()->result_array();

            $totalGuest = $this->db->select('id')->from("guest_member")->get()->result_array();

            $requested_member = $this->db->select("member_id,name,father_name,email_id,mobile_number")->from("manage_member")->where(array('status'=>'Active','m_type'=>'3','created_by_user_type_id'=>$this->session->userdata('user_id')))->get()->result_array();

            $donationAmount = $this->common->sum_all('amount', 'donate', array('create_user_type_id' => $sessData ));
            $todayDonationAmo = $this->common->sum_all('amount', 'donate', array('create_user_type_id' => $sessData, 'created_at' => date('Y-m-d')));

            $lastTicId = $this->db->select('*')->from('ticket')->order_by('id', 'DESC') ->limit(1)->get()->row(); 
            $mem_id = $lastTicId->mem_id?$lastTicId->mem_id:'1';
            $lastTicMess = $this->db->select('*')->from('ticket_suggestions')->get()->result_array(); 
            
		    $eventList = $this->db->select('*')->where(array('status' => 1))->order_by('id', 'ASC')->get('cms_event')->result_array();
            $project = $this->db->select('*')->from('category_project')->where('status',1)->order_by('id','DESC')->get()->result_array(); 
            $program = $this->db->select('*')->from('category_program')->where('status',1)->order_by('id','DESC')->get()->result_array(); 

            $data = [
                'title' => 'Dashboard',
                'breadcrums'        => 'Dashboard Member',
                'totalGuest'        => $totalGuest,
                'actMemberCount'    => $actMemberCount,
                'memberCount'       => $actMemberCount,
                'eventList'         => $eventList,
                'project'           => $project,
                'program'           => $program,
                'MemberDet'         => $memberData,  
                'doListMan'         => $donationList,
                'totalDoAmo'        => $donationAmount,
                'message'           => $lastTicMess,
                'ticketListing'     => $ticketListing,
                'todayDonAmo'       => $todayDonationAmo,
                'requested_member'       => $requested_member,
                'donateNow' => base_url('member/dashboard/LogedMemDonation'),
                'newMemberReq' => base_url('member/dashboard/index/register'),
                'feedbacjSub' => base_url('member/dashboard/create_feedback'),
                'changePassword' => base_url('member/dashboard/changePassword'),
                'manProfile' => base_url('member/dashboard/profileMan'),
                'ticketSugg' => base_url('member/dashboard/create_ticket'),
                'memChating' => base_url('member/dashboard/memChating'),
            ];
            $this->load->view('base_member', $data);
        }
    }


    public function create_feedback(){
        $value = $this->input->post();
        if (isset($value['feedMemId'], $value['user_name'], $value['user_mob'], $value['user_feedback'], $value['user_suggestion'])) {
        $data = array(
        'name'                      => $value['user_name'],
        'mobile'                    => $value['user_mob'], 
        'feedback'                  => $value['user_feedback'],
        'discription'               => $value['user_suggestion'],  
        'create_at'                 => date('Y-m-d'),
        'created_by_user_type_id'   => $value['feedMemId'],
        );
        if ($this->db->insert('feedback',$data)) {
            $this->session->set_flashdata('success', 'Your Feedback has been submitted successfully.');
            redirect(base_url('member/dashboard'));
        } else {
            $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
            redirect(base_url('member/dashboard'));
        }
        }else{
              $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
              redirect(base_url('member/dashboard'));
        }
    }


    public function create_ticket(){
      $data = $this->input->post();
      $lastTicket = $this->db->select('id, ticket_id')->from('ticket')->order_by('id', 'DESC')->limit(1)->get()->row();
      if (!empty($lastTicket)) {
          $ticketId = 'TIC' . str_pad((int)substr($lastTicket->ticket_id, 3) + 1, 4, '0');
      } else {
          $ticketId = 'TIC1001';
      }
      $ticketData = array(
        'ticket_id'      => $ticketId,
        'mem_id'         => $this->session->userdata('mem_id'),
        'subject'        => $data['subject'],
        'asked_question' => $data['askedQuestion'],
        'created_at'     => date('Y-m-d'),
      );
      if ($this->db->insert('ticket', $ticketData)) {
        $lastTicketId = $this->db->select('id, ticket_id')->from('ticket')->order_by('id', 'DESC')->limit(1)->get()->row();
        if (!empty($lastTicketId)) {
          $AnsId = 'TAns' . str_pad((int)substr($lastTicketId->id, -4) + 1, 4, '0', STR_PAD_LEFT);
        } else {
          $AnsId = 'TAns0001';
        }
        $ticketSuggestionData = array(
            'ticket_id'    => $lastTicketId->id,  
            'mem_id'       =>$this->session->userdata('mem_id'),
            'reply_id'     => $AnsId,
            'subject'      => $data['subject'],
            'discription'  => $data['askedQuestion'],
            'created_at'   => date('Y-m-d'),
            'status'       => 2,  
        );
        $this->db->insert('ticket_suggestions', $ticketSuggestionData);
        $this->session->set_flashdata('success', 'Ticketing Requested Successfully.');
        redirect('member/dashboard');
    } else {
        $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
        redirect('member/dashboard');
    }
    }


     public function ticClose()
     {
         $segment = $this->uri->segment(4);
         $data = array(
         'status' => 2
         );
         if($this->db->where('id', $segment)->update('ticket', $data)) {
         $this->session->set_flashdata('success', 'This ticket ID is closed.');
         redirect('member/dashboard');
         } else {
         $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
         redirect('member/dashboard');
         }
     
     }


     public function ticketAnswer()            
     {
         $mem_id = $this->input->post('id');
         $ticketAns = $this->db->select('*')->from('ticket_suggestions')->where('ticket_id', $mem_id)->order_by('id', 'ASC')->get()->result_array();  

         if (!empty($ticketAns)) {
             $return = array('status' => 'success', 'data' => $ticketAns);
         } else {
             array('status' => 'error', 'message' => 'Oops, it seems there was an error.');
         }
         echo json_encode($return);

     }


     public function memChating()
     {
         $value = $this->input->post();
         if(!empty($value['mem_message']))
         {
            $MemTicId = $this->db->select('ticket_id')->from('ticket')->where('id',$value['tickec_id'])->order_by('id', 'ASC')->limit(1)->get()->row();
            
            $memberId = $this->session->userdata('mem_id');
            
            $mem_message = array(
                'reply_id' => $MemTicId.'Ans', 
                'ticket_id' => $value['tickec_id'], 
                'discription' => $value['mem_message'],  
                'subject' => 'member Message',
                'mem_id' => $memberId,  
                'created_at' => date('Y-m-d'),
                'status' => 1,
                'created_by_user_type_id' => $memberId,  
            );
          
            if ($this->db->insert('ticket_suggestions', $mem_message)) {
                $this->session->set_flashdata('success', 'Your message has been sent.');
                redirect('member/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
                redirect('member/dashboard');
            }
         }else {
            $this->session->set_flashdata('error', 'Please, you have not entered any query. Please try again.');
            redirect('member/dashboard');
        }
        
     }
     
     
     


        public function ticketAnswer_22()
        {
        $mem_id = $this->session->userdata('mem_id');
        
        $ticketAns = $this->db->select('reply_id')->from('ticket_suggestions')->order_by('id', 'DESC')->limit(1)->get()->row();
        if (!empty($ticketAns)) {
            $ticId = $ticketAns->reply_id + 1;
        } else {
            $ticId = 1001;
        }
        $data = $this->input->post();
        $value = array(
            'ticket_id'       =>   $data['ticket_id'],
            'mem_id'          =>   $mem_id,
            'reply_id'        =>   $ticId,
            'name'            =>   $data['mem_name'],
            'mobil'           =>   $data['mem_mob_no'],
            'email'           =>   $data['mem_email_id'],
            'subject'         =>   $data['subject'],
            'discription'     =>   $data['suggAns'],
            'created_at'      =>   date('Y-m-d'),
            'status'          =>   1,
        );
            if ($this->db->insert('ticket_suggestions',$value)) {
            $this->session->set_flashdata('success', 'Your Requested Submitted Successfully.');
            redirect('website/ticketing/ticView/'.$data['ticket_id']);
            } else {
            $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
            redirect('website/ticketing/ticView/'.$data['ticket_id']);
            }
        }




    public function profileMan()
    {
        $value = $this->input->post();
        
        if ($value['newPassword'] == $value['confPass']) {
            
            $hashedPassword = md5($value['newPassword']);
    
            $data = array(
                'name' => $value['name'],
                'email_id' => $value['emailId'],
                'mobile_number' => $value['mobile_no'],
                'password' => $hashedPassword, 
                'show_password' => $value['memPassword'], 
                'create_date' => date('Y-m-d'),
            );
    
            $this->db->where('id', $value['usId'])->update('manage_member', $data);
    
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Your data has been updated successfully.');
                redirect(base_url('member/dashboard'));
            } else {
                $this->session->set_flashdata('error', 'Oops, there was an error processing your request. Please try again.');
                redirect(base_url('member/dashboard'));
            }
    
        } else {
            $this->session->set_flashdata('error', 'The new password and confirm password do not match.');
            redirect(base_url('member/dashboard'));
        }
    }
    
    


 



    public function changePassword()
    {
        $value = $this->input->post();
            $data = array(
                'password' => $hashedPassword,
                'show_password' => $value['newPassword'], 
                'create_date' => date('Y-m-d'),
            );
            $this->db->where('id',$value['mem_id'])->update('manage_member', $data);
            if ($this->db->where('id',$value['mem_id'])->update('manage_member', $data)) {
                $this->session->set_flashdata('success', 'Your password has been changed successfully.');
                redirect(base_url('member/dashboard'));
            } else {
                $this->session->set_flashdata('error', 'Oops, there was an error processing your request. Please try again.');
                redirect(base_url('member/dashboard'));
            }
        }


    
    public function id_card_download()
    {
        $this->load->view('front/id_card_download');
    }


    public function LogedMemDonation()  
	{    
        
		$uploaded_image = $this->upload_image('donation', 'payment_img');

        $last_don_id = $this->db->select('donation_id')->from('donate')->order_by('id', 'DESC')->limit(1)->get()->row_array();
        $new_don_id = empty($last_don_id) ? 'DAMO1001' : 'DAMO' . str_pad((int) substr($last_don_id['donation_id'], 4) + 1, 4, '0');

		if($uploaded_image['icon'] === 'success') {

        $value = $this->input->post();

		$item = array(
		'image'                 => 	$uploaded_image['text'],         
        'donation_id'           =>  $new_don_id,
		'name'                  => 	$this->input->post('name_donate'), 
		'f_name '                 => 	$this->input->post('fname_donate'), 
		'address'               => 	$this->input->post('address_donate'), 
		'mobile_no'             => 	$this->input->post('mobile_no_donate'), 
		'email' 	            => 	$this->input->post('emailId_donate'), 
		'amount'                =>  $this->input->post('donAmount'),
		'message'               =>  $this->input->post('message_donate'),
		'created_at'            =>  date('Y-m-d'),
		'status'                =>  2,
		'create_user_type_id'   => 	$this->session->userdata('mem_id'), 
		);
        if ($this->db->insert('donate',$item)) {

            $donationId = $this->db->select('email_id')->from('manage_member')->where('email_id', $this->input->post('email'))->get()->row();

            if (empty($donationId)) {
                $getID = rand(100000, 99999) . rand(100000, 99999);
                $beAguest = array(
                    'guest_id'                    => $getID,
                    'name'                        => $value['name_donate'],
                    'email_id'                    => $value['emailId_donate'],
                    'mobile_number'               => $value['mobile_no_donate'],
                    'father_name'                 => $value['fname_donate'],
                    'address'                     => $value['address_donate'],
                    'password'                    => md5($value['mobile_no_donate']),
                    'show_password'               => $value['mobile_no_donate'],
                    'created_by_user_type_id'     => $value['logMemId'],
                    'create_date'                 => date('Y-m-d'),
                );
                
                $this->common->save_data('guest_member', $beAguest);
                echo $this->db->last_query();die;

            }

            $this->session->set_flashdata('success', 'Your donation request has been submitted successfully.');
            redirect(base_url('member/dashboard'));
        } else {
            $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
            redirect(base_url('member/dashboard'));
        }
        }else{
              $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
              redirect(base_url('member/dashboard'));
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
