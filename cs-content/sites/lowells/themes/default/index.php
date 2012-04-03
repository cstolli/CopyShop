<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="<?=CS_THEMEPATH?>/css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="<?=CS_THEMEPATH?>/js/libs/modernizr-2.5.3.min.js"></script>
    <title>Welcome to Peter Lowell's Restaurant</title>
    <link href="<?=CS_THEMEPATH?>/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?=CS_THEMEPATH?>/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?=cs_print($mysqli, cs_get_copy($mysqli, "site background")); 

?>

<header>
<img alt="Peter Lowells West County Organic" src="<?=CS_THEMEPATH?>/images/newlogo.png" />
</header>
<div id="wrapper" class="<?=$contents["label"];?>">
<?  
	$page = '';
	$page =  strtolower($contents["label"]) ;
	
?>
<? 
$file = $page . ".php";
if (file_exists(CS_THEMEPATH."/".$file)) { include($file); } else { }?>
	<? if ($contents["sidebar"]) {?>
	<div id="sidebar" class="background">
    	
    	<figure id="date">
        	<div class="number">
            <?=date('d');?>
            </div>
            <hr>
            <div class="monthyear">
            <?=date('F');?>
            <Br><bR> 
            </div>
        
        </figure>
        
       
       <?=cs_print($mysqli, cs_get_copy($mysqli, 'sidebar'));?>      
       
   	</div>
    <? 
	
	}else{$contentClass="wide";} ?>
    <div id="content" class="background <?=$contentClass?>">
    	<?=cs_print($mysqli, $contents["content"]);?>
    </div>

	<div id="nav">
		
		<? include('menu.php'); ?>
	</div>

</div>
<footer>

</footer>


<!-- scripts concatenated and minified via ant build script-->
<script src="<?=CS_THEMEPATH?>/js/plugins.js"></script>
<script src="<?=CS_THEMEPATH?>/js/script.js"></script>
<!-- end scripts-->

<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>


</body>
</html>
