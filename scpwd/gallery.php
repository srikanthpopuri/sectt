<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

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
 <link href="images/favicon.png" rel="shortcut icon" type="image/png">
<!--<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
 -->
<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link href="css/menuzord-megamenu.css" rel="stylesheet"/>
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- CSS | Theme Color -->
<link href="css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
#rev_slider_home, #rev_slider_home_wrapper, .tp-fullwidth-forcer
{
height: 450px !important;
}
.feature-title p, .feature-title a
{
text-align: left;
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


.gallery-isotope.default-animation-effect .gallery-item
{
        margin: 10px 0px;
}

.gallery-isotope.default-animation-effect .gallery-item a img
{
    border: 2px solid #ccc;
    padding: 5px;
}

</style>
<?php include "widget_header.php"; ?>

</head>
<body class="has-side-panel side-panel-right fullwidth-page" data-magnified-zone=".mg_zone">
     <?php include "widget_body.php"; ?>
     
 <div style="padding-top:64px; background-color:#fff" id="widget_content"  >  
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img alt="" src="images/preloaders/5.gif">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
  
  <!-- Header -->
  <?php include "header.php"; ?>
  
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    
    <section id="home" class="divider">
      <div class="container-fluid p-0">


<section>
      <div class="container pt-20 pb-20">
        
        <div class="row col-md-8">
        
              <div class="gallery-isotope default-animation-effect grid-3 gutter clearfix" data-lightbox="gallery">   
             <?php 
for ($x = 1; $x <= 22; $x++) {
 ?>
    
    
              <!-- Portfolio Item Start -->
              <div class="gallery-item">
                <a href="images/gallery/<?php    echo $x.".jpg"; ?>" data-lightbox="gallery-item" title="Title Here 1"><img src="images/gallery/<?php    echo $x.".jpg"; ?>" alt=""></a>
              </div>
              <!-- Portfolio Item End -->
              
            
            
<?php    
} 
?>
       </div>
       
               
        
       
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30  pb-20">  
         <?php include "side_block.php"; ?>
		 </div>
		 
      </div>
    </section>

      </div>
    </section>

    
  </div>
  <!-- end main-content -->
  <!-- Footer -->
  
  <?php include "footer.php"; ?>
  
  <a class="scrollToTop" href="#"><img src="images/up.png"></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Chart-->
<script src="js/chart.js"></script>
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->

<?php include "widget_footer.php"; ?>
</body>

</html>