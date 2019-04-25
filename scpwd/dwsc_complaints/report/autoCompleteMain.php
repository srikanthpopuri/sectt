<?php
include('../include/session.php');


$q = strtolower($_GET["q"]);
if (!$q) return;

 $sql = "select DISTINCT name as name from createemployees where name LIKE '%$q%'";
$rsd = mysqli_query($sql);
while($rs = mysqli_fetch_array($rsd)) {
$cname = ucwords($rs['name']);
echo "$cname\n";
}
?>