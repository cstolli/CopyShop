<?php /*

Filename: save.php
Function: provides a save function for the file editor for copyshop theme files
Author: Chris Stoll
Date Added: 7/7/2011

*/

include("../../../cs-includes/functions.php");

//echo getcwd();

$myFile = F("path");
//echo F("path");
$fh = fopen($myFile, 'w+') or die("can't open file");
$stringData = stripslashes(F("code"));
fwrite($fh, $stringData);
fclose($fh);

header("Location: " . F("return"));

?>