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



<b style="color:#C36;">Reports </b>



                          </header>



                          <div class="panel-body">







<form class="form-inline" role="form" id="searchForm" style="text-align:center;">











  <div class="form-group" >







   <table>



  <tr>



  <td>



<input type="text" placeholder="From Date" class="form-control datePicker" style="width:250px;" name="fromdate" id="fromdate"  value=""  />











  </td>



  <td>



<input type="text" placeholder="To Date" class="form-control datePicker" style="width:250px;" name="todate" id="todate"  value=""  />











  </td>




<td>

  <select name="s_employee" id="s_employee"  class="form-control" style="width:250px;">

    <option value="">Select Employee</option>

    <?php

 $q=$database->query("SELECT * FROM `createemployees`");

if($data_rows=mysqli_num_rows($q)>0){

		while($datad=mysqli_fetch_array($q)){?>

<option value="<?php echo $datad['employeeid']?>"

<?php

if(isset($_POST['s_employee']))

{

	if($_POST['s_employee']==$datad['employeeid'])



echo 'selected="selected"';}?>

><?php echo ucwords($datad['name'])?></option><?php }}?>



</select>





  </td>

  <td>



<select  name="employee_type" id="employee_type11" class="form-control" style="width:250px;" >



    <option value="">Select Type</option>



<option value="director" <?php if(isset($_POST['employee_type'])){ if($_POST['employee_type'] == "director"){ echo ' selected="selected"';}}?>>Approved</option>



<option value="gm" <?php if(isset($_POST['employee_type'])){ if($_POST['employee_type'] == "gm"){ echo ' selected="selected"';}}?>>Rejected</option>


</select>





  </td>

</tr>
</table>
<br/>
<br/>
<table>
<tr>

  <td>

  <select name="s_district" id="s_district"  class="form-control" style="width:250px;">

    <option value="">Select District</option>

    <?php

 $q=$database->query("SELECT * FROM `global_districts`");

if($data_rows=mysqli_num_rows($q)>0){

		while($datad=mysqli_fetch_array($q)){?>

<option value="<?php echo $datad['uid']?>"

<?php

if(isset($_POST['s_district']))

{

	if($_POST['s_district']==$datad['uid'])



echo 'selected="selected"';}?>

><?php echo ucwords($datad['district'])?></option><?php }}?>



</select>





  </td>



<td>

  <select name="s_mandal" id="s_mandal"  class="form-control" style="width:250px;">

    <option value="">Select Mandal</option>

    <?php

 $q=$database->query("SELECT * FROM `global_mandals`");

if($data_rows=mysqli_num_rows($q)>0){

		while($datad=mysqli_fetch_array($q)){?>

<option value="<?php echo $datad['uid']?>"

<?php

if(isset($_POST['s_mandal']))

{

	if($_POST['s_mandal']==$datad['uid'])



echo 'selected="selected"';}?>

><?php echo ucwords($datad['mandal'])?></option><?php }}?>



</select>





  </td>



 <td>

  <select name="s_panchayat" id="s_panchayat"  class="form-control" style="width:250px;">

    <option value="">Select Panchayat</option>

    <?php

 $q=$database->query("SELECT * FROM `global_panchayats` order by uid asc limit 100");

if($data_rows=mysqli_num_rows($q)>0){

		while($datad=mysqli_fetch_array($q)){?>

<option value="<?php echo $datad['uid']?>"

<?php

if(isset($_POST['s_panchayat']))

{

	if($_POST['s_panchayat']==$datad['uid'])



echo 'selected="selected"';}?>

><?php echo ucwords($datad['panchayat'])?></option><?php }}?>



</select>





  </td>













  </tr>



  </table>


<br/>
<br/>




  <table align="center">



  <tr>









  <td>



<a class="btn btn-info" onclick="#"><i class="icon-search"></i> Search</a>







</td>



<td>







<a class="btn btn-default"



onClick="$('#searchForm')[0].reset()"><i class="icon-refresh"></i> Reset</a>







</td>



  </tr></table>
<br> <br>
<p class="pull-right" style="padding-right:10px;">
		      <a style="padding: 9px 20px;font-size: 12px;" class=" label label-primary" href="#" target="_blank">Download Excel</a>
</p>

<table class="table table-bordered" style="table-layout:fixed;overflow:hidden">
	 <colgroup>

		 <col width="40px">
		<col width="30px">
		<col width="25px">
		<col width="25px">
		<!-- <col width="25px"> -->
		<col width="25px">
		<col width="25px">
		<!-- <col width="25px"> -->
		<col width="25px">
		<col width="25px">
		<!-- <col width="25px"> -->
	 </colgroup>
		<tr style="background: #eaeaea">


			<th rowspan=3 style="text-align:center;vertical-align: middle;">District Name</th>
			<th rowspan=3 style="text-align:center;vertical-align: middle;">No.of Temples</th>
			<th colspan=6 style="text-align:center">No.of Leased Lands</th>

	</tr>
		<tr style="background: #eaeaea">
			<th colspan=2 style="text-align:center;background-color:#006400;color:#fff">Farm Lands</th>
			<th colspan=2 style="text-align:center;background-color:#40cded;color:#fff">Commercial</th>
			<th colspan=2 style="text-align:center;center;background-color:#ff6c60;color:#fff">Open</th>
	 </tr>
		<tr style="background: #eaeaea">
			<th style="text-align:center;background-color:#006400;color:#fff">Count (In Acres)</th>
			<th style="text-align:center;background-color:#006400;color:#fff">Income (In Lakhs)</th>
			<!-- <th style="text-align:center">Demand</th> -->
			<th style="text-align:center;center;background-color:#40cded;color:#fff">Count (In Acres)</th>
			<th style="text-align:center;center;background-color:#40cded;color:#fff">Income (In Lakhs)</th>
			<!-- <th style="text-align:center">Demand</th> -->
			<th style="text-align:center;background-color:#ff6c60;color:#fff">Count (In Acres)</th>
			<th style="text-align:center;background-color:#ff6c60;color:#fff">Income (In Lakhs)</th>
			<!-- <th style="text-align:center">Demand</th> -->
		</tr>
<?php

$dis_sel = $database->query("select district from global_districts");
while($dis_data = mysqli_fetch_array($dis_sel)){
	?>

	<tr style="background: #00416a;color: #fff;">

		<td align="center"><?php echo $dis_data['district']; ?></td>
		<td align="center"> 12.89L</td>
		<td align="center"> 12,222</td>
		<td align="center">1.8L</td>
		<!-- <td align="center">2.6L</td> -->
		<td align="center"> 15,524</td>
		<td align="center"> 3.5L</td>
		<!-- <td align="center">6.8L</td> -->
		<td align="center"> 8,122</td>
		<td align="center"> 1.2L</td>
		<!-- <td align="center"> 1.8L</td> -->

	</tr>
	<?php
}

?>


</table>







 </div>















</form>











<div id="adminForm" >







<script type="text/javascript">







//setStateGet('adminForm','<?php echo SECURE_PATH;?>leads_report/process.php','addForm=1');







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



//setStateGet('adminTable','<?php echo SECURE_PATH;?>leads_report/process.php','tableDisplay=1&page=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{ echo '1';}?>');



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
