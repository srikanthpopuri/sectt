<?php
$pageurl = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
$page = str_replace(".php","",$pageurl);
?>

 <header id="header" class="header">
    <!--div class="header-top bg-theme-colored border-top-theme-colored2-2px sm-text-center">
      <div class="container">
        <div class="row">          
          <div class="col-md-6">
            <div class="widget">
              <!--ul class="styled-icons icon-sm icon-white">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div id="side-panel-trigger" class="side-panel-trigger ml-15 mt-8 pull-right sm-pull-none"><a href="#"><i class="fa fa-bars font-24"></i></a>
            </div>
            <div class="widget">
              <ul class="list-inline text-right flip sm-text-center">
                <li>
                  <a class="text-white" href="#">FAQ</a>
                </li>
                <li class="text-white">|</li>
                <li>
                  <a class="text-white" href="#">Help Desk</a>
                </li>
                <li class="text-white">|</li>
                <li>
                  <a class="text-white" href="#">Support</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div-->
    <div class="header-nav">
      <div class="header-nav-wrapper  bg-white">
        <div class="container">
            
         <div class="row mt-15">
            
 	<div class="col-md-2 text-center">
            <a class="pull-left flip mt-5 mb-5 mt-sm-10 mb-sm-20 col-md-12" href="index.php">
			<img src="images/banner/kcr.jpg" alt="" height="150" width="400" style="margin-left:30px">
<h5 style="width:216px;">Sri K Chandrashekar Rao Garu,
Hon'ble Chief Minister Telangana State</h5>
 		    </a>
 		</div>
		 <div class="col-md-7 text-center">
		    <div style="width:160%">
				<div class="col-md-2 text-center">
				<a class="menuzord-brand pull-left flip mt-5 mb-5 mt-sm-10 mb-sm-20 col-md-12" href="index.php">
				<img src="images/logo.png" alt="">
				</a>
				</div>
				 
				<div class="col-md-4 text-center">
				<a class="menuzord-brand pull-left flip mt-5 mb-5 mt-sm-10 mb-sm-20 col-md-12" href="index.php">
				<img src="images/emblem.png" alt="">
				</a>
				</div>
				
				<div class="col-md-2 text-center">
				<a class="menuzord-brand pull-left flip mt-5 mb-5 mt-sm-10 mb-sm-20 col-md-12" href="index.php">
				<img src="images/ada.png" alt="">
				</a>
				</div>
			</div>
			<div style="float:left;margin-top:25px;padding-left:20%">
				<h2 style="    color: #0052a9;    margin-top: 0px;    margin-bottom: 0px; font-size: 25px;">
				  Office of the State Commissioner<br> For Persons with Disabilities
				</h2>
				<h2 style="  color: #232323;margin-top: 0px;    margin-bottom: 0px;    font-size: 18px;">
            Government of Telangana
        </h2>
			</div>
		</div>	
 		<div class="col-md-2 text-center">
            <a class="pull-left flip mt-5 mb-5 mt-sm-10 mb-sm-20 col-md-12" href="index.php">
			<img src="images/banner/minister.jpg" alt="" height="150" width="400" style="margin-left:38px">
   <h5 style="width:230px">Shri Koppula Eshwar Garu 
Minister for SCD,BC,Minority,Disabled&Senior citizen welfare,
Telangana state</h5>
 		    </a>
 		    </div>

             
         </div>    
            
          <nav id="menuzord-right" class=" default theme-colored mb-15 text-center" style="clear:both;display:none">
        <h2 style="    color: #0052a9;    margin-top: 0px;    margin-bottom: 0px; font-size: 25px;">
          Office of the State Commissioner For Persons with Disabilities
        </h2>

        <h2 style="  color: #232323;margin-top: 0px;    margin-bottom: 0px;    font-size: 18px;">
            Government of Telangana
        </h2>
		 
		  </nav>
		</div>
		</div>
		<div class="header-nav-wrapper navbar-scrolltofixed" style="background:#252525;text-align:center">
		<div class="container" style="width:960px">
          <nav id="menuzord-right" class="menuzord default theme-colored">
		    <ul class="menuzord-menu">
              <li  class="<?php if(($page=="index") || ($page=="")) { echo "active"; } ?> "><a href="index.php">HOME</a></li>
			  <li  class="<?php if(($page=="about") || ($page=="")) { echo "active"; } ?> "><a href="about.php">ABOUT US</a></li>
			  <li  class="<?php if(($page=="acts") || ($page=="")) { echo "active"; } ?> "><a href="acts.php">ACTS/GUIDELINES/RULES</a></li>
			  <li  class="<?php if(($page=="resources") || ($page=="")) { echo "active"; } ?> "><a href="resources.php">RESOURCES</a></li>
			  <li  class="<?php if(($page=="news") || ($page=="")) { echo "active"; } ?> "><a href="news.php">NEWS/EVENTS</a></li>
			  <li  class="<?php if(($page=="gallery") || ($page=="")) { echo "active"; } ?> "><a href="gallery.php">GALLERY</a></li>
			  <!--li class=""><a href="activities.php">ACTIVITIES</a></li-->
			  <li  class="<?php if(($page=="contact") || ($page=="")) { echo "active"; } ?> "><a href="contact.php">WHO's WHO</a></li>
            </ul>
          </nav>
        </div>
		</div>
		
      </div>
    
  </header>