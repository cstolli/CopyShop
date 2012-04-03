<?
$sql = "select * from cs_uploads where ftable = 'cs_events' and fid = " . $listItem["id"] . " and category = 'flyers'";
$fr = $ms->query($sql);
$flyer = $fr->fetch_assoc();
?>

<div class="event excerpt">
	
	<label class="event date"><?=date( 'n/j/y', strtotime($listItem["start date"]));?></label><label class="event title"><?=$listItem["name"];?></label><br />
	<p><?=$listItem["excerpt"];?></p>


<a href="events.html">Read more...</a>

</div>
    

