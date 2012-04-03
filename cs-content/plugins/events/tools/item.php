<? 


	$sql = "select * from cs_events where id = ". Q("id");


	$zones = $mysqli->query($sql);
?>

<div class="cs_item_tool_wrapper" style="width:1000px; float:left;">
  <? $xtrafields = "";?>
  <? cs_item_tool($mysqli, $table, Q("id"), "", "", "", $xtrafields); ?>
  <? if (Q("id")){ ?>

    <? cs_uploader($mysqli, Q("tbl"), Q("id"), "Select Flyer for Upload", "flyers", "1"); }	?>
	
</div>
