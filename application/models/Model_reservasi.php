<?php
class Model_reservasi extends CI_Model{
    function get_cabang()
    {
        $query=$this->db->query("SELECT kodeCabang, nama, alamat FROM cabang ");
    
        return $query->result();
    }
    function get_paket()
    {
        $query=$this->db->query("SELECT * FROM `bundle` ");
    
        return $query->result();
}
    function get_layanan()
    {
        $query=$this->db->query("SELECT * FROM `service` ");
    
        return $query->result();
    }
    function get_pegawai()
    {
        $query=$this->db->query("SELECT * FROM `pegawai` ");
    
        return $query->result();
    }
    function get_category(){
        $query=$this->db->query("SELECT * FROM `category` ");

        return $query->result();
    }
    function get_jam(){
        $query=$this->db->query("SELECT * FROM `jamreservasi` ");

        return $query->result();
    }
    function insertReservasi(){

        $cabang=$this->input->post('cabang');
        $layanan=$this->input->post('layanan');
        $category=$this->input->post('category');
        $paket=$this->input->post('bundle');
        $pegawai=$this->input->post('pegawai');
        $customers=$this->input->post('userid');
        $servis=$this->input->post('servis');

        $jam=$this->input->post('jam');
        $date=date('Y-m-d', strtotime($this->input->post('date')));


        /*$data=array(
            'nama'=>$nama,
            'perusahaan'=>$perusahaan,
            'jabatan'=>$jabatan,
            'alamat'=>$alamat,
            'cabang'=>$cabang,
            'gardu'=>$gardu,
            'pekerjaan'=>$pekerjaan,
            'padam'=>$padam,
        );

        */

        $q = $this->db->query("INSERT INTO reservasi(id_reservasi, id_bundle, id_pegawai, id_jam, id_service, kodeCabang, id_customer, tanggal)
            VALUES('', '$paket', '$pegawai', '$jam', '$servis', '$cabang', '$customers', '$date')");

        return $this->db->affected_rows() > 0;
    }
}