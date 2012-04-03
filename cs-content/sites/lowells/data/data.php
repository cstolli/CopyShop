
<model>



  <fonts>



    <font><name>Georgia</name><size>11</size></font>



    <font><name>Times New Roman</name><size>13</size></font>



    <font><name>Verdana</name><size>10</size></font>



    <font><name>Arial</name><size>12</size></font>



    <font><name>Helvetica</name><size>12</size></font>



  </fonts>
	<hours>
<? $sql = "select * from cs_copy where name like '%hours%'"; 
	$story = $mysqli->query($sql)->fetch_assoc(); ?>
	


		<![CDATA[<?=str_replace("\n", "<br>", cs_find_content_tags($mysqli,$story["content"]));?>]]>



	</hours>
    


	<our_story>
<? $sql = "select * from cs_pages where name like '%story%'"; 
	$story = $mysqli->query($sql)->fetch_assoc(); ?>
	


		<intro><![CDATA[<?=cs_find_content_tags($mysqli,$story["content"]);?>]]></intro>



	</our_story>
    
<?  $sql = "select * from cs_pages where name like '%events%'"; 
			$events = $mysqli->query($sql)->fetch_assoc(); ?>
	<eventlist>
    <![CDATA[<?=cs_find_content_tags($mysqli, $events["content"]);?>]]>
    </eventlist>
    
    <?  $sql = "select * from cs_pages where name like '%press%'"; 
			$press = $mysqli->query($sql)->fetch_assoc(); ?>
	<presslist><![CDATA[<?=cs_find_content_tags($mysqli, $press["content"]);?>]]></presslist>

		<pages>
		<?  $sql = "select * from cs_pages where `print` = true order by `menu order` asc"; 
			$result = $mysqli->query($sql); ?>
	
		<? while ($page = $result->fetch_assoc()) { ?>

		<page><name><![CDATA[<?=strtoupper($page["label"]);?>]]></name></page>
		
        <? } ?>

		</pages>


	<community_photos>

	<intro>

	<![CDATA[]]></intro>

	</community_photos>



	<community>



		<section>

<? $sql = "select * from cs_copy where name like '%organic%'"; 
	$story = $mysqli->query($sql)->fetch_assoc(); ?>

			<name><![CDATA[<?=strtoupper($story["label"]);?>]]></name>

 

			<text><![CDATA[<?=$story["content"]?>]]></text>



		</section>



		<section>
<? $sql = "select * from cs_copy where name like '%links%'"; 
	$story = $mysqli->query($sql)->fetch_assoc(); ?>

			<name><![CDATA[<?=strtoupper($story["label"]);?>]]></name>
			<text><![CDATA[<?=cs_find_content_tags($mysqli, $story["content"]);?>]]></text>



		</section>



		<section>
<? $sql = "select * from cs_copy where name like '%biodynamic%'"; 
	$story = $mysqli->query($sql)->fetch_assoc(); ?>


			<name><![CDATA[<?=strtoupper($story["label"]);?>]]></name>



			<text><![CDATA[<?=cs_find_content_tags($mysqli, $story["content"]);?>]]></text>



		</section>



		<section>

<? $sql = "select * from cs_copy where name like '%county%'"; 
	$story = $mysqli->query($sql)->fetch_assoc(); ?>

			<name><![CDATA[<?=strtoupper($story["label"]);?>]]></name>



			<text><![CDATA[<?=cs_find_content_tags($mysqli, $story["content"]);?>]]></text>



		</section>



		<section>

<? $sql = "select * from cs_copy where name like '%farm%'"; 
	$story = $mysqli->query($sql)->fetch_assoc(); ?>

			<name><![CDATA[<?=strtoupper($story["label"]);?>]]></name>



			<text><![CDATA[<?=cs_find_content_tags($mysqli, $story["content"]);?>]]></text>



		</section>



		<section>

<? $sql = "select * from cs_copy where name like '%coffee%'"; 
	$story = $mysqli->query($sql)->fetch_assoc(); ?>

			<name><![CDATA[<?=strtoupper($story["label"]);?>]]></name>



			<text><![CDATA[<?=cs_find_content_tags($mysqli, $story["content"]);?>]]></text>



		</section>



	</community>


<? include('menu.xml'); ?>
	
</model>