<?php
class Employee_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getDataList($tblName,$where,$sel)
	{
		$this->db->select($sel);
		$this->db->from($tblName);
		$this->db->where($where);
		$result = $this->db->get();
		return $result->result();
	}
	
	public function process_query($where=false)
    {
		$i=0;$field = array('id','user_id','first_name','email_id');
        foreach($field as $item)
		{
           if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
		   else{$this->db->or_like($item, $where['search']['value']);}
           if(count($field) -1==$i){$this->db->group_end();}
           }
            $i++;
        }
        $data = $this->db->select('*')->from('cordinator_manage');
        if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
        }
    }

     public function member_data($where = false,$accs=false)
    {$this->process_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
    public function total_count($accs=false){$this->process_query($where = false,$accs);return $this->db->get()->num_rows();}
    public function total_filter_count($where = false,$accs=false){$this->process_query($where,$accs);return $this->db->get()->num_rows();
    }



	
  } 


