<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {
	function __construct(){
        parent::__construct();
		check_not_user();
        $this->load->model(['Pertanyaan_m', 'Jawaban_m', 'JawabanAlumni_m']);
        $this->load->library('form_validation');
    }

	public function index(){
 		$data['dataPertanyaanKategori'] = $this->Pertanyaan_m->getPKategoriAll()->result();
		$this->load->view('user/pertanyaan/pertanyaan_utama', $data);
	}

	public function viewPertanyaanKategori($id){
		// echo json_encode($id);
		
		$data['dataPertanyaan'] =$this->Pertanyaan_m->getPKategoriAllByID($id)->result();
		if($data['dataPertanyaan'] != null){
			$data['dataPertanyaanKategoriID'] = $id;
			foreach($data['dataPertanyaan'] as $rowPertanyaan){
				$pertanyaanID[] = $rowPertanyaan->pertanyaanID;
			}
			
			$data['dataJawabanPilihSingle'] =$this->Jawaban_m->getJawabanPilihSingleAll($pertanyaanID)->result();
			$data['dataJawabanPilihMultiple'] =$this->Jawaban_m->getJawabanPilihMultipleAll($pertanyaanID)->result();
			foreach($data['dataJawabanPilihMultiple'] as $rowJawabanPilihMultiple){
				$multipleID[] = $rowJawabanPilihMultiple->jawabanPMID;
			}
			$data['dataJawabanPilihMultipleDetail'] =$this->Jawaban_m->getJawabanPilihMultipleDetailAll($multipleID)->result();
		}
		
		// echo json_encode($data);
		$this->load->view('user/pertanyaan/pertanyaan_add', $data);
	}

	public function addPertanyaanAlumni(){
		$postCheck = $this->input->post(null, TRUE);
		$postKategoriID = $this->input->post('pertanyaanKategoriID');
		$dataPertanyaan['dataPertanyaan'] =$this->Pertanyaan_m->getPKategoriAllByID($postKategoriID)->result();
		if($dataPertanyaan['dataPertanyaan'] != null){
			foreach($dataPertanyaan['dataPertanyaan'] as $rowPertanyaan){
				if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_esay'){
					$pertanyaanID = $rowPertanyaan->pertanyaanID;
					$this->form_validation->set_rules('essay'.$pertanyaanID, 'essay'.$pertanyaanID, 'required');
				}
				if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single'){
					$pertanyaanID = $rowPertanyaan->pertanyaanID;
					$this->form_validation->set_rules('pilihSingle'.$pertanyaanID, 'pilihSingle'.$pertanyaanID, 'required');
					$dataJawabanPilihSingle['dataJawabanPilihSingle'] =$this->Jawaban_m->getJawabanPilihSingleAll($pertanyaanID)->result();
					foreach($dataJawabanPilihSingle['dataJawabanPilihSingle'] as $rowJawabanPilihSingle){
						if(isset($_POST['lanjut'.$rowJawabanPilihSingle->jawabanPSID])){
							if($postCheck['lanjut'.$rowJawabanPilihSingle->jawabanPSID] != true){
								$this->form_validation->set_rules('lanjut'.$rowJawabanPilihSingle->jawabanPSID, 'lanjut'.$rowJawabanPilihSingle->jawabanPSID, 'required');
							}else{
								$this->form_validation->set_rules('lanjut'.$rowJawabanPilihSingle->jawabanPSID, 'lanjut'.$rowJawabanPilihSingle->jawabanPSID, 'required');
							}
						}
					}	
				}

				if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_multiple'){
					$pertanyaanID = $rowPertanyaan->pertanyaanID;
					$dataJawabanPilihMultiple['dataJawabanPilihM'] =$this->Jawaban_m->getJawabanPilihMultipleAll($pertanyaanID)->result();
					foreach($dataJawabanPilihMultiple['dataJawabanPilihM'] as $rowJawabanPilihMultiple){
						// $dJawabanM = $this->Jawaban_m->getJawabanPilihMultipleDetailAll($rowJawabanPilihMultiple->jawabanPMID)->row();
						$this->form_validation->set_rules('pilihMultiple'.$pertanyaanID.$rowJawabanPilihMultiple->jawabanPMID, 'pilihMultiple'.$pertanyaanID.$rowJawabanPilihMultiple->jawabanPMID, 'required');
					}	
				}
			}
		}

        $this->form_validation->set_message('required', ' masih Kososng, Silahkan Di isi');
        if($this->form_validation->run() == FALSE){
			$data['status'] = ['status'=>'gagal'];
			$dataEssay = array();
			$datapilihSingle = array();
			$dataPilihanLanjut = array();
			$dataPertanyaan['dataPertanyaan'] = $this->Pertanyaan_m->getPKategoriAllByID($postKategoriID)->result();
			if($dataPertanyaan['dataPertanyaan'] != null){
				foreach($dataPertanyaan['dataPertanyaan'] as $rowPertanyaan){
					if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_esay'){
						$pertanyaanID = $rowPertanyaan->pertanyaanID;
						$dataEssay[] = ['essay'.$pertanyaanID => form_error('essay'.$pertanyaanID)];		
					}
					if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single'){
						$pertanyaanID = $rowPertanyaan->pertanyaanID;
						$datapilihSingle[] = ['pilihSingle'.$pertanyaanID => form_error('pilihSingle'.$pertanyaanID)];

						$dataJawabanPilihSingle['dataJawabanPilihSingle'] = $this->Jawaban_m->getJawabanPilihSingleAll($pertanyaanID)->result();
						foreach($dataJawabanPilihSingle['dataJawabanPilihSingle'] as $rowJawabanPilihSingle){
							if(isset($_POST['lanjut'.$rowJawabanPilihSingle->jawabanPSID])){
								if($postCheck['lanjut'.$rowJawabanPilihSingle->jawabanPSID] != true){
									$dataPilihanLanjut[] = ['lanjut'.$rowJawabanPilihSingle->jawabanPSID => form_error('lanjut'.$rowJawabanPilihSingle->jawabanPSID)];
								}else{
									$dataPilihanLanjut[] = ['lanjut'.$rowJawabanPilihSingle->jawabanPSID => form_error('lanjut'.$rowJawabanPilihSingle->jawabanPSID)];
								}	
							}
							else{
								$dataPilihanLanjut[] = ['lanjut'.$rowJawabanPilihSingle->jawabanPSID => ''];
							}
						}
					}

					if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_multiple'){
						$pertanyaanID = $rowPertanyaan->pertanyaanID;
						$dataJawabanPilihMultiple['dataJawabanPilihM'] =$this->Jawaban_m->getJawabanPilihMultipleAll($pertanyaanID)->result();
						foreach($dataJawabanPilihMultiple['dataJawabanPilihM'] as $rowJawabanPilihMultiple){
							$pilihMultiple[] = ['pilihMultiple'.$pertanyaanID.$rowJawabanPilihMultiple->jawabanPMID => form_error('pilihMultiple'.$pertanyaanID.$rowJawabanPilihMultiple->jawabanPMID)];
						}
					}
				}
			}
			
			$datax = array(
				'status' => 'gagal',
				'essay' => $dataEssay,
				'pilihSingle' => $datapilihSingle,
				'pilihanLanjut' => $dataPilihanLanjut,
				'pilihMultiple' => $pilihMultiple,
			);
	
            
        }else{
			$post = $this->input->post(null, TRUE);

			$postKategoriID = $this->input->post('pertanyaanKategoriID');
			$dataPertanyaanAlumni = $this->Pertanyaan_m->getPKategoriAllByID($postKategoriID)->result();

			if($dataPertanyaan != null){
				foreach($dataPertanyaanAlumni as $rowPertanyaanAlumni){

					if($rowPertanyaanAlumni->pertanyaanKriteriaJawaban == 'kriteria_esay'){
						if($post['essay'.$rowPertanyaanAlumni->pertanyaanID] != null){
							$parseJAlumni = array(
								'alumniID' => $post['alumniID'],
								'pertanyaanID' => $rowPertanyaanAlumni->pertanyaanID,
								'jawabanAlumniStatus' => 'sukses'
							);

							$dataJawabanCheck = $this->JawabanAlumni_m->getJawabanAlumniCheck($parseJAlumni)->row();
							if($dataJawabanCheck != null){
								$parseJAlumni['jawabanAlumniID'] =  $dataJawabanCheck->jawabanAlumniID;
								$id = $parseJAlumni['jawabanAlumniID'];
								$this->JawabanAlumni_m->editJawabanAlumni($parseJAlumni);
							}else{
								$id = $this->JawabanAlumni_m->addJawabanAlumni($parseJAlumni);
							}
							
							$parse = array(
								'jawabanAlumniID' => $id,
								'jawabanAlumniEsayDesk' => $post['essay'.$rowPertanyaanAlumni->pertanyaanID]
							);
							$dataAlumniEssay = $this->JawabanAlumni_m->getJawabanAlumniEssayCheck($parse)->row();
							if($dataAlumniEssay != null){
								$parse['jawabanAlumniEsayID'] =  $dataAlumniEssay->jawabanAlumniEsayID;
								$this->JawabanAlumni_m->editJawabanAlumniEssay($parse);
							}else{
								$this->JawabanAlumni_m->addJawabanAlumniEssay($parse);
							}
							
						}
					}

					if($rowPertanyaanAlumni->pertanyaanKriteriaJawaban == 'kriteria_pilih_single'){
						if($post['pilihSingle'.$rowPertanyaanAlumni->pertanyaanID]){
							$parseJAlumni = array(
								'alumniID' => $post['alumniID'],
								'pertanyaanID' => $rowPertanyaanAlumni->pertanyaanID,
								'jawabanAlumniStatus' => 'sukses'
							);

							$dataJawabanCheck = $this->JawabanAlumni_m->getJawabanAlumniCheck($parseJAlumni)->row();
							if($dataJawabanCheck != null){
								$parseJAlumni['jawabanAlumniID'] =  $dataJawabanCheck->jawabanAlumniID;
								$id = $parseJAlumni['jawabanAlumniID'];
								$this->JawabanAlumni_m->editJawabanAlumni($parseJAlumni);
							}else{
								$id = $this->JawabanAlumni_m->addJawabanAlumni($parseJAlumni);
							}

							$parse = array(
								'jawabanAlumniID' => $id,
								'jawabanAlumniPS_JID' => $post['pilihSingle'.$rowPertanyaanAlumni->pertanyaanID]
							);
							$dataAlumniPS = $this->JawabanAlumni_m->getJawabanAlumniPSCheck($parse)->row();
							if($dataAlumniPS != null){
								$parse['jawabanAlumniPSID'] =  $dataAlumniPS->jawabanAlumniPSID;
								$dataPSID = $parse['jawabanAlumniPSID'];
								$this->JawabanAlumni_m->editJawabanAlumniPS($parse);
							}else{
								$dataPSID = $this->JawabanAlumni_m->addJawabanAlumniPS($parse);
							}

							$rowJawabanPilihSinglex = $this->JawabanAlumni_m->getJawabanAlumniPSID($dataPSID)->row();
							if($rowJawabanPilihSinglex != null){
								$rowJawabanPSL = $this->JawabanAlumni_m->getJawabanAlumniPSLanjutCheck($rowJawabanPilihSinglex->jawabanAlumniPSID)->row();
								if($rowJawabanPSL != null){
									if($rowJawabanPilihSinglex->jawabanPSLanjutan == 'aktif'){
										$parse = array(
											'jawabanAlumniPSLID' => $rowJawabanPSL->jawabanAlumniPSLID,
											'jawabanAlumniPSID' => $dataPSID,
											'jawabanPSLDesk' => $post['lanjut'.$rowJawabanPilihSinglex->jawabanPSID]
										);
										$this->JawabanAlumni_m->editJawabanAlumniPSLanjut($parse);
									}else{
										$this->JawabanAlumni_m->deleteJawabanAlumniPSLanjut($rowJawabanPSL->jawabanAlumniPSL_jawabanAlumniPSID);
										
									}
								}else{

									if($rowJawabanPilihSinglex->jawabanPSLanjutan == 'aktif'){
										$parse = array(
											'jawabanAlumniPSID' => $dataPSID,
											'jawabanPSLDesk' => $post['lanjut'.$rowJawabanPilihSinglex->jawabanPSID]
										);
										$this->JawabanAlumni_m->addJawabanAlumniPSLanjut($parse);
									}
								}
							}
						}
					}



					if($rowPertanyaanAlumni->pertanyaanKriteriaJawaban == 'kriteria_pilih_multiple'){
						$dataJawabanPilihMultiplex = $this->Jawaban_m->getJawabanPilihMultipleAll($rowPertanyaanAlumni->pertanyaanID)->result();
						foreach($dataJawabanPilihMultiplex as $rowJawabanPilihMultiplex){
							
							if($post['pilihMultiple'.$rowPertanyaanAlumni->pertanyaanID.$rowJawabanPilihMultiplex->jawabanPMID]){
								$parseJAlumni = array(
									'alumniID' => $post['alumniID'],
									'pertanyaanID' => $rowPertanyaanAlumni->pertanyaanID,
									'jawabanAlumniStatus' => 'sukses'
								);
	
								$dataJawabanCheck = $this->JawabanAlumni_m->getJawabanAlumniCheck($parseJAlumni)->row();
								if($dataJawabanCheck != null){
									$parseJAlumni['jawabanAlumniID'] =  $dataJawabanCheck->jawabanAlumniID;
									$id = $parseJAlumni['jawabanAlumniID'];
									$this->JawabanAlumni_m->editJawabanAlumni($parseJAlumni);
								}else{
									$id = $this->JawabanAlumni_m->addJawabanAlumni($parseJAlumni);
								}

								$parse = array(
									'jawabanAlumniID' => $id,
									'jawabanPMID' => $rowJawabanPilihMultiplex->jawabanPMID,
									'djawabanPMID' => $post['pilihMultiple'.$rowPertanyaanAlumni->pertanyaanID.$rowJawabanPilihMultiplex->jawabanPMID]
								);
								$dataAlumniPM = $this->JawabanAlumni_m->getJawabanAlumniPMCheck($parse)->row();
								if($dataAlumniPM != null){
									$parse['jawabanAlumniPMID'] =  $dataAlumniPM->jawabanAlumniPMID;
									$dataPSID = $this->JawabanAlumni_m->editJawabanAlumniPM($parse);
								}else{
									$dataPSID = $this->JawabanAlumni_m->addJawabanAlumniPM($parse);
								}
								
								
							}
						}
					}
				}
			}

		
			$datax = array(
				'status' => 'sukses',
				
				
			);

		}
		// echo json_encode($postx);
		
		echo json_encode($rowJawabanPilihSinglex);
		
	}
}
