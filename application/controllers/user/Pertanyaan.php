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
			if($data['dataJawabanPilihMultiple'] != null){
				foreach($data['dataJawabanPilihMultiple'] as $rowJawabanPilihMultiple){
					$multipleID[] = $rowJawabanPilihMultiple->jawabanPMID;
				}
				$data['dataJawabanPilihMultipleDetail'] =$this->Jawaban_m->getJawabanPilihMultipleDetailAll($multipleID)->result();
			}
			
		}
		
		// echo json_encode($data);
		$this->load->view('user/pertanyaan/pertanyaan_add', $data);
	}

	public function addPertanyaanAlumni(){
		$zxxx = array();
		$postCheck = $this->input->post(null, TRUE);
		$postKategoriID = $this->input->post('pertanyaanKategoriID');
		$dataPertanyaan['dataPertanyaan'] =$this->Pertanyaan_m->getPKategoriAllByID($postKategoriID)->result();
		if($dataPertanyaan['dataPertanyaan'] != null){
			foreach($dataPertanyaan['dataPertanyaan'] as $rowPertanyaan){
				if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_esay'){
					$pertanyaanID = $rowPertanyaan->pertanyaanID;
					$this->form_validation->set_rules('essay'.$pertanyaanID, 'essay'.$pertanyaanID, 'required');
				}
				if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_aktif'){
					$pertanyaanID = $rowPertanyaan->pertanyaanID;
					$psID = $this->Pertanyaan_m->getPertanyaanPilihanSingleID($pertanyaanID)->row();
					if(isset($_POST['pilihSingle'.$pertanyaanID.$psID->jawabanPSID])){
						$this->form_validation->set_rules('pilihSingle'.$pertanyaanID.$psID->jawabanPSID, 'pilihSingle'.$pertanyaanID.$psID->jawabanPSID, 'required');
					}
					$dataJawabanPilihSingle['dataJawabanPilihSingle'] =$this->Jawaban_m->getJawabanPilihSingleAll($pertanyaanID)->result();
					foreach($dataJawabanPilihSingle['dataJawabanPilihSingle'] as $rowJawabanPilihSingle){
						$datazxx = $rowJawabanPilihSingle->jawabanPSID;
						if(isset($_POST['lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID])){
							// $datazxx = 'aktif';
							if($postCheck['lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID] != true){
								$this->form_validation->set_rules('lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID, 'lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID, 'required');
							}else{
								$this->form_validation->set_rules('lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID, 'lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID, 'required');
							}
						}
					}	
				}

				if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_tidak_aktif'){
					$pertanyaanID = $rowPertanyaan->pertanyaanID;
					$this->form_validation->set_rules('pilihSingle'.$pertanyaanID, 'pilihSingle'.$pertanyaanID, 'required');
					$dataJawabanPilihSingle['dataJawabanPilihSingle'] =$this->Jawaban_m->getJawabanPilihSingleAll($pertanyaanID)->result();
					foreach($dataJawabanPilihSingle['dataJawabanPilihSingle'] as $rowJawabanPilihSingle){
						if(isset($_POST['lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID])){
							if($postCheck['lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID] != true){
								$this->form_validation->set_rules('lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID, 'lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID, 'required');
							}else{
								$this->form_validation->set_rules('lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID, 'lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID, 'required');
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
			$datapilihSingle_m_aktif = array();
			$datapilihSingle_m_tidak_aktif = array();
			$dataPilihanLanjutMAktif = array();
			$dataPilihanLanjutTMAktif = array();
			$dataPertanyaan['dataPertanyaan'] = $this->Pertanyaan_m->getPKategoriAllByID($postKategoriID)->result();
			if($dataPertanyaan['dataPertanyaan'] != null){
				foreach($dataPertanyaan['dataPertanyaan'] as $rowPertanyaan){
					if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_esay'){
						$pertanyaanID = $rowPertanyaan->pertanyaanID;
						$dataEssay[] = ['essay'.$pertanyaanID => form_error('essay'.$pertanyaanID)];		
					}
					if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_aktif'){
						$pertanyaanID = $rowPertanyaan->pertanyaanID;
						$psID = $this->Pertanyaan_m->getPertanyaanPilihanSingleID($pertanyaanID)->row();
						$datapilihSingle_m_aktif[] = ['pilihSingle'.$pertanyaanID.$psID->jawabanPSID => form_error('pilihSingle'.$pertanyaanID.$psID->jawabanPSID)];

						$dataJawabanPilihSingle['dataJawabanPilihSingle'] = $this->Jawaban_m->getJawabanPilihSingleAll($pertanyaanID)->result();
						foreach($dataJawabanPilihSingle['dataJawabanPilihSingle'] as $rowJawabanPilihSingle){
							if(isset($_POST['lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID])){
								$zxxx[] = $rowJawabanPilihSingle->jawabanPSID;
								if($postCheck['lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID] != true){
									$zxx1 = "Aktif";
									$dataPilihanLanjutMAktif[] = ['lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID => form_error('lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID)];
								}else{
									$zxx1 = "Tidak Aktif";
									$dataPilihanLanjutMAktif[] = ['lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID => form_error('lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID)];
								}	
							}
							else{
								$zxx1 = "Kosong";
								$dataPilihanLanjutMAktif[] = ['lanjutMAktif'.$rowJawabanPilihSingle->jawabanPSID => ''];
							}
						}
					}

					if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_tidak_aktif'){
						$pertanyaanID = $rowPertanyaan->pertanyaanID;
						$datapilihSingle_m_tidak_aktif[] = ['pilihSingle'.$pertanyaanID => form_error('pilihSingle'.$pertanyaanID)];

						$dataJawabanPilihSingle['dataJawabanPilihSingle'] = $this->Jawaban_m->getJawabanPilihSingleAll($pertanyaanID)->result();
						foreach($dataJawabanPilihSingle['dataJawabanPilihSingle'] as $rowJawabanPilihSingle){
							if(isset($_POST['lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID])){
								$zxxx[] = $rowJawabanPilihSingle->jawabanPSID;
								if($postCheck['lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID] != true){
									$dataPilihanLanjutTMAktif[] = ['lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID => form_error('lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID)];
								}else{
									$dataPilihanLanjutTMAktif[] = ['lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID => form_error('lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID)];
								}	
							}
							else{
								$dataPilihanLanjutTMAktif[] = ['lanjutMTAktif'.$rowJawabanPilihSingle->jawabanPSID => ''];
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
				'pilihSingle_m_aktif' => $datapilihSingle_m_aktif,
				'pilihSingle_m_tidak_aktif' => $datapilihSingle_m_tidak_aktif,
				'pilihanLanjutMAktif' => $dataPilihanLanjutMAktif,
				'pilihanLanjutMTAktif' => $dataPilihanLanjutTMAktif,
				'pilihMultiple' => $pilihMultiple,
			);
	
            
        }else{
			$post = $this->input->post(null, TRUE);
			$zxap = array();
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

					if($rowPertanyaanAlumni->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_aktif'){
						
						// if($post['pilihSingle'.$rowPertanyaanAlumni->pertanyaanID.$rowAlumniPSAktif->jawabanPSID]){
							$parseJAlumni = array(
								'alumniID' => $post['alumniID'],
								'pertanyaanID' => $rowPertanyaanAlumni->pertanyaanID,
								'jawabanAlumniStatus' => 'sukses'
							);
							$xza[] = $parseJAlumni;

							$dataCheckAlumniJawaban = $this->JawabanAlumni_m->getJawabanAlumniCheck($parseJAlumni);
							if($dataCheckAlumniJawaban->result() != null){
								$zxID = array();
								$dataAlumniPSAktifI = array();
								foreach($dataCheckAlumniJawaban->result() as $rowCheckAlumniJawaban){
									$parseJAlumni['jawabanAlumniID'] =  $rowCheckAlumniJawaban->jawabanAlumniID;
									$dataAlumniPSAktifID = $this->JawabanAlumni_m->getJawabanPSByjawabanAlumniID($parseJAlumni['jawabanAlumniID'])->result();
									foreach($dataAlumniPSAktifID as $rowAlumniPSAktifID){
										$xData = $rowAlumniPSAktifID->jawabanAlumniPSID;
										$xData1 = $rowAlumniPSAktifID->jawabanAlumniPS_jawabanAlumniID;
										$this->JawabanAlumni_m->deleteJawabanAlumniPSLanjut($xData);
										$this->JawabanAlumni_m->deleteJawabanAlumniPS($xData1);

										
										
									}
									$id = $rowCheckAlumniJawaban->jawabanAlumniID;
									$dataAlumniPSAktif = $this->Pertanyaan_m->getPertanyaanPilihanSingleID($rowPertanyaanAlumni->pertanyaanID)->result();
									foreach($dataAlumniPSAktif as $rowAlumniPSAktif){
											
										if($rowAlumniPSAktif->jawabanPSID == isset($post['pilihSingle'.$rowPertanyaanAlumni->pertanyaanID.$rowAlumniPSAktif->jawabanPSID])){
											$parsePilihSMAktif = array(
												'jawabanAlumniID' => $id,
												'jawabanAlumniPS_JID' => $post['pilihSingle'.$rowPertanyaanAlumni->pertanyaanID.$rowAlumniPSAktif->jawabanPSID],
			
											);
											$idPSJ = $this->JawabanAlumni_m->addJawabanAlumniPS($parsePilihSMAktif);
											
												if($rowAlumniPSAktif->jawabanPSLanjutan == 'aktif'){
													$parsePilihSMAktifLanjut = array(
														'jawabanAlumniPSID' => $idPSJ,
														'jawabanPSLDesk' => $post['lanjutMAktif'.$rowAlumniPSAktif->jawabanPSID],
													);
													$this->JawabanAlumni_m->addJawabanAlumniPSLanjut($parsePilihSMAktifLanjut);
												}
										}
									}
								}

								
								// edit data
							}else{
								$id = $this->JawabanAlumni_m->addJawabanAlumni($parseJAlumni);
								//Add Data
								$dataAlumniPSAktif = $this->Pertanyaan_m->getPertanyaanPilihanSingleID($rowPertanyaanAlumni->pertanyaanID)->result();
								foreach($dataAlumniPSAktif as $rowAlumniPSAktif){
									if($rowAlumniPSAktif->jawabanPSID == isset($post['pilihSingle'.$rowPertanyaanAlumni->pertanyaanID.$rowAlumniPSAktif->jawabanPSID])){
										$parsePilihSMAktif = array(
											'jawabanAlumniID' => $id,
											'jawabanAlumniPS_JID' => $post['pilihSingle'.$rowPertanyaanAlumni->pertanyaanID.$rowAlumniPSAktif->jawabanPSID],
		
										);
										$idPSJ = $this->JawabanAlumni_m->addJawabanAlumniPS($parsePilihSMAktif);
										if($rowAlumniPSAktif->jawabanPSLanjutan == 'aktif'){
											$parsePilihSMAktifLanjut = array(
												'jawabanAlumniPSID' => $idPSJ,
												'jawabanPSLDesk' => $post['lanjutMAktif'.$rowAlumniPSAktif->jawabanPSID],
											);
											$this->JawabanAlumni_m->addJawabanAlumniPSLanjut($parsePilihSMAktifLanjut);
										}
									}
								}
								
							}



						// }

						
					}

					if($rowPertanyaanAlumni->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_tidak_aktif'){
						// if($post['pilihSingle'.$rowPertanyaanAlumni->pertanyaanID]){
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
											'jawabanPSLDesk' => $post['lanjutMTAktif'.$rowJawabanPilihSinglex->jawabanPSID]
										);
										$this->JawabanAlumni_m->editJawabanAlumniPSLanjut($parse);
									}else{
										$this->JawabanAlumni_m->deleteJawabanAlumniPSLanjut($rowJawabanPSL->jawabanAlumniPSL_jawabanAlumniPSID);
										
									}
								}else{

									if($rowJawabanPilihSinglex->jawabanPSLanjutan == 'aktif'){
										$parse = array(
											'jawabanAlumniPSID' => $dataPSID,
											'jawabanPSLDesk' => $post['lanjutMTAktif'.$rowJawabanPilihSinglex->jawabanPSID]
										);
										$this->JawabanAlumni_m->addJawabanAlumniPSLanjut($parse);
									}
								}
							}
						// }
				
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

					if($rowPertanyaanAlumni->pertanyaanKriteriaJawaban == 'kriteria_alamat'){
						if($post['pilihanAlamatKabupaten'] != null){
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
								'pilihanAlamatProvinsi' => $post['pilihanAlamatProvinsi'],
								'pilihanAlamatKabupaten' => $post['pilihanAlamatKabupaten']
							);
							$dataAlumniAlamat = $this->JawabanAlumni_m->getJawabanAlumniAlamatCheck($parse)->row();
							if($dataAlumniAlamat != null){
								$parse['jawabanAlumniAlamatID'] =  $dataAlumniAlamat->jawabanAluminAlamatID;
								$this->JawabanAlumni_m->editJawabanAlumniAlamat($parse);
							}else{
								$this->JawabanAlumni_m->addJawabanAlumniAlamat($parse);
							}
							
						}
					}
					
					
				}
			}

		
			$datax = array(
				'status' => 'success',
				
				
			);

		}
		echo json_encode($datax);
		
		// echo json_encode($zxx3);
		
	}

	public function getCheckBox(){
		$id = $this->input->get('id');
		$dataPertanyaan = $this->Pertanyaan_m->getPertanyaanPilihanSingleID($id)->result();
		echo json_encode($dataPertanyaan);
	}
}
