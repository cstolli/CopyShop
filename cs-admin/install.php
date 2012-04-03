<?
	require_once("start.php");
function recurse_copy($src,$dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
	return true;
} 
?>



<script type="text/JavaScript">

  window.onload = function()
  {
      /*
      The new 'validTags' setting is optional and allows
      you to specify other HTML elements that curvyCorners
      can attempt to round.

      The value is comma separated list of html elements
      in lowercase.

      validTags: ["div", "form"]

      The above example would enable curvyCorners on FORM elements.
      */
      settings = {
          tl: { radius: 10 },
          tr: { radius: 10 },
          bl: { radius: 10 },
          br: { radius: 10 },
          antiAlias: true,
          autoPad: false,
          validTags: ["div"]
      }

      /*
      Usage:

      newCornersObj = new curvyCorners(settingsObj, classNameStr);
      newCornersObj = new curvyCorners(settingsObj, divObj1[, divObj2[, divObj3[, . . . [, divObjN]]]]);
      */
      var myBoxObject = new curvyCorners(settings, "cs_edit_list");
      myBoxObject.applyCornersToAll();
  }
  
</script>


<br />
<br />
<style>

form#install label em {font-size:10px; font-weight:normal}

</style>

<div style="width:100%; text-align:center;">
  <div id="csLogo"><img src="../cs-content/images/header-logo-stainless.png" /></div>
<? if (F("f_name") == "") { ?>
  <div class="cs_edit_list" align="left" style="width:230px; margin-left:auto; margin-right:auto; background:#eee" > 
 
  <form style="margin-left:18px;" action="?" method="post" enctype="application/x-www-form-urlencoded" name="install" id="install">
    <label class="cs_text_label">Site Name: <em>(no spaces)</em></label><br />
      <input class="cs_text_field" type="text" name="f_name" id="f_log" />
      <br />
      <br />


      <label class="cs_text_label">Site URL: <em>(256 chars max)</em></label><br />
      <input class="cs_text_field" type="text" name="f_url" id="f_pass" />
<br /><br />
	  <label class="cs_text_label" type="text" >Select a Theme:</label><br />
      <select class="cs_text_field" name="f_theme" id="f_theme">
      
      <? $dh = opendir("themes"); 
	  while ($fn = readdir($dh)) {
		  if (is_dir("themes/$fn") && $fn !=="." && $fn !=="..") { ?>
      <option value="<?=$fn?>"><?=ucwords($fn);?></option>
	  <? } } ?>
      </select
      >

<br />

<br />

<input type="submit" class="submit" name="f_submit" id="f_submit" value="Install" />
</form>
  </div>

<? } else {

$site= F("f_name");
$url = F("f_url");
$theme = F("f_theme");

$s = "";

$mysqli = new mysqli($dbServer, $dbUser, $dbPass);
$sqlfile = "sqldata/default.sql";
$fh = fopen($sqlfile, 'r');
$sql = fread($fh, filesize($sqlfile));

eval("\$sql = \"" . $sql . "\";");

fclose($fh);

//echo $sql;

$result = $mysqli->multi_query($sql);
if(!file_exists("../cs-content/sites/$site/") ){$sdr = mkdir("../cs-content/sites/$site", 0755, true); }

if(!file_exists("../cs-content/sites/$site/themes/$theme") ){$tdr=recurse_copy("themes/$theme", "../cs-content/sites/$site/themes/$theme");}

//make directory in cs-sites



if ($mysqli->error) {
	
	echo $mysqli->error;
	
} elseif ($sdr == false) {
	
	echo "<br><br>Unable to create site directory. May already exist or be write protected.";

} elseif ($tdr == false) {
	
	echo "<br><br>Unable to create theme directory. May already exist or be write protected.";

}else {

	echo 'Database Created.';
	echo '<br><br>Site Directory Created.';
	echo '<br><br>Theme Directory Created.';
	echo "<br><br><a href=\"index.php?site=$site\">Proceed to cs-admin</a>";
}

}

?>

</div>
