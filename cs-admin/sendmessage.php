<? require_once('../cs-config.php'); ?>
<? require_once('../cs-includes/constants.php'); ?>
<? require_once('../cs-includes/connect.php'); ?>
<?

ini_set("SMTP", "mail.taftstreetwinery.com");
ini_set("smtp_port", "25");
ini_set("username", "stateofthestreet@taftstreetwinery.com");
ini_set("password", "hello123");
ini_set('sendmail_from', 'stateofthestreet@taftstreetwinery.com'); 

$content = "";
$text_content = "";

function prepHTML($sos)
{
	
	$content = '';
	
	$file = "../message.html";
	$content = implode('',file($file));
	
	
	//echo $content;
	
	//fclose($fh);
	
	$content = str_replace("***title***", $sos["name"], $content);
	$content = str_replace("***date***", date('m-d-Y', strtotime( $sos["date"])), $content);
	$content = str_replace("***message***", $sos["message"], $content);

	
	

	
	
	return $content;
	//echo $content;
}


function prepText($sos){

	$text_content .= "Taft Street Winery\n";
	$text_content .= "The State of the Street\n\n";
	$text_content .= $sos["date"] . "\n";
	$text_content .= $sos["name"] . "\n\n";
	$text_content .= strip_tags(str_replace("<br>", "\n", $sos["message"])) ."\n\n";
	$text_content .= "To unsubscribe, please reply to this email with the word 'unsubscribe' in the subject.";
	
	return $text_content;

}

function sendmail ($from_name, $from_email, $to_name, $to_email, $subject, $text_message, $html_message="", $attachment="")
{
$from = "$from_name <$from_email>";
$to = "$to_name <$to_email>";
$main_boundary = "----=_NextPart_".md5(rand());
$text_boundary = "----=_NextPart_".md5(rand());
$html_boundary = "----=_NextPart_".md5(rand());
$headers = "From: $from\n";
$headers .= "Reply-To: $from\n";
$headers .= "X-Mailer: Website\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/mixed;\n\tboundary=\"$main_boundary\"\n";
$message .= "\n--$main_boundary\n";
$message .= "Content-Type: multipart/alternative;\n\tboundary=\"$text_boundary\"\n";
$message .= "\n--$text_boundary\n";
$message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"\n";
$message .= "Content-Transfer-Encoding: 7bit\n\n";
$message .= ($text_message!="")?"$text_message":"Text portion of HTML Email";
$message .= "\n--$text_boundary\n";
$message .= "Content-Type: multipart/related;\n\tboundary=\"$html_boundary\"\n";
$message .= "\n--$html_boundary\n";
$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n";
$message .= "Content-Transfer-Encoding: quoted-printable\n\n";
$message .= str_replace ("=", "=3D", $html_message)."\n";
if (isset ($attachment) && $attachment != "" && count ($attachment) >= 1)
{
for ($i=0; $i<count ($attachment); $i++)
{
$attfile = $attachment[$i];
$file_name = basename ($attfile);
$fp = fopen ($attfile, "r");
$fcontent = "";
while (!feof ($fp))
{
$fcontent .= fgets ($fp, 1024);
}
$fcontent = chunk_split (base64_encode($fcontent));
@fclose ($fp);
$message .= "\n--$html_boundary\n";
$message .= "Content-Type: application/octetstream\n";
$message .= "Content-Transfer-Encoding: base64\n";
$message .= "Content-Disposition: inline; filename=\"$file_name\"\n";
$message .= "Content-ID: <$file_name>\n\n";
$message .= $fcontent;
}
}
$message .= "\n--$html_boundary--\n";
$message .= "\n--$text_boundary--\n";
$message .= "\n--$main_boundary--\n";
mail ($to, $subject, $message, $headers);
}

$from_name = "Your Website";

$from_email = "website@taftstreetwinery.com";

$to_name = "Site Admin";

$to_email = $_POST["hid_notify_email"];

$subject = "Contact from website";

$text_message .= "There has been a sign-up on the website." . "\n";

$text_message .= "Name: " . $_POST["inp_first"]. " " . $_POST["inp_last"] . "\n";
$text_message.= "Email: " . $_POST["inp_email"]. "\n";
$text_message.= "Address: " . $_POST["inp_ddress"]. "\n";
$text_message.= "Address2: " . $_POST["inp_address2"]. "\n";
$text_message.= "Phone: " . $_POST["inp_phone"]. "\n";
$text_message.= "City: " . $_POST["inp_city"]. "\n";
$text_message.= "State: " . $_POST["inp_state"]. "\n";
$text_message.= "Zip: " . $_POST["inp_zip"]. "\n";


//require_once "Mail.php";

//$subject = "New Mailing List Subscriber!";
//$body = $html_message;
//$host = "mail.shopvvb.com";
//$username = "info@shopvvb.com";
//$password = "hello123";
//$headers = array ('From' => $from,
//'To' => $to,
//'Subject' => $subject);
//$smtp = Mail::factory('smtp',
//array ('host' => $host,
//'auth' => true,
//'username' => $username,
//'password' => $password));
//$mail = $smtp->send($to, $headers, $body);
//
//if (PEAR::isError($mail)) {
//echo("<p>" . $mail->getMessage() . "</p>");
//} else {
//	$referrer = $_POST["referrer"];
//header("Location: $referrer"."&message=1");
//}
//echo $html_message;

//get state of the street

$sql = "select * from cs_messages where id = " . $_POST["message_id"];
$state = $mysqli->query($sql);
$sos = $state->fetch_assoc();

$sendTo = $_POST["send_to"];
$singleAddress = $_POST["single_address"];
$from_name="stateofthestreet@taftstreetwinery.com";
$from_email="stateofthestreet@taftstreetwinery.com";


$html_message = prepHTML($sos);
$text_message = prepText($sos);

if ($sendTo == 'single') {
	
	#send state to the address
	
	//echo $singleAddress;
	
	
	$to_name="";
	$to_email=$singleAddress;
	$from_email = "stateofthestreet@taftstreetwinery.com";
	$from_name = "Taft Street Winery";
	$subject = "A Message from Taft Street Winery - " . $sos["date"];
		
	//echo $text_message;
	//echo $html_message;
	
	sendmail ("Taft Street Winery", "stateofthestreet@taftstreetwinery.com", $to_name, $to_email, $subject, $text_message, $html_message, "");
	
	echo "Sent to " . $to_email;
	
}
else
{
	
	#send state to mailist

	$sql = "select * from cs_mailist where email != ''";
	
	$mailist = $mysqli->query($sql);
	$x = 0;
	$subject = "State of the Street - " . $sos["date"];
	while($sub = $mailist->fetch_assoc()){
		
	if ($sub["email"] !== "") {
		
		$to_name=$sub["first name"] . " " . $sub["last name"];
		$to_email=$sub["email"];
		$q = $sub["id"] * 454;
		$this_message = str_replace("***id***", $q, $html_message);
		sendmail ("Taft Street Winery", "stateofthestreet@taftstreetwinery.com", $to_name, $to_email, $subject, $text_message, $this_message, "");
		//$addresses.= $to_email . "; ";
		
		$x++;
		
	}
		
	}

	echo $x . " emails sent." . " " . ($x / $mailist->num_rows) * 100 . "% completion rate";

}	

	
//sendmail ($from_name, $from_email, $to_name, $to_email, $subject, $text_message, $attachement);






?>
