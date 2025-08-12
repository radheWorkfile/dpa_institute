<?php
class Donation_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}



	public function donate_pay_query($where = false){
    $fields = array('id');
    if (!empty($where['search']['value'])) {
        $this->db->group_start();foreach ($fields as $index => $field) {
        if ($index === 0) {$this->db->like($field, $where['search']['value']);
		} else { $this->db->or_like($field, $where['search']['value']);}}
        $this->db->group_end();}
		$this->db->select("*")->from('donate');
		if (isset($where['order']) && !empty($where['order'])) {
        $this->db->order_by($fields[$where['order'][0]['column']], $where['order'][0]['dir']);
		} else {$this->db->order_by('id', 'desc');}}
		public function donate_pay_model($where = false){
		$this->donate_pay_query($where);if ($where['length'] != -1){
	    $this->db->limit($where['length'], $where['start']);}return $this->db->get()->result();}
		public function total_count(){
		$this->donate_pay_query();return $this->db->count_all_results();}
		public function total_filter_count($where = false){
    	$this->donate_pay_query($where);return $this->db->count_all_results();
	}


	
    }

	


