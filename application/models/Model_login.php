<?php 
	
	/**
	 * 
	 */
class Model_login extends CI_Model
{

/*	function get_cabang(){
		$this->db->select('kodeCabang');
		$this->db->from('cabang');

		return $this->db->get()->result();
	}*/

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
	/*--------------------------------------------------------*/

	function tampil_data_pegawai(){
		return $this->db->get('pegawai');
	}
	
	function input_data_pegawai($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_data_pegawai($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
	function hapus_data_pegawai($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}
	
	function update_data_pegawai($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	/*-----------------------------------------------------------------*/

	function tampil_data_admin(){
		return $this->db->get('admins');
	}
	
	function input_data_admin($data,$table){
		$this->db->insert($table,$data);
	}
	
	function edit_data_admin($where,$table){		
	return $this->db->get_where($table,$where);
	}
	
	function hapus_data_admin($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}
	
	function update_data_admin($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}	

	?>