<? require('../cs-config.php'); ?>
<? require('../cs-includes/constants.php'); ?>
<? require_once('../cs-includes/connect.php'); ?>
<? require('../cs-includes/functions.php'); ?>

<? // $im = new Imagick();
 $category = $_POST["category"];
 $table = $_POST["ftable"];
 $id = $_POST["fid"];
	  foreach ($_FILES as $fieldName => $file) {  
	  
 
	 
	 //  todo: add each new image to the database
	 // $images = $mysqli->query("select * from cs_images where image = '".$file['name']."'");
	 // $image = $images->fetch_row();

	  
	  //if (!$image) {
		//echo ("../" .CS_SITEPATH."/images/user/" . $file['name']);
		
		move_uploaded_file($file['tmp_name'], "../" .CS_SITEPATH."/uploads/images/" . str_replace(" ", "", $file['name']));  
		
				
		//$sql = "insert into cs_images (title, caption, category) values ('" . $file['name'] ."', '" . $file['name'] . "', " . F("category") . ")";
		
		//echo $sql;
		
		//$result = $mysqli->query($sql);
		//echo $mysql->error;
		
		
			
		//$id = $mysqli->insert_id;
		// Specify your file details

$current_file =  "../" .CS_SITEPATH."/uploads/images/" . str_replace(" ", "", $file['name']);
//$max_width = '150';

// Get the current info on the file
//$current_size = getimagesize($current_file);
//$current_img_width = $current_size[0];



//$current_img_height = $current_size[1];
//$image_base = explode('.', str_replace(" ", "", $file['name']));

// This part gets the new thumbnail name
//$image_basename = $image_base[0];
//$image_basename;
//$image_ext = $image_base[1];
//$thumb_name = $image_basename.'-100x.'.$image_ext;
//$medium_name = $image_basename.'-400x.'.$image_ext;
//$long_thumb_name = "../" .CS_SITEPATH."/uploads/$category/" . $thumb_name;

	
//$im->readImage($current_file);
//$im->thumbnailImage(400, null);
//$im->writeImage("../" .CS_SITEPATH."/uploads/$category/" .$medium_name);
//$im->thumbnailImage(100, null);
//$im->writeImage($long_thumb_name);


		
		
		$sql = "insert into cs_uploads (fid, ftable, filename, category) values (1, 'cs_images', '" . str_replace(" ", "", $file['name']) . "', 'images')";
		//
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
			
		
		
		//include('tools/images/polaroid.php');
		
		//}
		//header('Cache-Control: no-cache, must-revalidate');
	//header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
//header('Content-type: application/json');
//
		//if ($err->number == 0) {

		echo "{status:'UPLOADED',image_url:'../".CS_SITEPATH."/uploads/images/".$image["filename"]. "'}";
		
		//}
		//else
		//{
		
			//echo "{status:'FAILED'}";
		//}
	
		
	//	if ($mysqli->error) { die;}
	
	 
	  
	  
}

//$im->destroy();

?> 