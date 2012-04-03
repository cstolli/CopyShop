<div id="cs_nav">
<?
$menu = $mysqli->query("select cs_menu_items.id, target, label, `order`, href, title from cs_menu_items inner join cs_menus on cs_menus.id = cs_menu_items.menu where cs_menus.name='Top Nav' order by `order` asc");
//echo $mysqli->error;
$x = 1;
$width = 0;

$pg = Q("page");

if (is_null($pg) || $pg == '') {$pg = "Home";}

$menuItem = $menu->fetch_assoc();

	if (strtolower($pg) == strtolower($menuItem["label"])) {$class="active";} else {$class="";}
	if ($menuItem["target"] == "") { $target = "_self"; } else {$target = $menuItem["target"]; }

?><a class="<?=$class?>" href="<?=$menuItem["href"];?>" title="<?=$menuItem["title"];?>"><?=$menuItem["label"]?></a>

<?


while ($menuItem = $menu->fetch_assoc()) 
{
	
	if (strtolower($pg) == strtolower($menuItem["label"])) {$class="active";} else {$class="";}
	if ($menuItem["target"] == "") { $target = "_self"; } else {$target = $menuItem["target"]; }
	
	
?><span class="sep">|</span> <a class="<?=$class?>"  href="<?=$menuItem["href"];?>" title="<?=$menuItem["title"];?>"><?=$menuItem["label"]?></a>
<?


	
}
?>
</div>