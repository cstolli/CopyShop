<?

//CopyShop constants file.
//You can use these settings to make your dialog boxes say curse words.

$site="lowells";
$theme="default";

$session = session_id();

if (!isset($_GET["site"])) {

	$csSite = (isset($_SESSION["site"])) ? $_SESSION["site"] : $site;

}else{ 

	$_SESSION["site"] = $_GET["site"];

	$csSite = $_GET["site"];
	
	

}


if (!isset($_GET["theme"])) {

	$csTheme = (isset($_SESSION["theme"])) ? $_SESSION["theme"] : $theme;

}else{ 

	$_SESSION["theme"] = $_GET["theme"];

	$csTheme = $_GET["theme"];
	
	

}

define("CS_DELETE_CONFIRM", 		"Are you sure?  This cannot be undone");
define("CS_IMAGE_BROWSE_SUGGEST", 	"Upload a New Image");
define("CS_IMAGE_URL_SUGGEST", 		"Paste in a URL or IMG tag");

define("CS_SITE",					$csSite);
define("CS_THEME",					$csTheme);
define("CS_PATH",					"/copyshop/");
define("CS_URL",					"http://localhost/copyshop/");
define("CS_THEMEPATH",				"cs-content/sites/".CS_SITE."/themes/".CS_THEME);
define("CS_SITEPATH",				"cs-content/sites/".CS_SITE);
define("CS_PLUGINPATH",				"cs-content/plugins/");
define("CS_TOOLSPATH",				"cs-admin"); 

define("CS_DBNAME", 				"db13939_copyshop");
//define("CS_DBNAME", 				"smdunphy_cs");
define("CS_DBSERVER",				"localhost");
define("CS_DBUSER",					"root");
define("CS_DBPASS", 				"livi");

define("CS_VERSION",				"2.0 Beta");
define("CS_CODENAME",				"Polished");
define("CS_SLOGAN", 				"Shiny.");



?>