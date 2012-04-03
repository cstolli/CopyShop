
<? $sql = "select * from cs_events where `start date` >= CURRENT_DATE() order by `start date` asc";
	$result = $ms->query($sql);


$x = 1;


if ($category ==""){$view = "item";}else{$view=$category;}

if ($result->num_rows > 0) { 
if ($view == "item"){?><h2>Upcoming Events</h2><?}

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
	
}
else
{
	if ($view == "item"){?><p>Please check back soon for information on upcoming shows and events</p><br><br><?}
}
	
if ($view == "item"){?><h2>Past Events</h2>
<?} $sql = "select * from cs_events where `start date` < CURRENT_DATE() order by `end date` desc limit 5";
	$result = $ms->query($sql);


$x = 1;

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