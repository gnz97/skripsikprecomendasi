<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormPertanyaan extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        check_not_petugas();
        $this->load->model(['Pertanyaan_m', 'Jawaban_m', 'JawabanAlumni_m']);
        $this->load->library('form_validation');
    }
    
    /////////////////////////LIHAT FORM PERTANYAAN////////////////////////////////////

    public function index(){
        $data['dataPertanyaanKategori'] = $this->Pertanyaan_m->getPKategoriAll()->result();
       $this->load->view('admin/form_pertanyaan/pertanyaan_utama', $data);
   }

   public function viewFormPertanyaanKategori($id){
       // echo json_encode($id);
       
       $data['dataPertanyaan'] =$this->Pertanyaan_m->getPKategoriAllByID($id)->result();
       if($data['dataPertanyaan'] != null){
           $data['dataPertanyaanKategoriID'] = $id;
           foreach($data['dataPertanyaan'] as $rowPertanyaan){
               $pertanyaanID[] = $rowPertanyaan->pertanyaanID;
           }
           
           $data['dataJawabanPilihSingle'] =$this->Jawaban_m->getJawabanPilihSingleAll($pertanyaanID)->result();
           $data['dataJawabanPilihMultiple'] =$this->Jawaban_m->getJawabanPilihMultipleAll($pertanyaanID)->result();
           if($data['dataJawabanPilihMultiple'] != null){
                foreach($data['dataJawabanPilihMultiple'] as $rowJawabanPilihMultiple){
                    $multipleID[] = $rowJawabanPilihMultiple->jawabanPMID;
                }
                $data['dataJawabanPilihMultipleDetail'] =$this->Jawaban_m->getJawabanPilihMultipleDetailAll($multipleID)->result();
           }
       }
       
       // echo json_encode($data);
       $this->load->view('admin/form_pertanyaan/pertanyaan_add', $data);
   }

}