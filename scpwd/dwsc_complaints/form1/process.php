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


<script type="text/javascript">
    function validate(){
        var count_err = 0;

        if(($('#district').length)==0 || $('#district').val()=='' || $('#district').val()=='0'){
            count_err=count_err+1;
            $('#district_err').show();
        }else{ $('#district_err').hide();}

        if(($('#mandal_ren').length)==0 || $('#mandal_ren').val()=='' || $('#mandal_ren').val()=='0'){
            count_err=count_err+1;
            $('#mandal_ren_err').show();
        }else{ $('#mandal_ren_err').hide();}

        if(($('#village_ren').length)==0 || $('#village_ren').val()=='' || $('#village_ren').val()=='0'){
            count_err=count_err+1;
            $('#village_ren_err').show();
        }else{ $('#village_ren_err').hide();}

        if(($('#upload1').length)==0 || $('#upload1').val()=='' || $('#upload1').val()=='0'){
            count_err=count_err+1;
            $('#upload1_err').show();
        }else{ $('#upload1_err').hide();}

        if(($('#upload2').length)==0 || $('#upload2').val()=='' || $('#upload2').val()=='0'){
            count_err=count_err+1;
            $('#upload2_err').show();
        }else{ $('#upload2_err').hide();}

        if(($('#upload3').length)==0 || $('#upload3').val()=='' || $('#upload3').val()=='0'){
            count_err=count_err+1;
            $('#upload3_err').show();
        }else{ $('#upload3_err').hide();}

        if(($('#upload4').length)==0 || $('#upload4').val()=='' || $('#upload4').val()=='0'){
            count_err=count_err+1;
            $('#upload4_err').show();
        }else{ $('#upload4_err').hide();}

        if(($('#upload5').length)==0 || $('#upload5').val()=='' || $('#upload5').val()=='0'){
            count_err=count_err+1;
            $('#upload5_err').show();
        }else{ $('#upload5_err').hide();}

        if(($('#upload6').length)==0 || $('#upload6').val()=='' || $('#upload6').val()=='0'){
            count_err=count_err+1;
            $('#upload6_err').show();
        }else{ $('#upload6_err').hide();}

        if(($('#upload8').length)==0 || $('#upload8').val()=='' || $('#upload8').val()=='0'){
            count_err=count_err+1;
            $('#upload8_err').show();
        }else{ $('#upload8_err').hide();}

        if(($('#signature').length)==0 || $('#signature').val()=='' || $('#signature').val()=='0'){
            count_err=count_err+1;
            $('#signature_err').show();
        }else{ $('#signature_err').hide();}


        if(count_err==0){
            $('#messageDetails').modal('show');
            setState('viewDetails','<?php echo SECURE_PATH;?>form1/process1.php','viewDetails=1&district='+$('#district').val()+'&full_name='+$('#full_name').val()+'&father_name='+$('#father_name').val()+'&guardian_name='+$('#guardian_name').val()+'&dob='+$('#dob').val()+'&gender='+$('#gender').val()+'&address='+$('#address').val()+'&community='+$('#community').val()+'&occupation='+$('#occupation').val()+'&study='+$('#study').val()+'&institution_address='+$('#institution_address').val()+'&annual_income='+$('#annual_income').val()+'&marital_status='+$('#marital_status').val()+'&course='+$('#course').val()+'&hostel_address='+$('#hostel_address').val()+'&disability_type='+$('#disability_type').val()+'&percentage='+$('#percentage').val()+'&disability_certificate_no='+$('#disability_certificate_no').val()+'&ration_no='+$('#ration_no').val()+'&aadhar_no='+$('#aadhar_no').val()+'&bank_name='+$('#bank_name').val()+'&branch_name='+$('#branch_name').val()+'&bank_accountno='+$('#bank_accountno').val()+'&bank_ifsccode='+$('#bank_ifsccode').val()+'&retro_vehicle='+$('#retro_vehicle').val()+'&tri_cycle='+$('#tri_cycle').val()+'&caliper='+$('#caliper').val()+'&a_limb='+$('#a_limb').val()+'&wheel_chair='+$('#wheel_chair').val()+'&laptop='+$('#laptop').val()+'&mp3='+$('#mp3').val()+'&dc='+$('#dc').val()+'&w_stick='+$('#w_stick').val()+'&b_books='+$('#b_books').val()+'&ear_device='+$('#ear_device').val()+'&smart_phone='+$('#smart_phone').val()+'&w_chair='+$('#w_chair').val()+'&tlm='+$('#tlm').val()+'&device_details='+$('#device_details').val()+'&upload1='+$('#upload1').val()+'&upload2='+$('#upload2').val()+'&upload3='+$('#upload3').val()+'&upload4='+$('#upload4').val()+'&upload5='+$('#upload5').val()+'&upload6='+$('#upload6').val()+'&upload7='+$('#upload7').val()+'&upload8='+$('#upload8').val()+'&signature='+$('#signature').val()+'&mobile='+$('#mobile').val()+'&email='+$('#email').val()+'&date='+$('#date').val()+'&mandal_ren='+$('#mandal_ren').val()+'&village_ren='+$('#village_ren').val()+'&hostel='+$('#hostel').val()+'&taken_device='+$('#taken_device').val()+'&tech_qualifications='+$('#tech_qualifications').val()+'&sad_med='+$('#sad_med').val()+'&crutches='+$('#crutches').val()+'<?php if(isset($_POST['editform'])){ echo '&editform='.$_POST['editform'];}?>');
        }
    }
</script>

<script type="text/javascript">

    function showDevices(it) {

//    $('#messageDetails').modal('show');

        if(it==5){

            setStateGet('device_div','<?php echo SECURE_PATH; ?>public/device_ajax.php','id='+it);
        }

        if(it==1){
            setStateGet('device_div','<?php echo SECURE_PATH; ?>public/device_ajax.php','id='+it);
        }

        if(it==4){
            setStateGet('device_div','<?php echo SECURE_PATH; ?>public/device_ajax.php','id='+it);
        }

        if(it==11){
            setStateGet('device_div','<?php echo SECURE_PATH; ?>public/device_ajax.php','id='+it);
        }

        if(it==22){
            setStateGet('device_div','<?php echo SECURE_PATH; ?>public/device_ajax.php','id='+it);
        }
    }

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

function setCheck(c){

        var id = $(c).attr('id');

        if($('#dob').length>0 ){
            var myDate=$('#dob').val();
            myDate=myDate.split("-");
            var t2 =new Date(parseInt(myDate[2], 10), parseInt(myDate[1], 10) - 1 , parseInt(myDate[0]), 10).getTime();
            var t1 = Math.floor(Date.now());
            var diff = t1-t2;
            var diff_year = Math.floor(diff / (1000 * 3600 * 24*365));
        }

        if($('#disability_type').val()==5 && id=='retro_vehicle'){

            if($('#study').val()!=12){
                alert('Education Qualification should be Degree');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
            if($('#percentage').val()<75){
                alert('Percentage of Disability should be greater than 75');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }

            if($('#dob').length>0 ){
                if(diff_year <18 || diff_year>35){
                    alert('Age limit is between 18 to 35 years');
                    $(c).attr('checked', false);$(c).val(0);
                    return;
                }
            }

            if($('#dob').val() == '' ){
                alert('Please select the Date of Birth');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }

        }

        if(id=='laptop'){
            if($('#study').val()!=12){
                alert('Education Qualification should be Degree');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
            if($('#percentage').val()!=100){
                alert('Percentage of Disability should be 100 %');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }

            if($('#dob').length>0 ){
                if(diff_year <18 || diff_year>35){
                    alert('Age limit is between 18 to 35 years');
                    $(c).attr('checked', false);$(c).val(0);
                    return;
                }
            }

            if($('#dob').val() == '' ){
                alert('Please select the Date of Birth');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
        }

        if(id=='mp3'){
            if($('#study').val()!=9 && $('#study').val()!=10){
                alert('Student should be studying 9th Class or 10th Class in regular schools');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
            if($('#percentage').val()!=100){
                alert('Percentage of Disability should be 100 %');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }

            if($('#dob').length>0 ){
                if(diff_year <12 || diff_year>20){
                    alert('Age limit is between 12 to 20 years');
                    $(c).attr('checked', false);$(c).val(0);
                    return;
                }
            }

            if($('#dob').val() == '' ){
                alert('Please select the Date of Birth');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
        }

        if(id=='dc'){
            if($('#study').val()!=11 && $('#study').val()!=12){
                alert(' Daisy Players shall be supplied to Visually Handicapped Students those who are studying regular Intermediate Course. ');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
            if($('#percentage').val()!=100){
                alert('Percentage of Disability should be 100 %');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }

            if($('#dob').length>0 ){
                if(diff_year <12 || diff_year>20){
                    alert('Age limit is between 12 to 20 years');
                    $(c).attr('checked', false);$(c).val(0);
                    return;
                }
            }

            if($('#dob').val() == '' ){
                alert('Please select the Date of Birth');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
        }

        if(id=='ear_device') {
            if($('#dob').length>0 ){
                if(diff_year <5 || diff_year>18){
                    alert('Age limit is between 5 to 18 years');
                    $(c).attr('checked', false);$(c).val(0);
                    return;
                }
            }

            if($('#dob').val() == '' ){
                alert('Please select the Date of Birth');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
        }

        if(id=='smart_phone') {
            if ($('#study').val()<13)
            {
                alert('Student must be studying regular Degree/any equivalent');
                $(c).attr('checked', false);
                $(c).val(0);
                return;
            }

            if($('#dob').length>0 ){
                if(diff_year <18 || diff_year>35){
                    alert('Age limit is between 18 to 35 years');
                    $(c).attr('checked', false);$(c).val(0);
                    return;
                }
            }

            if($('#dob').val() == '' ){
                alert('Please select the Date of Birth');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
        }

        if(id=='wheel_chair') {
            if($('#dob').length>0 ){
                if(diff_year <12 ){
                    alert('Age limit is 12 years and above');
                    $(c).attr('checked', false);$(c).val(0);
                    return;
                }
            }

            if($('#dob').val() == '' ){
                alert('Please select the Date of Birth');
                $(c).attr('checked', false);$(c).val(0);
                return;
            }
        }

        if($(c).is(':checked')){
            $(c).val(1);
        }else{
            $(c).val(0);
        }
		setState('check_aadhar','<?php echo SECURE_PATH;?>ajax.php','checkAadhar=1&aadhar_no='+$('#aadhar_no').val()+'&retro_vehicle='+$('#retro_vehicle').val()+'&tri_cycle='+$('#tri_cycle').val()+'&caliper='+$('#caliper').val()+'&a_limb='+$('#a_limb').val()+'&wheel_chair='+$('#wheel_chair').val()+'&laptop='+$('#laptop').val()+'&mp3='+$('#mp3').val()+'&dc='+$('#dc').val()+'&w_stick='+$('#w_stick').val()+'&b_books='+$('#b_books').val()+'&ear_device='+$('#ear_device').val()+'&smart_phone='+$('#smart_phone').val()+'&w_chair='+$('#w_chair').val()+'&tlm='+$('#tlm').val());
    }

</script>

<script type="text/javascript">

    function changeits(it){
        setState('ccc','<?php echo SECURE_PATH;?>form1/ajax.php','van='+it);
    }

    function changeits1(it){
        setState('ddd','<?php echo SECURE_PATH;?>form1/ajax.php','bus='+it);
    }
</script>

<script type="text/javascript">
    $( ".datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd-mm-yy",
        yearRange: "1920:2025",
		maxDate:0
    });
</script>
<script type="text/javascript">

function native_district(){
	
	alert("You Can AVAIL This Facility in your Native District");
}
</script>

<?php
//Metircs Forms, Tables and Functions
//Display courses form
if(isset($_REQUEST['addForm'])){



    if($_REQUEST['addForm'] == 2 && isset($_REQUEST['editform'])){

        $data_sel = $database->query("SELECT * FROM form1 where id = '".$_REQUEST['editform']."'");


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
                <input type="text" class="form-control" id="date" value="<?php if(isset($POST['date'])){ echo $_POST['date'];  } else {echo date('d-m-Y'); }?>" readonly/>
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="form-group col-md-4">

                <label for="district">Select Native District</label>
                <select name="district" id="district" class="form-control" onChange="native_district(),setState('ccc','<?php echo SECURE_PATH;?>public/ajax.php','van=1&district='+$('#district').val())" >
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
                <span class="error" id="district_err" style="display: none">* Please Select District</span></div>
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

        <div class="row">

            <div class="form-group col-md-4">
                <label for="name">Name of the Applicant (Include Surname)</label>
                <input type="text" class="form-control" name="full_name" onkeypress="return onlyAlphabets(event,$(this))" id="full_name" value="<?php if(isset($_POST['full_name'])){echo $_POST['full_name'];}?>"/>
                <span class="error"><?php if(isset($_SESSION['error']['full_name'])){ echo $_SESSION['error']['full_name'];}?></span>
            </div>

            <div class="form-group col-md-4" >
                <label for="father_name">Applicant's Father/Husband Name</label>
                <input type="text" class="form-control" name="father_name" onkeypress="return onlyAlphabets(event,$(this))" id="father_name" value="<?php if(isset($_POST['father_name'])){echo $_POST['father_name'];}?>"/>
                <span class="error"><?php if(isset($_SESSION['error']['father_name'])){ echo $_SESSION['error']['father_name'];}?></span>
            </div>

            <div class="form-group col-md-4">
                <label for="dob">Date of Birth</label>
                <input type="text" class="form-control datepicker" name="dob" id="dob" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];}?>"/>
                <span class="error"><?php if(isset($_SESSION['error']['dob'])){ echo $_SESSION['error']['dob'];}?></span>
            </div>
        </div>


        <div class="row">



            <div class="form-group col-md-4" >

                <label for="gender">Select Gender</label>

                <select name="gender" id="gender" class="form-control" >
                    <option value="">Select</option>
                    <option value="1" <?php if(isset($_POST['gender'])){if($_POST['gender']=='1'){echo 'selected=selected';}}?>>Male</option>
                    <option value="0" <?php if(isset($_POST['gender'])){if($_POST['gender']=='0'){echo 'selected=selected';}}?>>Female</option>
                    <!--<option value="2" <?php if(isset($_POST['gender'])){if($_POST['gender']=='2'){echo 'selected=selected';}}?>>TransGender</option>-->
                </select>
                <span class="error"><?php if(isset($_SESSION['error']['gender'])){ echo $_SESSION['error']['gender'];}?></span>

            </div>
            <div class="form-group col-md-4" >
                <label for="address">Address for Communication</label>
                <textarea class="form-control" name="address" id="address"><?php if(isset($_POST['address'])){echo $_POST['address'];}?></textarea>
                <span class="error"><?php if(isset($_SESSION['error']['address'])){ echo $_SESSION['error']['address'];}?></span>
            </div>
        </div>


        <div class="row">

            <div class="form-group col-md-4" >
                <label for="community">Community</label>
                <select name="community" id="community" class="form-control" >
                    <option value="">Select</option>
                    <option value="1" <?php if(isset($_POST['community'])){if($_POST['community']=='1'){echo 'selected=selected';}}?>>SC</option>
                    <option value="2" <?php if(isset($_POST['community'])){if($_POST['community']=='2'){echo 'selected=selected';}}?>>ST</option>
                    <option value="3" <?php if(isset($_POST['community'])){if($_POST['community']=='3'){echo 'selected=selected';}}?>>BC</option>
                    <option value="4" <?php if(isset($_POST['community'])){if($_POST['community']=='4'){echo 'selected=selected';}}?>>OC</option>
                    <option value="5" <?php if(isset($_POST['community'])){if($_POST['community']=='5'){echo 'selected=selected';}}?>>Minority</option>
                </select>
                <span class="error"><?php if(isset($_SESSION['error']['community'])){ echo $_SESSION['error']['community'];}?></span>
            </div>

            <div class="form-group col-md-4" >
                <label for="occupation">Present Occupation</label>
                <select id="occupation" class="form-control">
                    <option value="">Select Occupation</option>
                    <option value="1" <?php if(isset($_POST['occupation'])){if($_POST['occupation']=='1'){echo 'selected=selected';}}?>>Student</option>
                    <option value="2" <?php if(isset($_POST['occupation'])){if($_POST['occupation']=='2'){echo 'selected=selected';}}?>>Employee</option>
                    <option value="4" <?php if(isset($_POST['occupation'])){if($_POST['occupation']=='4'){echo 'selected=selected';}}?>>Self Employed</option>

                    <option value="3" <?php if(isset($_POST['occupation'])){if($_POST['occupation']=='3'){echo 'selected=selected';}}?>>Un Employed</option>
                </select>
                <span class="error"><?php if(isset($_SESSION['error']['occupation'])){ echo $_SESSION['error']['occupation'];}?></span>
            </div>

            <div class="form-group col-md-4" >
                <label for="annual_income">Annual Income</label>
                <input type="text" class="form-control" id="annual_income" onkeypress="return isNumber(event,$(this),7)" name="annual_income" value="<?php if(isset($_POST['annual_income'])){echo $_POST['annual_income'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['annual_income'])){ echo $_SESSION['error']['annual_income'];}?></span>
            </div>
        </div>

        <div class="row">
<div class="form-group col-md-4" >
                <label for="study">Educational Qualifications</label>
                <select id="study" class="form-control">
                    <option value="">Select</option>
                    <?php
                    $q = $database->query("select * from study");
                    while ($data = mysqli_fetch_array($q)){
                        ?>
                        <option value="<?php echo $data['id'];?> " <?php if(isset($_POST['study'])){if($_POST['study']==$data['id']){echo 'selected=selected';}}?>><?php echo $data['class'];?></option>
                        <?php
                    }
                    ?>
                </select>
                <span class="error"><?php if(isset($_SESSION['error']['study'])){ echo $_SESSION['error']['study'];}?></span>
            </div>
            <div class="form-group col-md-4" style="display:none;" ><label>Technical Qualifications</label>
                <textarea type="text" class="form-control" id="tech_qualifications"  name="tech_qualifications" ><?php if(isset($_POST['tech_qualifications'])){echo $_POST['tech_qualifications'];}?></textarea>
                <span class="error"><?php if(isset($_SESSION['error']['tech_qualifications'])){ echo $_SESSION['error']['tech_qualifications'];}?></span>
            </div>

            <div class="form-group col-md-4">
                <label for="institution_address">Name of Institution & Address where presently Studying</label>
                <textarea type="text" class="form-control " id="institution_address" name="institution_address"><?php if(isset($_POST['institution_address'])){echo $_POST['institution_address'];}?></textarea>
                <span class="error"><?php if(isset($_SESSION['error']['institution_address'])){ echo $_SESSION['error']['institution_address'];}?></span>
            </div>

            




        </div>

        <div class="row">

            <div class="form-group col-md-4" >
                <label for="marital_status">Marital Status</label>
                <select name="marital_status" id="marital_status" class="form-control" >
                    <option value="">Select</option>
                    <option value="1" <?php if(isset($_POST['marital_status'])){if($_POST['marital_status']=='1'){echo 'selected=selected';}}?>>Un Married</option>
                    <option value="2" <?php if(isset($_POST['marital_status'])){if($_POST['marital_status']=='2'){echo 'selected=selected';}}?>>Married</option>
                    <option value="3" <?php if(isset($_POST['marital_status'])){if($_POST['marital_status']=='3'){echo 'selected=selected';}}?>>Divorced</option>
                    <option value="5" <?php if(isset($_POST['marital_status'])){if($_POST['marital_status']=='5'){echo 'selected=selected';}}?>>Single</option>
                </select> <span class="error"><?php if(isset($_SESSION['error']['marital_status'])){ echo $_SESSION['error']['marital_status'];}?></span>
            </div>
            <div class="form-group col-md-4"  style="display:none;">
                <label for="course">Education,Training courses</label>
                <input type="text" class="form-control" id="course" name="course" value="<?php if(isset($_POST['course'])){echo $_POST['course'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['course'])){ echo $_SESSION['error']['course'];}?></span>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether Applicant Resides in the Hostel</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes" onclick="$('#hostel').val('1'),$('#div1').show()" name="gender"  value="1" <?php if(isset($_POST['hostel'])){ if($_POST['hostel'] == '1'){ echo 'checked="checked"';}} ?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no"onclick="$('#hostel').val('0'),$('#div1').hide()"  name="gender" value="0" <?php if(isset($_POST['hostel'])){ if($_POST['hostel'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="hostel" value="<?php if(isset($_POST['hostel'])){ echo $_POST['hostel'] ;}else{ echo '0';}?> "  /> <br />

            </div>

            <div id="div1" style="display: none">
                <div class="form-group col-md-4" >
                    <label for="hostel_address">Hostel Communication Address</label>
                    <textarea class="form-control" id="hostel_address" name="hostel_address"><?php if(isset($_POST['hostel_address'])){echo $_POST['hostel_address'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['hostel_address'])){ echo $_SESSION['error']['hostel_address'];}?></span>
                </div>
            </div>




        </div>

        <div class="row">
            <div class="form-group col-md-4 col-xs-12" >
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" placeholder="Mobile" onkeypress="return isMobile(event,'mobile',10)"  id="mobile" name="mobile" value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];}?>" >
                <span class="error"><?php if(isset($_SESSION['error']['mobile'])){ echo $_SESSION['error']['mobile'];}?></span>
            </div>

            <div class="form-group col-md-4 col-xs-12" >
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Email" onkeypress="validateEmail(this.value)"  id="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" >
                <span class="error"><?php if(isset($_SESSION['error']['email'])){ echo $_SESSION['error']['email'];}?></span>
                <span id="error2" style="display:none;color:red;">Invalid email</span>
            </div>
        </div>


        <h5><b style="color:lightskyblue;font-size: 15px">Disability Details</b></h5>
        <hr>
        <br/>

        <div class="row">

            <div class="form-group col-md-4" >
                <label for="disability_type">Type of Disability</label>
                <select name="disability_type" id="disability_type" class="form-control" onchange="showDevices($(this).val()),setState('lg','<?php echo SECURE_PATH;?>public/ajax.php','legal=1&disability_type='+$('#disability_type').val());">
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

            <div class="form-group col-md-4" >
                <label for="percentage">Percentage of Disability</label>
                <input type="text" class="form-control" id="percentage"  onkeypress="return isNumber(event,$(this),3)"  name="percentage" value="<?php if(isset($_POST['percentage'])){echo $_POST['percentage'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['percentage'])){ echo $_SESSION['error']['percentage'];}?></span>
            </div>

        </div>



 <div class="row" id="lg"  >
  
  
  <div class="col-md-4 col-xs-12">
            <label for="dry_land">Guardian Name</label>
            <input type="text" class="form-control" id="guardian_name" onkeypress="return onlyAlphabets(event,$(this))" name="guardian_name" value="<?php if(isset($_POST['guardian_name'])){echo $_POST['guardian_name'];}?>">
            <span class="error" id="guardian_name_err" style="display: none">* Please Enter Guardian Name</span>
        </div>

  </div>

      <br/>

        <div class="row">
            <div class="col-md-4">
                <label>Disability Certificate</label>
            </div>
            <div class="col-md-8">
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

            <div id="div2m" style=" <?php if(isset($_POST['sad_med'])){if($_POST['sad_med']=='1'){}else{echo 'display:none';}}else{echo 'display:none';} ?>">
                <div class="form-group col-md-4" >
                    <label for="disability_certificate_no">SADAREM Issued Disability Certficate Number</label>
                    <input type="text" class="form-control" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;"
                           onpaste="return false;" id="disability_certificate_no" name="disability_certificate_no" value="<?php if(isset($_POST['disability_certificate_no'])){echo $_POST['disability_certificate_no'];}?>">
                    <span class="error"><?php if(isset($_SESSION['error']['disability_certificate_no'])){ echo $_SESSION['error']['disability_certificate_no'];}?></span>
                    <span id="error" style="color: Red; display: none">* Special Characters not allowed</span>
                </div>
            </div>


        </div>


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
<h5><b style="color:lightskyblue;font-size: 15px">Other Details</b></h5>
        <hr>
        <br/>

        <div class="row">


            <div class="form-group col-md-4" >
                <label for="ration_no">Ration Card Number</label>
                <input type="text" class="form-control"  onkeypress="return isNumber(event,$(this),12)" id="ration_no" name="ration_no" value="<?php if(isset($_POST['ration_no'])){echo $_POST['ration_no'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['ration_no'])){ echo $_SESSION['error']['ration_no'];}?></span>
            </div>

            <div class="form-group col-md-4" >

                <label for="aadhar_no">Aadhar Card Number</label>
                <input type="text" class="form-control" onkeypress="return isNumber(event,$(this),12)" id="aadhar_no" onkeyup="setState('check_aadhar','<?php echo SECURE_PATH;?>ajax.php','checkAadhar=1&aadhar_no='+$('#aadhar_no').val()+'&retro_vehicle='+$('#retro_vehicle').val()+'&tri_cycle='+$('#tri_cycle').val()+'&caliper='+$('#caliper').val()+'&a_limb='+$('#a_limb').val()+'&wheel_chair='+$('#wheel_chair').val()+'&laptop='+$('#laptop').val()+'&mp3='+$('#mp3').val()+'&dc='+$('#dc').val()+'&w_stick='+$('#w_stick').val()+'&b_books='+$('#b_books').val()+'&ear_device='+$('#ear_device').val()+'&smart_phone='+$('#smart_phone').val()+'&w_chair='+$('#w_chair').val()+'&tlm='+$('#tlm').val())"  name="aadhar_no" value="<?php if(isset($_POST['aadhar_no'])){echo $_POST['aadhar_no'];}?>">
                <span class="error"><?php if(isset($_SESSION['error']['aadhar_no'])){ echo $_SESSION['error']['aadhar_no'];}?></span>
            </div>
            <div class="form-group" id="check_aadhar">
        
        
        </div>

        </div>
        <br/>
        <div id="device_div">


                <h5><b style="color:lightskyblue;font-size: 15px">Details of AIDS & Appliances Required</b></h5>
                <hr>
                <br/>

                <div class="row">

                    <label for="equipment" style="padding-left: 20px">AIDS & Appliances</label><br/><br/>

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="retro_vehicle" onclick="setCheck(this)"  <?php if(isset($_POST['retro_vehicle'])){if($_POST['retro_vehicle']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Retrofitted Motorized Vehicle<br/>
                    </div>

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="tri_cycle" onclick="setCheck(this)"  <?php if(isset($_POST['tri_cycle'])){if($_POST['tri_cycle']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;TRI Cycle<br/>
                    </div>

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="caliper" onclick="setCheck(this)"  <?php if(isset($_POST['caliper'])){if($_POST['caliper']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Calipers<br/>
                    </div>

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="a_limb" onclick="setCheck(this)"  <?php if(isset($_POST['a_limb'])){if($_POST['a_limb']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Artificial Limbs<br/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="wheel_chair" onclick="setCheck(this)" <?php if(isset($_POST['wheel_chair'])){if($_POST['wheel_chair']==1){echo 'checked';}}?>  style="font-size: 15px" value="0" >&nbsp;Battery Wheel Chair<br/>
                    </div>

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="laptop" onclick="setCheck(this)" <?php if(isset($_POST['laptop'])){if($_POST['laptop']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Laptop<br/>
                    </div>


                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="mp3" onclick="setCheck(this)" <?php if(isset($_POST['mp3'])){if($_POST['mp3']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Mp3 Player<br/>
                    </div>

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="dc" onclick="setCheck(this)" <?php if(isset($_POST['dc'])){if($_POST['dc']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Daisy Player<br/>
                    </div>

                </div>
                <div class="row">

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="w_stick" onclick="setCheck(this)" <?php if(isset($_POST['w_stick'])){if($_POST['w_stick']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Walking Stick<br/>
                    </div>

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="b_books" onclick="setCheck(this)" <?php if(isset($_POST['b_books'])){if($_POST['b_books']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Braille Books<br/>
                    </div>

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="ear_device" onclick="setCheck(this)" <?php if(isset($_POST['ear_device'])){if($_POST['ear_device']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Hearing AID<br/>
                    </div>



                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="smart_phone" onclick="setCheck(this)" <?php if(isset($_POST['smart_phone'])){if($_POST['smart_phone']==1){echo 'checked';}}?>  style="font-size: 15px" value="0" >&nbsp;4G Smart Phone<br/>
                    </div>

                </div>
                <div class="row">

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="w_chair" onclick="setCheck(this)" <?php if(isset($_POST['w_chair'])){if($_POST['w_chair']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Wheel Chair<br/>
                    </div>

                    <div class="form-group col-md-3" >
                        <input type="checkbox" id="tlm" onclick="setCheck(this)" <?php if(isset($_POST['tlm'])){if($_POST['tlm']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Teaching & Learning Material (TLM)<br/>
                    </div>

                </div>
                <span class="error"><?php if(isset($_SESSION['error']['equipment'])){ echo $_SESSION['error']['equipment'];}?></span>
                <br/>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Whether you have received any AIDS & Appliances in Last 3 Years</label>
                        <div class="radio radio-warning col-md-6">
                            <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                        </div>
                        <div class="radio radio-success col-md-6" style="margin-top: 10px">
                            <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                            <label for="female">No</label>
                        </div>
                        <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

                    </div>
                </div>
<h5><b style="color:lightskyblue;font-size: 15px">Please enter the Details of such AIDS or Appliances and year in which received</b></h5>
                <hr>
                <br/>
                <div id="div2" style="display: none">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name of the Appliance</label>
                            <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                            <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Received in Year</label>
                            <input type="text" class="form-control" id="device_year" name="device_year" value="<?php if(isset($_POST['device_year'])){echo $_POST['device_year'];}?>"/>
                            <span class="error"><?php if(isset($_SESSION['error']['device_year'])){ echo $_SESSION['error']['device_year'];}?></span>
                        </div>
                    </div>
                </div>

        </div>

        <br/>






        

        <h5><b style="color:lightskyblue">Uploads</b></h5>
        <hr>
        <br/>

        <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload1">1) Disability Certificate issued by District Medical Board (OR) SADAREM (as defined in GOMs.31,dt.01/12/2009 of WD,CW&DW (DW) Dept.)</label>

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
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload1&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();

                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>

                <input type="hidden" name="upload1" id="upload1" value="<?php if(isset($_POST['upload1'])){ echo $_POST['upload1'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload1'])  && $_POST['upload1']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload1'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload1_err" style="display: none">* Please Upload Content</span>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload1">2) Bonafide Certificate from the Institution where the Applicant is Presently Studying</label>

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
                if(isset($_POST['upload2'])  && $_POST['upload2']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload2'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload2_err" style="display: none">* Please Upload Content</span>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload3">3) Recommendation letter from the Concerned Principal of the Institution where the Applicant is Presently Studying</label>

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
                if(isset($_POST['upload3'])  && $_POST['upload3']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload3'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload3_err" style="display: none">* Please Upload Content</span>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload4">4) Income Certificate issued by Tahsildar (at least issued prior to a period of one year from the date of application)</label>

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
                if(isset($_POST['upload4'])  && $_POST['upload4']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload4'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload4_err" style="display: none">* Please Upload Content</span>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload5">5)Proof of Residence (Aadhar Card, Voter Id, Residential Certificate issued by Concerned Tahsildhar)</label>

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
                if(isset($_POST['upload5'])  && $_POST['upload5']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload5'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload5_err" style="display: none">* Please Upload Content</span>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload6">6) Proof of Age : (SSC Certificate or Certificate issued by appropriate Government authority)</label>

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
                if(isset($_POST['upload6'])  && $_POST['upload6']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload6'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload6_err" style="display: none">* Please Upload Content</span>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload7">7) Caste Certificate in case of SC / ST</label>

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
                if(isset($_POST['upload7'])  && $_POST['upload7']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload7'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error"><?php if(isset($_SESSION['error']['upload7'])){ echo $_SESSION['error']['upload7'];}?></span>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload8">8) Passport size photo</label>

                <div id="file-uploader8" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader8'),
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload8&upload_type=multiple&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();

                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>

                <input type="hidden" name="upload8" id="upload8" value="<?php if(isset($_POST['upload8'])){ echo $_POST['upload8'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload8'])  && $_POST['upload8']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload8'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error" id="upload8_err" style="display: none">* Please Upload Content</span>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload8">9) Upload Signature [ <span style="color: #0A246A;">Preferred Size : 200*50 (Width*Height)</span> ]</span> ] </label>

                <div id="file-uploader9">
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader9'),
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

        <h5><b style="color:lightskyblue">Declaration</b></h5>
        <hr>


        <div class="row">
            <div class="form-group col-md-12 col-xs-12" >


                <br/>
                <span id="decl">I Sri/Smt/Kum  ___________  Son/Daughter/Wife of Sri.___________, aged ___________ years resident of ___________ hereby declare that the information given above and in the enclosed documents is true to the best of my knowledge and belief and nothing has been concealed therein. I am well aware of the fact that if the information given by me is proved false/not true/fraudulent, is punishable as per the existing law and Section 91 of The Rights of Persons with Disabilities Act, 2016 and all the benefits availed by me shall be summarily withdrawn</span>
                <br />


                <span> Place : </span><br/>

                <span> Date : </span>
            </div>

        </div>

        <br/>

        <div class="row">
            <div class="form-group col-md-4" id="check_submit">

                <a class="btn btn-info" onclick="validate()">Preview</a>



            </div>
        </div>
    </form>

    <script type="text/javascript">
        $('#adminForm').slideDown();
    </script>



    <?php
    unset($_SESSION['error']);

}


//Process and Validate POST data
if(isset($_POST['validateForm'])){
		
	$_SESSION['error'] = array();
	
	$post = $session->cleanInput($_POST);
	
	 	$id = 'NULL';



	if(isset($post['editform'])){
	  $id = $post['editform'];
	
	}




    $field = 'district';
    if(!$post['district'] || strlen(trim($post['district'])) == 0){
        $_SESSION['error'][$field] = "* Please Select District";
    }

   // $field = 'full_name';
//    if(!$post['full_name'] || strlen(trim($post['full_name'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Full Name";
//    }
//
//    $field = 'father_name';
//    if(!$post['father_name'] || strlen(trim($post['father_name'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Father Name";
//    }
//
//    $field = 'dob';
//    if(!$post['dob'] || strlen(trim($post['dob'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Date of Birth";
//    }
//
//    $field = 'gender';
//    if(strlen(trim($post['gender'])) == 0){
//        $_SESSION['error'][$field] = "* Please Select Gender";
//    }
//
//    $field = 'address';
//    if(!$post['address'] || strlen(trim($post['address'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Address for Communication";
//    }
//
//
//    $field = 'community';
//    if(!$post['community'] || strlen(trim($post['community'])) == 0){
//        $_SESSION['error'][$field] = "* Please Select Community";
//    }
//
//
//    $field = 'occupation';
//    if(!$post['occupation'] || strlen(trim($post['occupation'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Occupation";
//    }
//
//    $field = 'study';
//    if(!$post['study'] || strlen(trim($post['study'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter study class/school name/course";
//    }
//
//    $field = 'institution_address';
//    if(!$post['institution_address'] || strlen(trim($post['institution_address'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Institution Address";
//    }
//
//    $field = 'annual_income';
//    if(!$post['annual_income'] || strlen(trim($post['annual_income'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Annual Income";
//    }
//
//    $field = 'marital_status';
//    if(strlen(trim($post['marital_status'])) == 0){
//        $_SESSION['error'][$field] = "* Please Select Marital status";
//    }
//
//    $field = 'course';
//    if(!$post['course'] || strlen(trim($post['course'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Course Details";
//    }
//
//    $field = 'hostel_address';
//    if(!$post['hostel_address'] || strlen(trim($post['hostel_address'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Hostel Address";
//    }
//
//    $field = 'disability_type';
//    if(!$post['disability_type'] || strlen(trim($post['disability_type'])) == 0){
//        $_SESSION['error'][$field] = "* Please Select Disability type";
//    }
//
//    $field = 'percentage';
//    if(!$post['percentage'] || strlen(trim($post['percentage'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Disability Percentage";
//    }
//
//    $field = 'ration_no';
//    if(!$post['ration_no'] || strlen(trim($post['ration_no'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Ration Card No";
//    }
//
//    $field = 'disability_certificate_no';
//    if(!$post['disability_certificate_no'] || strlen(trim($post['disability_certificate_no'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Disability Certificate No";
//    }
//
//    $field = 'aadhar_no';
//    if(!$post['aadhar_no'] || strlen(trim($post['aadhar_no'])) == 0){
//        $_SESSION['error'][$field] = "* Please Enter Aadhar No";
//    }
//
//    $field = 'equipment';
//    if($post['retro_vehicle']==0 && $post['laptop']==0 && $post['mp3']==0 && $post['dc']==0 && $post['ear_device']==0 && $post['wheel_chair']==0 && $post['smart_phone']==0){
//        $_SESSION['error'][$field] = "* Please Select Atleast one Equipment";
//    }



    
	
//Check if any errors exist	
	if(count($_SESSION['error']) > 0 || $post['validateForm'] == 2){
	?>
    <script type="text/javascript">
    $('#adminForm').slideDown();

    setState('adminForm','<?php echo SECURE_PATH;?>form1/process.php','addForm=1&district=<?php echo $post['district'];?>&full_name=<?php echo $post['full_name'];?>&father_name=<?php echo $post['father_name'];?>&dob=<?php echo $post['dob'];?>&gender=<?php echo $post['gender'];?>&address=<?php echo $post['address'];?>&community=<?php echo $post['community'];?>&occupation=<?php echo $post['occupation'];?>&study=<?php echo $post['study'];?>&institution_address=<?php echo $post['institution_address'];?>&annual_income=<?php echo $post['annual_income'];?>&marital_status=<?php echo $post['marital_status'];?>&course=<?php echo $post['course'];?>&hostel_address=<?php echo $post['hostel_address'];?>&disability_type=<?php echo $post['disability_type'];?>&percentage=<?php echo $post['percentage'];?>&disability_certificate_no=<?php echo $post['disability_certificate_no'];?>&ration_no=<?php echo $post['ration_no'];?>&aadhar_no=<?php echo $post['aadhar_no'];?>&retro_vehicle=<?php echo $post['retro_vehicle'];?>&laptop=<?php echo $post['laptop'];?>&mp3=<?php echo $post['mp3'];?>&dc=<?php echo $post['dc'];?>&ear_device=<?php echo $post['ear_device'];?>&wheel_chair=<?php echo $post['wheel_chair'];?>&smart_phone=<?php echo $post['smart_phone'];?>&device_details=<?php echo $post['device_details'];?>&upload1=<?php echo $post['upload1'];?>&upload2=<?php echo $post['upload2'];?>&upload3=<?php echo $post['upload3'];?>&upload4=<?php echo $post['upload4'];?>&upload5=<?php echo $post['upload5'];?>&upload6=<?php echo $post['upload6'];?>&upload7=<?php echo $post['upload7'];?>&upload8=<?php echo $post['upload8'];?><?php  if(isset($_POST['editform'])){ echo '&editform='.$post['editform'];}?>')
	
    </script>
    
<?php	
	}
	else{
		
		$user = $session->username;
		
		if(isset($post['editform']))
	 {
		 $database->query("UPDATE `form1` SET   district='".$post['district']."',name='".$post['name']."',age='".$post['age']."',sex='".$post['sex']."',perm_address='".$post['perm_address']."',correspondence_address='".$post['correspondence_address']."',contact_no='".$post['contact_no']."',disability_type='".$post['disability_type']."',disability_certificate_no='".$post['disability_certificate_no']."',disability_percentage='".$post['disability_percentage']."',disability_proof='".$post['disability_proof']."',issuing_authority='".$post['issuing_authority']."',valid_upto='".$post['valid_upto']."',complaint_description='".$post['complaint_description']."',supplementary_proof='".$post['supplementary_proof']."',respondent_name='".$post['respondent_name']."',respondent_address='".$post['respondent_address']."' where id = '".$id."' ");
		 
	 }else{
		 
	
		$abc = date('d-m-Y');

$abcd = explode("-", $abc);

$yearr =  substr($abcd[2],'-2');
//echo $post['district']."a1a1a1a1a1";
            if(strlen($post['district'])==1){
				
                $dis = '0'.$post['district'];
				
				//echo $dis."aaaaaaaaaaaaaaaa";
            }else{
                $dis = $post['district'];
            }
			//echo $dis."bbbbbbbbbbbb";

	   $appli_no = $dis."".$yearr."1".rand(10,10000);
            
//echo $appli_no;
	   //exit;
        $database->query("INSERT INTO `complaints_form` VALUES (".$id.",'".$post['date']."','".$appli_no."','".$post['name']."','".$post['age']."','".$post['sex']."','".$post['perm_address']."','".$post['correspondence_address']."','".$post['district']."','".$post['contact_no']."','".$post['disability_type']."','".$post['disability_certificate_no']."','".$post['disability_percentage']."','".$post['disability_proof']."','".$post['issuing_authority']."','".$post['valid_upto']."','".$post['complaint_description']."','".$post['supplementary_proof']."','".$post['respondent_name']."','".$post['respondent_address']."',1,'','','','','','".time()."') ");
		             $id=mysqli_insert_id();

		$message = "Dear ".$post['full_name'].": Your Application has been successfully Submitted with Reference No ".$appli_no;
            
       // $session->sendsms(SMS_USER,SMS_PASSWORD,$message,SMS_SID,$post['mobile']);

        }

//        unset($_SESSION['image']);

?>
        
        <div class="alert alert-success "><i class="fa fa-thumbs-up fa-2x"></i>Information saved successfully!</div>
        <?php
        if(isset($post['editform']) || $session->userlevel == 6)
	 {
 ?>
  <script type="text/javascript">
      setState('main-content','<?php echo SECURE_PATH;?>form1_view/','getLayout=true');
</script>
<?php } else { ?>

<script type="text/javascript"
>

animateForm('<?php echo SECURE_PATH;?>login_process.php','loginForm=1');
location.href='<?php echo SECURE_PATH; ?>forms/print1.php?id=<?php echo $id;?>';

</script>
<?php } ?>
	<?php
	}
	
}

//Delete experience 
if(isset($_GET['rowDelete'])){
}


/* Table Display from form1_view */

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
			
			minDate: 0


		});
</script>

<script type="text/javascript"> $("#leftDiv").sticky({topSpacing:10});</script>