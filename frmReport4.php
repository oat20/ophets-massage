<?php
	require_once("fpdf/fpdf.php");
	define('FPDF_FONTPATH','font/');
	
	$Date1	=	$_GET['Day1'];
	$Date2	=	$_GET['Day2'];
	
	$D1		=	substr($Day1,8);
	$M1		=	substr($Date1,5);
	$Y1		=	substr($Date1,0,4);	
	$D2		=	substr($Day2,8);
	$M2		=	substr($Date2,5);
	$Y2		=	substr($Date2,0,4);

		
	$months	=	array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	
	$m1	 =	$M1 - 1;
	$month1 = $months[$m1];
	$y1	 =	$Y1 + 543;
	
	$m2	 =	$M2 - 1;
	$month2 = $months[$m2];
	$y2	 =	$Y2 + 543;
	
	
	$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
	//$mysqli = new mysqli("localhost", "root", "12345", "ophets");
	$mysqli -> set_charset('tis620');
	
	if ($stmt = $mysqli->prepare("SELECT D.Point, D.DocName, D.DocSurName , SUM(S.Cost)
									From doctor D JOIN service S on D.DocNo = S.DocNo 
									Where Date BETWEEN ? AND ?
									Group by DocName

								 ")) {	
		
		$stmt	->	bind_param('ss',$Date1,$Date2);
		$stmt 	-> 	execute();

		/* Bind results to variables */
		$stmt-> bind_result($Point, $DocName, $DocSurName, $Cost);
		$i = 0;

		while ($stmt->fetch()) {
			$data[$i]['Point']       =	$Point;
			$data[$i]['DocName']     =	$DocName;	
			$data[$i]['DocSurName']  =	$DocSurName;	
			$data[$i]['Cost']        =	$Cost;	
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
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','รวมยอดรายจ่ายผู้บำบัด '),0,0,"C");
	$pdf ->	Ln(7);
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ณ วันที่  '.$D1.' '.$month1.' '.$y1.'   ถึงวันที่   '.$D2.' '.$month2.' '.$y2),0,0,"C");
	
	
	$pdf ->	Ln(7);
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','คลินิกนวดแผนไทยประยุกต์'),0,0,"C");
		
	/* column name */
	$header	=	array('ลำดับ','รายชื่อ', 'รายจ่าย (หัตถบำบัด)');
	
	/* check data in array */
	if(count($data)>0)
	{
		
		/* set width of each column */
		$w	=	array(15,70,40);
		
		$pdf ->	SetFont('Arial','B',8);
		$pdf ->	Ln(10);
		$pdf -> SetFillColor(255,255,255);
		$fill 	= 	'true';
		$pdf->SetX( 43 );
		/* display column name */
		for($i=0; $i<count($header); $i++)
		{
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[$i],8,iconv( 'UTF-8','TIS-620',$header[$i]),'1',0,'C');
		}

		$pdf ->	Ln();
		$pdf ->	Cell(array_sum($w),0,'','');
		$pdf ->	Ln();	
			
		/* display data */
		$pdf ->	SetFont('Arial','',8);
		$TotalCost = 0;
//		$pdf->SetX( 43 );		
		for($i=0; $i<count($data); $i++)
		{
			$pdf->SetX( 43 );
			$D	  =	substr($data[$i]['Date'],8);
			$pay	= 	($data[$i]['Cost']* 0.5);
			$TotalCost = $TotalCost + $data[$i]['Cost'];
			
			$pdf ->	Cell($w[0],8,$i+1,'1',0,'C',$fill);
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[1],8,$data[$i]['Point']."   ".$data[$i]['DocName']."   ".$data[$i]['DocSurName'],'1',0,'L',$fill);
			$pdf ->	Cell($w[2],8,number_format($pay).".00"	,'1',0,'R',$fill);			
			
			$pdf ->	Ln();
		}
		$Totalpay  = ($TotalCost* 0.5);
		$pdf->SetX( 43 );	
		
		$pdf->AddFont('angsa','','angsa.php');
		$pdf->SetFont('angsa','',15);
		$pdf->Cell(85,8,iconv( 'UTF-8','TIS-620','รวม       '),1,0,"R");
		$pdf->Cell(40,8,number_format($Totalpay,2),1,0,"R");
		
		$pdf ->	Ln();
	}
	else{
		/* no data found */
		$pdf ->	Ln(4);
		$pdf ->	SetTextColor(255,0,0);
		$pdf ->	Cell(0,6,'No Data',0,0,'C');	
	}
	
	/* generate PDF output */
	$pdf->Output("รวมยอดรายจ่ายผู้บำบัด".$D1.' '.$month1.' '.$y1.'ถึงวันที่'.$D2.' '.$month2.' '.$y2.".pdf","D"); 
	$pdf->Output(); 

	
?>