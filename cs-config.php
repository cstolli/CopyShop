<?php
//error_reporting(E_ALL);
// CopyShop config file
// Use these values to connect, reflect, and erect.
//error_reporting(E_ALL);
ini_set('display_errors', '1');

// hard code your theme if you wish... if this option is set, there will be no theme selection tools in cs-tools.
$csSite = 'lowells';
$csTheme = '';


if ($csSite == '') 

{$csSite = 'default';
$dbName = 'copyshop';
}

else

{

$csSitePath = 'cs-content/themes/'.$csSite;

$csSiteImages = $csSitePath.'/images';
// name of database, duh
//$dbName = 'copyshop_'.$csSite;
$dbName = 'db13939_copyshop';
//$dbName = $csSite;
}

if ($csTheme == '') 

{$csTheme = 'default';}

else

{

$csThemePath = $csSitePath.'/themes/'.$csTheme;



$csThemeImages = $csThemePath.'/images';

}






//$dbName = 'copyshop2';
// address (ip or url or hostname) of database server, you probably won't have to change this
$dbServer = 'internal-db.s13939.gridserver.com';

// ummm, username.
$dbUser = 'db13939_copyshop';
// guess.
$dbPass = '.n3WsOm3p4zzw';	

// the installation directory of copyshop
$csDir = '/';		





?>
