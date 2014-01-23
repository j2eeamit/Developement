<div data-role="page" id="product_master" data-role="product_master">
    <div data-role="header">
        <a href="<?php echo base_url();?>client" data-role="button" data-icon="back" data-theme="b">Back</a>
     	  <h1>Add New Product</h1>
        <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->

  	<div data-role="content"> 
    	<?php if($success){?>
            <div id="message-success"><?php echo $success; ?></div>
        <?php } ?>

        <?php if($failed){?>
            <div id="message-failed"><?php echo $failed; ?></div>
        <?php } ?>

    	<form action="<?php echo base_url();?>client/add_new_product" name="newProduct" id="newProduct" data-ajax="false"  method="post" enctype="multipart/form-data">
			<fieldset>
                <div class="fieldsroup">
                    <label for="brand">Select Brand</label>
                    <select id="brand" name="brand" ASC>
                    <?php
                      foreach ($getAllBrand as $key) {?>
                        <option value="<?php echo $key['BRAND_ID']; ?>"><?php echo $key['BRAND_NAME']; ?></option>         
                    <?php } ?>
                    </select>  
                </div>

            	<div class="fieldgroup">
                    <label for="new_product">Enter Product Name</label>
                    <input type="text" name="new_product" value="" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="new_product_model_no">Enter Product Model No</label>
                    <input type="text" name="new_product_model_no" value="" AUTOCOMPLETE=OFF>
                </div>

                 <div class="fieldgroup">
                    <label for="new_product_title">Enter Product Title</label>
                    <input type="text" name="new_product_title" value="" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="product_description">Enter Product description</label>
                    <textarea name="product_description" id="product_description"></textarea>
                </div>

                <div class="fieldgroup">
                    <label for="product_image">Product Image</label>
                    <input type="file" id="product_image" name="product_image">
                </div>

                <div>
                    <input type="submit" value="Add Product" class="submit" data-theme="b">
                </div>
			</fieldset>
		</form>

 	</div>