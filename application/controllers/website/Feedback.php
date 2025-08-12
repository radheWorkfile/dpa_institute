<?php
  defined('BASEPATH') or exit('No direct script access allowed');
class Feedback extends CI_Controller
{
        public function __construct()
        {
        parent::__construct();
        $this->load->model(array('website/Feedback_model' => 'feedbackModel'));
        error_reporting(0);
        }

        public function index($action = null)
        {
          if($action === 'feedbackList')
          {
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;           
            $record = $this->feedbackModel->feedbackList_model($post_data);
            foreach ($record as $row) {
              $editUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
              $viewUid = base_url('website/ticketing/viewList/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
              $isDel = '<div style="text-align:center;"><a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/feedback/accPermision===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
              $actionBtn ='<div style="text-align:center; display:flex; justify-content:center; gap:10px;"><a href="' . $viewUid . '" class="btn btn-primary shadow btn-xs sharp" title="View"><i class="fas fa-eye"></i></a>'. $isDel .'</div>';
              $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===donation/donatePay/donateStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===donation/donatePay/donateStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
              $shortDescription = (mb_strlen($row->discription) > 15) ? mb_substr($row->discription, 0, 15) . '...': $row->discription;
              $feedback = (mb_strlen($row->feedback) > 25) ? mb_substr($row->feedback, 0, 25) . '...': $row->discription;
              $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',

              '<div class="text-center">'.$row->name.'</div>',
              '<div class="text-center">'.$row->mobile.'</div>',
              '<div class="text-center">'.$feedback.'</div>',
              '<div class="text-center">'.$shortDescription.'</div>',
              '<div class="text-center">'.date('Y-m-d').'</div>',
              '<div class="text-center">'.$status.'</div>',
               $isDel
              );
              $i++;
          }
          
            $return['recordsTotal'] = $this->feedbackModel->feedbackList_total_count($whereCn);
            $return['recordsFiltered'] = $this->feedbackModel->feedbackList_filter_count($post_data, $whereCn);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
          }else{
            $return = array(
              'title' => 'Manage Feedback',
              'breadcrums' => 'Create Feedback',
              'targetList' => base_url('website/feedback/index/feedbackList'),
              'layout' => 'front_cms/feedback/manage_feedback.php',
              );
              $this->load->view('base', $return);
          }
        }
        
           
  public function accPermision(){$this->accPermissionUnified();}


  public function accPermissionUnified()
  {
      $post = $this->input->post();
      $return = '';
      $tableMap = [
          'feedback' => 'accPermision',
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
         'action' => 'cnfDeleteDetail===website/feedback/' . $this->router->fetch_method() . '===' . $isMember->id,
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
  
       



}
?>
