

<?

//echo $id;

$controls = explode(":", $category);
$category = $controls[0];
$id = $controls[1];

//$sql = "select * from cs_press left join cs_wines on cs_wines.id = cs_press.wine order by date desc, wine desc";

$sql = "select * from cs_food_menus";

if ($id) {$sql .= " where `name` = '$id'";}

$sql .= " order by `order` asc";

$result = $ms->query($sql);
if ($category ==""){$view = "item";}else{$view=$category;}
$x = 1;

//echo CS_PLUGINPATH.cs_table($table);
while ($listItem = $result->fetch_array(MYSQLI_BOTH)) {
		
		if (file_exists(CS_PLUGINPATH.cs_table($table)."/$view.php"))
		{
			
			include(CS_PLUGINPATH.cs_table($table)."/$view.php");
		}
		else
		{
			
			echo $listItem[1];
		}
		$x = $x + 1;
	}
	
?>