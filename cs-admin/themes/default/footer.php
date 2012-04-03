<div id="footer">
<?php /*?><div id="cs_footer_menu">
<?
$menu = $mysqli->query("select id, target, label, `menu order` from cs_pages where print = true order by `menu order` asc");
echo $mysqli->error;
$x = 1;
$width = 0;

while ($menuItem = $menu->fetch_assoc()) 
{

	if ($menuItem["target"] == "") { $target = "_self"; } else {$target = $menuItem["target"]; }
	
	
?>	
	<li><a class="cs_footer_menu_item" href="?page=<?=urlencode($menuItem["label"])?>" target="<?=$target?>"><?=$menuItem["label"]?></a></li>
<?

	
}
?>
</div><?php */?>
&copy; <?=date('Y');?> <?= $info["company name"];?>. All rights reserved. Designed and developed by <a target="_blank" href="http://www.worldwidedm.com">WorldWide Digital Media</a>.  Powered by <a href="http://copyshop.worldwidedm.com">CopyShop</a>. Photography by <a href="http://web.me.com/griffmarshall" target="_blank">Griff Marshall.</a> </div>