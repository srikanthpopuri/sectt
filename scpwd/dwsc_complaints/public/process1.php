<?php
ini_set('display_errors','On');
include('../include/session.php');

?>

<style>
    hr {
        display: block;
        height: 0px;
        border: 0;
        border-top: 1px solid #000;
        margin: 0;
    }
</style>

<script>
//    $(document).ready(function(){
//        $('#messageDetails').modal('show');
//    })
</script>

<script type="text/javascript">
    function validate(){
        var count_err = 0;

        if(($('#district').length)==0 || $('#district').val()=='' || $('#district').val()=='0'){
            count_err=count_err+1;
            $('#district_err').show();
        }else{ $('#district_err').hide();}

      

        if(($('#upload1').length)==0 || $('#upload1').val()=='' || $('#upload1').val()=='0'){
            count_err=count_err+1;
            $('#upload1_err').show();
        }else{ $('#upload1_err').hide();}

        if(($('#upload8').length)==0 || $('#upload8').val()=='' || $('#upload8').val()=='0'){
            count_err=count_err+1;
            $('#upload8_err').show();
        }else{ $('#upload8_err').hide();}

      

        if(count_err==0){
            $('#messageDetails').modal('show');
            setState('viewDetails','<?php echo SECURE_PATH;?>form1/process1.php','viewDetails=1&date='+$('#date99').val()+'&district='+$('#district').val()+'&name='+$('#name').val()+'&age='+$('#age').val()+'&sex='+$('#sex').val()+'&perm_address='+$('#perm_address').val()+'&correspondence_address='+$('#correspondence_address').val()+'&contact_no='+$('#contact_no').val()+'&disability_type='+$('#disability_type').val()+'&disability_percentage='+$('#disability_percentage').val()+'&disability_certificate_no='+$('#disability_certificate_no').val()+'&upload1='+$('#upload1').val()+'&upload8='+$('#upload8').val()+'&issuing_authority='+$('#issuing_authority').val()+'&valid_upto='+$('#valid_upto').val()+'&complaint_description='+$('#complaint_description').val()+'&respondent_name='+$('#respondent_name').val()+'&respondent_address='+$('#respondent_address').val()+'<?php if(isset($_REQUEST['editform'])){ echo '&editform='.$_REQUEST['editform'];}?>');
        }
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
        yearRange: "1920:2055",
		maxDate:0
    });
</script>

<?php
//Metircs Forms, Tables and Functions
//Display courses form
if(isset($_REQUEST['addForm'])){


	
	if($_REQUEST['addForm'] == 2 && isset($_REQUEST['editform'])){
   
   $data_sel = $database->query("SELECT * FROM complaints_form where id = '".$_REQUEST['editform']."'");
        

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
         <input type="text" class="form-control" id="date99" value="<?php if(isset($_POST['date'])){ echo date('d-m-Y', $_POST['date']);  } else { echo date('d-m-Y'); }?>" readonly/>
     </div>
 </div>

    <br/>
  
  <div class="row">
  <div class="form-group col-md-4">

<label for="district">Select District</label>
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
      <span class="error" id="district_err" style="display: none">* Please Select District</span></div>
      
      

</div>


    <br/>

    <div class="row">

  <div class="form-group col-md-4">
<label for="name">Name of the Applicant (Include Surname)</label>
      <input type="text" class="form-control" name="name" onkeypress="return onlyAlphabets(event,$(this))" id="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>"/>
      <span class="error"><?php if(isset($_SESSION['error']['name'])){ echo $_SESSION['error']['name'];}?></span>
  </div>

 <div class="form-group col-md-4" >
    <label for="father_name">Age</label>
     <input type="text" class="form-control" name="age" onkeypress="return isNumber(event,$(this),3)" id="age" value="<?php if(isset($_POST['age'])){echo $_POST['age'];}?>"/>
     <span class="error"><?php if(isset($_SESSION['error']['age'])){ echo $_SESSION['error']['age'];}?></span>
 </div>
 <div class="form-group col-md-4" >

<label for="gender">Select Gender</label>

   <select name="sex" id="sex" class="form-control" >
        <option value="">Select</option>
        <option value="1" <?php if(isset($_POST['sex'])){if($_POST['sex']=='1'){echo 'selected=selected';}}?>>Male</option>
       <option value="0" <?php if(isset($_POST['sex'])){if($_POST['sex']=='0'){echo 'selected=selected';}}?>>Female</option>
       <!--<option value="2" <?php if(isset($_POST['sex'])){if($_POST['sex']=='2'){echo 'selected=selected';}}?>>TransGender</option>-->
    </select>
  <span class="error"><?php if(isset($_SESSION['error']['sex'])){ echo $_SESSION['error']['sex'];}?></span>

 </div>

        
  </div>


  <div class="row">

<div class="form-group col-md-4" >
           <label for="address">Address for Communication (Permanent)</label>
           <textarea class="form-control" name="perm_address" id="perm_address"><?php if(isset($_POST['perm_address'])){echo $_POST['perm_address'];}?></textarea>
           <span class="error"><?php if(isset($_SESSION['error']['perm_address'])){ echo $_SESSION['error']['perm_address'];}?></span>
       </div>
       
       <div class="form-group col-md-4" >
           <label for="address">Address for Communication (Correspondence)</label>
           <textarea class="form-control" name="correspondence_address" id="correspondence_address"><?php if(isset($_POST['correspondence_address'])){echo $_POST['correspondence_address'];}?></textarea>
           <span class="error"><?php if(isset($_SESSION['error']['correspondence_address'])){ echo $_SESSION['error']['correspondence_address'];}?></span>
       </div>
       <div class="form-group col-md-4 col-xs-12" >
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" placeholder="Mobile" onkeypress="return isMobile(event,'contact_no',10)"  id="contact_no" name="contact_no" value="<?php if(isset($_POST['contact_no'])){echo $_POST['contact_no'];}?>" >
            <span class="error"><?php if(isset($_SESSION['error']['contact_no'])){ echo $_SESSION['error']['contact_no'];}?></span>
        </div>
  </div>
  
<div class="row">

        <div class="form-group col-md-4" >
            <label for="disability_type">Type of Disability</label>
            <select name="disability_type" id="disability_type" class="form-control" >
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
        <label for="disability_certificate_no">Disability Certficate Number</label>
        <input type="text" class="form-control" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;"
               onpaste="return false;" id="disability_certificate_no" name="disability_certificate_no" value="<?php if(isset($_POST['disability_certificate_no'])){echo $_POST['disability_certificate_no'];}?>">
        <span class="error"><?php if(isset($_SESSION['error']['disability_certificate_no'])){ echo $_SESSION['error']['disability_certificate_no'];}?></span>
        <span id="error" style="color: Red; display: none">* Special Characters not allowed</span>
    </div>

    <div class="form-group col-md-4" >
        <label for="percentage">Percentage of Disability</label>
        <input type="text" class="form-control" id="disability_percentage"  onkeypress="return isNumber(event,$(this),3)"  name="disability_percentage" value="<?php if(isset($_POST['disability_percentage'])){echo $_POST['disability_percentage'];}?>">
        <span class="error"><?php if(isset($_SESSION['error']['disability_percentage'])){ echo $_SESSION['error']['disability_percentage'];}?></span>
    </div>
    
    </div>
   

    <div class="row">
        <div class="form-group col-md-4" >
            <label for="upload1">1) Disability Certificate Proof</label>

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
        
        <div class="form-group col-md-4" >
        <label for="percentage">Issuing Authority</label>
        <input type="text" class="form-control" id="issuing_authority"  onkeypress="return onlyAlphabets(event,$(this))"  name="issuing_authority" value="<?php if(isset($_POST['issuing_authority'])){echo $_POST['issuing_authority'];}?>">
        <span class="error"><?php if(isset($_SESSION['error']['issuing_authority'])){ echo $_SESSION['error']['issuing_authority'];}?></span>
    </div>
 <div class="form-group col-md-4" >
        <label for="percentage">Valid Upto</label>
        <input type="text" class="form-control datePicker" id="valid_upto"   name="valid_upto" value="<?php if(isset($_POST['valid_upto'])){echo $_POST['valid_upto'];}?>">
        <span class="error"><?php if(isset($_SESSION['error']['valid_upto'])){ echo $_SESSION['error']['valid_upto'];}?></span>
    </div>
    </div>
    
    <div class="row">
    
    <div class="form-group col-md-4" >
           <label for="address">Complaint Description</label>
           <textarea class="form-control" name="complaint_description" id="complaint_description"><?php if(isset($_POST['complaint_description'])){echo $_POST['complaint_description'];}?></textarea>
           <span class="error"><?php if(isset($_SESSION['error']['complaint_description'])){ echo $_SESSION['error']['complaint_description'];}?></span>
       </div>
    </div>

    
<div class="row">
        <div class="form-group col-md-12" >
            <label for="upload8">8) Supplementary Attachments</label>

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
    

   
<h5><b style="color:#000;font-size: 15px">Respondent Details</b></h5>
    <hr>
    <br/> 
<div class="row">
    
    <div class="form-group col-md-4" >
           <label for="address">Respondent Name</label>
           <textarea class="form-control" name="respondent_name" id="respondent_name"><?php if(isset($_POST['respondent_name'])){echo $_POST['respondent_name'];}?></textarea>
           <span class="error"><?php if(isset($_SESSION['error']['respondent_name'])){ echo $_SESSION['error']['respondent_name'];}?></span>
       </div>
       <div class="form-group col-md-4" >
           <label for="address">Respondent Address</label>
           <textarea class="form-control" name="respondent_address" id="respondent_address"><?php if(isset($_POST['respondent_address'])){echo $_POST['respondent_address'];}?></textarea>
           <span class="error"><?php if(isset($_SESSION['error']['respondent_address'])){ echo $_SESSION['error']['respondent_address'];}?></span>
       </div>
    </div>
    

 <div class="row">
<div class="form-group col-md-4" id="check_submit">

    <a class="btn btn_custom_back" onclick="validate()">Preview</a>
    


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