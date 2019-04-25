<?php

include 'include/session.php';

if(isset($_REQUEST['mode99']))
{
	$aadhar_no=$_REQUEST['aadhar_no'];
	
	
	$query99=$database->query("select * from `inmates` where aadhar_no = '".$aadhar_no."' ");
	if(mysqli_num_rows($query99)>0){
							?>
                      <div class="form-group" style="color:#F00;">
    <label for="user">Aadhar Number already Exists.</label>
    
    
  </div>
                    
                    <script type="text/javascript">
					$("#sh_submit").hide();
					
					</script>
                    <?php
		
	}
	else{
		if(strlen($aadhar_no)>0)
		{
		?>
                     <script type="text/javascript">
					$("#sh_submit").show();
					</script>
		
	<?php }else {?>
		
		  
		<script type="text/javascript">
					$("#sh_submit").hide();
					
					</script>
		
		
	<?php }}
	
}

?>