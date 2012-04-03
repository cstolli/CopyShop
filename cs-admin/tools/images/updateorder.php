<? //require_once('../../../cs-config.php'); ?>

<? require_once('../../../cs-includes/constants.php'); ?>
<? require_once('../../../cs-includes/connect.php'); ?>
<? require_once('../../../cs-includes/functions.php'); ?>

<? 
foreach($_POST as $name => $value) {

	$sql = "update cs_uploads set `order` = $value where id = $name";
	
	$mysqli->query($sql);


}


?>