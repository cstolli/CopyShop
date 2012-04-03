<?  $sql = "select * from cs_uploads where ftable = 'cs_food_menus' and fid = " . $listItem["id"] . " and category = 'pdfs'";
 $mr = $ms->query($sql);
 $menu = $mr->fetch_assoc(); 

if ($menu) { ?>

<h3 class="name"><a class="food_menu nav" target="_blank" href="cs-content/sites/lowells/uploads/pdfs/<?=$menu["filename"]?>"><?=$listItem["name"];?>
</a></h3>
<? } ?>


