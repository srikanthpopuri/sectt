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
<!-- <link href="images/favicon.png" rel="shortcut icon" type="image/png">
<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
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
</style>

</head>
<body class="has-side-panel side-panel-right fullwidth-page">
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
      <div class="container p-0">




<div class="content-middle">  <div class="region region-content">
    <div id="block-system-main" class="block block-system">


<div class="content">
  <form enctype="multipart/form-data" action="/usercomplaint" method="post" id="disb-user-complaint" accept-charset="UTF-8"><div><div id="edit-description" class="form-item form-type-item">
  <label for="edit-description"><h3 class="citizen_form1">Complaint Form</h3> </label>
 
</div>
<input class="form-control" type="hidden" name="SaltTokenStr" value="5b6e805ad1d4b1959716634">
<fieldset class="form-wrapper" id="edit-user-complaint-fieldset"><legend><span class="fieldset-legend"><h4>Complainant Details</h4></span></legend><div class="fieldset-wrapper"><div class="form-item form-type-textfield form-item-user-name">
  <label for="edit-user-name">Name : <span class="form-required" title="This field is required.">*</span></label>
 <input class="form-control" placeholder="Enter your full name :" type="text" id="edit-user-name" name="user_name" value="" size="50" maxlength="128" class="form-text required">
</div>
<div class="form-item form-type-textfield form-item-user-age">
  <label for="edit-user-age">Age : <span class="form-required" title="This field is required.">*</span></label>
 <input class="form-control" placeholder="Enter your age ( in figure):" type="text" id="edit-user-age" name="user_age" value="" size="50" maxlength="2" class="form-text required">
</div>
<div class="form-item form-type-select form-item-user-gender">
  <label for="edit-user-gender">Sex : <span class="form-required" title="This field is required.">*</span></label>
 <select   class="form-control" id="edit-user-gender" name="user_gender" class="form-select required"><option value="" selected="selected">--Select--</option><option value="MALE">Male</option><option value="FEMALE">Female</option><option value="OTHERS">Others</option></select>
</div>
<div class="form-item form-type-textarea form-item-user-address-perm">
  <label for="edit-user-address-perm">Address<br>(Permanent) : <span class="form-required" title="This field is required.">*</span></label>
 <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea"><textarea  class="form-control" placeholder="Enter your permanent address :" id="edit-user-address-perm" name="user_address_perm" cols="10" rows="3" class="form-textarea required"></textarea><div class="grippie"></div></div>
</div>
<div class="form-item form-type-textarea form-item-user-address-temp">
  <label for="edit-user-address-temp">Address<br>(Correspondence Address) : <span class="form-required" title="This field is required.">*</span></label>
 <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea"><textarea  class="form-control" placeholder="Enter your correspondence address :" id="edit-user-address-temp" name="user_address_temp" cols="10" rows="3" class="form-textarea required"></textarea><div class="grippie"></div></div>
</div>
<div class="form-item form-type-select form-item-user-district-id">
  <label for="edit-user-district-id">District : <span class="form-required" title="This field is required.">*</span></label>
 <select class="form-control" id="edit-user-district-id" name="user_district_id" class="form-select required"><option value="" selected="selected">--Select--</option>
 
 <option value="Adilabad">Adilabad</option>
<option value="Komaram Bheem Asifabad">Komaram Bheem Asifabad</option>
<option value="Bhadradri">Bhadradri</option>
<option value="Jayashankar Bhupalpally">Jayashankar Bhupalpally</option>
<option value="Jogulamba Gadwal">Jogulamba Gadwal</option>
<option value="Hyderabad">Hyderabad</option>
<option value="Jagtial">Jagtial</option>
<option value="Jangaon">Jangaon</option>
<option value="Kamareddy">Kamareddy</option>
<option value="Karimnagar">Karimnagar</option>
<option value="Khammam">Khammam</option>
<option value="Mahbubnagar">Mahbubnagar</option>
<option value="Mahabubabad">Mahabubabad</option>
<option value="Mancherial">Mancherial</option>
<option value="Medak">Medak</option>
<option value="Medchal">Medchal</option>
<option value="Nalgonda">Nalgonda</option>
<option value="Nagarkurnool">Nagarkurnool</option>
<option value="Nirmal">Nirmal</option>
<option value="Nizamabad">Nizamabad</option>
<option value="Ranga Reddy">Ranga Reddy</option>
<option value="peddapalli">peddapalli</option>
<option value="Rajanna Sircilla">Rajanna Sircilla</option>
<option value="Sangareddy">Sangareddy</option>
<option value="Siddipet">Siddipet</option>
<option value="Suryapet">Suryapet</option>
<option value="Vikarabad">Vikarabad</option>
<option value="Wanaparthy">Wanaparthy</option>
<option value="Warangal (urban)">Warangal (urban)</option>
<option value="Warangal (rural)">Warangal (rural)</option>
<option value="Yadadri Bhuvanagiri">Yadadri Bhuvanagiri</option>
 
 </select>
</div>
<div class="form-item form-type-textfield form-item-user-contact-no">
  <label for="edit-user-contact-no">Contact No (Landline/Mobile): </label>
 <input class="form-control" placeholder="Enter your contact number :" type="text" id="edit-user-contact-no" name="user_contact_no" value="" size="50" maxlength="12" class="form-text">
</div>
<div class="form-item form-type-select form-item-disb-cat-id">
  <label for="edit-disb-cat-id">Disability Type : <span class="form-required" title="This field is required.">*</span></label>
 <select class="form-control" id="edit-disb-cat-id" name="disb_cat_id" class="form-select required"><option value="" selected="selected">-Select-</option>
<option value="Blindness">Blindness</option>
<option value="Low-vision">Low-vision</option>
<option value="Leprosy Cured persons">Leprosy Cured persons</option>
<option value="Hearing Impairment (deaf and hard of hearing)">Hearing Impairment (deaf and hard of hearing)</option>
<option value="Locomotor Disability">Locomotor Disability</option>
<option value="Dwarfism">Dwarfism</option>
<option value="Intellectual Disability">Intellectual Disability</option>
<option value="Mental Illness">Mental Illness</option>
<option value="Autism Spectrum Disorder">Autism Spectrum Disorder</option>
<option value="Cerebral Palsy">Cerebral Palsy</option>
<option value="Muscular Dystrophy">Muscular Dystrophy</option>
<option value="Chronic Neurological conditions">Chronic Neurological conditions</option>
<option value="Specific Learning Disabilities">Specific Learning Disabilities</option>
<option value="Multiple Sclerosis">Multiple Sclerosis</option>
<option value="Speech and Language disability">Speech and Language disability</option>
<option value="Thalassemia">Thalassemia</option>
<option value="Hemophilia">Hemophilia</option>
<option value="Sickle Cell disease">Sickle Cell disease</option>
<option value="Multiple Disabilities including deafblindness">Multiple Disabilities including deafblindness</option>
<option value="Acid Attack victim">Acid Attack victim</option>
<option value="Parkinson's disease">Parkinson's disease</option>
</select>
</div>
<div class="form-item form-type-textfield form-item-user-disability-cert-no">
  <label for="edit-user-disability-cert-no">Disability Certificate No. : <span class="form-required" title="This field is required.">*</span></label>
 <input class="form-control" placeholder="Enter your disability certificate no :" type="text" id="edit-user-disability-cert-no" name="user_disability_cert_no" value="" size="50" maxlength="128" class="form-text required">
</div>
<div class="form-item form-type-textfield form-item-user-disability-percentage">
  <label for="edit-user-disability-percentage">Percentage Of Disability <br>(as mentioned in certificate) : <span class="form-required" title="This field is required.">*</span></label>
 <input class="form-control" placeholder="Enter percentage of disability (In figure):" type="text" id="edit-user-disability-percentage" name="user_disability_percentage" value="" size="50" maxlength="3" class="form-text required">
</div>
<div class="form-item form-type-file form-item-files-user-disability-cert-proof">
  <label for="edit-user-disability-cert-proof">Disability Certificate Proof : <span class="form-required">*</span> </label>
 <input class="form-control" type="file" id="edit-user-disability-cert-proof" name="files[user_disability_cert_proof]" size="60" class="form-file">
</div>
<div class="form-item form-type-textfield form-item-user-issuing-authority">
  <label for="edit-user-issuing-authority">Issuing Authority : <span class="form-required" title="This field is required.">*</span></label>
 <input class="form-control" placeholder="Enter Issuing Authority:" type="text" id="edit-user-issuing-authority" name="user_issuing_authority" value="" size="50" maxlength="128" class="form-text required">
</div>
<div class="form-item form-type-textfield form-item-user-valid-upto">
  <label for="edit-user-valid-upto">Valid Upto : </label>
 <input class="form-control" readonly="readonly" class="clicked form-text hasDatepicker" type="text" id="edit-user-valid-upto" name="user_valid_upto" value="" size="25" maxlength="128">
</div>
<div class="form-item form-type-textarea form-item-user-complain-desc">
  <label for="edit-user-complain-desc">Complaint Description : <span class="form-required" title="This field is required.">*</span></label>
 <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea"><textarea class="form-control" placeholder="Describe your complaint in brief." id="edit-user-complain-desc" name="user_complain_desc" cols="10" rows="3" class="form-textarea required"></textarea><div class="grippie"></div></div>
</div>
<div class="form-item form-type-file form-item-files-supplimentary-files">
  <label for="edit-supplimentary-files">If you have any supplementary files attach here : </label>
 <input class="form-control" type="file" id="edit-supplimentary-files" name="files[supplimentary_files]" size="60" class="form-file">
</div>
</div></fieldset>
<div id="names-fieldset-wrapper"><fieldset class="form-wrapper" id="edit-respondant-report-fieldset"><legend><span class="fieldset-legend"><h4>Respondent Details</h4></span></legend><div class="fieldset-wrapper"><div class="form-item form-type-textfield form-item-user-respondant-name-1">
  <label for="edit-user-respondant-name-1">Respondent Name : <span class="form-required" title="This field is required.">*</span></label>
 <input class="form-control" placeholder="Enter respondent name." type="text" id="edit-user-respondant-name-1" name="user_respondant_name_1" value="" size="60" maxlength="128" class="form-text required">
</div>
<div class="form-item form-type-textarea form-item-user-respondant-address-1">
  <label for="edit-user-respondant-address-1">Respondent Address : <span class="form-required" title="This field is required.">*</span></label>
 <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea"><textarea  class="form-control" placeholder="Enter respondent complete address." id="edit-user-respondant-address-1" name="user_respondant_address_1" cols="10" rows="3" class="form-textarea required"></textarea><div class="grippie"></div></div>
</div>
</div></fieldset>
</div><input class="form-control" id="set_add_more" type="hidden" name="num_names_val" value="0">
<input class="btn btn-primary" id="complaint_submit_id" onclick="return complaint()" type="submit" name="op" value="Preview &amp; Save" class="form-submit">&nbsp;&nbsp;
<input class="btn btn-warning" type="submit" id="edit-user-complaint-cancel" name="op" value="Cancel" class="form-submit">
<input class="form-control" type="hidden" name="form_build_id" value="">
<input class="btn btn-warning" type="hidden" name="form_id" value="disb_user_complaint">
</div></form></div> <!-- end block content -->
</div> <!-- end block -->
  </div>
</div>
      </div>
    </section>

    
  </div>
  <!-- end main-content -->
  <!-- Footer -->
  
  <?php include "footer.php"; ?>
  
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
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


</body>

</html>