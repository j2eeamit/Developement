<div data-role="page" id="edit_brand_view" data-role="edit_brand_view">
    <div data-role="header">
      <a href="<?php echo base_url();?>client" data-role="button" data-icon="back" data-theme="b">Back</a>
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

      Select brand to edit:
      <select id="subcategory" name="subcategory" onchange="showBrand(this.value);">
        <?php
          foreach ($getAllBrand as $key) {?>
            <option value="<?php echo $key['BR_ID']; ?>"><?php echo $key['BR_NAME']; ?></option>         
        <?php } ?>
      </select>   

      <div id="resultLog"></div>
    
    </div>

    <script>
      function showBrand(id) {
        $("#resultLog").delay(300);
        $("#resultLog").html('<center><img src="<?php echo base_url();?>images/ajax-loader.gif">');

        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>client/show_edit_brand_ajax",
            data: ({brand_id: id}),
            cache: false,
            dataType: "text",
            success: onSuccess
          });
      }

      function onSuccess(data){

          $("#resultLog").html(data);
      }
    </script>