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
		$data['draftprint'] = $this->Home_model->getDraftPrint();
		$data['draft1'] = $this->Home_model->getDraft();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['outstanding'] = $this->Home_model->getOutstanding();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['submit'] = $this->Home_model->getSubmitted();
		$data['process'] = $this->Home_model->getProcessing();
		$data['verifikasi'] = $this->Home_model->getVerifikasi();
		$data['approval'] = $this->Home_model->getApproval();
		$data['paid'] = $this->Home_model->getPaid();
		$data['upcoming_over'] = $this->Dashboard_model->getUpcomingOverdue();


        $this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/dashboard_approval', $data);
	}

	function periode_dashboard(){
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
		$data['outstanding'] = $this->Home_model->getOutstanding();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['submit'] = $this->Home_model->getSubmitted();
		$data['process'] = $this->Home_model->getProcessing();
		$data['verifikasi'] = $this->Home_model->getVerifikasi();
		$data['approval'] = $this->Home_model->getApproval();
		$data['upcoming_over'] = $this->Dashboard_model->getUpcomingOverdue();
		$data['paid'] = $this->Home_model->getPaid();

		$data['start_date'] = $this->input->post("start_date");
		$data['end_date'] = $this->input->post("end_date");

		$data['payment'] = $this->Dashboard_model->periode2($data['start_date'],$data['end_date']);
		$data['jumlah'] = count($data['payment']);

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
		
		$data['outstan'] = $this->Home_model->getOp();
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

	function periode_approval(){

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

		$data['start_date'] = $this->input->post("start_date");
		$data['end_date'] = $this->input->post("end_date");

		$data['approved'] = $this->Dashboard_model->periode($data['start_date'],$data['end_date']);
		$data['jumlah'] = count($data['approved']);

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/approval', $data);
	}

	public function form_varf($id)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");
		$data['reject'] = $this->Home_model->notifRejected();
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
		$data['reject'] = $this->Home_model->notifRejected();
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
		$data['reject'] = $this->Home_model->notifRejected();
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
		$data['reject'] = $this->Home_model->notifRejected();
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
		$this->Dashboard_model->updatepay($upd[status],$upd[nomor_surat],$upd[handled_by],$upd[rejected_by],$upd[rejected_date],$upd[note]);

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
		$data['wApproval'] = $this->Approval_model->getListWait();
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
		$data['tot_approve'] = $this->Approval_model->getListApproved();

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
		$data['rejectfinance'] = $this->Approval_model->getRejected();
		
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
			'tanggal2' => $_POST['tanggal2'],
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

	public function form_add()
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['bank'] =$this->Home_model->getBank();
		$data['data_vendor'] = $this->Dashboard_model->getDataVendor();
		$data['currency'] = $this->Home_model->getCurrency();

		$this->load->view('akses/approval/header_approval', $data);	
        $this->load->view('akses/approval/form_pengajuan', $data);
	}

	public function form_view($id_payment)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$sid = $this->session->userdata("id_user");

		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['payment'] = $this->Home_model->getPayment($sid);
		
		$this->load->view('akses/approval/header_approval', $data);	
        $this->load->view('akses/approval/form_view', $data);
	}

	public function formfinished($id_payment)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$sid = $this->session->userdata("id_user");

		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['bank'] = $this->Home_model->getBank();
		$data['data_vendor'] = $this->Dashboard_model->getDataVendor();
		$data['currency'] = $this->Home_model->getCurrency();

		$this->load->view('akses/approval/header_approval', $data);	
       	$this->load->view('akses/approval/form_finished', $data);

	}

	public function draftprintdp($id_payment){

		$upd = array(
			'id_payment' => $id_payment,
			'status' => 1
		);

		$this->Dashboard_model->updateprint($upd);

		redirect('Approval/report_dp/'.$id_payment);
	}

	public function draftprint($id_payment){

		$upd = array(
			'id_payment' => $id_payment,
			'status' => 1
		);

		$this->Dashboard_model->updateprint($upd);

		redirect('Approval/report/'.$id_payment);
	}

	public function report($id_payment)	{

		// $this->load->library('pdfgenerator');

		$data['reject'] = $this->Home_model->notifRejected();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['dp'] = $this->Home_model->getVdp();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['divhead'] = $this->Home_model->getDivHead();
		
		// $this->load->view('akses/user/header_user');
		$this->load->view('akses/report/print', $data);

		// $html = $this->load->view('akses/report/print', $data, true);
	 
		// $this->pdfgenerator->generate($html,'Form_SP3');
	}

	public function report_dp($id_payment)	{

		// $this->load->library('pdfgenerator');

		$data['reject'] = $this->Home_model->notifRejected();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['dp'] = $this->Home_model->getVdp();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['divhead'] = $this->Home_model->getDivHead();
		
		// $this->load->view('akses/user/header_user');
		$this->load->view('akses/report/print_dp', $data);

		// $html = $this->load->view('akses/report/print', $data, true);
	 
		// $this->pdfgenerator->generate($html,'Form_SP3');
	}

	public function setuju(){
		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 11
		);

		$this->Dashboard_model->approve($upd);

		redirect('Approval');

	}

	public function submit(){

		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 2,
			'handled_by' => $_POST['handled_by'],
			'submit_date' => $_POST['submit_date']

		);

		$this->Dashboard_model->updatejatahCC($upd);
		$this->Dashboard_model->updateaccept($upd);

		redirect('Approval');
	}

	public function caridatadashboard()
	{
			$profileid=$this->input->post('selsearch');
			$txtsearch=$this->input->post('txtpencarian');
			$data = $this->Dashboard_model->getdatabysearch($profileid,$txtsearch);
			echo json_encode($data);
	}

	public function all_detail_payment($id)
	{
		$sid = $this->session->userdata("id_user");
		$data['dashboard'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';
		
		$data['reject'] = $this->Home_model->notifRejected();


		switch($id){
			
		}
		
		switch ($id) {
		  case "1":
			$data['payment'] = $this->Home_model->getPaymentDetail($sid);
			$this->session->set_userdata('titleHeader','All Payment Request List');
			$this->session->set_userdata('filter','1');
			break;
		  case "2":
			$data['payment'] = $this->Home_model->getDetailOutstanding($sid);
			$this->session->set_userdata('titleHeader','Outstanding Payment Request List');
			$this->session->set_userdata('filter','2');
			break;
		  case "3":
			$data['payment'] = $this->Home_model->getDetailDraft($sid);
			$this->session->set_userdata('titleHeader','Draft Payment Request List');
			$this->session->set_userdata('filter','3');
			break;
		  case "4":
			$data['payment'] = $this->Home_model->getDetailUpcomingOverdue($sid);
			$this->session->set_userdata('titleHeader','Advance Upcoming Overdue List');
			$this->session->set_userdata('filter','4');
			break;
		  case "5":
			$data['payment'] = $this->Home_model->getDetailOverdue($sid);
			$this->session->set_userdata('titleHeader','Advance Overdue List');
			$this->session->set_userdata('filter','5');
			break;
		  case "6":
			$data['creditcard'] = $this->Home_model->getDeatilCreditCard($sid);
			$this->session->set_userdata('titleHeader','Credit Card Corporate List');
			$this->session->set_userdata('filter','6');
			break;
			case "7":
			$data['payment'] = $this->Home_model->getDetailDraftStatus($sid);
			$this->session->set_userdata('titleHeader','Draft List');
			$this->session->set_userdata('filter','7');
			break;
		  case "8":
			$data['payment'] = $this->Home_model->getDetailDraftPrint($sid);
			$this->session->set_userdata('titleHeader','Draft(Print) List');
			$this->session->set_userdata('filter','8');
			break;
		  case "9":
			$data['payment'] = $this->Home_model->getDetailSubmitted($sid);
			$this->session->set_userdata('titleHeader','Submitted List');
			$this->session->set_userdata('filter','9');
			break;
		  case "10":
			$data['payment'] = $this->Home_model->getDetailProcessing($sid);
			$this->session->set_userdata('titleHeader','Processing List');
			$this->session->set_userdata('filter','10');
			break;
		  case "11":
			$data['payment'] = $this->Home_model->getDetailVerified($sid);
			$this->session->set_userdata('titleHeader','Verified List');
			$this->session->set_userdata('filter','11');
			break;
		  case "12":
			$data['payment'] = $this->Home_model->getDetailApproved($sid);
			$this->session->set_userdata('titleHeader','Approved List');
			$this->session->set_userdata('filter','12');
			break;
		  case "13":
			$data['payment'] = $this->Home_model->getDetailPaid($sid);
			$this->session->set_userdata('titleHeader','Paid List');
			$this->session->set_userdata('filter','13');
			break;
		  default:
			$data['payment'] = $this->Home_model->getPayment($sid);
		}

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/view_detail', $data);
	}
}    