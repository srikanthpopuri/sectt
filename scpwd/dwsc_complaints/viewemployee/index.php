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
      
                       <!--   <header class="panel-heading">
 <b style="color:#C36;">Create Employee</b>
                          </header>-->
                          <div class="panel-body">



            <a class="btn btn-warning" onclick="setState('main-content','<?php echo SECURE_PATH;?>createemployee/','getLayout=true')" >Add Employee</a>
<a class="btn btn-success"   onClick="$('#adminForm').slideToggle()"> View Employee</a>

            
            <br />
<br />

<div style="display:none">
<div id="media"></div>
</div>
<div id="adminForm" style="display:none">

<script type="text/javascript">

setStateGet('adminForm','<?php echo SECURE_PATH;?>viewemployee/process.php','addForm=1');

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
<div id="adminTable">

<script type="text/javascript">
setStateGet('adminTable','<?php echo SECURE_PATH;?>viewemployee/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>

</div>
</section>
                          </div>
              
              </section>
              </div>
              </div>
              
              <!-- page end-->
</section>



<?php
}
?>