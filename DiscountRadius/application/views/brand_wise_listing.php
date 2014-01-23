<div data-role="page" id="product" data-role="product">
    <div data-role="header" data-position="fixed" >
	    <a href="<?php echo base_url();?>home" data-role="button" data-icon="back" data-theme="b">Back</a>
	    <h1>PRODUCT</h1>
	    <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    
  		<div data-role="navbar" >
  			<ul>
  				<li><a href="<?php echo base_url();?>home/other_product">PRODUCT</a></li>
  				<li><a href="<?php echo base_url();?>home/brand_wise_listing" class="ui-btn-active ui-state-persist">BRAND</a></li>
  				<li><a href="<?php echo base_url();?>home/offer_wise_product_listing">OFFER</a></li>
  				<li><a href="<?php echo base_url();?>home/lacation_wise_product_listing">LOCATION</a></li>
  			</ul>
  		</div><!-- /navbar -->

	</div><!-- /header  data-fullscreen="true"-->

<?php //echo"<PRE>"; print_r($brandList); ?>

	<div data-role="content"> 
          <div data-role="fieldcontain">
              <select id="brand" name="brand" data-native-menu="false" onchange="getBrandWiseListing(this.value);">
              <?php foreach ($brandList as $key) {?>
                  	<option value="<?php echo $key['BRAND_ID']; ?>"><?php echo $key['BRAND_NAME']; ?></option>         
              <?php } ?>
              </select>  
          </div>

          <div id="brandWiseListing"></div>
  	</div>

  	<script>
      function getBrandWiseListing(bId) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>home/brand_wise_listing_ajax",
            data: ({brandId: bId}),
            cache: false,
            dataType: "text",
            success: onSuccess
          });
      }

      function onSuccess(data){
          $("#brandWiseListing").html(data);
           $( "div[data-role=page]" ).page( "destroy" ).page();
      }
    </script>