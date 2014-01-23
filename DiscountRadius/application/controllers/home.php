<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		
	}

       function aa()
       {
           $params = array();
        $this->load->library('Arabic', $params);

        $this->arabic->load('Date');
        $this->arabic->setMode(1);
        $hdate = $this->arabic->date('l dS F Y h:i:s A', time());


        $this->arabic->load('Transliteration');
        $translit = $this->arabic->en2ar('Just Some Name');

        $data['hdate']        =    $hdate;
        $data['translit']    =    $translit;

        $this->load->view('arabic_view', $data);
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
				$data['main_content']='home';
				$this->load->view('includes/template',$data);
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

	public function showmap(){
		redirect(base_url().'home/map');
	}

	public function map(){
		$data['main_content']='map';																				
		$this->load->view('includes/template',$data,'refresh');
	}

	public function other_product(){
		$allProduct=$this->basic_model->product_wise_records();
		
                
                
		$data['allProduct']=$allProduct;
		$data['main_content']='other_product';																				
		$this->load->view('includes/template',$data);
	}
	
	public function product_dialog($brandId){
               //echo $brandId;
		$getProductDetail=$this->basic_model->get_record_where('product','BRAND_ID',$brandId);
               
                $data['getProductDetail']=$getProductDetail;
                $this->load->view('product_listing_dialog',$data);
		
	}
        
        function product_dialog_ajax($imgName,$pId) {
                //$getProductDetail=$this->basic_model->get_record_where('brand_details','BRAND_DATA_ID',$pId);
                
		$getProductDetail=$this->basic_model->product_join_offer($pId);
                
                if(!$getProductDetail){
                    $getProductDetail=$this->basic_model->get_record_where('product','PRODUCT_ID',$pId);
                }
                
		$getBrandLocation=$this->basic_model->get_record_where('brand_details','BRAND_ID',$getProductDetail[0]['BRAND_ID']);		

		$data['PRODUCT_NAME']=$getProductDetail[0]['PRODUCT_NAME'];
		$data['PRODUCT_MODEL_NO']=$getProductDetail[0]['PRODUCT_MODEL_NO'];
		$data['PRODUCT_TITLE']=$getProductDetail[0]['PRODUCT_TITLE'];
		$data['PRODUCT_DESCRIPTION']=$getProductDetail[0]['PRODUCT_DESCRIPTION'];
		$data['OFFER_TITLE']=$getProductDetail[0]['OFFER_TITLE'];
		$data['OFFER_DESCRIPTION']=$getProductDetail[0]['OFFER_DESCRIPTION'];
		$data['OFFER_END_DATE']=$getProductDetail[0]['OFFER_END'];

		$data['BRAND_LOCATION']=$getBrandLocation;

		$data['BRAND_NAME']=$getBrandLocation[0]['BRAND_NAME'];
		$data['PRODUCT_IMAGE']=$imgName;
               
		$this->load->view('product_dialog',$data);
        }

	public function offer_wise_product_listing(){
		$getOfferProduct=$this->basic_model->offer_side_product();

		$data['allProduct']=$getOfferProduct;
		$data['main_content']='offer_wise_product_listing';																				
		$this->load->view('includes/template',$data);
	}

	public function lacation_wise_product_listing(){
		$distinctCity=$this->basic_model->get_distinct_record('brand_details','CITY');

		$data['distinctCity']=$distinctCity;
		$data['main_content']='lacation_wise_product_listing';																				
		$this->load->view('includes/template',$data);
	}

	public function show_location_wise_data(){
		$cityName=$this->input->post('city');
             
		$getRecordCityWise=$this->basic_model->get_city_wise_listing($cityName);

		$data['getRecordCityWise']=$getRecordCityWise;
		$this->load->view('lacation_wise_listing_ajax',$data);
	}

	public function brand_wise_listing(){
		$brandList=$this->basic_model->get_all_record_order_by('brand_master','BRAND_NAME');

		$data['brandList']=$brandList;
		$data['main_content']='brand_wise_listing';																				
		$this->load->view('includes/template',$data);
	}
	
	public function brand_wise_listing_ajax(){
		$brandId=$this->input->post('brandId');
		//$brand_wise_product=$this->basic_model->brand_wise_product($brandId);
		$brand_wise_product=$this->basic_model->get_record_where('product','BRAND_ID',$brandId);

		$data['brand_wise_product']=$brand_wise_product;
		$this->load->view('brand_wise_listing_ajax',$data);
	}
	

}?>