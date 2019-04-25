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

 <script type="text/javascript">

function changeits(it){

	 

	 setState('sign','<?php echo SECURE_PATH;?>broker/ajax.php','van='+it);

	// changeConstituency("");

 }

</script>

<?php

//Metircs Forms, Tables and Functions

//Display users form

if(isset($_REQUEST['addForm'])){

	

	if($_REQUEST['addForm'] == 2 && isset($_POST['editform'])){

   

   $data_sel = $database->query("SELECT * FROM helpline WHERE id = '".$_POST['editform']."'");

   

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



<div class="row">


<div class="col-md-4">
 <div class="form-group">

    <label for="name"> Name </label>



    <input type="text" name="name"  placeholder="Enter Name" class="form-control"  id="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>"  />

            <span class="error"><?php if(isset($_SESSION['error']['name'])){ echo $_SESSION['error']['name'];}?></span>

<br>
 </div>

 </div>
<div class="col-md-4">
 <div class="form-group">
    <label for="name"> Mobile </label>
 <input type="text" name="mobile"  placeholder="Enter Mobile" class="form-control"  id="mobile" value="<?php if(isset($_POST['mobile'])){ echo $_POST['mobile'];}?>"  />
            <span class="error"><?php if(isset($_SESSION['error']['mobile'])){ echo $_SESSION['error']['mobile'];}?></span>
<br>
  </div>  
  </div>
  <div class="col-md-4"> 

 <div class="form-group">
    <label for="name"> E-Mail </label>
 <input type="text" name="email"  placeholder="Enter E-Mail" class="form-control"  id="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>"  />
            <span class="error"><?php if(isset($_SESSION['error']['email'])){ echo $_SESSION['error']['email'];}?></span>
<br>
  </div> 
  </div> 
  
  </div>
  <div class="row">
  <div class="col-md-4">

  <div class="form-group">
    <label for="name"> Address </label>
 <textarea type="text" name="address"  placeholder="Enter Address" class="form-control"  id="address"><?php if(isset($_POST['address'])){ echo $_POST['address'];}?></textarea>
            <span class="error"><?php if(isset($_SESSION['error']['address'])){ echo $_SESSION['error']['address'];}?></span>
<br>
  </div> 
  </div>
  <div class="col-md-4">

<div class="form-group">
  <label for="File">Agreement Upload Copy</label>
  <div id="file-uploader2" style="display:inline">		
		<noscript>			
			<p>Please enable JavaScript to use file uploader.</p>
			<!-- or put a simple form for upload here -->
		</noscript>  
      
	</div>
    <script> 
	$(document).ready(function(){     
	 
        function createUploader(){   
		      
            var uploader = new qq.FileUploader({
                        element: document.getElementById('file-uploader2'),
                action: '<?php echo SECURE_PATH;?>theme/js/upload/php.php?upload=image',
                debug: true,
				multiple:false
            });           
        }
		
		createUploader();
		
	});
        
        // in your app create uploader as soon as the DOM is ready
        // don't wait for the window to load  
         
    </script>
      <input type="hidden"  name="photo" id="image" value="<?php if(isset($_POST['photo'])){ echo $_POST['photo'];}?>"  />
       
    <?php
	 if(isset($_POST['photo'])){
	   ?>
       <a href="php.php" target="_blank"  /><b style="color:#900;"><?php echo $_POST['photo'];?></b></a>
        <?php
	 }
		 if(isset($_POST['editform'])){

 $data_selx = $database->query("SELECT * FROM broker WHERE id = '".$_POST['editform']."'");
   $datax = mysqli_fetch_array($data_selx);
   ?>
  <a href="<?php echo SECURE_PATH;?>uploads/<?php echo $_POST['photo'];?>" target="_blank"> view</a>
  <?php  } ?>

</div>
</div>
</div>

<div class="form-group">

<a class="btn btn-info" onClick="setState('adminForm','<?php echo SECURE_PATH;?>broker/process.php','validateForm=1&name='+$('#name').val()+'&mobile='+$('#mobile').val()+'&email='+$('#email').val()+'&address='+$('#address').val()+'&photo='+$('#image').val()+'<?php if(isset($_POST['editform'])){ echo '&editform='.$_POST['editform'];}?>')">Save</a>

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
$address = $post['address'];
$photo = $post['photo'];

	if(isset($post['editform'])){

	  $id = $post['editform'];

	  

	  }

	$field = 'name';

	if(!$post['name'] || strlen(trim($post['name'])) == 0){

	  $_SESSION['error'][$field] = "*Please Enter Name";

	}
	
	$field = 'mobile';

	if(!$post['mobile'] || strlen(trim($post['mobile'])) == 0){

	  $_SESSION['error'][$field] = "*Please Enter Mobile";

	}
	$field = 'email';

	if(!$post['email'] || strlen(trim($post['email'])) == 0){

	  $_SESSION['error'][$field] = "*Please Enter E-Mail";

	}
	$field = 'address';

	if(!$post['address'] || strlen(trim($post['address'])) == 0){

	  $_SESSION['error'][$field] = "*Please Enter Address";

	}
	$field = 'photo';

	if(!$post['photo'] || strlen(trim($post['photo'])) == 0){

	  $_SESSION['error'][$field] = "*Please Upload Agreement Copy";

	}











//Check if any errors exist	

	if(count($_SESSION['error']) > 0 || $post['validateForm'] == 2){

	?>

    <script type="text/javascript">

    $('#adminForm').slideDown();

		

	setState('adminForm','<?php echo SECURE_PATH;?>broker/process.php','addForm=1&name=<?php echo $post['name'];?>&mobile=<?php echo $post['mobile'];?>&email=<?php echo $post['email'];?>&address=<?php echo $post['address'];?>&photo=<?php echo $post['photo'];?><?php if(isset($_POST['editform'])){ echo '&editform='.$post['editform'];}?>')

	

    </script>

    

<?php	

	}

	else{

	

		 

		

$database->query("INSERT INTO broker VALUES ('".$id."','".$name."','".$mobile."','".$email."','".$address."','".$photo."','".time()."') ON DUPLICATE KEY UPDATE `name` = '".$name."',`mobile` = '".$mobile."',`email` = '".$email."',`address` = '".$address."',`photo` = '".$photo."'");

	

?>

        

 <div class="alert alert-success "><i class="fa fa-thumbs-up fa-2x"></i>Information saved successfully!</div>



    <script type="text/javascript">



animateForm('<?php echo SECURE_PATH;?>brokerview/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');

</script>

 

	<?php

	}

		 

	

}



//Delete users 

if(isset($_GET['rowDelete'])){

	$database->query("DELETE FROM broker WHERE id = '".$_GET['rowDelete']."'");

	?>

   <div class="alert alert-success ">Record deleted successfully!</div>

  

  <script type="text/javascript">



animateForm('<?php echo SECURE_PATH;?>brokerview/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');

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

$tableName = 'helpline';



$condition = "";



if(strlen($condition) > 0){

    $condition = 'WHERE '.$condition;

}

//$query_string = $_SERVER['QUERY_STRING'];



$pagination = $session->showPagination(SECURE_PATH."helpline/process.php?tableDisplay=1&",$tableName,$start,$limit,$page,$condition);

    

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

    <tr>

    <th>S.No</th>

    <th>District</th>

    <th>Query</th>
    <th>Posted Time</th>
 <th style="display:none;">EDIT/DELETE</th></tr>

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
    <?php
	
	$query_check=$database->query("select employee_district from users where username='".$session->username."'");
	$ret_query_check=mysqli_fetch_array($query_check);
	$query_check1=$database->query("select district from global_districts where uis='".$ret_query_check['employee_distict']."'");
	$ret_query_check1=mysqli_fetch_array($query_check1);
	
?>

     <td><?php echo ucwords($ret_query_check1['district']);?></td>
          <td><?php echo ucwords($value['query']);?></td>

          <td><?php echo date('d-m-Y', $value['query']);?></td>

     

   

         

     

       <td style="display:none;">

       <a class="btn btn-sm btn-primary"  onClick="setState('adminForm','<?php echo SECURE_PATH;?>industry/process.php','addForm=2&editform=<?php echo $value['id'];?>')"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-sm btn-danger" onClick="confirmDelete('adminForm','<?php echo SECURE_PATH;?>industry/process.php','rowDelete=<?php echo $value['id'];?>')"><i class="fa fa-trash"></i> Delete</a></td>



    </tr><?php $i++;

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