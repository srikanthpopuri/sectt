<?php

include('../include/session.php');

if(isset($_POST['van']))

{	

	

	?>

  <div class="form-group" >

 <label for=""> Select Block </label>



   <select name="lead_block" id="lead_block"    class="form-control"  onChange="changeits1($(this).val()),setState('sh_msg','<?php echo SECURE_PATH;?>lead/ajax.php','mode10=1&lead_tower='+$('#lead_tower').val()+'&lead_block='+$('#lead_block').val()+'&lead_floor='+$('#lead_floor').val()+'&lead_flattype='+$('#lead_flattype').val()+'&lead_flatno='+$('#lead_flatno').val())">

    <option value="">Select Block</option>

            <?php

		//echo "SELECT * FROM `block` WHERE block_tower= '".$_POST['van']."' ";

		$zSql = $database->query("SELECT * FROM `apartment` WHERE appt_tower= '".$_POST['van']."'");

		 

		if(mysqli_num_rows($zSql)>0)

		{ 

			while($zData = mysqli_fetch_array($zSql))

			{ 

			$query23=$database->query("select * from block where id='".$zData['appt_block']."'");

$fet_query23=mysqli_fetch_array($query23);

				?> 

                <option value="<?php echo $fet_query23['id'] ?>"><?php echo $fet_query23['block_name']?></option>

				

				<?php

			}

		}

		?>

   </select>

   </div>

    <?php

}



if(isset($_POST['bus']))

{	

	

	?>

  <div class="form-group" >



   <select name="lead_floor" id="lead_floor"    class="form-control"  onChange="changeits2($(this).val()),setState('sh_msg','<?php echo SECURE_PATH;?>lead/ajax.php','mode10=1&lead_tower='+$('#lead_tower').val()+'&lead_floor='+$('#lead_floor').val()+'&lead_flattype='+$('#lead_flattype').val()+'&lead_flatno='+$('#lead_flatno').val())"  >

    <option value="">Select Floor</option>

            <?php

		$zSql = $database->query("SELECT * FROM `apartment` WHERE appt_tower= '".$_POST['bus']."'  group by appt_floor  "); 

		if(mysqli_num_rows($zSql)>0)

		{ 

			while($zData = mysqli_fetch_array($zSql))

			{ 

			$query34=$database->query("select * from floors where id='".$zData['appt_floor']."'");

$fet_query34=mysqli_fetch_array($query34);

				?> 

                <option value="<?php echo $fet_query34['id'] ?>"><?php echo $fet_query34['floor_name']?></option>

				

				<?php

			}

		}

		?>

   </select>

   </div>

    <?php

}



if(isset($_POST['train']))

{	

	

	?>

  <div class="form-group" >


   <select name="lead_flattype" id="lead_flattype"    class="form-control" onChange=" setState('eee','<?php echo SECURE_PATH;?>lead/ajax.php','ship=1&lead_tower='+$('#lead_tower').val()+'&lead_floor='+$('#lead_floor').val()+'&lead_flattype='+$('#lead_flattype').val()),setState('sh_msg','<?php echo SECURE_PATH;?>lead/ajax.php','mode10=1&lead_tower='+$('#lead_tower').val()+'&lead_floor='+$('#lead_floor').val()+'&lead_flattype='+$('#lead_flattype').val()+'&lead_flatno='+$('#lead_flatno').val())"  >

    <option value="">Select Flat Type</option>

            <?php

		$zSql = $database->query("SELECT * FROM `apartment` WHERE appt_floor= '".$_POST['train']."' group by type  "); 

		if(mysqli_num_rows($zSql)>0)

		{ 

			while($zData = mysqli_fetch_array($zSql))

			{ 

			$query45=$database->query("select * from flattype where id='".$zData['type']."'");

$fet_query45=mysqli_fetch_array($query45);

$a=''; 

if($fet_query45['flat_type']=='2b')

{

	$a="2BHK";

}

elseif($fet_query45['flat_type']=='3b')

{

	$a="3BHK";

}

elseif($fet_query45['flat_type']=='4b')

{

	$a="4BHK";

}

elseif($fet_query45['flat_type']=='5b')

{

	$a="5BHK";

}

elseif($fet_query45['flat_type']=='6b')

{

	$a="6BHK";

}

				?> 

                <option value="<?php echo $fet_query45['id'] ?>"><?php echo $a."(".$fet_query45['flat_sft'].")"?></option>

				

				<?php

			}

		}

		?>

   </select>

   </div>

    <?php

}



if(isset($_POST['ship']))

{	

 $t='';

 $b='';

 $f='';

 $flt='';

 $t=$_REQUEST['lead_tower'];


 $f=$_REQUEST['lead_floor'];

 $flt=$_REQUEST['lead_flattype'];

 

 //echo $t."pp";

 //echo $b."qq";

 //echo $f."rr";

 //echo $flt."ss";

 	

	?>

  <div class="form-group" >

 <label for=""> Select FlatNo </label>



   <select name="lead_flatno" id="lead_flatno"   class="form-control" onchange="setState('sh_msg','<?php echo SECURE_PATH;?>lead/ajax.php','mode10=1&lead_tower='+$('#lead_tower').val()+'&lead_block='+$('#lead_block').val()+'&lead_floor='+$('#lead_floor').val()+'&lead_flattype='+$('#lead_flattype').val()+'&lead_flatno='+$('#lead_flatno').val())"   >

    <option value="">Select Flat No</option>

            <?php

		$zSql = $database->query("SELECT * FROM `apartment` WHERE appt_tower= '".$t."'and appt_floor = '".$f."' and type='".$flt."'"); 

		if(mysqli_num_rows($zSql)>0)

		{ 

			while($zData = mysqli_fetch_array($zSql))

			{ 



				?> 

                <option value="<?php echo $zData['flatno'] ?>"><?php echo $zData['flatno']; ?></option>

				

				<?php

			}

		}

		?>

   </select>

   </div>

    <?php

}



if(isset($_REQUEST['mode10']))

{

	

		$lead_tower=$_REQUEST['lead_tower'];


	$lead_floor=$_REQUEST['lead_floor'];

	$lead_flattype=$_REQUEST['lead_flattype'];

	$lead_flatno=$_REQUEST['lead_flatno'];

	//echo "select * from  apartment WHERE appt_tower= '".$lead_tower."' and appt_block ='".$lead_block."' and appt_floor = '".$lead_floor."' and type='".$lead_flattype."' ";

		 $check_appt=$database->query("select * from  apartment WHERE appt_tower= '".$lead_tower."' and appt_floor = '".$lead_floor."' and type='".$lead_flattype."' and flatno='".$lead_flatno."' ");

	   if(mysqli_num_rows($check_appt)>0)



	   {





		          while($ftch=mysqli_fetch_array($check_appt))



		          {

					

$check_leads=$database->query("select * from  lead WHERE lead_tower= '".$lead_tower."'and lead_floor = '".$lead_floor."' and lead_flattype='".$lead_flattype."' and lead_flatno='".$lead_flatno."' ");

$ftch99=mysqli_fetch_array($check_leads);

$currenttime=time();

                     

					   if($ftch['availabilitystatus']=="yes" && $ftch99['block_date']<$currenttime)

					   {

					    

//echo "";



					?>

                      <div class="form-group" style="color:#009933;">

    <label for="user">Selected Flat is Available</label>

    

    

  </div>

                    

                    <script type="text/javascript">

					$("#sh_submit").show();

					

					</script>

                    <?php 

			          

					   }

					   

					   elseif($ftch['availabilitystatus']=="yes" && $ftch99['block_date']>$currenttime)

					   

					   {

					?>

                    

                    <div class="form-group" style="color:#00F;">

    <label for="user">Selected Flat is Available but blocked till <?php echo date('d/m/Y', $ftch99['block_date']); ?></label>

    

    

  </div>

                    <script type="text/javascript">

					

					$("#sh_submit").hide();

					

					</script>

                    <?php   

						   

					   }

					   

					     elseif($ftch['availabilitystatus']=="no")

					   

					   {

						 					?>

               <div class="form-group" style="color:#F00;">

    <label for="user">Selected Flat is Not Available </label>

    

    

  </div>               

                                            

                    <script type="text/javascript">

					$("#sh_submit").hide();

					

					</script>

                    <?php   

					   } 

			   



		          }







	   }

	

}

if(isset($_REQUEST['mode_check']))

{

		$assigned_employee=$_REQUEST['assigned_employee'];



$check_username=$database->query("select * from createemployees where username='".$assigned_employee."'");

if(mysqli_num_rows($check_username)>0)

{		

?>		

    <div class="form-group" style="color:#009933;">

    <label for="user">Valid Employee Username</label>

    

    

  </div>

                      <script type="text/javascript">

					$("#sh_submit").show();

					

					</script>

  <?php   }  
  else  { ?>

                 <div class="form-group" style="color:#F00;">

    <label for="user">Please Enter Valid Employee Username </label>

    

    

  </div> 

                      <script type="text/javascript">

					$("#sh_submit").hide();

					

					</script>

    <?php

  }
  }



?>

