<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    function __construct(){
        parent::__construct();
        check_not_petugas();
        $this->load->model(['Alumni_m', 'JawabanAlumni_m', 'KategoriPertanyaan_m', 'Pertanyaan_m', 'Petugas_m']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['dataAlumni'] = $this->Alumni_m->getCount()->row();
        $data['dataPertanyaan'] = $this->Pertanyaan_m->getPertanyaanCount()->row();
        $data['dataPetugas'] = $this->Petugas_m->getCount()->row();
        $this->load->view('admin/dashboard', $data);
        // echo json_encode($data);
            
    }
}