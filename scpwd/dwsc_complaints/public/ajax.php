<?php
include('../include/session.php');
if(isset($_POST['van']))
{	
	
	?>
 <label for=""> Select Mandal </label>

   <select name="mandal_ren" id="mandal_ren" onChange="setState('ddd','<?php echo SECURE_PATH;?>public/ajax.php','bus=1&district='+$('#district').val()+'&mandal_ren='+$('#mandal_ren').val())"  class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_mandals` WHERE district = '".$_POST['district']."'"); 
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

   <select name="village_ren" id="village_ren"   class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_panchayats` WHERE mandal = '".$_POST['mandal_ren']."'"); 
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



if(isset($_POST['van_pres']))
{	
	
	?>
 <label for=""> Select Mandal </label>

   <select name="mandal_pres" id="mandal_pres" onChange="setState('ddd-p','<?php echo SECURE_PATH;?>public/ajax.php','bus_pres=1&district_pres='+$('#district_pres').val()+'&mandal_pres='+$('#mandal_pres').val())"  class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_mandals` WHERE district = '".$_POST['district_pres']."'"); 
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

if(isset($_POST['bus_pres']))
{	
	
	?>
 <label for=""> Select Panchayat </label>

   <select name="village_pres" id="village_pres"   class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_panchayats` WHERE mandal = '".$_POST['mandal_pres']."'"); 
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




if(isset($_POST['van_sp']))
{	
	
	?>
 <label for=""> Select Mandal </label>

   <select name="mandal_sp" id="mandal_sp" onChange="setState('ddd-sp','<?php echo SECURE_PATH;?>public/ajax.php','bus_sp=1&district_sp='+$('#district_sp').val()+'&mandal_sp='+$('#mandal_sp').val())"  class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_mandals` WHERE district = '".$_POST['district_sp']."'"); 
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

if(isset($_POST['bus_sp']))
{	
	
	?>
 <label for=""> Select Panchayat </label>

   <select name="village_sp" id="village_sp"   class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_panchayats` WHERE mandal = '".$_POST['mandal_sp']."'"); 
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




if(isset($_POST['legal']))
{
if($_POST['disability_type'] == 7)	
{
	?>
   <div class="col-md-4 col-xs-12">
            <label for="dry_land">Legal Guardian (If Any)</label>
            <input type="text" class="form-control" id="guardian_name" onkeypress="return onlyAlphabets(event,$(this))" name="guardian_name" value="<?php if(isset($_POST['guardian_name'])){echo $_POST['guardian_name'];}?>">
            <span class="error" id="guardian_name_err" style="display: none">* Please Enter Guardian Name</span>
        </div> 
    
    <?php
	
	
}else{ ?>
	<div class="col-md-4 col-xs-12">
            <label for="dry_land">Guardian Name</label>
            <input type="text" class="form-control" id="guardian_name" onkeypress="return onlyAlphabets(event,$(this))" name="guardian_name" value="<?php if(isset($_POST['guardian_name'])){echo $_POST['guardian_name'];}?>">
            <span class="error" id="guardian_name_err" style="display: none">* Please Enter Guardian Name</span>
        </div>
	
<?php }
	
	
}

?>
