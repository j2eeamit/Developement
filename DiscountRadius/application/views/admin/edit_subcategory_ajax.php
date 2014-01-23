<form action="<?php echo base_url();?>adminpanel/add_edit_subcategory" name="editSubCategory" id="editSubCategory" method="post">
	<fieldset>
		Select Category:
		<div class="fieldgroup">
	        <select id="category" name="category">
	          <?php
	            foreach ($getAllCategory as $key) {?>
	              <option value="<?php echo $key['CAT_ID'];?>" <?php if($key['CAT_ID']==$CATID){?> SELECTED <?php } ?> >
	              	<?php echo $key['CAT_NAME']; ?>
	              </option>         
	          <?php } ?>
	        </select>
		</div>
		<div class="fieldgroup">
			<input type="hidden" name="txtsubcategoryId" id="txtsubcategoryId" value="<?php echo $SUBCATID;?>" AUTOCOMPLETE=OFF>
			<input type="text" name="txtsubcategoryName" id="txtsubcategoryName" value="<?php echo $SUBCATNAME;?>" AUTOCOMPLETE=OFF>
		</div>
		<div class="fieldgroup">
			<input type="submit" value="Update Sub Category" class="submit" data-theme="b">
		</div>
	</fieldset>
</form>