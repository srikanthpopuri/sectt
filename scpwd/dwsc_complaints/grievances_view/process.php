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
function setfields(it) {
    $('#registered_43').val(it);
    if(it==1){
        $('#aaa').show();
    }
    if(it==0){
        $('#aaa').hide();
    }
}

function setfields2(it) {
    $('#registered_6').val(it);
    if(it==1){
        $('#bbb').show();
    }
    if(it==0){
        $('#bbb').hide();
    }
}

function calAmount() {
    var p = $('#property_amount').val();
    var s = $('#sevas_amount').val();


	if(p=='' && s==''){
        $('#total_amount').val();
    	}

    if(p!='' && s!=''){
        var x = parseFloat(p)+parseFloat(s);
        $('#total_amount').val(x);
    }
}

</script>

<script type="text/javascript">

    function changeits(it){
        setState('ccc','<?php echo SECURE_PATH;?>ddns_form/ajax.php','van='+it);
    }

    function changeits1(it){
        setState('ddd','<?php echo SECURE_PATH;?>ddns_form/ajax.php','bus='+it);
    }
</script> 

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
if(isset($_REQUEST['addForm'])){}



//Process and Validate POST data
if(isset($_POST['validateForm'])){}

//Delete experience 
if(isset($_GET['rowDelete'])){}

if(isset($_REQUEST['update_own']))
{
    
	$database->query("update complaints_form set status = '2',  forward_type = '".$_REQUEST['forward_type']."', forward_to = '".$_REQUEST['forward_to']."',reasons = '".$_REQUEST['reasons']."'   where unid = '".$_REQUEST['ides']."'");
	
	    $database->query("INSERT into `complaints_comments` values(NULL,'".$_REQUEST['ides']."','".$_REQUEST['forward_type']."','".$_REQUEST['forward_to']."','".$_REQUEST['reasons']."','','','".$session->username."','".time()."') ");
$query02d = $database->query("select uid,district from global_districts where uid  = '".$_REQUEST['forward_to']."'");
                       $ret_query02d =mysqli_fetch_array($query02d);

	?>
  
  <script type="text/javascript">
    $('#messageDetails').modal('hide');
  alert('Forwarded to <?php echo $ret_query02d['district']." - DWO "; ?>successfully!');
  

    animateForm('<?php echo SECURE_PATH;?>grievances_view/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');

</script>
   <?php 
	
	
	
}

if(isset($_REQUEST['update_other']))

{
$database->query("update complaints_form set status = '3',forward_type = '".$_REQUEST['forward_type']."',department_name = '".$_REQUEST['department_name']."',other_reasons = '".$_REQUEST['other_reasons']."'   where unid = '".$_REQUEST['ides']."'");
$database->query("INSERT into `complaints_comments` values(NULL,'".$_REQUEST['ides']."','".$_REQUEST['forward_type']."','','".$_REQUEST['department_name']."','".$_REQUEST['other_reasons']."','".$session->username."','".time()."') ");
    ?>
    <span class="success">Forwarded to <?php echo $_REQUEST['department_name']; ?>successfully!</span>
  
  <script type="text/javascript">
      $('#messageDetails').modal('hide');
	    alert('Forwarded to <?php echo $_REQUEST['department_name']; ?>  successfully!');


    animateForm('<?php echo SECURE_PATH;?>grievances_view/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>
   <?php 
	
}
if(isset($_REQUEST['c_r']))
{
	
	if($_REQUEST['close_reassign'] == 1)
	{
	
	$database->query("update complaints_form set status = '8',reasons = '".$_REQUEST['reasons']."'   where unid = '".$_REQUEST['ides']."'");
	$query_ret = $database->query("select * from complaints_form where unid = '".$_REQUEST['ides']."'");
	$ret_query = mysqli_fetch_array($query_ret);
	
	    $database->query("INSERT into `complaints_comments` values(NULL,'".$_REQUEST['ides']."','".$ret_query['forward_type']."','".$ret_query['forward_to']."','".$_REQUEST['reasons']."','','','".$session->username."','".time()."') ");


	?>
  
  <script type="text/javascript">
      $('#messageDetails').modal('hide');
	    alert('Closed Successfully!');


    animateForm('<?php echo SECURE_PATH;?>grievances_view/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>
   <?php 	
		
	}elseif($_REQUEST['close_reassign'] == 2)
	{
		
	$database->query("update complaints_form set status = '6',reasons = '".$_REQUEST['reasons']."'   where unid = '".$_REQUEST['ides']."'");
	$query_ret = $database->query("select * from complaints_form where unid = '".$_REQUEST['ides']."'");
	$ret_query = mysqli_fetch_array($query_ret);
	
	    $database->query("INSERT into `complaints_comments` values(NULL,'".$_REQUEST['ides']."','".$ret_query['forward_type']."','".$ret_query['forward_to']."','".$_REQUEST['reasons']."','','','".$session->username."','".time()."') ");


	?>
  
  <script type="text/javascript">
      $('#messageDetails').modal('hide');
	    alert('Re-Assigned Successfully!');


    animateForm('<?php echo SECURE_PATH;?>grievances_view/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>	
		
<?php	}
    
	
}

if(isset($_REQUEST['c_r_other']))
{
	
	if($_REQUEST['close_reassign'] == 1)
	{
	
	$database->query("update complaints_form set status = '7',reasons = '".$_REQUEST['reasons']."'   where unid = '".$_REQUEST['ides']."'");
	$query_ret = $database->query("select * from complaints_form where unid = '".$_REQUEST['ides']."'");
	$ret_query = mysqli_fetch_array($query_ret);
	
	    $database->query("INSERT into `complaints_comments` values(NULL,'".$_REQUEST['ides']."','".$ret_query['forward_type']."','".$ret_query['forward_to']."','".$_REQUEST['reasons']."','','','".$session->username."','".time()."') ");


	?>
  
  <script type="text/javascript">
      $('#messageDetails').modal('hide');
	    alert('Closed Successfully!');


    animateForm('<?php echo SECURE_PATH;?>grievances_view/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>
   <?php 	
		
	}elseif($_REQUEST['close_reassign'] == 2)
	{
		
	$database->query("update complaints_form set status = '5',reasons = '".$_REQUEST['reasons']."'   where unid = '".$_REQUEST['ides']."'");
	$query_ret = $database->query("select * from complaints_form where unid = '".$_REQUEST['ides']."'");
	$ret_query = mysqli_fetch_array($query_ret);
	
	    $database->query("INSERT into `complaints_comments` values(NULL,'".$_REQUEST['ides']."','".$ret_query['forward_type']."','".$ret_query['forward_to']."','".$_REQUEST['reasons']."','','','".$session->username."','".time()."') ");


	?>
  
  <script type="text/javascript">
      $('#messageDetails').modal('hide');
	    alert('Re-Assigned Successfully!');


    animateForm('<?php echo SECURE_PATH;?>grievances_view/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>	
		
<?php	}
    
	
	
	
	
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

        $condition = "district = '".$dis['employee_district']."'";
    }else{
        $condition = '';

    }
if(strlen($condition) > 0){
    $condition = 'WHERE '.$condition;
}
//$query_string = $_SERVER['QUERY_STRING'];

$pagination = $session->showPagination(SECURE_PATH."grievances_view/process.php?tableDisplay=1&",$tableName,$start,$limit,$page,$condition);
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

             <tr class="blue-color"><th style="text-align:left;">SNo</th><th>District</th><th style="text-align:left;">Name</th><th style="text-align:left;">Age</th><th style="text-align:left;">Sex</th><th style="text-align:center;">View More</th><th width="300px;" >Status of Application</th></tr>

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
                     <a data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>grievances_view/process1.php','viewDetails=1&id=<?php echo $value['unid'];?>')">
                         <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                     </a>
                 </td>




<?php
                 $query03 = $database->query("select uid,district from global_districts where uid  = '".$value['forward_to']."'");
                 $ret_query03 =mysqli_fetch_array($query03);
                 ?>
                 <td style="text-align:left;">
                     <?php
                     if($value['status'] == '1'){ ?>
                      <a class="btn btn-info" data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>grievances_view/process2.php','viewDetails=1&id=<?php echo $value['unid'];?>')">
Click Here to Forward </a>
                         

                         <?php
                     }
                     
                     else if($value['status']=='2'){ ?>
                         <a class="btn btn-small btn-block btn-primary"  style="width:250px;"  ><i class="icon-edit"></i>Forwarded to <?php echo $ret_query03['district']." - DWO"; ?></a>
                         <?php
                     }
					 
                     else if($value['status']=='3'){ ?>
                         <b style="color: #00CC00">Forwarded to Other Department</b><br />
                     
<a class="btn btn-info" data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>grievances_view/process4.php','viewDetails=1&id=<?php echo $value['unid'];?>')">
Click Here to View & Update </a>  <?php
                     }
                     else if($value['status']=='4'){ ?>
                         <b style="color: #00CC00">DWO Replied</b><br />
                         <a class="btn btn-info" data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>grievances_view/process3.php','viewDetails=1&id=<?php echo $value['unid'];?>')">
Click Here to View & Update </a>
                         <?php
                     }else if($value['status']=='5'){ ?>
 <b style="color: #00CC00">Re-Assigned to Other Department</b><br />
                     
<a class="btn btn-info" data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>grievances_view/process4.php','viewDetails=1&id=<?php echo $value['unid'];?>')">
Click Here to View & Update </a>                          <?php
                     }else if($value['status']=='6'){ ?>
                         <a class="btn btn-small btn-block btn-primary"  style="width:250px;"  ><i class="icon-edit"></i>Re-Assigned to <?php echo $ret_query03['district']." - DWO"; ?></a>
                         <?php
                     }
					 else if($value['status']=='7' || $value['status']=='8'){ ?>
                                <b style="color: #00CC00">Closed Succesfully</b><br />

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