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

                           <b style="color:#C36;">GRIEVANCES</b><br />
                        </header>
                          <div class="panel-body">


<div style="display:none">
<div id="media"></div>
</div>
<div id="adminForm" style="display:none;">

<script type="text/javascript">

//setStateGet('adminForm','<?php echo SECURE_PATH;?>subsidy_pwd/process.php','addForm=1');

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
        <b style="color:#FFF;">GRIEVANCES</b>
    
      </div>
      <div class="modal-body" id="viewDetails" >
       
      </div>
      <div class="modal-footer" style="display:none;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                              <div class="modal fade" id="RejectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <b style="color:#FFF;">Reasons to Reject Application</b>
                                              <h4 class="modal-title" id="rejectModalLabel"> <b style="color:#FFF;"></b>
                                              </h4>
                                          </div>
                                          <div class="modal-body" id="RejectDetails" >

                                          </div>
                                          <div class="modal-footer" style="display:none;">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <!-- Details MOdal-->     
              
                   
      <section id="unseen">
<div id="adminTable" >

<script type="text/javascript">
setStateGet('adminTable','<?php echo SECURE_PATH;?>grievances_view/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
</script>

</div>
</section>
                         
              
         
              </div>
              
              <!-- page end-->
</section>
</div>
</div>
</section>



<?php
}
?>