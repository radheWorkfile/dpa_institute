<?php
class Front_cms_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
   
// ==================================== Volunteer Model Section start from here ======================================= 
    public function volunteerList_query($where=false){
        $i=0;$field = array('id');
        foreach($field as $item){
        if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
        else{$this->db->or_like($item, $where['search']['value']);}
        if(count($field) -1==$i){$this->db->group_end();}
        }$i++;}
        $data = $this->db->select('*')->from('cms_volunteer')->where('created_by_user_type_id', $this->session->userdata('user_id'));
        if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
        }}  
        public function volunteerListModel($where = false,$accs=false)
        {$this->volunteerList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
        public function volunteerList_total_count($accs=false){$this->volunteerList_query($where = false,$accs);return $this->db->get()->num_rows();}
        public function volunteerList_filter_count($where = false,$accs=false){$this->volunteerList_query($where,$accs);return $this->db->get()->num_rows();
        }
// ==================================== Volunteer Model Section End ======================================= 
// ==================================== Event Sectioni start form here ======================================= 
public function eventList_query($where=false)
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
    $data = $this->db->select('*')->from('cms_event')->where('created_user_type_id', $this->session->userdata('user_id'));
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }
}

 public function eventListModel($where = false,$accs=false)
{$this->eventList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
public function eventList_total_count($accs=false){$this->eventList_query($where = false,$accs);return $this->db->get()->num_rows();}
public function eventList_total_filter_count($where = false,$accs=false){$this->eventList_query($where,$accs);return $this->db->get()->num_rows();
}

// ==================================== Event Section End ======================================= 

// ==================================== Ticket Section Start From Here ======================================= 
public function ticketList_query($where=false)   
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
    $data = $this->db->select('*')->from('ticket')->where('mem_id',$this->session->userdata('user_id'));
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }
}  

 public function ticketList_model($where = false,$accs=false)
{$this->ticketList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
public function ticketList_total_count($accs=false){$this->ticketList_query($where = false,$accs);return $this->db->get()->num_rows();}
public function ticketList_filter_count($where = false,$accs=false){$this->ticketList_query($where,$accs);return $this->db->get()->num_rows();
}

// ==================================== Ticket Section Start From Here ======================================= 


// ==================================== Feedback Section Start From Here ======================================= 
public function feedbackList_query($where=false)   
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
    $data = $this->db->select('feed.*,emp.first_name as empName,emp.mobile_number as empMobNo')->from('feedback as feed');
    $this->db->join('cordinator_manage as emp','emp.id=feed.created_by_user_type_id');
    $this->db->where('feed.created_by_user_type_id', $this->session->userdata('user_id'));
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }
}  

 public function feedbackList_model($where = false,$accs=false)
{$this->feedbackList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
public function feedbackList_total_count($accs=false){$this->feedbackList_query($where = false,$accs);return $this->db->get()->num_rows();}
public function feedbackList_filter_count($where = false,$accs=false){$this->feedbackList_query($where,$accs);return $this->db->get()->num_rows();
}
// ==================================== Feedback Section End ======================================= 




	
}

	


