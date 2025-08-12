<?php
class Accounting_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function expense_query($where=false)   
	{
		$i=0;$field = array('id,expense_id,created_at,receiver_name,receiver_number');
		foreach($field as $item)
		{
		   if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
		   else{$this->db->or_like($item, $where['search']['value']);}
		   if(count($field) -1==$i){$this->db->group_end();}
		   }
			$i++;
		}

		$data = $this->db->select('*')->from('expense');  
		
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
	}  
	public function expense_model($where = false,$accs=false)
	{
	$this->expense_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
	public function expense_total_count($accs=false){$this->expense_query($where = false,$accs);return $this->db->get()->num_rows();}
	public function expense_filter_count($where = false,$accs=false){$this->expense_query($where,$accs);return $this->db->get()->num_rows();
	}


	public function income_list_query($where=false)   
	{
		$i=0;$field = array('inc.id,incSour,inc.created_at,inc.receiver_name,inc.receiver_number');
		foreach($field as $item)
		{
		   if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
		   else{$this->db->or_like($item, $where['search']['value']);}
		   if(count($field) -1==$i){$this->db->group_end();}
		   }
			$i++;
		}

		// $data = $this->db->select('*')->from('income');  
		$data = $this->db->select('inc.*,incCat.income_sources as incSour')->from('income as inc')->join('category_income as incCat','incCat.id=inc.otherIncome');  
		
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
	}  
	public function income_model($where = false,$accs=false)
	{
	$this->income_list_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
	public function income_list_total_count($accs=false){$this->income_list_query($where = false,$accs);return $this->db->get()->num_rows();}
	public function income_list_filter_count($where = false,$accs=false){$this->income_list_query($where,$accs);return $this->db->get()->num_rows();
	}
	// 


} 


