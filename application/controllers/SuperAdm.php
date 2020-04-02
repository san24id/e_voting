<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdm extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->model('Home_model');
		$this->load->model('SuperAdm_model');
		$this->load->library('Pdf');

		$this->load->library('session');
 		
 		if ($this->session->userdata('id_role_app') == 1) {
 			
		}else{
			redirect('login/logout', 'refresh');
		}
	}

	public function index()
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['profil'] = $this->SuperAdm_model->getProfilId();
		$data['draft'] = $this->Dashboard_model->getTotalDraft();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();
		$data['payment'] = $this->Dashboard_model->payment();

		$this->load->view('akses/superadmin/header_admin', $data);
        $this->load->view('akses/superadmin/data_payrequest', $data);
	}

	public function addstaff(){
		$add = array(

			'id_role_app' => $_POST['id_role_app'],
			'display_name' => $_POST['display_name'],
			'email' => $_POST['email'],
			'username' =>  $_POST['username'],
			'password' =>  $_POST['password'],
			'role_id' =>  $_POST['role_id'],
			'division_id' => $_POST['division_id'],
			'role_status' => $_POST['role_status'],
			'created_by' => $POST['created_by'],
			'created_date' => $_POST['created_date'],
			'status' => $POST['status'],
			'status_login' => $POST['status_login'],
			'status_mail1' => $POST['status_mail1'],
			'status_mail2' => $POST['status_mail2']

		);

		$this->SuperAdm_model->addstaff($add);

		redirect('SuperAdm');
	}

	public function deletestaff(){

		$this->SuperAdm_model->deletestaff($_POST['id_user']);

		redirect('SuperAdm');

	}

	public function updatestaff(){
		$upd = array(
			'id_user' => $_POST['id_user'],
			'id_role_app' => $_POST['id_role_app'],
			'display_name' => $_POST['display_name'],
			'email' => $_POST['email'],
			'username' =>  $_POST['username'],
			'password' =>  $_POST['password'],
			'role_id' =>  $_POST['role_id'],
			'division_id' => $_POST['division_id'],
			'role_status' => $_POST['role_status'],			
			'status' => $_POST['status']
		);

		$this->SuperAdm_model->updatestaff($upd);

		redirect('SuperAdm');
	}
	
}