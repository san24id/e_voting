<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller {
   
    function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->model('Home_model');
		$this->load->library('Pdf');

		// $sid = $this->session->userdata("username");

		$this->load->library('session');
 		
		if ($this->session->userdata('id_role_app') == 4) {
 			
		}else{
			redirect('login/logout', 'refresh');
		}
    }
    
    public function index(){

        $this->load->view('akses/approval/header_approval', $data);
		// $this->load->view('akses/approval/dashboard_approval', $data);
    }
}    