<?php
session_start();			/* for use session */
if(!isset($_SESSION['UserID']))
	{
		echo "Please Login!";
		echo "<br /><a href='index.php'>go to Login page </a>";
		exit();
	}	/* set date */
	$_SESSION['Day'] 	  = 	date('Y/m/d');
	$_SESSION['Day2'] 	 = 	date('Y/m/d');
	$_SESSION['Month'] 	= 	date('Y/m');
	$_SESSION['Month1']   = 	date('Y/m');
	$_SESSION['Year2'] 	= 	date('Y');
	$_SESSION['CustomerNo']	= $_POST['txtCustomerNo'];
	$_SESSION['CusName']       = $_POST['txtCusName'];
	$_SESSION['CusSurName']       = $_POST['txtCusSurName'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- include file CSS -->
<link rel="stylesheet" href="jquery-ui-1.9.1.custom/css/redmond/jquery-ui-1.9.1.custom.css" />
<link rel="stylesheet" href="css/style.css" />

<!-- include file jQuery -->
<script src="jquery-ui-1.9.1.custom/js/jquery-1.8.2.js"></script>
<script src="jquery-ui-1.9.1.custom/js/jquery-ui-1.9.1.custom.js"></script>

<script type="text/javascript"> 

	function GoHome(){
		window.open("HomePage1.php");
		window.close();
		return false;
	}
	
	/* use jQuery for show calendar */
	 $(function () {
            $('#txtDay').datepicker({ dateFormat: 'yy/mm/dd' });
			$('#txtDay1').datepicker({ dateFormat: 'yy/mm/dd' });
			$('#txtDay2').datepicker({ dateFormat: 'yy/mm/dd' });
			$('#txtMonth').datepicker({ dateFormat: 'yy/mm' });
			$('#txtMonth1').datepicker({ dateFormat: 'yy/mm' });
     });
	 
	 function openListOfValue(mode, table, initSQL, columnname, headname){
		window.open("listofvalue.php?mode="+mode+"&table="+table+"&initSQL="+initSQL+"&columnname="+columnname+"&headname="+headname,"popup","width=600,height=350");
	}
	
	 function getListOfValue(dataArray,table,mode) {	
		if (table == "customer") {
			document.getElementById('txtCusName').value = dataArray[1];
			document.getElementById('txtCusSurName').value = dataArray[2];
			document.getElementById('txtCustomerNo').value = dataArray[3];
    	}
		formInvoice.submit();
    }
	
	function printReport1() {
  		var txtDay = document.getElementById("txtDay").value;
		/* check current invoice no before print */
 		if (txtDay == '' || txtDay == ' '){
       		alert("กรุณาใส่วันที่");
		}
   		else {
   			window.open("frmReport1.php?Day=" + txtDay);
		}
		return false;
  	}

  	function printReport2() {
  		var txtMonth = document.getElementById("txtMonth").value;
		/* check current invoice no before print */
 		if (txtMonth == '' || txtMonth == ' '){
       		alert("กรุณาใส่เดือน");
		}
   		else {
   			window.open("frmReport2.php?Month=" + txtMonth);
		}
		return false;
  	}

  	function printReport3(){
		var txtMonth1 = document.getElementById("txtMonth1").value;
		/* check current invoice no before print */
 		if (txtMonth1 == '' || txtMonth1 == ' '){
       		alert("กรุณาใส่เดือน");
		}
   		else {
   			window.open("frmReport3.php?Month=" + txtMonth1);
		}
		return false;
  	}
	
	function printReport4(){
		var txtDay1 = document.getElementById("txtDay1").value;
		var txtDay2 = document.getElementById("txtDay2").value;
		/* check current invoice no before print */
 		if (txtDay1 == '' || txtDay1 == ' '){
       		alert("กรุณาใส่วันที่เริ่มต้น");
		}
		else if (txtDay2 == '' || txtDay2 == ' '){
       		alert("กรุณาใส่วันที่สิ้นสุด");
		}
		else if (txtDay2 < txtDay1){
       		alert("กรุณาใส่วันที่สิ้นสุดมากกว่าวันเริ่มต้น");
		}
   		else {
   			window.open("frmReport4.php?Day1=" + txtDay1 +"&Day2=" + txtDay2);
		}
		return false;
  	}
	
	function printReport5() {
		var txtYear1 = document.getElementById("txtYear1").value;
		var txtYear2 = document.getElementById("txtYear2").value;
		
		if (txtYear1 == '' || isNaN(txtYear1) || txtYear1 <= 0) {
       		alert("กรุณาใส่ปีเริ่มต้น");
			return false;
		}
		else if (txtYear2 == '' || isNaN(txtYear2) || txtYear2 <= 0) {
       		alert("กรุณาใส่ปีสิ้นสุด");
			return false;
		}
		else if (txtYear2 <= txtYear1){
       		alert("กรุณาใส่ปีสิ้นสุดมากกว่าปีเริ่มต้น");
		}
		else{
   			window.open("frmReport5.php?Year1=" + txtYear1 +"&Year2=" + txtYear2);
		}
		return false;
  	}
	
	function printReport6() {
		var txtCustomerNo = document.getElementById("txtCustomerNo").value;
	   
		if ((txtCustomerNo == "") || (txtCustomerNo == " ") || (txtCustomerNo == "C000000")) {
       		alert("กรุณาใส่ชื่อคนไข้ ");
			//alert(txtCustomerNo);
			return false;
		}
		else{
   			window.open("frmReport6.php?CustomerNo=" + txtCustomerNo);
		}
		return false;
  	}

    function selectReport1()
    {
        if (document.getElementById('dropdownReportList').value == "showReport1")
        	{
            document.getElementById('report1').style.display = 'block';
            document.getElementById('report2').style.display = 'none';
            document.getElementById('report3').style.display = 'none';
			document.getElementById('report4').style.display = 'none';
            document.getElementById('report5').style.display = 'none';
			document.getElementById('report6').style.display = 'none';
        	}
        else if (document.getElementById('dropdownReportList').value == "showReport2")
        	{
        	document.getElementById('report1').style.display = 'none';
            document.getElementById('report2').style.display = 'block';
            document.getElementById('report3').style.display = 'none';
			document.getElementById('report4').style.display = 'none';
            document.getElementById('report5').style.display = 'none';
			document.getElementById('report6').style.display = 'none';
        	}
		else if (document.getElementById('dropdownReportList').value == "showReport3")
        	{
            document.getElementById('report1').style.display = 'none';
            document.getElementById('report2').style.display = 'none';
            document.getElementById('report3').style.display = 'block';
			document.getElementById('report4').style.display = 'none';
            document.getElementById('report5').style.display = 'none';
			document.getElementById('report6').style.display = 'none';
        	}
		else if (document.getElementById('dropdownReportList').value == "showReport4")
        	{
        	document.getElementById('report1').style.display = 'none';
            document.getElementById('report2').style.display = 'none';
            document.getElementById('report3').style.display = 'none';
			document.getElementById('report4').style.display = 'block';
            document.getElementById('report5').style.display = 'none';
			document.getElementById('report6').style.display = 'none';
        	}
		else if (document.getElementById('dropdownReportList').value == "showReport5")
        	{
        	document.getElementById('report1').style.display = 'none';
            document.getElementById('report2').style.display = 'none';
			document.getElementById('report3').style.display = 'none';
            document.getElementById('report4').style.display = 'none';
            document.getElementById('report5').style.display = 'block';
			document.getElementById('report6').style.display = 'none';
        	}
		else 
        	{
        	document.getElementById('report1').style.display = 'none';
            document.getElementById('report2').style.display = 'none';
			document.getElementById('report3').style.display = 'none';
            document.getElementById('report4').style.display = 'none';
            document.getElementById('report5').style.display = 'none';
			document.getElementById('report6').style.display = 'block';
        	}
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

<title>Report Form</title>
</head>

<body>
<form id="formInvoice" name="formInvoice" method="post" action="">
<div id="main">
<div id="้header">
    <h1>&nbsp;</h1>
    <!-------------------------- Menu -->
  <table width="100%" border="none" cellpadding="0" cellspacing="0">
    <tr>
        <!-------------------------- NEW -->
	    <!-- onclick: set mode = NEW, set dirty bit -->
		<td align="center" class="border"><div class="text_menu"></div>
      </td>
        <!-------------------------- EDIT -->
        <!-- onclick: open customer list -->
        <td align="center" class="border"><div class="text_menu"></div>
      </td>
        <!-------------------------- SAVE -->
        <!-- onclick: check current mode and set new mode -->
        <td align="center" class="border"><div class="text_menu"></div>
      </td>
        <td width="100%" align="right"><h1>สรุปรายงาน</h1></td>
    </tr>
    </table>
    <div>
  <!-------------------------- Header -->
<div id="main">
    <div id="middle" style="height:480px">
    <div id="middle2">
    <div id="middle3">

<form id="formAsset" name="formAsset" method="post" action="">
        <legend></legend>
  <label class="col-md-1 control-label"></label>
        <div class="col-md-6"><label>รายงาน :</td>
          <select id="dropdownReportList" name="dropdownReportList" onchange="javascript:selectReport1()" class="form-control">
            <option value="showReport1">ประวัติคนไข้</option>
            <option value="showReport2">ใบรายการส่งเงินประจำวัน</option>
            <option value="showReport3">บัญชีรายรับ-จ่ายประจำเดือน</option>
            <option value="showReport4">สรุปผู้มารับบริการประจำเดือน</option>
            <option value="showReport5">รวมยอดรายจ่ายผู้บำบัด</option>
            <option value="showReport6">สรุปจำนวนผู้มารับบริการประจำปี</option>
          </select>
          <p>&nbsp;</p>
        </div>
        
        <div id="report1" >
          <div class="form-group">
            <label>ชื่อคนไข้</label>
            <input name="txtCusName"  id="txtCusName" value="<?=$_SESSION['CusName']?>" size="15" />
            <input name="txtCusSurName"  id="txtCusSurName" value="<?=$_SESSION['CusSurName']?>" size="15"  />
            <input name="txtCustomerNo" id="txtCustomerNo" type="hidden" value="<?=$_SESSION['CustomerNo']?>" />
            <input type="image" name="btnGetCustomer" src="image/btnSearch.png" width="20px" 
                 onclick = "javascript: openListOfValue('','customer','Select CusNo, CusName, CusSurname, CustomerNo From Customer WHERE (1=1)','CusNo,CusName,CusSurname,CustomerNo','รหัสผู้ป่วยเก่า,ชื่อ,นามสกุล,รหัสผู้ป่วยใหม่');
                 						return false;"/>
          </div>
          <button type="button" class="btn btn-info navbar-btn" onclick="javascript:return printReport6();"> 
          <span class="glyphicon glyphicon-print"></span> Print</button>
        </div>
        
        <div id="report2" style="display:none">
          <div class="form-group">
            <label>วัน:</label>
            <input name="txtDay" id="txtDay" type="text" value="<?=$_SESSION['Day']?>" />
          </div>
          <button type="button" class="btn btn-info navbar-btn" onclick="javascript:return printReport1();"> 
          <span class="glyphicon glyphicon-print"></span> Print</button>
        </div>
        
        <div id="report3" style="display:none">
          <div class="form-group">
            <label>เดือน:</label>
            <input name="txtMonth" id="txtMonth" type="text" value="<?=$_SESSION['Month']?>" />
          </div>
          <button type="button" class="btn btn-info navbar-btn" onclick="javascript:return printReport2();"> 
          <span class="glyphicon glyphicon-print"></span> Print</button>
        </div>
        
        <div id="report4" style="display:none">
          <div class="form-group">
            <label>เดือน:</label>
            <input name="txtMonth1" id="txtMonth1" type="text" value="<?=$_SESSION['Month1']?>" />
          </div>
          <button type="button" class="btn btn-info navbar-btn" onclick="javascript:return printReport3();"> 
          <span class="glyphicon glyphicon-print"></span> Print</button>
        </div>
        
        <div id="report5" style="display:none">
          <div class="form-group">
            <label>ระหว่างวันที่</label>
            <input name="txtDay1" id="txtDay1" type="text" value="<?=$_SESSION['Day1']?>" />
            <label>ถึงวันที่</label>
            <input name="txtDay2" id="txtDay2" type="text" value="<?=$_SESSION['Day2']?>" />
          </div>
          <button type="button" class="btn btn-info navbar-btn" onclick="javascript: return printReport4();"> 
          <span class="glyphicon glyphicon-print"></span> Print</button>
        </div>
        
        <div id="report6" style="display:none">
          <div class="form-group">
            <label>ระหว่างปี</label>
            <input name="txtYear1" id="txtYear1" type="text" value="<?=$_SESSION['Year1']?>" />
            <label>ถึงปี</label>
            <input name="txtYear2" id="txtYear2" type="text" value="<?=$_SESSION['Year2']?>" />
          </div>
          <button type="button" class="btn btn-info navbar-btn" onclick="javascript:return printReport5();"> 
          <span class="glyphicon glyphicon-print"></span> Print</button>
        </div>
</form>
      
      <table width="928" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="282" height="64">&nbsp;</td>
          <td width="522">&nbsp;</td>
          <td width="124"><p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><br />
              <br />
            </p>
            <p>
              <a href="HomePage1.php"><img src="image/Home.png"></a>
            </p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
        </tr>
        
  </table><a href="logout.php">Logout</a>
  
  
</body>
</html>
