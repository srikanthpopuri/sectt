<?php
include('../include/session.php');

if(!$session->logged_in){
?>
<script type="text/javascript">
setStateGet('main','<?php echo SECURE_PATH;?>login_process.php','loginForm=1');
</script>

<?php
}

?>

<style>
    hr {
        display: block;
        height: 0px;
        border: 0;
        border-top: 1px solid #33C1FF;
        margin: 0;
    }
</style>

<script type="text/javascript">
    $( ".datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd-mm-yy",
        yearRange: "1920:2025"
    });
</script>


<?php
//Metircs Forms, Tables and Functions
//Display courses form
if(isset($_REQUEST['addForm'])){
}



//Process and Validate POST data
if(isset($_POST['validateForm'])){
}

//Delete experience 
if(isset($_GET['rowDelete'])){
}


if(isset($_REQUEST['update_enable']))
{
	$idess='';

    		$database->query("INSERT INTO `subsidy_comments` VALUES ('".$idess."', '".$_REQUEST['id']."' , '".$_REQUEST['comments_ar']."','6','".$session->username."','".time()."')");

	$database->query("update subsidy_pwd set status = '6' ,rdo_status = '6' , upload5a='".$_REQUEST['upload5a']."' , comments_ar='".$_REQUEST['comments_ar']."' where id = '".$_REQUEST['id']."'");

	?>
    <span class="success">Approved successfully!</span>
  
  <script type="text/javascript">
      setStateGet('adminTable','<?php echo SECURE_PATH;?>rdo_form3_view/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>
   <?php 
	
	
	
}

if(isset($_REQUEST['update_disable']))

{
	$idess='';
			$database->query("INSERT INTO `subsidy_comments` VALUES ('".$idess."', '".$_REQUEST['id']."' , '".$_REQUEST['comments_ar']."','7','".$session->username."','".time()."')");

	$database->query("update subsidy_pwd set status = '7' , rdo_status = '7' , upload5a='".$_REQUEST['upload5a']."' , comments_ar='".$_REQUEST['comments_ar']."' where id = '".$_REQUEST['id']."'");
    
	?>
    <span class="success">Rejected successfully!</span>
  
  <script type="text/javascript">
      setStateGet('adminTable','<?php echo SECURE_PATH;?>rdo_form3_view/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>
   <?php 
	
}


if(isset($_REQUEST['dwo_update']))
{
    
	$database->query("update complaints_form set status = '4',reasons = '".$_REQUEST['reasons']."'   where unid = '".$_REQUEST['ides']."'");
	
	$query_ret = $database->query("select * from complaints_form where unid = '".$_REQUEST['ides']."'");
	$ret_query = mysqli_fetch_array($query_ret);
	
	    $database->query("INSERT into `complaints_comments` values(NULL,'".$_REQUEST['ides']."','".$ret_query['forward_type']."','".$ret_query['forward_to']."','".$_REQUEST['reasons']."','','','".$session->username."','".time()."') ");


	?>
  
  <script type="text/javascript">
      $('#messageDetails').modal('hide');
	    alert('Submitted Successfully!');


    animateForm('<?php echo SECURE_PATH;?>grievances_dwo_view/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>
   <?php 
	
	
	
}


//Display table
if(isset($_GET['tableDisplay'])){
	


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
$tableName = 'complaints_form';
    if($session->userlevel == 9 ||$session->userlevel == 8)
    {
        $condition = '';

    }elseif($session->userlevel == 6)
    {
        $d = $database->query("select employee_district from users WHERE username='".$session->username."'");
        $dis = mysqli_fetch_array($d);

        $condition = "district = '".$dis['employee_district']."' and (status = '2' or status = '4' or status = '6' or status = '8')";
    }else{
        $condition = '';

    }
if(strlen($condition) > 0){
    $condition = 'WHERE '.$condition;
}
//$query_string = $_SERVER['QUERY_STRING'];

$pagination = $session->showPagination(SECURE_PATH."grievances_dwo_view/process.php?tableDisplay=1&",$tableName,$start,$limit,$page,$condition);
   $q = "SELECT * FROM $tableName ".$condition." ORDER BY id DESC";   
   $result_sel = $database->query($q);
   $numres = mysqli_num_rows($result_sel);
  $query = "SELECT * FROM $tableName ".$condition." ORDER BY id DESC LIMIT $start,$limit";
  $data_sel = $database->query($query);

if(($start+$limit) > $numres){
	 $onpage = $numres;
	 }
	 else{
	  $onpage = $start+$limit;
	 }
	 
	 
	 if($numres > 0){
		 echo '<h4><p  class="pull-right label label-info" >Showing '.($start+1).' - '.($onpage).' results out of '.$numres.'</p></h4>';

	 
	?>
  <div class="clearfix"></div>



<table class="table table-striped table-bordered table-condensed table-hover">

             <tr class="blue-color"><th style="text-align:left;">SNo</th><th>District</th><th style="text-align:left;">Name</th><th style="text-align:left;">Age</th><th style="text-align:left;">Sex</th><th style="text-align:center;">View More</th><th width="300px;">Status of Application</th></tr>

             <?php
             if(isset($_GET['page'])){
                 if($_GET['page']==1)
                     $i=1;
                 else
                     $i=(($_GET['page']-1)*50)+1;
             }else $i=1;
             $k = 1;
             while($value = mysqli_fetch_array($data_sel))
             {
                 ?><tr>
                 <td><?php echo $k;?></td>
                 <?php
                 $query02 = $database->query("select uid,district from global_districts where uid  = '".$value['district']."'");
                 $ret_query02 =mysqli_fetch_array($query02);
                 ?>
                 <td><?php echo ucwords($ret_query02['district']);?></td>
                 <td><?php echo ucwords($value['name']);?></td>
                 <td><?php echo ucwords($value['age']);?></td>
 <?php
				 $ab='';
				 if($value['sex'] == 1){
					$ab =  "Male" ;
				 }elseif($value['sex'] == 0){
					$ab =  "Female" ; 
					
				 }
				 else{
					$ab = 'Not Selected'; 
				 }
				 
				 ?>
                 <td><?php echo $ab;?></td>
                 

                
                 

                 <td style="text-align:center;">
                     <a data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>grievances_dwo_view/process1.php','viewDetails=1&id=<?php echo $value['unid'];?>')">
                         <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                     </a>
                 </td>




<?php
                 $query03 = $database->query("select uid,district from global_districts where uid  = '".$value['forward_to']."'");
                 $ret_query03 =mysqli_fetch_array($query03);
                 ?>
                 <td style="text-align:left;">
                     <?php
 if($value['status']=='2'){ ?>
                         <a class="btn btn-info" data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>grievances_dwo_view/process2.php','viewDetails=1&id=<?php echo $value['unid'];?>')">
Click Here to Reply </a>
                         <?php
                     }
                  
                     else if($value['status']=='4'){ ?>
                         <b style="color:#00F;">Replied to Admin</b>
                         <?php
                     }
					 else if($value['status']=='6'){ ?>
                         <b style="color:#F00;">Re-Assigned by Admin</b><br />
                          <a class="btn btn-warning" data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>grievances_dwo_view/process2.php','viewDetails=1&id=<?php echo $value['unid'];?>')">
Click Here to View & Reply </a>
                         <?php
                     }
					  else if($value['status']=='8'){ ?>
                         <b style="color:#F00;">Closed by Admin</b><br />
                       
                         <?php
                     }

                     ?>

                 </td>

                 </tr><?php
                 $k++;}
             ?>

         </table>

    
    
    <div style="text-align:center"> <?php echo $pagination ;?></div>
	<?php
	 }
else{
	?>
    <div style="text-align:center">No Results Found</div>
    <?php
}


}




?>

<style>
.blue-color{
	color:#00F;

}

</style>
<script type="text/javascript">

$( ".datePicker" ).datepicker({

			changeMonth: true,

			changeYear: true,

			dateFormat: "d-m-yy",

			yearRange: "1990:2025", 
			
			//minDate: 0


		});
</script>

<script type="text/javascript"> $("#leftDiv").sticky({topSpacing:10});</script>