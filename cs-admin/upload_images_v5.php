<? require('../cs-config.php'); ?>
<? require('../cs-includes/constants.php'); ?>
<? require_once('../cs-includes/connect.php'); ?>
<? require('../cs-includes/functions.php'); ?>

<? $im = new Imagick();
 $category = $_POST["category"];
 $table = $_POST["ftable"];
 
 $id = $_POST["fid"];
 $order = 0;
 
 //echo $order;
 
 //$z = 0;
 
 //echo count($_FILES);
 
	  foreach ($_FILES as $fieldName => $file) {  
	  
 
	 	//echo $z;
		//$z = $z + 1;
	 //  todo: add each new image to the database
	 // $images = $mysqli->query("select * from cs_images where image = '".$file['name']."'");
	 // $image = $images->fetch_row();

	  
	  // (!$image) {
		//echo ("../" .CS_SITEPATH."/images/user/" . $file['name']);
		
		move_uploaded_file($file['tmp_name'], "../" .CS_SITEPATH."/uploads/$category/" . str_replace(" ", "", $file['name']));  
		
		//echo err
				
		$sql = "select COUNT(id) as cnt, MAX(`order`) as maxorder from cs_uploads where ftable = '$table' and fid = $id and category = '$category'";
		
		//echo $sql;
		
		$result = $mysqli->query($sql);
		$info = $result->fetch_assoc();
		
		//echo $info["cnt"];
		
		if ($info["cnt"] > 0) {
		
		
		
		$order = $info["maxorder"] + 1;
		
		} else { 
		
		$order = 0 ; 
		
		}
		
		//echo $order;
		
		
		//echo $order;
		
		//echo $sql;
		
		//$result = $mysqli->query($sql);
		//echo $mysql->error;
		
		
			
		//$id = $mysqli->insert_id;
		// Specify your file details

$current_file =  "../" .CS_SITEPATH."/uploads/$category/" . str_replace(" ", "", $file['name']);
$max_width = '150';

// Get the current info on the file
$current_size = getimagesize($current_file);
$current_img_width = $current_size[0];



$current_img_height = $current_size[1];
$image_base = explode('.', str_replace(" ", "", $file['name']));

// This part gets the new thumbnail name
$image_basename = $image_base[0];
$image_basename;
$image_ext = $image_base[1];
$thumb_name = $image_basename.'-100x.'.$image_ext;

$long_thumb_name = "../" .CS_SITEPATH."/uploads/$category/" . $thumb_name;

$new_mid_width=400;

if ($current_img_width < 350) {
	
	$new_mid_width = $current_img_width;

}

if ($current_img_width < 150) {
	
	$new_mid_width = 0;

}

	
$im->readImage($current_file);
$medium_name = $file['name'];
if ($new_mid_width !== 0){
$medium_name = $image_basename.'-'.$new_mid_width.'x.'.$image_ext;
$im->thumbnailImage($new_mid_width, null);
$im->writeImage("../" .CS_SITEPATH."/uploads/$category/" .$medium_name);

}
$im->thumbnailImage(100, null);
$im->writeImage($long_thumb_name);


		
		
		$sql = "insert into cs_uploads (fid, ftable, filename, thumbnail, mediumsize, category, `order`) values (". $id . ", '$table', '" . str_replace(" ", "", $file['name']) . "', '" . $thumb_name . "', '" . $medium_name . "', '$category', " . $order . ")";
		
		
		
		
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
			
		
		
		//echo $x;
		
		include('tools/images/polaroid.php');
		
		//}
		
		
		
	
		
	//	if ($mysqli->error) { die;}
	
	 
	  
	  
}

$im->destroy();?> 