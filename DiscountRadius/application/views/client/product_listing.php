<div data-role="page" id="edit_product_view" data-role="edit_product_view">
    <div data-role="header">
      <a href="<?php echo base_url();?>client" data-role="button" data-icon="back" data-theme="b">Back</a>
      <h2>  <?php if ($this->session->userdata('is_logged_in')){
            //echo $this->session->userdata('USER_NAME');
          }?>
          PRODUCT LISTING
      </h2>
      <a href="<?php echo base_url();?>login/logout" data-role="button" data-icon="delete" data-ajax="false" data-theme="b">Logout</a> 
    </div><!-- /header -->

    <div data-role="content">
      <div class="content-primary">  
        <ul data-role="listview" data-filter="true" data-filter-placeholder="Search product...">
          <?php foreach ($getAllProduct as $key) { ?>
            <li>
              <a href="index.html">
                <?php if ($key['PRODUCT_IMAGE']) {?>
                    <img src="<?php echo base_url(). "uploads/product/". $key['PRODUCT_IMAGE'];?>" >
                <?php }else{ ?>
                    <img src="<?php  ?>">
                <?php } ?>

                <h3><?php echo $key['PRODUCT_NAME']; ?></h3>
                <p><?php echo $key['PRODUCT_MODEL_NO']; ?></p>
              </a>
              <p class="edit_delete">
                <a href="<?php echo base_url()."client/edit_product/" . $key['PRODUCT_ID'];?>">Edit</a> 
              </p>
            </li>
          <?php } ?>
        </ul>
      </div>

    </div>