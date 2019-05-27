<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    public function data_mhs_get(){
        $data_mhs = $this->Mahasiswa_model->getAllMahasiswa();
        if($data_mhs == true){
          $this->response(array(
            'status'  => 'true',
            'code'    => '200',
            'data'    => $data_mhs
          ), REST_Controller::HTTP_CREATED);
        }
    }
}