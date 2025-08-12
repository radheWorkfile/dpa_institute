<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
	    error_reporting(0);
    }

  
   public function index()
   {
   
    $all_data = $this->db->select('*')->from('setting')->where('id',1)->get()->row();
	$return=array(
        'title'=>'Custom Settings',
        'breadcrums'=>'Custom Settings',
        'layout'=>'admin/configuration/setting.php',
        'all_data' => $all_data,
        'itemTarget' => base_url('administrator/setting/update_data'),
    );
		$this->load->view('base',$return);
   }

   public function update_data($action = null)
   {
       $uploaded_image = $this->upload_image('setting', 'logo');
       if ($uploaded_image['icon'] === 'success') {
           $image_item = array(
               'logo' => $uploaded_image['text'],         
               'created_at' => date('Y-m-d')   
           );
           if ($this->db->update('setting', $image_item, array('id' => 1))) {
               $this->session->set_flashdata('success', 'Updated Successfully..');
               redirect('administrator/setting');
           } else {
               $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
               redirect('administrator/setting');
           }
       } else {
           $this->session->set_flashdata('error', 'Image upload failed.');
           redirect('administrator/setting');
       }
   }
   

   public function update_favicon()
   {
       $uploaded_image = $this->upload_image('setting', 'favicon');
       if ($uploaded_image['icon'] === 'success') {
           $image_item = array(
               'favicon' => $uploaded_image['text'],         
               'created_at' => date('Y-m-d')   
           );
           if ($this->db->update('setting', $image_item, array('id' => 1))) {
            $this->session->set_flashdata('success', 'Updated Successfully..');
            redirect('administrator/setting');
           } else {
            $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
            redirect('administrator/setting');
           }
       } else {
           $msg = array($uploaded_image['text']);
           $return = array(
               'addClas' => 'tWarning',
               'msg' => $msg,
               'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
           );
       }
       echo json_encode($return);
   }

   public function update_content()
   {
       $data = $this->input->post();
       $value = array(
           'company_name' => $data['company_name'],
           'mobile' => $data['mobile'],
           'email' => $data['email'],
           'address' => $data['address'],
           'reservedText' => $data['reservedText'],
           'about_company' => $data['about_company'],
           'created_at' => date('Y-m-d')   
       );
       if ($this->db->update('setting', $value, array('id' => 1))) {
           $this->session->set_flashdata('success', 'Updated Successfully..');
           redirect('administrator/setting');
       } else {
           $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
           redirect('administrator/setting/update_data');
       }
   }
   

 

   public function facebookLink()
   {
        $data = $this->input->post();
        $value = array(
            'facebook' => $data['facebookLink'],
            'created_at' => date('Y-m-d')   
        );

        if ($this->db->update('setting', $value, array('id' => 1))) {
            $this->session->set_flashdata('success', 'Facebook Link Updated Successfully.');
               redirect('administrator/setting');
           } else {
               $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
               redirect('administrator/setting');
           }
   }

   public function youtubeLink()
   {
        $data = $this->input->post();
        $value = array(
            'youtube' => $data['youtubeLink'],
            'created_at' => date('Y-m-d')   
        );
        if ($this->db->update('setting', $value, array('id' => 1))) {
            $this->session->set_flashdata('success', 'Youtube Link Updated Successfully.');
            redirect('administrator/setting');
        } else {
            $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
            redirect('administrator/setting');
        }
   }
   
   public function teligramLink()
   {
        $data = $this->input->post();
        $value = array(
            'telegram' => $data['teligramLink'],
            'created_at' => date('Y-m-d')   
        );
        if ($this->db->update('setting', $value, array('id' => 1))) {
            $this->session->set_flashdata('success', 'Teligram Link Updated Successfully.');
            redirect('administrator/setting');
        } else {
            $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
            redirect('administrator/setting');
        }
   }

   public function instagramLink()
   {
        $data = $this->input->post();
        $value = array(
            'instagram' => $data['instagramLink'],
            'created_at' => date('Y-m-d')   
        );
        if ($this->db->update('setting', $value, array('id' => 1))) {
            $this->session->set_flashdata('success', 'Instagram Link Updated Successfully.');
            redirect('administrator/setting');
        } else {
            $this->session->set_flashdata('error', 'Oops, it seems there was an error.');
            redirect('administrator/setting');
        }
   }

   function upload_image($path, $name)
   {
       $config['upload_path']   = './uploads/' . $path; 
       $config['allowed_types'] = 'jpg|png|jpeg';      
       $config['max_size']      = 100;               
       $this->load->library('upload', $config);
       if ($this->upload->do_upload($name)) {
       $upload_data = $this->upload->data();
       $image_path = "uploads/" . $path . '/' . $upload_data['file_name'];
       return array('text' => $image_path, 'icon' => 'success');
       } else {
           $this->session->set_flashdata('error', 'File must be under 50KB...');
           redirect('administrator/setting');
       }
   }


	
		
	
					
}
