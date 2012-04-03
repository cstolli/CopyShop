
<link rel="icon" href="favicon.ico" type="image/ico" />
<link rel="SHORTCUT ICON" href="favicon.ico" />
<title>Welcome to Peter Lowell's Restaurant</title>
<link href="<?=CS_THEMEPATH?>/styles.css" rel="stylesheet" type="text/css">
<script src="<?=CS_THEMEPATH?>/prototype.js" language="javascript"></script>


<script language="javascript">AC_FL_RunContent = 0;
function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		  // alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   //alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    //alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    //alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    //alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    //alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		   // alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}

	function updateDiv(req){
	//alert('hello');
	//setTimeout("changeResult('"+req.responseText+"')", .5)
	//new Effect.Fade('emailResult', {duration:.5, queue: 'front' });

	$('emailResult').innerHTML = req.responseText;
	//new Effect.Fade('emailResult', {duration:.5, queue: 'front' });
	//setTimeout("changeResult('"+req.responseText+"')", 500);
		//new Effect.Appear('emailResult', {duration:.5, queue: 'end'});

}

function changeResult(xstr)
{
$('emailResult').innerHTML = xstr;
}
function xytest(xEmail){
	
	//new Effect.Fade('emailResult', {duration:.1});
	$('emailResult').innerHTML = "Saving...";
	//new Effect.Appear('emailResult', {duration:.2, queue: 'end'});
	alert(xEmail);

	var url = "test.php";
	//new Ajax('../savemail.php?email='+xEmail, { method: 'get', update: $('emailResult') }).request();
	
	if (echeck(xEmail)) {
	//new Effect.Fade('emailResult', {duration:.5, queue: 'front' });
	new Ajax(url, { method: 'get', update: $('emailResult') }).request();
	
	//ajax = new Ajax.Updater('emailResult',
	//'../savemail.php?email='+xEmail,
	//{method: 'GET', onComplete: updateDiv, asynchronous: "false"});
	
	
	}
	else
	{
	//new Effect.Fade('emailResult', {duration:.5, queue: 'front' });
	changeResult('Please enter a valid email address');
		//new Effect.Appear('emailResult', {duration:.5, queue: 'end'});
	}

}

function showSlideShow()
{
 	
	document.getElementById('photos').style.visibility='visible';

	//$('caption').innerHTML = 'Click the thumbnails below to browse our images.';

}

function hideSlideShow()
{


document.getElementById('photos').style.visibility='hidden';

}


</script>

<script src="<?=CS_THEMEPATH?>/AC_RunActiveContent.js" language="javascript"></script>




<style type="text/css">

#emailResult {
	position:absolute;
	width:185px;
	height:110px;
	z-index:10;
	left: 117px;
	top: 620px;
}



#photos {
	position:absolute;
	width:339px;
	height:530px;
	left:316px;
	top:80px;
	
	visibility:hidden;
	z-index:0;

}

</style>


</head>

<body bgcolor="#3F3F3F" >
<!--url's used in the movie-->
<!--text used in the movie-->
<!--
000%
000%
-->
<!-- saved from url=(0013)about:internet -->
<br>

<div align="center" >
<div >

<div style="position:relative; width:893px; border:solid 1px wheat; padding:8px; z-index:4;" >
<div >

<!-- div included for flickr slideshow -->
<div id="photos">

<script src="cs-includes/scripts/mootools-release-1.11.js" type="text/javascript" charset="utf-8"></script>
<script src="cs-includes/scripts/moopix/moopix.v1.0.js" type="text/javascript" charset="utf-8"></script>
<script src="cs-includes/scripts/moopix/showpix.v1.2.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="/styles/screen.css" type="text/css" media="screen" charset="utf-8" />








<!-- Major Column -->
<center>
	<a class="set_link" href="javascript:moopixit('72157624910653580');">The Farm</a> | <a class="set_link" href="javascript:moopixit('72157624910932756');">The Food</a> | <a class="set_link" href="javascript:moopixit('72157624924135533');">The Restaurant</a><br><br>
			<div id="PhotoBox" style="text-align:center;" >
            <center>
            
            	<div id="ThumbContainer" style="margin-top:0px; height:100px; text-align:center;"></div><br>
				
			  <div id="Container">
					<img id="Photo" src="img/c.gif" alt="Photo" style="width:328px; display:block; margin:0px auto 0px auto;" />
				  
				    <div id="Loading" style="position:relative;  top:75px; display:none; text-align:center; width:100%"> Loading...</div>
			  </div>
				
				<div id="CaptionContainer" style="text-align:center;width:328px; position:relative; left:0px; top:0px;">
					<div id="Caption">Click the thumbnails below to browse our photos.</div>

					<span id="Counter" style="display:none;"></span> <span id="Caption" style="display:none; font-family:'Trebuchet MS'; font-size:14px; font-weight:bold; color:#555555; text-align:center;"></span>
				</div>
                <div id="Controls" style="margin-top:10px; width:328px;">
						<a id="PrevLink" href="javascript://" title="Previous Photo" style="color:#555555;padding-right:10px;">Previous</a> 

						<a id="PlayToggle" href="javascript://" title="Play/Pause Slideshow" style="color:#555555;padding-right:10px;">Play</a> 
						<a id="NextLink" href="javascript://" title="Next Photo" style="color:#555555;">Next</a> 
					</div>


					<div>
              
			
                </div>
                </center>
			</div>
	</center>
<br />

    
    <script type="text/javascript">
	window.addEvent('domready', moopixit('72157624910653580'));
	
	function moopixit(photosetid){
		//alert(tag);
		hasThumbs = false;
		document.getElementById('ThumbContainer').innerHTML = '';
		
		new MooPix().callFlickrUrl({ method: 'flickr.photosets.getPhotos', photoset_id: photosetid, per_page: '12' });
		
		// Handle the default callback method from Flickr
		jsonFlickrApi = function(rsp){
			if (rsp.stat == 'ok' ){
				if (rsp.photoset){				
					// New ShowPix slideshow instance if photos are found
					Slideshow = new ShowPix(rsp);
			    } else if (rsp.sizes){
					// If size data returned from Flickr, resize 
					Slideshow.endResize(rsp);
				}
				if(hasThumbs == false) { Slideshow.createThumbs(Slideshow.rsp); Slideshow.setActiveThumb(); }
			}
		}
		
		
	}
		
</script>

</div>

<!-- end photo slideshow -->


<div id="emailResult" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; text-align:left; "></div>
</div>
<script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0',
			'width', '893',
			'height', '718',
			'src', '<?=CS_THEMEPATH?>/main.swf',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
						'scale', 'showall',
			'wmode', 'transparent',
			'devicefont', 'false',
			'id', 'main',
			'bgcolor', '#ffffff',
			'name', 'main',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', '<?=CS_THEMEPATH?>/main',
			'salign', ''
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="893" height="718" id="main" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
    <param name="wmode" value="transparent" />
    <param name="play" value="true" />
	<param name="movie" value="<?=CS_THEMEPATH?>/main.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />	<embed src="<?=CS_THEMEPATH?>/main.swf" quality="high" bgcolor="#ffffff" width="893" play="true" height="718" name="main" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>

</div>
</div>
</div>
</body>
</html>
