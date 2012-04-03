
<?php //include("KEYWORDS") ?>
<? 


$sql = "select * from cs_pages";
if (Q("page") !== "") {$sql .= " where label = '".Q("page")."'";} else {$sql .= " where `menu order` = 1";}
$page = $mysqli->query($sql);
$contents = $page->fetch_array(MYSQLI_BOTH);
$csinfo = new cs_info($mysqli);
$contact_info = $csinfo->contact_info;



?>



<!-- html declaration -->

<meta http-equiv="X-UA-Compatible" content="IE=7" />
<!-- head -->
<head>





<? //include("ANALYTICS") ?>

<link href="<?=CS_THEMEPATH;?>/styles.css" rel="stylesheet" type="text/css" />


<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="<?=CS_THEMEPATH;?>/styles_ie6.css" media="screen"/><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?=CS_THEMEPATH;?>/styles_ie.css" media="screen"/><![endif]-->
<link rel="shortcut icon" href="<?=CS_THEMEPATH?>/favicon.ico" type="image/x-icon" /> 
<!--<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>-->


<?php /*?><script src="cs-includes/scripts/querystring.js" type="text/javascript" charset="utf-8"></script><?php */?>

<script type="text/javascript" src="cs-includes/YUI/2.7.0/utilities.js"></script> 
<script type="text/javascript" src="cs-includes/YUI/2.6.0/build/yahoo/yahoo-min.js"></script>

<script type="text/JavaScript" src="cs-includes/YUI/2.6.0/build/selector/selector-min.js"></script>
<!-- Dependencies -->
<script src="http://yui.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>

<!-- Source file -->
<script src="http://yui.yahooapis.com/2.9.0/build/element/element-min.js"></script>
<script type="text/JavaScript" src="//yui.yahooapis.com/2.9.0/build/effects/effects-min.js"></script>
<!-- Dependencies -->

<script type="text/JavaScript" src="cs-includes/YUI/2.6.0/build/tools/tools-min.js"></script>
<!-- Source file -->
<script src="http://yui.yahooapis.com/2.9.0/build/animation/animation-min.js" type="text/javascript"></script>
<script type="text/JavaScript" src="cs-includes/YUI/2.6.0/build/validation/validate.js"></script>

<?php /*?>
<script type="text/javascript" src="cs-includes/YUI/2.6.0/build/history/history-min.js"></script>



<script type="text/JavaScript" src="cs-includes/YUI/2.6.0/build/forms/forms.js"></script>

<script type="text/JavaScript" src="cs-includes/YUI/2.6.0/build/connection/connection-debug.js"></script>
<script type="text/JavaScript" src="cs-includes/YUI/2.6.0/build/gestures/gestures.js"></script>
<script type="text/JavaScript" src="cs-includes/YUI/2.6.0/build/dragdrop/dragdrop-min.js"></script><?php */?>
<script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<?php /*?><script type="text/JavaScript" src="cs-includes/facelift-1.2/flir.js"></script><?php */?>





<script src="<?=CS_THEMEPATH."/index.js"?>" type="text/javascript"></script>

<!-- page title -->
<title><?=$contents["title"]?></title>
<meta name="description" content="<?=$contents["description"]?>" />


<!-- end head -->
</head>