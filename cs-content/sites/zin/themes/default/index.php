<?
$mobile_browser = '0';
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
}    
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini') > 0) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0) {
    $mobile_browser = 0;
}

?>
 
<body>
<div id="wrapper">

<? 
if ($mobile_browser > 0 && Q("page") !=="" && Q("page") !=="mobile") { 

$mobile_browser = 0;
}

if ($mobile_browser == 0) { include('header.php'); }?>
<? 
 $contact = cs_get_contact_info($mysqli);
	$info = $contact->fetch_assoc();
if ($mobile_browser > 0) {
  $sql = "select * from cs_pages where label = 'mobile'";
   $mobilepage = $mysqli->query($sql);
  $contents = $mobilepage->fetch_assoc();

}

       $page =  strtolower($contents["label"]) ;
	$file = $page . ".php";
	//echo $file;
	
	if (file_exists(CS_THEMEPATH."/".$file)) { include($file); } else {include('page.php'); }



?>
<? if (file_exists(CS_THEMEPATH."/".$page . "_footer.php")) { include($page."_footer.php"); } else { include("footer.php");} ?>
</div>

</body>
</html>