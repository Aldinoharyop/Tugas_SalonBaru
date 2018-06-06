<?php  
 
class Paket extends CI_Controller {
 
 
    function index()
    {
        $this->load->model('model_paket');
        $data['bundles']=$this->model_paket->get_paket();
        
        $data['model_paket']=$this->model_paket;
        
        $this->load->view('paket', $data);
    }

    function tambah_paket(){
        $this->load->view('master/registerPegawai');
    }

    function input_paket(){
        $id_bundle = $this->input->post('id_bundle');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        
        $data = array(
            'id_bundle' => $id_bundle,
            'nama' => $nama,
            'harga' => $harga
            );
        /*$this->Model_login->input_data_customer($data,'customers');*/
        $this->db->insert('bundle',$data);
        /*redirect('Control_login/index_customer');*/
        $this->load->view('admin/home');
    }
    
    function edit_paket($id){
        $where = array('id_bundle' => $id);
        $data['bundle'] = $this->Model_login->edit_data_pegawai($where,'bundle')->result();
        $this->load->view('',$data);
    }
    
    function hapus_paket($id){
        $where = array('id_bundle' => $id);
        $this->Model_login->hapus_data_customer($where,'bundle');
        redirect('Control_login/index');
    }
    
    function update_paket(){
        $id_bundle = $this->input->post('id_bundle');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');

        $data = array(
            'id_bundle' => $id_bundle,
            'nama' => $nama,
            'harga' => $harga
            );

    $this->Model_login->update_data($where,$data,'bundle');
    redirect('Control_login/index');
    }
}
?>