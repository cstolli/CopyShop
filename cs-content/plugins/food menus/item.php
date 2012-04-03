<?  $sql = "select * from cs_uploads where ftable = 'cs_food_menus' and fid = " . $listItem["id"] . " and category = 'pdfs'";
 $mr = $ms->query($sql);
 $menu = $mr->fetch_assoc(); 
 
  $sql = "select * from cs_uploads where ftable = 'cs_food_menus' and fid = " . $listItem["id"] . " and category = 'images'";
 $mr = $ms->query($sql);
 $image = $mr->fetch_assoc(); 
?>

<div class="food_menu item">

<h3 class="name"><?=$listItem["name"];?></h3>

<? if ($menu) { ?>
<a  class="noborder pdf" target="_blank" href="cs-content/sites/lowells/uploads/pdfs/<?=$menu["filename"]?>">
<img src="<?=CS_PATH?>/cs-content/images/pdf.png" border="0" />
</a>
<? } ?>

<? if ($image) { ?>

<img src="<?=CS_SITEPATH?>/uploads/images/<?=$image["filename"]?>" border="0" class="food_menu image" />

<? } ?>

<p class="food_menu description">
<?=$listItem["description"];?> <span class="availability">Available <?=$listItem['availability']?></span><? if ($menu) { ?>
<a target="_blank" href="cs-content/sites/lowells/uploads/pdfs/<?=$menu["filename"]?>"> ...Click here to view this menu</a>
<? } ?>
</p>
</div>
