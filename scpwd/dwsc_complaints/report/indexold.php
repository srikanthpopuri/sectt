<?php

include('../include/session.php');



if(!$session->logged_in){

?>

<script type="text/javascript">

window.location = '<?php echo SECURE_PATH?>';

</script>



<?php

}

else{

?>

<script type="text/javascript">

function myfun(it){

	 

	 

	 setState('ret','<?php echo SECURE_PATH;?>balancesheet/ajax.php','type='+it);

 }

</script>

<style>
.scrolll {
      overflow-y: scroll;
    width: 180px;
    height: 50px;
}
</style>
   



<section class="wrapper">

              <!-- page start-->

              <div class="row">

                <div class="col-sm-12">

             

        







<section class="panel">

      

                          <header class="panel-heading" >

<b style="color:#C36;">Lead Reports </b>

                          </header>

                          <div class="panel-body">



<form class="form-inline" role="form" id="searchForm" style="text-align:center;">

  

  

  <div class="form-group" >



   <table align="center">

  <tr>

  <td>

<input type="text" placeholder="From Date" class="form-control datePicker" style="width:200px;" name="fromdate" id="fromdate"  value=""  />

   

 

  </td>

  <td>

<input type="text" placeholder="To Date" class="form-control datePicker" style="width:200px;" name="todate" id="todate"  value=""  />

   

 

  </td>



  <td>
  <select name="source_lead" id="source_lead"  class="form-control" style="width:200px;">
    <option value="">Select source lead</option>
    <?php
 $q=$database->query("SELECT * FROM `campaign` order by category asc");
if($data_rows=mysqli_num_rows($q)>0){
		while($datad=mysqli_fetch_array($q)){?>
<option value="<?php echo $datad['category']?>"
<?php
if(isset($_POST['source_lead']))
{
	if($_POST['source_lead']==$datad['category'])
	
echo 'selected="selected"';}?>
><?php echo ucwords($datad['category'])?></option><?php }}?>

</select>


  </td>

<td>

<select name="lead_tower" id="lead_tower" class="form-control" style="width:200px;" >

  <option value="">Tower</option>

<?php $q=$database->query("SELECT * FROM `createtower`");

if($data_rows=mysqli_num_rows($q)>0){

		while($data=mysqli_fetch_array($q)){ ?>

<option value="<?php echo $data['id']?>"

<?php



if(isset($_POST['lead_tower']))

{

	if($_POST['lead_tower']==$data['id'])

	

echo 'selected="selected"';} ?>>

<?php echo ucwords($data['name'])?></option><?php }}?></select>

  
  </td>
 
 <td>

<select name="lead_floor" id="lead_floor" class="form-control" style="width:200px;" >

  <option value="">Floor</option>

<?php $q=$database->query("SELECT * FROM `floors` group by floor_name");

if($data_rows=mysqli_num_rows($q)>0){

		while($data=mysqli_fetch_array($q)){ ?>

<option value="<?php echo $data['id']?>"

<?php



if(isset($_POST['lead_floor']))

{

	if($_POST['lead_floor']==$data['id'])

	

echo 'selected="selected"';} ?>>

<?php echo ucwords($data['floor_name'])?></option><?php }}?></select>

  
  </td>

  
  
  

  </tr>

  </table>

  <br />

 

  <table align="center">

  <tr>

<td><select name="lead_flattype" id="lead_flattype" class="form-control" style="width:200px;" >

  <option value="">Flat Type</option>

<?php $q=$database->query("SELECT * FROM `flattype` group by flat_type");

if($data_rows=mysqli_num_rows($q)>0){

		while($data=mysqli_fetch_array($q)){ ?>

<option value="<?php echo $data['id']?>"

<?php



if(isset($_POST['lead_flattype']))

{

	if($_POST['lead_flattype']==$data['id'])

	

echo 'selected="selected"';} ?>>

<?php echo ucwords($data['flat_type'])?></option><?php }}?></select></td>








  <td>
 <select  name="lead_status" id="lead_status" class="form-control" style="width:200px;">

    <option value="">Lead Stage</option>

<option value="new" <?php if(isset($_POST['lead_status'])){ if($_POST['lead_status'] == "new"){ echo ' selected="selected"';}}?>>New</option>

<option value="suspect" <?php if(isset($_POST['lead_status'])){ if($_POST['lead_status'] == "suspect"){ echo ' selected="selected"';}}?>>Suspect</option>

<option value="prospect" <?php if(isset($_POST['lead_status'])){ if($_POST['lead_status'] == "prospect"){ echo ' selected="selected"';}}?>>Prospect</option>

<option value="negotiation" <?php if(isset($_POST['lead_status'])){ if($_POST['lead_status'] == "negotiation"){ echo ' selected="selected"';}}?>>Negotiation</option>
<option value="blocked" <?php if(isset($_POST['lead_status'])){ if($_POST['lead_status'] == "blocked"){ echo ' selected="selected"';}}?>>Blocked</option>
<option value="saledone" <?php if(isset($_POST['lead_status'])){ if($_POST['lead_status'] == "saledone"){ echo ' selected="selected"';}}?>>Sale done</option>
<option value="dropped" <?php if(isset($_POST['lead_status'])){ if($_POST['lead_status'] == "dropped"){ echo ' selected="selected"';}}?>>Dropped</option>





</select>


   

 

  </td>

  <td>

<select name="agegroup" id="agegroup" class="form-control" style="width:200px;" >

  <option value="">Age Group</option>

<?php $q=$database->query("SELECT * FROM `agegroup`");

if($data_rows=mysqli_num_rows($q)>0){

		while($data=mysqli_fetch_array($q)){ ?>

<option value="<?php echo $data['agegroup']?>"

<?php



if(isset($_POST['agegroup']))

{

	if($_POST['agegroup']==$data['agegroup'])

	

echo 'selected="selected"';} ?>>

<?php echo ucwords($data['agegroup'])?></option><?php }}?></select>

   

 

  </td>



<td>





   
<select name="profession" id="profession" class="form-control" style="width:200px;" >

  <option value="">profession</option>

<?php $q=$database->query("SELECT * FROM `profession`");

if($data_rows=mysqli_num_rows($q)>0){

		while($data=mysqli_fetch_array($q)){ ?>

<option value="<?php echo $data['id']?>"

<?php



if(isset($_POST['profession']))

{

	if($_POST['profession']==$data['id'])

	

echo 'selected="selected"';} ?>>

<?php echo ucwords($data['profession'])?></option><?php }}?></select>

  </td>

  <td>
<input type="text" placeholder="Search By Area" class="form-control course3" style="width:200px;" name="area" id="area"  value=""  />
   
 
  </td>

  

  </tr></table>

<table align="center">
<tr>
<td>

<select name="budget" id="budget" class="form-control" style="width:200px;" >

  <option value="">Select Budget</option>

<?php $q=$database->query("SELECT * FROM `budget` group by budget");

if($data_rows=mysqli_num_rows($q)>0){

		while($data=mysqli_fetch_array($q)){ ?>

<option value="<?php echo $data['id']?>"

<?php



if(isset($_POST['budget']))

{

	if($_POST['budget']==$data['id'])

	

echo 'selected="selected"';} ?>>

<?php echo ucwords($data['budget'])?></option><?php }}?></select>

  
  </td>

<td>

<select name="package" id="package" class="form-control" style="width:200px;" >

  <option value="">Optional package</option>

<?php $q=$database->query("SELECT * FROM `optional_pack` group by package");

if($data_rows=mysqli_num_rows($q)>0){

		while($data=mysqli_fetch_array($q)){ ?>

<option value="<?php echo $data['id']?>"

<?php



if(isset($_POST['package']))

{

	if($_POST['package']==$data['id'])

	

echo 'selected="selected"';} ?>>

<?php echo ucwords($data['package'])?></option><?php }}?></select>

  
  </td>

<td>

<select name="package" id="industry" class="form-control" style="width:200px;" >

  <option value="">Industry</option>

<?php $q=$database->query("SELECT * FROM `industry` group by industry");

if($data_rows=mysqli_num_rows($q)>0){

		while($data=mysqli_fetch_array($q)){ ?>

<option value="<?php echo $data['id']?>"

<?php



if(isset($_POST['industry']))

{

	if($_POST['industry']==$data['id'])

	

echo 'selected="selected"';} ?>>

<?php echo ucwords($data['industry'])?></option><?php }}?></select>

  
  </td>
  
  
<td>
<input type="text" placeholder="Search By Username" class="form-control course2" style="width:200px;" name="username" id="username"  value=""  />
   
 
  </td>  
</tr>
</table>
  
  

  <br />

  

 <br />

  <table align="center">

  <tr>

 

  
  <td>

<a class="btn btn-info" onclick="setStateGet('adminTable','<?php echo SECURE_PATH;?>leads_report/process.php','tableDisplay=1&val=true&fromdate='+$('#fromdate').val()+'&todate='+$('#todate').val()+'&source_lead='+$('#source_lead').val()+'&lead_status='+$('#lead_status').val()+'&agegroup='+$('#agegroup').val()+'&profession='+$('#profession').val()+'&lead_tower='+$('#lead_tower').val()+'&lead_floor='+$('#lead_floor').val()+'&lead_flattype='+$('#lead_flattype').val()+'&budget='+$('#budget').val()+'&package='+$('#package').val()+'&industry='+$('#industry').val()+'&area='+$('#area').val()+'&username='+$('#username').val()+'&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');"><i class="icon-search"></i> Search</a>



</td>

<td>



<a class="btn btn-default" 

onClick="$('#searchForm')[0].reset()"><i class="icon-refresh"></i> Reset</a>



</td>

  </tr></table>

  

 </div>

 





</form>





<div id="adminForm" >



<script type="text/javascript">



setStateGet('adminForm','<?php echo SECURE_PATH;?>leads_report/process.php','addForm=1');



</script>



</div>

  </section>



               

              <section class="panel">

             

             

              

                

                <div id="formLoader">

<img src="<?php echo SECURE_PATH;?>theme/img/loader.gif" alt="Loading..."/>

</div>  

              

              

              <div class="panel-body">

              

                   

      <section id="unseen">

<div id="adminTable">



<script type="text/javascript">

setStateGet('adminTable','<?php echo SECURE_PATH;?>leads_report/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');

</script>



</div>

</section>

                          </div>

              

              </section>

              </div>

              </div>

              

              <!-- page end-->

</section>





<script>

$( ".datePicker" ).datepicker({

			changeMonth: true,

			changeYear: true,

			dateFormat: "dd-mm-yy",

			yearRange: "1920:2025"	 

		});

 

</script>



<script type="text/javascript">

$().ready(function() {

$(".course4").autocomplete("<?php echo SECURE_PATH;?>reports/autoCompleteMain4.php", {

width: 200,

matchContains: true,

//mustMatch: true,

minChars: 1,

//multiple: true,

//highlight: false,

//multipleSeparator: ",",

selectFirst: true

});

});

</script>

 
  <script type="text/javascript">

 
	
		function pref_problem() {

            var allVals = [];

            $('#mydivpreferr :checked').each(function () {

                allVals.push($(this).val());

            });

            $('#pref_problem').val(allVals)

        }
 $(function () 
 {

            $('#mydivpreferr input').click(pref_problem);

            pref_problem();

        });
 </script>
 
 
 <script type="text/javascript">
$().ready(function() {
$(".course2").autocomplete("<?php echo SECURE_PATH;?>leads_report/autoCompleteMain2.php", {
width: 200,
//matchContains: true,
mustMatch: true,
minChars: 1,
//multiple: true,
//highlight: false,
//multipleSeparator: ",",
selectFirst: true
});
});


</script>

<script type="text/javascript">
$().ready(function() {
$(".course3").autocomplete("<?php echo SECURE_PATH;?>leads_report/autoCompleteMain3.php", {
width: 200,
//matchContains: true,
mustMatch: true,
minChars: 1,
//multiple: true,
//highlight: false,
//multipleSeparator: ",",
selectFirst: true
});
});


</script>
<?php

}

?>