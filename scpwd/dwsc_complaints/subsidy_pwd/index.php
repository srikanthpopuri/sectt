<?php
include('../include/session.php');

if(!$session->logged_in){
?>
<script type="text/javascript">
window.location = '<?php echo SECURE_PATH?>';
</script>

<?php
}
else{
    unset($_SESSION['image']);
?>
<section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
             
        



<section class="panel" >
      
                          <header class="panel-heading">

                           <b style="color:#C36;">SANCTION OF SUBSIDY UNDER SPECIAL ECONOMIC REHABILITATION SCHEME</b><br />
                              <b style="color:#C36;">FOR PERSON WITH DISABILITIES</b>
                        </header>
                          <div class="panel-body">


<div style="display:none">
<div id="media"></div>
</div>
<div id="adminForm" >

<script type="text/javascript">

setStateGet('adminForm','<?php echo SECURE_PATH;?>subsidy_pwd/process.php','addForm=1');

</script>

</div>
 
             
             
              
 <div id="formLoader">
<img src="<?php echo SECURE_PATH;?>theme/img/loader.gif" alt="Loading..."/>
</div>  
              
              
     <!--Details Modal-->

<div class="modal fade" id="messageDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <b style="color:#FFF;">SANCTION OF SUBSIDY UNDER ECONOMIC REHABILITATION SCHEME</b>
        <h4 class="modal-title" id="myModalLabel"> <b style="color:#FFF;">FOR PERSON WITH DISABILITIES</b>
</h4>
      </div>
      <div class="modal-body" id="viewDetails" >
       
      </div>
      <div class="modal-footer" style="display:none;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Details MOdal-->     
              
                   
      <section id="unseen">
<div id="adminTable" style="display:none;">

<script type="text/javascript">
setStateGet('adminTable','<?php echo SECURE_PATH;?>subsidy_pwd/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>

</div>
</section>
                         
              
         
              </div>
              
              <!-- page end-->
</section>
</div>
</div>
</section>

<script type="text/javascript">
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

function isNumber1(evt,ref) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
   if(charCode == 8 || charCode == 9 ){
	  return true;	
	}
	
	
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }
	
    return true;
}



</script>



<?php
}
?>