<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->load->model('Dashboard_model');

        $sid = $this->session->userdata("id_user");
		
        $this->load->library('session');
 		
 		if ($this->session->userdata('id_user')) {

		}else{

        	$this->session->sess_destroy();
			redirect('login', 'refresh');
		}

	}

	public function index()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['draftprint'] = $this->Home_model->getDraftPrint();
		$data['draft1'] = $this->Home_model->getDraft();
		$data['outstanding'] = $this->Home_model->getOutstanding();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['dp'] = $this->Home_model->getVdp();
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

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/dashboard_user', $data);
	}

	public function caridatadashboard()
	{
			$profileid=$this->input->post('selsearch');
			$txtsearch=$this->input->post('txtpencarian');
			$data = $this->Dashboard_model->getdatabysearch($profileid,$txtsearch);
			echo json_encode($data);
	}

	function periode(){
		$sid = $this->session->userdata("id_user");

		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['draft'] = $this->Home_model->getTotalDraft();
		$data['draftprint'] = $this->Home_model->getDraftPrint();
		$data['draft1'] = $this->Home_model->getDraft();
		$data['outstanding'] = $this->Home_model->getOutstanding();
		$data['tot_pay_req'] = $this->Home_model->getTotal();
		$data['pembayaran'] = $this->Home_model->getVPayment();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['dp'] = $this->Home_model->getVdp();
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

		$data['start_date'] = $this->input->post("start_date");
		$data['end_date'] = $this->input->post("end_date");

		$data['payment'] = $this->Dashboard_model->periode2($data['start_date'],$data['end_date']);
		$data['jumlah'] = count($data['payment']);

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/dashboard_user', $data);
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

	public function dp()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['dp'] = 'active';
		$data['active3'] = '';

		$data['directpayment'] 	= $this->Home_model->getVdp();	
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/list_dp', $data);
	}

	public function ar()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['ar'] = 'active';
		$data['active3'] = '';

		$data['advancerequest'] = $this->Home_model->getVar();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/list_ar', $data);
	}

	public function asr()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['asr'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['settlement'] = $this->Home_model->getVasr();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/list_asr', $data);
	}

	public function lop()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['lop'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/list_lop', $data);
	}

	public function op()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['op'] = 'active';
		$data['active3'] = '';

		$data['outstan'] = $this->Home_model->getOp();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/list_op', $data);
	}

	public function dr()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['dr'] = 'active';
		$data['active3'] = '';

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['draftreq'] = $this->Home_model->getVdraftrequest();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/list_dr', $data);
	}

	public function my_inbox()
	{
		$sid = $this->session->userdata("id_user");

		$data['active1'] = '';
		$data['active2'] = '';
		$data['active3'] = 'active';

		// $data['profil'] = $this->Home_model->getProfilProjek($sid, $_GET['filter_status']);
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['rejected'] = $this->Home_model->getRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/my_inbox', $data);
	}

	public function form_view($id_payment)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$sid = $this->session->userdata("id_user");

		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['payment'] = $this->Home_model->getPayment($sid);
		
		$this->load->view('akses/user/header_user', $data);	
        $this->load->view('akses/user/form_view', $data);
	}

	public function form_add()
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		//$data['daily'] = $this->Dashboard_model->getAll_DailyFlight();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['surat'] = $this->Home_model->buat_kode();
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['bank'] =$this->Home_model->getBank();
		$data['data_vendor'] = $this->Dashboard_model->getDataVendor();
		$data['currency'] = $this->Home_model->getCurrency();

		$this->load->view('akses/user/header_user', $data);	
        $this->load->view('akses/user/form_pengajuan', $data);
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
			
		redirect('Home');
	}

	public function draftprintdp($id_payment){

		$upd = array(
			'id_payment' => $id_payment,
			'status' => 1
		);

		$this->Dashboard_model->updateprint($upd);

		redirect('Home/report_dp/'.$id_payment);
	}

	public function draftprint($id_payment){

		$upd = array(
			'id_payment' => $id_payment,
			'status' => 1
		);

		$this->Dashboard_model->updateprint($upd);

		redirect('Home/report/'.$id_payment);
	}

	public function approve(){
		$upd = array(
			'id_payment' => $_POST['id_payment'],
			'status' => 11
		);

		$this->Dashboard_model->approve($upd);

		redirect('Home');

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

		redirect('Home');
	}

	public function deletepayment(){

		$this->Home_model->deletepayment($_POST['id_payment']);

		redirect('Home');

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

		redirect('Home');
	}

	public function formfinished($id_payment)
	{
		$data['active1'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$sid = $this->session->userdata("id_user");

		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['ppayment'] = $this->Home_model->getform($id_payment);
		$data['divhead'] = $this->Home_model->getDivHead();
		$data['surat'] = $this->Home_model->buat_kode();
		$data['reject'] = $this->Home_model->notifRejected();
		$data['payment'] = $this->Home_model->getPayment($sid);
		$data['bank'] = $this->Home_model->getBank();
		$data['currency'] = $this->Home_model->getCurrency();
		$data['data_vendor'] = $this->Dashboard_model->getDataVendor();

		$this->load->view('akses/user/header_user', $data);	
       	$this->load->view('akses/user/form_finished', $data);

	}

	public function wait_for_approval(){

		$data['active1'] = '';
		$data['active2'] = '';
		$data['waiting_approval'] = 'active';
		$data['active4'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		$data['payment'] = $this->Home_model->getPayment($sid);		
		$data['getApprovalDivHead'] = $this->Dashboard_model->getApprovalDivHead();
		
		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/wait_approval', $data);
	}

	public function myprofile()
	{
		$data['active1'] = 'active';
		$data['active2'] = '';

		$data['profil'] = $this->Home_model->getProfilId();
		$data['reject'] = $this->Home_model->notifRejected();

		$this->load->view('akses/user/header_user', $data);		
        $this->load->view('akses/user/profil', $data);
	} 

	public function updatemyprofil(){
		
		$cek_pass = $this->Home_model->getProfilId();
		
		foreach ($cek_pass as $key) {
			$pass = $key->password;
		}

			$myprofil = array(
				'id_user' => $_POST['id_user'],
				'nama_user' => $_POST['nama_user'],
				'jabatan' => $_POST['jabatan'],
				'divisi' => $_POST['divisi'],
				'email' => $_POST['email'],
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'password_baru' => $_POST['password_baru']
			);
			// var_dump($myprofil);exit;
			if(!empty($_POST['password'])){
				if($pass != md5($_POST['password'])){
					$this->session->set_flashdata('msg','gagal_password');
				}else if(strlen($_POST['password_baru']) < 6){
					$this->session->set_flashdata('msg','newpassword');
				}else{
					$this->Home_model->update_myprofilpass($myprofil);
					$this->session->set_flashdata('msg','sukses');
				}
			}else{
				$this->Home_model->update_myprofil($myprofil);
				$this->session->set_flashdata('msg','sukses');
			}	

		redirect('Home/myprofile');

	}

	public function all_detail_payment($id)
	{
		$sid = $this->session->userdata("id_user");
		$data['dashboard'] = 'active';
		$data['active2'] = '';
		$data['active3'] = '';

		$data['reject'] = $this->Home_model->notifRejected();
		$data['notif_approval'] = $this->Dashboard_model->notifApproval();
		
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

		$this->load->view('akses/user/header_user', $data);
		$this->load->view('akses/user/view_detail', $data);
	}
}
