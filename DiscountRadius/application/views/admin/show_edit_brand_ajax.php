<div data-role="content">   
	<?php if($success){?>
            <div id="message-success"><?php echo $success; ?></div>
    <?php } ?>

    <?php if($failed){?>
        <div id="message-failed"><?php echo $failed; ?></div>
    <?php } ?>
    
    <form action="<?php echo base_url();?>adminpanel/add_edit_brand" data-ajax="false" method="post" id="add_edit_brand"  enctype="multipart/form-data">
        <div id="form-content">
            <fieldset>
                <input type="hidden" name="brandID" value="<?php echo $brand_detail[0]['BRAND_ID'];?>">
                <div class="fieldgroup">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" name="brand_name" value="<?php echo $brand_detail[0]['BRAND_NAME'];?>" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <input type="submit" value="Update Brand" class="submit" data-theme="b">
                </div>
            </fieldset>
        </div>
    </form>
</div>