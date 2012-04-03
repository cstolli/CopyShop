<ul class="events">

<? $sql = "select * from cs_events where `end date` >= CURRENT_DATE() order by `start date` asc";
	$result = $ms->query($sql);


$x = 1;

if ($result->num_rows > 0) { 
while ($listItem = $result->fetch_array(MYSQLI_BOTH)) {
		
		if (file_exists(CS_PLUGINPATH.cs_table($table)."/item.php"))
		{
			
			include(CS_PLUGINPATH.cs_table($table)."/item.php");
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
	?><p>Please check back soon for information on upcoming shows and events</p><?
}
	
?></ul>
