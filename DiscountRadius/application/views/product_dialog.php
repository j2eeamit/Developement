<div data-role="page" id="product_dialog" data-role="product_dialog">
    <div data-role="header">
    	<h2><?php echo $PRODUCT_NAME; ?></h2>
    </div>
   <?php 
   date_default_timezone_set('Asia/Kolkata');
   $today = date("Y-m-d");?>
    <div data-role="content">
        <ul data-role="listview" data-filter="true" data-inset="true">
            <li>
                <img src="<?php echo base_url(). "uploads/product/". $PRODUCT_IMAGE;?>" height="100" width="100" />
                <?php if ($today <= $OFFER_END_DATE) {?>
                        <p style="color:green">
                                <?php echo $OFFER_TITLE; ?>
                                <?php echo $OFFER_DESCRIPTION." upto ".$OFFER_END_DATE; ?>
                        </p>
                        <?php } ?>

                <p><?php echo $PRODUCT_NAME; ?> <?php echo $PRODUCT_MODEL_NO; ?> </p>        
                <P><?php echo $PRODUCT_TITLE; ?></P>
                <P><?php echo $PRODUCT_DESCRIPTION; ?></P>
            </li>
            <li>
                <?php 
                    if($BRAND_LOCATION){?>
                       Available at following store:
                        <?php foreach ($BRAND_LOCATION as $key) {?>
                           <li><?php echo $key['BUSINESS_ADDRESS'];?></li>
                        <?php }
                    }else{
                        echo "No Location available";
                    }?>
                </p>
            </li>
        </ul>
    </div>
</div>