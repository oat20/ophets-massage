<?php
session_start();
require_once './config.inc.php';
require_once './connect.php';
require_once './function.inc.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $InvoiceNo = mysqli_real_escape_string($con, $_POST['InvoiceNo']);
		$BookNo = $_SESSION['BookNo'];
		$i	=	0;
		$CusName   =	"ยกเลิก";
		$CustomerNo   =	"C000000";
		$Cancel   =	"";
		$j	=	-1;
		
		/* update invoice in database */
        $sql = "UPDATE service SET Cost = '$i', 
            CusName = '$CusName', 
            CustomerNo = '$CustomerNo', 
            Service = '$Cancel', 
            ServiceNo = '$i', 
            DocName = '$Cancel', 
            Age = '$i', 
            Sub = '$j'
					  				    WHERE  InvoiceNo = '$InvoiceNo'
                                          ";
                                          $stmt = mysqli_query($con, $sql);
	 if ($stmt) {
				
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
            mysqli_rollback($con);
		}
        mysqli_close($con);
        header('location: ./invoice.php');		

}
?>