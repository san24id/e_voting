<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->library('Pdf');

		$sid = $this->session->userdata("username");

		$this->load->library('session');
 		
 		if ($this->session->userdata('id_role_app') == 2) {
 			
		}else{
			redirect('login/logout', 'refresh');
		}
	}

	public function index()
	{
		$sid = $this->session->userdata("username");
		
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['draft'] = $this->Dashboard_model->getTotalDraft();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['payment'] = $this->Dashboard_model->payment();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/dashboard_csf', $data);
	}

	public function form_sp3($id_payment){

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/payment', $data);
	}

	public function accept(){

		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 2,
			'handled_by' => $_POST['handled_by']
		);

		$this->Dashboard_model->updateaccept($upd);

		redirect('Dashboard');
	}

	public function rejected(){

		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 3,
			'note' => $_POST['note']
		);

		$this->Dashboard_model->updaterejected($upd);

		redirect('Dashboard');
	}

	public function dp()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->getstatuscount();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/list_dp', $data);
	}

	public function ar()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->getstatuscount();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/list_ar', $data);
	}

	public function asr()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->getstatuscount();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/list_asr', $data);
	}

	public function lop()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->getstatuscount();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/list_lop', $data);
	}

	public function op()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->getstatuscount();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/list_op', $data);
	}

	public function dr()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->getstatuscount();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/list_dr', $data);
	}
}
