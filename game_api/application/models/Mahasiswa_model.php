<?php 
class Mahasiswa_model extends CI_Model{
    public function getMahasiswa($id = null) {
        if($id != ''){
            return $this->db->get_where('mahasiswa', array('id' => $id))->result();
        }else{
            return $this->db->get('mahasiswa')->result();
        }
    }

    public function tambahDataMahasiswa($data){
        $this->db->insert('mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataMahasiswa($id){
        $this->db->where("id = $id");
        return $this->db->delete('mahasiswa');;
    }

    public function ubahDataMahasiswa($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('mahasiswa', $data);
    }
    
}