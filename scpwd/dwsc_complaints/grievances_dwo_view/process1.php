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

$query01 = $database->query("select * from complaints_form where unid = '".$_REQUEST['id']."'");
$ret_query01 = mysqli_fetch_array($query01);

$query_cc = $database->query("select * from complaints_comments where unid = '".$_REQUEST['id']."' order by timestamp asc");
while($ret_query_cc = mysqli_fetch_array($query_cc)){
?>
<i><b><?php echo date('d-m-Y H:i:s',$ret_query_cc['timestamp']); ?></b></i>
<br />	
<b><?php echo $ret_query_cc['username']; ?> : </b><span style="color:#00F;"><?php echo $ret_query_cc['reasons']; ?></span>
 <br />
 <br />	
	
<?php	
}
?>



<?php

$query02 = $database->query("select uid,district from global_districts where uid  = '".$ret_query01['district']."'");
	 $ret_query02 =mysqli_fetch_array($query02);
	 	 $_REQUEST = array_merge($_REQUEST,$ret_query01);

	 
	 
	 ?>
    <table class="table table-striped table-bordered table-condensed table-hover" style="padding-bottom:15px;">

  
        <tr>
            <th>District</th>
            <td><?php echo ucwords($database->get_name('global_districts','uid',$_REQUEST['district'],'district'));?></td>
        </tr>
        <tr>
        <th >Registered Date</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['date']); ?></td>

    </tr>
     
</table> 
     
     
     


<table class="table table-striped table-bordered table-condensed table-hover" style="padding-bottom:15px;">

<tr>


    <tr>
        <th >Name</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['name']); ?></td>

    </tr>
    <tr>
        <th >Age</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['age']); ?></td>

    </tr>
    <?php
				 $ab='';
				 if($_REQUEST['sex'] == 1){
					$ab =  "Male" ;
				 }elseif($_REQUEST['sex'] == 0){
					$ab =  "Female" ; 
					
				 }
				 else{
					$ab = 'Not Selected'; 
				 }
				 
				 ?>
    <tr>
        <th >Sex</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo $ab; ?></td>

    </tr>
    <tr>
        <th >Permanent Address</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['perm_address']); ?></td>

    </tr>
    <tr>
        <th >Correspondence Address</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['correspondence_address']); ?></td>

    </tr>
    
    <tr>
        <th >Contact No</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['contact_no']); ?></td>

    </tr>


    <tr >
        <th >Type of Disability </th>
        <td style="word-break: break-all;text-align: justify;"><?php echo $database->get_name('disabilities','id',$_REQUEST['disability_type'],'disability')?></td>

    </tr>
    

    
    <tr>
        <th >Disability Certificate No </th>
        <td style="word-break: break-all;text-align: justify;"><?php echo $_REQUEST['disability_certificate_no']; ?></td>

    </tr>

    <tr>
        <th >Percentage of Disability</th>
        <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($_REQUEST['disability_percentage']); ?></td>
    </tr>

    

 <tr><th> Disability Proof </th>
 <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['disability_proof']; ?>" style="width:100px; height:50px;" alt="No Image"/></td>
 </tr>
 <tr>
 <th >Issuing Authority</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['issuing_authority']); ?></td>  

 </tr>
 <tr>
<th >Valid Upto</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['valid_upto']); ?></td>  

 </tr>
 
 <tr>
<th >Complaint Description</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['complaint_description']); ?></td>  

 </tr>
 <?php $myArray = explode(',', $ret_query01['supplementary_proof']);

if(count($myArray)==1){
	
?>

	<tr>
    <th>Supplementary Attachments</th>
    <td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['supplementary_proof']; ?>" style="width:100px; height:50px;" alt="No Image"/>&nbsp;&nbsp;<a href="<?php echo SECURE_PATH.'files/'.$_REQUEST['upload8'];?>" target="_blank">View</a></td></tr>


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
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['respondent_name']); ?></td>  

 </tr>
 <tr>
<th >Respondent Address</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['respondent_address']); ?></td>  

 </tr>
  
     


   
 </table>
    
	
<?php }

 ?>