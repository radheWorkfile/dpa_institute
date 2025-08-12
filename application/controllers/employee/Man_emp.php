<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Man_emp extends CI_Controller
{
    public function __construct()
    {
		
        parent::__construct();
        ($this->session->userdata('user_id')== '') ? redirect(base_url(), 'refresh') : '';
		$this->load->model(array('employee/employee_model' => 'employee'));
 	    $this->lgCat=$this->session->userdata['user_cate'];
		$this->logID=$this->session->userdata['user_id'];
	    error_reporting(0);
    }

	public function index()
	{	
	$return=array('title'=>'Dashboard','breadcrums'=>'Dashboard Employee');
	$this->load->view('employee/base',$return);
	}



		public function create(){	
		    $post=$this->input->post();
			if($post['actnOper']=='create'){
			$this->form_validation->set_rules('gender','Gender','trim|required|xss_clean');
			$this->form_validation->set_rules('frstName','Date of Birth','trim|required|xss_clean');
			$this->form_validation->set_rules('email_id','Email Id','trim|required|xss_clean|valid_email|is_unique[staff.email]');
			$this->form_validation->set_rules('mobileNu','Mobile No.','trim|required|xss_clean|numeric|max_length[10]');
			$this->form_validation->set_rules('empRole','Role','trim|required|xss_clean');
			$this->form_validation->set_rules('empPassword','Password','trim|required|xss_clean');
			if($this->form_validation->run()==TRUE)
			{						
			$getRole=array(
				'1'=>'statewise',
				'2'=>'districtwise',
				'3'=>'blockwise',
				'4'=>'panchayatwise',
				'5'=>'villagewise'
			);
			$empLoc=$getRole[$post['empRole']];$getID=rand(100000000,999999999);
			$insertArr=array(
			'user_id'=>$getID,
			'user_role'=>$post['empRole'],
			'first_name'=>$post['frstName'],
			'last_name'=>$post['lastName'],
			'gender'=>$post['gender'],
			'email_id'=>$post['email_id'],
			'mobile_number'=>$post['mobileNu'],
			'state_id'=>$post['inputState'],
			'district_id'=>$post['inputDistrict'],
			'block_id'=>$post['inputBlock'],
			'panchayat_id'=>$post['inputPanchayat'],
			'village_id'=>$post['inputVillage'],
			'address'=>$post['membrAddr'],
			'show_password'=>$post['empPassword'],
			'password'=>md5($post['empPassword']),
			'status'=>'Active','created_id'=>$this->logID,'created_by'=>$this->lgCat,'created_date'=>date('Y-m-d H:i:s'));
			if($this->common->save_data('cordinator_manage',$insertArr)){
			$msg=array(' Thank You! you have successfully create details');
			$data=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('employee/Man_emp/'.$empLoc));}
			else{$msg=array('Oops it seems error.please refresh you page.');$data=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}}
			else{
			$msg=array('gender'=>form_error('gender'),'frstName'=>form_error('frstName'),'email_id'=>form_error('email_id'),'mobileNu'=>form_error('mobileNu'),'empRole'=>form_error('empRole'),'empPassword'=> form_error('empPassword'));
			$data=array('addClas'=>'tDanger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');}
			echo json_encode($data);}
			else{
			$stateList=$this->common->getDataList('states_cities',array('parent_id'=>'729'),'*');
			$return=array(
				'title'=>'Create Employee',
				'breadcrums'=>'Create Employee',
				'layout'=>'create.php',
				'actnOper'=>'create','isMember'=>NULL,
				'createAction'=>base_url('employee/Man_emp/create'),
				'arvActionTrgt'=>base_url('employee/Man_emp/findDetails'),
				'stateList'=>$stateList,
				'district'=>NULL,'blockWise'=>NULL,'panchayat'=>NULL,'villageWise'=>NULL
				);
				 $this->load->view('employee/base',$return);}
		}


		public function findDetails(){
			$post=$this->input->post();
			if($post['actnType']=='inputDistrict'){$resultList=$this->common->getDataList('states_cities',array('parent_id'=>$post['id']),'*');}
			else if($post['actnType']=='inputBlock'){
			$groupBy='block_code';
			$resultList=$this->common->getDataGroupByList('manage_block',array('district_id'=>$post['id']),'id,block_name as state_cities',$groupBy);}	
			else if($post['actnType']=='inputPanchayat'){
			$groupBy='panchayat_code';
			$resultList=$this->common->getDataGroupByList('manage_panchayat',array('block_id'=>$post['id']),'id,panchayat_name as state_cities',$groupBy);}
			else if($post['actnType']=='inputVillage'){
			$groupBy='village_name';
			$resultList=$this->common->getDataGroupByList('manage_village',array('panchayat_id'=>$post['id']),'id,village_name as state_cities',$groupBy);}			
			else if($post['actnType']=='empRole'){
			//$resultList=$this->common->getDataList('states_cities','parent_id',$post['id']);
			$idRow['id']='<div class="mb-3 col-md-4">
			<label>Block</label><div class="dropdown bootstrap-select form-control"><select id="inputBlock" class="form-control"><option selected="">Choose Block</option><option>Option 1</option><option>Option 2</option><option>Option 3</option></select></div></div>
			<div class="mb-3 col-md-4"><label>Panchayat</label><div class="dropdown bootstrap-select form-control"><select id="inputPanchayat" class="form-control"><option selected="">Choose Panchayat</option><option>Option 1</option><option>Option 2</option><option>Option 3</option></select></div></div>';
			$resultList=$idRow;}
			else{
			$resultList='Opps something went wrong';
			}echo json_encode($resultList);								
		}



		public function statewise(){	
			$getArr=urlencode(base64_encode(json_encode(array('targetData'=>'allMember','m_type'=>'1'))));
			$return=array(
				'title'=>'State Wise Members',
				'breadcrums'=>'State Wise Members',
				'layout'=>'member_list.php',
			'tblDeactive'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'deactive','m_type'=>'1'))))),
			'tblActiveMember'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'active','m_type'=>'1'))))),
			'targetAction'=>base_url('employee/Man_emp/showList/'.$getArr));
			$this->load->view('employee/base',$return);
		}
	
		public function districtwise(){
			$getArr=urlencode(base64_encode(json_encode(array('targetData'=>'allMember','m_type'=>'2'))));
			$return=array('title'=>'District Wise Members','breadcrums'=>'District Wise Members','layout'=>'member_list.php',
			'tblDeactive'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'deactive','m_type'=>'2'))))),
			'tblActiveMember'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'active','m_type'=>'2'))))),
			'targetAction'=>base_url('employee/Man_emp/showList/'.$getArr));
			$this->load->view('employee/base',$return);
		}	
		public function blockwise(){
			$getArr=urlencode(base64_encode(json_encode(array('targetData'=>'allMember','m_type'=>'3'))));
			$return=array('title'=>'Block Wise Members','breadcrums'=>'Block Wise Members','layout'=>'member_list.php',
			'tblDeactive'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'deactive','m_type'=>'3'))))),
			'tblActiveMember'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'active','m_type'=>'3'))))),
			'targetAction'=>base_url('employee/Man_emp/showList/'.$getArr));
			$this->load->view('employee/base',$return);
		}	

		public function panchayatwise(){
			$getArr=urlencode(base64_encode(json_encode(array('targetData'=>'allMember','m_type'=>'4'))));
			$return=array('title'=>'Panchayat Wise Members','breadcrums'=>'Panchayat Wise Members','layout'=>'member_list.php',
			'tblDeactive'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'deactive','m_type'=>'4'))))),
			'tblActiveMember'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'active','m_type'=>'4'))))),
			'targetAction'=>base_url('employee/Man_emp/showList/'.$getArr));
			$this->load->view('employee/base',$return);
		}	

		public function villagewise(){
			$getArr=urlencode(base64_encode(json_encode(array('targetData'=>'allMember','m_type'=>'5'))));
			$return=array('title'=>'Village Wise Members','breadcrums'=>'Village Wise Members','layout'=>'member_list.php',
			'tblDeactive'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'deactive','m_type'=>'5'))))),
			'tblActiveMember'=>base_url('employee/Man_emp/showList/'.urlencode(base64_encode(json_encode(array('targetData'=>'active','m_type'=>'5'))))),
			'targetAction'=>base_url('employee/Man_emp/showList/'.$getArr));
			$this->load->view('employee/base',$return);
		}				
	
				
		public function accPermision(){
			$post=$this->input->post();
			$return='';
			if($post['oprType']=='viewDelete'){
			$isMember=$this->common->getRowData('cordinator_manage','id',$post['id']);
			if($isMember){$return=array('msg'=>'<i class="fa-solid fa-circle-exclamation"></i> Do you wish to delete <span style="font-weight:900;">'.($isMember->first_name.' '.$isMember->last_name).' (ID #'.$isMember->user_id.') </span> ?.','action'=>'cnfDeleteDetail===employee/Man_emp/accPermision==='.$isMember->id,'tClor'=>'#db3704');}
			else{$return=array('msg'=>"Sorry, we couldn't retrieve the data at this time.",'action'=>'','tClor'=>'#db3704');}
			}else if($post['oprType']=='cnfDeleteDetail'){
			$isMember=$this->common->getRowData('cordinator_manage','id',$post['id']);
			if($isMember){
			$deltResult=$this->common->del_data_multi_con('cordinator_manage',array('id'=>$post['id']));
			if($deltResult){
			$return=array('msg'=>'<i class="fa-regular fa-circle-check"></i> Data deletion completed.<br> <span style="font-weight:900;">'.($isMember->first_name.' '.$isMember->last_name).' (ID #'.$isMember->user_id.') </span>  has been removed.',
			'action'=>'success','tClor'=>'#008038');
			}else{
			$return=array('msg'=>'<i class="fa-solid fa-circle-exclamation"></i> Deletion failed for  <span style="font-weight:900;">'.($isMember->first_name.' '.$isMember->last_name).' (ID #'.$isMember->user_id.') </span>.<br> Please check the details and try again.',
			'action'=>'errorShw','tClor'=>'#db3704');}
			}else{$return=array('msg'=>"Sorry, we couldn't retrieve the data at this time.",'action'=>'','tClor'=>'#db3704');}	}	
			sleep(1);
			echo json_encode($return);	
		}		
		
		
		public function showList($whereCn=NULL)
		{
			$post_data = $this->input->post();
			$record=$this->employee->member_data($post_data,$whereCn);
			$i = $post_data['start'] + 1;
			$return['data'] = array();
			foreach ($record as $row) {
			$editUid = base_url('employee/Man_emp/manage/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
			$viewUid = base_url('employee/Man_emp/manage/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'existMember' => $row->id)))));
			$isDel='<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===employee/Man_emp/accPermision===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete Member"><i class="fa fa-trash"></i></a>';				
			$actionBtn='<div style="text-align:right;"><a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
			<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
			'.$isDel.'
			</div>';
			$status=($row->status=='Active')?'<span class="sRvActive"> Active </span>':(($row->status=='Deactive')?'<span class="sRvDeactive"> Deactive </span>':'<span class="sRvSuspnd"> Suspend </span>');
			$return['data'][]=array('<div style="padding-left:10px"><strong>'.$i. '.</strong></div>',
			$row->user_id,($row->first_name.' '.$row->last_name),
			$row->mobile_number,$row->email_id,
			date('d-M-Y',strtotime($row->created_date)),
			$status,
			$actionBtn);
			$i++;}
			$return['recordsTotal'] = $this->employee->total_count($whereCn);
			$return['recordsFiltered'] = $this->employee->total_filter_count($post_data,$whereCn);
			$return['draw'] = $post_data['draw'];
			echo json_encode($return);
		}	
	
		public function manage($actn=NULL){
			$whereCon=json_decode(base64_decode(urldecode($actn)));
			if($whereCon->action=='editDetails'){
			$isMember=$this->common->getRowData('cordinator_manage','id',$whereCon->existMember);
			$stateList=$this->common->getDataList('states_cities',array('parent_id'=>'729'),'*');
			$distrctList=$this->common->getDataList('states_cities',array('parent_id'=>$isMember->state_id),'*');
			$blockList=$this->common->getDataList('manage_block',array('district_id'=>$isMember->district_id),'*');
			$panchayatList=$this->common->getDataList('manage_panchayat',array('block_id'=>$isMember->block_id),'*');
			$villageList=$this->common->getDataList('manage_village',array('panchayat_id'=>$isMember->panchayat_id),'*');					
			$return=array('title'=>'Edit Employee','breadcrums'=>'Edit Employee','layout'=>'admin/employee/create.php','actnOper'=>$isMember->id,
			'createAction'=>base_url('employee/Man_emp/manage/'.urlencode(base64_encode(json_encode(array('action'=>'updateDetails','existMember'=>$whereCon->existMember))))),
			'arvActionTrgt'=>base_url('employee/Man_emp/findDetails'),'stateList'=>$stateList,
			'isMember'=>$isMember,
			'district'=>$distrctList,'blockWise'=>$blockList,'panchayat'=>$panchayatList,'villageWise'=>$villageList);
			$this->load->view('employee/base',$return);
			}else if($whereCon->action=='viewDetails'){
			$mem_id = json_decode(base64_decode(urldecode($actn)));
			$isMember=$this->common->getRowData('manage_member','id',$mem_id->existMember);
			$return=array('layout'=>'admin/employee/profile.php','actnOper'=>$isMember->id,
			'isMember'=>$isMember);
			$this->load->view('employee/base',$return);}
			else if($whereCon->action=='updateDetails'){
			$this->form_validation->set_rules('gender','Gender','trim|required|xss_clean');
			$this->form_validation->set_rules('frstName','Date of Birth','trim|required|xss_clean');
			$this->form_validation->set_rules('email_id','Email Id','trim|required|xss_clean|valid_email|is_unique[staff.email]');
			$this->form_validation->set_rules('mobileNu','Mobile No.','trim|required|xss_clean|numeric|max_length[10]');
			$this->form_validation->set_rules('empRole','Role','trim|required|xss_clean');
			$this->form_validation->set_rules('empPassword','Password','trim|required|xss_clean');
			if($this->form_validation->run()==TRUE){
			$getRole=array('1'=>'statewise','2'=>'districtwise','3'=>'blockwise','4'=>'panchayatwise','5'=>'villagewise');
			$empLoc=$getRole[$post['empRole']];
			$post=$this->input->post();
			$insertArr=array('user_role'=>$post['empRole'], 'first_name'=>$post['frstName'],'last_name'=>$post['lastName'],'gender'=>$post['gender'],
			'email_id'=>$post['email_id'],'mobile_number'=>$post['mobileNu'],'state_id'=>$post['inputState'],'district_id'=>$post['inputDistrict'],
			'block_id'=>$post['inputBlock'],'panchayat_id'=>$post['inputPanchayat'],'village_id'=>$post['inputVillage'],'address'=>$post['membrAddr'],
			'show_password'=>$post['empPassword'],'password'=>md5($post['empPassword']),'modified_by'=>$this->logID,'modified_type'=>$this->lgCat,
			'modified_date'=>date('Y-m-d H:i:s'));		 
			if($this->common->update_data('cordinator_manage',array('id'=>$post['actnOper']),$insertArr)){$msg=array(' Thank You! you have successfully update details');$data=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('employee/Man_emp/'.$empLoc));}
			else{$msg=array('Oops it seems error.please refresh you page.');$data=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');}
			}else{
			$msg=array('gender'=>form_error('gender'),'frstName'=>form_error('frstName'),'email_id'=>form_error('email_id'),'mobileNu'=>form_error('mobileNu'),'empRole'=>form_error('empRole'),'empPassword'=> form_error('empPassword'));
			$data=array('addClas'=>'tst_danger','msg'=>$msg,'icon'=>'<i class="pe-7s-sun bx-spin"></i>');}
			echo json_encode($data);//Hari Narayan Healthcare Private Limited					
			}			
		}
}
