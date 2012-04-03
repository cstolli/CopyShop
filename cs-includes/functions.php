<?

class cs_info{
	
	private $mysqli;
	public $contact;
	
	function __construct($ms){
		//echo $ms;
		$this->mysqli = $ms;
		$this->contact_info = $this->contact();
	}
	
	function contact(){
		
		$sql = "select * from cs_contact_info order by id desc limit 1";
		return ($this->mysqli->query($sql)->fetch_assoc());
		
	}
	
	
	
	function __destruct(){
	
	}
	
}

class cs_copy{
	
	private $mysqli;
	private $id;
	public $copy;
	
	function __construct($ms, $id=""){
		//echo $ms;
		$this->mysqli = $ms;
		$this->id = $id;
		$this->copy = $this->copy_info();
	}
	
	function copy_info(){
		
		$sql = "select * from cs_copy where id = " . $this->id;
		return ($this->mysqli->query($sql)->fetch_object());
		
	}
	
	
	
	function __destruct(){
	
	}
	
}

function cs_clean_content($str){
	
	
	
	$str = str_replace("&nbsp;", " ", $str);
	//return htmlspecialchars_decode(($str));
	return $str;
	
}


function cs_info_tags(){

	//[cs_info]phone[/cs_info]

}

function w($a = '')
{
    if (empty($a)) return array();
   
    return explode(' ', $a);
}

function _browser($a_browser = false, $a_version = false, $name = false)
{
    $browser_list = 'msie firefox konqueror safari netscape navigator opera mosaic lynx amaya omniweb chrome avant camino flock seamonkey aol mozilla gecko';
    $user_browser = strtolower($_SERVER['HTTP_USER_AGENT']);
    $this_version = $this_browser = '';
   
    $browser_limit = strlen($user_browser);
    foreach (w($browser_list) as $row)
    {
        $row = ($a_browser !== false) ? $a_browser : $row;
        $n = stristr($user_browser, $row);
        if (!$n || !empty($this_browser)) continue;
       
        $this_browser = $row;
        $j = strpos($user_browser, $row) + strlen($row) + 1;
        for (; $j <= $browser_limit; $j++)
        {
            $s = trim(substr($user_browser, $j, 1));
            $this_version .= $s;
           
            if ($s === '') break;
        }
    }
   
    if ($a_browser !== false)
    {
        $ret = false;
        if (strtolower($a_browser) == $this_browser)
        {
            $ret = true;
           
            if ($a_version !== false && !empty($this_version))
            {
                $a_sign = explode(' ', $a_version);
                if (version_compare($this_version, $a_sign[1], $a_sign[0]) === false)
                {
                    $ret = false;
                }
            }
        }
       
        return $ret;
    }
   
    //
    $this_platform = '';
    if (strpos($user_browser, 'linux'))
    {
        $this_platform = 'linux';
    }
    elseif (strpos($user_browser, 'macintosh') || strpos($user_browser, 'mac platform x'))
    {
        $this_platform = 'mac';
    }
    else if (strpos($user_browser, 'windows') || strpos($user_browser, 'win32'))
    {
        $this_platform = 'windows';
    }
   
    if ($name !== false)
    {
        return $this_browser . ' ' . $this_version;
    }
   
   
   
    return array(
        "browser"      => $this_browser,
        "version"      => $this_version,
        "platform"     => $this_platform,
        "useragent"    => $user_browser
    );
}

function trunc($phrase, $max_words)
 {
   $phrase_array = explode(' ',$phrase);
   if(count($phrase_array) > $max_words && $max_words > 0){
	  $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...'  ;
   }
	return $phrase;
}

function shorten_string($string, $wordsreturned)
/*  Returns the first $wordsreturned out of $string.  If string
contains fewer words than $wordsreturned, the entire string
is returned.
*/
{
$retval = $string;	//	Just in case of a problem
$array = explode(" ", $string);
if (count($array)<=$wordsreturned)
/*  Already short enough, return the whole thing
*/
{
$retval = $string;
}
else
/*  Need to chop of some words
*/
{
array_splice($array, $wordsreturned);
$retval = implode(" ", $array);
}
return $retval;
}

function end_of_string($string)
/*  Returns the first $wordsreturned out of $string.  If string
contains fewer words than $wordsreturned, the entire string
is returned.
*/
{
$retval = $string;	//	Just in case of a problem

$mirror_array = explode(' ', $string);
$mirror_num = count($mirror_array);
$n =$mirror_num -1;
$m = $mirror_num - 2;
$lastwords = $mirror_array[$m] . " " . $mirror_array[$n]; 

return $lastwords;
}

class Inflect
{
    static $plural = array(
        '/(quiz)$/i'               => '$1zes',
        '/^(ox)$/i'                => '$1en',
        '/([m|l])ouse$/i'          => '$1ice',
        '/(matr|vert|ind)ix|ex$/i' => '$1ices',
        '/(x|ch|ss|sh)$/i'         => '$1es',
        '/([^aeiouy]|qu)y$/i'      => '$1ies',
        '/(hive)$/i'               => '$1s',
        '/(?:([^f])fe|([lr])f)$/i' => '$1$2ves',
        '/(shea|lea|loa|thie)f$/i' => '$1ves',
        '/sis$/i'                  => 'ses',
        '/([ti])um$/i'             => '$1a',
        '/(tomat|potat|ech|her|vet)o$/i'=> '$1oes',
        '/(bu)s$/i'                => '$1ses',
        '/(alias)$/i'              => '$1es',
        '/(octop)us$/i'            => '$1i',
        '/(ax|test)is$/i'          => '$1es',
        '/(us)$/i'                 => '$1es',
        '/s$/i'                    => 's',
        '/$/'                      => 's'
    );

    static $singular = array(
        '/(quiz)zes$/i'             => '$1',
        '/(matr)ices$/i'            => '$1ix',
        '/(vert|ind)ices$/i'        => '$1ex',
        '/^(ox)en$/i'               => '$1',
        '/(alias)es$/i'             => '$1',
        '/(octop|vir)i$/i'          => '$1us',
        '/(cris|ax|test)es$/i'      => '$1is',
        '/(shoe)s$/i'               => '$1',
        '/(o)es$/i'                 => '$1',
        '/(bus)es$/i'               => '$1',
        '/([m|l])ice$/i'            => '$1ouse',
        '/(x|ch|ss|sh)es$/i'        => '$1',
        '/(m)ovies$/i'              => '$1ovie',
        '/(s)eries$/i'              => '$1eries',
        '/([^aeiouy]|qu)ies$/i'     => '$1y',
        '/([lr])ves$/i'             => '$1f',
        '/(tive)s$/i'               => '$1',
        '/(hive)s$/i'               => '$1',
        '/(li|wi|kni)ves$/i'        => '$1fe',
        '/(shea|loa|lea|thie)ves$/i'=> '$1f',
        '/(^analy)ses$/i'           => '$1sis',
        '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i'  => '$1$2sis',
        '/([ti])a$/i'               => '$1um',
        '/(n)ews$/i'                => '$1ews',
        '/(h|bl)ouses$/i'           => '$1ouse',
        '/(corpse)s$/i'             => '$1',
        '/(us)es$/i'                => '$1',
        '/s$/i'                     => ''
    );

    static $irregular = array(
        'move'   => 'moves',
        'foot'   => 'feet',
        'goose'  => 'geese',
        'sex'    => 'sexes',
        'child'  => 'children',
        'man'    => 'men',
        'tooth'  => 'teeth',
        'person' => 'people',
	   	'press'  => 'press',
	   	'menus'  => 'menu'
    );

    static $uncountable = array(
        'sheep',
        'fish',
        'deer',
        'series',
        'species',
        'money',
        'rice',
        'information',
        'equipment',
	   	'press',
		'copy',
		
    );

    public static function pluralize( $string )
    {
        // save some time in the case that singular and plural are the same
        if ( in_array( strtolower( $string ), self::$uncountable ) )
            return $string;

        // check for irregular singular forms
        foreach ( self::$irregular as $pattern => $result )
        {
            $pattern = '/' . $pattern . '$/i';

            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string);
        }

        // check for matches using regular expressions
        foreach ( self::$plural as $pattern => $result )
        {
            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string );
        }

        return $string;
    }

    public static function singularize( $string )
    {
        // save some time in the case that singular and plural are the same
        if ( in_array( strtolower( $string ), self::$uncountable ) )
            return $string;

        // check for irregular plural forms
        foreach ( self::$irregular as $result => $pattern )
        {
            $pattern = '/' . $pattern . '$/i';

            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string);
        }

        // check for matches using regular expressions
        foreach ( self::$singular as $pattern => $result )
        {
            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string );
        }

        return $string;
    }

    public static function pluralize_if($count, $string)
    {
        if ($count == 1)
            return "1 $string";
        else
            return $count . " " . self::pluralize($string);
    }
}




function E($error)
{

	echo $error;

}


function Q($param)
{
	if (isset($_REQUEST[$param]))
	{
		return $_REQUEST[$param];
	}
	else
	{
		return "";
	}

}


function F($param)
{
	
	if (isset($_POST[$param]))
	{
		return $_POST[$param];
	}
	else
	{
		return false;
	}

}

function cs_get_copy($ms, $label='', $cat=''){

	$sql = "select * from cs_copy";
	if ($label) { $sql.= " where label = '$label'"; }
	if ($cat) { $sql.= " where category = " . cs_get_cat_id($ms, 'cs_copy_categories', $cat); }
	//echo $sql;
	$result = $ms->query($sql);

	//echo $copy["label"];
	if ($result && $result->num_rows !== 0)
	{
		if ($cat){
			return $result->fetch_assoc();
		}
		else
		{
			//echo $copy["label"];
			$val = $result->fetch_assoc();
				
			return '<p class="'.str_replace(" ", "-", $label).'">'.$val["content"]."</p>";
		}
	}
	else
	{
		return false;
	}

}

function cs_get_galleries($ms, $qty, $cat=""){
	
	$sql = "select * from cs_galleries order by id desc limit $qty";
	$albums = $ms->query($sql);
	if ($albums)
	{
		return $albums;
	}
	else
	{
		return false;
	}
}
	

function cs_checked_tag($value, $comp)
{

	if ($value == $comp) {
	
		$checked = "checked=\"checked\"";
	}	
	else
	{	
		$checked = "";
	}
	
	return $checked;
	
}



function cs_text_field($field, $data)
{

	if ($field->length > 100) {
		$fieldLength = $field->length / 3;
	}
	else {
		$fieldLength = $field->length;
	}
	
	if ($field->flags & 1) {$require="required";} else {$require="";}
	
	$fieldName = str_replace(" ", "_", $field->name);
	
	$textField = "<input type=\"text\" $require";
	$textField .= " class=\"cs_text_input $class\"";
	$textField .= " name=\"inp_".$fieldName."\""; 
	$textField .= " id=\"inp_".$fieldName."\"";
	$textField .= " size=\"".$fieldLength."\" maxlength=\"".$field->length."\"";
	$textField .= " value=\"".$data."\">";
	
	return $textField;
//
//  $MakeTextField=$GetInputDiv[$xTextField];
//
//  return $function_ret;
} 

function cs_file_field($field)
{

	$fieldName = str_replace(" ", "_", $field->name);
	$table = $field->table;

	//$uploadField .= "<form style=\"border:solid 1px black; float:left; width:200px; height:50px;\" enctype=\"multipart/form-data\" action=\"/cs-includes/upload.php\" method=\"post\">";	
	$uploadField .= "<input type=\"file\"";
	$uploadField .= " class=\"cs_file_input\"";
	$uploadField .= " type=\"image\"";
	$uploadField .= " name=\"inp_".$fieldName."\""; 
	$uploadField .= " id=\"inp_".$fieldName."\">";
	$uploadField .= cs_hidden_field("hid_field", $field->name);
	//$uploadField .= "<input type=\"submit\" value=\"go\" onclick=\"document.forms[0].enctype='multipart/form-data';\">";
	//$uploadField .= " </form>";
	
	return $uploadField;
//
//  $MakeTextField=$GetInputDiv[$xTextField];
//
//  return $function_ret;
} 

function cs_text_area($field, $value)
{
	
	$fieldName = str_replace(" ", "_", $field->name);
	
	$textField .= "<textarea type=\"text\"";
	$textField .= " class=\"cs_text_area ckeditor\"";
	$textField .= " name=\"inp_".$fieldName."\""; 
	$textField .= " id=\"inp_".$fieldName."\"";
	$textField .= " cols=\"50\" rows=\"10\">".htmlspecialchars($value)."</textarea>";
	
	return $textField;
//
//  $MakeTextField=$GetInputDiv[$xTextField];
//
//  return $function_ret;
} 

function cs_yui_text_area($field, $value)
{
	
	$fieldName = str_replace(" ", "_", $field->name);
	
	$textField .= "<div ";
	$textField .= " class=\"cs_text_input editable\"";
	$textField .= " name=\"inp_".$fieldName."\""; 
	$textField .= " id=\"inp_".$fieldName."\"";
	$textField .= " cols=\"50\" rows=\"10\">".$value."</div>";
	
	return $textField;
//
//  $MakeTextField=$GetInputDiv[$xTextField];
//
//  return $function_ret;
} 

function cs_text_label($field)
{

	$fieldName = str_replace(" ", "_", $field->name);
	$fieldLabel = "<label for=\"inp_".$fieldNamee."\"";
	$fieldLabel .= " class=\"cs_text_label\"";
	$fieldLabel .= " id=\"label_".$fieldName."\"";
	$fieldLabel .= ">".$field->name."</label>";
	
	return $fieldLabel;
	
}

function cs_radio($field, $labels, $actions="", $checked=0)
{

	$labelArray = explode(",", $labels);
	$x = 0;

	$radio .= "<div class=\"cs_radio\">";

	
	foreach ($labelArray as $value)
	{
	
		$radio .= "<input class=\"cs_radio\" onclick=\"\" type=\"radio\"";
		$radio .= " name=\"inp_".$field->name."\"";
		
		if ($checked == 1) {
			
			if ($x == 0) { 
				$radio .= " checked=\"checked\"";

			}
		}
		else
		{					
			if ($value == $field->value)
			{
				
				$radio.= " checked=\"checked\"";
			
			}
				
		}
		$radio .= " id=\"cs_radio_".$field->name."_yes\" value=\"$value\">".$value."</input>";

		
		$x = $x + 1;
	}
	
	$radio .= "</div>";
	
	unset ($value);
	

	
	return $radio;

}

function cs_yes_no($field, $data)
{
	

	if (Q("id") == ""){
		$yes = "";
		$no = "checked=\"checked\"";
	}
	else
	{	
		$no = cs_checked_tag($data, false);
		$yes = cs_checked_tag($data, true);
	}
	
		
	$yesNo .= "<div class=\"cs_yes_no\">";
	$yesNo .= "<input class=\"cs_radio_yes\" type=\"radio\" name=\"inp_".$field->name."\" id=\"cs_radio_".$field->name."_yes\" value=\"true\" ".$yes." />";
	$yesNo .= "Yes";
	$yesNo .= "<input class=\"cs_radio_no\" type=\"radio\" name=\"inp_".$field->name."\" id=\"cs_radio_".$field->name."_no\" value=\"false\" ".$no." />";
	$yesNo .= "No";
	$yesNo .= "</div>";
	
	return $yesNo;

}

function cs_delete_button_form($id, $table="")
{
	if( $table == "" ) { $table = Q("tbl");}
	$deleteButton = '';
	$deleteButton .= "<form title=\"Delete Item\"  onsubmit=\"return confirmDelete(this)\" action=\"../cs-includes/db.php\"";
	$deleteButton .= " method=\"post\" id=\"cs_delete_form_$id\" name=\"cs_delete_form_$id\" class=\"cs_button_form delete\" >";
	$deleteButton .= " <input type=\"submit\" class=\"cs_edit_row_delete\" value=\"X\" />";
	$deleteButton .= " <input type=\"hidden\" name=\"hid_id\" value=\"$id\" />";
	$deleteButton .= " <input type=\"hidden\" name=\"hid_action\" value=\"delete\" />";
	$deleteButton .= " <input type=\"hidden\" name=\"hid_table\" value=\"$table\" />";
	$deleteButton .= "</form>";
	
	return $deleteButton;
}

function cs_feature_button_form($id, $table="", $featured)
{
	//echo $featured;
	if ($featured) {$checked = "checked=\"checked\"";} else {$checked = "";}
	
	if( $table == "" ) { $table = Q("tbl");}
	$deleteButton = '';
	$deleteButton .= "<form title=\"Feature Item\"  onsubmit=\"\" action=\"../cs-includes/db.php\" onclick=\"confirmFeature(document.getElementById('cs_feature_form_$id'))\"";
	$deleteButton .= " method=\"post\" id=\"cs_feature_form_$id\" name=\"cs_feature_form_$id\" class=\"cs_button_form feature\" >";
	$deleteButton .= " <input type=\"checkbox\" class=\"cs_edit_row_feature\" $checked name=\"inp_featured\" onclick=\"return false;\" id=\"inp_featured_$id\" value=\"true\" /><label id=\"cs_feature_label_$id\ class=\"cs_feature_label label small\">Featured</label>";
	$deleteButton .= " <input type=\"hidden\" name=\"hid_id\" value=\"$id\" />";
	$deleteButton .= " <input type=\"hidden\" name=\"hid_action\" value=\"feature\" />";
	$deleteButton .= " <input type=\"hidden\" name=\"hid_table\" value=\"$table\" />";
	
	$deleteButton .= "</form>";
	
	return $deleteButton;
}

function cs_upload_name_form($id, $table="", $filename)
{
	
	
	if( $table == "" ) { $table = Q("tbl");}
	$deleteButton = '';
	$deleteButton .= "<form title=\"Update Name\"  onsubmit=\"\" action=\"../cs-includes/db.php\" onclick=\"confirmRename(document.getElementById('cs_upload_name_form_$id'))\"";
	$deleteButton .= " method=\"post\" id=\"cs_upload_name_form_$id\" name=\"cs_upload_name_form_$id\" class=\"cs_rename_form upload\" >";
	$deleteButton .= " <input type=\"text\" class=\"cs_edit_row_upload_name\"  name=\"inp_upload_name\" onclick=\"this.focus()\" id=\"inp_upload_name_$id\" value=\"$filename\" /><input type=\"submit\" class=\"cs_edit_row_upload_name_submit\"  name=\"inp_upload_name_submit\" onclick=\"return false;\" id=\"inp_upload_name_submit_$id\" value=\"->\" />";
	$deleteButton .= " <input type=\"hidden\" name=\"hid_id\" value=\"$id\" />";
	$deleteButton .= " <input type=\"hidden\" name=\"hid_action\" value=\"rename\" />";
	$deleteButton .= " <input type=\"hidden\" name=\"hid_table\" value=\"$table\" />";
	
	$deleteButton .= "</form>";
	
	return $deleteButton;
}

function cs_duplicate_button_form($id, $table="")
{
	if( $table == "" ) { $table = Q("tbl");}
	$duplicateButton = '';
	$duplicateButton .= "<form title=\"Duplicate Item\" onsubmit=\"return confirmDuplicate(this)\" action=\"../cs-includes/db.php\"";
	$duplicateButton .= " method=\"post\" id=\"cs_duplicate_form_$id\" name=\"cs_duplicate_form_$id\" class=\"cs_button_form duplicate\" >";
	$duplicateButton .= " <input type=\"submit\" class=\"cs_edit_row_delete\" value=\"*\" />";
	$duplicateButton .= " <input type=\"hidden\" name=\"hid_id\" value=\"$id\" />";
	$duplicateButton .= " <input type=\"hidden\" name=\"hid_action\" value=\"duplicate\" />";
	$duplicateButton .= " <input type=\"hidden\" name=\"hid_table\" value=\"$table\" />";
	$duplicateButton .= "</form>";
	
	return $duplicateButton;
}

function cs_edit_row($row, $bgcolor, $table="")
{
	
	if( $table == "" ) { $table = Q("tbl");}
	$editRow = '';
	
	$editRow .= "<div id=\"cs_data_div_".$row[0]."\" class=\"cs_edit_row bg$bgcolor\">";
	//$editRow .= "<input type=\"checkbox\" class=\"cs_edit_row_delete_check\" name=\"chk_del_".$row[0]."\" id=\"chk_del_".$row[0]."\">";
	$editRow .= "<a href=\"?tbl=".$table."&action=form&id=".$row[0]."\" class=\"cs_edit_row_title\">".$row[1]."</a>";
	//$editRow .= "<a href=\"?tbl=".Q("tbl")."&action=form&id=".$row[0]."\" class=\"cs_edit_row_author\">Edit</a>";
	$editRow .= cs_duplicate_button_form($row[0], $table);
	$editRow .= cs_delete_button_form($row[0], $table);
	$editRow .= "</div>";
	
	return $editRow;

}

function cs_image_field($field, $value)
{

	$imageField .= cs_text_label($field);
	$imageField .= cs_text_field($field, $value);
	$imageField .= cs_file_field($field);
	
	
	return $imageField;

}

function cs_formatted_table_name($table)
{
	//echo $table;
	return trim(ucwords(str_replace("cs", "", str_replace("_", " ", $table))));
	
}

function cs_table_name($table)
{

	return trim(strtolower("cs_".str_replace(" ", "_", $table)));
	
}

function cs_table($table="")
{

	//echo $table;
	
	if ($table=="" || is_null($table)){

	return trim(strtolower(str_replace("_", " ", str_replace("cs_", "", Q("tbl")))));
	
	}
	else
	{
	
	return trim(strtolower(str_replace("_", " ", str_replace("cs_", "", $table))));
	}
}

/* cart functions */

function cs_cart_exists($ms){
	
	$sql = "select * from cs_cart where session = '". session_id() . "' limit 1";
	$cartcheck = $ms->query($sql);
	
	if ($cartcheck->num_rows > 0) {
		
		return true;
	}
	else
	{
		return false;
	}
}
function cs_cart_options($ms){
	
	$sql = "select * from cs_cart_options";
	$result = $ms->query($sql);
	return $result->fetch_array(MYSQLI_BOTH);
	
}

function cs_cart_zones($ms){
	
	$sql = "select * from cs_cart_zones order by number asc";
	$result = $ms->query($sql);
	return $result->fetch_array(MYSQLI_BOTH);
	
}

function cs_cart_states($ms){
	
	$sql = "select * from cs_cart_states order by state asc";
	$result = $ms->query($sql);
	//$st = $result->fetch_assoc();
	//echo $st["abbreviation"];
	return $result;
	
}



function cs_get_ship_rate($ms, $state, $qty){

	$sql = "select * from cs_cart_zones where number = " .$state["zone"];
	
	try{
	
	$zone = $ms->query($sql)->fetch_assoc();
	//echo $zone["number"];
	//echo $qty;
	//echo $zone["number"];
		//determine breakdown of cases
		//check for 12's 
		$x = $qty / 12;
		//echo $x;
		if ($x >= 1) { //twelve or more
			$rate = $zone["12pack"];
			if ($x ==2){ // it's exactly 24 cases
				$rate += $zone["12pack"];
			}
			else
			{
				$leftover = $qty % 12;
				switch ($leftover){
					
					case ($leftover <= 3):
						$rate += $zone["3pack"];
						break;
					
					case ($leftover <= 6):
						$rate += $zone["6pack"];
						break;
					
					case ($leftover <= 12):
						$rate += $zone["12pack"];
						break;
				}
			}
		}
		else
		{
			switch ($qty){
				
				case ($qty <= 3):
					$rate += $zone["3pack"];
					
					break;
				
				case ($qty <= 6):
					$rate += $zone["6pack"];
					break;
					
				case ($qty <= 12):
					$rate += $zone["12pack"];
					
					break;
				
			}
			
		}
		
	}
	catch(Exception $e)
	{
	$rate = false;
	}
	return $rate;
}


function cs_get_ship_state($ms, $st){


$sql = "select * from cs_cart_states where abbreviation = '$st'";

try {
$state = $ms->query($sql)->fetch_assoc();
}
catch(Exception $e){
	$state = false;
}
//echo $state["abbreviation"];
return $state;
}

function cs_cart_info($mysqli){
	
	$sql = "select id, quantity, `item id`, price, description, shipstate, SUM(price * quantity) as total, SUM(quantity) as qty from cs_cart where session = '" . session_id() . "' order by id asc"; 
	
	
	
	$cart = $mysqli->query($sql);
	$item = $cart->fetch_assoc();
	//echo $item["shipstate"];
	$options = cs_cart_options($mysqli);
	
	$totalamount = $item["total"];
	$tax = $totalamount * ($options["sales tax"] / 100);
	$shipping = cs_get_ship_rate($mysqli, cs_get_ship_state($mysqli, $item["shipstate"]), $item["qty"]);
	
	$cartinfo = array (
		
		"tax"			=>	$tax,
		"producttotal"	=> 	$totalamount,
		"shipping"		=>	$shipping,
		"grandtotal"	=>	$tax + $totalamount + $shipping,
		"state"			=>	$item["shipstate"]
	);
	
	return $cartinfo;
}



function cs_email_receipt($ms, $orderid){
	
	
	$sql = "select * from cs_cart_orders left join cs_cart on cs_cart_orders.id = `order id` where cs_cart_orders.id = $orderid";
	
	$order = $ms->query($sql);
	
	$options = cs_cart_options($ms);
	ob_start();
	
?>

<p>Thank you for your order.  Below is an email receipt of your order, including order contents, shipping, and payment information. If you have any questions about your order, please feel free to contact us at 1-888-800-2680.
</p>
<table id="cs_order" class="cs_cart" width="470" border="0" cellpadding="4" cellspacing="0">
<thead>
  <tr>
    <th width="364" align="left" bgcolor="tan" scope="col">Description</th>
    <th width="35" bgcolor="tan" scope="col">Qty</th>
    <th width="47" align="right" style="font-weight:bold" bgcolor="tan" scope="col">Price</th>
  </tr>
 </thead>
 <tbody>
<?


while ($item = $order->fetch_assoc()) {


		cs_receipt_row($item);
		
	}

	
	$order->data_seek(0);
		$item=$order->fetch_assoc();
	$tax = $item["total"] * ($options["sales tax"] / 100)
	
?>

 </tbody>
 <tfoot>
  <tr>
    <td colspan="2" align="right" bgcolor="#F5F4E2">Subtotal:</td>
    <td class="cart_price total" bgcolor="#F5F4E2">$<?=number_format((double)$item["total"], 2);?></td>
  </tr>
  <tr>
  <td colspan="2" align="right" bgcolor="#EBE8C5">Tax:</td>
    <td class="cart_price" bgcolor="#EBE8C5">$<?=number_format((double)$tax, 2)?></td>
  </tr>
  <? 
  
?>
   <tr  id="cart_shipping">
 <td  colspan="2" align="right" bgcolor="#EBE8C5">Shipping to <?=$item["state"];?>:</td>
    <td class="cart_price" id="cart_shipping_amount" bgcolor="#EBE8C5">$<?=number_format((double)$item["shipping"], 2); ?></td>
  </tr>
 
  <tr>
    <td colspan="2" align="right" bgcolor="#E3DFB0">Total:</td>
    <td class="cart_price subtotal" bgcolor="#E3DFB0">$<?=number_format((double)$item["total"] + $tax + $item["shipping"], 2);?></td>
  </tr>

  </tfoot>
</table>
<div class="shipping_info" id="shipping_info">
    <h3 style="margin:12px 0 0 0;">Shipping Information:</h3>
<?=$item["name"]?>          <br />
<?=$item["email"]?> <br />
          <?=$item["address"] . " " .$item["address2"];?><br />
          <?=$item["city"]?>, <?=$item["state"]?> <?=$item["zip"]?>
</div>
<div class="shipping_info" id="shipping_info2">
     <h3 style="margin:12px 0 0 0;">Payment  Information:</h3>
     	Payment approved <?=date('m/d/y', strtotime($item["order date"]));?><br />


          <?=$item["card type"]?> ending in <?=$item["card"]?>
    
</div>
<p>
     <?
	
	$receipt=ob_get_contents();
	ob_end_clean();
	return $receipt;
//

}

function cs_receipt($ms, $orderid){
	
	
	$sql = "select * from cs_cart_orders inner join cs_cart on cs_cart_orders.id = `order id` where cs_cart_orders.id = $orderid";
	
	$order = $ms->query($sql);
	$options = cs_cart_options($ms);
	//ob_start();
	
?>

<table id="cs_order" class="cs_cart" width="470" border="0" cellpadding="4" cellspacing="0">
<thead>
  <tr>
    <th width="364" align="left"  scope="col">Description</th>
    <th width="35"  scope="col">Qty</th>
    <th width="47" align="right" style="font-weight:bold" scope="col">Price</th>
  </tr>
 </thead>
 <tbody>
<?


while ($item = $order->fetch_assoc()) {


		cs_cart_row($item);
		
	}

	
	$order->data_seek(0);
		$item=$order->fetch_assoc();
		//$rate = cs_get_shipping($ms, $total);
	
	$tax =  $item["total"] * ($options["sales tax"] / 100)
?>

 </tbody>
 <tfoot>
  <tr id="subtotal">
    <td colspan="2" align="right" >Subtotal:</td>
    <td class="cart_price total" >$<?=number_format((double)$item["total"], 2);?></td>
  </tr>
  <tr id="tax">
  <td colspan="2" align="right" >Tax:</td>
    <td class="cart_price">$<?=number_format((double)$tax, 2)?></td>
  </tr>
  <? 
  
?>
   <tr  id="cart_shipping">
 <td  colspan="2" align="right">Shipping to <?=$item["state"];?>:</td>
    <td class="cart_price" id="cart_shipping_amount" >$<?=number_format((double)$item["shipping"], 2); ?></td>
  </tr>
 
  <tr id="total">
    <td colspan="2" align="right" >Total:</td>
    <td class="cart_price subtotal">$<?=number_format((double)$item["amount"], 2);?></td>
  </tr>

  </tfoot>
</table>
<div class="instructions" id="shipping_info" style="margin: 6px auto 0pt; float:left; padding:8px; background: rgb(243, 234, 223) none repeat scroll 0% 0%;   -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;">
    <h3 style="margin-top:0">Shipping Information:</h3><br />
<?=$item["name"]?>          <br />
          <?=$item["address"] . " " .$item["address2"];?><br />
          <?=$item["city"]?>, <?=$item["state"]?> <?=$item["zip"]?>
</div><br />
<div class="instructions" id="payment_info" style="margin: 10px auto 0pt; padding:8px; background: rgb(243, 234, 223) none repeat scroll 0% 0%;  -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;">
     <h3 style="margin-top:0">Payment  Information:</h3><br />
     	Payment approved <?=date('m/d/y')?><br />

        <?=$item["card type"]?> ending in <?=$item["card"]?>
    
</div>
<p>
     <?
	
	//$receipt=ob_get_contents();
	//ob_end_clean();
	//return $receipt;
//

}


function cs_cart($ms){
	
	
	$sql = "select id, quantity, `item id`, price, description, shipstate from cs_cart where session = '" . session_id() . "' order by id asc";
	$cart = $ms->query($sql);
	$options = cs_cart_options($ms);
	
	
	
	if ($cart->num_rows > 0 ) {

?>
 </p>
<?php /*?><form class="cs_cart" name="cs_cart_form" id="cs_cart_form" action="uc.php" onsubmit="updatecart(this); return false;" accept-charset="utf-8"><?php */?>
     <table class="cs_cart" width="" border="0" cellpadding="4" cellspacing="0">
<thead>
  <tr>
    <th class="desc" width="364" align="left" bgcolor="tan" scope="col">Description</th>
    <th class="qty" width="35" bgcolor="tan" scope="col">Qty</th>
    <th class="price" width="47" align="right" style="font-weight:bold" bgcolor="tan" scope="col">Price</th>
  </tr>
 </thead>
 <tbody>
<?
$x = 1;

while ($item = $cart->fetch_assoc()) {


		cs_cart_row($item);
		$total += $item["quantity"] * $item["price"];
		$totalqty += $item["quantity"];
	}

	$tax = $total * ($options["sales tax"] / 100);
	
	
	
?>

 </tbody>
 <tfoot>
  <tr>
    <td colspan="2" align="right" bgcolor="#F5F4E2">Subtotal:</td>
    <td class="cart_price total" bgcolor="#F5F4E2">$<?=number_format($total, 2);?></td>
  </tr>
  <tr>
  <td colspan="2" align="right" bgcolor="#EBE8C5">Tax:</td>
    <td class="cart_price" bgcolor="#EBE8C5">$<?=number_format($tax, 2)?></td>
  </tr>
  <? $cart->data_seek(0);
		$item=$cart->fetch_assoc();
  if ($item["shipstate"] !== '') 
	{
		
		$state = cs_get_ship_state($ms, $item["shipstate"]);
		
		$rate = cs_get_ship_rate($ms, $state, $totalqty); 
		//echo $item["qty"];
?>
   <tr  id="cart_shipping">
 <td  colspan="2" align="right" bgcolor="#EBE8C5">Shipping to <?=$state["state"];?>:</td>
    <td class="cart_price" id="cart_shipping_amount" bgcolor="#EBE8C5">$<?=number_format($rate, 2); ?></td>
  </tr>
  <? } ?>
  <tr>
    <td colspan="2" align="right" bgcolor="#E3DFB0">Total:</td>
    <td class="cart_price subtotal" bgcolor="#E3DFB0">$<?=number_format($tax+$total+$rate, 2);?></td>
  </tr>

  </tfoot>
</table>
<?php /*?>
<input type="submit" style="float:right; margin-right:16px;"id="cart_update" class="cart_update_link foxycart"  value="Update Cart" />
<input type="hidden" name="totalqty" value="" id="<?=$item["qty"]?>"  />
<input type="hidden" name="cart" value="update" /><input type="hidden" name="item_count" value=" + x + " />
<input type="hidden" name="totalqty" value="<?=$totalqty;?>" id="totalqty"  />
</form>
<?php */?>

<?
	}else{
?>
	<div id="cs_empty_cart"><?=$options["empty message"];?></div>
 <?
 }
}


function cs_cart_row($item) {
	
?>
<tr>
    <td width="364">

<input type="button" title="Remove this item" onclick="removefromcart(this);" id="<?=$item["id"];?>" class="fc_cart_remove_link" value="">
<input id="iid_<?=$item["id"];?>" name="iid_<?=$item["id"];?>" value="<?=$item["id"];?>" type="hidden">

<span class="cart_name"><?=$item["description"];?></span></td>
	
    <td align="center" width="35"> 
    <? if (Q("step") !== "") {?>
    <span class="text_qty"><?=$item["quantity"];?></span>
    <? } else { ?>
    <input style="margin:0px;" class="inp_qty"  id="quantity_<?=$item["id"];?>" name="quantity_<?=$item["id"];?>" value="<?=$item["quantity"];?>"  type="text" size="1" maxlength="2"> 
    <? } ?>
    </td>
	
    <td width="45" class="cart_price"><?=number_format($item["price"], 2, '.', ',');?></td>
  </tr>
 <?
}

function cs_receipt_row($item) {
	
?>
<tr>
    <td width="364">




<span class="cart_name"><?=$item["description"];?></span></td>
	
    <td align="center" width="35"> 
   
    <span class="text_qty"><?=$item["quantity"];?></span>
 
    </td>
	
    <td width="45" class="cart_price"><?=number_format($item["price"], 2, '.', ',');?></td>
  </tr>
 <?
}


function cs_tools_form_header($ms, $table, $id="")
{
//echo $table . $id;
	$result = cs_get_data($table, $ms);
	$row = $result->fetch_array(MYSQLI_BOTH);
	
	if (!$id) {
	?><h3><a class="cs_tools_title_nav_link" href="?tbl=<?=Q("tbl")?>"><?=cs_formatted_table_name(Q("tbl"));?></a> : <span class="h3l">Create New</span></h3><?
	}
	else
	{
	?><h3>Editing <a href="?tbl=<?=Q("tbl")?>"><?=cs_formatted_table_name(Q("tbl"));?></a>: <span class="h3l"><?=$row[1];?></span>
    <? if (Q("status") == 1) { ?>
    <span class="cs_tools_timestamp">Saved on <?=date('l M. jS, Y');?> at <?=date('g:i a');?></span>
    <? } ?>
    </h3><?
    }
}

function cs_tools_list_header($table='')
{
	
	//echo 'hello';
	//$result = cs_get_data($table, $ms);
	//$row = $result->fetch_array(MYSQLI_BOTH);
	
	//if (!$id) {
//	?><h3>Managing <?=cs_formatted_table_name($table);?></h3><?
//	}
//	else
//	{
//	?><?
//    }
}


function cs_status($style="default", $return=false){
	
	
	
	if (Q("status") !== '') {
		$status = "<div id=\"cs_status\" class=\"cs_status_$style\">Saved.</div>";
	}
	
	if ($return) { return $status; } else { echo $status; }
	
}



function cs_item_tool($ms, $table, $id, $order="", $dir="", $xtras="", $ref="")
{
		$ses = new Inflect();
		$sql = "select * from $table";
		if ($id) {
			
			$sql .= " where id = $id";
			$mode = "update";
			$idfield = cs_hidden_field("hid_id", $id);
			
		}
		else
		{
			$mode = "insert";
			$idfield = "";
		}
		
		echo cs_tools_form_header($ms, $table, $id);
		
		echo "<form id=\"div_".$table."\" action=\"../cs-includes/db.php?site=".CS_SITE."\" class=\"cs_tool_box\"  method=\"post\" enctype=\"multipart/form-data\">";
		
		echo cs_save_button("Save this ". ucwords($ses->singularize(cs_table($table)))); 
		
		// get all varchar fields and make a text-options list
		$options = '';
		$vars = '';
		$nums = '';
		$dates = '';
		$texts = '';
		
		$result = $ms->query($sql);
		$row = $result->fetch_array(MYSQLI_BOTH);
		
		
			while ($finfo = $result->fetch_field()) {
				//echo $finfo->type;
				if ($finfo->name !== 'id')
				{
				$field = $result->current_field;
				
				if ($id) {$data = $row[$field-1];} else {$data = "";}
				
					switch ($finfo->name){
						
						case 'category':
							$options .= "<div id=\"field_".$finfo->name."\" class=\"category_field_wrapper\" >";
							$options .= cs_text_label($finfo);
							$options .= cs_category_input($ms, $table, $row);
							$options .= "</div>";
							break;
					
						default:	
						
						
						switch ($finfo->type)
						{
						
							case 254:
							case 253:  // varchar field
								$chars .= "<div id=\"field_".$finfo->name."\" class=\"char_field_wrapper\" >";
								$chars .= cs_text_label($finfo);
								$chars .= cs_text_field($finfo, $data);
								$chars .= "</div>";
								break;
														
							case 252:  //  text field, make it a text area
								$texts .= "<div id=\"field_".$finfo->name."\" class=\"text_field_wrapper\" >";
								$texts .= cs_text_label($finfo);
								$texts .= cs_text_area($finfo, $data);
								$texts .= "</div>";
								break;
								
							case 3:
							case 4:
							case 246:
								$nums .= "<div id=\"field_".$finfo->name."\" class=\"num_field_wrapper\" >";
								$nums .= cs_text_label($finfo);
								$nums .= cs_text_field($finfo, number_format((double)$data, 2, ".", ","));
								$nums .= "</div>";
								break;
								
							case 10:
								$dates .= "<div id=\"field_".$finfo->name."\" class=\"date_field_wrapper\" >";
								$dates .= cs_text_label($finfo);
								$dates .= cs_text_field($finfo, date('m/d/Y',strtotime($data)));
								$dates .= "</div>";
								break;
							
							case 11:
								$dates .= "<div id=\"field_".$finfo->name."\" class=\"time_field_wrapper\" >";
								$dates .= cs_text_label($finfo);
								$dates .= cs_text_field($finfo, date('g:i a', strtotime($data)));
								$dates .= "</div>";
								break;
								
							case 1:  // binary field, make it a yes/no
								
								$options .= cs_text_label($finfo);
								$options .= cs_yes_no($finfo, $data);
								
								break;
								
						}
						
					}
					
				}
				
				
			}
			
			
			?>
			<div style="float:left">
			<div style="width:750px; float:left;" id="<?=$table?>_chars" class="chars_wrapper">
			<em class="instruct">Fields with a gray background are required</em>
			<?=$chars?><?=$nums?><?=$texts?></div>
			
           
             </div>
			<div id="tool_sidebar" class="uiframe sidebar">

				<? if ($dates !== "") { ?>
                <div id="<?=$table?>_dates" class="dates_wrapper sidebar">
                <h3><?=$ses->singularize(cs_formatted_table_name($table))?> Dates</h3>
                <?=$dates?>
                </div>
                <? } ?>
            
                <div id="<?=$table?>_options" class="options_wrapper sidebar">
                
					<? if ($options !== "") { ?>
                    <h2><?=$ses->singularize(cs_formatted_table_name($table))?> Options</h2>
                    <?=$xtras;?>
        			<div>
                    <?=$options?>
                    </div>
                    <? } ?>
                    
                    
                </div>
                
			</div>
            
            
            
			<?
			echo cs_hidden_field("hid_table", $table);
			echo $idfield;
			echo cs_hidden_field("hid_action", $mode);
			
			if ($id !== "") {
				
				$referrer= "";
				$referrer = ($ref == '') ? "?tbl=$table&action=form&id=$id&status=1" : $ref;
			
			echo cs_hidden_field("hid_referrer", $referrer);
			
			}
			
			echo "</form>";
			
}


function cs_page_tool($ms, $id)
{
		$ses = new Inflect();
		$table = "cs_pages";
		$sql = "select * from $table";
		if ($id) {
			
			$sql .= " where id = $id";
			$mode = "update";
			$idfield = cs_hidden_field("hid_id", $id);
			
		}
		else
		{
			$mode = "insert";
			$idfield = "";
		}
		
		$timestamp = strtotime($row["timestamp"]);
		
		
		
			$sql .= " limit 1";
		$result = $ms->query($sql);
		$row = $result->fetch_array(MYSQLI_BOTH);
		$timestamp = strtotime($row["timestamp"]);
		
		echo "<form id=\"div_".cs_table($table)."\" action=\"../cs-includes/db.php?site=".CS_SITE."\" class=\"cs_tool_box\"  method=\"post\" enctype=\"multipart/form-data\">";
		
		echo cs_tools_form_header($ms, $table, $id);
		
		echo "<div class=\"cs_savetools\">";
		echo cs_save_button("Save this ". ucwords($ses->singularize(cs_table($table)))); 
		echo cs_preview_button("Preview");
		echo cs_version_button("Save Version"); 
		echo "</div>";
		
		?>
         
        
        <a href="#" class="content tab button" id="content">Content</a> <a class="options tab button" id="options">Options</a><?
		
		
		
		
		// get all varchar fields and make a text-options list
		
		$options = '';
		$vars = '';
		$nums = '';
		$dates = '';
		$texts = '';
		
			while ($finfo = $result->fetch_field()) {
				//echo $finfo->type;
				if ($finfo->name !== 'id')
				{
				$field = $result->current_field;
				
				if ($id) {$data = $row[$field-1];} else {$data = "";}
				
					switch ($finfo->name){
						
						case 'category':
							$options .= "<div id=\"field_".$finfo->name."\" class=\"category_field_wrapper\" >";
							$options .= cs_text_label($finfo);
							$options .= cs_category_input($ms, $table, $row);
							$options .= "</div>";
							break;
					
						default:	
						
						
						switch ($finfo->type)
						{
						
							case 254:
							case 253:  // varchar field
								$chars .= "<div id=\"field_".$finfo->name."\" class=\"char_field_wrapper\" >";
								$chars .= cs_text_label($finfo);
								$chars .= cs_text_field($finfo, $data);
								$chars .= "</div>";
								break;
														
							case 252:  //  text field, make it a text area
								$texts .= "<div id=\"field_".$finfo->name."\" class=\"text_field_wrapper\" >";
								$texts .= cs_text_label($finfo);
								$texts .= cs_text_area($finfo, $data);
								$texts .= "</div>";
								break;
								
							case 3:
							case 4:
							case 246:
								$nums .= "<div id=\"field_".$finfo->name."\" class=\"num_field_wrapper\" >";
								$nums .= cs_text_label($finfo);
								$nums .= cs_text_field($finfo, number_format((double)$data, 2, ".", ","));
								$nums .= "</div>";
								break;
								
							case 10:
								$dates .= "<div id=\"field_".$finfo->name."\" class=\"date_field_wrapper\" >";
								$dates .= cs_text_label($finfo);
								$dates .= cs_text_field($finfo, date('m/d/Y',strtotime($data)));
								$dates .= "</div>";
								break;
							
							case 11:
								$dates .= "<div id=\"field_".$finfo->name."\" class=\"time_field_wrapper\" >";
								$dates .= cs_text_label($finfo);
								$dates .= cs_text_field($finfo, date('g:i a', strtotime($data)));
								$dates .= "</div>";
								break;
								
							case 1:  // binary field, make it a yes/no
								
								$options .= cs_text_label($finfo);
								$options .= cs_yes_no($finfo, $data);
								
								break;
								
						}
						
					}
					
				}
				
				
			}
			
			
			?>
            <div id="container" class="<?=cs_table($table);?>"></div>
            <? // dump text fields to "content" ?>
            <div id="content" class="content tab <?=cs_table($table)?>"><?=$texts?></div>
            
            
            <? // dump bines/ dates/ to "options" ?>
			<div id="options" class="options tab <?=cs_table($table)?>">
				<em>Fields with a gray background are required</em>
				<?=$chars?><?=$nums?>
				<? if ($dates !== "") { ?>
                <div id="<?=$table?>_dates" class="dates_wrapper sidebar">
                <h3><?=$ses->singularize(cs_formatted_table_name($table))?> Dates</h3>
                <?=$dates?>
                </div>
                <? } ?>
            
                <div id="<?=$table?>_options" class="options_wrapper sidebar">
                
					<? if ($options !== "") { ?>
                   
                    <?=$xtras;?>
        
                    <?=$options?>
                    <? } ?>
                    
                    
                </div>
                
			</div>
            
            
            
			<?
			echo cs_hidden_field("hid_table", $table);
			echo $idfield;
			echo cs_hidden_field("hid_action", $mode);
			
			if ($id !== "") {
			
			echo cs_hidden_field("hid_referrer", "?tbl=$table&action=form&id=$id&status=1");
			
			}
			
			echo "</form>";
}

function cs_field_list($ms, $table, $id, $order, $dir, $style, $xtras="")
{

	//echo $id;

	echo "<link href=\"../cs-content/plugins/".strtolower(cs_formatted_table_name($table))."/tool/styles.css\" rel=\"stylesheet\" type=\"text/css\" />";
	if (!$id)
	{
		$result = cs_get_data($table, $ms);
		$row = $result->fetch_array(MYSQLI_BOTH);
		
					
		echo "<form id=\"div_".$table."\" action=\"../cs-includes/db.php?site=$csSite\" class=\"cs_field_list\"  method=\"post\" enctype=\"multipart/form-data\">";
		
		while ($finfo = $result->fetch_field()) {
			
			//echo $finfo->type;
			//echo $finfo->type;
			if ($finfo->name !== 'id')
			{
				$field = $result->current_field;
				
				if ($finfo->name == 'image')
				{
					//echo cs_image_field($finfo, "");
				}
				
				elseif ($finfo->name == 'category')
				{
					echo cs_text_label($finfo);
					echo cs_category_input($ms, $table);
				}
				else
				{
					
					switch ($finfo->type)
					{
					
						case 254:
						case 253:  // varchar field
							echo cs_text_label($finfo);
							echo cs_text_field($finfo, "");
							break;
													
						case 252:  //  text field, make it a text area
							echo cs_text_label($finfo);
							echo cs_text_area($finfo, "");
							break;
							
						case 3:
						case 4:
						case 246:
							echo cs_text_label($finfo);
							echo cs_text_field($finfo, "");
							break;
			
						case 10:
							echo cs_text_label($finfo);
							echo cs_text_field($finfo, date('m/d/y'));
							break;
							
						case 11:
							echo cs_text_label($finfo);
							echo cs_text_field($finfo, "");
							break;
							
						case 1:  // boolean field, make it a yes/no
							//echo $finfo->def;
							echo cs_text_label($finfo);
							echo cs_yes_no($finfo, "", 1);
							break;
							
					}
				
				}
				
			}
			
		}
		
		echo cs_hidden_field("hid_table", $table);
		echo cs_hidden_field("hid_action", "insert");
		echo $xtras;
		echo cs_save_button();
	
	}
	else
	{
	
		$result = cs_get_data($table, $ms);
		$row = $result->fetch_array(MYSQLI_BOTH);
		$timestamp = strtotime($row["copy date"]);
	
	echo "<form id=\"div_".$table."\" action=\"../cs-includes/db.php?site=$csSite\" class=\"cs_field_list\"  method=\"post\" enctype=\"multipart/form-data\">";
			while ($finfo = $result->fetch_field()) {
				//echo $finfo->type;
				if ($finfo->name !== 'id')
				{
				$field = $result->current_field;
				
				
					switch ($finfo->name){
					
						case 'image':
							echo cs_show_image($row);
							echo cs_image_field($finfo, $row[$field-1]);
							break;
						
						case 'category':
							echo cs_text_label($finfo);
							echo cs_category_input($ms, $table, $row);
							break;
						
						case 'image category':
				
							echo cs_text_label($finfo);
							echo cs_category_input($ms, 'images', $row, 'image category');
							break;
			
					
						default:
							
						switch ($finfo->type)
						{
						
							case 254:
							case 253:  // varchar field
								echo cs_text_label($finfo);
								echo cs_text_field($finfo, $row[$field-1]);
								break;
														
							case 252:  //  text field, make it a text area
								echo cs_text_label($finfo);
								echo cs_text_area($finfo, $row[$field-1]);
								break;
							
							case 2:
								echo cs_text_label($finfo);
								echo cs_option_input($ms, $finfo->name, $row, $finfo->name);
								break;
							
							case 3:
							case 4:
							case 246:
								echo cs_text_label($finfo);
								echo cs_text_field($finfo, $row[$field-1]);
								break;
								
							case 10:
								echo cs_text_label($finfo);
								echo cs_text_field($finfo, date('m/d/Y',strtotime($row[$field-1])));
								break;
							
							case 11:
								echo cs_text_label($finfo);
								echo cs_text_field($finfo, date('g:i a', strtotime($row[$field-1])));
								break;
								
							case 1:  // binary field, make it a yes/no
								echo cs_text_label($finfo);
								echo cs_yes_no($finfo, $row[$field-1]);
							
								break;
								
						}
						
					}
					
				}
				
			}
			echo cs_hidden_field("hid_table", $table);
			echo cs_hidden_field("hid_id", $id);
			
			echo cs_hidden_field("hid_action", "update");
			echo $xtras;
			echo cs_save_button();
		
		}
		echo "</form>";

		

		
}

function cs_show_image($row)
{



	$showImage .= "<div class=\"cs_image_preview\" id=\"cs_image_preview_".$row["id"]."\">";
	$showImage .=  "<img src=\"../".CS_SITEPATH."/images/user/".$row["image"]."\" class=\"cs_image_preview\">";
	
	$showImage .=  "</div>";
	
	return $showImage;
	

}

function cs_get_contact_info($ms){
	
	$rs = cs_get_data("cs_contact_info", $ms);
	
	return $rs;
	
}

function cs_get_data($table, $ms){

	if (file_exists("tools/".strtolower(cs_formatted_table_name($table))."/data.php")){
	
		include("tools/".strtolower(cs_formatted_table_name($table))."/data.php");
		
		
		
	} else {
		
		$fields = "*";

		$sort = "";

		$sortDir = "";
		
		
	}

	$sql = "select $fields from $table";
	
	if ($where !== "") { $sql .= " $where"; }
		
	if (Q("tbl_cat") !== "") { 
		
		if ($where !== "") { 
			$sql .= " where category = ".Q("tbl_cat");
		}
		else {
			$sql .= " and category = ".Q("tbl_cat");
		}
	
	}	
	
	if (Q("id") !== "") { 
		
		if ($where !== "") { 
			$sql .= " where id = ".Q("id");
		}
		else {
			$sql .= " and id = ".Q("id");
		}
	
	}	
	
	if ($sort !== "") { $sql .= " order by $sort $sortDir"; }
	
	//echo $sql;
	
	return $ms->query($sql);
	
}

function cs_edit_list($ms, $table, $order, $dir, $colCount, $style, $sql="")
{
	$ses = new Inflect();
	
	
	if($sql==""){$result = cs_get_data($table, $ms);}
	else { $result = $ms->query($sql); }

	$bgcolor = 0;
	
	?><?
	echo cs_category_select($ms, $table);
	echo "<div id=\"cs_edit_list_$table\" class=\"cs_edit_list\">";
	
	//hack to set round round corners on title if there are 0 entries.
	
	$class = "cs_edit_list_title";
	
	$class = ($result->num_rows==0) ? $class." empty" : $class;
	
	echo "<div id=\"cs_edit_list_title_$table\" class=\"$class\">";
	echo $result->num_rows . " ". ucwords($ses->pluralize(cs_table($table))) . ". "  . cs_edit_list_add($table);;
	//echo cs_edit_list_delete($table);
	
	//echo "<div class=\"cs_edit_list_table_title\">".strtolower(cs_formatted_table_name($table))."</div>";
	//echo "<div class=\"cs_edit_list_print_title\">printed</div>";
	echo "</div>";
	echo "<div class=\"cs_edit_rows\">";
	
	while ($row = $result->fetch_row()) {
		echo $row["name"];
		echo cs_edit_row($row, $bgcolor, $table);
		//if ($bgcolor == 0) {$bgcolor = 1;} else { $bgcolor = 0; }
				
	}   
	echo "</div></div>";
}

function cs_image_browse_sidebar($ms)
{
		echo "<div class=\"cs_sidebar\">";
		echo "<div class=\"cs_sidebar_title\">Images</div>";
		echo "<div class=\"cs_image_list\">";
		cs_image_browse_list('cs_images', $ms);
		echo "</div>";
		echo "</div>";

}

function cs_edit_list_delete($table)
{
	

	$editListDelete = "<a href=\"javascript:deleteConfirm($('cs_edit_form_$table'))\"";
	$editListDelete .= "onclick=\"deleteConfirm($('cs_edit_form_$table'))\"";
	$editListDelete .= "class=\"cs_edit_list_delete\"";
	$editListDelete .= "id=\"cs_edit_list_delete_$table\">x</a>";
	
	return $editListDelete;

}

function cs_image_browse_list($table, $ms)
{
	
	$sql = "select * from cs_images";
	
	if (Q("tbl_cat") !== "")
	{
		$sql .= " where category = ".Q("tbl_cat");
	}	
				
	$images = $ms->query($sql);
	{
	
		if ($images->num_rows == 0){

?>			There are no images in this category    <?
		}
		else
		{
			while ($image = $images->fetch_row())
			
			if (!file_exists(CS_PATH."/cs-images/user/".$image[3])){
?>
				
                <img class="cs_tools_image_thumb" style="width:100px;" src="<?=CS_PATH?>/cs-images/user/<?=$image[3]?>" onload="this.style.visibility='visible';" />
                <?
				cs_delete_button_form($image['0']);

			}
			//else {
?>
						
<?
        	//}
		}
	}
			


}

function cs_edit_list_add($table)
{

	$ses = new Inflect();

	$editListDelete = "<a href=\"?tbl=$table&tbl_cat=".Q("tbl_cat")."&action=form\"";
	$editListDelete .= " class=\"cs_edit_list_add cs_tools_a2\"";
	$editListDelete .= "id=\"cs_edit_list_add_$table\"><b>+</b></a>";
	
	return $editListDelete;

}

function cs_option_link($table, $option, $return=false)
{

	$ses = new Inflect();

	$optionLink = "<a href=\"?tbl=$table&id=1&option=$option\"";
	$optionLink .= " class=\"cs_edit_list_add cs_tools_a2\"";
	$optionLink .= "id=\"cs_option_link_$option\">$option</a>";
	

	if ($return) {
		return $optionLink;
	}else{
		echo $optionLink;
	}

}


function cs_option_page($ms, $table, $option){
	

	
	switch ($option) {
		
		case "":
			include("../".CS_PLUGINPATH.cs_table($table)."/tools/home.php");
			break;
		default:
			include("../".CS_PLUGINPATH.cs_table($table)."/tools/$option.php");
			break;
	}

}
		
			

function cs_add_images($table, $id="")
{

	include('../cs-includes/uploader/index.php');

}

function cs_add_uploads($table, $id="", $label="", $type="", $qty="")
{
	
	include('../cs-includes/uploader/index_v2.php');

}

function cs_uploader($ms, $table, $id="", $label="", $type="", $qty="")
{
	
	
	
	if (isset($_REQUEST["page"])) { //it's coming from front end, change path
	include ('cs-includes/uploader-1.0/index.php');
	} else {
	include('../cs-includes/uploader-1.0/index.php');
	}


}

function cs_data_uploader($label="", $type="", $qty="")
{
	
	include('../cs-includes/uploader/data.php');

}

function cs_category_edit($table)
{

	$ses = new Inflect();

	$categoryEdit = "<a href=\"?tbl=$table&action=list\"";
	$categoryEdit .= " class=\"cs_tools_a3\"";
	$categoryEdit .= "id=\"cs_category_edit_$table\">Manage ".(cs_formatted_table_name($table))."</a>";
	
	return $categoryEdit;

}


function cs_tools_menu_href($label, $class, $target)
{		
			
	$menuHref="<div class=\"".$class."_div\"><a href=\"?tbl=$label\" class=\"$class\" id=\"m_$label\" target=\"$target\">".cs_formatted_table_name($label)."</a></div>";
	
	return $menuHref;
			
}

function cs_tools_nav_item($label, $href, $class, $target){
	
	$menuHref="<div class=\"".$class."_div\"><a href=\"$href\" class=\"$class\" id=\"m_$label\" target=\"$target\">$label</a></div>";
	
	return $menuHref;
}
		
function cs_menu_row($menuHrefs)
{
	
	$menuRow = "<div class=\"cs_menu_row\">";
	$menuRow .= $menuHrefs;
	
	$menuRow .= "</div>";
	
	return $menuRow;

}


function cs_hidden_field($name, $table)
{

	$hiddenField .= "<input type=\"hidden\" value=\"$table\" name=\"$name\" id=\"$name\" />";
	
	return $hiddenField;

}

function cs_save_button($label="")
{

	$saveButton .= "<input type=\"submit\" value=\"$label\" class=\"cs_save_button\">";
	
	return $saveButton;

}

function cs_preview_button($label="")
{

	$saveButton .= "<input type=\"button\" value=\"$label\" class=\"cs_preview_button\">";
	
	return $saveButton;

}

function cs_version_button($label="")
{

	$saveButton .= "<input type=\"button\" value=\"$label\" class=\"cs_version_button\">";
	
	return $saveButton;

}

function cs_tool($fieldList, $field)
{

	

//	$form = "<form>\n"
//	$form .= "<div id=\"div_".$field->table."\">";
//	$form .= $fieldList;
//	$form .= "</div>";
	
//	echo $form;

}


function table_exists ($table, $db) {

// open db connection
$result = $db->query("show tables like '$table'");
	
	if ($result->num_rows > 0)
	{	
		return true;
	}
	else
	{
		return false;
	}
	
}

function cs_category_select($ms, $table)
{
	//check if this list has a categories table associated with it
	$ses = new Inflect();
	$cat_table = "cs_".$ses->singularize(strtolower(cs_formatted_table_name($table)))."_categories";
	
	
	
	$categorySelect = '';
	
	$categorySelect .= "<a href=\"?tbl=$table\" class=\"cs_tools_a2\">Browse All ".ucwords(cs_formatted_table_name($table))."</a> or";

	if (table_exists($cat_table, $ms))
	{
		$cats = $ms->query("select * from $cat_table");
	
		$categorySelect .= "<select onchange=\"location.href='?tbl=$table&tbl_cat='+this.value;\" id=\"cs_category_select_$table\" class=\"cs_category_select\">    
			<option value=\"0\" onclick=\"return false;\">Select a Category</option>";
			
			while ($cat = $cats->fetch_row())
			{

				$categorySelect .= " <option value=\"".$cat[0]."\" ";
				
				if (intval(Q("tbl_cat")) == $cat[0]) 
				{ 
				
					$categorySelect .= " selected=\"selected\"";
				} 
				
				$categorySelect .= ">";
				$categorySelect .= $cat[1];
				$categorySelect .= "</option>";
		

			}
	 
		$categorySelect .= "</select>";
		$categorySelect .= cs_category_edit($cat_table);
		return $categorySelect;
	}
	else
	{
		return;
	}
	
}

function cs_category_input($ms, $table, $row="", $fieldName="")
{
	
	if (is_null($fieldName) || $fieldName == ""){
		$formName = "inp_category";
		$fieldName = "category";
	}
	else {
		$formName = "inp_".str_replace(" ", "_", $fieldName);

	}
	

	//check if this list has a categories table associated with it
	$ses = new Inflect();
	$cat_table = "cs_".$ses->singularize(strtolower(cs_formatted_table_name($table)))."_categories";

	if (table_exists($cat_table, $ms))
	{
		$cats = $ms->query("select * from $cat_table");
	
		$categorySelect .= "<select name=\"$formName\" class=\"cs_category_input\" id=\"inp_category\">    
			<option value=\"0\">Select A Category</option>";
			
			while ($cat = $cats->fetch_array(MYSQLI_BOTH))
			{

				$categorySelect .= " <option value=\"".$cat[0]."\" ";
				
				if (intval(Q("tbl_cat")) == $cat[0])	{ 
				
					$categorySelect .= " selected=\"selected\"";
					
				} else {
					//echo $row[$fieldName];
					if ($row[$fieldName] == $cat[0]) {	
					//echo $row[$fieldName];
					//echo $cat[0];
					
					//echo $row["category"];
					$categorySelect .= " selected=\"selected\"";
					}
					
				}
				
				
				$categorySelect .= ">".$cat[1];
				$categorySelect .= "</option>";
		

			}
	 
		$categorySelect .= "</select>";
		return $categorySelect;
	}
	else
	{
		return;
	}
	
}



function cs_option_input($ms, $table, $row="", $fieldName="")
{
	
	
	if (is_null($fieldName) || $fieldName == ""){
		$formName = "inp_option";
		$fieldName = "option";
	}
	else {
		$formName = "inp_".str_replace(" ", "_", $fieldName);

	}
	

	//check if this list has a categories table associated with it
	$ses = new Inflect();
	$opt_table = "cs_".$ses->pluralize(strtolower($fieldName));
	
	//echo $opt_table;

	if (table_exists($opt_table, $ms))
	{
		$opts = $ms->query("select * from $opt_table");
	
		$optionSelect .= "<br><select name=\"$formName\" class=\"cs_option_input\" id=\"inp_".$fieldName."\">    
			<option value=\"0\">Select " . $fieldname . "</option>";
			
			while ($opt = $opts->fetch_array(MYSQLI_BOTH))
			{

				$optionSelect .= " <option value=\"".$opt[0]."\" ";
				
				if (intval(Q("tbl_cat")) == $opt[0])	{ 
				
					$optionSelect .= " selected=\"selected\"";
					
				} else {
					//echo $row[$fieldName];
					if ($row[$fieldName] == $opt[0]) {	
					//echo $row[$fieldName];
					//echo $cat[0];
					
					//echo $row["category"];
					$optionSelect .= " selected=\"selected\"";
					}
					
				}
				
				
				$optionSelect .= ">".$opt[1];
				$optionSelect .= "</option>";
		

			}
	 
		$optionSelect .= "</select><br /><br />
";
		return $optionSelect;
	}
	else
	{
		return;
	}
	
}

function cs_check_list($result, $fTable, $lTable)
{
	
	
		$formName = "inp_check_list";


		$checked = "";
		$ses = new Inflect();
		$checkList .= "<label class=\"cs_text_label\" >".$ses->pluralize(cs_table($fTable))."</label>";
		$checkList .= "<div id=\"$formName\"  name=\"$formName\" class=\"cs_check_list\">";
		?>
		<ul style="list-style:none; margin-top:10px; display:block;">
		<?
		while ($item = $result->fetch_array())
		{
			//echo $item["lt.plan"];
			if (Q("id") && $item["ltfid"] == Q("id")) {
				
				$checked = "checked=\"checked\"";
				
			}
			
				$checkList.= "<li><input type=\"checkbox\" name=\"mtm_$lTable"."[]"."\" value=\"".$item["htid"]."\" ".$checked." /><label class=\"cs_checkbox\">".$item["name"]."</label></li>";
				
				$checked = "";
		}
		$checkList .= "<input type=\"hidden\" name=\"mtm_ltable\" value=\"$lTable\" />";
		$checkList .= "<input type=\"hidden\" name=\"mtm_ftable\" value=\"$fTable\" />";
		$checkList .= "</div>";
		return $checkList;
	
	
	
}

function cs_echo($str){
	
	$stuff = str_replace("src=\"../", "src=\"".CS_PATH, str_replace("url(../", "url(" . CS_PATH, $str));
	
	$stuff = str_replace("&nbsp;", "", $stuff);		
	
	//if (!get_magic_quotes_gpc()) { $value = removeslashes($content);}																
																			
	echo $stuff;
	
}

$curAction = '';
$curCategory = '';
$curTable = '';

function cs_find_content_tags($ms, $contents)
{
	
		
	// find the '[cs' indicator, that means there is an instruction
	$startPos = stripos($contents, '[cs_insert]');
	
	if ($startPos !== false) {  //it was found, check for command
	
		// isolate beginnning html
		if ($startPos !== 0) {
			$before = substr($contents, 0, $startPos);
			cs_echo($before);
		}
		//isolate everything after
		$therest = substr($contents, $startPos, strlen($contents));
		
		//isolate tag
		$tag = substr($therest, 0, stripos($therest, '[/cs_insert]') + 12);
		
		//strip tag indicators
		$tag = str_replace("[cs_insert]", "", str_replace("[/cs_insert]", "", $tag));
	
		//isolate remainder 
		$after = substr($therest, stripos($therest, '[/cs_insert]') + 12, strlen($therest));
		
		//isolate action from tag
		$action = substr($tag, 0, stripos($tag, ":"));
		$therest = substr($tag, stripos($tag, ":") + 1, strlen($tag));

		if (stripos($therest, ":") !== false) {
				$table = substr($therest, 0, stripos($therest, ":"));
				$category = substr($therest, stripos($therest, ":") + 1, strlen($therest));
		}
		else
		{
				$table = $therest;
				$category = "";
		}
		
	
		$curAction = $action;
		$curCategory = $category;
		$curTable = $table;
		
		
	
		cs_page_insert($ms, $action, $table, $category);
		cs_find_content_tags($ms, $after);
	}
	else
	{
		cs_echo ($contents);
	}

}

function cs_print($ms, $contents)
{
	// find the '[cs' indicator, that means there is an instruction
	
	$contents = str_replace("[cs_insert]", "[cs]", $contents);
	
	$contents = str_replace("[/cs_insert]", "[/cs]", $contents);
	
	$startPos = stripos($contents, '[cs]');
	
	
	//echo $startPos;
	
	if ($startPos !== false) {  //it was found, check for command
	
		// isolate beginnning html
		if ($startPos !== 0) {
			$before = substr($contents, 0, $startPos);
			cs_echo($before);
		}
		//isolate everything after
		$therest = substr($contents, $startPos, strlen($contents));
		
		//isolate tag
		$tag = substr($therest, 0, stripos($therest, '[/cs]') + 5);
		
		//strip tag indicators
		$tag = str_replace("[cs]", "", str_replace("[/cs]", "", $tag));
	
		//echo $tag;
	
		//isolate remainder 
		$after = substr($therest, stripos($therest, '[/cs]') + 5, strlen($therest));
		
		
		
		//isolate action from tag
		$action = substr($tag, 0, stripos($tag, ":"));
		
		//$action = str_replace("[CS]", "", $action);
		
		if ($action == "") {$action = "contact"; $id = $tag;}
		
		
		
		$therest = substr($tag, stripos($tag, ":") + 1, strlen($tag));

		if (stripos($therest, ":") !== false && $category == "") {
				$table = substr($therest, 0, stripos($therest, ":"));
				$category = substr($therest, stripos($therest, ":") + 1, strlen($therest));
		}
		else
		{
				$table = $therest;
				$category = "";
		}
		
	
		$curAction = $action;
		$curCategory = $category;
		$curTable = $table;
		
		//echo $curAction;
		//echo $curTable;
		//echo $curCategory;
		
	
		cs_page_insert($ms, $action, $table, $category, $id);
		cs_print($ms, $after);
	}
	else
	{
		cs_echo ($contents);
	}

}

function cs_get_cat_id($ms, $cat_table, $category)
{
	
	$sql = "select * from $cat_table where LOWER(name) = '".strtolower($category)."'";
	//echo $sql;
	$categories = $ms->query($sql);
	
	if ($ms->error){
		//E($ms->error);
	}
	else
	{
		$cat = $categories->fetch_row();
		//echo $cat[0];

		return $cat[0];
	}
}

function cs_get_cat_name($ms, $cat_table, $category)
{
	
	$sql = "select * from $cat_table where id = ".strtolower($category);
	//echo $sql;
	$categories = $ms->query($sql);
	
	//if ($ms->error){
		//E($ms->error);
	//}
	//else
	//{
		$cat = $categories->fetch_row();
		//echo $cat[0];

		return $cat[1];
	//}
}

function cs_page_insert($ms, $action, $table="", $category="", $id="") {

	
	$catID = "";
	$list = '';
	$ses = new Inflect();
	$cat_table = "cs_".$ses->singularize(strtolower(cs_formatted_table_name($table)))."_categories";
	
	
	
	if ($category !== "") {	//echo $category;
	$catID = cs_get_cat_id($ms, $cat_table, $category); }
	
	//$ses = cs_get_cat_id($category);
	
	//echo $catID;

	
	switch ($action){
	
		case "browse":
			
			//echo $table;
			//echo $catID;
			
			cs_browse_list ($ms, $table, $catID);
			break;
		
		case "form":
			
			//echo $table;
			//echo str_replace(CS_PATH, "",CS_SITEPATH)."/forms/".$table.".php";
			
			if (file_exists(str_replace(CS_PATH."/", "",CS_SITEPATH)."/forms/".$table.".php")){
				include(str_replace(CS_PATH."/", "",CS_SITEPATH)."/forms/".$table.".php");
			}
			else
			{
				//cs_form_list ($ms, $table, $category);
			}
			break;
					
		case "list":
			
			//echo $catID;
			cs_list ($ms, $table, $catID);
			break;
		
		case "copy":
			
			echo cs_get_copy($ms, $table);
			break;
			
		case "contact":
			
			$contact = cs_get_contact_info($ms);
			$info = $contact->fetch_assoc();
			echo $info[strtolower($id)];			
			break;
		
			
		case "plugin":
		
		//echo "cs-content/plugins/".strtolower(cs_formatted_table_name($table))."/index.php";
			//echo strtolower(cs_formatted_table_name($table))
			//echo "cs-content/plugins/".strtolower(cs_formatted_table_name($table))."/index.php";
			//echo file_exists("cs-content/plugins/".strtolower(cs_formatted_table_name($table))."/index.php")
			if (file_exists("cs-content/plugins/".strtolower(cs_formatted_table_name($table))."/index.php")){
				//echo "hello";
				include ("cs-content/plugins/".strtolower(cs_formatted_table_name($table))."/index.php");
				
			}
			else
			{
				
				break;
			}
		
	}
	
	return $list;

}

function cs_list($ms, $table, $category=""){

	//$ms1 = new mysqli($dbServer, $dbUser, $dbPass, $dbName);
	//echo $category;
	
	$table = cs_table_name($table);
	
	
	
	if (Q("category") !== ""){
		$category = Q("item");
		}
	
	if ($category !== "") {
		//echo $category;
		//$ses = new Inflect();
		
		//$cat_id = cs_get_cat_id($ms, $ses->singularize(strtolower($table))."_categories", $category);
		//echo $cat_id;
	$sql = "select * from $table where print = true and category = " . $category;
	}
	else
	{
	$sql = "select * from cs_$table where print = true";
	}
	//echo $sql;
	if (field_exists($ms, $table, 'order') || field_exists($ms, $cattable, 'order')) {$sql .= " order by `order` asc";}
	
	$result = $ms->query($sql);
	
//	echo $cs_table($table);
	echo "<div class=\"cs_list\">";
	if (!file_exists(CS_PLUGINPATH.cs_table($table)."/list.php")){
		
	
	while ($listItem = $result->fetch_array(MYSQLI_BOTH)) {
		
		
		if (file_exists(CS_PLUGINPATH.cs_table($table)."/item.php"))
		{
			
			include( CS_PLUGINPATH.cs_table($table)."/item.php");
		}
		else
		{
			?><div class="cs_list_item"><?
			cs_print($ms, ""."<h3>".$listItem["label"]."</h3>".$listItem["content"]."");
			?></div><?
		}
	}
	}
	else
	{
		include( CS_PLUGINPATH.cs_table($table)."/list.php");
	}
	
	echo "</div>";
	
	return $item;

}
		



function cs_list_menu($list) {
	
	//echo $list->num_rows;

	$id = Q("item");
	
	
	
	//echo $item;
	if (file_exists(CS_THEMEPATH."/listmenu.php"))
	{
		
		include( CS_THEMEPATH."/listmenu.php");
		
	}
	else
	{
		
		echo "<div class=\"cs_list_menu\" >";
		
		//echo "<div class=\"cs_list_menu\" ><div class=\"cs_left_cap\"></div>";
			while ($listItem = $list->fetch_array(MYSQLI_BOTH)) {
				
				if ($item == "") {$item = $listItem[0];}
				if ($item == $listItem[0]) {$class = "cs_list_menu_item active";} else {$class = "cs_list_menu_item";}
			
				echo "<a id=\"cs_list_menu_item_".$listItem[1]."\" class=\"$class\" href=\"index.php?page=".urlencode(Q("page"))."&item=".urlencode($listItem[0])."\">".$listItem[1]."</a>";
			
			}
			
		//echo "<div class=\"cs_right_cap\"></div>";
		echo "</div>";
		
	
	
	
	}
	
	
	
	return $id;
	
}




/**
function:		cs_string_clean
description: 	cleans strings for display.
todo:			improve html parsing, capitalization
*/
function cs_string_clean($str)
{

    // return ucfirst(strtolower(preg_replace ("/([^A-Za-z0-9\+_\-\ \'\"\.,]+)/", "", $str)));
   return cs_sentence_case(strip_tags($str));
	
}
/**	
end cs_string_clean 
*/


/** 
function:		cs_sentence_case
description:	changes string to sentence case
*/
function cs_sentence_case($string) {
    $sentences = preg_split('/([.?!]+)/', $string, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
    $new_string = '';
    foreach ($sentences as $key => $sentence) {
        $new_string .= ($key & 1) == 0?
            ucfirst(strtolower(trim($sentence))) :
            $sentence.' ';
    }
    return trim($new_string);
}
/**
end cs_sentence_case
*/


function cs_list_item($ms, $table, $activeItem, $donly="") {
	
	
	
	if (!strstr($table, 'cs_')){$table = cs_table_name($table);}
	
	//echo $table;

	$sql .= "select * from $table";
	//echo $table;
	
	if (is_numeric($activeItem)) {
	//echo  $activeItem;
		$sql .= " where id = $activeItem";
	}
	else
	{	
		if ($table == 'cs_copy' && $activeItem !== '') {
		$sql .= " where  label = '$activeItem'";
		}
		else
		{
		$sql .= " where name = '$activeItem'";
		}
	}
	
	
	$items = $ms->query($sql);
	
	
	//echo $sql;
	if ($items) {$item = $items->fetch_array(MYSQLI_BOTH);}
	
	//get category;
	
	//
	
	if (!field_exists($ms, "copy", "order")) { 
		$sql = "alter table `$table` add `order` INT(11) NOT NULL default 0"; 
		$result = $ms->query($sql);
	}
	
	
	$sql = "select * from $table where `order` >= " . $item["order"] . " and category = " . $item["category"] . " order by `order` asc";
	
	//echo $sql;
	
	//get number of parent rows
	
	$nextitem = $ms->query($sql);
	//echo $sql;
	//echo $ms->error;
	
	$next = $nextitem->fetch_array(MYSQLI_BOTH);

	// get id of next item;

	$sql = "select * from $table where category = " . $item["category"]; 
	
	// get category name (for css class)
	$ses = new Inflect();
	$cat_table = "cs_".$ses->singularize(strtolower(cs_formatted_table_name($table)))."_categories";
	
	$catname = cs_get_cat_name($ms, $cat_table, $item["category"]);
	
	$count = $ms->query($sql);
	
	$numrows = $count->num_rows;

	
	if ($donly=="true") { echo  cs_find_content_tags($ms, $item["content"]); return; }
	
	if (file_exists(CS_PLUGINPATH.cs_table($table)."/item.php"))
	{
		include( CS_PLUGINPATH.cs_table($table)."/item.php");
	}
	else
	{
		if (file_exists(CS_THEMEPATH."/item.php"))
		{	
			include( CS_THEMEPATH."/item.php");
		}
		else
		{
			
			echo "<div class=\"cs_copy_content\" id=\"cs_copy_content_$table\">";
			
			
			
			if($numrows > 1) {
			
			echo "<a class=\"cs_copy_next $catname\" href=\"?page=" . Q("page") . "&item=" . $next["id"] . "\">Next >></a>";
			
			}
			
			echo cs_find_content_tags($ms, str_replace("src=\"../", "src=\"", $item["content"]));
			echo "</div>";
		}
		
	}



}

function cs_browse_menu($ms, $table, $catID="") {

	$ses = new Inflect();
	$table = cs_table_name($table);
	
	//echo $catID;
	
	//echo $table;
	
	if($catID=='')
	{
	
		
	
		if(table_exists("cs_".$ses->singularize(strtolower(cs_formatted_table_name($table)))."_categories", $ms))
		{

			$cattable =  "cs_".$ses->singularize(strtolower(cs_formatted_table_name($table)))."_categories";
			$sql = "select * from $cattable ";
		}
		else
		{
			$sql = "select * from $table";
		
		
		}
	}
	else
	{
		$sql = "select * from $table ";
	}
	
	
	
	if ($catID!=='' && $cattable == '') {
		$sql .= "where category = $catID and ";
	}
	else
	{
		$sql .= "where ";
	}
	
	$sql .= "print = true";
		
	if (field_exists($ms, $table, 'order') || field_exists($ms, $cattable, 'order')) {$sql .= " order by `order` asc";}

	
	//echo $sql;
	
	$list = $ms->query($sql);
	
	//echo $ms->error;
	

	$activeItem = cs_list_menu($list);

	

}

function cs_browse_list($ms, $table, $catID="") {
	
	

	$ses = new Inflect();
	$table = cs_table_name($table);
	//echo $table;
	
	//echo $catID;
	
	//echo $table;
	
	if($catID=='')
	{
	
		
	
		if(table_exists("cs_".$ses->singularize(strtolower(cs_formatted_table_name($table)))."_categories", $ms))
		{

			$cattable =  "cs_".$ses->singularize(strtolower(cs_formatted_table_name($table)))."_categories";
			$sql = "select * from $cattable ";
		}
		else
		{
			$sql = "select * from $table";
		
		
		}
	}
	else
	{
		$sql = "select * from $table ";
	}
	
	
	
	if ($catID!=='' && $cattable == '') {
		$sql .= "where category = $catID and ";
	}
	else
	{
		$sql .= "where ";
	}
	
	$sql .= "print = true";
		
	if (field_exists($ms, $table, 'order') || field_exists($ms, $cattable, 'order')) {$sql .= " order by `order` asc";}

	
	//echo $sql;
	
	$list = $ms->query($sql);
	
	//echo $ms->error;
	

	$activeItem = cs_list_menu($list);
	
	
	if ($activeItem == '') { $list->data_seek(0); $x = $list->fetch_assoc(); $activeItem = $x["id"]; }
	//echo $activeItem;
	
	//$activeItem["label"];
	//echo $catID;
	
	
	if ($catID !=='' || Q("item") !=='') {
		
		
		//if ($activeItem == $catID) {$do="true";}else{$do="";}
		
		//echo $table; 
		
		//echo $activeItem;
		
		cs_list_item($ms, $table, $activeItem);
	}
	else
	{
		
		cs_list($ms, $table, $catID);
	}	
	
	return $list;

}

function field_exists($ms, $table, $name){

	$result = $ms->query("select distinct `$name` from `$table`");
	
	if ($ms->error){
		return false;
	}
	else{
		return true;
	}

}


function cs_item_image($ms, $table, $id, $cat){
	
	
	$sql = "select * from cs_uploads where fid = '" . $id . "' and ftable = '" . $table . "' and category = '" . $cat . "' order by id desc limit 1";
	//echo $sql;
	$images = $ms->query($sql);
	if ($images) {
		return $images->fetch_object();
	}
	else
	{
		return false;
	}
	
}


function cs_footer_nav($ms) {

	$menu = $ms->query("select id, target, label, `menu order` from cs_pages where print = true order by `menu order` asc");
	//echo $menu-
	//echo $mysqli->error;
	$x = 1;
	$width = 0;
	
	?>
    <div id="cs_footer_nav">
    <?
	
	while ($menuItem = $menu->fetch_assoc()) 
	{
	
		if ($menuItem["target"] == "") { $target = "_self"; } else {$target = $menuItem["target"]; }
		
		
	?><a href="?page=<?=urlencode($menuItem["label"])?>" target="<?=$target?>"><?=$menuItem["label"]?></a><?
		
	}
	
	?>
    </div>
    <?
	
}

function cs_email_link($email, $class='', $title=''){
?>
<a class="<?=$class?>" title="<?=$title?>" href="mailto:<?=$email;?>"><?=$email;?></a>
<?	
	
}

function cs_link($url, $class='', $title='', $target='', $html=''){
	

	$href = (filter_var($url, FILTER_VALIDATE_EMAIL)) ? "mailto:$url" : $url;
	
	$html = ($html == '') ? $url : $html;
	
?>
<a class="<?=$class?>" title="<?=$title?>" target="<?=$target;?>" href="<?=$href;?>"><?=$html;?></a>
<?	
	
}

function checkSecurity(){

	if (!CS_SITE) {
 		header('HTTP/1.0 403 Forbidden');
  		exit;
	}
}
	
function sterilize($str){

	$str = strip_tags($str);
	
	return $str;

}

?>