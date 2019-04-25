<?php

include('include/session.php');
?>
<style>
body{
  font-family: century gothic;
}
#loginForm{
  background-color: #fff;
}
.header_block{
    clear: both;
    min-height: 80px;
    z-index: 99;
    background-color: #2a1407;
}

.profile_block_menus li{
  float: left;
margin: 5px 18px;
list-style-type: none;
width: 40%;
text-align: center;
}

.main_head{

    text-align: center;
    color: #fff;
    font-size: 10px;
    font-weight: 600;

}
.ts_logo{
      width: 385px;
      height: auto;
      margin-top: 16px;
}
.sub_head{
  clear: both;
display: block;
color:  #fabd75;
text-align:center;
font-size: 10px;
font-weight: 600;
}

.main_section{
  background-image: url("<?php echo SECURE_PATH; ?>assets/images/login_images/Login_BG.jpg");
  width: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  padding: 50px;
}

.heading{
  margin-top: 0!important;
  color: #fff;
}
.input_images{
  height: 14px;
  width:auto;
}

.form_pad{
  background-color: #eee;
  text-align:center;
  border-radius:6px;
  border: none;
  width: 200px;
  height: 47px;
  font-size: 17px;
}

.input_pad{
  padding: 24px 34px;
}

.btn_custom{
  background: #de047f;
    padding: 12px 84px;
    margin-top: 15px;
    color: #fff;
}
..btn_custom :hover {
  color: #fff;
}

.second_block{
  background-color: #fff;
}
.img_icon{
  height:100px;
  width:auto;
}
.colored_text{
  color: #f7941d;
}
.second_block h3{
  margin: 30px 0;
}
</style>
<?php
if(isset($_GET['loginForm'])){

?>

<div class="login_page">
  <div class="header_block">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-2 col-md-offset-0 col-sm-6 col-xs-6 col-xs-offset-3">
                      <div class="logo_block">
                         <img src="<?php echo SECURE_PATH; ?>assets/images/login_images/ED_logo.png" alt="logo-png" class="ts_logo">
                      </div>
                  </div>
                  <div class="col-md-2 col-md-offset-3 col-sm-6 col-xs-12">
                      <div class="search_block">
                        <ul class="profile_block_menus">

                            <li><a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/Temple.png" width="120" height="100" alt="logo-png"></a></li>
                        </ul>
                      </div>
                  </div>
                  <div class="col-md-4 col-xs-offset-1 col-sm-6 col-xs-12">
                      <div class="profile_block">
                        <ul class="profile_block_menus">
                          <li>
                            <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/CM.png" style="margin: 0 auto;" width="75" height="75" alt="logo-png">

                            <span class="sub_head"> K. CHANDRASHEKAR RAO </span>
                            <span class="main_head" style="margin-left: 7px;">HON'BLE CHIEF MINISTER</span>
                            </a></li>
                          <li>
                            <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/BD_minister.png" style="margin: 0 auto;" width="75" height="75" alt="logo-png">

                              <span class="sub_head" style="margin-left:15px"> A. INDRA KIRAN REDDY </span>
                              <span class="main_head">HON'BLE ENDOWMENTS MINISTER</span>
                            </a></li>
                        </ul>

                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="main_section">
        <center>
          <h2 class="heading">Welcome to Endowments Land Management System</h2>
          <p>ENDOW LMS An Goverment of Telangana Initiative to expand the e-Governance <br> to digitalize, control and monitor revenue from leased lands.</p>
        </center>

        <center>
        <form class="form-inline">
          <div class="input-group input_pad">
            <span style="border:none" class="input-group-addon"><img class="input_images" src="<?php echo SECURE_PATH; ?>assets/images/login_images/user_name.png"></i></span>
            <input id="user" type="text" class="form-control form_pad" name="email" placeholder="Username" autofocus>
          </div>

              <div class="input-group input_pad">
                <span style="border:none" class="input-group-addon"><img class="input_images" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Key.png"></i></span>
                <input type="password" class="form-control form_pad" id="pass" placeholder="Password">
              </div>
              <br>
              <a class="btn btn-lg btn-login btn_custom" onClick="setState('loginForm','<?php echo SECURE_PATH;?>login_process.php','login=1&user='+$('#user').val()+'&pass='+$('#pass').val())"><i class="fa fa-signin"></i> LogIn</a>

            </form>
          </center>
      </div>

      <div class="second_block">
        <div class="row" style="margin-left:0;margin-right:0;">
        <center><h3 class="colored_text">How It Works</h3></center>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <center>
            <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon1.png">
            <h5 class="colored_text">Digitalization</h5>
            <p>Digitalize existing on paper records to online ERP System</p>
          </center>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <center>
            <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon2.png">
            <h5 class="colored_text">Control & Monitor</h5>
            <p> To Control and Monitor leased lands across different levels of Administration</p>
          </center>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <center>
            <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon3.png">
            <h5 class="colored_text">Revenue</h5>
            <p>Dashboards, Reports and Tracking for revenue generation from endowment property</p>
          </center>
        </div>
      </div>
    </div>





</div>



<script type="text/javascript">
$('#user').focus();
</script>

<?php
}

if(isset($_POST['login'])){

      $_POST = $session->cleanInput($_POST);


$subuser = $_POST['user'];
$subpass = $_POST['pass'];

$usererror = '';
$passerror = '';

      /* Username error checking */
      $field = "user";  //Use field name for username
      // echo "SELECT valid FROM ".TBL_USERS." WHERE username='$subuser'";
	  $q = "SELECT valid FROM ".TBL_USERS." WHERE username='$subuser'";
	  $valid = $database->query($q);
	  $valid = mysqli_fetch_array($valid);

      if(!$subuser || strlen($subuser = trim($subuser)) == 0){

         $usererror =  "* Username not entered";
      }


      /* Password error checking */
      $field = "pass";  //Use field name for password
      if(!$subpass){
         $passerror =   "* Password not entered";
      }

      /* Return if form errors exist */
      if(strlen($usererror) == 0 && strlen($passerror) == 0){



      /* Checks that username is in database and password is correct */
      $subuser = stripslashes($subuser);
      $result = $database->confirmUserPass($subuser, $subpass);

      /* Check error codes */
      if($result == 1){
         $field = "user";
         $usererror =   "* Username not found";
      }
      else if($result == 2){
         $field = "pass";
        $passerror =   "* Invalid password";
      }

	  }

      /* Login successful */
      if(strlen($usererror) == 0 && strlen($passerror) == 0){
  /* Username and password correct, register session variables */
      $session->userinfo  = $database->getUserInfo($subuser);
      $session->username  = $_SESSION['username'] = $session->userinfo['username'];
      $session->userid    = $_SESSION['userid']   = $session->generateRandID();
      $session->userlevel = $session->userinfo['userlevel'];

      /* Insert userid into database and update active users table */
      $database->updateUserField($session->username, "userid", $session->userid);
      $database->addActiveUser($session->username, $session->time);
      $database->removeActiveGuest($_SERVER['REMOTE_ADDR']);

      /**
       * This is the cool part: the user has requested that we remember that
       * he's logged in, so we set two cookies. One to hold his username,
       * and one to hold his random value userid. It expires by the time
       * specified in constants.php. Now, next time he comes to our site, we will
       * log him in automatically, but only if he didn't log out before he left.
       */
//      if($subremember){
         setcookie("cookname", $session->username, time()+COOKIE_EXPIRE, COOKIE_PATH);
         setcookie("cookid",   $session->userid,   time()+COOKIE_EXPIRE, COOKIE_PATH);
 //     }
$database->query("INSERT INTO  password_log VALUES (NULL,'".$_SESSION['username']."','".$_SERVER['REMOTE_ADDR']."','".time()."','login')");

?>
<script type="text/javascript">

window.location = '<?php echo SECURE_PATH;?>home/';

</script>
<?php
      }
      /* Login failed */
      else{


?>

<div class="login_page">
  <div class="header_block">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-2 col-md-offset-0 col-sm-6 col-xs-6 col-xs-offset-3">
                      <div class="logo_block">
                         <img src="<?php echo SECURE_PATH; ?>assets/images/login_images/ED_logo.png" alt="logo-png" class="ts_logo">
                      </div>
                  </div>
                  <div class="col-md-2 col-md-offset-3 col-sm-6 col-xs-12">
                      <div class="search_block">
                        <ul class="profile_block_menus">

                            <li><a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/Temple.png" width="120" height="100" alt="logo-png"></a></li>
                        </ul>
                      </div>
                  </div>
                  <div class="col-md-4 col-xs-offset-1 col-sm-6 col-xs-12">
                      <div class="profile_block">
                        <ul class="profile_block_menus">
                          <li>
                            <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/CM.png" style="margin-left:40px" width="75" height="75" alt="logo-png">

                            <span class="sub_head"> K. CHANDRASHEKAR RAO </span>
                          <span class="main_head" style="margin-left: 7px;">HON'BLE CHIEF MINISTER</span>
                            </a></li>
                          <li>
                            <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/BD_minister.png" style="margin-left:42px" width="75" height="75" alt="logo-png">

                              <span class="sub_head" style="margin-left:15px"> A. INDRA KIRAN REDDY </span>
                              <span class="main_head">HON'BLE ENDOWMENTS MINISTER</span>
                            </a></li>
                        </ul>

                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="main_section">
        <center>
          <h2 class="heading">Welcome to Endowments Land Management System</h2>
          <p>ENDOW LMS An Goverment of Telangana Initiative to expand the e-Governance <br> to digitalize, control and monitor revenue from leased lands.</p>
        </center>

        <center>
        <form class="form-inline">
          <div class="input-group input_pad">
            <span style="border:none" class="input-group-addon"><img class="input_images" src="<?php echo SECURE_PATH; ?>assets/images/login_images/user_name.png"></i></span>
            <input id="user" type="text" class="form-control form_pad" name="email" placeholder="Username" autofocus value="<?php echo $_POST['user'];?>">

          </div>
          <div class="form-group has-error">
                  <p class="help-block"><?php echo $usererror;?></p>
          </div>

              <div class="input-group input_pad">
                <span style="border:none" class="input-group-addon"><img class="input_images" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Key.png"></i></span>
                <input type="password" class="form-control form_pad" id="pass" placeholder="Password" value="<?php echo $_POST['pass'];?>">

              </div>
              <div class="form-group has-error">
                           <p class="help-block"><?php echo $passerror ;?></p>
                   </div>
              <br>
              <a class="btn btn-lg btn-login btn_custom" onClick="setState('loginForm','<?php echo SECURE_PATH;?>login_process.php','login=1&user='+$('#user').val()+'&pass='+$('#pass').val())"><i class="fa fa-signin"></i> LogIn</a>

            </form>
          </center>
      </div>

      <div class="second_block">
        <div class="row" style="margin-left:0;margin-right:0;">
        <center><h3 class="colored_text">How It Works</h3></center>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <center>
            <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon1.png">
            <h5 class="colored_text">Digitalization</h5>
            <p>Digitalize existing on paper records to online ERP System</p>
          </center>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <center>
            <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon2.png">
            <h5 class="colored_text">Control & Monitor</h5>
            <p> To Control and Monitor leased lands across different levels of Administration</p>
          </center>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <center>
            <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon3.png">
            <h5 class="colored_text">Revenue</h5>
            <p>Dashboards, Reports and Tracking for revenue generation from endowment property</p>
          </center>
        </div>
      </div>
    </div>





</div>


























<!--
<form class="form-signin" >
        <h2 class="form-signin-heading">Sign in to Endowments</h2>
        <div class="login-wrap">
<input type="text" class="form-control" id="user" placeholder="Username" autofocus value="<?php echo $_POST['user'];?>">
                                  <div class="form-group has-error">
                                          <p class="help-block"><?php echo $usererror;?></p>
                                  </div>

            <input type="password" class="form-control" id="pass" placeholder="Password" value="<?php echo $_POST['pass'];?>">
                             <div class="form-group has-error">
                                          <p class="help-block"><?php echo $passerror ;?></p>
                                  </div>

     <label class="checkbox">
                <span class="pull-right">

                </span>
            </label>


     <a class="btn btn-lg btn-login btn-block" onClick="setState('loginForm','<?php echo SECURE_PATH;?>login_process.php','login=1&user='+$('#user').val()+'&pass='+$('#pass').val())"><i class="fa fa-signin"></i> Sign In</a>


        </div>

          <!-- Modal -->
          <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      <!-- </form> -->




<?php
      }

}


if(isset($_REQUEST['userLogout'])){
	$database->query("INSERT INTO  password_log VALUES (NULL,'".$_SESSION['username']."','".$_SERVER['REMOTE_ADDR']."','".time()."','logout')");

	  $session->logout();
?>
	  <script type="text/javascript">

window.location = '<?php echo SECURE_PATH;?>';
</script>
<?php
}
?>
<script type="text/javascript">
$('#loginForm').keyup(function(e) {

   if ( e.which == 13) {
      //stuff
setState('loginForm','<?php echo SECURE_PATH;?>login_process.php','login=1&user='+$('#user').val()+'&pass='+$('#pass').val());
}

});

</script>
