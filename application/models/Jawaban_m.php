<?php

class Jawaban_m extends CI_Model{



/////////////////////////////////////PERTANYAAN UTAMA//////////////////////////////////
    public function getJawabanPilihSingleAll($id){
        // $this->db->select('*');
        $this->db->where_in('jawabanPS_pertanyaanID', $id);
        $this->db->from('tb_jawaban_ps');
        $query = $this->db->get();
        return $query;
    }

/////////////////////////////////////////////////////////////////////////////////////////////
    public function getJawabanPilihMultipleAll($id){
        $this->db->where_in('jawabanPM_pertanyaanID', $id);
        $this->db->from('tb_jawaban_pm');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanPilihMultipleDetailAll($id){
        $this->db->where_in('djawabanPM_jawabanPMID', $id);
        $this->db->from('tb_jawaban_pm_detail');
        $query = $this->db->get();
        return $query;
    }


/////////////////////////////////////////////////////////////////////////////////////////////
}