<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class basic_model extends CI_Model {

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

	public function count_table_record($tbl){
		$this->db->from($tbl);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
	}

	public function get_all_record($tbl){
		$query = $this->db->get($tbl);
		return $query->result_array();
	}

	public function get_all_record_order_by($tbl,$order_by_clm,$order_by_val='ASC'){
		$this->db->order_by($order_by_clm,$order_by_val);
		$query = $this->db->get($tbl);
		return $query->result_array();
	}

	public function get_record_where($tbl,$clm,$val){
		$row = $this->db->get_where($tbl, array($clm => $val))->result_array();
		return $row;
	}

	public function get_distinct_record($tbl,$clm){
		$this->db->distinct();
		$this->db->select($clm);
		$query= $this->db->get($tbl);
		return $query->result_array();
	}

	public function update_where($tbl,$clm,$val,$data){
		$this->db->where($clm, $val);
        $this->db->update($tbl, $data);
	}

	public function get_city_wise_listing($city){
		$sql="SELECT DISTINCT BD.BRAND_ID,BD.BRAND_NAME FROM product P, brand_details BD WHERE P.BRAND_ID=BD.BRAND_ID AND BD.CITY='$city'";
                $query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
                
                
//              $this->db->select('P.*,BD.*');
//		$this->db->from('product P');
//            	$this->db->join('brand_details BD',"P.BRAND_ID=BD.BRAND_ID AND BD.CITY='$city'");
//             
//		$query = $this->db->get();
//		return $query->result_array();
	}

	public function product_join_offer($product_id){
		$query = $this->db->query("SELECT P.*,OF.* FROM product P, offer_details OF WHERE P.PRODUCT_ID=OF.PRODUCT_ID AND P.PRODUCT_ID='$product_id' ");
		$result = $query->result_array();
		return $result;
	}

	public function product_wise_records(){
		/*
			P.*,BD.BRAND_DATA_ID,BD.BRAND_NAME,BD.BUSINESS_ADDRESS,BD.PHONE,BD.CITY,BD.PINCODE
			FROM brand_details BD, product P
			WHERE BD.BRAND_ID=P.BRAND_ID
		*/

		/*		
			SELECT OF.*,P.*,BD.* FROM offer_details OF, product P,brand_details BD WHERE OF.PRODUCT_ID=P.PRODUCT_ID AND BD.BRAND_ID=OF.BRAND_ID  ORDER BY P.PRODUCT_ID
		*/

		/*$query = $this->db->query("SELECT OF.*,P.*,BD.* FROM offer_details OF, product P,brand_details BD WHERE OF.PRODUCT_ID=P.PRODUCT_ID AND BD.BRAND_ID=OF.BRAND_ID  ORDER BY P.PRODUCT_ID");
		$result = $query->result_array();
		return $result;*/


		//$query = $this->db->query("SELECT P.*, OF.* FROM product P LEFT OUTER JOIN offer_details OF ON OF.PRODUCT_ID=P.PRODUCT_ID");
                $query = $this->db->query("SELECT P.PRODUCT_ID,P.PRODUCT_NAME,P.PRODUCT_IMAGE,OF.OFFER_END,OF.OFFER_TITLE FROM product P LEFT OUTER JOIN offer_details OF ON OF.PRODUCT_ID=P.PRODUCT_ID");
		
                $result = $query->result_array();
		return $result;

		/*$this->db->select('P.*,BD.BRAND_DATA_ID,BD.BRAND_NAME,BD.BUSINESS_ADDRESS,BD.PHONE,BD.CITY,BD.PINCODE,OF.OFFER_ID,OF.OFFER_TITLE,OF.OFFER_START,OF.OFFER_END');
		$this->db->from('brand_details BD');
		$this->db->join('product P', 'BD.BRAND_ID=P.BRAND_ID');
		$this->db->join('offer_details OF', 'P.PRODUCT_ID=OF.PRODUCT_ID');
		
		$query = $this->db->get();
		return $query->result_array();*/
	}

	public function offer_side_product(){
		$this->db->select('P.*,O.*');
		$this->db->from('offer_details O');
		$this->db->join('product P','P.PRODUCT_ID=O.PRODUCT_ID AND O.OFFER_END > CURDATE()');
		$this->db->order_by('P.PRODUCT_ID DESC');

		$query=$this->db->get();
		return $query->result_array();
		/*SELECT P.*,O.*
		FROM product P, offer_details O
		WHERE P.PRODUCT_ID=O.PRODUCT_ID AND O.OFFER_END > CURDATE()
		ORDER BY P.PRODUCT_ID*/
	}

	public function brand_wise_product($brandId){
		$this->db->select('OF.*,P.*');
		$this->db->from('offer_details OF');
		$this->db->join('product P',"OF.PRODUCT_ID=P.PRODUCT_ID AND OF.OFFER_END >= CURDATE() AND P.BRAND_ID='$brandId' ORDER BY OF.OFFER_ADDED_ON DESC");

		$query = $this->db->get();
		return $query->result_array();
		/*
		SELECT OF.*,P.*
		FROM offer_details OF, product P
		WHERE P.PRODUCT_ID='3' AND OF.PRODUCT_ID=P.PRODUCT_ID AND OF.OFFER_END >= CURDATE()
		*/
	}

	public function is_user($username, $password){
		$query = $this->db->get_where('useraccount', array('Username' => $username, 'Password' => md5($password)));
		return ($query->num_rows == 1) ? TRUE : FALSE;
	}
	

	public function get_user_detail($username){
		$row = $this->db->get_where('useraccount', array('Username' => $username))->row();
		return $row;
	}

	public function get_username($email){
		$row = $this->db->get_where('members2', array('email' => $email))->row();
		return $row->username;
	}
	
	public function get_contacts($uid){
		$contacts = $this->db->select('name, email, phone')->
					order_by('name')->
					get_where('contacts', array('uid' => $uid))->result_array();
	 	return $contacts;
	}
	
	public function get_contact_names($uid){
		$contacts = $this->db->select('name')->
					order_by('name')->
					get_where('contacts', array('uid' => $uid))->result_array();
	 	return $contacts;
	}
	
	public function get_contact_data($uid, $name){
		$contact = $this->db->select('name, email, phone')->
					get_where('contacts', array('uid' => $uid, 'name' => $name))->
					row_array();
	 	return $contact;
	}
	
	public function delete_contact($name, $uid){
		$this->db->delete('contacts', array('name' => $name, 'uid' => $uid)); 
	}
	
	public function add_contact($name, $email, $phone, $uid){
		$query = $this->db->get_where('contacts', array('name' => $name, 'uid' => $uid));
		if($query->num_rows == 1){
			return FALSE;
		}
		$this->db->insert('contacts', array('name' => $name, 'email' => $email, 'phone' => $phone, 'uid' => $uid)); 
		return TRUE;
	}
	
	public function update_contact($name, $email, $phone, $uid){
		$this->db->update('contacts', array('email' => $email, 'phone' => $phone), array('uid' => $uid, 'name' => $name));
	}
	
	public function validate_password($uid, $password){
		$query = $this->db->get_where('user', array('uid' => $uid, 'password' => md5($password)));
		return ($query->num_rows == 1) ? TRUE : FALSE;
	}
	
	public function update_password($uid, $password){
		$this->db->update('user', array('password' => md5($password)), array('uid' => $uid));
	}

	public function update_last_login($uid){
		$now = time();
		$log_date=unix_to_human($now);
		$this->db->update('user', array('USER_LAST_LOGIN' =>$now), array('USER_ID' => $uid));
	}

}
?>
