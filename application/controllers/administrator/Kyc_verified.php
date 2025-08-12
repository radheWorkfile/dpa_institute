<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kyc_verified extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : '';
		$this->load->model(array('administrator/Kyc_Modle' => 'kyc_model'));
		$this->lgCat = $this->session->userdata['user_cate'];
		$this->logID = $this->session->userdata['user_id'];
		error_reporting(0);
	}

    public function accPermisionFkyc(){$this->accPermissionUnified();}

    public function index($action = Null, $getId = NULL)
    {

      $actionBtn='<div style="text-align:right;"><a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
      <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
      '.$isDel.'
    </div>';

    
        if($action === 'kycList'){
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;           
            $record = $this->kyc_model->kycModel($post_data);
            foreach ($record as $row) {
              $editUid = base_url('administrator/kyc_verified/index/edit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
              $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
              $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/kyc_verified/accPermisionFkyc===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
              $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $editUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>'. $isDel .'</div>';
              // $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===administrator/kyc_verified/teamManStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Pending " id="arvs--'.$row->id.'">Approve</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/kyc_verified/teamManStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Approve" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Pending...</a>';
              $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===administrator/kyc_verified/teamManStatus==='.$row->id.'" title="Click to Pending " id="arvs--'.$row->id.'">Approve</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/kyc_verified/teamManStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Approve" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Pending...</a>';
            //   $shortDescription = (mb_strlen($row->discription) > 15) ? mb_substr($row->discription, 0, 15) . '...': $row->discription;
                  $return['data'][] = array('<div style="padding-left:10px"><strong>' . $i . '.</strong></div>',
                  '<b>'.$row->empId.'</b>',
                  $row->name,
                  $row->mobile,
                  $row->aadhaar_no,
                  $row->pan_no,
                  $status,
                  $actionBtn
              );
              $i++;
              }
            $return['recordsTotal'] = $this->kyc_model->kyc_total_count($whereCn);
            $return['recordsFiltered'] = $this->kyc_model->kyc_filter_count($post_data, $whereCn);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
          }elseif($action === 'edit'){
            $whereCon = json_decode(base64_decode(urldecode($getId)));
            $empDetails = $this->db->select('*')->from('kyc_table')->where('id',$whereCon->id)->get()->row();
            $return=array(
                'title'=>'Manage KYC',
                'breadcrums'=>'Manage KYC',
                'emp_det'=>$empDetails,
                'targetItem' => base_url('administrator/Kyc_verified/index/update'),
                'layout'=>'admin/kyc/add_kyc.php',
                );
                $this->load->view('base',$return);
          }elseif($action === 'update'){
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
                'mobile'               => $this->input->post('mobile'),
                'email'                => $this->input->post('email'),
                'address'              => $this->input->post('address'),
                'bank_name'            => $this->input->post('bank_name'),
                'holder_name'          => $this->input->post('holder_name'),
                'acc_no'               => $this->input->post('acc_no'),
                'ifsc_code'            => $this->input->post('ifsc_code'),
                'aadhaar_no'           => $this->input->post('aadhaar_no'),
                'pan_no'               => $this->input->post('pan_no'),
                'create_user_type_id'  => $user_id,
                'status'               => 2,
                'created_at'           => date('Y-m-d'),
              );
              $updateData = $this->db->where('id',$this->input->post('id'))->update('kyc_table',$item);
                if ($updateData) {
                    $msg=array(' Thank You! your Donation completed successfully...');
                    $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                    'returnLoc'=>base_url('administrator/kyc_verified'));
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
            $return=array(
            'title'=>'Manage KYC',
            'breadcrums'=>'Manage KYC',
            'targetItemLIst' => base_url('administrator/Kyc_verified/index/kycList'),
            'layout'=>'admin/kyc/manage_kyc.php',
            );
            $this->load->view('base',$return);
        }
       
    }
    

   
    public function accPermissionUnified() {
      $post = $this->input->post();
      $return = '';
      $tableMap = ['kyc_table' => 'accPermisionFkyc',];
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
          'action' => 'cnfDeleteDetail===administrator/kyc_verified/' . $this->router->fetch_method() . '===' . $isMember->id,
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

         
      public function teamManStatus(){$where=array('tblName'=>'kyc_table','actnUrl'=>'miStatusChange===administrator/kyc_verified/teamManStatus===');$this->manageStatus($where);}


      public function manageStatus($where){
      $post=$this->input->post();
      if($post['oprType']=='miStatusView')
      {$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
       if($getData){
       if($getData->status=='Active'){	
       $msg=array(
       'msg'=>'<i class="si si-power"></i> Are you sure want to Pending '.$getData->name.' of ID #'.$getData->id,
       'action'=>$where['actnUrl'].$getData->id);
       }else{
       $msg=array(
      'msg'=>'Are you sure want to Approve '.$getData->name.' of ID #'.$getData->id,
      'action'=>$where['actnUrl'].$getData->id)
      ;}}else{
      $msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
      }echo json_encode($msg);}
      elseif($post['oprType']=='miStatusChange')
      {sleep(2);
      $getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
      if($getData->status==1){
      $change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Pending...','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
      }else{
      $change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Approve','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
      $changeArr=array('status'=>$change);
      $result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
      if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
      echo json_encode($msg);
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
