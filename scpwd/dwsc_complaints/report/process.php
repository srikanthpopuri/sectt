<?php



include('../include/session.php');







if(!$session->logged_in){



?>



<script type="text/javascript">



setStateGet('main','<?php echo SECURE_PATH;?>login_process.php','loginForm=1');



</script>







<?php



}



?><script>



			$(document).ready(function(){



				//Examples of how to assign the Colorbox event to elements



				$(".group1").colorbox({rel:'nofollow', transition:"fade",width:"450px"});



				



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



//Metircs Forms, Tables and Functions



//Display users form



if(isset($_POST['reject']))



{



	



	



	$q1="UPDATE `receipt` SET project_title='".$_REQUEST['acc']."',amount='".$_REQUEST['amount']."',d_o_receive='".strtotime($_REQUEST['dt'])."',description='".$_REQUEST['desc']."',timestamp='".time()."' where id='".$_REQUEST['rec_id']."'";



	







  $a=$database->query($q1);	?>



   <div class="alert alert-success ">Record updated successfully!</div>



		



		



  <script type="text/javascript">







window.setTimeout(function() 



        {



			animateForm('<?php echo SECURE_PATH;?>leads_report/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');



        



           parent.$.colorbox.close();



        }, 1000);



        



        </script> 



	<?php



	



	



}



if(isset($_REQUEST['addForm'])){}







//Process and Validate POST data



if(isset($_POST['validateForm'])){}







//Delete users 



if(isset($_GET['rowDelete']))

{



	



	$database->query("DELETE FROM customers WHERE id = '".$_GET['rowDelete']."'");



	?>



   <div class="alert alert-success ">Record deleted successfully!</div>



  



  <script type="text/javascript">







animateForm('<?php echo SECURE_PATH;?>leads_report/process.php','addForm=1','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');



</script>



   <?php 



}







//Display users



if(isset($_GET['tableDisplay'])){











//Pagination code



  $limit=50;



   if(isset($_GET['page']))



   {



      $start = ($_GET['page'] - 1) * $limit;     //first item to display on this page



      $page=$_GET['page'];



   }



   else



   {



	   $start = 0;      //if no page var is given, set start to 0



		$page=0;



   }



$tableName = 'lead l';



$condition='';

if($session->userlevel==9 || $session->userlevel==8 || $session->userlevel==6)

{

	$condition='';

}

else if($session->userlevel==7)

{

	

$condition= "(l.assigned_employee= '".$_SESSION['username']."' || l.username='".$_SESSION['username']."')";

}





	







if(isset($_GET['val'])){







	if((strlen($_REQUEST['fromdate']) > 0) && (strlen($_REQUEST['todate']) > 0)){



	if(strlen($condition) > 0){



	   $condition.= " and ";



	}



	    $fromTime = strtotime($_REQUEST['fromdate']);



	



		$toTime = strtotime($_REQUEST['todate']. '23:59');







    $condition.= "(l.timestamp BETWEEN '".$fromTime."' and '".$toTime."')";







  }



else{



	



  if(strlen($_REQUEST['fromdate']) > 0){



	if(strlen($condition) > 0){



	   $condition.= " and ";



	}



	$fromTime = strtotime($_REQUEST['fromdate']);



    



	$condition.= "(l.timestamp > '".$fromTime."')";







  }



  if(strlen($_REQUEST['todate']) > 0){



	  



	  



	if(strlen($condition) > 0){



	   $condition.= " and ";



	}



	$toTime = strtotime($_REQUEST['todate']. '23:59');



  



  	$condition.= "(l.timestamp < '".$toTime."')";







  }



  



}



	



 if(strlen($_REQUEST['source_lead'])==0){}



else



{



	if(strlen($condition) > 0){



		$condition.= " and ";



	}



	



	$condition.= "l.source_lead = '".$_REQUEST['source_lead']."'";



}



if(strlen($_REQUEST['lead_status'])==0){}



else



{



	if(strlen($condition) > 0){



		$condition.= " and ";



	}



	$condition.= " l.lead_status='".$_REQUEST['lead_status']."'";



}















if(strlen($_REQUEST['lead_tower'])>0 ){



   if(strlen($condition) > 0){



		$condition.= " and ";

		

//$selectquery=$database->query("select * from `createtower` where id='".$_REQUEST['lead_tower']."'");

//$selectfetch=mysqli_fetch_array($selectquery);



	}



	$condition.= "l.lead_tower='".$_REQUEST['lead_tower']."'";





	}



if(strlen($_REQUEST['lead_floor'])>0 ){



   if(strlen($condition) > 0){



		$condition.= " and ";

		



	}



	$condition.= "l.lead_floor='".$_REQUEST['lead_floor']."'";





	}



if(strlen($_REQUEST['lead_flattype'])>0 ){



   if(strlen($condition) > 0){



		$condition.= " and ";

		



	}



	$condition.= "l.lead_flattype='".$_REQUEST['lead_flattype']."'";





	}

	

if(strlen($_REQUEST['budget'])>0 ){



   if(strlen($condition) > 0){



		$condition.= " and ";

		



	}



	$condition.= "l.budget='".$_REQUEST['budget']."'";





	}





//if(strlen($_REQUEST['package'])>0 ){



  // if(strlen($condition) > 0){



		//$condition.= " and ";

		



	//}



	//$condition.= "l.package='".$_REQUEST['package']."'";





	//}

	if(strlen($_REQUEST['industry'])>0 ){



   if(strlen($condition) > 0){



		$condition.= " and ";

		



	}



	$condition.= "l.industry='".$_REQUEST['industry']."'";





	}

	

	//if(strlen($_REQUEST['area'])>0 ){



   //if(strlen($condition) > 0){



		//$condition.= " and ";

		



	//}



	//$condition.= "l.area='".$_REQUEST['area']."'";





	//}





if(strlen($_REQUEST['username'])>0 )

{



   if(strlen($condition) > 0){



		$condition.= " and ";

		



	}



	$condition.= "(l.assigned_employee= '".$_REQUEST['username']."' || l.username='".$_REQUEST['username']."')";





	}

	

	//////

if(strlen($_REQUEST['agegroup'])>0 ){



   if(strlen($condition) > 0){



		$condition.= " and ";



		



	}



	$condition.= "agegroup='".$_REQUEST['agegroup']."'";





	}

	

	

if(strlen($_REQUEST['profession'])>0 ){



   if(strlen($condition) > 0){



		$condition.= " and ";



		



	}



	$condition.= "profession='".$_REQUEST['profession']."'";





	}





}



if(strlen($condition) > 0)

{



    $condition = 'WHERE '.$condition;



}







$pagination = $session->showPagination(SECURE_PATH."lead_reports/process.php?tableDisplay=1&",$tableName,$start,$limit,$page,$condition);





//echo "SELECT * FROM $tableName ".$condition." ";


//echo "SELECT * FROM $tableName ".$condition." ";
$q = "SELECT * FROM $tableName ".$condition." ";  



   $result_sel = $database->query($q);



   $numres = mysqli_num_rows($result_sel);



   //echo "SELECT * FROM $tableName ".$condition." ORDER BY `id` ASC LIMIT $start,$limit";



  $query = "SELECT * FROM $tableName ".$condition."";





  $data_sel = $database->query($query);







if(($start+$limit) > $numres){



	 $onpage = $numres;



	 }



	 else{



	  $onpage = $start+$limit;



	 }

 



	 if($numres > 0){



				echo '<h4><p  class="pull-right label label-info" >Showing '.($start+1).' - '.($onpage).' results out of '.$numres.'</p></h4>'; 

 



	?>



<br />







<?php if($session->userlevel=='6' || $session->userlevel=='7' || $session->userlevel=='8' || $session->userlevel=='9')  

{

?>



<table align="center"><tr><td> <a class="btn btn-success" target="_blank" href="<?php echo SECURE_PATH;?>leads_report/excel.php?condition=<?php echo $query; ?>"> Click for excel report</a></td>



</tr></table>



<?php  } else {?>



<?php }?>











<br />





<table class="table table-striped table-bordered table-condensed table-hover" style="width:1100px;">



    <tr><th>Sno</th><th>Name</th><th>Mobile</th><th>Assigned to</th><th>Lead Creation Date</th><th>Reminder Date</th><th>Source of the lead</th><th>Lead Stage</th><th>View More</th>



 </tr>



	<?php



	if(isset($_GET['page'])){



	if($_GET['page']==1)



	$i=1;



	else



	$i=(($_GET['page']-1)*50)+1;



	}else $i=1;



	



while($value = mysqli_fetch_array($data_sel))



{  







?><tr>



    <td><?php echo $i;?></td>



     <td><?php echo ucwords($value['name']);?></td>



      <td><?php echo ucwords($value['mobile']);?></td>

      

	<td><?php echo ucwords($value['assigned_employee']);?></td>

    <td><?php echo date('d-m-Y',$value['timestamp']);?></td>

    <td><?php echo $value['reminder'];?></td>

      

      <td><?php echo ucwords($value['source_lead']);?></td>

      <td><?php echo ucwords($value['lead_status']);?></td>



    



<td><a class="group1 btn btn-sm btn-warning"  href="<?php echo SECURE_PATH;?>leads_report/process2.php?unid=<?php echo $value['unid'];?>">View More</a></td>



    



     



<!--<td>



       <a class="group1 btn btn-sm btn-primary"  href="<?php echo SECURE_PATH;?>receipt/process2.php?id=<?php echo $value['id'];?>"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-sm btn-danger" onClick="confirmDelete('adminForm','<?php echo SECURE_PATH;?>receipt/process.php','rowDelete=<?php echo $value['id'];?>')"><i class="fa fa-trash"></i> Delete</a></td>-->

</tr><?php $i++;



}



	?>



    



    </table>









    



    



	<?php



	 }



else{



	?>



    <div style="text-align:center">No Results Found</div>



    <?php



}







}







?><style>



#messagesList {



   max-height: 1000px;



  background: whitesmoke;



  overflow: auto;



  margin: 0 auto;



  padding: 1em;



  font: 100%/1.4 serif;



  border: 1px solid rgba(0,0,0,0.25)



}



</style>







<style>



.scrolllx {



    overflow-y: scroll;



	overflow-x: scroll;



  width: 1250px;



    height: 300px;



	  



}



</style>