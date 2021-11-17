<?php

class Karir_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_karir');
        $this->db->order_by('karir_id', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_karir');
        $this->db->where('karir_id', $id);
        return $query;
    }

    public function addKarir($post){
        $parse = array(
            'karir_nama' => $post ['karirNama'],
        );
        $this ->db->insert('tb_karir', $parse);
        $id = $this->db->insert_id();
        return $id; 
    }

    public function editKarir($post){
        $parse = array(
            'karir_nama' => $post['karirNama'],
        );
        $this->db->where('karir_id', $post['karirId']);
        $query = $this->db->update('tb_karir', $parse);
        return $query;
    }

}