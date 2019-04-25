<?php
include('../include/session.php');
if(!$session->logged_in){
?>
<?php
}
?>

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
 	if($_REQUEST['addForm'] == 2 && isset($_POST['editform'])){
     $data_sel = $database->query("SELECT * FROM  `createemployees` WHERE id = '".$_POST['editform']."'");
     if(mysqli_num_rows($data_sel) > 0){
     $data = mysqli_fetch_array($data_sel);
     $_POST = array_merge($_POST,$data);
     $_POST['name'] = $data['name'];
     $_POST['mobilenumber'] = $data['mobilenumber'];
	 $_POST['emailid'] = $data['emailid'];
	 $_POST['employeeid'] = $data['employeeid'];
	 $_POST['address'] = $data['address'];
	 $_POST['username'] = $data['username'];
	 $_POST['password'] = $data['password'];

 ?>
<script type="text/javascript">
$('#adminForm').slideDown();
</script>
   <?php 
   
   }
}
	?>
<form role="form">
<div class="container-fluid">
<div class="row">
<div class="col-md-4">

<div class="form-group">
<label for="employee_type">type</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
<input type="radio"  onclick="funs($(this).val())" name="employee_type"   id="employee_type"  value="director" <?php if(isset($_POST['employee_type'])){ if($_POST['employee_type']=='director')echo 'checked="checked"';}?>  /> Director&nbsp;&nbsp;&nbsp;&nbsp;

<input type="radio"  onclick="funs($(this).val())" name="employee_type"   id="employee_type"  value="salesmanager" <?php if(isset($_POST['employee_type'])){ if($_POST['employee_type']=='courier')echo 'checked="checked"';}?>  /> Sales Manager

    </div>
    <div class="form-group">
    <label for="section">Name</label>
    <input type="text" name="name" placeholder="Enter Name"  class="form-control"  id="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>"  />
  <span class="error"><?php if(isset($_SESSION['error']['name'])){ echo $_SESSION['error']['name'];}?></span>
  </div>
  <div class="form-group">
    <label for="section">Mobile Number</label>
    <input type="text" name="mobilenumber" placeholder="Enter Mobile Number"  class="form-control"  id="mobilenumber" value="<?php if(isset($_POST['mobilenumber'])){ echo $_POST['mobilenumber'];}?>"  />
    <span class="error"><?php if(isset($_SESSION['error']['flat_number'])){ echo $_SESSION['error']['flat_number'];}?></span>
  </div>
</div> 

<div class="col-md-4"> 
  
  <div class="form-group">
    <label for="section">Email id</label>
    <input type="text" name="emailid" placeholder="Enter Email id"  class="form-control"  id="emailid" value="<?php if(isset($_POST['emailid'])){ echo $_POST['emailid'];}?>"  />
    <span class="error"><?php if(isset($_SESSION['error']['emailid'])){ echo $_SESSION['error']['emailid'];}?></span>
</div>
   <div class="form-group">
    <label for="User Name">Username</label>
<?php
if(isset($_POST['editform']))
{
    ?>
    <input type="text" disabled="disabled" name="Enter Username" placeholder="Username" class="form-control" id="username" value="<?php if(isset($_POST['username'])){ echo stripslashes($_POST['username']);}?>" />
    <?php
}
else
{
    ?>
    <input type="text" name="username" placeholder="Enter Username" class="form-control"  id="username" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];}?>"  />
    <span class="error"><?php if(isset($_SESSION['error']['username'])){ echo $_SESSION['error']['username'];}?></span>
   <?php }  ?>
  </div>
 
   
    <div class="form-group">
    <label for="section">Password</label>
    <input type="text" name="password" placeholder="Enter Password" class="form-control"  id="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];}?>"  />
    <span class="error"><?php if(isset($_SESSION['error']['password'])){ echo $_SESSION['error']['password'];}?></span>
  </div>
  </div>
 <div class="col-md-4"> 
  
    <div class="form-group">
    <label for="section">Employee Id</label>
    <input type="text" name="employeeid" placeholder="Enter Employee Id"  class="form-control"  id="employeeid" value="<?php if(isset($_POST['employeeid'])){ echo $_POST['employeeid'];}?>"  />
    <span class="error"><?php if(isset($_SESSION['error']['employeeid'])){ echo $_SESSION['error']['employeeid'];}?></span>
  </div>
   
     <div class="form-group">
     <label for="section">Address</label>
     <textarea name="address" class="form-control" id="address" >   <?php if(isset($_POST['address'])){ echo $_POST['address'];}?>   </textarea>
     
    <span class="error"><?php if(isset($_SESSION['error']['address'])){ echo $_SESSION['error']['address'];}?></span>
  </div>
 </div>
 </div>
 </div>


 
<div class="form-group">
<a class="btn btn-info" onClick="setState('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','validateForm=1&name='+$('#name').val()+'&mobilenumber='+$('#mobilenumber').val()+'&emailid='+$('#emailid').val()+'&employeeid='+$('#employeeid').val()+' &address='+$('#address').val()+'&username='+$('#username').val()+'&password='+$('#password').val()+'&employee_type='+$('#employee_type').val()+'<?php if(isset($_POST['editform'])){ echo '&editform='.$_POST['editform'];}?>')">Save</a>
<?php
if(isset($_POST['editform'])){
	?><a class="btn btn-sm btn-danger" onClick="confirmDelete('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','rowDelete=<?php echo $_POST['editform'];?>')"><i class="fa fa-trash"></i> Delete</a> 
<?php
}
?>

</div>
 
</form>
    <?php
	unset($_SESSION['error']);
}

//Process and Validate POST data
if(isset($_POST['validateForm'])){
	
	$_SESSION['error'] = array();
	$post = $session->cleanInput($_POST);
	
$id = 'NULL';
$name = $post['name'];
$mobilenumber = $post['mobilenumber'];
$emailid = $post['emailid'];
$employeeid = $post['employeeid'];
$address = $post['address'];
$username = $post['username'];
$password = $post['password'];
$employee_type = $post['employee_type'];
   	if(isset($post['editform'])){
	  $id = $post['editform'];
 	}
	
$field = 'name';
	if(!$post['name'] || strlen(trim($post['name'])) == 0){
	  $_SESSION['error'][$field] = "*Please enter name";
	} 
	
	$field = 'mobilenumber';
	if(!$post['mobilenumber'] || strlen(trim($post['mobilenumber'])) == 0){
	  $_SESSION['error'][$field] = "*Please enter mobilenumber";
	} 
	
	$field = 'emailid';
	if(!$post['emailid'] || strlen(trim($post['emailid'])) == 0){
	  $_SESSION['error'][$field] = "*Please enter emailid";
	}
	
		$field = 'employeeid';
	if(!$post['employeeid'] || strlen(trim($post['employeeid'])) == 0){
	  $_SESSION['error'][$field] = "*Please enter employeeid";
	} 
	
	$field = 'address';
	if(!$post['address'] || strlen(trim($post['address'])) == 0){
	  $_SESSION['error'][$field] = "*Please enter address";
	} 
	
	$field = 'username';
	if(!$post['username'] || strlen(trim($post['username'])) == 0){
	  $_SESSION['error'][$field] = "*Please enter username";
	} 
	
	$field = 'password';
	if(!$post['password'] || strlen(trim($post['password'])) == 0){
	  $_SESSION['error'][$field] = "*Please enter password";
	} 

 //Check if any errors exist	
	if(count($_SESSION['error']) > 0 || $post['validateForm'] == 2){
	?>
    <script type="text/javascript">
    $('#adminForm').slideDown();
		
	setState('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','addForm=1&name=<?php echo $post['name'];?>&mobilenumber=<?php echo $post['mobilenumber'];?>&emailid=<?php echo $post['emailid'];?>&employeeid=<?php echo $post['employeeid']?> &address=<?php echo $post['address'];?>?>&username=<?php echo $post['username']?>&password=<?php echo $post['password'];?><?php if(isset($_POST['editform'])){ echo '&editform='.$post['editform'];}?>')
	
    </script>
    
<?php	
	}
	else{
		
//echo "UPDATE createemployees set  `name` = '".$name."',`mobilenumber` = '".$mobilenumber."',`emailid` = '".$emailid."',`employeeid` = '".$employeeid."',`employee_type` = '".$employee_type."',`address` = '".$address."',`password` = '".$password."' where id='".$_POST['editform']."'";

$database->query("INSERT INTO `createemployees` VALUES ('".$id."','".$name."','".$mobilenumber."','".$emailid."','".$employeeid."','".$employee_type."','".$address."','".$username."','".$password."','".time()."') ON DUPLICATE KEY UPDATE `name` = '".$name."',`mobilenumber` = '".$mobilenumber."',`emailid` = '".$emailid."',`employeeid` = '".$employeeid."',`employee_type` = '".$employee_type."',`address` = '".$address."',`username` = '".$username."',`password` = '".$password."'");

$database->query("INSERT INTO `users` VALUES ('".$username."','".$password."','','8','".$mobilenumber."','".$emailid."','".time()."','1','".$name."','','','','','')");

?>

 <div class="alert alert-success "><i class="fa fa-thumbs-up fa-2x"></i>Information saved successfully!</div>
 <script type="text/javascript">

animateForm('<?php echo SECURE_PATH;?>createemployee/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>
	<?php
	}
	
}

//Delete users 
if(isset($_GET['rowDelete'])){
	$database->query("DELETE FROM `createemployees` WHERE id = '".$_GET['rowDelete']."'");
	?>

   <div class="alert alert-success ">Record deleted successfully!</div>
  <script type="text/javascript">
 animateForm('<?php echo SECURE_PATH;?>createemployee/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>
   <?php 
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

    $condition = " (name LIKE '%".$_REQUEST['search']."%' OR  mobile LIKE '%".$_REQUEST['search']."%'";
}




if(strlen($condition) > 0){
    $condition = 'WHERE '.$condition;
}
//$query_string = $_SERVER['QUERY_STRING'];

$pagination = $session->showPagination(SECURE_PATH."createemployee/process.php?tableDisplay=1&",$tableName,$start,$limit,$page,$condition);
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
   <tr><th>Slno</th><th>name</th><th>mobilenumber</th><th>emailid</th><th>Employeeid</th><th>Employeetype</th>   <th>address</th><th>username</th><th>password</th><th>EDIT/DELETE</th></tr>
	
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
  <td><?php echo ucwords($value['id']);?></td>
  <td><?php echo ucwords($value['name']);?></td>
  <td><?php echo ucwords($value['mobilenumber']);?></td>
  <td><?php echo ucwords($value['emailid']);?></td>
  <td><?php echo ucwords($value['employeeid']);?></td>
  <td><?php echo ucwords($value['employee_type']);?></td>
  <td><?php echo ucwords($value['address']);?></td>
  <td><?php echo ucwords($value['username']);?></td>
  <td><?php echo ucwords($value['password']);?></td>
   
       <td>
       <a class="btn btn-sm btn-primary"  onClick="setState('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','addForm=2&editform=<?php echo $value['id'];?>')"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-sm btn-danger" onClick="confirmDelete('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','rowDelete=<?php echo $value['id'];?>')"><i class="fa fa-trash"></i> Delete</a></td>

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
?>