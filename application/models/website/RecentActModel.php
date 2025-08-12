<?php
class RecentActModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function process_query($where=false)
    {
    $i=0;$field = array('id');
    foreach($field as $item){
    if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
    else{$this->db->or_like($item, $where['search']['value']);}
    if(count($field) -1==$i){$this->db->group_end();}
    }$i++;}
    $data = $this->db->select('*')->from('cms_news');
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }}
    public function news_data($where = false,$accs=false)
    {$this->process_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
    public function total_count($accs=false){$this->process_query($where = false,$accs);return $this->db->get()->num_rows();}
    public function total_filter_count($where = false,$accs=false){$this->process_query($where,$accs);return $this->db->get()->num_rows();
    }


public function banner_query($where=false)
{
    $i=0;$field = array('id');
    foreach($field as $item){
    if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
    else{$this->db->or_like($item, $where['search']['value']);}
    if(count($field) -1==$i){$this->db->group_end();}
    }$i++;}
    $data = $this->db->select('*')->from('cms_slider');
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }}
    public function showBannerList_data($where = false,$accs=false)
    {$this->banner_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
    public function banner_total_count($accs=false){$this->banner_query($where = false,$accs);return $this->db->get()->num_rows();}
    public function banner_total_filter_count($where = false,$accs=false){$this->banner_query($where,$accs);return $this->db->get()->num_rows();
    }


public function eventList_query($where=false)
{
    $i=0;$field = array('id');
    foreach($field as $item){
    if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
    else{$this->db->or_like($item, $where['search']['value']);}
    if(count($field) -1==$i){$this->db->group_end();}
    }$i++;}
    $data = $this->db->select('*')->from('cms_event');
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }}
    public function eventListModel($where = false,$accs=false)
    {$this->eventList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
    public function eventList_total_count($accs=false){$this->eventList_query($where = false,$accs);return $this->db->get()->num_rows();}
    public function eventList_total_filter_count($where = false,$accs=false){$this->eventList_query($where,$accs);return $this->db->get()->num_rows();
    }


public function galleryList_query($where=false)
{
    $i=0;$field = array('id');
    foreach($field as $item){
    if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
    else{$this->db->or_like($item, $where['search']['value']);}
    if(count($field) -1==$i){$this->db->group_end();}
    }$i++;}
    $data = $this->db->select('*')->from('cms_gallery');
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }}
    public function galleryListModel($where = false,$accs=false)
    {$this->galleryList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
    public function galleryList_total_count($accs=false){$this->galleryList_query($where = false,$accs);return $this->db->get()->num_rows();}
    public function galleryList_total_filter_count($where = false,$accs=false){$this->galleryList_query($where,$accs);return $this->db->get()->num_rows();
    }


public function teamMemListModel_query($where=false)
{
    $i=0;$field = array('id');
    foreach($field as $item){
    if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
    else{$this->db->or_like($item, $where['search']['value']);}
    if(count($field) -1==$i){$this->db->group_end();}
    }$i++;}
    $data = $this->db->select('*')->from('cms_team');
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }}  
    public function teamMemListModel($where = false,$accs=false)
    {$this->teamMemListModel_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
    public function teamMemList_total_count($accs=false){$this->teamMemListModel_query($where = false,$accs);return $this->db->get()->num_rows();}
    public function teamMemList_total_filter_count($where = false,$accs=false){$this->teamMemListModel_query($where,$accs);return $this->db->get()->num_rows();
    }


public function volunteerList_query($where=false)   
{
    $i=0;$field = array('id');
    foreach($field as $item){
    if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
    else{$this->db->or_like($item, $where['search']['value']);}
    if(count($field) -1==$i){$this->db->group_end();}
    }$i++;}
    $data = $this->db->select('*')->from('cms_volunteer');
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }}  
    public function volunteerListModel($where = false,$accs=false)
    {$this->volunteerList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
    public function volunteerList_total_count($accs=false){$this->volunteerList_query($where = false,$accs);return $this->db->get()->num_rows();}
    public function volunteerList_filter_count($where = false,$accs=false){$this->volunteerList_query($where,$accs);return $this->db->get()->num_rows();
    }


public function projectList_query($where=false)   
{
    $i=0;$field = array('id');
    foreach($field as $item){
    if(!empty($where['search']['value'])){if($i===0){$this->db->group_start()->like($item, $where['search']['value']);}
    else{$this->db->or_like($item, $where['search']['value']);}
    if(count($field) -1==$i){$this->db->group_end();}
    }$i++;}
    $data = $this->db->select('*')->from('cms_project');
    if(isset($where['order'])&& !empty($where['order'])){$this->db->order_by($field[$where['order']['0']['column']],$where['order']['0']['dir']);}else{$this->db->order_by('id','desc');
    }}  
    public function projectList_model($where = false,$accs=false)
    {$this->projectList_query($where,$accs);if ($where['length'] != -1) {$this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
    public function projectList_total_count($accs=false){$this->projectList_query($where = false,$accs);return $this->db->get()->num_rows();}
    public function projectList_filter_count($where = false,$accs=false){$this->projectList_query($where,$accs);return $this->db->get()->num_rows();
  }

	
}

	


