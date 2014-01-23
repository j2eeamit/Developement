<form action="<?php echo base_url();?>adminpanel/add_edit_category" name="editCategory" id="editCategory" method="post">
	<fieldset>
		<div class="fieldgroup">
			<label for="new_category">Edit Category</label>
		</div>
			
			<input type="hidden" name="txtcategoryId" id="txtcategoryId" value="<?php echo $CATID;?>" AUTOCOMPLETE=OFF>
			<input type="text" name="txtcategoryName" id="txtcategoryName" value="<?php echo $CATNAME;?>" AUTOCOMPLETE=OFF>

			<input type="submit" value="Update Category" class="submit" data-theme="b">
	</fieldset>
</form>