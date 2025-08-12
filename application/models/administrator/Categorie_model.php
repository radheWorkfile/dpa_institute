<?php
class Categorie_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function expense_query($where=false)   
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

		$data = $this->db->select('*')->from('expense');  

		// $this->db->select('w.*,w.created_at as startDate,emp.user_id as empId,emp.first_name as empName');
		// $this->db->from('work_permission as w');
		// $this->db->where('w.working_status',2);
		// $this->db->join('cordinator_manage as emp','emp.id=w.emp_id');
		
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
	}  
	public function expense_model($where = false,$accs=false)
	{$this->expense_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
	public function expense_total_count($accs=false){$this->expense_query($where = false,$accs);return $this->db->get()->num_rows();}
	public function expense_filter_count($where = false,$accs=false){$this->expense_query($where,$accs);return $this->db->get()->num_rows();
	}




	public function incomeList_query($where=false)   
	{
		$i=0;$field = array('id,income_sources,description,description');
		foreach($field as $item)
		{
		   if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
		   else{$this->db->or_like($item, $where['search']['value']);}
		   if(count($field) -1==$i){$this->db->group_end();}
		   }
			$i++;
		}

		$data = $this->db->select('*')->from('category_income');  
		
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
	}  
	public function incomeList_model($where = false,$accs=false)
	{$this->incomeList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
	public function incomeList_count($accs=false){$this->incomeList_query($where = false,$accs);return $this->db->get()->num_rows();}
	public function incomeList_filter_count($where = false,$accs=false){$this->incomeList_query($where,$accs);return $this->db->get()->num_rows();
	}


	public function expenseList_query($where=false)   
	{
		$i=0;$field = array('id,income_sources,description,description');
		foreach($field as $item)
		{
		   if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
		   else{$this->db->or_like($item, $where['search']['value']);}
		   if(count($field) -1==$i){$this->db->group_end();}
		   }
			$i++;
		}

		$data = $this->db->select('*')->from('category_expense');  
		
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
	}  
	public function expenseList_model($where = false,$accs=false)
	{$this->expenseList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
	public function expenseList_count($accs=false){$this->expenseList_query($where = false,$accs);return $this->db->get()->num_rows();}
	public function expenseList_filter_count($where = false,$accs=false){$this->expenseList_query($where,$accs);return $this->db->get()->num_rows();
	}





} 


