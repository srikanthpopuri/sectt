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

             

        







<section class="panel">

      

                        <!--  <header class="panel-heading">

Add New

                          </header>  -->

                          <div class="panel-body">

<a class="btn btn-success" onclick="setState('main-content','<?php echo SECURE_PATH;?>helpline/','getLayout=true')"><i class="fa fa-plus"></i>Helpline</a> 

<!--<a class="btn btn-primary" onclick="setState('main-content','<?php echo SECURE_PATH;?>industryview/','getLayout=true')"><i class="fa fa-plus"></i>View Industry</a> -->


<br />

<br />

<div style="display:none">

<div id="media"></div>

</div>

<div id="adminForm" style="display:none">



<script type="text/javascript">



setStateGet('adminForm','<?php echo SECURE_PATH;?>helpline/process.php','addForm=1');



</script>



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

setStateGet('adminTable','<?php echo SECURE_PATH;?>helpline/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');



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



function openBoxviewmore(id){

	

	var box = 'media';

	

	$.colorbox({width:"30%",height:"50%",inline:true,scroll:false, href:"#"+box, onOpen: setState(box,'<?php echo SECURE_PATH;?>products/data.php','openBoxviewmore=true&id='+id)

	});

}





</script>

<?php

}

?>