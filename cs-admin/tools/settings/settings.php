<h3>Settings</h3>

<div class="cs_tools_sub_nav">


<a id="themes" class="themes tab link" href="?tbl=Settings&action=settings&tab=contact info">Contact Info</a>
<? /*
<a id="menus" class="menus tab link" href="?tbl=Appearance&action=appearance&tab=menus">Menus</a>
<a id="editor" class="editor tab link" href="?tbl=Appearance&action=appearance&tab=editor">Editor</a>
*/ ?>


</div>



<? switch (Q("tab")) {
	
		default:
		case "themes":
		?>
		<div id="themes" class="themes tab">themes tab</div>
		<?
		break;
		
		case "menus":
		?>
		<div id="menus" class="menus tab">menus tab</div>
		<?
		break;
		
		case "contact info":
		?>
		<div id="options" class="options">
		<? 
        
        include("tools/settings/contact info.php");?>
        </div>
		<?
		break;
}
?>
