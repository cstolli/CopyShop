<?  $sql = "select * from cs_uploads where ftable = 'cs_events' and fid = " . $listItem["id"] . " and category = 'flyers'";
$fr = $ms->query($sql);

$flyer = $fr->fetch_assoc();
//echo $sql;
//echo $flyer["filename"];
?>
	
<li class="event" >
    <? if ($flyer) {?>
    <a target="_blank" href="<?=CS_SITEPATH?>/uploads/flyers/<?=$flyer["filename"]?>">
    <img align="left" style="margin-right:12px; margin-bottom:6px; display:inline" border="0" width="100" src="<?=CS_SITEPATH?>/uploads/flyers/<?=$flyer["thumbnail"]?>" />
    </a>
    <? } ?> <a class="event_location" target="_blank" href="http://<?=str_replace('http://', '', $listItem["link"]);?>"><h3 class="event_name"><?=$listItem["name"];?> - <?=date( 'n/j/y', strtotime($listItem["start date"]));?></h3></a>
	 
   
	<a class="event_location"  href="http://www.google.com/maps?q=<?=$listItem["address"];?>&ie=UTF8&hl=en&cd=1&iwloc=addr" target="_blank" ><?=$listItem["location"];?></a>
   
    
  
    <p class="event_description"><?=$listItem["blurb"];?></p>
    
    
    
</li>