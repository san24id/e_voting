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
		$data['creditcard'] = $this->Dashboard_model->getCreditCard();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['outstanding'] = $this->Home_model->getOutstanding();
		$data['draftprint'] = $this->Home_model->getDraftPrint();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['apayment'] = $this->Dashboard_model->payment();
		$data['mytask'] = $this->Dashboard_model->getmyTask();
		$data['submit'] = $this->Home_model->getSubmitted();
		$data['process'] = $this->Home_model->getProcessing();
		$data['verifikasi'] = $this->Home_model->getVerifikasi();
		$data['upcoming_over'] = $this->Dashboard_model->getUpcomingOverdue();
		$data['approval'] = $this->Home_model->getApproval();
		$data['paid'] = $this->Home_model->getPaid();
				
		$data['start_date'] = $this->input->post("start_date");
		$data['end_date'] = $this->input->post("end_date");

		$data['payment'] = $this->Dashboard_model->periode2($data['start_date'],$data['end_date']);
		$data['jumlah'] = count($data['payment']);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/dashboard_csf', $data);
	}

	public function report2($id_payment)	{

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
		$this->load->view('akses/report/print2', $data);

		// $html = $this->load->view('akses/report/print', $data, true);
	 
		// $this->pdfgenerator->generate($html,'Form_SP3');
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

	public function report_pajak(){
		
		$data['active1'] = '';
		$data['report_pajak'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['report'] = $this->Dashboard_model->report_pajak();
		// $data['report_view'] = $this->Dashboard_model->report_view($id_pajak);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/report_pajak', $data);
	}

	public function report_view($id_pajak){
		
		$data['active1'] = '';
		$data['report_pajak'] = 'active';
		$data['active3'] = '';

		// $data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['reject'] = $this->Home_model->notifRejected();
		$data['report'] = $this->Dashboard_model->report_pajak();
		$data['vreport'] = $this->Dashboard_model->report_view($id_pajak);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/report_view', $data);
	}

	public function form_sp3($id_payment){

		$data['monitoring'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['process_tax'] = $this->Dashboard_model->getProcessTax($id_payment);
		// var_dump($data['process_tax']);exit;

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_sp3', $data);
	}

	public function form_arf($id_payment){

		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['arf_doc'] = $this->Dashboard_model->buat_kode_arf();

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
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_earf', $data);

	}

	public function report_arf($id)	{

		// $this->load->library('pdfgenerator');

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
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
		$data['surat1'] = $this->Dashboard_model->nomorsurat();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['payment'] = $this->Home_model->getform($id_payment);
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['asf_doc'] = $this->Dashboard_model->buat_kode_asf();
		$data['arf_doc'] = $this->Dashboard_model->buat_kode_arf();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_asf', $data);
	}

	public function form_asf2($id_payment){

		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat1'] = $this->Dashboard_model->nomorsurat();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['payment'] = $this->Home_model->getform($id_payment);
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['asf_doc'] = $this->Dashboard_model->buat_kode_asf();
		$data['arf_doc'] = $this->Dashboard_model->buat_kode_arf();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_asf2', $data);
	}

	public function form_vasf($id)
	{
		$data['task'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

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
		$data['reject'] = $this->Home_model->notifRejected();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_easf', $data);

	}

	public function report_asf($id)	{

		// $this->load->library('pdfgenerator');

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
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
		$data['reject'] = $this->Home_model->notifRejected();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['prf_doc'] = $this->Dashboard_model->buat_kode_prf();
		$data['currency'] = $this->Home_model->getCurrency();

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

		$data['reject'] = $this->Home_model->notifRejected();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['surat'] = $this->Dashboard_model->nomorsurat();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['crf_doc'] = $this->Dashboard_model->buat_kode_crf();


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
		$data['currency'] = $this->Home_model->getCurrency();
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

		$data['currency'] = $this->Home_model->getCurrency();
		$data['reject'] = $this->Home_model->notifRejected();
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
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		
		// $this->load->view('akses/user/header_user');
		$this->load->view('akses/report/print_crf', $data);

		// $html = $this->load->view('akses/report/print', $data, true);
	 
		// $this->pdfgenerator->generate($html,'Form_SP3');
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
			'handled_by' => $_POST['handled_by']

		);

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
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();
		$data['gprocess'] = $this->Dashboard_model->getProcessing();
		$data['tax'] = $this->Dashboard_model->getTax();
		$data['jenispajak'] = $this->Dashboard_model->getJenisPajak();
		$data['kodePajak']= $this->Dashboard_model->getKodePajak();
		$data['kodeMap'] = $this->Dashboard_model->getKodeMap();
		$data['vendor'] = $this->Dashboard_model->getDataVendor();
		$data['persen'] = $this->Dashboard_model->getTarif();
		// var_dump($data['tarif']);exit;
		
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
		$this->Dashboard_model->updatepay($add[status],$add[nomor_surat],$add[handled_by]);

		redirect('Dashboard/my_task');
	}

	public function getTax($id_payment){
		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['csf'] = $this->Dashboard_model->getAdminCSF();
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
		$data['reject'] = $this->Home_model->notifRejected();
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

		$data['reject'] = $this->Home_model->notifRejected();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
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

		$data['reject'] = $this->Home_model->notifRejected();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_or', $data);
	}

	public function List_upt(){
		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

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

		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['finance'] = $this->Dashboard_model->getVFinance();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_upf', $data);
	}

	public function List_wfr(){
		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
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
		$data['payment'] = $this->Dashboard_model->payment();
		$data['vwaitverif'] = $this->Dashboard_model->getVWaitVerifikasi();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfv', $data);
	}

	public function List_wfa(){

		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

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
		$data['payment'] = $this->Dashboard_model->payment();
		$data['vwaitpaid'] = $this->Dashboard_model->getVWaitPaid();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfp', $data);
	}

	public function List_pr(){

		$data['active1'] = '';
		$data['monitoring'] = 'active';
		$data['active3'] = '';

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
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['mytask'] = $this->Dashboard_model->getmyTask();
		$data['mytask1'] = $this->Dashboard_model->getmyTask1();
		$data['mytask2'] = $this->Dashboard_model->getmyTask2();
		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/my_task', $data);
	}

	public function my_inbox()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['active2'] = '';
		$data['active3'] = '';
		$data['inbox'] = 'active';

		$data['reject'] = $this->Home_model->notifRejected();
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
			
		redirect('Dashboard');
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

		redirect('Dashboard');
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

		$data['ppayment'] = $this->Home_model->getform($id_payment);
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
			'handled_by' => $_POST['handled_by']

		);

		$this->Dashboard_model->addpay($add);
		$this->Dashboard_model->updatepay($add[status],$add[nomor_surat],$add[handled_by]);
		redirect('Dashboard/monitoring');
	}

	function edit_pay(){
		
		$c_pembayaran = count($_POST['total_expenses']);
		$total_expenses = "";
		for($i=0; $i<=$c_pembayaran; $i++){
			$total_expenses .= $_POST['total_expenses'][$i].", ";
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
			'nomor_surat' => $_POST['nomor_surat'],
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
			'catatan' => $_POST['catatan']

		);

		$this->Dashboard_model->edit_pay($upd);
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
		$this->Dashboard_model->updatepay($upd[status],$upd[nomor_surat],$upd[handled_by]);
			
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

		$this->load->view('akses/csf/header_csf', $data);
        $this->load->view('akses/csf/currency', $data);
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
		$data['bank'] = 'active';


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