<div data-role="page" id="brand_listing">
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
        <h2>Brand Listing</h2>
		<ul data-role="listview" data-filter="true">
			<?php foreach ($getAllBrand as $value) {?>
				
					<li>
						<a href="<?php echo base_url();?>client/brand_dialog/<?php echo $value['BR_ID'];?>" data-rel="dialog"  data-transition="slide">
							<?php if($value['BR_PIC_NAME']){?>
                <img src="<?php echo base_url()."uploads/brand/".$value['BR_PIC_NAME'];?>" height="50px" width="50px"/>
              <?php }else {?> 
                <img src="<?php echo base_url()."uploads/brand/no_image.jpg" ?>" height="50px" width="50px"/>
              <?php } ?>
							<h3><?php  echo $value['BR_NAME']; ?></h3>
							<p><?php   echo $value['BR_COLLECTION'] ."<BR>".$value['BR_CITY'] ;?></p>
						</a>
					</li>
				
			<?php } ?>
		</ul>
	</div>