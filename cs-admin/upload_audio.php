<? //echo 'hello';?>
<? require('../cs-config.php'); ?>
<? require('../cs-includes/constants.php'); ?>
<? require_once('../cs-includes/connect.php'); ?>
<? require('../cs-includes/functions.php'); ?>



<? // $im = new Imagick();
 $category = $_POST["category"];
 $table = $_POST["ftable"];
 
 $quantity = $_POST["quantity"];
//echo $category;
 
 $id = $_POST["fid"];
 $order = 0;
 
 $name = $_POST["name"];
 
 

 //echo $data[0];

	//	echo $_FILES.count;

 
	  foreach ($_FILES as $fieldName => $file) {  
	  
 
	 	//echo str_replace("'", "\'", $file["name"]);
		
		move_uploaded_file($file['tmp_name'], "../" .CS_SITEPATH."/uploads/$category/".str_replace("\\","",$name));  
		
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
		


$current_file =  "../" .CS_SITEPATH."/uploads/$category/" . $name;




		if ($alreadyexists && $quantity == "1") { // then it's a one of a kind-er and needs to be replaced
			
			
			$sql = "update cs_uploads set filename = '" . $name . "', thumbnail = '$thumb_name', mediumsize = '$medium_name' where fid = $id and ftable = '$table' and category = '$category'";
			//echo $sql;
			$result = $mysqli->query($sql);
			$newid = $preid;
		} else {
			
		
		$sql = "insert into cs_uploads (fid, ftable, filename, thumbnail, mediumsize, category, `order`) values (". $id . ", '$table', '" . $name . "', '" . $thumb_name . "', '" . $medium_name . "', '$category', " . $order . ")";
		$result = $mysqli->query($sql);
		
		//echo $sql;
		$newid = $mysqli->insert_id;
		//echo $newid;
		
		}
		
		
		
		
		
		
		
	
		
		//echo $mysql->err;
		
		
		
		
		
		//echo $newid;
	
		
		$sql = "select * from cs_uploads where id = " . $newid;
		
		$newimage = $mysqli->query($sql);
		
		$image = $newimage->fetch_array(MYSQLI_BOTH);
		
		
		
		
		include('tools/images/audio.php');

	
	 
	  
	  
}



?> 


