<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		// load model
		$this->load->model('login_model');
	}
	
	public function index(){
		if(!$this->is_logged_in()){
			$data['log_err']='';
			$data['main_content']="login";
			$this->load->view('includes/template',$data);
		}else{
			redirect('home');
		}
	}
	
	public function register(){
		$data['success']='';
		$data['failed']='';
		$data['main_content']="register";
		$this->load->view('includes/template',$data);
	}

	public function user_register(){
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[50]');
		$this->form_validation->set_rules('firstname', 'FirstName', 'required|max_length[50]');
		$this->form_validation->set_rules('lastname', 'LastName', 'required|max_length[50]');
		$this->form_validation->set_rules('email', 'EmailId', 'required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]|alpha_numeric');
		if ($this->form_validation->run() == FALSE){
			$data['success']='';
			$data['failed']="All fields are required!";
			$data['main_content']="register";
			$this->load->view('includes/template',$data);
		}else{
			$username =trim($this->input->post('username'));
			$firstname =trim($this->input->post('firstname'));
			$lastname = trim($this->input->post('lastname'));
			$email = trim($this->input->post('email'));
			$password = trim($this->input->post('password'));

			if ($this->login_model->check_record('useraccount','Username',$username)) {
				$data['success']='';
				$data['failed']="Username is not availaible!";
				$data['main_content']="register";
				$this->load->view('includes/template',$data);
			}else{		
				if ($this->login_model->check_record('useraccount','EmailId',$email)) {
					$data['success']='';
					$data['failed']="This email id is already registered with us!";
					$data['main_content']="register";
					$this->load->view('includes/template',$data);
				}else{
					$data = array(
						'Username'=>$username,
						'FirstName'=>$firstname,
						'LastName'=>$lastname,
						'EmailId'=>$email,
						'Password'=>MD5($password),
						);

					if($this->login_model->insert_into_table('useraccount',$data)){
						$data['success']="Congratulations, you have been registered with us!";
						$data['failed']='';
						$data['main_content']="register";
						$this->load->view('includes/template',$data);
					}else{
						$data['success']='';
						$data['failed']="Oopss, An error occured while your registration.";
						$data['main_content']="register";
						$this->load->view('includes/template',$data);
					}
				}
			}
		}
	}

	public function check_login(){	
		$this->form_validation->set_rules('uname', 'Username', 'required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]|alpha_numeric');
		if ($this->form_validation->run() == FALSE){
			redirect('login/login_failed');
		}else{
			$isuser = $this->login_model->is_user($this->input->post('uname'),  $this->input->post('password'));
			if($isuser){
				$username = $this->input->post('uname');
				$user_detail = $this->login_model->get_user_detail($username);
				$data = array(
					'ID' => $user_detail->Id,
					'USER_NAME' => $user_detail->Username,
					'USER_EMAIL' => $user_detail->EmailId,
					'USER_TYPE' => $user_detail->Type,
					'is_logged_in' => TRUE
				);

				$this->session->set_userdata($data);
				
				redirect('home');

			}else{
				redirect('login/login_failed');
			}
		}
	}
	
	public function login_failed(){
		$data['log_err']="Authentication failed!";
		$data['main_content']="login";
		$this->load->view('includes/template',$data);
	}
	
	public function logout(){
		if(!$this->is_logged_in()){
			redirect('login');
		}else{
			$this->session->set_userdata(array('is_logged_in' => FALSE));
			$this->session->sess_destroy();
			$data['log_err']="";
			$data['main_content']="login";
			$this->load->view('includes/template',$data);
		}
	}
	
	private function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != TRUE){
			return FALSE;
		}
		return TRUE;
	}
}
/*End of file login.php*/