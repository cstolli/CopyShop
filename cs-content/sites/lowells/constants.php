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
define("CS_PATH",					"http://www.peterlowells.com/");
define("CS_THEMEPATH",				"cs-content/sites/".CS_SITE."/themes/".CS_THEME);
define("CS_SITEPATH",				"cs-content/sites/".CS_SITE);
define("CS_PLUGINPATH",				"cs-content/plugins/");
define("CS_TOOLSPATH",				"cs-admin"); 

define("CS_DBNAME", 				"db13939_copyshop");
//define("CS_DBNAME", 				"smdunphy_cs");
define("CS_DBSERVER",				"internal-db.s13939.gridserver.com");
define("CS_DBUSER",					"db13939_copyshop");
define("CS_DBPASS", 				".n3WsOm3p4zzw");

define("CS_VERSION",				"2.0 Beta");
define("CS_CODENAME",				"Polished");
define("CS_SLOGAN", 				"Shiny.");



?>