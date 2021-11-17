<?php

Class Fungsi {
    protected $ci;
    var $pengirim;
    var $subbidangID;

    function __construct(){
        $this->ci =& get_instance();
    }

    // function pengelola_login(){
    //     $this->ci->load->model('Pengelola_m');
    //     $pengelola_id = $this->ci->session->userdata('pengelolaID');
    //     $pengelola_data = $this->ci->Pengelola_m->get($pengelola_id)->row();
    //     return $pengelola_data;
    // }

    function petugas_login(){
        $this->ci->load->model('Petugas_m');
        $petugas_id = $this->ci->session->userdata('petugasID');
        $petugas_data = $this->ci->Petugas_m->getById($petugas_id)->row();
        return $petugas_data;
    }

    function alumni_login(){
        $this->ci->load->model('Alumni_m');
        $alumni_id = $this->ci->session->userdata('alumniID');
        $alumni_data = $this->ci->Alumni_m->getById($alumni_id)->row();
        return $alumni_data;
    }


}