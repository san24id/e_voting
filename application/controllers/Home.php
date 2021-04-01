<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
		use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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

        $sid = $this->session->userdata("refid");
		
        $this->load->library('session');
 		
 		if ($this->session->userdata('refid')) {

		}else{

        	$this->session->sess_destroy();
			redirect('login', 'refresh');
		}
		
	}

	public function index()
	{
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$this->session->set_userdata('currentview',$actual_link);
		
		$s = '01-01-'.Date('Y');
		$date = strtotime($s);
		$data['start_date']= date('d-m-Y', $date);
		$data['end_date'] = date('d-m-Y');
		
		$sid = $this->session->userdata("id_user");	
				
		$tanggalHariIni = new DateTime();
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $data['payment'] = $this->Home_model->getPayment($sid);
		// $data['surat'] = $this->Home_model->buat_kode();
		

		$this->load->view('user/header_user', $data);
		$this->load->view('user/dashboard_user', $data);
	}

	public function updquestion(){
		// $id_apa = $_POST['id_question'];

		$upd = array(
			'id_question' => $_POST['id_question'],
			'jenis' => $_POST['jenis'],
			'question' => $_POST['question'],
			'isactive' =>  $_POST['isactive']
		);
		
		$this->Home_model->updquestion($upd);

		redirect(site_url('Home/ldp'));

	}

	public function change_stats($id_question){
		// $id_apa = $_POST['id_question'];

		$upd = array(
			'id_question' => $id_question,
			'isactive' => 0
		);
		
		$this->Home_model->updatestats($upd);

		redirect(site_url('Home/ldp'));

	}

	public function ldp()
	{
		$sid = $this->session->userdata("refid");

		$data['active1'] = '';
		$data['dp'] = 'active';
		$data['active3'] = '';

		// $data['directpayment'] 	= $this->Home_model->getVldp();	
		// $data['notif_approval'] = $this->Dashboard_model->notifApproval();
		// $data['reject'] = $this->Home_model->notifRejected();
		// $data['payment'] = $this->Home_model->getPayment($sid);
		// $data['surat'] = $this->Home_model->buat_kode();
		$data['question'] = $this->Home_model->getList();

		$this->load->view('user/header_user', $data);
		$this->load->view('user/list_question', $data);
	}

	public function lar()
	{
		$sid = $this->session->userdata("refid");

		$data['active1'] = '';
		$data['lar'] = 'active';
		$data['active3'] = '';

		// $data['directpayment'] 	= $this->Home_model->getVldp();	
		// $data['notif_approval'] = $this->Dashboard_model->notifApproval();
		// $data['reject'] = $this->Home_model->notifRejected();
		// $data['payment'] = $this->Home_model->getPayment($sid);
		// $data['surat'] = $this->Home_model->buat_kode();
		$data['attandance'] = $this->Home_model->getListAttandance();

		$this->load->view('user/header_user', $data);
		$this->load->view('user/list_attandance', $data);
	}

	public function lcr()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		// $data['notif_approval'] = $this->Dashboard_model->notifApproval();
		// $data['notif_task'] = $this->Dashboard_model->notifTask();
		// $data['cashreceived'] = $this->Home_model->getVlcr();
		// $data['reject'] = $this->Home_model->notifRejected();
		// $data['payment'] = $this->Home_model->getPayment($sid);
		// $data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('user/header_user', $data);
		$this->load->view('user/list_result', $data);
	}

	public function addvoter(){
		$add = array(

			'nama' => $_POST['nama'],
			'email' => $_POST['email'],
			'pin' =>  $_POST['pin'],
			'choice' =>  $_POST['choice'],
			'id_question' =>  $_POST['id_question'],
		);

		$this->Home_model->addvoter($add);

		redirect('e_vote');
	
	}

	function addquestion(){
		$add = array(

			'jenis' => $_POST['jenis'],
			'question' => $_POST['question'],
			'isactive' =>  $_POST['isactive']
		);

		$this->Home_model->addquestion($add);
		redirect('Home/ldp');
	}

	public function edit_form($id_question)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$sid = $this->session->userdata("refid");
		
		$data['question'] = $this->Home_model->getform($id_question);
		
		$this->load->view('user/header_user', $data);	
       	$this->load->view('user/edit_form', $data);

	}

}
