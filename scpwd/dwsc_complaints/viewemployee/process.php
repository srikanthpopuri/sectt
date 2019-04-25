<?php
include('../include/session.php');
if(!$session->logged_in){
?>
<?php
}
?>
<script>

			$(document).ready(function(){

				//Examples of how to assign the Colorbox event to elements

				$(".group1").colorbox({rel:'nofollow', transition:"fade", width:"70%"});

				

				$(".callbacks").colorbox({

					onOpen:function(){ alert('onOpen: colorbox is about to open'); },

					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },

					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },

					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },

					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }

				});



				$('.non-retina').colorbox({rel:'group5', transition:'none'})

				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});

				

				//Example of preserving a JavaScript event for inline calls.

				$("#click").click(function(){ 

					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");

					return false;

				});

			});

		</script>
<script type="text/javascript" language="javascript">
  function changect(ct){
 	 if(ct==='ct'){
		 $('#newct').show();
	 }else{
		  $('#newct').hide();
	 }
	 //setState('village','../ajax/index.php','villageSelect='+newCity1);
 }
     </script> 
     <script type="text/javascript">
 function funs(val) {	
	 if(val=='manager'){
		  document.getElementById("employee_type").value='manager';
		  
	 }
 else if(val=='salesmanager'){
	  document.getElementById("employee_type").value='salesmanager';
	  
	 }
	
 }
</script>
<?php
//Metircs Forms, Tables and Functions
//Display users form
if(isset($_REQUEST['addForm'])){
}

//Process and Validate POST data
if(isset($_POST['validateForm'])){
}

//Delete users 
if(isset($_GET['rowDelete'])){
}
 //Display users
if(isset($_GET['tableDisplay'])){
	?>
	
	   <form class="form-inline">

   <div class="form-group">
          <input type="text" class="form-control" style="width:320px;" placeholder="Search By Name/Mobile" id="search" value="<?php if(isset($_REQUEST['search'])){echo $_REQUEST['search'];}?>" />
</div>



  
   <div class="form-group">
    <a class="btn btn-success" onClick="setStateGet('adminTable','<?php echo SECURE_PATH;?>viewemployee/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>&search='+$('#search').val());
">Search</a>
</div>

</form>

<div style="clear:both"></div>
<br />
	
	
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
$tableName = '`createemployees`';
$condition = "";

/*Search start*/
 if(isset($_REQUEST['search'])){

    $condition = " (name LIKE '%".$_REQUEST['search']."%' OR  mobilenumber LIKE '%".$_REQUEST['search']."%')";
}




if(strlen($condition) > 0){
    $condition = 'WHERE '.$condition;
}
//$query_string = $_SERVER['QUERY_STRING'];

$pagination = $session->showPagination(SECURE_PATH."createemployee/process.php?tableDisplay=1&",$tableName,$start,$limit,$page,$condition);
  //echo "SELECT * FROM $tableName ".$condition." ORDER BY `id` ASC"; 
   $q = "SELECT * FROM $tableName ".$condition." ORDER BY `id` ASC";   
   $result_sel = $database->query($q);
   $numres = mysqli_num_rows($result_sel);	
   $query = "SELECT * FROM $tableName ".$condition." ORDER BY `id` ASC LIMIT $start,$limit";
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
   <tr><th>S No</th><th>Name</th><th>Mobile</th><th>Aadhar</th><th>E-Mail</th><th>Emp Id</th><th>Username</th><th>EDIT/DELETE</th></tr>
	
	<?php
	if(isset($_GET['page'])){
	if($_GET['page']==1)
	$i=1;
	else
	$i=(($_GET['page']-1)*50)+1;
	}else $i=1;
$j='1';	
while($value = mysqli_fetch_array($data_sel))
{
	
  ?><tr>
  <td><?php echo $j;?></td>
  <td><?php echo ucwords($value['name']);?></td>
  <td><?php echo ucwords($value['mobilenumber']);?></td>
    <td><?php echo ucwords($value['aadhar']);?></td>

  <td><?php echo ucwords($value['emailid']);?></td>
  <td><?php echo ucwords($value['employeeid']);?></td>
  <td><?php echo ucwords($value['username']);?></td>
   
       <td>
       <a class="btn btn-sm btn-primary"  onClick="setState('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','addForm=2&editform=<?php echo $value['username'];?>')"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-sm btn-danger" onClick="confirmDelete('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','rowDelete=<?php echo $value['username'];?>')"><i class="fa fa-trash"></i> Delete</a>
       
       
       
       </td>

    </tr><?php
$j++; }
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