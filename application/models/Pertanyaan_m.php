<?php

class Pertanyaan_m extends CI_Model{


    public function getPertanyaanCount(){
        $this->db->select('count(pertanyaanID) as rowPertanyaan');
        $this->db->from('tb_pertanyaan');
        // $this->db->order_by('alumniID', 'ASC');
        $query = $this->db->get();
        return $query;
    }


/////////////////////////////////////PERTANYAAN UTAMA//////////////////////////////////
    public function getPKategoriAll(){
        $this->db->select('*');
        $this->db->from('tb_pertanyaan_kategori');
        $query = $this->db->get();
        return $query;
    }

/////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////PERTANYAAN//////////////////////////////////   
    public function getPertanyaanAll(){
        $this->db->select('*');
        $this->db->from('tb_pertanyaan');
        $this->db->join('tb_pertanyaan_kategori', 'tb_pertanyaan_kategori.pertanyaanKID = tb_pertanyaan.pertanyaan_pertanyaanKID');
    
        // $this->db->join('tb_pertanyaan_kategori', );
        $query = $this->db->get();
        return $query;
    }

    public function getByID($id){
        $this->db->where('pertanyaanID', $id);
        $this->db->from('tb_pertanyaan');
        $query = $this->db->get();
        return $query;
    }

    public function getPKategoriAllByID($id){
        $this->db->select('*');
        $this->db->where('pertanyaan_pertanyaanKID', $id);
        $this->db->from('tb_pertanyaan');
        $this->db->order_by('pertanyaanUrutan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function addPertanyaan($post){
        $params = array(
            'pertanyaan_pertanyaanKID' => $post['pertanyaanKategori'],
            'pertanyaanKategoriJawaban' => $post['jawabanKategori'],
            'pertanyaanKriteriaJawaban' => $post['jawabanKriteria'],
            'pertanyaanDesk' => $post['pertanyaanDeskripsi'],
            'pertanyaanUrutan' => $post['pertanyaanUrutan'],
        );
        $this->db->insert('tb_pertanyaan', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editPertanyaan($post){
        $params = array(
            'pertanyaan_pertanyaanKID' => $post['pertanyaanKategori'],
            'pertanyaanKategoriJawaban' => $post['jawabanKategori'],
            'pertanyaanKriteriaJawaban' => $post['jawabanKriteria'],
            'pertanyaanDesk' => $post['pertanyaanDeskripsi'],
            'pertanyaanUrutan' => $post['pertanyaanUrutan'],
        );
        $this->db->where('pertanyaanID', $post['pertanyaanID']);
        $query = $this->db->update('tb_pertanyaan', $params);
        // $id = $this->db->insert_id();
        return $query;
    }

    public function deletePertanyaan($id){
        $this->db->where('pertanyaanID', $id);
        $this->db->delete('tb_pertanyaan');
    }

    /////////////////////////////////////////////////////////////////////////////////////////////

    /////////////////////////////////////PERTANYAAN PILIHAN SINGLE//////////////////////////////////   
    public function getPertanyaanPilihanSingleID($id){
        $this->db->where('jawabanPS_pertanyaanID', $id);
        $this->db->from('tb_jawaban_ps');
        $query = $this->db->get();
        return $query;
    }

    public function addPertanyaanPilihanSingle($post){
        
        $params = array(
            'jawabanPS_pertanyaanID' => $post['pertanyaanID'],
            'jawabanPSLanjutan'      => $post['lanjutanJawabanx'],
            'jawabanPSDesk'          => $post['JawabanPS'],
            // 'jawabanPSMultiple'          => $post['jawabanPSMultiplex'],
        );
        $this->db->insert('tb_jawaban_ps', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function deletePertanyaanPilihanSingle($id){
        $this->db->where('jawabanPS_pertanyaanID', $id);
        $this->db->delete('tb_jawaban_ps');
    }

    /////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////PERTANYAAN PILIHAN MULTIPLE//////////////////////////////////   
    public function getPertanyaanPilihanMultipleByID($id){
        $this->db->where('jawabanPM_pertanyaanID', $id);
        $this->db->from('tb_jawaban_pm');
        $query = $this->db->get();
        return $query;
    }

    public function addPertanyaanPilihanMultiple($post){
        $params = array(
            'jawabanPM_pertanyaanID' => $post['pertanyaanID'],
            'jawabanPMDesk'          => $post['JawabanPMDesk'],
        );
        $this->db->insert('tb_jawaban_pm', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function deletePertanyaanPilihanMultiple($id){
        $this->db->where('jawabanPM_pertanyaanID', $id);
        $this->db->delete('tb_jawaban_pm');
    }
    /////////////////////////////////////PERTANYAAN PILIHAN MULTIPLE//////////////////////////////////   

    public function getPertanyaanPilihanMultipleDetailByID($id){
        $this->db->where_in('djawabanPM_jawabanPMID', $id);
        $this->db->from('tb_jawaban_pm_detail');
        $query = $this->db->get();
        return $query;
    }
    public function addPertanyaanPilihanMultipleDetail($post){
        $params = array(
            'djawabanPM_jawabanPMID' => $post['jawabanPMID'],
            'djawabanPMDesk'          => $post['JawabanPilihanMultipleDetail'],
        );
        $this->db->insert('tb_jawaban_pm_detail', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function deletePertanyaanPilihanMultipleDetail($id){
        $this->db->where_in('djawabanPM_jawabanPMID', $id);
        $this->db->delete('tb_jawaban_pm_detail');
    }
    /////////////////////////////////////////////////////////////////////////////////////////////
}