<?

//CopyShop constants file.
//You can use these settings to make your dialog boxes say curse words.

$site="zin";

$session = session_id();

if (!isset($_GET["site"])) {

	$csSite = (isset($_SESSION["site"])) ? $_SESSION["site"] : $site;

}else{ 

	$_SESSION["site"] = $_GET["site"];

	$csSite = $_GET["site"];
	
	

}

define("CS_DELETE_CONFIRM", 		"Are you sure?  This cannot be undone");
define("CS_IMAGE_BROWSE_SUGGEST", 	"Upload a New Image");
define("CS_IMAGE_URL_SUGGEST", 		"Paste in a URL or IMG tag");

define("CS_SITE",					$csSite);
define("CS_THEME",					"default");
define("CS_PATH",					"http://www.zinrestaurant.com/");
define("CS_THEMEPATH",				"cs-content/sites/".CS_SITE."/themes/".CS_THEME);
define("CS_SITEPATH",				"cs-content/sites/".CS_SITE);
define("CS_PLUGINPATH",				"cs-content/plugins/");
define("CS_TOOLSPATH",				"cs-admin"); 

//define("CS_DBNAME", 				"copyshop_".$csSite);
define("CS_DBNAME", 				"smdunphy_cs");
define("CS_DBSERVER",				"smdunphy-cs.db.sonic.net");
define("CS_DBUSER",					"smdunphy_cs-all");
define("CS_DBPASS", 				"e662f794");

define("CS_VERSION",				"2.0 Beta");
define("CS_CODENAME",				"Polished");
define("CS_SLOGAN", 				"Shiny.");

?>