<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
        parent::__construct();
        check_not_user();
        // $this->load->model('Detail_alumni_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('user/dashboard');
	}
}
