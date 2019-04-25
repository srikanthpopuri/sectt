<?php
include('../include/session.php');

if(isset($_POST['mode99']))
{
	$username=$_REQUEST['username'];
	
	//echo "select * from users where username='".$username."'";
	$query99=$database->query("select * from `users` where username = '".$username."' ");
	if(mysqli_num_rows($query99)>0){
							?>
                      <div class="form-group" style="color:#F00;">
    <label for="user">That Username is taken. Try another.</label>
    
    
  </div>
                    
                    <script type="text/javascript">
					$("#sh_submit").hide();
					
					</script>
                    <?php
		
	}
	else{
		if(strlen($username)>0)
		{
		?>
                <div  style="color:#030;">
    <label for="user">Username Available</label>
    
    
  </div>      <script type="text/javascript">
					$("#sh_submit").show();
					</script>
		
	<?php }else {?>
		
		  <div  style="color:#00F;">
    <label for="user">Please Enter Username</label>
    
    
  </div>
		<script type="text/javascript">
					$("#sh_submit").hide();
					
					</script>
		
		
	<?php }}
	
}


?>