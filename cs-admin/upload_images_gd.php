<? echo 'hello';?>
<? //require('../cs-config.php'); ?>
<? require('../cs-includes/constants.php'); ?>
<? require_once('../cs-includes/connect.php'); ?>
<? require('../cs-includes/functions.php'); ?>

<? error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);?>

<? // $im = new Imagick();
 $category = $_POST["category"];
 $table = $_POST["ftable"];
 
 $quantity = $_POST["quantity"];
//echo $category;
 
 $id = $_POST["fid"];
 $order = 0;

	//echo $_FILES.count;

 
 	//echo $id;
 
	  foreach ($_FILES as $fieldName => $file) {  
	  
 
	 
		
		move_uploaded_file($file['tmp_name'], "../" .CS_SITEPATH."/uploads/$category/" . str_replace(" ", "", $file['name']));  
		
		//echo "hello";

				
		$sql = "select COUNT(id) as cnt, MAX(`order`) as maxorder, id from cs_uploads where ftable = '$table' and fid = $id and category = '$category'";
		
		//echo $sql;
		
		$result = $mysqli->query($sql);
		
		if ($result->num_rows) {
			$info = $result->fetch_assoc();
		
		

		
			if ($info["cnt"] > 0) {
				
				$preid = $info["id"];
		
			$alreadyexists = true;	
		
			$order = $info["maxorder"] + 1;
			
			}
		
		} else { 
		
		$order = 0 ; 
		
		}
		


$current_file =  "../" .CS_SITEPATH."/uploads/$category/" . str_replace(" ", "", $file['name']);
$max_width = '150';

// Get the current info on the file
$image_base = explode('.', str_replace(" ", "", $file['name']));

// This part gets the new thumbnail name
$image_basename = $image_base[0];
$image_basename;
$image_ext = $image_base[1];
$thumb_name = $image_basename.'-100x.'.$image_ext;

$long_thumb_name = "../" .CS_SITEPATH."/uploads/$category/" . $thumb_name;


// create IM, so create GD image here
//$im->readImage($current_file);  -> get info for current uploaded image here
list( $source_image_width, $source_image_height, $source_image_type ) = getimagesize( $current_file );

  switch ( $source_image_type )
  {
   case IMAGETYPE_GIF:
    $source_gd_image = imagecreatefromgif( $current_file );
    break;

   case IMAGETYPE_JPEG:
    $source_gd_image = imagecreatefromjpeg( $current_file );
    break;

   case IMAGETYPE_PNG:
   
    $source_gd_image = imagecreatefrompng( $current_file );
	
    break;
  }
 
 
$new_mid_width=400;

if ($source_image_width < 400) {
	
	$new_mid_width = $source_image_width;

}
 
 //echo $source_image_width . " x " . $source_image_height;


	


$new_thumb_width = 100;
//$new_thumb_height = 100 * $source_aspect_ratio;

//if ($source_image_height > $source_image_width) {  //it's a portrait
$source_aspect_ratio = $source_image_height / $source_image_width;
$new_mid_height = $new_mid_width * $source_aspect_ratio;
$new_thumb_height = $new_thumb_width * $source_aspect_ratio;
//}

//echo "aspect: $source_aspect_ratio";
//echo $new_thumb_width . " " . $new_thumb_height;

$medium_name = $file['name'];

$medium_name = $image_basename.'-'.$new_mid_width.'x.'.$image_ext;
$long_mid_name = "../" .CS_SITEPATH."/uploads/$category/" .$medium_name;

//write new images here

$thumbnail_gd_image = imagecreatetruecolor( $new_thumb_width, $new_thumb_height );
$mid_gd_image = imagecreatetruecolor( $new_mid_width, $new_mid_height );

imagealphablending( $mid_gd_image, false );
imagesavealpha( $mid_gd_image, true );
imagealphablending( $thumbnail_gd_image, false );
imagesavealpha( $thumbnail_gd_image, true );

imagecopyresampled( $thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $new_thumb_width, $new_thumb_height, $source_image_width, $source_image_height );
imagecopyresampled( $mid_gd_image, $source_gd_image, 0, 0, 0, 0, $new_mid_width, $new_mid_height, $source_image_width, $source_image_height );

  switch ( $source_image_type )
  {
   case IMAGETYPE_GIF:
   imagegif($thumbnail_gd_image, $long_thumb_name, 99);
   imagegif($mid_gd_image, $long_mid_name, 99);
    break;
//
   case IMAGETYPE_JPEG:
    imagejpeg($thumbnail_gd_image, $long_thumb_name, 99);
	imagejpeg($mid_gd_image, $long_mid_name, 99);
	
    break;

   case IMAGETYPE_PNG:
	
    imagepng($thumbnail_gd_image, $long_thumb_name, 9);
	
	imagepng($mid_gd_image, $long_mid_name, 9);

	
    break;
  }

imagedestroy( $source_gd_image );

imagedestroy( $thumbnail_gd_image );
imagedestroy( $mid_gd_image );


		if ($alreadyexists && $quantity == "1") { // then it's a one of a kind-er and needs to be replaced
			
			
			$sql = "update cs_uploads set filename = '" . str_replace(" ", "", $file['name']) . "', thumbnail = '$thumb_name', mediumsize = '$medium_name' where fid = $id and ftable = '$table' and category = '$category'";
			//echo $sql;
			$result = $mysqli->query($sql);
			$newid = $preid;
		} else {
			
		//echo $sql;
		$sql = "insert into cs_uploads (fid, ftable, filename, thumbnail, mediumsize, category, `order`) values (". $id . ", '$table', '" . str_replace(" ", "", $file['name']) . "', '" . $thumb_name . "', '" . $medium_name . "', '$category', " . $order . ")";
		$result = $mysqli->query($sql);
		$newid = $mysqli->insert_id;
		
		}
		
		
		
		
		
		
		
	
		
		//echo $mysql->err;
		
		
		
		
		
		//echo $newid;
	
		
		$sql = "select * from cs_uploads where id = " . $newid;
		
		$newimage = $mysqli->query($sql);
		
		$image = $newimage->fetch_array(MYSQLI_BOTH);
		
		
		
		
		include('tools/images/polaroid.php');

	
	 
	  
	  
}

function imageflip(&$image, $x = 0, $y = 0, $width = null, $height = null)
{
    if ($width  < 1) $width  = imagesx($image);
    if ($height < 1) $height = imagesy($image);
    // Truecolor provides better results, if possible.
    if (function_exists('imageistruecolor') && imageistruecolor($image))
    {
        $tmp = imagecreatetruecolor(1, $height);
    }
    else
    {
        $tmp = imagecreate(1, $height);
    }
    $x2 = $x + $width - 1;
    for ($i = (int) floor(($width - 1) / 2); $i >= 0; $i--)
    {
        // Backup right stripe.
        imagecopy($tmp,   $image, 0,        0,  $x2 - $i, $y, 1, $height);
        // Copy left stripe to the right.
        imagecopy($image, $image, $x2 - $i, $y, $x + $i,  $y, 1, $height);
        // Copy backuped right stripe to the left.
        imagecopy($image, $tmp,   $x + $i,  $y, 0,        0,  1, $height);
    }
    imagedestroy($tmp);
    return true;
}

?> 


