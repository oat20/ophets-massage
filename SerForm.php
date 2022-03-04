<?php
session_start();			/* for use session */

require_once './config.php';
if(!isset($_SESSION['UserID']))
	{
		echo "Please Login!";
		echo "<br /><a href='index.php'>go to Login page </a>";
		exit();
	}
	
	$_SESSION['InvoiceNo'] 	 = $_POST['txtInvoiceNo'];
	$_SESSION['BookNo'] 		= $_POST['txtBookNo'];
	$_SESSION['Date']	  	  = $_POST['txtDate'];
    $_SESSION['CusName']       = $_POST['txtCusName'];
	$_SESSION['CustomerNo']	= $_POST['txtCustomerNo'];
	$_SESSION['Service']   	   = $_POST['txtService'];
	$_SESSION['ServiceNo']   	 = $_POST['txtServiceNo'];
    $_SESSION['Hour']	  	  = $_POST['txtCusHour'];
	$_SESSION['Min']	   	   = $_POST['txtMin'];
	$_SESSION['Cost']	  	  = $_POST['txtCost'];
	$_SESSION['CostType']  	  = $_POST['txtCostType'];
	$_SESSION['DocName']   	   = $_POST['txtDocName'];
	$_SESSION['DocNo']   	     = $_POST['txtDocNo'];
	$_SESSION['Age']   	   	   = $_POST['txtAge'];
?>

<?php
	include "function.php";
	
	/* set when open first*/		
	if(!isset($DirtyBit)){
		$DirtyBit	=	"CLEAR";			/* dirty bit use for check editing in page */
		$mode		=	"NEW";				/* mode: NEW/COPY/EDIT/SAVE_NEW/SAVE_EDIT */
	}	
	
	$label	=	setLabel();						/* set label */					
				
	/* --------------------------------------------------------------------------------------------------------------- */		
	/* get button from POST */
	/* 1. when click NEW */
	if(isset($_POST['btnNew_x']) || $mode == 'NEW'){
		if($DirtyBit == 'CLEAR'){		
			$mode		= 	"NEW";		
			$loaded		=	false;					/* load = false : invoice detail is not displayed */
						
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
	}
	/* 2. when click print */
	else if($mode == "SAVE_NEW"){
		/* connect database */
		/* $mysqli = new mysqli($host, $username, $password, $database); */
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		//$mysqli = new mysqli("localhost", "root", "12345", "ophets");
		$mysqli -> set_charset('utf8');			/* set character */
		$mysqli -> autocommit(false);			/* start transaction */
			
		$i 	   = 0;
		
		/* insert invoice into database */
		if ($stmt = $mysqli -> prepare("INSERT INTO service(InvoiceNo,BookNo,Date,CusName,CustomerNo,Service,ServiceNo,Hour,Min,DocName,
													DocNo,Cost,CostType,Age,Sub) 
										VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);")) {
			/* bind parameters to '?' */
			/* i = int , d = double and float, b = blob, s = all other types */	
			$stmt	->	bind_param('ssssssiiissdsii', $InvoiceNo, 
												  $BookNo,
												  $_POST['txtDate'], 
												  $_POST['txtCusName'],
												  $_POST['txtCustomerNo'],
												  $_POST['txtService'],
												  $_POST['txtServiceNo'],
												  $_POST['txtHour'],
												  $_POST['txtMin'],
												  $_POST['txtDocName'],
												  $_POST['txtDocNo'],
				 								  str_replace( ',', '', $_POST['txtCost']),
												  $_POST['txtCostType'],
												  $_POST['txtAge'],
												  $i); 
			/* execute the prepared statement */
			$stmt -> execute();												
			
			/* insert successfully */
			$mysqli -> commit();	
			$stmt -> close();	
			
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
			$loaded 	  =	false;
			//header("location: frmInvoice.php?InvoiceNo=".$_SESSION['InvoiceNo']."&BookNo=".$_SESSION['BookNo']);
		}
		else{
			/* rollback if it's not successfully */
			$mysqli->rollback();
		}
		$mysqli -> close();
		
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
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* query InvoiceNo detail */
	if($loaded == true){
		$loaded = false;				/* clear load InvoiceNo */

		/* SAVE in NEW mode */
		if($mode == "SAVE_NEW"){
			$_SESSION['InvoiceNo'] 	=	$InvoiceNo;			/* $InvoiceNo from 2. */
			$mode = "EDIT";
		}
		else{
			$_SESSION['InvoiceNo'] 	=	$_POST['txtInvoiceNo'];
		}	
		
		/* connect database */
		/* $mysqli = new mysqli($host, $username, $password, $database); */
		//$mysqli = new mysqli("localhost", "root", "12345", "ophets");
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		$mysqli -> set_charset('utf8');			/* set character */
		
		/* select doctor header */
		if ($stmt = $mysqli->prepare(" SELECT *
									   FROM	  service 
									   WHERE  InvoiceNo =  ?")) {
			/* bind parameters to '?' */
			/* i = int , d = double and float, b = blob, s = all other types */
			$stmt	->	bind_param('s',$_SESSION['InvoiceNo']); 
			
			/* execute the prepared statement */
			$stmt 	-> 	execute();

			/* bind results to variables */
			$stmt-> bind_result($result1, $result2, $result3, $result4, $result5, $result6, $result7, $result8, $result9, $result10,$result11,$result12,$result13,$result14,$result15);
			
			/* fetch values */
			while ($stmt->fetch()) {
				$_SESSION['InvoiceNo']	=	$result1;
				$_SESSION['BookNo']	   =	$result2;
				$_SESSION['Date']	     =	$result3;
				$_SESSION['CusName']	  =	$result4;
				$_SESSION['CustomerNo']   =	$result5;
				$_SESSION['Service']	  =	$result6;
				$_SESSION['ServiceNo']	=	$result7;
				$_SESSION['Hour']	  	 =	$result8;
				$_SESSION['Min']		  =	$result9;
				$_SESSION['DocName']	  =	$result10;
				$_SESSION['DocNo']	    =	$result11;
				$_SESSION['Cost']	  	 =	$result12;
				$_SESSION['CostType']	 =	$result13;
				$_SESSION['Age']		  =	$result14;
				$_SESSION['Sub']		  =	$result15;
			}
		}
	}
	
	/* set textbox Invoice No */
	/* display 'NEW' when mode = NEW*/
	if($mode == "NEW"){
		/* connect database */
		/* $mysqli = new mysqli($host, $username, $password, $database); */
		//$mysqli = new mysqli("localhost", "root", "12345", "ophets");
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		$mysqli -> set_charset('utf8');			/* set character */
		$mysqli -> autocommit(false);			/* start transaction */
			
		/* new Book No. */
		if ($stmt = $mysqli->prepare("SELECT MAX(BookNo) FROM service")) {
			/* execute the prepared statement */
			$stmt -> 	execute();
						
			/* bind results to variables */
			$stmt-> bind_result($result);
						
			/* fetch results */
			while ($stmt->fetch()) {
				if (empty($result)) 
					$BookNo	=	"0000";
				else 
					$BookNo 	= 	$result;
			}
		}
		else{
			/* rollback if it's not successfully */
			$mysqli->rollback();
		}
		
		$_SESSION['BookNo'] 	   = $BookNo;
			
		/* set new invoiceno */
		if ($stmt = $mysqli->prepare("SELECT MAX(InvoiceNo) FROM service WHERE BookNo = ?")) {
			/* bind parameters to '?' */
			/* i = int , d = double and float, b = blob, s = all other types */
			$stmt	->	bind_param('s',$_SESSION['BookNo']); 
					
			/* execute the prepared statement */
			$stmt 	-> 	execute();
					
			/* Bind results to variables */
			$stmt-> bind_result($result2);
				
			/* fetch results */
			while ($stmt->fetch()) {
				if (empty($result)) 
					$InvoiceNo		=	"000000";
				else 
					$InvoiceNo		=	$result2;
			}

			$No = intval($InvoiceNo) + 1;						
			$InvoiceNo 	= 	str_pad($No, 6, "0", STR_PAD_LEFT);
			
			if ($InvoiceNo == '1000000'){
					$No = intval($BookNo) + 1;						
					$BookNo 	= 	str_pad($No, 4, "0", STR_PAD_LEFT);
					$InvoiceNo 	= 	"000000";
				}
		}
		else{
			/* rollback if it's not successfully */
			$mysqli->rollback();
		}
				
		$_SESSION['InvoiceNo'] 	= $InvoiceNo;
		$_SESSION['BookNo'] 	   = $BookNo;
	}

	/* ---------------------------------------------------------------------------------------------------------------*/
	/* set invoice date */
	if(isset($_POST['txtDate'])){		
		$_SESSION['Date'] 	= 	$_POST['txtDate'];	
	}
	else{
		$_SESSION['Date'] 	= 	date('Y/m/d');		/* set current date */
	}
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* set service type */
	if(isset($_POST['txtService'])){		
		$_SESSION['Service'] 	= 	$_POST['txtService'];	
	}
	else{
		$_SESSION['Service'] 	= 	"นวดตัว + ประคบสมุนไพร";		/* set current date */
	}
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* set Hour */
	if(isset($_POST['txtHour'])){		
		$_SESSION['Hour'] 	= 	$_POST['txtHour'];	
	}
	else{
		$_SESSION['Hour'] 	= 	"1";		/* set current date */
	}
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* set min */
	if(isset($_POST['txtMin'])){		
		$_SESSION['Min'] 	= 	$_POST['txtMin'];	
	}
	else{
		$_SESSION['Min'] 	= 	"15";		/* set current date */
	}
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* set Cost */
	if(isset($_POST['txtCost'])){		
		$_SESSION['Cost'] 	= 	$_POST['txtCost'];	
	}
	else{
		$_SESSION['Cost'] 	= 	"250";		/* set current date */
	}
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* set SerciceNo */
	if($_POST['txtService'] == "กดจุด"){		
		$_SESSION['ServiceNo'] 	= 	"1";	
	}
	else{
		$_SESSION['ServiceNo'] 	= 	"0";	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- include file CSS -->
<link rel="stylesheet" href="jquery-ui-1.9.1.custom/css/redmond/jquery-ui-1.9.1.custom.css" />
<link rel="stylesheet" href="css/style.css" />

<!-- include file jQuery -->
<script src="jquery-ui-1.9.1.custom/js/jquery-1.8.2.js"></script>
<script src="jquery-ui-1.9.1.custom/js/jquery-ui-1.9.1.custom.js"></script>

<!-- Javascript -->
<script type="text/javascript">  
	function GoHome(){
		window.open("HomePage.php");
		window.close();
		return false;
	}
	 
    function getListOfValue(dataArray,table,mode) {	
		if (table == "service") {
			document.getElementById('txtInvoiceNo').disabled = false;		
			document.getElementById('txtInvoiceNo').value = dataArray[0];
			setDirtyBit('CLEAR');
			
			setMode(mode);
			document.getElementById('loaded').value = true;
    	}   
		else if (table == "customer") {
			setDirtyBit('DIRTY');
       		document.getElementById('txtCusName').value = dataArray[1];
			document.getElementById('txtCustomerNo').value = dataArray[4];
			document.getElementById('txtAge').value = dataArray[3];
    	}
		/* get value from servicetype list */
     	else if (table == "servicetype") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtService').value = dataArray[0];
    	} 
		/* get value from doctor list */
     	else if (table == "doctor") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtDocName').value = dataArray[0];
			document.getElementById('txtDocNo').value = dataArray[2];
    	}
		else if (table == "costtype") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtCostType').value = dataArray[0];
    	} 
		
		formInvoice.submit();
    }

	function openListOfValue(mode, table, initSQL, columnname, headname){
		window.open("listofvalue.php?mode="+mode+"&table="+table+"&initSQL="+initSQL+"&columnname="+columnname+"&headname="+headname,"popup","width=600,height=350");
	}

	function checkDirty(button) {
	 	var DirtyBit = document.getElementById('DirtyBit').value;
     	var strConfirm;

		if (DirtyBit == "DIRTY") 
		{
			if (button == "NEW") {
            	strConfirm = "ยังไม่ได้ทำการจัดเก็บข้อมูล ยืนยันการสร้างใหม่";
            }
            else if (button == "CANCEL") {
               	strConfirm = "ยืนยันการยกเลิก";
          	}
       		else if (button == "PRINT") {
           		strConfirm = "ยังไม่ได้ทำการจัดเก็บข้อมูล ยืนยันการพิมพ์ใบเสร็จ";
         	}
			else if (button == "EDIT") {
               	strConfirm = "ยังไม่ได้ทำการจัดเก็บข้อมูล ยืนยันการแก้ไขข้อมูลผู้บำบัด?";
          	}
        	
   			if (confirm(strConfirm) == true)
        		return true;
       		else {
     			return false;
   			}
		}
   		else {
      		return true;
     	}
	}
  	
	function printInvoice() {
		
  		var txtInvoiceNo = document.getElementById("txtInvoiceNo").value;
		var txtBookNo = document.getElementById("txtBookNo").value;
		
		/* check current invoice no before print */
 		if (txtInvoiceNo == '' || txtInvoiceNo == ' ') {
       		alert("กรุณาเลือกเลขที่ใบเสร็จ");
		}
		else if (txtBookNo == '' || txtBookNo == ' '){
       		alert("กรุณาเลือกเลขที่ใบเสร็จ");
		}
   		else {
			/* check dirty bit before print */
			if(checkDirty('PRINT')){
				//alert("ใบเสร็จเลขที่" + txtInvoiceNo);
   				window.open("frmInvoice.php?InvoiceNo=" + txtInvoiceNo + "&BookNo=" + txtBookNo);
			}
		}
		return false;
  	}

	function setDirtyBit(DirtyBit){
		document.getElementById('DirtyBit').value = DirtyBit;
	}
	
	function setMode(mode){
		document.getElementById('mode').value = mode;		
	}
	function getMode() {
	 	var mode = document.getElementById('mode').value;
		return(mode);
	}	

	function checkRequiredField() {
		if(document.getElementById('txtCusName').value == '' || document.getElementById('txtCusName').value == ' '){
 				alert("กรุณาใส่ชื่อคนไข้");
				document.getElementById('txtCusName').focus();
				return false;
		}
		else if(document.getElementById('txtService').value == '' || document.getElementById('txtService').value == ' '){
 				alert("กรุณาใส่ประเภทบริการ");
				document.getElementById('txtService').focus();
				return false;
		}
		else if(document.getElementById('txtCostType').value == '' || document.getElementById('txtCostType').value == ' '){
 				alert("กรุณาเลือกประเภทใบเสร็จ");
				document.getElementById('txtCostType').focus();
				return false;
		}
		else if(document.getElementById('txtHour').value == '' || document.getElementById('txtHour').value == ' ' ||
				document.getElementById('txtHour').value%1 !== 0 || document.getElementById('txtHour').value < 0 ||
				document.getElementById('txtHour').value > 4){
 				alert("กรุณาใส่ชั่วโมงในช่วง 0-4 ชั่วโมง");
				document.getElementById('txtHour').focus();
				return false;
		}
		else if(document.getElementById('txtMin').value == '' || document.getElementById('txtMin').value == ' ' ||
				document.getElementById('txtMin').value%1 !== 0 || (document.getElementById('txtMin').value !== '0' &&
				document.getElementById('txtMin').value !== '00' && document.getElementById('txtMin').value !== '15' &&
				document.getElementById('txtMin').value !== '30' && document.getElementById('txtMin').value !== '45')){
 				alert("กรุณาใส่ 00, 15, 30, 45 นาที");
				document.getElementById('txtMin').focus();
				return false;
		}
		else if(document.getElementById('txtDocName').value == '' || document.getElementById('txtDocName').value == ' '){
 				alert("กรุณาใส่ชื่อผู้บำบัด");
				document.getElementById('txtDocName').focus();
				return false;
		}
		else if(document.getElementById('txtCost').value == '0.00'){
 				alert("กรุณาใส่เวลาในการให้บริการ");
				document.getElementById('txtHour').focus();
				return false;
		}
		else{
			return true;		
		}
	}
	
	function calExtendedPrice(){	
		var Hour	= 	parseFloat(document.getElementById('txtHour').value);
		var Min	 = 	parseFloat(document.getElementById('txtMin').value);

		if(Hour == 0 && Min == '0')		
			document.getElementById('txtCost').value	=	Number(0).toFixed(2);
		else if(Hour == 0 && Min == '15')		
			document.getElementById('txtCost').value	=	Number(50).toFixed(2);
		else if(Hour == 0 && Min == '30')		
			document.getElementById('txtCost').value	=	Number(100).toFixed(2);
		else if(Hour == 0 && Min == '45')		
			document.getElementById('txtCost').value	=	Number(150).toFixed(2);
		else if(Hour != '' && Min == '0')		
			document.getElementById('txtCost').value	=	Number(Hour*200).toFixed(2);
		else if(Hour != '' && Min == '15')
			document.getElementById('txtCost').value	=	Number((Hour*200)+50).toFixed(2);
		else if(Hour != '' && Min == '30')
			document.getElementById('txtCost').value	=	Number((Hour*200)+100).toFixed(2);
		else if(Hour != '' && Min == '45')
			document.getElementById('txtCost').value	=	Number((Hour*200)+150).toFixed(2);
	}
	
		
</script>

<!-- style sheet -->
<style type="text/css">
.disabled{
	background-color:#ebebe4;
	border: solid 1px #abadb3;
	color:#545454;
}
.table{
	border:1px solid black ;
}
.right{
	padding-right:5px;
}
.left{
	padding-left:5px;	
}

#lineItem{
	height:150px;
	width:850px;
	overflow:scroll;
	overflow-x:hidden
}
table th tr td{
	vertical-align:middle;
}
input[type="text"]{
	height:18px;               
}
.money{
text-align:right	
}
h1 {
	padding: 30px 0 0 45px;
	font-size: 2.5em;
	letter-spacing: 2px;
	color: #000;
}
body {
                background-image: url(image/sss.jpg);
                background-color: #FFFFFF;
                opacity:1;
            }
			#header {   
			 	height: 134px;
   			 	background: #034E85 url(images/header.jpg) no-repeat;
				border:none;	
			}
			#middle {
    background: #FBFBF5 url(images/middle.gif) repeat-y;
	border:solid;
}
</style>

<title>Service Form</title>
</head>

<body>
<form id="formInvoice" name="formInvoice" method="post" action="">
<div id="main">
	<div id="้header">
    <h1>&nbsp;</h1>
    <!-------------------------- Menu -->
	<table width="100%" border="none" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" class="border"><input name="btnNew" type="image" src="image/btnNew.png" 
             onclick="javascript: if (checkDirty('NEW')) { setMode('NEW'); setDirtyBit('CLEAR'); return true;} else { return false;}" />
        <div class="text_menu">
          <label>
            <?=$label['lbNew']?>
            </label>
        </div></td>
      <?php if($mode == 'EDIT'){ ?>
      <td align="center" class="border"><input name="btnEdit" type="image" src="image/btnDelete.png" 
             onclick="javascript: if(getMode() == 'EDIT'){
             							setDirtyBit('DIRTY');
             							if(checkDirty('CANCEL')){
                                            setMode('SAVE_EDIT'); 
                                            setDirtyBit('CLEAR');
                                        }
                                    } 
                                    else{ return false;}" />
        <div class="text_menu">
          <label>
            <?=$label['lbCancel']?>
          </label>
        </div></td>
<?php }else{ ?>   
      <td align="center" class="border"><input name="btnEdit" type="image" src="image/btnEdit.png" 
             onclick="javascript: if(checkDirty('EDIT')){ 
             openListOfValue('EDIT','service','Select InvoiceNo, CusName, Cost From service WHERE Date = CURRENT_DATE()','InvoiceNo, CusName, Cost','เลขที่ใบเสร็จ, ชื่อผู้ป่วย, ราคา');  	 			        	   return false; } 
             else {return false;}" />
        <div class="text_menu">
          <label>
            <?=$label['lbEdit']?>
          </label>
        </div></td>
      <td align="center" class="border"><input name="btnSave" type="image" src="image/1439380203_printer1.png" 
             onclick="javascript: if(checkRequiredField() == true){
             							if(getMode() == 'NEW'){
                                           	setMode('SAVE_NEW'); 
                                            setDirtyBit('CLEAR');
                                            printInvoice();
                                        } 
                                   }
                                   else{ return false;}" />
        <!--<input name="btnSave" type="image" src="image/btnPrint.png" 
             onclick="javascript: if(checkRequiredField() == true){
             							if(getMode() == 'NEW'){
                                           	setMode('SAVE_NEW'); 
                                            setDirtyBit('CLEAR');
                                        } 
                                   }
                                   else{ return false;}" />-->
        <div class="text_menu">
          <label>
         <?=$label['lbPrint']?>
            </label>  
        </div></td>
<?php }?>           
      <td width="100%" align="right"><h1>ประเภทบริการ</h1></td>
    </tr>
    </table>
	</div>

    <!-------------------------- Header -->
    <div id="middle" style="height:480px">
    <div id="middle2">
    <div id="middle3">
      <table border="0" cellpadding="0" cellspacing="0">
      <tr height="32">
        <!-- Invoice No: read only -->
        <td width="125"><label>
          <?=$label['lbInvoiceNo']?>
          </label>
          :</td>
        <td colspan="2"><input name="txtInvoiceNo" type="text" class="disabled" id="txtInvoiceNo"
             value="<?=$_SESSION['InvoiceNo']?>" size="8" readonly="readonly"; /></td>
        <!-- Invoice Date -->
        <!-- onchange: set dirty bit -->
        <td width="130"><label>
          <?=$label['lbInvoiceDate']?>
          </label>
          :</td>
        <td width="145"><input name="txtDate" type="text" class="disabled" id="txtDate"
             value="<?=$_SESSION['Date']?>" size="8" readonly="readonly"; /></td>
      </tr>
      <tr height="32">
        <td><?=$label['lbCusName']?>
          :</td>
        <td colspan="2" nowrap="nowrap"><input name="txtCusName" type="text" id="txtCusName" 
        					 onchange="javascript: setDirtyBit('DIRTY'); formInvoice.submit();" 
				           	 value="<?=$_SESSION['CusName']?>" size="15" />
          <input type="image" name="btnGetCustomer" src="image/btnSearch.png" width="20px" 
                 onclick = "javascript: openListOfValue('','customer','Select CusNo, CusName, CusSurname, (DATEDIFF(NOW(),CusBirth)/365) AS Age, CustomerNo From Customer WHERE (1=1)','CusNo,CusName,CusSurname,Age,CustomerNo','รหัสผู้ป่วยเก่า,ชื่อ,นามสกุล,อายุ,รหัสผู้ป่วยใหม่');
                 						return false;"/></td>
        <td><?=$label['lbCost']?>:</td>
        <td colspan="2" nowrap="nowrap"><input name="txtCostType" type="text" id="txtCostType" 
        					 onchange="javascript: setDirtyBit('DIRTY'); formInvoice.submit();" 
				           	 value="<?php echo $_SESSION['CostType'];?>" size="15" />
          <input type="image" name="btnGetCost" src="image/btnSearch.png" width="20px" 
                 onclick = "javascript: openListOfValue('','costtype','Select CostType From costtype WHERE (1=1)','CostType','ประเภทการจ่ายเงิน');
                 						return false;" id="btnGetCost"/></td>
        </tr>
      <tr height="32">
        <td><label>
          <?=$label['lbSerType']?>
        </label>
:</td>
        <td colspan="2" nowrap="nowrap"><input name="txtService" type="text" id="txtService" 
        					 onchange="javascript: setDirtyBit('DIRTY'); formInvoice.submit();" 
				           	 value="<?=$_SESSION['Service']?>" size="15" />
          <input type="image" name="btnGetService" src="image/btnSearch.png" width="20px" 
                 onclick = "javascript: openListOfValue('','servicetype','Select Service From servicetype WHERE (1=1)','Service','ประเภทบริการ');
                 						return false;" id="btnGetService"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr height="32">
        <td><label>
          <?=$label['lbTime']?>
        </label>
:</td>
        <td colspan="2" nowrap="nowrap"><select name="txtHour" id="txtHour" 
        					 onchange="javascript: calExtendedPrice(); setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Hour']?>" >
                  <option value = 1<?=$_SESSION['Hour'] == 1 ? ' selected="selected"' : '';?> >1</option>
                             <option value = 2<?=$_SESSION['Hour'] == 2 ? ' selected="selected"' : '';?> >2</option>
                  <option value = 3<?=$_SESSION['Hour'] == 3 ? ' selected="selected"' : '';?> >3</option>
                             <option value = 4<?=$_SESSION['Hour'] == 4 ? ' selected="selected"' : '';?> >4</option>
                             <option value = 0<?=$_SESSION['Hour'] == 0 ? ' selected="selected"' : '';?> >0</option>
           
							 </select>
           ชั่วโมง
          <select name="txtMin" id="txtMin" 
        					 onchange="javascript: calExtendedPrice(); setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Min']?>" > 
                  <option value = 15<?=$_SESSION['Min'] == 15 ? ' selected="selected"' : '';?> >15</option>
                             <option value = 30<?=$_SESSION['Min'] == 30 ? ' selected="selected"' : '';?> >30</option>
                  <option value = 45<?=$_SESSION['Min'] == 45 ? ' selected="selected"' : '';?> >45</option>
                             <option value = 0<?=$_SESSION['Min'] == 0 ? ' selected="selected"' : '';?> >00</option>
           
							 </select>          นาที</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr height="32">
        <td><label>
          <?=$label['lbDocName']?>
        </label>
:</td>
        <td colspan="2" nowrap="nowrap"><input name="txtDocName" type="text" id="txtDocName" 
        					 onchange="javascript: setDirtyBit('DIRTY'); formInvoice.submit();" 
				           	 value="<?=$_SESSION['DocName']?>" size="15" />
          <input type="image" name="btnGetDocName" src="image/btnSearch.png" width="20px" 
                 onclick = "javascript: openListOfValue('','doctor','Select DocName, DocSurName, DocNo From doctor WHERE (1=1)','DocName,DocSurName,DocNo','ชื่อ,นามสกุล,รหัสผู้บำบัด'); return false;" id="btnGetDocName"/><td><label>
          <?=$label['lbAmountDue']?>
          </label>
          :</td>
        <td><input name="txtCost" type="text" id="txtCost" class="disabled money" readonly="readonly" size="17	"
                 value="<?php if($_SESSION['Cost'] != '') {print number_format($_SESSION['Cost'],2);}
				 			  else{print number_format(0.0,2);} ?>"  
                 onchange="javascript: calExtendedPrice(); setDirtyBit('DIRTY');" /></td>
      </tr>
      <tr height="32">
        <!-- Customer Code -->
        <!-- onchange: set dirty bit -->
        <td>&nbsp;</td>
        <td width="150" nowrap="nowrap">&nbsp;</td>
        <td width="100">&nbsp;</td>
        <!-- Customer Name -->
        <!-- onchange: set dirty bit -->
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

      </table>
      <table width="928" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="282" height="64">&nbsp;</td>
          <td width="522">&nbsp;</td>
          <td width="124"><p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><br />
              <br />
            </p>
            <p>
             <a href="HomePage.php"><img src="image/Home.png"></a>
          </p>
            <p>&nbsp;</p></td>
        </tr>
      </table>
      <p>
    </div>      
    </div>
	</div><a href="logout.php">Logout</a>

    <!-------------------------- Hidden Field -->
	<input name="DirtyBit" id="DirtyBit" type="hidden" value="<?=$DirtyBit?>" />
    <input name="mode" id="mode" type="hidden" value="<?=$mode?>" />
    <input name="loaded" id="loaded" type="hidden" value="<?=$loaded?>" />
    
    <input name="txtBookNo" id="txtBookNo" type="hidden" value="<?=$_SESSION['BookNo']?>" />
    <input name="txtCustomerNo" id="txtCustomerNo" type="hidden" value="<?=$_SESSION['CustomerNo']?>" />
    <input name="txtDocNo" id="txtDocNo" type="hidden" value="<?=$_SESSION['DocNo']?>" />
    <input name="txtAge" id="txtAge" type="hidden" value="<?=floor($_SESSION['Age'])?>" />
    <input name="txtServiceNo" id="txtServiceNo" type="hidden" value="<?=$_SESSION['ServiceNo']?>" />
</div>   
</form>
</body>
</html>
