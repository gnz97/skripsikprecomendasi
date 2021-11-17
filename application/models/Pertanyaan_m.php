<?php

class Pertanyaan_m extends CI_Model{



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

/////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////PERTANYAAN PILIHAN SINGLE//////////////////////////////////   
public function addPertanyaanPilihanSingle($post){
    
    $params = array(
        'jawabanPS_pertanyaanID' => $post['pertanyaanID'],
        'jawabanPSLanjutan'      => $post['lanjutanJawaban'],
        'jawabanPSDesk'          => $post['JawabanPS'],
    );
    $this->db->insert('tb_jawaban_ps', $params);
    $id = $this->db->insert_id();
    return $id;
}

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////PERTANYAAN PILIHAN MULTIPLE//////////////////////////////////   
public function addPertanyaanPilihanMultiple($post){
    $params = array(
        'jawabanPM_pertanyaanID' => $post['pertanyaanID'],
        'jawabanPMDesk'          => $post['JawabanPMDesk'],
    );
    $this->db->insert('tb_jawaban_pm', $params);
    $id = $this->db->insert_id();
    return $id;
}
/////////////////////////////////////PERTANYAAN PILIHAN MULTIPLE//////////////////////////////////   
public function addPertanyaanPilihanMultipleDetail($post){
    $params = array(
        'djawabanPM_jawabanPMID' => $post['jawabanPMID'],
        'djawabanPMDesk'          => $post['JawabanPilihanMultipleDetail'],
    );
    $this->db->insert('tb_jawaban_pm_detail', $params);
    $id = $this->db->insert_id();
    return $id;
}
/////////////////////////////////////////////////////////////////////////////////////////////
}