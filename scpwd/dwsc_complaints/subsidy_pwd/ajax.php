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





























