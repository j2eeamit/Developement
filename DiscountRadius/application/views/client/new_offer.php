  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
  <link type="text/css" href="http://dev.jtsage.com/cdn/datebox/latest/jquery.mobile.datebox.min.css" rel="stylesheet" /> 
  <link type="text/css" href="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog.min.css" rel="stylesheet" /> 
  <link type="text/css" href="http://dev.jtsage.com/jQM-DateBox/css/demos.css" rel="stylesheet" /> 
  
  <!-- NOTE: Script load order is significant! -->
  
  <script type="text/javascript" src="http://dev.jtsage.com/jquery.mousewheel.min.js"></script>
  <script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jquery.mobile.datebox.min.js"></script>
  <script type="text/javascript" src="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog.min.js"></script>


<div data-role="page" id="new_offer">
    <div data-role="header">
        <a href="<?php echo base_url();?>client" data-role="button" data-icon="back" data-theme="b">Back</a>
     	  <h1>Add New offer</h1>
        <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->

  	<div data-role="content">
      <?php if($success){?>
          <div id="message-success"><?php echo $success; ?></div>
      <?php } ?>

      <?php if($failed){?>
          <div id="message-failed"><?php echo $failed; ?></div>
      <?php } ?>

      <form action="<?php echo base_url();?>client/add_new_offer" name="frm_offer" id="frm_offer" method="post">
        <fieldset>
          Select Brand:
          <div data-role="fieldcontain">
              <select id="brand" name="brand" data-native-menu="false" onchange="showProduct(this.value)" >
              <?php 
                foreach ($getAllbrand as $key) {?>
                  <option value="<?php echo $key['BRAND_ID']; ?>"><?php echo $key['BRAND_NAME']; ?></option>         
              <?php } ?>
              </select>  
          </div>

          <!-- Select Product:
          <div data-role="fieldcontain">
              <select id="product[]" name="product[]" multiple="multiple" data-native-menu="false" >
              <?php 
                foreach ($getAllProduct as $key) {?>
                  <option value="<?php echo $key['PRODUCT_ID']; ?>"><?php echo $key['PRODUCT_NAME']; ?></option>         
              <?php } ?>
              </select>  
          </div> -->

          <div id="brandDetailsAjax">   </div>

          <div class="fieldgroup">
              <label for="offer_title">Enter offer title</label>
              <input type="text" id="offer_title" name="offer_title" value="" AUTOCOMPLETE=OFF>
          </div>

          <div class="fieldgroup">
              <label for="offer_title">Enter offer description</label>
              <TEXTAREA id="offer_description" name="offer_description" AUTOCOMPLETE=OFF></TEXTAREA>
          </div>


          <div data-role="fieldcontain">
            <fieldset data-role="controlgroup" data-type="horizontal">
              <legend>Choose a offer type:</legend><BR>
                  <input type="radio" name="offer_type_radio" id="first_radio_monthly" value="monthly" />
                  <label for="first_radio_monthly">Monthly</label>
                  
                  <!--<input type="radio" name="offer_type_radio" id="first_radio_weekly" value="weekly" />
                  <label for="first_radio_weekly">Weekly</label>-->

                  <input type="radio" name="offer_type_radio" id="first_radio_daily" value="daily" />
                  <label for="first_radio_daily">Daily</label>

                  <input type="radio" name="offer_type_radio" id="first_radio_hourly" value="hourly" />
                  <label for="first_radio_hourly">Hours</label>
            </fieldset>
          </div>

          <!--<div id="offerTypeRow"> 
              <div class="fieldgroup">
                  <label for="offerStart">Offer Starts on</label>
                  <input name="offerStart" id="offerStart" type="date" AUTOCOMPLETE=OFF data-role="datebox" data-role="datebox"
                      data-options='{"mode": "calbox", "calUsePickers": true, "calNoHeader": true}'>
                     data-options='{"mode": "slidebox", "dateFormat":"%Y-%m-%d %I:%M:%S %p","fieldsOrderOverride":["y","m","d","h","i","s"]}'> 
                      "timeFormatOverride":12,
              </div>

              <div class="fieldgroup">
                  <label for="offerEnds">Offer ends on</label>
                  <input name="offerEnds" id="offerEnds" type="date" AUTOCOMPLETE=OFF data-role="datebox" data-role="datebox"
                    data-options='{"mode": "calbox", "calUsePickers": true, "calNoHeader": true}'>
                   data-options='{"mode": "slidebox", "dateFormat":"%Y-%m-%d %I:%M:%S %p","fieldsOrderOverride":["y","m","d","h","i"]}'> 
              </div>
          </div>-->

          <!-- Start of Date Range -->
          <div id="checklinkform" data-role="fieldcontain">
            <label for ="offerStart">Start Date</label>
            <input name="offerStart" id="offerStart" type="date" data-role="datebox"  data-options='{"mode": "calbox", "useTodayButton": true}'>

            <label for ="offerEnd">End Date</label>
            <input name="offerEnd" id="offerEnd" type="date" data-role="datebox"  data-options='{"mode": "calbox", "useTodayButton": true}'>
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
            <input name="startTime" type="text" data-role="datebox" data-options='{"mode": "timebox"}' id="startTime" />
            <label for="duration">Duration</label>
            <input name="duration" type="text" data-role="datebox" data-options='{"mode": "durationbox", "defaultPickerValue":0}' id="duration" />
            <label for="endTime">End Time</label>
            <input name="endTime" type="text" data-role="datebox" data-options='{"mode": "timebox"}' id="endTime" />
          </div>
          <!-- End of Time Range -->

          <div class="fieldgroup">
              <input type="submit" name="submit" value="Add Offer">
          </div>
  		</fieldset>
    </form>

  	</div>

    <script>
    $(document).ready(function() {
      //$("#offerTypeRow,#offerTypeHours").hide();
      
     /*     $('#product').change(function() {
                    alert($(this).val());
                });
            });
     */    

      $('#display').click(function() {

            var result = '';
            $('#product > :selected').each(function() {
                result += "<div>" + $(this).text() + "</div>";
            });
            if (result == "") {
                result = "<div>Please select any option(s)..!</div>";
            }
            $("#brandDetailsAjax").html(result);

        });
        $('#reset').click(function() {
            $('#product > :selected').each(function() {
                $(this).removeAttr('selected');
            });
            $("#brandDetailsAjax").html('');

        });



      $('#offer_type_radio').checkboxradio('refresh',true);

      $("[name=offer_type_radio]").change(function() {
        var offer = $(this).val();
        
        if (offer=="monthly" || offer=="weekly") {
          $("#offerTypeRow").show();
        }else{
          $("#offerTypeRow").hide();
        }

        if (offer=="hourly") {
          $("#offerTypeHours").show();
        }else{
          $("#offerTypeHours").hide();
        }
      });

    });


      function dooffset() { // This does the actual work.  if you wanted based on "now", startdate should be = new Date();
        var startdate = $('#startTime').data('datebox').theDate,
          offsetsec = $('#duration').data('datebox').lastDuration,
          enddate = new Date(startdate.getFullYear(), startdate.getMonth(), startdate.getDate(), startdate.getHours(), startdate.getMinutes(), startdate.getSeconds(), 0);

        enddate.setSeconds(enddate.getSeconds() + offsetsec);
        $('#endTime').data('datebox').theDate = enddate;
        $('#endTime').trigger('datebox', {'method':'doset'});
      }
      $('#startTime').live('change', function() {
        $('#duration').trigger('datebox', {'method':'doset'});
      });
      $('#duration').live('change', function() {
        dooffset();
      });

    /*linkedCheckin = function (date, name) {
            // The widget itself
        var self     = this,
            // The day after whatever just got set
            // btw, Date().copymod() is an extension of datebox - basically:
            // copymod([y,m,d,h,i,s],[y,m,d,h,i,s]) : 
            //   * This first array is an OFFSET of the original
            //   * The second is an OVERRIDE of the original (if non-zero)
            nextday  = date.copymod([0,0,1]);
            // Today
            today    = new Date();
            // The difference of today and whatever got set (secs)
            diff     = parseInt((date - today) / ( 1000 * 60 * 60 * 24 ),10);
            // The same difference, in days (+2)
            diffstrt = (diff * -1)-2;
              
        // Lets fill in the other fields.
        $('#'+name+'_year_month').val(self._formatter('%Y-%m', date));
        $('#'+name+'_monthday').val(self._formatter('%d', date));
        // Update the seen output
        $('#checkoutput').text($('#checklinkform input').serialize());
              
        // If we edited the checkin date, more work to do
        if ( name === "checkin" ) {
          // Ok, so in steps: (nuke the comments)
          // Set the (internal) checkout date to be whatever was picking in checkin +1 day
          $('#checkout').data('datebox').theDate = nextday;
          // Show that to the user
          $('#checkout').trigger('datebox', {'method':'doset'});
          // Make sure that minDays won't let them check out same day or earlier
          $('#checkout').datebox({"minDays": diffstrt});
          // Open it up
          $('#checkout').datebox('open');
        }
      }*/

    </script>

    <script>
      function showBrandDetails() {
        //alert("hello");
        var result = '';
          $('#product > :selected').each(function() {
              result += "<div>" + $(this).text() + "</div>";
          });
          if (result == "") {
              result = "<div>Please select any option(s)</div>";
          }
          $("#brandDetailsAjax").html(result);


        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>client/show_brandData",
            data: ({brandData: arrayData}),
            cache: false,
            dataType: "text",
            success: onSuccess
          });
      }

      function onSuccess(data){
          $("#brandDetailsAjax").html(data);
      }

      function showProduct (id) {
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>client/show_ProductData",
            data: ({brandId: id}),
            cache: false,
            dataType: "text",
            success: function(data) {
                   $("#brandDetailsAjax").html(data);
            }
              
          });
      }

    </script>