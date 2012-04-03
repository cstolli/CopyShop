<?  $sql = "select * from cs_uploads where ftable = 'cs_press' and fid = " . $listItem["id"] . " and category = 'images'"; $fr = $ms->query($sql);$flyer = $fr->fetch_assoc(); 
	
	?>
<div class="press excerpt">

<label class="press date"><?=date( 'n/j/y', strtotime($listItem["dateline"]));?></label> <label class="press source"><?=$listItem["source"];?></label><br />
<?=$listItem["excerpt"];?><br>
<a href="press.html">Read more...</a>
</div>