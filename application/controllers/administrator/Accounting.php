<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounting extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
        $this->load->model(array('administrator/Project_model' => 'proModel'));
        $this->load->model(array('administrator/Accounting_model' => 'accounting'));

        error_reporting(0);
    }


    public function income($action = NULL, $getId = NULL)
    {

        if($action === 'incomeList'){

            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;
            $record = $this->accounting->income_model($post_data);
            foreach ($record as $row) {
    
                $viewUid = base_url('administrator/accounting/expense/view/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
                $editUid = base_url('administrator/accounting/income/edit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
                $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/accounting/accPerForIncome===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
                $actionBtn='<div style="text-align:center;">
						<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
						'.$isDel.'
					</div>';


                $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===administrator/accounting/income/incStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/accounting/income/incStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';


                $amount = $row->amount ? '<span class="success"><b>₹</b> ' . $row->amount . '.00'. '</span>' : '<span class="text-danger">N/A</span>';
                $image= '<span><img src="' . base_url($row->expense_proof) . '" class="imageView" alt="" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';

                if($row->project != 0)
                {
                    $project = $this->db->select('project_name')->from('category_project')->where('id',$row->project)->get()->row();
                    $workName = $project->project_name?$project->project_name:'<b style="color:##b00a0a;">N/A </b>';
                }elseif($row->program != 0)
                {
                    $project = $this->db->select('program_name')->from('category_program')->where('id',$row->program)->get()->row();
                    $workName = $project->program_name?$project->program_name:'<b style="color:##b00a0a;">N/A </b>';
                }elseif($row->event_name != '')
                {
                    $workName = $row->event_name;
                }else{
                    $workName = $row->other_event_name;
                }

                $image= '<span><img src="' . base_url($row->income_proof) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';


                $return['data'][] = array(
                    '<div class="text-center"><strong>' . $i . '.</strong></div>',    
                    '<div class="text-center"><b class="text-danger text-center">'.$row->income_id .'</b></div>',
                    // '<div class="text-center">'.$workName.'</div>',
                    '<div class="text-center">'.$row->incSour.'</div>',
                    '<div class="text-center">'.$image.'</div>',
                    '<div class="text-center">'.$row->created_at.'</div>',
                    '<div class="text-center">'.$status.'</div>',
                    $actionBtn
                );
                $i++;
            }
            $return['recordsTotal'] = $this->accounting->income_list_total_count();
            $return['recordsFiltered'] = $this->accounting->income_list_filter_count($post_data);
            echo json_encode($return);

           }elseif($action === 'edit'){
                 
            $getArr=json_decode(base64_decode(urldecode($getId)));
            $income_category = $this->db->select('*')->from('category_income')->get()->result_array();
            $income_data = $this->db->select('inc.*,incCat.income_sources as incSour')->from('income as inc')->where( 'inc.id',$getArr->existMember )->join('category_income as incCat', 'incCat.id = inc.otherIncome', 'left')->get()->row();  
            $return = array(
            'title' => 'Edit Income',
            'income_category' => $income_category,
            'income_data' => $income_data,
            'targetItem' => base_url('administrator/accounting/income/update'),
            'layout' => 'admin/accounting/edit_income.php',
            );
            $this->load->view('base', $return);

           }elseif($action === 'update'){

            $uploaded_image = $this->upload_image('income', 'previewImage');

            print_r($uploaded_image);die;
            $value = $this->input->post();
    
            if ($uploaded_image['icon'] === 'success') {
            $expenseData = array(
            'income_proof'  => $uploaded_image['text'],  
            'otherIncome'    => $value['otherIncome'],
            'incomeDate'    => $value['incomeDate'],
            'message'       => $value['message'],
            'amount'        => $value['proAmount'],
            'payment_method'=> $value['paymentMethod'],
            'status'        => 2,
            'incomeDate'    => date('Y-m-d'),
            'created_at'    => date('Y-m-d'),
            );
    
    
            if ($value['paymentMethod'] == 1) {
                $paymentData = array('paymentMethod' => $value['paymentMethod']);
            } elseif ($value['paymentMethod'] == 2) {
                $paymentData = array('receiver_number' => $value['number']);   
            } elseif ($value['paymentMethod'] == 3) {
                $paymentData = array(
                    'receiver_name' => $value['rec_name'],
                    'receiver_number' => $value['number']
                );
            }
    
            $insertArr = array_merge($expenseData, $paymentData);

            echo "<pre>"; print_r($insertArr);die;

             if($this->db->where('id', $this->input->post('id'))->update('income',$insertArr)){
             $msg=array('Thank you! Your expense has been created successfully.');
             $data=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('administrator/accounting/income'));
             }
             else{$msg=array('Oops it seems error.please refresh you page.');$data=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
             }
             else
             {
             $msg=array('proAmount'=>form_error('proAmount'),'message'=>form_error('message'));
                   $data=array('addClas'=>'tDanger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');
             }
            echo json_encode($data);
            }elseif($action === 'incStatus'){
            $where=array('tblName'=>'income','actnUrl'=>'miStatusChange===administrator/accounting/income/incStatus===');
            $this->manageIncome($where);
            }elseif($action === 'create'){

            $this->form_validation->set_rules('proAmount','Enter Amount','trim|required|xss_clean');
            $this->form_validation->set_rules('message','Enter Description','trim|required|xss_clean');


              if($this->form_validation->run()==TRUE)
              {

                $uploaded_image = $this->upload_image('income', 'previewImage');
                $value = $this->input->post();

                $incomeLastId = $this->db->select('income_id')->from('income')->order_by('id', 'DESC')->limit(1)->get()->row();
            
                if (!empty($incomeLastId)) {
                    $incomeData = 'INC' . str_pad((int)substr($incomeLastId->income_id, 3) + 1, 4, '0');
                } else {
                    $incomeData = 'INC1001';
                }

        
                if ($uploaded_image['icon'] === 'success') {
                $expenseData = array(
                'income_proof'  => $uploaded_image['text'],  
                'income_id'     => $incomeData,
                'otherIncome'    => $value['otherIncome'],
                'payment_method'=> $value['paymentMethod'],
                'incomeDate'    => $value['incomeDate'],
                'message'       => $value['message'],
                'amount'        => $value['proAmount'],
                'status'        => 2,
                'incomeDate'    => date('Y-m-d'),
                'created_at'    => date('Y-m-d'),
                );
        
        
                if ($value['paymentMethod'] == 1) {
                    $paymentData = array('payment_by_check' => $value['paymentMethod']);
                } elseif ($value['paymentMethod'] == 2) {
                    $paymentData = array('receiver_number' => $value['number']);   
                } elseif ($value['paymentMethod'] == 3) {
                    $paymentData = array(
                        'receiver_name' => $value['rec_name'],
                        'receiver_number' => $value['number']
                    );
                }
        
                $insertArr = array_merge($expenseData, $paymentData);


                 if($this->db->insert('income',$insertArr)){
                 $msg=array('Thank you! Your expense has been created successfully.');
                 $data=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('administrator/accounting/income'));
                 }
                 else{$msg=array('Oops it seems error.please refresh you page.');$data=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
                 }
                 else
                 {
                 $msg=array('proAmount'=>form_error('proAmount'),'message'=>form_error('message'));
                       $data=array('addClas'=>'tDanger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');
                 }
                echo json_encode($data);
        }
    }else{
            $category_income = $this->db->select('*')->from('category_income')->order_by('id','DESC')->get()->result_array();
            $return = array(
            'title' => 'Manage Income',
            'breadcrums' => 'Create Income',
            'income_cate' => $category_income,
            'targetListItem' => base_url('administrator/accounting/income/incomeList'),
            'targetItem' => base_url('administrator/accounting/income/create'),
            'layout' => 'admin/accounting/income.php',
            );
            $this->load->view('base', $return);
        }
    }

    public function expense($action = NULL, $id = NULL)
    {

        if($action === 'expenseList')
        {
          
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;
            $record = $this->accounting->expense_model($post_data);
            foreach ($record as $row) {
    
                $viewUid = base_url('administrator/accounting/expense/view/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'id' => $row->id)))));
                $editUid = base_url('administrator/work_assign/workEdit/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
                $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===administrator/accounting/accPerForExpense===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
                $actionBtn = '<div style="text-align:center;">
                                <a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
                                ' . $isDel . '
                            </div>';


                $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===administrator/accounting/expenseStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===administrator/accounting/expenseStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';


                $amount = $row->amount ? '<span class="success"><b>₹</b> ' . $row->amount . '.00'. '</span>' : '<span class="text-danger">N/A</span>';
                $image= '<span><img src="' . base_url($row->expense_proof) . '" class="imageView" alt="" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';

                if($row->project != 0)
                {
                    $project = $this->db->select('project_name')->from('category_project')->where('id',$row->project)->get()->row();
                    $workName = $project->project_name?$project->project_name:'<b style="color:##b00a0a;">N/A </b>';
                }elseif($row->program != 0)
                {
                    $project = $this->db->select('program_name')->from('category_program')->where('id',$row->program)->get()->row();
                    $workName = $project->program_name?$project->program_name:'<b style="color:##b00a0a;">N/A </b>';
                }elseif($row->event_name != '')
                {
                    $workName = $row->event_name;
                }else{
                    $workName = $row->other_event_name;
                }

                $return['data'][] = array(
                    '<div class="text-center"><strong>' . $i . '.</strong></div>',    
                    '<div class="text-center"><b class="text-danger text-center">'.$row->expense_id.'</b></div>',
                    // '<div class="text-center">'.$workName.'</div>',
                    '<div class="text-center">'.$amount.'</div>',
                    '<div class="text-center">'.$image.'</div>',
                    '<div class="text-center">'.$row->created_at.'</div>',
                    '<div class="text-center">'.$status.'</div>',
                    $actionBtn
                );
                $i++;
            }
            $return['recordsTotal'] = $this->accounting->expense_total_count();
            $return['recordsFiltered'] = $this->accounting->expense_filter_count($post_data);
            echo json_encode($return);

        }elseif($action === 'create'){
             
                $this->form_validation->set_rules('chooseWork', 'Choose any work', 'trim|required|xss_clean');
                $this->form_validation->set_rules('proAmount', 'Enter Amount', 'trim|required|xss_clean');
        
                if ($this->form_validation->run() == TRUE) {
                $uploaded_image = $this->upload_image('expense', 'previewImage');
             
                $value = $this->input->post();

        
                $assWorkId = $this->db->select('expense_id')->from('expense')->order_by('id', 'DESC')->limit(1)->get()->row();
            
                if (!empty($assWorkId)) {
                    $assWorkId = 'EXP' . str_pad((int)substr($assWorkId->expense_id, 3) + 1, 4, '0');
                } else {
                    $assWorkId = 'EXP1001';
                }

                
        
                if ($uploaded_image['icon'] === 'success') {
                $expenseData = array(
                'expense_proof' => $uploaded_image['text'],  
                'expense_id'    => $assWorkId,
                'chooseWork'          => $value['chooseWork'],
                'date'          => $value['s_date'],
                'message'        => $value['message'],
                'amount'        => $value['proAmount'],
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
                    $choosework = array('other_expense' => $value['expenseId']);
                }
        
                if ($value['paymentMethod'] == 1) {
                    $paymentData = array('payment_by_check' => $value['paymentMethod']);
                } elseif ($value['paymentMethod'] == 2) {
                    $paymentData = array('receiver_number' => $value['number']);   
                } elseif ($value['paymentMethod'] == 3) {
                    $paymentData = array(
                        'receiver_name' => $value['rec_name'],
                        'receiver_number' => $value['number']
                    );
                }
        
                $insertArr = array_merge($expenseData, $choosework, $paymentData);

                if ($this->common->save_data('expense', $insertArr)) {
                    $msg = array('Thank you! Your expense has been created successfully.');
                    $data = array(
                        'addClas' => 'tSuccess',
                        'msg' => $msg,
                        'icon' => '<i class="fa-regular fa-circle-check"></i>',
                        'returnLoc' => base_url('administrator/accounting/expense')
                    );
                } } else {
                    $msg = array('Insufficient balance in your wallet.');
                    $data = array(
                        'addClas' => 'tWarning',
                        'msg' => $msg,
                        'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                    );
                }} else {
                    $msg = array('Please complete the field above.');
                    $data = array(
                        'addClas' => 'tWarning',
                        'msg' => $msg,
                        'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                    );
                   } echo json_encode($data);
                    
            }elseif($action === 'view'){ 
                
                $getArr=json_decode(base64_decode(urldecode($id)));
                $expenseData = $this->db->select('*')->from('expense')->where('id',$getArr->id)->order_by('id','DESC')->get()->row();
                $projectData = $this->db->select('*')->from('category_project')->order_by('id','DESC')->get()->result_array();
                $allProgram = $this->db->select('*')->from('category_program')->order_by('id','DESC')->get()->result_array();
                $return = array(
                'title' => 'Edit Expense',
                'expenseData' => $expenseData,
                'allProgram' => $allProgram,
                'allProject' => $projectData,
                'targetItem' => base_url('administrator/accounting/expense/update'),
                'layout' => 'admin/accounting/editExpense.php',
                );
                $this->load->view('base', $return);
            }elseif($action === 'update'){  
                 
         
                $this->form_validation->set_rules('chooseWork', 'Choose any work', 'trim|required|xss_clean');
                $this->form_validation->set_rules('proAmount', 'Enter Amount', 'trim|required|xss_clean');
                $this->form_validation->set_rules('paymentMethod', 'Select Payment Mode', 'trim|required|xss_clean');
        
                if ($this->form_validation->run() == TRUE) {
                $uploaded_image = $this->upload_image('expense', 'previewImage');
             
                $value = $this->input->post();
                
                if ($uploaded_image['icon'] === 'success') {
                $expenseData = array(
                'expense_proof' => $uploaded_image['text'],  
                'expense_id'    => $assWorkId,
                'chooseWork'    => $value['chooseWork'],
                'date'          => $value['s_date'],
                'message'       => $value['message'],
                'amount'        => $value['proAmount'],
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
                    $choosework = array('other_expense' => $value['expenseId']);
                }
        
                if ($value['paymentMethod'] == 1) {
                    $paymentData = array('payment_by_check' => $value['paymentMethod']);
                } elseif ($value['paymentMethod'] == 2) {
                    $paymentData = array('receiver_number' => $value['number']);   
                } elseif ($value['paymentMethod'] == 3) {
                    $paymentData = array(
                        'receiver_name' => $value['rec_name'],
                        'receiver_number' => $value['number']
                    );
                }
        
                $insertArr = array_merge($expenseData, $choosework, $paymentData);

            if ($this->db->where('id',$this->input->post('id'))->update('expense', $insertArr)) {
                $msg = array('Thank you! Your expense updated successfully.');
                $data = array(
                    'addClas' => 'tSuccess',
                    'msg' => $msg,
                    'icon' => '<i class="fa-regular fa-circle-check"></i>',
                    'returnLoc' => base_url('administrator/accounting/expense')
                );
            } } else {
                $msg = array('Please select another image.');
                $data = array(
                    'addClas' => 'tWarning',
                    'msg' => $msg,
                    'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                );
            }} else {
                $msg = array(             
                     'proAmount' => form_error('proAmount'), 
                     'chooseWork' => form_error('chooseWork'), 
                     'paymentMethod' => form_error('paymentMethod'),
                );
                $data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="pe-7s-sun bx-spin"></i>');
               } echo json_encode($data);
    
            }else{
            $projectData = $this->db->select('*')->from('category_project')->order_by('id','DESC')->get()->result_array();
            $allProgram = $this->db->select('*')->from('category_program')->order_by('id','DESC')->get()->result_array();
            $allExpense = $this->db->select('*')->from('category_expense')->order_by('id','DESC')->get()->result_array();
            $return = array(
            'title' => 'Manage Expense',
            'breadcrums' => 'Create Expense',
            'project' => $projectData,
            'allProgram' => $allProgram,
            'allExpense' => $allExpense,
            'expenseListItem' => base_url('administrator/accounting/expense/expenseList'),
            'targetItem' => base_url('administrator/accounting/expense/create'),
            'layout' => 'admin/accounting/expense.php',
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


  public function expenseStatus()
  {
     $where=array('tblName'=>'expense','actnUrl'=>'miStatusChange===administrator/accounting/expenseStatus===');
     $this->manageExpense($where);
  }

      
  public function manageExpense($where){
	$post=$this->input->post();
	if($post['oprType']=='miStatusView')
	{$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
	 if($getData){
	 if($getData->status == 1){	
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
	{sleep(2);
	$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
	if($getData->status ==  1 ){
	$change= 2 ;$msg=array('msg'=>'<span class="text-success"><i class="fa fa-check-circle"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
	}else{
	$change= 1 ;$msg=array('msg'=>'<i class="fa fa-check-circle text-success"></i><span class="text-success"> You have successfully activate '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
	$changeArr=array('status'=>$change);
	$result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
	if ($result) {
		$msg = $msg;
		$msg['reloadPage'] = base_url('administrator/accounting/expense'); 
	} else {
		$msg = array('msg' => '<span class="text-danger">Oops, it seems something went wrong while updating.</span>');
	}
	echo json_encode($msg); 
	}
	}


    public function manageIncome($where){
        $post=$this->input->post();
        if($post['oprType']=='miStatusView')
        {$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
         if($getData){
         if($getData->status == 1){	
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
        {sleep(2);
        $getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
        if($getData->status ==  1 ){
        $change= 2 ;$msg=array('msg'=>'<span class="text-success"><i class="fa fa-check-circle"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
        }else{
        $change= 1 ;$msg=array('msg'=>'<i class="fa fa-check-circle text-success"></i><span class="text-success"> You have successfully activate '.$getData->name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
        $changeArr=array('status'=>$change);
        $result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
        if ($result) {
            $msg = $msg;
            $msg['reloadPage'] = base_url('administrator/accounting/income'); 
        } else {
            $msg = array('msg' => '<span class="text-danger">Oops, it seems something went wrong while updating.</span>');
        }
        echo json_encode($msg); 
        }
        }



    public function accPerForIncome(){$this->accPermissionUnified();}
    public function accPerForExpense(){$this->accPermissionUnified();}
    public function accPermissionUnified(){
        $post = $this->input->post();
        $return = '';
        $tableMap = ['income' => 'accPerForIncome','category_program' => 'accPermisionPro','category_project' => 'accPermisionForProject','expense' => 'accPerForExpense',];
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
           'action' => 'cnfDeleteDetail===administrator/accounting/' . $this->router->fetch_method() . '===' . $isMember->id,
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
          'action' => 'success','tClor' => '#008038'
           ];} else {
          $return = [
          'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Deletion failed for <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span>.<br>
           Please check the details and try again.',
           'action' => 'errorShw','tClor' => '#db3704'
           ];
           }} else {
           $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];
           }} else {
           $return = ['msg' => "Invalid operation type.", 'action' => '', 'tClor' => '#db3704'];
           }sleep(1);echo json_encode($return);
    }
    



 

  
    

  
} 