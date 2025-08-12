<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Work_assign extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
		$this->load->model(array('administrator/Work_assign_model' => 'workModel'));
        $this->lgCat = $this->session->userdata['user_cate'];
        error_reporting(0);
    }



    public function index($action = NULL, $getId = NULL)
    {
       if($action === 'ManageList'){
        $post_data = $this->input->post();
        $return['data'] = array();
        $i = $post_data['start'] + 1;
        $record = $this->workModel->work_assign_model($post_data);
        foreach ($record as $row) {

            $viewUid = base_url('administrator/work_assign/index/workView/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
			$editUid = base_url('administrator/work_assign/workEdit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
            $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/work_assign/accPerForWorkAssign===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';
            $actionBtn = '<div style="text-align:center;">
							<a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
							' . $isDel . '
						</div>';
            $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===administrator/work_assign/work_assign==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Pending... " id="arvs--'.$row->id.'">Running</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/work_assign/work_assign==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Running..." class="badge bg-danger getAction px-2" id="arvs--'.$row->id.'">Pending</a>';
            $amount = $row->amount ? '<span class="success">₹ ' . $row->amount . '.00'. '</span>' : '<span class="text-danger">N/A</span>';
            $image= '<span><img src="' . base_url($row->image) . '" class="imageView" alt="" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';

                    if($row->project != '')
                    {
                        $project = $this->db->select('project_name')->from('category_project')->where('id',$row->project)->get()->row();
                        $workName = $project->project_name?$project->project_name:'<b style="color:##b00a0a;">N/A </b>';
                    }elseif($row->program != '')
                    {
                        $project = $this->db->select('program_name')->from('category_program')->where('id',$row->program)->get()->row();
                        $workName = $row->program;
                    }elseif($row->event_name != '')
                    {
                        $workName = $row->event_name;
                    }else{
                        $workName = $row->other_event_name;
                    }

                    $return['data'][] = array(
                        '<div class="text-center"><strong>' . $i . '.</strong></div>',    
                        '<b class="text-danger text-center">'.$row->ass_work_id.'</b>',
                        '<div class="text-center"><b>'.$row->empId.'</b></div>',
                        '<div class="text-center">'.$row->empName.'</div>',
                        '<div class="text-center">'.$workName.'</div>',
                        '<div class="text-center">'.$row->location.'</div>',
                        '<div class="text-center">'.$amount.'</div>',
                        '<div class="text-center">'.$row->startDate.'</div>',
                        '<div class="text-center">'.$status.'</div>',
                        $actionBtn
                    );
                    $i++;
        }
        $return['recordsTotal'] = $this->workModel->work_assign_total_count();
        $return['recordsFiltered'] = $this->workModel->work_assign_filter_count($post_data);
        echo json_encode($return);
       }elseif($action === 'workView'){
        $whereCon = json_decode(base64_decode(urldecode($getId)));
        $workDetails = $this->db->select('w.*,w.created_at as startDate,emp.user_id as empId,emp.first_name as empName')->from('work_permission as w')->where('w.id',$whereCon->id)->join('cordinator_manage as emp','emp.id=w.emp_id')->get()->row();
        $projectData = $this->db->select('*')->from('category_project')->order_by('id','DESC')->get()->result_array();
        $allProgram = $this->db->select('*')->from('category_program')->order_by('id','DESC')->get()->result_array();
        $allEmpLIst = $this->db->select('*')->from('cordinator_manage')->order_by('id','DESC')->get()->result_array();
        // echo "<pre>"; print_r($workDetails);die;
        $return = array(
        'title'      => 'Manage Work',
        'breadcrums' => 'Manage Work',
        'project'    => $projectData,
        'allEmpLIst' => $allEmpLIst,
        'allProgram' => $allProgram,
        'workDetails'=> $workDetails,
        'layout'     => 'admin/work_assign/edit_work.php',
        'targetItem' => base_url('administrator/work_assign/index/updateWrok'),
        );
        $this->load->view('base', $return); 
        }elseif($action === 'updateWrok'){
        $this->form_validation->set_rules('employee_id', 'Select employee', 'trim|required|xss_clean');
        $this->form_validation->set_rules('paymentMethod', 'Select Payment Method', 'trim|required|xss_clean');
        $this->form_validation->set_rules('location', 'Enter location', 'trim|required|xss_clean');
        $this->form_validation->set_rules('proAmount', 'Enter Amount', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
        $uploaded_image = $this->upload_image('event', 'previewImage');

        $value = $this->input->post();
        if ($uploaded_image['icon'] === 'success') {
            $primaryData = array(
                'payment_proof' => $uploaded_image['text'],  
                'emp_id'        => $value['employee_id'],
                'location'      => $value['location'],
                'amount'        => $value['proAmount'],
                'start_date'    => $value['s_date'],
                'message'       => $value['message'],
                'status'        => 2,
                'created_at'    => date('Y-m-d'),
            );
            
            if ($value['chooseWork'] == 1) {
                $choosework = array('project' => $value['projectName']);
            } elseif ($value['chooseWork'] == 2) {
                $choosework = array('program' => $value['programName']);
            } elseif ($value['chooseWork'] == 3) {
                $choosework = array('event_name' => $value['eventManage']);
            } else {
                $choosework = array('other_event_name' => $value['otherWork']);
            }
            
            if ($value['paymentMethod'] == 1) {
                $paymentData = array(
                    'payment_method' => $value['paymentMethod'],
                );
            } elseif ($value['paymentMethod'] == 2) {
                $paymentData = array(
                    'payment_method' => $value['paymentMethod'],
                );
            } elseif ($value['paymentMethod'] == 3) {
                $paymentData = array(
                    'receiver_name' => $value['rec_name'],
                    'receiver_number' => $value['number']
                );
            }
            $insertArr = array_merge($primaryData, $choosework, $paymentData);
            if ($this->db->where('id',$this->input->post('id'))->update('work_permission', $insertArr)) {
                $msg = array('Thank you! You have successfully updated your details');
                $data = array(
                    'addClas' => 'tSuccess',
                    'msg' => $msg,
                    'icon' => '<i class="fa-regular fa-circle-check"></i>',
                    'returnLoc' => base_url('administrator/work_assign')
                );
            } else {
                $msg = array('Oops! It seems there was an error. Please refresh your page.');
                $data = array(
                    'addClas' => 'tWarning',
                    'msg' => $msg,
                    'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                );
            }
            echo json_encode($data);
        }
        }
        }else{
        $projectData = $this->db->select('*')->from('category_project')->order_by('id','DESC')->get()->result_array();
        $allProgram = $this->db->select('*')->from('category_program')->order_by('id','DESC')->get()->result_array();
        $allEmpLIst = $this->db->select('*')->from('cordinator_manage')->order_by('id','DESC')->get()->result_array();
        $return = array(
        'title' => 'Manage Work',
        'breadcrums' => 'Manage Work',
        'project' => $projectData,
        'allEmpLIst' => $allEmpLIst,
        'allProgram' => $allProgram,
        'layout' => 'admin/work_assign/add_work.php',
        'targetItem' => base_url('administrator/work_assign/create'),
        'targetList' => base_url('administrator/work_assign/index/ManageList'),
        );
        $this->load->view('base', $return); 
       }

    }


    public function getEmployee()
	{
      $getID=$this->input->post('id');
	  $data=$this->db->select('*')->from('cordinator_manage')->where('user_role',$getID)->get()->result();
	  echo json_encode($data);
    }

      
    public function create() {
        $this->form_validation->set_rules('employee_id', 'Select employee', 'trim|required|xss_clean');
        $this->form_validation->set_rules('paymentMethod', 'Select Payment Method', 'trim|required|xss_clean');
        $this->form_validation->set_rules('location', 'Enter location', 'trim|required|xss_clean');
        $this->form_validation->set_rules('proAmount', 'Enter Amount', 'trim|required|xss_clean');
    
        if ($this->form_validation->run() == TRUE) {
            $uploaded_image = $this->upload_image('event', 'previewImage');
            $value = $this->input->post();
            $total_wallet_amo = $this->db->select_sum('w.amount')->from('wallets as w')->join('donate as do', 'do.id = w.donation_id')->where('do.status', 1)->get()->row_array();
            
            $assWorkId = $this->db->select('ass_work_id')->from('work_permission')->where('emp_id', $value['employee_id'])->order_by('id', 'DESC')->limit(1)->get()->row();
            
            if (!empty($assWorkId)) {
                $assWorkId = 'WID' . str_pad((int)substr($assWorkId->ass_work_id, 3) + 1, 4, '0');
            } else {
                $assWorkId = 'WID1001';
            }
    
            if (!empty($total_wallet_amo['amount'])) {
                $projectAmount = $total_wallet_amo['amount'] >= $value['proAmount'];
    
                if ($projectAmount) {
                    if ($uploaded_image['icon'] === 'success') {
                        $primaryData = array(
                            'payment_proof' => $uploaded_image['text'],  
                            'ass_work_id'   => $assWorkId,
                            'emp_id'        => $value['employee_id'],
                            'user_role'        => $value['coordinatorId'],
                            'location'      => $value['location'],
                            'amount'        => $value['proAmount'],
                            'start_date'    => $value['s_date'],
                            'message'       => $value['message'],
                            'status'        => 2,
                            'created_at'    => date('Y-m-d'),
                        );
    
                        if ($value['chooseWork'] == 1) {
                            $choosework = array('project' => $value['projectName']);
                        } elseif ($value['chooseWork'] == 2) {
                            $choosework = array('program' => $value['programName']);
                        } elseif ($value['chooseWork'] == 3) {
                            $choosework = array('event_name' => $value['eventManage']);
                        } else {
                            $choosework = array('other_event_name' => $value['otherWork']);
                        }
    
                        if ($value['paymentMethod'] == 1 || $value['paymentMethod'] == 2) {
                            $paymentData = array('payment_method' => $value['paymentMethod']);
                        } elseif ($value['paymentMethod'] == 3) {
                            $paymentData = array(
                                'receiver_name' => $value['rec_name'],
                                'receiver_number' => $value['number']
                            );}
    
                        $insertArr = array_merge($primaryData, $choosework, $paymentData);
                        if ($this->common->save_data('work_permission', $insertArr)) {
                            $msg = array('Thank you! Your project assignment created Successfully.');
                            $data = array(
                                'addClas' => 'tSuccess',
                                'msg' => $msg,
                                'icon' => '<i class="fa-regular fa-circle-check"></i>',
                                'returnLoc' => base_url('administrator/work_assign')
                            );} else {
                            $msg = array('Oops! It seems there was an error. Please refresh your page.');
                            $data = array(
                                'addClas' => 'tWarning',
                                'msg' => $msg,
                                'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                            );}}} else {
                    $msg = array('Insufficient balance in your wallet.');
                    $data = array(
                        'addClas' => 'tWarning',
                        'msg' => $msg,
                        'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                );}} else {
                $msg = array('Please check your wallet balance.');
                $data = array('addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                );}} else {
            $msg = array('You have insufficient balance for this project assignment.');
            $data = array('addClas' => 'tWarning','msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
            );
        }
        echo json_encode($data);
    }
    



   public function running_work($type = NULL )
   {
       if($type === 'ManageList'){
         
        $post_data = $this->input->post();
        $return['data'] = array();
        $i = $post_data['start'] + 1;
        $record = $this->workModel->running_work_model($post_data);  

        foreach ($record as $row) {

            $running_work_amount = $this->db->select_sum('expense_amo')->from('work_running')->where(array('ass_work_id' => $row->ass_work_id, 'working_status' =>  2, 'status' => 1))->get()->row_array();
            
            $closedWork = $this->db->select('id,ass_work_id,working_status')->from('work_permission')->where('emp_id',$row->emp_id)->get()->row();

            if($closedWork->working_status == 3)
            {
                $status = '<span class="badge bg-danger py-1 px-3 getAction miLvs" href="javascript:void(0)">Closed</span>';
            }
            else{
             $status = ($row->status == 1) ? '<span class="badge bg-success py-1 px-2 getAction miLvs" href="javascript:void(0)">Running...</span>' : '';
            }

            $viewUid = base_url('administrator/work_assign/index/workView/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
			$editUid = base_url('administrator/work_assign/workEdit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
            $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/work_assign/accPerForRunning_work===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';
            $actionBtn = '<div style="text-align:center;">
							' . $isDel . '
						</div>';
            $amount = $row->amount ? '<span class="success">₹ ' . $row->amount . '.00'. '</span>' : '<span class="text-danger">N/A</span>';
            $image= '<span><img src="' . base_url($row->image) . '" class="imageView" alt="" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';

                    if($row->project != '')
                    {
                        $project = $this->db->select('project_name')->from('category_project')->where('id',$row->project)->get()->row();
                        $workName = $project->project_name?$project->project_name:'<b style="color:##b00a0a;">N/A </b>';
                    }elseif($row->program != '')
                    {
                        $project = $this->db->select('program_name')->from('category_program')->where('id',$row->program)->get()->row();
                        $workName = $row->program;
                    }elseif($row->event_name != '')
                    {
                        $workName = $row->event_name;
                    }else{
                        $workName = $row->other_event_name;
                    }

                    $return['data'][] = array(
                        '<div class="text-center"><strong>' . $i . '.</strong></div>',    
                        '<b class="text-danger text-center">'.$row->ass_work_id.'</b>',
                        '<div class="text-center"><b>'.$row->empId.'</b></div>',
                        '<div class="text-center">'.$row->empName.'</div>',
                        '<div class="text-center">'.$workName.'</div>',
                        '<div class="text-center">'.$row->location.'</div>',
                        '<div class="text-center">'.$amount.'</div>',
                        '<div class="text-center">₹ '.$running_work_amount['expense_amo'].'.00</div>',
                        '<div class="text-center">'.$row->updated_at.'</div>',
                        '<div class="text-center">'.$status.'</div>',
                        // $actionBtn
                    );
                    $i++;
        }
        $return['recordsTotal'] = $this->workModel->running_work_total_count();
        $return['recordsFiltered'] = $this->workModel->running_work_filter_count($post_data);
        echo json_encode($return);

       }else{
        $return = array(
            'title' => 'Manage Work',
            'breadcrums' => 'Manage Work',
            'layout' => 'admin/work_assign/running_work.php',
            'targetItem' => base_url('administrator/work_assign/create'),
            'targetList' => base_url('administrator/work_assign/running_work/ManageList'),
            );
            $this->load->view('base', $return); 
       }
   }


   public function closed_work($type = NULL )  
   {
       if($type === 'ManageList'){
        $post_data = $this->input->post();
        $return['data'] = array();
        $i = $post_data['start'] + 1;
        $record = $this->workModel->closed_work_model($post_data);
        foreach ($record as $row) {

            $viewUid = base_url('administrator/work_assign/index/workView/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
			$editUid = base_url('administrator/work_assign/workEdit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
            $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/work_assign/accPerForClosed_work===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';
            $actionBtn = '<div style="text-align:center;">
							' . $isDel . '
						</div>';
            $status = ($row->status == 1) ? '<span class="badge bg-danger py-1 px-3 getAction miLvs" href="javascript:void(0)">Closed</span>' : '';
            $amount = $row->amount ? '<span class="success">₹ ' . $row->amount . '.00'. '</span>' : '<span class="text-danger">N/A</span>';
            $image= '<span><img src="' . base_url($row->image) . '" class="imageView" alt="" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';

                    if($row->project != '')
                    {
                        $project = $this->db->select('project_name')->from('category_project')->where('id',$row->project)->get()->row();
                        $workName = $project->project_name?$project->project_name:'<b style="color:##b00a0a;">N/A </b>';
                    }elseif($row->program != '')
                    {
                        $project = $this->db->select('program_name')->from('category_program')->where('id',$row->program)->get()->row();
                        $workName = $row->program;
                    }elseif($row->event_name != '')
                    {
                        $workName = $row->event_name;
                    }else{
                        $workName = $row->other_event_name;
                    }

                    $return['data'][] = array(
                        '<div class="text-center"><strong>' . $i . '.</strong></div>',  
                        '<b class="text-danger text-center">'.$row->ass_work_id.'</b>',  
                        '<div><b>'.$row->empId.'</b></div>',
                        '<div class="text-center">'.$row->empName.'</div>',
                        '<div class="text-center">'.$workName.'</div>',
                        '<div class="text-center">'.$row->location.'</div>',
                        '<div class="text-center">'.$amount.'</div>',
                        '<div class="text-center">'.$row->startDate.'</div>',
                        '<div class="text-center">'.$status.'</div>',
                        // $actionBtn
                    );
                    $i++;
        }
        $return['recordsTotal'] = $this->workModel->closed_work_total_count();
        $return['recordsFiltered'] = $this->workModel->closed_work_filter_count($post_data);
        echo json_encode($return);

       }else{
        $return = array(
            'title' => 'Manage Work',
            'breadcrums' => 'Manage Work',
            'layout' => 'admin/work_assign/closed_work.php',
            'targetItem' => base_url('administrator/work_assign/create'),
            'targetList' => base_url('administrator/work_assign/closed_work/ManageList'),
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

   

    public function accPerForRunning_work(){$this->accPermissionUnified();}
    public function accPerForClosed_work(){$this->accPermissionUnified();}
    public function accPerForWorkAssign(){$this->accPermissionUnified();}
    public function accPermissionUnified() {
    $post = $this->input->post();
    $return = '';
    $tableMap = [
        'work_permission' => 'accPerForRunning_work',
        'work_permission' => 'accPerForClosed_work',
        'work_permission' => 'accPerForWorkAssign',
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
        'action' => 'cnfDeleteDetail===administrator/work_assign/' . $this->router->fetch_method() . '===' . $isMember->id,
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


    
            public function work_assign_1(){
                $workData = $this->db->select('*')->from('work_permission')->where('id', $this->input->post('id'))->get()->row_array();
                $insInRunTable = $this->db->insert('work_running', $workData);
                if ($insInRunTable) { $this->db->where('id', $this->input->post('id'));}
                $delFromWorkPermission = $this->db->delete('work_permission');
                if($delFromWorkPermission){
                redirect('administrator/work_assign/running_work');
                } 
            }


    public function work_assign(){     
       
        $where=array('tblName'=>'work_permission','actnUrl'=>'miStatusChange===administrator/work_assign/work_assign===');$this->manageStatus($where);
    }

    public function manageStatus($where){
    $post=$this->input->post();
    if($post['oprType']=='miStatusView')
    {$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
    if($getData){
    if($getData->status=='Active'){	
    $msg=array(
    'msg'=>'<i class="si si-power"></i> Are you sure want to Pending... '.$getData->name.' of ID #'.$getData->id,
    'action'=>$where['actnUrl'].$getData->id);
    }else{
    $msg=array(
    'msg'=>'Are you sure want to Running... '.$getData->name.' of ID #'.$getData->id,
    'action'=>$where['actnUrl'].$getData->id)
    ;}}else{
    $msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
    }echo json_encode($msg);}
    elseif($post['oprType']=='miStatusChange')
    {sleep(2);
    $getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
    if($getData->status==1){
    $change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully Pending... '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Pending','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
    }else{
    $workData = $this->db->select(' `ass_work_id`, `user_role`, `emp_id`, `project`, `program`, `event_name`, `other_event_name`, `receiver_name`, `receiver_number`, `payment_method`, `payment_proof`, `location`, `amount`, `start_date`, `message`, `working_status`, `created_at`, `updated_at`, `created_by_user_type_id`, `status`')->from('work_permission')->where('id', $this->input->post('id'))->get()->row_array();
    $insInRunTable = $this->db->insert('work_running', $workData);
    $change='1';$msg=array('msg'=>'<span class="text-success">You have successfully Running... '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Running','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
    $changeArr=array('status'=>$change,'working_status'=>1);
    $result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
    if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
    echo json_encode($msg);
    }
    }






    


 


 

}
