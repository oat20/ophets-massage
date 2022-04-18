<?php
	require_once("fpdf/fpdf.php");
	define('FPDF_FONTPATH','font/');
	sleep(1);
	
	$InvoiceNo	=	$_GET['InvoiceNo'];
	$BookNo	   =	$_GET['BookNo'];   
    //$InvoiceNo	=	"000212";
	//$BookNo	   =	 "0002";
	//echo "<meta http-equiv=\"refresh\" content=\"10\"/>";
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		//$mysqli = new mysqli("localhost", "root", "12345", "ophets");
		$mysqli -> set_charset('utf8');
		
	

//		if ($stmt = $mysqli->prepare("SELECT	S.Date, S.Cost, T.id, T.sub, T.Scost, C.CusNo, C.Point, C.CusName, C.CusSurname, C.Symp, P.CostName
//									FROM 	 customer C JOIN  service S JOIN costtype T JOIN price P  ON C.CustomerNo = S.CustomerNo 
//									AND T.CostType = S.CostType AND P.Cost = S.Cost 
//								WHERE	 InvoiceNo = ?  AND BookNo = ? "))
	if ($stmt = $mysqli->prepare("SELECT	S.Date, S.Cost, C.ConNow, T.id, T.sub, C.CusNo, C.Point, C.CusName, C.CusSurname, P.CostName,
		S.Service
									FROM 	 customer C JOIN  service S ON C.customerNo = S.CustomerNo JOIN costtype T ON S.CostType = T.CostType JOIN price P ON S.Cost = P.Cost
									WHERE	 InvoiceNo = ?  AND BookNo = ? "))
//	if ($stmt = $mysqli->prepare("SELECT	S.Date, S.Cost, T.id
//									FROM 	 service S JOIN costtype T ON S.CostType = T.CostType
//									WHERE	 InvoiceNo = ?  AND BookNo = ? "))
						  								  
		{
			
			$stmt	->	bind_param('ss',$InvoiceNo,$BookNo);
			$stmt 	-> 	execute();
	     // sleep(10);
			/* Bind results to variables */
		$stmt-> bind_result($Date, $Cost, $ConNow, $id, $sub, $CusNo, $Point, $CusName, $CusSurname, $CostName, $Service);
		//$stmt-> bind_result($Date, $Cost, $id);
		
		/* fetch values */
		while ($stmt->fetch()) {
	//		sleep(5);
			$Date	 		 =	$Date;
			$Cost			 =	$Cost;
			$ConNow	   	  	 =	$ConNow;
			$id	   	 	   =	$id;
			$sub	   	 	  =	$sub;
			$CusNo	 	 	=	$CusNo;
			$Point	 	 	=	$Point;
			$CusName	   	  =	$CusName;
			$CusSurname	   =	$CusSurname;
			$CostName		 =	$CostName;
			$Service = $Service;
			
		}
		
		 //print_r($id);
		 //print_r($InvoiceNo);
//		$Day	=	strtotime($Date);
		$strYear		=		date("Y",strtotime($Date))+543;
		$strMonth       =		date("n",strtotime($Date));
		$strDay		 =		date("j",strtotime($Date));
		$strMonthCut    =        array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	    $strMonthThai   =        $strMonthCut[$strMonth];	
	}

		/* Close the statement */
		$stmt->close();
		$mysqli->close();
	//print_r($id);
    //print_r($BookNo);

	/* generate pdf file */
	$pdf	=	new FPDF();
	$pdf ->	AddPage();
	$pdf ->	SetFont('Arial','',8);
	
	class PDF extends FPDF
	{
		//Override คำสั่ง (เมธอด) Footer
		function Footer()	{
	 
			//นับจากขอบกระดาษด้านล่างขึ้นมา 10 มม.
			$this->SetY( -8 );
	 
			//กำหนดใช้ตัวอักษร Arial ตัวเอียง ขนาด 5
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',11);
	 
			$this->Cell(0,10, iconv( 'UTF-8','TIS-620','') ,0,0,'C');
	 
			//พิมพ์ หมายเลขหน้า ตรงมุมขวาล่าง
	//		$this->Cell(0,10,iconv( 'UTF-8','TIS-620','หน้าที่  ').$this->PageNo().' /  tp' ,0,0,'R');
	 
		}
	 
	}
	//เรียกใช้งาน เราจะเรียกใช้คลาสใหม่ของเราแทน
	$pdf=new PDF();
	$pdf->AliasNbPages( 'tp' );
	$pdf ->	AddPage();
	$pdf->SetFont('Arial','',12);
	 
	for( $i=0;$i<20;$i++ ){
	}
	
	$pdf ->	Ln(3);
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',16);
	$pdf->Cell(110,-15,iconv( 'UTF-8','TIS-620',''),0,0,"R");
	$pdf ->	SetFont('Arial','',16);
	$pdf ->	Cell(160,-20,"".$InvoiceNo,0,0,'L');
	
	$pdf ->	Ln();
	$pdf->AddFont('angsa','B','angsab.php');
	$pdf->SetFont('angsa','B',25);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',''),0,1,"C");
	
	$pdf ->	Ln(2);
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',13);
	$pdf->Cell(0,20,iconv( 'UTF-8','TIS-620',''),0,0,"R");
	
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',13);
	$pdf->Cell(0,35,iconv( 'UTF-8','TIS-620',''),0,0,"R");
	
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',13);
	$pdf->Cell(0,50,iconv( 'UTF-8','TIS-620',''),0,0,"R");
	
//	$pdf->Image('mu_jpg.jpg',10,5,30,0,'','');
	$pdf ->	Ln(10);
	
	/* invoice date */
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',13);
	$pdf->Cell(100,33,iconv( 'UTF-8','TIS-620','           สำนักงานบริการเทคโนโลยีสาธารณสุขและสิ่งแวดล้อม'),0,0,"C");
	$pdf ->	Ln(11);
	
	
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',13);
	$pdf->Cell(5,22,iconv( 'UTF-8','TIS-620','                  '.$strDay."                       ".$strMonthThai."                      ".$strYearCut."".                             $strYear),0,0,"L");
	$pdf ->	Ln(2);
	
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',13);
	$pdf->Cell(7,27,iconv( 'UTF-8','TIS-620','                                            '. $CusNo),0,0,"L");
	$pdf ->	Ln(0);
	
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',13);
	$pdf->Cell(130,26,iconv( 'UTF-8','TIS-620','                                                                         '.$Point."  ".$CusName."  ".$CusSurname),0,0,"C");

	$pdf ->	Ln(2);


$pdf->SetFont('angsa','',14);
$pdf->setXY( 5,80);
$pdf->Cell( 10  , 14 , iconv( 'UTF-8','cp874' , '' ),0 , 0 ,'C');
//$pdf->Ln();
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,80 );
$pdf->Cell( 70  , 14 , iconv( 'UTF-8','cp874' , '' ) ,0 , 0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 85,80 );
$pdf->Cell( 20  , 14 , iconv( 'UTF-8','cp874' , '' ),0 , 0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 105,80 );
$pdf->Cell( 30  , 8 , iconv( 'UTF-8','cp874' , '' ),0 , 0 ,'C' );
$pdf->SetFont('angsa','',14);
$pdf->setXY( 105,88 );
$pdf->Cell( 15  , 6 , iconv( 'UTF-8','cp874' , '' ),0 , 0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 120,88 );
$pdf->Cell( 15  , 6 , iconv( 'UTF-8','cp874' , '' ) ,0 , 0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 135,88 );


$pdf->Ln();

$pdf->SetFont('angsa','',14);
$pdf->setXY( 17,60);
$pdf->Cell( 10  , 8 , iconv( 'UTF-8','cp874' ,++$n),0 , 0 ,'C');

$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,94);
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , $array['Act_name'] ),0 , 0 ,'C');

$pdf->setXY( 15,94);
$pdf->Cell( 10	  , 8 , iconv( 'UTF-8','cp874' ,""),0 , 1 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,94);
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , $array['Act_name'] ),0 , 0 ,'C');
//$pdf->Ln();
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,94 );
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '' ) ,0 ,0,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 85,94 );
$pdf->Cell( 20  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 105,94 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 120,94 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');

//เบิกได้ 250 บาท
if($id == "1")
{
	
	if($Cost <= '200.00')
	{
		if($ConNow == 'อัมพฤกษ์' or $ConNow == 'อัมพาต')
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58131)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดและประคบสมุนไพรเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -108  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรคอัมพฤกษ์(58131)' ) ,0 ,0,'C');
		//$pdf->Cell( 95  , 19 , iconv( 'UTF-8','cp874' , '  อัมพาต โรคนันนิบาติ และการฟื้นฟู' ) ,0 ,0,'C');
		//$pdf->Cell( -109  , 28 , iconv( 'UTF-8','cp874' , '  มารดาหลังคลอด(58131)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		}
		else
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58130)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดและประคบสมุนไพรเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -103  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'(58130)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		}
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 112,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,1 ,'C');

		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,122 );
		$pdf->Cell( 100  , 8 , iconv( 'UTF-8','cp874' , '  ' ),0,0 ,'R');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 105,120 );
		$pdf->Cell( 30  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');


		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,134 );
		$pdf->Cell( 130  , 8 , iconv( 'UTF-8','cp874' , '                                                '."        ".$CostName ),0,0 ,'L');
		
	}
	 else if($Cost == '250.00')
	{
		if($ConNow == 'อัมพฤกษ์' or $ConNow == 'อัมพาต')
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58131)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดและประคบสมุนไพรเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -108  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรคอัมพฤกษ์(58131)' ) ,0 ,0,'C');
		//$pdf->Cell( 95  , 19 , iconv( 'UTF-8','cp874' , '  อัมพาต โรคนันนิบาติ และการฟื้นฟู' ) ,0 ,0,'C');
		//$pdf->Cell( -109  , 28 , iconv( 'UTF-8','cp874' , '  มารดาหลังคลอด(58131)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		}
		else
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58130)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดและประคบสมุนไพรเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -100  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'(58130)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		}
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 112,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,1 ,'C');

		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,120 );
		$pdf->Cell( 100  , 8 , iconv( 'UTF-8','cp874' , '  ' ),0,0 ,'R');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 105,120 );
		$pdf->Cell( 30  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');


		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,134 );
		$pdf->Cell( 130  , 8 , iconv( 'UTF-8','cp874' , '                                                '."        ".$CostName ),0,0 ,'L');
		
	}
	else
	{
		if($ConNow == 'อัมพฤกษ์' or $ConNow == 'อัมพาต')
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58131)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดและประคบสมุนไพรเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -107  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรคอัมพฤกษ์(58131)' ) ,0 ,0,'C');
		//$pdf->Cell( 95  , 19 , iconv( 'UTF-8','cp874' , '  อัมพาต โรคนันนิบาติ และการฟื้นฟู' ) ,0 ,0,'C');
		//$pdf->Cell( -109  , 28 , iconv( 'UTF-8','cp874' , '  มารดาหลังคลอด(58131)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $sub ),0,0 ,'C');
		
		}
		else
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58130)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดและประคบสมุนไพรเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -100  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'(58130)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $sub ),0,0 ,'C');
		}
		
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 17,75);
		$pdf->Cell( 10  , 35 , iconv( 'UTF-8','cp874' ,++$n),0 , 0 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,75);
		$pdf->Cell( 70  , 35 , iconv( 'UTF-8','cp874' , $array['Act_name'] ),0 , 0 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,75 );
		$pdf->Cell( 70  , 35 , iconv( 'UTF-8','cp874' , '  นวดเพื่อสุขภาพ' ) ,0 ,0,'L');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 114,60 );
		$pdf->Cell( 11  , 8 , iconv( 'UTF-8','cp874' , $sub ),0,1 ,'C');
		$pdf->SetFont('angsa','',14);
		
		$pdf->setXY( 132,75 );	
		$Cost = $Cost - $sub;
		$pdf->Cell( 15  , 35 , iconv( 'UTF-8','cp874' , $Cost.".00" ),0,1 ,'C');
		$pdf->setXY( 92,75 );
		$pdf->Cell( 15  , 35 , iconv( 'UTF-8','cp874' , $Cost.".00" ),0,1 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,120 );
		$pdf->Cell( 100  , 35 , iconv( 'UTF-8','cp874' , '  ' ),0,0 ,'R');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 126,133 );
		$Cost = $Cost + $sub;
		$pdf->Cell( 30  , 8 , iconv( 'UTF-8','cp874' , $Cost.".00" ),0,0 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 7,134 );
		$pdf->Cell( 130  , 8 , iconv( 'UTF-8','cp874' , '                                                '."        ".$CostName ),0,0 ,'L');
		
		$pdf->setXY( 114,120 );
		$pdf->Cell( 12  , 8 , iconv( 'UTF-8','cp874' , $sub ),0,1 ,'C');
		$pdf->SetFont('angsa','',14);
		
		$pdf->setXY( 133,106.5 );	
		$Cost = $Cost - $sub;
		$pdf->Cell( 15  , 35 , iconv( 'UTF-8','cp874' , $Cost.".00" ),0,1 ,'C');
	}
	
}
//เบิกได้เต็มจำนวน
else if($id == "2")
{
	 
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow ) ,0 ,0,'L');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 112,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,1 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,120 );
		$pdf->Cell( 100  , 8 , iconv( 'UTF-8','cp874' , '  ' ),0,0 ,'R');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 105,120 );
		$pdf->Cell( 30  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');



		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,134 );
		$pdf->Cell( 130  , 8 , iconv( 'UTF-8','cp874' , '                                                '."        ".$CostName ),0,0 ,'L');

	  
}
//เบิกไม่ได้
else if($id == "3")
{
	
	
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  นวดเพื่อสุขภาพ' ) ,0,0,'L');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 20  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 132,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,1 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,120 );
		$pdf->Cell( 100  , 8 , iconv( 'UTF-8','cp874' , '  ' ),0,0 ,'R');

		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 105,120 );
		$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');


		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,134 );
		$pdf->Cell( 130  , 8 , iconv( 'UTF-8','cp874' , '                                                '."        ".$CostName  ),0,0 ,'L');

}
//เบิกไม่ได้ และเป็นค่าบริการอื่นๆ
else if($id == '3' and ($Service == 'อื่นๆ' or $Service == 'ค่าบริการ')){
	$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  ค่าบริการ' ) ,0,0,'L');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 20  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 132,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,1 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,120 );
		$pdf->Cell( 100  , 8 , iconv( 'UTF-8','cp874' , '  ' ),0,0 ,'R');

		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 105,120 );
		$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');


		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,134 );
		$pdf->Cell( 130  , 8 , iconv( 'UTF-8','cp874' , '                                                '."        ".$CostName  ),0,0 ,'L');
}
//เบิกได้ 200 บาท
else if($id == '4'){

	if($Cost <= '200.00')
	{
		if($ConNow == 'อัมพฤกษ์' or $ConNow == 'อัมพาต')
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58131)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -108  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรคอัมพฤกษ์(58101)' ) ,0 ,0,'C');
		//$pdf->Cell( 95  , 19 , iconv( 'UTF-8','cp874' , '  อัมพาต โรคนันนิบาติ และการฟื้นฟู' ) ,0 ,0,'C');
		//$pdf->Cell( -109  , 28 , iconv( 'UTF-8','cp874' , '  มารดาหลังคลอด(58131)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		}
		else
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58130)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -103  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'(58101)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		}
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 112,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,1 ,'C');

		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,122 );
		$pdf->Cell( 100  , 8 , iconv( 'UTF-8','cp874' , '  ' ),0,0 ,'R');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 105,120 );
		$pdf->Cell( 30  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');


		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,134 );
		$pdf->Cell( 130  , 8 , iconv( 'UTF-8','cp874' , '                                                '."        ".$CostName ),0,0 ,'L');
		
	}
	 else if($Cost == '200.00')
	{
		if($ConNow == 'อัมพฤกษ์' or $ConNow == 'อัมพาต')
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58131)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -108  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรคอัมพฤกษ์(58101)' ) ,0 ,0,'C');
		//$pdf->Cell( 95  , 19 , iconv( 'UTF-8','cp874' , '  อัมพาต โรคนันนิบาติ และการฟื้นฟู' ) ,0 ,0,'C');
		//$pdf->Cell( -109  , 28 , iconv( 'UTF-8','cp874' , '  มารดาหลังคลอด(58131)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		}
		else
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58130)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -100  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'(58101)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');
		}
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 112,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,1 ,'C');

		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,120 );
		$pdf->Cell( 100  , 8 , iconv( 'UTF-8','cp874' , '  ' ),0,0 ,'R');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 105,120 );
		$pdf->Cell( 30  , 8 , iconv( 'UTF-8','cp874' , $Cost ),0,0 ,'C');


		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,134 );
		$pdf->Cell( 130  , 8 , iconv( 'UTF-8','cp874' , '                                                '."        ".$CostName ),0,0 ,'L');
		
	}
	else
	{
		if($ConNow == 'อัมพฤกษ์' or $ConNow == 'อัมพาต')
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58131)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -107  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรคอัมพฤกษ์(58101)' ) ,0 ,0,'C');
		//$pdf->Cell( 95  , 19 , iconv( 'UTF-8','cp874' , '  อัมพาต โรคนันนิบาติ และการฟื้นฟู' ) ,0 ,0,'C');
		//$pdf->Cell( -109  , 28 , iconv( 'UTF-8','cp874' , '  มารดาหลังคลอด(58131)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $sub ),0,0 ,'C');
		
		}
		else
		{
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,60 );
		//$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'และประคบสมุนไพร (58130)' ) ,0 ,0,'L');
		$pdf->Cell( 73  , 0	 , iconv( 'UTF-8','cp874' , ' ค่านวดเพื่อการบำบัด' ) ,0 ,0,'L');
		$pdf->Cell( -100  , 10 , iconv( 'UTF-8','cp874' , '  รักษาโรค'.$ConNow.'(58101)' ) ,0 ,0,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 92,60 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , $sub ),0,0 ,'C');
		}
		
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 17,75);
		$pdf->Cell( 10  , 35 , iconv( 'UTF-8','cp874' ,++$n),0 , 0 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,75);
		$pdf->Cell( 70  , 35 , iconv( 'UTF-8','cp874' , $array['Act_name'] ),0 , 0 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 31,75 );
		$pdf->Cell( 70  , 35 , iconv( 'UTF-8','cp874' , '  นวดเพื่อสุขภาพ' ) ,0 ,0,'L');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 114,60 );
		$pdf->Cell( 11  , 8 , iconv( 'UTF-8','cp874' , $sub ),0,1 ,'C');
		$pdf->SetFont('angsa','',14);
		
		$pdf->setXY( 132,75 );	
		$Cost = $Cost - $sub;
		$pdf->Cell( 15  , 35 , iconv( 'UTF-8','cp874' , $Cost.".00" ),0,1 ,'C');
		$pdf->setXY( 92,75 );
		$pdf->Cell( 15  , 35 , iconv( 'UTF-8','cp874' , $Cost.".00" ),0,1 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 5,120 );
		$pdf->Cell( 100  , 35 , iconv( 'UTF-8','cp874' , '  ' ),0,0 ,'R');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 126,133 );
		$Cost = $Cost + $sub;
		$pdf->Cell( 30  , 8 , iconv( 'UTF-8','cp874' , $Cost.".00" ),0,0 ,'C');
		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 7,134 );
		$pdf->Cell( 130  , 8 , iconv( 'UTF-8','cp874' , '                                                '."        ".$CostName ),0,0 ,'L');
		
		$pdf->setXY( 114,120 );
		$pdf->Cell( 12  , 8 , iconv( 'UTF-8','cp874' , $sub ),0,1 ,'C');
		$pdf->SetFont('angsa','',14);
		
		$pdf->setXY( 133,106.5 );	
		$Cost = $Cost - $sub;
		$pdf->Cell( 15  , 35 , iconv( 'UTF-8','cp874' , $Cost.".00" ),0,1 ,'C');
	}

}
//end item in receipt

		$pdf->SetFont('angsa','',14);
		$pdf->setXY( 120,94 );
		$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,1 ,'C');
		$pdf ->	Ln();



$pdf->setXY( 5,102);
$pdf->Cell( 10	  , 8 , iconv( 'UTF-8','cp874' ,""),0 , 1 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,102);
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , $array['Act_name'] ),0 , 0 ,'C');
//$pdf->Ln();
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,102 );
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '' ) ,0 ,0,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 85,102 );
$pdf->Cell( 20  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 105,102 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 120,102 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');



$pdf->setXY( 5,102);
$pdf->Cell( 10	  , 8 , iconv( 'UTF-8','cp874' ,""),0 , 1 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,102);
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , $array['Act_name'] ),0 , 0 ,'C');
//$pdf->Ln();
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,102 );
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '' ) ,0 ,0,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 85,102 );
$pdf->Cell( 20  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 105,102 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 120,102 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');




$pdf->setXY( 5,110);
$pdf->Cell( 10	  , 8 , iconv( 'UTF-8','cp874' ,""),0 , 1 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,110);
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , $array['Act_name'] ),0 , 0 ,'C');
//$pdf->Ln();
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,110 );
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '' ) ,0 ,0,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 85,110 );
$pdf->Cell( 20  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 105,110 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 120,110 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');


$pdf->setXY( 5,118);
$pdf->Cell( 10	  , 8 , iconv( 'UTF-8','cp874' ,""),0 , 1 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,118);
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , $array['Act_name'] ),0 , 0 ,'C');
//$pdf->Ln();
$pdf->SetFont('angsa','',14);
$pdf->setXY( 15,118 );
$pdf->Cell( 70  , 8 , iconv( 'UTF-8','cp874' , '' ) ,0 ,0,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 85,118 );
$pdf->Cell( 20  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 105,118 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');
$pdf->SetFont('angsa','',14);
$pdf->setXY( 120,118 );
$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , '' ),0,0 ,'C');


$pdf->Ln();

$pdf->SetFont('angsa','',14);
$pdf->setXY( 100,144 );
//$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , 'ลงชื่อ........................................................ผู้รับเงิน' ),0,0 ,'C');
$pdf->setXY( 100,149 );

//$pdf->Cell( 15  , 8 , iconv( 'UTF-8','cp874' , 'ตำแหน่ง		        เจ้าหน้าที่การเงิน' ),0,0 ,'C');
	/* generate PDF output */
	
//	echo"<meta http-equiv=refresh content=5/>";
	
$pdf->Output("เลขที่ใบเสร็จ".$InvoiceNo."รอบที่".$BookNo.".pdf","D"); 
//$pdf->Output();	
?>