<?php
include('../include/session.php');

?>


<?php

if(isset($_REQUEST['id'])){?>

    <h5><b style="color:lightskyblue;font-size: 15px">Details of AID & Appliances Required</b></h5>
        <hr>
        <br/>

    <label for="equipment" style="padding-left: 20px">Required Equipments</label><br/><br/>

 <?php
    if($_REQUEST['id']==5){
            ?>
        <div class="row">

            <div class="form-group col-md-3" >
                <input type="checkbox" id="retro_vehicle" onclick="setCheck(this)"  <?php if(isset($_POST['retro_vehicle'])){if($_POST['retro_vehicle']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Retrofitted Motorized Vehicle<br/>
            </div>


        <div class="form-group col-md-3" >
            <input type="checkbox" id="tri_cycle" onclick="setCheck(this)"  <?php if(isset($_POST['tri_cycle'])){if($_POST['tri_cycle']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;TRI Cycle<br/>
        </div>

        <div class="form-group col-md-3" >
            <input type="checkbox" id="caliper" onclick="setCheck(this)"  <?php if(isset($_POST['caliper'])){if($_POST['caliper']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Calipers<br/>
        </div>

        <div class="form-group col-md-3" >
            <input type="checkbox" id="a_limb" onclick="setCheck(this)"  <?php if(isset($_POST['a_limb'])){if($_POST['a_limb']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Artificial Limbs<br/>
        </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3" >
                <input type="checkbox" id="crutches" onclick="setCheck(this)" <?php if(isset($_POST['crutches'])){if($_POST['crutches']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Crutches<br/>
            </div>

            <div class="form-group col-md-3" >
                <input type="checkbox" id="w_chair" onclick="setCheck(this)" <?php if(isset($_POST['w_chair'])){if($_POST['w_chair']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Wheel Chair<br/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>


    <?php
    }

    if($_REQUEST['id']==1){
        ?>
        <div class="row">

            <div class="form-group col-md-3" >
                <input type="checkbox" id="laptop" onclick="setCheck(this)" <?php if(isset($_POST['laptop'])){if($_POST['laptop']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Laptop<br/>
            </div>


            <div class="form-group col-md-3" >
                <input type="checkbox" id="mp3" onclick="setCheck(this)" <?php if(isset($_POST['mp3'])){if($_POST['mp3']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Mp3 Player<br/>
            </div>

            <div class="form-group col-md-3" >
                <input type="checkbox" id="dc" onclick="setCheck(this)" <?php if(isset($_POST['dc'])){if($_POST['dc']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Daisy Player<br/>
            </div>

            <div class="form-group col-md-3" >
                <input type="checkbox" id="b_books" onclick="setCheck(this)" <?php if(isset($_POST['b_books'])){if($_POST['b_books']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Braille Books<br/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>


        <?php
    }

    if($_REQUEST['id']==4){
        ?>
        <div class="row">
            <div class="form-group col-md-3" >
                <input type="checkbox" id="ear_device" onclick="setCheck(this)" <?php if(isset($_POST['ear_device'])){if($_POST['ear_device']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Hearing AID<br/>
            </div>

            <div class="form-group col-md-3" >
                <input type="checkbox" id="smart_phone" onclick="setCheck(this)" <?php if(isset($_POST['smart_phone'])){if($_POST['smart_phone']==1){echo 'checked';}}?>  style="font-size: 15px" value="0" >&nbsp;4G Smart Phone<br/>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>

        <?php
    }

    if($_REQUEST['id']==11){
        ?>
        <div class="row">
            <div class="form-group col-md-3" >
                <input type="checkbox" id="wheel_chair" onclick="setCheck(this)" <?php if(isset($_POST['wheel_chair'])){if($_POST['wheel_chair']==1){echo 'checked';}}?>  style="font-size: 15px" value="0" >&nbsp;Battery Wheel Chair<br/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>
        <?php
    }

    if($_REQUEST['id']==22){
        ?>
        <div class="row">
            <div class="form-group col-md-3" >
                <input type="checkbox" id="tlm" onclick="setCheck(this)" <?php if(isset($_POST['tlm'])){if($_POST['tlm']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Teacing & Learning Material (TLM)<br/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>
        <?php
    }
	if($_REQUEST['id'] == 'all')
	{
		
		
	}
}
if(isset($_REQUEST['id_edit'])){ 

$data22= $database->query("SELECT * FROM form1 where id = '".$_REQUEST['id_no']."'");
        

  $ret_data = mysqli_fetch_array($data22);

  $_POST = array_merge($_POST,$ret_data);
?>

    <h5><b style="color:lightskyblue;font-size: 15px">Details of AID & Appliances Required</b></h5>
        <hr>
        <br/>

    <label for="equipment" style="padding-left: 20px">Required Equipments</label><br/><br/>

 <?php
    if($_REQUEST['id_dt']==5){
            ?>
        <div class="row">

            <div class="form-group col-md-3" >
                <input type="checkbox" id="retro_vehicle" onclick="setCheck(this)"  <?php if(isset($_POST['retro_vehicle'])){if($_POST['retro_vehicle']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Retrofitted Motorized Vehicle<br/>
            </div>


        <div class="form-group col-md-3" >
            <input type="checkbox" id="tri_cycle" onclick="setCheck(this)"  <?php if(isset($_POST['tri_cycle'])){if($_POST['tri_cycle']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;TRI Cycle<br/>
        </div>

        <div class="form-group col-md-3" >
            <input type="checkbox" id="caliper" onclick="setCheck(this)"  <?php if(isset($_POST['caliper'])){if($_POST['caliper']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Calipers<br/>
        </div>

        <div class="form-group col-md-3" >
            <input type="checkbox" id="a_limb" onclick="setCheck(this)"  <?php if(isset($_POST['a_limb'])){if($_POST['a_limb']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Artificial Limbs<br/>
        </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3" >
                <input type="checkbox" id="crutches" onclick="setCheck(this)" <?php if(isset($_POST['crutches'])){if($_POST['crutches']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Crutches<br/>
            </div>

            <div class="form-group col-md-3" >
                <input type="checkbox" id="w_chair" onclick="setCheck(this)" <?php if(isset($_POST['w_chair'])){if($_POST['w_chair']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Wheel Chair<br/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>


    <?php
    }

    if($_REQUEST['id_dt']==1){
        ?>
        <div class="row">

            <div class="form-group col-md-3" >
                <input type="checkbox" id="laptop" onclick="setCheck(this)" <?php if(isset($_POST['laptop'])){if($_POST['laptop']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Laptop<br/>
            </div>


            <div class="form-group col-md-3" >
                <input type="checkbox" id="mp3" onclick="setCheck(this)" <?php if(isset($_POST['mp3'])){if($_POST['mp3']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Mp3 Player<br/>
            </div>

            <div class="form-group col-md-3" >
                <input type="checkbox" id="dc" onclick="setCheck(this)" <?php if(isset($_POST['dc'])){if($_POST['dc']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Daisy Player<br/>
            </div>

            <div class="form-group col-md-3" >
                <input type="checkbox" id="b_books" onclick="setCheck(this)" <?php if(isset($_POST['b_books'])){if($_POST['b_books']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Braille Books<br/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>


        <?php
    }

    if($_REQUEST['id_dt']==4){
        ?>
        <div class="row">
            <div class="form-group col-md-3" >
                <input type="checkbox" id="ear_device" onclick="setCheck(this)" <?php if(isset($_POST['ear_device'])){if($_POST['ear_device']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Hearing AID<br/>
            </div>

            <div class="form-group col-md-3" >
                <input type="checkbox" id="smart_phone" onclick="setCheck(this)" <?php if(isset($_POST['smart_phone'])){if($_POST['smart_phone']==1){echo 'checked';}}?>  style="font-size: 15px" value="0" >&nbsp;4G Smart Phone<br/>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>

        <?php
    }

    if($_REQUEST['id_dt']==11){
        ?>
        <div class="row">
            <div class="form-group col-md-3" >
                <input type="checkbox" id="wheel_chair" onclick="setCheck(this)" <?php if(isset($_POST['wheel_chair'])){if($_POST['wheel_chair']==1){echo 'checked';}}?>  style="font-size: 15px" value="0" >&nbsp;Battery Wheel Chair<br/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>
        <?php
    }

    if($_REQUEST['id_dt']==22){
        ?>
        <div class="row">
            <div class="form-group col-md-3" >
                <input type="checkbox" id="tlm" onclick="setCheck(this)" <?php if(isset($_POST['tlm'])){if($_POST['tlm']==1){echo 'checked';}}?> style="font-size: 15px" value="0" >&nbsp;Teacing & Learning Material (TLM)<br/>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Whether you have received any device in Last 3 Years</label>
                <div class="radio radio-warning col-md-6">
                    <input tabindex="8"  type="radio" id="yes1" onclick="$('#taken_device').val('1'),$('#div2').show()" name="taken_device"  value="1" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '1'){ echo 'checked="checked"';}}?>  /> <label for="male">Yes</label>
                </div>
                <div class="radio radio-success col-md-6" style="margin-top: 10px">
                    <input tabindex="9"  type="radio" id="no1" onclick="$('#taken_device').val('0'),$('#div2').hide()"  name="taken_device" value="0" <?php if(isset($_POST['taken_device'])){ if($_POST['taken_device'] == '0'){ echo 'checked="checked"';}}else{ echo 'checked="checked"';}?> />
                    <label for="female">No</label>
                </div>
                <input type="hidden" id="taken_device" value="<?php if(isset($_POST['taken_device'])){ echo $_POST['taken_device'] ;}else{ echo '0';}?> "  /> <br />

            </div>
        </div>

        <div id="div2" style="display: none">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Please enter the taken Device Details along with Date</label>
                    <textarea type="text" class="form-control" id="device_details" value=""><?php if(isset($_POST['device_details'])){echo $_POST['device_details'];}?></textarea>
                    <span class="error"><?php if(isset($_SESSION['error']['device_details'])){ echo $_SESSION['error']['device_details'];}?></span>
                </div>
            </div>
        </div>
        <?php
    }
	if($_REQUEST['id_dt'] == 'all')
	{
		
		
	}
 }

?>

