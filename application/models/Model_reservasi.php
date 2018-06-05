<?php
class Model_reservasi extends CI_Model{
    function get_cabang()
    {
        $query=$this->db->query("SELECT * FROM `cabang` ");
    
        return $query->result();
    }
}