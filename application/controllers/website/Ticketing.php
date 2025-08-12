<?php
  defined('BASEPATH') or exit('No direct script access allowed');
class Ticketing extends CI_Controller
{

      public function __construct()
      {
          parent::__construct();
          ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
          $this->lgCat = $this->session->userdata['user_cate'];
          $this->load->model(array('website/ticket_model' => 'ticModel'));
          error_reporting(0);
      }

      // subject  askedQuestion

      public function create_ticket(){
        echo "Hello con";die;
      $data = $this->input->post();
      $lastTicket = $this->db->select('id, ticket_id')->from('ticket')->order_by('id', 'DESC')->limit(1)->get()->row();
      if (!empty($lastTicket)) {
          $ticketId = 'TIC' . str_pad((int)substr($lastTicket->ticket_id, 3) + 1, 4, '0');
      } else {
          $ticketId = 'TIC1001';
      }
      $ticketData = array(
        'ticket_id'      => $ticketId,
        'mem_id'         => $data['ticMemId'],
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
            'mem_id'       => $data['ticMemId'],
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

        public function ticView()
        {
          $segment = $this->uri->segment(4);
          $memID = $this->session->userdata('mem_id');
          $ticketDetails = $this->db->select('id,ticket_id,')->from('ticket')->where('id',$segment)->get()->row();
          $mem_data = $this->db->select('id,member_id,name,mobile_number,email_id')->from('manage_member')->where('id',$mem_id)->get()->row();
          $ticketAnswer = $this->db->select('*')->from('ticket_suggestions')->where(array('ticket_id'=>$ticketDetails->id))->get()->result_array();
            $return = array(
            'title'        => 'Manage Ticket',
            'breadcrums'   => 'Create Ticket',
            'mem_data'     => $mem_data,
            'ticketDetails'=> $ticketDetails,
            'ticketAnswer' => $ticketAnswer,
            'memID'       => $memID,
            'segment'       => $segment,
            'ticketingViewShow'  =>  'Yes',
            'layout'       => 'member/base_file/ticket_test.php',
            );
            $this->load->view('base_member', $return);
        }


        public function ticketAnswer()
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

        public function index($type = null)
        {
          if($type === 'create_ticket')
          {
            $adminTicId = $this->session->userdata('user_id');
            $lastTicSugMessId = $this->db->select('*')->from('ticket_suggestions')->order_by('id', 'DESC')->get()->row(); 
            $lastTicId = $this->db->select('*')->from('ticket')->order_by('id', 'DESC') ->limit(1)->get()->row(); 
            $data = $this->input->post();
            $getID = 'TIC' . str_pad(rand(0, 9999), 4, '0');
            $replyId = 'ANS' . str_pad(rand(0, 9999), 4, '0');
            $value = array(
           'ticket_id'              => $adminTicId,
           'mem_id'                 => $adminTicId,
           'reply_id'               => $replyId,
           'subject'                => $data['subject'],
           'discription'            => $data['text'],
           'created_at'             => date('Y-m-d'), 
           'status'                 => 2,);
           if($this->common->save_data('ticket_suggestions', $value))
           {if($adminTicId != $lastTicSugMessId->mem_id){
            $masterDetails = array(
           'ticket_id'              => $adminTicId,
           'mem_id'                 => $adminTicId,
           'subject'                => $data['subject'],
           'description'            => $data['text'],
           'created_at'             => date('Y-m-d'), 
           'status'                 => 2, 
           'created_by_user_type_id'=> $adminTicId,
            );
            $this->common->save_data('ticket', $masterDetails);
            redirect(site_url('website/ticketing'));
             }
              redirect(site_url('website/ticketing'));
              } else {
                redirect(site_url('website/ticketing'));
            }
          }elseif($type === 'ticketList'){
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;           
            $record = $this->ticModel->ticketList_model($post_data);
            // print_r($record);die;
            foreach ($record as $row) {
            $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
            $editUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
            //$deleteUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
            $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/ticketing/accPermision===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a></div>';
            $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $viewUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-eye"></i></a>'. $isDel .'</div>';
            $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===website/ticketing/ticketStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===website/ticketing/ticketStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
              $open = '<a href="ticketing/sugg/' . $row->id . '" class="sRvSuspnd bg-info text-white">Open</a>';
              $shortText = (mb_strlen($row->e_text) > 20) ? mb_substr($row->e_text, 0, 20) . '...' : $row->e_text;
              $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
              '<div class="text-center">'.$row->ticket_id.'</div>',
              '<div class="text-center">'.$row->subject.'</div>',
              '<div class="text-center">'.$row->created_at.'</div>',
              '<div class="text-center">'.$status.'</div>',
              '<div class="text-center">'.$open.'</div>',
              );
              $i++;
          }
          $return['recordsTotal'] = $this->ticModel->ticketList_total_count($whereCn);
          $return['recordsFiltered'] = $this->ticModel->ticketList_filter_count($post_data, $whereCn);
          $return['draw'] = $post_data['draw'];
          echo json_encode($return);
          }elseif($type === 'viewDetails')
          {
            $getArr=urlencode(base64_encode(json_encode(array('targetData'=>'deactive','m_type'=>'3'))));
            $data = $this->input->post();
            print_r($data);die;
          }else{
            $return = array(
              'title' => 'Manage Ticket',
              'breadcrums' => 'Create Ticket',
              'layout' => 'front_cms/ticket/ticket.php',
              'targetList' => base_url('website/ticketing/index/ticketList'),
              );
              $this->load->view('base', $return);
          }
        }


        public function sugg()
        {
            $ticId = $this->uri->segment(4);
            $mem = $this->db->select('mem_id')->from('ticket')->where(array('id'=>$ticId))->get()->row();
            $mem_det = $this->db->select('id,name')->from('manage_member')->where(array('id'=>$mem->mem_id))->get()->row();
            $getData = $this->db->select('*')->from('ticket_suggestions')->where(array('ticket_id'=>$ticId))->get()->result_array();
            $return = array(
            'title' => 'Ticket Suggestions ',
            'breadcrums' => 'Create Ticket',
            'getData' => $getData,
            'ticId' => $ticId,
            'memdet' => $mem_det,
            'layout' => 'front_cms/ticket/ticket_sugg.php',
            );
            $this->load->view('base', $return);
        }
        
        public function ticSuggAns()
        {
          $adminId = $this->session->userdata('user_id');
          $ticketAns = $this->db->select('reply_id')->from('ticket_suggestions')->order_by('id', 'DESC')->limit(1)->get()->row();
          if (!empty($ticketAns)) {
            $reply_id = $ticketAns->reply_id + 1;
          } else {
            $reply_id = 1001;
           }
          $data = $this->input->post();

           $value = array(
              'ticket_id'       =>   $data['id'],
              'mem_id'          =>   '1001',
              'reply_id'        =>   $reply_id,
              'name'            =>   'Admin',
              'email'           =>   'admin@g.com',
              'discription'     =>   $data['answer'],
              'created_at'      =>   date('Y-m-d'),
              'status'          =>   1, 
           );

            if($this->db->insert('ticket_suggestions',$value))
            {
              $msg=array(' Thank You! uploaded successfully');
              $return=array('addClas'=>'tSuccess','msg'=>$msg,
              'icon'=>'<i class="fa-regular fa-circle-check"></i>',
              'getLatestChat'=>'<p class="text-dark" id="admin-message-part">'.$data['answer'].'</p>',
              'returnLoc'=>base_url('website/ticketing'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }
            echo json_encode($return);
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


  public function accPermision()
  {
      $post = $this->input->post();
      $return = '';
      $tableMap = [
          'mem_ticket' => 'accPermision',
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
         'action' => 'cnfDeleteDetail===website/ticketing/' . $this->router->fetch_method() . '===' . $isMember->id,
         'tClor' => '#db3704'
         ];
         } else {
         $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];
         }
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
         ];
         }
         } else {
         $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];
          }
      } else {
          $return = ['msg' => "Invalid operation type.", 'action' => '', 'tClor' => '#db3704'];
      }
      sleep(1);
      echo json_encode($return);
  }
  

  
  public function ticketStatus(){
    $where=array('tblName'=>'ticket','actnUrl'=>'miStatusChange===website/ticketing/ticketStatus===');$this->manageStatus($where);
  }


  public function manageStatus($where){
  $post=$this->input->post();
  if($post['oprType']=='miStatusView')
  {$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
   if($getData){
   if($getData->status=='Active'){	
   $msg=array(
   'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->name.' of ID #'.$getData->id,
   'action'=>$where['actnUrl'].$getData->id);
   }else{
   $msg=array(
  'msg'=>'Are you sure want to activate '.$getData->name.' of ID #'.$getData->id,
  'action'=>$where['actnUrl'].$getData->id)
  ;}}else{
  $msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
  }echo json_encode($msg);}
  elseif($post['oprType']=='miStatusChange')
  {sleep(2);
  $getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
  if($getData->status==1){
  $change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
  }else{
  $change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
  $changeArr=array('status'=>$change);
  $result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
  if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
  echo json_encode($msg);
  }
  }



}
?>
