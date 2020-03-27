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

	function __construct(){
		parent::__construct();
        
        $this->load->model('Home_model');
        // $this->load->model('Dashboard_model');

        $sid = $this->session->userdata("id_user");
		
        $this->load->library('session');
 		
 		if ($this->session->userdata('id_user')) {

		}else{

        	$this->session->sess_destroy();
			redirect('login', 'refresh');
		}

	}

	public function index()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->getstatuscount();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/dashboard', $data);
	}

	public function my_report()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->getstatuscount();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/my_report', $data);
	}

	public function my_inbox()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['active2'] = '';
		$data['active3'] = 'active';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->getstatuscount();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/my_inbox', $data);
	}

	public function form_add()
	{
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();
		
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		// $data['cn_assesment'] = $this->Home_model->cn_assesment();
		// $data['noass'] = $this->Home_model->getno();

		$this->load->view('akses/user/header_user', $data);	
        $this->load->view('akses/user/form_pengajuan', $data);
	}

	public function addpayment(){
		$add = array(
			
			'id_payment' => $_POST['id_payment'],
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => $_POST['jenis_pembayaran'],
			'nama_user' => $_POST['nama_user'],
			'tanggal' => $_POST['tanggal'],
			'hari' => $_POST['hari'],
			'divisi' => $_POST['divisi'],
			'jabatan' => $_POST['jabatan'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'label3' => $_POST['label3'],
			'label4' => $_POST['label4'],
			'label5' => $_POST['label5'],
			'label6' => $_POST['label6'],
			'label7' => $_POST['label7'],
			'label8' => $_POST['label8'],
			'penerima' => $_POST['penerima'],
			'vendor' => $_POST['vendor'],
			'akun_bank' => $_POST['akun_bank'],
			'no_rekening' => $_POST['no_rekening'],
		);

		// $this->session->set_flashdata('success', 'Berhasil disimpan');
		$this->Home_model->addpayment($add);
			
		redirect('Home');
	}

	public function updatepayment(){
		$upd = array(

			'id_payment' => $_POST['id_payment'],
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => $_POST['jenis_pembayaran'],
			'nama_user' => $_POST['nama_user'],
			'tanggal' => $_POST['tanggal'],
			'hari' => $_POST['hari'],
			'divisi' => $_POST['divisi'],
			'jabatan' => $_POST['jabatan'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'label3' => $_POST['label3'],
			'label4' => $_POST['label4'],
			'label5' => $_POST['label5'],
			'label6' => $_POST['label6'],
			'label7' => $_POST['label7'],
			'label8' => $_POST['label8'],
			'penerima' => $_POST['penerima'],
			'vendor' => $_POST['vendor'],
			'akun_bank' => $_POST['akun_bank'],
			'no_rekening' => $_POST['no_rekening'],
		);

		$this->Home_model->updatepayment($upd);

		redirect('Home');
	}

	public function deletepayment(){

		$this->Home_model->deletepayment($_POST['id_payment']);

		redirect('Home');

	}

	public function form_edit($idp)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';
		
		$sid = $this->session->userdata("id_user");

		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['kementerian'] = $this->Home_model->getKementerian();
		// $data['lpnk'] = $this->Home_model->getNonKementrian();
		// $data['provinsi'] = $this->Home_model->getProvinsi();
		// $data['kota'] = $this->Home_model->getKota();	
		// $data['kabupaten'] = $this->Home_model->getKabupaten();	
		// $data['kotakabu'] = $this->Home_model->getKotaKabu();
		// $data['assesment'] = $this->Home_model->assesment();
		// $data['cn_assesment'] = $this->Home_model->cn_assesment();	
		// $data['profil'] = $this->Home_model->getIdProfilProjek($idp);
		// $data['profilus'] = $this->Home_model->getIdProfilProjekUser($idp, $sid);
		// $data['skor'] = $this->Home_model->getskor($idp);
		// $data['noass'] = $this->Home_model->gett($idp);

		// if($this->Home_model->getIdProfilProjekUser($idp, $sid) == TRUE){
			
		// 	$this->load->view('akses/user/header_user', $data);	
        // 	$this->load->view('akses/user/form_pengajuan_edit', $data);

		// }else{
		// 	redirect('Home');
		// }	
	}

	public function formfinished($id_payment)
	{
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$sid = $this->session->userdata("id_user");

		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);	
       	$this->load->view('akses/user/form_finished', $data);

		// if($this->Home_model->getIdProfilProjekUser($idp, $sid) == TRUE){
			
		// 	$this->load->view('akses/user/header_user', $data);	
       	// 	$this->load->view('akses/user/form_finished', $data);

		// }else{
		// 	redirect('Home');
		// }
	}

	// public function myprofile()
	// {
	// 	$data['active1'] = '';
	// 	$data['active2'] = 'active';
	// 	//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();

	// 	// $data['sektor'] = $this->Home_model->getSektor();
	// 	// $data['kementerian'] = $this->Home_model->getKementerian();
	// 	// $data['lpnk'] = $this->Home_model->getNonKementrian();
	// 	// $data['provinsi'] = $this->Home_model->getProvinsi();
	// 	// $data['kota'] = $this->Home_model->getKota();	
	// 	// $data['kabupaten'] = $this->Home_model->getKabupaten();	
	// 	// $data['profil'] = $this->Home_model->getProfilId();

	// 	$this->load->view('akses/user/header_user', $data);		
    //     $this->load->view('akses/user/profil', $data);
	// } 

	// public function submitted()
	// {
	// 	$data['active1'] = '';
	// 	$data['active2'] = 'active';
	// 	$data['active3'] = '';
	// 	$data['active4'] = '';
	// 	//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();
	// 	$this->load->view('akses/user/header_user');	
    //     $this->load->view('akses/user/submitted_user', $data);
	// }

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
