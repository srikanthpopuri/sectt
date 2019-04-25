<?php
include('../include/session.php');
//$session->commonJS();
if(isset($_REQUEST['viewDetails']))
{
	$query01 = $database->query("select * from `complaints_form` where unid = '".$_REQUEST['id']."'");
	$ret_query01 = mysqli_fetch_array($query01);
$query_cc = $database->query("select * from `complaints_comments` where unid = '".$_REQUEST['id']."' order by timestamp asc");
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
       

         <div class="row">

     <div class="form-group col-md-4" >
      <label for="reasons">Reasons</label>
      <textarea name="reasons" id="reasons99" class="form-control"><?php if(isset($_POST['reasons'])){echo $_POST['reasons'];}?></textarea>
      <span class="error"><?php if(isset($_SESSION['error']['reasons'])){ echo $_SESSION['error']['reasons'];}?></span>
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
	
		
			if($('#reasons99').val().length > 0 )
	{
setState('submitdata','<?php echo SECURE_PATH;?>grievances_dwo_view/process.php','dwo_update=1&ides=<?php echo $ret_query01['unid'];?>&reasons='+$('#reasons99').val()+'');
		
	}else{
		
		alert('Please enter all fields..!');	
	
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