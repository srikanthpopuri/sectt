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

if(isset($ret_query01['id']))
{ 
$query01 = $database->query("select * from subsidy_pwd where id = '".$_REQUEST['id']."'");
$ret_query01 = mysqli_fetch_array($query01);

$query02 = $database->query("select uid,district from global_districts where uid  = '".$ret_query01['district']."'");
	 $ret_query02 =mysqli_fetch_array($query02);
	 
	 
	 ?>
    <table class="table table-striped table-bordered table-condensed table-hover" style="padding-bottom:15px;">

<th>District</th>
<td><?php echo $ret_query02['district']; ?></td>
</table> 
     
     
     


<table class="table table-striped table-bordered table-condensed table-hover" style="padding-bottom:15px;">

<tr>
<th >SurName</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['surname']); ?></td>  

 </tr>
<tr>
<th >Nature of Disability & Percentage</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['nature_disability']); ?></td>  

 </tr>
 
 <tr>
<th >Father's Name</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['father_name']); ?></td>  

 </tr>
 
 <tr>
<th >Guardian Name</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['guardian_name']); ?></td>  

 </tr>
 
 <tr>
<th >Date of Birth</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['dob']); ?></td>  

 </tr>
 
 <tr>
<th >Religion and Caste</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['religion_caste']); ?></td>  

 </tr>
 
 <tr>
<th >Maritial Status</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['maritial_status']); ?></td>  

 </tr>
 
 <tr>
<th >Native Place & District</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['native_place']); ?></td>  

 </tr>
  
 <tr>
<th >Present Place of Living and Address</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['present_place']); ?></td>  

 </tr>
  
 <tr>
<th >Occupation</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['occupation']); ?></td>  

 </tr>
  
 <tr>
<th >SADAREM ID No</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['sadarem']); ?></td>  

 </tr>
  
 <?php
  if(strlen($ret_query01['aadhar_num'])>0)
  { ?>
 <tr>
<th >Aadhar Card No</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['aadhar_num']); ?></td>  

 </tr>
 <?php }  ?>
  
 <?php
  if(strlen($ret_query01['ration_num'])>0)
  { ?>
 <tr>
<th >Ration Card No</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['ration_num']); ?></td>  

 </tr>
 <?php }  ?>
  <?php
  if(strlen($ret_query01['epic_no'])>0)
  { ?>
 <tr>
<th >EPIC No</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['epic_no']); ?></td>  

 </tr>
 <?php }  ?>
 </table>
 
 <span style="color:#F0C;"><b><i>Educational Qualifications:</i></b></span>

<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

 
 <tr>
<th >Academic</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['academic']); ?></td>  

 </tr>


 
 <tr>
<th >Technical</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['technical']); ?></td>  

 </tr>
</table>
 <?php
 if(strlen($ret_query01['training_name'])>0)
 {  ?>
 
 <span style="color:#F0C;"><b><i>Details of Trainings taken:</i></b></span>

<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

 
 <tr>
<th >Name of the Training</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['training_name']); ?></td>  

 </tr>
 
  
 <tr>
<th >Year & Duration of Training</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['year_training']); ?></td>  

 </tr>
 <tr>
<th >Name and Address of Training Institue</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['ti_details']); ?></td>  

 </tr>
 
 </table>
 
 <?php }?>
 <?php if(strlen($ret_query01['exp_details']))
 { ?>
<span style="color:#F0C;"><b><i>Details of Experience:</i></b></span>

<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

 
 <tr>
<th >Sl No</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['exp_details']); ?></td>  

 </tr>

</table>
<?php } ?>


<span style="color:#F0C;"><b><i>Contact Phone No's:</i></b></span>

<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">



 
 <tr>
<th >Landline</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['landline']); ?></td>  

 </tr>
 
  
 <tr>
<th >Mobile</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['mobile']); ?></td>  

 </tr>
 
 <?php
 
 if(strlen($ret_query01['email'])>0)
 { ?>
 
 <tr>
<th >Phone</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['email']); ?></td>  

 </tr>
 
 <?php } ?>
 </table>
 
 
<span style="color:#F0C;"><b><i>Details of Self Employement Unit/Project with requirement of financial outlay:</i></b></span>
<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

<tr>
<th>Name of the Unit/Project</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['unit_name']); ?></td>  


</tr>
<tr>
<th>Proposed Location of the Unit/Project</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['unit_location']); ?></td>  


</tr>
<tr>
<th>Unit/Project Cost</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['unit_cost']); ?></td>  


</tr><tr>
<th>Bank Loan</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['unit_loan']); ?></td>  


</tr><tr>
<th>Subsidy</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['unit_subsidy']); ?></td>  


</tr>

 </table>
 
<span style="color:#F0C;"><b><i>Enclosures:</i></b></span>
<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

<?php 

	$type1 = explode('.', $ret_query01['upload1']);
	if($type1[1]=='pdf' || $type1[1]=='doc' || $type1[1]=='docx' || $type1[1]=='PDF' ||$type1[1]=='DOC' || $type1[1]=='DOCX' || $type1[1]=='pdf'){
		?>
	<tr><td>Disability Certificate issued by the District Medical Board through SADAREM</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload1'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Disability Certificate issued by the District Medical Board through SADAREM</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload1']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}


?>

<?php 

	$type2 = explode('.', $ret_query01['upload2']);

	if($type2[1]=='pdf' || $type2[1]=='doc' || $type2[1]=='docx' || $type2[1]=='PDF' ||$type2[1]=='DOC' || $type2[1]=='DOCX' || $type2[1]=='pdf'){
		?>
	<tr><td>Recent Income Certificate issued by Tahsildar</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload2'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Recent Income Certificate issued by Tahsildar</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload2']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}


?>
<?php 

	$type3 = explode('.', $ret_query01['upload3']);

	if($type3[1]=='pdf' || $type3[1]=='doc' || $type3[1]=='docx' || $type3[1]=='PDF' ||$type3[1]=='DOC' || $type3[1]=='DOCX' || $type3[1]=='pdf'){
		?>
	<tr><td>Residential Certificate issued by Tahsildar/ Residential Proof (Ration Card / Aadhar Card / EPIC)</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload3'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Residential Certificate issued by Tahsildar/ Residential Proof (Ration Card / Aadhar Card / EPIC)</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload3']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}


?>
<?php 

	$type4 = explode('.', $ret_query01['upload4']);

	if($type4[1]=='pdf' || $type4[1]=='doc' || $type4[1]=='docx' || $type4[1]=='PDF' ||$type4[1]=='DOC' || $type4[1]=='DOCX' || $type4[1]=='pdf'){
		?>
	<tr><td>Age Proof Cerificate</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload4'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Age Proof Cerificate</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload4']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}


?>
<?php 

	$type5 = explode('.', $ret_query01['upload5']);

	if($type5[1]=='pdf' || $type5[1]=='doc' || $type5[1]=='docx' || $type5[1]=='PDF' ||$type5[1]=='DOC' || $type5[1]=='DOCX' || $type5[1]=='pdf'){
		?>
	<tr><td>Caste Certificate</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload5'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Caste Certificate</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload5']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}


?>
<?php 

	$type6 = explode('.', $ret_query01['upload6']);

	if($type6[1]=='pdf' || $type6[1]=='doc' || $type6[1]=='docx' || $type6[1]=='PDF' ||$type6[1]=='DOC' || $type6[1]=='DOCX' || $type6[1]=='pdf'){
		?>
	<tr><td>Certificates of Educational Qualifications, Trainings etc, if any</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload6'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Certificates of Educational Qualifications, Trainings etc, if any</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload6']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}


?>

	<tr><td>Latest Passport Photo 1</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload7']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr>



	<tr><td>Latest Passport Photo 2</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload8']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr>
    
    <tr><td>Latest Passport Photo 3</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload9']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr>

<?php 

	$type10 = explode('.', $ret_query01['upload10']);

	if($type10[1]=='pdf' || $type10[1]=='doc' || $type10[1]=='docx' || $type10[1]=='PDF' ||$type10[1]=='DOC' || $type10[1]=='DOCX' || $type10[1]=='pdf'){
		?>
	<tr><td>Legal Guardian Certificate, if any.</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload10'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Legal Guardian Certificate, if any.</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload10']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}


?>
 </table>
  
 

	
	
<?php }

 ?>