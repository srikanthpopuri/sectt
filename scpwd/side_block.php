 <div class="col-xs-12 col-sm-12 col-md-12 mb-sm-30  pb-20">
            <div class="  text-center bg-silver-light p-10">
              
              <div class="feature-title">
               
                <div class="cont_box imp_noti">
    					
    					<div class="cont_txt">
    				<fieldset class="citizen">
 <legend><h4>Citizen Services</h4></legend>
 <div class="" style="
    padding-bottom: 5px;
    color: #1E7EE0;
"><strong>Persons with Disabilities can file a complaint.</strong></div>

<div class="" style="margin-top: 5px;">
    <a href="#" class="complain"><div class="" style="
    background: #f4f2ff;color: #333;
    border: solid 1px #e8e6f8;
    padding: 5px; 
">
<?php
$con = mysql_connect('10.3.38.116','root','dwd@123');
$ab = '';
if($con){
//$ab = 'Connected';
 mysql_select_db('dwsc_complaints', $con);
}

//echo "select count(id) as count_id from complaints_form";
$check_count = mysql_query("select count(id) as count_id from complaints_form");
$ret_check_count = mysql_fetch_array($check_count);

?>

        <strong>Number of Complaints Registered (<?php echo $ret_check_count['count_id']; ?>)</strong>
    </div></a>
</div>

<div style="
    margin-top: 5px;
">
    <a href="how-register-complaint.php" class="register pink_c"><div class="" style="
    background: #fffde3;color: #333;
    border: solid 1px #efecbf;
    padding: 5px;
">
        <img src="images/register_icon.jpg" alt="" align="absmiddle"><strong>How to Register a Complaint ?</strong>
    </div></a>
</div>
<div style="
    margin-top: 5px;
">
    <a href="http://scpwd.telangana.gov.in//dwsc_complaints/public/index1.php" class="register pink_c"><div class="" style="
    background: #fffde3;color: #333;
    border: solid 1px #efecbf;
    padding: 5px;
">
        <img src="images/register_icon.jpg" alt="" align="absmiddle"><strong>Register a Comnplaint</strong>
    </div></a>
</div>
<div style="
    margin-top: 5px;
">
    <a href="http://scpwd.telangana.gov.in/dwsc_complaints/admin" class="register pink_c"><div class="" style="
    background: #fffde3;color: #333;
    border: solid 1px #efecbf;
    padding: 5px;
">
        <img src="images/register_icon.jpg" alt="" align="absmiddle"><strong>Department Login</strong>
    </div></a>
</div>

<div class="" style="margin-top: 5px;">
    <a href="http://scpwd.telangana.gov.in/dwsc_complaints/public/index1.php" class="complain"><div class="" style="
    background: #f4f2ff;color: #333;
    border: solid 1px #e8e6f8;
    padding: 5px; 
">
        <img src="images/complain_icon.jpg" alt="" align="absmiddle"><strong>File a Complaint Online</strong>
    </div></a>
</div>

<div class="blue_bg margine5top pad5" style="
    background: #eaf7ff;color: #333;
    border: solid 1px #d0e9f8;
    margin-top: 5px;
    padding: 5px;height: 110px;
">
	<span class="fs14" style="
    font-size: 14px;color: #333;
">Check Complaint Status</span>
    <div class="margine10top" style="
    margin-top: 10px;
">
    	<!--div class="fl pad10right orange_c pink_c" style="
    color: #e8740c;
    padding-right: 10px;
    float: left;
"><strong>Complaint No:</strong></div>
        <form name="compsrcTv" id="complaint_id" method="post" onsubmit="return formSubmit()">
            <div class="fl" style="
    float: left;
"><input name="complaint_number" id="complaint_number" value="" type="text" class="search_bx"></div>
            <div class="fl pad5left" style="
    float: left;
    padding-left: 5px;
"><input name="" value="Go" type="submit" class="go_btn2" style="
    width: 42px;
    height: 22px;
    border: none;
    cursor: pointer;
    background: #3a3a3a;
    color: #fff;
    border-radius: 5px;
"></div>
        </form-->    
        
        <div class="" style="margin-top: 5px;">
    <a href="http://scpwd.telangana.gov.in/dwsc_complaints/login_process1.php?loginForm=1" class="complain"><div class="" style="
    background: #f4f2ff;color: #333;
    border: solid 1px #e8e6f8;
    padding: 5px; 
">
        <img src="images/search.png" style="width: 35px;" alt="" align="absmiddle"><strong>Track Your Complaint Status</strong>
    </div></a>
</div>
        
        <div class="cleardiv"></div>
    </div>
</div>

</fieldset>
    					</div>
    				
    				</div>
              </div>
            </div>
           

            
            <div class="col-xs-12 mb-sm-30  pb-20">
            <div class=" text-center p-10" style="background: aliceblue;">
         
              <div class="feature-title">
                <h3 style="font-size: 1.4em;">Achievements</h3>
                <p>
				<div class="cont_txt">
    					<ul>
    						<li class="ccpd_bg"><a href="http://socialjustice.nic.in/" target="_blank" title="Other Government website that opens in a new window">Ministry of Social Justice and Empowerment</a>&nbsp;<img alt="" src="images/external_link.gif" border="0"></li>
    						<li class="ccpd_bg"><a href="http://disabilityaffairs.gov.in" target="_blank" title="Other Government website that opens in a new window">Department of Empowerment of Persons with Disabilities</a>&nbsp;<img alt="" src="images/external_link.gif" border="0"></li>
						<li class="ccpd_bg"><a href="http://ayjnihh.nic.in/aw/default.asp" target="_blank" title="Other Government website that opens in a new window">Ali Yavar Jung National Institute For The Hearing Handicapped</a>&nbsp;<img alt="" src="images/external_link.gif" border="0"></li>
    					
    					</ul>
    					<a href=""><img src="images/readmore_img.png"> Read More</a>
    					</div>
						</p>
              </div>
            </div>
          </div>
          
         <div class="col-xs-12 mb-sm-30  pb-20">
            <div class=" text-center p-10" style="background: aliceblue;">
         
              <div class="feature-title">
                <h3 style="font-size: 1.4em;">Related Websites</h3>
                <p>
				<div class="cont_txt">

    					<ul>
    						<li class="ccpd_bg"><a href="http://www.wdsc.telangana.gov.in" target="_blank" >http://www.wdsc.telangana.gov.in </a>&nbsp;<img alt="" src="images/external_link.gif" border="0"></li>
    						<li class="ccpd_bg"><a href="http://www.wdcw.tg.nic.in" target="_blank">http://www.wdcw.tg.nic.in </a>&nbsp;<img alt="" src="images/external_link.gif" border="0"></li>
					
    					
    					</ul>
    					<a href="related_websites.php"><img src="images/readmore_img.png"> Read More</a>
    					</div>
						</p>
              </div>
            </div>
          </div>
          
          		  
		  <div class="col-xs-12 mb-sm-30 pb-20" >
            <div class=" text-center p-10 col-xs-12" style="background: beige;">
             
              <div class="feature-title">
                <h3 style="font-size: 18px;">PHOTO GALLERY</h3>
               
			   <div class="cont_txt">
    					 <div class="col-xs-6">
    					 <img class="float-left" src="images/gallery/1.jpg">
    					 </div>
    					 
    					 <div class="col-xs-6">
    					 <img class="float-left" src="images/gallery/2.jpg">
    					 </div>
    					 				
    					</div>
    					 <div class="col-xs-12">
    					<a href="gallery.php"><img src="images/readmore_img.png"> Read More</a>
    					</div>
              </div>
            </div>
          </div>
          
          
                      <div class=" text-center bg-silver-light p-10 ">
              
              <div class="feature-title">
                <!-- <h3>ACCESSIBILITY STATEMENT</h3>
                <p>
				<div class="cont_txt">
    					<a href="./page.php?s=reg&amp;t=def&amp;p=acc_stat" class="cont_link">This website is now accessible!</a><br>
    					

We are committed to ensuring that the website of the Office of the Chief Commissioner for Persons with Disabilities is accessible to all users, irrespective of the device and technology in use or ability. It has been built with an aim to provide maximum accessibility and usability to its visitors. As a result, this website can be viewed from a variety of devices such as Desktop / Laptop computers, web-enabled mobile devices, WAP phones, PDAs, etc.
 
    					</div>
						</p>-->
						
						<a href="http://www.india.gov.in" target="_blank"><img src="images/indiagov_logo.jpg" alt="India Government Website" title="India Government Website"></a>
              </div>
            </div>
            
          </div>