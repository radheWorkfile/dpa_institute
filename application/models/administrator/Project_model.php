<?php
class Project_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function projectList_query($where=false)   
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
		$data = $this->db->select('*')->from('category_project');
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
	}  
	public function projectList_model($where = false,$accs=false)
	{$this->projectList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
	public function projectList_total_count($accs=false){$this->projectList_query($where = false,$accs);return $this->db->get()->num_rows();}
	public function projectList_filter_count($where = false,$accs=false){$this->projectList_query($where,$accs);return $this->db->get()->num_rows();
	}


	public function programList_query($where=false)   
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
		$data = $this->db->select('*')->from('category_program');
		if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
		}
	}  
	public function programList_model($where = false,$accs=false)
	{$this->programList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
	public function programList_count($accs=false){$this->programList_query($where = false,$accs);return $this->db->get()->num_rows();}
	public function programList_filter_count($where = false,$accs=false){$this->programList_query($where,$accs);return $this->db->get()->num_rows();
	}

	
}
