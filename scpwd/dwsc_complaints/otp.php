<?php
include 'include/session.php';


if(isset($_REQUEST['OTPDetails']))
{
    
    $_SESSION['otp'] = rand(1111,9999).rand(11,99);

    $sms = "Dear Citizen, Your One Time Password (OTP) is ".$_SESSION['otp']." for Edit Form
 - DWSC";

    sendsms(SMS_USER,SMS_PASSWORD,$sms,SMS_SID,$_REQUEST['mobile']);

    ?>

    <div id="otperror">

    <h3>OTP Verification</h3>
    <p>We have sent you a One Time Password (OTP) for verification to your registered Mobile no +91XXXXXX<?php echo substr($_REQUEST['mobile'],-4);?>. Enter the 6-digit password to process your request</p>
    <hr />

    <form role="form">

            <div class="row">
                <div class="form-group col-md-3" >
                    <label>Enter OTP</label>
                    <input type="text" name="otp" id="otp" value="" />
                    <span class="error"></span>
                </div>
                <div class="col-md-9">
                </div>
            </div>
            <p>Click on Resend if you do not receive OTP</p>
            <div class="row">

                <div class="form-group col-md-3">
                    <a class="btn btn_primary" onClick="setState('otperror','<?php echo SECURE_PATH;?>otp.php','verifyOTP=1&otp='+$('#otp').val()+'&form_id=<?php echo $_REQUEST['form_id'];?>&mobile=<?php echo $_REQUEST['mobile'];?>&page=<?php echo $_REQUEST['page'];?>')">Verify</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn_danger" onClick="setState('otperror','<?php echo SECURE_PATH;?>otp.php','resendCOtp=1&form_id=<?php echo $_REQUEST['form_id'];?>&mobile=<?php echo $_REQUEST['mobile'];?>&page=<?php echo $_REQUEST['page'];?>')">Resend OTP</a>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            setTimeout(function(){ $('#resend').removeClass('disabled'); },90000);
        </script>


    </form>

    </div>
    <?php
}

if(isset($_REQUEST['verifyOTP'])){

    if($_REQUEST['otp'] == $_SESSION['otp']){
        ?>
        <script>
            window.location = '<?php echo SECURE_PATH;?>public/<?php echo $_REQUEST['page'];?>?addForm=2&editform=<?php echo $_REQUEST['form_id'];?>';
        </script>
        <?php
        unset($_SESSION['otp']);
    }
    else{
        ?>

        <h3>OTP Verification</h3>
        <p>We have sent you a One Time Password (OTP) for verification to your registered Mobile no +91XXXXXX<?php echo substr($_REQUEST['mobile'],-4);?>. Enter the 6-digit password to process your request</p>
        <hr />

        <div class="row">
            <div class="form-group col-md-3" >
                <label>Enter OTP</label>
                <input type="text" name="otp" id="otp" value="" />
                <span class="error">* Invalid OTP</span>
            </div>
            <div class="col-md-9">
            </div>
        </div>
        <p>Click on Resend if you do not receive OTP</p>
        <div class="row">

            <div class="form-group col-md-3">
                <a class="btn btn_primary" onClick="setState('otperror','<?php echo SECURE_PATH;?>otp.php','verifyOTP=1&otp='+$('#otp').val()+'&form_id=<?php echo $_REQUEST['form_id'];?>&mobile=<?php echo $_REQUEST['mobile'];?>&page=<?php echo $_REQUEST['page'];?>')">Verify</a>
            </div>
            <div class="col-md-3">
                <a class="btn btn_danger" onClick="setState('otperror','<?php echo SECURE_PATH;?>otp.php','resendCOtp=1&form_id=<?php echo $_REQUEST['form_id'];?>&mobile=<?php echo $_REQUEST['mobile'];?>&page=<?php echo $_REQUEST['page'];?>')">Resend OTP</a>
            </div>
        </div>

        <?php
    }
}

if(isset($_REQUEST['resendCOtp'])){

    $_SESSION['otp'] = rand(1111,9999).rand(11,99);

    $sms = "Dear Citizen, Your One Time Password (OTP) is ".$_SESSION['otp']." for Edit Form
 - DWSC";

    sendsms(SMS_USER,SMS_PASSWORD,$sms,SMS_SID,$_REQUEST['mobile']);
    ?>

    <div id="otperror">

    <h3>OTP Verification</h3>
    <p>We have resent you a One Time Password (OTP) for verification to your registered Mobile no +91XXXXXX<?php echo substr($_REQUEST['mobile'],-4);?>. Enter the 6-digit password to process your request</p>
    <hr />

    <form role="form">

            <div class="row">
                <div class="form-group col-md-3" >
                    <label>Enter OTP</label>
                    <input type="text" name="otp" id="otp" value="" />
                    <span class="text-error"></span>
                </div>
                <div class="form-group col-md-9" >
                </div>
            </div>
            <p>Click on Resend if you do not receive OTP</p>
            <div class="row">
                <div class="form-group col-md-3">
                    <a class="btn btn_primary" onClick="setState('otperror','<?php echo SECURE_PATH;?>otp.php','verifyOTP=1&otp='+$('#otp').val()+'&form_id=<?php echo $_REQUEST['form_id'];?>&mobile=<?php echo $_REQUEST['mobile'];?>&page=<?php echo $_REQUEST['page'];?>')">Verify</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn_danger" onClick="setState('otperror','<?php echo SECURE_PATH;?>otp.php','resendCOtp=1&form_id=<?php echo $_REQUEST['form_id'];?>&mobile=<?php echo $_REQUEST['mobile'];?>&page=<?php echo $_REQUEST['page'];?>')">Resend OTP</a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            setTimeout(function(){ $('#resend').removeClass('disabled'); },90000);
        </script>

    </form>

    </div>
    <?php
}


function sendsms($user,$pass,$msg,$sender,$mobile){


    $mobile = '91'.substr($mobile,-10);

    $url = "http://www.onlinebulksmslogin.com/spanelv2/api.php?username=".$user."&password=".$pass."&to=".$mobile."&from=".$sender."&message=".urlencode($msg);    //Store data into URL variable

    return $ret = @file($url);
}

?>
