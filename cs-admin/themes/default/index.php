<body>
<? $contact = cs_get_contact_info($mysqli);
	$info = $contact->fetch_assoc();
?>
  
  <div id="header">
  	
 
    <img class="headshot" src="<?=CS_THEMEPATH?>/images/jimmurrayshot.jpg" align="left"/>
    <img class="logo" src="<?=CS_THEMEPATH?>/images/logo.jpg" />
       <div id="logo">
  	PGTAA Certified Professional Golf Instruction
    </div>
    
  </div>
  
    <div id="nav_bar">
  
    <!-- now superimpose menu -->
    <? include('menu.php'); ?>
  </div>
  
  
  <div id="content">

<?php /*?>	<h1><?=$contents["label"];?></h1><?php */?>

  <!-- build the backdrop, hills forward -->
  <!-- and superimpose site content-->
  <? include('content.php'); ?>
  
  
 	</div>
  
  

<? include('footer.php'); ?>
</body>
</html>