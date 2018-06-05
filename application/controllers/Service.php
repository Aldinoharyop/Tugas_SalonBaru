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

    }
}
?>