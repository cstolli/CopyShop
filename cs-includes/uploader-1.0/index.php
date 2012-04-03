<?	include('script.php'); ?>
<?

$plr = new Inflect();

if ($qty == "1") {

	$label = ucwords($plr->singularize($type));

}else{
	
	$label = ucwords($plr->pluralize($type));
	
}


?>

<link href="../cs-includes/uploader-1.0/styles_v2.css" rel="stylesheet" type="text/css" />
<div id="uploads_wrapper" class="<?=$type;?>" style="margin-left:0px; clear:both; min-height:100px; margin-top:20px; position:relative;">
<br />
  <h3>Upload <?=$label?></h3>
  <div class="cs_edit_list"  style="margin-left:0px;   text-align:left;">


	<div class="cs_uploader_link" id="uploader_<?=$type?>" onmouseover="if (curel !== this.id){moveOL(this);}curel = this.id;" style="text-align:left; position:relative; width:auto;width:100px;">

  <? 
  
  if ($label == "") {$lbl = "Add Images"; } else {$lbl = $label;}
  
 
  
  ?>
    
   <div class="overlay_container" id="overlay_container_<?=$type?>">
     
    <div class="selectFilesLink <?=$type?>" id="selectFilesLink_<?=$type?>" style="z-index:1">
    <input type="button" id="selectLink_<?=$type?>" class="<?=$type?>"  href="#" value="Select <?=$label?>" />
    <input type="hidden" id="upload_qty_<?=$type?>" value="<?=$qty?>" />
    
    </div>
    <input style="z-index:99" type="button" class="uploadLink <?=$type?>" name="<?=$type;?>"  id="uploadLink_<?=$type;?>" value="Begin Upload" />
   </div>
    <a class="cancelAllLink cs_tools_a2" id="cancelAllLink">Cancel</a>
    <span id="responseMessage_<?=$type?>"></span>
   
    
     
</div>



    <ul id="cs_uploader_<?=$type?>" style="height:auto; text-align:left;">
      <?
	$sql = "select * from cs_uploads where ftable = '$table' and fid = $id and category = '$type' order by `order` asc";
				//echo $sql;
	$images = $ms->query($sql);
	
	
		
		
	$path = str_replace(CS_PATH."/", "", CS_SITEPATH)."/uploads/$type/";
	
	if (strpos(getcwd(), 'cs-admin')) { $path = '../' . $path; }
	
		if ($images->num_rows == 0){


		}
		else
		{
			while ($image = $images->fetch_array(MYSQLI_BOTH)) {
			
			switch($type){
	
		case 'images':
		case 'photos':
		case 'flyers':
		default:
		$path = CS_PATH . CS_SITEPATH . "/uploads/$type/" . $image["thumbnail"];
			
			
			break;
		case 'audio':
		case 'mp3':
			$path = "../../cs-content/images/mp3.png";
			break;
		case 'wpd':
		case 'doc':
		case 'docx':
		case 'pdf':
		case 'pdfs':
			$path = "../cs-content/images/pdf.png";
			
		
	}
			
			//echo $image["filename"];
			
			
			
			//if (file_exists($path)){
?>
      <li  class="cs_tools_image_thumb_div <?=$image["order"];?>" id="cs_data_div_<?=$image[0];?>">
        <div class="cs_image_thumb_header">
          <?
				echo cs_delete_button_form($image['id'], "cs_uploads");
				if ($qty > 1) { 
				echo cs_feature_button_form($image['id'], "cs_uploads", $image["featured"]);
				}
				?>
        </div>
         <a class="cs_download_link" href="../<?=CS_SITEPATH?>/uploads/<?=$image["category"]?>/<?=$image["filename"]?>" target="_blank">
        <img  class="cs_tools_image_thumb" style="width:150; height:auto;" id="cs_tools_image_thumb_<?=$image["id"];?>" src="<?=$path?>"  /> <br />
       
        <div id="cs_tools_image_thumb_title_<?=$image["id"];?>" class="cs_tools_image_thumb_title">
        
          <?=$image["filename"]?>
        </div>
        </a>
      </li>
      <?
			}
			
			}
			
	//	//}
	//}
		 
?>
    </ul>
  </div>
</div>





