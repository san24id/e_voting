<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('Login_model');
		$this->load->model('Home_model');
 
	}

	public function index()
	{
		$this->load->view('login/login');
	}

	public function loginadm()
	{
		$this->load->view('login/login_adm');
	}


	public function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_login=$this->Login_model->auth_user($username,$password);

        session_start();
 
       if($cek_login->num_rows() > 0){
               foreach ($cek_login->result() as $row) {
               		$sess_data['id_user'] = $row->id_user;
               		$sess_data['nomor_user'] = $row->nomor_user;
               		$sess_data['nama_user'] = $row->nama_user;
                    $sess_data['status'] = $row->status;
                    $status = $row->status;
                    $status1 = $row->status_1;
					$this->session->set_userdata($sess_data);
				}

                if($status == 1){
                    if($status1 != 1){
                        redirect('Home');
                    }else{
                        echo $this->session->set_flashdata('msg','block');
                        redirect($url);
                    }
                }else{
                            $url=base_url();
                            echo $this->session->set_flashdata('msg','status_0');
                            redirect($url);
                }

        }else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url();
                            echo $this->session->set_flashdata('msg','invalid');
                            redirect($url);
            }
 
    }


    public function authadm(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_login=$this->Login_model->auth_admin($username,$password);

        session_start();
 
       
        if($cek_login->num_rows() > 0){
                $data=$cek_login->row_array();

                	$this->session->set_userdata('id_adm',$data['id_adm']);
                    $this->session->set_userdata('display_name',$data['display_name']);
                    $this->session->set_userdata('username',$data['username']);
                    $this->session->set_userdata('role',$data['role']);

                    if($this->session->userdata("role") == 1){
                         redirect('SuperAdm');
                    }else{
                        redirect('Dashboard');
                    }
 
        }else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url('login/loginadm');
                            echo $this->session->set_flashdata('msg','Invalid username or password');
                            redirect($url);
                    }
    }


    public function authldap(){

        $username=htmlspecialchars($this->uri->segment(3,TRUE),ENT_QUOTES);
 
        $cek_login=$this->Login_model->auth_ldap($username);


        session_start();
 
       
        if($cek_login->num_rows() > 0){
                $data=$cek_login->row_array();

                    $this->session->set_userdata('id_adm',$data['id_adm']);
                    $this->session->set_userdata('display_name',$data['display_name']);
                    $this->session->set_userdata('username',$data['username']);
                    $this->session->set_userdata('role',$data['role']);

                    if($this->session->userdata("role") == 1){
                         redirect('SuperAdm');
                    }else{
                        redirect('Dashboard');
                    }
 
        }else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url('login/loginadm');
                            echo $this->session->set_flashdata('msg','Invalid username or password');
                            redirect($url);
                    }

    }



    public function loginconfirm()
    {
        $this->load->view('login/login_confirm');
    }

    function auth_confirm(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_login=$this->Login_model->auth_user($username,$password);

        session_start();
 
       if($cek_login->num_rows() > 0){
               foreach ($cek_login->result() as $row) {
                    $sess_data['id_user'] = $row->id_user;
                    $sess_data['nomor_user'] = $row->nomor_user;
                    $sess_data['nama_user'] = $row->nama_user;
                    $this->session->set_userdata($sess_data);
                }

            $this->Login_model->update_status($_POST['username']);
            
            redirect('Home');

        }else{  // jika username dan password tidak ditemukan atau salah
                            echo $this->session->set_flashdata('msg','invalid');
                            redirect('Login/loginconfirm');
                    }


 
    }


    public function fpasword(){
        $addfp = array(
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'status' => $_POST['status']
        );

       $cek_mail =  $this->Login_model->auth_email($addfp);

        foreach ($cek_mail as $val) {
            $username = $val->username;
            $status1 = $val->status_1;
        }

        if($status1 != 1){

        if($cek_mail == TRUE){
                 // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'ssl://smtp.gmail.com:465';
        $mail->SMTPAuth = true;
        $mail->Username = 'iigfirisk@gmail.com';
        $mail->Password = 'R15k.2017';
        //$mail->SMTPSecure = 'tls';
        //$mail->Port     = 587;
        
        $mail->setFrom('iigfirisk@gmail.com', 'PII SIP');
        //$mail->addReplyTo('');
        
        // Add a recipient
        $mail->addAddress($_POST['email']);
        
        // Add cc or bcc 
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Forget Your Password SIP Application';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "username&nbsp;:&nbsp;".$username."<br>new password&nbsp;:&nbsp;". $_POST['password']." <p>Konfirmasi Lupa Password dengan Link Berikut : <a href='http://application.iigf.co.id/pii_sip/login/loginconfirm'>Konfirmasi Login</a></p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
             $url=base_url();
             echo $this->session->set_flashdata('msg','gagal');
             redirect($url);
        }else{

            $this->Login_model->update_fpassword($addfp);
            redirect('Login/forgotpassword');
        }
        }else{
              $url=base_url();
              echo $this->session->set_flashdata('msg','terdaftar');
              redirect($url);
        }
        }else{
                $url=base_url();
                echo $this->session->set_flashdata('msg','block');
                redirect($url);
        }


    }


    public function forgotpassword(){
        $this->load->view('login/forgot_login');
    }


    public function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

    public function logoutadm(){
        $this->session->sess_destroy();
        $url=base_url('login/loginadm');
        redirect($url);
    }


}
