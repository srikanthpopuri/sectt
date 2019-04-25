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
    ->getStyle('I')
    ->getAlignment()
    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

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


$objPHPExcel->getActiveSheet()->getStyle('A3:I3')->getFont()->setBold(true);


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








$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', '1')->setValue("Statement of the Institution,Disposal & Pendency of claim in the Maintenance Tribunals");

//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', '3')->setValue("Month : '".date("M Y",time())."' ");

//$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('4', '2')->setValue(date('d-m-Y'));

$objPHPExcel->getActiveSheet()->mergeCells('C1:E1');



$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray2);


$objPHPExcel->getActiveSheet()->getStyle('A3:I3')->applyFromArray($styleArray2);


$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('0', '3')->setValue("S No");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('1', '3')->setValue("Year");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', '3')->setValue("Pending at the beginning of the year/month");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('3', '3')->setValue("Instituted during the month");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('4', '3')->setValue("Settled through concillation officers during the month");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('5', '3')->setValue("Number in which maintenance awarded by the Tribunals during the month");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('6', '3')->setValue("Number in which the claims rejected");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('7', '3')->setValue("Total claims disposed during the month");
$objPHPExcel->getActiveSheet()->getCellByColumnAndRow('8', '3')->setValue("Pending at the end of the month");



$sno=0;
$rcounter=3;
$condition='';

if($session->userlevel == 9 ||$session->userlevel == 8)
{
    if(isset($_REQUEST['district_sel']) && $_REQUEST['district_sel']!=''){
        $condition="district='".$_GET['district_sel']."' and";
    }

}else if($session->userlevel == 6)
{
    $d = $database->query("select employee_district from users WHERE username='".$session->username."'");
    $dis1 = mysqli_fetch_array($d);
    $condition = 'district = "'.$dis1['employee_district'].'" and';
}


$month = array('','January','February','March','April','May','June','July','August','September','October','November','December');


for($i=1;$i<=12;$i++){

    $count2=0;
    $count3=0;
    $count4=0;
    $count5=0;
    $count6=0;
    $count7=0;
    $count8=0;

    $rcounter++;
    $sno++;


    $q2 = $database->query("select sub_date from psc_rules WHERE ".$condition." status not in(4,3)");
    while ($data = mysqli_fetch_array($q2)){
        if(date('m',$data['sub_date'])==$i){
            $count2++;
        }
    }


    $q4 = $database->query("select sub_date from psc_rules WHERE ".$condition." status=4");
    while ($data = mysqli_fetch_array($q4)){
        if(date('m',$data['sub_date'])==$i){
            $count4++;
        }
    }

    $q6 = $database->query("select sub_date from psc_rules WHERE ".$condition." status=3");
    while ($data = mysqli_fetch_array($q6)){
        if(date('m',$data['sub_date'])==$i){
            $count6++;
        }
    }





    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('0', $rcounter)->setValue($sno);

    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('1', $rcounter)->setValue($month[$i].','.date('Y'));
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('2', $rcounter)->setValue($count2);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('3', $rcounter)->setValue($count3);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('4', $rcounter)->setValue($count4);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('5', $rcounter)->setValue($count5);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('6', $rcounter)->setValue($count6);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('7', $rcounter)->setValue($count7);
    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow('8', $rcounter)->setValue($count8);


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