<div data-role="page" id="edit_product_master" data-role="edit_product_master">
    <div data-role="header">
        <a href="<?php echo base_url();?>client" data-role="button" data-icon="back" data-theme="b">Back</a>
     	  <h1>Edit Product</h1>
        <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->

  	<div data-role="content"> 
    	<?php if($success){?>
            <div id="message-success"><?php echo $success; ?></div>
        <?php } ?>

        <?php if($failed){?>
            <div id="message-failed"><?php echo $failed; ?></div>
        <?php } ?>

    	<form action="<?php echo base_url();?>client/add_edit_product" name="editProduct" id="editProduct" data-ajax="false"  method="post" enctype="multipart/form-data">
			 <input type="hidden" name="editID" value="<?PHP echo $getAllProduct[0]['PRODUCT_ID']?>">
            <fieldset>
                <div class="fieldsroup">
                    <label for="brand">Select Brand</label>
                    <select id="brand" name="brand" ASC>
                    <?php foreach ($getAllBrand as $key) {?>
                        <option value="<?php echo $key['BRAND_ID']; ?>" 
                            <?php if ($key['BRAND_ID']==$getAllProduct[0]['BRAND_ID']) { ?>
                                SELECTED
                            <?php } ?> 
                        ><?php echo $key['BRAND_NAME']; ?></option>         
                    <?php } ?>
                    </select>  
                </div>

            	<div class="fieldgroup">
                    <label for="new_product">Enter Product Name</label>
                    <input type="text" name="new_product" value="<?PHP echo $getAllProduct[0]['PRODUCT_NAME']?>" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="new_product_model_no">Enter Product Model No</label>
                    <input type="text" name="new_product_model_no" value="<?PHP echo $getAllProduct[0]['PRODUCT_MODEL_NO']?>" AUTOCOMPLETE=OFF>
                </div>

                 <div class="fieldgroup">
                    <label for="new_product_title">Enter Product Title</label>
                    <input type="text" name="new_product_title" value="<?PHP echo $getAllProduct[0]['PRODUCT_TITLE']?>" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="product_description">Enter Product description</label>
                    <textarea name="product_description" id="product_description"> <?PHP echo $getAllProduct[0]['PRODUCT_DESCRIPTION']?> </textarea>
                </div>

                <div class="fieldgroup">
                    <label for="product_image">Product Image</label>
                    <input type="file" id="product_image" name="product_image"><BR>
                    <img src="<?php echo base_url(). "uploads/product/". $getAllProduct[0]['PRODUCT_IMAGE'];?>" HEIGHT="150px" width="150px">
                </div>

                <div>
                    <input type="submit" value="Update Product" class="submit" data-theme="b">
                </div>
			</fieldset>
		</form>

 	</div>