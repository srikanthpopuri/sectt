<?php

include 'include/session.php';
?>
<script type="text/javascript">

$( ".datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "dd-mm-yy",
			yearRange: "1970:2025",
			maxDate: 0
		});
    
function showmodal(page,appli_no,form_id,mobile){
    $('#modalDetails').modal('show');
    setState('OTPDetails','<?php echo SECURE_PATH;?>otp.php','OTPDetails=1&appli_no='+appli_no+'&form_id='+form_id+'&page='+page+'&mobile='+mobile);
}    
</script>



<style>
    .upload_btn {
        width: 200px;
        float: right;
    }
    .qq-upload-button {
        background-color: #de047f !important;
        border-color: transparent !important;
        color: #FFFFFF !important;
        width: 150px !important;
        border-radius: 5px;
        height: 35px !important;
        background: url('<?php echo SECURE_PATH;?>assets/images/Upload_icon.png') no-repeat center left 10px;
        background-size: 30px 20px;
    }
    .save_btn {
        background : url('<?php echo SECURE_PATH;?>assets/images/save_icon.png') no-repeat center left 10px;
        background-size: 15px;
        float: left;
        background-color: #de047f !important;
        border-color: transparent !important;
        color: #FFFFFF !important;
        width: 150px !important;
        border-radius: 5px;
        height: 35px !important;
    }
</style>


    <div class="modal fade" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <b style="color:#FFF;">Department for the welfare of Disabled and Senior Citizens</b>
                    <h4 class="modal-title" id="myModalLabel">
                    </h4>
                </div>
                <div class="modal-body" id="OTPDetails" >

                </div>
                <div class="modal-footer" style="display:none;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php

if(isset($_REQUEST['checkAadhar']))
{
	$aadhar_no = $_REQUEST['aadhar_no'];
	
	//$con='';
//	
//	if($_REQUEST['retro_vehicle'] == '1')
//	{
//		$con = "and retro_vehicle = '".$_REQUEST['retro_vehicle']."'";
//	}
//    if($_REQUEST['tri_cycle']  == '1')
//	{
//	    $con = "and tri_cycle = '".$_REQUEST['tri_cycle']."'";	
//	}
//	if($_REQUEST['caliper']   == '1')
//	{
//		$con = "and caliper = '".$_REQUEST['caliper']."'";
//	}
//	if($_REQUEST['a_limb']   == '1')
//	{
//		$con = "and a_limb = '".$_REQUEST['a_limb']."'";
//	}
//	if($_REQUEST['wheel_chair']   == '1')
//	{
//		$con = "and wheel_chair = '".$_REQUEST['wheel_chair']."'";
//	}
//	if($_REQUEST['laptop']   == '1')
//	{
//		$con = "and laptop = '".$_REQUEST['laptop']."'";
//	}
//	if($_REQUEST['mp3']   == '1')
//	{
//	    $con = "and mp3 = '".$_REQUEST['mp3']."'";	
//	}
//	if($_REQUEST['dc']   == '1')
//	{
//		$con = "and dc = '".$_REQUEST['dc']."'";
//	}
//	if($_REQUEST['w_stick']   == '1')
//	{
//		$con = "and w_stick = '".$_REQUEST['w_stick']."'";
//	}
//	if($_REQUEST['b_books']   == '1')
//	{
//		$con = "and b_books = '".$_REQUEST['b_books']."'";
//	}
//	if($_REQUEST['ear_device']   == '1')
//	{
//		$con = "and ear_device = '".$_REQUEST['ear_device']."'";
//	}
//	if($_REQUEST['smart_phone']   == '1')
//	{
//		$con = "and smart_phone = '".$_REQUEST['smart_phone']."'";
//	}
//	if($_REQUEST['w_chair']   == '1')
//	{
//		$con = "and w_chair = '".$_REQUEST['w_chair']."'";
//	}
//	if($_REQUEST['tlm']   == '1')
//	{
//		$con = "and tlm = '".$_REQUEST['tlm']."'";
//	}
	
	$query_aadhar = $database->query("select * from form1 where aadhar_no = '".$aadhar_no."'");
	if(mysqli_num_rows($query_aadhar)>0)
	{
		$ret_qa=mysqli_fetch_array($query_aadhar);
		$ab='';
		$ba='';
		$ab=time();
		$ba=strtotime('+3 years', $ret_qa['proceedings_timestamp']);
		if(($ret_qa['retro_vehicle'] == 1) && ($_REQUEST['retro_vehicle'] == 1))
		{
				if(strlen($ret_qa['proceedings_timestamp'])>0)
                   {
		?>
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Availed this Facility on <?php echo date('d-m-Y',$ret_qa['proceedings_timestamp']); ?></span>
        <?php } else { ?>
        
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Applied for this Facility. </span>
        <?php } ?>
		<script type="text/javascript">
	           $('#check_submit').hide();

	</script>
	<?php
		}
		elseif(($ret_qa['smart_phone'] == 1) && ($_REQUEST['smart_phone'] == 1))
		{
		if(strlen($ret_qa['proceedings_timestamp'])>0)
{
		?>
                        <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Availed this Facility on <?php echo date('d-m-Y',$ret_qa['proceedings_timestamp']); ?></span>
        <?php } else { ?>
        
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Applied for this Facility. </span>
        <?php } ?>
		<script type="text/javascript">
	$('#check_submit').hide();

	
	</script>
	<?php
		}
		elseif(($ret_qa['w_chair'] == 1) && ($_REQUEST['w_chair'] == 1))
		{
		if(strlen($ret_qa['proceedings_timestamp'])>0)
{
		?>
                        <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Availed this Facility on <?php echo date('d-m-Y',$ret_qa['proceedings_timestamp']); ?></span>
            <?php } else { ?>
        
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Applied for this Facility. </span>
        <?php } ?>
		<script type="text/javascript">
	$('#check_submit').hide();

	
	</script>
	<?php
		}
		elseif(($ret_qa['laptop'] == 1) && ($_REQUEST['laptop'] == 1))
		{
		if(strlen($ret_qa['proceedings_timestamp'])>0)
		{
		?>
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Availed this Facility on <?php echo date('d-m-Y',$ret_qa['proceedings_timestamp']); ?></span>
        <?php } else { ?>
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Applied for this Facility. </span>
    
        <?php } ?>
		<script type="text/javascript">
	$('#check_submit').hide();

	
	</script>
	<?php
		}
		elseif(($ret_qa['mp3'] == 1) && ($_REQUEST['mp3'] == 1))
		{
		if(strlen($ret_qa['proceedings_timestamp'])>0)
		{
		?>
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Availed this Facility on <?php echo date('d-m-Y',$ret_qa['proceedings_timestamp']); ?></span>
         <?php } else { ?>
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Applied for this Facility. </span>
    
        <?php } ?>
		<script type="text/javascript">
	$('#check_submit').hide();

	
	</script>
	<?php
		}
		elseif(($ret_qa['daisy'] == 1) && ($_REQUEST['daisy'] == 1))
		{
		if(strlen($ret_qa['proceedings_timestamp'])>0)
		{
		?>
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Availed this Facility on <?php echo date('d-m-Y',$ret_qa['proceedings_timestamp']); ?></span>
          <?php } else { ?>
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Applied for this Facility. </span>
    
        <?php } ?>
		<script type="text/javascript">
	$('#check_submit').hide();

	
	</script>
	<?php
		}
		elseif(($ret_qa['ear_device'] == 1 && $_REQUEST['ear_device'] == 1))
		{
		if($ba>$ab){
			
			
		if(strlen($ret_qa['proceedings_timestamp'])>0)
		{
		?>
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Availed this Facility on <?php echo date('d-m-Y',$ret_qa['proceedings_timestamp']); ?></span>
          <?php } else { ?>
                <label for="aadhar_no"></label><br/>

        <span style="color:#F00;">You Have Already Applied for this Facility. </span>
    
        <?php } ?>
		<script type="text/javascript">
	$('#check_submit').hide();

	
	</script>
	<?php
		}else{
			
			
			
			
		}
		
		}
	else{
		?>
		<script type="text/javascript">
	$('#check_submit').show();

	
	</script>
	<?php	
	}}else{
		?>
		<script type="text/javascript">
	$('#check_submit').show();

	
	</script>
	<?php	
	}
	
}

if(isset($_REQUEST['aadharMarriage']))
{
	$aadhar_no = $_REQUEST['aadhar_no'];
	$query_aadhar = $database->query("select * from form2 where aadhar_sp = '".$aadhar_no."'");
	if(mysqli_num_rows($query_aadhar)>0)
	{
		?>
                            <label for="aadhar_sp">&nbsp;&nbsp;</label><br />

        <span style="color:#F00;">You Have Already Availed this Facility.</span>
        
		<script type="text/javascript">
	$('#pre-hide').hide();
$('#check_aadhar').show();
	
	</script>
	<?php
		
	}else{
		?>
		<script type="text/javascript">
	$('#pre-hide').show();
	$('#check_aadhar').hide();
	</script>
	<?php	
	}
	
}

if(isset($_POST['aadhar_subsidy_pwd']))
{

$aadhar_num = $_REQUEST['aadhar_num'];

$query_check=$database->query("select * from subsidy_pwd where 	aadhar_num = '".$_REQUEST['aadhar_num']."'");

if(mysqli_num_rows($query_check)>0)
{
	$ret_query_check = mysqli_fetch_array($query_check);
	?>
                            <label for="aadhar_sp">&nbsp;&nbsp;</label><br />
            
            <span class="error">Dear Applicant you have already Availed the Scheme.</span><!--<a data-toggle="modal" data-target="#messageDetails" onClick="setStateGet('viewDetails','<?php echo SECURE_PATH;?>subsidy_pwd_pe/process11.php','viewDetails=1&id=<?php echo $ret_query_check['id'];?>')">Please Click here for Details</a>-->

 <script type="text/javascript">
					$("#pre-hide").hide();
					$("#aadhar_check").show();
					</script>
    <?php
	
}
	
else{
	?>
 
             <script type="text/javascript">
					$("#pre-hide").show();
					$("#aadhar_check").hide();
					</script>
    <?php
	
}
}

if(isset($_REQUEST['age_checker']))
{
	
	if(strlen($_REQUEST['m_dob'])>0 && isset($_REQUEST['marriage'])==1)
	{
		
$a1=new DateTime($_REQUEST['m_dob']);
$a2=new DateTime();
$a3 = $a2->diff($a1);
if($a3->y < 1)
{
	//echo '%d years, %d month, %d days', $a3->y, $a3->m, $a3->d;
	?>
    <div class="col-md-4">
            <label>Marriage Date</label>
            <input type="text" class="form-control datepicker" id="m_dob"   onChange="setState('m_proceed','<?php echo SECURE_PATH;?>ajax.php','age_checker=1&marriage=1&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val()+'')" value="<?php if(isset($_POST['m_dob'])){echo $_POST['m_dob'];}?>" >
        </div>
      <div class="col-md-4">
      <label>&nbsp;</label><br/>

     <span style="color:#006600;"> <?php  
	printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);


	?></span>
    </div>

    <script type="text/javascript">
$('#b_proceed').show();
	</script>
    
    <?php
	
}else{
	?>
    <div class="col-md-4">
            <label>Marriage Date</label>
            <input type="text" class="form-control datepicker" id="m_dob"   onChange="setState('m_proceed','<?php echo SECURE_PATH;?>ajax.php','age_checker=1&marriage=1&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val()+'')" value="<?php if(isset($_POST['b_dob'])){echo $_POST['b_dob'];}?>" >
        </div>
      <div class="col-md-8">
      <label>&nbsp;</label><br/>
      <?php
	//printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);
?>
<span style="color:#F00;">The time limit for submission of application for Marriage Incentive exceeded requisite time limit i.e 1 year</span>
    </div>
    <script type="text/javascript">
	$('#age_proceed').hide();
	$('#m_proceed').show();
	$('#b_proceed').hide();
    $('#bg_proceed').hide();
	
	</script>
    
    <?php
	
}


		
	}
	
	if(strlen($_REQUEST['m_dob'])>0 && strlen($_REQUEST['b_dob'])>0 && isset($_REQUEST['bride'])==1)
	{
		
$a1=new DateTime($_REQUEST['b_dob']);
$a2=new DateTime($_REQUEST['m_dob']);
$a3 = $a2->diff($a1);
//printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);
if($a3->y >= 18)
{
	//echo '%d years, %d month, %d days', $a3->y, $a3->m, $a3->d;
	?>
	<div class="col-md-4" >
            <label>Bride Date of Birth</label>
            <input type="text" class="form-control datepicker" id="b_dob"   onChange="setState('b_proceed','<?php echo SECURE_PATH;?>ajax.php','age_checker=1&bride=1&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val()+'')" value="<?php if(isset($_POST['b_dob'])){echo $_POST['b_dob'];}?>" >
        </div>
        <div class="col-md-4">
        <label>&nbsp;</label><br/>
       <span style="color:#006600;"> <?php
	printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);


	?></span>
    </div>
    
    <script type="text/javascript">
$('#bg_proceed').show();
	</script>
    
    <?php
	
}else{
	?>
    <div class="col-md-4" >
            <label>Bride Date of Birth</label>
            <input type="text" class="form-control datepicker" id="b_dob"   onChange="setState('b_proceed','<?php echo SECURE_PATH;?>ajax.php','age_checker=1&bride=1&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val()+'')" value="<?php if(isset($_POST['b_dob'])){echo $_POST['b_dob'];}?>" >
        </div>
        <div class="col-md-8">
        <label>&nbsp;</label><br/>
        <?php
	//printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);
	?>
<span style="color:#F00;">Bride has not attained eligible age of Marriage i.e 18 Years</span>


    </div>
    <script type="text/javascript">
	$('#age_proceed').hide();
$('#b_proceed').show();
 $('#bg_proceed').hide();
	</script>
    
    <?php
	
}


		
	}
	if(strlen($_REQUEST['m_dob'])>0 && strlen($_REQUEST['b_dob'])>0 && strlen($_REQUEST['bg_dob'])>0 && isset($_REQUEST['bridegroom'])==1)
	{
		
$a1=new DateTime($_REQUEST['bg_dob']);
$a2=new DateTime($_REQUEST['m_dob']);
$a3 = $a2->diff($a1);
//printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);

if($a3->y >= 21)
{
	//echo '%d years, %d month, %d days', $a3->y, $a3->m, $a3->d;
	?>
        <div class="col-md-4"  >
            <label>Bride Groom Date of Birth</label>
            <input type="text" class="form-control datepicker" id="bg_dob" onChange="setState('bg_proceed','<?php echo SECURE_PATH;?>ajax.php','age_checker=1&bridegroom=1&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val()+'')" value="<?php if(isset($_POST['bg_dob'])){echo $_POST['bg_dob'];}?>" >
        </div>
        <div class="col-md-4">
        <label>&nbsp;</label><br/>
      <span style="color:#006600;"> <?php
		
			printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);

        
        ?></span>
        </div>
        
    

    <script type="text/javascript">
	$('#age_proceed').show();
$('#b_proceed').show();
$('#bg_proceed').show();
	</script>
    
    <?php
	
}else{
	
	?>
        <div class="col-md-4"  >
            <label>Bride Groom Date of Birth</label>
            <input type="text" class="form-control datepicker" id="bg_dob" onChange="setState('bg_proceed','<?php echo SECURE_PATH;?>ajax.php','age_checker=1&bridegroom=1&m_dob='+$('#m_dob').val()+'&b_dob='+$('#b_dob').val()+'&bg_dob='+$('#bg_dob').val()+'')" value="<?php if(isset($_POST['bg_dob'])){echo $_POST['bg_dob'];}?>" >
        </div>
        <div class="col-md-8">
        <label>&nbsp;</label><br/>
        <?php
		
			//printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);
			?>
			<span style="color:#F00;">Bride Groom has not attained eligible age of Marriage i.e 21 Years</span>


        </div>
        
    <script type="text/javascript">
	$('#age_proceed').hide();
//$('#bride').hide();
$('#bg_proceed').show();
	</script>
    
    <?php
	
}
		
	}
	
}
if(isset($_REQUEST['dob_checker']))
{
$b_dob = $_REQUEST['b_dob'];
$bg_dob= $_REQUEST['bg_dob'];
if(strlen($_REQUEST['dob'])>0)
{
	
	
	if($_REQUEST['dob'] == $b_dob )
	{
		$a1=new DateTime($_REQUEST['b_dob']);
$a2=new DateTime($_REQUEST['marriage_date']);
$a3 = $a2->diff($a1);
	?>
    <label for="marriage_age" style="color:#F00;">Age at the time of Marriage</label>
<input type="text" class="form-control" id="marriage_age" onkeypress="return isNumber(event,$(this),2)" name="marriage_age" value="	<?php printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);
?>">  
        <script type="application/javascript">
		
		$('#pre-hide').show();
        
    </script>    
        <?php	
		
	}
	elseif($_REQUEST['dob'] == $bg_dob)
	{
	$a1=new DateTime($_REQUEST['bg_dob']);
$a2=new DateTime($_REQUEST['marriage_date']);
$a3 = $a2->diff($a1);
	?>
    <label for="marriage_age" style="color:#F00;">Age at the time of Marriage</label>
<input type="text" class="form-control" id="marriage_age" onkeypress="return isNumber(event,$(this),2)" name="marriage_age" value="	<?php printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);
?>">  
        <script type="application/javascript">
		
		$('#pre-hide').show();
        
    </script>    
        <?php	
		
		
		
	}
	else{
		?>
  <label for="marriage_age" style="color:#F00;">Please Enter Valid Date of Birth</label>
      <input type="text" class="form-control" id="marriage_age" onkeypress="return isNumber(event,$(this),2)" name="marriage_age" value="Please Enter Valid Date of Birth">
  
        <script type="application/javascript">
		
		//alert('Please Select Valid Date of Birth');
		$('#pre-hide').hide();
        
    </script>    
        <?php
		
	}
	
}
else{
	
	
}
	
	
	
	
}
if(isset($_REQUEST['dob_checker_sp']))
{
$b_dob = $_REQUEST['b_dob'];
$bg_dob= $_REQUEST['bg_dob'];
if(strlen($_REQUEST['dob_sp'])>0)
{
	
	if(($_REQUEST['dob_sp'] == $b_dob) && ($_REQUEST['dob_sp'] != $_REQUEST['dob']) )
	{
        $a1=new DateTime($_REQUEST['b_dob']);
$a2=new DateTime($_REQUEST['marriage_date']);
$a3 = $a2->diff($a1);
	?>
    <label for="marriage_age" style="color:#F00;">Age at the time of Marriage</label>
<input type="text" class="form-control" id="marriage_age_sp" onkeypress="return isNumber(event,$(this),2)" name="marriage_age_sp" value="	<?php printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);
?>">  
        <script type="application/javascript">
		
		$('#pre-hide').show();
        
    </script>    
        <?php	
		
	}
	elseif(($_REQUEST['dob_sp'] == $bg_dob) && ($_REQUEST['dob_sp'] != $_REQUEST['dob']) )
	{
	$a1=new DateTime($_REQUEST['bg_dob']);
$a2=new DateTime($_REQUEST['marriage_date']);
$a3 = $a2->diff($a1);
	?>
    <label for="marriage_age" style="color:#F00;">Age at the time of Marriage</label>
<input type="text" class="form-control" id="marriage_age_sp" onkeypress="return isNumber(event,$(this),2)" name="marriage_age_sp" value="	<?php printf('%d years, %d month, %d days', $a3->y, $a3->m, $a3->d);
?>">  
        <script type="application/javascript">
		
		$('#pre-hide').show();
        
    </script>    
        <?php	
		
	}
	else{
		?>
        <label for="marriage_age" style="color:#F00;">Please Enter Valid Date of Birth</label>
      <input type="text" class="form-control" id="marriage_age" onkeypress="return isNumber(event,$(this),2)" name="marriage_age_sp" value="Please Enter Valid Date of Birth">
  
        <script type="application/javascript">
		
		//alert('Please Select Valid Date of Birth');
		$('#pre-hide').hide();
        
    </script>    
        <?php
		
	}
	
}
	
	
	
	
}
if(isset($_REQUEST['search_application'])){
	
	//echo "aaaaaaaaaaaaaaaaaaaaaa";
    $search = $_REQUEST['search'];
//   $search['0'];
		//echo "select *  from `complaints_form` WHERE unid='".$search."'";

    if($search['4']=='1'){
		//echo "select *  from `complaints_form` WHERE unid='".$search."'";
		//exit;
        $q = $database->query("select *  from `complaints_form` WHERE unid='".$search."'");
        $data = mysqli_fetch_array($q);

        if(mysqli_num_rows($q)>0){
            if($data['status']=='1'){ ?>
                <center>

                    <a class="btn btn_custom"><h2 class="heading" style="color:#fff;">Dear Applicant , your Grievance is in Queue</h2></a><br /><br />
                  <a class="btn btn-success" style="background:#C36; text-align:center" href="<?php echo SECURE_PATH;?>login_process1.php?loginForm=1" ><b>Click Here to Go Back</b></a>
                </center>

                <?php
            }
            else if($data['status']=='2' || $data['status']=='3' || $data['status']=='4' || $data['status']=='5' || $data['status']=='6' ){ ?>
                <center>
                    <a class="btn btn_custom"> <h2 class="heading" style="color:#fff;">Dear Applicant , your Grievance is in Process</h2></a><br /><br />
                  <a class="btn btn_custom" style="text-align:center" href="<?php echo SECURE_PATH;?>login_process1.php?loginForm=1" ><b>Click Here to Go Back</b></a>
                </center>
                <?php
            }
			else if($data['status']=='7' || $data['status']=='8'){ ?>
                <center>
                    <a class="btn btn_custom"> <h2 class="heading" style="color:#fff;">Dear Applicant , your Grievance is Resolved</h2></a><br /><br />
                  <a class="btn btn-success" style="background:#C36; text-align:center" href="<?php echo SECURE_PATH;?>login_process1.php?loginForm=1" ><b>Click Here to Go Back</b></a>
<!--                    <a class="btn btn-small btn-info" href="--><?php //echo SECURE_PATH;?><!--public/index1.php?addForm=2&editform=--><?php //echo $data['id'];?><!--"><i class="icon-edit"></i> Click to Edit</a>-->
                  <!--  <a class="btn btn-small btn-info" onclick="showmodal('index1.php','<?php echo $search;?>','<?php echo $data['id'];?>','<?php echo $data['mobile'];?>')"><i class="icon-edit"></i> Click to Edit</a>-->
                </center>
                <?php
            }
        }else{
            ?>
            <!-- Removed Code Start -->
            
            
            <!-- Removed Code End -->
            <div class="row">
      <div class="col-md-12">
        <h2 class="heading text-center" style="color:#000;">Welcome to Welfare of Disabled & Senior Citizens Department</h2>
      </div>
      <form class="form-inline" style="display:none;" >
        <div class="input-group input_pad"> <a  class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_applicant.php','login=1')"><i class="fa fa-signin"></i> Applicant</a> </div>
        <div class="input-group input_pad"> <a class="btn btn-lg btn-login btn_custom btn_custom1" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_process.php','loginForm=1')"><i class="fa fa-signin"></i> Employee</a> </div>
      </form>
      <br>
      <div class="col-md-6 col-sm-12">
        <form class="form-inline" id="enter_form" onSubmit="return false;">
          <div class="input-group input_pad col-sm-10 search_block1 col-sm-offset-2">
            <input type="text" placeholder="Know Your Application Status Box" id="search" class="search_input">
            <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());"><i class="fa fa-search" aria-hidden="true"></i></a> </div>
        </form>
      </div>
      <div class="col-md-6 col-sm-12">
        <form class="form-inline" id="enter_form1" onSubmit="return false;" >
          <div class="input-group input_pad col-sm-10 search_block1" style="float:left">
            <input type="text" placeholder="Print Your Application" id="search_p" class="search_input">
            <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','print_application=true&search='+$('#search_p').val());"><i class="fa fa-search" aria-hidden="true"></i></a> </div>
        </form>
      </div>
      <script type="text/javascript">
$('#enter_form').keyup(function(e) {

   if ( e.which == 13) {
      //stuff


setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());
}

});

</script> 
    </div>
    <div class="col-md-12 text-center">
                    <span class="error" style="font-size: 16px;color:red;">* No Entry Found with this Application Id</span>
    </div>
            
            <?php
        }
    }



    else{
        ?>
        
          <!-- Removed Code Start -->
            
            <!-- Removed Code End -->
            
  <div class="row">
      <div class="col-md-12">
        <h2 class="heading text-center" style="color:#000;">Welcome to Welfare of Disabled & Senior Citizens Department</h2>
      </div>
      <form class="form-inline" style="display:none;" >
        <div class="input-group input_pad"> <a  class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_applicant.php','login=1')"><i class="fa fa-signin"></i> Applicant</a> </div>
        <div class="input-group input_pad"> <a class="btn btn-lg btn-login btn_custom btn_custom1" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_process.php','loginForm=1')"><i class="fa fa-signin"></i> Employee</a> </div>
      </form>
      <br>
      <div class="col-md-6 col-sm-12">
        <form class="form-inline" id="enter_form" onSubmit="return false;">
          <div class="input-group input_pad col-sm-10 search_block1 col-sm-offset-2">
            <input type="text" placeholder="Know Your Application Status Box" id="search" class="search_input">
            <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());"><i class="fa fa-search" aria-hidden="true"></i></a> </div>
        </form>
      </div>
      <div class="col-md-6 col-sm-12">
        <form class="form-inline" id="enter_form1" onSubmit="return false;" >
          <div class="input-group input_pad col-sm-10 search_block1" style="float:left">
            <input type="text" placeholder="Print Your Application" id="search_p" class="search_input">
            <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','print_application=true&search='+$('#search_p').val());"><i class="fa fa-search" aria-hidden="true"></i></a> </div>
        </form>
      </div>
      <script type="text/javascript">
$('#enter_form').keyup(function(e) {

   if ( e.which == 13) {
      //stuff


setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());
}

});

</script> 
    </div>
    <div class="col-md-12 text-center">
                    <span class="error" style="font-size: 16px;color:red;">* No Entry Found with this Application Id</span>
    </div>
        <?php
    }

    unset($_SESSION['error']);

}


if(isset($_REQUEST['print_application'])){
    $search = $_REQUEST['search'];
//   $search['0'];

        $q = $database->query("select * from `complaints_form` WHERE unid='".$search."'");
        $data = mysqli_fetch_array($q);

        if(mysqli_num_rows($q)>0){
            if($data['status'] == '1')
               { ?>
                

                <script type="text/javascript">

location.href='<?php echo SECURE_PATH; ?>forms/print1.php?id=<?php echo $data['id'];?>';

</script>




            <?php
				}
				 else if($data['status']=='2' || $data['status']=='3' || $data['status']=='4' || $data['status']=='5' || $data['status']=='6' ){ ?>
                <center>
                    <a class="btn btn_custom"> <h2 class="heading" style="color:#fff;">Dear Applicant , your Grievance is in Process</h2></a><br /><br />
                  <a class="btn btn_custom" style="text-align:center" href="<?php echo SECURE_PATH;?>login_process1.php?loginForm=1" ><b>Click Here to Go Back</b></a>
                </center>
                <?php
            }
			else if($data['status']=='7' || $data['status']=='8'){ ?>
                <center>
                    <a class="btn btn_custom"> <h2 class="heading" style="color:#fff;">Dear Applicant , your Grievance is Resolved</h2></a><br /><br />
                  <a class="btn btn-success" style="background:#C36; text-align:center" href="<?php echo SECURE_PATH;?>login_process1.php?loginForm=1" ><b>Click Here to Go Back</b></a>
<!--                    <a class="btn btn-small btn-info" href="--><?php //echo SECURE_PATH;?><!--public/index1.php?addForm=2&editform=--><?php //echo $data['id'];?><!--"><i class="icon-edit"></i> Click to Edit</a>-->
                  <!--  <a class="btn btn-small btn-info" onclick="showmodal('index1.php','<?php echo $search;?>','<?php echo $data['id'];?>','<?php echo $data['mobile'];?>')"><i class="icon-edit"></i> Click to Edit</a>-->
                </center>
                <?php
            }
			
			
    }



    else{
        ?>
       
          <!-- Removed Code Start -->
            
            <!-- Removed Code End -->
            
  <div class="row">
      <div class="col-md-12">
        <h2 class="heading text-center" style="color:#000;">Welcome to Welfare of Disabled & Senior Citizens Department</h2>
      </div>
      <form class="form-inline" style="display:none;" >
        <div class="input-group input_pad"> <a  class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_applicant.php','login=1')"><i class="fa fa-signin"></i> Applicant</a> </div>
        <div class="input-group input_pad"> <a class="btn btn-lg btn-login btn_custom btn_custom1" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_process.php','loginForm=1')"><i class="fa fa-signin"></i> Employee</a> </div>
      </form>
      <br>
      <div class="col-md-6 col-sm-12">
        <form class="form-inline" id="enter_form" onSubmit="return false;">
          <div class="input-group input_pad col-sm-10 search_block1 col-sm-offset-2">
            <input type="text" placeholder="Know Your Application Status Box" id="search" class="search_input">
            <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());"><i class="fa fa-search" aria-hidden="true"></i></a> </div>
        </form>
      </div>
      <div class="col-md-6 col-sm-12">
        <form class="form-inline" id="enter_form1" onSubmit="return false;" >
          <div class="input-group input_pad col-sm-10 search_block1" style="float:left">
            <input type="text" placeholder="Print Your Application" id="search_p" class="search_input">
            <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','print_application=true&search='+$('#search_p').val());"><i class="fa fa-search" aria-hidden="true"></i></a> </div>
        </form>
      </div>
      <script type="text/javascript">
$('#enter_form1').keyup(function(e) {

   if ( e.which == 13) {
      //stuff


setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','print_application=true&search='+$('#search_p').val());
}

});

</script> 
    </div>
    <div class="col-md-12 text-center">
                    <span class="error" style="font-size: 16px;color:red;">* No Entry Found with this Application Id</span>
    </div>
        <?php
    }

    unset($_SESSION['error']);

}

if(isset($_REQUEST['validateForm'])){
    $_SESSION['error'] = array();

    $post = $session->cleanInput($_REQUEST);

    $field = 'upload';
    if(!$post['upload'] || strlen(trim($post['upload'])) == 0){
        $_SESSION['error'][$field] = "* Please Upload document";
    }

    if(count($_SESSION['error']) > 0 || $post['validateForm'] == 2){

        if($post['search']['4']=='1'){
            ?>
            <script type="text/javascript">
                setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search=<?php echo $post['search'];?>&upload1=<?php echo $post['upload'];?>');
            </script>
        <?php
        }

        if($post['search']['4']=='2'){
            ?>
            <script type="text/javascript">
                setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search=<?php echo $post['search'];?>&upload2=<?php echo $post['upload'];?>');
            </script>
        <?php
        }

        if($post['search']['4']=='3'){
            ?>
            <script type="text/javascript">
                setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search=<?php echo $post['search'];?>&upload3=<?php echo $post['upload'];?>');
            </script>
        <?php
        }

        if($post['search']['4']=='4'){
            ?>
            <script type="text/javascript">
                setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search=<?php echo $post['search'];?>&upload4=<?php echo $post['upload'];?>');
            </script>
        <?php
        }



        ?>


        <?php
    }else{

        if($post['search']['4']=='1'){
            $database->query("update form1 set status=1,signed_document='".$post['upload']."' WHERE appli_no='".$post['search']."'");
       }

        if($post['search']['4']=='2'){
            $database->query("update form2 set status=1,signed_document='".$post['upload']."' WHERE appli_no='".$post['search']."'");
        }

        if($post['search']['4']=='3'){
            $database->query("update subsidy_pwd set status=1,signed_document='".$post['upload']."' WHERE appli_no='".$post['search']."'");
        }

        if($post['search']['4']=='4'){
            $database->query("update form5 set status=1,signed_document='".$post['upload']."' WHERE appli_no='".$post['search']."'");
        }

        ?>

        <div class="alert alert-success "><i class="fa fa-thumbs-up fa-2x"></i>Information saved successfully!</div>

        <script>
            setStateGet('loginForm','<?php echo SECURE_PATH;?>login_process1.php','loginForm=1');
        </script>
        <?php
    }
}



?>