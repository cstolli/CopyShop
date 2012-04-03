<?php
// CopyShop Index File, this is the starting point for your front end.
// From here it fires the following file.  If you are reading our code for the first time,
// go here next and follow the code.  It's pretty simple.

//$host = $_SERVER['HTTP_HOST'];
//$x = substr($host, 0, 4);

//if ($x !== "www.") {

//echo 'hello';

//Header( "HTTP/1.1 301 Moved Permanently" );
//Header( "Location: http://www.".$_SERVER['HTTP_HOST']."/?".$_SERVER["QUERY_STRING"] );

//}
//error options, for debugging
error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);
ini_set("display_warnings", 1);

// start a session if need be
if(session_id() == ""){session_start();}

// fire it up
require('cs-includes/start.php');

?>










