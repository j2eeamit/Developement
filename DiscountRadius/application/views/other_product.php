<div data-role="page" id="product" data-role="product">
    <div data-role="header" data-position="fixed" >
	    <a href="<?php echo base_url();?>home" data-role="button" data-icon="back" data-theme="b">Back</a>
	    <h1>PRODUCT</h1>
	    <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    
		<div data-role="navbar" >
			<ul>
				<li><a href="<?php echo base_url();?>home/other_product" class="ui-btn-active ui-state-persist">PRODUCT</a></li>
				<li><a href="<?php echo base_url();?>home/brand_wise_listing">BRAND</a></li>
				<li><a href="<?php echo base_url();?>home/offer_wise_product_listing">OFFER</a></li>
				<li><a href="<?php echo base_url();?>home/lacation_wise_product_listing">LOCATION</a></li>
			</ul>
		</div><!-- /navbar -->

	</div><!-- /header  data-fullscreen="true"-->

  	<div data-role="content"> 

		<?php  
                   
                    $today = date("Y-m-d");
			  	//echo "<PRE>";	print_r($allProduct);exit; ?>

		<!-- <h3>Find your favourite product</h3> -->
		<ul data-role="listview" data-filter="true" data-inset="true">
			<?php foreach ($allProduct as $key) { //echo $key['PRODUCT_ID'];?>
				<li>
					<a href="<?php echo base_url() ."home/product_dialog_ajax/".$key['PRODUCT_IMAGE']."/".$key['PRODUCT_ID'];?>" data-rel="dialog" data-transition="slide">
						<img src="<?php echo base_url(). "uploads/product/". $key['PRODUCT_IMAGE'];?>" />
						<h3>
							<?php echo $key['PRODUCT_NAME']; ?>
							<span style="color:green">
								<?php if ($today <= $key['OFFER_END']) {
									echo $key['OFFER_TITLE'];
								} ?>
							</span>
						</h3>
					</a>
				</li>
			<?php } ?>
		</ul>

  	</div>