<div id="cs_nav">
<?
$menu = $mysqli->query("select id, target, label, `menu order`, print from cs_pages where print = true order by `menu order` asc");
//echo $mysqli->error;
$x = 1;
$width = 0;

$pg = Q("page");

if (is_null($pg) || $pg == '') {$pg = "Home";}



while ($menuItem = $menu->fetch_assoc()) 
{
	
	if (strtolower($pg) == strtolower($menuItem["label"])) {$class="active";} else {$class="";}
	if ($menuItem["target"] == "") { $target = "_self"; } else {$target = $menuItem["target"]; }
	
	
?>	
	<a class="<?=$class?>"  href="?page=<?=urlencode($menuItem["label"])?>" target="<?=$target?>"><?=$menuItem["label"]?></a>
<?


	
}
?>
</div>