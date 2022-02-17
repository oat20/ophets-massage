<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);




/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)

            ->setCellValue('A5', 'ปี')
			->setCellValue('B5', 'เดือน')
			->setCellValue('C5', 'จำนวนบริการ')
			->setCellValue('D5', 'จำนวนคนไข้');
			
			
	$Year1	=	$_GET['Year1'];
	$Year2	=	$_GET['Year2'];
	$Months   =	array("1","2","3","4","5","6","7","8","9","10","11","12");						
$objConnect = mysql_connect("localhost","ophets","ophets2015") or die("Error Connect to Database");
mysql_query("SET NAMES UTF8");
$objDB = mysql_select_db("ophets");
$strSQL = "SELECT YEAR( DATE ) As 'Year' ,MONTH( DATE ) As 'Month',COUNT(Sub) As 'Total_Service', COUNT(DISTINCT CustomerNo) As 'Total_People' From service  WHERE  Sub = 0 AND YEAR( DATE ) BETWEEN '$Year1' AND '$Year2'  GROUP BY YEAR( DATE ),MONTH( DATE ) ORDER BY Year,Month";
$objQuery = mysql_query($strSQL);
$i = 6;
	//auto size
	$objPHPExcel->getActiveSheet()->mergeCells('A3:D3');
	$objPHPExcel->getActiveSheet()->getColumnDimension ( "A" )->setAutoSize ( true );
	$objPHPExcel->getActiveSheet()->getColumnDimension ( "B" )->setAutoSize ( true );
	$objPHPExcel->getActiveSheet()->getColumnDimension ( "C" )->setWidth(18);
	$objPHPExcel->getActiveSheet()->getColumnDimension ( "D" )->setWidth(18);
	$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
	
	// Set alignments
	$objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
	$objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
	$objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); 
	$objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); 
//	$objPHPExcel->getActiveSheet()->getComment('E13')->getFillColor()->setRGB('EEEEEE');
$objPHPExcel->getActiveSheet()->getStyle('A5:D5')->applyFromArray(
    array(
        'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
            'borders' => array(
                'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ),
            'fill' => array(
                'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array(
                    'argb' => 'FFA0A0A0'
                ),
                'endcolor'   => array(
                    'argb' => 'FFFFFFFF'
                )
            )
        )
);
while($objResult = mysql_fetch_array($objQuery))

{ 
	$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objResult["Year"]);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $objResult["Month"]);
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $objResult["Total_Service"]);
	$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $objResult["Total_People"]);
	
	$i++;
}

mysql_close($objConnect);

// Miscellaneous glyphs, UTF-8

           

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A3', 'สรุปจำนวนผู้มารับบริการประจำปี '.$Year1.' ถึง '.$Year2);

// Redirect output to a client’s web browser (Excel2007)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="สรุปจำนวนผู้มารับบริการประจำปี.xls"');
//header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');
exit;