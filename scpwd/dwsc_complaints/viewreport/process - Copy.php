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
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var district_sel = $('#district_sel').val();
            var entry_type = $('#entry_type').val();
            setStateGet('adminTable','<?php echo SECURE_PATH;?>viewreport/process.php','tableDisplay=1&search=true&from_date='+from_date+'&to_date='+to_date+'&district_sel='+district_sel+'&entry_type='+entry_type);
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

    $con='';
    if($session->userlevel == 6)
    {
        $d = $database->query("select employee_district from users WHERE username='".$session->username."'");
        $dis1 = mysqli_fetch_array($d);
        $con = ' and district = "'.$dis1['employee_district'].'" ';
     }

    $s = $database->query("select count(id) as cnt from complaints_form WHERE status in (1,2,3,4,5,6,7,8) $con");
    $w1 = mysqli_fetch_array($s);

    $ap = $database->query("select count(id) as cnt from complaints_form WHERE status in (2,4,6,8) $con");
    $w2 = mysqli_fetch_array($ap);
	
	$ap_2 = $database->query("select count(id) as cnt from complaints_form WHERE status=2 $con");
    $w2_2 = mysqli_fetch_array($ap_2);
	
	$ap_4 = $database->query("select count(id) as cnt from complaints_form WHERE status=4 $con");
    $w2_4 = mysqli_fetch_array($ap_4);
	
	$ap_6 = $database->query("select count(id) as cnt from complaints_form WHERE status=6 $con");
    $w2_6 = mysqli_fetch_array($ap_6);
	
	$ap_8 = $database->query("select count(id) as cnt from complaints_form WHERE status=8 $con");
    $w2_8 = mysqli_fetch_array($ap_8);

    $p = $database->query("select count(id) as cnt from complaints_form WHERE status in (3,5,7) $con");
    $w3 = mysqli_fetch_array($p);

    $r_3 = $database->query("select count(id) as cnt from complaints_form WHERE status=3 $con");
    $w3_3 = mysqli_fetch_array($r_3);
	$r_5 = $database->query("select count(id) as cnt from complaints_form WHERE status=5 $con");
    $w3_5 = mysqli_fetch_array($r_5);
	$r_7 = $database->query("select count(id) as cnt from complaints_form WHERE status=7 $con");
    $w3_7 = mysqli_fetch_array($r_7);


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



        if(strlen($_REQUEST['from_date'])>0 && strlen($_REQUEST['to_date'])>0){
            if(strlen($condition)>0){$condition.=" and ";}
            $from_date = strtotime($_REQUEST['from_date']);
            $to_date = strtotime($_REQUEST['to_date']. ' 23:59:59');
            $condition.="timestamp between '".$from_date."' and '".$to_date."'";
        }

        if(strlen($_REQUEST['district_sel'])>0){
            if(strlen($condition)>0){$condition.=" and ";}
            $condition.="district='".$_GET['district_sel']."'";
        }

        
    }
?>

    <form class="form-inline">


        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="from_date">From Date</label><br/>
                    <input type="text" placeholder="From Date" onchange="search_report()" class="form-control datePicker" name="from_date" id="from_date" value="<?php if(isset($_REQUEST['from_date'])){echo $_REQUEST['from_date'];}?>"/>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="to_date">To Date</label><br/>
                    <input type="text" placeholder="To Date" onchange="search_report()" class="form-control datePicker" name="to_date" id="to_date" value="<?php if(isset($_REQUEST['to_date'])){echo $_REQUEST['to_date'];}?>"/>
                </div>
            </div>

            

            <?php if($session->userlevel == 9 ||$session->userlevel == 8){ ?>

                <div class="col-md-3">
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
    <br/>
    <div class="row state-overview">
        <div class="col-lg-6 col-sm-6">
            <section class="panel bordered_panel">
                <div class="tile_head" style="background-color: #00416a;color: white;padding-top: 0;line-height: 45px">Total Applications Submitted</div>
                <div class="dotted_line"></div>
                <div>
                    <table style="width:100%;height:132px">
                        <tr style="background-color: #fff;color: #00416a;text-align: center;"><td colspan=2> <h4 style="margin-top:0"><?php echo $w1['cnt'];?></h4></td></tr>
                        <tr>
                            <td style="background: #d90022;text-align: center;color: #fff;">Inter Department <h5 style="margin-top:0;font-size: 19px;"><?php echo $w2['cnt'];?></h5></td>
                            <td style="background: #1076f1;color: #fff;text-align: center;">Other Department<h5 style="margin-top:0;font-size: 19px"><?php echo $w3['cnt'];?></h5></td></tr>
                    </table>
                </div>
            </section>
        </div>

        



    </div>
    <br/>
<div class="row state-overview">
        <div class="col-lg-6 col-sm-6">
            <section class="panel bordered_panel">
                <div class="tile_head" style="background-color: #00416a;color: white;padding-top: 0;line-height: 45px">Inter Department</div>
                <div class="dotted_line"></div>
                <div>
                    <table style="width:100%;height:132px">
                        <tr style="background-color: #fff;color: #00416a;text-align: center;"><td colspan=2> <h4 style="margin-top:0"><?php echo $w2['cnt'];?></h4></td></tr>
                        <tr>
                            <td style="background: #d90022;text-align: center;color: #fff;">Assigned <h5 style="margin-top:0;font-size: 19px;"><?php echo $w2_2['cnt'];?></h5></td>
                            <td style="background: #1076f1;color: #fff;text-align: center;">Re-Assigned<h5 style="margin-top:0;font-size: 19px"><?php echo ($w2_6['cnt']);?></h5></td>
                                    <td style="background: #d90022;text-align: center;color: #fff;">Closed<h5 style="margin-top:0;font-size: 19px"><?php echo ($w2_8['cnt']);?></h5></td></tr>
                    </table>
                </div>
            </section>
        </div>

        <div class="col-lg-6 col-sm-6">
            <section class="panel bordered_panel">
                <div class="tile_head" style="background-color: #00416a;color: white;padding-top: 0;line-height: 45px">Other Department</div>
                <div class="dotted_line"></div>
                <div>
                    <table style="width:100%;height:132px">
                        <tr style="background-color: #fff;color: #00416a;text-align: center;"><td colspan=2> <h4 style="margin-top:0"><?php echo $w3['cnt']; ?></h4></td></tr>
                                 <tr>
                            <td style="background: #d90022;text-align: center;color: #fff;">Assigned <h5 style="margin-top:0;font-size: 19px;"><?php echo $w3_3['cnt'];?></h5></td>
                            <td style="background: #1076f1;color: #fff;text-align: center;">Re-Assigned<h5 style="margin-top:0;font-size: 19px"><?php echo ($w3_5['cnt']);?></h5></td>
                                    <td style="background: #d90022;text-align: center;color: #fff;">Closed<h5 style="margin-top:0;font-size: 19px"><?php echo ($w3_7['cnt']);?></h5></td></tr>
         
                    </table>
                </div>
            </section>
        </div>



    </div>
    <div style="clear:both"></div>



    <?php

              
                ?>

                <br/>

                <div class="clearfix"></div>

                <table class="table table-bordered" style="table-layout:fixed;overflow:hidden">
                    <colgroup>

                        <col width="40px">
                        <col width="40px">
                        <col width="40px">
                        <col width="40px">
                        <col width="40px">
                        <col width="40px">
                        <col width="40px">
                        <col width="40px">

                    </colgroup>
                    <tr style="background: #eaeaea">


                        <th rowspan=2 style="text-align:center;vertical-align: middle;">District Name</th>
                        <th rowspan=2 style="text-align:center;vertical-align: middle;">No.of Applications</th>
                        <th colspan=6 style="text-align:center">Application Status</th>

                    </tr>
                    <tr style="background: #eaeaea">
                        <th style="text-align:center;background-color:#40cded;color:#fff">Assigned to DWO</th>
                        <th  style="text-align:center;background-color:#40cded;color:#fff">Re-Assigned to DWO</th>
                        <th style="text-align:center;background-color:#40cded;color:#fff">Assigned to Other Department</th>
                        <th  style="text-align:center;background-color:#40cded;color:#fff">Re-Assigned to Other Department</th>
                        <th style="text-align:center;center;background-color:#ff6c60;color:#fff">Closed (DWO)</th>
                        <th style="text-align:center;center;background-color:#ff6c60;color:#fff">Closed (Other Department)</th>

                        
                    </tr>

                    <?php



                        if($session->userlevel == 9 ||$session->userlevel == 8)
                        {
                            if(isset($_REQUEST['district_sel']) && $_REQUEST['district_sel']!=''){
                                $dis_sel = $database->query("select uid,district from global_districts WHERE uid='".$_REQUEST['district_sel']."'");
                            }else{
                                $dis_sel = $database->query("select uid,district from global_districts");
                            }

                        }elseif($session->userlevel == 6)
                        {
                            $d = $database->query("select employee_district from users WHERE username='".$session->username."'");
                            $dis = mysqli_fetch_array($d);
                            $dis_sel = $database->query("select uid,district from global_districts WHERE uid='".$dis['employee_district']."'");
                        }





                        $c = '';
                        if(strlen($_REQUEST['from_date'])>0 && strlen($_REQUEST['to_date'])>0){
                            $from_date = strtotime($_REQUEST['from_date']);
                            $to_date = strtotime($_REQUEST['to_date']. ' 23:59:59');
                            $c.="and timestamp between '".$from_date."' and '".$to_date."'";
                        }

                        if(strlen($_REQUEST['entry_type'])>0){
                            $c.="and entry_type='".$_REQUEST['entry_type']."' ";
                        }


                        while($dis_data = mysqli_fetch_array($dis_sel)){

                            $q1 = $database->query("select count(id) as cnt from form1 WHERE district='".$dis_data['uid']."' and status in (1,2,3,4,5,6,7,8) $c");
                            $a1= mysqli_fetch_array($q1);

                            $q2 = $database->query("select count(id) as cnt from form1 WHERE district='".$dis_data['uid']."' and status in (2,4) $c");
                            $a2= mysqli_fetch_array($q2);

                            $q3 = $database->query("select count(id) as cnt from form1 WHERE district='".$dis_data['uid']."' and status=3 $c");
                            $a3= mysqli_fetch_array($q3);

                            $q4 = $database->query("select count(id) as cnt from form1 WHERE district='".$dis_data['uid']."' and status=4 $c");
                            $a4= mysqli_fetch_array($q4);

                            $t = $database->query("select count(id) as cnt from form1 WHERE district='".$dis_data['uid']."' $c");
                            $total1 = mysqli_fetch_array($t);


                           
                            ?>

                            <tr style="background: #00416a;color: #fff;">

                                <td align="center"><?php echo $dis_data['district']; ?></td>
                                <td align="center"><?php echo $total1['cnt']+$total2['cnt']+$total3['cnt']+$total4['cnt'];?></td>
                                <td align="center"><?php echo $a1['cnt']+$b1['cnt']+$c1['cnt']+$d1['cnt'];?></td>
                                <td align="center"><?php echo $a2['cnt']+$b2['cnt']+$c2['cnt']+$d2['cnt'];?></td>
                                <td align="center"><?php echo $a4['cnt']+$b4['cnt']+$c4['cnt']+$d4['cnt'];?></td>
                                <td align="center"><?php echo ($a2['cnt']+$b2['cnt']+$c2['cnt']+$d2['cnt'])-($a4['cnt']+$b4['cnt']+$c4['cnt']+$d4['cnt']);?></td>
                                <td align="center"><?php echo $a3['cnt']+$b3['cnt']+$c3['cnt']+$d3['cnt'];?></td>
                                <td align="center"><?php echo $a3['cnt']+$b3['cnt']+$c3['cnt']+$d3['cnt'];?></td>

                            </tr>
                            <?php
                        }


                    ?>


                </table>

                <div style="text-align:center"> <?php echo $pagination ;?></div>
                <?php







}
?>

