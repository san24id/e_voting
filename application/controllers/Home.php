<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index()
	{
		$data['active1'] = 'active';
		$data['active2'] = '';

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/dashboard_user', $data);
	}
	
	public function form_add()
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();

		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['kementerian'] = $this->Home_model->getKementerian();
		// $data['lpnk'] = $this->Home_model->getNonKementrian();
		// $data['provinsi'] = $this->Home_model->getProvinsi();
		// $data['kota'] = $this->Home_model->getKota();	
		// $data['kabupaten'] = $this->Home_model->getKabupaten();	
		// $data['assesment'] = $this->Home_model->assesment();
		// $data['cn_assesment'] = $this->Home_model->cn_assesment();
		// $data['noass'] = $this->Home_model->getno();

		$this->load->view('akses/user/header_user', $data);	
        $this->load->view('akses/user/form_pengajuan', $data);
	}

	public function formfinished()
	{
		$data['active1'] = 'active';
		$data['active2'] = '';

		// $sid = $this->session->userdata("id_user");

		$this->load->view('akses/user/header_user', $data);	
       	$this->load->view('akses/user/form_finished', $data);

		// if($this->Home_model->getIdProfilProjekUser($idp, $sid) == TRUE){
			
		// 	$this->load->view('akses/user/header_user', $data);	
       	// 	$this->load->view('akses/user/form_finished', $data);

		// }else{
		// 	redirect('Home');
		// }
	}

	public function myprofile()
	{
		$data['active1'] = '';
		$data['active2'] = 'active';
		//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();

		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['kementerian'] = $this->Home_model->getKementerian();
		// $data['lpnk'] = $this->Home_model->getNonKementrian();
		// $data['provinsi'] = $this->Home_model->getProvinsi();
		// $data['kota'] = $this->Home_model->getKota();	
		// $data['kabupaten'] = $this->Home_model->getKabupaten();	
		// $data['profil'] = $this->Home_model->getProfilId();

		$this->load->view('akses/user/header_user', $data);		
        $this->load->view('akses/user/profil', $data);
	} 


	// public function updatemyprofil(){

	// 	$cek_pass = $this->Home_model->getProfilId();

	// 	foreach ($cek_pass as $key) {
	// 		$pass = $key->password;
	// 	}

	// 		$myprofil = array(
	// 			'id_user' => $_POST['id_user'],
	// 			'nomor_user' => $_POST['nomor_user'],
	// 			'nama_user' => $_POST['nama_user'],
	// 			'instansi' => $_POST['instansi'],
	// 			'jabatan' => $_POST['jabatan'],
	// 			'telepon' => $_POST['telepon'],
	// 			'email' => $_POST['email'],
	// 			'username' => $_POST['username'],
	// 			'password' => $_POST['password'],
	// 			'password_baru' => $_POST['password_baru']
	// 		);


	// 		if(!empty($_POST['password'])){
	// 			if($pass != md5($_POST['password'])){
	// 				$this->session->set_flashdata('msg','gagal_password');
	// 			}else if(strlen($_POST['password_baru']) < 6){
	// 				$this->session->set_flashdata('msg','newpassword');
	// 			}else{
	// 				$this->Home_model->update_myprofilpass($myprofil);
	// 				$this->session->set_flashdata('msg','sukses');
	// 			}
	// 		}else{
	// 			$this->Home_model->update_myprofil($myprofil);
	// 			$this->session->set_flashdata('msg','sukses');
	// 		}	

	// 	redirect('Home/myprofile');

	// }
}
