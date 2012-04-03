
    <h3>Managing <?=cs_formatted_table_name($table); cs_add_images($table);?></h3>
 <? //include('../cs-includes/logger.php') ?>
<?
	if (table_exists($cat_table, $mysqli))
	{
		echo cs_category_select($mysqli, $table, $cat_table);
	}
?>
  
    
<div id="cs_edit_list_<?=$table?>" class="cs_edit_list" style="text-align:center;">

		    <?
	
	$sql = "select img.id as imgid, img.category as imgcat, img.title, img.caption, ups.id as upsid, ups.category as upscat, ups.ftable, ups.fid, ups.filename from cs_images img left join cs_uploads ups on img.id = ups.fid where ups.ftable = 'cs_images'";
	
	if (Q("tbl_cat"))
	{
		$sql .= " and img.category = ". Q("tbl_cat");
	}	
	
	$sql .= " order by img.id desc";
					
	$images = $mysqli->query($sql);
	
	//echo $images->num_rows;	
		if ($images->num_rows > 0)
		
		{
			
			while ($image = $images->fetch_array(MYSQLI_BOTH))
			{
			//if (file_exists('../'.CS_SITEPATH."/uploads/images/".$image["filename"])){
?>  		
				<div  class="cs_tools_image_thumb_div" id="cs_data_div_<?=$image["imgid"];?>">
              <div class="cs_image_thumb_header">
             
              </div>
                <img onclick="location.href='?tbl=cs_images&action=form&id=<?=$image["imgid"]?>'" class="cs_tools_image_thumb" id="cs_tools_image_thumb_<?=$image["imgid"];?>" src="../<?=CS_SITEPATH;?>/uploads/images/<?=$image["filename"]?>" onload="//$(this).setStyle('visibility', 'visible')" />
                   
                <div id="cs_tools_image_thumb_title_<?=$image["imgid"];?>" onclick="location.href='?tbl=cs_images&action=form&id=<?=$image["imgid"]?>'" class="cs_tools_image_thumb_title">
                
                <?=$image["title"]?>   
               	
                </div>
              <?
				echo cs_delete_button_form($image['imgid'], 'cs_images');
				?>
            </div>
                
	
<?
			
			}
			
		}
	
			
?>
		

</div>
<link href="../cs-includes/uploader/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../cs-includes/uploader/script.js"></script>