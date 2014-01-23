<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminpanel extends CI_Controller {
	function __construct(){
		parent::__construct();
		
	}
	public function index(){
		if(!$this->is_logged_in()){
			$data['log_err']="";
			$data['main_content']='login';
			$this->load->view('includes/template',$data);
		}else{
			if($this->session->userdata('USER_TYPE') == 1){//admin has login
				$cnt_nos_user=$this->basic_model->count_record_where('useraccount','Type','2');
				$cnt_nos_category=$this->basic_model->count_table_record('category');
				$cnt_nos_sub_category=$this->basic_model->count_table_record('sub_category');
				$cnt_nos_brand=$this->basic_model->count_table_record('brand_master');
				
				$data['cnt_nos_brand']=$cnt_nos_brand;
				$data['cnt_nos_sub_category']=$cnt_nos_sub_category;
				$data['cnt_nos_category']=$cnt_nos_category;
				$data['cnt_nos_user']=$cnt_nos_user;

				$data['main_content']='admin/admin_home';
				$this->load->view('includes/template',$data);
			}
			if($this->session->userdata('USER_TYPE') == 2){//User has login
				redirect('home');
			}
			if($this->session->userdata('USER_TYPE') == 3){//Client has login
				redirect('client');			
			}
		}
	}
	
	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != TRUE){
			return FALSE;
		}
		return TRUE;
	}

	public function set_unset_client(){
		$data['main_content']='admin/admin_set_unset_client';
		$this->load->view('includes/template',$data);
	}

	public function search_email(){
		$txtEmail=$this->input->post('txt_search_email');
		$data['txtEmail']=$txtEmail;
		$data['main_content']='admin/admin_client';
		$this->load->view('includes/template',$data);
	}

	public function new_category(){
		$data['success']="";
		$data['failed']="";
		$data['main_content']='admin/add_new_category';
		$this->load->view('includes/template',$data);
	}

	public function add_new_category(){
		$this->form_validation->set_rules('new_category', 'New Category', 'required|max_length[50]');
		if ($this->form_validation->run() == FALSE){
			$data['success']="";
			$data['failed']="New category field is required!";
			$data['main_content']='admin/add_new_category';
			$this->load->view('includes/template',$data);
		}else{
			$category_name=trim($this->input->post('new_category'));

			if($this->basic_model->check_record('category','CAT_NAME',$category_name)){ // Check category already exist or not
				$data['success']="";
				$data['failed']="Category already exist!";
				$data['main_content']='admin/add_new_category';
				$this->load->view('includes/template',$data);
			}else{
				$data = array(
					'CAT_NAME'=>ucfirst($category_name),
				);
				if($this->login_model->insert_into_table('category',$data)){
					$data['success']="Category Added successfully";
					$data['failed']="";
					$data['main_content']='admin/add_new_category';
					$this->load->view('includes/template',$data);
				}else{
					$data['success']="";
					$data['failed']="Oops, there is some error while adding new category!";
					$data['main_content']='admin/add_new_category';
					$this->load->view('includes/template',$data);
				}
			}
		}
	}

	public function edit_category(){
		$getAllCategory=$this->basic_model->get_all_record('category');
				
		$data['getAllCategory']=$getAllCategory;	
		$data['success']="";
		$data['failed']="";
		$data['main_content']='admin/edit_category';
		$this->load->view('includes/template',$data);
	}

	public function show_edit_category(){
		$catId=$this->input->post('catId');
		$getCategoryData=$this->basic_model->get_record_where('category','CAT_ID',$catId);

		$data['CATID']=$getCategoryData[0]['CAT_ID'];
		$data['CATNAME']=$getCategoryData[0]['CAT_NAME'];
		$this->load->view('admin/edit_category_ajax',$data);
	}

	public function add_edit_category(){
		$categoryId=$this->input->post('txtcategoryId');
		$categoryName=$this->input->post('txtcategoryName');

		$data=array(
			'CAT_ID'   =>$categoryId, 
			'CAT_NAME' =>$categoryName, 
			);
		if($this->basic_model->check_record('category','CAT_NAME',$categoryName)){
			$getAllCategory=$this->basic_model->get_all_record('category');
				
			$data['getAllCategory']=$getAllCategory;		
			$data['success']="";
			$data['failed']="Category already exist!";
			$data['main_content']='admin/edit_category';
			$this->load->view('includes/template',$data);
		}else{
			if ($this->basic_model->update_where('category','CAT_ID',$categoryId,$data)) {
				$getAllCategory=$this->basic_model->get_all_record('category');
				
				$data['getAllCategory']=$getAllCategory;		
				$data['success']="";
				$data['failed']="Oopss, there is some error occured while updating category.";
				$data['main_content']='admin/edit_category';
				$this->load->view('includes/template',$data);
			}else{
				$getAllCategory=$this->basic_model->get_all_record('category');
				
				$data['getAllCategory']=$getAllCategory;		
				$data['success']="Category Updated successfully!";
				$data['failed']="";
				$data['main_content']='admin/edit_category';
				$this->load->view('includes/template',$data);
			}
		}
	}

	public function new_subcategory(){
		$getAllCategory=$this->basic_model->get_all_record('category');
				
		$data['getAllCategory']=$getAllCategory;
		$data['success']="";
		$data['failed']="";
		$data['main_content']='admin/new_subcategory';
		$this->load->view('includes/template',$data);		
	}

	public function add_subcategory(){
		$this->form_validation->set_rules('txtsubcategory', 'New Sub Category', 'required|max_length[50]');
		if ($this->form_validation->run() == FALSE){
			$getAllCategory=$this->basic_model->get_all_record('category');
				
			$data['getAllCategory']=$getAllCategory;
			$data['success']="";
			$data['failed']="New sub category field is required!";
			$data['main_content']='admin/new_subcategory';
			$this->load->view('includes/template',$data);
		}else{
			$catId=$this->input->post('category');
			$subcatName=$this->input->post('txtsubcategory');

			$data = array(
					'CAT_ID'=>$catId,
					'SUB_CAT_NAME'=>ucfirst($subcatName),
			);

			if($this->login_model->insert_into_table('sub_category',$data)){
				$getAllCategory=$this->basic_model->get_all_record('category');
				
				$data['getAllCategory']=$getAllCategory;
				$data['success']="Subcategory added successfully";
				$data['failed']="";
				$data['main_content']='admin/new_subcategory';
				$this->load->view('includes/template',$data);
			}else{
				$getAllCategory=$this->basic_model->get_all_record('category');
				
				$data['getAllCategory']=$getAllCategory;
				$data['success']="";
				$data['failed']="Oops, there is some error while adding new sub category!";
				$data['main_content']='admin/new_subcategory';
				$this->load->view('includes/template',$data);
			}
		}
	}

	public function edit_subcategory(){
		$getAllSubCategory=$this->basic_model->get_all_record('sub_category');
		$data['getAllSubCategory']=$getAllSubCategory;
		$data['success']="";
		$data['failed']="";
		$data['main_content']='admin/edit_subcategory';
		$this->load->view('includes/template',$data);
	}

	public function show_edit_subcategory(){
		$subCatId=$this->input->post('subcatId');
		$getSubCategoryData=$this->basic_model->get_record_where('sub_category','SUB_CAT_ID',$subCatId);		
		$getAllCategory=$this->basic_model->get_all_record('category');
				
		$data['getAllCategory']=$getAllCategory;
		$data['CATID']=$getSubCategoryData[0]['CAT_ID'];
		$data['SUBCATID']=$getSubCategoryData[0]['SUB_CAT_ID'];
		$data['SUBCATNAME']=$getSubCategoryData[0]['SUB_CAT_NAME'];
		$this->load->view('admin/edit_subcategory_ajax',$data);
	}

	public function add_edit_subcategory(){
		$catId=$this->input->post('category');
		$subcategoryId=$this->input->post('txtsubcategoryId');
		$subcategoryName=$this->input->post('txtsubcategoryName');

		$data=array(
			'SUB_CAT_ID' =>$subcategoryId, 
			'CAT_ID'=>$catId,
			'SUB_CAT_NAME' =>$subcategoryName, 
		);
		if($this->basic_model->check_record('sub_category','SUB_CAT_NAME',$subcategoryName)){
			$getAllSubCategory=$this->basic_model->get_all_record('sub_category');
			$data['getAllSubCategory']=$getAllSubCategory;
			$data['success']="";
			$data['failed']="Sub category already exist!";
			$data['main_content']='admin/edit_subcategory';
			$this->load->view('includes/template',$data);		
		}else{
			if ($this->basic_model->update_where('sub_category','SUB_CAT_ID',$subcategoryId,$data)) {
				$getAllSubCategory=$this->basic_model->get_all_record('sub_category');
				$data['getAllSubCategory']=$getAllSubCategory;
				$data['success']="";
				$data['failed']="Error, while updating sub category!";
				$data['main_content']='admin/edit_subcategory';
				$this->load->view('includes/template',$data);		
			}else{
				$getAllSubCategory=$this->basic_model->get_all_record('sub_category');
				$data['getAllSubCategory']=$getAllSubCategory;
				$data['success']="Sub Category Updated successfully!";
				$data['failed']="";
				$data['main_content']='admin/edit_subcategory';
				$this->load->view('includes/template',$data);		
			}
		}

	}

	public function new_brand($success="",$failed=""){
		/*$getAllCategory=$this->basic_model->get_all_record('category');
		$data['getAllCategory']=$getAllCategory;*/
		$data['success']=$success;
		$data['failed']=$failed;
		$data['main_content']="admin/new_brand";
		$this->load->view('includes/template',$data);
	}

	public function add_new_brand(){
		$this->form_validation->set_rules('new_brand', 'New Brand', 'required|max_length[50]');
		if ($this->form_validation->run() == FALSE){
			$this->new_brand("",validation_errors());
		}else{
			//$catId=$this->input->post('category');
			$brandName=$this->input->post('new_brand');

			$data = array(
					//'CAT_ID'=>$catId,
					'BRAND_NAME'=>ucfirst($brandName),
			);

			if($this->basic_model->check_record('brand_master','BRAND_NAME',$BRAND_NAME)){
					$this->new_brand("","New brand already exist!");
			}else{
				if($this->login_model->insert_into_table('brand_master',$data)){
					$this->new_brand("New brand added successfully","");
				}else{
					$this->new_brand("","Oops, there is some error while adding new brand!");
				}
			}
		}
	}


	public function edit_brand($success="",$failed=""){
		$getAllBrand=$this->basic_model->get_all_record('brand_master');
		$data['getAllBrand']=$getAllBrand;

		$data['success']=$success;
		$data['failed']=$failed;
		$data['main_content']="admin/edit_brand";
		$this->load->view('includes/template',$data);
	}

	public function show_edit_brand_ajax($success="",$failed=""){
		$brand_id=$this->input->post('brand_id');
		$brand_detail=$this->basic_model->get_record_where('brand_master','BRAND_ID',$brand_id);
		$data['brand_detail']=$brand_detail;

		$data['success']=$success;
		$data['failed']=$failed;
		$this->load->view('admin/show_edit_brand_ajax',$data);
	}

	public function add_edit_brand(){
		$this->form_validation->set_rules('brand_name', 'Brand Name', 'required|max_length[50]');

		if ($this->form_validation->run() == FALSE){
			$this->edit_brand("",validation_errors());
		}else{
			$brandId=$this->input->post('brandID');
			$brandName=$this->input->post('brand_name');

			$data = array(
					'BRAND_ID'=>$brandId,
					'BRAND_NAME'=>ucfirst($brandName),
			);

			if($this->basic_model->check_record('brand_master','BRAND_NAME',$brandName)){
					$this->edit_brand("","New brand already exist!");
			}else{
				if($this->basic_model->update_where('brand_master','BRAND_ID',$brandId,$data)){
					$this->edit_brand("","Oops, there is some error while updating brand!");
				}else{
					$this->edit_brand("New brand updated successfully!","");
				}
			}
		}
	}


}?>