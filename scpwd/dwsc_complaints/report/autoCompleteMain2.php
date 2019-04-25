<?php

include('../include/session.php');





$q = strtolower($_GET["q"]);

if (!$q) return;

//echo "select DISTINCT username as val from lead where username LIKE '$q%' ";

 $sql = "select DISTINCT username as val from lead where username LIKE '$q%' ";

 

 

$rsd = $database->query($sql);





while($rs = mysqli_fetch_array($rsd)) {

$cname = $rs['val'];

echo "$cname\n";

}





?>