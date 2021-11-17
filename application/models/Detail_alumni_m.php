<?php

class Detail_alumni_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_detail_alumni');
        $this->db->order_by('detail_alumni_id', 'ASC');
        $this->db->join('tb_alumni','tb_alumni.alumni_id = tb_detail_alumni.detail_alumni_alumni_id');
        $this->db->join('tb_karir','tb_karir.karir_id = tb_detail_alumni.detail_alumni_karir_id');
        $query = $this->db->get();
        return $query;
    }

    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_detail_alumni');
        $this->db->where('detail_alumni_id', $id);
        return $query;
    }

}