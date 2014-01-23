
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
  <link type="text/css" href="http://dev.jtsage.com/cdn/datebox/latest/jquery.mobile.datebox.min.css" rel="stylesheet" /> 
  <link type="text/css" href="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog.min.css" rel="stylesheet" /> 
  <link type="text/css" href="http://dev.jtsage.com/jQM-DateBox/css/demos.css" rel="stylesheet" /> 
  
  <!-- NOTE: Script load order is significant! -->
  
  <script type="text/javascript" src="http://dev.jtsage.com/jquery.mousewheel.min.js"></script>
  <script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jquery.mobile.datebox.min.js"></script>
  <script type="text/javascript" src="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog.min.js"></script>

<?php 
	foreach ($get_offer_list as $key) {
			/*echo $key['OFFER_ID'];
	        echo $key['BRAND_ID'];
	        echo $key['PRODUCT_ID'];
	        echo $key['OFFER_TITLE'];
	        echo $key['OFFER_DESCRIPTION'];
	        echo $key['OFFER_TYPE'];
	        echo $key['OFFER_START'];
	        echo $key['OFFER_END'];
	        echo $key['OFFER_WEEK_DAYS'];
	        echo $key['OFFER_START_TIME'];
	        echo $key['OFFER_END_TIME'];
	        echo $key['OFFER_DURATION'];
	        echo $key['OFFER_ADDED_ON'];*/
	?>
	 <form action="<?php echo base_url();?>client/edit_new_offer" name="edit_frm_offer" id="edit_frm_offer" method="post">
        <fieldset>
          Select Brand:
          <div data-role="fieldcontain">
              <select id="brand" name="brand" data-native-menu="false" onchange="showProduct(this.value)" >
              <?php 
                foreach ($getAllbrand as $key) {?>
                  <!-- <option value="<?php echo $key['BRAND_ID']; ?>"><?php echo $key['BRAND_NAME']; ?></option>          -->
              <?php } ?>
              </select>  
          </div>

          <div id="brandDetailsAjax">   </div>

          <div class="fieldgroup">
              <label for="offer_title">Enter offer title</label>
              <input type="text" id="offer_title" name="offer_title" value="<?php echo $key['OFFER_TITLE'];?>" AUTOCOMPLETE=OFF>
          </div>

          <div class="fieldgroup">
              <label for="offer_title">Enter offer description</label>
              <TEXTAREA id="offer_description" name="offer_description" AUTOCOMPLETE=OFF><?php echo $key['OFFER_DESCRIPTION'];?></TEXTAREA>
          </div>


          <div data-role="fieldcontain">
            <fieldset data-role="controlgroup" data-type="horizontal">
              <legend>Choose a offer type:</legend><BR>
              	<?php if ($key['OFFER_TYPE']=='monthly') { ?>
                  	<input type="radio" name="offer_type_radio" id="first_radio_monthly" checked="checked" value="monthly" />
              	<?php }else{?>
              		<input type="radio" name="offer_type_radio" id="first_radio_monthly" value="monthly" />
              	<?php } ?>
                  	<label for="first_radio_monthly">Monthly</label>

				<?php if ($key['OFFER_TYPE']=='daily') { ?>
                  	<input type="radio" name="offer_type_radio" id="first_radio_daily" checked="checked" value="daily" />
                <?php }else{?>
                	<input type="radio" name="offer_type_radio" id="first_radio_daily" value="daily" />
                <?php } ?>
                  	<label for="first_radio_daily">Daily</label>

                <?php if ($key['OFFER_TYPE']=='hourly') { ?>
                  	<input type="radio" name="offer_type_radio" id="first_radio_hourly" checked="checked" value="hourly" />
                <?php }else{?>
                	<input type="radio" name="offer_type_radio" id="first_radio_hourly" value="hourly" />
                <?php } ?>
                  	<label for="first_radio_hourly">Hours</label>

            <div id="checklinkform" data-role="fieldcontain">
	            <label for ="offerStart">Start Date</label>
	            <input name="offerStart" id="offerStart" type="date" value="<?php echo $key['OFFER_START'];?>" data-role="datebox"  data-options='{"mode": "calbox", "useTodayButton": true}'>

	            <label for ="offerEnd">End Date</label>
	            <input name="offerEnd" id="offerEnd" type="date" value="<?php echo $key['OFFER_END'];?>" data-role="datebox"  data-options='{"mode": "calbox", "useTodayButton": true}'>
          	</div>
           <!-- End of Date Range -->

           	<div data-role="fieldcontain">
            <label for ="weekDays">Week days</label><br>
              <select id="weekDays[]" name="weekDays[]" multiple="multiple" data-native-menu="false">
                  <option value="0">Sunday</option>         
                  <option value="1">Monday</option>         
                  <option value="2">Tuesday</option>         
                  <option value="3">Wednesday</option>         
                  <option value="4">Thursday</option>         
                  <option value="5">Friday</option>         
                  <option value="6">Satarday</option>         
              </select>  
           	</div>

          	<!-- Start of Time Range -->
          	<div data-role="fieldcontain">
	            <label for="startTime">Start Time</label>
	            <input name="startTime" type="text" value="<?php echo $key['OFFER_START_TIME'];?>" data-role="datebox" data-options='{"mode": "timebox"}' id="startTime" />
	            <label for="duration">Duration</label>
	            <input name="duration" type="text"  value="<?php echo $key['OFFER_DURATION'];?>" data-role="datebox" data-options='{"mode": "durationbox", "defaultPickerValue":0}' id="duration" />
	            <label for="endTime">End Time</label>
	            <input name="endTime" type="text"   value="<?php echo $key['OFFER_END_TIME'];?>" data-role="datebox" data-options='{"mode": "timebox"}' id="endTime" />
          	</div>
          <!-- End of Time Range -->

          	<div class="fieldgroup">
              	<input type="submit" name="submit" value="Update Offer">
          	</div>


        </fieldset>
      </div>
	<?php }?>
