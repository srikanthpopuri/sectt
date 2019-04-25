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

        <div class="modal fade" id="internalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body" id="coa">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="externalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body" id="roa">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bothModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body" id="both">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

 
        <div id="roa1"></div>
        <div id="coa1"></div>
        
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">





                <section class="panel" >


                    <div class="panel-body" style="display: none">


                        <br />
                        <br />

                        <div style="display:none">
                            <div id="media"></div>
                        </div>
                        <div id="adminForm" style="display:none">

                            <script type="text/javascript">

                                setStateGet('adminForm','<?php echo SECURE_PATH;?>viewreport/process.php','addForm=1');

                            </script>

                        </div>

                    </div>
                </section>


                <section class="panel">




                    <div id="formLoader">
                        <img src="<?php echo SECURE_PATH;?>theme/img/loader.gif" alt="Loading..."/>
                    </div>

                    <header class="panel-heading">

                        <b style="color:#C36;">Dashboard</b><br />
                    </header>



                    <div class="panel-body">


                        <section id="unseen">
                            <div id="adminTable">

                                <p style="color:red">LOADING...</p>

                                <script type="text/javascript">
                                    setStateGet('adminTable','<?php echo SECURE_PATH;?>viewreport/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');
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

<script type="text/javascript">

    function grabUser(){
        users = '';
        $('input.seluser').each(function (){
            if($(this).is(':checked')){

                users+= $(this).val()+",";

            }
        });

        return users;
    }
</script>

<script type="text/javascript">
    function med(val){

        var resultdrug = '';
        for(i=1; i<=val; i++)
        {

            resultdrug=resultdrug+"&table_id"+i+"="+$('#table_id'+i).val()+"&test_result"+i+"="+$('#test_result'+i).val()+"";
        }
        return resultdrug;
    }
</script>