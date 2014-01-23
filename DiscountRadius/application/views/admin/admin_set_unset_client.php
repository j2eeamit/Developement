<script language="text/javascript">
       	$('#search').submit(function() {
		  alert('Handler for .submit() called.');
		  return false;
		});
</script>
<div data-role="page" id="admin_set_unset_client" data-role="admin_set_unset_client">
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
    	<form action="<?php echo base_url();?>adminpanel/search_email" name="frm_search_email" method="post">
			<fieldset class="ui-grid-a">
			    <div class="ui-block-a">
			        <input type="text" name="txt_search_email" id="txt_search_email" value="Search Email">
			    </div>
			    <div class="ui-block-b">
			            <input type="submit" data-type="button" data-icon="search" value="Search">
			    </div>
			</fieldset>
		</form>
		<div id="user_to_client"></div>
    </div>
