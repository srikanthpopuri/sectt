<?php
include('../include/session.php');
if(isset($_POST['van']))
{	
	
	?>
 <label for=""> Select Mandal </label>

   <select name="mandal_new" id="mandal_new" onChange="setState('ddd-new','<?php echo SECURE_PATH;?>public/ajax1.php','bus=1&district_new='+$('#district_new').val()+'&mandal_new='+$('#mandal_new').val())"  class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_mandals` WHERE district = '".$_POST['district_new']."'"); 
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

   <select name="village_new" id="village_new"   class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `global_panchayats` WHERE mandal = '".$_POST['mandal_new']."'"); 
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
