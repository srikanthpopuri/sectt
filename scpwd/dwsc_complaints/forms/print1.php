<?php
include('../include/session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grievances</title>
	<link rel="stylesheet" type="text/css" href="inner-live.css">
</head>
<body>
<?php
if(isset($_REQUEST['id']))
{
  $r=$database->query("select * from complaints_form where id='".$_REQUEST['id']."'");
$row=mysqli_fetch_array($r);
	$_REQUEST = array_merge($_REQUEST,$row);
}
?>
	<div class="main_form">
	  <div class="container">
	  	<h1>Register Your Grievance</h1>
		<form>
			<table class="district_form app-date">
				<tr>
					<td>
						<label>Date of Application</label><br>
						<input type="text" name="" value="<?php echo $row['date'];?>">
					</td>

				</tr>

				</table>

			<table class="district_form">

				<tr>
					<td>
						<label>District</label><br>
					<input type="text" name="" value="<?php echo $district=ucwords($database->get_name('global_districts','uid',$row['district'],'district'));?>">
					</td>

					<td>
                    </td>
                    <td>
                    </td>

				</tr>
			</table>

			
            <table class="district_form">
            <tr>
					<td>
						<label>Name of the Applicant (Include Surname)</label><br>
						<input type="text" name="" value="<?php echo $row['name'];?>">
					</td>
					<td>
						<label>Age</label><br>
						<input type="text" name="" value="<?php echo $row['age'];?>">
					</td>
                    <td>
						<label>Select Gender</label><br>
						<input type="text" name="" value="<?php if($row['sex']==0)  { echo 'Female'; } elseif($row['sex']==1) { echo 'Male'; }elseif($row['gender']==2) { echo 'Trans Gender'; } ?>"/>					</td>
					<td>
				</tr>
				<tr>
					<td>
						<label>Address for Communication (Permanent)</label><br>
						<input type="text" name="" value="<?php echo $row['perm_address'];?>">
					</td>
					<td>
						<label>Address for Communication (Correspondence)</label><br>
						<input type="text" name="" value="<?php echo $row['correspondence_address'];?>">
					</td>
                    
                    <td>
						<label>Mobile</label><br>
						<input type="text" name="" value="<?php echo $row['contact_no'];?>">
					</td>
                    
				</tr>
				


			</table>
			<table class="district_form">
				<tr>
					<td>
						<label>Type of Disability</label><br>
						<input type="text" name="" value="<?php echo $database->get_name('disabilities','id',$_REQUEST['disability_type'],'disability')?>"/>

					</td>
                    <td>
						<label>Disability Certificate Number</label>
						<input type="text" name="" value="<?php echo $row['disability_certificate_no'];?>">
			
						</td>
					<td>
						<label>Percentage of Disability</label><br>
						<input type="text" name="" value="<?php echo $row['disability_percentage'];?>">
					</td>
					
				</tr>
			</table>
			<table class="district_form">
				<tr>
					<td>
						<label>Disability Certificate Proof</label><br>
                        <?php
						if(strlen($row['disability_proof'])>0)
						{
							?>
													<input type="text" name="" disabled value="Enclosed">

						<?php }else{
							?>
																			<input type="text" name="" disabled value="Not Enclosed">
	
						<?php }
						?>
                        
					</td>
					<td>
						<label>Issuing Authority</label><br>
						<input type="text" name="" value="<?php echo $row['issuing_authority'];?>">
					</td>
                    <td>
						<label>Valid Upto</label><br>
						<input type="text" name="" value="<?php echo $row['valid_upto'];?>">
					</td>
				</tr>
                </table>
                 <table class="district_form">
                
                <tr>
					
                    <td>
						<label>Complaint Description</label><br>
						<input type="text" name="" value="<?php echo $row['complaint_description'];?>">
					</td>
				</tr>
                </table>
                 <table class="district_form">
                
                <tr>
					<td>
						<label>Supplementary Attachments</label><br>
                        <?php
						if(strlen($row['supplementary_proof'])>0)
						{
							?>
													<input type="text" name="" disabled value="Enclosed">

						<?php }else{
							?>
																			<input type="text" name="" disabled value="Not Enclosed">
	
						<?php }
						?>
                        
					</td>
					<td>
						<label>Respondent Name</label><br>
						<input type="text" name="" value="<?php echo $row['respondent_name'];?>">
					</td>
                    </tr>
                    </table>
                     <table class="district_form">
                     <tr>
                    <td>
						<label>Respondent Address</label><br>
						<input type="text" name="" value="<?php echo $row['respondent_address'];?>">
					</td>
				</tr>
			</table>
			
		</form>
	  </div>
	</div>
</body>
<script>
	//alert("Please Upload Signed copy & submit one copy at office of the District Welfare officer(DWSC) of women,children,disabled & senior Citizen,<?php echo $district;?>");
	window.print();
</script>
</html>
