<?php

class JawabanAlumni_m extends CI_Model{

    ///////////////////ADMIN//////////////////////////////
    public function getAlumniJawabanGroup(){
        $this->db->group_by('jawabanAlumni_alumniID');
        $this->db->from('tb_jawaban_alumni');
        $this->db->join('tb_alumni', 'tb_alumni.alumniID = tb_jawaban_alumni.jawabanAlumni_alumniID');
        $this->db->join('tb_pertanyaan', 'tb_pertanyaan.pertanyaanID = tb_jawaban_alumni.jawabanAlumni_pertanyaanID');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanByAlumniID($id){
        $this->db->select('*');
        $this->db->from('tb_jawaban_alumni');
        $this->db->where('jawabanAlumni_alumniID', $id);
        $this->db->join('tb_alumni', 'tb_alumni.alumniID = tb_jawaban_alumni.jawabanAlumni_alumniID');
        $this->db->join('tb_pertanyaan', 'tb_pertanyaan.pertanyaanID = tb_jawaban_alumni.jawabanAlumni_pertanyaanID');
        $query = $this->db->get();
        return $query;
    }



    ////////////////////////USER/////////////////////////////


    
    public function getJawabanAlumniCheck($post){
        $this->db->where('jawabanAlumni_alumniID', $post['alumniID']);
        $this->db->where('jawabanAlumni_pertanyaanID', $post['pertanyaanID']);
        $this->db->from('tb_jawaban_alumni');
        $query = $this->db->get();
        return $query;
    }

    public function addJawabanAlumni($post){
        $params = array(
            'jawabanAlumni_alumniID' => $post['alumniID'],
            'jawabanAlumni_pertanyaanID' => $post['pertanyaanID'],
            'jawabanAlumniStatus' => $post['jawabanAlumniStatus'],
        );
        $this->db->insert('tb_jawaban_alumni', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editJawabanAlumni($post){
        $params = array(
            'jawabanAlumni_pertanyaanID' => $post['pertanyaanID'],
            'jawabanAlumniStatus' => $post['jawabanAlumniStatus'],
        );
        $this->db->where('jawabanAlumniID', $post['jawabanAlumniID']);
        $this->db->where('jawabanAlumni_alumniID', $post['alumniID']);
        $query = $this->db->update('tb_jawaban_alumni', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function deleteJawabanAlumni($id){
        $this->db->where_in('jawabanAlumni_alumniID', $id);
        $this->db->delete('tb_jawaban_alumni');
    }

    


    //////////////////////////////////////////////////////
    public function getJawabanEssayByjawabanAlumniAll(){
        $this->db->select('*');
        $this->db->from('tb_jawaban_alumni_essay');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanEssayByjawabanAlumniID($id){
        $this->db->where('jawabanAlumniEsay_jawabanAlumniID', $id);
        $this->db->from('tb_jawaban_alumni_essay');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanAlumniEssayCheck($post){
        $this->db->where('jawabanAlumniEsay_jawabanAlumniID', $post['jawabanAlumniID']);
        $this->db->from('tb_jawaban_alumni_essay');
        $query = $this->db->get();
        return $query;
    }

    public function addJawabanAlumniEssay($post){
        $params = array(
            'jawabanAlumniEsay_jawabanAlumniID' => $post['jawabanAlumniID'],
            'jawabanAlumniEsayDesk' => $post['jawabanAlumniEsayDesk'],
        );
        $this->db->insert('tb_jawaban_alumni_essay', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editJawabanAlumniEssay($post){
        $params = array(
            'jawabanAlumniEsay_jawabanAlumniID' => $post['jawabanAlumniID'],
            'jawabanAlumniEsayDesk' => $post['jawabanAlumniEsayDesk'],
        );
        $this->db->where('jawabanAlumniEsayID', $post['jawabanAlumniEsayID']);
        $query = $this->db->update('tb_jawaban_alumni_essay', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function deleteJawabanAlumniEssay($id){
        $this->db->where_in('jawabanAlumniEsay_jawabanAlumniID', $id);
        $this->db->delete('tb_jawaban_alumni_essay');
    }

    ///////////////////////////////////////////////////////////////

    public function getJawabanPSByjawabanAlumniAll(){
        $this->db->select('*');
        $this->db->from('tb_jawaban_alumni_ps');
        $this->db->join('tb_jawaban_ps', 'tb_jawaban_ps.jawabanPSID = tb_jawaban_alumni_ps.jawabanAlumniPS_jawabanPSID');
        $query = $this->db->get();
        return $query;
    }


    public function getJawabanPSByjawabanAlumniID($id){
        $this->db->where_in('jawabanAlumniPS_jawabanAlumniID', $id);
        $this->db->from('tb_jawaban_alumni_ps');
        $this->db->join('tb_jawaban_ps', 'tb_jawaban_ps.jawabanPSID = tb_jawaban_alumni_ps.jawabanAlumniPS_jawabanPSID');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanAlumniPSID($id){
        // $this->db->select('*');
        $this->db->where_in('jawabanAlumniPSID', $id);
        $this->db->from('tb_jawaban_alumni_ps');
        $this->db->join('tb_jawaban_ps', 'tb_jawaban_ps.jawabanPSID = tb_jawaban_alumni_ps.jawabanAlumniPS_jawabanPSID');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanAlumniPSCheck($post){
        $this->db->where_in('jawabanAlumniPS_jawabanAlumniID', $post['jawabanAlumniID']);
        $this->db->from('tb_jawaban_alumni_ps');
        $query = $this->db->get();
        return $query;
    }

    public function addJawabanAlumniPS($post){
        $params = array(
            'jawabanAlumniPS_jawabanAlumniID' => $post['jawabanAlumniID'],
            'jawabanAlumniPS_jawabanPSID' => $post['jawabanAlumniPS_JID'],
        );
        $this->db->insert('tb_jawaban_alumni_ps', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editJawabanAlumniPS($post){
        $params = array(
            'jawabanAlumniPS_jawabanAlumniID' => $post['jawabanAlumniID'],
            'jawabanAlumniPS_jawabanPSID' => $post['jawabanAlumniPS_JID'],
        );
        $this->db->where('jawabanAlumniPSID', $post['jawabanAlumniPSID']);
        $query = $this->db->update('tb_jawaban_alumni_ps', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function deleteJawabanAlumniPS($id){
        $this->db->where_in('jawabanAlumniPS_jawabanAlumniID', $id);
        $this->db->delete('tb_jawaban_alumni_ps');
    }

    ///////////////////////////////////////////////////////////////
    public function getJawabanAlumniPSLanjutAll(){
        $this->db->select('*');
        $this->db->from('tb_jawaban_alumni_ps_lanjut');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanAlumniPSLanjutCheck($jawabanPSID){
        $this->db->where('jawabanAlumniPSL_jawabanAlumniPSID', $jawabanPSID);
        $this->db->from('tb_jawaban_alumni_ps_lanjut');
        $query = $this->db->get();
        return $query;
    }

    public function addJawabanAlumniPSLanjut($post){
        $params = array(
            'jawabanAlumniPSL_jawabanAlumniPSID' => $post['jawabanAlumniPSID'],
            'jawabanAlumniPSLDesk' => $post['jawabanPSLDesk'],
        );
        $this->db->insert('tb_jawaban_alumni_ps_lanjut', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editJawabanAlumniPSLanjut($post){
        $params = array(
            'jawabanAlumniPSL_jawabanAlumniPSID' => $post['jawabanAlumniPSID'],
            'jawabanAlumniPSLDesk' => $post['jawabanPSLDesk'],
        );
        $this->db->where('jawabanAlumniPSLID', $post['jawabanAlumniPSLID']);
        $query = $this->db->update('tb_jawaban_alumni_ps_lanjut', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function deleteJawabanAlumniPSLanjut($id){
        $this->db->where_in('jawabanAlumniPSL_jawabanAlumniPSID', $id);
        $this->db->delete('tb_jawaban_alumni_ps_lanjut');
    }

    ///////////////////////////////////////////////////////////////

    public function getJawabanPMByjawabanAlumniAll(){
        $this->db->select('*');
        $this->db->from('tb_jawaban_alumni_pm');
        $this->db->join('tb_jawaban_pm', 'tb_jawaban_pm.jawabanPMID = tb_jawaban_alumni_pm.jawabanAlumniPM_jawabanPMID');
        $this->db->join('tb_jawaban_pm_detail', 'tb_jawaban_pm_detail.djawabanPMID = tb_jawaban_alumni_pm.jawabanAlumniPM_djawabanPMID');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanPMByjawabanAlumniID($id){
        $this->db->where('jawabanAlumniPM_jawabanAlumniID', $id);
        $this->db->from('tb_jawaban_alumni_pm');
        $this->db->join('tb_jawaban_pm', 'tb_jawaban_pm.jawabanPMID = tb_jawaban_alumni_pm.jawabanAlumniPM_jawabanPMID');
        $this->db->join('tb_jawaban_pm_detail', 'tb_jawaban_pm_detail.djawabanPMID = tb_jawaban_alumni_pm.jawabanAlumniPM_djawabanPMID');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanAlumniPMCheck($post){
        // $this->db->select('*');
        $this->db->where('jawabanAlumniPM_jawabanAlumniID', $post['jawabanAlumniID']);
        $this->db->where('jawabanAlumniPM_jawabanPMID', $post['jawabanPMID']);
        $this->db->from('tb_jawaban_alumni_pm');
        $query = $this->db->get();
        return $query;
    }

    public function addJawabanAlumniPM($post){
        $params = array(
            'jawabanAlumniPM_jawabanAlumniID' => $post['jawabanAlumniID'],
            'jawabanAlumniPM_jawabanPMID' => $post['jawabanPMID'],
            'jawabanAlumniPM_djawabanPMID' => $post['djawabanPMID'],
        );
        $this->db->insert('tb_jawaban_alumni_pm', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editJawabanAlumniPM($post){
        $params = array(
            'jawabanAlumniPM_jawabanAlumniID' => $post['jawabanAlumniID'],
            'jawabanAlumniPM_jawabanPMID' => $post['jawabanPMID'],
            'jawabanAlumniPM_djawabanPMID' => $post['djawabanPMID'],
        );
        $this->db->where('jawabanAlumniPMID', $post['jawabanAlumniPMID']);
        $query = $this->db->update('tb_jawaban_alumni_pm', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function deleteJawabanAlumniPM($id){
        $this->db->where('jawabanAlumniPM_jawabanAlumniID', $id);
        $this->db->delete('tb_jawaban_alumni_pm');
    }


    ////////////////////////////////////////////////////////////////
    
    public function getJawabanAlumniAlamat(){
        $this->db->select('*');
        $this->db->from('tb_jawaban_alumin_alamat');
        // $this->db->join('tb_jawaban_ps', 'tb_jawaban_ps.jawabanPSID = tb_jawaban_alumin_alamat.jawabanAlumniAlamat_jawabanAlumniID');
        $query = $this->db->get();
        return $query;
    }

    public function getJawabanAlumniAlamatCheck($post){
        $this->db->where('jawabanAlumniAlamat_jawabanAlumniID', $post['jawabanAlumniID']);
        $this->db->from('tb_jawaban_alumin_alamat');
        $query = $this->db->get();
        return $query;
    }

    public function editJawabanAlumniAlamat($post){
        $params = array(
            'jawabanAlumniAlamat_jawabanAlumniID' => $post['jawabanAlumniID'],
            'jawabanAluminAlamatProvinsi' => $post['pilihanAlamatProvinsi'],
            'jawabanAluminAlamatKabupaten' => $post['pilihanAlamatKabupaten'],
        );
        $this->db->where('jawabanAluminAlamatID', $post['jawabanAlumniAlamatID']);
        $query = $this->db->update('tb_jawaban_alumin_alamat', $params);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function addJawabanAlumniAlamat($post){
        $params = array(
            'jawabanAlumniAlamat_jawabanAlumniID' => $post['jawabanAlumniID'],
            'jawabanAluminAlamatProvinsi' => $post['pilihanAlamatProvinsi'],
            'jawabanAluminAlamatKabupaten' => $post['pilihanAlamatKabupaten'],
        );
        $this->db->insert('tb_jawaban_alumin_alamat', $params);
        $id = $this->db->insert_id();
        return $id;
    }

    public function deleteJawabanAlumniAlama($id){
        $this->db->where('jawabanAlumniAlamat_jawabanAlumniID', $id);
        $this->db->delete('tb_jawaban_alumin_alamat');
    }
   
}