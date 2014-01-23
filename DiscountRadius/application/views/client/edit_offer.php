<div data-role="page" id="edit_offer">
    <div data-role="header">
	    <a href="<?php echo base_url();?>client" data-role="button" data-icon="back" data-theme="b">Back</a>
	    <h1>EDIT OFFER</h1>
	    <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    
	</div><!-- /header  data-fullscreen="true"  onchange="getBrandWiseListing(this.value);"-->

	<div data-role="content"> 
      	<div data-role="fieldcontain">
      		Select Brand<BR>
          	<select id="brand" name="brand" data-native-menu="false" onchange="edit_offer(this.value);">
          	<?php foreach ($getAllbrand as $key) {?>
              	<option value="<?php echo $key['BRAND_ID']; ?>"><?php echo $key['BRAND_NAME']; ?></option>         
          	<?php } ?>
          	</select>  
     	</div>

      <div id="product_edit_listing"></div>

  	</div>

  	<script>
      function edit_offer(brandId) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>client/offer_edit",
            data: ({brand_id: brandId}),
            cache: false,
            dataType: "text",
            success: onSuccess
          });
      }

      function onSuccess(data){
          $("#product_edit_listing").html(data);
      }
    </script>
