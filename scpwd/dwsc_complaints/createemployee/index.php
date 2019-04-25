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
?>
<section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
             
        



<section class="panel" >
      
                          <!--<header class="panel-heading">
 <b style="color:#C36;">Create Employee</b>
                          </header>-->
                          <div class="panel-body">
            <a class="btn btn-success" onClick="$('#adminForm').slideToggle()">Edit Profile</a>
<!--<a class="btn btn-warning" onclick="setState('main-content','<?php echo SECURE_PATH;?>viewemployee/','getLayout=true')" >View Employee</a>
-->
            
            <br />
<br />

<div style="display:none">
<div id="media"></div>
</div>
<div id="adminForm">
<?php

$query_uname=$database->query("select * from `users` where username = '".$session->username."'");
$ret_query_uname=mysqli_fetch_array($query_uname);

?>
<script type="text/javascript">

//setStateGet('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','addForm=1');

setStateGet('adminForm','<?php echo SECURE_PATH;?>createemployee/process.php','addForm=2&editform=<?php echo $session->username; ?>');
</script>

</div>
</div>
  </section>

               
              <section class="panel">
             
             
              
                
                <div id="formLoader">
<img src="<?php echo SECURE_PATH;?>theme/img/loader.gif" alt="Loading..."/>
</div>  
              
              
              <div class="panel-body">
              
                   
      <section id="unseen">
<div id="adminTable" style="display:none">

<script type="text/javascript">
setStateGet('adminTable','<?php echo SECURE_PATH;?>createemployee/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>

</div>
</section>
                          </div>
              
              </section>
              </div>
              </div>
              
              <!-- page end-->
</section>

<script type="text/javascript">
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
 function validateEmail(k) {
        var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(k);
        document.getElementById("error2").style.display = re ? "none" : "inline";
    }
</script>



<?php
}
?>