<?php

/** PHPExcel */



require_once '../Classes/PHPExcel.php';

include("../include/session.php");

error_reporting(-1);



$sql=stripslashes($_REQUEST['condition']);
$query=$database->query($sql);

//echo '<br>';

 $rows=mysqli_num_rows($query);



// Create new PHPExcel object

 $objPHPExcel = new PHPExcel();

// Set properties

$objPHPExcel->getProperties()->setCreator("phoenix")

							 ->setLastModifiedBy("phoenix")

							 ->setTitle("phoenix");

							// ->setSubject("PDF Test Document")

							// ->setDescription("Test document for PDF, generated using PHP classes.")

							// ->setKeywords("pdf php")

							// ->setCategory("Test result file");

$objPHPExcel->getActiveSheet();



//  PAGE SETUP



//$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);

//$objPHPExcel->getActiveSheet()->getPageSetup()->setVerticalCentered(true);

//$objPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);





//$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF0000');

$objPHPExcel->getActiveSheet()->getStyle('A2:AE2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('ACACAC');

$objPHPExcel->getActiveSheet()->getStyle('A2:AE2')->getFont()->setBold(true);



// COLUMN SETUP



$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7); //SNO

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); //Date

$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);  //RECIPIENT

$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);  //VMN

$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);  //VMN

$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(23);

$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(33);

$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(33);

$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(33);

$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(33);

$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(33);

$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(33);

$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(33);

$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(33);

$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(33);




  //VMN



//$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(47);  //MESSAGE

//$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(47);  //URL

$objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(20);



/*$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);*/







// setting header 





	$objPHPExcel->getActiveSheet()->mergeCells('A1:Z1');

	

		$objPHPExcel->getActiveSheet()->mergeCells('Z1:AI1');

			$userinfo=$database->getUserInfo($session->username);





$objPHPExcel->getActiveSheet()

            ->getCellByColumnAndRow('0', '1')->setValue("  \n  Generated on: ".date("j M Y, g:i A ",time())."\n  Report contains: ".$rows." results.");



$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('0', '2')->setValue(" Sno");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('1', '2')->setValue(" Username ");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', '2')->setValue(" Leadtower");

//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('3', '2')->setValue(" Leadblock	");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('3', '2')->setValue(" Leadfloor ");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('4', '2')->setValue(" Lead flattype ");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('5', '2')->setValue(" Lead flatno");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('6', '2')->setValue(" Source lead");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('7', '2')->setValue("Name");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('8', '2')->setValue("Mobile");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('9', '2')->setValue("Alternative Mobile");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('10', '2')->setValue("E-Mail");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('11', '2')->setValue("Other E-Mail");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('12', '2')->setValue("Lead Status");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('13', '2')->setValue("Remarks");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('14', '2')->setValue("Reminder");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('15', '2')->setValue("Organization");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('16', '2')->setValue("Client Address");



$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('17', '2')->setValue("City");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('18', '2')->setValue("Broker");


//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('21', '2')->setValue("Assigned Employee");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('19', '2')->setValue("Is Investor");


//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('21', '2')->setValue("Lead Stage");

//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('22', '2')->setValue("Requirement Type");


$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('20', '2')->setValue("Budget");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('21', '2')->setValue("Preferred Floor");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('22', '2')->setValue("Country");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('23', '2')->setValue("State");

$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('24', '2')->setValue("Block Till Date");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('25', '2')->setValue("Optional package");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('26', '2')->setValue("Age Group");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('27', '2')->setValue("Profession");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('28', '2')->setValue("Industry");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('29', '2')->setValue("Interested");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('30', '2')->setValue("Area");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('31', '2')->setValue("Tentative closer date ");







//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('5', '2')->setValue(" URL");







$sno=0;

$rcounter=2;



// data loop



while($r=mysqli_fetch_array($query)){

		$data=$database->query("SELECT * FROM `optional_pack` where id='".$r['package']."'");
	$h1=mysqli_fetch_array($data);

	$data1=$database->query("SELECT * FROM `agegroup` where id='".$r['agegroup']."'");
	$h2=mysqli_fetch_array($data1);
	
	$data2=$database->query("SELECT * FROM `profession` where id='".$r['profession']."'");
	$h3=mysqli_fetch_array($data2);
	
	$data3=$database->query("SELECT * FROM `industry` where id='".$r['industry']."'");
	$h4=mysqli_fetch_array($data3);
	
	$data4=$database->query("SELECT * FROM `interested` where id='".$r['interested']."'");
	$h5=mysqli_fetch_array($data4);

  $query11=$database->query("select * from createtower where id = '".$r['lead_tower']."' ");

	  $fet_query11=mysqli_fetch_array($query11); 
	  
 
	  
	  
	   $queryfloor=$database->query("select * from floors where id = '".$r['lead_floor']."' ");

	  $fet_queryfloor=mysqli_fetch_array($queryfloor); 



	  $query22=$database->query("select * from flattype where id = '".$r['lead_flattype']."' ");

	  $fet_query22=mysqli_fetch_array($query22); 

	    $a=''; 

if($fet_query22['flat_type']=='2b')

{

	$a="2BHK";

}

elseif($fet_query22['flat_type']=='3b')

{

	$a="3BHK";

}

elseif($fet_query22['flat_type']=='4b')

{

	$a="4BHK";

}

elseif($fet_query22['flat_type']=='5b')

{

	$a="5BHK";

}

elseif($fet_query22['flat_type']=='6b')

{

	$a="6BHK";

}


	$rcounter++;

	$sno++;

	$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('0', $rcounter)->setValue($sno);

	//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('1', $rcounter)->setValue(date('d-m-y',$r['timestamp']));

	$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('1', $rcounter)->setValue($r['username']);

	//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', $rcounter)->setValue($r['mobile1']);

	$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', $rcounter)->setValue($fet_query11['name']);

    //$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('3', $rcounter)->setValue($fet_queryblock['block_name']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('3', $rcounter)->setValue($fet_queryfloor['floor_name']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('4', $rcounter)->setValue($fet_query22['flat_type']);

			

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('5', $rcounter)->setValue($r['lead_flatno']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('6', $rcounter)->setValue($r['source_lead']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('7', $rcounter)->setValue($r['name']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('8', $rcounter)->setValue($r['mobile']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('9', $rcounter)->setValue($r['other_mobile']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('10', $rcounter)->setValue($r['email']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('11', $rcounter)->setValue($r['other_email']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('12', $rcounter)->setValue($r['lead_status']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('13', $rcounter)->setValue($r['remarks']);	

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('14', $rcounter)->setValue($r['reminder']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('15', $rcounter)->setValue($r['organization']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('16', $rcounter)->setValue($r['client_address']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('17', $rcounter)->setValue($r['city']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('18', $rcounter)->setValue($r['broker']);


		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('19', $rcounter)->setValue($r['is_investor']);


		//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('20', $rcounter)->setValue($r['lead_stage']);

		//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('22', $rcounter)->setValue($r['requirement_type']);

	
		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('20', $rcounter)->setValue($r['budget']);	

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('21', $rcounter)->setValue($r['preferred_floor']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('22', $rcounter)->setValue($r['country']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('23', $rcounter)->setValue($r['state']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('24', $rcounter)->setValue($r['block_date']);

		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('25', $rcounter)->setValue($h1['package']);
		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('26', $rcounter)->setValue($h2['agegroup']);
		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('27', $rcounter)->setValue($h3['profession']);
		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('28', $rcounter)->setValue($h4['industry']);
		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('29', $rcounter)->setValue($h5['interested']);
		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('30', $rcounter)->setValue($r['area']);
		$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('31', $rcounter)->setValue($r['tentative']);
		



		

			

//				$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('4', $rcounter)->setValue($row['message']);

//			$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('5', $rcounter)->setValue($delivery->statusDecode($row['status'],$row['reply']));

	

	

	



	

	

	

	

	

}









// Set active sheet index to the first sheet, so Excel opens this as the first sheet



$filename="Customerinfo-".date("j_n_y,G-i.",time())."xls";



// Redirect output to a client's web browser (Excel2005)

header('Content-Type: application/vnd.ms-excel');

header("Content-Disposition: attachment;filename=".$filename."");

header('Cache-Control: max-age=0');



$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$objWriter->save('php://output');



//$objWriter->save("one.pdf");

exit;

?>

