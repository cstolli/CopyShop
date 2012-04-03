
<li  class="cs_tools_image_thumb_div"  id="cs_data_div_<?=$image[0];?>">

	<div class="cs_image_thumb_header">
<?
	echo cs_delete_button_form($image["id"], "cs_uploads");
	?>
	</div>
<? 
//echo getcwd();

$src = CS_PATH.CS_SITEPATH."/uploads/".$category."/".$image["thumbnail"];

?><a class="cs_download_link" href="../<?=CS_SITEPATH?>/uploads/<?=$image["category"]?>/<?=$image["filename"]?>" target="_blank">
	<img style="float:left; margin:4px 8px 4px 4px;" src="../cs-content/images/pdf.png"/>

	<div id="cs_tools_pdf_thumb_title_<?=$image["id"];?>" class="cs_tools_pdf_thumb_title">

	<?=$image[1]?>   

	</div>
	</a>
</li>

    