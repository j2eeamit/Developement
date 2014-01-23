<div data-role="page" id="product_listing_dialog" data-role="product_listing_dialog">
    <div data-role="header">
    	<h2>
            <?php 
                
                $brand_details=$this->basic_model->get_record_where('brand_master','BRAND_ID',$getProductDetail[0]['BRAND_ID']);
              
                echo $brand_details[0]['BRAND_NAME']; ?>
        </h2>
    </div>
     
    <div data-role="content">
    	 <ul data-role="listview" data-filter="true" data-inset="true">
            <?php 
            if($getProductDetail){
                foreach($getProductDetail as $key){ ?>
                    <li>
                        <a href="<?php echo base_url() ."home/product_dialog_ajax/".$key['PRODUCT_IMAGE']."/".$key['PRODUCT_ID'];?>" data-rel="dialog" data-transition="slide">
                            <img src="<?php echo base_url(). "uploads/product/". $key['PRODUCT_IMAGE'];?>" height="100" width="100" />
                            <?php echo $key['PRODUCT_NAME'];?>
                        </a>
                    </li>
                    
                <?php }
            }else{
                echo "No Product found!";
            }?>
         </ul>
    </div>
</div>

