<?php 
	require_once("../cs-includes/start.php");
	require_once("../cs-includes/tiny_mce.php");
?>

<link href="styles.css" rel="stylesheet" type="text/css" />

<body>
 
<?
	if (!Q("tbl"))
	{
		$table = "options";
	}
	else
	{
		$table = Q("tbl");
	}
	
	switch (Q("action"))
	{
	
		default:
		case "list":
			cs_edit_list($mysqli, "cs_".$table, "", "", "", "");
			break;
		
		case "form":
			cs_field_list($mysqli, "cs_".$table, Q("id"), "", "", "");
			break;
			
		case "delete":
			break;
	}

?>
</div>
</body>
