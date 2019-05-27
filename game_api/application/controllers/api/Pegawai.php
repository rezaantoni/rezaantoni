<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pegawai extends REST_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Pegawai_model');
    }

    public function index_get(){
        $id = $this->get('id');
        if($id != ''){
            $data_pegawai = $this->Pegawai_model->getPegawai($id);
        }else{
            $data_pegawai = $this->Pegawai_model->getPegawai();
        }
        if($data_pegawai == true){
          $this->response(array(
            'status'  => 'true',
            'code'    => '200',
            'data'    => $data_pegawai
          ), REST_Controller::HTTP_CREATED);
        }else{
            $this->response(array(
            'status'  => 'false',
            'code'    => 'data belum ada'
          ), REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}