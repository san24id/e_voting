<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tri extends CI_Controller {
   
    function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->model('Home_model');
		$this->load->model('Tri_model');

		$this->load->library('Pdf');

		$sid = $this->session->userdata("username");

		$this->load->library('session');
 		
		if ($this->session->userdata('id_role_app') == 5) {
 			
		}else{
			redirect('login/logout', 'refresh');
		}
    }
    
    public function index(){

		$sid = $this->session->userdata("username");
		
		$data['index'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['apayment'] = $this->Dashboard_model->payment();
		$data['mytask'] = $this->Dashboard_model->getmyTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['submit'] = $this->Home_model->getSubmitted();
		$data['process'] = $this->Home_model->getProcessing();
		$data['verifikasi'] = $this->Home_model->getVerifikasi();
		$data['approval'] = $this->Home_model->getApproval();
		$data['paid'] = $this->Home_model->getPaid();

        $this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/dashboard_tri', $data);
	}

	public function dp()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['directpayment'] 	= $this->Home_model->getVdp();	
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/list_dp', $data);
	}

	public function ar()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['advancerequest'] = $this->Home_model->getVar();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/list_ar', $data);
	}

	public function asr()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['settlement'] = $this->Home_model->getVasr();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/list_asr', $data);
	}

	public function lop()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/list_lop', $data);
	}

	public function op()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';
		
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/list_op', $data);
	}

	public function dr()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';
		
		$data['draftreq'] = $this->Home_model->getVdraftrequest();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/list_dr', $data);
	}
	
	public function listPayment(){

		$data['active1'] = '';
		$data['l_payment'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Tri_model->getList();
		$data['wPaid'] = $this->Dashboard_model->getWaitPaid();
		$data['Paid'] = $this->Dashboard_model->getPaid();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/payment', $data);

	}

	public function wfp(){

		$data['active1'] = '';
		$data['wfp'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Tri_model->getListwfp();
		$data['wPaid'] = $this->Dashboard_model->getWaitPaid();
		$data['Paid'] = $this->Dashboard_model->getPaid();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/wfp', $data);

	}

	public function paidList(){

		$data['active1'] = '';
		$data['l_paid'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Tri_model->getpaidList();
		$data['wPaid'] = $this->Dashboard_model->getWaitPaid();
		$data['Paid'] = $this->Dashboard_model->getPaid();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/paidList', $data);

	}
	
	public function my_inbox()
	{
		$sid = $this->session->userdata("username");

		$data['active1'] = '';
		$data['active2'] = '';
		$data['inbox'] = 'active';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['rejected'] = $this->Home_model->getRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/my_inbox', $data);
	}

	public function form_add()
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		// $data['cn_assesment'] = $this->Home_model->cn_assesment();
		// $data['noass'] = $this->Home_model->getno();

		$this->load->view('akses/tri/header_tri', $data);	
        $this->load->view('akses/tri/form_pengajuan', $data);
	}

	public function addpayment(){
		$c_jp = count($_POST['jenis_pembayaran']);
		$jenis_pembayaran = "";
		for($i=0; $i<=$c_jp; $i++){
			$jenis_pembayaran .= $_POST['jenis_pembayaran'][$i].";";
		}

		$c_label4 = count($_POST['label4']);
		$label4 = "";
		for($i=0; $i<=$c_jp; $i++){
			$label4 .= $_POST['label4'][$i].";";
		}

		// echo $jenis_pembayaran;
		// var_dump(count($_POST['jenis_pembayaran']));exit;
		$add = array(
			
			'id_payment' => $_POST['id_payment'],
			'status' => 1,
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => $jenis_pembayaran,
			'display_name' => $_POST['display_name'],
			'tanggal' => $_POST['tanggal'],
			'currency' => $_POST['currency'],
			'division_id' => $_POST['division_id'],
			'jabatan' => $_POST['jabatan'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'label3' => $_POST['label3'],
			'label4' => $label4,
			'label5' => $_POST['label5'],
			'label6' => $_POST['label6'],
			'label7' => $_POST['label7'],
			'label8' => $_POST['label8'],
			'label9' => $_POST['label9'],
			'penerima' => $_POST['penerima'],
			'vendor' => $_POST['vendor'],
			'akun_bank' => $_POST['akun_bank'],
			'no_rekening' => $_POST['no_rekening'],
		);

		$this->session->set_flashdata('msg', 'Berhasil ditambahkan!');	
		$this->Home_model->addpayment($add);
			
		redirect('Tri');
	}

	public function updatepayment(){
		$c_jp = count($_POST['jenis_pembayaran']);
		$jenis_pembayaran = "";
		for($i=0; $i<=$c_jp; $i++){
			$jenis_pembayaran .= $_POST['jenis_pembayaran'][$i].";";
		}

		$c_label4 = count($_POST['label4']);
		$label4 = "";
		for($i=0; $i<=$c_jp; $i++){
			$label4 .= $_POST['label4'][$i].";";
		}
		// echo $label4;
		// var_dump(count($_POST['label$label4']));exit;
		$upd = array(

			'id_payment' => $_POST['id_payment'],
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => $jenis_pembayaran,
			'display_name' => $_POST['display_name'],
			'tanggal' => $_POST['tanggal'],
			'currency' => $_POST['currency'],
			'division_id' => $_POST['division_id'],
			'jabatan' => $_POST['jabatan'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'label3' => $_POST['label3'],
			'label4' => $label4,
			'label5' => $_POST['label5'],
			'label6' => $_POST['label6'],
			'label7' => $_POST['label7'],
			'label8' => $_POST['label8'],
			'label9' => $_POST['label9'],
			'penerima' => $_POST['penerima'],
			'vendor' => $_POST['vendor'],
			'akun_bank' => $_POST['akun_bank'],
			'no_rekening' => $_POST['no_rekening'],
		);
		
		$this->session->set_flashdata('msg', 'Berhasil disimpan!');
		$this->Home_model->updatepayment($upd);

		redirect('Tri');
	}

	public function deletepayment(){

		$this->Home_model->deletepayment($_POST['id_payment']);

		redirect('Tri');

	}
}    