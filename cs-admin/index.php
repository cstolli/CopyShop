<? 
	
	session_cache_expire(30000);
	session_start(); 
	
	require_once("start.php");
	require_once("secure.php");

?>

<body class="yui-skin-sam">

<?
	require_once("header.php");
	include_once("menu.php");
	$inflect = new Inflect();
?>



<? if (Q("action") !== "form" && Q("tbl") !== "Appearance" && Q("tbl") !== "settings") { ?>
<div id="swilTerminal">
<form action = "../cs-includes/swil.php" id="swilTerm" onsubmit="return false;" name="swilTerm">
<label for="swil">SWiL</label>
<input name="swil" type="text" maxlength="140" size="50" id="swil" value="add <?=$inflect->singularize(cs_table(Q("tbl")));?> " />
<input type="submit" value="go" />
</form>
</div>
<? } ?>
<div id="cs_tool_div">

<?php /*?><textarea id="editor"></textarea> <?php */?>

<? if(Q("id") !== ''){ ?> 



<div id="uploaderOverlay" style="position:absolute; z-index:2; top:-9999px; left:-9999px;"></div>


<? }
	if (Q("tbl")=='')
	{
		
		$table = "cs_pages";
		
	}
	else
	{
		$table = Q("tbl");
	}
	
	$tool = cs_table($table);

	switch (Q("action"))
	{
	
		default:
		case "list":
			
			include("tools/default/list.php");
			
			break;
		
		case "form":
		
			if (file_exists("../cs-content/plugins/$tool/tools/item.php")) {
		
				include("../cs-content/plugins/$tool/tools/item.php");
				
			} else {
			
				if (file_exists("tools/$tool/form.php")) {
						
					include("tools/$tool/form.php");
				} else {
					
				include("tools/default/form.php");
				}
			}
			break;
		
		case "export":
			
			include("tools/default/export.php");
			break;
		
		case "delete":
			break;
			
		case "editor":
			include("tools/editor/editor.php");
			break;
			
		case "appearance":
			include("tools/appearance/appearance.php");
			break;
		
		case "settings":
			include("tools/settings/settings.php");
			break;
	}
	
?>


</div>
<? 	require_once("footer.php"); ?>

</body>
</html>
<?php /*?>'<? require_once("../cs-includes/logger.php"); ?><?php */?>