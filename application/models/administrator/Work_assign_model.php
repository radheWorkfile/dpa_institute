<?php
class Work_assign_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function work_assign_query($where=false)   
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
		// $data = $this->db->select('*')->from('work_permission');  

		$this->db->select('w.*,w.created_at as startDate,emp.user_id as empId,emp.first_name as empName');
		$this->db->from('work_permission as w');
		$this->db->where('w.working_status',2);
		$this->db->join('cordinator_manage as emp','emp.id=w.emp_id');
		
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
	}  
	public function work_assign_model($where = false,$accs=false)
	{$this->work_assign_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
	public function work_assign_total_count($accs=false){$this->work_assign_query($where = false,$accs);return $this->db->get()->num_rows();}
	public function work_assign_filter_count($where = false,$accs=false){$this->work_assign_query($where,$accs);return $this->db->get()->num_rows();
	}


	


	public function running_work_query($where=false)   
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

		$this->db->select('rw.*,rw.created_at as startDate,emp.user_id as empId,emp.first_name as empName');
		$this->db->from('work_running as rw');
		$this->db->where(array('rw.working_status'=>1, 'rw.status' => 1));
		$this->db->join('cordinator_manage as emp','emp.id=rw.emp_id');
		
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
		}  
		public function running_work_model($where = false,$accs=false)
		{$this->running_work_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
		public function running_work_total_count($accs=false){$this->running_work_query($where = false,$accs);return $this->db->get()->num_rows();}
		public function running_work_filter_count($where = false,$accs=false){$this->running_work_query($where,$accs);return $this->db->get()->num_rows();
		}



		

		
	public function closed_work_query($where=false)   
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

		$this->db->select('w.*,w.created_at as startDate,emp.user_id as empId,emp.first_name as empName');
		$this->db->from('work_permission as w');
		$this->db->where('w.working_status', 3);
		$this->db->join('cordinator_manage as emp','emp.id=w.emp_id');
		
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
		}  
		public function closed_work_model($where = false,$accs=false)
		{$this->closed_work_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
		public function closed_work_total_count($accs=false){$this->closed_work_query($where = false,$accs);return $this->db->get()->num_rows();}
		public function closed_work_filter_count($where = false,$accs=false){$this->closed_work_query($where,$accs);return $this->db->get()->num_rows();
		}




} 


