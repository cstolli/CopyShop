<?php

// db.php, the CopyShop database layer
// handles all communication with the database, at this point:
// inserts, updates, and deletes... and duplicates
// todo: create table, drop table... and eventually update table

// 12/1/2010 - added duplicate feature for any database item
// 7/9/2011 - updated includes for new copyshop boot-up flow

if (!$mysqli) {

include_once('constants.php'); 
include_once('connect.php'); 
include_once('functions.php'); 
}

function cs_duplicate($ms)
{
	
	$table = F("hid_table");
	$dupid = F("hid_id");
	//echo $table;
	$sql = "select * from $table limit 1";
	//echo $sql;	
	$schema = $ms->query($sql);
	//echo $ms->error;
	$inpcount = 0;
	$inpproc = 0;
	
		
	$sql = "INSERT INTO `$table` (";
	
	$fields = '';
	
	$finfo = $schema->fetch_field();
	$finfo = $schema->fetch_field();
	
	$fields = "`".$finfo->name."`";
	$values = "CONCAT(`".$finfo->name."`, ' copy')";
	
	while ($finfo = $schema->fetch_field())
	{ 
		
		//echo $fieldName;
		
		if ($finfo->name !== 'id'){
			
			$fields .= ", `".$finfo->name."`";
			//echo $finfo->type;
			
			switch ($finfo->name){
			
				case 'print':
					$values .= ", false";
					break;
				default:
					$values .= ", `".$finfo->name."`";
				
			}
			
		}
		
		
		
		$findex = $findex + 1;
	}
		
	$sql .= $fields . ") select $values from $table where id = $dupid";
	
	//echo $sql;
	//die('after insert');
	
	

	$result = $ms->query($sql);
	
	
	
	$insertid = $ms->insert_id;
	if (!$result)
	{
		E( $ms->error);
		
	}else{
		return $insertid;}
		
	

//	header("Location: ../cs-admin/test.php");
}
	
function cs_version($ms)
{
	
	$table = F("hid_table");
	$dupid = F("hid_id");
	//echo $table;
	$sql = "select * from $table limit 1";
	//echo $sql;	
	$schema = $ms->query($sql);
	//echo $ms->error;
	$inpcount = 0;
	$inpproc = 0;
	
		
	$sql = "INSERT INTO `$table` (";
	
	$fields = '';
	
	$finfo = $schema->fetch_field();
	$finfo = $schema->fetch_field();
	
	$fields = "`".$finfo->name."`";
	$values = "CONCAT(`".$finfo->name."`, ' version ".date("m/d/y g:i a")."')";
	
	while ($finfo = $schema->fetch_field())
	{ 
		
		//echo $fieldName;
		
		if ($finfo->name !== 'id'){
			
			$fields .= ", `".$finfo->name."`";
			//echo $finfo->type;
			
			switch ($finfo->name){
			
				case 'print':
					$values .= ", false";
					break;
				default:
					$values .= ", `".$finfo->name."`";
				
			}
			
		}
		
		$findex = $findex + 1;
	}
		
	$sql .= $fields . ") select $values from $table where id = $dupid";
	
	//echo $sql;
	//die('after insert');
	
	

	$result = $ms->query($sql);
	
	
	
	$insertid = $ms->insert_id;
	if (!$result)
	{
		E( $ms->error);
		
	}else{
		return $insertid;}
		
	

//	header("Location: ../cs-admin/test.php");
}

function cs_add($ms)
{
	$table = F("hid_table");
	//$schemaSql = "select * from $table limit 1";
	//$schema = $ms->query($schemaSql);	
	
	foreach ($_POST as $key => $value)
	{ 
		//echo $key;
		if (strpos($key, "inp_") !== false)
		{
			
			$fieldName = str_replace("inp_", "", $key);
			$fieldName = str_replace("_", " ", $fieldName);
			$fields .= "`".$fieldName. "`, ";
			$args .= "?, ";
			if(is_int($value)) {
					$types .= 'i';              //integer
			} elseif (is_float($value)) {
				$types .= 'd';              //double
			} elseif (is_string($value)) {
				$types .= 's';              //string
			} else {
				$types .= 'b';              //blob and unknown
			}
		}
	}
	
	$args = substr($args, 0, -2);
	$fields = substr($fields, 0, -2);
	
	$sql = "INSERT INTO `$table` ($fields) VALUES ($args)";
	//echo $types;
	$bind_names[] = $types;
	//$schema = $ms->query($schemaSql);
		
	foreach ($_POST as $key => $value)
	{ 
	
		//$fieldName = "inp_".str_replace(" ", "_", $finfo->name);
						
		$pf = $value;
		if (get_magic_quotes_gpc){$pf=stripslashes($pf);}
		
		if ($key !== 'id' && strpos($key, "inp") !== false)
		{
			
			$bind_name = 'bind_' . $pf;       //give them an arbitrary name
            $$bind_name = $pf;      //add the parameter to the variable variable
			
            $bind_names[] = &$$bind_name;
			
		}
	}
	
	//echo $sql;
	
	
	$stmt = $ms->prepare($sql);
	call_user_func_array(array($stmt,'bind_param'),$bind_names);
	$stmt->execute();
	echo $stmt->insert_id;
	if (!$result)
	{
		E( $ms->error);
		
	}else{

		return $stmt->insert_id;}
		
	

//	header("Location: ../cs-admin/test.php");
}

function cs_insert($ms)
{
	$table = F("hid_table");
	$schemaSql = "select * from $table limit 1";
	$schema = $ms->query($schemaSql);	
	
	while ($finfo = $schema->fetch_field())
	{ 
		if ($finfo->name !== 'id')
		{
			
			$fieldName = "inp_".str_replace(" ", "_", $finfo->name);
			$fields .= "`".$finfo->name . "`, ";
			$args .= "?, ";
			if(is_int($_POST[$fieldName])) {
					$types .= 'i';              //integer
			} elseif (is_float($_POST[$fieldName])) {
				$types .= 'd';              //double
			} elseif (is_string($_POST[$fieldName])) {
				$types .= 's';              //string
			} else {
				$types .= 'b';              //blob and unknown
			}
		}
	}
	
	$args = substr($args, 0, -2);
	$fields = substr($fields, 0, -2);
	
	$sql = "INSERT INTO `$table` ($fields) VALUES ($args)";
	
	$bind_names[] = $types;
	$schema = $ms->query($schemaSql);
		
	while ($finfo = $schema->fetch_field())
	{ 
	
		$fieldName = "inp_".str_replace(" ", "_", $finfo->name);
						
		$pf = $_POST[$fieldName];
		if (get_magic_quotes_gpc){$pf=stripslashes($pf);}
		
		if ($finfo->name !== 'id')
		{
			
			$bind_name = 'bind_' . $pf;       //give them an arbitrary name
            $$bind_name = $pf;      //add the parameter to the variable variable
			
            $bind_names[] = &$$bind_name;
			
		}
	}
	
	
	$stmt = $ms->prepare($sql);
	call_user_func_array(array($stmt,'bind_param'),$bind_names);
	$stmt->execute();
	
	if (!$result)
	{
		E( $ms->error);
		
	}else{
		return $stmt->insertid;}
		
	

//	header("Location: ../cs-admin/test.php");
}

function cs_insert_old($ms)
{
	$table = F("hid_table");
	//echo $table;
	$sql = "select * from $table limit 1";
	//echo $sql;	
	$schema = $ms->query($sql);
	//echo $ms->error;
	$inpcount = 0;
	$inpproc = 0;
	
	foreach($_POST as $key => $value){
		if (strpos($key, "inp_") !== false ){
			if ($value !== '' && empty($value) !== true) {
				$inpcount = $inpcount + 1;
				
		   }
		}
	}
	
	//echo $inpcount;
	
	
	$sql = "INSERT INTO `$table` (";
	
	
	
	while ($finfo = $schema->fetch_field())
	{ 
		$fieldName = "inp_".str_replace(" ", "_", $finfo->name);
		//echo $fieldName;
		$pf = $_POST[$fieldName];
		if ($finfo->name !== 'id' && $pf !== '' && empty($pf) !== true){
			
			$fields .= "`".$finfo->name."`";
			//echo $finfo->type;
			switch ($finfo->type)
			{
				case 246:
					$value = $_POST[$fieldName];
					//if (get_magic_quotes_gpc()) { $value = stripslashes($value);}
					//$values .= cs_clean_content($value);
					break;
				case 252:
				case 253:
				case 254:
				
				/*case 12:*/
					//$values .= "\"".str_replace("'", "'", $_POST[$fieldName])."\"";
					$value = $_POST[$fieldName];
					if (get_magic_quotes_gpc()) { $value = stripslashes($value);}
					$values .= "\"".cs_clean_contenta($value)."\"";
					
					break;
				case 10:
					$values .= "\"".date( 'Y-m-d',strtotime($_POST[$fieldName]))."\"";
					//echo $values;
					break;
				case 11:
					$values .= "\"".date( 'H:i:s',strtotime($_POST[$fieldName]))."\"";
					break;
				case 12:
					$values .= "\"".date( 'Y-m-d H:i:s', time())."\"";
					break;
					
				default:
					
					$values .= $_POST[$fieldName];
					break;
			}	
			
			$inpproc = $inpproc + 1;
			//echo $inpproc;
			if ($inpproc == $inpcount)
			{		
				$fields .= ") ";
				$values .= ") ";
			}
			else
			{
				$fields .= ", ";
				$values .= ", ";
			}
		}
	}
		
	$sql .= $fields . " VALUES (" . $values;
	
	//echo $sql;
	//die('after insert');

	$result = $ms->query($sql);
	
	$insertid = $ms->insert_id;
	if (!$result)
	{
		E( $ms->error);
		
	}else{
		return $insertid;}
		
	

//	header("Location: ../cs-admin/test.php");
}
	
function cs_update_old($ms)
{
	$table = F("hid_table");
	
	$id = F("hid_id");
	
	$sql = "select * from $table";
	
	
		
	$schema = $ms->query($sql);
	
	//add up fields with inp in the name
	
	$inpcount = 0;
	$inpproc = 0;
	
	foreach($_POST as $key => $value){
		if (strpos($key, "inp_") !== false ){
			//if ($value !== '' && empty($value) !== true) {
				$inpcount = $inpcount + 1;
				
		   //}
		}
	}
	
	//echo $inpcount;
	
	
	//echo $ms->error;
	
	$sql = "UPDATE `$table` SET ";
	
	while ($finfo = $schema->fetch_field())
	{ 
		$fieldName = "inp_".str_replace(" ", "_", $finfo->name);
		
		
		
		$pf = $_POST[$fieldName];
		//echo $pf;
		if ($finfo->name !== 'id')
		{
			$sql .= "`".$finfo->name."` = ";
		
			switch ($finfo->type)
			{
				case 252:
					$content = $_POST[$fieldName];
					
					if (get_magic_quotes_gpc()) { $value = stripslashes($content);}
					$content = cs_clean_content($content);
					
					$sql .= "'".$content."'";
					
					break;
				
				case 246:
				case 3:
					if ($pf == '' || empty ($pf) || $pf == 0)
					{
						$num = 0;
					}
					else
					{
						$num = $pf;
					}
					$sql .= str_replace(",", "", $num);
					//$inpproc = $inpproc - 1;
					break;
					
				
				case 253:
				case 254:
					$value = $_POST[$fieldName];
					if (get_magic_quotes_gpc()) { $value = stripslashes($value);}
					$sql .= "'".cs_clean_content($value)."'";					
					
					break;
				
				case 12:
					$sql .=  "\"".date( 'Y-m-d H:i:s', time())."\"";
					//echo 'hello';
					$inpproc = $inpproc - 1;
					break;
					
				case 10:
					if ($pf == '' || empty($pf)){
						$dt = date();
					}
					else
					{
						$dt = $pf;
					}
					$sql .= "\"".date( 'Y-m-d',strtotime($dt))."\"";
					//$inpproc = $inpproc - 1;
					break;
					
				case 11:
					$sql .= "\"".date( 'H:i:s',strtotime($_POST[$fieldName]))."\"";
					break;
					
				default:
					$sql .= $_POST[$fieldName];
					break;
			}
			
			$inpproc = $inpproc + 1;
		
			//echo $inpproc;
		
			if ($inpproc !== $inpcount )
			{			
				$sql .= ", ";
			}
			else
			{
				$sql .= " ";
			}
			
		}
	}
	
	$sql .= " WHERE id = $id";		
	

	
	//echo $sql;
	$result = $ms->query($sql);
	
	if (!$result)
	{
		E( $ms->error);
	}
	
}

function cs_update($ms)
{
	$table = F("hid_table");
	
	$id = F("hid_id");
	
	$schemaSql = "select * from $table";
	
	
		
	$schema = $ms->query($schemaSql);
	
	//add up fields with inp in the name
	
	$inpcount = 0;
	$inpproc = 0;
	
	$sql = "UPDATE `$table` SET ";
	//$stmt = $ms->prepare("INSERT INTO CountryLanguage VALUES (?, ?, ?, ?)");
	//$stmt->bind_param('sssd', $code, $language, $official, $percent);
	
	foreach($_POST as $key => $value){
		if (strpos($key, "inp_") !== false ){
			//if ($value !== '' && empty($value) !== true) {
				$inpcount = $inpcount + 1;
				
		   //}
		}
	}
	
	

	
	
	while ($finfo = $schema->fetch_field())
	{ 
		if ($finfo->name !== 'id')
		{
			$fieldName = "inp_".str_replace(" ", "_", $finfo->name);
			$sql .= "`".$finfo->name . "` = ?, ";
			
			if ($_POST[$fieldName] == 'true' || $_POST[$fieldName] == 'false') {
				
				$types .= 'i';              //boolean true or false, pass it like integer
			} 
			elseif (is_numeric($_POST[$fieldName]) && filter_var($_POST[$fieldName], FILTER_VALIDATE_INT)) {
				
				  $types .= 'i';          //integer
			}
			elseif(is_numeric($_POST[$fieldName]) && filter_var($_POST[$fieldName], FILTER_VALIDATE_FLOAT)) {
				 $types .= 'd';              //double
			
			} elseif (is_string($_POST[$fieldName])) {
				$types .= 's';              //string
			} else {
				$types .= 'b';              //blob and unknown
			}
		}
	}
	$types .= 'i';
	//echo $inpcount;
	$sql = substr($sql, 0, -2);
	
	//echo $types;
	
	$sql .= " WHERE id = ?";
	
	$bind_names[] = $types;
	
	//echo $sql;
	$schema = $ms->query($schemaSql);
	//echo $ms->error;
	
	//$sql = "UPDATE `$table` SET ";
	
	while ($finfo = $schema->fetch_field())
	{ 
	
		$fieldName = "inp_".str_replace(" ", "_", $finfo->name);
						
		$pf = $_POST[$fieldName];
		if (get_magic_quotes_gpc){$pf=stripslashes($pf);}
	    //echo $pf;
		if ($finfo->name !== 'id')
		{
			if ($finfo->type == 252) {$pf = cs_clean_content($pf);}
			if (strtolower($pf) === 'true') {$pf = 1;}
			if (strtolower($pf) === 'false') {$pf = 0;}
			$bind_name = 'bind_' . $pf;       //give them an arbitrary name
            $$bind_name = $pf;      //add the parameter to the variable variable
			//echo $pf;
            $bind_names[] = &$$bind_name;
			
		}
	}
	
	//bind id value at end
	$bind_name='bind_id';
	$$bind_name = $_POST["hid_id"];
	$bind_names[] = &$$bind_name;
	
	$stmt = $ms->prepare($sql);
	call_user_func_array(array($stmt,'bind_param'),$bind_names);
	$stmt->execute();
	//echo $stmt;
	//$result = $ms->query($sql);
	
	//if (!$result)
	//{
		//E( $ms->error);
	//}
	
}


function cs_delete($ms)
{
	
	$table = F("hid_table");
	$id = F("hid_id");
	$result = $ms->query("delete from `$table` where id = $id");
	
	echo $id;
	
	
	//echo "delete from `$table` where id = $id";

}

function cs_feature($ms)
{
	
	$table = F("hid_table");
	$value = F("inp_featured");
	//echo $_POST["inp_featured"];
	if ($_POST["inp_featured"] == 'true') {
		//echo $_POST["inp_featured"];
		$value = "true";
	} else { 
		$value = "false"; 
	}
	$id = F("hid_id");
	$sql = "update $table set featured = $value where id = $id";
	//echo $sql;
	$result = $ms->query($sql);
	
	echo $id;
	
	
	//echo "delete from `$table` where id = $id";

}

$referrer="?tbl=".F("hid_table")."&action=list";
$insertid="";

switch (F("hid_action"))
{
	
	case "update":
		
		cs_update($mysqli);
		break;
	
	case "version":
		
		cs_version($mysqli);
		break;
		
	case "insert":
		//	echo "insert";
		$insertid = cs_insert($mysqli);
		break;
	
		
	case "add":
		//	echo "insert";
		$insertid = cs_add($mysqli);
		break;
		
	case "duplicate":
		//	echo "insert";
		$insertid = cs_duplicate($mysqli);
		break;
			
	case "delete":
		
		cs_delete($mysqli);
		break;
	
	case "feature":
		
		cs_feature($mysqli);
		break;
		
	default:  //back to referring page.
		
}

switch (F("mtm_ltable"))
{
		
		case "":
			break;
			
		default:
			//echo "many to many";
			cs_mtm_update($mysqli, $insertid);
			break;
		
		
		
}

function cs_mtm_update($ms, $insertid='')
{
	
	//get scheme for link table

	//echo $insertid;
	$lTable = F("mtm_ltable");
	//echo $lTable;
	
	$fTable = F("mtm_ftable");
	//echo $fTable;
	
	$table = F("hid_table");
	
	$id = (F("hid_id") == "" ? $insertid : F("hid_id"));
	
	//echo $id;
	$sql = "select * from $lTable";
	$schema = $ms->query($sql);
	$finfo0 = $schema->fetch_field();
	$finfo1 = $schema->fetch_field();
	$finfo2 = $schema->fetch_field();
	//echo $table;
	//first delete any relations that aren't there
	
	//loop through health issues
	//echo F("mtm_".$lTable);
	$checklist = $_POST["mtm_".$lTable];
	
	$sql = "delete from ".$lTable." where ".$finfo2->name." = $id;";
	$result = $ms->query($sql);
//	
	
	// existing links are gone... now insert good ones
	$sql = "insert into $lTable(".$finfo1->name.", ".$finfo2->name.") values ";
	
	$x = 1;
	$y = count($checklist);
	if ($y > 0) {
	if ($checklist) {
//		
		foreach ($checklist as $check) {
			//echo $check . " " . $id;
			 $sql.="(".$check.", ".$id.")";
			 
			 if ($x !== $y) { $sql .= ","; } else {$sql .= ";"; }
			$x++;
			//echo $check;
//		
		}
//	
	}
	//echo $sql;
	$result = $ms->query($sql);
	}
	if (!$result)
	{
		E( $ms->error);
	}
}


if ($_FILES) {
	
	$table=F("hid_table");
	$id=F("hid_id");
	$field=str_replace(" ", "_", F("hid_field"));
	
	$uploaddir = "../".CS_SITEPATH."/images/user/";
	$uploadfile = $uploaddir . basename($_FILES['inp_'.$field]['name']);
	//echo $uploadfile;
	$filename = basename($_FILES['inp_'.$field]['name']);
	//echo $filename;
	$sql = "update $table set `".F("hid_field")."` = '$filename' where id = $id";
	
	if (move_uploaded_file($_FILES['inp_'.$field]['tmp_name'], $uploadfile)) {
	   
	   $result = $mysqli->query($sql);
	   
	   if ($mysqli->error)
	   {
			E($mysqli->error);
		}
	   
	} else {
	
		E ("File could not be uploaded, not sure why. Probably try a smaller file.");
		
	}
	
	$referrer = "?tbl=$table&id=$id";
	
}

if ($_POST["hid_notify"] == "yes"){
	//send email to site contact email for notification
	
	//include_once('sendmail.php');
	
	
	
}
if ($_POST["hid_send_email"] == "1") { 

//echo "yup";

	//include ("senddataemail.php"); 

}


if (isset($_POST["hid_referrer"])){
	
	
	if ($_POST["hid_referrer"] !== "ajax")
	{
	//echo $_POST["hid_referrer"];	
	$referrer = $_POST["hid_referrer"];
	//echo $referrer;
	 
	if (isset($_POST["hid_frontend"])) { 
	//echo "hello frontend";
		Header ("Location: ../index.php" . $referrer);
	} else {
		Header("Location: ../cs-admin/index.php" . $referrer);
	}
	}
	else
	{
		echo $insertid;
	}
	//echo $referrer;
	
}
else
{



if ((F("hid_action") !== "delete" && F("hid_action") !== "feature") && $referrer !== "") {
Header("Location: ../cs-admin/index.php".$referrer);
}
}



?>