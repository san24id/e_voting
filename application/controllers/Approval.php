<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller {
   
    function __construct(){
		parent::__construct();
		$this->load->model('Approval_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Home_model');
		$this->load->library('Pdf');

		$sid = $this->session->userdata("id_user");
		$usr = $this->session->userdata("username");

		$this->load->library('session');
 		
		if ($this->session->userdata('id_role_app') == 4) {
 			
		}else{
			redirect('login/logout', 'refresh');
		}
    }
    
    public function index(){

		$sid = $this->session->userdata("id_user");
		$usr = $this->session->userdata("username");

		$data['index'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['submit'] = $this->Home_model->getSubmitted();
		$data['process'] = $this->Home_model->getProcessing();
		$data['verifikasi'] = $this->Home_model->getVerifikasi();
		$data['approval'] = $this->Home_model->getApproval();
		$data['paid'] = $this->Home_model->getPaid();

        $this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/dashboard_approval', $data);
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

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_dp', $data);
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

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_ar', $data);
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

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_asr', $data);
	}

	public function lop()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_lop', $data);
	}

	public function op()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';
		
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_op', $data);
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

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_dr', $data);
	}
	
	public function listApproval(){

		$data['active1'] = '';
		$data['l_approval'] = 'active';
		$data['inbox'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['approved'] = $this->Approval_model->getList();
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['tot_approved'] = $this->Approval_model->TotalApproved();
		$data['wApproval'] = $this->Approval_model->getWaitApproval();

        $this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/approval', $data);
	}

	public function form_varf($id)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/form_varf', $data);

	}

	public function form_vasf($id)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/form_vasf', $data);

	}

	public function form_vprf($id)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/form_vprf', $data);

	}

	public function form_vcrf($id)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/form_vcrf', $data);

	}

	public function approve(){

		$upd = array(
			'id' => $_POST['id'],
			'status' => $_POST['status'],
			'handled_by' => $_POST['handled_by'],
			'nomor_surat' => $_POST['nomor_surat']

		);

		$this->Approval_model->updateapprove($upd);
		$this->Dashboard_model->updatepay($upd[status],$upd[nomor_surat],$upd[handled_by]);

		redirect('Approval/listApproval');
	}

	public function rejected(){

		$upd = array(
			
			'id' => $_POST['id'],
			'status' => $_POST['status'],
			'nomor_surat' => $_POST['nomor_surat'],
			'rejected_by' => $_POST['rejected_by'],
			'handled_by' => $_POST['handled_by'],
			'rejected_date' => $_POST['rejected_date'],
			'note' => $_POST['note']

		);

		$this->Dashboard_model->updpay($upd);
		$this->Dashboard_model->rejectapf($upd[status],$upd[nomor_surat],$upd[handled_by],$upd[rejected_by],$upd[rejected_date],$upd[note]);

		redirect('Approval/listApproval');
	}

	public function wfa(){

		$data['active1'] = '';
		$data['wfa'] = 'active';
		$data['inbox'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();

        $this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/wfa', $data);
	}

	public function approvedList(){

		$data['active1'] = '';
		$data['approved'] = 'active';
		$data['inbox'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();

        $this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/approvedList', $data);
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

		
        $this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/my_inbox', $data);
	}

	public function addpayment(){
		$c_jp = count($_POST['jenis_pembayaran']);
		$jenis_pembayaran = "";
		for($i=0; $i<=$c_jp; $i++){
			$jenis_pembayaran .= $_POST['jenis_pembayaran'][$i].";";
		}

		$c_label4 = count($_POST['label4']);
		$label4 = "";
		for($l=0; $l<=$c_label4; $l++){
			$label4 .= $_POST['label4'][$l].";";
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
			
		redirect('Approval');
	}

	public function updatepayment(){
		$c_jp = count($_POST['jenis_pembayaran']);
		$jenis_pembayaran = "";
		for($i=0; $i<=$c_jp; $i++){
			$jenis_pembayaran .= $_POST['jenis_pembayaran'][$i].";";
		}

		$c_label4 = count($_POST['label4']);
		$label4 = "";
		for($l=0; $l<=$c_label4; $l++){
			$label4 .= $_POST['label4'][$l].";";
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

		redirect('Approval');
	}

	public function deletepayment(){

		$this->Home_model->deletepayment($_POST['id_payment']);

		redirect('Approval');

	}
}    