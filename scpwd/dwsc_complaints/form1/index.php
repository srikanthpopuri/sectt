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

                           <b style="color:#C36;">Department for the welfare of Disabled and Senior Citizens</b><br />
                        </header>
                          <div class="panel-body">


<div style="display:none">
<div id="media"></div>
</div>
<div id="adminForm" >

<script type="text/javascript">

setStateGet('adminForm','<?php echo SECURE_PATH;?>form1/process.php','addForm=1');

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
        <b style="color:#FFF;">Department for the welfare of Disabled and Senior Citizens</b>
        <h4 class="modal-title" id="myModalLabel">
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
setStateGet('adminTable','<?php echo SECURE_PATH;?>form1/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
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


 function onlyAlphabets(evt, t) {

     try {

         evt = (evt) ? evt : window.event;
         var charCode = (evt.which) ? evt.which : evt.keyCode;

         if(charCode == 8 || charCode == 9 || charCode == 32){
             return true;
         }

         if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))

             return true;

         else

             return false;

     }

     catch (err) {

         alert(err.Description);

     }

 }

 function validateEmail(k) {
     var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(k);
     document.getElementById("error2").style.display = re ? "none" : "inline";
 }

 function isMobile(evt,id,len) {
     evt = (evt) ? evt : window.event;
     var charCode = (evt.which) ? evt.which : evt.keyCode;
     if(charCode == 8 || charCode == 9 ){
         return true;
     }


     ref = $('#'+id);

     if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
         return false;
     }
     else if(ref.val().length >= len){

         return false;
     }



     if(parseInt(ref.val().charAt(0)) < 7 ){
         $('#'+id+'_error').html(" * Invalid Mobile Number");
         return false;
     }

     $('#'+id+'_error').html("");
     return true;
 }    

</script>

    <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right
        function IsAlphaNumeric(e) {
            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
            var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>
    
<?php
}
?>