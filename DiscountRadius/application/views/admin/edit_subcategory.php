<div data-role="page" id="edit_category" data-role="edit_category">
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

    	
        Select Sub Category:
        <select id="subcategory" name="subcategory" onchange="showsubCatgeory(this.value);">
          <?php
            foreach ($getAllSubCategory as $key) {?>
              <option value="<?php echo $key['SUB_CAT_ID']; ?>"><?php echo $key['SUB_CAT_NAME']; ?></option>         
          <?php } ?>
        </select>

      <div id="resultLog"></div>
    </div>

    <script>
      function showsubCatgeory(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>adminpanel/show_edit_subcategory",
            data: ({subcatId: id}),
            cache: false,
            dataType: "text",
            success: onSuccess
          });
      }

      function onSuccess(data){
          $("#resultLog").html(data);
      }
    </script>