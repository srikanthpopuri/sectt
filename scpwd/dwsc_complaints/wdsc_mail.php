<?php
require('../omr/mail/class.phpmailer.php');


if(isset($_REQUEST['email']))
{
	//echo "Into E-Mail";

	
$msg = '<div>
<p>Hi '.$_REQUEST['uname'].'</p>

<p> Please Login with the New Password : '.$_REQUEST['password'].'</p>

<p> After Login you can change the Password in Edit Profile Section</p>



<p>Regards,</p>

<p>WDSC Department</p>

</div>';
 $to =$_REQUEST['mail'];
              $toname =$_REQUEST['name'];
                $from = 'cdwtghyd@gmail.com';
               $fromname = 'WDSC Department';
               $subject = 'Request For Password';
				

    $ret= mailInvites($to,$toname,$subject,$msg,$from,$fromname);
	
	if($ret == 1)
      {
        echo "1";
		
      }
      else
        {
           echo "0";
      }
	
}

function mailInvites($to,$toname,$subject,$msg,$from,$fromname){
//echo "ssssssssssssssss";
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: '.$toname.' <'.$to.'>' . "\r\n";
$headers .= 'From: '.$fromname.' <'.$from.'>' . "\r\n";
/*  Replace below headers with cpsops mail-id */
//$headers .= 'Cc: accounts@cpsops.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
$t = mail($to, $subject, $msg, $headers);
if($t==false)
return 0;
else
return 1;
}



?>