<?php

class Alumni_m extends CI_Model{

    public function getAll(){
        $this->db->select('*');
        $this->db->from('tb_alumni');
        // $this->db->order_by('alumniID', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_alumni');
        $this->db->where('alumniID', $id);
        $query = $this->db->get();
        return $query;
    }

    public function loginUser($post){
        $this->db->from('tb_alumni');
        $this->db->where('alumniUsername', $post['username']);
        $this->db->where('alumniPassword', $post['password']);
        $query = $this->db->get();
        return $query;
    }

    public function getAllStatusPertanyaan($id){
        $this->db->select('*');
        $this->db->from('tb_alumni');
        $this->db->where('alumniStatusPertanyaan !=', );
        $query = $this->db->get();
        return $query;
    }

    

    public function addAlumni($post){
        $params = array(
            'alumniNim' => $post['alumniNim'],
            'alumniNik' => $post['alumniNik'],
            'alumniNpwp' => $post['alumniNpwp'],
            'alumniNama' => $post['alumniNama'],
            'alumniJurusan' => $post['alumniJurusan'],
            'alumniTahunLulus	' => $post['alumniThnLulus'],
            'alumniNoWA' => $post['alumniNoWa'],
            'alumniEmail' => $post['alumniEmail'],
            'alumniUsername' => $post['alumniUsername'],
            'alumniPassword' => $post['alumniPassword'],
            'alumniAlamat' => $post['alumniAlamat'],
        );
        $this->db->insert('tb_alumni', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    
    public function editAlumni($post){
        $params = array(
            'alumniNim' => $post['alumniNim'],
            'alumniNik' => $post['alumniNik'],
            'alumniNpwp' => $post['alumniNpwp'],
            'alumniNama' => $post['alumniNama'],
            'alumniJurusan' => $post['alumniJurusan'],
            'alumniTahunLulus	' => $post['alumniThnLulus'],
            'alumniNoWA' => $post['alumniNoWa'],
            'alumniEmail' => $post['alumniEmail'],
            'alumniUsername' => $post['alumniUsername'],
            'alumniPassword' => $post['alumniPassword'],
            'alumniAlamat' => $post['alumniAlamat'],
        );
        $this->db->where('alumniID ', $post['alumniID']);
        $query = $this->db->update('tb_alumni',$params);
        return $query;
    }

    public function deleteAlumni($id){
        $this->db->where('alumniID', $id);
        $this->db->delete('tb_alternatif');
    }
}