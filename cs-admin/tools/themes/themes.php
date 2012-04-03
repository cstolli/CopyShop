
<?php /*

Filename: themes.php
Function: provides a method of viewing and selecting themes
Author: Chris Stoll
Date Added: 7/9/2011

*/ 
$themedirs = array();
$cssfiles = array();
$themeinfo = array();
$curtheme = CS_THEME;
$path = "../" . CS_SITEPATH . "/themes/";

$skip = array('.','..','.svn');

$dir = @opendir($path);


while ($file = @readdir($dir)){
	
	
      if (is_dir($path.$file) && ($file == $curtheme)){
		  	
			//echo $file;
			
            
			$themedir = @opendir($path . "/$file");
			
			
			//echo $path . "styles.css";
				
				  //gotcha bitch
					
					$themeinfo = cs_parse_theme_info($file);
					
					?>
                    <div id="<?=$themedir?>_frame" class="uiframe theme" />
                    <? if (file_exists("../" . CS_THEMEPATH . "/thumb.jpg")){ ?>
                    <img src="<?="../" . CS_THEMEPATH . "/thumb.jpg";?>" border="0"  width="200"/>
                    <? } ?>
                    <header>
                    
                    <h2><b>Current Theme:</b> <?=$themeinfo["name"]?></h2>
                    </header>
                    <p id="current_theme_info" class="theme_info" />
                    <b>Designer: </b><a href="<?=$themeinfo["designer url"];?>" target="_new"><?=$themeinfo["designer"]?></a><br>
                    <b>Developer: </b><a href="<?=$themeinfo["developer url"];?>" target="_new"><?=$themeinfo["developer"]?></a><br>
                    <b>Date: </b><?=$themeinfo["date"]?><br>
                    <b>Description: </b><?=$themeinfo["description"]?><br>
                    </p>
                    </div>
					</div>
					<?
				
		
		
      }else{ 
	  	
		if (is_dir($path.$file) && !in_array($file, $skip)) {
			
			$themedirs[] = $file;
			//echo $themedirs[0];
			
		}
	  }
}

function cs_parse_theme_info($file) {


	$myFile = "../" . CS_SITEPATH . "/themes/$file/styles.css";
	//echo $myFile;
	$fh = fopen($myFile, 'r');
	$theData = fgets($fh);
	$theData = fgets($fh);
	
	//echo $theData;
	
	//echo $varpos;
	
	
	$values = array("name"=>"", "designer"=>"", "developer"=>"", "date"=>"", "description"=>"", "designer url"=>"", "developer url"=>"");
	
	$theData = fgets($fh);
	$values["name"] = str_replace("Theme: ", "", $theData);
	
	$theData = fgets($fh);
	$values["designer"] = str_replace("Designer: ", "", $theData);
	
	$theData = fgets($fh);
	$values["designer url"] = str_replace("Designer URL: ", "", $theData);
	
	$theData = fgets($fh);
	$values["developer"] = str_replace("Developer: ", "", $theData);
	
	$theData = fgets($fh);
	$values["developer url"] = str_replace("Developer URL: ", "", $theData);
	
	$theData = fgets($fh);
	$values["date"] = str_replace("Date: ", "", $theData);
	
	$theData = fgets($fh);
	$values["description"] = str_replace("Description: ", "", $theData);
	
	
	

	fclose($fh);

	return $values;
	
}


?>


<div id="list_div" class="themes">
<h3>Other Themes</h3>
<ul id="list_ul" class="editor">
<? //list files in theme folder 

//get files


// Open a known directory, and proceed to read its contents


@closedir($dir);
sort($themedirs);

if (count($themedirs) == 0) {
	
?><em class="error">There are no additional themes installed.</em><?
}else{
for ($i=0; $i<count($themedirs); $i++){
      

	 // $themefile = fopen($path . "/styles.css")
	  $themeinfo = cs_parse_theme_info($themedirs[$i]);
	  if ($themeinfo !== "") {
	  ?>
      
      <div id="<?=$themedirs[$i]?>_frame" class="uiframe theme thumb" />
        <img src="<?="../" . CS_SITEPATH . "/themes/" . $themedirs[$i]. "/thumb.jpg";?>" border="0" width="100"  /><br>
        
        <b>Theme Name:</b> <?=$themeinfo["name"]?><br>
        <b>Date: </b><?=$themeinfo["date"]?><br>
        
      </div>
      
      <?
      }
}

echo $themes;

}
?>
</ul>

</div>




