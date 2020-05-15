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
		$data['verifikasi'] = $this->Home_model->getVerifikasi();
		$data['approval'] = $this->Home_model->getApproval();
		$data['paid'] = $this->Home_model->getPaid();
		
		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/dashboard_csf', $data);
	}

	public function form_sp3($id_payment){

		$data['monitoring'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Home_model->getDivHead();


		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_sp3', $data);
	}

	public function form_arf(){

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat1'] = $this->Dashboard_model->nomorsurat();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_arf', $data);
	}

	public function form_earf($id)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_earf', $data);

	}

	public function form_asf(){

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat'] = $this->Dashboard_model->nomorsurat();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_asf', $data);
	}

	public function form_easf($id)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_easf', $data);

	}

	public function form_prf(){

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['surat'] = $this->Dashboard_model->nomorsurat();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		// $data['ppayment'] = $this->Home_model->getform($id_payment);
		// $data['surat'] = $this->Home_model->buat_kode();
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['currency'] = $this->Home_model->getCurrency();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_prf', $data);
	}

	public function form_eprf($id)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		// $sid = $this->session->userdata("id_user");

		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['ppayment'] = $this->Dashboard_model->getform($id);
		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['surat1'] = $this->Dashboard_model->nomorsurat();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_eprf', $data);

	}

	public function form_crf(){

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['divhead'] = $this->Dashboard_model->getDivHeadCSF();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['surat'] = $this->Dashboard_model->nomorsurat();
		$data['csf'] = $this->Dashboard_model->getAdminCSF();
		// $data['ppayment'] = $this->Home_model->getform($id_payment);
		// $data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_crf', $data);
	}

	public function form_ecrf($id)
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

		$this->load->view('akses/csf/header_csf', $data);
		$this->load->view('akses/csf/form_ecrf', $data);

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
		$data['currency'] = $this->Home_model->getCurrency();

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

		redirect('Dashboard');
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
		$add = array(
			
			'id_pay' => $_POST['id_pay'],
			'status' => 5,
			'display_name' => $_POST['display_name'],
			'type' => $type,
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
		redirect('Dashboard/monitoring');
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
			'catatan' => $_POST['catatan'],
			'handled_by' => $_POST['handled_by']

		);

		$this->Dashboard_model->updpay($upd);
		$this->Dashboard_model->updatepay($upd[status],$upd[nomor_surat]);
			
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