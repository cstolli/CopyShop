

<?php //include("KEYWORDS") ?>
<? 


$sql = "select * from cs_pages";
if (Q("page") !== "") {$sql .= " where label = '".Q("page")."' or label like '%".str_replace(array("-", "_", ".html"), array(" ", " ", ""), Q("page"))."%'";} else {$sql .= " where `menu order` = 1";}
$page = $mysqli->query($sql);
$contents = $page->fetch_array(MYSQLI_BOTH);
$csinfo = new cs_info($mysqli);
$contact_info = $csinfo->contact_info;



?>



<!-- head -->
<head>




<!-- meta definitions, include seo-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? //include("ANALYTICS") ?>

<link href="<?=CS_THEMEPATH;?>/styles.css" rel="stylesheet" type="text/css" />


<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="<?=CS_THEMEPATH;?>/styles_ie6.css" media="screen"/><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?=CS_THEMEPATH;?>/styles_ie.css" media="screen"/><![endif]-->
<link rel="shortcut icon" href="<?=CS_THEMEPATH?>/favicon.ico" type="image/x-icon" /> 
<!--<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>-->


<?php /*?><script src="cs-includes/scripts/querystring.js" type="text/javascript" charset="utf-8"></script><?php */?>
<!-- Combo-handled YUI JS files: --> 
<script type="text/javascript" src="http://yui.yahooapis.com/combo?2.9.0/build/utilities/utilities.js&2.9.0/build/selector/selector-min.js"></script> 
<?php /*?><script type="text/JavaScript" src="cs-includes/facelift-1.2/flir.js"></script><?php */?>
<script type="text/JavaScript" src="cs-includes/YUI/2.6.0/build/validation/validate.js"></script>

<script src="<?=CS_THEMEPATH."/index.js"?>" type="text/javascript"></script>



<!-- page title -->
<title><?=$contents["title"]?></title>
<meta name="description" content="<?=$contents["title"]?>" />

<meta name="keywords" content="<?=$contents["keywords"]?>" />
<!-- end head -->


<meta property="og:title" content="<?=$contents["title"]?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://<?=$_SERVER['HTTP_HOST']?>" />
<meta property="og:site_name" content="<?=$contents["title"]?>" />
<meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST']?>/<?=CS_THEMEPATH?>/images/opengraphicon.gif" />
<meta property="fb:admins" content="<?=$contact_info["facebook"]?>" />
<link href="https://plus.google.com/<?=$contact_info["google plus"]?>" rel="publisher" />
<meta content="<?=$contact_info["google webmaster tools"]?>" name="google-site-verification" />

</head>
<? include ('compatibility.php'); ?>

