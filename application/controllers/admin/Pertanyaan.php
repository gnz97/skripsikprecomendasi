<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller{

    function __construct(){
        parent::__construct();
        check_not_petugas();
        $this->load->model(['Pertanyaan_m']);
        
        $this->load->library('form_validation');
    }

    // Index
    public function index(){
        $data['dataPertanyaan'] = $this->Pertanyaan_m->getPertanyaanAll()->result();
        // $data['dataJoinKarir'] = $this->Pertanyaan_m->joinKarir()->result();
        // echo json_encode($data);
        $this->load->view('admin/pertanyaan/pertanyaan_data', $data);
    }

    public function viewAddPertanyaan(){
        $data['dataPertanyaanKategori'] = $this->Pertanyaan_m->getPKategoriAll()->result();
        // echo json_encode($data);
        $this->load->view('admin/pertanyaan/pertanyaan_add', $data);
    }

    public function addPertanyaan(){
        // $respon = array();
        $xdata = array();
        $post = $this->input->post(null, TRUE);
        if($post['jawabanKategori'] == 'esay'){
            $post['jawabanKriteria'] = 'kriteria_esay';
            $data = $this->Pertanyaan_m->addPertanyaan($post);
        }else if($post['jawabanKategori'] == 'pilihan'){
                
            if($post['pilihanKriteriaJawaban'] == 'single'){
                $post['jawabanKriteria'] = 'kriteria_pilih_single';
                $dataID = $this->Pertanyaan_m->addPertanyaan($post);
                $post['pertanyaanID'] = $dataID;
                $dcount = count($post['JawabanPilihanSingle']);
               

                if($post['lanjutanJawaban'] == 'aktif'){
                    
                    for($i=0; $i<count($post['JawabanPilihanSingle']); $i++){
                        $post['JawabanPS'] = $post['JawabanPilihanSingle'][$i];
                        if($i == $dcount - 1){
                            $post['lanjutanJawaban'] = 'aktif';
                            $post['cont'] = $dcount;
                            $data = $this->Pertanyaan_m->addPertanyaanPilihanSingle($post);
                        }else{
                            $post['lanjutanJawaban'] = 'tidak_aktif';
                            $data = $this->Pertanyaan_m->addPertanyaanPilihanSingle($post);
                        }
                        
                    }
                }else if($post['lanjutanJawaban'] == 'tidak_aktif'){
                    for($i=0; $i<count($post['JawabanPilihanSingle']); $i++){
                        $post['JawabanPS'] = $post['JawabanPilihanSingle'][$i];
                        $data = $this->Pertanyaan_m->addPertanyaanPilihanSingle($post); 
                    }
                }
                
            }else if($post['pilihanKriteriaJawaban'] == 'multiple'){
                $post['jawabanKriteria'] = 'kriteria_pilih_multiple';
                $dataID = $this->Pertanyaan_m->addPertanyaan($post);
                $post['pertanyaanID'] = $dataID;
                for($i=0; $i<count($post['dataMultiple']); $i++){
                  
                    $post['JawabanPMDesk'] = $post['JawabanPilihanMultipleDeskripsi'.$i];
                    $dataPMID = $this->Pertanyaan_m->addPertanyaanPilihanMultiple($post);
                    $post['jawabanPMID'] = $dataPMID;
                    for($j=0;$j<count($post['JawabanPilihanMultiple'.$i]); $j++){
                        $post['JawabanPilihanMultipleDetail'] = $post['JawabanPilihanMultiple'.$i][$j];
                        $dataPMIDx = $this->Pertanyaan_m->addPertanyaanPilihanMultipleDetail($post);
                    }
                   
                }
            }
           
        }

        echo json_encode($post);
    }

    public function viewEditPertanyaan(){
        // $data['dataPertanyaan'] = $this->Pertanyaan_m->getById($id)->row();
        // $data['dataKarir'] = $this->Karir_m->getAll()->result();
        // $data['dataJoinKarir'] = $this->Pertanyaan_m->joinKarir()->result();
        // echo json_encode($data);
        $this->load->view('admin/pertanyaan/pertanyaan_edit');
    }









   
}