<?php
	require_once("fpdf/fpdf.php");
	define('FPDF_FONTPATH','font/');
	
	$Date	=	$_GET['Month'];
	$M		=	substr($Date,5);
	$Y		=	substr($Date,0,4);
	
	$months	=	array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	
	$m	 =	$M - 1;
	$month = $months[$m];
	$y	 =	$Y + 543;
	
	$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
	$mysqli -> set_charset('tis620');
	
	if ($stmt = $mysqli->prepare("SELECT	Date, SUM(Cost)
								  FROM 	 service
								  WHERE	 MONTH(Date) =  ? AND YEAR(Date) = ?
								  GROUP BY Date")) {	
		
		$stmt	->	bind_param('ss',$M,$Y);
		$stmt 	-> 	execute();

		/* Bind results to variables */
		$stmt-> bind_result($Date, $Cost);
		$i = 0;

		while ($stmt->fetch()) {
			$data[$i]['Date']     =	$Date;	
			$data[$i]['Cost']     =	$Cost;	
			$i++;
		}
		
		/* Close the statement */
		$stmt->close();
		$mysqli->close();
	}
	
	/* generate pdf file */
	$pdf	=	new FPDF();
	$pdf ->	AddPage();
	$pdf ->	SetFont('Arial','',8);
	
	/* Head */
	
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','บัญชีรายรับ - รายจ่าย ประจำเดือน '.$month.' '.$y),0,0,"C");
	
	$pdf ->	Ln();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','คลินิกนวดแผนไทยประยุกต์'),0,0,"C");
		
	/* column name */
	$header	=	array('วันที่ เดือน ปี','รายรับ', 'รายจ่าย (หัตถบำบัด)', 'คงเหลือ');
	
	/* check data in array */
	if(count($data)>0)
	{
		
		/* set width of each column */
		$w	=	array(40,40,40,40);
		
		$pdf ->	SetFont('Arial','B',8);
		$pdf ->	Ln(10);
		$pdf -> SetFillColor(255,255,255);
		$fill 	= 	'true';
		$pdf->SetX( 25 );
		/* display column name */
		for($i=0; $i<count($header); $i++)
		{
			
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[$i],6,iconv( 'UTF-8','TIS-620',$header[$i]),'1',0,'C');
		}

		$pdf ->	Ln();
		$pdf ->	Cell(array_sum($w),0,'','');
		$pdf ->	Ln();	
			
		/* display data */
		$pdf ->	SetFont('Arial','',8);
		$TotalCost = 0;
					
		for($i=0; $i<count($data); $i++)
		{
			$pdf->SetX( 25 );
			$D	  =	substr($data[$i]['Date'],8);
			$pay	= 	($data[$i]['Cost'] * 0.5);
			$TotalCost = $TotalCost + $data[$i]['Cost'];

			$pdf ->	AddFont('angsa','','angsa.php');
			$pdf ->	SetFont('angsa','',15);
			$pdf ->	Cell($w[0],6,iconv( 'UTF-8','TIS-620',$D." ".$month." ".$y),'1',0,'C',$fill);
			$pdf ->	Cell($w[1],6,number_format(($data[$i]['Cost']),2),'1',0,'R',$fill);
			$pdf ->	Cell($w[2],6,number_format($pay,2),'1',0,'R',$fill);			
			$pdf ->	Cell($w[3],6,number_format($pay,2),'1',0,'R',$fill);
			$pdf ->	Ln();
		}
		$pdf->SetX( 25 );
		$Totalpay  = ($TotalCost * 0.5);
			
		$pdf->AddFont('angsa','','angsa.php');
		$pdf->SetFont('angsa','',15);
		$pdf->Cell(40,5,iconv( 'UTF-8','TIS-620','รวม '.$i.' วัน'),1,0,"C");
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(40,5,number_format($TotalCost,2),1,0,"R");
		$pdf->Cell(40,5,number_format($Totalpay,2),1,0,"R");
		$pdf->Cell(40,5,number_format($Totalpay,2),1,0,"R");
		$pdf ->	Ln();
	}
	else{
		/* no data found */
		$pdf ->	Ln(4);
		$pdf ->	SetTextColor(255,0,0);
		$pdf ->	Cell(0,6,'No Data',0,0,'C');	
	}
	
	/* generate PDF output */
	$pdf->Output("บัญชีรายรับ - รายจ่าย ประจำเดือน".$month."_".$y.".pdf","D"); 
	$pdf->Output(); 

	
?>