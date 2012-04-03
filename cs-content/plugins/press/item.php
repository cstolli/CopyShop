<div class="press item">
<?  $sql = "select * from cs_uploads where ftable = 'cs_press' and fid = " . $listItem["id"] . " and category = 'images'";
 $fr = $ms->query($sql);
 $flyer = $fr->fetch_assoc(); 
 ?>


<? /* ?><h3 class="date"><?=date( 'n/j/y', strtotime($listItem["dateline"]));?></h3><? */ ?>
<h3 class="source"><?=$listItem["source"];?></h3>

<div><? if ($flyer) {
	
	?>



<img align="left" src="<?=CS_SITEPATH?>/uploads/images/<?=$flyer["thumbnail"]?>"/>

<? } ?><?=$listItem["story"];?>
<a class="more" href="<?=$listItem["link"];?>" target="_blank" >Read more here -></a></div>


</div>
