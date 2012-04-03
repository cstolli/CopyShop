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
		
		move_uploaded_file($file['tmp_name'], "../" .CS_SITEPATH."/uploads/data/" . $table . ".txt");  
		
		//write merge script here
		
		//echo "moved file";
		
				
		//$sql = "insert into cs_images (title, caption, category) values ('" . $file['name'] ."', '" . $file['name'] . "', " . F("category") . ")";
		
		//echo $sql;
		
		//$result = $mysqli->query($sql);
		//echo $mysql->error;
		
		
			
		//$id = $mysqli->insert_id;
		// Specify your file details
		
		$x = 0;
		$y = 0;

$current_file =  "../" .CS_SITEPATH."/uploads/data/" . $table . ".txt";  

$fh = fopen($current_file, 'r');

	$theData = stream_get_line($fh, 1024, "\r");
	//$theData = stream_get_line($fh, 1024, "\r");
	//$theData = stream_get_line($fh, 1024, "\r");
	//$theData = stream_get_line($fh, 1024, "\r");
while ($theData = stream_get_line($fh, 1024, "\r")){
	
	//echo $theData . "<br>";
	$data = explode("\t", $theData);
	//echo $data[0];
	$sql = "select * from cs_accounts where company = '" . addslashes(str_replace("\"", "", $data[0])) . "'";
	//echo $sql;
	//echo addslashes(str_replace("\"", "", $data[0]));
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
	$sql = "update cs_accounts set address = '" . str_replace("\"", "", $data[2]) . "', ";
	$sql .= "city = '" . $data[3] . "', ";
	$sql .= "state = '" . $data[4] . "', ";
	$sql .= "zip = '" . $data[5] . "', ";
	$sql .= "phone = '" . $data[6] . "', ";
	$sql .= "fax = '" . $data[7] . "', ";
	$sql .= "phone = '" . $data[6] . "', ";
	$sql .= "email = '" . $data[8] . "', ";
	$sql .= "contact = '" . $data[1] . "', ";
	$sql .= "website = '" . $data[9] . "', ";
	
	//echo str_replace("," , "", str_replace("\"", "", $data[6])) . "<br>";
	
	$sql .= "balance = 0, ";
	$sql .= "terms = '" . $data[13] . "', ";
	$sql .= "pass = '" . $data[15] . "', ";
	$sql .= "login = '" . $data[14] . "', ";
	$sql .= "print = 1, ";
	$sql .= "hours = 'M-F:" . $data[10] . ", Sat: " . $data[11] . ", Sun: " . $data[12] . "'";
	$sql .= "where company = '" . $data[0] . "'	";
	$x = $x + 1;
	
	//echo " update";
	}
	else
	{
	$sql = "insert into cs_accounts (
		company,
		contact,
		address, 
		city, 
		state, 
		zip, 
		phone,
		fax,
		email,
		website, 
		balance,
		terms, 
		hours, 
		print, 
		login, 
		pass) values (
		'" . addslashes(str_replace("\"", "", $data[0])) . "', 
		'". str_replace("\"", "", $data[1]) . "', 
		'". str_replace("\"", "", $data[2]) . "', 
		'". $data[3] . "', 
		'". $data[4] . "', 
		'". $data[5] . "', 
		'" . $data[6] . "',
		'" . $data[7] . "', 
		'" . $data[8] . "',
		'" . $data[9] . "', 
		 0,
		'". $data[13] . "', 
		'M-F:" . $data[10] . ", Sat: " . $data[11] . ", Sun: " . $data[12] . "', 
		1, 
		'". $data[14] . "',  
		'". $data[15] . "')";
	$y = $y + 1;
	}
	
	//echo addslashes(str_replace("\"", "", $data[0])) . "insert";
	
	//echo $sql;
	
	$mysqli->query($sql);
	
	//echo $mysqli->error;
	
	//foreach ($data as $field) {
		//echo $field;
	//}
	
}
fclose($fh);
//echo $theData;

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


		
		
		$sql = "insert into cs_uploads (fid, ftable, filename, category) values (0, '', '" . $table . ".txt', 'data')";
		//
		//echo $sql;
		
		$result = $mysqli->query($sql);
		
		//echo $mysqli->error;
		
		$newid = $mysqli->insert_id;
		
		//echo $newid;
		
		$sql = "select * from cs_uploads where id = " . $newid;
		
		$newfile = $mysqli->query($sql);
		
		$file = $newfile->fetch_array(MYSQLI_BOTH);
		
		
		
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

		echo $y . " new customers added. " . $x . " customers updated.";
		
		//}
		//else
		//{
		
			//echo "{status:'FAILED'}";
		//}
	
		
	//	if ($mysqli->error) { die;}
	
	 
	  
	  
}

//$im->destroy();

?> 