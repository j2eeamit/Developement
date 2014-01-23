<div data-role="content"> 
    <?php //echo "<PRE>";print_r($brand_wise_product);exit; ?>
    <ul data-role="listview" data-filter="true" data-inset="true">
            <?php if($brand_wise_product){
                        foreach ($brand_wise_product as $key) {?>
                            <li>
                                <a href="<?php echo base_url() ."home/product_dialog_ajax/".$key['PRODUCT_IMAGE']."/".$key['PRODUCT_ID'];?>" data-rel="dialog" data-transition="slide">
                                    <img src="<?php echo base_url(). "uploads/product/". $key['PRODUCT_IMAGE'];?>" height="120px" width="120px"/>
                                    <h3 class="ui-li-heading">
                                            <?php echo $key['PRODUCT_NAME']; ?>
                                            <!-- ."<FONT COLOR=\"GREEN\"> ".$key['OFFER_TITLE']."</FONT>" -->
                                    </h3>
                                 </a> 
                            </li>
                    <?php } 
            }else{
                    echo "<FONT COLOR=\"RED\">No Product found!";
            }?>
    </ul>
</div>