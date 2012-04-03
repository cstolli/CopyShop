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
?>
<div id="cs_tool_div">
<?php /*?><textarea id="editor"></textarea> <?php */?>
<div id="editable_cont" style="position:relative;"> 
<? if(Q("id") !== ''){ ?> 

<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/assets/skins/sam/skin.css">
<link href="../cs-includes/uploader/styles_v2.css" rel="stylesheet" type="text/css" />

<? }
	if (Q("tbl")=='')
	{
		
		$table = "cs_pages";
	}
	else
	{
		$table = Q("tbl");
	}

	switch (Q("action"))
	{
	
		default:
		case "list":
			
			include("tools/default/list.php");
			
			break;
		
		case "form":
			
			include("tools/default/form.php");
			break;
		
		case "export":
			
			include("tools/default/export.php");
			break;
		
		case "delete":
			break;
	}
	
?>
</div>

</div>
<? 	require_once("footer.php"); ?>

</body>

<?php /*?>'<? require_once("../cs-includes/logger.php"); ?><?php */?>