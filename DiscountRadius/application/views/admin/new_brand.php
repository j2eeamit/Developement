<div data-role="page" id="brand_master" data-role="brand_master">
    <div data-role="header">
        <a href="<?php echo base_url();?>adminpanel" data-role="button" data-icon="back" data-theme="b">Back</a>
     	  <h1>Add New Brand</h1>
        <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->

  	<div data-role="content"> 
    	<?php if($success){?>
            <div id="message-success"><?php echo $success; ?></div>
        <?php } ?>

        <?php if($failed){?>
            <div id="message-failed"><?php echo $failed; ?></div>
        <?php } ?>

    	<form action="<?php echo base_url();?>adminpanel/add_new_brand" name="newBrand" id="newBrand" method="post">
			<fieldset>
                <!-- <div class="fieldsroup">
                    <select id="category" name="category">
                    <?php
                      foreach ($getAllCategory as $key) {?>
                        <option value="<?php echo $key['CAT_ID']; ?>"><?php echo $key['CAT_NAME']; ?></option>         
                    <?php } ?>
                    </select>  
                </div> -->

            	<div class="fieldgroup">
                    <label for="new_brand">Enter Brand Name</label>
                    <input type="text" name="new_brand" value="" AUTOCOMPLETE=OFF>
                </div>
                <div>
                    <input type="submit" value="Add Brand" class="submit" data-theme="b">
                </div>
			</fieldset>
		</form>

 	</div>