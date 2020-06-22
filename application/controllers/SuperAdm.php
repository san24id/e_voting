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

	public function supplier(){
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['supplier'] = $this->SuperAdm_model->getSupplier();

		$this->load->view('akses/superadmin/header_admin', $data);
        $this->load->view('akses/superadmin/data_supplier', $data);
	}
	
	public function addsupplier(){
		$add = array(

			'kode_supplier' => $_POST['kode_supplier'],
			'nama_supplier' => $_POST['nama_supplier'],
			'npwp' => $_POST['npwp'],
			'badan_usaha' =>  $_POST['badan_usaha'],
			'pic' =>  $_POST['pic'],
			'direktur' =>  $_POST['direktur'],
			'alamat' => $_POST['alamat'],
			'telepon' => $_POST['telepon'],
			'nama_bank' => $_POST['nama_bank'],
			'mata_uang' => $_POST['mata_uang'],
			'no_rek' => $POST['no_rek']
			
		);

		$this->SuperAdm_model->addsupplier($add);

		redirect('SuperAdm/supplier');
	}

	public function deletesupplier(){

		$this->SuperAdm_model->deletesupplier($_POST['id_supplier']);

		redirect('SuperAdm/supplier');

	}

	public function updatesupplier(){
		$upd = array(
			'id_supplier' => $_POST['id_supplier'],
			'kode_supplier' => $_POST['kode_supplier'],
			'nama_supplier' => $_POST['nama_supplier'],
			'npwp' => $_POST['npwp'],
			'badan_usaha' =>  $_POST['badan_usaha'],
			'pic' =>  $_POST['pic'],
			'direktur' =>  $_POST['direktur'],
			'alamat' => $_POST['alamat'],
			'telepon' => $_POST['telepon'],
			'nama_bank' => $_POST['nama_bank'],
			'mata_uang' => $_POST['mata_uang'],
			'no_rek' => $POST['no_rek']
		);

		$this->SuperAdm_model->updatesupplier($upd);

		redirect('SuperAdm/supplier');
	}

	public function currency(){
		$data['active1'] = '';
		$data['active2'] = '';
		$data['active3'] = 'active';

		$data['currency'] = $this->SuperAdm_model->getCurrency();

		$this->load->view('akses/superadmin/header_admin', $data);
        $this->load->view('akses/superadmin/currency', $data);
	}

	public function addcurr(){
		$add = array(

			'mata_uang' => $_POST['mata_uang'],
			'currency' => $_POST['currency']
			
		);

		$this->SuperAdm_model->addcurr($add);

		redirect('SuperAdm/currency');
	}

	public function deletecurr(){
		
		$this->SuperAdm_model->deletecurr($_POST['id_curr']);

		redirect('SuperAdm/currency');

	}

	public function updatecurr(){
		$upd = array(
			'id_curr' => $_POST['id_curr'],
			'mata_uang' => $_POST['mata_uang'],
			'currency' => $_POST['currency']
		);

		$this->SuperAdm_model->updatecurr($upd);

		redirect('SuperAdm/currency');
	}

	public function bank(){
		$data['active1'] = '';
		$data['active2'] = '';
		$data['active4'] = 'active';


		$data['bank'] = $this->SuperAdm_model->getBank();

		$this->load->view('akses/superadmin/header_admin', $data);
        $this->load->view('akses/superadmin/bank', $data);
	}

	public function addbank(){
		$add = array(

			'nama_bank' => $_POST['nama_bank'],
			'singkatan' => $_POST['singkatan']
			
		);

		$this->SuperAdm_model->addbank($add);

		redirect('SuperAdm/bank');
	}

	public function deletebank(){
		
		$this->SuperAdm_model->deletebank($_POST['id_bank']);

		redirect('SuperAdm/bank');

	}

	public function updatebank(){
		$upd = array(
			'id_bank' => $_POST['id_bank'],
			'nama_bank' => $_POST['nama_bank'],
			'singkatan' => $_POST['singkatan']
		);

		$this->SuperAdm_model->updatebank($upd);

		redirect('SuperAdm/bank');
	}
}