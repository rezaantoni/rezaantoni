<?php 
class game_model extends CI_Model{
    public function getgame($id = null) {
        if($id != ''){
            return $this->db->get_where('game', array('id' => $id))->result();
        }else{
            return $this->db->get('game')->result();
        }
    }

    public function tambahDataGame($data){
        $this->db->insert('game', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataGame($id){
        $this->db->where("id = $id");
        return $this->db->delete('game');;
    }

    public function ubahDataGame($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('game', $data);
    }
    
}