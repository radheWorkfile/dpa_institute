<?php
class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function can_login($email, $password)
    {//->where('status', '1')
        $output =  $this->db->select('id,name,employee_id,email,department as department_type,user_type, image as photo,status,"superadmin" as memberType')->where('BINARY email =', "'" . $email . "'", false)->where(' BINARY password =', "'" . md5($password) . "'", false)->get('staff')->result_array();
        if (!empty($output)) {
            return $output;
        } else{
            $empOutput=$this->db->select("id,first_name,user_id  as employee_id,user_role as user_type,email_id,show_password,password ,
										 CASE 
										 WHEN status='Active' THEN 1
										 WHEN status ='Deactive' THEN 2
										 ELSE 4 END AS status,'employee' as memberType")
            ->where('BINARY email_id=', "'" . $email . "'", false)
            ->where(' BINARY password=', "'" . md5($password) . "'", false)
            ->get('cordinator_manage')->result_array();
            if (!empty($empOutput)){
                return $empOutput;}else{return array();}
            }
    }
	
    function member_login($email, $password)
    {
        $output=$this->db->select('id,name,member_id,email_id,profile_image,status')
        ->where('BINARY email_id=', "'" . $email . "'", false)
        ->where(' BINARY password=', "'" . md5($password) . "'", false)
        ->get('manage_member')->row();
        if (!empty($output)){return $output;}
		else{
            $guestOutput=$this->db->select('id,name,guest_id as member_id,email_id,"" as profile_image,"guest" as status')
            ->where('BINARY email_id=', "'" . $email . "'", false)
            ->where(' BINARY password=', "'" . md5($password) . "'", false)
            ->get('guest_member')->row();
            if (!empty($guestOutput)){
                return $guestOutput;}else{return array();}
            }
    }	
	
    function system_config()
    {
        $this->db->select('*');
        $query = $this->db->get('system_config');
        $config = $query->result_array();
        return $config;
    }

    function get_department()
    {
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get('department');
        return $query->result_array();;
    }

    function get_date_gmt_ist($format)
    {
        $ist_date = date($format, mktime(date('H'), date('i'), date('s'), date("m"), date("d"), date("Y")));
        return $ist_date;
    }
    function checkoldPass($user_id, $array)
    {
        return $this->db->where(array('id' => $user_id, 'password' => md5($array['old_password'])))->count_all_results('users');
    }
    function changePass($user_id, $array)
    {
        $this->db->where('id', $user_id)->update('users', array('password' => md5($array['newpassword'])));
        //echo $this->db->last_query();
    }

    function login_access($id)
    {
        $this->db->where('id', $id);
        $output =  $this->db->get('users')->result_array();
        if (!empty($output)) {
            return $output;
        } else return array();
    }

    public function log_add($data)
    {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('userlog', $data);
        } else {
            $this->db->insert('userlog', $data);
        }
    }
}
