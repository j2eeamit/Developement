
 <!-- start content -->
  <div data-role="page" id="login" data-role="login">	
    <div data-role="header">
      <h1>Discount Radius</h1>
    </div><!-- /header -->

    <div data-role="content">
       <?php if($log_err){?>
              <div class="error"><?php echo $log_err; ?></div>
          <?php } ?>

     <form id="validate_login" action="<?php echo base_url();?>login/check_login" method="POST" data-ajax="false">
      <fieldset>

        <label for="uname">Username:</label>
        <input type="text" name="uname" id="uname" value="" AUTOCOMPLETE=OFF />
        <span id='validate_login_uname_errorloc' class='error'></span>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="" AUTOCOMPLETE=OFF/>
        <span id='validate_login_password_errorloc' class='error'></span>
       
        <input type="submit" value="Login" class="submit" data-theme="b">

        <br />
        Don't have a login? <a href="<?php echo base_url();?>login/register">Sign Up</a>
        <!-- <a href="register.html" data-rel="dialog" data-role="button" data-transition="pop" data-theme="b">Sign Up</a> -->
      </fieldset>

    </form>
  </div>

  <script type='text/javascript'>
  // <![CDATA[
    var frmvalidator  = new Validator("validate_login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("uname","req","Please enter username");
    frmvalidator.addValidation("uname","minlen=4");

    
    frmvalidator.addValidation("password","req","Please enter the password");
    frmvalidator.addValidation("password","minlen=4");
    

  // ]]>
  </script>