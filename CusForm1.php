<?php
	session_start();			/* for use session */
if(!isset($_SESSION['UserID']))
	{
		echo "Please Login!";
		echo "<br /><a href='index.php'>go to Login page </a>";
		exit();
	}


	$_SESSION['CusNo']		 =	$_POST['txtCusNo'];
	$_SESSION['NewDate']	   =	$_POST['txtNewDate'];
	$_SESSION['Point']	     =	$_POST['txtPoint'];
    $_SESSION['CusName']	   =	$_POST['txtCusName'];
    $_SESSION['CusSurname']	=	$_POST['txtCusSurname'];
	$_SESSION['Sex']		   =	$_POST['txtSex'];
	$_SESSION['SexNo']		 =	$_POST['txtSexNo'];
    $_SESSION['CusAddress']	=	$_POST['txtCusAddress'];
	$_SESSION['CusPhone'] 	  =	$_POST['txtCusPhone'];
	$_SESSION['CusBirth']	  =	$_POST['txtCusBirth'];
	$_SESSION['Symp']		  =	$_POST['txtSymp'];
    $_SESSION['CusDisease']	=	$_POST['txtCusDisease'];
    $_SESSION['History']	   =	$_POST['txtHistory'];
    $_SESSION['Weight']	    =	$_POST['txtWeight'];
	$_SESSION['Height']		=	$_POST['txtHeight'];
	$_SESSION['Pressure']	  =	$_POST['txtPressure'];
	$_SESSION['Problem']	   =	$_POST['txtProblem'];
    $_SESSION['ConThai']	   =	$_POST['txtConThai'];
	$_SESSION['ConNow']		=	$_POST['txtConNow'];
	$_SESSION['Help']		  =	$_POST['txtHelp'];
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
			$loaded	  =	false;					/* load = false : customer detail is not displayed */
			
			unset($_SESSION['CusNo']);				/* clear session */
			unset($_SESSION['NewDate']);			
			unset($_SESSION['Point']);		
			unset($_SESSION['CusName']);	
			unset($_SESSION['CusSurname']);
			unset($_SESSION['Sex']);
			unset($_SESSION['SexNo']);
			unset($_SESSION['CusAddress']);
			unset($_SESSION['CusPhone']);	
			unset($_SESSION['CusBirth']);	
			unset($_SESSION['Symp']);
			unset($_SESSION['CusDisease']);
			unset($_SESSION['History']);	
			unset($_SESSION['Weight']);
			unset($_SESSION['Height']);	
			unset($_SESSION['Pressure']);
			unset($_SESSION['Problem']);
			unset($_SESSION['ConThai']);	
			unset($_SESSION['ConNow']);
			unset($_SESSION['Help']);
			unset($_POST);							/* clear session */
			unset($textbox);						/* clear post */
		}	
	}
	/* 2. when click SAVE in NEW mode */
	else if($mode == "SAVE_NEW"){
		/* connect database */
		/* $mysqli = new mysqli($host, $username, $password, $database); */
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		$mysqli -> set_charset('utf8');			/* set character */
		$mysqli -> autocommit(false);			/* start transaction */
		
		/* set new No. */
		if ($stmt = $mysqli->prepare("SELECT MAX(CustomerNo) FROM customer")) {
			/* execute the prepared statement */
			$stmt -> 	execute();
			
			/* bind results to variables */
			$stmt-> bind_result($result);

			/* fetch results */
			while ($stmt->fetch()) {
				if (empty($result)) 
					$CustomerNo		=	"C000000";
				else 
					$CustomerNo		=	$result;
			}
			$No = intval(substr($CustomerNo,1,6)) + 1;						/* get number after C */
			$CustomerNo 	= 	"C".str_pad($No, 6, "0", STR_PAD_LEFT);		/* concat C and Number */
			
			/* insert customer into database */
			if ($stmt = $mysqli -> prepare("INSERT INTO customer(CustomerNo,NewDate,CusNo,Point,CusName,CusSurname,Sex,SexNo,CusPhone,
																 CusAddress,CusBirth,Symp,CusDisease,History,Weight,Height,
																 Pressure,Problem,ConThai,ConNow,Help) 
											VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);")) {
				/* bind parameters to '?' */
				/* i = int , d = double and float, b = blob, s = all other types */	
				$stmt	->	bind_param('sssssssissssssiisssss', $CustomerNo, 
																$_POST['txtNewDate'],
																$_POST['txtCusNo'],
																$_POST['txtPoint'], 
																$_POST['txtCusName'],
																$_POST['txtCusSurname'],
																$_POST['txtSex'],
																$_POST['txtSexNo'],
																$_POST['txtCusPhone'],
																$_POST['txtCusAddress'],
																$_POST['txtCusBirth'],	
																$_POST['txtSymp'],
																$_POST['txtCusDisease'],
																$_POST['txtHistory'],	
																$_POST['txtWeight'],
																$_POST['txtHeight'],	
																$_POST['txtPressure'],
																$_POST['txtProblem'],
																$_POST['txtConThai'],	
																$_POST['txtConNow'],
																$_POST['txtHelp']);
													
				/* execute the prepared statement */
				$stmt -> execute();												
						
				/* insert successfully */
				$mysqli -> commit();	
				$stmt -> close();										
				
				/* set NEW mode and clear variable */
				$mode = "NEW";
				unset($_SESSION['CusNo']);
				unset($_SESSION['NewDate']);
				unset($_SESSION['Point']);
				unset($_SESSION['CusName']);	
				unset($_SESSION['CusSurname']);
				unset($_SESSION['Sex']);
				unset($_SESSION['SexNo']);
				unset($_SESSION['CusAddress']);
				unset($_SESSION['CusPhone']);
				unset($_SESSION['CusBirth']);	
				unset($_SESSION['Symp']);
				unset($_SESSION['CusDisease']);
				unset($_SESSION['History']);	
				unset($_SESSION['Weight']);
				unset($_SESSION['Height']);	
				unset($_SESSION['Pressure']);
				unset($_SESSION['Problem']);
				unset($_SESSION['ConThai']);	
				unset($_SESSION['ConNow']);
				unset($_SESSION['Help']);
				unset($_POST);
				unset($textbox); 
				$loaded = false; 
			}
			else{
				/* rollback if it's not successfully */
				$mysqli->rollback();
			}
			
			$mysqli -> close();	
		}
		else{
			/* rollback if it's not successfully */
			$mysqli->rollback();
		}
	}
	/* 3. when click SAVE in EDIT mode */
	else if($mode == "SAVE_EDIT"){
		/* connect database */
		/* $mysqli = new mysqli($host, $username, $password, $database); */
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		$mysqli -> set_charset('utf8');			/* set character */
		$mysqli -> autocommit(false);			/* start transaction */
		
		/* update customer in database */
		if ($stmt = $mysqli -> prepare("UPDATE customer SET CusNo = ?, NewDate = ?, Point = ?, CusName = ?, CusSurname = ?, Sex = ?,
															SexNo = ?, CusAddress = ?, CusPhone = ? , CusBirth = ?, Symp = ?, CusDisease = ?, 
															History = ?, Weight = ?, Height = ?, Pressure = ?, Problem = ?, 
															ConThai = ?, ConNow = ?, Help = ?
					  				    WHERE  CustomerNo=?")) {

			/* bind parameters to '?' */
			/* i = int , d = double and float, b = blob, s = all other types */
			$stmt -> bind_param('ssssssissssssiissssss',$_POST['txtCusNo'], 
												  $_POST['txtNewDate'],
												  $_POST['txtPoint'],
												  $_POST['txtCusName'],
												  $_POST['txtCusSurname'],
												  $_POST['txtSex'],
												  $_POST['txtSexNo'],
												  $_POST['txtCusAddress'],
												  $_POST['txtCusPhone'],
												  $_POST['txtCusBirth'],	
												  $_POST['txtSymp'],
												  $_POST['txtCusDisease'],
												  $_POST['txtHistory'],	
												  $_POST['txtWeight'],
												  $_POST['txtHeight'],	
												  $_POST['txtPressure'],
												  $_POST['txtProblem'],
												  $_POST['txtConThai'],	
												  $_POST['txtConNow'],
												  $_POST['txtHelp'],
												  $CustomerNo); 
										  
			/* execute the prepared statement */
			$stmt -> execute();		
			
			/* set NEW mode and clear variable */
			$mode = "NEW";
			unset($_SESSION['CusNo']);
			unset($_SESSION['NewDate']);
			unset($_SESSION['Point']);
			unset($_SESSION['CusName']);	
			unset($_SESSION['CusSurname']);
			unset($_SESSION['Sex']);
			unset($_SESSION['SexNo']);
			unset($_SESSION['CusAddress']);
			unset($_SESSION['CusPhone']);
			unset($_SESSION['CusBirth']);	
			unset($_SESSION['Symp']);
			unset($_SESSION['CusDisease']);
			unset($_SESSION['History']);	
			unset($_SESSION['Weight']);
			unset($_SESSION['Height']);	
			unset($_SESSION['Pressure']);
			unset($_SESSION['Problem']);
			unset($_SESSION['ConThai']);	
			unset($_SESSION['ConNow']);
			unset($_SESSION['Help']);
			unset($_POST);
			unset($textbox);
			$loaded = false;
		}
		else{
			/* rollback if it's not successfully */
			$mysqli->rollback();	
		}
		$mysqli -> close();	
	}
	
	/* query customer detail */
	if($loaded == true){
		$loaded = false;				/* clear load customer */
		$loaded_customer = true;		/* load customer */

		/* SAVE in NEW mode */
		if($mode == "SAVE_NEW"){
			$_SESSION['CustomerNo'] 	=	$CustomerNo;
			$mode = "EDIT";
		}
		else{
			$_SESSION['CustomerNo'] 	=	$_POST['txtCustomerNo'];
		}	
		
		/* connect database */
		/* $mysqli = new mysqli($host, $username, $password, $database); */
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		$mysqli -> set_charset('utf8');			/* set character */
		
		/* select customer header */
		if ($stmt = $mysqli->prepare(" SELECT CusNo, NewDate, Point, CusName, CusSurname, Sex, SexNo, CusAddress, CusPhone, CusBirth,
											  Symp, CusDisease, History, Weight, Height, Pressure, Problem, ConThai, ConNow, Help, CustomerNo
									   FROM	  customer 
									   WHERE  CustomerNo =  ?")) {
			/* bind parameters to '?' */
			/* i = int , d = double and float, b = blob, s = all other types */
			$stmt	->	bind_param('s',$_SESSION['CustomerNo']); 
			
			/* execute the prepared statement */
			$stmt 	-> 	execute();

			/* bind results to variables */
			$stmt-> bind_result($result1, $result2, $result3, $result4, $result5, $result6, $result7, $result8, $result9, $result10,
								$result11,$result12, $result13, $result14, $result15, $result16, $result17, $result18, $result19,
								$result20, $result21);
			
			/* fetch values */
			while ($stmt->fetch()) {
				$_SESSION['CusNo']	  	 =	$result1;
				$_SESSION['NewDate']	   = 	$result2;
				$_SESSION['Point']		 =	$result3;
				$_SESSION['CusName']	   =	$result4;
				$_SESSION['CusSurname']	=	$result5;
				$_SESSION['Sex']	   	   = 	$result6;
				$_SESSION['SexNo']	   	 = 	$result7;
				$_SESSION['CusAddress']	=	$result8;
				$_SESSION['CusPhone']	  =	$result9;
				$_SESSION['CusBirth']      = 	$result10;
				$_SESSION['Symp']		  = 	$result11;
				$_SESSION['CusDisease']    = 	$result12;
				$_SESSION['History']	   = 	$result13;
				$_SESSION['Weight']	    = 	$result14;
				$_SESSION['Height']		= 	$result15;
				$_SESSION['Pressure'] 	  = 	$result16;
				$_SESSION['Problem']	   =	$result17;
				$_SESSION['ConThai']	   = 	$result18;
				$_SESSION['ConNow']	    =	$result19;
				$_SESSION['Help']		  = 	$result20;
				$_SESSION['CustomerNo']	= 	$result21;
			}
		}
	}	
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* set New Customer date */
	if(isset($_POST['txtNewDate'])){		
		$_SESSION['NewDate'] 	= 	$_POST['txtNewDate'];	
	}
	else{
		$_SESSION['NewDate'] 	= 	date('Y/m/d');		/* set current date */
	}
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* set SexNo */
	if($_POST['txtSex'] == "หญิง"){		
		$_SESSION['SexNo'] 	= 	'1';	
	}
	else{
		$_SESSION['SexNo'] 	= 	'0';
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<!-- include file CSS -->
<link rel="stylesheet" href="jquery-ui-1.9.1.custom/css/redmond/jquery-ui-1.9.1.custom.css" />
<link rel="stylesheet" href="css/style.css" />

<!-- include file jQuery -->
<script src="jquery-ui-1.9.1.custom/js/jquery-1.8.2.js"></script>
<script src="jquery-ui-1.9.1.custom/js/jquery-ui-1.9.1.custom.js"></script>

<!-- Javascript -->
<script type="text/javascript">  
	/* use jQuery for show calendar */
	 $(function () {
            $('#txtCusBirth').datepicker({ dateFormat: 'yy/mm/dd' });
     });
	
	
    function getListOfValue(dataArray,table,mode) {	
		if (table == "customer") {
         	document.getElementById('txtCustomerNo').disabled = false;
     		document.getElementById('txtCustomerNo').value = dataArray[3];
			setDirtyBit('CLEAR');
			
			setMode(mode);
			document.getElementById('loaded').value = true;
     	}
		
		formcustomer.submit();
    }

	function openListOfValue(mode, table, initSQL, columnname, headname){
		window.open("listofvalue.php?mode="+mode+"&table="+table+"&initSQL="+initSQL+"&columnname="+columnname+"&headname="+headname,"popup","width=600,height=350");
	}

	function checkDirty(button) {
	 	var DirtyBit = document.getElementById('DirtyBit').value;
     	var strConfirm;

		if (DirtyBit == "DIRTY") {
			if (button == "NEW") {
            	strConfirm = "ยังไม่ได้ทำการจัดเก็บข้อมูล ยืนยันการเพิ่มคนไข้ใหม่?";
            }
            else if (button == "EDIT") {
               	strConfirm = "ยังไม่ได้ทำการจัดเก็บข้อมูล ยืนยันการแก้ไขข้อมูลคนไข้ใหม่?";
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
  	
	function setDirtyBit(DirtyBit){
		document.getElementById('DirtyBit').value = DirtyBit;
	}
	
	function setMode(mode){
		document.getElementById('mode').value = mode;		
	}
	
	function checkRequiredField() {
		/* check required field before save */
		if(document.getElementById('txtPoint').value == '' || document.getElementById('txtPoint').value == ' '){
 				alert("กรุณาใส่คำนำหน้า");
				document.getElementById('txtPoint').focus();
				return false;
		}
		else if(document.getElementById('txtCusName').value == '' || document.getElementById('txtCusName').value == ' '){
 				alert("กรุณาใส่ชื่อคนไข้");
				document.getElementById('txtCusName').focus();
				return false;
		}
		else if(document.getElementById('txtCusSurname').value == '' || document.getElementById('txtCusSurname').value == ' '){
 				alert("กรุณาใส่นามสกุลคนไข้");
				document.getElementById('txtCusSurname').focus();
				return false;
		}
		else if(document.getElementById('txtSex').value == '' || document.getElementById('txtSex').value == ' ' || 
			   (document.getElementById('txtSex').value !== 'หญิง' && document.getElementById('txtSex').value !== 'ชาย')){
 				alert("ใส่เพศคนไข้ในรูปแบบ 'หญิง' 'ชาย'");
				document.getElementById('txtSex').focus();
				return false;
		}
		else if(document.getElementById('txtCusAddress').value == '' || document.getElementById('txtCusAddress').value == ' '){
 				alert("กรุณาใส่ที่อยู่คนไข้");
				document.getElementById('txtCusAddress').focus();
				return false;
		}
		else if(document.getElementById('txtCusPhone').value == '' || document.getElementById('txtCusPhone').value == ' ' || document.getElementById('txtCusPhone').value%1 !== 0){
 				alert("กรุณาใส่เบอร์โทรคนไข้");
				document.getElementById('txtCusPhone').focus();
				return false;
		}
		else if(document.getElementById('txtSymp').value == '' || document.getElementById('txtSymp').value == ' '){
 				alert("กรุณาใส่อาการ");
				document.getElementById('txtSymp').focus();
				return false;
		}
		else if(document.getElementById('txtConNow').value == '' || document.getElementById('txtConNow').value == ' '){
 				alert("กรุณาใส่การวินิจฉัยโรคแผนปัจจุบัน");
				document.getElementById('txtConNow').focus();
				return false;
		}
		else{
			return true;		
		}
	}
	
	function getMode() {
	 	var mode = document.getElementById('mode').value;
		return(mode);
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

<title>Customer Form</title>
</head>

<body>
<form id="formcustomer" name="formcustomer" method="post" action="">
<div id="main">
	<div id="้header">
    <h1>&nbsp;</h1>
    <!-------------------------- Menu -->
	<table width="100%" border="none" cellpadding="0" cellspacing="0">
    <tr>
        <!-------------------------- NEW -->
	    <!-- onclick: set mode = NEW, set dirty bit -->
		<td align="center" class="border"><input name="btnNew" type="image" src="image/btnNew.png" 
             onclick="javascript: if (checkDirty('NEW')) { setMode('NEW'); setDirtyBit('CLEAR'); return true;} else { return false;}" />
		  <div class="text_menu"><label><?=$label['lbNew']?></label></div>
        </td>
        <!-------------------------- EDIT -->
        <!-- onclick: open customer list -->
        <td align="center" class="border">
        	<input name="btnEdit" type="image" src="image/btnEdit.png" 
             onclick="javascript: if(checkDirty('EDIT')){ 
             openListOfValue('EDIT','customer','Select CusNo, CusName, CusSurname, CustomerNo From customer WHERE (1=1)','CusNo, CusName, CusSurname, CustomerNo','รหัสผู้ป่วยเก่า,ชื่อ,นามสกุล,รหัสผู้ป่วยใหม่'); return false; } 
             else {return false;}" />
	        <div class="text_menu"><label><?=$label['lbEdit']?></label></div>
        </td>
        <!-------------------------- SAVE -->
        <!-- onclick: check current mode and set new mode -->
        <td align="center" class="border">
        	<input name="btnSave" type="image" src="image/btnSave.png" 
             onclick="javascript: if(checkRequiredField() == true){
             							if(getMode() == 'EDIT'){
                                        	setMode('SAVE_EDIT');
                                        }else{
                                        	setMode('SAVE_NEW');
                                        } 
                                    	setDirtyBit('CLEAR');
                                   }
                                   else{ return false;}" />
	        <div class="text_menu"><label><?=$label['lbSave']?></label></div>
        </td>
        <td width="100%" align="right"><h1>ประวัติ ผู้ป่วย</h1></td>
    </tr>
    </table>
	</div>

    <!-------------------------- Header -->
    <div id="middle" style="height:700px">
    <div id="middle2">
    <div id="middle3">
 	<table border="0" cellpadding="0" cellspacing="0">
	<tr height="32">
	  <!-- customer No: read only -->
	  <td width="259"><label><?=$label['lbCusNo']?></label> :</td>
 	  <td width="504"><input name="txtCusNo" type="text"  id="txtCusNo"
      				   onchange="javascript: setDirtyBit('DIRTY');"
                       value="<?=$_SESSION['CusNo']?>" size="10"/></td>
    </tr>
	<tr height="32">
	  <!-- customer Name -->
	  <!-- onchange: set dirty bit -->
	  <td width="259"><label><?=$label['lbName']?></label> :</td>
	  <td nowrap="nowrap"><input name="txtPoint" type="text" id="txtPoint"
        				   onchange="javascript: setDirtyBit('DIRTY');"
				           value="<?=$_SESSION['Point']?>" size="8" />
        <input name="txtCusName" type="text" id="txtCusName" 
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['CusName']?>" size="15" />
                           - 
        <input name="txtCusSurname" type="text" id="txtCusSurname" 
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['CusSurname']?>" size="15" /></td>
    </tr>
    <tr height="32">
      <td nowrap="nowrap"><?=$label['lbSex']?>
      :</td>
	  <td width="504"><input name="txtSex" type="text" id="txtSex" 
        				   onchange="javascript: setDirtyBit('DIRTY'); formcustomer.submit();" 
				           value="<?=$_SESSION['Sex']?>" size="15" /></td>
	</tr>
    <tr height="32">
	  <!-- CusAddress -->
	  <!-- onchange: set dirty bit -->
	  <td width="259"><label><?=$label['lbAddress']?></label> :</td>
	  <td nowrap="nowrap"><input name="txtCusAddress" type="text" id="txtCusAddress"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['CusAddress']?>" size="30" /></td>
	</tr>  
    <tr height="32">
      <td><?=$label['lbCusPhone']?>
        :</td>
      <td nowrap="nowrap"><input name="txtCusPhone" type="text" id="txtCusPhone"
        				   onchange="javascript: setDirtyBit('DIRTY');"
				           value="<?=$_SESSION['CusPhone']?>" size="8" /></td>
    </tr>
    <tr height="32">
      <td><?=$label['lbCusBirth']?>
      :</td>
      <td nowrap="nowrap"><input name="txtCusBirth" type="text" id="txtCusBirth" 
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['CusBirth']?>" size="8" /></td>
    </tr>
    <tr height="32">
      <td><?=$label['lbSymp']?>
      :</td>
      <td nowrap="nowrap"><input name="txtSymp" type="text" id="txtSymp"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['Symp']?>" size="50" /></td>
    </tr>
    <tr height="32">
      <td><?=$label['lbCusDisease']?>
      :</td>
      <td nowrap="nowrap"><input name="txtCusDisease" type="text" id="txtCusDisease"
        				   onchange="javascript: setDirtyBit('DIRTY');"  
				           value="<?=$_SESSION['CusDisease']?>" size="50" /></td>
    </tr>
    <tr height="32">
      <td> <?=$label['lbHistory']?>
      :</td>
      <td nowrap="nowrap"><input name="txtHistory" type="text" id="txtHistory" 
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['History']?>" size="50" /></td>
    </tr>
    <tr height="32">
      <td><?=$label['lbWeight']?>
      :</td>
      <td nowrap="nowrap"><input name="txtWeight" type="text" id="txtWeight" 
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['Weight']?>" size="8" />
        <?=$label['lbKg']?></td>
    </tr>
    <tr height="32">
      <td><?=$label['lbHeight']?>
      :</td>
      <td nowrap="nowrap"><input name="txtHeight" type="text" id="txtHeight"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['Height']?>" size="8" />
        <?=$label['lbCm']?></td>
    </tr>
    <tr height="32">
      <td><?=$label['lbPressure']?>
      :</td>
      <td nowrap="nowrap"><input name="txtPressure" type="text" id="txtPressure"
        				   onchange="javascript: setDirtyBit('DIRTY');"  
				           value="<?=$_SESSION['Pressure']?>" size="8" />
        <?=$label['lbMm']?></td>
    </tr>
    <tr height="32">
      <td><?=$label['lbProblem']?>
      :</td>
      <td nowrap="nowrap"><input name="txtProblem" type="text" id="txtProblem"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['Problem']?>" size="50" /></td>
    </tr>
    <tr height="32">
      <td><?=$label['lbConThai']?>
      :</td>
      <td nowrap="nowrap"><input name="txtConThai" type="text" id="txtConThai"
        				   onchange="javascript: setDirtyBit('DIRTY');"  
				           value="<?=$_SESSION['ConThai']?>" size="50" /></td>
    </tr>
    <tr height="32">
      <td><?=$label['lbConNow']?>
      :</td>
      <td nowrap="nowrap"><input name="txtConNow" type="text" id="txtConNow"
        				   onchange="javascript: setDirtyBit('DIRTY');"  
				           value="<?=$_SESSION['ConNow']?>" size="50" /></td>
    </tr>
    <tr height="32">
	  <!-- CusPhone No -->
	  <!-- onchange: set dirty bit -->
	  <td width="259"><?=$label['lbHelp']?>
      :</td>
	  <td nowrap="nowrap"><input name="txtHelp" type="text" id="txtHelp"
        				   onchange="javascript: setDirtyBit('DIRTY');"  
				           value="<?=$_SESSION['Help']?>" size="50" /></td>
	</tr>      	
    </table>
    <table width="928" border="0" cellpadding="0" cellspacing="0">
 	  <tr>
	    <td width="282">&nbsp;</td>
	    <td width="522">&nbsp;</td>
	    <td width="124"><p><br>
	      <br>
	    </p>
	      <p>
	        <a href="HomePage1.php"><img src="image/Home.png"></a>
	        </p></td>
      </tr>
    </table>
    </div>      
    </div>
	</div><a href="logout.php">Logout</a>

    <!-------------------------- Hidden Field -->
	<input name="DirtyBit" id="DirtyBit" type="hidden" value="<?=$DirtyBit?>" />
    <input name="mode" id="mode" type="hidden" value="<?=$mode?>" />
    <input name="loaded" id="loaded" type="hidden" value="<?=$loaded?>" /> 
    
    <input name="txtCustomerNo" id="txtCustomerNo" type="hidden" value="<?=$_SESSION['CustomerNo']?>" />
    <input name="txtNewDate" id="txtNewDate" type="hidden" value="<?=$_SESSION['NewDate']?>" />
    <input name="txtSexNo" id="txtSexNo" type="hidden" value="<?=$_SESSION['SexNo']?>" />
</div>   
</form>
</body>
</html>
