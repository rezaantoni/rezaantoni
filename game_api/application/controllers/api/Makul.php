<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Makul extends REST_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Makul_model');
    }

public function index_get(){
        $id = $this->get('id');
        if($id != ''){
            $data_mhs = $this->Makul_model->getMakul($id);
        }else{
            $data_mhs = $this->Makul_model->getMakul();
        }
        if($data_mhs == true){
          $this->response(array(
            'status'  => 'true',
            'code'    => '200',
            'data'    => $data_mhs
          ), REST_Controller::HTTP_CREATED);
        }else{
            $this->response(array(
            'status'  => 'false',
            'code'    => 'data belum ada'
          ), REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function tambah_post($id){
      if($this->Makul_model->hapusDataMakul($id)) {
         $this->response(array(
          'status'  => 'true',
          'code'    => '200',
          'data'    => 'data berhasil dihapus'
         ), REST_Controller::HTTP_CREATED);
      } else {
        $this->response(array(
          'status'  => 'false',
          'code'    => '401',
          'data'    => 'data gagal dihapus disisi server'
        ), REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  public function hapus_get($id){
      if($this->Makul_model->hapusDataMakul($id)) {
         $this->response(array(
          'status'  => 'true',
          'code'    => '200',
          'data'    => 'data berhasil dihapus'
         ), REST_Controller::HTTP_CREATED);
      } else {
        $this->response(array(
          'status'  => 'false',
          'code'    => '401',
          'data'    => 'data gagal dihapus disisi server'
        ), REST_Controller::HTTP_BAD_REQUEST);
      }
    }
}