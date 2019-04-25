<?php
include('../include/session.php');
if(isset($_POST['van']))
{	
	
	?>
 <label for=""> Select Mandal </label>

   <select name="e_mandal" id="e_mandal" onChange="setState('ddd','<?php echo SECURE_PATH;?>ddns_form/ajax.php','bus=1&e_district='+$('#e_district').val()+'&e_mandal='+$('#e_mandal').val())"  class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_mandals` WHERE district = '".$_POST['e_district']."'"); 
		if(mysqli_num_rows($zSql)>0)
		{ 
			while($zData = mysqli_fetch_array($zSql))
			{ 
				?> 
                <option value="<?php echo $zData['uid'] ?>"><?php echo $zData['mandal']?></option>
				
				<?php
			}
		}
		?>
   </select>
   
    <?php
}

if(isset($_POST['bus']))
{	
	
	?>
 <label for=""> Select Panchayat </label>

   <select name="e_village" id="e_village"  class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_panchayats` WHERE mandal = '".$_POST['e_mandal']."'"); 
		if(mysqli_num_rows($zSql)>0)
		{ 
			while($zData = mysqli_fetch_array($zSql))
			{ 
				?> 
                <option value="<?php echo $zData['uid'] ?>"><?php echo $zData['panchayat']?></option>
				
				<?php
			}
		}
		?>
   </select>
   
    <?php
}

?>

<?php

if(isset($_POST['mode10']))
{
	
	
$forward_type = '';
$forward_type = $_REQUEST['forward_type'];
if($forward_type == 1)
{
?>

  <div class="row">
     <div class="form-group col-md-4">

              <label for="cat_items">Select DWO</label>

              <select name="forward_to" id="forward_to"  class="form-control">
                <option value="">Select</option>

                <?php

                $q=$database->query("SELECT * FROM `global_districts`");

                if($data_rows=mysqli_num_rows($q) > 0){

                  while($data=mysqli_fetch_array($q)){ ?>

                    <option value="<?php echo $data['uid']?>"

                      <?php

                      if(isset($_POST['e_district']))
                      {

                       if($_POST['e_district']==$data['uid'])

                        echo 'selected="selected"';
                    }?>

                    ><?php echo ucwords($data['district']." - DWO");?>

                    </option><?php }}?>

                  </select>


                </div>
     </div>
        <div class="row">

     <div class="form-group col-md-4" >
      <label for="reasons">Reasons</label>
      <textarea name="reasons" id="reasons99" class="form-control"><?php if(isset($_POST['reasons'])){echo $_POST['reasons'];}?></textarea>
      <span class="error"><?php if(isset($_SESSION['error']['reasons'])){ echo $_SESSION['error']['reasons'];}?></span>
    </div>
    </div>
<script type="text/javascript">

$('#two').hide();
</script>
<?php	
	
	
}
elseif($forward_type == 2){
?>
<div class="row">
  <div class="col-md-4 col-xs-12">
  <label for="dry_land">Enter Department Name</label>
            <input type="text" class="form-control" placeholder="Enter Department Name" id="department_name" name="department_name" value="<?php if(isset($_POST['department_name'])){echo $_POST['department_name'];}?>">
  
  </div>
  </div>
<div class="row">
    <div class="form-group col-md-4" >
      <label for="reasons">Reasons</label>
      <textarea name="other_reasons" id="other_reasons" class="form-control"><?php if(isset($_POST['other_reasons'])){echo $_POST['other_reasons'];}?></textarea>
    </div>
    </div>

<script type="text/javascript">

$('#one').hide();
</script>
<?php	
	
	
}
	
	
	
	
	
	
}

if(isset($_POST['mode11']))
{
	
	
	
$close_reassign = '';
$close_reassign = $_REQUEST['close_reassign'];
if($close_reassign == 1)
{
?>

  <div class="row" style="display:none;">
     <div class="form-group col-md-4">

              <label for="cat_items">Select DWO</label>

              <select name="forward_to" id="forward_to"  class="form-control">
                <option value="">Select</option>

                <?php

                $q=$database->query("SELECT * FROM `global_districts`");

                if($data_rows=mysqli_num_rows($q) > 0){

                  while($data=mysqli_fetch_array($q)){ ?>

                    <option value="<?php echo $data['uid']?>"

                      <?php

                      if(isset($_POST['e_district']))
                      {

                       if($_POST['e_district']==$data['uid'])

                        echo 'selected="selected"';
                    }?>

                    ><?php echo ucwords($data['district']." - DWO");?>

                    </option><?php }}?>

                  </select>


                </div>
     </div>
        <div class="row">

     <div class="form-group col-md-4" >
      <label for="reasons">Enter Closing Comments</label>
      <textarea name="reasons" id="reasons99" class="form-control"><?php if(isset($_POST['reasons'])){echo $_POST['reasons'];}?></textarea>
      <span class="error"><?php if(isset($_SESSION['error']['reasons'])){ echo $_SESSION['error']['reasons'];}?></span>
    </div>
    </div>
<script type="text/javascript">

$('#two').hide();
</script>
<?php	
	
	
}
elseif($close_reassign == 2){
?>

<div class="row">
    <div class="form-group col-md-4" >
  <label for="dry_land">Enter Re-Assign Comments</label>
      <textarea name="reasons" id="reasons99" class="form-control"><?php if(isset($_POST['reasons'])){echo $_POST['reasons'];}?></textarea>
    </div>
    </div>

<script type="text/javascript">

$('#one').hide();
</script>
<?php	
	
	
}
	
	
	
	
	
	

	
	
}




?>



























