<?php

include 'include/session.php';
?>

<style>
    .upload_btn {
        width: 200px;
        float: right;
    }
    .qq-upload-button {
        background-color: #de047f !important;
        border-color: transparent !important;
        color: #FFFFFF !important;
        width: 150px !important;
        border-radius: 5px;
        height: 35px !important;
        background: url('<?php echo SECURE_PATH;?>assets/images/Upload_icon.png') no-repeat center left 10px;
        background-size: 30px 20px;
    }
    .save_btn {
        background : url('<?php echo SECURE_PATH;?>assets/images/save_icon.png') no-repeat center left 10px;
        background-size: 15px;
        float: left;
        background-color: #de047f !important;
        border-color: transparent !important;
        color: #FFFFFF !important;
        width: 150px !important;
        border-radius: 5px;
        height: 35px !important;
    }
</style>

<?php

if(isset($_REQUEST['search_application'])){
    $search = $_REQUEST['search'];
//   $search['0'];


    if($search['3']=='1'){
        $q = $database->query("select status from form1 WHERE appli_no='".$search."'");
        $data = mysqli_fetch_array($q);

        if(mysqli_num_rows($q)>0){
            if($data['status']=='0'){
                ?>

                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , please upload the Duly Signed Document</h2>
                </center>

                <center>
                    <form role="form">

                        <div class="row">

                            <div class="form-group col-md-6" >

                                <div id="file-uploader1" class="upload_btn" >
                                    <noscript>
                                        <p>Please enable JavaScript to use file uploader.</p>
                                        <!-- or put a simple form for upload here -->
                                    </noscript>

                                </div>
                                <script>

                                    function createUploader(){

                                        var uploader = new qq.FileUploader({
                                            element: document.getElementById('file-uploader1'),
                                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload1&upload_type=single&filetype=file',
                                            debug: true,
                                            multiple:false
                                        });
                                    }

                                    createUploader();

                                    // in your app create uploader as soon as the DOM is ready
                                    // don't wait for the window to load

                                </script>

                                <input type="hidden" name="upload1" id="upload1" value="<?php if(isset($_REQUEST['upload1'])){ echo $_REQUEST['upload1'];}?>" />

                                <br  />
                                <span class="error"><?php if(isset($_SESSION['error']['upload'])){ echo $_SESSION['error']['upload'];}?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <a class="btn btn-info btn-md save_btn" style="margin-top:5px;" onClick="setState('applicant_section','<?php echo SECURE_PATH;?>ajax.php','validateForm=1&search=<?php echo $search;?>&upload='+$('#upload1').val())">Save</a>
                            </div>


                        </div>




                        


                    </form>
                </center>




            <?php
            }else if($data['status']=='1'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is in Queue</h2>
                </center>

                <?php
            }
            else if($data['status']=='2'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is Approved</h2>
                </center>
                <?php
            }else if($data['status']=='3'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is Rejected</h2>
                </center>
                <?php
            }
        }else{
            ?>
            <center>
                <h2 class="heading" style="color:#000;">Welcome to Department of Disabled Welfare</h2>
                <p style="display:none;">ENDOW LMS An Goverment of Telangana Initiative to expand the e-Governance <br> to digitalize, control and monitor revenue from leased lands.</p>
            </center>
            <center>
                <form class="form-inline">
                    <div class="input-group input_pad">
                        <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_applicant.php','login=1')"><i class="fa fa-signin"></i> Applicant</a>
                    </div>

                    <div class="input-group input_pad">
                        <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_process.php','loginForm=1')"><i class="fa fa-signin"></i> Employee</a>
                    </div>
                    <br>
                    <div class="input-group input_pad col-sm-7 search_block1">
                        <input type="text" placeholder="Search" id="search" class="search_input" value="<?php if(isset($_REQUEST['search'])){echo $_REQUEST['search'];}?>">
                        <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <br/>
                    <span class="error">No Entry Found with this Application Id</span>
                </form>
            </center>
            
            <?php
        }
    }

    else if($search['3']=='2'){
        $q = $database->query("select status from form2 WHERE appli_no='".$search."'");
        $data = mysqli_fetch_array($q);

        if(mysqli_num_rows($q)>0){
            if($data['status']=='0'){
                ?>

                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , please upload the Duly Signed Document</h2>
                </center>

                <center>
                    <form role="form">

                        <div class="row">

                            <div class="form-group col-md-6" >

                                <div id="file-uploader2" class="upload_btn">
                                    <noscript>
                                        <p>Please enable JavaScript to use file uploader.</p>
                                        <!-- or put a simple form for upload here -->
                                    </noscript>

                                </div>
                                <script>

                                    function createUploader(){

                                        var uploader = new qq.FileUploader({
                                            element: document.getElementById('file-uploader2'),
                                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload2&upload_type=single&filetype=file',
                                            debug: true,
                                            multiple:false
                                        });
                                    }

                                    createUploader();

                                    // in your app create uploader as soon as the DOM is ready
                                    // don't wait for the window to load

                                </script>

                                <input type="hidden" name="upload2" id="upload2" value="<?php if(isset($_REQUEST['upload2'])){ echo $_REQUEST['upload2'];}?>" />

                                <br  />
                                <span class="error"><?php if(isset($_SESSION['error']['upload'])){ echo $_SESSION['error']['upload'];}?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <a class="btn btn-info btn-md save_btn" style="margin-top:5px;" onClick="setState('applicant_section','<?php echo SECURE_PATH;?>ajax.php','validateForm=1&search=<?php echo $search;?>&upload='+$('#upload2').val())">Save</a>
                            </div>

                        </div>






                    </form>
                </center>




                <?php
            }else if($data['status']=='1'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is in Queue</h2>
                </center>

                <?php
            }
            else if($data['status']=='2'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is Approved</h2>
                </center>
                <?php
            }else if($data['status']=='3'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is Rejected</h2>
                </center>
                <?php
            }
        }else{
            ?>
            <center>
                <h2 class="heading" style="color:#000;">Welcome to Department of Disabled Welfare</h2>
                <p style="display:none;">ENDOW LMS An Goverment of Telangana Initiative to expand the e-Governance <br> to digitalize, control and monitor revenue from leased lands.</p>
            </center>
            <center>
                <form class="form-inline">
                    <div class="input-group input_pad">
                        <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_applicant.php','login=1')"><i class="fa fa-signin"></i> Applicant</a>
                    </div>

                    <div class="input-group input_pad">
                        <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_process.php','loginForm=1')"><i class="fa fa-signin"></i> Employee</a>
                    </div>
                    <br>
                    <div class="input-group input_pad col-sm-7 search_block1">
                        <input type="text" placeholder="Search" id="search" class="search_input" value="<?php if(isset($_REQUEST['search'])){echo $_REQUEST['search'];}?>">
                        <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <br/>
                    <span class="error">No Entry Found with this Application Id</span>
                </form>
            </center>

            <?php
        }
    }

   else if($search['3']=='3'){
        $q = $database->query("select status from subsidy_pwd WHERE appli_no='".$search."'");
        $data = mysqli_fetch_array($q);

        if(mysqli_num_rows($q)>0){
            if($data['status']=='0'){
                ?>


                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , please upload the Duly Signed Document</h2>
                </center>

                <center>
                    <form role="form">

                        <div class="row">
                            <div class="form-group col-md-6" >

                                <div id="file-uploader3" class="upload_btn">
                                    <noscript>
                                        <p>Please enable JavaScript to use file uploader.</p>
                                        <!-- or put a simple form for upload here -->
                                    </noscript>

                                </div>
                                <script>

                                    function createUploader(){

                                        var uploader = new qq.FileUploader({
                                            element: document.getElementById('file-uploader3'),
                                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload3&upload_type=single&filetype=file',
                                            debug: true,
                                            multiple:false
                                        });
                                    }

                                    createUploader();

                                    // in your app create uploader as soon as the DOM is ready
                                    // don't wait for the window to load

                                </script>

                                <input type="hidden" name="upload3" id="upload3" value="<?php if(isset($_REQUEST['upload3'])){ echo $_REQUEST['upload3'];}?>" />

                                <br  />
                                <span class="error"><?php if(isset($_SESSION['error']['upload'])){ echo $_SESSION['error']['upload'];}?></span>
                            </div>


                            <div class="form-group col-md-6">
                                <a class="btn btn-info btn-md save_btn" style="margin-top:5px;" onClick="setState('applicant_section','<?php echo SECURE_PATH;?>ajax.php','validateForm=1&search=<?php echo $search;?>&upload='+$('#upload3').val())">Save</a>
                            </div>

                        </div>

                    </form>
                </center>



                <?php
            }else if($data['status']=='1'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is in Queue</h2>
                </center>

                <?php
            }
            else if($data['status']=='2'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is Approved</h2>
                </center>
                <?php
            }else if($data['status']=='3'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is Rejected</h2>
                </center>
                <?php
            }
        }else{
            ?>
            <center>
                <h2 class="heading" style="color:#000;">Welcome to Department of Disabled Welfare</h2>
                <p style="display:none;">ENDOW LMS An Goverment of Telangana Initiative to expand the e-Governance <br> to digitalize, control and monitor revenue from leased lands.</p>
            </center>
            <center>
                <form class="form-inline">
                    <div class="input-group input_pad">
                        <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_applicant.php','login=1')"><i class="fa fa-signin"></i> Applicant</a>
                    </div>

                    <div class="input-group input_pad">
                        <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_process.php','loginForm=1')"><i class="fa fa-signin"></i> Employee</a>
                    </div>
                    <br>
                    <div class="input-group input_pad col-sm-7 search_block1">
                        <input type="text" placeholder="Search" id="search" class="search_input" value="<?php if(isset($_REQUEST['search'])){echo $_REQUEST['search'];}?>">
                        <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <br/>
                    <span class="error">No Entry Found with this Application Id</span>
                </form>
            </center>

            <?php
        }
    }

   else if($search['3']=='4'){
        $q = $database->query("select status from form5 WHERE appli_no='".$search."'");
        $data = mysqli_fetch_array($q);

        if(mysqli_num_rows($q)>0){
            if($data['status']=='0'){
                ?>


                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , please upload the Duly Signed Document</h2>
                </center>

                <center>
                    <form role="form">

                        <div class="row">


                            <div class="form-group col-md-6" >

                                <div id="file-uploader4" class="upload_btn">
                                    <noscript>
                                        <p>Please enable JavaScript to use file uploader.</p>
                                        <!-- or put a simple form for upload here -->
                                    </noscript>

                                </div>
                                <script>

                                    function createUploader(){

                                        var uploader = new qq.FileUploader({
                                            element: document.getElementById('file-uploader4'),
                                            action: '<?php echo SECURE_PATH;?>theme/js/upload/php3.php?upload=upload4&upload_type=single&filetype=file',
                                            debug: true,
                                            multiple:false
                                        });
                                    }

                                    createUploader();

                                    // in your app create uploader as soon as the DOM is ready
                                    // don't wait for the window to load

                                </script>

                                <input type="hidden" name="upload4" id="upload4" value="<?php if(isset($_REQUEST['upload4'])){ echo $_REQUEST['upload4'];}?>" />

                                <br  />
                                <span class="error"><?php if(isset($_SESSION['error']['upload'])){ echo $_SESSION['error']['upload'];}?></span>
                            </div>



                            <div class="form-group col-md-6">
                                <a class="btn btn-info btn-md save_btn" style="margin-top:5px;" onClick="setState('applicant_section','<?php echo SECURE_PATH;?>ajax.php','validateForm=1&search=<?php echo $search;?>&upload='+$('#upload4').val())">Save</a>
                            </div>

                        </div>

                    </form>
                </center>



                <?php
            }else if($data['status']=='1'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is in Queue</h2>
                </center>

                <?php
            }
            else if($data['status']=='2'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is Approved</h2>
                </center>
                <?php
            }else if($data['status']=='3'){ ?>
                <center>
                    <h2 class="heading" style="color:#000;">Dear Applicant , your application is Rejected</h2>
                </center>
                <?php
            }
        }else{
            ?>
            <center>
                <h2 class="heading" style="color:#000;">Welcome to Department of Disabled Welfare</h2>
                <p style="display:none;">ENDOW LMS An Goverment of Telangana Initiative to expand the e-Governance <br> to digitalize, control and monitor revenue from leased lands.</p>
            </center>
            <center>
                <form class="form-inline">
                    <div class="input-group input_pad">
                        <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_applicant.php','login=1')"><i class="fa fa-signin"></i> Applicant</a>
                    </div>

                    <div class="input-group input_pad">
                        <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_process.php','loginForm=1')"><i class="fa fa-signin"></i> Employee</a>
                    </div>
                    <br>
                    <div class="input-group input_pad col-sm-7 search_block1">
                        <input type="text" placeholder="Search" id="search" class="search_input" value="<?php if(isset($_REQUEST['search'])){echo $_REQUEST['search'];}?>">
                        <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <br/>
                    <span class="error">No Entry Found with this Application Id</span>
                </form>
            </center>

            <?php
        }
    }

    else{
        ?>
        <center>
            <h2 class="heading" style="color:#000;">Welcome to Department of Disabled Welfare</h2>
            <p style="display:none;">ENDOW LMS An Goverment of Telangana Initiative to expand the e-Governance <br> to digitalize, control and monitor revenue from leased lands.</p>
        </center>
        <center>
            <form class="form-inline">
                <div class="input-group input_pad">
                    <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_applicant.php','login=1')"><i class="fa fa-signin"></i> Applicant</a>
                </div>

                <div class="input-group input_pad">
                    <a class="btn btn-lg btn-login btn_custom" onClick="setState('login_page','<?php echo SECURE_PATH;?>login_process.php','loginForm=1')"><i class="fa fa-signin"></i> Employee</a>
                </div>
                <br>
                <div class="input-group input_pad col-sm-7 search_block1">
                    <input type="text" placeholder="Search" id="search" class="search_input" value="<?php if(isset($_REQUEST['search'])){echo $_REQUEST['search'];}?>">
                    <a class="icon_search" onclick="setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search='+$('#search').val());"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
                <br/>
                <span class="error">No Entry Found with this Application Id</span>
            </form>
        </center>
        <?php
    }

    unset($_SESSION['error']);

}

if(isset($_REQUEST['validateForm'])){
    $_SESSION['error'] = array();

    $post = $session->cleanInput($_REQUEST);

    $field = 'upload';
    if(!$post['upload'] || strlen(trim($post['upload'])) == 0){
        $_SESSION['error'][$field] = "* Please Upload document";
    }

    if(count($_SESSION['error']) > 0 || $post['validateForm'] == 2){

        if($post['search']['3']=='1'){
            ?>
            <script type="text/javascript">
                setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search=<?php echo $post['search'];?>&upload1=<?php echo $post['upload'];?>');
            </script>
        <?php
        }

        if($post['search']['3']=='2'){
            ?>
            <script type="text/javascript">
                setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search=<?php echo $post['search'];?>&upload2=<?php echo $post['upload'];?>');
            </script>
        <?php
        }

        if($post['search']['3']=='3'){
            ?>
            <script type="text/javascript">
                setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search=<?php echo $post['search'];?>&upload3=<?php echo $post['upload'];?>');
            </script>
        <?php
        }

        if($post['search']['3']=='4'){
            ?>
            <script type="text/javascript">
                setStateGet('applicant_section','<?php echo SECURE_PATH;?>ajax.php','search_application=true&search=<?php echo $post['search'];?>&upload4=<?php echo $post['upload'];?>');
            </script>
        <?php
        }



        ?>


        <?php
    }else{

        if($post['search']['3']=='1'){
            $database->query("update form1 set status=1,signed_document='".$post['upload']."' WHERE appli_no='".$post['search']."'");
       }

        if($post['search']['3']=='2'){
            $database->query("update form2 set status=1,signed_document='".$post['upload']."' WHERE appli_no='".$post['search']."'");
        }

        if($post['search']['3']=='3'){
            $database->query("update subsidy_pwd set status=1,signed_document='".$post['upload']."' WHERE appli_no='".$post['search']."'");
        }

        if($post['search']['3']=='4'){
            $database->query("update form5 set status=1,signed_document='".$post['upload']."' WHERE appli_no='".$post['search']."'");
        }

        ?>

        <div class="alert alert-success "><i class="fa fa-thumbs-up fa-2x"></i>Information saved successfully!</div>

        <script>
            setStateGet('loginForm','<?php echo SECURE_PATH;?>login_process1.php','loginForm=1');
        </script>
        <?php
    }
}
?>