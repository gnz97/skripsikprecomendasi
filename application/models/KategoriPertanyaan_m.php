<?php

class KategoriPertanyaan_m extends CI_Model{

   

   

    public function getPKategoriAll(){
        $this->db->select('*');
        $this->db->from('tb_pertanyaan_kategori');
        $query = $this->db->get();
        return $query;
    }

    public function getPKategoriByID($id){
        $this->db->where('pertanyaanKID', $id);
        $this->db->from('tb_pertanyaan_kategori');
        $query = $this->db->get();
        return $query;
    }

}