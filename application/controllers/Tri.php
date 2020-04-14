<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tri extends CI_Controller {
   
    function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->model('Home_model');
		// $this->load->model('Tri_model');

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


        $this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/dashboard_tri', $data);
	}
	
	public function listPayment(){

		$data['active1'] = '';
		$data['l_payment'] = 'active';
		$data['active3'] = '';

		$data['processing'] = $this->Dashboard_model->processing();
		$data['tot_pay_req'] = $this->Dashboard_model->getTotal();
		$data['payment'] = $this->Dashboard_model->payment();
		$data['pembayaran'] = $this->Dashboard_model->getVPayment();

		$this->load->view('akses/tri/header_tri', $data);
		$this->load->view('akses/tri/payment', $data);

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
}    