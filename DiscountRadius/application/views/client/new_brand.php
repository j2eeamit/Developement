  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
  <link type="text/css" href="http://dev.jtsage.com/cdn/datebox/latest/jquery.mobile.datebox.min.css" rel="stylesheet" /> 
  <link type="text/css" href="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog.min.css" rel="stylesheet" /> 
  <link type="text/css" href="http://dev.jtsage.com/jQM-DateBox/css/demos.css" rel="stylesheet" /> 
  
  <!-- NOTE: Script load order is significant! -->
  
  <script type="text/javascript" src="http://dev.jtsage.com/jquery.mousewheel.min.js"></script>
  <script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jquery.mobile.datebox.min.js"></script>
  <script type="text/javascript" src="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog.min.js"></script>


<div data-role="page" id="new_brand">
    <div data-role="header">
      <a href="<?php echo base_url();?>client" data-role="button" data-icon="back" data-theme="b">Back</a>
      <h2> Hello <?php if ($this->session->userdata('is_logged_in')){
            echo $this->session->userdata('USER_NAME');
          }?>
          , CLIENT PANEL
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
    	
        <!-- HTML form for validation demo -->
      <form action="<?php echo base_url();?>client/add_new_brand" data-ajax="false" method="post" id="add_new_brand"  enctype="multipart/form-data">
        <div id="form-content">
            <fieldset>
                <div class="fieldgroup">
                    <label for="category1">Select Category</label>
                    <select id="category" name="category" onchange="showSubCatgeory(this.value);">
                      <?php
                        foreach ($getAllCategory as $key) {?>
                          <option value="<?php echo $key['CAT_ID']; ?>"> 
                              <?php echo $key['CAT_NAME']; ?>
                          </option>         
                      <?php } ?>
                    </select>
                </div>


                <div class="fieldgroup">
                    <div id="subCategoryListing"></div>
                </div>

                <div class="fieldgroup">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" name="brand_name" value="" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="comp_name">Company Name</label>
                    <input type="text" name="comp_name" value="" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="location">Location</label>
                    <input type="text" name="location" value="" AUTOCOMPLETE=OFF>
                </div>

                 <div class="fieldgroup">
                    <label for="city">City</label>
                    <input type="text" name="city" value="" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="collection">Collection</label>
                    <input type="text" name="collection" value="" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="offer">Offer</label>
                    <input type="text" name="offer" value="" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="offerStart">Offer Starts on</label>
                    <input name="offerStart" id="offerStart" type="date" AUTOCOMPLETE=OFF data-role="datebox"
                       data-options='{"mode": "slidebox", "dateFormat":"%Y-%m-%d %I:%M:%S %p","fieldsOrderOverride":["y","m","d","h","i","s"]}'> 
                       <!-- "timeFormatOverride":12, -->
                </div>

                <div class="fieldgroup">
                    <label for="offerValidity">Offer Validity</label>
                    <input name="offerValidity" id="offerValidity" type="date" AUTOCOMPLETE=OFF data-role="datebox"
                       data-options='{"mode": "slidebox", "dateFormat":"%Y-%m-%d %I:%M:%S %p","fieldsOrderOverride":["y","m","d","h","i"]}'>
                </div>
                <BR>
                <div class="fieldgroup">
                    <label for="pics_upload">Upload Pics</label>
                    <input type="file" name="pics_upload" id ="pics_upload" value="" AUTOCOMPLETE=OFF>

                </div>

                <div class="fieldgroup">
                    <input type="submit" value="Submit" class="submit" data-theme="b">
                </div>

            </fieldset>
          </div>
      </form>
  </div>

  <script>
    function showSubCatgeory (id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>client/show_subcategory_ajax",
            data: ({catId: id}),
            cache: false,
            dataType: "text",
            success: onSuccess
          });
      }

      function onSuccess(data){
          $("#subCategoryListing").html(data);
      }
  </script>