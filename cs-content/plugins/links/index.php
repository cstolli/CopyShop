<? $sql = "select id, name, url as funkychunk, description from cs_links order by id asc";
$result = $ms->query($sql); ?>


<? include('list.php'); ?>