

 <? //include('../cs-includes/logger.php') ?>

   <h3 style="clear:both"><?=cs_add_images($table);?></h3>
    
<div id="cs_edit_list_<?=$table?>" class="cs_edit_list" style="text-align:center; clear:both;">

		    <?
	
	$sql = "select * from cs_uploads ups  where ups.ftable = 'cs_galleries' and ups.fid = " . Q("id");
	
	
	
	
					
	$images = $mysqli->query($sql);
	
	//echo $images->num_rows;	
		if ($images->num_rows > 0)
		
		{
			
			while ($image = $images->fetch_array(MYSQLI_BOTH))
			{
			//if (file_exists('../'.CS_SITEPATH."/uploads/images/".$image["filename"])){
?>  		
				<div  class="cs_tools_image_thumb_div" id="cs_data_div_<?=$image["id"];?>">
              <div class="cs_image_thumb_header">
             
              </div>
                <img onclick="location.href='?tbl=cs_images&action=form&id=<?=$image["id"]?>'" class="cs_tools_image_thumb" id="cs_tools_image_thumb_<?=$image["imgid"];?>" src="../<?=CS_SITEPATH;?>/uploads/images/<?=$image["thumbnail"]?>" onload="//$(this).setStyle('visibility', 'visible')" />
                   
                <div id="cs_tools_image_thumb_title_<?=$image["id"];?>" onclick="location.href='?tbl=cs_images&action=form&id=<?=$image["id"]?>'" class="cs_tools_image_thumb_title">
                
                <?=$image["filename"]?>   
               	
                </div>
              <?
				echo cs_delete_button_form($image['id'], 'cs_uploads');
				?>
            </div>
                
	
<?
			
			}
			
		}
	
			
?>
		

</div>
<link href="../cs-includes/uploader/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../cs-includes/uploader/script_galleries.js"></script>