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
            $this->Pertanyaan_m->addPertanyaan($post);
            if($this->db->affected_rows() > 0){
                $response = array(
                    'status' 	=> 'success',
                );
            }else{
                $response = array(
                    'status' 	=> 'gagal',
                );
            }
        }else if($post['jawabanKategori'] == 'pilihan'){
                
            if($post['pilihanKriteriaJawaban'] == 'single'){
               
                if($post['singleJawabanMultiple'] == 'aktif'){
                    $post['jawabanKriteria'] = 'kriteria_pilih_single_m_aktif';
                }else if($post['singleJawabanMultiple'] == 'tidak_aktif'){
                    $post['jawabanKriteria'] = 'kriteria_pilih_single_m_tidak_aktif';
                }
                $dataID = $this->Pertanyaan_m->addPertanyaan($post);
                $post['pertanyaanID'] = $dataID;
                // $post['jawabanPSMultiplex'] =['jawabanPSMultiple'];
                for($i=1; $i<=count($post['JawabanPilihanSingle']); $i++){
                    $post['JawabanPS'] = $post['JawabanPilihanSingle'][$i];
                    // if($post['lanjutanJawaban'][$i] == 'checked'){
                        $post['lanjutanJawabanx'] = $post['lanjutanJawaban'][$i];
                        $this->Pertanyaan_m->addPertanyaanPilihanSingle($post); 
                    // }
                    if($this->db->affected_rows() > 0){
                        $response = array(
                            'status' 	=> 'success',
                        );
                    }else{
                        $response = array(
                            'status' 	=> 'gagal',
                        );
                    }
                   
                     
                }
                
            }
            else if($post['pilihanKriteriaJawaban'] == 'multiple'){
                $post['jawabanKriteria'] = 'kriteria_pilih_multiple';
                $dataID = $this->Pertanyaan_m->addPertanyaan($post);
                $post['pertanyaanID'] = $dataID;
                for($i=0; $i<count($post['dataMultiple']); $i++){
                  
                    $post['JawabanPMDesk'] = $post['JawabanPilihanMultipleDeskripsi'.$i];
                    $dataPMID = $this->Pertanyaan_m->addPertanyaanPilihanMultiple($post);
                    $post['jawabanPMID'] = $dataPMID;
                    for($j=0;$j<count($post['JawabanPilihanMultiple'.$i]); $j++){
                        $post['JawabanPilihanMultipleDetail'] = $post['JawabanPilihanMultiple'.$i][$j];
                        $this->Pertanyaan_m->addPertanyaanPilihanMultipleDetail($post);
                        if($this->db->affected_rows() > 0){
                            $response = array(
                                'status' 	=> 'success',
                            );
                        }else{
                            $response = array(
                                'status' 	=> 'gagal',
                            );
                        }
                    }
                   
                }
            }
           
        }
        else if($post['jawabanKategori'] == 'alamat'){
            $post['jawabanKriteria'] = 'kriteria_alamat';
            $this->Pertanyaan_m->addPertanyaan($post);
            if($this->db->affected_rows() > 0){
                $response = array(
                    'status' 	=> 'success',
                );
            }else{
                $response = array(
                    'status' 	=> 'gagal',
                );
            }
        }

        echo json_encode($response);
    }

    public function viewEditPertanyaan($id){
        $data['rowPertanyaan'] = $this->Pertanyaan_m->getById($id)->row();
        $data['dataPertanyaanSinggle'] = $this->Pertanyaan_m->getPertanyaanPilihanSingleID($id)->result();
        $data['dataPertanyaanMultiple'] = $this->Pertanyaan_m->getPertanyaanPilihanMultipleByID($id)->result();
        if($data['dataPertanyaanMultiple'] != null){

        
            foreach($data['dataPertanyaanMultiple'] as $rowPertanyaanMultiple){
                $jawabanPMID[] = $rowPertanyaanMultiple->jawabanPMID;
            }

            $data['dataPertanyaanMultipleDetail'] = $this->Pertanyaan_m->getPertanyaanPilihanMultipleDetailByID($jawabanPMID)->result();
        }
       
        $data['dataPertanyaanKategori'] = $this->Pertanyaan_m->getPKategoriAll()->result();
        // echo json_encode($data);
        $this->load->view('admin/pertanyaan/pertanyaan_edit', $data);
    }


    public function editPertanyaan(){
        // $respon = array();
        $xdata = array();
        $post = $this->input->post(null, TRUE);
        $id = $post['pertanyaanID'];
        $rowPertanyaan = $this->Pertanyaan_m->getByID($id)->row();
        // $rowPertanyaan = $this->Pertanyaan_m->getByID($id)->row();
        if($rowPertanyaan->pertanyaanKategoriJawaban == 'esay'){
            // $rowPertanyaan = $this->Pertanyaan_m->getByID($id)->row();
            // $this->Pertanyaan_m->deletePertanyaan($id);

        }else if($rowPertanyaan->pertanyaanKategoriJawaban == 'pilihan'){
            if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single'){
                $data = $this->Pertanyaan_m->deletePertanyaanPilihanSingle($id);
                $error = $this->db->error();
                if($error['code'] != 0){
                    $response = array(
                        'status' 	=> 'gagal',
                    );
                }else{
                    // $this->Pertanyaan_m->deletePertanyaan($id);
                    // $error = $this->db->error();
                    // if($error['code'] != 0){
                    //     $response = array(
                    //         'status' 	=> 'gagal',
                    //     );
                    // }
                }
                
                
            }else if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_multiple'){
                $dataPM = $this->Pertanyaan_m->getPertanyaanPilihanMultipleByID($id)->result();
                foreach($dataPM as $rowPM){
                    $rowPilihMID[] = $rowPM->jawabanPMID;
                }
                
                $this->Pertanyaan_m->deletePertanyaanPilihanMultipleDetail($rowPilihMID);
                $error = $this->db->error();
                if($error['code'] != 0){
                    $response = array(
                        'status' 	=> 'gagal',
                    );
                }else{  
                    $this->Pertanyaan_m->deletePertanyaanPilihanMultiple($id);
                    $error = $this->db->error();
                    if($error['code'] != 0){
                        $response = array(
                            'status' 	=> 'gagal',
                        );
                    }else{
                        // $this->Pertanyaan_m->deletePertanyaan($id);
                        // $error = $this->db->error();
                        // if($error['code'] != 0){
                        //     $response = array(
                        //         'status' 	=> 'gagal',
                        //     );
                        // }else{
                           
                        // }
                    }
                } 
            }
           
        } 
        // else if($rowPertanyaan->pertanyaanKategoriJawaban == 'alamat'){
        //     // $rowPertanyaan = $this->Pertanyaan_m->getByID($id)->row();
        //     $this->Pertanyaan_m->deletePertanyaan($id);
        //     $error = $this->db->error();
        //     if($error['code'] != 0){
        //         $response = array(
        //             'status' 	=> 'gagal',
        //         );
        //     }else{
                
        //     }
        // }


        if($post['jawabanKategori'] == 'esay'){
            $post['jawabanKriteria'] = 'kriteria_esay';
            $this->Pertanyaan_m->editPertanyaan($post);
            if($this->db->affected_rows() > 0){
                $response = array(
                    'status' 	=> 'success',
                );
            }else{
                $response = array(
                    'status' 	=> 'gagal',
                );
            }
        }else if($post['jawabanKategori'] == 'pilihan'){
                
            if($post['pilihanKriteriaJawaban'] == 'single'){
               
                if($post['singleJawabanMultiple'] == 'aktif'){
                    $post['jawabanKriteria'] = 'kriteria_pilih_single_m_aktif';
                }else if($post['singleJawabanMultiple'] == 'tidak_aktif'){
                    $post['jawabanKriteria'] = 'kriteria_pilih_single_m_tidak_aktif';
                }
                $dataID = $this->Pertanyaan_m->editPertanyaan($post);
                // $post['pertanyaanID'] = $dataID;
                // $post['jawabanPSMultiplex'] =['jawabanPSMultiple'];
                for($i=1; $i<=count($post['JawabanPilihanSingle']); $i++){
                    $post['JawabanPS'] = $post['JawabanPilihanSingle'][$i];
                    // if($post['lanjutanJawaban'][$i] == 'checked'){
                        $post['lanjutanJawabanx'] = $post['lanjutanJawaban'][$i];
                        $this->Pertanyaan_m->addPertanyaanPilihanSingle($post); 
                    // }
                    if($this->db->affected_rows() > 0){
                        $response = array(
                            'status' 	=> 'success',
                        );
                    }else{
                        $response = array(
                            'status' 	=> 'gagal',
                        );
                    }
                   
                     
                }
                
            }
            else if($post['pilihanKriteriaJawaban'] == 'multiple'){
                $post['jawabanKriteria'] = 'kriteria_pilih_multiple';
                $dataID = $this->Pertanyaan_m->editPertanyaan($post);
                // $post['pertanyaanID'] = $dataID;
                for($i=0; $i<count($post['dataMultiple']); $i++){
                  
                    $post['JawabanPMDesk'] = $post['JawabanPilihanMultipleDeskripsi'.$i];
                    $dataPMID = $this->Pertanyaan_m->addPertanyaanPilihanMultiple($post);
                    $post['jawabanPMID'] = $dataPMID;
                    for($j=0;$j<count($post['JawabanPilihanMultiple'.$i]); $j++){
                        $post['JawabanPilihanMultipleDetail'] = $post['JawabanPilihanMultiple'.$i][$j];
                        $this->Pertanyaan_m->addPertanyaanPilihanMultipleDetail($post);
                        if($this->db->affected_rows() > 0){
                            $response = array(
                                'status' 	=> 'success',
                            );
                        }else{
                            $response = array(
                                'status' 	=> 'gagal',
                            );
                        }
                    }
                   
                }
            }
           
        }
        else if($post['jawabanKategori'] == 'alamat'){
            $post['jawabanKriteria'] = 'kriteria_alamat';
            $this->Pertanyaan_m->addPertanyaan($post);
            if($this->db->affected_rows() > 0){
                $response = array(
                    'status' 	=> 'success',
                );
            }else{
                $response = array(
                    'status' 	=> 'gagal',
                );
            }
        }

        echo json_encode($response);
    }

    public function deletePertanyaan(){
        $id = $this->input->post('id');
        $rowPertanyaan = $this->Pertanyaan_m->getByID($id)->row();
        if($rowPertanyaan->pertanyaanKategoriJawaban == 'esay'){
            // $rowPertanyaan = $this->Pertanyaan_m->getByID($id)->row();
            $this->Pertanyaan_m->deletePertanyaan($id);
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
        }else if($rowPertanyaan->pertanyaanKategoriJawaban == 'pilihan'){
            if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_aktif' || $rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_tidak_aktif'){
                $data = $this->Pertanyaan_m->deletePertanyaanPilihanSingle($id);
                $error = $this->db->error();
                if($error['code'] != 0){
                    $response = array(
                        'status' 	=> 'gagal',
                    );
                }else{
                    $this->Pertanyaan_m->deletePertanyaan($id);
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
                
                
            }else if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_multiple'){
                $dataPM = $this->Pertanyaan_m->getPertanyaanPilihanMultipleByID($id)->result();
                foreach($dataPM as $rowPM){
                    $rowPilihMID[] = $rowPM->jawabanPMID;
                }
                
                $this->Pertanyaan_m->deletePertanyaanPilihanMultipleDetail($rowPilihMID);
                $error = $this->db->error();
                if($error['code'] != 0){
                    $response = array(
                        'status' 	=> 'gagal',
                    );
                }else{  
                    $this->Pertanyaan_m->deletePertanyaanPilihanMultiple($id);
                    $error = $this->db->error();
                    if($error['code'] != 0){
                        $response = array(
                            'status' 	=> 'gagal',
                        );
                    }else{
                        $this->Pertanyaan_m->deletePertanyaan($id);
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
            }
           
        } else if($rowPertanyaan->pertanyaanKategoriJawaban == 'alamat'){
            // $rowPertanyaan = $this->Pertanyaan_m->getByID($id)->row();
            $this->Pertanyaan_m->deletePertanyaan($id);
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