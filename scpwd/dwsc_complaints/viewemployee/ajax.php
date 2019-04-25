<?php
include('../include/session.php');
if(isset($_POST['van']))
{	
	
	?>
  <div class="form-group">
 <label for=""> Select Floor </label>

   <select name="flat_floor" id="flat_floor"  class="form-control">
    <option value="">Select</option>
            <?php
		
		$zSql = $database->query("SELECT * FROM `createtower` WHERE name = '".$_POST['van']."' group by name"); 
		if(mysqli_num_rows($zSql)>0)
		{ 
			while($zData = mysqli_fetch_array($zSql))
			{ 
				?> 
                <option value="<?php echo $zData['id'] ?>"><?php echo $zData['floor']?></option>
				
				<?php
			}
		}
		?>
   </select>
   </div>
    <?php
}
?>





























