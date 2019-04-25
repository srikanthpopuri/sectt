<?php
include('../include/session.php');


$q = strtolower($_GET["q"]);
if (!$q) return;

 $sql = "select DISTINCT area as val from lead where area LIKE '$q%' ";
 
 
$rsd = $database->query($sql);


while($rs = mysqli_fetch_array($rsd)) {
$cname = $rs['val'];
echo "$cname\n";
}


?>