<?php
session_start();			/* for use session */
if(!isset($_SESSION['UserID']))
	{
		echo "Please Login!";
		echo "<br /><a href='index.php'>go to Login page </a>";
		exit();
	}
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
          
        <!-- Javascript -->
        <script type="text/javascript">  
			function DocForm(){
				window.open("DocForm1.php");
				window.close();
				return false;
  			}
			function RegisterForm(){
				window.open("register.php");
				window.close();
				return false;
  			}
			
			function CusForm(){
				window.open("CusForm1.php");
				window.close();
				return false;
  			}
			
		//	function SerForm(){
		//		window.open("SerForm1.php");
		//		window.close();
		//		return false;
  		//	}
			
			function ReForm(){
				window.open("ReForm1.php");
				window.close();
				return false;
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
            input[type="number"]{
                height:18px; 
                width:60px;              
            }
            .money{
            text-align:right	
            }
            body {
                background-image: url(image/Form2.png);
                background-color: #FFFFFF;
                opacity:1;
            }
            #formInvoice #header table tr td h1 {
                color: #000;
            }
            #formInvoice #header table tr td h1 {
                font-family: Georgia, Times New Roman, Times, serif;
            }
            body,td,th {
                font-size: 30px;
            }
        </style>

		<title>Home Page</title>
	</head>

	<body>
        <form id="form1" name="form1" method="post" action=""></form>
		<p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table width="1380" height="598" border="0">
            <tr>
                <td width="4" height="256">&nbsp;</td>
                <td width="4">&nbsp;</td>
                <td width="4">&nbsp;</td>
                <td width="4">&nbsp;</td>
                <td width="4">&nbsp;</td>
                <td width="4">&nbsp;</td>
                <td width="555">&nbsp;</td>
                <td width="254">
                <a href="DocForm1.php"><img src="image/Doctor.png"></td>
                <td width="254">
                <a href="register.php"><img src="image/user-id-256.png"></td>
                <td width="251">
                <a href="CusForm1.php"><img src="image/btnCustomer.png"></td>
            </tr>
           	<tr>
           	<td height="38">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>ผู้บำบัด</td>
                <td>สมัครสมาชิก</td>
                <td> ผู้ป่วย</td>
           	</tr>
           	<tr>
                <td height="256">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><a href="SerForm1.php"><img src="image/btnReport1.png"></a><br>

                
                </td>
                <td>&nbsp;</td>
                <td>
                <a href="ReForm1.php"><img src="image/btnReport.png"></td>
           	</tr>
           	<tr>
                <td height="38">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>บริการ</td>
                <td><a href="logout.php">Logout</a>&nbsp;</td>
            	<td>รายงาน</td>
        	</tr>
    	</table>
	</body>
</html>
