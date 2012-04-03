<h3>Managing Appearance : <?=ucwords(Q("tab"))?> </h3>

<div class="cs_tools_sub_nav">


<a id="themes" class="themes tab link" href="?tbl=Appearance&action=appearance&tab=themes">Themes</a>
<a id="menus" class="menus tab link" href="?tbl=Appearance&action=appearance&tab=menus">Menus</a>
<a id="editor" class="editor tab link" href="?tbl=Appearance&action=appearance&tab=editor">Editor</a>



</div>



<? switch (Q("tab")) {
	
		default:
		case "themes":
		?>
		<div id="themes" class="themes"><? 
        
        include("tools/themes/themes.php");?></div>
		<?
		break;
		
		case "menus":
		?>
		<? 
        
        include("tools/menus/menus.php");?>
		<?
		break;
		
		case "editor":
		?>
		<div id="editor" class="editor">
		<? 
        
        include("tools/editor/editor.php");?>
        </div>
		<?
		break;
}
?>
