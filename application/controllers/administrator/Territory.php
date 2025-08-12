<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Territory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model(array('administrator/territory_model' => 'territory'));
        ($this->session->userdata('user_id')== '') ? redirect(base_url(), 'refresh') : '';//$this->session->userdata('user_id') != '')
 	    $this->lgCat=$this->session->userdata['user_cate'];
	    error_reporting(0);
    }
 public function index()
 {	
		$return=array('title'=>'Territory Manage','breadcrums'=>'Territory Manage','layout'=>'admin/configuration/territory.php','stateAction'=>base_url('administrator/territory/stateDetails/viewList'),
					  'districtAction'=>base_url('administrator/territory/districtDetails/viewList'),'blockAction'=>base_url('administrator/territory/blockDetails/viewList'),
					  'panchayatAction'=>base_url('administrator/territory/panchayatDetails/viewList'),
					  'twnVillageAction'=>base_url('administrator/territory/twnVillageDetails/viewList'),
					  'createAction'=>base_url('administrator/member/create'));
		$this->load->view('base',$return);
	}

  public function stateDetails($actn=NULL)
  {
  	if($actn=='viewList')
	{
		$post_data = $this->input->post();
		$post_data['actionFor']='stateData';
		$post_data['parentID']='729';
		$record = $this->territory->territory_data($post_data);		
		$i = $post_data['start'] + 1;
		$return['data'] = array();
		foreach ($record as $row) {
			$viewUid = base_url('admin/members/view_details/' . $row->id);
			$editUid = base_url('admin/members/manage/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'existMember' => $row->id)))));
			$actionBtn='<div style="text-align:center;"><a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
							<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
						</div>';
			$status=($row->status=='Active')?('<span class="badge badge-primary" style="padding:2px 13px;">'.$row->status.'</span>'):(($row->status=='Block')?('<span class="badge badge-danger" style="padding:2px 14px;">'.$row->status.'</span>'):('<span class="badge badge-warning">'.$row->status.'</span>'))	;		
			$return['data'][]=array('<div style="padding-left:10px"><strong>'.$i. '.</strong></div>',
									$row->state_cities,$status,$actionBtn);
				$i++;					 
		}
		$return['recordsTotal'] = $this->territory->total_count($post_data);
		$return['recordsFiltered'] = $this->territory->total_filter_count($post_data);
		$return['draw'] = $post_data['draw'];
		echo json_encode($return);
		}
	}	
  public function districtDetails($actn=NULL)
  {
  	if($actn=='viewList')
	{
		$post_data = $this->input->post();
		$post_data['actionFor']='districtData';
		$post_data['parentID']='729';
		$record = $this->territory->territory_data($post_data);	
		$i = $post_data['start'] + 1;
		$return['data'] = array();
		foreach ($record as $row) {
			$viewUid = base_url('admin/members/view_details/' . $row->id);
			$editUid = base_url('admin/members/manage/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'existMember' => $row->id)))));
			$actionBtn='<div style="text-align:center;"><a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
							<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
						</div>';
			$status=($row->status=='Active')?('<span class="badge badge-primary" style="padding:2px 13px;">'.$row->status.'</span>'):(($row->status=='Block')?('<span class="badge badge-danger" style="padding:2px 14px;">'.$row->status.'</span>'):('<span class="badge badge-warning">'.$row->status.'</span>'))	;		
			$return['data'][]=array('<div style="padding-left:10px"><strong>'.$i. '.</strong></div>',
									$row->dist_name,$row->st_name,$status,$actionBtn);
				$i++;					 
		}
		$return['recordsTotal'] = $this->territory->total_count($post_data);
		$return['recordsFiltered'] = $this->territory->total_filter_count($post_data);
		$return['draw'] = $post_data['draw'];
		echo json_encode($return);
		}
	}	
  public function blockDetails($actn=NULL)
  {
  	if($actn=='viewList')
	{
		$post_data = $this->input->post();
		$post_data['actionFor']='blockWiseData';
		$record = $this->territory->territory_data($post_data);	
		$i = $post_data['start'] + 1;
		$return['data'] = array();
		foreach ($record as $row) {
			$viewUid = base_url('admin/members/view_details/' . $row->id);
			$editUid = base_url('admin/members/manage/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'existMember' => $row->id)))));
			$actionBtn='<div style="text-align:center;"><a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
							<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
						</div>';
			$status=($row->status=='Active')?('<span class="badge badge-primary" style="padding:2px 13px;">'.$row->status.'</span>'):(($row->status=='Block')?('<span class="badge badge-danger" style="padding:2px 14px;">'.$row->status.'</span>'):('<span class="badge badge-warning">'.$row->status.'</span>'))	;		
			$return['data'][]=array('<div style="padding-left:10px"><strong>'.$i. '.</strong></div>',
									$row->block_name,$row->districtName,$status,$actionBtn);
				$i++;					 
		}
		$return['recordsTotal'] = $this->territory->total_count($post_data);
		$return['recordsFiltered'] = $this->territory->total_filter_count($post_data);
		$return['draw'] = $post_data['draw'];
		echo json_encode($return);
		}
	}		
  public function panchayatDetails($actn=NULL)
  {
  	if($actn=='viewList')
	{
		
		$post_data = $this->input->post();
		$post_data['actionFor']='panchayatWiseData';
		$record = $this->territory->territory_data($post_data);	
		$i = $post_data['start'] + 1;
		$return['data'] = array();
		foreach ($record as $row) {
			$viewUid = base_url('admin/members/view_details/' . $row->id);
			$editUid = base_url('admin/members/manage/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'existMember' => $row->id)))));
			$actionBtn='<div style="text-align:center;"><a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
							<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
						</div>';
			$status=($row->status=='Active')?('<span class="badge badge-primary" style="padding:2px 13px;">'.$row->status.'</span>'):(($row->status=='Block')?('<span class="badge badge-danger" style="padding:2px 14px;">'.$row->status.'</span>'):('<span class="badge badge-warning">'.$row->status.'</span>'))	;		
			$return['data'][]=array('<div style="padding-left:10px"><strong>'.$i. '.</strong></div>',
									$row->panchayat_name,
									$row->block_name,
									$status,
									$actionBtn);
				$i++;					 
		}
		$return['recordsTotal'] = $this->territory->total_count($post_data);
		$return['recordsFiltered'] = $this->territory->total_filter_count($post_data);
		$return['draw'] = $post_data['draw'];
		echo json_encode($return);
		}
	}	
  public function twnVillageDetails($actn=NULL)
  {
  	if($actn=='viewList')
	{
		
		$post_data = $this->input->post();
		$post_data['actionFor']='villageTownWiseData';
		$record = $this->territory->territory_data($post_data);	
		$i = $post_data['start'] + 1;
		$return['data'] = array();
		foreach ($record as $row) {
			$viewUid = base_url('admin/members/view_details/' . $row->id);
			$editUid = base_url('admin/members/manage/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'existMember' => $row->id)))));
			$actionBtn='<div style="text-align:center;"><a href="' . $viewUid . '" class="btn btn-secondary shadow btn-xs sharp" title="View"><i class="mdi mdi-eye"></i></a>
							<a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
						</div>';
			$status=($row->status=='Active')?('<span class="badge badge-primary" style="padding:2px 13px;">'.$row->status.'</span>'):(($row->status=='Block')?('<span class="badge badge-danger" style="padding:2px 14px;">'.$row->status.'</span>'):('<span class="badge badge-warning">'.$row->status.'</span>'))	;		
			$return['data'][]=array('<div style="padding-left:10px"><strong>'.$i. '.</strong></div>',
									$row->village_name,
									$row->panchayat_name,
									$status,
									$actionBtn);
				$i++;					 
		}
		$return['recordsTotal'] = $this->territory->total_count($post_data);
		$return['recordsFiltered'] = $this->territory->total_filter_count($post_data);
		$return['draw'] = $post_data['draw'];
		echo json_encode($return);
		}
	}					
}
