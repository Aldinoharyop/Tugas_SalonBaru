<?php
defined('BASEPATH') OR exit('No direct script access allowed');{
    class Service extends CI_Controller{
      public function index ()
      {
        $this->load->model('model_paket');
        $data['categoryis']=$this->model_paket->get_category();
        $data['services']=$this->model_paket->get_layanan();
        $data['model_paket']=$this->model_paket;
          $this->load->view('layanan', $data);
      }

    function tambah_service(){
        $this->load->view('master/addService');
    }

    function input_service(){
        $id_service = $this->input->post('id_service');
        $id_category = $this->input->post('id_category');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        
        $data = array(
            'id_service' => $id_service,
            'id_category' => $id_category,
            'nama' => $nama,
            'harga' => $harga
            );
        /*$this->Model_login->input_data_customer($data,'customers');*/
        $this->db->insert('service',$data);
        /*redirect('Control_login/index_customer');*/
        $this->load->view('master/home');
    }
    
    function edit_service($id){
        $where = array('id_service' => $id);
        $data['service'] = $this->Model_login->edit_data_pegawai($where,'service')->result();
        $this->load->view('',$data);
    }
    
    function hapus_service($id){
        $where = array('id_service' => $id);
        $this->Model_login->hapus_data_customer($where,'service');
        redirect('Control_login/index');
    }
    
    function update_service(){
        $id_service = $this->input->post('id_service');
        $id_category = $this->input->post('id_category');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        
        $data = array(
            'id_service' => $id_service,
            'id_category' => $id_category,
            'nama' => $nama,
            'harga' => $harga
            );

    $this->Model_login->update_data($where,$data,'service');
    redirect('Control_login/index');
    }

    }
}
?>