


<!--[if lt IE 9]>
<script type="text/JavaScript">

  window.onload = function()
  {
      /*
      The new 'validTags' setting is optional and allows
      you to specify other HTML elements that curvyCorners
      can attempt to round.

      The value is comma separated list of html elements
      in lowercase.

      validTags: ["div", "form"]

      The above example would enable curvyCorners on FORM elements.
      */
      settings = {
          tl: { radius: 10 },
          tr: { radius: 10 },
          bl: { radius: 10 },
          br: { radius: 10 },
          antiAlias: true,
          autoPad: false,
          validTags: ["div"]
      }

      /*
      Usage:

      newCornersObj = new curvyCorners(settingsObj, classNameStr);
      newCornersObj = new curvyCorners(settingsObj, divObj1[, divObj2[, divObj3[, . . . [, divObjN]]]]);
      */
      var myBoxObject = new curvyCorners(settings, "cs_edit_list");
      myBoxObject.applyCornersToAll();
  }
  
</script>


<![endif]-->

<?

//-----------------------------------
//Login  for Copyshop
//version 1.0
//-----------------------------------





$username = F("f_log");
$password = F("f_pass");

$sql = "select * from cs_users where username = '$username' and password = '$password' limit 1";
//echo $sql;
$users = $mysqli->query($sql);
//echo $mysqli->error;


 // it's a failed login


if (Q("action") == "logout" || $_SESSION["username"] == "") {
//	echo "yup";
	


if (Q("action") == "logout" )
{
$_SESSION["username"] = "";
$_SESSION["password"] = "";

}



//echo $users->num_rows;


if ($users->num_rows > 0) {
	
	
//echo $_SESSION["username"];
//echo $_SESSION["password"];
	$user = $users->fetch_object();
	$_SESSION["username"] = $user->username;
	$_SESSION["password"] = $user->password;
	$_SESSION["fullname"] = $user->full_name;
	$_SESSION["email"] = $user->email;

} else {
	?>
    
<br />
<br />
<div style="width:100%; text-align:center;">
  <div id="csLogo"><img src="../cs-content/images/header-logo-stainless.png" /></div>

  <div class="cs_edit_list" align="left" style="width:230px; margin-left:auto; margin-right:auto; background:#eee" > 
 
  <form style="margin-left:38px;"action="?" method="post" enctype="application/x-www-form-urlencoded" name="signin" id="signin">
    <label class="cs_text_label">Username:</label><br />
      <input class="cs_text_field" type="text" name="f_log" id="f_log" />
      <br />


      <label class="cs_text_label">Password:</label><br />
      <input class="cs_text_field" type="password" name="f_pass" id="f_pass" />

<br />

<br />

<input type="submit" class="submit" name="f_submit" id="f_submit" value="Sign In" />
</form>
  </div>
</div>
<div id="login_welcome"  style="width:600px; margin:20px auto 20px auto;text-align:center;">
<h4 style="float:none; text-align:center;">Forget your login?  <a title="TODO: Create login reminder email system" style="text-decoration:underline">Login Reminders Coming Soon.</a></h4>
</div>
<div id="login_footer" style="width:600px; text-align:center; font-size:73%; font-color:#996; margin:20px auto 0 auto;">&copy <?=date('Y');?> Chris Stoll & WorldWide Digital Media. Thanks for using CopyShop!</div>
<?
exit();
}
}


?>

