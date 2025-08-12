<?php
class Territory_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function process_query($where=false)
    {
		$i=0;
	     $field=($where['actionFor']=='stateData')?array('id','state_cities','parent_id','status'):(($where['actionFor']=='districtData')?array('s.id','s.status','s.state_cities','d.state_cities'):array('mb.id','mb.status','mb.block_name','mb.block_code'));
        	
		foreach($field as $item)
		{
           if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
		   else{$this->db->or_like($item, $where['search']['value']);}
           if(count($field) -1==$i){$this->db->group_end();}
           }
            $i++;
        }
        if($where['actionFor']=='stateData')
		{
		 	$this->db->select('s.*')->from('states_cities as s')->where('parent_id',$where['parentID']);
			}
			else if($where['actionFor']=='districtData')
			{
					$this->db->select('s.id,s.status,s.state_cities as st_name,d.state_cities as dist_name');
					$this->db->from('states_cities as s');			   
					$this->db->join('states_cities d', 's.id=d.parent_id', 'inner');
				}
				else if($where['actionFor']=='blockWiseData')
				{
		 			$this->db->select('mb.id,mb.block_code,d.state_cities as districtName,mb.block_name,mb.status,mb.create_date')->from('manage_block as mb')->join('states_cities d', 'mb.district_id=d.id', 'inner');
					}
      /*if(!empty($where['userIdA'])){$this->db->where('username', $where['userIdA']);}
        if(!empty($where['mobileN'])){$this->db->where('mobile', $where['mobileN']);}
        if(!empty($where['emailId'])){$this->db->where('email', $where['emailId']);}
        if(!(empty($where['strtDt'])&&empty($where['endDt']))){$this->db->where('created_at >=', $where['strtDt']);$this->db->where('created_at <=', $where['endDt']);}*/

        if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}
		else
		{
			if(($where['actionFor']=='stateData')||($where['actionFor']=='districtData')){$this->db->order_by('s.state_cities','asc');}
			else if($where['actionFor']=='blockWiseData'){$this->db->order_by('block_name','asc');}
			}
    }
    public function territory_data($where=false)
    {
		//if(($where['actionFor']=='stateData')|| ($where['actionFor']=='districtData')){
			$this->process_query($where);
			//}
		if($where['length']!=-1){$this->db->limit($where['length'],$where['start']);}return $this->db->get()->result();
		}
    public function total_count($where=false)
	{
		//if(($where['actionFor']=='stateData')|| ($where['actionFor']=='districtData')){
			$this->process_query($where);
		//}
		return $this->db->get()->num_rows();
		}
    public function total_filter_count($where=false)
	{
		//if(($where['actionFor']=='stateData')|| ($where['actionFor']=='districtData')){
			$this->process_query($where);
		//}
		return $this->db->get()->num_rows();
		}

	
}
