<div data-role="page" id="admin_home" data-role="admin_home">
    <div data-role="header">
      <!-- <a href="<?php echo base_url();?>home" data-role="button" data-icon="back" data-theme="b">Back</a> -->
      <h2> Hello <?php if ($this->session->userdata('is_logged_in')){
            echo $this->session->userdata('USER_NAME');
          }?>
          , Welcome to AdminPanel
      </h2>
      <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->

    <div data-role="content">
		<div data-role="collapsible-set" data-content-theme="c">
			<div data-role="collapsible" data-theme="b" data-content-theme="d">
				<h3>Manage Category</h3>
				<p>
					<ul data-role="listview">
						<li><a href="<?php echo base_url();?>adminpanel/new_category" data-transition="slide">Add New <span class="ui-li-count"><?php echo $cnt_nos_category; ?></span></a></li>
						<li><a href="<?php echo base_url();?>adminpanel/edit_category" data-transition="slide">Edit</a></li>
					</ul>
				<p>
			</div>
		</div>

		<div data-role="collapsible-set" data-content-theme="c">
			<div data-role="collapsible" data-theme="b" data-content-theme="d">
				<h3>Manage Sub Category</h3>
				<p>
					<ul data-role="listview">
						<li><a href="<?php echo base_url();?>adminpanel/new_subcategory" data-transition="slide">Add New<span class="ui-li-count"><?php echo $cnt_nos_sub_category; ?></span></a></li>
						<li><a href="<?php echo base_url();?>adminpanel/edit_subcategory" data-transition="slide">Edit</a></li>
					</ul>
				<p>
			</div>
		</div>

		<div data-role="collapsible-set" data-content-theme="c">
			<div data-role="collapsible" data-theme="b" data-content-theme="d">
				<h3>Manage Brand</h3>
				<p>
					<ul data-role="listview">
						<li><a href="<?php echo base_url();?>adminpanel/new_brand" data-transition="slide">Add Brand<span class="ui-li-count"><?php echo $cnt_nos_brand; ?></span></a></li>
						<li><a href="<?php echo base_url();?>adminpanel/edit_brand" data-transition="slide">Edit Brand</a></li>
					</ul>
				<p>
			</div>
		</div>

		<!-- <div data-role="collapsible-set" data-content-theme="c">
			<div data-role="collapsible" data-theme="b" data-content-theme="d">
				<h3>Manage User</h3>
				<p>
					<ul data-role="listview">
						<li><a href="">Change User Type <span class="ui-li-count" data-transition="slide"><?php echo($cnt_nos_user); ?></span></a></li>
					</ul>
				<p>
			</div>
		</div>
		
		<div data-role="collapsible-set" data-content-theme="c">
			<div data-role="collapsible" data-theme="b" data-content-theme="d">
				<h3>Manage Client</h3>
				<p>
					<ul data-role="listview">
						<li> <a href="<?php echo base_url();?>adminpanel/set_unset_client">Set / Unset as Client</a></li>
						<li>Delete Client<span class="ui-li-count">5</span></li>
					</ul>
				</p>
			</div>
		</div>

		<div data-role="collapsible-set" data-content-theme="c">
			<div data-role="collapsible" data-theme="b" data-content-theme="b">
				<h3>Manage Movie</h3>
				<p>
					<ul data-role="listview">
						<li>Add New Movie</li>
						<li>Edit / Update Movie</li>
						<li>Delete Movie<span class="ui-li-count">5</span></li>
					</ul>
				</p>
			</div>
		</div>

		<div data-role="collapsible-set" data-content-theme="c">
			<div data-role="collapsible" data-theme="b" data-content-theme="b">
				<h3>Manage Cinema</h3>
				<p>
					<ul data-role="listview">
						<li>Add New Cinema</li>
						<li>Edit / Update Cinema</li>
						<li>Delete Cinema<span class="ui-li-count">5</span></li>
					</ul>
				</p>
			</div>
		</div>-->

	</div>