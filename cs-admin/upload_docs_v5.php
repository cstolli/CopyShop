<? //require('../cs-config.php'); ?>
<? require('../cs-includes/constants.php'); ?>
<? require_once('../cs-includes/connect.php'); ?>
<? require('../cs-includes/functions.php'); ?>
<?
 error_reporting(1);
ini_set("display_errors", 1);
?>
<?
	$table=F("ftable");
	$id=F("fid");
	$category = F("category");
	
	foreach ($_FILES as $fieldName => $file) {  

	$uploaddir = '../'.CS_SITEPATH.'/uploads/'.$category.'/';
	


	$uploadfile = $uploaddir . $file['name'];

	//echo $uploadfile;


		//check if upload for this id and category exists, if so, delete it.
		
		$sql = "delete from cs_uploads where ftable = '$table' and fid = " . $id . " and category = '$category'";
		$result = $mysqli->query($sql);
		
		
		$move = move_uploaded_file($file['tmp_name'], $uploadfile);  
		
		
				
		$sql = "insert into cs_uploads (filename, ftable, fid, category) values ('" . $file['name'] ."',  '" . $table . "', ". F("fid") . ", '". $category . "')";
		
		//echo $sql;
		
	
		//echo $mysql->error;
		
		//echo $sql;
		
		$result = $mysqli->query($sql);
		//echo $mysql->error;
		
		if (!$mysqli->error) {
			
		$id = $mysqli->insert_id;
		
		//echo $id;
		
		$newimage = $mysqli->query("select * from cs_uploads where id = " . $id);
		
		
		
		$image = $newimage->fetch_array(MYSQLI_BOTH);
		
		//echo $image["ftable"];
		
		//if ($image["ftable"] !== "cs_images") {
		
		
		//include ('../cs-content/plugins/'.cs_table($image["ftable"]).'/tools/images/polaroid.php');
		
		//}
		//else
		//{
		
		include('tools/docs/item.php');
		
		//}
		
		
		
	  }
		
	//	if ($mysqli->error) { die;}
	
	 
	  
	  
} ?> 