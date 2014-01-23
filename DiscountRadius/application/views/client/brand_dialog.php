<div data-role="page" id="brand_dialog" data-role="brand_dialog">
    <div data-role="header">
    	<h2><?php echo $brandName;?></h2>
    </div>

    <div data-role="content">
    	<?php if($brandPicName){?>
            <img src="<?php echo base_url()."uploads/brand/".$brandPicName;?>" height="50px" width="50px"/>
        <?php }else {?> 
            <img src="<?php echo base_url()."uploads/brand/no_image.jpg" ?>" height="50px" width="50px"/>
        <?php } ?>
		<p><h4><?php echo $brandCollection; ?></h4>
		<h5><?php echo $brandLocation; ?></h5>
		<h5><?php echo $brandCity; ?></h5>
		<h5><?php echo $brandOffer; ?></h5></p>
    </div>
</div>