<?php
class Model_paket extends CI_Model{
    function get_paket()
    {
        $query=$this->db->query("SELECT * FROM `bundle` ");
    
        return $query->result();
    }
    function get_service_from_paket($id_bundle)
    {
        $query=$this->db->query("SELECT * FROM bundle_detail bd JOIN service s on s.id_service = bd.id_service where id_bundle=$id_bundle ");
    
        return $query->result();
    }
    function get_category()
    {
        $query=$this->db->query("SELECT * FROM `category` ");
    
        return $query->result();
    }
    function get_layanan()
    {
        $query=$this->db->query("SELECT * FROM `service` ");
    
        return $query->result();
    }
    function get_category_from_service($id_category)
    {
        $query=$this->db->query("SELECT * FROM category c JOIN service s on s.id_category = c.id_category where s.id_category=$id_category ");
    
        return $query->result();
    }
}