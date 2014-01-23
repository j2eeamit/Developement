<div data-role="page" id="product" data-role="product">
    <div data-role="header" data-position="fixed" >
	    <a href="<?php echo base_url();?>home" data-role="button" data-icon="back" data-theme="b">Back</a>
	    <h1>FIND NEAREST STORE</h1>
	    <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    
  		<div data-role="navbar" >
  			<ul>
  				<li><a href="<?php echo base_url();?>home/other_product">PRODUCT</a></li>
  				<li><a href="<?php echo base_url();?>home/brand_wise_listing">BRAND</a></li>
  				<li><a href="<?php echo base_url();?>home/offer_wise_product_listing">OFFER</a></li>
  				<li><a href="<?php echo base_url();?>home/lacation_wise_product_listing" class="ui-btn-active ui-state-persist">LOCATION</a></li>
  			</ul>
  		</div><!-- /navbar -->

  	</div><!-- /header  data-fullscreen="true"-->

  	<div data-role="content"> 
          <div data-role="fieldcontain">
              <select id="city" name="city" data-ajax="true" data-direction="reverse" data-native-menu="false" onchange="getCityWiseListing(this.value);">
              <?php foreach ($distinctCity as $key) {?>
                  	<option value="<?php echo $key['CITY']; ?>"><?php echo $key['CITY']; ?></option>         
              <?php } ?>
              </select>  
          </div>

          <div id="cityWiseListing"></div>
  	</div>

  	<script>
            $(document).ready(function(){
                $("#brandList").listview("refresh");
            });  
            
      function getCityWiseListing(cityName) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>home/show_location_wise_data",
            data: ({city: cityName}),
            cache: false,
            dataType: "text",
            success: onSuccess
          })
         // $( "div#cityWiseListing[data-role=page]" ).page( "destroy" ).page();
          
          /*$.mobile.changePage( "<?php echo base_url();?>home/show_location_wise_data", {
                    type: "post",
                    data:  {city: cityName},
                    changeHash:true,
                    reverse: true,
                    success: onSuccess
            });*/
      }
           

      function onSuccess(data){
          $("#cityWiseListing").html(data);
          $( "div[data-role=page]" ).page( "destroy" ).page();
          
          //$( "div[data-role=content]" ).page( "destroy" ).page();
          
      }
    </script>