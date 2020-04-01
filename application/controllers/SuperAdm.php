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

		// $this->load->library('session');
 		
 		// if ($this->session->userdata('id_adm')) {
 			
		// }else{
		// 	redirect('login//loginadm', 'refresh');
		// }
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
			'status' => $POST['status']
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
			'status' => $POST['status']
		);

		$this->SuperAdm_model->updatestaff($upd);

		redirect('SuperAdm');
	}
		
	public function user(){
		$data['data_user'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['user'] = $this->SuperAdm_model->getuser();
		
		$this->load->view('akses/admin/header_admin', $data);
		$this->load->view('akses/admin/user_superadm', $data);
	}

	public function updateuser(){
		$upd = array(
			'id_user' => $_POST['id_user'],
			'nomor_user' => $_POST['nomor_user'],
			'nik' => $_POST['nik'],
			'foto' => $_POST['foto'],
			'nama_user' =>  $_POST['nama_user'],
			'instansi' =>  $_POST['instansi'],
			'jabatan' =>  $_POST['jabatan'],
			'email' => $_POST['email'],
			'telepon' => $_POST['telepon'],
			'username' => $_POST['username'],			
			'status' => $_POST['status']
			// 'status_1' => $_POST['status_1'],
			// 'log_create' => $_POST['log_create'],
			// 'log_update' => $_POST['log_update'],
			// 'last_login' => $_POST['last_login']
		);

		$this->SuperAdm_model->updateuser($upd);

		redirect('SuperAdm/user');
	}

}