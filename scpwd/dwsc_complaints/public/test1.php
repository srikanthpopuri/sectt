<?php
ini_set('display_errors','On');
include('../include/session.php');
 // Require https
unset( $_SESSION['upload8']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="http://www.telangana.gov.in/Style%20Library/GoT/Content/img/logo.png" type="image/png" sizes="16x16">

    <title>Office of the State Commissioner For Persons with Disabilities </title><?php echo $session->commonCSS();?>
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
#loginForm{
  background-color: #fff;
}
.header_block{
    clear: both;
    min-height: 80px;
    z-index: 99;
    background-color: #6a1644;
}

.profile_block_menus li{
  float: left;
list-style-type: none;
width: 50%;
text-align: center;
margin-bottom: 10px;
}

.main_head{

    text-align: center;
    color: #fff;
    font-size: 9px;
    font-weight: 600;


}
.ts_logo{
      /*width: 385px;
      height: auto;*/
      margin-top: 15px;
}
.sub_head{
  clear: both;
display: block;
color:  #fabd75;
text-align:center;
font-size: 9px;
font-weight: 600;
margin-bottom:0;
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
  font-weight: 600;
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
  padding: 24px 21px;
}

.btn_custom{
  background: #de047f;
    padding: 12px 84px;
    margin-top: 15px;
    color: #fff;
}
.btn_custom :hover,
.btn_custom_back:hover {
	
  color: #fff;
}
.search_block{
  float: right;
    margin-top: 17px;
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
<link rel="stylesheet" href="<?php echo SECURE_PATH; ?>css/colors.css">
  <link rel="stylesheet" href="<?php echo SECURE_PATH; ?>css/dwdsc-color.css">
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<?php echo $session->commonJS();?>
 

<script type="text/javascript">
$(window).load(function() {
  // When the page has loaded
  $("#container").fadeIn(2000);
  $(".formLoader").fadeOut(1000);
});
</script>



<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Office of the State Commissioner for Persons with Disabilities,
Government of Telangana" />
<meta name="keywords" content="Office of the State Commissioner for Persons with Disabilities,
Government of Telangana" />
<meta name="author" content="Office of the State Commissioner for Persons with Disabilities,
Government of Telangana" />

<!-- Page Title -->
<title>Office of the State Commissioner for Persons with Disabilities,
Government of Telangana</title>

<!-- Favicon and Touch Icons -->
 <link href="http://scpwd.telangana.gov.in/images/favicon.png" rel="shortcut icon" type="image/png">
<!--<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
 -->
<!-- Stylesheet -->
<link href="http://scpwd.telangana.gov.in/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="http://scpwd.telangana.gov.in/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="http://scpwd.telangana.gov.in/css/animate.css" rel="stylesheet" type="text/css">
<link href="http://scpwd.telangana.gov.in/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link href="http://scpwd.telangana.gov.in/css/menuzord-megamenu.css" rel="stylesheet"/>
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="http://scpwd.telangana.gov.in/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="http://scpwd.telangana.gov.in/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="http://scpwd.telangana.gov.in/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="http://scpwd.telangana.gov.in/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="http://scpwd.telangana.gov.in/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="http://scpwd.telangana.gov.in/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="http://scpwd.telangana.gov.in/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="http://scpwd.telangana.gov.in/css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<!--
<script src="http://scpwd.telangana.gov.in/js/jquery-2.2.4.min.js"></script>
<script src="http://scpwd.telangana.gov.in/js/jquery-ui.min.js"></script>
<script src="http://scpwd.telangana.gov.in/js/bootstrap.min.js"></script>-->
<!-- JS | jquery plugin collection for this theme -->
<script src="http://scpwd.telangana.gov.in/js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="http://scpwd.telangana.gov.in/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="http://scpwd.telangana.gov.in/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
$(document).ready(function(){
    $(".btn1").click(function(){
        $("#showmore_accesibility").slideDown();
    });
    $(".btn2").click(function(){
        $("#showmore_msgsc").slideDown();
    });
}); 
</script>
<style>
#rev_slider_home, #rev_slider_home_wrapper, .tp-fullwidth-forcer
{
height: 350px !important;
}

.feature-title p {
    text-align: left;
    color: #000;
}



 .feature-title a {
    text-align: left;
    
    color: #1c0cff;
    text-decoration: underline;
}

.feature-box {
    
    height: 460px;
}	
li.ccpd_bg, .cont_txt {
    text-align: left;
	list-style: disc;
}
a:hover, a:focus {
    color: #009fff;
    text-decoration: underline !important;
	}
	
	.p-10 {
    padding: 10px 10px 10px 30px !important;
}


.related_links
{
    color: #1c0cff;    
    text-decoration: underline;
}
.modal-open .modal {
    margin-top: 80px;
}
</style>


<?php include "http://scpwd.telangana.gov.in/widget_header.php"; ?>

</head>
<body class="has-side-panel side-panel-right fullwidth-page" data-magnified-zone=".mg_zone">
 
 <?php include "http://scpwd.telangana.gov.in/widget_body.php"; ?>
 
 <div style="padding-top:64px; background-color:#fff" id="widget_content"  >    
 
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img alt="" src="http://scpwd.telangana.gov.in/images/preloaders/5.gif">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
  
  <!-- Header -->
  <?php include "http://scpwd.telangana.gov.in/header.php"; ?>



	<div class="container">
		<section class="wrapper" style="margin-top:10px;">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
             
             


<section class="panel">
                          <header class="panel-heading header-title">
                            <b style="float: left">REGISTER YOUR GRIEVANCE</b>
                              <a class="btn btn_custom_back" style="float: right" href="http://scpwd.telangana.gov.in/" ><b>Back To Home</b></a>
                              <br /> </header>
                          <div class="panel-body">
                         
                         <div id="adminForm"  >
                         <?php
						 if(isset($_REQUEST['addForm']) == 2){
						 ?>

<script type="text/javascript">
setStateGet('adminForm','<?php echo SECURE_PATH;?>public/process1.php','addForm=2&editform=<?php echo $_REQUEST['editform']; ?>');


</script>

<?php } else {  ?>
<script type="text/javascript">

setStateGet('adminForm','<?php echo SECURE_PATH;?>public/process1.php','addForm=1');

</script>
<?php } ?>
                          </div>
                      </section>
                      
                      
                      
                      
<!--Details Modal-->

<div class="modal fade" id="messageDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <b style="color:#FFF;">REGISTER YOUR GRIEVANCE</b>
</h4>
      </div>
      <div class="modal-body" id="viewDetails" >
       
      </div>
      <div class="modal-footer" style="display:none;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Details MOdal--> 
               
               <section class="panel">
           
              
              <!-- <div class="panel-body">
              
                   
                              <section id="unseen">
                            

                              <div id="adminTable">
                             
                                
                              
                              </div>
                              </section>
                          </div> -->
              
              </section>
              </div>
              </div>
              
              <!-- page end-->
          </section>
	</div>
     
      </section>


 
<script type="text/javascript">

function checkUpdate(ref,id){
   id = '#'+id;
   
   if($(ref).is(':checked'))
     $(id).val('1');
	 
   else
     $(id).val('0');
	 
   	
}

 
 

   function onlyAlphabets(evt, t) {

            try {

                evt = (evt) ? evt : window.event;
               var charCode = (evt.which) ? evt.which : evt.keyCode;

                if(charCode == 8 || charCode == 9 || charCode == 32){
                    return true;
                }
    
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))

                    return true;

                else

                    return false;

            }

            catch (err) {

                alert(err.Description);

            }

        }
		
		function isAlphaNumber(evt,ref,len) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
	if(charCode == 8 || charCode == 9){
	  //alert('aaaaaaaaaaa');
	  return true;	
	}
	if(ref.val().length >= len){
		//alert('ddddddddddddd');
	    return false;
	}
   
	
 if((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
		//alert('bbbbbbbbbbbb');
        return true;
	}
	if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }

	 
    return true;
}

		

   function isNumber(evt,ref,len) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
   if(charCode == 8 || charCode == 9 ){
	  return true;	
	}
	
	
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }
	else if(ref.val().length >= len){
	    return false;
	}
    return true;
}

function isNumber1(evt,ref) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
   if(charCode == 8 || charCode == 9 ){
	  return true;	
	}
	
	
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }
	
    return true;
}

    function validateEmail(k) {
        var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(k);
        document.getElementById("error2").style.display = re ? "none" : "inline";
    }

function isMobile(evt,id,len) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if(charCode == 8 || charCode == 9 ){
        return true;
    }


    ref = $('#'+id);

    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }
    else if(ref.val().length >= len){

        return false;
    }



    if(parseInt(ref.val().charAt(0)) < 6 ){
        $('#'+id+'_error').html(" * Invalid Mobile Number");
        return false;
    }

    $('#'+id+'_error').html("");
    return true;
}

</script>


<script type="text/javascript">
    var specialKeys = new Array();
    specialKeys.push(8); //Backspace
    specialKeys.push(9); //Tab
    specialKeys.push(46); //Delete
    specialKeys.push(36); //Home
    specialKeys.push(35); //End
    specialKeys.push(37); //Left
    specialKeys.push(39); //Right
    function IsAlphaNumeric(e) {
        var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
        var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
        document.getElementById("error").style.display = ret ? "none" : "inline";
        return ret;
    }
</script>
<script>
    $(document).ready(function () {
      // Color Picker js
      $(".select_theme").on('click', function () {
        var getId = $(this).attr('value');
        $('body').removeClass('orange blue brown green d-pink purple sea black')
          .addClass(getId);
      });
      $(".color_picker_switcher").on('click', function () {
        $(".color_picker_area").toggleClass('on');
      })
    });
  </script>
<!--footer start-->
      <footer class="site-footer" >
          <div class="text-center">
              2018 &copy; WDSC . Technology Partner <a href="#" style="color:#fff;">Entro Labs&reg;</a>
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->

  </section>
  

<?php $session->commonFooterJS();?> 

</body>