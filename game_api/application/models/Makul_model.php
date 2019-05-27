<?php 
class Makul_model extends CI_Model{
    public function getMakul($id = null) {
        if($id != ''){
            return $this->db->get_where('Makul', array('id' => $id))->result();
        }else{
            return $this->db->get('Makul')->result();
        }
    }
 	public function tambahDataMakul($data){
        $this->db->insert('makul', $data);
        return $this->db->affected_rows();
    }
public function hapusDataMahasiswa($id){
        $this->db->where("id = $id");
        return $this->db->delete('mahasiswa');;
    }
}