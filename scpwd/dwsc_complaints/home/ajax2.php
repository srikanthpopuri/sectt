<?php
include('../include/session.php');

 
   if(isset($_POST['tableDisplay1']))

{?> 
<div class="col-md-12" >
<?php


	//Pagination code

  $limit=50;

   if(isset($_GET['page']))

   {

      $start = ($_GET['page'] - 1) * $limit;     //first item to display on this page

      $page=$_GET['page'];

   }

   else

   {
	   
	 

	   $start = 0;      //if no page var is given, set start to 0

		$page=0;

   }



//$condition = "";


$tableName = 'lead l';	
$date= strtotime(date("d-m-Y"));
if($_POST['tableDisplay1']=='all'){
$condition="assigned_mm='".$_SESSION['username']."'";	
}else{
$condition="assigned_mm='".$_SESSION['username']."' && assigned_employee='".$_POST['tableDisplay1']."'";

}



if(strlen($condition) > 0)
{

    //$condition = ' and '.$condition;

	$condition = ' where '.$condition;

}

//$query_string = $_SERVER['QUERY_STRING'];

$pagination = $session->showPagination1(SECURE_PATH."viewreminder/process.php?tableDisplay1=1",$tableName,$start,$limit,$page,$condition);

   $q = "SELECT * FROM $tableName ".$condition." and lead_status!='Dropped' ORDER BY timestamp desc";   

   $result_sel = $database->query($q);

   $numres = mysqli_num_rows($result_sel);

   	

   $query = "SELECT * FROM $tableName ".$condition." and lead_status!='Dropped' order by timestamp desc LIMIT $start,$limit";
   
   $data_sel = $database->query($query);



if(($start+$limit) > $numres)
{

	 $onpage = $numres;

	 }

	 else
	 {

	  $onpage = $start+$limit;

	 }

	 

	 

	 if($numres > 0)
	 {

		 echo '<p  class="pull-right label label-info" >Showing '.($start+1).' - '.($onpage).' results out of '.$numres.'</p>';

	

	 

	?>


<div class="clearfix"></div>
<div >
<table class="table table-striped table-bordered table-condensed table-hover">

    <tr><th>S.no</th><th>Name</th><th>Mobile Number</th><th>Assigned to</th><th>Reminder</th><th>Lead Status</th><th>EDIT/UPDATE/RE-VISITS</th></tr>

	<?php

	if(isset($_GET['page'])){

	if($_GET['page']==1)

	$i=1;

	else

	$i=(($_GET['page']-1)*50)+1;

	}else $i=1;

	

while($value = mysqli_fetch_array($data_sel))

{
	?>
    <tr>
<td><?php echo $i;?></td>

  <td><?php echo ucwords($value['name']);?></td>

  <td><?php echo ucwords($value['mobile']);?></td>
  
 <td><?php echo ucwords($value['assigned_employee']);?></td>
  
  <td><?php echo ucwords($value['reminder']);?></td>

   <td><?php echo ucwords($value['lead_status']);?></td>
       <td>
       <a class="group1 btn btn-sm btn-info"  href="<?php echo SECURE_PATH;?>viewreminder/process2.php?unid=<?php echo $value['unid'];?>">View More</a>
     <a class="group1 btn btn-sm btn-primary"  href="<?php echo SECURE_PATH;?>viewreminder/process4.php?unid=<?php echo $value['unid'];?>">Update</a>
     <?php
	  $query_rv=$database->query("select *, count(lu_status) as clu from lead_update where unid ='".$value['unid']."' and lu_status='5'");
	 if(mysqli_num_rows($query_rv)>0){
		$ret_query_rv=mysqli_fetch_array($query_rv);
		 if($ret_query_rv['clu']>2){
		 ?>
		<a class="btn btn-sm btn-warning"  href="#"><?php echo $ret_query_rv['clu']; ?> Re-Visits</a> 
		 
	<?php }else{}}else{}
	 ?>
     
            <?php

	   if($value['status']=='1')

	   {
		   ?>

		<!--   <a class="group1 btn btn-sm btn-success"  href="<?php echo SECURE_PATH;?>viewlead/process3.php?unid=<?php echo $value['unid'];?>">Activity</a>
-->
	  <?php  
	  } 
	  elseif($value['status']=='2') 
	  {

       ?>

        <a class="btn btn-sm btn-warning"  onClick="#">Activity Closed</a>

        <?php } ?>

       </td>
    </tr><?php

$i++;
}

	?>

    </table> 

</div>
    <div style="text-align:center"> <?php echo $pagination ;?></div>

	<?php

	 }

else
{

	?>

    <div style="text-align:center">No Results Found</div>

    <?php

}


?>
</div>

<?php }  
     