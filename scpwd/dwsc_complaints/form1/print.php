<?php
include('../include/session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alumini-form</title>
	<link rel="stylesheet" type="text/css" href="inner-live.css">
</head>
<body>
<?php
if(isset($_REQUEST['id']))
{
  $r=$database->query("select * from form1 where id='".$_REQUEST['id']."'");
$row=mysqli_fetch_array($r);
}
?>
	<div class="main_form">
	  <div class="container">
	  	<h1>APPLICATION FOR HANDICAPPED INSTRUMENTS</h1>
		<form>
			<table class="district_form">
				<tr>
					<td>
						<label> District</label><br>
<input type="text" name="" value="<?php echo ucwords($database->get_name('global_districts','uid',$row['district'],'district'));?>">


											</td>
					<td>
						<label>Applicant Name (Include Surname)</label><br>
						<input type="text" name="" value="<?php echo $row['full_name'];?>">
					</td>
					<td>
						<label>Applicant Father's/Husband Name</label><br>
						<input type="text" name="" value="<?php echo $row['father_name'];?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Date Of Birth</label><br>
						<input type="text" name="" value="<?php echo $row['dob'];?>">
					</td>
					<td>
						<label>Select Gender</label><br>
						<input type="text" name="" value="<?php if($row['gender']==0)  { echo 'Female'; } else { echo 'Male'; }?>"/>					</td>
					<td>
						<label>Mobile Number</label><br>
						<input type="text" name="" value="<?php echo $row['mobile'];?>">
					</td>
				</tr>
				<tr>
					<td>
						<label>Community</label><br>
<?php

?>
											</td>
					<td>
						<label>Present Occupation</label><br>
						<input type="text" name="">
					</td>
					<td>
						<label>Studying Class/School Name/Course</label><br>
						<input type="text" name="">
					</td>
				</tr>
				<tr>
					<td>
						<label>Education,Training Courses</label><br>
						<input type="text" name="">
					</td>
					<td>
						<label>Annual Income</label><br>
						<input type="text" name="">
					</td>
					<td>
						<label>Marital Status</label><br>
						<select>
							<option>select</option>
							<option>ADILABAD</option>
							<option>ADILABAD</option>
							<option>ADILABAD</option>
							<option>ADILABAD</option>	
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label>Address For Communication</label><br>
						<textarea></textarea>
					</td>
					<td>
						<label>Institution Address For Communication</label><br>
						<textarea></textarea>
					</td>
					<td>
						<label>If Applicant Resides In Hostels, Communication Address</label><br>
						<textarea></textarea>
					</td>
				</tr>
			</table>
			<h4 class="disability">Disability Details</h4>
			<table class="district_form">
				<tr>
					<td>
						<label>Type Of Disability</label><br>
						<select>
							<option>select</option>
							<option>ADILABAD</option>
							<option>ADILABAD</option>
							<option>ADILABAD</option>
							<option>ADILABAD</option>	
						</select>
					</td>
					<td>
						<label>Disability Percentage</label><br>
						<input type="text" name="">
					</td>
					<td>
						<label>SADAREM Issued Disability Certficate No</label><br>
						<input type="text" name="">
					</td>
				</tr>
			</table>
			<h4 class="disability">Other Details</h4>
			<table class="district_form">
				<tr>
					<td>
						<label>Ration Card No</label><br>
						<input type="text" name="">
					</td>
					<td>
						<label>Aadhar No</label><br>
						<input type="text" name="">
					</td>
				</tr>
			</table>
			<h4 class="disability">Equipment Details</h4>
			<h5 class="disability1">Required Equipments</h5>
			<table class="district_form1">
				<tr>
					<td>
						<input type="checkbox" name="vehicle" value="Bike"><label>Retrofitted Motorized Vehicle</label>
					</td>
					<td>
						<input type="checkbox" name="vehicle" value="Bike"><label>Laptop</label>
					</td>
					<td>
						<input type="checkbox" name="vehicle" value="Bike"><label>Mp3 Player</label>
					</td>
					<td>
						<input type="checkbox" name="vehicle" value="Bike"><label>DC Player</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" name="vehicle" value="Bike"><label>Ear Device</label>
					</td>
					<td>
						<input type="checkbox" name="vehicle" value="Bike"><label>Battery Wheel Chair</label>
					</td>
					<td>
						<input type="checkbox" name="vehicle" value="Bike"><label>Smart Phone</label>
					</td>
				</tr>
			</table>
			<table class="district_form2">
				<tr>
					<td>
						<label>If You Have Taken Any Device Before, Please Enter The Taken Device Details Along With Date</label><br>
						<textarea></textarea>
					</td>
				</tr>
			</table>
			<h4 class="disability">Declaration</h4>
			<p class="terms">I <input class="me_details" type="text" name=""> need the above selected equipment, here I am attaching the photo copy of required documents along with my personal information.If in any case , the information submitted is proved to be wrong at any time, Iam liable for prosecution</p>
			<label class="municipal_label">Place:</label>
			<input type="text" name="" class="municipal_input1"><br><br>
			<label class="municipal_label">Date:</label>
			<input type="text" name="" class="municipal_input1">
			<h5 class="municipal_hedding">Signature of the Candidate</h5>
		</form>
	  </div>
	</div>
</body>
</html>