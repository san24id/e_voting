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
		$this->load->model('SuperAdm_model');

		$this->load->library('Pdf');

		$sid = $this->session->userdata("id_user");
		$usr = $this->session->userdata("username");

		$this->load->library('session');
 		
 		if ($this->session->userdata('id_role_app') == 2) {
 			
		}else{
			redirect('login/logout', 'refresh');
		}
	}

	public function index()
	{
		$sid = $this->session->userdata("id_user");
		
		$data['dashboard'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['creditcard'] = $this->Dashboard_model->getCreditCard();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['outstanding'] = $this->Home_model->getOutstanding();
		$data['draftprint'] = $this->Home_model->getDraftPrint();
		$data['draft1'] = $this->Home_model->getDraft();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['apayment'] = $this->Dashboard_model->payment();
		$data['mytask'] = $this->Dashboard_model->getmyTask();
		$data['submit'] = $this->Home_model->getSubmitted();
		$data['process'] = $this->Home_model->getProcessing();
		$data['verifikasi'] = $this->Home_model->getVerifikasi();
		$data['approval'] = $this->Home_model->getApproval();
		$data['paid'] = $this->Home_model->getPaid();
		$data['upcoming_over'] = $this->Dashboard_model->getUpcomingOverdue();
		// var_dump($data['upcoming_over']);exit;
		
		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/dashboard_csf', $data);
	}

	function periode_dashboard(){

		$sid = $this->session->userdata("id_user");
		
		$data['dashboard'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['creditcard'] = $this->Dashboard_model->getCreditCard();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['outstanding'] = $this->Home_model->getOutstanding();
		$data['draftprint'] = $this->Home_model->getDraftPrint();
		$data['draft1'] = $this->Home_model->getDraft();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['apayment'] = $this->Dashboard_model->payment();
		$data['mytask'] = $this->Dashboard_model->getmyTask();
		$data['submit'] = $this->Home_model->getSubmitted();
		$data['process'] = $this->Home_model->getProcessing();
		$data['verifikasi'] = $this->Home_model->getVerifikasi();
		$data['approval'] = $this->Home_model->getApproval();
		$data['paid'] = $this->Home_model->getPaid();
		$data['upcoming_over'] = $this->Dashboard_model->getUpcomingOverdue();
				
		$data['start_date'] = $this->input->post("start_date");
		$data['end_date'] = $this->input->post("end_date");

		$data['payment'] = $this->Dashboard_model->periode2($data['start_date'],$data['end_date']);
		$data['jumlah'] = count($data['payment']);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/dashboard_csf', $data);
	}

	public function report2($id_payment)	{

		// $this->load->library('pdfgenerator');

		$data['notif_task'] = $this->Dashboard_model->notifTask();
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
		$this->load->view('akses/report/print2', $data);

		// $html = $this->load->view('akses/report/print', $data, true);
	 
		// $this->pdfgenerator->generate($html,'Form_SP3');
	}

	public function report($id_payment)	{

		// $this->load->library('pdfgenerator');

		$data['notif_task'] = $this->Dashboard_model->notifTask();
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

		$data['notif_task'] = $this->Dashboard_model->notifTask();
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

	public function credit_card(){
		
		$data['active1'] = '';
		$data['credit_card'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['division'] = $this->Dashboard_model->getDivision();
		$data['pic'] = $this->Dashboard_model->getPIC();
		// var_dump($data['pic']);exit;
		$data['creditcard'] = $this->Dashboard_model->credit_card();
		$data['report_ppn'] = $this->Dashboard_model->report_pajak_ppn();
		// $data['report_view'] = $this->Dashboard_model->report_view($id_pajak);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/credit_card', $data);
	}

	function addcc(){
		$apa = $_POST['division_id']; 
		$apa2 = $_POST['nama_pic'];

		$sql = "SELECT id_user FROM m_user WHERE display_name = '$apa2' AND division_id = '$apa' ";
		// var_dump($sql);exit;
		$query = $this->db->query($sql)->result();
		$ubah = $query[0]->id_user;
		// var_dump($ubah);exit;

		$add = array(

			'id_div' => $_POST['id_div'],
			'pemegang_kartu' => $_POST['pemegang_kartu'],
			'no_billing' => $_POST['no_billing'],
			'division_id' => $_POST['division_id'],
			'id_user' => $ubah,
			'nama_pic' => $_POST['nama_pic'],
			'target_submission' => $_POST['target_submission'],
			'tempo' => $_POST['tempo'],
			'jatah' => $_POST['jatah']					
						
		);
		// var_dump($add);exit;

		$this->Dashboard_model->addcc($add);

		redirect('Dashboard/credit_card');
	}

	function updatecc(){

		$apa = $_POST['division_id']; 
		$apa2 = $_POST['nama_pic'];

		$sql = "SELECT id_user FROM m_user WHERE display_name = '$apa2' AND division_id = '$apa' ";
		// var_dump($sql);exit;
		$query = $this->db->query($sql)->result();
		$ubah = $query[0]->id_user;
		// var_dump($ubah);exit;

		$upd = array(
			
			'id_div' => $_POST['id_div'],
			'pemegang_kartu' => $_POST['pemegang_kartu'],
			'no_billing' => $_POST['no_billing'],
			'division_id' => $_POST['division_id'],
			'id_user' => $ubah,
			'nama_pic' => $_POST['nama_pic'],
			'target_submission' => $_POST['target_submission'],
			'tempo' => $_POST['tempo'],
			'jatah' => $_POST['jatah']					
						
		);

		$this->Dashboard_model->updatecc($upd);

		redirect('Dashboard/credit_card');
	}

	function deletecc(){

		$this->Dashboard_model->deletecc($_POST['id_div']);

		redirect('Dashboard/credit_card');

	}

	public function d_vendor(){

		$data['active1'] = '';
		$data['d_vendor'] = 'active';
		$data['active3'] = '';

		$data['getVendor'] = $this->Dashboard_model->getVendor();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/data_vendor', $data);
	}

	function addvendor(){

		$add = array(

			'id_honor' => $_POST['id_honor'],
			'kode_vendor' => $_POST['kode_vendor'],
			'npwp' => $_POST['npwp'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
						
						
		);

		$this->Dashboard_model->addvendor($add);

		redirect('Dashboard/d_vendor');
	}

	function updatevendor(){

		$upd = array(
			
			'id_honor' => $_POST['id_honor'],
			'kode_vendor' => $_POST['kode_vendor'],
			'npwp' => $_POST['npwp'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
						
		);

		$this->Dashboard_model->updatevendor($upd);

		redirect('Dashboard/d_vendor');
	}

	function deletevendor(){

		$this->Dashboard_model->deletevendor($_POST['id_honor']);

		redirect('Dashboard/d_vendor');

	}

	function periode_tax(){
		$data['active1'] = '';
		$data['report_pajak'] = 'active';
		$data['active3'] = '';

		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['report_pph'] = $this->Dashboard_model->report_pajak_pph();
		$data['process_tax'] = $this->Dashboard_model->getProcessTax($id);
		$data['report_ppn'] = $this->Dashboard_model->report_pajak_ppn();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();

		$data['start_date'] = $this->input->post("start_date");
		$data['end_date'] = $this->input->post("end_date");

		$data['report_pph'] = $this->Dashboard_model->periode_tax($data['start_date'],$data['end_date']);
		$data['jumlah'] = count($data['report_pph']);

		$data['report_ppn'] = $this->Dashboard_model->periode_tax($data['start_date'],$data['end_date']);
		$data['jumlah1'] = count($data['report_ppn']);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/report_pajak', $data);
	}
	
	public function report_pajak(){
		
		$data['active1'] = '';
		$data['report_pajak'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['report_pph'] = $this->Dashboard_model->report_pajak_pph();
		$data['process_tax'] = $this->Dashboard_model->getProcessTax($id);
		$data['report_ppn'] = $this->Dashboard_model->report_pajak_ppn();
		// $data['report_view'] = $this->Dashboard_model->report_view($id_pajak);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/report_pajak', $data);
	}

	public function report_view_pph($id){
		
		$data['active1'] = '';
		$data['report_pajak'] = 'active';
		$data['active3'] = '';

		// $data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['process_tax'] = $this->Dashboard_model->getProcessTaxPPh($id);
		$data['vreport'] = $this->Dashboard_model->report_view_pph($id_tax);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/report_view_pph', $data);
	}

	public function report_view_ppn($id){
		
		$data['active1'] = '';
		$data['report_pajak'] = 'active';
		$data['active3'] = '';

		// $data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['process_tax'] = $this->Dashboard_model->getProcessTaxPPN($id);
		$data['vreport'] = $this->Dashboard_model->report_view_ppn($id_tax);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/report_view_ppn', $data);
	}

	public function form_sp3($id_payment){

		$data['monitoring'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['process_tax'] = $this->Dashboard_model->getProcessTax2($id_payment);
		// var_dump($data['process_tax']);exit;

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_sp3', $data);
	}

	public function form_arf($id_payment){

		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['payment'] = $this->Home_model->getform($id_payment);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['arf_doc'] = $this->Dashboard_model->buat_kode_arf();
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();
		// var_dump($data['d_wewenang']);exit;

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_arf', $data);
	}

	public function form_varf($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['currency'] = $this->Home_model->getCurrency();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_varf', $data);

	}

	public function form_earf($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_earf', $data);

	}

	public function report_arf($id)	{

		// $this->load->library('pdfgenerator');

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['process_tax'] = $this->Dashboard_model->getProcessTax($id);
		$data['process_tax_H']=$this->Dashboard_model->getProcessTaxHeader($id_payment);
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		
		// $this->load->view('akses/user/header_user');
		$this->load->view('akses/report/print_arf', $data);

		// $html = $this->load->view('akses/report/print', $data, true);
	 
		// $this->pdfgenerator->generate($html,'Form_SP3');
	}

	public function form_asf($id_payment){

		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['surat1'] = $this->Dashboard_model->nomorsurat();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['payment'] = $this->Home_model->getform($id_payment);
		$data['currency'] = $this->Home_model->getCurrency();
		$data['asf_doc'] = $this->Dashboard_model->buat_kode_asf();
		$data['arf_doc'] = $this->Dashboard_model->buat_kode_arf();
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_asf', $data);
	}

	public function form_asf2($id_payment){

		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat1'] = $this->Dashboard_model->nomorsurat();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['payment'] = $this->Home_model->getform($id_payment);
		$data['currency'] = $this->Home_model->getCurrency();
		$data['asf_doc'] = $this->Dashboard_model->buat_kode_asf();
		$data['arf_doc'] = $this->Dashboard_model->buat_kode_arf();
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_asf2', $data);
	}

	public function form_vasf($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_vasf', $data);

	}

	public function form_easf($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_easf', $data);

	}
	
	public function form_easf2($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_easf2', $data);

	}

	public function report_asf($id)	{

		// $this->load->library('pdfgenerator');

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['process_tax'] = $this->Dashboard_model->getProcessTax($id);
		$data['process_tax_H']=$this->Dashboard_model->getProcessTaxHeader($id_payment);
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		
		// $this->load->view('akses/user/header_user');
		$this->load->view('akses/report/print_asf', $data);

		// $html = $this->load->view('akses/report/print', $data, true);
	 
		// $this->pdfgenerator->generate($html,'Form_SP3');
	}

	public function form_prf($id_payment){

		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat1'] = $this->Dashboard_model->nomorsurat();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['payment'] = $this->Home_model->getform($id_payment);
		$data['prf_doc'] = $this->Dashboard_model->buat_kode_prf();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_prf', $data);
	}

	public function form_vprf($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_vprf', $data);

	}

	public function form_eprf($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_eprf', $data);

	}

	public function report_prf($id)	{

		// $this->load->library('pdfgenerator');

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['process_tax_H']=$this->Dashboard_model->getProcessTaxHeader($id_payment);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();
		
		// $this->load->view('akses/user/header_user');
		$this->load->view('akses/report/print_prf', $data);

		// $html = $this->load->view('akses/report/print', $data, true);
	 
		// $this->pdfgenerator->generate($html,'Form_SP3');
	}

	public function form_crf($id_payment){

		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['payment'] = $this->Home_model->getform($id_payment);
		$data['surat'] = $this->Dashboard_model->nomorsurat();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['crf_doc'] = $this->Dashboard_model->buat_kode_crf();
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_crf', $data);
	}

	public function form_vcrf($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_vcrf', $data);

	}

	public function form_ecrf($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_ecrf', $data);

	}

	public function report_crf($id)	{

		// $this->load->library('pdfgenerator');

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['process_tax_H']=$this->Dashboard_model->getProcessTaxHeader($id_payment);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		
		// $this->load->view('akses/user/header_user');
		$this->load->view('akses/report/print_crf', $data);

		// $html = $this->load->view('akses/report/print', $data, true);
	 
		// $this->pdfgenerator->generate($html,'Form_SP3');
	}

	public function d_pejabat(){
		$data['d_pejabat'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['d_wewenang'] = $this->Dashboard_model->getPejabat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/data_pejabat', $data);

	}

	function updatewewenang(){
		$upd = array(
			'idapproval' => $_POST['idapproval'],
			'nama_user' => $_POST['nama_user'],
			'jabatan' => $_POST['jabatan'],
			'activate' => $_POST['activate']
		);

		$this->Dashboard_model->updatewewenang($upd);

		redirect('Dashboard/d_pejabat');
	}

	function activated(){
		$upd = array(
			'id_status' => 11,
			'activate' => $_POST['activate']
		);

		$this->Dashboard_model->activated($upd);

		redirect('Dashboard');
	}

	public function approve(){
		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 11
		);

		$this->Dashboard_model->approve($upd);

		redirect('Dashboard');

	}

	public function accept(){

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

		redirect('Dashboard');
	}

	public function rejected(){

		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 3,
			'note' => $_POST['note'],
			'rejected_by' => $_POST['rejected_by'],
			'rejected_date' => $_POST['rejected_date'],
			'handled_by' => $_POST['handled_by']
			
		);

		$this->Dashboard_model->updaterejected($upd);

		redirect('Dashboard/monitoring');
	}

	public function rejectedtax(){

		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 4,
			'note' => $_POST['note'],
			'rejected_by' => $_POST['rejected_by'],
			'rejected_date' => $_POST['rejected_date'],
			'handled_by' => $_POST['handled_by']
			
		);

		$this->Dashboard_model->updaterejected($upd);

		redirect('Dashboard/monitoring');
	}

	public function processing(){

		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 4,
			'handled_by' => $_POST['handled_by']
		);

		$this->Dashboard_model->updateprocess($upd);

		redirect('Dashboard/monitoring');
	}

	public function tax(){

		$add = array(
			'id_payment' => $_POST['id_payment'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pajak' => $_POST['jenis_pajak'],
			'masa_pajak' => $_POST['masa_pajak'],
			'tahun_pajak' => $_POST['tahun_pajak'],
			'tgl_pemotongan' => $_POST['tgl_pemotongan'],
			'ber_npwp' => $_POST['ber_npwp'],
			'npwp' => $_POST['npwp'],
			'nama_vendor' => $_POST['nama_vendor'],
			'nik' => $_POST['nik'],
			'alamat' => $_POST['alamat'],
			'kode_pajak' => $_POST['kode_pajak'],
			'penghasilan_bruto' => $_POST['penghasilan_bruto'],
			'tarif_pajak' => $_POST['tarif_pajak'],
			'pjk_terutang' => $_POST['pjk_terutang'],
			'fasilitas' => $_POST['fasilitas'],
			'nomor_skb' => $_POST['nomor_skb'],
			'vendor' => $_POST['vendor'],
			'nilai_ppn' => $_POST['nilai_ppn']			
						
		);

		$this->Dashboard_model->addtax($add);

		redirect('Dashboard/report_pajak');
	}

	public function form_sp3_2($id_payment){
		$data['active1'] = '';
		$data['task'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['payment'] = $this->Home_model->getform($id_payment);
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();
		$data['gprocess'] = $this->Dashboard_model->getProcessing();
		$data['tax'] = $this->Dashboard_model->getTax();
		$data['jenispajak'] = $this->Dashboard_model->getJenisPajak();
		$data['kodePajak']= $this->Dashboard_model->getKodePajak();
		$data['kodeMap'] = $this->Dashboard_model->getKodeMap();
		$data['vendor'] = $this->Dashboard_model->getDataVendor();
		$data['persen'] = $this->Dashboard_model->getTarif();
		$data['getnpwp'] = $this->Dashboard_model->getDataNPWP($id_payment);
		$data['getdatatax'] = $this->Dashboard_model->getDataTax($id_payment);
		$data['getdatanontax'] = $this->Dashboard_model->getDataNonTax($id_payment);
		$data['getnouruttax'] = $this->Dashboard_model->getUrutTax($id_payment);
		$data['getdatataxFlag'] = $this->Dashboard_model->getDataTaxFlag($id_payment);
		
		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_sp3_2', $data);
	}
	
	public function procees_tax(){
		
		$strcounter=intval($_POST['strcounter']);
		$c_de = count($_POST['de']);
		$de = "";
		for($i=0; $i<=$c_de; $i++){
			$de .= $_POST['de'][$i].";";
		}
		$c_opsional = count($_POST['opsional']);
		$opsional = "";
		for($i=0; $i<$c_opsional; $i++){
			$opsional .= $_POST['opsional'][$i].";";
		}

		$c_objek_pajak = count($_POST['objek_pajak']);
		$objek_pajak = "";
		for($i=0; $i<$c_objek_pajak; $i++){
			$objek_pajak .= $_POST['objek_pajak'][$i].";";
		}
		
		for($i=0; $i<$strcounter; $i++){
			//$jenis_pajak .= $_POST['jenis_pajak'][$i];
			$add = array(
				'id_payment' => $_POST['id_payment'],
				'status' => 5,
				'handled_by' => $_POST['handled_by'],
				'nomor_surat' => $_POST['nomor_surat'],
				'de' => $de,
				'opsional' => $opsional,
				'nilai' => $_POST['nilai'],
				'objek_pajak' => $objek_pajak,
				'jenis_pajak' => $_POST['jenis_pajak'][$i],
				'kode_pajak' => $_POST['kode_pajak'][$i],
				'kode_map' => $_POST['kode_map'][$i],
				'nama' => $_POST['nama'][$i],
				'npwp' => $_POST['npwp'][$i],
				'alamat' => $_POST['alamat'][$i],
				'tarif' => $_POST['tarif'][$i],
				'fas_pajak' => $_POST['fas_pajak'][$i],
				'special_tarif' => $_POST['special_tarif'][$i],
				'gross' => $_POST['gross'][$i][$i],
				'dpp' => $_POST['dpp'][$i],
				'dpp_gross' => $_POST['dpp_gross'][$i],
				'pajak_terutang' => $_POST['pajak_terutang'][$i],
				'masa_pajak' => $_POST['masa_pajak'][$i],
				'keterangan' => $_POST['keterangan'][$i],
				'tahun' => $_POST['tahun'][$i]				
			);

			$this->Dashboard_model->updatetax($add);
			
		}
		
		/*$add = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 5,
			'handled_by' => $_POST['handled_by'],
			'nomor_surat' => $_POST['nomor_surat'],
			'de' => $de,
			'opsional' => $opsional,
			'nilai' => $_POST['nilai'],
			'objek_pajak' => $objek_pajak,
			'jenis_pajak' => $_POST['jenis_pajak1'],
			'kode_pajak' => $_POST['kode_pajak1'],
			'kode_map1' => $_POST['kode_map1'],
			'nama1' => $_POST['nama1'],
			'npwp1' => $_POST['npwp1'],
			'alamat1' => $_POST['alamat1'],
			'tarif1' => $_POST['tarif1'],
			'fas_pajak1' => $_POST['fas_pajak1'],
			'special_tarif1' => $_POST['special_tarif1'],
			'gross1' => $_POST['gross1'],
			'dpp1' => $_POST['dpp1'],
			'dpp_gross1' => $_POST['dpp_gross1'],
			'pajak_terutang1' => $_POST['pajak_terutang1'],
			'masa_pajak1' => $_POST['masa_pajak1'],
			'keterangan1' => $_POST['keterangan1'],
			'tahun1' => $_POST['tahun1']
			
		);

		$this->Dashboard_model->updatetax($add);*/
		$this->Dashboard_model->updatepay($add[status],$add[nomor_surat],$add[handled_by],$add[rejected_by],$add[rejected_date],$add[note]);

		redirect('Dashboard/my_task');
	}

	public function getTax($id_payment){
		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();
		$data['gprocess'] = $this->Dashboard_model->getProcessing();
		$data['tax'] = $this->Dashboard_model->getTax();
		
		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/getTax', $data);
	}


	public function dp()
	{
		
		$data['active1'] = '';
		$data['active2'] = 'active';
		$data['active3'] = '';

		$data['directpayment'] 	= $this->Home_model->getVdp();	
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
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

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['advancerequest'] = $this->Home_model->getVar();
		$data['reject'] = $this->Home_model->notifRejected();
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

		$data['settlement'] = $this->Home_model->getVasr();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
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

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
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
		
		$data['outstan'] = $this->Home_model->getOp();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
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
		
		$data['draftreq'] = $this->Home_model->getVdraftrequest();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/list_dr', $data);
	}

	public function monitoring(){
		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['list_monitoring'] = $this->Dashboard_model->monitoring();
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();
		$data['gprocess'] = $this->Dashboard_model->getProcessing();
		$data['tax'] = $this->Dashboard_model->getTax();
		$data['finance'] = $this->Dashboard_model->getFinance();
		$data['review'] = $this->Dashboard_model->getWaitReview();
		
		$data['wverifikasi'] = $this->Dashboard_model->getWaitVerifikasi();
		$data['verifikasi'] = $this->Dashboard_model->getVerifikasi();

		$data['wApproval'] = $this->Dashboard_model->getWaitApproval();
		$data['approval'] = $this->Dashboard_model->getApproval();
		
		$data['wPaid'] = $this->Dashboard_model->getWaitPaid();
		$data['Paid'] = $this->Dashboard_model->getPaid();


		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/monitoring', $data);
	}

	function periode_monitoring(){
		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['list_monitoring'] = $this->Dashboard_model->monitoring();
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();
		$data['gprocess'] = $this->Dashboard_model->getProcessing();
		$data['tax'] = $this->Dashboard_model->getTax();
		$data['finance'] = $this->Dashboard_model->getFinance();
		$data['review'] = $this->Dashboard_model->getWaitReview();
		
		$data['wverifikasi'] = $this->Dashboard_model->getWaitVerifikasi();
		$data['verifikasi'] = $this->Dashboard_model->getVerifikasi();

		$data['wApproval'] = $this->Dashboard_model->getWaitApproval();
		$data['approval'] = $this->Dashboard_model->getApproval();
		
		$data['wPaid'] = $this->Dashboard_model->getWaitPaid();
		$data['Paid'] = $this->Dashboard_model->getPaid();


		$data['start_date'] = $this->input->post("start_date");
		$data['end_date'] = $this->input->post("end_date");

		$data['list_monitoring'] = $this->Dashboard_model->periode($data['start_date'],$data['end_date']);
		$data['jumlah'] = count($data['list_monitoring']);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/monitoring', $data);
	}

	public function List_or(){

		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_or', $data);
	}

	public function List_upt(){
		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['tax'] = $this->Dashboard_model->getVTax();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_upt', $data);
	}

	public function List_upf(){
		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['finance'] = $this->Dashboard_model->getVFinance();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_upf', $data);
	}

	public function List_wfr(){
		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['review'] = $this->Dashboard_model->getVReview();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfr', $data);
	}
	
	public function List_wfv(){

		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['vwaitverif'] = $this->Dashboard_model->getVWaitVerifikasi();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfv', $data);
	}

	public function List_wfa(){

		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['vwaitapprov'] = $this->Dashboard_model->getVWaitApproval();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfa', $data);
	}

	public function List_wfp(){

		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['vwaitpaid'] = $this->Dashboard_model->getVWaitPaid();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfp', $data);
	}

	public function List_pr(){

		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['vpaid'] = $this->Dashboard_model->getVPaid();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_pr', $data);
	}

	public function my_task()
	{
		$usr = $this->session->userdata("username");

		$data['active1'] = '';
		$data['active2'] = '';
		$data['task'] = 'active';
		$data['active4'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['mytask'] = $this->Dashboard_model->getmyTask();
		$data['mytask1'] = $this->Dashboard_model->getmyTask1();
		$data['mytask2'] = $this->Dashboard_model->getmyTask2();
		$data['getApprovalDivHead'] = $this->Dashboard_model->getApprovalDivHead();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/my_task', $data);
	}

	public function wait_for_approval(){

		$data['active1'] = '';
		$data['active2'] = '';
		$data['waiting_approval'] = 'active';
		$data['active4'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['mytask'] = $this->Dashboard_model->getmyTask();
		$data['mytask1'] = $this->Dashboard_model->getmyTask1();
		$data['mytask2'] = $this->Dashboard_model->getmyTask2();
		$data['getApprovalDivHead'] = $this->Dashboard_model->getApprovalDivHead();
		
		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/wait_approval', $data);
	}

	public function my_inbox()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['active2'] = '';
		$data['active3'] = '';
		$data['inbox'] = 'active';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['rejected'] = $this->Home_model->getRejected();
		$data['returnedverif'] = $this->Dashboard_model->getReturnedVerif();
		$data['returnedapprov'] = $this->Dashboard_model->getReturnedApprov();
		$data['returnedusr'] = $this->Dashboard_model->getReturnedUser();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/my_inbox', $data);
	}

	public function form_add()
	{
		$data['dashboard'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['bank'] =$this->Home_model->getBank();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['data_vendor'] = $this->Dashboard_model->getDataVendor();

		$this->load->view('akses/csf/header_csf', $data);	
        $this->load->view('akses/csf/form_pengajuan', $data);
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
			'status' => 0,
			'id_user' => $_POST['id_user'],
			'nomor_surat' => $_POST['nomor_surat'],
			'jenis_pembayaran' => $jenis_pembayaran,
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
			'jumlah2' => $_POST['jumlah2'],
			'jumlah3' => $_POST['jumlah3'],
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
			'lainnya1' => $_POST['lainnya1'],
			'lainnya2' => $_POST['lainnya2']
		);

		$this->session->set_flashdata('msg', 'Berhasil ditambahkan!');	
		$this->Home_model->addpayment($add);
			
		// redirect('Dashboard');
		echo json_encode(array("status" => TRUE));
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
			'penerima' => $_POST['penerima'],
			'vendor' => $_POST['vendor'],
			'akun_bank' => $_POST['akun_bank'],
			'no_rekening' => $_POST['no_rekening'],
			'lainnya1' => $_POST['lainnya1'],
			'lainnya2' => $_POST['lainnya2']
		);
		
		$this->session->set_flashdata('msg', 'Berhasil disimpan!');
		$this->Home_model->updatepayment($upd);

		redirect(site_url('Dashboard/formfinished/'.$id_apa));
	}

	public function draftprintdp($id_payment){

		$upd = array(
			'id_payment' => $id_payment,
			'status' => 1
		);
		
		$this->Dashboard_model->updateprint($upd);

		redirect('Dashboard/report_dp/'.$id_payment);
	}

	public function draftprint($id_payment){

		$upd = array(
			'id_payment' => $id_payment,
			'status' => 1
		);

		$this->Dashboard_model->updateprint($upd);

		redirect('Dashboard/report/'.$id_payment);
	}

	public function deletepayment(){

		$this->Home_model->deletepayment($_POST['id_payment']);

		redirect('Dashboard');

	}

	public function formfinished($id_payment)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$sid = $this->session->userdata("id_user");

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['bank'] = $this->Home_model->getBank();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['data_vendor'] = $this->Dashboard_model->getDataVendor();

		$this->load->view('akses/csf/header_csf', $data);	
       	$this->load->view('akses/csf/form_finished', $data);

	}

	public function form_view($id_payment)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$sid = $this->session->userdata("id_user");

		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['payment'] = $this->Home_model->getPayment($sid);
		
		$this->load->view('akses/csf/header_csf', $data);	
        $this->load->view('akses/csf/form_view', $data);
	}

	function addpay(){
		$c_jp = count($_POST['type']);
		$type = "";
		for($i=0; $i<=$c_jp; $i++){
			$type .= $_POST['type'][$i].";";
		}

		// echo $type;
		// var_dump(count($_POST['type']));exit;
		if ($_POST['label1'] && $_POST['label2']){
			$status = 3;
			$note = "Telah melampui limit Outstanding Advance";
			$rejected_by = $this->session->userdata("username");
			$rejected_date = date('d-M-Y');
		}else{
			$status = 6;
		}

		$add = array(
			
			'id_payment' => $_POST['id_payment'],
			'status' => $status,
			'display_name' => $_POST['display_name'],
			'type' => $type,
			'tanggal' => $_POST['tanggal'],
			'pr_doc' => $_POST['pr_doc'],
			'apf_doc' => $_POST['apf_doc'],
			'apf1_doc' => $_POST['apf1_doc'],
			'nomor_surat' => $_POST['nomor_surat'],
			'kode_proyek' => $_POST['kode_proyek'],
			'tanggal_selesai' => $_POST['tanggal_selesai'],
			'division_id' => $_POST['division_id'],
			'label1' => $_POST['label1'],
			'label2' => $_POST['label2'],
			'cash_advance' => $_POST['cash_advance'],
			'cash_advance2' => $_POST['cash_advance2'],
			'cash_advance3' => $_POST['cash_advance3'],
			'piutang' => $_POST['piutang'],
			'piutang2' => $_POST['piutang2'],
			'piutang3' => $_POST['piutang3'],
			'total_expenses' => $_POST['total_expenses'],
			'total_expenses2' => $_POST['total_expenses2'],
			'total_expenses3' => $_POST['total_expenses3'],
			'description' => $_POST['description'],
			'description2' => $_POST['description2'],
			'description3' => $_POST['description3'],
			'description4' => $_POST['description4'],
			'description5' => $_POST['description5'],
			'description6' => $_POST['description6'],
			'description7' => $_POST['description7'],
			'description8' => $_POST['description8'],
			'description9' => $_POST['description9'],
			'description10' => $_POST['description10'],		
			'description11' => $_POST['description11'],
			'description12' => $_POST['description12'],
			'currency' => $_POST['currency'],
			'currency1' => $_POST['currency1'],
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
			'jumlah' => $_POST['jumlah'],
			'jumlah1' => $_POST['jumlah1'],
			'jumlah2' => $_POST['jumlah2'],
			'jumlah3' => $_POST['jumlah3'],
			'jumlah4' => $_POST['jumlah4'],
			'jumlah5' => $_POST['jumlah5'],
			'jumlah6' => $_POST['jumlah6'],
			'jumlah7' => $_POST['jumlah7'],
			'jumlah8' => $_POST['jumlah8'],
			'jumlah9' => $_POST['jumlah9'],
			'jumlah10' => $_POST['jumlah10'],
			'jumlah11' => $_POST['jumlah11'],
			'jumlah12' => $_POST['jumlah12'],
			'terbilang' => $_POST['terbilang'],
			'terbilang2' => $_POST['terbilang2'],
			'terbilang3' => $_POST['terbilang3'],
			'dibayar_kepada' => $_POST['dibayar_kepada'],
			'verified_date' => $_POST['verified_date'],
			'penanggung_jawab' => $_POST['penanggung_jawab'],
			'jabatan' => $_POST['jabatan'],
			'metode_pembayaran' => $_POST['metode_pembayaran'],
			'bank' => $_POST['bank'],
			'no_rek' => $_POST['no_rek'],
			'persetujuan_pembayaran1' => $_POST['persetujuan_pembayaran1'],
			'persetujuan_pembayaran2' => $_POST['persetujuan_pembayaran2'],
			'persetujuan_pembayaran3' => $_POST['persetujuan_pembayaran3'],
			'jabatan1' => $_POST['jabatan1'],
			'jabatan2' => $_POST['jabatan2'],
			'jabatan3' => $_POST['jabatan3'],
			'catatan' => $_POST['catatan'],			
			'handled_by' => $_POST['handled_by'],
			'rejected_by' => $rejected_by,
			'rejected_date' => $rejected_date,
			'note' => $note

		);

		$this->Dashboard_model->addpay($add);
		$this->Dashboard_model->updatepay($add[status],$add[nomor_surat],$add[handled_by],$add[rejected_by],$add[rejected_date],$add[note]);
		redirect('Dashboard/monitoring');
	}

	function edit_pay(){
		
		$c_pembayaran = count($_POST['total_expenses']);
		$total_expenses = "";
		for($i=0; $i<=$c_pembayaran; $i++){
			$total_expenses .= $_POST['total_expenses'][$i].", ";
		}		
		// var_dump($_POST['rejected_by']);exit;
		if ($_POST['status'] == 5 && $_POST['rejected_by'] != NULL){
			$status = 6;
			$handled_by = "i.akmal";
			$rejected_by = "";
			// $nomor_surat = 
		}else if($_POST['status'] == 6){
			$status = 6;
			$handled_by = "i.akmal";
		}else if($_POST['status'] == 7){
			$status = 7;
			$handled_by = "h.harlina";
		}

		// echo $type;
		// var_dump(count($_POST['type']));exit;
		$upd = array(
					
			
			'id' => $_POST['id'],
			'display_name' => $_POST['display_name'],
			'tanggal' => $_POST['tanggal'],
			'pr_doc' => $_POST['pr_doc'],
			'apf_doc' => $_POST['apf_doc'],
			'apf1_doc' => $_POST['apf1_doc'],
			'kode_proyek' => $_POST['kode_proyek'],
			'tanggal_selesai' => $_POST['tanggal_selesai'],
			'division_id' => $_POST['division_id'],
			'label1' => $_POST['label1'],
			'cash_advance' => $_POST['cash_advance'],
			'piutang' => $_POST['piutang'],
			'total_expenses' => $_POST['total_expenses'],
			'total_expenses2' => $_POST['total_expenses2'],
			'total_expenses3' => $_POST['total_expenses3'],
			'description' => $_POST['description'],
			'description2' => $_POST['description2'],
			'description3' => $_POST['description3'],
			'description4' => $_POST['description4'],
			'description5' => $_POST['description5'],
			'description6' => $_POST['description6'],
			'description7' => $_POST['description7'],
			'description8' => $_POST['description8'],
			'description9' => $_POST['description9'],
			'description10' => $_POST['description10'],		
			'description11' => $_POST['description11'],
			'description12' => $_POST['description12'],
			'jumlah' => $_POST['jumlah'],
			'jumlah1' => $_POST['jumlah1'],
			'jumlah2' => $_POST['jumlah2'],
			'jumlah3' => $_POST['jumlah3'],
			'jumlah4' => $_POST['jumlah4'],
			'jumlah5' => $_POST['jumlah5'],
			'jumlah6' => $_POST['jumlah6'],
			'jumlah7' => $_POST['jumlah7'],
			'jumlah8' => $_POST['jumlah8'],
			'jumlah9' => $_POST['jumlah9'],
			'jumlah10' => $_POST['jumlah10'],
			'jumlah11' => $_POST['jumlah11'],
			'jumlah12' => $_POST['jumlah12'],
			'terbilang' => $_POST['terbilang'],
			'terbilang2' => $_POST['terbilang2'],
			'terbilang3' => $_POST['terbilang3'],
			'dibayar_kepada' => $_POST['dibayar_kepada'],
			'verified_date' => $_POST['verified_date'],
			'catatan' => $_POST['catatan'],
			'status' => $status,
			'nomor_surat' => $_POST['nomor_surat'],
			'handled_by' => $handled_by,
			'rejected_by' => $rejected_by

		);
		// var_dump($_POST['nomor_surat']);exit;

		$this->Dashboard_model->edit_pay($upd);
		$this->Dashboard_model->send_back($upd,$upd[status],$upd[handled_by],$upd[rejected_by]);
		redirect('Dashboard/my_task');
	}
	
	function updpay(){
		$c_jp = count($_POST['type']);
		$type = "";
		for($i=0; $i<=$c_jp; $i++){
			$type .= $_POST['type'][$i].";";
		}

		$upd = array(
			
			'id' => $_POST['id'],
			'status' => $_POST['status'],
			'nomor_surat' => $_POST['nomor_surat'],
			'handled_by' => $_POST['handled_by'],

		);

		$this->Dashboard_model->updpay($upd);
		$this->Dashboard_model->rejectapf($upd[status],$upd[nomor_surat],$upd[handled_by],$upd[rejected_by],$upd[rejected_date],$upd[note]);
			
		redirect('Dashboard/my_task');
	}

	function rejectapf(){
		$c_jp = count($_POST['type']);
		$type = "";
		for($i=0; $i<=$c_jp; $i++){
			$type .= $_POST['type'][$i].";";
		}

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
			
		redirect('Dashboard/my_task');
	}

	function rejectreq(){
		$c_jp = count($_POST['type']);
		$type = "";
		for($i=0; $i<=$c_jp; $i++){
			$type .= $_POST['type'][$i].";";
		}

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
			
		redirect('Dashboard/my_task');
	}

	function deletepay(){

		$this->Dashboard_model->deletepay($_POST['id']);

		redirect('Dashboard');

	}

	public function currency(){
		$data['active1'] = '';
		$data['active2'] = '';
		$data['currency'] = 'active';

		$data['currency'] = $this->SuperAdm_model->getCurrency();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();

		$this->load->view('akses/csf/header_csf', $data);
        $this->load->view('akses/csf/currency', $data);
	}

	public function addcurr(){
		$add = array(

			'mata_uang' => $_POST['mata_uang'],
			'currency' => $_POST['currency'],
			'kurs' => $_POST['kurs']
			
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
			'currency' => $_POST['currency'],
			'kurs' => $_POST['kurs']
		);

		$this->SuperAdm_model->updatecurr($upd);

		redirect('SuperAdm/currency');
	}

	public function bank(){
		$data['active1'] = '';
		$data['active2'] = '';
		$data['bank'] = 'active';

		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['bank'] = $this->SuperAdm_model->getBank();

		$this->load->view('akses/csf/header_csf', $data);
        $this->load->view('akses/csf/bank', $data);
	}

	public function addbank(){
		$add = array(

			'nama_bank' => $_POST['nama_bank'],
			'singkatan' => $_POST['singkatan']
			
		);

		$this->SuperAdm_model->addbank($add);

		redirect('Dashboard/bank');
	}

	public function deletebank(){
		
		$this->SuperAdm_model->deletebank($_POST['id_bank']);

		redirect('Dashboard/bank');

	}

	public function updatebank(){
		$upd = array(
			'id_bank' => $_POST['id_bank'],
			'nama_bank' => $_POST['nama_bank'],
			'singkatan' => $_POST['singkatan']
		);

		$this->SuperAdm_model->updatebank($upd);

		redirect('Dashboard/bank');
	}
	
	function DataPajak(){
		$data['active1'] = '';
		$data['d_pajak'] = 'active';
		$data['active3'] = '';

		$data['getDataPajak'] = $this->Dashboard_model->getPajak();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/data_pajak', $data);
		
	}

	public function addpajak(){
		$add = array(

			'jenis_pajak' => $_POST['jenis_pajak'],
			
		);

		$this->Dashboard_model->addpajak($add);

		redirect('Dashboard/DataPajak');
	}

	public function deletepajak(){
		
		$this->Dashboard_model->deletepajak($_POST['id_jenis_pjk']);

		redirect('Dashboard/DataPajak');

	}

	public function updatepajak(){
		$upd = array(
			'id_jenis_pjk' => $_POST['id_jenis_pjk'],
			'jenis_pajak' => $_POST['jenis_pajak'],
		);

		$this->Dashboard_model->updatepajak($upd);

		redirect('Dashboard/DataPajak');
	}

	function kode_bukpot(){
		$data['active1'] = '';
		$data['d_kode_bukpot'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['getDatakode_bukpot'] = $this->Dashboard_model->getkode_bukpot();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/data_bukpot', $data);
	}

	function addbukpot(){
		$add = array(

			'nama_objek_pajak' => $_POST['nama_objek_pajak'],
			'kode_objek_pajak' => $_POST['kode_objek_pajak'],
			
		);

		$this->Dashboard_model->addbukpot($add);

		redirect('Dashboard/kode_bukpot');
	}

	function deletebukpot(){
		
		$this->Dashboard_model->deletebukpot($_POST['id_bukpot']);

		redirect('Dashboard/kode_bukpot');

	}

	function updatebukpot(){
		$upd = array(
			'id_bukpot' => $_POST['id_bukpot'],
			'kode_objek_pajak' => $_POST['kode_objek_pajak'],
			'nama_objek_pajak' => $_POST['nama_objek_pajak'],
		);

		$this->Dashboard_model->updatebukpot($upd);

		redirect('Dashboard/kode_bukpot');
	}

	function kode_map(){
		$data['active1'] = '';
		$data['d_kode_map'] = 'active';
		$data['active3'] = '';

		$data['getDatakode_map'] = $this->Dashboard_model->getkode_map();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['reject'] = $this->Home_model->notifRejected();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/data_kodemap', $data);
	}

	function addkodemap(){
		$add = array(

			'keterangan' => $_POST['keterangan'],
			'kode_map' => $_POST['kode_map'],
			'jenis_pajak' => $_POST['jenis_pajak'],
			
		);

		$this->Dashboard_model->addkodemap($add);

		redirect('Dashboard/kode_map');
	}

	function deletekodemap(){
		
		$this->Dashboard_model->deletekodemap($_POST['id_map']);

		redirect('Dashboard/kode_map');

	}

	function updatekodemap(){
		$upd = array(
			'id_map' => $_POST['id_map'],
			'kode_map' => $_POST['kode_map'],
			'jenis_pajak' => $_POST['jenis_pajak'],
			'keterangan' => $_POST['keterangan'],
		);

		$this->Dashboard_model->updatekodemap($upd);

		redirect('Dashboard/kode_map');
	}
	
	public function form_info_tax($id_payment){		
		$data['ppayment']=$this->Home_model->getform($id_payment);
		$data['process_tax']=$this->Dashboard_model->getProcessTax2($id_payment);
		$data['process_tax_H']=$this->Dashboard_model->getProcessTaxHeader($id_payment);
		$data['getdatanontax']=$this->Dashboard_model->getDataNonTax($id_payment);
		$this->load->view('akses/csf/form_info_tax', $data);
	}
	
	//public function gettarifbytax($id){
	public function gettarifbytax(){
		$id=$this->input->post('selJnsPjk');
		$data['tarif'] = $this->Dashboard_model->getTarifByTax($id);
		echo json_encode($data);
	}
	
	//public function getkodemapbytax($id){
	public function getkodemapbytax(){
		$id=$this->input->post('selJnsPjk');
		
		$data['kodemap'] = $this->Dashboard_model->getkodeMapbytax($id);
		echo json_encode($data);
	}
	
	public function gettabletax($id){
		$data = $this->Dashboard_model->getDataTax($id);
		echo json_encode($data);
	}
	
	public function savetaxdraft()
	{
		$id = $this->input->post('id_payment');
		$data = array(
				'id_payment' => $this->input->post('id_payment'),
				'status' => 999,
				'handled_by' => $this->input->post('handled_by'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'de' => $this->input->post('vdeductible'),
				'opsional' => $this->input->post('voptional'),
				'nilai' => $this->input->post('nilai'),
				'objek_pajak' => $this->input->post('vobjekpajak'),
				'jenis_pajak' => $this->input->post('vjnspjk'),
				'kode_pajak' => $this->input->post('vkdpjk'),
				'kode_map' => $this->input->post('selKdMap'),
				'nama' => $this->input->post('txtnamanpwp'),
				'npwp' => $this->input->post('txtnonpwp'),
				'alamat' => $this->input->post('txtalamat'),
				'tarif' => $this->input->post('vtarif'),
				'fas_pajak' => $this->input->post('txtfasilitas'),
				'special_tarif' => $this->input->post('vtarifspesial'),
				'gross' => $this->input->post('vgross'),
				'dpp' => $this->input->post('txtdpp'),
				'dpp_gross' => $this->input->post('txtdppgross'),
				'pajak_terutang' => $this->input->post('vpajakterhutang'),
				'masa_pajak' => $this->input->post('selmasappn'),
				'keterangan' => $this->input->post('txtketerangan'),
				'tahun' => $this->input->post('seltahunppn'),
				'no_urut' => $this->input->post('txtnourut')
			);
		$insert = $this->Dashboard_model->drafttax_add($data);
		$data = $this->Dashboard_model->getDataTax($id);
		//echo json_encode(array("status" => TRUE));
		echo json_encode($data);
	}

	public function savenontax()
	{
		$strcounter=intval($_POST['txtcounternontax']);
		$id = $this->input->post('id_payment');
		$this->Dashboard_model->delete_nontax($id);
		for($i=0; $i<$strcounter; $i++){
			$nominal=preg_replace("/[^0-9]/", "", $_POST['nontaxnominal'][$i] );
			if($nominal != ""){
				$data = array(
						'id_payment' => $id,
						'status' => '999',
						'item_desc' => $_POST['itemdesc'][$i],
						'nominal' => number_format($nominal,0,",",".")
					);
					
				$insert = $this->Dashboard_model->draftnontax_add($data);
			}
		}
		$data = $this->Dashboard_model->getDataNonTax($id);
		echo json_encode($data);
	}
	
	public function delete_tax()
	{
		$id_payment=$this->input->post('id_payment');		
		$id_tax=$this->input->post('id_tax');	
		
		$this->Dashboard_model->delete_tax($id_tax);
		$data = $this->Dashboard_model->getDataTax($id_payment);
		echo json_encode($data);
	}
	
	public function submittax()
	{
		$data = array(
					'status' => 5,
					'handled_by' => $this->input->post('handled_by'),
					'nomor_surat' => $this->input->post('nomor_surat')		
					);
		$this->Dashboard_model->updatepaytax(array('id_payment' => $this->input->post('id_payment')), $data);
		$this->Dashboard_model->updatestatustax(array('id_payment' => $this->input->post('id_payment')), $data);
		echo json_encode(array("status" => TRUE));
	}
	
	public function caridatadashboard()
	{
			$profileid=$this->input->post('selsearch');
			$txtsearch=$this->input->post('txtpencarian');
			$data = $this->Dashboard_model->getdatabysearch($profileid,$txtsearch);
			echo json_encode($data);
	}

	public function exportdashboard()
	{
			$profileid=$this->input->post('selexport');
			// $txtsearch=$this->input->post('txtpencarian');
			$data = $this->Dashboard_model->getdatabysearch($profileid);
			echo json_encode($data);
	}
	
	public function tax_edit($id_tax)
	{
		$data= $this->Dashboard_model->get_tax_by_nourut($id_tax);
		echo json_encode($data);
	}
	
	public function updatetaxdraft()
	{
		/*$id = $this->input->post('id_payment');
		$idtax = $this->input->post('id_tax');
		$urutnew = $this->input->post('txtnourut');						
		$data = array(
				'no_urut' => $urutnew,
		);*/
		$id = $this->input->post('id_payment');
		$idtax = $this->input->post('id_tax');
		$data = array(
				'de' => $this->input->post('vdeductible'),
				'opsional' => $this->input->post('voptional'),
				'nilai' => $this->input->post('nilai'),
				'objek_pajak' => $this->input->post('vobjekpajak'),
				'jenis_pajak' => $this->input->post('vjnspjk'),
				'kode_pajak' => $this->input->post('vkdpjk'),
				'kode_map' => $this->input->post('selKdMap'),
				'nama' => $this->input->post('txtnamanpwp'),
				'npwp' => $this->input->post('txtnonpwp'),
				'alamat' => $this->input->post('txtalamat'),
				'tarif' => $this->input->post('vtarif'),
				'fas_pajak' => $this->input->post('txtfasilitas'),
				'special_tarif' => $this->input->post('vtarifspesial'),
				'gross' => $this->input->post('vgross'),
				'dpp' => $this->input->post('txtdpp'),
				'dpp_gross' => $this->input->post('txtdppgross'),
				'pajak_terutang' => $this->input->post('vpajakterhutang'),
				'masa_pajak' => $this->input->post('selmasappn'),
				'keterangan' => $this->input->post('txtketerangan'),
				'tahun' => $this->input->post('seltahunppn'),
				'no_urut' => $this->input->post('txtnourut')
			);
		
		
		$dataH = array(
				'de' => $this->input->post('vdeductible'),
				'opsional' => $this->input->post('voptional'),
				'nilai' => $this->input->post('nilai'),
				'objek_pajak' => $this->input->post('vobjekpajak')
			);
		
		$this->Dashboard_model->tax_update('t_tax',array('id_tax' => $idtax), $data);		
		$this->Dashboard_model->tax_update('t_tax',array('id_payment' => $id), $dataH);
		$data = $this->Dashboard_model->getDataTax($id);
		
		echo json_encode($data);
	}
	
	
	public function getnourut($id_payment)
	{
		$data= $this->Dashboard_model->getUrutTax($id_payment);
		echo json_encode($data);
	}
	
	public function all_detail_payment($id)
	{
		$sid = $this->session->userdata("id_user");
		$data['dashboard'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';
		
		$data['notif_task'] = $this->Dashboard_model->notifTask();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
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

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/view_detail', $data);
	}

	
}