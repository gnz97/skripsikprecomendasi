<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AuthUser extends CI_Controller {
	
    //Menampilkan Halaman Login
	public function login(){
		check_already_login_user();
		$this->load->view('user/login_user');
	}

    //Proses Auth Login
	public function process(){
		$post = $this->input->post(null, TRUE);
        // var_dump($post);
		
		if(isset($post['login'])){
			$this->load->model('Alumni_m');
			$query = $this->Alumni_m->loginUser($post);
			
			if($query->num_rows()>0){
				$row = $query->row();
				$params = array(
					'alumniID' => $row->alumniID,
					// 'hakAksesID'  => $row->hakAksesID
				);
				$this->session->set_userdata($params);
				echo "<script>
						alert('Selamat, Login Berhasil');
						window.location='".site_url('user/Dashboard')."';
					</script>";
			}
			else{
				echo "<script>
						alert('Login Gagal, Username/Password Salah');
						window.location='".site_url('user/AuthUser/login')."';
					</script>";
			}
		}
	}

  

	//Menampilkan Tampilan Registrasi
   
    
    public function logout(){
		$params = array('alumniID');
		$this->session->unset_userdata($params);
		redirect('user/AuthUser/login');

	}
}
