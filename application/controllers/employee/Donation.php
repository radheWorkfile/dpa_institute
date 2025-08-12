<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
        $this->logID = $this->session->userdata['user_id'];
        $this->load->model(array('employee/Donation_model' => 'donation'));
        error_reporting(0);
    }

    public function index($action = NULL)
    {	
        if($action === 'listManage'){
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;
            $record = $this->donation->donate_pay_model($post_data);
    
            foreach ($record as $row) {
                $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/donation/accPerForDonAmo===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
                $actionBtn = '<div style="text-align:center;">' . $isDel . '</div>';
                $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===employee/donation/donateStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===employee/donation/donateStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
                $amount = $row->amount ? '<span class="success">₹ ' . $row->amount . '</span>' : '<span class="text-danger">N/A</span>';
                $image= '<span><img src="' . base_url($row->image) . '" class="imageView" alt="" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
                $return['data'][] = array(
                    '<div class="text-center"><strong>' . $i . '.</strong></div>',
                    '<div class="text-center" style="font-weight:800;">'.$row->donation_id.'</div>',
                    '<div class="text-center">'.$row->name.'</div>',
                    '<div class="text-center">'.$row->mobile_no.'</div>',
                    '<div class="text-center">'.$image.'</div>',
                    '<div class="text-center">'.$amount.'.00'.'</div>',
                    '<div class="text-center">'.$status.'</div>',
                    $actionBtn
                );
                $i++;
            }
    
            $return['recordsTotal'] = $this->donation->total_count();
            $return['recordsFiltered'] = $this->donation->total_filter_count($post_data);
            echo json_encode($return);  
          }elseif($action == 'manage'){
            $return=array(
            'title'=>'Donation',
            'breadcrums'=>'Donation Management',
            'targetItemLIst'=> base_url('employee/donation/index/listManage'),
            'layout'=>'donation/manage.php',
            );
            $this->load->view('employee/base',$return);   
        }elseif($action === 'add_donation'){
        $user_id = $this->session->userdata('user_id');

        $last_don_id = $this->db->select('donation_id')->from('donate')->order_by('id', 'DESC')->limit(1)->get()->row_array();
        $new_don_id = empty($last_don_id) ? 'DAMO1001' : 'DAMO' . str_pad((int) substr($last_don_id['donation_id'], 4) + 1, 4, '0');

        $uploaded_image = $this->upload_image('donation', 'previewImage');
                if ($uploaded_image['icon'] === 'success') {

                $value = $this->input->post();

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
                    'create_user_type_id'  => $user_id,
                    'status'               => 2,
                    'created_at'           => date('Y-m-d'),
                  );
                if ($this->db->insert('donate', $item)) {

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

                    $msg=array(' Thank You! your Donation completed successfully...');
                    $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                    'returnLoc'=>base_url('employee/donation/index/manage'));
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
            $return=array(
                'title'=>'Add Donation',
                'breadcrums'=>'Add Donation',
                'targetItem' => base_url('employee/donation/index/add_donation'),
                'layout'=>'donation/add_donation.php',
            );
            $this->load->view('employee/base',$return);   
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



  public function accPerForDonAmo(){$this->accPermissionUnified();}
  public function accPermissionUnified() {
    $post = $this->input->post();
    $return = '';
    $tableMap = ['donate' => 'accPerForDonAmo',];
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
       'action' => 'cnfDeleteDetail===employee/donation/' . $this->router->fetch_method() . '===' . $isMember->id,
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



public function donateStatus(){$where=array('tblName'=>'donate','actnUrl'=>'miStatusChange===employee/donation/donateStatus===');$this->manageStatus($where);}


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
