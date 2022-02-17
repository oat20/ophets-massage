<?php
	require_once("fpdf/fpdf.php");
	define('FPDF_FONTPATH','font/');

	
	$CustomerNo	=	$_GET['CustomerNo'];
				
	$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
	$mysqli -> set_charset('UTF8');
	
	if ($stmt = $mysqli->prepare(" SELECT CusNo, NewDate, Point, CusName, CusSurname, Sex,DATEDIFF(NOW(),CusBirth)/365,CusAddress, CusPhone, CusBirth,
										  Symp, CusDisease, History, Weight, Height, Pressure, Problem, ConThai, ConNow, Help
								   FROM	  customer 
								   WHERE  CustomerNo =  ?")) {
		
		$stmt	->	bind_param('s',$CustomerNo); 			
		$stmt 	-> 	execute();

		$stmt-> bind_result($result1, $result2, $result3, $result4, $result5, $result6, $result7, $result8, $result9, $result10,
		$result11,$result12, $result13, $result14, $result15, $result16, $result17, $result18, $result19,$result20);
			
		/* fetch values */
		while ($stmt->fetch()) {
			$CusNo	  	 =	$result1;
			$NewDate	   = 	$result2;
			$Point		 =	$result3;
			$CusName	   =	$result4;
			$CusSurname	=	$result5;
			$Sex	   	   = 	$result6;
			$NAge	   	   = 	$result7;
			$CusAddress	=	$result8;
			$CusPhone	  =	$result9;
			$CusBirth      = 	$result10;
			$Symp		  = 	$result11;
			$CusDisease    = 	$result12;
			$History	   = 	$result13;
			$Weight	    = 	$result14;
			$Height		= 	$result15;
			$Pressure 	  = 	$result16;
			$Problem	   =	$result17;
			$ConThai	   = 	$result18;
			$ConNow	    =	$result19;
			$Help		  = 	$result20;
		}
		
		
		$Sub = 0;
		
		
		if ($stmt = $mysqli->prepare(" SELECT Date, Service, DocName	, Cost, CostType
									   FROM	  Service
									   WHERE  CustomerNo =  ? AND Sub = ?")) {
			
			$stmt	->	bind_param('si',$CustomerNo,$Sub); 			
			$stmt 	-> 	execute();
	
			$stmt-> bind_result($Date, $Service, $DocName, $Cost, $CostType);
			$i = 0;

			while ($stmt->fetch()) {
				$data[$i]['Date']       =	$Date;
				$data[$i]['Service']     =	$Service;	
				$data[$i]['DocName']  =	$DocName;	
				$data[$i]['Cost']        =	$Cost;
				$data[$i]['CostType']        =	$CostType;	
				$i++;
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
	
	$ND		=	substr($NewDate,8);
	$NM		=	substr($NewDate,5,2);
	$NY		=	substr($NewDate,0,4);
	
	$BD		=	substr($CusBirth,8);
	$BM		=	substr($CusBirth,5,2);
	$BY		=	substr($CusBirth,0,4);
	
	$months	=	array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	
	$Nm	=	$NM - 1;
	$Nmonth = $months[$Nm];
	$Ny	 =	$NY + 543;
	
	$Bm	=	$BM - 1;
	$Bmonth = $months[$Bm];
	$By	 =	$BY + 543;
	
	$Age = floor($NAge);

	
	/* Head */
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',22);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ประวัติคนไข้'),0,0,"C");
	$pdf ->	Ln(12);
	$pdf->SetX( 35 );
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','หมายเลขผู้ป่วย: '.$CusNo),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','วันที่เข้ารับการรักษา: '.$ND.' '.$Nmonth.' '.$Ny),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ชื่อ-นามสกุล: '.$Point.' '.$CusName.' '.$CusSurname),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ที่อยู่: '.$CusAddress),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','วันเกิด: '.$BD.' '.$Bmonth.' '.$By.' อายุ: '.$Age.' ปี'),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','เพศ: '.$Sex),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','เบอร์โทร: '.$CusPhone),0,0,"L");
	$pdf ->	Ln(3);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','________________________________________________________________________________'),0,0,"C");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','อาการ: '.$Symp),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ประวัติการเจ็บป่วยปัจจุบัน: '.$CusDisease),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ประวัติการเจ็บป่วยในอดีต/โรคประจำตัว: '.$History),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','น้ำหนัก: '.$Weight.' กิโลกรัม'),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ส่วนสูง: '.$Height.' เซนติเมตร'),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ความดันโลหิต: '.$Pressure.' มิลลิเมตรปรอท'),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ปัญหาอื่นๆที่พบ: '.$Problem),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','การวินิจฉัยโรคแผนไทย: '.$ConThai),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','การวินิจฉัยโรคแผนปัจจุบัน: '.$ConNow),0,0,"L");
	$pdf ->	Ln(8);
	$pdf->SetX( 35 );
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','การรักษา: '.$Help),0,0,"L");
	$pdf ->	Ln(3);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','________________________________________________________________________________'),0,0,"C");
	$pdf ->	Ln(8);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ประวัติการรักษา'),0,0,"C");

	/* column name */
	$header	=	array('วันที่','ประเภทบริการ', 'ชื่อผู้บำบัด','ราคา','ประเภทการจ่ายเงิน');
	
	/* check data in array */
	if(count($data)>0)
	{
		
		/* set width of each column */
		$w	=	array(20,40,30,15,30);
		
		$pdf ->	SetFont('Arial','B',8);
		$pdf ->	Ln(10);
		$pdf -> SetFillColor(255,255,255);
		$fill 	= 	'true';
		$pdf->SetX( 37 );
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
			$pdf->SetX( 37 );
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);			
			$pdf ->	Cell($w[0],8,$data[$i]['Date'],'1',0,'C',$fill);
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[1],8,iconv( 'UTF-8','TIS-620',$data[$i]['Service']),'1',0,'L',$fill);
			$pdf ->	Cell($w[2],8,iconv( 'UTF-8','TIS-620',$data[$i]['DocName']),'1',0,'L',$fill);
			$pdf ->	Cell($w[3],8,iconv( 'UTF-8','TIS-620',$data[$i]['Cost']),'1',0,'R',$fill);		
			$pdf ->	Cell($w[4],8,iconv( 'UTF-8','TIS-620',$data[$i]['CostType']),'1',0,'L',$fill);			
			
			$pdf ->	Ln();
		}
	}
	else{
		/* no data found */
		$pdf ->	Ln(4);
		$pdf ->	SetTextColor(255,0,0);
		$pdf ->	Cell(0,6,'No Data',0,0,'C');	
	}
	
	/* generate PDF output */
	$pdf->Output("ประวัติคนไข้".$CustomerNo."_".$CusName."_".$CusSurname.".pdf","D"); 
	$pdf->Output(); 

	
?>