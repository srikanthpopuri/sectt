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
<?php echo $session->commonJS();?>
 

<script type="text/javascript">
$(window).load(function() {
  // When the page has loaded
  $("#container").fadeIn(2000);
  $(".formLoader").fadeOut(1000);
});
</script>


</head>
<body>

<div class="formLoader">
<table cellpadding="10px" cellspacing="8" style="padding:0;margin:0;">
<tr><td ><a class="loadingLogo" >WDSC</a><br /><br /></td></tr>
<tr><td><img src="<?php echo SECURE_PATH;?>theme/img/loader.gif" /><br /></td></tr>
<tr><td ><br />Loading... </td></tr>
</table>
</div>
<!-- Color picker Start -->

  <div class="color_picker_area">
    <div class="color_picker_switcher">
      <i class="fa fa-tint"></i>
    </div>
    <form>
      <h4>Theme colors</h4>
      <input class="select_theme" type="radio" name="cor" id="cor1" value="orange">
      <label for="cor1" class="cor1" title="orange"></label>

      <input class="select_theme" type="radio" name="cor" id="cor2" value="blue">
      <label for="cor2" class="cor2" title="blue"></label>

      <input class="select_theme" type="radio" name="cor" id="cor3" value="brown">
      <label for="cor3" class="cor3" title="brown"></label>

      <input class="select_theme" type="radio" name="cor" id="cor4" value="green">
      <label for="cor4" class="cor4" title="green"></label>

      <input class="select_theme" type="radio" name="cor" id="cor5" value="d-pink">
      <label for="cor5" class="cor5" title="d-pink"></label>

      <input class="select_theme" type="radio" name="cor" id="cor6" value="purple">
      <label for="cor6" class="cor6" title="purple"></label>

      <input class="select_theme" type="radio" name="cor" id="cor7" value="sea">
      <label for="cor7" class="cor7" title="sea"></label>

      <input class="select_theme" type="radio" name="cor" id="cor8" value="black">
      <label for="cor8" class="cor8" title="black"></label>
    </form>
  </div>
  <!--color picker End-->


<section id="container" class="">
<div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-7 text-center">
            <div class="left-content text-left">
              <a href="#">
                <i class="fa fa-share"></i>
                <span>Skip Main Content</span>
              </a>
              <a href="#">
                <i class="fa fa-universal-access"></i>
                <span>Screen Reader Access</span>
              </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-5 text-center">
            <ul class="header-widget text-right">
              <li>
                Font-size:
              </li>
              <li>
                <a class="btn btn-xs theme-bg btn-rounded" href="#" title="Decrease fontsize" id="btn-decrease">A-</a>
              </li>
              <li>
                <a class="btn btn-xs theme-bg btn-rounded" href="#" title="Normal fontsize" id="btn-orig">A</a>
              </li>
              <li>
                <a class="btn btn-xs theme-bg btn-rounded" href="#" title="Increase fontsize" id="btn-increase">A+</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="middle-header">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
            <div class="row">
              <div class="col-lg-4 col-md-12 text-center hidden-md hidden-sm hidden-xs">
 
                <a href="#">
                  <img class="ts-logo img-responsive" src="<?php echo SECURE_PATH; ?>images/ada-300x300.png" width="250" alt="logo">
                </a>
              </div>
              <div class="col-lg-2 col-md-2 text-center" style="display:none;">
                <a href="#">
                  <img class="wdsc-logo" src="<?php echo SECURE_PATH; ?>images/logo.png" width="80" alt="logo">
                </a>
              </div>
              <div class="col-lg-6 col-md-10">
                <div class="navbar-brand-text text-xl-center">
                  <a href="#">Office of the State Commissioner For Persons with Disabilities 
                    <br>
                    <small>Government of Telangana</small>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 hidden-sm hidden-xs">
            <ul class="ts-vips list-inline">
              <li>
                <a href="#">
                  <div class="vip-details">
                    <div class="vip-img">
                      <img src="<?php echo SECURE_PATH; ?>images/kcr.jpg" alt="testimonial-author">
                    </div>
                    <div class="vip-name">
                      <h4>Sri. K. Chandrashekar Rao</h4>
                      <h6>Hon'ble Chief Minister</h6>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="vip-details">
                    <div class="vip-img">
                      <img src="<?php echo SECURE_PATH; ?>images/tnr.jpg" alt="testimonial-author">
                    </div>
                    <div class="vip-name">
                      <h4>Sri. Tummala Nageswara Rao</h4>
                      <h6>Hon'ble Minister for R&B, WDSC</h6>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </div>-->
        </div>
      </div>
    </div>


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