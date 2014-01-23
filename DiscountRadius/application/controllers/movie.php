<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movie extends CI_Controller {
	function __construct(){
		parent::__construct();
		
	}
	public function index(){
		if(!$this->is_logged_in()){
			$data['log_err']="";
			$data['main_content']='login';
			$this->load->view('includes/template',$data);
		}else{
			$data['main_content']='movie_home';
			$this->load->view('includes/template',$data);
		}
	}
	
	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != TRUE){
			return FALSE;
		}
		return TRUE;
	}

	public function cinema_dialog(){
		$this->load->view('cinema_dialog');
	}

	public function movies_now_playing(){
		$data['main_content']='movie_listing';
		$this->load->view('includes/template',$data);
	}

	public function movie_show_detail(){
		$data['main_content']='movie_show_detail';
		$this->load->view('includes/template',$data);	
	}

	public function book_my_show(){
		$data['main_content']='book_my_show';
		$this->load->view('includes/template',$data);	
	}
	
}