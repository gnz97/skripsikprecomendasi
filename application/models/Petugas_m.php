<?php

class Petugas_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_petugas');
        $query = $this->db->get();
        return $query;
    }

    public function getCount(){
        $this->db->select('count(petugasID) as rowPetugas');
        $this->db->from('tb_petugas');
        // $this->db->order_by('alumniID', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_petugas');
        $this->db->where('petugasID', $id);
        $query = $this->db->get();
        return $query;
    }

    public function loginAdmin($post){
        $this->db->from('tb_petugas');
        $this->db->where('petugasUsername', $post['username']);
        $this->db->where('petugasPassword', $post['password']);
        $query = $this->db->get();
        return $query;
    }

    public function addPetugas($post){
        $params = array(
            'petugasNama' => $post['petugasNama'],
            'petugasRule' => $post['petugasRules'],
            'petugasUsername' => $post['petugasUsername'],
            'petugasPassword' => $post['petugasPassword'],
        );
        $this->db->insert('tb_petugas', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editPetugas($post){
        $params = array(
            'petugasNama' => $post['petugasNama'],
            'petugasRule' => $post['petugasRules'],
            'petugasUsername' => $post['petugasUsername'],
            'petugasPassword' => $post['petugasPassword'],
        );
        $this->db->where('petugasID ', $post['petugasID']);
        $query = $this->db->update('tb_petugas',$params);
        return $query;
    }

    public function deletePetugas($id){
        $this->db->where('petugasID', $id);
        $this->db->delete('tb_petugas');
    }
}