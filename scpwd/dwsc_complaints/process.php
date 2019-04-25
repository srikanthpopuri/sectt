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
<script type="text/javascript" language="javascript">
 
 
 function changeit(it){
	 
	 if(it==='it'){
		 $('#newit').show();
	 }else{
		  $('#newit').hide();
		 
	 }
	 //setState('village','../ajax/index.php','villageSelect='+newCity1);
 }
 </script>
<?php
//Metircs Forms, Tables and Functions
//Display users form
if(isset($_REQUEST['addForm'])){
	
	if($_REQUEST['addForm'] == 2 && isset($_POST['editform'])){
   
   $data_sel = $database->query("SELECT * FROM bslog WHERE id = '".$_POST['editform']."'");
   
   if(mysqli_num_rows($data_sel) > 0){
   $data = mysqli_fetch_array($data_sel);

  $_POST = array_merge($_POST,$data);
  $_POST['name'] = $data['name'];
    $_POST['email'] = $data['email'];
  $_POST['mobile'] = $data['mobile'];
  $_POST['password'] = $data['password'];
  $_POST['username'] = $data['username'];
  $_POST['eid'] = $data['eid'];


 ?>
<script type="text/javascript">
$('#adminForm').slideDown();
</script>

  <?php 
   
   }
}
	?>

    <?php
	unset($_SESSION['error']);
}

//Process and Validate POST data
if(isset($_POST['validateForm'])){}

//Delete users 
if(isset($_GET['rowDelete'])){
	$database->query("DELETE FROM bslog WHERE username = '".$_GET['rowDelete']."'");
	?>
   <div class="alert alert-success ">Record deleted successfully!</div>
  
  <script type="text/javascript">

animateForm('<?php echo SECURE_PATH;?>balancesheet/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>
   <?php 
}

//Display users
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
$tableName = 'bslog';
$condition = "";
if(strlen($condition) > 0){
    $condition = 'WHERE '.$condition;
}
//$query_string = $_SERVER['QUERY_STRING'];

$pagination = $session->showPagination(SECURE_PATH."balancesheet/process.php?tableDisplay=1&",$tableName,$start,$limit,$page,$condition);
  
    $q = "SELECT * FROM $tableName ".$condition." ";   
   $result_sel = $database->query($q);
   $numres = mysqli_num_rows($result_sel);	
  $query = "SELECT * FROM $tableName ".$condition." ORDER BY `date` ASC LIMIT $start,$limit";
  $data_sel = $database->query($query);

if(($start+$limit) > $numres){
	 $onpage = $numres;
	 }
	 else{
	  $onpage = $start+$limit;
	 }
	 
	 
	 if($numres > 0){
		 echo '<p  class="pull-right label label-info" >Showing '.($start+1).' - '.($onpage).' results out of '.$numres.'</p>';
	
	 
	?>
  <div class="clearfix"></div>

<table class="table table-striped table-bordered table-condensed table-hover">
    <tr><th>Date</th><th>Username</th><th>Type</th><th>Description</th><th>LT</th><th>BT</th><th>NAC</th><th>NAB</th><th>Total</th></tr>
	<?php
	if(isset($_GET['page'])){
	if($_GET['page']==1)
	$i=1;
	else
	$i=(($_GET['page']-1)*50)+1;
	}else $i=1;
	
while($value = mysqli_fetch_array($data_sel))
{	
	
?><tr>
    <td><?php echo ucwords($value['date']);?></td>
  
    <td><?php echo ($value['username']);?></td>
    
    <td><?php if($value['type']== 'INVESTMENT')
	{
		?>
        <span style="color:#0C0;"><?php echo ($value['type']);?></span>
        <?php
	}
	
	else if($value['type']== 'SALE' || $value['type']== 'credit' )
	{
	?>
        <span style="color:#A3A300;"><?php echo ($value['type']);?></span>
        <?php
	}
	
    else
    {
		
		?>
        <span style="color:#F00;"><?php echo ($value['type']);?></span>
        <?php
    }?></td>
    <td><?php echo ($value['description']);?></td>
    
    <td><?php echo ($value['lt']);?></td>
    
    <td><?php echo ($value['bt']);?></td>
    
    <td><?php if(strlen($value['nac'])<0)
	{
		?>
        <span style="color:#F00;"><?php echo ($value['nac']);?></span>
        <?php
	}
	
    else
    {
		
		?>
        <?php echo ($value['nac']);?>
        <?php
    }?></td>
    
    <td><?php if(strlen($value['nab'])<0)
	{
		?>
        <span style="color:#F00;"><?php echo ($value['nab']);?></span>
        <?php
	}
	
    else
    {
		
		?>
        <?php echo ($value['nab']);?>
        <?php
    }?></td>
    
    <td><?php if(strlen($value['total'])<0)
	{
		?>
        <span style="color:#F00;"><?php echo ($value['total']);?></span>
        <?php
	}
	
    else
    {
		
		?>
        <span style="color:#03F;"><?php echo ($value['total']);?></span>
        <?php
    }?></td>
         
     
       

    </tr><?php
}
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


?><script type="text/javascript">

 
	
		function enablepay() {

            var allVals = [];

            $('#mydivenablepay :checked').each(function () {

                allVals.push($(this).val());

            });

            $('#enablepay').val(allVals)

        }
 $(function () 
 {

            $('#mydivenablepay input').click(enablepay);

            enablepay();

        });
 </script>