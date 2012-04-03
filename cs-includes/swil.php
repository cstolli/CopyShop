<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//SWIL (Structured Website Interface Language) controller for CopyShop

//some basic security checking... only allows requests by PHP app

include ('constants.php');
include ('functions.php');
include ('connect.php');

$pl = new Inflect();

checkSecurity();

$fields = array();

$words = preg_split("/[\s,]*\\\"([^\\\"]+)\\\"[\s,]*|" . "[\s,]*'([^']+)'[\s,]*|" . "[\s,]+/", urldecode($_POST["swil"]), 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
//$msg = "do you want to ";

//get all table names from db   (these are available models)
$models = array();
$blocked = array("user", "option", "contact info", "upload", "page element", "menu item", "menu");

$tables = $mysqli->query("show tables from " . CS_DBNAME);

while ($table = $tables->fetch_array())
{
	$thing = cs_table($pl->singularize($table[0]));
	
	if (!in_array($thing, $blocked)){$models[] = $thing; }
	
	//echo $thing;
	
}

//if (count($words) < 1) { die ('bad SWIL, expects at least 3 words: action, type, item'); }

foreach ($words as $key => $word) {
	//echo $word;
    
	switch ($key) {
		case 0: // must be from list of first words: add, hide, more to come
	
			switch ($word) {
				
			
				case "add":
					//echo $word;
					// do an insert into something
					//$stmtSql = "insert into ? ";
					$msg .= "add ";
					
					break;
					
				case "hide":
					$stmtSql = "update ? set print = false where name = ?";
					break;
	
				case "show":
					$stmtSql = "update ? set print = false where name = ?";
					break;
					
				default:
					die ('bad SWIL, first word is not an action: add, hide, show');
				
			}
	
			$values["hid_action"] = $word;
			break;
	
		case 1: 
			
			if (in_array($word, $models)){ $values["hid_table"] = cs_table_name($pl->pluralize($word)); } else { $values["error"] = 'bad SWIL, second word was not a thing:'. implode(", ", $models); $values["status"]="fail"; }
			$sql = "SHOW COLUMNS from ".$values["hid_table"];
			$result = $mysqli->query($sql);
			$result->data_seek(1);
			$field = $result->fetch_array();
			$namefield = "inp_".str_replace(" ", "_", $field[0]);
			$values["namefield"]=$namefield;
			$result->data_seek(2);
			while ($field=$result->fetch_array()) { $fields[] = $field[0]; }
			//echo count($fields);
			break;
		
		case 2: 
			
			// this is the item name or label or first field no restrictions here other than sanitizing it, no HTML, etc
			$values[$namefield] = sterilize($word);
			break;
		
		default:
			// all the other fields
			
			for ($x = 0; $x < count($words)-3; $x++) {
				
				$values["inp_".str_replace(" ", "_", $fields[$x])] = sterilize($word);
			}
			
	}
	
}

//echo $stmtSql;
//echo $msg;
//$values["hid_action"] = "add";
$values["hid_referrer"] = "ajax";
//$values["hid_table"]=$values["model"];
echo json_encode($values);
		