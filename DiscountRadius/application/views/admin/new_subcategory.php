<div data-role="page" id="admin_new_category" data-role="admin_new_category">
    <div data-role="header">
      <a href="<?php echo base_url();?>adminpanel" data-role="button" data-icon="back" data-theme="b">Back</a>
      <h2> Hello <?php if ($this->session->userdata('is_logged_in')){
            echo $this->session->userdata('USER_NAME');
          }?>
          , CMS PANEL
      </h2>
      <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->

    <div data-role="content">
    	<?php if($success){?>
            <div id="message-success"><?php echo $success; ?></div>
        <?php } ?>

        <?php if($failed){?>
            <div id="message-failed"><?php echo $failed; ?></div>
        <?php } ?>

    	<form action="<?php echo base_url();?>adminpanel/add_subcategory" name="newCategory" id="newCategory" method="post">
  			<fieldset>
            <div class="fieldgroup">
                <label for="category">Select Category</label>
                <select id="category" name="category">
                  <?php
                    foreach ($getAllCategory as $key) {?>
                      <option value="<?php echo $key['CAT_ID']; ?>"><?php echo $key['CAT_NAME']; ?></option>        
                  <?php } ?>
                </select>
            </div>
          	<div class="fieldgroup">
                <label for="txtsubcategory">Enter Sub Category</label>
                <input type="text" name="txtsubcategory"id="txtsubcategory" value="" AUTOCOMPLETE=OFF>
            </div>
            <div class="fieldgroup">
                <input type="submit" value="Add Sub Category" class="submit" data-theme="b">
            </div>
  			</fieldset>
		  </form>
    </div>