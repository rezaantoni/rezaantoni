<?php 
class Pegawai_model extends CI_Model{
    public function getPegawai($id = null) {
        if($id != ''){
            return $this->db->get_where('pegawai', array('id' => $id))->result();
        }else{
            return $this->db->get('pegawai')->result();
        }
    }
}