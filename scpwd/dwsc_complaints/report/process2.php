<?php

include('../include/session.php');

?>

<script>

			$(document).ready(function(){

				//Examples of how to assign the Colorbox event to elements

				$(".group1").colorbox({rel:'nofollow', transition:"fade", width:"70%"});

				

				$(".callbacks").colorbox({

					onOpen:function(){ alert('onOpen: colorbox is about to open'); },

					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },

					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },

					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },

					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }

				});



				$('.non-retina').colorbox({rel:'group5', transition:'none'})

				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});

				

				//Example of preserving a JavaScript event for inline calls.

				$("#click").click(function(){ 

					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");

					return false;

				});

			});

		</script>

        <?php

	$id = $_REQUEST['unid']; 

	$sql=$database->query("select * from `lead` where unid='".$id."'");

	$rec=mysqli_fetch_array($sql);
	
	
	
	$data=$database->query("SELECT * FROM `optional_pack` where id='".$rec['package']."'");
	$h1=mysqli_fetch_array($data);

	$data1=$database->query("SELECT * FROM `agegroup` where id='".$rec['agegroup']."'");
	$h2=mysqli_fetch_array($data1);
	
	$data2=$database->query("SELECT * FROM `profession` where id='".$rec['profession']."'");
	$h3=mysqli_fetch_array($data2);
	
	$data3=$database->query("SELECT * FROM `industry` where id='".$rec['industry']."'");
	$h4=mysqli_fetch_array($data3);
	
	$data4=$database->query("SELECT * FROM `interested` where id='".$rec['interested']."'");
	$h5=mysqli_fetch_array($data4);
 
 	$data66=$database->query("SELECT * FROM `country` where id='".$rec['country']."'");
	$h66=mysqli_fetch_array($data66);
	
	$data77=$database->query("SELECT * FROM `state` where id='".$rec['state']."'");
	$h77=mysqli_fetch_array($data77);
	
	$data88=$database->query("SELECT * FROM `city` where id='".$rec['city']."'");
	$h88=mysqli_fetch_array($data88);
	
	$data99=$database->query("SELECT * FROM `area` where id='".$rec['area']."'");
	$h99=mysqli_fetch_array($data99);


	?>

    <h3 align="center" style="color:#0088CC">Lead Details</h3>             


<b><p align="center" style="color:#000;">Generated on <span style="color:#F00;"><?php echo date('d-m-Y',$rec['timestamp']); ?></span></p></b>

    

   <table class="table table-striped table-bordered table-condensed table-hover" style="margin-bottom:20px;">



    <tr >

    <td><b>Source Lead</b></td>

    <td><?php echo ucwords($rec['source_lead']); ?></td>

 

     </tr>

         <tr >

    <td><b>Name</b></td>

    <td><?php echo ucwords($rec['name']); ?></td>

 

     </tr>
     
       <tr >

    <td><b>Country</b></td>

    <td><?php echo ucwords($h66['country']); ?></td>

 

     </tr>

         <tr >

    <td><b>Mobile</b></td>

    <td><?php echo $rec['mobile']; ?></td>

 

     </tr>

     

         <tr >

    <td><b>Alternate Mobile</b></td>

    <td><?php echo $rec['other_mobile']; ?></td>

 

     </tr>

         <tr >

    <td><b>E-Mail</b></td>

    <td><?php echo $rec['email']; ?></td>

 

     </tr>

         <tr >

    <td><b>Alternate E-Mail</b></td>

    <td><?php echo $rec['other_email']; ?></td>

 

     </tr>

     

         <tr >

      <?php

	  

	  $query11=$database->query("select * from createtower where id = '".$rec['lead_tower']."' ");

	  $fet_query11=mysqli_fetch_array($query11); 

	  

	  ?>   

    <td><b>Interested Tower</b></td>

    <td><?php echo $fet_query11['name']; ?></td>

 

     </tr>

     

         <tr>

         

            
               <?php

	  $query22=$database->query("select * from flattype where id = '".$rec['lead_flattype']."' ");

	  $fet_query22=mysqli_fetch_array($query22); 

	    $a=''; 

if($fet_query22['flat_type']=='2b')

{

	$a="2BHK";

}

elseif($fet_query22['flat_type']=='2.5b')

{

	$a="2.5BHK";

}

elseif($fet_query22['flat_type']=='3b')

{

	$a="3BHK";

}

elseif($fet_query22['flat_type']=='duplex')

{

	$a="duplex";

}


	  ?>

    <td><b>Interested Flat Type</b></td>

    <td><?php if(strlen($rec['lead_flattype'])>0){ echo $a."(".$fet_query22['flat_sft'].")"; }?></td>

 

     </tr>
     

              <tr >

    <td><b>Lead Status</b></td>

    <td><?php echo $rec['lead_status']; ?></td>

 

     </tr>

     

              <tr >

    <td><b>Reminder</b></td>

    <td><?php echo $rec['reminder']; ?></td>

 

     </tr>

     

              <tr >

    <td><b>Organization</b></td>

    <td><?php echo $rec['organization']; ?></td>

 

     </tr>

     

              <tr >

    <td><b>Client Address</b></td>

    <td><?php echo $rec['client_address']; ?></td>

 

     </tr>

     

  <tr >

    <td><b>City</b></td>

    <td><?php echo $h88['city']; ?></td>

 

     </tr>

     

  <tr >

    <td><b>Broker</b></td>

    <td><?php echo $rec['broker']; ?></td>

 

     </tr>

     

     

 
     

     

     <tr >

    <td><b>Assigned To Employee</b></td>

    <td><?php echo $rec['assigned_employee']; ?></td>

 

     </tr>

     

     

   <tr >

    <td><b>Is Investor</b></td>

    <td><?php echo $rec['is_investor']; ?></td>

 

     </tr>

   <tr >

    <td><b>Budget</b></td>

    <td><?php echo $rec['budget']; ?></td>

 

     </tr>

     

         <tr >

    <td><b>Preffered Floor</b></td>

    <td><?php echo $rec['preferred_floor']; ?></td>

 

     </tr>

     

       

     

         <tr >

    <td><b>State</b></td>

    <td><?php echo ucwords($h77['state']); ?></td>

 

     </tr> 

       <tr >

    <td><b>Optional Package</b></td>

    <td><?php echo ucwords($h1['package']); ?></td>

 

     </tr> 
    <tr >

    <td><b>Age Group</b></td>

    <td><?php echo ucwords($h2['agegroup']); ?></td>

 

     </tr> 
    <tr >

    <td><b>Profession</b></td>

    <td><?php echo ucwords($h3['profession']); ?></td>

 

     </tr> 
    <tr >

    <td><b>Industry</b></td>

    <td><?php echo ucwords($h4['industry']); ?></td>

 

     </tr> 
    <tr >

    <td><b>Interested</b></td>

    <td><?php echo ucwords($h5['interested']); ?></td>

 

     </tr> 
    <tr >

    <td><b>Area</b></td>

    <td><?php echo ucwords($rec['area']); ?></td>

 

     </tr> 
    <tr >

    <td><b>tentative closer date </b></td>

    <td><?php echo ucwords($rec['tentative']); ?></td>

 

     </tr> 

 <?php   
$i=1;
   $updateremark=$database->query("select * from `lead_update` where unid='".$id."'");
	while($recupdate=mysqli_fetch_array($updateremark))
	{
	?>
   <tr>
   <td><b>Updated Remarks-<?php  echo $i ;?></b></td>
   <td><?php echo $recupdate['remarks']; ?>(<?php echo $recupdate['username']; ?>-<?php echo date('d-m-Y H:i:s',$recupdate['timestamp']) ?>)</td>
   </tr>
   <?php
   $i++;
	}
  
?>
  

   </table>

   







  

  

  </div>

  <div id="submitdata"></div>



  <br />

  <br />

  

<script type="text/javascript">

$( ".datePicker" ).datepicker({

			changeMonth: true,

			changeYear: true,

			dateFormat: "d-m-yy",

			yearRange: "1920:2025"	 

		});

 

</script>



 

 



  

 

