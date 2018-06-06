<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Model_user extends CI_Model {
		
		public function login_customer($data) {
			$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
			$this->db->select('*');
			$this->db->from('customers');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}

// Read data from database to show data in admin page
		public function read_user_information_customer($email) {
			$condition = "email =" . "'" . $email . "'";
			$this->db->select('*');
			$this->db->from('customers');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}
}

