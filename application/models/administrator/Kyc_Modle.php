<?php
class Kyc_Modle extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function kycModel_query($where=false)   
	{
		$i=0;$field = array('id');
		foreach($field as $item)
		{
		   if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
		   else{$this->db->or_like($item, $where['search']['value']);}
		   if(count($field) -1==$i){$this->db->group_end();}
		   }
			$i++;
		}
		$data = $this->db->select('kyc.*,emp.user_id as empId, emp.kyc_status')->from('kyc_table as kyc')->join('cordinator_manage as emp','emp.id= kyc.emp_id');
		// $data = $this->db->select('*')->from('kyc_table');
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
	}  
	public function kycModel($where = false,$accs=false)
	{$this->kycModel_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
	public function kyc_total_count($accs=false){$this->kycModel_query($where = false,$accs);return $this->db->get()->num_rows();}
	public function kyc_filter_count($where = false,$accs=false){$this->kycModel_query($where,$accs);return $this->db->get()->num_rows();
	}




} 


