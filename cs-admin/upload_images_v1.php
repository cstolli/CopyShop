<? require('../cs-config.php'); ?>
<? require('../cs-includes/constants.php'); ?>
<? require_once('../cs-includes/connect.php'); ?>
<? require('../cs-includes/functions.php'); ?>
<?
	  foreach ($_FILES as $fieldName => $file) {  
	  
 
	  
	 //  todo: add each new image to the database
	 // $images = $mysqli->query("select * from cs_images where image = '".$file['name']."'");
	 // $image = $images->fetch_row();

	  
	  //if (!$image) {
		//echo ("../" .CS_SITEPATH."/images/user/" . $file['name']);
		
		move_uploaded_file($file['tmp_name'], "../" .CS_SITEPATH."/uploads/images/" . $file['name']);  
		
				
		$sql = "insert into cs_images (title, caption, category) values ('" . $file['name'] ."', '" . $file['name'] . "', " . F("category") . ")";
		
		//echo $sql;
		
		$result = $mysqli->query($sql);
		//echo $mysql->error;
		
		
			
		$id = $mysqli->insert_id;
		
			
		
		
		
		$sql = "insert into cs_uploads (fid, ftable, filename, category) values (". $mysqli->insert_id . ", 'cs_images', '" . $file['name'] . "', 'images')";
		
		//echo $sql;
		
		$result = $mysqli->query($sql);
		
		//echo $mysqli->error;
		
		$newid = $mysqli->insert_id;
		
		//echo $newid;
		
		$sql = "select * from cs_uploads where id = " . $newid;
		
		$newimage = $mysqli->query($sql);
		
		$image = $newimage->fetch_array(MYSQLI_BOTH);
		
		
		
		//echo $image["filename"];
		
		//echo $image["ftable"];
		
		//if ($image["ftable"] !== "cs_images") {
		
		
		//include ('../cs-content/plugins/'.cs_table($image["ftable"]).'/tools/images/polaroid.php');
		
		//}
		//else
		//{
			
		
		
		include('tools/images/polaroid.php');
		
		//}
		
		
		
	
		
	//	if ($mysqli->error) { die;}
	
	 
	  
	  
} ?> 