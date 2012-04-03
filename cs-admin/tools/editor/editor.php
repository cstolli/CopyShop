<?php /*

Filename: editor.php
Function: provides a file editor for copyshop theme files
Author: Chris Stoll
Date Added: 7/7/2011

*/ 
$phpfiles = array();
$cssfiles = array();
$jsfiles = array();
$formfiels = array();

$path = "../" . CS_THEMEPATH;
$supported_ext = array('php', 'css');
$dir = @opendir($path);

while ($file = @readdir($dir)){
      if (!is_dir($path.$file)){
            $splitted = explode('.', $file);
            $ext = strtolower($splitted[count($splitted)-1]);
            if ($ext== 'php') $phpfiles[] = $file;
			if ($ext== 'css') $cssfiles[] = $file;
			if ($ext== 'js') $jsfiles[] = $file;
      }
}
$path = "../" . CS_SITEPATH . "/forms";
$supported_ext = array('php');
$dir = @opendir($path);
while ($file = @readdir($dir)){
      if (!is_dir($path.$file)){
            $splitted = explode('.', $file);
            $ext = strtolower($splitted[count($splitted)-1]);
            if ($ext== 'php') $formfiles[] = $file;
      }
}
$file = (Q("file") == '') ? $phpfiles[0] : Q("file");
?>

    <form action="tools/editor/save.php" method="post" enctype="application/x-www-form-urlencoded" id="editor_form" onsubmit=" var conf = confirm('Really? This can\'t be undone.'); if (conf) {this.submit();}else{return false;} return false;" class="editor">
<h2>Editing '<?=CS_THEME?>' Theme : <?=$file?> <? if (Q("status") == 1) { ?>
    <span class="cs_tools_timestamp">Saved on <?=date('l M. jS, Y');?> at <?=date('g:i a');?></span>
    <? } ?> </h2>
<textarea name="code">
<? 


//echo $file;
if (Q("type")=="form"){
	
$myFile = $path = "../" . CS_SITEPATH . "/forms/" . $file;
} else
{
$myFile = $path = "../" . CS_THEMEPATH . "/" . $file;	
}
$fh = fopen($myFile, 'r+');
$theData = fread($fh, filesize($myFile));
fclose($fh);
echo $theData;


?>
</textarea><br />
<input type="submit" value="Save"/>
<input type="hidden" name="return" value="../../index.php?action=appearance&tab=editor&file=<?=$file;?>&status=1" />
<input type="hidden" name="path" value="../../../<?=CS_THEMEPATH?>/<?=$file;?>" />
</form>
<div id="list_div" class="uiframe editor">
<h2>Templates</h2>
<ul id="list_ul" class="editor">
<? //list files in theme folder 

//get files


// Open a known directory, and proceed to read its contents


@closedir($dir);
sort($phpfiles);
sort($cssfiles);

for ($i=0; $i<count($phpfiles); $i++){
      $phps .= '<li><a href="?tbl=Appearance&action=appearance&tab=editor&file='.$phpfiles[$i].'">' . $phpfiles[$i]. '</a></li>';
}

echo $phps;


?>
</ul>
<h2>Stylesheets</h2>
<ul>

<?

for ($i=0; $i<count($cssfiles); $i++){
      $csss .= '<li><a href="?tbl=Appearance&action=appearance&tab=editor&file='.$cssfiles[$i].'">' . $cssfiles[$i]. '</a></li>';
}


echo $csss;


?>
</ul>
<h2>Javascripts</h2>
<ul>

<?

for ($i=0; $i<count($jsfiles); $i++){
      $jss .= '<li><a href="?tbl=Appearance&action=appearance&tab=editor&file='.$jsfiles[$i].'">' . $jsfiles[$i]. '</a></li>';
}


echo $jss;


?>
</ul>
<?php /*?><h2>Forms</h2>
<ul>

<?

for ($i=0; $i<count($formfiles); $i++){
      $forms .= '<li><a href="?tbl=Appearance&action=appearance&tab=editor&file='.$formfiles[$i].'&type=form">' . $formfiles[$i]. '</a></li>';
}


echo $forms;


?>
</ul><?php */?>
</div>




