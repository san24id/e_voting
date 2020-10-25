<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
		use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$this->session->set_userdata('currentview',$actual_link);
		
		$s = '01-01-'.Date('Y');
		$date = strtotime($s);
		$data['start_date']= date('d-m-Y', $date);
		$data['end_date'] = date('d-m-Y');
		
		$data['active1'] = '';
		$data['l_approval'] = 'active';
		$data['inbox'] = '';

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['approved'] = $this->Approval_model->getList();
		$data['pembayaran'] = $this->Approval_model->getVPayment();
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

		$data['start_date'] = date('Y-m-d', strtotime($this->input->post("start_date")));
		$data['end_date'] = date('Y-m-d', strtotime($this->input->post("end_date")));
		
		$data['approved'] = $this->Approval_model->periode($data['start_date'],$data['end_date']);
		$data['processing'] = $this->Dashboard_model->processingPeriode($data['start_date'],$data['end_date']);
		$data['tot_pay_req'] = $this->Dashboard_model->getTotalPeriode($data['start_date'],$data['end_date']);
		$data['tot_approved'] = $this->Approval_model->TotalApprovedPeriode($data['start_date'],$data['end_date']);
		$data['wApproval'] = $this->Approval_model->getWaitApprovalPeriode($data['start_date'],$data['end_date']);

		$data['pembayaran'] = $this->Approval_model->getVPaymentPeriode($data['start_date'],$data['end_date']);

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();

		$data['jumlah'] = count($data['approved']);
		$data['jumlahprocessing'] = count($data['processing']);
		$data['jumlahtotalpayment'] = count($data['tot_pay_req']);
		$data['jumlahtot_approved'] = count($data['tot_approved']);
		$data['jumlahwait_approval'] = count($data['wApproval']);
		$data['jumlahpembayaran'] = count($data['pembayaran']);

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/approval', $data);
	}
    
    public function my_dashboard(){
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$this->session->set_userdata('currentview',$actual_link);
		
		$s = '01-01-'.Date('Y');
		$date = strtotime($s);
		$data['start_date']= date('d-m-Y', $date);
		$data['end_date'] = date('d-m-Y');
		
		$sid = $this->session->userdata("id_user");	
				
		$tanggalHariIni = new DateTime();
		$data['index'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['draftprint'] = $this->Home_model->getDraftPrint();
		$data['draft1'] = $this->Home_model->getDraft();
		$data['outstanding'] = $this->Home_model->getOutstanding();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['paymentAll'] = $this->Approval_model->getPaymentAll();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['submit'] = $this->Home_model->getSubmitted();
		$data['process'] = $this->Home_model->getProcessing();
		$data['verifikasi'] = $this->Home_model->getVerifikasi();
		$data['approval'] = $this->Home_model->getApproval();
		$data['paid'] = $this->Home_model->getPaid();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['upcoming_over'] = $this->Dashboard_model->getUpcomingOverdue();
		$data['credit_card'] = $this->Home_model->CreditCard();


        $this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/dashboard_approval', $data);
	}

	function periode_dashboard(){
		$sid = $this->session->userdata("id_user");
		$usr = $this->session->userdata("username");

		$data['index'] = 'active';
		$data['active3'] = '';

		$data['start_date'] = date('Y-m-d', strtotime($this->input->post("start_date")));
		$data['end_date'] = date('Y-m-d', strtotime($this->input->post("end_date")));

		$data['payment'] = $this->Dashboard_model->periode2($data['start_date'],$data['end_date']);
		$data['draft'] = $this->Home_model->getTotalDraftPeriode($data['start_date'],$data['end_date']);
		$data['tot_pay_req'] = $this->Home_model->getTotalPeriode($data['start_date'],$data['end_date']);
		$data['submit'] = $this->Home_model->getSubmitted($data['start_date'],$data['end_date']);
		$data['outstanding'] = $this->Home_model->getOutstandingPeriode($data['start_date'],$data['end_date']);
		$data['upcoming_over'] = $this->Dashboard_model->getUpcomingOverduePeriode($data['start_date'],$data['end_date']);
		$data['draftprint'] = $this->Home_model->getDraftPrintPeriode($data['start_date'],$data['end_date']);
		$data['draft1'] = $this->Home_model->getDraftPeriode($data['start_date'],$data['end_date']);
		$data['process'] = $this->Home_model->getProcessingPeriode($data['start_date'],$data['end_date']);
		$data['verifikasi'] = $this->Home_model->getVerifikasiPeriode($data['start_date'],$data['end_date']);
		$data['approval'] = $this->Home_model->getApprovalPeriode($data['start_date'],$data['end_date']);
		$data['paid'] = $this->Home_model->getPaidPeriode($data['start_date'],$data['end_date']);
		
		$data['pembayaran'] = $this->Home_model->getVPaymentPeriode($data['start_date'],$data['end_date']);

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['dp'] = $this->Home_model->getVdp();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['credit_card'] = $this->Home_model->CreditCard();
		
		$data['jumlah'] = count($data['payment']);
		$data['jumlahdraft'] = count($data['draft']);
		$data['jumlahtotalpayment'] = count($data['tot_pay_req']);
		$data['jumlahpembayaran'] = count($data['pembayaran']);
		$data['jumlahsubmit'] = count($data['submit']);
		$data['jumlahoutstanding'] = count($data['outstanding']);
		$data['jumlahupcoming_over'] = count($data['upcoming_over']);
		$data['jumlahdrafprint'] = count($data['draftprint']);
		$data['jumlahdraft'] = count($data['draft1']);
		$data['jumlahprocess'] = count($data['process']);
		$data['jumlahverifikasi'] = count($data['verifikasi']);
		$data['jumlahapproval'] = count($data['approval']);
		$data['jumlahpaid'] = count($data['paid']);

        $this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/dashboard_approval', $data);
	}

	public function ldp()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['directpayment'] 	= $this->Home_model->getVldp();	
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_dp', $data);
	}

	public function dp($start_date,$end_date)
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['directpayment'] 	= $this->Home_model->getVdp($start_date,$end_date);	
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_dp', $data);
	}

	public function lcr()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['cashreceived'] = $this->Home_model->getVlcr();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_cr', $data);
	}

	public function cr($start_date,$end_date)
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['cashreceived'] = $this->Home_model->getVcr($start_date,$end_date);
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_cr', $data);
	}

	public function wait_for_approval(){

		$data['active1'] = '';
		$data['active2'] = '';
		$data['waiting_approval'] = 'active';
		$data['active4'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);		
		$data['getApprovalDivHead'] = $this->Dashboard_model->getApprovalDivHead();
		
		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/wait_approval', $data);
	}

	public function lar()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['advancerequest'] = $this->Home_model->getVlar();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_ar', $data);
	}

	public function ar($start_date,$end_date)
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['advancerequest'] = $this->Home_model->getVar($start_date,$end_date);
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_ar', $data);
	}
	
	public function lasr()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['settlement'] = $this->Home_model->getVlasr();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_asr', $data);
	}

	public function asr($start_date,$end_date)
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['settlement'] = $this->Home_model->getVasr($start_date,$end_date);
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
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

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
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
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
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
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_dr', $data);
	}

	public function exportdashboard()
	{
		$data['dashboard'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['draftprint'] = $this->Home_model->getDraftPrint();
		$data['draft1'] = $this->Home_model->getDraft();
		$data['outstanding'] = $this->Home_model->getOutstanding();
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
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['upcoming_over'] = $this->Dashboard_model->getUpcomingOverdue();
		$data['credit_card'] = $this->Home_model->CreditCard();
		
		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/data_export', $data);

	}

	function export_ar(){
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['advancerequest'] = $this->Home_model->getVlar();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/export_ar', $data);

	}

	function export_asr(){
		
		$data['settlement'] = $this->Home_model->getVlasr();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/export_asr', $data);

	}

	function export_dp(){
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['directpayment'] 	= $this->Home_model->getVldp();	
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/export_dp', $data);

	}

	function export_dr(){
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['draftreq'] = $this->Home_model->getVdraftrequest();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/export_dr', $data);

	}

	function export_op(){
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';
		
		$data['outstan'] = $this->Home_model->getOp();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/export_op', $data);

	}

	function export_cr(){
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['cashreceived'] = $this->Home_model->getVlcr();
		// var_dump($data['cashreceived']);exit;
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/export_cr', $data);

	}	

	public function form_varf($id)
	{
		$data['l_approval'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/form_varf', $data);

	}

	public function form_vasf($id)
	{
		$data['l_approval'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");
		$data['reject'] = $this->Home_model->notifRejected();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/form_vasf', $data);

	}

	public function form_vprf($id)
	{
		$data['l_approval'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");
		$data['reject'] = $this->Home_model->notifRejected();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/form_vprf', $data);

	}

	public function form_vcrf($id)
	{
		$data['l_approval'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
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

		redirect('Approval/wfa');
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

		redirect('Approval/wfa');
	}

	public function wfa(){

		$data['index'] = '';
		$data['wfa'] = 'active';
		$data['inbox'] = '';

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
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

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
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

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['rejected'] = $this->Home_model->getRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['rejectfinance'] = $this->Approval_model->getRejected();
		
        $this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/my_inbox', $data);
	}

	public function addpayment(){
		/*$c_jp = count($_POST['jenis_pembayaran']);
		$jenis_pembayaran = "";
		for($i=0; $i<=$c_jp; $i++){
			$jenis_pembayaran .= $_POST['jenis_pembayaran'][$i].";";
		}*/
		$jenis_pembayaran = $_POST['jns_pembayaran'];
		$c_label4 = count($_POST['label4']);
		$label4 = "";
		for($l=0; $l<=$c_label4; $l++){
			$label4 .= $_POST['label4'][$l].";";
		}
		
		// echo $jenis_pembayaran;
		// var_dump(count($_POST['jenis_pembayaran']));exit;
		$add = array(
			
			//'id_payment' => $_POST['id_payment'],
			'status' => 0,
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => $_POST['jns_pembayaran'],
			'display_name' => $_POST['display_name'],
			'tanggal' => $_POST['tanggal'],
			'tanggal2' => $_POST['tanggal2'],
			'currency' => $_POST['currency'],
			'currency2' => $_POST['currency2'],
			'currency3' => $_POST['currency3'],
			'currency4' => $_POST['currency4'],
			'currency5' => $_POST['currency5'],
			'currency6' => $_POST['currency6'],
			'currency7' => $_POST['currency7'],
			'currency8' => $_POST['currency8'],
			'currency9' => $_POST['currency9'],
			'currency10' => $_POST['currency10'],
			'currency11' => $_POST['currency11'],
			'currency12' => $_POST['currency12'],
			'division_id' => $_POST['division_id'],
			'jabatan' => $_POST['jabatan'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'jumlah2' => $_POST['jumlah2'],
			'jumlah3' => $_POST['jumlah3'],
			'label3' => $_POST['label3'],
			'label4' => $label4,
			'label5' => $_POST['label5'],
			'label6' => isset($_POST['label6']),
			'label7' => $_POST['label7'],
			'label8' => $_POST['label8'],
			'label9' => $_POST['label9'],
			'label10' => $_POST['label10'],
			'label11' => $_POST['label11'],
			'label12' => $_POST['label12'],
			'label12' => $_POST['label12'],
			'label13' => $_POST['label13'],
			'label14' => $_POST['label14'],
			'label15' => $_POST['label15'],
			'penerima' => $_POST['penerima'],
			'vendor' => $_POST['vendor'],
			'akun_bank' => $_POST['akun_bank'],
			'no_rekening' => $_POST['no_rekening'],
			'lainnya1' => $_POST['lainnya1'],
			'lainnya2' => $_POST['lainnya2']
		);

		//$this->session->set_flashdata('msg', 'Berhasil ditambahkan!');	
		//$this->Home_model->addpayment($add);
		
		//$insert = $this->Home_model->saveaddpayment($add);
		
		$strcounter=intval($_POST['txtcountervendor']);
		$id =$insert;
		//$this->Dashboard_model->delete_vendorpayment($id);
		for($i=0; $i<$strcounter; $i++){
			$nominal=preg_replace("/[^0-9]/", "", $_POST['nominalvendor'][$i] );
			//if($nominal != ""){
				$data = array(
						'id_payment' => $id,
						'kode_vendor' => $_POST['kodevendor'][$i],
						'v_bank' => $_POST['bankvendor'][$i],
						'v_account' => $_POST['rekeningvendor'][$i],
						'v_currency' => $_POST['currencyvendor'][$i],
						'v_nominal' => number_format($nominal,0,",",".")
					);
							
				$insert = $this->Dashboard_model->vendorpayment_add($data);
			//}
		}
		//echo json_encode(array("status" => TRUE));
		echo json_encode($insert);
			
		// redirect('Dashboard');
		//echo json_encode(array("status" => TRUE));
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
		$id_apa = $_POST['id_payment'];
		$upd = array(

			'id_payment' => $_POST['id_payment'],
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => $jenis_pembayaran,
			'display_name' => $_POST['display_name'],
			'tanggal' => $_POST['tanggal'],
			'currency' => $_POST['currency'],
			'currency2' => $_POST['currency2'],
			'currency3' => $_POST['currency3'],
			'currency4' => $_POST['currency4'],
			'currency5' => $_POST['currency5'],
			'currency6' => $_POST['currency6'],
			'currency7' => $_POST['currency7'],
			'currency8' => $_POST['currency8'],
			'currency9' => $_POST['currency9'],
			'currency10' => $_POST['currency10'],
			'currency11' => $_POST['currency11'],
			'currency12' => $_POST['currency12'],
			'division_id' => $_POST['division_id'],
			'jabatan' => $_POST['jabatan'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'jumlah2' => $_POST['jumlah2'],
			'jumlah3' => $_POST['jumlah3'],
			'label3' => $_POST['label3'],
			'label4' => $label4,
			'label5' => $_POST['label5'],
			'label6' => $_POST['label6'],
			'label7' => $_POST['label7'],
			'label8' => $_POST['label8'],
			'label9' => $_POST['label9'],
			'label10' => $_POST['label10'],
			'label11' => $_POST['label11'],
			'label12' => $_POST['label12'],
			'label12' => $_POST['label12'],
			'label13' => $_POST['label13'],
			'label14' => $_POST['label14'],
			'label15' => $_POST['label15'],
			'penerima' => $_POST['penerima'],
			'vendor' => $_POST['vendor'],
			'akun_bank' => $_POST['akun_bank'],
			'no_rekening' => $_POST['no_rekening'],
			'lainnya1' => $_POST['lainnya1'],
			'lainnya2' => $_POST['lainnya2']
		);
		
		$this->session->set_flashdata('msg', 'Berhasil disimpan!');
		$this->Home_model->updatepayment($upd);

		redirect(site_url('Approval/formfinished/'.$id_apa));
		// echo json_encode(array("status" => TRUE));

	}

	public function deletepayment(){

		$this->Home_model->deletepayment($_POST['id_payment']);

		redirect('Approval');

	}

	public function form_add()
	{
		$dvs = $this->session->userdata('division_id'); 
		$data['index'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['getID'] = $this->Home_model->getIdPayment();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = "----/".$dvs."/SPPP/".date('my'); //$this->Home_model->buat_kode();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['bank'] =$this->Home_model->getBank();
		$data['data_vendor'] = $this->Dashboard_model->getDataVendor();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['getdatavendor'] = $this->Dashboard_model->getDataVendorByPayment('0');
		$data['getlistarf'] = $this->Home_model->getARFPaid();
		// $data['getlistarf'] = $this->Dashboard_model->getlistarfpaid();
		
		$this->load->view('akses/approval/header_approval', $data);	
        $this->load->view('akses/approval/form_pengajuan', $data);
	}

	public function form_view($id_payment)
	{
		$data['index'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$sid = $this->session->userdata("id_user");

		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['divhead'] = $this->Home_model->getDivHead();		
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['data_vendor'] = $this->Dashboard_model->getDataVendor();
		$data['getdatavendor'] = $this->Dashboard_model->getDataVendorByPayment($id_payment);
		
		$this->load->view('akses/approval/header_approval', $data);	
        $this->load->view('akses/approval/form_view', $data);
	}

	public function formfinished($id_payment)
	{
		$data['index'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$sid = $this->session->userdata("id_user");

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['bank'] = $this->Home_model->getBank();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['data_vendor'] = $this->Dashboard_model->getDataVendor();
		$data['getdatavendor'] = $this->Dashboard_model->getDataVendorByPayment($id_payment);
		$data['getlistarf'] = $this->Home_model->getARFPaid();
		// $data['getlistarf'] = $this->Dashboard_model->getlistarfpaid();

		$this->load->view('akses/approval/header_approval', $data);	
       	$this->load->view('akses/approval/form_finished', $data);

	}

	public function draftsent($id_payment){
		$id_apa = $_POST['id_payment'];
		
		$nosurat = $this->Home_model->buat_kode();
		$upd = array(
			'id_payment' => $id_payment,
			'nomor_surat' => $nosurat,
			'status' => 1
		);
		
		$this->Dashboard_model->updateprint($upd);

		redirect(site_url('Approval/form_view/'.$id_apa));
	}

	public function draftsent_back($id_payment){
		$id_apa = $_POST['id_payment'];
		$rejected = "";
		$upd = array(
			'id_payment' => $id_payment,
			'status' => 1,
			'rejected_by' => $rejected
		);

		$this->Dashboard_model->updateprintsendback($upd);

		redirect(site_url('Approval/form_view/'.$id_apa));
	}

	// public function draftprintdp($id_payment){

	// 	$upd = array(
	// 		'id_payment' => $id_payment,
	// 		'status' => 99
	// 	);

	// 	$this->Dashboard_model->updateprint($upd);

	// 	redirect('Approval/report_dp/'.$id_payment);
	// }

	// public function draftprint($id_payment){

	// 	$upd = array(
	// 		'id_payment' => $id_payment,
	// 		'status' => 99
	// 	);

	// 	$this->Dashboard_model->updateprint($upd);

	// 	redirect('Approval/report/'.$id_payment);
	// }

	public function report($id_payment)	{

		// $this->load->library('pdfgenerator');

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
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

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
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
			'status' => 2,
			'handled_by' => $_POST['handled_by'],
			'submit_date' => $_POST['submit_date']
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
		$activests='';
		
		$getactive=$this->Dashboard_model->getApprovalActivated();
		foreach ($getactive->result() as $geactive) {
			$activests = $geactive->activate;
		}
		
		$sts='';
		if($activests=='On'){
			$sts='11';
		}else{
			$sts='1';
		}
		
		$this->Dashboard_model->updatejatahCC($upd,$sts);
		$this->Dashboard_model->updateaccept($upd);

		redirect('Approval');
	}

	public function caridataLOP()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			$jnspembayaran=$this->input->post('seljnspembayaran');
			//$txtsearch=$this->input->post('txtpencarian');
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Home_model->getdatabyLOP($profileid,$txtsearch);
			echo json_encode($data);
	}


	public function caridataAR()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			// $jnspembayaran=$this->input->post('seljnspembayaran');
			//$txtsearch=$this->input->post('txtpencarian');
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Home_model->getdatabyAR($profileid,$txtsearch);
			echo json_encode($data);
	}

	public function caridataASR()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			// $jnspembayaran=$this->input->post('seljnspembayaran');
			//$txtsearch=$this->input->post('txtpencarian');
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Home_model->getdatabyASR($profileid,$txtsearch);
			echo json_encode($data);
	}

	public function caridataPR()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			// $jnspembayaran=$this->input->post('seljnspembayaran');
			//$txtsearch=$this->input->post('txtpencarian');
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Home_model->getdatabyPR($profileid,$txtsearch);
			echo json_encode($data);
	}

	public function caridataCR()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			// $jnspembayaran=$this->input->post('seljnspembayaran');
			//$txtsearch=$this->input->post('txtpencarian');
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Home_model->getdatabyCR($profileid,$txtsearch);
			echo json_encode($data);
	}

	public function caridataOP()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			$jnspembayaran=$this->input->post('seljnspembayaran');
			//$txtsearch=$this->input->post('txtpencarian');
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Home_model->getdatabysearch($profileid,$txtsearch);
			echo json_encode($data);
	}

	public function caridataDR()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			$jnspembayaran=$this->input->post('seljnspembayaran');
			//$txtsearch=$this->input->post('txtpencarian');
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Home_model->getdatabyDR($profileid,$txtsearch);
			echo json_encode($data);
	}

	public function caridatadashboard()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			$jnspembayaran=$this->input->post('seljnspembayaran');
			//$txtsearch=$this->input->post('txtpencarian');
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Dashboard_model->getdatabysearch($profileid,$txtsearch);
			echo json_encode($data);
	}

	public function all_detail_payment($id,$start_date,$end_date)
	{
		$this->session->set_userdata('statuspayment',$id);
		$sid = $this->session->userdata("id_user");
		$data['dashboard'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
			
		switch ($id) {
		  case "1":
			$data['payment'] = $this->Home_model->getPaymentDetail($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Payment Request List');
			$this->session->set_userdata('filter','1');
			break;
		  case "2":
			$data['payment'] = $this->Home_model->getDetailOutstanding($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Outstanding Payment Request List');
			$this->session->set_userdata('filter','2');
			break;
		  case "3":
			$data['payment'] = $this->Home_model->getDetailDraft($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Draft Payment Request List');
			$this->session->set_userdata('filter','3');
			break;
		  case "4":
			$data['payment'] = $this->Home_model->getDetailUpcomingOverdue($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Advance Upcoming Overdue List');
			$this->session->set_userdata('filter','4');
			break;
		  case "5":
			$data['payment'] = $this->Home_model->getDetailOverdue($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Advance Overdue List');
			$this->session->set_userdata('filter','5');
			break;
		  case "6":
			$data['creditcard'] = $this->Home_model->getDeatilCreditCard($sid);
			$this->session->set_userdata('titleHeader','Credit Card Corporate List');
			$this->session->set_userdata('filter','6');
			break;
			case "7":
			$data['payment'] = $this->Home_model->getDetailDraftStatus($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Draft List');
			$this->session->set_userdata('filter','7');
			break;
		  case "8":
			$data['payment'] = $this->Home_model->getDetailDraftPrint($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Draft(Print) List');
			$this->session->set_userdata('filter','8');
			break;
		  case "9":
			$data['payment'] = $this->Home_model->getDetailSubmitted($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Submitted List');
			$this->session->set_userdata('filter','9');
			break;
		  case "10":
			$data['payment'] = $this->Home_model->getDetailProcessing($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Processing List');
			$this->session->set_userdata('filter','10');
			break;
		  case "11":
			$data['payment'] = $this->Home_model->getDetailVerified($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Verified List');
			$this->session->set_userdata('filter','11');
			break;
		  case "12":
			$data['payment'] = $this->Home_model->getDetailApproved($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Approved List');
			$this->session->set_userdata('filter','12');
			break;
		  case "13":
			$data['payment'] = $this->Home_model->getDetailPaid($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Paid List');
			$this->session->set_userdata('filter','13');
			break;
		  default:
			$data['payment'] = $this->Home_model->getPayment($sid);
		}

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/view_detail', $data);
	}

	public function all_detail_approval($id,$start_date,$end_date)
	{
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$this->session->set_userdata('currentview',$actual_link);
		
		$this->session->set_userdata('statuspayment',$id);
		$sid = $this->session->userdata("id_user");
		$data['l_approval'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';
		
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['approved'] = $this->Approval_model->getList();
		$data['pembayaran'] = $this->Approval_model->getVPayment();
		$data['tot_approved'] = $this->Approval_model->TotalApproved();
		$data['wApproval'] = $this->Approval_model->getWaitApproval();
		
		switch ($id) {
		  case "1":
			$data['approval'] = $this->Approval_model->getMonitoringWaitApproval($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Waiting for Approval');
			$this->session->set_userdata('filter','1');
			break;
		  case "2":
			$data['approval'] = $this->Approval_model->getMonitoringListApproved($sid,$start_date,$end_date);
			$this->session->set_userdata('titleHeader','Approved');
			$this->session->set_userdata('filter','2');
			break;
		  
		  default:
		  	$data['approval'] = $this->Approval_model->getList();
		}

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/view_detail_approval', $data);
	}

	public function saveeditpayment(){
		$jenis_pembayaran = $_POST['jns_pembayaran'];
		$c_label4 = count($_POST['label4']);
		$label4 = "";
		for($l=0; $l<=$c_label4; $l++){
			$label4 .= $_POST['label4'][$l].";";
		}
		
		$stringBuka = explode("/", $_POST['label3']);
		$ganti = $stringBuka[2].'-'.$stringBuka[1].'-'.$stringBuka[0];

		$strcounter=intval($_POST['txtcountervendor']);
		$id = $_POST['id_payment'];
		$this->Dashboard_model->delete_vendorpayment($id);
		for($i=0; $i<$strcounter; $i++){
			$nominal=preg_replace("/[^0-9]/", "", $_POST['nominalvendor'][$i] );
			//if($nominal != ""){
				$data = array(
						'id_payment' => $id,
						'kode_vendor' => $_POST['kodevendor'][$i],
						'v_bank' => $_POST['bankvendor'][$i],
						'v_account' => $_POST['rekeningvendor'][$i],
						'v_nominal' => number_format($nominal,0,",",".")
					);
					
				$insert = $this->Dashboard_model->vendorpayment_add($data);
			//}
		}
		
		for($i=0; $i<1; $i++){
			$kode_vendor = $_POST['kodevendor'][$i];
			$nama_vendor = $_POST['namavendor'][$i];
			$v_bank = $_POST['bankvendor'][$i];
			$v_account = $_POST['rekeningvendor'][$i];
		}

		$add = array(
			'status' => 0,
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => trim($_POST['jns_pembayaran']),
			'display_name' => $_POST['display_name'],
			'tanggal' => $_POST['tanggal'],
			'tanggal2' => $_POST['tanggal2'],
			'currency' => $_POST['currency'],
			'currency2' => $_POST['currency2'],
			'currency3' => $_POST['currency3'],
			'division_id' => $_POST['division_id'],
			'jabatan' => $_POST['jabatan'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'terbilang' => $_POST['terbilang'],
			'terbilang2' => $_POST['terbilang2'],
			'terbilang3' => $_POST['terbilang3'],
			'jumlah2' => $_POST['jumlah2'],
			'jumlah3' => $_POST['jumlah3'],
			'label3' => $ganti,
			'label4' => $label4,
			'label5' => $_POST['label5'],
			'label6' => $_POST['label6'],
			'label7' => $_POST['label7'],
			'label8' => $_POST['label8'],
			'label9' => $_POST['label9'],
			'penerima' => $nama_vendor,
			'vendor' => $kode_vendor,
			'akun_bank' => $v_bank,
			'no_rekening' =>$v_account,
			'lainnya1' => $_POST['lainnya1'],
			'label7a' => $_POST['label7a'],
			'label8a' => $_POST['label8a'],
			'label9a' => $_POST['label9a'],
			'label7b' => $_POST['label7b'],
			'label8b' => $_POST['label8b'],
			'label9b' => $_POST['label9b'],
			'div_head' => $_POST['div_head'],
			'jab_div_head' => $_POST['jab_div_head'],
		);

		
		$this->Home_model->saveeditpayment(array('id_payment' => $id),$add);
		
		echo json_encode($id);
	}
	
	public function saveaddpayment(){
		$jenis_pembayaran = $_POST['jns_pembayaran'];
		$c_label4 = count($_POST['label4']);
		$label4 = "";
		for($l=0; $l<=$c_label4; $l++){
			$label4 .= $_POST['label4'][$l].";";
		}

		$stringBuka = explode("/", $_POST['label3']);
		$ganti = $stringBuka[2].'-'.$stringBuka[1].'-'.$stringBuka[0];

		$strcounter=intval($_POST['txtcountervendor']);
		for($i=0; $i<1; $i++){
			$kode_vendor = $_POST['kodevendor'][$i];
			$nama_vendor = $_POST['namavendor'][$i];
			$v_bank = $_POST['sbankvendor'][$i];//$_POST['bankvendor'][$i]
			$v_account = $_POST['rekeningvendor'][$i];
		}
		
		if($jenis_pembayaran=='3'){
			$cr1=$_POST['cr1'];
			$cr2=$_POST['cr2'];
			$cr3=$_POST['cr3'];
			$cr4=$_POST['cr4'];
			$cr5=$_POST['cr5'];
			$cr6=$_POST['cr6'];
		}else{
			$cr1=$_POST['currency'];
			$cr2=$_POST['currency2'];
			$cr3=$_POST['currency3'];
			$cr4=$_POST['curr1'];
			$cr5=$_POST['curr2'];
			$cr6=$_POST['curr3'];
		}
		
		$add = array(			
			'status' => 0,
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => trim($_POST['jns_pembayaran']),
			'display_name' => $_POST['display_name'],
			'tanggal' => $_POST['tanggal'],
			'tanggal2' => $_POST['tanggal2'],
			'currency' => $cr1, //$_POST['currency'],
			'currency2' => $cr2, //$_POST['currency2'],
			'currency3' => $cr3, //$_POST['currency3'],
			'division_id' => $_POST['division_id'],
			'jabatan' => $_POST['jabatan'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'terbilang' => $_POST['terbilang'],
			'terbilang2' => $_POST['terbilang2'],
			'terbilang3' => $_POST['terbilang3'],
			'jumlah2' => $_POST['jumlah2'],
			'jumlah3' => $_POST['jumlah3'],
			'label3' => $ganti,
			'label4' => $label4,
			'label5' => $_POST['label5'],
			'label6' => isset($_POST['label6']),
			'label7' => $_POST['label7'],
			'label8' => $_POST['label8'],
			'label9' => $_POST['label9'],
			'penerima' => $nama_vendor,
			'vendor' => $kode_vendor,
			'akun_bank' => $v_bank,
			'no_rekening' =>$v_account,
			'lainnya1' => $_POST['lainnya1'],
			'curr_settlement1' => $_POST['curr1'],
			'curr_settlement2' => $_POST['curr2'],
			'curr_settlement3' => $_POST['curr3'],
			'label7a' => $_POST['label7a'],
			'label8a' => $_POST['label8a'],
			'label9a' => $_POST['label9a'],
			'label7b' => $_POST['label7b'],
			'label8b' => $_POST['label8b'],
			'label9b' => $_POST['label9b'],
			'div_head' => $_POST['div_head'],
			'jab_div_head' => $_POST['jab_div_head'],
		);

		$insert = $this->Home_model->saveaddpayment($add);
		
		$id = $insert;
		for($i=0; $i<$strcounter; $i++){
			//$nominal=preg_replace("/[^0-9]/", "", $_POST['nominalvendor'][$i] );
			$nominalvendor=$_POST['nominalvendor'][$i];
			$nominal=preg_replace("/[^0-9]/", "", $nominalvendor );
			if(substr($nominalvendor,0,1)=="-"){
				$nominal="(".number_format($nominal,0,",","."). ")";			
			}elseif(substr($nominalvendor,0,1)=="(" && substr($nominalvendor,strlen($nominalvendor)-1,1)==")"){
				$nominal="(" .number_format($nominal,0,",","."). ")" ;	
			}else{
				$nominal=number_format($nominal,0,",",".");
			}
			
			//if($nominal != ""){
				$data = array(
						'id_payment' => $id,
						'kode_vendor' => $_POST['kodevendor'][$i],
						'v_bank' => $_POST['sbankvendor'][$i],//$_POST['bankvendor'][$i],
						'v_account' => $_POST['rekeningvendor'][$i],
						'v_nominal' =>  $nominal,
						'v_currency' => $_POST['scurrencyvendor'][$i] //$_POST['currencyvendor'][$i]						
					);
					
				$insert = $this->Dashboard_model->vendorpayment_add($data);
			//}
		}
		echo json_encode($id);
	}	
	
	public function saveeditpaymentnew(){
		$jenis_pembayaran = $_POST['jns_pembayaran'];
		$c_label4 = count($_POST['label4']);
		$label4 = "";
		for($l=0; $l<=$c_label4; $l++){
			$label4 .= $_POST['label4'][$l].";";
		}
		
		$stringBuka = explode("/", $_POST['label3']);
		$ganti = $stringBuka[2].'-'.$stringBuka[1].'-'.$stringBuka[0];

		$strcounter=intval($_POST['txtcountervendor']);
		$id = $_POST['id_payment'];
		$this->Dashboard_model->delete_vendorpayment($id);
		for($i=0; $i<$strcounter; $i++){
			//$nominal=preg_replace("/[^0-9]/", "", $_POST['nominalvendor'][$i] );
			$nominalvendor=$_POST['nominalvendor'][$i];
			$nominal=preg_replace("/[^0-9]/", "", $nominalvendor );
			if(substr($nominalvendor,0,1)=="-"){
				$nominal="(".number_format($nominal,0,",","."). ")";			
			}elseif(substr($nominalvendor,0,1)=="(" && substr($nominalvendor,strlen($nominalvendor)-1,1)==")"){
				$nominal="(" .number_format($nominal,0,",","."). ")" ;	
			}else{
				$nominal=number_format($nominal,0,",",".");
			}
			//if($nominal != ""){
				$data = array(
						'id_payment' => $id,
						'kode_vendor' => $_POST['kodevendor'][$i],
						'v_bank' => $_POST['sbankvendor'][$i],//$_POST['bankvendor'][$i],
						'v_account' => $_POST['rekeningvendor'][$i],
						'v_nominal' => $nominal, //number_format($nominal,0,",","."),
						'v_currency' => $_POST['scurrencyvendor'][$i] //$_POST['currencyvendor'][$i]
						
					);
					
				$insert = $this->Dashboard_model->vendorpayment_add($data);
			//}
		}
		
		for($i=0; $i<1; $i++){
			$kode_vendor = $_POST['kodevendor'][$i];
			$nama_vendor = $_POST['namavendor'][$i];
			$v_bank = $_POST['sbankvendor'][$i];//$_POST['bankvendor'][$i];
			$v_account = $_POST['rekeningvendor'][$i];
		}

		$add = array(
			'status' => 0,
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => trim($_POST['jns_pembayaran']),
			'display_name' => $_POST['display_name'],
			'tanggal' => $_POST['tanggal'],
			'tanggal2' => $_POST['tanggal2'],
			'currency' => $_POST['currency'],
			'currency2' => $_POST['currency2'],
			'currency3' => $_POST['currency3'],
			'division_id' => $_POST['division_id'],
			'jabatan' => $_POST['jabatan'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'terbilang' => $_POST['terbilang'],
			'terbilang2' => $_POST['terbilang2'],
			'terbilang3' => $_POST['terbilang3'],
			'jumlah2' => $_POST['jumlah2'],
			'jumlah3' => $_POST['jumlah3'],
			'label3' => $ganti,
			'label4' => $label4,
			'label5' => $_POST['label5'],
			'label6' => $_POST['label6'],
			'label7' => $_POST['label7'],
			'label8' => $_POST['label8'],
			'label9' => $_POST['label9'],
			'penerima' => $nama_vendor,
			'vendor' => $kode_vendor,
			'akun_bank' => $v_bank,
			'no_rekening' =>$v_account,
			'lainnya1' => $_POST['lainnya1'],
			'curr_settlement1' => $_POST['curr1'],
			'curr_settlement2' => $_POST['curr2'],
			'curr_settlement3' => $_POST['curr3'],
			'label7a' => $_POST['label7a'],
			'label8a' => $_POST['label8a'],
			'label9a' => $_POST['label9a'],
			'label7b' => $_POST['label7b'],
			'label8b' => $_POST['label8b'],
			'label9b' => $_POST['label9b'],
			'div_head' => $_POST['div_head'],
			'jab_div_head' => $_POST['jab_div_head'],
		);

		$this->session->set_flashdata('msg', 'Berhasil disimpan!');
		$this->Home_model->saveeditpayment(array('id_payment' => $id),$add);			
		
		//redirect(site_url('Dashboard/formfinished/'.$id));
		echo json_encode($id);
	}
	
	public function draftpaymentdelete($id)
	{
		//$this->Home_model->delete_vendorpayment($id);	
		//$this->Home_model->draftpaymentdelete($id);	
		$dataH = array(
				'status' => 'XXX'
			);
	
		$this->Dashboard_model->draftpaymentdeleteFlag(array('id_payment' => $id), $dataH);
		echo json_encode(array("status" => TRUE));
	}
	
	public function getdetilarf($id)
	{
		$data = $this->Home_model->getdetilarf(urldecode($id));
		echo json_encode($data);
	}
	
	public function resetMyReport()
	{
			$profileid=$this->input->post('txtprofile');
			$status=$this->input->post('selstatus');
			$periode1=$this->input->post('periode1');
			$periode2=$this->input->post('periode2');
			
			if($status==""){
				$status="%";
			}
			
			$data = $this->Home_model->resetMyReport($profileid,$status,$periode1,$periode2);
			echo json_encode($data);
	}
	
	public function caridataMyReport()
	{
			$profileid=$this->input->post('txtprofile');
			$status=$this->input->post('selstatus');
			$periode1=$this->input->post('periode1');
			$periode2=$this->input->post('periode2');
			
			if($status==""){
				$status="%";
			}
			$data = $this->Home_model->getdataMyReport($profileid,$status,$periode1,$periode2);
			echo json_encode($data);
	}
	
	public function exportlist()
	{
		
		$jdl=$this->input->post('txtprofile');
		$status="";		
		$seljnspembayaran="";
		switch ($jdl) {
			  case "1":
				$title="List Of Payment";	
				$status=$this->input->post('selstatus');
				$seljnspembayaran=$this->input->post('seljnspembayaran');
				$ses_mst['profileid']=$this->input->post('selsearch');	
				$ses_mst['jnsreport']="0";	
				break;
			  case "2":
				$title="List Of Advanced Request";
				$status=$this->input->post('selstatus');
				$ses_mst['profileid']=$jdl;	
				$ses_mst['jnsreport']="1";					
				break;
			  case "3":
				$title="List Of Advanced Settlement Request";
				$status=$this->input->post('selstatus');
				$ses_mst['profileid']=$jdl;	
				$ses_mst['jnsreport']="1";
				break;
			  case "4":
				$title="List Of Direct Payment Request";
				$status=$this->input->post('selstatus');
				$ses_mst['profileid']=$jdl;	
				$ses_mst['jnsreport']="1";
				break;
			  case "5":
				$title="List Of Cash Received Request";	
				$status=$this->input->post('selstatus');
				$ses_mst['profileid']=$jdl;	
				$ses_mst['jnsreport']="1";
				break;
			  case "6":
				$title="List Of Outstanding Payment Request";
				$seljnspembayaran=$this->input->post('seljnspembayaran');
				$ses_mst['profileid']="2";
				$ses_mst['jnsreport']="2";
				break;
			  case "7":
				$title="List Of Draft Request";	
				$seljnspembayaran=$this->input->post('seljnspembayaran');
				$ses_mst['profileid']="2";
				$ses_mst['jnsreport']="2";
				break;
			  default:
				$title =" ";				
		}
		
		//$status=$this->input->post('selstatus');
		if($status==""){
			$status="%";
		}
		
		if($seljnspembayaran==""){
			$seljnspembayaran="%";
		}
		
		$division_name="";
		$division = $this->Home_model->getdivisionName();
		foreach($division as $div) {	 
			$division_name=$div->division_name;
		}
		$ses_mst['tgl1']=$this->input->post('periode1');
		$ses_mst['tgl2']=$this->input->post('periode2');
		$ses_mst['judul']=$title;
		$ses_mst['status']=$status;		
		$ses_mst['jnspembayaran']=$seljnspembayaran;		
		$ses_mst['divisionname']=$division_name;
		$ses_mst['jdl']=$jdl;				
		$this->session->set_userdata($ses_mst);		
		echo json_encode($ses_mst);
	}
	
	public function exportexcelreport()
	{
		$profileid=$this->session->userdata('profileid');
		$txtsearch=$this->session->userdata('status');
		$periode1=$this->session->userdata('tgl1');
		$periode2=$this->session->userdata('tgl2');
		$judul=$this->session->userdata('judul');
		$dvs = $this->session->userdata('divisionname');
		$jnsreport=$this->session->userdata('jnsreport');
		$jdl=$this->session->userdata('jdl');
		if($jnsreport=="0"){
			if($profileid=="1"){
				$txtsearch=$this->session->userdata('status');
			}elseif($profileid=="2"){
				$txtsearch=$this->session->userdata('jnspembayaran');
			}
			$transactions = $this->Home_model->caridataMyReportPayment($profileid,$txtsearch,$periode1,$periode2);		
		}elseif($jnsreport=="2"){
			$txtsearch=$this->session->userdata('jnspembayaran');
			if($jdl=="6"){
				$transactions = $this->Home_model->caridataMyReportOutstanding($profileid,$txtsearch,$periode1,$periode2);	
			}elseif($jdl=="7"){
				$transactions = $this->Home_model->caridataMyReportDraft($profileid,$txtsearch,$periode1,$periode2);	
			}				
		}elseif($jnsreport=="1"){			
			$txtsearch=$this->session->userdata('status');
			$transactions = $this->Home_model->getdataMyReport($profileid,$txtsearch,$periode1,$periode2);
		}
		
		
		
		$spreadsheet = new Spreadsheet;
		$spreadsheet->setActiveSheetIndex(0)->getStyle('A1:I1')->getFont()->setBold(true);
		$spreadsheet->setActiveSheetIndex(0)->getStyle('A2:I2')->getFont()->setBold(true);
		$spreadsheet->setActiveSheetIndex(0)->getStyle('A3:I3')->getFont()->setBold(true);
		$spreadsheet->setActiveSheetIndex(0)->getStyle('A4:I4')->getFont()->setBold(true);
		$spreadsheet->setActiveSheetIndex(0)->getStyle('A5:I5')->getFont()->setBold(true);
		if($jdl=="1" || $jdl=="6" || $jdl=="7" ){
			$spreadsheet->setActiveSheetIndex(0)->mergeCells('A1:I1');
			$spreadsheet->setActiveSheetIndex(0)->mergeCells('A2:I2');
			$spreadsheet->setActiveSheetIndex(0)->mergeCells('A3:I3');
			$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('H5', 'Bank Account')
					->setCellValue('I5', 'Penerima Pembayaran');
		}else{
			$spreadsheet->setActiveSheetIndex(0)->mergeCells('A1:G1');
			$spreadsheet->setActiveSheetIndex(0)->mergeCells('A2:G2');
			$spreadsheet->setActiveSheetIndex(0)->mergeCells('A3:G3');
		}
		$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A1', $judul)
					->setCellValue('A2', 'Divisi      : '.$dvs)
					->setCellValue('A3', 'Periode : '.$periode1.' - '.$periode2 )
					->setCellValue('A5', 'No')
					->setCellValue('B5', 'Status')
					->setCellValue('C5', 'Tanggal SP3')
					->setCellValue('D5', 'Nomor SP3')
					->setCellValue('E5', 'Nilai SP3')
					->setCellValue('F5', 'Deskripsi')
					->setCellValue('G5', 'Pemohon');
		
		$kolom = 6;
		$nomor = 1;
		foreach($transactions as $data) {	 
			$nom1=$data->currency.' - '.$data->label2;
			$nom2='';
			$nom3='';
			$nominalAll='';
			if ($data->currency2!=''){
				$nom2 = ', '.$data->currency2.' - '.$data->jumlah2;
			}
						
			if ($data->currency3!=''){
				$nom3 = ', '.$data->currency3.' - '.$data->jumlah3;
			}
			 
			$nominalAll=$nom1.$nom2.$nom3;
			$spreadsheet->setActiveSheetIndex(0)
						->setCellValue('A' . $kolom, $nomor)
						->setCellValue('B' . $kolom, $data->status_laporan)
						->setCellValue('C' . $kolom, $data->tanggal)
						->setCellValue('D' . $kolom, $data->nomor_surat)
						->setCellValue('E' . $kolom, $nominalAll)
						->setCellValue('F' . $kolom, $data->label1)
						->setCellValue('G' . $kolom, $data->display_name);
			if($jdl=="1" || $jdl=="6" || $jdl=="7" ){
				$spreadsheet->setActiveSheetIndex(0)
						->setCellValue('H' . $kolom, $data->akun_bank)
						->setCellValue('I' . $kolom, $data->penerima);
			}
	 
			$kolom++;
			$nomor++;
	 
		}
		$writer = new Xlsx($spreadsheet);
	 	header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'.xlsx"');
		header('Cache-Control: max-age=0');
	 
		$writer->save('php://output');
	}		
	
	public function exportpdf()
	{
		$profileid=$this->session->userdata('profileid');
		$txtsearch=$this->session->userdata('status');
		$periode1=$this->session->userdata('tgl1');
		$periode2=$this->session->userdata('tgl2');
		$judul=$this->session->userdata('judul');
		$dvs = $this->session->userdata('divisionname');
		$jnsreport=$this->session->userdata('jnsreport');
		$jdl=$this->session->userdata('jdl');
		if($jnsreport=="0"){
			if($profileid=="1"){
				$txtsearch=$this->session->userdata('status');
			}elseif($profileid=="2"){
				$txtsearch=$this->session->userdata('jnspembayaran');
			}
			$data['transactions'] = $this->Home_model->caridataMyReportPayment($profileid,$txtsearch,$periode1,$periode2);		
		}elseif($jnsreport=="2"){
			$txtsearch=$this->session->userdata('jnspembayaran');
			if($jdl=="6"){
				$data['transactions'] = $this->Home_model->caridataMyReportOutstanding($profileid,$txtsearch,$periode1,$periode2);	
			}elseif($jdl=="7"){
				$data['transactions'] = $this->Home_model->caridataMyReportDraft($profileid,$txtsearch,$periode1,$periode2);	
			}				
		}elseif($jnsreport=="1"){			
			$txtsearch=$this->session->userdata('status');
			$data['transactions'] = $this->Home_model->getdataMyReport($profileid,$txtsearch,$periode1,$periode2);
		}
		
		$html=$this->load->view('akses/csf/vreportpdf', $data, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = $judul.".pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
        //generate the PDF from the given html
        $this->m_pdf->pdf->AddPage('L');
        $this->m_pdf->pdf->setFooter('{PAGENO}');
        $this->m_pdf->pdf->WriteHTML($html);

        //$this->m_pdf->pdf->Output(); 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
	}
	
	public function resetMyReportOutstanding()
	{
			$profileid=$this->input->post('txtprofile');
			$status=$this->input->post('selstatus');
			$periode1=$this->input->post('periode1');
			$periode2=$this->input->post('periode2');
			
			if($status==""){
				$status="%";
			}
			
			$data = $this->Home_model->resetMyReportOutstanding($profileid,$status,$periode1,$periode2);
			echo json_encode($data);
	}
	
	public function caridataMyReportOutstanding()
	{
			$txtsearch="";
			$profileid="2";//$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			$jnspembayaran=$this->input->post('seljnspembayaran');
			$periode1=$this->input->post('periode1');
			$periode2=$this->input->post('periode2');
		
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Home_model->caridataMyReportOutstanding($profileid,$txtsearch,$periode1,$periode2);
			echo json_encode($data);
	}
	
	public function caridataMyReportPayment()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			$jnspembayaran=$this->input->post('seljnspembayaran');
			$periode1=$this->input->post('periode1');
			$periode2=$this->input->post('periode2');
		
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}else{
				$txtsearch="%";
			}
			$data = $this->Home_model->caridataMyReportPayment($profileid,$txtsearch,$periode1,$periode2);
			echo json_encode($data);
	}
	
	public function resetMyReportPayment()
	{
			$data = $this->Home_model->resetMyReportPayment();
			echo json_encode($data);
	}
	
	public function resetMyReportDraft()
	{
			$profileid=$this->input->post('txtprofile');
			$status=$this->input->post('selstatus');
			$periode1=$this->input->post('periode1');
			$periode2=$this->input->post('periode2');
			
			if($status==""){
				$status="%";
			}
			
			$data = $this->Home_model->resetMyReportDraft($profileid,$status,$periode1,$periode2);
			echo json_encode($data);
	}
	
	public function caridataMyReportDraft()
	{
			$txtsearch="";
			$profileid="2"; //$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			$jnspembayaran=$this->input->post('seljnspembayaran');
			$periode1=$this->input->post('periode1');
			$periode2=$this->input->post('periode2');
		
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}else{
				$txtsearch="%";
			}
			$data = $this->Home_model->caridataMyReportDraft($profileid,$txtsearch,$periode1,$periode2);
			echo json_encode($data);
	}
	
	public function caridataapproval()
	{
			$txtsearch="";
			$profileid=$this->input->post('selsearch');
			$status=$this->input->post('selstatus');
			$jnspembayaran=$this->input->post('seljnspembayaran');
			//$txtsearch=$this->input->post('txtpencarian');
			if($status==""){
				$status="%";
			}
			
			if($jnspembayaran==""){
				$jnspembayaran="%";
			}
			if($profileid=="1"){
				$txtsearch=$status;
			}elseif($profileid=="2"){
				$txtsearch=$jnspembayaran;
			}
			$data = $this->Approval_model->getdatabysearch($profileid,$txtsearch);
			echo json_encode($data);
	}
	
	public function ar_new($start_date,$end_date)
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['advancerequest'] = $this->Approval_model->getListAR_new($start_date,$end_date);
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_ar_new', $data);
	}

	public function asr_new($start_date,$end_date)
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['settlement'] = $this->Approval_model->getListASR_new($start_date,$end_date);
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_asr_new', $data);
	}
	
	public function dp_new($start_date,$end_date)
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['directpayment'] = $this->Approval_model->getListDP_new($start_date,$end_date);
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_dp_new', $data);
	}
	
	public function cr_new($start_date,$end_date)
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['cashreceived'] = $this->Approval_model->getListCR_new($start_date,$end_date);
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['w_approval'] = $this->Approval_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/approval/header_approval', $data);
		$this->load->view('akses/approval/list_cr_new', $data);
	}
	
}    