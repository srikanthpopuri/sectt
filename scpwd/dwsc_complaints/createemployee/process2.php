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

	$username11 = $_REQUEST['username']; 

	$sql=$database->query("select * from `createemployees` where username='".$username11."'");
	$rec=mysqli_fetch_array($sql);
	
	
	?>

    <h3 align="center" style="color:#0088CC">Update Employee</h3>             




<div class="form-group" id="newct">

    <label for="cat_items">Assign to</label>

       <select name="assign_to" id="assign_to" class="form-control" >

        <option value="">Select</option>

             <?php

    $q=$database->query("SELECT * FROM `createemployees` ");

    if($data_rows=mysqli_num_rows($q)>0){

            while($data=mysqli_fetch_array($q)){?>

    <option value="<?php echo $data['username']?>"

    <?php

    if(isset($_POST['assign_to']))

    {

        if($_POST['assign_to']==$data['username'])

    echo 'selected="selected"';}?>

    ><?php echo ucwords($data['username'])?></option><?php }}?>

     </select>

       <span class="error"><?php if(isset($_SESSION['error']['assign_to'])){ echo $_SESSION['error']['assign_to'];}?></span>  

     </div>
     

     



<div class="form-group">

<a class="btn btn-info" onClick="changeits1($(this).val())">Update</a>

</div>


  </div>

  <div id="submitdata"></div>



  <br />

  <br />

  




 
<script type="text/javascript">

function changeits1(){
	

		setState('submitdata','<?php echo SECURE_PATH;?>createemployee/process.php','updateemployee_deactivate=1&username11=<?php echo $rec['username'];?>&assign_to='+$('#assign_to').val()+'');
	  
 }

</script>
 



  

 

