<? require('../cs-config.php'); ?>
<? require('../cs-includes/constants.php'); ?>
<? require_once('../cs-includes/connect.php'); ?>
<? require('../cs-includes/functions.php'); ?>
<?
	$table=F("hid_table");
	$id=F("hid_id");
	$field=F("hid_field");
	
	foreach ($_FILES as $fieldName => $file) {  

	$uploaddir = '../'.CS_SITEPATH.'/uploads/'.cs_table($table).'/';
	


	$uploadfile = $uploaddir . basename($_FILES['file_image_source']['name']);

	$filename = basename($_FILES['file_image_source']['name']);





		
		move_uploaded_file($file['tmp_name'], $uploadfile);  
		
				
		
		
		//echo $sql;
		
		$result = $mysqli->query($sql);
		//echo $mysql->error;
		
		if (!$mysqli->error) {
			
		$id = $mysqli->insert_id;
		
		$newimage = $mysqli->query("select * from cs_uploads where id = " . $id);
		
		
		
		$image = $newimage->fetch_array(MYSQLI_BOTH);
		
		//echo $image["ftable"];
		
		//if ($image["ftable"] !== "cs_images") {
		
		
		//include ('../cs-content/plugins/'.cs_table($image["ftable"]).'/tools/images/polaroid.php');
		
		//}
		//else
		//{
		
		include('tools/uploads/item.php');
		
		//}
		
		
		
	  }
		
	//	if ($mysqli->error) { die;}
	
	 
	  
	  
} ?> 