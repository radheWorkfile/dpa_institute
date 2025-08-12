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
	
	public function process_query($where=false,$accs=false)
    {
		$aftrDecode=json_decode(base64_decode(urldecode($accs)));
		$i=0;$field = array('id','first_name','last_name','gender','email_id','mobile_number','address','status');
        foreach($field as $item)
		{
           if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
		   else{$this->db->or_like($item, $where['search']['value']);}
           if(count($field) -1==$i){$this->db->group_end();}
           }
            $i++;
        }
        $this->db->select('*')->from('cordinator_manage')->where('user_role',$aftrDecode->m_type);
		if($aftrDecode->targetData=='active'){$this->db->where('status','Active');}
		if($aftrDecode->targetData=='deactive'){$this->db->where('status','Deactive');}
		if($aftrDecode->targetData=='suspended'){$this->db->where('status','Suspend');}
		/*
        if (!empty($where['userIdA'])) {$this->db->where('username', $where['userIdA']);}
        if (!empty($where['mobileN'])) {$this->db->where('mobile', $where['mobileN']);}
        if (!empty($where['emailId'])) {$this->db->where('email', $where['emailId']);}
        if (!(empty($where['strtDt']) && empty($where['endDt']))) {$this->db->where('created_at >=', $where['strtDt']);$this->db->where('created_at <=', $where['endDt']);}*/

        if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
        }
    }
    public function member_data($where = false,$accs=false)
    {$this->process_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
    public function total_count($accs=false){$this->process_query($where = false,$accs);return $this->db->get()->num_rows();}
    public function total_filter_count($where = false,$accs=false){$this->process_query($where,$accs);return $this->db->get()->num_rows();}
	
  } 


