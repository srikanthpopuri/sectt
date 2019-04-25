<?php
ini_set('display_errors','On');
include('../include/session.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    
<link rel="icon" href="http://www.telangana.gov.in/Style%20Library/GoT/Content/img/logo.png" type="image/png" sizes="16x16">

    <title>Office of the State Commissioner For Persons with Disabilities</title>
	<?php echo $session->commonJS();?>
<?php echo $session->commonCSS();?>
	<link rel="stylesheet" href="<?php echo SECURE_PATH; ?>css/colors.css">
  <link rel="stylesheet" href="<?php echo SECURE_PATH; ?>css/dwdsc-color.css">
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   
</head>

<body onLoad="$('#user').focus();" class="login-body">


<div id="loginForm">
<?php
if($session->logged_in){

?>

<script type="text/javascript">
//navigate('<?php echo SECURE_PATH;?>home/','home');
window.location = '<?php echo SECURE_PATH;?>home/';

</script>
<?php	
}
else{
?>
<script type="text/javascript">
setStateGet('loginForm','<?php echo SECURE_PATH;?>login_process.php','loginForm=1');
</script>


<?php

}
?>
     
     
     
</div>


</body>
</html>