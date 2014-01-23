Select Subcategory:
<fieldset data-role="controlgroup">
	 	<?php foreach ($subCategoryList as $key) {?>
	     	<input type="radio" name="subCategory" id="<?php echo $key['SUB_CAT_ID'];?>" value="<?php echo $key['SUB_CAT_ID'];?>" checked="checked" />
	     	<label for="radio-choice-1"><?php echo $key['SUB_CAT_NAME']; ?></label>
     	 <?php } ?>
</fieldset>

<!-- <div class="ui-select">
	<div data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-icon="arrow-d" data-iconpos="right" data-theme="c" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-icon-right ui-btn-up-c">
		<span class="ui-btn-inner ui-btn-corner-all">
			<span class="ui-btn-text"><div id="sub_cat_nested"></div></span>
			<span class="ui-icon ui-icon-arrow-d ui-icon-shadow">&nbsp;</span>
		</span>	
		
		<select id="subcategory" name="subcategory" onchange="setSubCat(this.value);">
		  <?php
		    foreach ($subCategoryList as $key) {?>
		      <option value="<?php echo $key['SUB_CAT_ID'];?>"><?php echo $key['SUB_CAT_NAME']; ?></option>         
		  <?php } ?>
		</select>
	</div>
</div> -->

<script>
	function setSubCat (sub_cat_id) {
		alert(sub_cat_id);
		$.ajax({
            type: "POST",
            url: "<?php echo base_url();?>client/show_subcategory_on_dropdown_ajax",
            data: ({categoryId: sub_cat_id}),
            cache: false,
            dataType: "text",
            success: onSuccess
          });
      }

      function onSuccess(data){
          $("#sub_cat_nested").html(data);
      }
	}
</script>

<!-- 	<div class="ui-select">
		<div data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-icon="arrow-d" data-iconpos="right" data-theme="c" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-icon-right ui-btn-up-c">
			<span class="ui-btn-inner ui-btn-corner-all">
				<span class="ui-btn-text">Entertainment</span>
				<span class="ui-icon ui-icon-arrow-d ui-icon-shadow">&nbsp;</span>
			</span>
			<select onchange="showSubCatgeory(this.value);" name="category" id="category">
				<option value="1">Entertainment</option>         
				<option value="2">Electronics</option>         
				<option value="3">General</option>         
			</select>
		</div>
	</div> -->