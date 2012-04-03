<div  class="cs_tools_image_thumb_div" id="cs_data_div_<?=$image[0];?>">

	<div class="cs_image_thumb_header">

	</div>

	<img 
		onclick="location.href='?tbl=cs_images&action=form&id=<?=$image[0]?>'" 
    	class="cs_tools_image_thumb" id="cs_tools_image_thumb_<?=$image[0];?>" 
        src="../<?=CS_SITEPATH;?>/images/user/<?=$image["image"]?>" 
       
    />

	<div 
    	id="cs_tools_image_thumb_title_<?=$image["id"];?>" 
        onclick="location.href='?tbl=cs_images&action=form&id=<?=$image[0]?>'" 
        class="cs_tools_image_thumb_title"
    >

	<?=$image[1]?>   

	</div>
	<?
	echo cs_delete_button_form($image['0'], "cs_images");
	?>
</div>