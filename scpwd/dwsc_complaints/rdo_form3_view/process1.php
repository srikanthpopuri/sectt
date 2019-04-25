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

$query01 = $database->query("select * from subsidy_pwd where id = '".$_REQUEST['id']."'");
$ret_query01 = mysqli_fetch_array($query01);

$query02 = $database->query("select uid,district from global_districts where uid  = '".$ret_query01['district']."'");
	 $ret_query02 =mysqli_fetch_array($query02);
	 	 $_REQUEST = array_merge($_REQUEST,$ret_query01);

	 
	 
	 ?>
    <table class="table table-striped table-bordered table-condensed table-hover" style="padding-bottom:15px;">

        <tr>
            <th>Applied Date</th>
            <td><?php echo date('d-m-Y',$_REQUEST['sub_date']);?></td>
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
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['surname']); ?></td>  

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
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['father_name']); ?></td>  

 </tr>
 <th >Sex</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['sex']); ?></td>  

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
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['native_place']); ?></td>  

 </tr>
  
 <tr>
<th >Present Place of Living and Address</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['present_place']); ?></td>  

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
  if(strlen($ret_query01['aadhar_num'])>0)
  { ?>
 <tr>
<th >Aadhar Card Number</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['aadhar_num']); ?></td>  

 </tr>
 <?php }  ?>
  
 <?php
  if(strlen($ret_query01['ration_num'])>0)
  { ?>
 <tr>
<th >Ration Card Number</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['ration_num']); ?></td>  

 </tr>
 <?php }  ?>
  <?php
  if(strlen($ret_query01['epic_no'])>0)
  { ?>
 <tr>
<th >Voter Id</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['epic_no']); ?></td>  

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
 if(strlen($ret_query01['training_name'])>0)
 {  ?>
 
 <span style="color:#F0C;"><b><i>Details of Trainings taken:</i></b></span>

<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

 
 <tr>
<th >Name of the Training</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['training_name']); ?></td>  

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
<th >Name and Address of Training Institue</th> 
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['ti_details']); ?></td>  

 </tr>
 
 </table>
 
 <?php }?>

<span style="color:#F0C;"><b><i>Details of Experience:</i></b></span>

    <?php
        $q1 = $database->query("select * from work_experience WHERE form_id='".$_REQUEST['appli_no']."'");
        while ($data = mysqli_fetch_array($q1)){
            ?>
            <table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">


                <tr>
                    <th >Name of Company</th>
                    <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($data['comp_name']); ?></td>
                </tr>


                <tr>
                    <th >Company Contact Number</th>
                    <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($data['comp_mobile']); ?></td>
                </tr>

                <tr>
                    <th >From Date</th>
                    <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($data['from_date']); ?></td>
                </tr>

                <tr>
                    <th >To Date</th>
                    <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($data['to_date']); ?></td>
                </tr>

                <tr>
                    <th >Company Email</th>
                    <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($data['comp_email']); ?></td>
                </tr>

            </table>

            <?php
        }
    ?>


 
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
<th>Cost of the Unit/Project</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['unit_cost']); ?></td>  


</tr><tr>
<th>Bank Loan (Rs)</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['unit_loan']); ?></td>  


</tr><tr>
<th>Subsidy (Rs)</th>
   <td style="word-break: break-all;text-align: justify;"><?php echo ucwords($ret_query01['unit_subsidy']); ?></td>  


</tr>

 </table>
 
<span style="color:#F0C;"><b><i>Enclosures:</i></b></span>
<table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">

<?php 

if(strlen($ret_query01['upload1'])>0){
	$type1 = explode('.', $ret_query01['upload1']);
	if($type1[1]=='pdf' || $type1[1]=='doc' || $type1[1]=='docx' || $type1[1]=='PDF' ||$type1[1]=='DOC' || $type1[1]=='DOCX' || $type1[1]=='pdf'){
		?>
	<tr><td>Disability Certificate issued by District Medical Board (OR) SADAREM (as defined in GOMs.31,dt.01/12/2009 of WD,CW&DW (DW) Dept.)   </td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload1'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Disability Certificate issued by District Medical Board (OR) SADAREM (as defined in GOMs.31,dt.01/12/2009 of WD,CW&DW (DW) Dept.)   </td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload1']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}

}else{ ?>
	
	
	<tr><td>Disability Certificate issued by District Medical Board (OR) SADAREM (as defined in GOMs.31,dt.01/12/2009 of WD,CW&DW (DW) Dept.) </td><td> No Content</td></tr>
	
<?php }
?>

<?php 
if(strlen($ret_query01['upload2'])>0){
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


}else{ ?>

<tr><td>Recent Income Certificate issued by Tahsildar</td><td>No Content</td></tr>

<?php } 

if(strlen($ret_query01['upload3'])>0){

	$type3 = explode('.', $ret_query01['upload3']);

	if($type3[1]=='pdf' || $type3[1]=='doc' || $type3[1]=='docx' || $type3[1]=='PDF' ||$type3[1]=='DOC' || $type3[1]=='DOCX' || $type3[1]=='pdf'){
		?>
	<tr><td>Proof of Residence (Aadhar Card, Voter Id, Residential Certificate issued by Concerned Tahsidhar)</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload3'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Proof of Residence (Aadhar Card, Voter Id, Residential Certificate issued by Concerned Tahsidhar)</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload3']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}

}else{?>
	
	<tr><td>Proof of Residence (Aadhar Card, Voter Id, Residential Certificate issued by Concerned Tahsidhar)</td><td>No Content</td></tr>
	
<?php }

if(strlen($ret_query01['upload4'])>0){
	$type4 = explode('.', $ret_query01['upload4']);

	if($type4[1]=='pdf' || $type4[1]=='doc' || $type4[1]=='docx' || $type4[1]=='PDF' ||$type4[1]=='DOC' || $type4[1]=='DOCX' || $type4[1]=='pdf'){
		?>
	<tr><td>Age Cerificate for Proof of Age</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload4'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Age Cerificate for Proof of Age</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload4']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	}

}else {?>
	<tr><td>Age Cerificate for Proof of Age</td><td>No Content</td></tr>
	
<?php } 


if(strlen($ret_query01['upload5'])>0){
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

} else { ?>
	
	<tr><td>Caste Certificate</td><td>No Content</td></tr>
<?php }

if(strlen($ret_query01['upload6'])>0)
{

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

}else{ ?>
	<tr><td>Certificates of Educational Qualifications, Trainings etc, if any</td><td>No Content</td></tr>
	
<?php }
?>

	<tr><td>Latest Passport Photo </td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload7']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr>

<?php 
if(strlen($ret_query01['upload10'])>0)
{
	$type10 = explode('.', $ret_query01['upload10']);

	if($type10[1]=='pdf' || $type10[1]=='doc' || $type10[1]=='docx' || $type10[1]=='PDF' ||$type10[1]=='DOC' || $type10[1]=='DOCX' || $type10[1]=='pdf'){
		?>
	<tr><td>Legal Guardian Certificate,in case of Intellectual Disability.</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['upload10'];?>" target="_blank">Link</a></td></tr>
		<?php
	}else{
		?>
	<tr><td>Legal Guardian Certificate,in case of Intellectual Disability.</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['upload10']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


		><?php
	} } else { ?>   No Content           <?php   }
?>

    <?php
    if(strlen($ret_query01['signature'])>0)
    {
        $type10 = explode('.', $ret_query01['signature']);

        if($type10[1]=='pdf' || $type10[1]=='doc' || $type10[1]=='docx' || $type10[1]=='PDF' ||$type10[1]=='DOC' || $type10[1]=='DOCX' || $type10[1]=='pdf'){
            ?>
            <tr><td>Uploaded Signature</td><td><a href="<?php echo SECURE_PATH.'files/'.$ret_query01['signature'];?>" target="_blank">Link</a></td></tr>
            <?php
        }else{
            ?>
            <tr><td>Uploaded Signature</td><td><img  src="<?php echo SECURE_PATH; ?>files/<?php echo $ret_query01['signature']; ?>" style="width:100px; height:50px;" alt="No Image"/></td></tr


            ><?php
        } } else { ?>   No Content           <?php   }
    ?>

    <?php if($ret_query01['rdo_status']=='5'){ ?>
        
            <tr>
                <th>Upload</th>
                <td>
             <div class="row">
            <div class="form-group col-md-12" >
                <label for="upload5a">MRO / VRO Verfied Document Upload <span style="color:#F00;">*</span></label>

                <div id="file-uploader5a" >
                    <noscript>
                        <p>Please enable JavaScript to use file uploader.</p>
                        <!-- or put a simple form for upload here -->
                    </noscript>

                </div>
                <script>

                    function createUploader(){

                        var uploader = new qq.FileUploader({
                            element: document.getElementById('file-uploader5a'),
                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload5a&upload_type=single&filetype=file',
                            debug: true,
                            multiple:false
                        });
                    }

                    createUploader();

                    // in your app create uploader as soon as the DOM is ready
                    // don't wait for the window to load

                </script>

                <input type="hidden" name="upload5a" id="upload5a" value="<?php if(isset($_POST['upload5a'])){ echo $_POST['upload5a'];}?>" />

                <br  />
                <?php
                if(isset($_POST['upload5a'])  && $_POST['upload5a']!=''){

                    ?>
                    <table><tr>
                            <td><a href="<?php echo SECURE_PATH.'files/'.$_POST['upload5a'];?>" target="_blank">View Uploaded Content</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <span class="error"><?php if(isset($_SESSION['error']['upload5a'])){ echo $_SESSION['error']['upload5a'];}?></span>
            </div>

        </div>
                   
                </td>
            </tr>
            
            <tr>
            <td>Comments <span style="color:#F00;">*</span></td>
            <td>
            <textarea type="text" class="form-control" id="comments_ar" name="comments_ar" ><?php if(isset($_POST['comments_ar'])){echo $_POST['comments_ar'];}?></textarea>
            <span class="error"><?php if(isset($_SESSION['error']['comments_ar'])){ echo $_SESSION['error']['comments_ar'];}?></span>
        
        
    </div></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <a class="btn btn-small btn-block btn-success"  data-dismiss="modal" style="width:125px;"  onClick="if($('#comments_ar').val().length > 0 && $('#upload5a').val().length > 0 ){setState('adminForm','<?php echo SECURE_PATH;?>rdo_form3_view/process.php','update_enable=1&id=<?php echo $ret_query01['id'];?>&username=<?php echo $session->username;?>&comments_ar='+$('#comments_ar').val()+'&upload5a='+$('#upload5a').val()+'')}else{alert('Please enter Mandatory fields..!')}" target="_blank"><i class="icon-edit"></i> Approve</a>
                    <a class="btn btn-small btn-block btn-danger" data-dismiss="modal" style="width:125px;"  onClick="if($('#comments_ar').val().length > 0 && $('#upload5a').val().length > 0 ){setState('adminForm','<?php echo SECURE_PATH;?>rdo_form3_view/process.php','update_disable=1&id=<?php echo $ret_query01['id'];?>&username=<?php echo $session->username;?>&comments_ar='+$('#comments_ar').val()+'&upload5a='+$('#upload5a').val()+'')}else{alert('Please enter Mandatory fields..!')}"><i class="icon-edit"></i> Reject</a>
                </td>
            </tr>
        </tr>
        <?php
    }else{
        ?>
        <?php
			$query_rdo_comments = $database->query("select rdo_comments from subsidy_comments where subsidy_pwd_id = '".$_REQUEST['id']."'");
			if(mysqli_num_rows($query_rdo_comments)>0){
				?>
                <tr>
            <td>Comment History</td>
                <?php
			while($ret_query_rdo=mysqli_fetch_array($query_rdo_comments)){
			?>
            <td>
            <?php echo $ret_query_rdo['rdo_comments']; ?>
    </td>
            <?php	
			} ?>
			            </tr>
<?php
			}
			?>
        <tr>
            <th>Status of Application</th>
            <td>
                <?php if($ret_query01['status']=='6'){echo 'Approved';}
                else if($ret_query01['status']=='7'){echo 'Rejected';}
                ?>
            </td>
        </tr>
        <?php
    }
    ?>

 </table>
    
	
<?php }

 ?>