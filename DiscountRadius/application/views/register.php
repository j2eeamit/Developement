<!-- Start of first page -->
<div data-role="page" id="register" data-role="register">
	<div data-role="header">
		<a href="<?php echo base_url();?>login" data-role="button" data-icon="back" data-theme="b">Back to Login</a>
		<h1>User Registration</h1>
	</div><!-- /header -->

	<div data-role="content">	
		
        <?php if($success){?>
            <div id="message-success"><?php echo $success; ?></div>
        <?php } ?>

        <?php if($failed){?>
            <div id="message-failed"><?php echo $failed; ?></div>
        <?php } ?>


    	<!-- HTML form for validation demo -->
    	<form action="<?php echo base_url();?>login/user_register" data-ajax="false" method="post" id="register_form" novalidate="novalidate">
        <div id="form-content">
            <fieldset>
            	<div class="fieldgroup">
                    <label for="username">User Name</label>
                    <input type="text" name="username" value="" AUTOCOMPLETE=OFF>
                    <span id='register_form_username_errorloc' class='error'></span>
                </div>

                <div class="fieldgroup">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" value="" AUTOCOMPLETE=OFF>
                    <span id='register_form_firstname_errorloc' class='error'></span>
                </div>

                <div class="fieldgroup">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" value="" AUTOCOMPLETE=OFF>
                    <span id='register_form_lastname_errorloc' class='error'></span>
                </div>

                <div class="fieldgroup">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="" AUTOCOMPLETE=OFF>
                    <span id='register_form_email_errorloc' class='error'></span>
                </div>

                <div class="fieldgroup">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" AUTOCOMPLETE=OFF>
                    <span id='register_form_password_errorloc' class='error'></span>
                </div>

                <div class="fieldgroup">
                    <p class="right">By clicking register you agree to our policy.</p>
                    <input type="submit" value="Register" class="submit" data-theme="b">
                </div>

            </fieldset>
        	</div>

            <div class="fieldgroup">
                <p>Already registered? <a href="<?PHP echo base_url();?>login">Sign in</a>.</p>
            </div>
    	</form>

    <script type='text/javascript'>
      // <![CDATA[
        var frmvalidator  = new Validator("register_form");
        frmvalidator.EnableOnPageErrorDisplay();
        frmvalidator.EnableMsgsTogether();

        frmvalidator.addValidation("username","req","Please enter Username");
        frmvalidator.addValidation("username","minlen=4");

        frmvalidator.addValidation("firstname","req","Please enter your first name");
        frmvalidator.addValidation("firstname","minlen=3");

        frmvalidator.addValidation("lastname","req","Please enter your lastname");
        frmvalidator.addValidation("lastname","minlen=3");

        frmvalidator.addValidation("email","req","Please enter the email id");
        frmvalidator.addValidation("email","minlen=5");
        frmvalidator.addValidation("email","email");
        
        frmvalidator.addValidation("password","req","Please enter password");
        frmvalidator.addValidation("password","minlen=4");
    
        // ]]>
    </script>


    	<!-- END HTML form for validation -->
	</div><!-- /content -->
</div><!-- /page -->

