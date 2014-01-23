  <div data-role="content"> 
  
   <ul data-role="listview" data-filter="true" data-inset="true">
        <?php foreach ($getRecordCityWise as $key) {?> 
        <li>
            <a href="<?php echo base_url() ."home/product_dialog/".$key['BRAND_ID'];?>" data-rel="dialog" data-transition="slide">
                <h3 class="ui-li-heading">
                    <?php echo $key['BRAND_NAME']; ?>
                </h3>
            </a> 
        </li>
        <?php } ?>
    </ul>
</div>
<script>

</script>
