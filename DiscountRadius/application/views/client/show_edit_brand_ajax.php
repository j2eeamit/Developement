<!-- NOTE: Script load order is significant! -->
<script type="text/javascript" src="http://dev.jtsage.com/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jquery.mobile.datebox.min.js"></script>
<script type="text/javascript" src="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog.min.js"></script>

<div data-role="content">   

    <form action="<?php echo base_url();?>client/add_edit_brand" data-ajax="false" method="post" id="add_edit_brand"  enctype="multipart/form-data">
        <div id="form-content">
            <fieldset>

                <input type="hidden" name="brandID" value="<?php echo $getBrand[0]['BR_ID'];?>">

                <div class="fieldgroup">
                    <label for="category">Select Category</label>
                    <select id="category" name="category">
                        <?php
                            foreach ($getAllCategory as $key) {?>
                              <option value="<?php echo $key['CAT_ID'];?>" <?php if($key['CAT_ID']==$getBrand[0]['BR_CAT_ID']){?> SELECTED <?php } ?> >
                                <?php echo $key['CAT_NAME']; ?>
                              </option>         
                        <?php } ?>
                    </select>
                </div>

                <div class="fieldgroup">
                    <label for="subcategory">Sub Category</label>
                    <select id="subcategory" name="subcategory">
                        <?php
                            foreach ($getAllSubCategory as $key) {?>
                              <option value="<?php echo $key['SUB_CAT_ID'];?>" <?php if($key['SUB_CAT_ID']==$getBrand[0]['BR_SUB_CAT_ID']){?> SELECTED <?php } ?> >
                                <?php echo $key['SUB_CAT_NAME']; ?>
                              </option>         
                        <?php } ?>
                    </select>
                </div>

                <div id="resultSubCategory"></div>

                <div class="fieldgroup">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" name="brand_name" value="<?php echo $getBrand[0]['BR_NAME'];?>" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="comp_name">Company Name</label>
                    <input type="text" name="comp_name" value="<?php echo $getBrand[0]['BR_COMP_NAME'];?>" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="location">Location</label>
                    <input type="text" name="location" value="<?php echo $getBrand[0]['BR_LOCATION'];?>" AUTOCOMPLETE=OFF>
                </div>

                 <div class="fieldgroup">
                    <label for="city">City</label>
                    <input type="text" name="city" value="<?php echo $getBrand[0]['BR_CITY'];?>" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="collection">Collection</label>
                    <input type="text" name="collection" value="<?php echo $getBrand[0]['BR_COLLECTION'];?>" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="offer">Offer</label>
                    <input type="text" name="offer" value="<?php echo $getBrand[0]['BR_OFFER'];?>" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="offerStart">Offer Starts on</label>
                    <input name="offerStart" id="offerStart" type="date" value="<?php echo $getBrand[0]['BR_OFFER_STARTS'];?>" AUTOCOMPLETE=OFF> 
                       <!-- "timeFormatOverride":12, -->
                </div>

                <div class="fieldgroup">
                    <label for="offerValidity">Offer Validity</label>
                    <input name="offerValidity" id="offerValidity" type="date" value="<?php echo $getBrand[0]['BR_OFFER_ENDS'];?>" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <label for="pics_upload">Upload Pics</label>
                    <input type="file" name="pics_upload" id ="pics_upload" value="" AUTOCOMPLETE=OFF>
                </div>

                <div class="fieldgroup">
                    <?php if($getBrand[0]['BR_PIC_NAME']){?>
                        <img src="<?php echo base_url()."uploads/brand/".$getBrand[0]['BR_PIC_NAME'];?>" height="50px" width="50px"/>
                    <?php }else {?> 
                        <img src="<?php echo base_url()."uploads/brand/no_image.jpg" ?>" height="50px" width="50px"/>
                    <?php } ?>
                </div>

                <div class="fieldgroup">
                    <input type="submit" value="Update" class="submit" data-theme="b">
                </div>
                            

            </fieldset>
        </div>
    </form>
</div>