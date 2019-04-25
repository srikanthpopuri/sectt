<?php
include('include/session.php');
include('class.phpmailer.php');


?>
<script>

	
	function check_username(){
	if($('#uname').val().length > 0 && $('#uname').val() != 'admin') 
	{
		
		setState('submitdata','<?php echo SECURE_PATH;?>forgot_password.php','check=1&uname='+$('#uname').val()+'');
	   }
	else{
	alert('Please enter all fields..!');	
	}	
		
		
	}
</script>

<?php
if(isset($_REQUEST['fpass']))
{ 


?>
<div class="row">
<div class="form-group col-md-4" >
        <label for="percentage">Enter Username</label>
        <input type="text" class="form-control" id="uname"   name="uname" value="<?php if(isset($_POST['uname'])){echo $_POST['uname'];}?>">
    </div>
    
</div>    

    <div class="row">
<div class="form-group col-md-4" >
        <a class="btn btn-block btn-danger" data-dismiss="modal" style="width:125px;"  onClick="check_username()" >Submit</a>
    </div>
    </div>
    <?php
}
?>
<div id="submitdata">
</div>
<div id="loginForm">
</div>
<?php

if(isset($_REQUEST['check']))
{
$q_username=$database->query("select * from users where username = '".$_REQUEST['uname']."'");
if(mysqli_num_rows($q_username)>0)	
{
	$ret_q_username=mysqli_fetch_array($q_username);
	$rand_pwd='';
	$rand_pwd = rand(10,1000000);
	
    $message = "Dear ".$ret_q_username['username'].": Please Login with the New Password : ".$rand_pwd." .After Login you can change the Password in Edit Profile Section.";
            
        $session->sendsms(SMS_USER,SMS_PASSWORD,$message,SMS_SID,$ret_q_username['mobile']);
	
    //mailer Function

				
$url = 'http://the-village.in/cps/wdsc_mail.php?email=1&password='.$rand_pwd.'&mail='.$ret_q_username['email'].'&name='.$ret_q_username['name'].'&uname='.$ret_q_username['username'];
                file($url);
				
			
	$database->query("update `users` set password = '".$rand_pwd."' where username = '".$ret_q_username['username']."'");	
    
 ?>   
    
<script type="text/javascript">
	
	alert('Password Sent to your Registered Mail and Mobile');
	setStateGet('loginForm','<?php echo SECURE_PATH;?>login_process.php','loginForm=1');

    </script>	
<?php	
	
}else{
	?>
    <script type="text/javascript">
	
	alert('Please Enter Valid Username');
	//setStateGet('loginForm','<?php echo SECURE_PATH;?>login_process.php','loginForm=1');
	setState('fp_details','<?php echo SECURE_PATH;?>forgot_password.php','fpass=1')
    </script>
    
    <?php
	
}
	
	
	
}
function mailInvites($to,$toname,$subject,$msg,$from,$fromname){

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: '.$toname.' <'.$to.'>' . "\r\n";
$headers .= 'From: '.$fromname.' <'.$from.'>' . "\r\n";
//$headers .= 'Cc: accounts@zestwings.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($to, $subject, $msg, $headers);



}