<?
$sql = "select * from cs_uploads where ftable = 'cs_events' and fid = " . $listItem["id"] . " and category = 'flyers'";
$fr = $ms->query($sql);
$flyer = $fr->fetch_assoc();
?>

<div class="event item">
	<? if ($flyer) {?>
	    <a target="_blank" href="<?=CS_SITEPATH?>/uploads/flyers/<?=$flyer["filename"]?>">
	        <img align="left" src="<?=CS_SITEPATH?>/uploads/flyers/<?=$flyer["thumbnail"]?>" />
	    </a>
	<? } ?>
	<label class="date">
	<? if ($listItem["end date"] !== '' && $listItem["end date"] !== $listItem["start date"]) { ?>
	<?=date( 'n/j/y', strtotime($listItem["start date"]));?> - <?=date( 'n/j/y', strtotime($listItem["end date"]));?>
    <? }else{ ?>
    <?=date( 'n/j/y', strtotime($listItem["start date"]));?>
    <? } ?>
    </label>

	<label class="title"><?=$listItem["name"];?></label><br />
	  
   <p><?=$listItem["blurb"];?></p>

<? if (strtolower(preg_replace("~[^A-Za-z0-9]~", "", $listItem["location"])) !== "peterlowells") { ?>
<a href="http://www.google.com/maps?q=<?=$listItem["address"];?>+sebastopol+ca&ie=UTF8&hl=en&cd=1&iwloc=addr" target="_blank" >Map & Driving Directions</a>
<? } ?>
</div>
    

