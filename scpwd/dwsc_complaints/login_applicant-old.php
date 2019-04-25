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
    background-color: #6a1644;
}

.profile_block_menus li{
  float: left;
list-style-type: none;
width: 50%;
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
      margin-top: 15px;
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
<?php
if(isset($_REQUEST['login'])){

?>

<div class="login_page" >
  <div class="header_block">
          <div class="container">
              <div class="row">
                  <div class="col-md-3 col-md-offset-0 col-sm-6 col-xs-6 col-xs-offset-3">
                      <div class="logo_block">
                          <img src="../assets/images/Telangana_logo.png" alt="logo-png" class="ts_logo">
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

                                      <span class="sub_head">SHRI K. CHANDRASHEKAR RAO </span>
                                      <span class="main_head" style="margin-left: 7px;">HON'BLE CHIEF MINISTER</span>
                                  </a></li>
                              <li>
                                  <a href="#"><img src="<?php echo SECURE_PATH; ?>assets/images/login_images/BD_minister.png" style="margin: 0 auto;" width="75" height="75" alt="logo-png">

                                      <span class="sub_head" style="margin-left:15px">SHRI T. NAGESWARA RAO </span>
                                      <span class="main_head"> HON'BLE MINISTER FOR WOMEN,CHILDREN,DISABLED & SENIOR CITIZEN</span>
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
			<h3 class="main_section_text">welcome to department of disabled welfare</h3>
              <div class="col-md-6 colsm-6 col-xs-12">
                  <div class="head_section">
                      <div class="head_section_left"><a href="#"><img src="../assets/images/Disabled_icon1.png" alt="icon"></a> </div>
                      <div class="head_section_right"><h4><a href="<?php echo SECURE_PATH; ?>public/index1.php">  APPLICATION FOR AIDS & APPLIANCES </a></h4></div>
                  </div>

              </div>
              <div class="col-md-6 colsm-6 col-xs-12">
                  <div class="head_section">
					  <div class="head_section_left"><a href="#"><img src="../assets/images/Marrige_icon2.png" alt="icon"></a> </div>
                      <div class="head_section_right"><h4><a href="<?php echo SECURE_PATH; ?>public/index2.php">APPLICATION FOR SANCTION OF MARRIAGE INCENTIVE AWARD FOR PERSON WITH DISABILITY</a></h4></div>
                  </div>
              </div>

              <div class="col-md-6 colsm-6 col-xs-12">
                  <div class="head_section">
				      <div class="head_section_left"><a href="#"><img src="../assets/images/Rupee_icon3.png" alt="icon"></a> </div>
                      <div class="head_section_right"><h4><a href="<?php echo SECURE_PATH; ?>public/index3.php">  SANCTION OF SUBSIDY UNDER SPECIAL ECONOMIC REHABILATION </a></h4></div>
                  </div>
              </div>
              <div class="col-md-6 colsm-6 col-xs-12">
                  <div class="head_section">
					  <div class="head_section_left"><a href="#"><img src="../assets/images/cenior_citizen_icon4.png" alt="icon"></a> </div>
                      <div class="head_section_right"><h4><a href="<?php echo SECURE_PATH; ?>public/index5.php"> REGISTRATION OF OLD AGE HOMES </a></h4></div>
                  </div>
              </div>


		</center>
      </div>

    <div class="second_block">
        <div class="row" style="margin-left:0;margin-right:0;">
            <center><h3 class="colored_text">How It Works</h3></center>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <center>
                    <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon1.png">
                    <h4 class="colored_text">Enrollment</h4>
                    <p>Eligible Candidate need to Submit the Application Online</p>
                </center>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <center>
                    <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon2.png">
                    <h4 class="colored_text">Approval / Generate Proceedings</h4>
                    <p> The Applications will be verified by District Welfare Officer & Proceedings will be Generated</p>
                </center>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <center>
                    <img class="img_icon" src="<?php echo SECURE_PATH; ?>assets/images/login_images/Icon3.png">
                    <h4 class="colored_text">Revenue</h4>
                    <p>The Selection and Sanction of the Applicant will be finalised by the District Screening Committee</p>
                </center>
            </div>
        </div>
    </div>



</div>


<?php
}




?>
