<?php
  defined('BASEPATH') or exit('No direct script access allowed');
class DonatePay extends CI_Controller
{
        public function __construct()
        {
        parent::__construct();
        $this->load->model(array('donation/Donation_model' => 'donate_model'));
        error_reporting(0);
        }

        public function index($action = NULL)
        {
            if ($action === 'showDonationList') {
                $post_data = $this->input->post();
                $return['data'] = array();
                $i = $post_data['start'] + 1;
                $record = $this->donate_model->donate_pay_model($post_data);
        
                foreach ($record as $row) {
                    $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===donation/DonatePay/accPerForNews===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
                    $actionBtn = '<div style="text-align:center;">' . $isDel . '</div>';

                    $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===donation/donatePay/donateStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'" >Active</a>':'<a href="javascript:void()" data-id="miStatusView===donation/donatePay/donateStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';

                    $amount = $row->amount ? '<span class="success">₹ ' . $row->amount . '</span>' : '<span class="text-danger">N/A</span>';
                    $image= '<span><img src="' . base_url($row->image) . '" class="imageView" alt="" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
                    $return['data'][] = array(
                        '<div class="text-center"><strong>' . $i . '.</strong></div>',
                        '<div class="text-center" style="font-weight:800;">'.$row->donation_id.'</div>',
                        '<div class="text-center">'.$row->name.'</div>',
                        '<div class="text-center">'.$row->email.'</div>',
                        '<div class="text-center">'.$row->mobile_no.'</div>',
                        '<div class="text-center">'.$image.'</div>',
                        '<div class="text-center">'. $amount.'.00'.'</div>',
                        '<div class="text-center">'. $status.'</div>',
                        $actionBtn
                    );
                    $i++;
                }
        
                $return['recordsTotal'] = $this->donate_model->total_count();
                $return['recordsFiltered'] = $this->donate_model->total_filter_count($post_data);
                echo json_encode($return);
            } else {
                $return = array(
                    'title' => 'Manage Donation',
                    'breadcrums' => 'Manage Donation',
                    'layout' => 'donation/man_donation.php',
                    'targetDonationList' => base_url('donation/donatePay/index/showDonationList')
                );
                $this->load->view('base', $return);
            }
        }


        public function create_event()  
        {
             $uploaded_image = $this->upload_image('event', 'previewImage');
             if ($uploaded_image['icon'] === 'success') {
             $image_item = array(
             'e_images'  => $uploaded_image['text'],         
             'e_heading' => $this->input->post('slider_heading'), 
             'e_text' => $this->input->post('slider_text')     
             );
             if ($this->db->insert('cms_event', $image_item)) {
             echo json_encode(array('status' => 'success', 'message' => 'Created successfully!'));
             return;
             } else {
             echo json_encode(array('status' => 'error', 'message' => 'Please try again later.'));
             return;
             } } else { echo json_encode(array('status' => 'error', 'message' => $uploaded_image['text'])); return;}
        }


        public function accPerForNews(){$this->accPermissionUnified();}
        public function accPermissionUnified() {
          $post = $this->input->post();
          $return = '';
          $tableMap = ['donate' => 'accPerForNews',];
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
             'action' => 'cnfDeleteDetail===donation/DonatePay/' . $this->router->fetch_method() . '===' . $isMember->id,
             'tClor' => '#db3704'
             ];
             } else {
             $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];
             }
          } else if ($post['oprType'] == 'cnfDeleteDetail') {
            $isMember = $this->common->getRowData($tableName, 'id', $post['id']);
            if ($isMember) {
            $deltResult = $this->common->del_data_multi_con($tableName, ['id' => $post['id']]);
            $deltResult = $this->common->del_data_multi_con( 'wallets', ['donation_id' => $post['id']]);
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



      public function donateStatus(){$where=array('tblName'=>'donate','actnUrl'=>'miStatusChange===donation/donatePay/donateStatus===');$this->manageStatus($where);}


      public function manageStatus($where){
      $post=$this->input->post();
      if($post['oprType']=='miStatusView')
      {$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
       if($getData){
       if($getData->status=='Active'){	
       $msg=array(
       'msg'=>'<i class="fa fa-power-off"></i> Are you sure want to deactivate '.$getData->name.' of ID #'.$getData->id,
       'action'=>$where['actnUrl'].$getData->id);
       }else{
       $msg=array(
      'msg'=>'<i class="fa fa-power-off"></i> Are you sure want to activate '.$getData->name.' of ID #'.$getData->id,
      'action'=>$where['actnUrl'].$getData->id)
      ;}}else{
      $msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
      }echo json_encode($msg);}
      elseif($post['oprType']=='miStatusChange')
      {sleep(0.5);
      $getData = $this->common->getRowData($where['tblName'], 'id', $post['id']);
      if ($getData->status == 1) {
            $change = '2';
            $msg = array(
                'msg' => '<span class="text-success"><i class="fa fa-check-circle"></i> You have successfully deactivated ' . $getData->name . ' of ID #' . $getData->id . '</span>',
                'btnTxt' => 'Deactive','btnAdCls' => 'bg-danger','btnRmvCls' => 'bg-success miLvs'
            );
            $this->db->where($where['tblName'], 'id', $post['id'])->delete('donation_id', 'wallets');
            } else {
            sleep(0.5);
            $change = '1';
            $msg = array(
                'msg' => '<span class="text-success"><i class="fa fa-check-circle"></i> You have successfully activated ' . $getData->name . ' of ID #' . $getData->id . '</span>',
                'btnTxt' => 'Active','btnAdCls' => 'bg-success miLvs','btnRmvCls' => 'bg-danger'
            );
           
             $member_check = $this->db->select('mobile_number')->from('manage_member')->where('mobile_number',$getData->mobile_no)->get()->row();

             if (!$member_check) {
              
                $guestdetails = $this->db->select('*')->from('guest_member')->where(array('mobile_number' => $getData->mobile_no)) ->get()->row();
            
                $getID = rand(100000000, 999999999);

                $insertArr = array(
                    'member_id' => $getID,
                    'm_type' => 3,
                    'name' => $guestdetails->name,
                    'mobile_number' => $guestdetails->mobile_number,
                    'email_id' => $guestdetails->email_id,
                    'password' => md5($guestdetails->mobile_number),
                    'show_password' => $guestdetails->mobile_number,
                    'status' => 'Active',
                    'created_by' => $guestdetails->created_by_user_type_id, 
                    'created_type' => $guestdetails->created_by_user_type_id,
                    'create_date' => date('Y-m-d H:i:s')
                );
            
                $isRegister = $this->common->save_data('manage_member', $insertArr);
            
                $this->db->where(array('mobile_number' => $getData->mobile_no))->delete('guest_member');
            }
                
        }
        $changeArr = array('status' => $change);
        $result = $this->common->update_data($where['tblName'], array('id' => $post['id']), $changeArr);
        $this->db->where('donation_id', $getData->id);
    
        $existingWallet = $this->db->get('wallets')->row();
        if ($existingWallet) {
            if ($getData->status == 1) {$newAmount = 0;  } else {$newAmount = $getData->amount; }
            if ($newAmount == 0) {$newStatus = 2; } else {$newStatus = 1; }
            $this->db->where('donation_id', $getData->id)->update('wallets', array('amount' => $newAmount, 'status' => $newStatus));
        } else {
            $data = array('amount' => $getData->amount,'donation_id' => $getData->id,'status' => 1 );
            $this->db->insert('wallets', $data);
        }
        if ($result) {
    		$msg = $msg;
    		$msg['reloadPage'] = base_url('donation/donatePay'); 
		} else {
    		$msg = array('msg' => '<span class="text-danger">Oops, it seems something went wrong while updating.</span>');
		}
      echo json_encode($msg);
      }
      }

    

        
      

}