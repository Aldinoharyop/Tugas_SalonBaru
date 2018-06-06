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

/*	function get_cabang(){
		$data = array {
			'cabang' => $this->Model_login->getArticle();
		}
		$this->load->view()
	}*/

	function index_customer(){
		$this->load->view('admin/home');
	}

	function tambah_customer(){
		$this->load->view('master/register');
	}

	function input_customer(){
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
		/*$this->Model_login->input_data_customer($data,'customers');*/
		$this->db->insert('customers',$data);
		/*redirect('base_url()/index.php/Control_login/index_customer');*/
		/*redirect('customers');*/
		$this->load->view('home');
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

	/*----------------------------------------------------------------------*/

	function index_pegawai(){
		$this->load->view('admin/home');
	}

	function tambah_pegawai(){
		$this->load->view('master/registerPegawai');
	}

	function input_pegawai(){
		$id_pegawai = $this->input->post('id_pegawai');
		$kodeCabang = $this->input->post('kodeCabang');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		
		$data = array(
			'id_pegawai' => $id_pegawai,
			'kodeCabang' => $kodeCabang,
			'nama' => $nama,
			'nip' => $nip
			);
		/*$this->Model_login->input_data_customer($data,'customers');*/
		$this->db->insert('pegawai',$data);
		/*redirect('Control_login/index_customer');*/
		$this->load->view('admin/home');
	}
	
	function edit_pegawai($id){
		$where = array('id_pegawai' => $id);
		$data['pegawai'] = $this->Model_login->edit_data_pegawai($where,'pegawai')->result();
		$this->load->view('',$data);
	}
	
	function hapus_pegawai($id){
		$where = array('id_pegawai' => $id);
		$this->Model_login->hapus_data_customer($where,'pegawai');
		redirect('Control_login/index');
	}
	
	function update_pegawai(){
		$id_pegawai = $this->input->post('id_pegawai');
		$kodeCabang = $this->input->post('kodeCabang');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');

		$data = array(
			'id_pegawai' => $id_pegawai,
			'kodeCabang' => $kodeCabang,
			'nama' => $nama,
			'nip' => $nip
			);

	$this->Model_login->update_data($where,$data,'customers');
	redirect('Control_login/index');
	}

	/*-----------------------------------------------------------------------------*/

	function index_admin(){
		$this->load->view('admin/home');
	}

	function tambah_admin(){
		$this->load->view('master/registerAdmin');
	}

	function input_admin(){
		$id_admin = $this->input->post('id_admin');
		$kodeCabang = $this->input->post('kodeCabang');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$password = $this->input->post('password');
		
		$data = array(
			'id_admin' => $id_admin,
			'kodeCabang' => $kodeCabang,
			'nama' => $nama,
			'nip' => $nip,
			'password' => $password
			);
		/*$this->Model_login->input_data_customer($data,'customers');*/
		$this->db->insert('admins',$data);
		/*redirect('Control_login/index_customer');*/
		/*redirect('admins');*/
		$this->load->view('master/home');
	}
	
	function edit_admin($id){
		$where = array('id_admin' => $id);
		$data['admins'] = $this->Model_login->edit_data_pegawai($where,'admins')->result();
		$this->load->view('',$data);
	}
	
	function hapus_admin($id){
		$where = array('id_admin' => $id);
		$this->Model_login->hapus_data_customer($where,'admins');
		redirect('Control_login/index');
	}
	
	function update_admin(){
		$id_admin = $this->input->post('id_admin');
		$kodeCabang = $this->input->post('kodeCabang');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$password = $this->input->post('password');
			

		$data = array(
			'id_admin' => $id_admin,
			'kodeCabang' => $kodeCabang,
			'nama' => $nama,
			'nip' => $nip,
			'password' => $password
			);

	$this->Model_login->update_data($where,$data,'admins');
	redirect('Control_login/index');
	}

	/*-----------------------------------------------------------------------------------------*/

}
?>