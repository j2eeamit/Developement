<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function insert_into_table($tbl,$val){
		$this->db->insert($tbl,$val);
        if($this->db->affected_rows() == 1) {
           return TRUE;
        }else{
           return FALSE;
        }
	}

	public function check_record($tbl,$clm,$value){
		$query=$this->db->get_where($tbl,array($clm =>trim($value)));
		return ($query->num_rows > 0) ? TRUE : FALSE;
		/*$this->db->where('EmailId',$value);
	    $query = $this->db->get('useraccount');

	    if ($query->num_rows() > 0){
	        return true;
	    }else{
	        return false;
	    }*/

	}

	public function count_record_where($tbl,$clm,$value){
		$this->db->select($clm);
		$this->db->from($tbl);
		$this->db->where($clm,$value);
		$query = $this->db->get();
		return $query->num_rows;
	}

	public function is_user($username, $password){
		//echo $username."##". $password." #### ".md5($password);exit;
		$query = $this->db->get_where('useraccount', array('Username' => $username, 'Password' => md5($password)));
		return ($query->num_rows == 1) ? TRUE : FALSE;
	}
	
	public function get_user_detail($username){
		$row = $this->db->get_where('useraccount', array('Username' => $username))->row();
		return $row;
	}
	

}
?>
