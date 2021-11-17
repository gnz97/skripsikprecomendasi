<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiodataAlumni extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        check_not_petugas();
        $this->load->model('Alumni_m');
        $this->load->library('form_validation');
    }
    
    //Index + Tampilan viewAdd
    public function index(){
        $id = $this->fungsi->alumni_login()->alumniID;
        $data['dataAlumni'] = $this->Alumni_m->getById($id)->result();
        $this->load->view('user/alumni_biodata/alumni_biodata_data', $data);
    }

   
    public function viewEditAlumni($id){
        $data['rowAlumni'] = $this->Alumni_m->getById($id)->row();
        $this->load->view('user/alumni_biodata/alumni_biodata_edit', $data);

    }

    public function editAlumni(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        $this->Alumni_m->editAlumni($post);
        if($this->db->affected_rows() > 0){
            $response = array(
                'status' 	=> 'success',
            );
        }else{
            $response = array(
                'status' 	=> 'gagal',
            );
        }
        echo json_encode($response);

    }

}