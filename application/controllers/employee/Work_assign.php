<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Work_assign extends CI_Controller
{
         public function __construct()
         {
             parent::__construct();
             ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
	        	$this->load->model(array('employee/Work_assign_model' => 'workModel'));
             $this->logID = $this->session->userdata['user_id'];
             error_reporting(0);
         }


    public function index($action = NULL, $getId = NULL ){
        if($action === 'ManageList'){
            $post_data = $this->input->post();
           $return['data'] = array();
            $i = $post_data['start'] + 1;
            $record = $this->workModel->work_assign_model($post_data);
            foreach ($record as $row) {
    
                $viewUid = base_url('employee/work_assign/index/workView/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
                $editUid = base_url('employee/work_assign/workEdit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
                $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/work_assign/accPerForWorkAssign===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';
                $actionBtn = '<div style="text-align:center;">
                                <a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
                            </div>';
                $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===employee/work_assign/checkStatusEmp==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Pending... " id="arvs--'.$row->id.'">Running</a>':'<a href="javascript:void()" data-id="miStatusView===employee/work_assign/checkStatusEmp==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Running..." class="badge bg-danger getAction" id="arvs--'.$row->id.'">Pending</a>';
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
                            '<div class="text-center"><b class="text-danger">'.$row->ass_work_id.'</b></div>',   
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
        'layout' => 'work_assign/add_work.php',
        'targetItem' => base_url('work_assign/create'),
        'targetList' => base_url('employee/work_assign/index/ManageList'),
        );
        $this->load->view('employee/base', $return); 
        }
      
    }



   
    public function running_work($type = NULL , $getId = Null)  
    {
        if($type === 'ManageList'){
          
         $post_data = $this->input->post();
         $return['data'] = array();
         $i = $post_data['start'] + 1;
         $record = $this->workModel->running_work_model($post_data);

        //  ass_work_id
        
         foreach ($record as $row) {
 
            $running_work_amount = $this->db->select_sum('expense_amo')->from('work_running')->where(array('ass_work_id' => $row->ass_work_id, 'working_status' =>  2, 'status' => 1))->get()->row_array();

            $closedWork = $this->db->select('id,ass_work_id,working_status')->from('work_permission')->where('emp_id',$row->emp_id)->get()->row();
            if($closedWork->working_status == 3)
            {
                $status = '<span class="badge bg-danger py-1 px-3 getAction miLvs" href="javascript:void(0)">Closed</span>';
            }
            else{
             $status = ($row->status == 1) ? '<span class="badge bg-success py-1 px-2 getAction miLvs" href="javascript:void(0)">Running</span>' : '';
            }
 
             $viewUid = base_url('employee/work_assign/add_expense/' . urlencode(base64_encode(json_encode(array('action' => 'addExpense', 'id' => $row->id, 'ass_work_id' => $row->ass_work_id)))));
             $editUid = base_url('employee/work_assign/workEdit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
             $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/work_assign/accPerForRunning_work===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';
             $actionBtn = '<div style="text-align:center;">
                             ' . $isDel . '
                         </div>';
             $running_work ='<a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs py-2 px-3" title="add expense" style="widht:121px;!important">Add Expense</a>';
             

             $amount = $row->amount;
             $ExpAmount = $running_work_amount[0]['amount'];
             
             $amount_display = $amount ? '<b class="success">₹ ' . $amount . '.00</b>' : '<b class="text-danger">N/A</b>';
             $ExpAmount_display = $ExpAmount ? '<span class="success">₹ ' . $ExpAmount . '.00</span>' : '<span class="text-danger">N/A</span>';
             
             if ($ExpAmount <= $amount) {
                 $Ban_Amo = '<b style="color:white;">₹ ' . ($ExpAmount) . '.00</b>';
             } elseif ($ExpAmount > $amount) {
                 $Ban_Amo = '<b style="color:red;">Insufficient Balance.</b>';
             }
            

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
                         '<div class="text-center"><b class="text-danger">'.$row->ass_work_id.'</b></div>', 
                         '<div class="text-center"><b>'.$row->empId.'</b></div>',
                         '<div class="text-center">'.$row->empName.'</div>',
                         '<div class="text-center">'.$row->startDate.'</div>',
                         '<div class="text-center">'.$workName.'</div>',
                         '<div class="text-center">'.$row->location.'</div>',
                         '<div class="text-center">'.$amount_display.'</div>',
                         '<div class="text-center">'.$running_work_amount['expense_amo']?'₹ '.$running_work_amount['expense_amo'].'.00':'N/A'.'</div>',
                         '<div class="text-center">'.$status.'</div>',
                         '<div class="text-center">'.$running_work.'</div>',
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
             'layout' => 'work_assign/running_work.php',
             'targetItem' => base_url('work_assign/create'),
             'targetList' => base_url('employee/work_assign/running_work/ManageList'),
             );
             $this->load->view('employee/base', $return); 
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
 
             $viewUid = base_url('employee/work_assign/index/workView/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
             $editUid = base_url('employee/work_assign/workEdit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
            //  $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/work_assign/accPerForClosed_work===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';
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
                         '<div clas="text-center"><strong>' . $i . '.</strong></div>',
                         '<div class="text-center"><b class="text-danger">'.$row->ass_work_id.'</b></div>',    
                         '<div class="text-center"><b>'.$row->empId.'</b></dif>',
                         '<div class="text-center">'.$row->empName.'</div>',
                         '<div class="text-center">'.$workName.'</div>',
                         '<div class="text-center">'.$row->location.'</div>',
                         '<div class="text-center">'.$amount.'</div>',
                         '<div class="text-center">'.$row->startDate.'</div>',
                         '<div class="text-center">'.$status.'</div>',
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
             'layout' => 'work_assign/closed_work.php',
             'targetItem' => base_url('employee/work_assign/create'),
             'targetList' => base_url('employee/work_assign/closed_work/ManageList'),
             );
             $this->load->view('employee/base', $return); 
        }
    }


    public function checkStatusEmp(){$where=array('tblName'=>'work_running','actnUrl'=>'miStatusChange===employee/work_assign/checkStatusEmp===');$this->manageStatus($where);}
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
    $change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully Pending... '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Pending...','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
    }else{
    $change='1';$msg=array('msg'=>'<span class="text-success">You have successfully Running... '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Running...','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
    $changeArr=array('status'=>$change,'working_status'=>1);
    $result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
    if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
    echo json_encode($msg);
    }
    }

    public function add_expense($type=NULL,$gID=NULL) 
    {

        $whereCon = json_decode(base64_decode(urldecode($type)));  
		if ($type==='create') {   
            $value = $this->input->post();  

             $projectAmo = $this->db->select('amount')->from('work_running')->where(array('ass_work_id' => $value['workId'], 'status' => 1, 'working_status' => 1 ))->get()->row();

            $uploaded_image = $this->upload_image('expense', 'previewImage');
            if ($uploaded_image['icon'] === 'success') {
                $expenseData = array(
                    'payment_proof' => $uploaded_image['text'],  
                    'ass_work_id'   => $value['workId'],
                    'emp_id'        => $value['emp_id'],
                    'location'      => $value['location'],
                    'expense_amo'   => $value['proAmount'],
                    'start_date'    => $value['s_date'],
                    'message'       => $value['message'],
                    'payment_method'=> 2, 
                    'status'        => 1,  
                    'created_at'    => date('Y-m-d'),
                );

                if($value['projectName'] != '')
                {
                    $projectData = array('project' => $value['projectName']);
                }elseif($value['programName'] != '')
                {
                    $projectData = array('program' => $value['programName']);
                }elseif($value['eventManage'] != '')
                {
                    $projectData = array('event_name' => $value['eventManage']);
                }elseif($value['other_event'] != ''){
                    $projectData = array('other_event_name' => $value['other_event']);
                }

                $insertArr = array_merge($expenseData, $projectData);

                if ($value['proAmount'] <= $projectAmo->amount ) {
                    $this->db->insert('work_running', $insertArr);
                    $msg = array('Thank You! You have added successfully.');
                    $return = array(
                        'addClas' => 'tSuccess',
                        'msg' => $msg,
                        'icon' => '<i class="fa-regular fa-circle-check"></i>',
                        'returnLoc' => base_url('employee/work_assign/add_expense/')
                    );
                } else {
                    $msg = array('Insufficient Balance. Please check your wallet amount.');
                    $return = array(
                        'addClas' => 'tWarning',
                        'msg' => $msg,
                        'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                    );
                }
            } else {
                $msg = array('Oops, the image upload failed. Please try again.');
                $return = array(
                    'addClas' => 'tWarning',
                    'msg' => $msg,
                    'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                );
            }
            echo json_encode($return);

        }
		elseif($type === 'showList')
        {
		 
         $post_data = $this->input->post();
		 $post_data['work_id']=$gID;
         $return['data'] = array();
         $i = $post_data['start'] + 1;
         $record = $this->workModel->showWorkList($post_data);
         foreach ($record as $row) {
 
             $viewUid = base_url('employee/work_assign/index/workView/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
             $editUid = base_url('employee/work_assign/workEdit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
             $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/work_assign/accPerForClosed_work===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';
             $actionBtn = '<div style="text-align:center;">
                             ' . $isDel . '
                         </div>';
             $status = ($row->status == 1) ? '<span class="badge bg-success getAction miLvs" href="javascript:void(0)">Running...</span>' : '';
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
                         '<div class="text-center"><b class="text-danger">'.$row->ass_work_id.'</b></div>',    
                         '<div class="text-center"><b>'.$row->empId.'</b></div>',
                         '<div class="text-center">'.$row->empName.'</div>',
                         '<div class="text-center">'.$workName.'</div>',
                         '<div class="text-center">'.$row->location.'</div>',
                         '<div class="text-center"><b>'.'₹ '.$row->expense_amo.'.00'.'</b></div>',
                         '<div class="text-center">'.$row->startDate.'</div>',
                         '<div class="text-center">'.$status.'</div>',
                     );
                     $i++;
         }
         $return['recordsTotal'] = $this->workModel->closed_work_total_count();
         $return['recordsFiltered'] = $this->workModel->closed_work_filter_count($post_data);
         echo json_encode($return);
        }
		else{
         
            $whereCon = json_decode(base64_decode(urldecode($type)));  
            $dtActionUrl=($whereCon->action=="addExpense")?"showList":"showList";
			$ass_work_id=($whereCon->ass_work_id!="")?$whereCon->ass_work_id:NULL;
			$workingStatus = $this->db->select('id,working_status')->from('work_permission')->where('id',$whereCon->id)->get()->row();
            $runn_status = $this->db->select('*')->from('work_running')->where('id',$whereCon->id)->order_by('id', 'DESC')->get()->row();
            $projectData = $this->db->select('*')->from('category_project')->order_by('id', 'DESC')->get()->result_array();
            $allProgram = $this->db->select('*')->from('category_program')->order_by('id', 'DESC')->get()->result_array();
            $return = array(
                'title' => 'Manage Expense',
                'breadcrums' => 'Manage Expense',
                'runn_status' => $runn_status,
                'projectData' => $projectData,
                'workingStatus' => $workingStatus,  
                'allProgram' => $allProgram,
                'layout' => 'work_assign/add_expense.php',
                'targetItem' => base_url('employee/Work_assign/add_expense/create'),
                'targetList' => base_url('employee/Work_assign/add_expense/'.$dtActionUrl.'/'.$ass_work_id),
            );
            $this->load->view('employee/base', $return);
        }
    }


    public function closeWork()
    {
        $data = $this->uri->segment(4);
        $workEnd = $this->db->select('*')->from('work_permission')->where('emp_id',$data)->get()->row();
        $insertDAta = array(
            'working_status' => 3
        );
        if ($this->db->where('emp_id',$data)->update('work_permission',$insertDAta)) {
           redirect('employee/work_assign/running_work');
        }else{
            redirect('employee/work_assign/running_work');
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
