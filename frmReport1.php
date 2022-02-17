<?php
	require_once("fpdf/fpdf.php");
	define('FPDF_FONTPATH','font/');
	
	$Day	=	$_GET['Day'];
	$D		=	substr($Day,8);
	$M		=	substr($Day,5,2);
	$Y		=	substr($Day,0,4);
	
	$months	=	array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	
	$m	 =	$M - 1;
	$month = $months[$m];
	$y	 =	$Y + 543;
	
	$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
	//$mysqli = new mysqli("localhost", "root", "12345", "ophets");
	$mysqli -> set_charset('tis620');
	
	if ($stmt = $mysqli->prepare("SELECT	S.InvoiceNo, C.Point, S.CusName, C.CusSurname, C.CusNo, C.Sex, S.Age, S.Service, S.DocName, S.Cost
								  FROM 	 customer C JOIN  service S ON C.CustomerNo = S.CustomerNo
								  WHERE	 DATE =  ?")) {	
		
		$stmt	->	bind_param('s',$Day);
		$stmt 	-> 	execute();

		/* Bind results to variables */
		$stmt-> bind_result($InvoiceNo, $Point, $CusName, $CusSurname, $CusNo, $Sex, $Age, $Service, $DocName, $Cost);
		$i = 0;

		while ($stmt->fetch()) {
			$data[$i]['InvoiceNo']     =	$InvoiceNo;	
			$data[$i]['Point']   		 =	$Point;
			$data[$i]['CusName']   	   =	$CusName;	
			$data[$i]['CusSurname']	=	$CusSurname;	
			$data[$i]['CusNo']   		 =	$CusNo;
			$data[$i]['Sex']  	 	   =	$Sex;
			$data[$i]['Age']   		   =	$Age;	
			$data[$i]['Service']   	   =	$Service;
			$data[$i]['DocName']   	   =	$DocName;
			$data[$i]['Cost']      	  =	$Cost;	
			$i++;
		}
		
		if ($stmt = $mysqli->prepare("SELECT	SUM(S.Cost), SUM(C.SexNo), SUM(S.ServiceNo), SUM(S.Sub)
									  FROM 	 customer C JOIN  service S ON C.CustomerNo = S.CustomerNo
									  WHERE	 DATE =  ?")) {
			/* Execute the prepared Statement */
			$stmt	->	bind_param('s',$Day); 
			$stmt 	-> 	execute();
	
			/* Bind results to variables */
			$stmt-> bind_result($Total,$SexNo,$ServiceNo,$Sub);
				
			/* fetch values */
			while ($stmt->fetch()) {
				$Total		=	$Total;
				$SexNo		=	$SexNo;
				$ServiceNo	=	$ServiceNo;
				$Sub		  =	$Sub;
			}
		}

		/* Close the statement */
		$stmt->close();
		$mysqli->close();
	}
	
	/* generate pdf file */
	$pdf	=	new FPDF();
	$pdf ->	AddPage();
	$pdf ->	SetFont('Arial','',8);
	
	class PDF extends FPDF
	{
		//Override คำสั่ง (เมธอด) Footer
		function Footer()	{
	 
			//นับจากขอบกระดาษด้านล่างขึ้นมา 10 มม.
			$this->SetY( -10 );
	 
			//กำหนดใช้ตัวอักษร Arial ตัวเอียง ขนาด 5
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',12);
	 
			$this->Cell(0,10, iconv( 'UTF-8','TIS-620','คลินิกนวดแผนไทยประยุกต์') ,0,0,'C');
	 
			//พิมพ์ หมายเลขหน้า ตรงมุมขวาล่าง
			$this->Cell(0,10,iconv( 'UTF-8','TIS-620','หน้าที่  ').$this->PageNo().' /  tp' ,0,0,'R');
	 
		}
	 
	}
	//เรียกใช้งาน เราจะเรียกใช้คลาสใหม่ของเราแทน
	$pdf=new PDF();
	$pdf->AliasNbPages( 'tp' );
	$pdf->AddPage();
	$pdf->SetFont('Arial','',12);
	 
	for( $i=0;$i<20;$i++ ){
	}
	
	/* Head */
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','สำนักงานบริการเทคโนโลยีสาธรณสุขและสิ่งแวดล้อม มหาวิทยาลัยมหิดล'),0,0,"C");
	
	$pdf ->	Ln();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ใบรายงานการส่งเงินประจำวัน'),0,0,"C");
		
	$pdf ->	Ln();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$D.' '.$month.' '.$y),0,0,"C");
	$pdf ->	Ln(2);

	/* column name */
	$header	=	array('ลำดับ','เลขที่ใบเสร็จ', 'ชื่อ-นามสกุล', 'เลขที่บัตร', 'เพศ', 'อายุ', 'ประเภทบำบัด', 'ผู้บำบัด', 'รายได้');
	
	/* check data in array */
	if(count($data)>0)
	{
		/* set width of each column */
		$w	=	array(10,20,45,15,10,10,40,15,20);
		
		$pdf ->	SetFont('Arial','B',8);
		$pdf ->	Ln(10);
		$pdf -> SetFillColor(255,255,255);
		$fill 	= 	'true';
		
		/* display column name */
		for($i=0; $i<count($header); $i++)
		{
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[$i],6,iconv( 'UTF-8','TIS-620',$header[$i]),'1',0,'C');
		}

		$pdf ->	Ln();
		$pdf ->	Cell(array_sum($w),0.3,'','T');
		$pdf ->	Ln();	
			
		/* display data */
		$pdf ->	SetFont('Arial','',8);			
		for($i=0; $i<count($data); $i++)
		{
			$pdf ->	Cell($w[0],6,$i+1,'1',0,'C',$fill);
			$pdf ->	Cell($w[1],6,$data[$i]['InvoiceNo'],'1',0,'C',$fill);
				
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[2],6,$data[$i]['Point']." ".$data[$i]['CusName']." ".$data[$i]['CusSurname'],'1',0,'L',$fill);
			
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[3],6,$data[$i]['CusNo'],'1',0,'C',$fill);
				
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[4],6,$data[$i]['Sex'],'1',0,'C',$fill);
				
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[5],6,$data[$i]['Age'],'1',0,'C',$fill);
				
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[6],6,$data[$i]['Service'],'1',0,'L',$fill);
				
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[7],6,$data[$i]['DocName'],'1',0,'L',$fill);
			
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[8],6,$data[$i]['Cost'],'1',0,'R',$fill);
			$pdf ->	Ln();
			}
			
		$pdf->AddFont('angsa','','angsa.php');
		$pdf->SetFont('angsa','',15);
		$pdf->Cell(165,5,iconv( 'UTF-8','TIS-620','รวม'),1,0,"R");
		$pdf->Cell(20,5,number_format($Total,2),1,0,"R");
		$pdf ->	Ln();
		
		$Boy = $i - $SexNo + $Sub;
		$Total = $SexNo + $Boy;
		$Body = $i - $ServiceNo + $Sub;
		$cancel = -$Sub;
		$pdf ->	Ln();
		$pdf->AddFont('angsa','','angsa.php');
		$pdf->SetFont('angsa','',15);
		$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','เพศ: หญิง = '.$SexNo.' ชาย = '.$Boy),0,0,"R");
		$pdf ->	Ln();	
		$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ประเภท: จุด = '.$ServiceNo.' ตัว = '.$Body),0,0,"R");
		$pdf ->	Ln();	
		$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','รวม = '.$Total.' คน'),0,0,"R");
		$pdf ->	Ln();	
		$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ยกเลิก = '.$cancel.' คน'),0,0,"R");
	}
	else{
		/* no data found */
		$pdf ->	Ln(4);
		$pdf ->	SetTextColor(255,0,0);
		$pdf ->	Cell(0,6,'No Data',0,0,'C');	
	}
	
	/* generate PDF output */
	$pdf->Output("ใบรายการส่งเงินประจำวัน".$Day.".pdf","D"); 
	//$pdf->Output(); 

	
?>