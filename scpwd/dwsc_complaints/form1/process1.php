<?php
include('../include/session.php');

?>
<style>
th {
	color:#000;
	width:350px;

	 
}
</style>

<?php

if(isset($_REQUEST['viewDetails']))
{ 

$query02 = $database->query("select uid,district from global_districts where uid  = '".$_REQUEST['district']."'");
	 $ret_query02 =mysqli_fetch_array($query02);
	 
	 
	 ?>
    <table class="table table-striped table-bordered table-condensed table-hover" style="padding-bottom:15px;">
        <tr>
            <th>Registered Date</th>
            <td><?php echo $_REQUEST['date'];?></td>
        </tr>
<tr>
    <th>District</th>
    <td><?php echo ucwords($database->get_name('global_districts','uid',$_REQUEST['district'],'district'));?></td>
</tr>


    </table>
     
     
     

	<span style="color:#F0C;"><b><i>Details:</i></b></span>

<table class="table table-striped table-bordered table-condensed table-hover" style="padding-bottom:15px;">

<tr>
<th >Name of the Applicant</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['name']); ?></td>

 </tr>
<tr>
<th >Age</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['age']); ?></td>  

 </tr>

 
 <tr>
<th >Gender</th>

   <td style="word-break: break-all;text-align: justify;"><?php
       if($_REQUEST['sex']=='0'){
           echo 'Female';
       }else if($_REQUEST['sex']=='1'){
           echo 'Male';
       }else if($_REQUEST['sex']=='2'){
           echo 'Trans Gender';
       }
       ?></td>

 </tr>
 
 <tr>
<th >Address for Communication (Permanent)</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['perm_address']); ?></td>

 </tr>
 
  <tr>
<th >Address for Communication (Correspondence)</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['correspondence_address']); ?></td>

 </tr>
  <tr>
<th >Mobile</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['contact_no']); ?></td>
 </tr>
 
 <tr>
<th >Type of Disability</th>
     <td style="word-break: break-all;text-align: justify;"><?php echo $database->get_name('disabilities','id',$_REQUEST['disability_type'],'disability')?></td>

 </tr>
 
  <tr>
        <th>Disability Certificate</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo $_REQUEST['disability_certificate_no']; ?></td>
    </tr>
 
 <tr>
<th >Percentage of Disability</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['disability_percentage']); ?></td>

 </tr>

 <tr>
    <th>Disability Certificate Proof</th>
    <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload1']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload1'];?>" target="_blank">View</a></td></tr>

<tr>
<th >Issuing Authority</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['issuing_authority']); ?></td>

 </tr>
 
 <tr>
<th >Valid Upto</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['valid_upto']); ?></td>

 </tr>
<tr>
<th >Complaint Description</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['complaint_description']); ?></td>

 </tr>
 
 
  <?php $myArray = explode(',', $_REQUEST['upload8']);

if(count($myArray)==1){
	
?>

	<tr>
    <th>Supplementary Attachments</th>
    <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $_REQUEST['upload8']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload8'];?>" target="_blank">View</a></td></tr>


<?php }
else if(count($myArray)>=1){
	?>

				<?php for($i=0;$i<count($myArray);$i++){


					?>
	<tr>
    <td>Supplementary Attachments <?php echo $i+1;?></td>
    <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $myArray[$i]; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$myArray[$i];?>" target="_blank">View</a></td></tr>

						<?php
					
				} ?>


	<?php
}else { ?>    <td> No Content Uploaded   </td><?php } 

?>
<tr>
<th >Respondent Name</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['respondent_name']); ?></td>

 </tr>
 
 <tr>
<th >Respondent Address</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['respondent_address']); ?></td>

 </tr>
 
 </table>
 
    <br/>

	<span style="color:#F0C;"><b><i>Submit / Back</i></b></span>



   <span style="padding-left:275px;">  
<a class="btn btn-info" data-dismiss="modal"  onClick="setState('adminForm','<?php echo SECURE_PATH;?>form1/process.php','validateForm=1&district=<?php echo $_REQUEST['district']?>&name=<?php echo $_REQUEST['name']?>&age=<?php echo $_REQUEST['age']?>&sex=<?php echo $_REQUEST['sex']?>&perm_address=<?php echo $_REQUEST['perm_address']?>&correspondence_address=<?php echo $_REQUEST['correspondence_address']?>&contact_no=<?php echo $_REQUEST['contact_no']?>&disability_type=<?php echo $_REQUEST['disability_type']?>&disability_certificate_no=<?php echo $_REQUEST['disability_certificate_no']?>&disability_percentage=<?php echo $_REQUEST['disability_percentage']?>&disability_proof=<?php echo $_REQUEST['upload1']?>&issuing_authority=<?php echo $_REQUEST['issuing_authority']?>&valid_upto=<?php echo $_REQUEST['valid_upto']?>&complaint_description=<?php echo $_REQUEST['complaint_description']?>&supplementary_proof=<?php echo $_REQUEST['upload8']?>&respondent_name=<?php echo $_REQUEST['respondent_name']?>&respondent_address=<?php echo $_REQUEST['respondent_address']?>&date=<?php echo $_REQUEST['date']?><?php if(isset($_REQUEST['editform'])){ echo '&editform='.$_REQUEST['editform'];}?>')">Submit</a>
  <a class="btn btn-danger" data-dismiss="modal" >Back</a>
  
	</span>
	
	
<?php }

 ?>