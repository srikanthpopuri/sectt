<?php
include('../include/session.php');

?>
<style>
th {
	color:lightskyblue;
	width:350px;

	 
}
</style>

<?php

if(isset($_REQUEST['viewDetails']))
{ 

$query02 = $database->query("select uid,district from global_districts where uid  = '".$_REQUEST['district']."'");
	 $ret_query02 =mysqli_fetch_array($query02);


    $s = explode(',', $_REQUEST['arr']);
    $param='';
    for($i=0; $i<count($s);$i++) {
        $param .= '&comp_name' . $s[$i] . '=' . $_REQUEST['comp_name' . $s[$i]];
        $param .= '&comp_mobile' . $s[$i] . '=' . $_REQUEST['comp_mobile' . $s[$i]];
        $param .= '&from_date' . $s[$i] . '=' . $_REQUEST['from_date' . $s[$i]];
        $param .= '&to_date' . $s[$i] . '=' . $_REQUEST['to_date' . $s[$i]];
        $param .= '&comp_email' . $s[$i] . '=' . $_REQUEST['comp_email' . $s[$i]];
    }
    
	 ?>
    <table class="table table-striped table-bordered table-condensed table-hover" style="padding-bottom:15px;">

 <tr>
            <th>Applied Date</th>
            <td><?php echo $_REQUEST['sub_date'];?></td>
        </tr>
        <tr>
            <th>District</th>
            <td><?php echo ucwords($database->get_name('global_districts','uid',$_REQUEST['district'],'district'));?></td>
        </tr>
        <tr>
            <th>Mandal</th>
            <td><?php echo ucwords($database->get_name('global_mandals','uid',$_REQUEST['mandal_ren'],'mandal'));?></td>
        </tr>
        <tr>
            <th>Panchayat</th>
            <td><?php echo ucwords($database->get_name('global_panchayats','uid',$_REQUEST['village_ren'],'panchayat'));?></td>
        </tr>
</table> 
     
     
     


<table class="table table-striped table-bordered table-condensed table-hover" style="padding-bottom:15px;">

<tr>
<th >Surname</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['surname']); ?></td>  

 </tr>

    <tr>
        <th >Name</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['name']); ?></td>

    </tr>


    <tr>
        <th >Type of Disability </th>
        <td style="word-break: break-all;text-align: justify;"><?php echo $database->get_name('disabilities','id',$_REQUEST['disability_type'],'disability')?></td>

    </tr>

    <tr>
        <th >Percentage of Disability</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['percentage']); ?></td>

    </tr>

    <tr>
        <th>Disability Certificate</th>
        <td style="word-break: break-all;text-align: justify;"><?php if($_REQUEST['sad_med']=='1'){echo "SADAREM NO" ."-". $_REQUEST['sadarem']; }
            else{
                echo 'MEDICAL BOARD';
            }?></td>
    </tr>
 
 <tr>
<th >Father's Name</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['father_name']); ?></td>  

 </tr>
 <tr>
<th >Sex</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['sex']); ?></td>  

 </tr>
 
 <tr>
<th >Guardian Name</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['guardian_name']); ?></td>  

 </tr>
 
 <tr>
<th >Date of Birth</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['dob']); ?></td>  

 </tr>
 
 <tr>
<th >Religion</th>
     <td style="word-break: break-all;text-align: justify;">  <?php if($_REQUEST['religion']=='1'){echo 'Hindu';}
         else if($_REQUEST['religion']=='2'){echo 'Muslim';}
         else if($_REQUEST['religion']=='3'){echo 'Christian';}
         else if($_REQUEST['religion']=='5'){echo 'Others';}?></td>
 </tr>

    <tr>
    <th >Caste</th>
    <td style="word-break: break-all;text-align: justify;">  <?php if($_REQUEST['caste']=='1'){echo 'SC';}
        else if($_REQUEST['caste']=='2'){echo 'ST';}
        else if($_REQUEST['caste']=='3'){echo 'BC';}
        else if($_REQUEST['caste']=='5'){echo 'Others';}?></td>
    </tr>

    <tr>
        <th >Marital Status</th>
        <td style="word-break: break-all;text-align: justify;"><?php if($_REQUEST['maritial_status']=='1'){echo 'Un Married';}
            else if($_REQUEST['maritial_status']=='2'){echo 'Married';}
            else if($_REQUEST['maritial_status']=='3'){echo 'Divorced';}
            else if($_REQUEST['maritial_status']=='5'){echo 'Single';}?></td>

    </tr>
 
 <tr>
<th >Native Address</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['native_place']); ?></td>  

 </tr>
  
 <tr>
<th >Present Place of Living and Address</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['present_place']); ?></td>  

 </tr>

    <tr>
        <th >Occupation</th>
        <td style="word-break: break-all;text-align: justify;">  <?php if($_REQUEST['occupation']=='1'){echo 'Student';}
            else if($_REQUEST['occupation']=='2'){echo 'Employee';}
            else if($_REQUEST['occupation']=='3'){echo 'Unemployed';}
            else if($_REQUEST['occupation']=='4'){echo 'Others';}
            ?></td>

    </tr>
    
  
 <?php
  if(strlen($_REQUEST['aadhar_num'])>0)
  { ?>
 <tr>
<th >Aadhar Card Number</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['aadhar_num']); ?></td>  

 </tr>
 <?php }  ?>
  
 <?php
  if(strlen($_REQUEST['ration_num'])>0)
  { ?>
 <tr>
<th >Ration Card Number</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['ration_num']); ?></td>  

 </tr>
 <?php }  ?>
  <?php
  if(strlen($_REQUEST['epic_no'])>0)
  { ?>
 <tr>
<th >Voter Id</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['epic_no']); ?></td>  

 </tr>

      <tr>
          <th >Mobile Number</th>
          <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['mobile']); ?></td>
      </tr>     
 <?php }  ?>
 </table>
 
 <span style="color:#F0C;"><b><i>Educational Qualifications:</i></b></span>

<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

 
 <tr>
<th >Academic</th>
     <td style="word-break: break-all;text-align: justify;"><?php echo $database->get_name('study','id',$_REQUEST['academic'],'class')?></td>
 </tr>


 
 <tr>
<th >Technical</th>
     <td style="word-break: break-all;text-align: justify;">  <?php echo $_REQUEST['technical']; ?></td>
 </tr>
</table>
 <?php
 if(strlen($_REQUEST['training_name'])>0)
 {  ?>
 
 <span style="color:#F0C;"><b><i>Details of Trainings taken:</i></b></span>

<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

 
 <tr>
<th >Name of the Training</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['training_name']); ?></td>  

 </tr>
 
  
 <tr>
<th >Training From Date</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['training_from_date']); ?></td>
 </tr>

    <tr>
        <th >Training To Date</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['training_to_date']); ?></td>
    </tr>

 <tr>
<th >Name and Address of Training Institute</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['ti_details']); ?></td>  

 </tr>
 
 </table>
 
 <?php }?>


<span style="color:#F0C;"><b><i>Details of Experience:</i></b></span>

    <?php
    $subject_array = explode(',', $_REQUEST['arr']);
    foreach($subject_array as $listing_count){
    ?>
        <table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">


            <tr>
                <th>Name of Company</th>
                <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['comp_name'.$listing_count]); ?></td>
            </tr>

            <tr>
                <th >Company Contact Number</th>
                <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['comp_mobile'.$listing_count]); ?></td>
            </tr>

            <tr>
                <th >From Date</th>
                <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['from_date'.$listing_count]); ?></td>
            </tr>

            <tr>
                <th >To Date</th>
                <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['to_date'.$listing_count]); ?></td>
            </tr>

            <tr>
                <th >Company Email</th>
                <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['comp_email'.$listing_count]); ?></td>
            </tr>

        </table>
    <?php

} ?>






 
 
<span style="color:#F0C;"><b><i>Details of Self Employement Unit/Project with requirement of financial outlay:</i></b></span>
<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

<tr>
<th>Name of the Unit/Project</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['unit_name']); ?></td>  


</tr>
<tr>
<th>Proposed Location of the Unit/Project</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['unit_location']); ?></td>  


</tr>
<tr>
<th>Total cost of Unit/Project</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['unit_cost']); ?></td>  


</tr><tr>
<th>Bank Loan (Rs)</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['unit_loan']); ?></td>  


</tr><tr>
<th>Subsidy (Rs)</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['unit_subsidy']); ?></td>  


</tr>

 </table>
 
 <span style="color:#F0C;"><b><i>Bank Details</i></b></span>

    <table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">


    <tr>
<th >Bank Name</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['bank_name']); ?></td>

 </tr>
        <tr>
            <th >Branch Name</th>
            <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['branch_name']); ?></td>

        </tr>
        
         <tr>
            <th >Account Number</th>
            <td style="word-break: break-all;text-align: justify;"><?php echo $_REQUEST['bank_accountno']; ?></td>

        </tr>
        <tr>
            <th >IFSC Code</th>
            <td style="word-break: break-all;text-align: justify;"><?php echo $_REQUEST['bank_ifsccode']; ?></td>

        </tr>
 
 
 </table>

 
<span style="color:#F0C;"><b><i>Enclosures:</i></b></span>
<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

<?php 
if(strlen($_REQUEST['upload1'])>0){
	$type1 = explode('.', $_REQUEST['upload1']);
	if($type1[1]=='pdf' || $type1[1]=='doc' || $type1[1]=='docx' || $type1[1]=='PDF' ||$type1[1]=='DOC' || $type1[1]=='DOCX' || $type1[1]=='pdf'){
		?>
	<tr><th>Disability Certificate issued by District Medical Board (OR) SADAREM (as defined in GOMs.31,dt.01/12/2009 of WD,CW&DW (DW) Dept.)   </th><td><a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload1'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><th>Disability Certificate issued by District Medical Board (OR) SADAREM (as defined in GOMs.31,dt.01/12/2009 of WD,CW&DW (DW) Dept.)   </th><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload1']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload1'];?>" target="_blank">Link</a></td></tr


		><?php
	}
}else{?>
	
	<tr><th>Disability Certificate issued by District Medical Board (OR) SADAREM (as defined in GOMs.31,dt.01/12/2009 of WD,CW&DW (DW) Dept.)</th><td>No Content</td></tr>
	
<?php }

?>

<?php 

 
if(strlen($_REQUEST['upload2'])>0){
	$type2 = explode('.', $_REQUEST['upload2']);

	if($type2[1]=='pdf' || $type2[1]=='doc' || $type2[1]=='docx' || $type2[1]=='PDF' ||$type2[1]=='DOC' || $type2[1]=='DOCX' || $type2[1]=='pdf'){
		?>
	<tr><th>Recent Income Certificate issued by Tahsildar</th><td><a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload2'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><th>Recent Income Certificate issued by Tahsildar</th><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload2']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload2'];?>" target="_blank">Link</a></td></tr


		><?php
	}
}else{ ?>
	
	<tr><th>Recent Income Certificate issued by Tahsildar</th><td>No Content </td></tr>
	
<?php }

?>
<?php 
if(strlen($_REQUEST['upload3'])>0){
	$type3 = explode('.', $_REQUEST['upload3']);

	if($type3[1]=='pdf' || $type3[1]=='doc' || $type3[1]=='docx' || $type3[1]=='PDF' ||$type3[1]=='DOC' || $type3[1]=='DOCX' || $type3[1]=='pdf'){
		?>
	<tr><th>Proof of Residence (Aadhar Card, Voter Id, Residential Certificate issued by Concerned Tahsildhar)</th><td><a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload3'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><th>Proof of Residence (Aadhar Card, Voter Id, Residential Certificate issued by Concerned Tahsildhar)</th><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload3']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload3'];?>" target="_blank">Link</a></td></tr


		><?php
	}

}else{ ?>
	
<tr><th>Proof of Residence (Aadhar Card, Voter Id, Residential Certificate issued by Concerned Tahsildhar)</th><td>No Content</td></tr>
	
	
<?php }
?>
<?php

 if(strlen($_REQUEST['upload4'])>0){

	$type4 = explode('.', $_REQUEST['upload4']);

	if($type4[1]=='pdf' || $type4[1]=='doc' || $type4[1]=='docx' || $type4[1]=='PDF' ||$type4[1]=='DOC' || $type4[1]=='DOCX' || $type4[1]=='pdf'){
		?>
	<tr><th>Age Certificate for Proof of Age</th><td><a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload4'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><th>Age Certificate for Proof of Age</th><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload4']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload4'];?>" target="_blank">Link</a></td></tr


		><?php
	}

 }else{ ?>
	 
	 <tr><th>Age Certificate for Proof of Age</th><td>No Content</td></tr>
	 
 <?php }
?>
<?php 
 if(strlen($_REQUEST['upload5'])>0){
	$type5 = explode('.', $_REQUEST['upload5']);

	if($type5[1]=='pdf' || $type5[1]=='doc' || $type5[1]=='docx' || $type5[1]=='PDF' ||$type5[1]=='DOC' || $type5[1]=='DOCX' || $type5[1]=='pdf'){
		?>
	<tr><th>Caste Certificate</th><td><a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload5'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><th>Caste Certificate</th><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload5']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload5'];?>" target="_blank">Link</a></td></tr


		><?php
	}
 }else{ ?>
	 

	 <tr><th>Caste Certificate</th><td>No Content</td></tr>
	 
	 
<?php }

?>
<?php 
 if(strlen($_REQUEST['upload6'])>0){
	$type6 = explode('.', $_REQUEST['upload6']);

	if($type6[1]=='pdf' || $type6[1]=='doc' || $type6[1]=='docx' || $type6[1]=='PDF' ||$type6[1]=='DOC' || $type6[1]=='DOCX' || $type6[1]=='pdf'){
		?>
	<tr><th>Certificates of Educational Qualifications, Trainings etc, if any</th><td><a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload6'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><th>Certificates of Educational Qualifications, Trainings etc, if any</th><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload6']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload6'];?>" target="_blank">Link</a></td></tr


		><?php
	}
 }else{ ?>
	 
	 <tr><th>Certificates of Educational Qualifications, Trainings etc, if any</th><td>No Content</td></tr>
	 
<?php }

?>

	<tr><th>Latest Passport Photo </th><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload7']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload7'];?>" target="_blank">Link</a></td></tr>


<?php 
if(strlen($_REQUEST['upload10'])>0){
	$type10 = explode('.', $_REQUEST['upload10']);

	if($type10[1]=='pdf' || $type10[1]=='doc' || $type10[1]=='docx' || $type10[1]=='PDF' ||$type10[1]=='DOC' || $type10[1]=='DOCX' || $type10[1]=='pdf'){
		?>
	<tr><th>Legal Guardian Certificate, in case of Intellectual Disability.</th><td><a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload10'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><th>Legal Guardian Certificate, in case of Intellectual Disability.</th><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload10']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload10'];?>" target="_blank">Link</a></td></tr


		><?php
	}
}else{ ?>
	
	<tr><th>Legal Guardian Certificate,in case of Intellectual Disability.</th><td>No Content</td></tr>
	
<?php }

?>


    <?php
    if(strlen($_REQUEST['signature'])>0){
        $type10 = explode('.', $_REQUEST['signature']);

        if($type10[1]=='pdf' || $type10[1]=='doc' || $type10[1]=='docx' || $type10[1]=='PDF' ||$type10[1]=='DOC' || $type10[1]=='DOCX' || $type10[1]=='pdf'){
            ?>
            <tr><th>Uploaded Signature</th><td><a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['signature'];?>" target="_blank">Link</a></td></tr>
            <?php
        }else{
            ?>
            <tr><th>Uploaded Signature</th><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['signature']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['signature'];?>" target="_blank">Link</a></td></tr


            ><?php
        }
    }else{ ?>

        <tr><th>Uploaded Signature</th><td>No Content</td></tr>

    <?php }

    ?>
    
 </table>
  
   
   
	<span style="color:#F0C;"><b><i>Declaration</i></b></span>
<br />

<?php echo ucwords($_REQUEST['declaration']); ?>

<br/>

	<span style="color:#F0C;"><b><i>Submit / Back</i></b></span>



   <span style="padding-left:275px;">  
<a class="btn btn-info" data-dismiss="modal"  onClick="setState('adminForm','<?php echo SECURE_PATH;?>subsidy_pwd/process.php','validateForm=1&district=<?php echo $_REQUEST['district']; ?>&name=<?php echo $_REQUEST['name']; ?>&surname=<?php echo $_REQUEST['surname']; ?>&father_name=<?php echo $_REQUEST['father_name']; ?>&guardian_name=<?php echo $_REQUEST['guardian_name']; ?>&dob=<?php echo $_REQUEST['dob']; ?>&sex=<?php echo $_REQUEST['sex']; ?>&religion=<?php echo $_REQUEST['religion']; ?>&maritial_status=<?php echo $_REQUEST['maritial_status']; ?>&native_place=<?php echo $_REQUEST['native_place']; ?>&present_place=<?php echo $_REQUEST['present_place']; ?>&occupation=<?php echo $_REQUEST['occupation']; ?>&sadarem=<?php echo $_REQUEST['sadarem']; ?>&aadhar_num=<?php echo $_REQUEST['aadhar_num']; ?>&ration_num=<?php echo $_REQUEST['ration_num']; ?>&epic_no=<?php echo $_REQUEST['epic_no']; ?>&academic=<?php echo $_REQUEST['academic']; ?>&technical=<?php echo $_REQUEST['technical']; ?>&training_name=<?php echo $_REQUEST['training_name']; ?>&ti_details=<?php echo $_REQUEST['ti_details']; ?>&unit_name=<?php echo $_REQUEST['unit_name']; ?>&unit_location=<?php echo $_REQUEST['unit_location']; ?>&unit_cost=<?php echo $_REQUEST['unit_cost']; ?>&unit_loan=<?php echo $_REQUEST['unit_loan']; ?>&unit_subsidy=<?php echo $_REQUEST['unit_subsidy']; ?>&declaration=<?php echo $_REQUEST['declaration']; ?>&bank_name=<?php echo $_REQUEST['bank_name']?>&branch_name=<?php echo $_REQUEST['branch_name']?>&bank_accountno=<?php echo $_REQUEST['bank_accountno']?>&bank_ifsccode=<?php echo $_REQUEST['bank_ifsccode']?>&upload1=<?php echo $_REQUEST['upload1']; ?>&upload2=<?php echo $_REQUEST['upload2']; ?>&upload3=<?php echo $_REQUEST['upload3']; ?>&upload4=<?php echo $_REQUEST['upload4']; ?>&upload5=<?php echo $_REQUEST['upload5']; ?>&upload6=<?php echo $_REQUEST['upload6']; ?>&upload7=<?php echo $_REQUEST['upload7']; ?>&upload10=<?php echo $_REQUEST['upload10']; ?>&signature=<?php echo $_REQUEST['signature']; ?>&sub_date=<?php echo $_REQUEST['sub_date']; ?>&mandal_ren=<?php echo $_REQUEST['mandal_ren']; ?>&village_ren=<?php echo $_REQUEST['village_ren']; ?>&caste=<?php echo $_REQUEST['caste']; ?>&arr=<?php echo $_REQUEST['arr'];?><?php echo $param;?>&training_from_date=<?php echo $_REQUEST['training_from_date']; ?>&training_to_date=<?php echo $_REQUEST['training_to_date']; ?>&disability_type=<?php echo $_REQUEST['disability_type']; ?>&percentage=<?php echo $_REQUEST['percentage']; ?>&mobile=<?php echo $_REQUEST['mobile']; ?>&sad_med=<?php echo $_REQUEST['sad_med']; ?>&email=<?php echo $_REQUEST['email']; ?><?php if(isset($_REQUEST['editform'])){ echo '&editform='.$_REQUEST['editform'];}?>')">Submit</a>
  <a class="btn btn-danger" data-dismiss="modal" >Back</a>
  
	</span>
	
	
<?php }

 ?>