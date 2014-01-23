  	<?php if($getProductData){ ?>
	 	Select Product:
	  	<div data-role="fieldcontain">
	      	<select id="product[]" name="product[]" multiple="multiple" data-native-menu="false" >
		      	<?php 
		        foreach ($getProductData as $key) {?>
		          <option value="<?php echo $key['PRODUCT_ID']; ?>"><?php echo $key['PRODUCT_NAME']; ?></option>         
		      	<?php } ?>
	      	</select>
	  	</div>
    <?php }else{
    	echo "<font color=\"red\">No Product Found!</font>";
    } ?>