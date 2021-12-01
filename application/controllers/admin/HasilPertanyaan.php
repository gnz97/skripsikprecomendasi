<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilPertanyaan extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        check_not_petugas();
        $this->load->model(['Alumni_m', 'JawabanAlumni_m', 'KategoriPertanyaan_m']);
        $this->load->library('form_validation');
    }
    
    //Index
    public function index(){
        
        $data['dataHasilPertanyaan'] = $this->JawabanAlumni_m->getAlumniJawabanGroup()->result();
        foreach($data['dataHasilPertanyaan'] as $rowHasilPertanyaan){
            $data['dataKategori'] = $this->KategoriPertanyaan_m->getPKategoriByID($rowHasilPertanyaan->pertanyaan_pertanyaanKID)->row();
        }
      
        // echo json_encode($data);
        $this->load->view('admin/hasil_pertanyaan/hasilpertanyaan_data', $data);
    
    }

    // View Tampilan Lihat Hasil_pertanyaan
    public function viewDetailHasilPertanyaan($id){
        $dataHasilPertanyaan = $this->JawabanAlumni_m->getJawabanByAlumniID($id);
        $data['dataAlumni'] =  $dataHasilPertanyaan->row();
        $data['dataPertanyaanKategori'] =$this->KategoriPertanyaan_m->getPKategoriByID($data['dataAlumni']->pertanyaan_pertanyaanKID)->row();
        $data['dataJawabanAlumni'] =  $dataHasilPertanyaan->result();
        $data['dataJawabanAlumniEssay'] = $this->JawabanAlumni_m->getJawabanEssayByjawabanAlumniAll()->result();
        $data['dataJawabanAlumniPS'] = $this->JawabanAlumni_m->getJawabanPSByjawabanAlumniAll()->result();
        $data['dataJawabanAlumniPSLanjut'] = $this->JawabanAlumni_m->getJawabanAlumniPSLanjutAll()->result();
        $data['dataJawabanAlumniPM'] = $this->JawabanAlumni_m->getJawabanPMByjawabanAlumniAll()->result();
        $data['dataJawabanAlumniAlamat'] = $this->JawabanAlumni_m->getJawabanAlumniAlamat()->result();
        // echo json_encode($data);
        $this->load->view('admin/hasil_pertanyaan/hasilpertanyaan_detail', $data);

    }

    // Lihat Hasil_ertanyaan
    public function addHasil_pertanyaan(){
        // $this->load->view('hasil_pertanyaan/hasilpertanyaan_data')
    }

    // View Tampilan Edit Hasil_pertanyaan
    public function viewEditHasil_pertanyaan(){
        $this->load->view('admin/hasil_pertanyaan/hasilpertanyaan_edit');
    }

    // Edit Hasil_pertanyaan
    public function editHasil_pertanyaan(){
        // $this->load->view('hasil_pertanyaan/hasilpertanyaan_data');
    }

    // Delete Hasil_pertanyaan
    public function deleteHasilpertanyaan(){

        $id = $this->input->post('id');
        $dataHasilPertanyaan = $this->JawabanAlumni_m->getJawabanByAlumniID($id)->result();
        foreach($dataHasilPertanyaan as $rowHasilPertanyaan){
            if($rowHasilPertanyaan->pertanyaanKategoriJawaban == 'esay'){
                $this->JawabanAlumni_m->deleteJawabanAlumniEssay($rowHasilPertanyaan->jawabanAlumniID);
                $error = $this->db->error();
                if($error['code'] != 0){
                    $response = array(
                        'status' 	=> 'gagal',
                    );
                }else{
                    $response = array(
                        'status' 	=> 'success',
                    );
                }
            }
            if($rowHasilPertanyaan->pertanyaanKategoriJawaban == 'pilihan'){
                if($rowHasilPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single'){
                    // $zx = ;
                    $dataPertanyaanPilihan = $this->JawabanAlumni_m->getJawabanPSByjawabanAlumniID($rowHasilPertanyaan->jawabanAlumniID)->row();
                   
                    if($dataPertanyaanPilihan != null){

                    
                        if($dataPertanyaanPilihan->jawabanPSLanjutan == 'aktif'){
                            $this->JawabanAlumni_m->deleteJawabanAlumniPSLanjut($dataPertanyaanPilihan->jawabanAlumniPSID);
                        }
                    }

                    $this->JawabanAlumni_m->deleteJawabanAlumniPS($rowHasilPertanyaan->jawabanAlumniID);
                    $error = $this->db->error();
                    if($error['code'] != 0){
                        $response = array(
                            'status' 	=> 'gagal',
                        );
                    }else{
                        $response = array(
                            'status' 	=> 'success',
                        );
                    }

                }else if($rowHasilPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_multiple'){
                    $this->JawabanAlumni_m->deleteJawabanAlumniPM($rowHasilPertanyaan->jawabanAlumniID);
                    $error = $this->db->error();
                    if($error['code'] != 0){
                        $response = array(
                            'status' 	=> 'gagal',
                        );
                    }else{
                        $response = array(
                            'status' 	=> 'success',
                        );
                    }

                }
            }
            if($rowHasilPertanyaan->pertanyaanKategoriJawaban == 'alamat'){
                $this->JawabanAlumni_m->deleteJawabanAlumniAlama($rowHasilPertanyaan->jawabanAlumniID);
                $error = $this->db->error();
                if($error['code'] != 0){
                    $response = array(
                        'status' 	=> 'gagal',
                    );
                }else{
                    $response = array(
                        'status' 	=> 'success',
                    );
                }
            }
       
            $this->JawabanAlumni_m->deleteJawabanAlumni($rowHasilPertanyaan->jawabanAlumni_alumniID);
            $error = $this->db->error();
            if($error['code'] != 0){
                $response = array(
                    'status' 	=> 'gagal',
                );
            }else{
                $response = array(
                    'status' 	=> 'success',
                );
            }
        
       
        }

       
        echo json_encode($response);
    }
}