<?php

include('include/session.php');
?>
<script type="text/javascript">

$( ".datepicker" ).datepicker({

			changeMonth: true,

			changeYear: true,

			dateFormat: "dd-mm-yy",

			yearRange: "1970:2025", 
			
			maxDate: 0


		});
		</script>
<script type="text/javascript">		
function value_pass()
{
	var marriage = document.getElementById("m_dob").value;
	var bride = document.getElementById("b_dob").value;
	var bridegroom = document.getElementById("bg_dob").value;
	
	//href="<?php echo SECURE_PATH; ?>public/index2.php"
	//window.location.href = '<?php echo SECURE_PATH; ?>public/index2.php?marriage_date=' + marriage + '&b_dob = ' + bride + '& bg_dob = ' + bridegroom ;
	window.location.href = '<?php echo SECURE_PATH; ?>public/index2.php?marriage_date=' + marriage + '&b_dob=' + bride + '&bg_dob=' + bridegroom ;
}
	
</script>
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
    font-size: 9px!important;
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
font-size: 9px!important;
font-weight: 600;
margin-bottom:0;
}
.main_section{
  background-image: url("<?php echo SECURE_PATH; ?>assets/images/banner_bg.png");
  width: 100%;
  height: 450px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  padding: 50px 150px 150px 150px;
    overflow: hidden;
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
..btn_custom :hover {
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
.head_section{
    background: url("<?php echo SECURE_PATH; ?>assets/images/Enter_icon.png") no-repeat right 5px center;
	margin-bottom: 54px;
overflow: hidden;
padding: 15px;
background-color: #e91a8d;
box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.4);
color: #fff;
border-radius: 4px;
width:400px;
min-height: 70px;
}
.head_section_left {
    float: left;
	width: 50px;
}
.head_section_left img {
	width: 100%;
}
.head_section_right {
    float: left;
	width: 290px;
	text-align: left;
}
.head_section_right h4 {
	padding-left: 10px;
	margin: 0px;
}
.head_section_right h4 a {
	color: #fff;
	font-size: 12px;
}
.main_section_text {
	text-transform: uppercase;
    font-weight: 600;
    font-size: 22px;
    padding-bottom: 50px;
}
</style>

<!--Details Modal-->

<div class="modal fade" id="ageDetailsPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <b style="color:#FFF;"> Terms & Conditions</b>
</h4>
      </div>
      <div class="modal-body" id="ageDetails" >
       
      </div>
      <div class="modal-footer" style="display:none;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Details MOdal-->


<?php

if(isset($_REQUEST['ageDetailstrue']))
{
	?>
   <style>
#b_dob{
background-image:url('https://d30y9cdsu7xlg0.cloudfront.net/png/181177-200.png');
background-repeat:no-repeat;
background-position:6px;
background-size: 16%;
text-align: center;

}
#bg_dob{
background-image:url('http://107.178.223.50/dwsc_new/assets/images/login_images/people.png');
background-repeat:no-repeat;
background-position:6px;
background-size: 16%;
text-align: center;

}

</style>
	<form role="form">
    <span style="color:#F00;"> * Application Must be Submitted within 1 Year from the Date of Marriage</span><br />
    <span style="color:#F00;"> * Bride Must Have Attained  18 Years of age on the date of Marriage</span><br />
        <span style="color:#F00;"> * Bride Groom Must Have Attained  21 Years of age on the date of Marriage</span><br />
<div class="row" id="m_proceed">
    <div class="col-md-4">
            <label>Marriage Date</label>
            <input type="text" class="form-control datepicker" id="m_dob"   onChange="setState('m_proceed','<?php echo SECURE_PATH;?>ajax.php','age_checker=1&marriage=1&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val()+'')" value="<?php if(isset($_POST['m_dob'])){echo $_POST['m_dob'];}?>" >
        </div>
        
        </div>
    <div class="row" style="display:none;" id="b_proceed">
    <div class="col-md-4"  >
            <label>Bride Date of Birth</label>
            <input type="text" class="form-control datepicker" id="b_dob"   onChange="setState('b_proceed','<?php echo SECURE_PATH;?>ajax.php','age_checker=1&bride=1&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val()+'')" value="<?php if(isset($_POST['b_dob'])){echo $_POST['b_dob'];}?>" >
        </div>
        
        </div>
        <div class="row" style="display:none;" id="bg_proceed">
        <div class="col-md-4"  >
            <label>Bride Groom Date of Birth</label>
            <input type="text" class="form-control datepicker" id="bg_dob" onChange="setState('bg_proceed','<?php echo SECURE_PATH;?>ajax.php','age_checker=1&bridegroom=1&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val()+'')" value="<?php if(isset($_POST['bg_dob'])){echo $_POST['bg_dob'];}?>" >
        </div>
        
        </div>
        <br/>
        <div class="row" style="display:none;" id="age_proceed">
        <div class="col-md-4">
      <!-- <a class="btn btn-success" onClick="setState('xxx','<?php echo SECURE_PATH;?>public/index2.php','page=true&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val())">Next</a>-->
      <a class="btn btn-success" onclick="value_pass()" > Next</a>
        </div>
        </div>
    
    </form>
	
<?php }


if(isset($_REQUEST['login'])){

?>


<div class="login_page" >
 <!-- <div class="header_block">
          <div class="container">
              <div class="row">
                  <div class="col-md-3 col-md-offset-0 col-sm-6 col-xs-6 col-xs-offset-3">
                       <div class="logo_block">
                           <a href="http://107.178.223.50/dwsc"> <img src="<?php echo SECURE_PATH; ?>assets/images/login_images/ED_logo.png" alt="logo-png" class="ts_logo"> </a>
                      </div>
                        
                  </div>
                  <div class="col-md-2 col-md-offset-1 col-sm-6 col-xs-12">
                      <div class="search_block">


                          <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/Temple.png" style="display:none;" width="120" height="100" alt="logo-png"></a>

                      </div>
                  </div>
                  <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12">
                      <div class="profile_block">
                          <ul class="profile_block_menus">
                              <li>
                                  <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/CM.png" style="margin: 0 auto;" width="75" height="75" alt="logo-png">

                                      <span class="sub_head">SRI K. CHANDRASHEKAR RAO </span>
                                      <span class="main_head" style="margin-left: 7px;">HON'BLE CHIEF MINISTER</span>
                                  </a></li>
                              <li>
                                  <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/BD_minister.png" style="margin: 0 auto;" width="75" height="75" alt="logo-png">

                                      <span class="sub_head" style="margin-left:10px">SRI TUMMALA. NAGESWARA RAO </span>
                                      <span class="main_head"> HON'BLE MINISTER FOR R&B, WOMEN, CHILDREN, DISABLED & SENIOR CITIZEN</span>
                                  </a></li>
                              <li style="display:none;">
                                  <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/cmsnr.png" style="margin: 0 auto;" width="75" height="75" alt="logo-png">

                                      <span class="sub_head" style="margin-left:15px"> N. SIVA SHANKAR .I.A.S </span>
                                      <span class="main_head">  COMMISSIONER ENDOWMENTS DEPARTMENT</span>
                                  </a></li>
                          </ul>

                      </div>
                  </div>
              </div>
          </div>
      </div> -->
      <div class="header_block">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-offset-0 col-sm-6 col-xs-6 col-xs-offset-3">
                    <div class="logo_block">
                        <a href="http://107.178.223.50/dwsc_new"> <img src="<?php echo SECURE_PATH; ?>assets/images/login_images/l4.png" alt="logo-png" class="ts_logo"></a>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-1 col-sm-6 col-xs-12">
                    <div class="search_block">


                        <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/Temple.png" style="display:none;" width="120" height="100" alt="logo-png"></a>

                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12">
                    <div class="profile_block">
                        <ul class="profile_block_menus">
                            <li>
                                <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/CM.png" style="margin: 0 auto;" width="65" height="65" alt="logo-png">

                                    <span class="sub_head">SRI K. CHANDRASHEKAR RAO </span>
                                    <span class="main_head" style="margin-left: 7px;">HON'BLE CHIEF MINISTER</span>
                                </a></li>
                            <li>
                                <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/t1.png" style="margin: 0 auto;" width="65" height="65" alt="logo-png">

                                    <span class="sub_head" style="margin-left:10px">SRI TUMMALA. NAGESWARA RAO </span>
                                    <span class="main_head">HON'BLE MINISTER FOR R&B, WOMEN, CHILDREN, DISABLED & SENIOR CITIZENS</span>
                                </a></li>
                            <li style="display:none;">
                                <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/cmsnr.png" style="margin: 0 auto;" width="75" height="75" alt="logo-png">

                                    <span class="sub_head" style="margin-left:15px"> N. SIVA SHANKAR .I.A.S </span>
                                    <span class="main_head">  COMMISSIONER ENDOWMENTS DEPARTMENT</span>
                                </a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="main_section">
      <center>
			<h3 class="main_section_text">Welcome to Welfare of Disabled & Senior Citizens Department</h3>
              <div class="col-md-6 colsm-6 col-xs-12">
                  <a href="<?php echo SECURE_PATH; ?>public/index1.php">
                  <div class="head_section">
                      <div class="head_section_left"><img src="../assets/images/Disabled_icon1.png" alt="icon"> </div>
                      <div class="head_section_right"><h6> APPLICATION FOR AIDS & APPLIANCES </h6></div>
                  </div>
          </a>

              </div>
              <div class="col-md-6 colsm-6 col-xs-12">
                  <a  data-toggle="modal" data-target="#ageDetailsPop" onClick="setStateGet('ageDetails','<?php echo SECURE_PATH;?>login_applicant.php','ageDetailstrue=1')">
                  <div class="head_section">
					  <div class="head_section_left"><img src="../assets/images/Marrige_icon2.png" alt="icon"></div>
                      <div class="head_section_right"><h6><!--<a href="<?php echo SECURE_PATH; ?>public/index2.php">APPLICATION FOR SANCTION OF MARRIAGE INCENTIVE AWARD FOR PERSON WITH DISABILITY</a>-->
                      APPLICATION FOR SANCTION OF MARRIAGE INCENTIVE AWARD FOR PERSON WITH DISABILITY</h6></div>
                  </div>
                  </a>
              </div>

              <div class="col-md-6 colsm-6 col-xs-12">
                  <a href="<?php echo SECURE_PATH; ?>public/index3.php">
                  <div class="head_section">
				      <div class="head_section_left"><img src="../assets/images/Rupee_icon3.png" alt="icon"></div>
                      <div class="head_section_right"><h6>  APPLICATION FOR SANCTION OF SUBSIDY UNDER ECONOMIC REHABILITATION SCHEME FOR PERSONS WITH DISABILITIES</h6></div>
                  </div>
                      </a>
              </div>
              <div class="col-md-6 colsm-6 col-xs-12">
                  <a href="<?php echo SECURE_PATH; ?>public/index5.php">
                  <div class="head_section">
					  <div class="head_section_left"><img src="../assets/images/cenior_citizen_icon4.png" alt="icon"> </div>
                      <div class="head_section_right"><h6>REGISTRATION OF OLD AGE HOMES</h6></div>
                  </div>
                      </a>
              </div>


		</center>
      </div>

    <div class="second_block">
        <div class="row" style="margin-left:0;margin-right:0;">
            <center><h3 class="colored_text">How It Works</h3></center>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <center>
                    <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon1.png">
                    <h4 class="colored_text">Enrollment</h4>
                    <p>Eligible Candidate need to submit the Application online</p>
                </center>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <center>
                    <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon2.png">
                    <h4 class="colored_text">Approval / Generate Proceedings</h4>
                    <p> The Applications will be verified by District Welfare Officer & Proceedings will be generated</p>
                </center>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <center>
                    <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon3.png">
                    <h4 class="colored_text">Revenue</h4>
                    <p>The selection and sanction of the Applicant will be finalised by the District Screening Committee</p>
                </center>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
          <center>
            <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon4.png">
            <h4 class="colored_text">Status</h4>
            <p>Applicant can search status of his application by entering Acknowledgement number in know your Application status box</p>
          </center>
        </div>
        </div>
    </div>



</div>


<?php
}




?>
