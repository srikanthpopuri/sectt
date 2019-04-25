<?php
include('../include/session.php');
//$session->commonJS();
if(isset($_REQUEST['viewDetails']))
{

	$query01 = $database->query("select * from `complaints_form` where unid = '".$_REQUEST['id']."'");
	$ret_query01 = mysqli_fetch_array($query01);
?>
<br />
<b>Name : </b><span style="color:#00F;"><?php echo $ret_query01['name']; ?></span>
 <br />
 <br />
 <?php 
   $query_cc = $database->query("select * from complaints_comments where unid = '".$_ret_query01['unid']."' order by timestamp asc");
   if(mysqli_num_rows($query_cc)>0){
while($ret_query_cc = mysqli_fetch_array($query_cc)){
?>
<i><b><?php echo date('d-m-Y H:i:s',$ret_query_cc['timestamp']); ?></b></i>
<br />	
<b><?php echo $ret_query_cc['username']; ?> : </b><span style="color:#00F;"><?php echo $ret_query_cc['reasons']; ?></span>
 <br />
 <br />	
 <?php } } ?>    

     <div class="row">
        <div class="form-group col-md-4">
  
   <label for="user">Forward Type</label>
  
   <select class="form-control"  name="forward_type" id="forward_type" onChange="setState('asdf','<?php echo SECURE_PATH;?>grievances_view/ajax.php','mode10=1&forward_type='+$('#forward_type').val()+'')">

   <option value="" style="font-weight:bold">Select</option>

<option value="1"<?php if(isset($_POST['forward_type'])){ if($_POST['forward_type'] == "1"){ echo ' selected="selected"';}}?>>Inter Department Officer</option>
<option value="2"<?php if(isset($_POST['forward_type'])){ if($_POST['forward_type'] == "2"){ echo ' selected="selected"';}}?>>Other Department Officer</option>
   </select>

  </div>

     </div>
     
     <div id="asdf">
     
     </div>

    
    <div class="row">
    <div class="form-group col-md-4">
    <a class="btn btn-info" onClick="changeits1s($(this).val())">Submit</a>

    
    </div>
    
    </div>
    
  <div id="submitdata"></div>

<?php } 



 ?>

<script type="text/javascript">
function changeits1s(){
	
	if($('#forward_type').val().length > 0){
	if($('#forward_type').val() == 1){
		
			if($('#reasons99').val().length > 0 )
	{
setState('submitdata','<?php echo SECURE_PATH;?>grievances_view/process.php','update_own=1&ides=<?php echo $ret_query01['unid'];?>&forward_type='+$('#forward_type').val()+'&reasons='+$('#reasons99').val()+'&forward_to='+$('#forward_to').val()+'');
		
	}else{
		
		alert('Please enter all fields..!');	
	
	}
	}
	
	else if($('#forward_type').val() == 2)
	{
			if($('#other_reasons').val().length > 0 && $('#department_name').val().length > 0 )
	{
		setState('submitdata','<?php echo SECURE_PATH;?>grievances_view/process.php','update_other=1&ides=<?php echo $ret_query01['unid'];?>&forward_type='+$('#forward_type').val()+'&department_name='+$('#department_name').val()+'&other_reasons='+$('#other_reasons').val()+'&forward_to='+$('#forward_to').val()+'');
		
	}else{
		
		alert('Please enter all fields..!');	
	
	}
		
	}
	}else{
		
				alert('Please Select Forward to..!');	

		
	}
	
	
}



function isNumber(evt,ref,len) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
   if(charCode == 8 || charCode == 9 ){
	  return true;	
	}
	
	
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }
	else if(ref.val().length >= len){
	    return false;
	}
    return true;
}

</script>

  <script type="text/javascript" language="javascript">
          $( ".datePicker1" ).datepicker({
           changeMonth: true,
           changeYear: true,
           dateFormat: "d-m-yy",
           yearRange: "1920:2025",
           maxDate: 0
         });
       </script>