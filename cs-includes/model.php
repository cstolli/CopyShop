<?

$q = "select * from pages where label = '?'";
$stmt = $mysqli->prepare($q);
$stmt->bind_param('s', Q("page")); 
$stmt->execute();
$page = $stmt->get_result();
                                                    //bind results dynamically
call_user_func_array(array($stmt, 'bind_result'), $params); 
 
while ($stmt->fetch()) {                            //fetch all records
    foreach($row as $key => $val)                   //bind results to array
    {
        $c[$key] = $val;
    }
                                                    //build a new object class
    $class = new ReflectionClass(get_class($object));                                           
    $theobjects[] = $class->newInstanceArgs($c);    //instantiate with parameters
} 

?>


