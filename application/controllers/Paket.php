<?php
 
class Paket extends CI_Controller {
 
 
    function index()
    {
        $this->load->model('model_paket');
        $data['bundles']=$this->model_paket->get_paket();
        
        $data['model_paket']=$this->model_paket;
        
        $this->load->view('paket', $data);
    }
    function bundle()
    {
       
    }
 
}