<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kyc_verified extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
        $this->logID = $this->session->userdata['user_id'];
        $this->load->model(array('employee/Kyc_Modle' => 'kyc_model'));
        error_reporting(0);
    }

    public function index($action = NULL)
    {	
            if($action === 'kyc_details'){
            $user_id = $this->session->userdata('user_id');
            $aadhaar_image = $this->upload_image('kyc_verify', 'aadhaar_img');
            $pan_image = $this->upload_image('kyc_verify', 'pan_img');
            $passbook_image = $this->upload_image('kyc_verify', 'passbook_img');
            if ($aadhaar_image['icon'] === 'success' && $pan_image['icon'] === 'success' && $passbook_image['icon'] === 'success') {
            $item = array(
                'aadhaar_image'        => $aadhaar_image['text'],   
                'pan_image'            => $pan_image['text'],        
                'passbook_image'       => $passbook_image['text'],   
                'name'                 => $this->input->post('user_name'),
                'emp_id'               => $this->input->post('emp_id'),
                'mobile'               => $this->input->post('mobile'),
                'email'                => $this->input->post('email'),
                'address'              => $this->input->post('address'),
                'bank_name'            => $this->input->post('bank_name'),
                'holder_name'          => $this->input->post('holder_name'),
                'acc_no'               => $this->input->post('acc_no'),
                'ifsc_code'            => $this->input->post('ifsc_code'),
                'aadhaar_no'           => $this->input->post('aadhaar_no'),
                'pan_no'               => $this->input->post('pan_no'),
                'status'               => 2,
                'created_at'           => date('Y-m-d'),
              );
                if ($this->db->insert('kyc_table', $item)) {
                    $data = array('kyc_status'  => 2);
                    $this->db->where('id',$user_id)->update('cordinator_manage',$data);
                    $msg=array(' Thank You! Your Kyc Completed successfully...');
                    $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                    'returnLoc'=>base_url('employee/kyc_verified'));
                } else {
                $msg=array('Oops it seems error.please refresh you page.');
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                }
                } else {
                $msg=array($aadhaar_image['text'] && $pan_image['text'] && $passbook_image['text']);
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                } 
                echo json_encode($return);
           }else{
              $emp_details = $this->db->select('id,first_name,last_name,email_id,mobile_number,address')->from('cordinator_manage')->where('id',$this->session->userdata('user_id'))->get()->row();
              $kyc_update = $this->db->select('*')->from('kyc_table')->where('emp_id',$emp_details->id)->get()->row();
            $return=array(
                'title'=>'Manage KYC',
                'breadcrums'=>'Manage KYC',
                'emp_det'=>$emp_details,
                'kyc'=>$kyc_update,
                'targetItem' => base_url('employee/kyc_verified/index/kyc_details'),
                'layout'=>'kyc/add_kyc.php',
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
