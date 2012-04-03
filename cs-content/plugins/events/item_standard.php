<?  $sql = "select * from cs_uploads where ftable = 'cs_events' and fid = " . $listItem["id"] . " and category = 'flyers'";
$fr = $ms->query($sql);

$flyer = $fr->fetch_assoc();
//echo $sql;
//echo $flyer["filename"];
?>
	
<p 
	
    
    class="event_div <? if ($x % 2 == 0) { echo ' alt'; } ?>">
    <? if ($flyer) {?>
    <a target="_blank" href="<?=CS_SITEPATH?>/uploads/flyers/<?=$flyer["filename"]?>">
    <img align="left" style="margin-right:12px; margin-bottom:6px; display:inline" border="0" width="200" src="<?=CS_SITEPATH?>/uploads/flyers/<?=$flyer["mediumsize"]?>" />
    </a>
    <? } ?>
	 <h3 class="event_date_big"><?=date( 'n/j/y', strtotime($listItem["start date"]));?></h2>
    <h3 class="event_name"><?=$listItem["name"];?></h3>
	<a class="event_location" target="_blank" href="http://<?=str_replace('http://', '', $listItem["link"]);?>">at the <?=$listItem["location"];?></a>
   
    
  
    <p class="event_description"><?=$listItem["blurb"];?></p>
    
    <a class="event_location"  href="http://www.google.com/maps?q=<?=$listItem["address"];?>&ie=UTF8&hl=en&cd=1&iwloc=addr" target="_blank" >Map & Driving Directions</a>
    
</p>