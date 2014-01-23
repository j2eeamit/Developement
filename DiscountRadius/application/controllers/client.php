<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->uri->segment(4);
		
	}
	public function index(){
		if(!$this->is_logged_in()){
			$data['log_err']="";
			$data['main_content']='login';
			$this->load->view('includes/template',$data);
		}else{
			if($this->session->userdata('USER_TYPE') == 1){//admin has login
				redirect('adminpanel');
			}
			if($this->session->userdata('USER_TYPE') == 2){//User has login
				redirect('home');
			}
			if($this->session->userdata('USER_TYPE') == 3){//Client has login
				$cnt_nos_brand=$this->basic_model->count_table_record('brand');
				$cnt_nos_product=$this->basic_model->count_table_record('product');

				$data['cnt_nos_product']=$cnt_nos_product;
				$data['cnt_nos_brand']=$cnt_nos_brand;
				$data['main_content']='client/client_home';
				$this->load->view('includes/template',$data);
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

	public function new_brand(){
		$getAllCategory=$this->basic_model->get_all_record('category');
		$getAllSubCategory=$this->basic_model->get_all_record('sub_category');
				
		$data['getAllSubCategory']=$getAllSubCategory;		
		$data['getAllCategory']=$getAllCategory;
		$data['success']='';
		$data['failed']='';
		$data['main_content']='client/new_brand';
		$this->load->view('includes/template',$data);
	}

	public function loadBrand(){
		$getAllCategory=$this->basic_model->get_all_record('category');
		$getAllSubCategory=$this->basic_model->get_all_record('sub_category');
				
		$data['getAllSubCategory']=$getAllSubCategory;		
		$data['getAllCategory']=$getAllCategory;
		$data['success']='';
		$data['failed']='';
		$data['main_content']='client/new_brand';
		$this->load->view('includes/template',$data);
	}

	public function show_subcategory_ajax(){
		$cat_id=$this->input->post('catId');

		$subCategoryList=$this->basic_model->get_record_where('sub_category','CAT_ID',$cat_id);
		$data['subCategoryList']=$subCategoryList;
		$this->load->view('client/sub_category_ajax',$data);
	}

	public function show_subcategory_on_dropdown_ajax(){
		echo $this->input->post('categoryId');
	}

	public function add_new_brand(){
		$this->form_validation->set_rules('category', 'Sub Category', 'required|max_length[50]');
		//$this->form_validation->set_rules('subCategory', 'New Sub Category', 'required|max_length[50]');
		$this->form_validation->set_rules('brand_name', 'Brand', 'required|max_length[50]');
		$this->form_validation->set_rules('comp_name', 'Company Name', 'required|max_length[50]');
		$this->form_validation->set_rules('location', 'Location', 'required|max_length[50]');
		$this->form_validation->set_rules('city', 'City', 'required|max_length[50]');
		
		//$this->form_validation->set_rules('collection', 'Collection', 'required|max_length[50]');
		//$this->form_validation->set_rules('offer', 'Offer', 'required|max_length[50]');
		//$this->form_validation->set_rules('offerStart', 'Offer Starts', 'required|max_length[50]');
		//$this->form_validation->set_rules('offerValidity', 'Offer Validity', 'required|max_length[50]');
		//$this->form_validation->set_rules('pics_upload', 'Pics Upload', 'required|max_length[50]');

		if ($this->form_validation->run() == FALSE){
			$getAllCategory=$this->basic_model->get_all_record('category');
			$getAllSubCategory=$this->basic_model->get_all_record('sub_category');
					
			$data['getAllSubCategory']=$getAllSubCategory;		
			$data['getAllCategory']=$getAllCategory;
			$data['success']='';
			$data['failed']='All Fields are Required';
			$data['main_content']='client/new_brand';
			$this->load->view('includes/template',$data);
		}else{
		
			if ($_FILES["pics_upload"]["name"]) {
				move_uploaded_file($_FILES["pics_upload"]["tmp_name"],"uploads/brand/" . $_FILES["pics_upload"]["name"]);
			}
	    	
			$BR_PIC_NAME=$_FILES["pics_upload"]["name"];
			
			$catId 		=$this->input->post('category');
			$subcatId 	=$this->input->post('subCategory');
			$brand_name =$this->input->post('brand_name');
			$comp_name  =$this->input->post('comp_name');
			$location   =$this->input->post('location');
			$city       =$this->input->post('city');
			$collection =$this->input->post('collection');
			$offer      =$this->input->post('offer');
			$offerStart =$this->input->post('offerStart');
			$offerValidity =$this->input->post('offerValidity');

			$data= array(
				'BR_CAT_ID' 	  => $catId ,
				'BR_SUB_CAT_ID'	  => $subcatId,
				'BR_NAME'		  => $brand_name,
				'BR_COMP_NAME'	  => $comp_name,
				'BR_LOCATION'	  => $location,
				'BR_CITY'		  => $city,
				'BR_COLLECTION'	  => $collection,
				'BR_OFFER'		  => $offer,
				'BR_OFFER_STARTS' => $offerStart,
				'BR_OFFER_ENDS'	  => $offerValidity,
				'BR_PIC_NAME'	  => $BR_PIC_NAME,
				);

			if($this->basic_model->insert_into_table('brand',$data)){
					$getAllCategory=$this->basic_model->get_all_record('category');
					$getAllSubCategory=$this->basic_model->get_all_record('sub_category');		

					$data['getAllSubCategory']=$getAllSubCategory;		
					$data['getAllCategory']=$getAllCategory;
					$data['success']='Brand Submitted Successfully';
					$data['failed']='';
					$data['main_content']='client/new_brand';
					$this->load->view('includes/template',$data);
			}else{
				$getAllCategory=$this->basic_model->get_all_record('category');
				$getAllSubCategory=$this->basic_model->get_all_record('sub_category');		

				$data['getAllSubCategory']=$getAllSubCategory;		
				$data['getAllCategory']=$getAllCategory;
				$data['success']='';
				$data['failed']='While brand submission, an error ocured';
				$data['main_content']='client/new_brand';
				$this->load->view('includes/template',$data);
			}
		}
	}

	public function brand_dialog($brand_id){
		$getBrand=$this->basic_model->get_record_where('brand','BR_ID',$brand_id);

		$data['brandName']=$getBrand[0]['BR_NAME'];
		$data['brandCollection']=$getBrand[0]['BR_COLLECTION'];
		$data['brandLocation']=$getBrand[0]['BR_LOCATION'];
		$data['brandCity']=$getBrand[0]['BR_CITY'];
		$data['brandOffer']=$getBrand[0]['BR_OFFER'];
		$data['brandPicName']=$getBrand[0]['BR_PIC_NAME'];
		$this->load->view('client/brand_dialog',$data);
	}

	public function brand_listing(){
		$getAllBrand=$this->basic_model->get_all_record_order_by('brand','BR_ID','DESC');
				
		$data['getAllBrand']=$getAllBrand;		
		$data['success']='';
		$data['failed']='';
		$data['main_content']='client/brand_listing';
		$this->load->view('includes/template',$data);
	}

	public function edit_brand_view(){
		$getAllBrand=$this->basic_model->get_all_record_order_by('brand','BR_ID','DESC');
				
		$data['getAllBrand']=$getAllBrand;		
		$data['success']='';
		$data['failed']='';
		$data['main_content']='client/edit_brand_view';
		$this->load->view('includes/template',$data);
	}

	public function show_edit_brand_ajax(){
		$brandID=$this->input->post('brand_id');

		$getBrand=$this->basic_model->get_record_where('brand','BR_ID',$brandID);
		$getAllCategory=$this->basic_model->get_all_record('category');
		$getAllSubCategory=$this->basic_model->get_record_where('sub_category','CAT_ID',$getBrand[0]['BR_CAT_ID']);
					
		$data['getAllSubCategory']=$getAllSubCategory;		
		$data['getAllCategory']=$getAllCategory;
		$data['getBrand']=$getBrand;
		$this->load->view('client/show_edit_brand_ajax',$data);
	}

	public function add_edit_brand(){
		
		$this->form_validation->set_rules('category', 'Sub Category', 'required|max_length[50]');
		//$this->form_validation->set_rules('subCategory', 'New Sub Category', 'required|max_length[50]');
		$this->form_validation->set_rules('brand_name', 'Brand', 'required|max_length[50]');
		$this->form_validation->set_rules('comp_name', 'Company Name', 'required|max_length[50]');
		$this->form_validation->set_rules('location', 'Location', 'required|max_length[50]');
		$this->form_validation->set_rules('city', 'City', 'required|max_length[50]');
		
		//$this->form_validation->set_rules('collection', 'Collection', 'required|max_length[50]');
		//$this->form_validation->set_rules('offer', 'Offer', 'required|max_length[50]');
		//$this->form_validation->set_rules('offerStart', 'Offer Starts', 'required|max_length[50]');
		//$this->form_validation->set_rules('offerValidity', 'Offer Validity', 'required|max_length[50]');
		//$this->form_validation->set_rules('pics_upload', 'Pics Upload', 'required|max_length[50]');

		if ($this->form_validation->run() == FALSE){
			$getAllBrand=$this->basic_model->get_all_record_order_by('brand','BR_ID','DESC');
					
			$data['getAllBrand']=$getAllBrand;		
			$data['success']='';
			$data['failed']='All compulsory fields are required!';
			$data['main_content']='client/edit_brand_view';
			$this->load->view('includes/template',$data);
		}else{
		
			if ($_FILES["pics_upload"]["name"]) {
				move_uploaded_file($_FILES["pics_upload"]["tmp_name"],"uploads/brand/" . $_FILES["pics_upload"]["name"]);
			}
	    	
			$BR_PIC_NAME=$_FILES["pics_upload"]["name"];
			
			$brandID=$this->input->post('brandID');

			$catId 		=$this->input->post('category');
			$subcatId 	=$this->input->post('subCategory');
			$brand_name =$this->input->post('brand_name');
			$comp_name  =$this->input->post('comp_name');
			$location   =$this->input->post('location');
			$city       =$this->input->post('city');
			$collection =$this->input->post('collection');
			$offer      =$this->input->post('offer');
			$offerStart =$this->input->post('offerStart');
			$offerValidity =$this->input->post('offerValidity');

			$data= array(
				'BR_CAT_ID' 	  => $catId ,
				'BR_SUB_CAT_ID'	  => $subcatId,
				'BR_NAME'		  => $brand_name,
				'BR_COMP_NAME'	  => $comp_name,
				'BR_LOCATION'	  => $location,
				'BR_CITY'		  => $city,
				'BR_COLLECTION'	  => $collection,
				'BR_OFFER'		  => $offer,
				'BR_OFFER_STARTS' => $offerStart,
				'BR_OFFER_ENDS'	  => $offerValidity,
				'BR_PIC_NAME'	  => $BR_PIC_NAME,
				);

			if($this->basic_model->update_where('brand','BR_ID',$brandID,$data)){
					$getAllBrand=$this->basic_model->get_all_record_order_by('brand','BR_ID','DESC');
				
					$data['getAllBrand']=$getAllBrand;		
					$data['success']='';
					$data['failed']='Error while updating brand!';
					$data['main_content']='client/edit_brand_view';
					$this->load->view('includes/template',$data);
			}else{
				$getAllBrand=$this->basic_model->get_all_record_order_by('brand','BR_ID','DESC');
				
				$data['getAllBrand']=$getAllBrand;		
				$data['success']='Brand updated Successfully!';
				$data['failed']='';
				$data['main_content']='client/edit_brand_view';
				$this->load->view('includes/template',$data);
			}
		}
	}

	public function new_product($success="",$failed=""){
		$getAllBrand=$this->basic_model->get_all_record_order_by('brand_master','BRAND_NAME');
		$data['getAllBrand']=$getAllBrand;

		$data['success']=$success;
		$data['failed']=$failed;
		$data['main_content']='client/new_product';
		$this->load->view('includes/template',$data);
	}

	public function add_new_product(){
		$this->form_validation->set_rules('new_product', 'Product Name', 'required|max_length[50]|min_length[2]');
	
		if ($this->form_validation->run() == FALSE){
			$this->new_product("",validation_errors());
		}else{

			if ($_FILES["product_image"]["name"]) {
				move_uploaded_file($_FILES["product_image"]["tmp_name"],"uploads/product/" . $_FILES["product_image"]["name"]);
			}
	    	
			$productImageName=$_FILES["product_image"]["name"];

			$brandID=$this->input->post('brand');
			$productName =$this->input->post('new_product');
			$productModelNo=$this->input->post('new_product_model_no');
			$productTitle=$this->input->post('new_product_title');
			$productDescription	 =$this->input->post('product_description');
		
			$data= array(
				'BRAND_ID' 	  		 => $brandID ,
				'PRODUCT_NAME'	 	 => $productName,
				'PRODUCT_MODEL_NO'	 => $productModelNo,
				'PRODUCT_TITLE'	 	 => $productTitle,
				'PRODUCT_DESCRIPTION'=> $productDescription,
				'PRODUCT_IMAGE'	     => $productImageName,
				);

			if($this->basic_model->insert_into_table('product',$data)){
				$this->new_product("Product Added Successfully","");
			}else{
				$this->new_product("","Error, While adding new product!");
			}
		}
	}

	public function product_listing(){
		$getAllProduct=$this->basic_model->get_all_record_order_by('product','PRODUCT_ADDED_ON','DESC');

		$data['getAllProduct']=$getAllProduct;
		$data['main_content']='client/product_listing';
		$this->load->view('includes/template',$data);
	}

	
	public function new_offer($success="",$failed=""){
		$getAllProduct=$this->basic_model->get_all_record('product');
		$getAllbrand=$this->basic_model->get_all_record('brand_master');

		$data['success']=$success;
		$data['failed']=$failed;
		$data['getAllbrand']=$getAllbrand;
		$data['getAllProduct']=$getAllProduct;
		$data['main_content']='client/new_offer';
		$this->load->view('includes/template',$data);
	}

	public function add_new_offer(){
		$this->form_validation->set_rules('offer_title', 'Offer title', 'required|max_length[50]|min_length[2]');
		//$this->form_validation->set_rules('product', 'Offer type', 'required');
	
		if ($this->form_validation->run() == FALSE){
			
			$this->new_offer("",validation_errors());

		}else{

			$brand=$this->input->post('brand');
			$offerTitle=$this->input->post('offer_title');
			$offer_description=$this->input->post('offer_description');
			
			$offer_type_radio=$this->input->post('offer_type_radio');
			$offerStart=$this->input->post('offerStart');
			$offerEnd=$this->input->post('offerEnd');
			
			//$weekDays=$this->input->post('weekDays');
			foreach($this->input->post('weekDays') as $key =>$days){
              $weekDays[]=$days;
            }
            for($i=0;$i<=count($weekDays)-1;$i++){
            	$weekDay=$weekDays[$i].",".$weekDay;
            }


			$startTime=$this->input->post('startTime');
			$duration=$this->input->post('duration');
			$endTime=$this->input->post('endTime');
			
			//$offerProduct=$this->input->post('product');
			foreach($this->input->post('product') as $key =>$val){
              $prduct_id_val[] =$val;
            }

            for($i=0;$i<=count($prduct_id_val)-1;$i++){
				$data= array(
					'PRODUCT_ID'	   => $prduct_id_val[$i],
					'BRAND_ID'		   => $brand,
					'OFFER_TITLE' 	   => $offerTitle,
					'OFFER_DESCRIPTION'=> $offer_description,
					'OFFER_TYPE'	   => $offer_type_radio,
					'OFFER_START'	   => $offerStart,
					'OFFER_END'		   => $offerEnd,
					'OFFER_DURATION'   => $duration,
					'OFFER_START_TIME' => $startTime,
					'OFFER_END_TIME'   => $endTime,
					'OFFER_WEEK_DAYS'  => $weekDay,
					);

				$is_inserted=$this->basic_model->insert_into_table('offer_details',$data);
            }

			if($is_inserted){
				$this->new_offer("Offer Added Successfully","");
			}else{
				$this->new_offer("",validation_errors());
			}	

		}		
	}

	public function edit_product($product_id,$success="",$failed=""){
		$getAllProduct=$this->basic_model->get_record_where('product','PRODUCT_ID',$product_id);
		$getAllBrand=$this->basic_model->get_all_record('brand_master');
				
		$data['getAllBrand']=$getAllBrand;	
		$data['getAllProduct']=$getAllProduct;
		$data['success']=$success;
		$data['failed']=$failed;
		$data['main_content']='client/edit_product';
		$this->load->view('includes/template',$data);
	}

	public function add_edit_product(){
		$edit_id= $this->input->post('editID');
		$this->form_validation->set_rules('new_product', 'Product Name', 'required|max_length[50]|min_length[2]');
	
		if ($this->form_validation->run() == FALSE){
			$this->edit_product($edit_id,"",validation_errors());
		}else{

			$brandID=$this->input->post('brand');
			$productName =$this->input->post('new_product');
			$productModelNo=$this->input->post('new_product_model_no');
			$productTitle=$this->input->post('new_product_title');
			$productDescription	 =$this->input->post('product_description');

			if ($_FILES["product_image"]["name"]) {
				move_uploaded_file($_FILES["product_image"]["tmp_name"],"uploads/product/" . $_FILES["product_image"]["name"]);
				
				$productImageName=$_FILES["product_image"]["name"];
				
				$data= array(
					'PRODUCT_ID'		 => $edit_id,
					'BRAND_ID' 	  		 => $brandID ,
					'PRODUCT_NAME'	 	 => trim($productName),
					'PRODUCT_MODEL_NO'	 => trim($productModelNo),
					'PRODUCT_TITLE'	 	 => trim($productTitle),
					'PRODUCT_DESCRIPTION'=> trim($productDescription),
					'PRODUCT_IMAGE'	     => $productImageName,
				);
			}else{
				$data= array(
					'PRODUCT_ID'		 => $edit_id,
					'BRAND_ID' 	  		 => $brandID ,
					'PRODUCT_NAME'	 	 => trim($productName),
					'PRODUCT_MODEL_NO'	 => trim($productModelNo),
					'PRODUCT_TITLE'	 	 => trim($productTitle),
					'PRODUCT_DESCRIPTION'=> trim($productDescription),
				);
			}
	    			

			if($this->basic_model->update_where('product','PRODUCT_ID',$edit_id,$data)){
				$this->edit_product($edit_id,"","Error, While updating product!");
			}else{
				$this->edit_product($edit_id,"Product Updated Successfully","");
			}
		}
	}

	public function show_brandData($value=''){
		echo  $this->input->post('brandData');
	}

	public function show_ProductData(){
		$brandId=$this->input->post('brandId');
		$getProductData=$this->basic_model->get_record_where('product','BRAND_ID',$brandId);
		$data['getProductData']=$getProductData;
		$this->load->view('client/show_ProductData_ajax',$data);
	}

	public function edit_offer(){
		$getAllbrand=$this->basic_model->get_all_record('brand_master');
		$data['getAllbrand']=$getAllbrand;

		$data['main_content']='client/edit_offer';
		$this->load->view('includes/template',$data);
	}

	public function offer_edit(){
		$brandID=$this->input->post('brand_id');
		if($brandID){
			$offer_product=$this->basic_model->get_record_where('offer_details','BRAND_ID',$brandID);
			
			$data['offer_product']=$offer_product;
			$this->load->view('client/product_list',$data);
		}
	}
	
	public function show_offer_edit_view(){
		$offer_id=$this->input->post('offer_id');
		$get_offer_list=$this->basic_model->get_record_where('offer_details','OFFER_ID',$offer_id);
		
		
		$data['get_offer_list']=$get_offer_list;
		$this->load->view('client/show_offer_edit_view',$data);
	}


}?>