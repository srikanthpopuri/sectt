<?php
include('../include/session.php');

if(!$session->logged_in){
?>
<script type="text/javascript">
setStateGet('main','<?php echo SECURE_PATH;?>login_process.php','loginForm=1');
</script>

<?php
}

?>

<style>
    hr {
        display: block;
        height: 0px;
        border: 0;
        border-top: 1px solid #33C1FF;
        margin: 0;
    }
</style>

<script>


    function addListItem1(){

        cnt = $('#experience_count').val();
        new_cnt = parseInt(cnt)+1;

        $('#experience_count').val(new_cnt);

        html = '<div class="list" id="list'+new_cnt+'"></div>';

        $('#experience_details').append(html);

        setStateGet('list'+new_cnt,'<?php echo SECURE_PATH;?>subsidy_pwd/process.php','add_listing1='+new_cnt);


    }

    function removeListItem1(id){
        $('#list'+id).remove();
    }


    function sub(val){

        var resultdrug = '';

        var s = [];

        for(i=1; i<=val; i++){
            var e = document.getElementById("comp_name"+i);
            if(e){
                s.push(i);
            }
        }

        console.log(s);


        for (var i=0; i<s.length; i++) {
            resultdrug=resultdrug+"&comp_name"+s[i]+"="+$('#comp_name'+s[i]).val()+"&comp_mobile"+s[i]+"="+$('#comp_mobile'+s[i]).val()+"&from_date"+s[i]+"="+$('#from_date'+s[i]).val()+"&to_date"+s[i]+"="+$('#to_date'+s[i]).val()+"&comp_email"+s[i]+"="+$('#comp_email'+s[i]).val()+"";
        }
        resultdrug = resultdrug+"&arr="+s;
        console.log(resultdrug);
        return resultdrug;
    }

</script>

 <script type="text/javascript">
function setfields(it) {
    $('#registered_43').val(it);
    if(it==1){
        $('#aaa').show();
    }
    if(it==0){
        $('#aaa').hide();
    }
}

function setfields2(it) {
    $('#registered_6').val(it);
    if(it==1){
        $('#bbb').show();
    }
    if(it==0){
        $('#bbb').hide();
    }
}

function calAmount() {
    var p = $('#property_amount').val();
    var s = $('#sevas_amount').val();


	if(p=='' && s==''){
        $('#total_amount').val();
    	}

    if(p!='' && s!=''){
        var x = parseFloat(p)+parseFloat(s);
        $('#total_amount').val(x);
    }
}

</script>

<script type="text/javascript">

    function changeits(it){
        setState('ccc','<?php echo SECURE_PATH;?>ddns_form/ajax.php','van='+it);
    }

    function changeits1(it){
        setState('ddd','<?php echo SECURE_PATH;?>ddns_form/ajax.php','bus='+it);
    }
</script> 

<script type="text/javascript">
    $( ".datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd-mm-yy",
        yearRange: "1920:2025"
    });
</script>


<?php
//Metircs Forms, Tables and Functions
//Display courses form
if(isset($_REQUEST['addForm'])){



    if($_REQUEST['addForm'] == 2 && isset($_REQUEST['editform'])){

        $data_sel = $database->query("SELECT * FROM subsidy_pwd where id = '".$_REQUEST['editform']."'");


        if(mysqli_num_rows($data_sel) > 0){
            $data = mysqli_fetch_array($data_sel);

            $_POST = array_merge($_POST,$data);
            ?>
            <script type="text/javascript">
                $('#adminForm').slideDown();
            </script>

            <?php

        }
    }

    ?>


    <form role="form">

        <div class="row">
            <div class="col-md-4">
                <label>Date</label>
                <input type="text" class="form-control" id="sub_date" value="<?php if(isset($_POST['sub_date'])){echo date('d-m-Y',$_POST['sub_date']);}else{echo date('d-m-Y');}?>" readonly/>
            </div>
        </div>

        <br/>


        <div class="row">
            <div class="form-group col-md-4">

                <label for="district">Select Native District</label>
                <select name="district" id="district" class="form-control" onChange="setState('ccc','<?php echo SECURE_PATH;?>public/ajax.php','van=1&district='+$('#district').val())" >
                    <option value="">Select</option>
                    <?php
                    $q=$database->query("SELECT * FROM `global_districts` ");
                    if($data_rows=mysqli_num_rows($q)>0){
                        while($data=mysqli_fetch_array($q)){?>
                            <option value="<?php echo $data['uid']?>"
                            <?php
                            if(isset($_POST['district']))
                            {
                                if($_POST['district']==$data['uid'])
                                    echo 'selected="selected"';}?>
                            ><?php echo ucwords($data['district'])?></option><?php }}?>
                </select>
                <span class="error" id="district_err" style="display: none">* Please Select District</span>
            </div>
            <div class="form-group col-md-4" >
                <div id="ccc">
                    <label for="cat_items">Select Mandal</label>

                    <select name="mandal_ren" id="mandal_ren"  onChange="setState('ddd','<?php echo SECURE_PATH;?>public/ajax.php','bus=1&district='+$('#district').val()+'&mandal_ren='+$('#mandal_ren').val())"   class="form-control" >

                        <option value="">Select</option>

                        <?php

                        $q=$database->query("SELECT * FROM `global_mandals` where district = '".$_POST['district']."'");

                        if($data_rows=mysqli_num_rows($q)>0){

                            while($data=mysqli_fetch_array($q)){?>

                                <option value="<?php echo $data['uid']?>"

                                <?php

                                if(isset($_POST['mandal_ren']))

                                {

                                    if($_POST['mandal_ren']==$data['uid'])

                                        echo 'selected="selected"';}?>

                                ><?php echo ucwords($data['mandal'])?></option><?php }}?>

                    </select>


                </div>
                <span class="error" id="mandal_ren_err" style="display: none">* Please Select Mandal</span>
            </div>
            <div class="form-group col-md-4">
                <div id="ddd">
                    <label for="cat_items">Select Panchayat</label>

                    <select name="village_ren" id="village_ren"    class="form-control" >

                        <option value="">Select</option>

                        <?php

                        $q=$database->query("SELECT * FROM `global_panchayats` WHERE mandal = '".$_POST['mandal_ren']."' ");

                        if($data_rows=mysqli_num_rows($q)>0){

                            while($data=mysqli_fetch_array($q)){?>

                                <option value="<?php echo $data['uid']?>"

                                <?php

                                if(isset($_POST['village_ren']))

                                {

                                    if($_POST['village_ren']==$data['uid'])

                                        echo 'selected="selected"';}?>

                                ><?php echo ucwords($data['panchayat'])?></option><?php }}?>

                    </select>


                </div>
                <span class="error" id="village_ren_err" style="display: none">* Please Select Panchayat</span>
            </div>
        </div>
        <br/>

        <h5><b style="color:#000080">To be filled in by the Applicant:</b></h5>
        <hr>
        <br/>

        <div class="row">
            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Surname of the Applicant</label>
                <input type="text" class="form-control" onkeypress="return onlyAlphabets(event,$(this))"  placeholder="Enter Surname" id="surname" name="surname" value="<?php if(isset($_POST['surname'])){echo $_POST['surname'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['surname'])){ echo $_SESSION['error']['surname'];}?></span>

            </div>
            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Name of the Applicant</label>
                <input type="text" class="form-control" onkeypress="return onlyAlphabets(event,$(this))"  placeholder="Enter Name" id="name" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['name'])){ echo $_SESSION['error']['name'];}?></span>

            </div>
            <div class="form-group col-md-4 col-xs-12">
                <label for="sex">Sex</label>
                <br />
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="sex" required onclick="$('#sex').val('male')"  name="sex" value="male" <?php if(isset($_POST['sex'])){ if($_POST['sex'] == 'male'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?>  /> <label for="male">Male</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="sex" required onclick="$('#sex').val('female')" name="sex" value="female" <?php if(isset($_POST['sex'])){ if($_POST['sex'] == 'female'){ echo 'checked="checked"';}}?> />
                    <label for="female">Female</label>
                </div>
                <input type="hidden"     id="sex" value="<?php if(isset($_POST['sex'])){ echo $_POST['sex'] ;}else{ echo 'male';}?> "  /> <br />
                <span class="error"><?php if(isset($_SESSION['error']['sex'])){ echo $_SESSION['error']['sex'];}?></span>
            </div>



        </div>
        <br/>
        <div class="row">
            <div class="form-group col-md-4 col-xs-12" >
                <label for="disability_type">Type of Disability</label>
                <select name="disability_type" id="disability_type" class="form-control" onchange="setState('lg','<?php echo SECURE_PATH;?>public/ajax.php','legal=1&disability_type='+$('#disability_type').val());
" >
                    <option value="">Select</option>
                    <?php
                    $q = $database->query("select * from disabilities");
                    while ($data = mysqli_fetch_array($q)){
                        ?>
                        <option value="<?php echo $data['id'];?> " <?php if(isset($_POST['disability_type'])){if($_POST['disability_type']==$data['id']){echo 'selected=selected';}}?>><?php echo $data['disability'];?></option>
                        <?php
                    }
                    ?>
                </select> <span class="error"><?php if(isset($_SESSION['error']['disability_type'])){ echo $_SESSION['error']['disability_type'];}?></span>
            </div>

            <div class="form-group col-md-4 col-xs-12" >
                <label for="percentage">Percentage of Disability</label>
                <input type="text" class="form-control" id="percentage"  onkeypress="return isNumber(event,$(this),2)"  name="percentage" value="<?php if(isset($_POST['percentage'])){echo $_POST['percentage'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['percentage'])){ echo $_SESSION['error']['percentage'];}?></span>
            </div>

            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Father Name</label>
                <input type="text" class="form-control" id="father_name" onkeypress="return onlyAlphabets(event,$(this))" name="father_name" value="<?php if(isset($_POST['father_name'])){echo $_POST['father_name'];}?>">
                <span class="error" id="father_name_err" style="display: none">* Please Enter Father Name</span>

            </div>



        </div>
        
        <br/>
<div class="row" id="lg"  >
  
  
  <div class="col-md-4 col-xs-12">
  <?php
  if(isset($_POST['disability_type']) == 7)
  {?>
	            <label for="dry_land">LegalGuardian (If Any)</label>
   
 <?php }else{ ?>
	              <label for="dry_land">Guardian Name</label>

 <?php }
			?>
            <input type="text" class="form-control" id="guardian_name" onkeypress="return onlyAlphabets(event,$(this))" name="guardian_name" value="<?php if(isset($_POST['guardian_name'])){echo $_POST['guardian_name'];}?>">
            <span class="error" id="guardian_name_err" style="display: none">* Please Enter Guardian Name</span>
        </div>

  </div>
        <br/>

        <div class="row">
                    <div class="form-group col-md-8">

                        <label>Disability Certificate</label>
</div>
</div>
<div class="row">
            <div class="form-group col-md-8">
                <div class="radio radio-warning col-md-3">
                    <input tabindex="8"  type="radio" id="yes" onclick="$('#sad_med').val('1'),$('#div2m').show()" name="sad_med"  value="1" <?php if(isset($_POST['sad_med'])){ if($_POST['sad_med'] == '1'){ echo 'checked="checked"';}} ?>  /> <label for="male">SADAREM</label>
                </div>
                <div class="radio radio-success col-md-3" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no"onclick="$('#sad_med').val('0'),$('#div2m').hide()"  name="sad_med" value="0" <?php if(isset($_POST['sad_med'])){ if($_POST['sad_med'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">MEDICAL BOARD</label>
                </div>
                <input type="hidden" id="sad_med" value="<?php if(isset($_POST['sad_med'])){ echo $_POST['sad_med'] ;}else{ echo '0';}?> "  /> <br />

            </div>
</div>
<div class="row">
            <div id="div2m" style=" <?php if(isset($_POST['sad_med'])){if($_POST['sad_med']=='1'){}else{echo 'display:none';}}else{echo 'display:none';}?>">
                <div class="form-group col-md-4">
                    <label for="disability_certificate_no">SADAREM Issued Disability Certificate Number</label>
                    <input type="text" class="form-control" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;"
                           onpaste="return false;" id="sadarem" name="sadarem" value="<?php if(isset($_POST['sadarem'])){echo $_POST['sadarem'];}?>">
                    <span class="error"><?php if(isset($_SESSION['error']['sadarem'])){ echo $_SESSION['error']['sadarem'];}?></span>
                    <span id="error" style="color: Red; display: none">* Special Characters not allowed</span>
                </div>
            </div>

            

        </div>

        <br/>
        <div class="row">




            <div class="col-md-4 col-xs-12">
                <label for="religion">Religion</label>
                <select id="religion" class="form-control">
                    <option value="">Select Religion</option>
                    <option value="1" <?php if(isset($_POST['religion'])){if($_POST['religion']=='1'){echo 'selected=selected';}}?>>Hindu</option>
                    <option value="2" <?php if(isset($_POST['religion'])){if($_POST['religion']=='2'){echo 'selected=selected';}}?>>Muslim</option>
                    <option value="3" <?php if(isset($_POST['religion'])){if($_POST['religion']=='3'){echo 'selected=selected';}}?>>Christian</option>
                    <option value="4" <?php if(isset($_POST['religion'])){if($_POST['religion']=='4'){echo 'selected=selected';}}?>>Other</option>
                </select>
                <span class="error"><?php if(isset($_SESSION['error']['religion'])){ echo $_SESSION['error']['religion'];}?></span>
            </div>

            <div class="form-group col-md-4" >
                <label for="maritial_status">Marital Status</label>
                <select name="maritial_status" id="maritial_status" class="form-control" >
                    <option value="">Select</option>
                    <option value="1" <?php if(isset($_POST['maritial_status'])){if($_POST['maritial_status']=='1'){echo 'selected=selected';}}?>>Un Married</option>
                    <option value="2" <?php if(isset($_POST['maritial_status'])){if($_POST['maritial_status']=='2'){echo 'selected=selected';}}?>>Married</option>
                    <option value="3" <?php if(isset($_POST['maritial_status'])){if($_POST['maritial_status']=='3'){echo 'selected=selected';}}?>>Divorced</option>
                    <option value="5" <?php if(isset($_POST['maritial_status'])){if($_POST['maritial_status']=='5'){echo 'selected=selected';}}?>>Single</option>
                </select>
                <span class="error"><?php if(isset($_SESSION['error']['maritial_status'])){ echo $_SESSION['error']['maritial_status'];}?></span>
            </div>

            <div class="col-md-4 col-xs-12">
                <label for="caste">Caste</label>
                <select id="caste" class="form-control">
                    <option value="">Select Caste</option>
                    <option value="1" <?php if(isset($_POST['caste'])){if($_POST['caste']=='1'){echo 'selected=selected';}}?>>SC</option>
                    <option value="2" <?php if(isset($_POST['caste'])){if($_POST['caste']=='2'){echo 'selected=selected';}}?>>ST</option>
                    <option value="3" <?php if(isset($_POST['caste'])){if($_POST['caste']=='3'){echo 'selected=selected';}}?>>BC</option>
                    <option value="5" <?php if(isset($_POST['caste'])){if($_POST['caste']=='5'){echo 'selected=selected';}}?>>Others</option>
                </select>
                <span class="error"><?php if(isset($_SESSION['error']['caste'])){ echo $_SESSION['error']['caste'];}?></span>

            </div>

        </div>

        <br/>
        <div class="row">


            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Date of Birth</label>
                <input type="text" class="form-control datePicker" id="dob" name="dob" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['dob'])){ echo $_SESSION['error']['dob'];}?></span>

            </div>


            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['email'])){ echo $_SESSION['error']['email'];}?></span>
            </div>

            <div class="form-group col-md-4" >
                <label for="occupation">Occupation</label>
                <select id="occupation" class="form-control">
                    <option value="">Select Occupation</option>
                    <option value="1" <?php if(isset($_POST['occupation'])){if($_POST['occupation']=='1'){echo 'selected=selected';}}?>>Student</option>
                    <option value="2" <?php if(isset($_POST['occupation'])){if($_POST['occupation']=='2'){echo 'selected=selected';}}?>>Employee</option>
                    <option value="3" <?php if(isset($_POST['occupation'])){if($_POST['occupation']=='3'){echo 'selected=selected';}}?>>Unemployed</option>
                    <option value="4" <?php if(isset($_POST['occupation'])){if($_POST['occupation']=='4'){echo 'selected=selected';}}?>>Others</option>
                </select>
                <span class="error"><?php if(isset($_SESSION['error']['occupation'])){ echo $_SESSION['error']['occupation'];}?></span>
            </div>




        </div>
        <br/>

        <div class="row">

            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Aadhar Card Number</label>
                <input type="text" class="form-control"  id="aadhar_num" onkeypress="return isNumber(event,$(this),12)" onkeyUp="setState('aadhar_check','<?php echo SECURE_PATH;?>ajax.php','aadhar_subsidy_pwd=1&aadhar_num='+$('#aadhar_num').val())" name="aadhar_num" value="<?php if(isset($_POST['aadhar_num'])){echo $_POST['aadhar_num'];}?>">

            </div>
            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Ration Card Number</label>
                <input type="text" class="form-control" onkeypress="return isNumber(event,$(this),12)"  id="ration_num" name="ration_num" value="<?php if(isset($_POST['ration_num'])){echo $_POST['ration_num'];}?>">

            </div>

            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Voter Id</label>
                <input type="text" class="form-control"  onkeypress="return isNumber(event,$(this),12)"  id="epic_no" name="epic_no" value="<?php if(isset($_POST['epic_no'])){echo $_POST['epic_no'];}?>">

            </div>

        </div>
        <br/>
        <div class="row col-md-12" style="display:none;" id="aadhar_check">
  
  </div>
  <br/>
        <div class="row">

            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Educational Qualifications (Academic)</label>
                <select id="academic" class="form-control">
                    <option value="">Select</option>
                    <?php
                    $q = $database->query("select * from study");
                    while ($data = mysqli_fetch_array($q)){
                        ?>
                        <option value="<?php echo $data['id'];?> " <?php if(isset($_POST['academic'])){if($_POST['academic']==$data['id']){echo 'selected=selected';}}?>><?php echo $data['class'];?></option>
                        <?php
                    }
                    ?>
                </select><span class="error"><?php if(isset($_SESSION['error']['academic'])){ echo $_SESSION['error']['academic'];}?></span>

            </div>
            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Educational Qualifications (Technical)</label>
                <input type="text" class="form-control" id="technical" value="<?php if(isset($_POST['technical'])){echo $_POST['technical'];} ?>" />
                <span class="error"><?php if(isset($_SESSION['error']['technical'])){ echo $_SESSION['error']['technical'];}?></span>
            </div>

            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Mobile Number</label>
                <input type="text" class="form-control" id="mobile" onkeypress="return isNumber(event,$(this),10)" name="mobile" value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['mobile'])){ echo $_SESSION['error']['mobile'];}?></span>

            </div>


        </div>
        <br/>
        <div class="row">



            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Native Address</label>
                <input type="text" class="form-control" placeholder="Ex : Basara (Adilabad Dist)" id="native_place" name="native_place" value="<?php if(isset($_POST['native_place'])){echo $_POST['native_place'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['native_place'])){ echo $_SESSION['error']['native_place'];}?></span>

            </div>

            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Present Place of Living & Address</label>
                <textarea type="text" class="form-control" id="present_place" name="present_place"> <?php if(isset($_POST['present_place'])){echo $_POST['present_place'];}?></textarea>
                <span class="error"><?php if(isset($_SESSION['error']['present_place'])){ echo $_SESSION['error']['present_place'];}?></span>

            </div>
        </div>

        <br/>
        <h5><b style="color:#000080">Details of Training taken undergone:</b></h5>
        <hr>
        <br/>

        <div class="row">
            <div class="form-group col-md-4 col-xs-12" >

                <label for="dry_land">Name of the Training</label>
                <input type="text" class="form-control" id="training_name" onkeypress="return onlyAlphabets(event,$(this))" name="training_name" value="<?php if(isset($_POST['training_name'])){echo $_POST['training_name'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['training_name'])){ echo $_SESSION['error']['training_name'];}?></span>
            </div>

            <div class="form-group col-md-4 col-xs-12" >
                <label for="from_date">Training From Date</label>
                <input type="text" class="form-control datePicker" id="training_from_date"  name="training_from_date" value="<?php if(isset($_POST['training_from_date'])){echo $_POST['training_from_date'];}?>" >
                <span class="error"><?php if(isset($_SESSION['error']['training_from_date'])){ echo $_SESSION['error']['training_from_date'];}?></span>
            </div>

            <div class="form-group col-md-4 col-xs-12" >
                <label for="to_date">Training To Date</label>
                <input type="text" class="form-control datePicker" id="training_to_date"  name="training_to_date" value="<?php if(isset($_POST['training_to_date'])){echo $_POST['training_to_date'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['training_to_date'])){ echo $_SESSION['error']['training_to_date'];}?></span>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4 col-xs-12">
                <label for="dry_land">Name & Address of Training Institute where Training is undergone</label>
                <textarea type="text" class="form-control" id="ti_details" name="ti_details" ><?php if(isset($_POST['ti_details'])){echo $_POST['ti_details'];}?></textarea>
                <span class="error"><?php if(isset($_SESSION['error']['ti_details'])){ echo $_SESSION['error']['ti_details'];}?></span>

            </div>


        </div>

        <br/>




        <br/>


        <div id="experience_details" style="clear:both;">
            <?php
            $listing_count = 1;

            if(isset($_POST['editform']) && $_POST['addForm']==2){

                $a = $database->get_name('subsidy_pwd','id',$_POST['editform'],'appli_no');

                $listing_count=1;
                $que=$database->query("select * from work_experience where form_id='".$a."' ");
                ?>

                <h5><b style="color:#000080">Details of Work Experience, if any:</b></h5>

                <?php

                while($res=mysqli_fetch_array($que))
                {
                    ?>



                    <div id="list<?php echo $listing_count?>" class="list">

                        <hr>
                        <br/>
                        <div class="row">

                            <div class="form-group col-md-4 col-xs-12" >
                                <label for="comp_name">Name of Company</label>
                                <input type="text" class="form-control" id="comp_name<?php echo $listing_count?>" onkeypress="return onlyAlphabets(event,$(this))" name="comp_name" value="<?php echo $res['comp_name'];?>" >
                                <span class="error"><?php if(isset($_SESSION['error']['comp_name'])){ echo $_SESSION['error']['comp_name'];}?></span>
                            </div>

                            <div class="form-group col-md-4 col-xs-12" >
                                <label for="comp_mobile">Company Contact Number</label>
                                <input type="text" class="form-control" id="comp_mobile<?php echo $listing_count?>" onkeypress="return isNumber(event,$(this),10)" name="comp_mobile" value="<?php echo $res['comp_mobile'];?>" >
                                <span class="error"><?php if(isset($_SESSION['error']['comp_mobile'])){ echo $_SESSION['error']['comp_mobile'];}?></span>
                            </div>

                            <div class="form-group col-md-4 col-xs-12" >
                                <label for="comp_email">Company Mail Id</label>
                                <input type="text" class="form-control" id="comp_email<?php echo $listing_count?>" onkeypress="validateEmail(this.value)"  name="comp_email" value="<?php echo $res['comp_email'];?>" >
                                <span class="error"><?php if(isset($_SESSION['error']['comp_email'])){ echo $_SESSION['error']['comp_email'];}?></span>
                                <span id="error2" style="display:none;color:red;">Invalid email</span>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-4 col-xs-12" >
                                <label for="from_date">Worked From Date</label>
                                <input type="text" class="form-control datePicker" id="from_date<?php echo $listing_count?>"  name="from_date" value="<?php echo $res['from_date'];?>" >
                                <span class="error"><?php if(isset($_SESSION['error']['from_date'])){ echo $_SESSION['error']['from_date'];}?></span>
                            </div>

                            <div class="form-group col-md-4 col-xs-12" >
                                <label for="to_date">Worked To Date</label>
                                <input type="text" class="form-control datePicker" id="to_date<?php echo $listing_count?>"  name="to_date" value="<?php echo $res['to_date'];?>" >
                                <span class="error"><?php if(isset($_SESSION['error']['to_date'])){ echo $_SESSION['error']['to_date'];}?></span>
                            </div>

                            <div class="form-group col-md-4" style="padding-top: 20px">

                                <?php
                                if($listing_count == 1){
                                    ?>
                                    <a class="btn btn-success" onclick="addListItem1()"><i class="fa fa-plus"></i></a>
                                    <?php
                                }
                                else{
                                    ?>
                                    <a class="btn btn-danger" onclick="removeListItem1('<?php echo $listing_count; ?>')"><i class="fa fa-minus "></i></a>

                                    <?php
                                }
                                ?>

                            </div>
                        </div>

                        <br/>

                    </div>
                    <?php


                    $listing_count++;
                }


            }
            else
            {
            ?>
            <h5><b style="color:#000080">Details of Work Experience, if any:</b></h5>

            <div class="list">

                <hr>
                <br/>
                <div class="row">


                    <div class="form-group col-md-4 col-xs-12" >
                        <label for="comp_name">Name of Company</label>
                        <input type="text" class="form-control" id="comp_name<?php echo $listing_count?>" onkeypress="return onlyAlphabets(event,$(this))" name="comp_name" value="<?php if(isset($_POST['comp_name'])){echo $_POST['comp_name'];}?>" >
                        <span class="error"><?php if(isset($_SESSION['error']['comp_name'])){ echo $_SESSION['error']['comp_name'];}?></span>
                    </div>

                    <div class="form-group col-md-4 col-xs-12" >
                        <label for="comp_mobile">Company Contact Number</label>
                        <input type="text" class="form-control" id="comp_mobile<?php echo $listing_count?>" onkeypress="return isNumber(event,$(this),10)" name="comp_mobile" value="<?php if(isset($_POST['comp_mobile'])){echo $_POST['comp_mobile'];}?>" >
                        <span class="error"><?php if(isset($_SESSION['error']['comp_mobile'])){ echo $_SESSION['error']['comp_mobile'];}?></span>
                    </div>

                    <div class="form-group col-md-4 col-xs-12" >
                        <label for="comp_email">Company Mail Id</label>
                        <input type="text" class="form-control" id="comp_email<?php echo $listing_count?>" onkeypress="validateEmail(this.value)"  name="comp_email" value="<?php if(isset($_POST['comp_email'])){echo $_POST['comp_email'];}?>" >
                        <span class="error"><?php if(isset($_SESSION['error']['comp_email'])){ echo $_SESSION['error']['comp_email'];}?></span>
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-md-4 col-xs-12" >
                        <label for="from_date">Worked From Date</label>
                        <input type="text" class="form-control datePicker" id="from_date<?php echo $listing_count?>"  name="from_date" value="<?php if(isset($_POST['from_date'])){echo $_POST['from_date'];}?>" >
                        <span class="error"><?php if(isset($_SESSION['error']['from_date'])){ echo $_SESSION['error']['from_date'];}?></span>
                    </div>

                    <div class="form-group col-md-4 col-xs-12" >
                        <label for="to_date">Worked To Date</label>
                        <input type="text" class="form-control datePicker" id="to_date<?php echo $listing_count?>"  name="to_date" value="<?php if(isset($_POST['to_date'])){echo $_POST['to_date'];}?>" >
                        <span class="error"><?php if(isset($_SESSION['error']['to_date'])){ echo $_SESSION['error']['to_date'];}?></span>
                    </div>

                    <div class="col-md-4 form-group" style="padding-top: 20px">
                        <a class="btn btn-primary" onclick="addListItem1()"><i class="fa fa-plus"></i></a>
                    </div>

                </div>

            </div>
            <br/>
        </div>

        <?php
        }
        ?>

        <input type="hidden" id="experience_count" value="<?php echo $listing_count;?>" />
        </div>








        <h5><b style="color:#000080">Details of self employment unit/project with requirement of financial outlay:</b></h5>
        <hr />
        <br/>
        <div class="row">
            <div class="form-group col-md-4 col-xs-12" >

                <label for="property_amount">Name of the unit/Project</label>
                <input type="text" class="form-control" id="unit_name" name="unit_name" onkeypress="return onlyAlphabets(event,$(this))" maxlength="30"  value="<?php if(isset($_POST['unit_name'])){echo $_POST['unit_name'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['unit_name'])){ echo $_SESSION['error']['unit_name'];}?></span>
            </div>

            <div class="form-group col-md-4 col-xs-12" >

                <label for="property_amount">Proposed Location of the unit/Project</label>
                <input type="text" class="form-control" onkeypress="return onlyAlphabets(event,$(this))" id="unit_location" name="unit_location"  value="<?php if(isset($_POST['unit_location'])){echo $_POST['unit_location'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['unit_location'])){ echo $_SESSION['error']['unit_location'];}?></span>
            </div>

            <div class="form-group col-md-4 col-xs-12" >

                <label for="property_amount">Total Cost of the unit/Project </label>
                <input type="text" class="form-control"  onkeypress="return isNumber(event,$(this),10)" id="unit_cost" name="unit_cost"  value="<?php if(isset($_POST['unit_cost'])){echo $_POST['unit_cost'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['unit_cost'])){ echo $_SESSION['error']['unit_cost'];}?></span>
            </div>

        </div>
        <br/>
        <div class="row">
            <div class="form-group col-md-4 col-xs-12" >

                <label for="property_amount">Bank Loan (Rs)</label>
                <input type="text" class="form-control"  onkeypress="return isNumber(event,$(this),10)" id="unit_loan" name="unit_loan"  value="<?php if(isset($_POST['unit_loan'])){echo $_POST['unit_loan'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['unit_loan'])){ echo $_SESSION['error']['unit_loan'];}?></span>
            </div>

            <div class="form-group col-md-4 col-xs-12" >

                <label for="property_amount">Subsidy (Rs)</label>
                <input type="text" class="form-control" id="unit_subsidy" name="unit_subsidy"  value="<?php if(isset($_POST['unit_subsidy'])){echo $_POST['unit_subsidy'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['unit_subsidy'])){ echo $_SESSION['error']['unit_subsidy'];}?></span>
            </div>



        </div>
        <br/>
        <h5><b style="color:#000;font-size: 15px">Bank Details</b></h5>
    <hr>
    <br/>

    <div class="row">


        <div class="form-group col-md-3" >
            <label for="ration_no">Bank Name</label>
            <input type="text" class="form-control"   id="bank_name" name="bank_name" value="<?php if(isset($_POST['bank_name'])){echo $_POST['bank_name'];}?>">
            <span class="error"><?php if(isset($_SESSION['error']['bank_name'])){ echo $_SESSION['error']['bank_name'];}?></span>
        </div>

        <div class="form-group col-md-3" >

            <label for="aadhar_no">Branch Name</label>
            <input type="text" class="form-control"  id="branch_name"  name="branch_name" value="<?php if(isset($_POST['branch_name'])){echo $_POST['branch_name'];}?>">
            <span class="error"><?php if(isset($_SESSION['error']['branch_name'])){ echo $_SESSION['error']['branch_name'];}?></span>
        </div>
        <div class="form-group col-md-3" >
            <label for="ration_no">Account No</label>
            <input type="text" class="form-control"  onkeypress="return isNumber1(event,$(this))" id="bank_accountno" name="bank_accountno" value="<?php if(isset($_POST['bank_accountno'])){echo $_POST['bank_accountno'];}?>">
            <span class="error"><?php if(isset($_SESSION['error']['bank_accountno'])){ echo $_SESSION['error']['bank_accountno'];}?></span>
        </div>

        <div class="form-group col-md-3" >

            <label for="aadhar_no">IFSC Code</label>
            <input type="text" class="form-control"  id="bank_ifsccode"  name="bank_ifsccode" value="<?php if(isset($_POST['bank_ifsccode'])){echo $_POST['bank_ifsccode'];}?>">
            <span class="error"><?php if(isset($_SESSION['error']['bank_ifsccode'])){ echo $_SESSION['error']['bank_ifsccode'];}?></span>
        </div>

    </div>
<br/>
        <h5><b style="color:#000080">Enclosures: (Self Attested Copies)</b></h5>
        <hr>
        <br/>

        <label for="image">Upload Enclosures</label><span style="color:#00F; display:none;">(Preferred Dimension : 380*246(W*H))</span>

        <div class="row">


            <div class="form-group col-md-6 col-xs-12" >

                <h5>Disability Certificate issued by District Medical Board (OR) SADAREM (as defined in GOMs.31,dt.01/12/2009 of WD,CW&DW (DW) Dept.)   </h5>
            </div>


            <div class="col-md-6 col-xs-12">

                <div id="file-uploader1" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader1'),
                            // action: '<?php echo SECURE_PATH;?>theme/js/upload/php2.php?upload=image&upload_type=multiple&width=1920&height=394',
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload1&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();



                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>


                <input type="hidden" name="upload1" id="upload1" value="<?php if(isset($_REQUEST['upload1'])){ echo $_REQUEST['upload1'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload1'])){


                    ?>
                    <table><tr>
                            <?php

                            $type1 = explode('.',$_POST['upload1']);

                            if($type1[1]=='pdf' || $type1[1]=='doc' || $type1[1]=='docx' || $type1[1]=='PDF' ||$type1[1]=='DOC' || $type1[1]=='DOCX' || $type1[1]=='pdf'){
                                ?>
                                <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload1'];?>" target="_blank">Link</a></td>
                                <?php
                            }else{
                                ?>
                                <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_POST['upload1']; ?>" style="width:100px; height:50px;" alt="No Image"/></td>

                                <?php
                            }

                            ?>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload1_err" style="display: none">* Please Upload Content</span>
            </div>

        </div>

        <br/>
        <div class="row">


            <div class="form-group col-md-6 col-xs-12" >

                <h5>Recent Income Certificate issued by Tahsildar</h5>
            </div>


            <div class="col-md-6 col-xs-12">

                <div id="file-uploader2" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader2'),
                            // action: '<?php echo SECURE_PATH;?>theme/js/upload/php2.php?upload=image&upload_type=multiple&width=1920&height=394',
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload2&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();



                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>


                <input type="hidden" name="upload2" id="upload2" value="<?php if(isset($_POST['upload2'])){ echo $_POST['upload2'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload2'])){


                    ?>
                    <table><tr>
                            <?php

                            $type2 = explode('.', $_POST['upload2']);

                            if($type2[1]=='pdf' || $type2[1]=='doc' || $type2[1]=='docx' || $type2[1]=='PDF' ||$type2[1]=='DOC' || $type2[1]=='DOCX' || $type2[1]=='pdf'){
                                ?>
                                <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload2'];?>" target="_blank">Link</a></td>
                                <?php
                            }else{
                                ?>
                                <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_POST['upload2']; ?>" style="width:100px; height:50px;" alt="No Image"/></td>

                                <?php
                            }

                            ?>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload2_err" style="display: none">* Please Upload Content</span></div>

        </div>
        <br/>
        <div class="row">


            <div class="form-group col-md-6 col-xs-12" >

                <h5>Proof of Residence (Aadhar Card, Voter Id, Residential Certificate issued by Concerned Tahsildhar)</h5>
            </div>


            <div class="col-md-6 col-xs-12">

                <div id="file-uploader3" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader3'),
                            // action: '<?php echo SECURE_PATH;?>theme/js/upload/php2.php?upload=image&upload_type=multiple&width=1920&height=394',
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload3&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();



                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>


                <input type="hidden" name="upload3" id="upload3" value="<?php if(isset($_POST['upload3'])){ echo $_POST['upload3'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload3'])){


                    ?>
                    <table><tr>
                            <?php

                            $type3 = explode('.', $_POST['upload3']);

                            if($type3[1]=='pdf' || $type3[1]=='doc' || $type3[1]=='docx' || $type3[1]=='PDF' ||$type3[1]=='DOC' || $type3[1]=='DOCX' || $type3[1]=='pdf'){
                                ?>
                                <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload3'];?>" target="_blank">Link</a></td>
                                <?php
                            }else{
                                ?>
                                <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_POST['upload3']; ?>" style="width:100px; height:50px;" alt="No Image"/></td>

                                <?php
                            }

                            ?>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload3_err" style="display: none">* Please Upload Content</span>
            </div>

        </div>
        <br/>
        <div class="row">


            <div class="form-group col-md-6 col-xs-12" >

                <h5>Age Certificate for Proof of Age</h5>
            </div>


            <div class="col-md-6 col-xs-12">

                <div id="file-uploader4" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader4'),
                            // action: '<?php echo SECURE_PATH;?>theme/js/upload/php2.php?upload=image&upload_type=multiple&width=1920&height=394',
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload4&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();



                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>


                <input type="hidden" name="upload4" id="upload4" value="<?php if(isset($_POST['upload4'])){ echo $_POST['upload4'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload4'])){


                    ?>
                    <table><tr>
                            <?php

                            $type4 = explode('.', $_POST['upload4']);

                            if($type4[1]=='pdf' || $type4[1]=='doc' || $type4[1]=='docx' || $type4[1]=='PDF' ||$type4[1]=='DOC' || $type4[1]=='DOCX' || $type4[1]=='pdf'){
                                ?>
                                <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload4'];?>" target="_blank">Link</a></td>
                                <?php
                            }else{
                                ?>
                                <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_POST['upload4']; ?>" style="width:100px; height:50px;" alt="No Image"/></td>

                                <?php
                            }

                            ?>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload4_err" style="display: none">* Please Upload Content</span>
            </div>

        </div>
        <br/>
        <div class="row">


            <div class="form-group col-md-6 col-xs-12" >

                <h5>Caste Certificate</h5>
            </div>


            <div class="col-md-6 col-xs-12">

                <div id="file-uploader5" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader5'),
                            // action: '<?php echo SECURE_PATH;?>theme/js/upload/php2.php?upload=image&upload_type=multiple&width=1920&height=394',
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload5&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();



                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>


                <input type="hidden" name="upload5" id="upload5" value="<?php if(isset($_POST['upload5'])){ echo $_POST['upload5'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload5'])){


                    ?>
                    <table><tr>
                            <?php

                            $type5 = explode('.', $_POST['upload5']);

                            if($type5[1]=='pdf' || $type5[1]=='doc' || $type5[1]=='docx' || $type5[1]=='PDF' ||$type5[1]=='DOC' || $type5[1]=='DOCX' || $type5[1]=='pdf'){
                                ?>
                                <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload5'];?>" target="_blank">Link</a></td>
                                <?php
                            }else{
                                ?>
                                <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_POST['upload5']; ?>" style="width:100px; height:50px;" alt="No Image"/></td>

                                <?php
                            }

                            ?>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload5_err" style="display: none">* Please Upload Content</span>
            </div>

        </div>
        <br/>
        <div class="row">


            <div class="form-group col-md-6 col-xs-12" >

                <h5>Certificates of Educational Qualifications, Trainings etc,, if any</h5>
            </div>


            <div class="col-md-6 col-xs-12">

                <div id="file-uploader6" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader6'),
                            // action: '<?php echo SECURE_PATH;?>theme/js/upload/php2.php?upload=image&upload_type=multiple&width=1920&height=394',
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload6&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();



                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>


                <input type="hidden" name="upload6" id="upload6" value="<?php if(isset($_POST['upload6'])){ echo $_POST['upload6'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload6'])){


                    ?>
                    <table><tr>
                            <?php

                            $type6 = explode('.', $_POST['upload6']);

                            if($type6[1]=='pdf' || $type6[1]=='doc' || $type6[1]=='docx' || $type6[1]=='PDF' ||$type6[1]=='DOC' || $type6[1]=='DOCX' || $type6[1]=='pdf'){
                                ?>
                                <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload6'];?>" target="_blank">Link</a></td>
                                <?php
                            }else{
                                ?>
                                <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_POST['upload6']; ?>" style="width:100px; height:50px;" alt="No Image"/></td>

                                <?php
                            }

                            ?>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload6_err" style="display: none">* Please Upload Content</span>
            </div>

        </div>
        <br/>
        <div class="row">


            <div class="form-group col-md-6 col-xs-12" >
                <h5>Legal Guardian Certificate, in case of Intellectual Disability</h5>

            </div>


            <div class="col-md-6 col-xs-12">

                <div id="file-uploader10" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader10'),
                            // action: '<?php echo SECURE_PATH;?>theme/js/upload/php2.php?upload=image&upload_type=multiple&width=1920&height=394',
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload10&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();



                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>


                <input type="hidden" name="upload10" id="upload10" value="<?php if(isset($_POST['upload10'])){ echo $_POST['upload10'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload10'])){


                    ?>
                    <table><tr>
                            <?php

                            $type10 = explode('.', $_POST['upload10']);

                            if($type10[1]=='pdf' || $type10[1]=='doc' || $type10[1]=='docx' || $type10[1]=='PDF' ||$type10[1]=='DOC' || $type10[1]=='DOCX' || $type10[1]=='pdf'){
                                ?>
                                <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload10'];?>" target="_blank">Link</a></td>
                                <?php
                            }else{
                                ?>
                                <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_POST['upload10']; ?>" style="width:100px; height:50px;" alt="No Image"/></td>

                                <?php
                            }

                            ?>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload10_err" style="display: none">* Please Upload Content</span>
            </div>

        </div>
        <br/>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <h5>Passport size Photo</h5>


            </div>

            <div class="form-group col-md-6 col-xs-12" >



                <div id="file-uploader7" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader7'),
                            // action: '<?php echo SECURE_PATH;?>theme/js/upload/php2.php?upload=image&upload_type=multiple&width=1920&height=394',
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload7&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();



                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>


                <input type="hidden" name="upload7" id="upload7" value="<?php if(isset($_POST['upload7'])){ echo $_POST['upload7'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload7'])){


                    ?>
                    <table><tr>


                            <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_POST['upload7']; ?>" style="width:100px; height:50px;" alt="No Image"/><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload7'];?>" target="_blank">Link</a></td>


                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload7_err" style="display: none">* Please Upload Content</span>
            </div>



        </div>

        <div class="row">

            <div class="col-md-6">
                <h5>Upload Signature [ <span style="color: #0A246A;">Preferred Size : 200*50 (Width*Height)</span> ]</span> ] </h5>
            </div>

            <div class="form-group col-md-6" >

                <div id="file-uploader8">
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader8'),
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=signature&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();

                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>

                <input type="hidden" name="signature" id="signature" value="<?php if(isset($_POST['signature'])){ echo $_POST['signature'];}?>" />

                <br  />
                <?php
                if(isset($_POST['signature'])  && $_POST['signature']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['signature'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="signature_err" style="display: none">* Please Upload Content</span>
            </div>
        </div>

        <br/>




        <h5><b style="color:#000080">Declaration:</b></h5>
        <hr>
        <br/>

        <div class="row">
            <div class="form-group col-md-12 col-xs-12" >


                <br/>
                <span id="declaration"> I declare that the information furnished above is true and correct. I also declare that I have not claimed Subsidy previously from welfare or disabled or any other Department or Government Agency. If in any case, the information furnished by me is proved to be wrong at any time, I understand that I am punishable with imprisonment for a term which may extend to two years or with fine which may extend to twenty thousand rupees or punishable under Section 91 of the rights of Person with Disabilities Act,2016 and recovery of Subsidy under Economic Rehabilitation Scheme along with loan amount from me with interest thereon under Revenue Recovery Act.</span>
                <br />



            </div>

        </div>

        <br/>

        <div class="row">
            <div class="form-group col-md-4" id="pre-hide">

                <a class="btn btn-info" data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>subsidy_pwd/process1.php','viewDetails=1&district='+$('#district').val()+'&name='+$('#name').val()+'&surname='+$('#surname').val()+'&dob='+$('#dob').val()+'&sex='+$('#sex').val()+'&father_name='+$('#father_name').val()+'&guardian_name='+$('#guardian_name').val()+'&religion='+$('#religion').val()+'&maritial_status='+$('#maritial_status').val()+'&training_name='+$('#training_name').val()+'&ti_details='+$('#ti_details').val()+'&native_place='+$('#native_place').val()+'&present_place='+$('#present_place').val()+'&occupation='+$('#occupation').val()+'&sadarem='+$('#sadarem').val()+'&aadhar_num='+$('#aadhar_num').val()+'&ration_num='+$('#ration_num').val()+'&epic_no='+$('#epic_no').val()+'&academic='+$('#academic').val()+'&technical='+$('#technical').val()+'&declaration='+$('#declaration').text()+'&unit_name='+$('#unit_name').val()+'&unit_location='+$('#unit_location').val()+'&unit_cost='+$('#unit_cost').val()+'&unit_loan='+$('#unit_loan').val()+'&unit_subsidy='+$('#unit_subsidy').val()+'&bank_name='+$('#bank_name').val()+'&branch_name='+$('#branch_name').val()+'&bank_accountno='+$('#bank_accountno').val()+'&bank_ifsccode='+$('#bank_ifsccode').val()+'&upload1='+$('#upload1').val()+'&upload2='+$('#upload2').val()+'&upload3='+$('#upload3').val()+'&upload4='+$('#upload4').val()+'&upload5='+$('#upload5').val()+'&upload6='+$('#upload6').val()+'&upload7='+$('#upload7').val()+'&upload10='+$('#upload10').val()+'&signature='+$('#signature').val()+'&sub_date='+$('#sub_date').val()+'&mandal_ren='+$('#mandal_ren').val()+'&village_ren='+$('#village_ren').val()+'&caste='+$('#caste').val()+'&experience_count='+$('#experience_count').val()+sub($('#experience_count').val())+'&training_from_date='+$('#training_from_date').val()+'&training_to_date='+$('#training_to_date').val()+'&disability_type='+$('#disability_type').val()+'&percentage='+$('#percentage').val()+'&mobile='+$('#mobile').val()+'&email='+$('#email').val()+'&sad_med='+$('#sad_med').val()+'<?php if(isset($_POST['editform'])){ echo '&editform='.$_POST['editform'];}?>')">Preview</a>

            </div>
        </div>
    </form>

    <script type="text/javascript">
        $('#adminForm').slideDown();
    </script>



    <?php
    unset($_SESSION['error']);

}

if(isset($_REQUEST['add_listing1']))
{
    $listing_count = $_GET['add_listing1'];
    ?>

    <hr>
    <br/>


    <div class="row">


        <div class="form-group col-md-4 col-xs-12" >
            <label for="comp_name">Name of Company</label>
            <input type="text" class="form-control" id="comp_name<?php echo $listing_count?>" onkeypress="return onlyAlphabets(event,$(this))" name="comp_name" value="<?php if(isset($_POST['comp_name'])){echo $_POST['comp_name'];}?>" >
            <span class="error"><?php if(isset($_SESSION['error']['comp_name'])){ echo $_SESSION['error']['comp_name'];}?></span>
        </div>

        <div class="form-group col-md-4 col-xs-12" >
            <label for="comp_mobile">Company Contact Number</label>
            <input type="text" class="form-control" id="comp_mobile<?php echo $listing_count?>" onkeypress="return isNumber(event,$(this),10)" name="comp_mobile" value="<?php if(isset($_POST['comp_mobile'])){echo $_POST['comp_mobile'];}?>" >
            <span class="error"><?php if(isset($_SESSION['error']['comp_mobile'])){ echo $_SESSION['error']['comp_mobile'];}?></span>
        </div>

        <div class="form-group col-md-4 col-xs-12" >
            <label for="comp_email">Company Mail Id</label>
            <input type="text" class="form-control" id="comp_email<?php echo $listing_count?>" onkeypress="validateEmail(this.value)"  name="comp_email" value="<?php if(isset($_POST['comp_email'])){echo $_POST['comp_email'];}?>" >
            <span class="error"><?php if(isset($_SESSION['error']['comp_email'])){ echo $_SESSION['error']['comp_email'];}?></span>
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-4 col-xs-12" >
            <label for="from_date">Worked From Date</label>
            <input type="text" class="form-control datePicker" id="from_date<?php echo $listing_count?>"  name="from_date" value="<?php if(isset($_POST['from_date'])){echo $_POST['from_date'];}?>" >
            <span class="error"><?php if(isset($_SESSION['error']['from_date'])){ echo $_SESSION['error']['from_date'];}?></span>
        </div>

        <div class="form-group col-md-4 col-xs-12" >
            <label for="to_date">Worked To Date</label>
            <input type="text" class="form-control datePicker" id="to_date<?php echo $listing_count?>"  name="to_date" value="<?php if(isset($_POST['to_date'])){echo $_POST['to_date'];}?>" >
            <span class="error"><?php if(isset($_SESSION['error']['to_date'])){ echo $_SESSION['error']['to_date'];}?></span>
        </div>


        <div class="form-group col-md-4" style="padding-top: 20px">
            <?php
            if($listing_count == 1){
                ?>
                <a class="btn btn-success" onclick="addListItem1()"><i class="fa fa-plus"></i></a>
                <?php
            }
            else{
                ?>
                <a class="btn btn-danger" onclick="removeListItem1('<?php echo $listing_count; ?>')"><i class="fa fa-minus "></i></a>

                <?php
            }
            ?>

        </div>

    </div>















    <br/>


    <div style="clear:both;"></div>
    </div>
    <?php


    $listing_count++;
}


//Process and Validate POST data
if(isset($_POST['validateForm'])){
		
	$_SESSION['error'] = array();
	
	$post = $session->cleanInput($_POST);
	
	 	$id = 'NULL';


    

   
	 
	if(isset($post['editform'])){
	  $idess = $post['editform'];
	
	}

   
	


//    $field = 'district';
//    if(!$post['district'] || strlen(trim($post['district'])) == 0){
//        $_SESSION['error'][$field] = "* Please Select District";
//    }

 //   $field = 'name';
//    if(!$post['name'] || strlen(trim($post['name'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Name";
//    }
//	
//	$field = 'surname';
//    if(!$post['surname'] || strlen(trim($post['surname'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter SurName";
//    }
//
//    $field = 'father_name';
//    if(!$post['father_name'] || strlen(trim($post['father_name'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Father Name";
//    }
//	$field = 'dob';
//    if(!$post['dob'] || strlen(trim($post['dob'])) == 0){
//        $_SESSION['error'][$field] = "* Please Select Date of Birth";
//    }
//	$field = 'religion_caste';
//    if(!$post['religion_caste'] || strlen(trim($post['religion_caste'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Religion and Caste";
//    }
//	$field = 'maritial_status';
//    if(!$post['maritial_status'] || strlen(trim($post['maritial_status'])) == 0){
//        $_SESSION['error'][$field] = "* Please Select Maritial Status ";
//    }
//	$field = 'native_place';
//    if(!$post['native_place'] || strlen(trim($post['native_place'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Native Place & District";
//    }
//	
//	$field = 'native_place';
//    if(!$post['native_place'] || strlen(trim($post['native_place'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Native Place & District";
//    }
//	
//	$field = 'present_place';
//    if(!$post['present_place'] || strlen(trim($post['present_place'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Present place of Living and Address";
//    }
//	
//	
//	$field = 'occupation';
//    if(!$post['occupation'] || strlen(trim($post['occupation'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Occupation";
//    }
//	
//	$field = 'sadarem';
//    if(!$post['sadarem'] || strlen(trim($post['sadarem'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter SADAREM ID No";
//    }
//	
//	$field = 'academic';
//    if(!$post['academic'] || strlen(trim($post['academic'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Academic Qualifications";
//    }
//	
//	$field = 'techincal';
//    if(!$post['technical'] || strlen(trim($post['technical'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Technical Qualifications";
//    }
//	
//	if(strlen($post['training_name'])>0)
//	{
//		$field = 'training_name';
//    if(!$post['training_name'] || strlen(trim($post['training_name'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Training Name";
//    }
//		
//	$field = 'year_training';
//    if(!$post['year_training'] || strlen(trim($post['year_training'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Year & Duration of Training";
//    }
//	$field = 'ti_details';
//    if(!$post['ti_details'] || strlen(trim($post['ti_details'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Name & Address of Training Institute";
//    }	
//		
//		
//	}
//	
//	$field = 'landline';
//    if(!$post['landline'] || strlen(trim($post['landline'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Landline No";
//    }
//	
//	$field = 'mobile';
//    if(!$post['mobile'] || strlen(trim($post['mobile'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Mobile No";
//    }
//	
//	$field = 'unit_name';
//    if(!$post['unit_name'] || strlen(trim($post['unit_name'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Name of Unit/Project";
//    }
//	
//	$field = 'unit_location';
//    if(!$post['unit_location'] || strlen(trim($post['unit_location'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Proposed Location of the Unit/Project";
//		
//    }
//	$field = 'unit_cost';
//    if(!$post['unit_cost'] || strlen(trim($post['unit_cost'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Total Unit/Project Cost";
//    }
//	
//	$field = 'unit_loan';
//    if(!$post['unit_loan'] || strlen(trim($post['unit_loan'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Bank Loan";
//    }
//	
//	$field = 'unit_subsidy';
//    if(!$post['unit_subsidy'] || strlen(trim($post['unit_subsidy'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Subsidy";
//    }
//	
//	$field = 'upload1';
//    if(!$post['upload1'] || strlen(trim($post['upload1'])) == 0){
//        $_SESSION['error'][$field] = "* Please Upload Certificate";
//    }
//	
//	$field = 'upload2';
//    if(!$post['upload2'] || strlen(trim($post['upload2'])) == 0){
//        $_SESSION['error'][$field] = "* Please Upload Certificate";
//    }
//	
//	$field = 'upload3';
//    if(!$post['upload3'] || strlen(trim($post['upload3'])) == 0){
//        $_SESSION['error'][$field] = "* Please Upload Certificate";
//    }
//$field = 'upload4';
//    if(!$post['upload4'] || strlen(trim($post['upload4'])) == 0){
//        $_SESSION['error'][$field] = "* Please Upload Certificate";
//    }
//	$field = 'upload5';
//    if(!$post['upload5'] || strlen(trim($post['upload5'])) == 0){
//        $_SESSION['error'][$field] = "* Please Upload Certificate";
//    }
//	$field = 'upload7';
//    if(!$post['upload7'] || strlen(trim($post['upload7'])) == 0){
//        $_SESSION['error'][$field] = "* Please Upload Certificate";
//    }
//	
//	$field = 'upload8';
//    if(!$post['upload8'] || strlen(trim($post['upload8'])) == 0){
//        $_SESSION['error'][$field] = "* Please Upload Certificate";
//    }
//	$field = 'upload9';
//    if(!$post['upload9'] || strlen(trim($post['upload9'])) == 0){
//        $_SESSION['error'][$field] = "* Please Upload Certificate";
//    }
    
	
//Check if any errors exist	
	if(count($_SESSION['error']) > 0 || $post['validateForm'] == 2){
	?>
    <script type="text/javascript">
    $('#adminForm').slideDown();
		
	setState('adminForm','<?php echo SECURE_PATH;?>subsidy_pwd/process.php','addForm=1&name=<?php echo $post['name'];?>&surname=<?php echo $post['surname'];?>&father_name=<?php echo $post['father_name'];?>&father_name=<?php echo $post['father_name'];?>&dob=<?php echo $post['dob'];?>&religion_caste=<?php echo $post['religion_caste'];?>&maritial_status=<?php echo $post['maritial_status'];?>&native_place=<?php echo $post['native_place'];?>&present_place=<?php echo $post['present_place'];?>&occupation=<?php echo $post['occupation'];?>&sadarem=<?php echo $post['sadarem'];?>&academic=<?php echo $post['academic'];?>&technical=<?php echo $post['technical'];?>&training_name=<?php echo $post['training_name'];?>&year_training=<?php echo $post['year_training'];?>&ti_details=<?php echo $post['ti_details'];?>&landline=<?php echo $post['landline'];?>&mobile=<?php echo $post['mobile'];?>&unit_name=<?php echo $post['unit_name'];?>&unit_location=<?php echo $post['unit_location'];?>&unit_cost=<?php echo $post['unit_cost'];?>&unit_loan=<?php echo $post['unit_loan'];?>&unit_subsidy=<?php echo $post['unit_subsidy'];?>&upload1=<?php echo $post['upload1'];?>&upload2=<?php echo $post['upload2'];?>&upload3=<?php echo $post['upload3'];?>&upload4=<?php echo $post['upload4'];?>&upload5=<?php echo $post['upload5'];?>&upload7=<?php echo $post['upload7'];?>&upload8=<?php echo $post['upload8'];?>&upload9=<?php echo $post['upload9'];?>&upload10=<?php echo $_REQUEST['upload10']; ?>&sub_date=<?php echo $_REQUEST['sub_date']; ?>&mandal_ren=<?php echo $_REQUEST['mandal_ren']; ?>&village_ren=<?php echo $_REQUEST['village_ren']; ?>&caste=<?php echo $_REQUEST['caste']; ?>&comp_name=<?php echo $_REQUEST['comp_name']; ?>&experience=<?php echo $_REQUEST['experience']; ?>&comp_mobile=<?php echo $_REQUEST['comp_mobile']; ?>&from_date=<?php echo $_REQUEST['from_date']; ?>&to_date=<?php echo $_REQUEST['to_date']; ?>&comp_email=<?php echo $_REQUEST['comp_email']; ?><?php  if(isset($_POST['editform'])){ echo '&editform='.$post['editform'];}?>')
	
    </script>
    
<?php	
	}
	else{

        $s = explode(',', $post['arr']);

		$user = $session->username;

		if(isset($post['editform']))
	 {
		 $database->query("UPDATE `subsidy_pwd` SET   name='".$post['name']."',surname='".$post['surname']."',guardian_name='".$post['guardian_name']."',father_name='".$post['father_name']."',dob='".$post['dob']."',sex='".$post['sex']."',religion='".$post['religion']."',maritial_status='".$post['maritial_status']."',native_place='".$post['native_place']."',present_place='".$post['present_place']."',occupation='".$post['occupation']."',sadarem='".$post['sadarem']."',aadhar_num='".$post['aadhar_num']."',ration_num='".$post['ration_num']."',bank_name='".$post['bank_name']."',branch_name='".$post['branch_name']."',bank_accountno='".$post['bank_accountno']."',bank_ifsccode='".$post['bank_ifsccode']."',epic_no='".$post['epic_no']."',academic='".$post['academic']."',technical='".$post['technical']."',training_name='".$post['training_name']."',ti_details='".$post['ti_details']."',unit_name='".$post['unit_name']."',unit_location='".$post['unit_location']."',unit_cost='".$post['unit_cost']."',unit_loan='".$post['unit_loan']."',unit_subsidy='".$post['unit_subsidy']."',upload1='".$post['upload1']."',upload2='".$post['upload2']."',upload3='".$post['upload3']."',upload4='".$post['upload4']."',upload5='".$post['upload5']."',upload6='".$post['upload6']."',upload7='".$post['upload7']."',upload10='".$post['upload10']."',signature='".$post['signature']."',sub_date='".strtotime($post['sub_date'])."',mandal_ren='".$post['mandal_ren']."',village_ren='".$post['village_ren']."',caste='".$post['caste']."',training_from_date='".$post['training_from_date']."',training_to_date='".$post['training_to_date']."',disability_type='".$post['disability_type']."',percentage='".$post['percentage']."',mobile='".$post['mobile']."',email='".$post['email']."',sad_med='".$post['sad_med']."', status = '1' , rdo_status = '' where id = '".$idess."' ");

         $ap_no = $database->get_name('subsidy_pwd','id',$idess,'appli_no');

         $database->query("Delete from work_experience WHERE form_id='".$ap_no."'");

         for($i=0; $i<count($s);$i++){
             $database->query("INSERT INTO `work_experience` VALUES (NULL,'".$ap_no."','".$post['comp_name'.$s[$i]]."','".$post['comp_mobile'.$s[$i]]."','".$post['comp_email'.$s[$i]]."','".$post['from_date'.$s[$i]]."','".$post['to_date'.$s[$i]]."','".time()."') ");
        }

	 }else{

		 $abc = date('d-m-Y');

$abcd = explode("-", $abc);

$yearr =  substr($abcd[2],'-2');

            if(strlen($post['district'])==1){
                $dis = '0'.$post['district'];
            }else{
                $dis = $post['district'];
            }

	   $appli_no = $dis."".$yearr."3".rand(10,10000);
	   
	   
		
        $database->query("INSERT INTO `subsidy_pwd` VALUES (".$id.",'".$appli_no."','".$post['district']."','','','','".$post['name']."','".$post['surname']."','".$post['sex']."','".$post['father_name']."', '".$post['guardian_name']."','".$post['dob']."','".$post['religion']."','".$post['maritial_status']."','".$post['native_place']."','".$post['present_place']."','".$post['occupation']."','".$post['sadarem']."','".$post['aadhar_num']."','".$post['ration_num']."','".$post['epic_no']."','".$post['academic']."','".$post['technical']."','".$post['training_name']."','".$post['ti_details']."','".$post['unit_name']."','".$post['unit_location']."','".$post['unit_cost']."','".$post['unit_loan']."','".$post['unit_subsidy']."','".$post['bank_name']."','".$post['branch_name']."','".$post['bank_accountno']."','".$post['bank_ifsccode']."','".$post['upload1']."','".$post['upload2']."','".$post['upload3']."','".$post['upload4']."','".$post['upload5']."','".$post['upload6']."','".$post['upload7']."','".$post['upload10']."','".$post['signature']."','".strtotime($post['sub_date'])."','".$post['mandal_ren']."','".$post['village_ren']."','".$post['caste']."','".$post['training_from_date']."','".$post['training_to_date']."','".$post['disability_type']."','".$post['percentage']."','".$post['mobile']."','".$post['email']."','".$post['sad_med']."','".$post['declaration']."','1','new','','','','".$session->username."','".time()."') ");

$idss = mysqli_insert_id();
            for($i=0; $i<count($s);$i++){
                $database->query("INSERT INTO `work_experience` VALUES (NULL,'".$appli_no."','".$post['comp_name'.$s[$i]]."','".$post['comp_mobile'.$s[$i]]."','".$post['comp_email'.$s[$i]]."','".$post['from_date'.$s[$i]]."','".$post['to_date'.$s[$i]]."','".time()."') ");
            }


            $message = "Dear ".$post['name'].": Your Application has been successfully Submitted with Reference No ".$appli_no." 
		Please upload Signed copy and submit one at office/of the District welfare officer(DWSC) of women,children,Disabled & Senior Citizen,".$database->get_name('global_districts','uid',$post['district'],'district');
            
            //$session->sendsms(SMS_USER,SMS_PASSWORD,$message,SMS_SID,$post['mobile']);
            
		$id=mysqli_insert_id();
	 }

       // unset($_SESSION['image']);
	  

		

?>
        
        <div class="alert alert-success "><i class="fa fa-thumbs-up fa-2x"></i>Information saved successfully!</div>

  <?php
        if(isset($post['editform']) || $session->userlevel == 6)
	 {
 ?>
  <script type="text/javascript">
      setState('main-content','<?php echo SECURE_PATH;?>subsidy_pwd_view/','getLayout=true');
  </script>
<?php } else { ?>

<script type="text/javascript">

animateForm('<?php echo SECURE_PATH;?>login_applicant','login=1');
location.href='<?php echo SECURE_PATH; ?>forms/print3.php?id=<?php echo $idss; ?>';
    
</script>
<?php } ?>
	<?php
	}
	
}

//Delete experience 
if(isset($_GET['rowDelete'])){
}


/* Table Display not in Use */
if(isset($_GET['tableDisplay'])){
}




?>

<style>
.blue-color{
	color:#00F;

}

</style>
<script type="text/javascript">

$( ".datePicker" ).datepicker({

			changeMonth: true,

			changeYear: true,

			dateFormat: "d-m-yy",

			yearRange: "1990:2025", 
			
			maxDate: 0


		});
</script>

<script type="text/javascript"> $("#leftDiv").sticky({topSpacing:10});</script>