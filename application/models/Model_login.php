<?php 
	
	/**
	 * 
	 */
	class Model_login extends CI_Model
	{

	function tampil_data_customer(){
		return $this->db->get('customers');
	}
	
	function input_data_customer($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_data_customer($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
	function hapus_data_customer($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}
	
	function update_data_customer($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
	} 
	?>