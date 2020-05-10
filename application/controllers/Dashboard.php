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
		
		$data['dashboard'] = 'active';
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
		$data['submit'] = $this->Home_model->getSubmitted();
		$data['process'] = $this->Home_model->getProcessing();
		$data['verifikasi'] = $this->Home_model->getWaitVerifikasi();
		$data['approval'] = $this->Home_model->getWaitApproval();
		$data['paid'] = $this->Home_model->getWaitPaid();
		
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
		$this->load->view('akses/csf/form_sp3', $data);
	}

	public function form_arf(){

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_arf', $data);
	}

	public function form_asf(){

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat'] = $this->Dashboard_model->nomorsurat();
		// $data['csf'] = $this->Dashboard_model->getAdminCSF();
		// $data['ppayment'] = $this->Home_model->getform($id_payment);
		// $data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_asf', $data);
	}

	public function form_prf(){

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat'] = $this->Dashboard_model->nomorsurat();
		// $data['csf'] = $this->Dashboard_model->getAdminCSF();
		// $data['ppayment'] = $this->Home_model->getform($id_payment);
		// $data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_prf', $data);
	}

	public function form_crf(){

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat'] = $this->Dashboard_model->nomorsurat();
		// $data['csf'] = $this->Dashboard_model->getAdminCSF();
		// $data['ppayment'] = $this->Home_model->getform($id_payment);
		// $data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_crf', $data);
	}

	public function accept(){

		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 2
		);

		$this->Dashboard_model->updateaccept($upd);

		redirect('Dashboard/monitoring');
	}

	public function rejected(){

		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 3,
			'note' => $_POST['note'],
			'rejected_by' => $_POST['rejected_by'],
			'rejected_date' => $_POST['rejected_date'],
			
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

		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['payment'] = $this->Dashboard_model->payment();
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

	public function List_or(){

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_or', $data);
	}

	public function List_upt(){

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_upt', $data);
	}

	public function List_upf(){

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_upf', $data);
	}

	public function List_wfr(){

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfr', $data);
	}
	
	public function List_wfv(){

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfv', $data);
	}

	public function List_wfa(){

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfa', $data);
	}

	public function List_wfp(){

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_wfp', $data);
	}

	public function List_pr(){

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/mr_pr', $data);
	}

	public function my_task()
	{
		$sid = $this->session->userdata("username");

		$data['active1'] = '';
		$data['active2'] = '';
		$data['task'] = 'active';
		$data['active4'] = '';

		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['mytask'] = $this->Dashboard_model->getmyTask();
		$data['mytask1'] = $this->Dashboard_model->getmyTask1();

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


		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/my_inbox', $data);
	}

	function addpay(){
		$add = array(
			
			'id_pay' => $_POST['id_pay'],
			'status' => 4,
			'display_name' => $_POST['display_name'],
			'type' => $_POST['type'],
			'tanggal' => $_POST['tanggal'],
			'arf_doc' => $_POST['arf_doc'],
			'asf_doc' => $_POST['asf_doc'],
			'prf_doc' => $_POST['prf_doc'],
			'crf_doc' => $_POST['crf_doc'],
			'nomor_surat' => $_POST['nomor_surat'],
			'kode_proyek' => $_POST['kode_proyek'],
			'kode_proyek' => $_POST['kode_proyek'],
			'tanggal_selesai' => $_POST['tanggal_selesai'],
			'division_id' => $_POST['division_id'],
			'label1' => $_POST['label1'],
			'description' => $_POST['description'],
			'currency' => $_POST['currency'],
			'jumlah' => $_POST['jumlah'],
			'terbilang' => $_POST['terbilang'],
			'dibayar_kepada' => $_POST['dibayar_kepada'],
			'verified_date' => $_POST['verified_date'],
			'penanggung_jawab' => $_POST['penanggung_jawab'],
			'jabatan' => $_POST['jabatan'],
			'persetujuan_pembayaran1' => $_POST['persetujuan_pembayaran1'],
			'persetujuan_pembayaran2' => $_POST['persetujuan_pembayaran2'],
			'persetujuan_pembayaran3' => $_POST['persetujuan_pembayaran3'],
			'jabatan1' => $_POST['jabatan1'],
			'jabatan2' => $_POST['jabatan2'],
			'jabatan3' => $_POST['jabatan3'],
			'catatan' => $_POST['catatan']

		);

		$this->Dashboard_model->addpay($add);
		$this->Dashboard_model->updatepay($add[status],$add[nomor_surat]);
		redirect('Dashboard');
	}
	
	function updpay(){
		$upd = array(
			
			'id' => $_POST['id'],
			'status' => $_POST['status'],
			'display_name' => $_POST['display_name'],
			'tanggal' => $_POST['tanggal'],
			'arf_doc' => $_POST['arf_doc'],
			'asf_doc' => $_POST['asf_doc'],
			'prf_doc' => $_POST['prf_doc'],
			'crf_doc' => $_POST['crf_doc'],
			'nomor_surat' => $_POST['nomor_surat'],
			'kode_proyek' => $_POST['kode_proyek'],
			'kode_proyek' => $_POST['kode_proyek'],
			'tanggal_selesai' => $_POST['tanggal_selesai'],
			'division_id' => $_POST['division_id'],
			'label1' => $_POST['label1'],
			'description' => $_POST['description'],
			'currency' => $_POST['currency'],
			'jumlah' => $_POST['jumlah'],
			'terbilang' => $_POST['terbilang'],
			'dibayar_kepada' => $_POST['dibayar_kepada'],
			'verified_date' => $_POST['verified_date'],
			'penanggung_jawab' => $_POST['penanggung_jawab'],
			'jabatan' => $_POST['jabatan'],
			'persetujuan_pembayaran1' => $_POST['persetujuan_pembayaran1'],
			'persetujuan_pembayaran2' => $_POST['persetujuan_pembayaran2'],
			'persetujuan_pembayaran3' => $_POST['persetujuan_pembayaran3'],
			'jabatan1' => $_POST['jabatan1'],
			'jabatan2' => $_POST['jabatan2'],
			'jabatan3' => $_POST['jabatan3'],
			'catatan' => $_POST['catatan']

		);

		$this->Dashboard_model->updpay($upd);
			
		redirect('Dashboard');
	}

	function deletepay(){

		$this->Dashboard_model->deletepay($_POST['id']);

		redirect('Dashboard');

	}
}