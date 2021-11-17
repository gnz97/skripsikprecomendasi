<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_alumni extends CI_Controller{

    function __construct(){
        parent::__construct();
        check_not_petugas();
        // $this->load->model('Detail_alumni_m');
        $this->load->library('form_validation');
    }

    public function index(){
        // $data['dataDetailAlumni'] = $this->Detail_alumni_m->getAll()->result();
        // echo json_encode($data);
    }
}