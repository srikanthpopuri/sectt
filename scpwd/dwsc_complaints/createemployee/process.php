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
function changeits(it){
	 
	 setState('ret_bbb','<?php echo SECURE_PATH;?>createemployee/ajax.php','van1='+it);
	// changeConstituency("");
 }
</script>

     <!--<script type="text/javascript">

 function funs(val) {	

	 if(val=='director'){

		  document.getElementById("employee_district11").value='director';

		  

	 }

 else if(val=='salesmanager'){

	  document.getElementById("employee_district11").value='salesmanager';

	  

	 }

	

 }

</script>-->

<?php

//Metircs Forms, Tables and Functions

//Display users form


if(isset($_REQUEST['addForm'])){
 	if($_REQUEST['addForm'] == 2 && isset($_REQUEST['editform'])){
		

     $data_sel = $database->query("SELECT * FROM  `users` WHERE username = '".$_REQUEST['editform']."'");

     if(mysqli_num_rows($data_sel) > 0){

     $data = mysqli_fetch_array($data_sel);

     $_POST = array_merge($_POST,$data);


	 



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
<div class="row" style="display:none;">
  <div class="form-group col-md-4 col-xs-12">

<label for="e_district">Select District</label>

   <select name="employee_district" id="employee_district" disabled="disabled"   class="form-control" >

    <option value="">Select</option>

         <?php

$q=$database->query("SELECT * FROM `global_districts` ");

if($data_rows=mysqli_num_rows($q)>0){

		while($data=mysqli_fetch_array($q)){?>

<option value="<?php echo $data['uid']?>"

<?php

if(isset($_POST['employee_district']))

{

	if($_POST['employee_district']==$data['uid'])

echo 'selected="selected"';}?>

><?php echo ucwords($data['district'])?></option><?php }}?>

 </select>

  <span class="error"><?php if(isset($_SESSION['error']['emp_district'])){ echo $_SESSION['error']['emp_district'];}?></span>  

 </div>
  </div>


<div class="row">
<div class="form-group col-md-4">

    <label for="section">Name</label>

    <input type="text" name="name" placeholder="Enter Name"  class="form-control"  id="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>"  />

    <span class="error"><?php if(isset($_SESSION['error']['name'])){ echo $_SESSION['error']['name'];}?></span>

  </div>

  <div class="form-group col-md-4">

    <label for="section">Mobile Number</label>

    <input type="text" name="mobile" placeholder="Enter Mobile Number" onkeypress="return isMobile(event,'mobile',10)"  class="form-control"  id="mobile" value="<?php if(isset($_POST['mobile'])){ echo $_POST['mobile'];}?>"  />

    <span class="error"><?php if(isset($_SESSION['error']['mobile'])){ echo $_SESSION['error']['mobile'];}?></span>

  </div>
  
  <div class="form-group col-md-4">

    <label for="section">Email id</label>

    <input type="text" name="emailid" placeholder="Enter Email id" onkeypress="validateEmail(this.value)"  class="form-control"  id="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>"  />

    <span class="error"><?php if(isset($_SESSION['error']['email'])){ echo $_SESSION['error']['email'];}?></span>

</div>





</div> 



<div class="row"> 



  <div class="form-group col-md-4">

    <label for="User Name">Username</label>

<?php

if(isset($_REQUEST['editform']))

{

    ?>

    <input type="text" disabled="disabled" name="Enter Username" placeholder="Username" class="form-control" id="username" value="<?php if(isset($_POST['username'])){ echo stripslashes($_POST['username']);}?>" />

    <?php

}

else

{

    ?>

    <input type="text" name="username" onkeyup="setState('username_avail','<?php echo SECURE_PATH;?>createemployee/ajax.php','mode99=1&username='+$('#username').val())" placeholder="Enter Username" class="form-control"  id="username" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];}?>"  />

    <span class="error"><?php if(isset($_SESSION['error']['username'])){ echo $_SESSION['error']['username'];}?></span>

   <?php }  ?>

  </div>

    <div class="form-group col-md-4">

    <label for="section">Password</label>

    <input type="text" name="password" placeholder="Enter Password" class="form-control"  id="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];}?>"  />

    <span class="error"><?php if(isset($_SESSION['error']['password'])){ echo $_SESSION['error']['password'];}?></span>

  </div>
  
  
  
  

  </div>

 <div class="row" style="height:35px; min-height:35px;">
 
<div class="col-md-6" id="username_avail" >
 </div>
 
 

</div>
<div class="row" style="display:none;">
<div class="form-group col-md-4">

     <label for="section">Address</label>

     <textarea name="address" class="form-control" id="address" >   <?php if(isset($_POST['address'])){ echo $_POST['address'];}?>   </textarea>

     

    <span class="error"><?php if(isset($_SESSION['error']['address'])){ echo $_SESSION['error']['address'];}?></span>

  </div>
<div class="col-md-4">
 <label for="section">Aadhar Number</label>

    <input type="text" name="aadhar" placeholder="Enter Aadhar Number"  class="form-control"  id="aadhar" value="<?php if(isset($_POST['aadhar'])){ echo $_POST['aadhar'];}?>"  />

    <span class="error"><?php if(isset($_SESSION['error']['aadhar'])){ echo $_SESSION['error']['aadhar'];}?></span>

</div>
</div>


<div class="row">
 <div class="col-md-4">
 </div>
 <div class="col-md-6">
 </div>

<div class="form-group col-md-2" id="sh_submit">

<a class="btn btn-info" style="width:150px;" onClick="setState('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','validateForm=1&name='+$('#name').val()+'&mobile='+$('#mobile').val()+'&email='+$('#email').val()+'&employeeid='+$('#employeeid').val()+' &address='+$('#address').val()+'&username='+$('#username').val()+'&password='+$('#password').val()+'&aadhar='+$('#aadhar').val()+'&employee_district='+$('#employee_district').val()+'<?php if(isset($_POST['editform'])){ echo '&editform='.$_POST['editform'];}?>')">Save</a>





</div>

</div>

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

$mobile = $post['mobile'];

$email = $post['email'];



$username = $post['username'];

$password = $post['password'];

$employee_district = $post['employee_district'];



   	if(isset($post['editform'])){

	  $username = $post['editform'];

 	}

	

$field = 'name';

	if(!$post['name'] || strlen(trim($post['name'])) == 0){

	  $_SESSION['error'][$field] = "*Please Enter name";

	} 

	

	$field = 'mobile';

	if(!$post['mobile'] || strlen(trim($post['mobile'])) == 0){

	  $_SESSION['error'][$field] = "*Please Enter mobile";

	}
	

	

	$field = 'email';

	if(!$post['email'] || strlen(trim($post['email'])) == 0){

	  $_SESSION['error'][$field] = "*Please Enter E-Mail";

	}

	


	

	

	$field = 'username';

	if(!$post['username'] || strlen(trim($post['username'])) == 0){

	  $_SESSION['error'][$field] = "*Please Enter username";

	} 

	

	$field = 'password';

	if(!$post['password'] || strlen(trim($post['password'])) == 0){

	  $_SESSION['error'][$field] = "*Please Enter password";

	} 


$field = 'employee_district';

	if(!$post['employee_district'] || strlen(trim($post['employee_district'])) == 0){

	  $_SESSION['error'][$field] = "*Please Select District";

	} 


 //Check if any errors exist	

	if(count($_SESSION['error']) > 0 || $post['validateForm'] == 2){

	?>

    <script type="text/javascript">

    $('#adminForm').slideDown();

		

	setState('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','addForm=1&name=<?php echo $post['name'];?>&mobile=<?php echo $post['mobile'];?>&email=<?php echo $post['email'];?>&username=<?php echo $post['username']?>&password=<?php echo $post['password'];?>&employee_district=<?php echo $post['employee_district'];?><?php if(isset($_POST['editform'])){ echo '&editform='.$post['editform'];}?>')

	

    </script>

    

<?php	

	}

	else{




$database->query("UPDATE users SET password = '".$post['password']."' , mobile = '".$post['mobile']."', name = '".$post['name']."' where username = '".$_SESSION['username']."'");



?>



 <div class="alert alert-success "><i class="fa fa-thumbs-up fa-2x"></i>Information saved successfully!</div>

 <script type="text/javascript">



animateForm('<?php echo SECURE_PATH;?>createemployee/process.php','addForm=2&editform=<?php echo $_SESSION['username']; ?>');

</script>

	<?php

	}

	

}



//Delete users 

if(isset($_GET['rowDelete'])){
	
	
	$database->query("DELETE FROM createemployees WHERE username = '".$_GET['rowDelete']."'");
    $database->query("DELETE FROM users WHERE username = '".$_GET['rowDelete']."'");

	?>



   <div class="alert alert-success ">Record deleted successfully!</div>

  <script type="text/javascript">

 animateForm('<?php echo SECURE_PATH;?>viewemployee/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');

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

$tableName = '`createemployees`';

$condition = "";

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

   <tr><th>S No</th><th>Name</th><th>Mobile</th><th>Aadhar</th><th>E-Mail</th><th>Emp Id</th><th>Designation</th><th>Address</th><th>Username</th><th>EDIT/DELETE</th></tr>

	

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
  <td><?php echo ucwords($value['aadhar']);?></td>

  <td><?php echo ucwords($value['emailid']);?></td>

  <td><?php echo ucwords($value['employeeid']);?></td>

  <td><?php echo ucwords($value['employee_district']);?></td>

  <td><?php echo ucwords($value['address']);?></td>

  <td><?php echo $value['username'];?></td>


   

       <td>

       <a class="btn btn-sm btn-primary"  onClick="setState('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','addForm=2&editform=<?php echo $value['username'];?>')"><i class="fa fa-edit"></i> Edit</a> 
      <a class="btn btn-sm btn-danger" onClick="confirmDelete('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','rowDelete=<?php echo $value['username'];?>')"><i class="fa fa-trash"></i> Delete</a>
<?php
if($value['valid'] == '1')
{
?>
    <a class="group1 btn btn-sm btn-warning"  href="<?php echo SECURE_PATH;?>createemployee/process2.php?username=<?php echo $value['username'];?>">De Activate</a>
<?php } elseif($value['valid'] == '0'){ ?>
<a class="group1 btn btn-sm btn-success"  href="<?php echo SECURE_PATH;?>createemployee/process.php?updateemployee_activate=1&username11=<?php echo $value['username'];?>">Activate</a></td>

<?php } ?>
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

if(isset($_REQUEST['updateemployee_deactivate'])){

$id = 'NULL';

$username11=$_POST['username11'];
$assign_to=$_POST['assign_to'];

$qwerty=$database->query("select * from users where username='".$_POST['username11']."' ");

$qwefetch=mysqli_fetch_array($qwerty);



$approvereply=$database->query("update createemployees set valid='0' where username='".$_POST['username11']."'");	

$approvereply1=$database->query("update users set valid='0' where username='".$_POST['username11']."'");

$approvereply1=$database->query("update lead set assigned_employee='".$assign_to."' where username='".$_POST['username11']."'");	

	?>

   <div class="alert alert-success ">Leads of <?php echo $username11; ?> are assigned to <?php echo $assign_to; ?></div>

<script type="text/javascript">

window.setTimeout(function() 

        {

			animateForm('<?php echo SECURE_PATH;?>createemployee/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');

 parent.$.colorbox.close();

        }, 1000);

</script>

<?php

   }
   
   if(isset($_REQUEST['updateemployee_activate'])){

$id = 'NULL';

$username11=$_REQUEST['username11'];

$qwerty=$database->query("select * from users where username='".$_REQUEST['username11']."' ");

$qwefetch=mysqli_fetch_array($qwerty);



$approvereply=$database->query("update createemployees set valid='1' where username='".$_REQUEST['username11']."'");	

$approvereply1=$database->query("update users set valid='1' where username='".$_REQUEST['username11']."'");


	?>

   <div class="alert alert-success ">Activated Succesfully</div>

<script type="text/javascript">

window.setTimeout(function() 

        {

			animateForm('<?php echo SECURE_PATH;?>createemployee/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');

 parent.$.colorbox.close();

        }, 1000);

</script>

<?php

   }

?>