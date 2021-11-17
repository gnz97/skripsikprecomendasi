<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        check_not_petugas();
        $this->load->model('Petugas_m');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $data['dataPetugas'] = $this->Petugas_m->getAll()->result();
        $this->load->view('admin/petugas/petugas_data', $data);
    }

    public function viewAddPetugas(){
        $this->load->view('admin/petugas/petugas_add');
    }

    public function AddPetugas(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        $data = $this->Petugas_m->addPetugas($post);
        if($this->db->affected_rows() > 0){
            $response = array(
                'status' 	=> 'success',
            );
        }
        echo json_encode($response);
    }


    public function viewEditPetugas($id){
        $data['rowPetugas'] = $this->Petugas_m->getById($id)->row();
        $this->load->view('admin/petugas/petugas_edit', $data);
    }

    public function editPetugas(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        $data = $this->Petugas_m->editPetugas($post);
        if($this->db->affected_rows() > 0){
            $response = array(
                'status' 	=> 'success',
            );
        }
        echo json_encode($response);
    }

}