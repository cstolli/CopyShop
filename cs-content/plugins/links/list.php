
 <div class="links list">
<?


$x = 1;
//echo CS_PLUGINPATH.cs_table($table);
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
	
?>
</div>