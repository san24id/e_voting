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

		// $sid = $this->session->userdata("username");

		// $this->load->library('session');
 		
 		// if ($this->session->userdata('username')) {
 			
		// }else{
		// 	redirect('login/loginadm', 'refresh');
		// }
	}

	public function index()
	{
		$data['active1'] = 'active';
		$data['active2'] = '';

		$this->load->view('akses/admin/header_portal', $data);
		$this->load->view('akses/admin/dashboard_admin', $data);
	}

	public function payment()
	{
		$data['active1'] = '';
		$data['active2'] = 'active';
		

		// $data['profil'] = $this->Dashboard_model->getProfilProjek($_GET['filter_status']);
		$data['payment'] = $this->Dashboard_model->payment();
		// $data['adminpii'] = $this->Dashboard_model->getadminpii();
		// $data['sektor'] = $this->Home_model->getSektor();
		// $data['statusinf'] = $this->Dashboard_model->get_t_status_projek();

		$this->load->view('akses/admin/header_portal', $data);
        $this->load->view('akses/admin/payment', $data);
	}
}
