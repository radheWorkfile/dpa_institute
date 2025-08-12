<?php
class Common_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function del_data_con($tblName, $con, $val)
	{
		if ($val) {
			$this->db->where($con, $val);
			$query = $this->db->delete($tblName);
			if ($query) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


	function del_data_multi_con($tblName, $con)
	{
		if ($con) {
			$this->db->where($con);
			$query = $this->db->delete($tblName);
			if ($query) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function save_data($table, $val)
	{
		if ($this->db->insert($table, $val)) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	function all_data($table, $sel)
	{
		return $this->db->select($sel)->order_by('id', 'ASC')->get($table)->result_array();
	}

	function all_data_con($table, $val, $sel)
	{
		return $this->db->select($sel)->where($val)->get($table)->result_array();
	}

	function get_data($table, $data, $sel)
	{
		return $this->db->select($sel)->where($data)->get($table)->row_array();
	}

	function get_last($table, $sel)
	{
		return $this->db->select($sel)->order_by('id', 'DESC')->get($table)->row_array();
	}
	function update_data($table, $con, $data)
	{
		$this->db->where($con);
		if ($this->db->update($table, $data)) {
			return true;
		} else {
			return false;
		}
	}

	// public function update_datas($table, $data)
	// {
	//     $this->db->where('id', $data['id']);
	//     $this->db->update($table, $data);
	// }

	function del_data($val)
	{
		if ($val) {
			$this->db->where('id', $val['id']);
			$query = $this->db->delete($val['table']);
			if ($query) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


	function chageStatus($value)
	{
		$this->db->where('id', $value['id'])->update($value['table'], array('status' => $value['status']));
	}



	public function count_all($table, $where = "1=1")
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->count_all_results();
	}

	public function sum_all($sum, $table, $where = "1=1")
	{
		$this->db->select_sum($sum);
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row_array();
	}

	function getIndianCurrency(float $number)
	{
		$decimal = round($number - ($no = floor($number)), 2) * 100;
		$hundred = null;
		$digits_length = strlen($no);
		$i = 0;
		$str = array();
		$words = array(
			0 => '', 1 => 'One', 2 => 'Two',
			3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
			7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
			10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
			13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
			16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
			19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
			40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
			70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
		);
		$digits = array('', 'Hundred', 'Thousand', 'lakh', 'Crore');
		while ($i < $digits_length) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += $divider == 10 ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
			} else $str[] = null;
		}
		$Rupees = implode('', array_reverse($str));
		$paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
		return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
	}

	function all_data_list($table, $sel)
	{
		return $this->db->select($sel)->order_by('id', 'ASC')->get($table)->result_array();
	}
	function recent_joint($tblName, $sel)
	{
		$this->db->select($sel);
		$this->db->from($tblName);
		$this->db->limit('5');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get();
		return $result->result();
	}
	function get_first($table, $sel)
	{
		return $this->db->select($sel)->order_by('id', 'ASC')->get($table)->row();
	}
	public function get_state_district($tblName, $con, $id)
	{
		$this->db->select('s.state_cities as st_name,d.state_cities as dist_name');
		$this->db->from($tblName);
		$this->db->where($tblName . '.' . $con, $id);
		$this->db->join('states_cities as s', 'users.state=s.id', 'left');
		$this->db->join('states_cities d', 'users.district=d.id', 'left');
		$result = $this->db->get();
		return $result->row();
	}
	public function getDataList($tblName,$where,$sel)
	{
		$this->db->select($sel);
		$this->db->from($tblName);
		$this->db->where($where);
		$result = $this->db->get();
		return $result->result();
	}
	
	public function getDataListByOrder($tblName,$where,$sel,$orderBy)
	{
		$this->db->select($sel);
		$this->db->from($tblName);
		$this->db->where($where);
		if($orderBy){$this->db->order_by($orderBy,'ASC');}
		$result = $this->db->get();
		return $result->result();
	}	
	
	
	
	
	public function getDataGroupByList($tblName,$where,$sel,$groupBy)
	{
		$this->db->select($sel);
		$this->db->from($tblName);
		$this->db->where($where);
		$this->db->group_by($groupBy);
		$result = $this->db->get();
		return $result->result();
	}	
	public function getRowData($tblName, $cond, $id)
	{
		$this->db->from($tblName);
		$this->db->where($cond, $id);
		$result = $this->db->get();
		return $result->row();
	}
	public function system_config()
	{
		$this->db->select('*');
		$query = $this->db->get('system_config');
		$config = $query->result_array();
		return $config;
	}

	public function employee_all_data($id)
	{
		$this->db->select('id, employee_id, name, gender');
		$this->db->where('id', $id);
		$data = $this->db->get('staff');
		return $data->row_array();
	}
    public function getLastRecord($tblName)
	{
		return $this->db->select('*')->from($tblName)->limit('1')->order_by('id', 'desc')->get()->row();
	}
	
public function shift()
{
	$curTime=date('H:i:s');
	if(($curTime > '02:00:00')&&($curTime <'10:00:00')){$return=array('curntShift'=>'17','offShift'=>'18');}
	else if(($curTime >'10:00:00')&&($curTime <'18:00:00')){$return=array('curntShift'=>'18','offShift'=>'19');}
	else if(($curTime > '18:00:00')&&($curTime <'23:59:59')){$return=array('curntShift'=>'19','offShift'=>'18');}
	else{$return=array('curntShift'=>'17','offShift'=>'18');}
		return $return;
	}	 	
public function balance_sheet($where)
{
	$return=$this->db->select('*')->from('company_income')->where('id >',$where['id'])->get()->result();$result=false;
	if($return)
	{
		$cnt=0;
		foreach($return as $list)
		{
			$cnt++;
			$getRecord=$this->db->select('*')->from('company_income')->where('id <',$list->id)->limit('1')->order_by('id', 'desc')->get()->row();
			$changeClosing=$getRecord->closing_balance+$list->credit_amt-$list->debit_amt;
			$newOpening=array('opening_balance'=>$getRecord->closing_balance,'debit_amt'=>$list->debit_amt,'credit_amt'=>$list->credit_amt,'closing_balance'=>$changeClosing);
			$resultCnf=$this->update_data('company_income',array('id'=>$list->id),$newOpening);			
			$result=($resultCnf==1)?true:false;
			}
	 }
	 return $result;
  } 


	
}
