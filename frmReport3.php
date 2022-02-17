<?php
	require_once("fpdf/fpdf.php");
	define('FPDF_FONTPATH','font/');
	
	$Day	=	$_GET['Month'];
	$M		=	substr($Day,5);
	$Y		=	substr($Day,0,4);
	
	$months	=	array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	
	$m	=	$M - 1;
	$month = $months[$m];
	$y	 =	$Y + 543;
	
	$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
	$mysqli -> set_charset('tis620');
	
	if ($stmt = $mysqli->prepare("SELECT	Date
								  FROM 	 service
								  WHERE	 MONTH(Date) =  ? AND YEAR(Date) = ?
								  GROUP BY Date")) {	
		
		$stmt	->	bind_param('ss',$M,$Y);
		$stmt 	-> 	execute();

		/* Bind results to variables */
		$stmt-> bind_result($Date);
		$i = 0;

		while ($stmt->fetch()) {
			$data[$i]['Date']     =	$Date;
			$i++;
		}
		
		$SexNo = 1;
		$Sub = 0;
		
		if ($stmt = $mysqli->prepare("SELECT S.CustomerNo
													FROM customer C
													JOIN service S ON C.CustomerNo = S.CustomerNo
													WHERE MONTH( S.Date ) =  ?
													AND YEAR( S.Date ) =  ?
													AND C.SexNo = ?
													AND S.Sub = ?
													GROUP BY C.CustomerNo")) {	
			
			$stmt	->	bind_param('ssii',$M,$Y,$SexNo,$Sub);
			$stmt 	-> 	execute();
	
			/* Bind results to variables */
			$stmt-> bind_result($PeopleW);
			$a= 0;
	
			while ($stmt->fetch()) {
				$line[$i]['PeopleW']     =	$PeopleW;
				$a++;
			}
		}
		
		$SexNo = 0;
		
		if ($stmt = $mysqli->prepare("SELECT S.CustomerNo
													FROM customer C
													JOIN service S ON C.CustomerNo = S.CustomerNo
													WHERE MONTH( S.Date ) =  ?
													AND YEAR( S.Date ) =  ?
													AND C.SexNo = ?
													AND S.Sub = ?
													GROUP BY C.CustomerNo")) {	
			
			$stmt	->	bind_param('ssii',$M,$Y,$SexNo,$Sub);
			$stmt 	-> 	execute();
	
			/* Bind results to variables */
			$stmt-> bind_result($PeopleM);
			$b= 0;
	
			while ($stmt->fetch()) {
				$line[$i]['PeopleM']     =	$PeopleM;
				$b++;
			}
		}
		
		/*---service type women---*/
		for($j=0;$j<$i;$j++){
			$SexNo = 1;
			
			if($stmt = $mysqli->prepare("SELECT T.id,  COUNT( C.Sex ) 
											FROM customer C
											JOIN service S
											JOIN servicetype T ON C.CustomerNo = S.CustomerNo
											AND S.Service = T.Service
											WHERE S.Date = ?
											AND C.SexNo = ?
											GROUP BY T.Service")){
				
				$stmt	->	bind_param('si',$data[$j]['Date'],$SexNo);
				$stmt 	-> 	execute();
				
				/* Bind results to variables */
				$stmt-> bind_result($id,$Sex);
				$k = 0;
		
				while ($stmt->fetch()) {
					$data[$j][$k]['id']     =	$id;
					$data[$j][$k]['Sex']     =	$Sex;
					$k++;
				}
				
				for($x=0;$x<$k;$x++){
					if($data[$j][$x]['id'] == '1'){
						$data[$j]['TPW'] = $data[$j][$x]['Sex'];
						$TPW = $TPW + $data[$j]['TPW'];
					}
					else if($data[$j][$x]['id'] == '2'){
						$data[$j]['TBW'] = $data[$j][$x]['Sex'];
						$TBW = $TBW + $data[$j]['TBW'];
					}
					else if($data[$j][$x]['id'] == '3'){
						$data[$j]['TTW'] = $data[$j][$x]['Sex'];
						$TTW = $TTW + $data[$j]['TTW'];
					}
					else if($data[$j][$x]['id'] == '4'){
						$data[$j]['THW'] = $data[$j][$x]['Sex'];
						$THW = $THW + $data[$j]['THW'];
					}
				}
			}
			else{
				$data[$j]['TPW'] = 0;
				$data[$j]['TBW'] = 0;
				$data[$j]['TTW'] = 0;
				$data[$j]['THW'] = 0;
			}
		}
		
		/*---service type men---*/
		for($j=0;$j<$i;$j++){
			$SexNo = 0;
			
			if($stmt = $mysqli->prepare("SELECT T.id,  COUNT( C.Sex ) 
											FROM customer C
											JOIN service S
											JOIN servicetype T ON C.CustomerNo = S.CustomerNo
											AND S.Service = T.Service
											WHERE S.Date = ?
											AND C.SexNo = ?
											GROUP BY T.Service")){
				
				$stmt	->	bind_param('si',$data[$j]['Date'],$SexNo);
				$stmt 	-> 	execute();
				
				/* Bind results to variables */
				$stmt-> bind_result($id,$Sex);
				$k = 0;
		
				while ($stmt->fetch()) {
					$data[$j][$k]['id']     =	$id;
					$data[$j][$k]['Sex']     =	$Sex;
					$k++;
				}
				
				for($x=0;$x<$k;$x++){
					if($data[$j][$x]['id'] == '1'){
						$data[$j]['TPM'] = $data[$j][$x]['Sex'];
						$TPM = $TPM + $data[$j]['TPM'];
					}
					else if($data[$j][$x]['id'] == '2'){
						$data[$j]['TBM'] = $data[$j][$x]['Sex'];
						$TBM = $TBM + $data[$j]['TBM'];
					}
					else if($data[$j][$x]['id'] == '3'){
						$data[$j]['TTM'] = $data[$j][$x]['Sex'];
						$TTM = $TTM + $data[$j]['TTM'];
					}
					else if($data[$j][$x]['id'] == '4'){
						$data[$j]['THM'] = $data[$j][$x]['Sex'];
						$THM = $THM + $data[$j]['THM'];
					}
				}
			}
			else{
				$data[$j]['TPM'] = 0;
				$data[$j]['TBM'] = 0;
				$data[$j]['TTM'] = 0;
				$data[$j]['THM'] = 0;
			}
		}
		
		/*---New Customer---*/
		for($j=0;$j<$i;$j++){
			
			if($stmt = $mysqli->prepare("SELECT C.SexNo, COUNT( C.Sex ) 
											FROM customer C
											JOIN service S
											JOIN servicetype T ON C.CustomerNo = S.CustomerNo
											AND S.Service = T.Service
											WHERE S.Date =  ?
											AND C.NewDate =  ?
											GROUP BY C.Sex")){
				
				$stmt	->	bind_param('ss',$data[$j]['Date'],$data[$j]['Date']);
				$stmt 	-> 	execute();
				
				/* Bind results to variables */
				$stmt-> bind_result($SexNo,$Sex);
				$k = 0;
		
				while ($stmt->fetch()) {
					$data[$j][$k]['SexNo']     =	$SexNo;
					$data[$j][$k]['Sex']     =	$Sex;
					$k++;
				}
				
				for($x=0;$x<$k;$x++){
					if($data[$j][$x]['SexNo'] == '0'){
						$data[$j]['NM'] = $data[$j][$x]['Sex'];
						$NM = $NM + $data[$j]['NM'];
					}
					else if($data[$j][$x]['SexNo'] == '1'){
						$data[$j]['NW'] = $data[$j][$x]['Sex'];
						$NW = $NW + $data[$j]['NW'];
					}
				}
			}
			else{
				$data[$j]['NM'] = 0;
				$data[$j]['NW'] = 0;
			}
		}
		
		/*---Total Customer---*/
		for($j=0;$j<$i;$j++){
			
			if($stmt = $mysqli->prepare("SELECT C.SexNo, COUNT( C.Sex ) 
											FROM customer C
											JOIN service S
											JOIN servicetype T ON C.CustomerNo = S.CustomerNo
											AND S.Service = T.Service
											WHERE S.Date =  ?
											GROUP BY C.Sex")){
				
				$stmt	->	bind_param('s',$data[$j]['Date']);
				$stmt 	-> 	execute();
				
				/* Bind results to variables */
				$stmt-> bind_result($SexNo,$Sex);
				$k = 0;
		
				while ($stmt->fetch()) {
					$data[$j][$k]['SexNo']     =	$SexNo;
					$data[$j][$k]['Sex']     =	$Sex;
					$k++;
				}
				
				for($x=0;$x<$k;$x++){
					if($data[$j][$x]['SexNo'] == '0'){
						$data[$j]['TM'] = $data[$j][$x]['Sex'];
						$TM = $TM + $data[$j]['TM'];
					}
					else if($data[$j][$x]['SexNo'] == '1'){
						$data[$j]['TW'] = $data[$j][$x]['Sex'];
						$TW = $TW + $data[$j]['TW'];
					}
				}
			}
			else{
				$data[$j]['TM'] = 0;
				$data[$j]['TW'] = 0;
			}
		}
		
		/* Close the statement */
		$stmt->close();
	}
	
	
	/* generate pdf file */
	$pdf	=	new FPDF();
	$pdf ->	AddPage();
	$pdf ->	SetFont('Arial','',8);
	
	/* Head */
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','สรุปผู้มารับบริการ ประจำเดือน '.$month.' '.$y),0,0,"C");
		
	/* column name */
	$header	=	array('วันที่ เดือน ปี','เก่า','ใหม่','รวม','เก่า','ใหม่','รวม','รวม','ญ','ช','รวม','ญ','ช','รวม','ญ','ช','รวม','ญ','ช','รวม');
	
	/* check data in array */
	if(count($data)>0)
	{
		
		/* set width of each column */
		$w	=	array(30,8,8,8,8,8,8,8,8,8,8,8,8,8,8,8,8,8,8,8);
		
		$pdf ->	SetFont('Arial','B',8);
		
		$pdf -> SetFillColor(255,255,255);
		$fill 	= 	'true';
		$pdf ->Ln(10);
		$pdf->SetX( 12 );
		$pdf->AddFont('angsa','','angsa.php');
		$pdf->SetFont('angsa','',15);
		$pdf->Cell(30,6,' ','0',0,'C');
		$pdf->Cell(24,6,iconv( 'UTF-8','TIS-620','หญิง'),1,0,"C");
		$pdf->Cell(24,6,iconv( 'UTF-8','TIS-620','ชาย'),1,0,"C");
		$pdf->Cell(8,6,iconv( 'UTF-8','TIS-620',' '),1,0,"C");
		$pdf->Cell(24,6,iconv( 'UTF-8','TIS-620','กดจุด'),1,0,"C");
		$pdf->Cell(24,6,iconv( 'UTF-8','TIS-620','นวด'),1,0,"C");
		$pdf->Cell(24,6,iconv( 'UTF-8','TIS-620','ประคบ'),1,0,"C");
		$pdf->Cell(24,6,iconv( 'UTF-8','TIS-620','นวด + ประคบ'),1,0,"C");
		$pdf ->Ln();
		$pdf->SetX( 12 );
		/* display column name */
		for($i=0; $i<count($header); $i++)
		{
			$pdf->AddFont('angsa','','angsa.php');
			$pdf->SetFont('angsa','',15);
			$pdf ->	Cell($w[$i],6,iconv( 'UTF-8','TIS-620',$header[$i]),'1',0,'C');
		}

		$pdf ->	Ln();
		$pdf ->	Cell(array_sum($w),0,'','0');
		$pdf ->	Ln();	
			
		/* display data */
		$pdf ->	SetFont('Arial','',8);
					
		for($i=0; $i<count($data); $i++)
		{		
		
		$pdf->SetX( 12 );
			$D	  =	substr($data[$i]['Date'],8);
			
			$pdf ->	AddFont('angsa','','angsa.php');
			$pdf ->	SetFont('angsa','',15);
			$pdf ->	Cell($w[0],6,iconv( 'UTF-8','TIS-620',$D." ".$month." ".$y),'1',0,'C',$fill);
			$pdf ->	Cell($w[1],6,number_format($data[$i]['TW'] - $data[$i]['NW']),'1',0,'C',$fill);
			$pdf ->	Cell($w[2],6,number_format($data[$i]['NW']),'1',0,'C',$fill);
			$pdf ->	Cell($w[3],6,number_format($data[$i]['TW']),'1',0,'C',$fill);
			$pdf ->	Cell($w[4],6,number_format($data[$i]['TM'] - $data[$i]['NM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[5],6,number_format($data[$i]['NM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[6],6,number_format($data[$i]['TM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[7],6,number_format($data[$i]['TM'] + $data[$i]['TW']),'1',0,'C',$fill);			
			$pdf ->	Cell($w[8],6,number_format($data[$i]['TPW']),'1',0,'C',$fill);
			$pdf ->	Cell($w[9],6,number_format($data[$i]['TPM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[10],6,number_format($data[$i]['TPW'] + $data[$i]['TPM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[11],6,number_format($data[$i]['TBW']),'1',0,'C',$fill);
			$pdf ->	Cell($w[12],6,number_format($data[$i]['TBM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[13],6,number_format($data[$i]['TBW'] + $data[$i]['TBM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[14],6,number_format($data[$i]['THW']),'1',0,'C',$fill);
			$pdf ->	Cell($w[15],6,number_format($data[$i]['THM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[16],6,number_format($data[$i]['THW'] + $data[$i]['THM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[17],6,number_format($data[$i]['TTW']),'1',0,'C',$fill);
			$pdf ->	Cell($w[18],6,number_format($data[$i]['TTM']),'1',0,'C',$fill);
			$pdf ->	Cell($w[19],6,number_format($data[$i]['TTW'] + $data[$i]['TTM']),'1',0,'C',$fill);
			$pdf ->	Ln();
		}
		$pdf->SetX( 12 );
		$pdf ->	AddFont('angsa','','angsa.php');
		$pdf ->	SetFont('angsa','',15);
		$pdf ->	Cell($w[0],6,iconv( 'UTF-8','TIS-620','รวม'),'1',0,'C');
		
		$pdf ->	SetFont('Arial','',8);
		$pdf ->	Cell($w[1],6,number_format($TW - $NW),'1',0,'C');
		$pdf ->	Cell($w[2],6,number_format($NW),'1',0,'C');
		$pdf ->	Cell($w[3],6,number_format($TW),'1',0,'C');
		$pdf ->	Cell($w[4],6,number_format($TM - $NM),'1',0,'C');
		$pdf ->	Cell($w[5],6,number_format($NM),'1',0,'C');
		$pdf ->	Cell($w[6],6,number_format($TM),'1',0,'C');
		$pdf ->	Cell($w[7],6,number_format($TM + $TW),'1',0,'C');
		$pdf ->	Cell($w[8],6,number_format($TPW),'1',0,'C');
		$pdf ->	Cell($w[9],6,number_format($TPM),'1',0,'C');
		$pdf ->	Cell($w[10],6,number_format($TPW + $TPM),'1',0,'C');
		$pdf ->	Cell($w[11],6,number_format($TBW),'1',0,'C');
		$pdf ->	Cell($w[12],6,number_format($TBM),'1',0,'C');
		$pdf ->	Cell($w[13],6,number_format($TBW + $TBM),'1',0,'C');
		$pdf ->	Cell($w[14],6,number_format($THW),'1',0,'C');
		$pdf ->	Cell($w[15],6,number_format($THM),'1',0,'C');
		$pdf ->	Cell($w[16],6,number_format($THW + $THM),'1',0,'C');
		$pdf ->	Cell($w[17],6,number_format($TTW),'1',0,'C');
		$pdf ->	Cell($w[18],6,number_format($TTM),'1',0,'C');
		$pdf ->	Cell($w[19],6,number_format($TTW + $TTM),'1',0,'C');
		$pdf ->	Ln();
		
		$pdf ->	Ln();
		$pdf->AddFont('angsa','','angsa.php');
		$pdf->SetFont('angsa','',15);
		$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','สรุปจำนวนคนประจำเดือน: หญิง = '.$a.' คน ชาย = '.$b.' คน'),0,0,"R");
	}
	else{
		/* no data found */
		$pdf ->	Ln(4);
		$pdf ->	SetTextColor(255,0,0);
		$pdf ->	Cell(0,6,'No Data',0,0,'C');	
	}
	
	/* generate PDF output */
	$pdf->Output("สรุปผู้มารับบริการ ประจำเดือน".$month."_".$y.".pdf","D"); 
	$pdf->Output(); 

	
?>