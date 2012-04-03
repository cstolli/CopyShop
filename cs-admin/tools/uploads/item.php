<? $filetype = substr($image["filename"], strlen($image["filename"]) - 3, strlen($image["filename"]) );	

	

	if ($filetype == 'jpg' or $filetype == 'png' or $filetype == 'gif' or $filetype == 'iff') { 
		$imagepath = "../".CS_SITEPATH . "/uploads/" . $image["category"] . "/" . $image["filename"];
	
	
	?><div  class="cs_tools_image_thumb_div" id="cs_data_div_<?=$image[0];?>">

	<div class="cs_image_thumb_header">

	</div>

	<img 
		
    	class="cs_tools_image_thumb" id="cs_tools_image_thumb_<?=$image[0];?>" 
        src="<?=$imagepath;?>"
       
    />

	<div 
    	id="cs_tools_image_thumb_title_<?=$image["id"];?>" 
       
        class="cs_tools_image_thumb_title"
    >

	<?=$image[1]?>   

	</div>
	<?
	echo cs_delete_button_form($image["id"], "cs_uploads");
	?>
     
</div><? } else { ?>
<img style="float:left; margin:4px 8px 4px 4px;" src="../cs-content/images/pdf.png"/>
     <a class="cs_download_link" href="../<?=CS_SITEPATH?>/uploads/<?=$image["category"]?>/<?=$image["filename"]?>" target="_blank"><b><?=$image["filename"]?></b> has been uploaded.</a><? } ?>