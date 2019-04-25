<?php
include('../include/session.php');

if(!$session->logged_in){
    ?>
    <script type="text/javascript">
        setStateGet('main','login_process.php','loginForm=1');
    </script>

    <?php
}

//Customer Home Screen
if(isset($_GET['homeScreen'])){

}

if(isset($_REQUEST['sideNavigation'])){

    ?>
    <?php
}

if(isset($_REQUEST['tableTop'])){
    ?>


    <?php
}

if(isset($_REQUEST['rightSideBar'])){
    if($session->userlevel == 9 || $session->userlevel == 8)
    {
        ?>
        <script type="text/javascript">
            setStateGet('main-content','<?php echo SECURE_PATH;?>viewreport/','getLayout=true')


        </script>
    <?php
    }

    if($session->userlevel == 6)
    {
        ?>
        <script type="text/javascript">
            setStateGet('main-content','<?php echo SECURE_PATH;?>viewreport1/','getLayout=true')


        </script>
        <?php
    }



}

?>