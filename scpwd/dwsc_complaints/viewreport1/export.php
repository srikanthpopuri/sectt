<?php

require_once '../Classes/Excel/PHPExcel.php';

include("../include/session.php");



$styleArray = array(
    'font'  => array(
        'bold' => true,
        'color' => array('rgb' => 'FF0000'),
        'size'  => 10,
        'name' => 'Calibri'
    ));

$styleArray2 = array(
    'font'  => array(
        'bold' => true,
        'color' => array('rgb' => '000000'),
        'size'  => 11,
        'name' => 'Calibri'
    ));

$styleArray3 = array(
    'font'  => array(
        'bold' => true,
        'color' => array('rgb' => '6C2A1B'),
        'size'  => 10,
        'name' => 'Calibri'
    ));



// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("Backup Report")
    ->setLastModifiedBy("Backup Report")
    ->setTitle("Backup Report");

$objPHPExcel->getActiveSheet();

$objPHPExcel->getActiveSheet()
    ->getStyle('H')
    ->getAlignment()
    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$objPHPExcel->getActiveSheet()
    ->getStyle('G')
    ->getAlignment()
    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$objPHPExcel->getActiveSheet()
    ->getStyle('E')
    ->getAlignment()
    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$objPHPExcel->getActiveSheet()
    ->getStyle('F')
    ->getAlignment()
    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$objPHPExcel->getActiveSheet()
    ->getStyle('D')
    ->getAlignment()
    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$objPHPExcel->getActiveSheet()
    ->getStyle('C')
    ->getAlignment()
    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$objPHPExcel->getActiveSheet()
    ->getStyle('A')
    ->getAlignment()
    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->getFont()->setBold(true);


$objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(20);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);








$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', '1')->setValue("Grivances Details");

//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', '3')->setValue("Month : '".date("M Y",time())."' ");

//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('4', '2')->setValue(date('d-m-Y'));

$objPHPExcel->getActiveSheet()->mergeCells('C1:E1');



$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray2);


$objPHPExcel->getActiveSheet()->getStyle('A3:J3')->applyFromArray($styleArray2);


$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('0', '3')->setValue("S No");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('1', '3')->setValue("DISTRICT NAME");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', '3')->setValue("No OF APPLICATIONS");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('3', '3')->setValue("NEW APPLICATION");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('4', '3')->setValue("ASSIGNED TO DWO");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('5', '3')->setValue("RE-ASSIGNED TO DWO");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('6', '3')->setValue("ASSIGNED TO OTHER DEPARTMENT");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('7', '3')->setValue("RE-ASSIGNED TO OTHER DEPARTMENT");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('8', '3')->setValue("CLOSED (DWO)");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('9', '3')->setValue("CLOSED (OTHER DEPARTMENT)");





$sno=0;
$rcounter=3;


if($session->userlevel == 9 ||$session->userlevel == 8)
{
    if(isset($_REQUEST['district_sel']) && $_REQUEST['district_sel']!=''){
        $dis_sel = $database->query("select uid,district from global_districts WHERE uid='".$_REQUEST['district_sel']."'");
    }else{
        $dis_sel = $database->query("select uid,district from global_districts");
    }

}elseif($session->userlevel == 6)
{
    $d = $database->query("select employee_district from users WHERE username='".$session->username."'");
    $dis = mysqli_fetch_array($d);
    $dis_sel = $database->query("select uid,district from global_districts WHERE uid='".$dis['employee_district']."'");
}

$c = '';
if(strlen($_REQUEST['from_date'])>0 && strlen($_REQUEST['to_date'])>0){
    $from_date = strtotime($_REQUEST['from_date']);
    $to_date = strtotime($_REQUEST['to_date']. ' 23:59:59');
    $c.="and timestamp between '".$from_date."' and '".$to_date."'";
}




while($dis_data = mysqli_fetch_array($dis_sel)){
    
    $q1 = $database->query("select count(id) as cnt from complaints_form WHERE district='".$dis_data['uid']."' and status=1 $c");
                            $a1= mysqli_fetch_array($q1);

                            $q2 = $database->query("select count(id) as cnt from complaints_form WHERE district='".$dis_data['uid']."' and status in (2,4) $c");
                            $a2= mysqli_fetch_array($q2);

                            $q3 = $database->query("select count(id) as cnt from complaints_form WHERE district='".$dis_data['uid']."' and status=6 $c");
                            $a3= mysqli_fetch_array($q3);

                            $q4 = $database->query("select count(id) as cnt from complaints_form WHERE district='".$dis_data['uid']."' and status=3 $c");
                            $a4= mysqli_fetch_array($q4);
							
							 $q5 = $database->query("select count(id) as cnt from complaints_form WHERE district='".$dis_data['uid']."' and status=5 $c");
                            $a5= mysqli_fetch_array($q5);
							
							$q6 = $database->query("select count(id) as cnt from complaints_form WHERE district='".$dis_data['uid']."' and status=8 $c");
                            $a6= mysqli_fetch_array($q6);
							
							 $q7 = $database->query("select count(id) as cnt from complaints_form WHERE district='".$dis_data['uid']."' and status=7 $c");
                            $a7= mysqli_fetch_array($q7);

                            $t = $database->query("select count(id) as cnt from complaints_form WHERE district='".$dis_data['uid']."' $c");
                            $total1 = mysqli_fetch_array($t);
    
    $rcounter++;
    $sno++;
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('0', $rcounter)->setValue($sno);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('1', $rcounter)->setValue($dis_data['district']);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', $rcounter)->setValue($total1['cnt']);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('3', $rcounter)->setValue($a1['cnt']);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('4', $rcounter)->setValue($a2['cnt']);
	$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('5', $rcounter)->setValue($a3['cnt']);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('6', $rcounter)->setValue($a4['cnt']);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('7', $rcounter)->setValue($a5['cnt']);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('8', $rcounter)->setValue($a6['cnt']);
	$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('9', $rcounter)->setValue($a7['cnt']);

	
	
	


}




// Set active sheet index to the first sheet, so Excel opens this as the first sheet

$filename="".date("M Y-i-s.",time())."xls";

// Redirect output to a client's web browser (Excel2005)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
//$objWriter->save('generatedFiles/'.$filename);
?>

<?php

//$objWriter->save("one.pdf");
//exit;


?>