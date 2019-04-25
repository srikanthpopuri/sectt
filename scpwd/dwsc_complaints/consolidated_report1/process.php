<?php
include('../include/session.php');?>

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

<?php
if(!$session->logged_in){
    ?>

    <script type="text/javascript">
        setStateGet('main','login_process.php','loginForm=1');
    </script>

    <?php
}?>




<style>
    .bordered_panel{
        border:none !important;
        box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.4) !important;
    }
    .tile_head{
        text-align: center;
        padding-top: 16px;
        font-size: 20px;
        background-color: #eaeaea;
    }
    .dotted_line{
        border:0.5px solid #d9d9d9;
    }
    table th{
        text-align:center;
    }
</style>

<script type="text/javascript">
    function addslashes(str) {
        str  = encodeURIComponent(str);
        return (str + '')
            .replace(/[\\"']/g, '\\$&')
            .replace(/\u0000/g, '\\0');
    }
</script>

    <script type="text/javascript" language="javascript">

        $( ".datePicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            yearRange: "1920:2025"
        });
    </script>

    <script>
        function search_report() {
            var district_sel = $('#district_sel').val();
            setStateGet('adminTable','<?php echo SECURE_PATH;?>consolidated_report1/process.php','tableDisplay=1&search=true&district_sel='+district_sel);
        }
    </script>

<?php error_reporting(E_PARSE); ?>

<?php


if(isset($_REQUEST['addForm'])){



    ?>


    <?php
}

//Process and Validate POST data



if(isset($_POST['validateForm'])){}

//Delete parameter
if(isset($_GET['rowDelete'])){}

?>



<?php

$sort_order = '';
$sort_by = '';

if(isset($_GET['tableDisplay'])){

    $condition='';
    if($session->userlevel == 6)
    {
        $d = $database->query("select employee_district from users WHERE username='".$session->username."'");
        $dis1 = mysqli_fetch_array($d);
        $condition = ' and district = "'.$dis1['employee_district'].'" and';
     }


    $x='';
    $limit=200;

    if(isset($_GET['page']))
    {
        $start = ($_GET['page'] - 1) * $limit;     //first item to display on this page
        $page=$_GET['page'];
    }
    else
    {
        $start = 0;      //if no page var is given, set start to 0
        $page=0;
    }

    if(isset($_GET['search']))
    {

        if(strlen($_REQUEST['district_sel'])>0){
            $condition="district='".$_GET['district_sel']."' and";
        }
    }
?>

    <form class="form-inline">


        <div class="row">

            <?php if($session->userlevel == 9 ||$session->userlevel == 8){ ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="district_sel">Select District</label><br/>
                        <select name="district_sel" id="district_sel"  class="form-control" onchange="search_report()">
                            <option value="">Select District</option>
                            <?php
                            $q=$database->query("SELECT * FROM `global_districts` ");
                            if(mysqli_num_rows($q)>0){
                                while($data=mysqli_fetch_array($q)){?>

                                    <option value="<?php echo $data['uid']?>"
                                        <?php if(isset($_GET['district_sel'])){
                                            if($_GET['district_sel']==$data['uid']){
                                                echo "selected=selected";
                                            }
                                        }
                                        ?>>
                                        <?php echo ucwords($data['district'])?>
                                    </option>
                                    <?php
                                }
                            }?>
                        </select>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>

    </form>


    <br/>

    <div style="clear:both"></div>



    <?php

                echo '<div style="float: right;padding-bottom: 20px"><a class="label label-warning" style="font-size:14px;" href="' . SECURE_PATH . 'consolidated_report1/export.php?&district_sel=' . $_REQUEST['district_sel'].'" target="_blank"><i class="fa fa-exchange"></i>Export to Excel</a></div>';

                ?>

                <br/>

                <div class="clearfix"></div>

                <table class="table table-bordered">
                    <tr>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">Year</th>
                        <th  style="text-align:center">Pending at the beginning of the year/month</th>
                        <th  style="text-align:center;">Instituted during the month</th>
                        <th style="text-align:center;">Settled through concillation officers during the month</th>
                        <th style="text-align:center;">Number in which maintenance awarded by the Tribunals during the month</th>
                        <th style="text-align:center;">Number in which the claims rejected</th>
                        <th style="text-align:center;">Total claims disposed during the month</th>
                        <th style="text-align:center;">Pending at the end of the month</th>
                    </tr>

                    <?php






                    $month = array('','January','February','March','April','May','June','July','August','September','October','November','December');

                        for($i=1;$i<=12;$i++){

                            $count2=0;
                            $count3=0;
                            $count4=0;
                            $count5=0;
                            $count6=0;
                            $count7=0;
                            $count8=0;


                            $q2 = $database->query("select sub_date from psc_rules WHERE ".$condition." status not in(4,3)");
                            while ($data = mysqli_fetch_array($q2)){
                                if(date('m',$data['sub_date'])==$i){
                                    $count2++;
                                }
                            }


                            $q4 = $database->query("select sub_date from psc_rules WHERE ".$condition." status=4");
                            while ($data = mysqli_fetch_array($q4)){
                                if(date('m',$data['sub_date'])==$i){
                                    $count4++;
                                }
                            }

                            $q6 = $database->query("select sub_date from psc_rules WHERE ".$condition." status=3");
                            while ($data = mysqli_fetch_array($q6)){
                                if(date('m',$data['sub_date'])==$i){
                                    $count6++;
                                }
                            }

                            
                            ?>

                            <tr>

                                <td align="center"><?php echo $i; ?></td>
                                <td align="center"><?php echo $month[$i].','.date('Y');?></td>
                                <td align="center"><?php echo $count2;?></td>
                                <td align="center"><?php echo $count3;?></td>
                                <td align="center"><?php echo $count4;?></td>
                                <td align="center"><?php echo $count5;?></td>
                                <td align="center"><?php echo $count6;?></td>
                                <td align="center"><?php echo $count7;?></td>
                                <td align="center"><?php echo $count8;?></td>
                            </tr>
                            <?php
                        }


                    ?>


                </table>

                <div style="text-align:center"> <?php echo $pagination ;?></div>
                <?php







}
?>

