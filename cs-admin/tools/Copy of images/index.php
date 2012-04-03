
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
	
	$sql = "select * from cs_images where ftable = 'cs_images' ";
	
	if (Q("tbl_cat"))
	{
		$sql .= " and category = ". Q("tbl_cat");
	}	
	
	$sql .= " order by id desc";
				
	$images = $mysqli->query($sql);
	{
	
		if ($images->num_rows == 0){

?><?
		}
		else
		{
			while ($image = $images->fetch_array(MYSQLI_BOTH))
			
			if (!file_exists(CS_SITEPATH."/images/user/".$image[3])){
?>  		
				<div  class="cs_tools_image_thumb_div" id="cs_data_div_<?=$image[0];?>">
              <div class="cs_image_thumb_header">
             
              </div>
                <img onclick="location.href='?tbl=cs_images&action=form&id=<?=$image[0]?>'" class="cs_tools_image_thumb" id="cs_tools_image_thumb_<?=$image["id"];?>" src="../<?=CS_SITEPATH;?>/images/user/<?=$image[3]?>" onload="$(this).setStyle('visibility', 'visible')" />
                   
                <div id="cs_tools_image_thumb_title_<?=$image["id"];?>" onclick="location.href='?tbl=cs_images&action=form&id=<?=$image[0]?>'" class="cs_tools_image_thumb_title">
                
                <?=$image[1]?>   
               	
                </div>
              <?
				echo cs_delete_button_form($image['0']);
				?>
            </div>
                
	
<?
			
			}
			
		}
	}
			
?>
		

</div>
