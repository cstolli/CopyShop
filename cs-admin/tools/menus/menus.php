
<div class="uiframe list menus" style="border:solid 1px #ccc;">
<h2>Menus</h2>
<ul>

<? 
	
	$m = (Q("id") == "") ? "1" : Q("id");
	
	$sql = "select * from cs_menus order by id asc";

	$menus = $mysqli->query($sql);
	$menuName = '';
	
	while ($menu = $menus->fetch_object()){
		
		if ($menuName == "") { if ($m == $menu->id) { $menuName = $menu->name;}}
		
?>
	
    <li><a href="?action=appearance&tbl=Appearance&tab=menus&id=<?=$menu->id;?>"><?=$menu->name;?></a></li>
    
<?
	}
?>
</ul>

</div>

<div class="uiframe active menus" style="border:solid 1px #ccc;">
<h2>Editing <?=$menuName?> <a href="?tbl=Appearance&action=appearance&tab=menus&id=<?=$m;?>&add=1" class="cs_edit_list_add"><b>+</b></a></h2>
<? $sql = "select * from cs_menu_items where menu = $m order by `order` asc";

	//echo 
	$items = $mysqli->query($sql);
?>
<table width="100%" cellpadding="0" cellspacing="0">
<thead>
<td width="10%">Label</td><td width="20%">Destination</td><td width="40%">Tooltip</td><td width="10%">Target</td><td width="5%">Order</td><td colspan"2" width="5%"></td><td></td>
</thead>
<tbody>
<?

	if (Q("add")=="1") { ?>
    <form action="../cs-includes/db.php" method="post" enctype="application/x-www-form-urlencoded">
	<tr id="cs_data_div_new"><td width="10%"><input type="text" name="inp_label" size="10" value=""></td><td><input type="text" name="inp_href" value=""></td><td><input type="text" name="inp_title" size="40" value=""></td><td><input name="inp_target" type="text" size="8" value=""></td><td><input name="inp_order" type="text" size="2" value=""></td><td><input type="submit" value="S" /></td><td><? //=cs_delete_button_form("new");?></td>
    </td></tr>
    
    <input type="hidden" name="inp_menu" value="<?=$m;?>" />
    <input type="hidden" name="hid_action" value="insert" />
    <input type="hidden" name="hid_referrer" value="?tbl=Appearance&action=appearance&tab=menus&id=<?=$m;?>&status=1" />
    <input type="hidden" name="hid_table" value="cs_menu_items" />
   
  
	</form>  
<?
	}
	
	while ($item = $items->fetch_object()) {
?>
	
	<tr id="cs_data_div_<?=$item->id;?>">
    <form action="../cs-includes/db.php" method="post" enctype="application/x-www-form-urlencoded">
    <td><input type="text" name="inp_label" size="10" value="<?=$item->label;?>"></td><td><input type="text" name="inp_href" value="<?=$item->href;?>"></td><td><input type="text" name="inp_title" size="40" value="<?=$item->title;?>"></td><td><input name="inp_target" type="text" size="8" value="<?=$item->target;?>"></td><td><input name="inp_order" type="text" size="2" value="<?=$item->order;?>"></td><td><input type="submit" value="S" />
    
    <input type="hidden" name="inp_menu" value="<?=$m;?>" />
    <input type="hidden" name="hid_action" value="update" />
    <input type="hidden" name="hid_referrer" value="?tbl=Appearance&action=appearance&tab=menus&id=<?=$m;?>&status=1" />
    <input type="hidden" name="hid_table" value="cs_menu_items" />
    <input type="hidden" name="hid_id" value="<?=$item->id;?>" />
  	</td>
	</form>
    <td><?=cs_delete_button_form($item->id, "cs_menu_items");?></td></tr>
<?

	}
	
?>
</tbody>
</table>

</div>