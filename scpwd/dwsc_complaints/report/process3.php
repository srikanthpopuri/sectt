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
	$id = $_REQUEST['id'];
	 
	$sql=$database->query("select * from `update_customers` where unid='".$id."' order by timestamp desc");
	$rec=mysqli_fetch_array($sql);
	 $_POST1 = array_merge($_POST,$rec);
	 $_POST1['construction_stage'] = $rec['construction_stage'];
	
	?>
    <h3 align="center" style="color:#0088CC">Update Construction Stages</h3>             

    
   
   <div class="form-group">
<label for="Construction Stages">Construction Stages</label>

<select name="construction_stage" id="construction_stage1"   class="form-control" >
  <option value="">Select </option>
<?php
 $q=$database->query("SELECT * FROM `construction_stages`");
if($data_rows=mysqli_num_rows($q)>0){
		while($data=mysqli_fetch_array($q)){ ?>
<option value="<?php echo $data['id']?>"
<?php

if(isset($_POST1['construction_stage']))
{
	if($_POST1['construction_stage']==$data['id'])
	
echo 'selected="selected"';} ?>>
<?php echo ucwords($data['stagename'])?></option><?php }}?></select>
  

   </div>
   
   <div class="form-group" >
    <label for="customer">Amount</label>

    <input type="text" name="amount_paid" placeholder="Enter Amount"  class="form-control"  id="amount_paid" value="<?php if(isset($_POST['amount_paid'])){ echo $_POST['amount_paid'];}?>"  />
    <span class="error"><?php if(isset($_SESSION['error']['amount_paid'])){ echo $_SESSION['error']['amount_paid'];}?></span> 
  </div>
   
     <div class="form-group">
    <label for="remarks">Remarks</label>    
   <textarea  name="update_remarks" placeholder="Enter Remarks" class="form-control"  id="update_remarks"><?php if(isset($_POST['update_remarks'])){ echo $_POST['update_remarks'];}?></textarea>
    <span class="error"><?php if(isset($_SESSION['error']['update_remarks'])){ echo $_SESSION['error']['update_remarks'];}?></span>

</div>


<div class="form-group">
<a class="btn btn-info" onClick="setState('submitdata','<?php echo SECURE_PATH;?>customers/process.php','submitdt=1&unid=<?php echo $rec['unid'];?>&construction_stage='+$('#construction_stage1').val()+'&amount_paid='+$('#amount_paid').val()+'&update_remarks='+$('#update_remarks').val()+'')">Submit</a>

</div>
 <!--<div class="col-lg-6" style="width:600px;">
   <section class="panel">
                          
   <div class="panel-body" >
   <div class="timeline-messages">
                              
    <?php
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
   			
$tableName = '';
 //$qs = "SELECT * FROM `users` where username='".$_SESSION['username']."'";   
  //$result_sels = $database->query($qs);
//$data = mysqli_fetch_array($result_sels);

$condition="";

//$condition = "(resource='".$_REQUEST['vid']."' OR username='".$_REQUEST['vid']."') AND(resource='".$_SESSION['username']."' OR username='".$_SESSION['username']."')";
if(strlen($condition) > 0){
    $condition = 'WHERE '.$condition;
}
//$query_string = $_SERVER['QUERY_STRING'];

   $pagination = $session->showPagination(SECURE_PATH."lead/process.php?tableDisplay=1&",$tableName,$start,$limit,$page,$condition);
    $q = "SELECT * FROM $tableName ".$condition." ORDER BY `timestamp` DESC";   
    $result_sel = $database->query($q);
    $numres = mysqli_num_rows($result_sel);	
    $query = "SELECT * FROM $tableName ".$condition."  ORDER BY `timestamp` DESC LIMIT $start,$limit";
    $data_sel = $database->query($query);

if(($start+$limit) > $numres){
	 $onpage = $numres;
	 }
	 else{
	  $onpage = $start+$limit;
	 }
	 
	 
	 if($numres > 0){
	
	if(isset($_GET['page'])){
	if($_GET['page']==1)
	$i=1;
	else
	$i=(($_GET['page']-1)*50)+1;
	}else $i=1;
	
while($value = mysqli_fetch_array($data_sel))
{
	//$qsname = "SELECT * FROM `users` where employeeid='".$value['lead_referto']."'";   
   //$result_selsname = $database->query($qsname);
   //$dataname = mysqli_fetch_array($qsname);
	if(strlen($value['lead_source'])==0 && strlen($value['lead_referto'])==0 )
{
}
else{
	?>
<div class="msg-time-chat">
<div class="message-body msg-in">

<span class="arrow"></span>
    
<div class="text">

<p class="attribution">

<a href="#">

<?php
$query95=$database->query("select * from createemployees where username='".$value['lead_referto']."'");
$fet_query95=mysqli_fetch_array($query95);

$name= "".ucwords($value['lead_source'])."  To ".ucwords($fet_query95['name'])."";

?>

<?php
echo $name;
?>

</a>

<span style="color:#069;">
at &nbsp; <?php echo date('h:i A',$value['timestamp']);
?>, <?php echo date('d-M-Y',$value['timestamp']);
?>
</span>   

</p>
 
<p ><?php echo ucwords($value['lead_remarks']);?></p>
 
</div>
    
                                  
 </div>
</div>
<?php }}
?>
   
    
<div style="text-align:center"> <?php echo $pagination ;?></div>
<?php
	 }
else{
	?>
<div style="text-align:center">No Results Found</div>
    <?php
}

?>


                                  
</div>
   


</div>
</section>

</div>--> 
  
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

 
 

  
 
