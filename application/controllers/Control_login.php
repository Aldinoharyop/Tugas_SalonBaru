<?php
	/**
	*
	*/

class Control_login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_login');
		$this->load->helper('url');
	}

	function index_customer(){
		$this->load->view('admin/home');
	}

	function tambah_customer(){
		$this->load->view('master/register');
	}

	function input(){
		$id_customer = $this->input->post('id_customer');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nohp = $this->input->post('nohp');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');
		
		$data = array(
			'id_customer' => $id_customer,
			'nama' => $nama,
			'email' => $email,
			'nohp' => $nohp,
			'alamat' => $alamat,
			'password' => $password
			);
		$this->Model_login->input_data_customer($data,'customers');
		redirect('Control_login/index_customer');
	}
	
	function edit_customer($id){
		$where = array('id_customer' => $id);
		$data['customer'] = $this->Model_login->edit_data_customer($where,'customers')->result();
		$this->load->view('',$data);
	}
	
	function hapus_customer($id){
		$where = array('id_customer' => $id);
		$this->Model_login->hapus_data_customer($where,'customers');
		redirect('Control_login/index');
	}
	
	function update_customer(){
		$id_customer = $this->input->post('id_customer');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nohp = $this->input->post('nohp');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');

		$data = array(
			'id_customer' => $id_customer,
			'nama' => $nama,
			'email' => $email,
			'nohp' => $nohp,
			'alamat' => $alamat,
			'password' => $password
			);

	$this->Model_login->update_data($where,$data,'customers');
	redirect('Control_login/index');
	}

}
?>