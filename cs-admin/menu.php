<? // /tools/menu/default.asp -- tools page menu view ?>


<? // run php script that whips table names into menu items
	
	
	
	//a simple function to return the right CSS class name depending on selected page
	function cs_menu_class ($tbl)
	{
		$tabl = Q("tbl");
		if ($tabl == "" || is_null($tabl)) {$tabl='cs_pages';}
		//echo $tbl;
		if ($tabl == $tbl)
		{
			return "cs_tools_menu_item_active";
		}
		else
		{
			return "cs_tools_menu_item";
		}

	}

	
	// a hack, included for now, keeps the menu short TODO:  implement menu paging||scrolling
	$rowcount = 10;
	
	$x = 1;
		
	$test = "";
	
	
	
	//$tables = $mysqli->query("SHOW TABLES from copyshop");
	$tables = $schema->query("select table_name, table_comment, table_schema from tables where table_comment != '' and table_schema = '$dbName' order by table_comment asc");
	
	if (!$tables) {
		echo $schema->error;
	}
	//echo("test");

	//$result = $tables->fetch_row();
	
	while ($table = $tables->fetch_array(MYSQLI_BOTH))
	{
			
		if ($table['table_name'] !== 'cs_options' && $table['table_name'] !== 'cs_contact_info')
		{
		 
			$label = $table['table_name'];
			$class = cs_menu_class($label);
			
			//echo $class;
		
			$x = $x + 1; //increment extra counter
		
			$menuHrefs .= cs_tools_menu_href($label, $class, "_self"); //create a single href and add it to the stack
			//echo $label;
		
			if ($x > $rowcount || $x == $tables->num_rows - 1)
			{
			 //time to write the row
				
				
				
				//$x = 1; //reset indicator
				
				//$menuHrefs="";  //reset href stack
				
			}
			
			
	
		}

	}
	$label = "Appearance";
	$class = cs_menu_class($label);
	$href = "?tbl=Appearance&action=appearance";
	$menuHrefs .= cs_tools_nav_item($label, $href, $class, "_self");
	
	$label = "cs_users";
	$class = cs_menu_class($label);
	$menuHrefs .= cs_tools_menu_href($label, $class, "_self");
	
	$label = "Settings";
	$class = cs_menu_class($label);
	$href = "?tbl=Settings&action=settings";
	$menuHrefs .= cs_tools_nav_item($label, $href, $class, "_self");
	
	echo cs_menu_row($menuHrefs); //write the row
	
	
?>

    
   
