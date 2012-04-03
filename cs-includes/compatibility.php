<?

include ('./cs-includes/browser.php');

//$browser = get_browser($_SERVER['HTTP_USER_AGENT'], true);

$browserPass = false;

//echo $browser["version"];

//print_r ($browser);
$browser = new Browser();



if ($browser->getBrowser() == Browser::BROWSER_FIREFOX) {
	
		if ($browser->getVersion() >= 3.6) {
				$browserPass = true;
		}
}

if ($browser->getBrowser() == Browser::BROWSER_CHROME) {
	
		if ($browser->getVersion() >= 10) {
				$browserPass = true;
		}
}

if ($browser->getBrowser() == Browser::BROWSER_IE) {
	
		if ($browser->getVersion() >= 8) {
				$browserPass = true;
		}
}

if ($browser->getBrowser() == Browser::BROWSER_OPERA) {
	
		if ($browser->getVersion() >= 8) {
				$browserPass = true;
		}
}

if ($browser->getBrowser() == Browser::BROWSER_SAFARI) {
	
		if ($browser->getVersion() >= 3) {
				$browserPass = true;
		}
}

if ($browser->getBrowser() == Browser::BROWSER_IPHONE) {
	
		if ($browser->getVersion() >= 3) {
				$browserPass = true;
		}
}

if ($browser->getBrowser() == Browser::BROWSER_IPAD) {
	
		if ($browser->getVersion() >= 3) {
				$browserPass = true;
		}
}


if ($browserPass == false) {
	
	
?>
<style>html{background:black;} body{width:600px; height:400px;}</style>
<body style="background:black; color:white !important; text-align:center; "><br><br><br><br>
<div class="compatibility"><img src="../cs-content/sites/lowells/themes/default/images/newlogo.png" border="0">
<br><br><br>
<h1>Welcome to Peter Lowell's</h1>
<p>
Unfortunately, you have reached us online using a browser that is not compatible with our website.
</p>
<p>
Please use the courtesy links below to download a newer browser.
</p>
<table width="200" border="0" align="center" cellpadding="10" cellspacing="4" style="margin:0px auto 0px auto;">
  <tr>
    <td align="center" valign="middle"><a href="http://www.apple.com/safari/" target="_blank"><img src="./cs-content/images/logo_safari_75x.png" alt="Apple Safari" width="46" height="50" border="0"></a></td>
    <td align="center" valign="middle"><a href="http://www.google.com/chrome/intl/en/p/google.html" target="_blank"><img src="./cs-content/images/logo_chrome_50x.png" alt="Google Chrome" width="45" height="45" border="0"></a></td>
     <td align="center" valign="middle"><a href="http://www.opera.com/download/" target="_blank"><img src="./cs-content/images/logo_opera_50x.png" alt="Opera 9.0" width="42" height="50" border="0"></a></td>

    <td align="center" valign="middle"><a href="http://www.mozilla.com/en-US/firefox/firefox.html" target="_blank"><img src="./cs-content/images/logo_ff.png" alt="Mozilla Firefox" width="51" height="50" border="0"></a></td>
    <td align="center" valign="middle"><a href="http://www.microsoft.com/windows/internet-explorer/worldwide-sites.aspx" target="_blank"><img src="./cs-content/images/logo_ie7_50x.png" alt="Microsoft Interent Explorer" width="51" height="50" border="0"></a></td>   
  </tr>
</table>

<p>
For the best experience, we recommend Google Chrome or Mozilla Firefox.
</p>
<p>
<?
	  //include (CS_THEMEPATH.'/footer.php');
  ?>
</p>
</div>

</body>
</html>

<? 
	exit;
}
?>