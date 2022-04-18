<?php
session_start();
require_once './config.inc.php';
require_once './connect.php';
require_once '../function.php';
require_once './function.inc.php';

$mode  = $_POST['mode'];
$InvoiceNo = mysqli_real_escape_string($con, $_POST['txtInvoiceNo']);
$BookNo = mysqli_real_escape_string($con, $_POST['txtBookNo']);

$InvoiceNo2 = $InvoiceNo + 1;

/* 2. when click print */
	if($mode == "SAVE_NEW"){
			
		$i 	   = 0;

		/* insert invoice into database */
        $sql = "INSERT INTO service(InvoiceNo,BookNo,Date,CusName,CustomerNo,Service,ServiceNo,Hour,Min,DocName,
													DocNo,Cost,CostType,Age,Sub) 
										VALUES ('".$InvoiceNo."', 
												  '".$BookNo."',
												  '".$_POST['txtDate']."', 
												  '".$_POST['txtCusName']."',
												  '".$_POST['txtCustomerNo']."',
												  '".$_POST['txtService']."',
												  '".$_POST['txtServiceNo']."',
												  '".$_POST['txtHour']."',
												  '".$_POST['txtMin']."',
												  '".$_POST['txtDocName']."',
												  '".$_POST['txtDocNo']."',
				 								  '".str_replace( ',', '', $_POST['txtCost'])."',
												 '".$_POST['txtCostType']."',
												  '".$_POST['txtAge']."',
												  '".$i."')
                                                ";
        $stmt = mysqli_query($con, $sql);

        //insert invoice ค่าบริการอื่นๆ
         $sql2 = "INSERT INTO service(InvoiceNo,BookNo,Date,CusName,CustomerNo,Service,ServiceNo,Hour,Min,DocName,
													DocNo,Cost,CostType,Age,Sub) 
										VALUES ('".$InvoiceNo2."', 
												  '".$BookNo."',
												  '".$_POST['txtDate']."', 
												  '".$_POST['txtCusName']."',
												  '".$_POST['txtCustomerNo']."',
												  'ค่าบริการ',
												  '0',
												  '".$_POST['txtHour']."',
												  '".$_POST['txtMin']."',
												  '".$_POST['txtDocName']."',
												  '".$_POST['txtDocNo']."',
				 								  '50.00',
												 'เบิกไม่ได้',
												  '".$_POST['txtAge']."',
												  '".$i."')
                                                ";
                                                $stmt2 = mysqli_query($con, $sql2);

        if($stmt and $stmt2){
			
			/* set NEW mode and clear variable */
			$mode = "NEW";
			unset($_SESSION['Date']);			/* clear session */
			unset($_SESSION['CusName']);
			unset($_SESSION['CustomerNo']);	
			unset($_SESSION['Service']);
			unset($_SESSION['ServiceNo']);
			unset($_SESSION['Hour']);
			unset($_SESSION['Min']);	
			unset($_SESSION['DocName']);
			unset($_SESSION['DocNo']);
			unset($_SESSION['Cost']);
			unset($_SESSION['CostType']);
			unset($_SESSION['Age']);
			unset($_POST);							/* clear session */
			unset($textbox);									
						
			/* set loaded = true for show invoice detail */
			//$loaded 	  =	false;
			//header("location: frmInvoice.php?InvoiceNo=".$_SESSION['InvoiceNo']."&BookNo=".$_SESSION['BookNo']);
		}
		else{
			/* rollback if it's not successfully */
            mysqli_rollback($con);
		}
        mysqli_close($con);
        header('location: ./print-invoice.php');
		
	}
	/* 3. when click cancel mode */
	else if($mode == "SAVE_EDIT"){
		/* connect database */
		/* $mysqli = new mysqli($host, $username, $password, $database); */
		//$mysqli = new mysqli("localhost", "root", "12345", "ophets");
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		$mysqli -> set_charset('utf8');			/* set character */
		$mysqli -> autocommit(false);			/* start transaction */
		
		$InvoiceNo = $_SESSION['InvoiceNo'];
		$BookNo = $_SESSION['BookNo'];
		$i	=	0;
		$CusName   =	"ยกเลิก";
		$CustomerNo   =	"C000000";
		$Cancel   =	"";
		$j	=	-1;
		
		/* update invoice in database */
		if ($stmt = $mysqli -> prepare("UPDATE service SET Cost = ?, CusName = ?, CustomerNo = ?, Service = ?, ServiceNo = ?, DocName = ?, Age = ?, Sub = ?
					  				    WHERE  InvoiceNo=? AND BookNo=?")) {

			/* bind parameters to '?' */
			/* i = int , d = double and float, b = blob, s = all other types */
			$stmt -> bind_param('dsssisiiss',	$i,
										$CusName,
										$CustomerNo,
										$Cancel,
										$i,
										$Cancel,
										$i,
										$j,
										$InvoiceNo,
										$BookNo); 
			/* execute the prepared statement */
			$stmt -> execute();
				
			$mode = "NEW";
			
			unset($_SESSION['Date']);			/* clear session */
			unset($_SESSION['CusName']);
			unset($_SESSION['CustomerNo']);	
			unset($_SESSION['Service']);
			unset($_SESSION['ServiceNo']);
			unset($_SESSION['Hour']);
			unset($_SESSION['Min']);	
			unset($_SESSION['DocName']);
			unset($_SESSION['DocNo']);
			unset($_SESSION['Cost']);
			unset($_SESSION['CostType']);
			unset($_SESSION['Age']);
			unset($_POST);							/* clear session */
			unset($textbox);						/* clear post */
		}
		else{
			/* rollback if it's not successfully */
			$mysqli->rollback();
		}
		$mysqli -> close();		
	}
?>