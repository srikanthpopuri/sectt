<?php
include('../include/session.php');

if(isset($_REQUEST['appli_no'])){

    $q = $database->query("select * from psc_rules WHERE appli_no='".$_REQUEST['appli_no']."'");

    if(mysqli_num_rows($q)>0){
        $data = mysqli_fetch_array($q);

        $q1 = $database->query("select * from form_i WHERE appli_no='".$_REQUEST['appli_no']."'");
        if(mysqli_num_rows($q1)>0){
            echo '<p>You have already applied for it , take the print out by entering the application number</p>';
        }else{

        ?>
        <br/>
        <form role="form">

            <b><p>
                    Appellate Tribunal of Maintenance of Parents and Senior Citizens Appeal Against O.P.No.<input type="text" id="text1" class="text_border">of 20<input type="text" id="text2" class="text_border">(On the file of the Tribunal<input type="text" id="text3" class="text_border">(District))
                </p></b>

            <br/>

            <p><input type="text" id="text4" class="text_border" value="<?php echo $data['psc_name'];?>" readonly/>Appellant/Petitioner Vs <input type="text" id="text5" class="text_border" value="<?php echo $data['resp_name'];?>" readonly/> Respondents</p>

            <br/>

            <p>1. APPELLANT : Sri/Smt/Mr/Miss/Son/Daughter of <input type="text" id="text6" class="text_border" value="<?php echo $data['psc_name'];?>" readonly/> aged<input type="text" id="text7" class="text_border" value="<?php echo $data['age'];?>" readonly/> years, residing at<input type="text" id="text8" class="text_border" value="<?php echo $data['perm_address'];?>" readonly/>. The address for service of all Notices and Processes on the Appellant is at
                <input type="text" id="text9" class="text_border" value="<?php echo $data['perm_address'];?>"  readonly/>. The address for service of all notices and processes on the respondents are:</p>

            <br/>

            <p>II. RESPONDENTS (S): (1)residing at <input type="text" id="text10" class="text_border" value="<?php echo $data['rel_address'];?>" readonly/> (2) residing at <input type="text" id="text11" class="text_border" value="<?php echo $data['rel_address'];?>" readonly/>. The address for service of all notices and processes on the respondents are:</p>

            <br/>

            <p>III. The Appellant above named begs to prefer the above appeal against the order dt<input type="text" id="text12" class="text_border"> made in OP.No.<input type="text" id="text13" class="text_border"> of 2009 by the Hon'ble Tribunal on the following among others:</p>

            <br/>

            <p>Grounds</p>
            <p>Here mention the points for appeal:</p>

            <br/>

            <p>Therefore, it is prayed that this Hon'ble Tribunal may be pleased to call for the records of the Tribunal and pass appropriate order/set-aside the order passed on <input type="text" id="text14" class="text_border"> in O.P.No.<input type="text" id="text15" class="text_border"> of 20<input type="text" id="text16" class="text_border"> by the <input type="text" id="text17" class="text_border"> Tribunal and thus render justice.</p>

            <br/>
            <br/>

            <p style="text-align: right">Station : Signature of Petitioner</p><br/>
            <p style="float: right">Date : (Appellant)</p>

            <div class="row">
                <div class="form-group col-md-4">

                    <a class="btn btn-info" onClick="setState('adminForm','<?php echo SECURE_PATH;?>public/process6.php','validateForm=1&text1='+$('#text1').val()+'&text2='+$('#text2').val()+'&text3='+$('#text3').val()+'&text4='+$('#text4').val()+'&text5='+$('#text5').val()+'&text6='+$('#text6').val()+'&text7='+$('#text7').val()+'&text8='+$('#text8').val()+'&text9='+$('#text9').val()+'&text10='+$('#text10').val()+'&text11='+$('#text11').val()+'&text12='+$('#text12').val()+'&text13='+$('#text13').val()+'&text14='+$('#text14').val()+'&text15='+$('#text15').val()+'&text16='+$('#text16').val()+'&text17='+$('#text17').val()+'&appli_no=<?php echo $_REQUEST['appli_no'];?><?php if(isset($_POST['editform'])){ echo '&editform='.$_POST['editform'];}?>');">Save</a>

                </div>
            </div>
        </form>
    <?php
        }
    }else{
        echo 'No Results Found with is Application No';
    }
}

?>