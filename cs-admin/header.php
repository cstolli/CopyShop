
<!--[if lt IE 9]>
<script TYPE="text/JavaScript">

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
          tl: { radius: 4 },
          tr: { radius: 4 },
          bl: { radius: 0 },
          br: { radius: 0 },
          antiAlias: true,
          autoPad: false,
          validTags: ["div"]

      }
	  
	  settings2 = {
	      tl: { radius: 0 },
          tr: { radius: 0 },
          bl: { radius: 4 },
          br: { radius: 4 },
          antiAlias: true,
          autoPad: false,
          validTags: ["div"]
	
	  
	  }
		
		settings3 = {
	      tl: { radius: 8 },
          tr: { radius: 8 },
          bl: { radius: 8 },
          br: { radius: 8 },
          antiAlias: true,
          autoPad: false,
          validTags: ["div"]
	
	  
	  }
      /*
      Usage:

      newCornersObj = new curvyCorners(settingsObj, classNameStr);
      newCornersObj = new curvyCorners(settingsObj, divObj1[, divObj2[, divObj3[, . . . [, divObjN]]]]);
      */
      var myBoxObject = new curvyCorners(settings, "cs_tools_menu_item_div");
	  var myBoxObject2 = new curvyCorners(settings, "cs_tools_menu_item_active_div");
	  //var myBoxObject3 = new curvyCorners(settings2, "cs_tools_header_menu");
	  var csListBox = new curvyCorners(settings3, "cs_edit_list");
	  var csSideBar = new curvyCorners(settings3, "cs_sidebar");
      myBoxObject.applyCornersToAll();
	  myBoxObject2.applyCornersToAll();
	 // myBoxObject3.applyCornersToAll();
	  csListBox.applyCornersToAll();
	  csSideBar.applyCornersToAll();
	  
	  //$('cs_tools_header').setStyle('display', 'block');
	  
	 
  }
  
  
  
</script>

<![endif]-->

<div ID="cs_tools_header">

<div CLASS="cs_tools_header_menu" style="padding:0">
<img align="absmiddle"  SRC="../cs-content/images/header-menu-left.gif" />
<a CLASS="cs_tools_header_menu_link" HREF="?action=logout">Logout</a> - 
<a CLASS="cs_tools_header_menu_link" HREF="../" target="_blank">View Site</a>
<img  align="absmiddle" SRC="../cs-content/images/header-menu-right.gif" />
</div>
<div id="brand" style="height:30px;">
<img ALIGN="left" STYLE="margin-top:10px; margin-right:10px;"  SRC="../cs-content/images/header-logo-stainless.png" />
<img ALIGN="left"  style="margin-bottom:10px; margin-top:20px;" SRC="../cs-content/images/cs-loading.gif" ID="cs_loading_gif" />
<div class="version"><?=CS_VERSION?> <b><?=CS_CODENAME?></b></div><div class="slogan"><?=CS_SLOGAN?></div><div class="welcome">Welcome, <b><?=$_SESSION["username"]?></b>. </div>
</div>




</div>
<?   ?>