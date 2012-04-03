<?

//echo CS_DBSERVER;

$dbServer = CS_DBSERVER;
// ummm, username.
$dbUser = CS_DBUSER;
// guess.
$dbPass = CS_DBPASS;

// CopyShop mysql database connect file
// $values are set in /cs-config.php
if (!isset($dbName)) $dbName = CS_DBNAME;

// attempt connection

//if (!isset($dbName)) $dbName = "copyshop_".CS_SITE;

$mysqli = new mysqli($dbServer, $dbUser, $dbPass, strtolower($dbName));

// check for an error
if ($mysqli->error) {

    // handle the error
	//E ($mysqli->error);
	
}

$schema = new mysqli($dbServer, $dbUser, $dbPass, "information_schema");

if ($mysqli->error) {

    // handle the error
	//E ($mysqli->error);
	
}


?>
