<?php
include 'include/session.php';
?>

<script>
    function grabParam(){
        var params = '';
        $('input.selparam').each(function (){
            if($(this).is(':checked')){

                console.log($(this).val());
                params+= $(this).val()+",";

            }
        });
        return params;
    }

    function showButton(){
        var flag=0;
        $('input.selparam').each(function (){
            if($(this).is(':checked')){
                flag = 1;
            }
        });

        if(flag == 1){
            $('#rejectButton').show();
        }else{
            $('#rejectButton').hide();
        }
    }
</script>

<?php
if(isset($_REQUEST['reasons']))
{
    $q = $database->query("select * from reasons");
    while ($value = mysqli_fetch_array($q)) {
        ?>
        <input type="checkbox" onclick="showButton()" class="selparam" style="font-size: 15px" value="<?php echo $value['id'];?>"> <?php echo $value['reason'];?><br/>
        <?php
    }
    ?>
    <br/>

    <div id="rejectButton" style="display: none">
        <a class="btn btn-block btn-danger" data-dismiss="modal" style="width:125px;"  onClick="grabParam(),setState('adminForm','<?php echo SECURE_PATH.$_REQUEST['form'];?>/process.php','update_disable=1&appli_no=<?php echo $_REQUEST['appli_no'];?>&reasons='+grabParam())">Reject</a>
    </div>
    <?php
}
?>