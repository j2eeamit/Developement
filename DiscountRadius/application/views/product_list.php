  	<?php if($offer_product){ ?>
	 	Select Offer:
	  	<div data-role="fieldcontain">
	      	<select id="product" name="product" data-native-menu="false" onchange="show_offer_edit_listing(this.value);">
		      	<?php 
		        foreach ($offer_product as $key) {?>
		          <option value="<?php echo $key['OFFER_ID']; ?>"><?php echo $key['OFFER_TITLE']; ?></option>         
		      	<?php } ?>
	      	</select>
	  	</div>
    <?php }else{
    	echo "<font color=\"red\">No offer found!</font>";
    } ?>

    <div id="offer_edit_view"></div>
    <script>
    function show_offer_edit_listing (offerid) {
    	$.ajax({
            type: "POST",
            url: "<?php echo base_url();?>client/show_offer_edit_view",
            data: ({offer_id: offerid}),
            cache: false,
            dataType: "text",
            success: onSuccess
          });
    }

    function onSuccess(data){
          $("#offer_edit_view").html(data);
    }
    </script>