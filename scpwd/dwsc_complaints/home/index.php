<?php

include('../include/session.php');

if(!$session->logged_in){

  header('Location: '.SECURE_PATH);

}

else{

	

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" href="http://www.telangana.gov.in/Style%20Library/GoT/Content/img/logo.png" type="image/png" sizes="16x16">

    <title>WDSC | Telangana Government</title>
<?php echo $session->commonCSS();?>

<style type="text/css">

#container {

  display: none;

}

.formLoader{

margin:20px auto;

    width:240px;

	text-align:center;

	font-size:16px;

	color: #2e2e2e;

	z-index:1000;

}



.formLoader a.loadingLogo{

	display:block;

	text-align:center;

	

	color: #2e2e2e;

  text-transform: uppercase;

	font-size:40px;

}



.formLoader a.loadingLogo span{

	 color: #ff6c60;

	

}



</style>

<?php echo $session->commonJS();?>

<script type="text/javascript">

$(window).load(function() {

  // When the page has loaded

  $("#container").fadeIn(2000);

  $(".formLoader").fadeOut(1000);

});

</script>

<?php $session->commonFooterJS();?> 

</head>

<body>



<div class="formLoader">

<table cellpadding="10px" cellspacing="8" style="padding:0;margin:0;">

<tr><td ><a class="loadingLogo" style="font-size: 20px" >Welfare of Disabled & Senior Citizens Department</a><br /><br /></td></tr>

<tr><td><img src="<?php echo SECURE_PATH;?>theme/img/loader.gif" /><br/></td></tr>

<tr><td ><br />Loading... </td></tr>

</table>

</div>




<section id="container" class="">

  <!--header start-->
  
  

        <header class="header white-bg" id="homeHeadBar">

          <div class="sidebar-toggle-box">

              <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-wheelchair" style="font-size: 27px"></div>
              <!--<img style="height:50px;" src="<?php echo SECURE_PATH; ?>theme/img/ED_logo.png" alt="No Image"  />-->

          </div>

          <!--logo start-->
<?php
if($session->userlevel == 9 || $session->userlevel == 8)
{
?>
          <a class="logo" style="padding-left: 0">Welfare of Disabled  & Senior Citizens&nbsp;&nbsp;&nbsp;</a>
<?php } else {
$query_users = $database->query("select employee_district from users where username = '".$_SESSION['username']."'")	 ;
$ret_query_users=mysqli_fetch_array($query_users);
$query_dist = $database->query("select district from global_districts where uid = '".$ret_query_users['employee_district']."'");
$ret_query_dist=mysqli_fetch_array($query_dist);

 ?>
          <a class="logo" style="padding-left: 0">Department for Women, Children, Disabled & Senior Citizens - <?php echo $ret_query_dist['district']."District"; ?>&nbsp;&nbsp;&nbsp;</a>

<?php } ?>
          <!--logo end-->

         

          

              <div class="top-nav ">

              <ul class="nav pull-right top-menu">

                   <!-- user login dropdown start-->

                  <li class="dropdown">

                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                          <i class="fa fa-user"></i>

                          <span class="username"><?php echo ucfirst($database->get_name('users','username',$session->username,'name'))?></span>

                          <b class="caret"></b>

                      </a>

                      <ul class="dropdown-menu extended logout">

                          <div class="log-arrow-up"></div>

                          <?php

						  if($_SESSION['username']=='admin')

						  {

						  ?>

                           <li><a onclick = "setStateGet('main-content','<?php echo SECURE_PATH;?>login_process.php','userLogout=true')"><i class="fa fa-key"></i> Log Out</a>

                          <?php

						  }

						  else {

						 ?>

                            <li><a onclick = "setStateGet('main-content','<?php echo SECURE_PATH;?>login_process.php','userLogout=true')"><i class="fa fa-key"></i> Log Out</a>

                         <!-- <a onclick = "setStateGet('main-content','<?php echo SECURE_PATH;?>resetpassword/','getLayout=true')"><i class="fa fa-key"></i>Reset Password</a> -->

                          </li>

                          <?php

                          }

						  ?>

                      </ul>

                  </li>

                  <!-- user login dropdown end -->

              </ul>

          </div>

        </header>

      <!--header end-->

      <!--sidebar start-->

      

     

      <aside>

          <div id="sidebar"  class="nav-collapse ">

              <!-- sidebar menu start-->

              <ul class="sidebar-menu" id="nav-accordion">
              
                             <?php

if($session->userlevel == 9 || $session->userlevel == 8)
{
?>
    <li>
                       <a onclick="setState('main-content','<?php echo SECURE_PATH;?>grievances_view/','getLayout=true')">
                         <i class="fa fa-bars" aria-hidden="true"></i>  <span>View Grievances</span>
                      </a>
                     </li>

      
    </li>
    <li class="sub-menu"  >
        <a onclick="">
            <i class="fa fa-dashboard" aria-hidden="true"></i>
            <span>Dashboard / Reports</span>
        </a>
        <ul class="sub">
      
            <li>
                <a onclick="setState('main-content','<?php echo SECURE_PATH;?>viewreport1/','getLayout=true')">
                          <i class="fa fa-wheelchair" aria-hidden="true"></i><span>Grievances</span>
                </a>
            </li>
            
        </ul>
    </li>


      <?php }               
                                



elseif($session->userlevel == 6)
{ ?>
    
      
           <li>
                       <a onclick="setState('main-content','<?php echo SECURE_PATH;?>grievances_dwo_view/','getLayout=true')">
                         <i class="fa fa-bars" aria-hidden="true"></i>  <span>View Grievances</span>
                      </a>
                     </li>  
           
           
    <li>
            <a onclick="setState('main-content','<?php echo SECURE_PATH;?>createemployee/','getLayout=true')">
                           <i class="fa fa-user"></i>
                          <span>Edit Profile</span>
                      </a>
                     </li>
<?php }



?>

</ul>
          </div>
      </aside>
<section id="main-content">
          <section class="wrapper">
              <div class="row">
                <div class="col-sm-12">
              <section class="panel">
              <header class="panel-heading">
                 Welfare of Disabled & Senior Citizens Department
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
                <div id="formLoader">
<img src="<?php echo SECURE_PATH;?>theme/img/loader.gif" alt="Loading..."/>
</div>
              <div class="row adv-table" id="tableTop">
             
                  <script type="text/javascript">
               setStateGet('tableTop','<?php echo SECURE_PATH;?>home/process.php','tableTop=true');
			   </script>
                       
                   </div>
              
              <div class="panel-body">
                          
              
                   
                              <section id="unseen" style="display:none;">
                              <div id="adminTable" >
                              
                          
                              </div>
                              </section>
                          </div>
              
              </section>
              </div>
              </div>
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->
      <div class="sb-slidebar sb-right sb-style-overlay" id="rightSideBar">

          <script type="text/javascript">
              setStateGet('rightSideBar','<?php echo SECURE_PATH;?>home/process.php','rightSideBar=true');
          </script>
               
               
                       
      </div>
      <!-- Right Slidebar end -->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2018 &copy;  WDSC. Technology Powered By <a href="http://entrolabs.com" style="color:#FFF; text-decoration:underline;">Entro Labs</a>
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->

      <!--footer end-->

  </section>

<?php
}

?>

