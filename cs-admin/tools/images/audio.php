
<li  class="cs_tools_image_thumb_div"  id="cs_data_div_<?=$image[0];?>">

	<div class="cs_image_thumb_header">
<?
	echo cs_delete_button_form($image["id"], "cs_uploads");
	?>
	</div>
<? 
//echo getcwd();

$src = CS_PATH."cs-content/images/mp3.png";

?>
	<img class="cs_tools_image_thumb" width="100" id="cs_tools_image_thumb_<?=$image[0];?>" src="<?=$src;?>" />

	<div id="cs_tools_image_thumb_title_<?=$image["id"];?>" class="cs_tools_image_thumb_title">

	<?=$image[1]?>   

	</div>
	
</li>