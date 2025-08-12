<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Front_cms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id')== '') ? redirect(base_url(), 'refresh') : '';
		$this->load->model(array('employee/Front_cms_model' => 'frontCModel'));
 	    $this->lgCat=$this->session->userdata['user_cate'];
		$this->logID=$this->session->userdata['user_id'];
	    error_reporting(0);
    }

	public function volunteer($type = NULL, $getId = NULL)
	{	
		if($type === 'volunteerList'){
			$post_data = $this->input->post();
			$return['data'] = array();
			$i = $post_data['start'] + 1;        
			$record = $this->frontCModel->volunteerListModel($post_data);
			foreach ($record as $row) {
			$editUid = base_url('employee/front_cms/volunteer/edit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
			//$deleteUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
			$isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/front_cms/accPermisionFvol===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
			$actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
				$status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===employee/front_cms/manageVolSta==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===employee/front_cms/manageVolSta==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
				$Address = (mb_strlen($row->address) > 20) ? mb_substr($row->address, 0, 20) . '...' : $row->address;
				$return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',

				'<div class="text-center">'.$row->volunteer_id.'</div>',
				'<div class="text-center">'.$row->name.'</div>',
				'<div class="text-center">'.$row->mobile.'</div>',
				'<div class="text-center">'.$row->email.'</div>',
				'<div class="text-center">'.$Address.'</div>',
				$actionBtn
				);
				$i++;
			}
			$return['recordsTotal'] = $this->frontCModel->volunteerList_total_count($whereCn);
			$return['recordsFiltered'] = $this->frontCModel->volunteerList_filter_count($post_data, $whereCn);
		    $return['draw'] = $post_data['draw'];
			echo json_encode($return);
		   }elseif($type === 'edit'){
			$whereCon = json_decode(base64_decode(urldecode($getId)));
			$emp_detials = $this->db->select('*')->from('cms_volunteer')->where('id', $whereCon->id)->get()->row();
			$return = array(
				'title' => 'Edit Volunteer',
				'breadcrums' => 'Edit Volunteer',
				'emp_detials' => $emp_detials,
				'layout' => 'front_cms/edit_volunteer.php',
				'targetItem' =>  base_url('employee/front_cms/volunteer/update'),
				);
				$this->load->view('employee/base', $return);
		   }elseif($type === 'update'){
			$emp_id = $this->session->userdata('user_id');
			$uploaded_image = $this->upload_image('volunteer', 'previewImage');
            if ($uploaded_image['icon'] === 'success') {
            $value = array(
            'image'  				=> $uploaded_image['text'],         
            'name'  				=> $this->input->post('name'),         
            'email' 				=> $this->input->post('email'), 
            'mobile' 				=> $this->input->post('mobile'),     
            'address' 				=> $this->input->post('address'),     
            'description' 		    => $this->input->post('description'),     
            'gender' 				=> $this->input->post('gender'),     
            'date' 					=> date('Y-m-d'),
			'created_at'  			=> date('Y-m-d'),
			'created_by_user_type_id' => $emp_id,
            );
			$updateFile = $this->db->where('id', $this->input->post('id'))->update('cms_volunteer', $value);
            if($updateFile){
            $msg=array('Thank You! you have successfully updated details');
            $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
            'returnLoc'=>base_url('employee/front_cms/volunteer'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
            } else {
            $msg=array($uploaded_image['text']);
            $return=array('addClas' => 'tWarning', 'msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');} 
            echo json_encode($return);
		   }else{
			$return = array(
				'title' => 'Edit Volunteer',
				'breadcrums' => 'Edit Volunteer',
				'layout' => 'front_cms/volenteer.php',
				'createVolunteer' =>  base_url('employee/front_cms/create_volunteer'),
				'targetList' => base_url('employee/Front_cms/volunteer/volunteerList'),
				);
				$this->load->view('employee/base', $return);
		   }  
		}


		public function create_volunteer()
		{
			$emp_id = $this->session->userdata('user_id');
			$uploaded_image = $this->upload_image('volunteer', 'previewImage');
			$getVolId = 'VOl' . rand(100000000, 999999999);
            if ($uploaded_image['icon'] === 'success') {
            $value = array(
            'volunteer_id'  		=> $getVolId,         
            'image'  				=> $uploaded_image['text'],         
            'name'  				=> $this->input->post('name'),         
            'email' 				=> $this->input->post('email'), 
            'mobile' 				=> $this->input->post('mobile'),     
            'address' 				=> $this->input->post('address'),     
            'description' 		    => $this->input->post('description'),     
            'gender' 				=> $this->input->post('gender'),     
            'date' 					=> date('Y-m-d'),
			'created_at'  			=> date('Y-m-d'),
			'created_by_user_type_id' => $emp_id,
            );
            if($this->db->insert('cms_volunteer', $value)){
            $msg=array(' Thank you! Your volunteer has been successfully created.');
            $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
            'returnLoc'=>base_url('employee/front_cms/volunteer'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
            } else {
            $msg=array($uploaded_image['text']);
            $return=array('addClas' => 'tWarning', 'msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');} 
            echo json_encode($return);
		}


		public function event($action = NULL, $getId = NULL )
		{
            if($action === 'eventList'){  
			$post_data = $this->input->post();
			$return['data'] = array();
			$i = $post_data['start'] + 1;        
			$record = $this->frontCModel->eventListModel($post_data);
			foreach ($record as $row) {
			 $editUid = base_url('employee/front_cms/event/edit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
			//$deleteUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
				$isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/front_cms/accPerForEvent===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
				$image= '<span><img src="' . base_url($row->e_images) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
				$actionBtn = '
				<div style="text-align:center;"> <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>' ."   ".$isDel . '</div>';
				$status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===employee/front_cms/manageEventSta==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===employee/front_cms/manageEventSta==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
				$message = (mb_strlen($row->e_text) > 20) ? mb_substr($row->e_text, 0, 20) . '...' : $row->e_text;
				$heading = (mb_strlen($row->e_heading) > 20) ? mb_substr($row->e_heading, 0, 20) . '...' : $row->e_heading;
				$return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',

				'<div class="text-center">'.$heading.'</div>',
				'<div class="text-center">'.$message.'</div>',
				'<div class="text-center">'.$image.'</div>',
				// $status,
				$actionBtn
				);
				$i++;
			}
			$return['recordsTotal'] = $this->frontCModel->eventList_total_count($whereCn);
			$return['recordsFiltered'] = $this->frontCModel->eventList_total_filter_count($post_data, $whereCn);
		    $return['draw'] = $post_data['draw'];
			echo json_encode($return);
			}elseif($action === 'update'){
			$emp_id = $this->session->userdata('user_id');
			$uploaded_image = $this->upload_image('event', 'previewImage');
             if ($uploaded_image['icon'] === 'success') {
             $eventItem = array(
             'e_images'  => $uploaded_image['text'],         
             'e_heading' => $this->input->post('slider_heading'), 
             'e_text' => $this->input->post('slider_text'),   
             'created_user_type_id' => $emp_id     
             );
			 $updateEventData = $this->db->where('id', $this->input->post('id'))->update('cms_event',$eventItem);
             if($updateEventData) {
                $msg=array(' Thank You! you have updaetd successfully.');
				$return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                            'returnLoc'=>base_url('employee/front_cms/ticket'));
              } else {
               $msg=array('Oops it seems error.please refresh you page.');
               $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                             'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>','returnLoc'=>base_url('employee/front_cms/ticket'));
              }
              } else {
                $msg=array($uploaded_image['text']);
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                              'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>',
							  'returnLoc'=>base_url('employee/front_cms/ticket'));
              } 
             echo json_encode($return);
			}elseif($action === 'edit'){
                $whereCon = json_decode(base64_decode(urldecode($getId)));
				$event_data = $this->db->select('*')->from('cms_event')->where('id', $whereCon->id)->get()->row();
				$return = array(
					'title' => 'Edit Event',
					'breadcrums' => 'Edit Event',
					'event_data' => $event_data,
					'layout' => 'front_cms/editEvent.php',
					'targetItem' =>  base_url('employee/front_cms/event/update'),
					);
					$this->load->view('employee/base', $return);
			}else{
				$return = array(
					'title' => 'Manage Event',
					'breadcrums' => 'Create Event',
					'layout' => 'front_cms/event.php',
					'createEvent' =>  base_url('employee/front_cms/create_event'),
					'targeteventList' => base_url('employee/front_cms/event/eventList'),
					);
					$this->load->view('employee/base', $return);
			   }  
		}

		public function create_event()
		{
			$emp_id = $this->session->userdata('user_id');
			$uploaded_image = $this->upload_image('event', 'previewImage');
             if ($uploaded_image['icon'] === 'success') {
             $image_item = array(
             'e_images'  => $uploaded_image['text'],         
             'e_heading' => $this->input->post('slider_heading'), 
             'e_text' => $this->input->post('slider_text'),   
             'created_user_type_id' => $emp_id     
             );
             if($this->db->insert('cms_event', $image_item)) 
              {
                $msg=array(' Thank you! Your Event has been successfully created.');
				$return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                            'returnLoc'=>base_url('employee/front_cms/event'));
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
		}


		public function ticket($type = NULL,   $id = NULL )
		{
            if($type === 'ticketList'){  
				$post_data = $this->input->post();
				$return['data'] = array();
				$i = $post_data['start'] + 1;           
				$record = $this->frontCModel->ticketList_model($post_data);
				foreach ($record as $row) {
				$viewUid = base_url('employee/front_cms/ticket/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
				$editUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
				//$deleteUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
				$isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/front_cms/ticketAcc===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
				$actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $viewUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
				$status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===employee/front_cms/ticketStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===employee/front_cms/ticketStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
				  $shortText = (mb_strlen($row->e_text) > 20) ? mb_substr($row->e_text, 0, 20) . '...' : $row->e_text;
				  $return['data'][] = array(
					  '
				  <div class="text-center"><strong>' . $i . '.</strong></div>',
				  '<div class="text-center">'.$row->ticket_id.'</div>',
				  '<div class="text-center">'.$row->subject.'</div>',
				  '<div class="text-center">'.$row->created_at.'</div>',
				  '<div class="text-center">'.$status.'</div>',
				  $actionBtn
				  );
				  $i++;
			  }
			  $return['recordsTotal'] = $this->frontCModel->ticketList_total_count($whereCn);
			  $return['recordsFiltered'] = $this->frontCModel->ticketList_filter_count($post_data, $whereCn);
			  $return['draw'] = $post_data['draw'];
			  echo json_encode($return);
			}elseif($type === 'update'){

				$this->form_validation->set_rules('subject', 'Enter Heading', 'trim|required|xss_clean');  
				$this->form_validation->set_rules('text', 'Enter Message', 'trim|required|xss_clean');  

				if ($this->form_validation->run() == TRUE) {
    				$data = $this->input->post();
    				$insert = array(
        				'subject'          => $data['subject'],
        				'asked_question'   => $data['text'],
        				'created_at'       => date('Y-m-d'),
    				);
    
    				$updateData = $this->db->where('id', $data['id'])->update('ticket', $insert);

    				if ($updateData) {
        				$msg = array('Thank you! You have successfully updated the ticket details.');
        				$return = array(
            				'addClass'   => 'tSuccess',
            				'msg'        => $msg,
            				'icon'       => '<i class="fa-regular fa-circle-check"></i>',
            				'returnLoc'  => base_url('employee/front_cms/ticket'),
        				);
						
    				} else {
        				$msg = array('Oops! It seems there is an error. Please refresh your page.');
        				$return = array(
            				'addClass'   => 'tWarning',
            				'msg'        => $msg,
            				'icon'       => '<i class="fa-regular fa-circle-check"></i>',
            				'returnLoc'  => base_url('employee/front_cms/ticket'),
        				);
    				}
				} else {
    			$msg = array('There was an issue updating the ticket. Please check the errors below.');
    			$return = array(
        			'addClass' => 'tDanger',
        			'msg'      => $msg,
        			'subject'  => form_error('subject'),
        			'text'     => form_error('text'),
        			'icon'     => '<i class="fa-solid fa-circle-exclamation me-2"></i>',
    			 );
			    }
			    echo json_encode($return);


			 }elseif($type === 'viewList'){
				$id = json_decode(base64_decode(urldecode($id)));
				$ticket_details = $this->db->select('*')->from('ticket')->where('id',$id->id)->get()->row();
				$return = array(
					'title' => 'Manage Ticket',
					'breadcrums' => 'Create Ticket',
					'targetItem' => base_url('employee/front_cms/ticket/update'),
					'ticket_details' => $ticket_details,
					'layout' => 'front_cms/edit_ticketing.php',
					);
					$this->load->view('employee/base', $return);

			}else{
				$return = array(
					'title' => 'Manage Ticket',
					'breadcrums' => 'Create Ticket',
					'layout' => 'front_cms/ticket.php',
					'createTicket' =>  base_url('employee/front_cms/create_ticket'),
					'targetList' => base_url('employee/front_cms/ticket/ticketList'),
					);
					$this->load->view('employee/base', $return);
			   }  
		}


		public function create_ticket(){

    	$empId = $this->session->userdata('user_id');

        $lastTicId = $this->db->select('*')->from('ticket')->order_by('id', 'DESC')->limit(1)->get()->row();

    	if (!empty($lastTicId)) {
    	    $TICID = 'TIC' . str_pad((int)substr($lastTicId->ticket_id, 3) + 1, 4, '0');
    	} else {
    	    $TICID = 'TIC1001'; 
    	}

        $data = $this->input->post();

   		$value = array(
   		    'ticket_id'              => $TICID,
   		    'mem_id'                 => $empId,
   		    'subject'                => $data['subject'],
   		    'asked_question'         => $data['text'],
   		    'created_at'             => date('Y-m-d'),
   		    'created_by_user_type_id'=> $empId,
   		    'status'                 => 2,
   		);
       if ($this->common->save_data('ticket', $value)) {
            $masterDetails = array(
                'ticket_id'              => $lastTicId->id,
                'mem_id'                 => $empId,
                'subject'                => $data['subject'],
                'discription'            => $data['text'],
                'created_at'             => date('Y-m-d'),
                'status'                 => 2,
                'created_by_user_type_id'=> $empId,
            );

            $this->common->save_data('ticket_suggestions', $masterDetails);

            $msg = array('Thank you! You have successfully created the ticket details.');

            $return = array(
                'addClas'   => 'tSuccess',
                'msg'       => $msg,
                'icon'      => '<i class="fa-regular fa-circle-check"></i>',
                'returnLoc' => base_url('employee/front_cms/ticket'),
            );

          } elseif ($this->db->insert('ticket', $value)) {
          
            $msg = array('Oops it seems error.please refresh you page.');
            $return = array(
                'addClas'   => 'tSuccess',
                'msg'       => $msg,
                'icon'      => '<i class="fa-regular fa-circle-check"></i>',
                'returnLoc' => base_url('employee/front_cms/ticket'),
            );
         } 
    echo json_encode($return);
}








		public function create_ticket_1(){

				  $uploaded_image = $this->upload_image('ticket', 'file'); 
				  $getID = 'ETIC' . random_int(100000, 999999); 
				  $value = array(
					  'ticket_id'   => $getID,
					  'subject'     => $this->input->post('subject'),
					  'message'     => $this->input->post('text'),
					  'created_at'  => date('Y-m-d'),
				  );
				  if ($uploaded_image['icon'] === 'success') {
					  $value['images'] = $uploaded_image['text'];}

					  $this->db->insert('ticket', $value);
					  echo $this->db->last_query();die;

				  if ($this->db->insert('mem_ticket', $value)) {
					  $msg = array('Thank You! You have successfully uploaded details.');
					  $return = array(
						  'addClas'    => 'tSuccess',
						  'msg'        => $msg,
						  'icon'       => '<i class="fa-regular fa-circle-check"></i>',
						  'returnLoc'  => base_url('employee/front_cms/ticket'),
					  );
					  } else {
					  $msg = array('Oops, it seems there was an error. Please refresh your page.');
					  $return = array(
						  'addClas' => 'tWarning',
						  'msg'     => $msg,
						  'icon'    => '<i class="fa-solid fa-circle-exclamation me-2"></i>',
					  );}
				  echo json_encode($return);
		}
              

		public function feedback($action = NULL, $getId = NULL)
		{
			if($action === 'create'){
				$emp_id = $this->session->userdata('user_id');
				$data = $this->input->post();
				$value = array(
					'feedback'                   =>  $data['subject'],
					'discription'                =>  $data['discription'],
					'create_at'                  =>  date('Y-m-d'),
					'created_by_user_type_id'    =>  $emp_id,
				);
				$this->db->insert('feedback', $value);
				if ($this->db->insert('feedback', $value)) {
					$msg = array('Thank You! You have successfully uploaded details.');
					$return = array(
						'addClas'    => 'tSuccess',
						'msg'        => $msg,
						'icon'       => '<i class="fa-regular fa-circle-check"></i>',
						'returnLoc'  => base_url('employee/front_cms/ticket'),
					);
					} else {
					$msg = array('Oops, it seems there was an error. Please refresh your page.');
					$return = array(
						'addClas' => 'tWarning',
						'msg'     => $msg,
						'icon'    => '<i class="fa-solid fa-circle-exclamation me-2"></i>',
					);}
				echo json_encode($return);
			}elseif($action === 'edit'){
				$whereCon = json_decode(base64_decode(urldecode($getId)));
				$feedbackData = $this->db->select('*')->from('feedback')->where('id', $whereCon->id)->get()->row();
				$return = array(
					'title' => 'Edit Feedback',
					'breadcrums' => 'Edit Feedback',
					'feedbackData' => $feedbackData,
					'layout' => 'front_cms/editFeedback.php',
					'targetItem' => base_url('employee/front_cms/feedback/update'),
					);
					$this->load->view('employee/base', $return);
			   }elseif($action == 'update'){
				$emp_id = $this->session->userdata('user_id');
				$data = $this->input->post();
				$value = array(
					'feedback'                   =>  $data['subject'],
					'discription'                =>  $data['discription'],
					'create_at'                  =>  date('Y-m-d'),
					'created_by_user_type_id'    =>  $emp_id,
				);
				$update_data = $this->db->where('id', $this->input->post('id'))->update('feedback',$value);
				if ($update_data) {
					$msg = array('Thank You! You have successfully uploaded details.');
					$return = array(
						'addClas'    => 'tSuccess',
						'msg'        => $msg,
						'icon'       => '<i class="fa-regular fa-circle-check"></i>',
						'returnLoc'  => base_url('employee/front_cms/feedback'),
					);
					} else {
					$msg = array('Oops, it seems there was an error. Please refresh your page.');
					$return = array(
						'addClas' => 'tWarning',
						'msg'     => $msg,
						'icon'    => '<i class="fa-solid fa-circle-exclamation me-2"></i>',
					);}
				echo json_encode($return);
			}else{
				$return = array(
					'title' => 'Manage Feedback',
					'breadcrums' => 'Manage Feedback',
					'layout' => 'front_cms/feedback.php',
					'targetItem' => base_url('employee/front_cms/create'),
					'targetFeedbackItem' => base_url('employee/front_cms/feedbackList'),
					);
					$this->load->view('employee/base', $return);
			   }  
			}

			public function feedbackList()
			{
				$post_data = $this->input->post();
				$return['data'] = array();
				$i = $post_data['start'] + 1;           
				$record = $this->frontCModel->feedbackList_model($post_data);
				// echo "<pre>"; print_r($record);die;
				foreach ($record as $row) {
				  $editUid = base_url('employee/front_cms/edit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
				  $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
				  $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/front_cms/accPermisionFeedback===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
				  $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-pen"></i></a>'. $isDel .'</div>';
				  $status = ($row->status == 'Active') ? '<span class="sRvActive"> Active </span>' : (($row->status == 'Block') ? '<span class="sRvDeactive"> Deactive </span>' : '<span class="sRvSuspnd"> Suspend </span>');
				  $shortDescription = (mb_strlen($row->discription) > 15) ? mb_substr($row->discription, 0, 15) . '...': $row->discription;
				  $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
				  '<div class="text-center">'.$row->empName.'</div>',
				  '<div class="text-center">'.$row->empMobNo.'</div>',
				  '<div class="text-center">'.$row->feedback.'</div>',
				  '<div class="text-center">'.$row->discription.'</div>',
					$actionBtn
				  );
				  $i++;
			     }
				$return['recordsTotal'] = $this->frontCModel->feedbackList_total_count($whereCn);
				$return['recordsFiltered'] = $this->frontCModel->feedbackList_filter_count($post_data, $whereCn);
				$return['draw'] = $post_data['draw'];
				echo json_encode($return);
			}

			public function create()
			{
				$emp_id = $this->session->userdata('user_id');
				$data = $this->input->post();
				$value = array(
					'feedback'                   =>  $data['subject'],
					'discription'                =>  $data['discription'],
					'create_at'                  =>  date('Y-m-d'),
					'created_by_user_type_id'    =>  $emp_id,
				);
				if ($this->db->insert('feedback', $value)) {
					$msg = array('Thank You! You have created successfully.');
					$return = array(
						'addClas'    => 'tSuccess',
						'msg'        => $msg,
						'icon'       => '<i class="fa-regular fa-circle-check"></i>',
						'returnLoc'  => base_url('employee/front_cms/feedback'),
					);
					} else {
					$msg = array('Oops, it seems there was an error. Please refresh your page.');
					$return = array(
						'addClas' => 'tWarning',
						'msg'     => $msg,
						'icon'    => '<i class="fa-solid fa-circle-exclamation me-2"></i>',
					);}
				echo json_encode($return);
			}


			public function edit($id)
			{
				$data = $this->input->post();
				print_r($data);die;
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

		public function accPermisionFeedback(){$this->accPermision();}
		public function accPermisionFvol(){$this->accPermision();}
		public function accPerForEvent(){$this->accPermision();}
		public function ticketAcc(){$this->accPermision();}

		public function accPermision()
		{
			$post = $this->input->post();
			$return = '';
			$tableMap = [
				'cms_volunteer' => 'accPermisionFvol',
				'cms_event' => 'accPerForEvent',
				'feedback' => 'accPermisionFeedback',
				'ticket' => 'ticketAcc',
			];
			$tableName = array_search($this->router->fetch_method(), $tableMap); 
			if (!$tableName) {
				$return = ['msg' => "Invalid operation.", 'action' => '', 'tClor' => '#db3704'];
				echo json_encode($return);
				return;
			}
			if ($post['oprType'] == 'viewDelete') {
				$isMember = $this->common->getRowData($tableName, 'id', $post['id']);
				if ($isMember) {
			   $return = [
			   'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Do you wish to delete <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span> ?.',
			   'action' => 'cnfDeleteDetail===employee/front_cms/' . $this->router->fetch_method() . '===' . $isMember->id,
			   'tClor' => '#db3704'
			   ];} else {
			   $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];}
			   } else if ($post['oprType'] == 'cnfDeleteDetail') {
			   $isMember = $this->common->getRowData($tableName, 'id', $post['id']);
			   if ($isMember) {
			   $deltResult = $this->common->del_data_multi_con($tableName, ['id' => $post['id']]);
			   if ($deltResult) {
			   $return = [
			  'msg' => '<i class="fa-regular fa-circle-check"></i> Data deletion completed.<br>
			  <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span> has been removed.',
			  'action' => 'success',
			  'tClor' => '#008038'
			   ];} else {
			   $return = [
			   'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Deletion failed for <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span>.<br>
			    Please check the details and try again.',
			   'action' => 'errorShw',
			   'tClor' => '#db3704'
			   ];}} else {
			   $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];}
			  } else {
				$return = ['msg' => "Invalid operation type.", 'action' => '', 'tClor' => '#db3704'];
			  }
			sleep(1);
			echo json_encode($return);
		}


		public function manageVolSta(){$where=array('tblName'=>'cms_volunteer','actnUrl'=>'miStatusChange===employee/front_cms/manageVolSta===');$this->manageStatus($where);}
		public function ticketStatus(){$where=array('tblName'=>'ticket','actnUrl'=>'miStatusChange===employee/front_cms/ticketStatus===');$this->manageStatus($where);}


		public function manageStatus($where){
		$post=$this->input->post();
		if($post['oprType']=='miStatusView')
		{$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
		 if($getData){
		 if($getData->status=='Active'){	
		 $msg=array(
		 'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->shift_name.' of ID #'.$getData->id,
		 'action'=>$where['actnUrl'].$getData->id);
		 }else{
		 $msg=array(
		'msg'=>'Are you sure want to activate '.$getData->cms_volunteer.' of ID #'.$getData->id,
		'action'=>$where['actnUrl'].$getData->id)
		;}}else{
		$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
		}echo json_encode($msg);}
		elseif($post['oprType']=='miStatusChange')
		{sleep(2);
		$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
		if($getData->status==1){
		$change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
		}else{
		$change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
		$changeArr=array('status'=>$change);
		$result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
		if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
		echo json_encode($msg);
		}
		}
	



			

		



	
}
