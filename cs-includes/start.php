
<? 
require_once('cs-includes/doctype.php'); 
require_once('cs-includes/constants.php'); 
require_once('cs-includes/functions.php'); 

if (!isset($_GET["site"])) {

	$csSite = (isset($_SESSION["site"])) ? $_SESSION["site"] : CS_SITE;

}else{ 

	$_SESSION["site"] = $_GET["site"];

	$csSite = $_GET["site"];
	
	

}


//echo defined(CS_DBNAME);
//echo CS_DBNAME;

$csTheme = CS_THEME;

if ($csSite == '') {
	
	$csSite = 'default';
	$dbName = '';
	
}else{
	$csSitePath = 'cs-content/themes/'.$csSite;
	$csSiteImages = $csSitePath.'/images';
	
	if (CS_DBNAME=="") {

	$dbName = 'copyshop_'.$csSite;	
	} else
	{
		$dbName = CS_DBNAME;
	}
}


if ($csTheme == '') {$csTheme = 'default';}

require_once('cs-includes/connect.php'); 

//require_once('./cs-config.php'); 

 // determine theme
//if ($csTheme == '') {
//$sql  = "select theme from cs_options";

//echo $sql;

//$res = $mysqli->query($sql);


//if ($res) {$themes = $res->fetch_assoc(); $csTheme = $themes["theme"];} else {$csTheme = "default";}

//}


	$headPath = 'cs-content/sites/'.$csSite.'/themes/'.$csTheme.'/head.php';
	if (file_exists($headPath)){
		require_once('cs-content/sites/'.$csSite.'/themes/'.$csTheme.'/head.php');
	}
	else{
		require_once('cs-includes/head.php'); 
	}
	

 require_once('cs-content/sites/'.$csSite.'/themes/'.$csTheme.'/index.php'); ?>
 
</html>