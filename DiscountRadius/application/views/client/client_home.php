<div data-role="page" id="client_home" data-role="client_home">
    <div data-role="header">
      <!-- <a href="<?php echo base_url();?>home" data-role="button" data-icon="back" data-theme="b">Back</a> -->
      <h2> Hello <?php if ($this->session->userdata('is_logged_in')){
            echo $this->session->userdata('USER_NAME');
          }?>
          , CLIENT PANEL
      </h2>
      <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->

    <div data-role="content">
		<div data-role="collapsible-set" data-content-theme="c">
			<!-- <div data-role="collapsible" data-theme="b" data-content-theme="d">
				<h3>Manage Brand</h3>
				<p>
					<ul data-role="listview">
						<li><a href="<?php echo base_url();?>client/brand_listing">Brand Listing<span class="ui-li-count"><?php echo $cnt_nos_brand; ?></span></a></li>
						<li><a href="<?php echo base_url();?>client/new_brand">Add New</a></li>
						<li><a href="<?php echo base_url();?>client/edit_brand_view">Edit</a></li>
					</ul>
				<p>
			</div> -->

			<div data-role="collapsible" data-theme="b" data-content-theme="d">
				<h3>Manage Product</h3>
				<p>
					<ul data-role="listview">
						<li><a href="<?php echo base_url();?>client/product_listing">Product Listing<span class="ui-li-count"><?php echo $cnt_nos_product; ?></span></a></li>
						<li><a href="<?php echo base_url();?>client/new_product">New Product</a></li>
					</ul>
				<p>
			</div>

			<div data-role="collapsible" data-theme="b" data-content-theme="d">
				<h3>Manage Offer</h3>
				<p>
					<ul data-role="listview">
						<li><a href="<?php echo base_url();?>client/new_offer">New Offer</a></li>
						<li><a href="<?php echo base_url();?>client/edit_offer">Edit Offer</a></li>
					</ul>
				<p>
			</div>

		</div>
	</div>



