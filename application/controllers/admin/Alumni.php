<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        check_not_petugas();
        $this->load->model('Alumni_m');
        $this->load->library('form_validation');
    }
    
    //Index + Tampilan viewAdd
    public function index(){
        $data['dataAlumni'] = $this->Alumni_m->getAll()->result();
        $this->load->view('admin/alumni/alumni_data', $data);
    }

    public function viewAddAlumni(){
        $this->load->view('admin/alumni/alumni_add');
    }
   

    // Add Alumni
    public function AddAlumni(){
        $respon = array();
        $post = $this->input->post(null, TRUE);
        $this->Alumni_m->addAlumni($post);
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

    public function viewEditAlumni($id){
        $data['rowAlumni'] = $this->Alumni_m->getById($id)->row();
        $this->load->view('admin/alumni/alumni_edit', $data);

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

    public function deleteAlumni(){
        $id = $this->input->post('id');
        $this->Alumni_m->deleteAlumni($id);
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
        echo json_encode($response);
    }


    // public function getImport(){
    //     ini_set('error_reporting', E_ALL);
    //     ini_set('display_errors', true);
        
    //     require_once __DIR__.'/../src/SimpleXLSX.php';
        
    //     echo '<h1>Parse books.xslx</h1><pre>';
    //     if ( $xlsx = SimpleXLSX::parse('books.xlsx') ) {
    //         print_r( $xlsx->rows() );
    //     } else {
    //         echo SimpleXLSX::parseError();
    //     }
    //     echo '<pre>';
    // }

}