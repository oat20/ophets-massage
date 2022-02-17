
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
	/* use jQuery for show calendar */
	function GoHome(){
		window.open("HomePage1.php");
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
                background-image: url(image/sss.jpg);
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
                font-size: 16px;
            }
			#main {
   				 position: relative;
   				 margin: 0 auto;
   				 width: 500px;
    			text-align: left;
    			color: #050505;
				
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


</head>

<body>
<form  method="post" action="save_register.php">
<div id="main">
	<div id="้header">
    <h1>&nbsp;</h1>
    <!-------------------------- Menu -->
	
	</div>

    <!-------------------------- Header -->
    <div id="middle" style="height:480px" class="border">
    <div id="middle2">
    <div id="middle3">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr height="32">
          <td width="57">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td width="7">&nbsp;</td>
          <td width="14">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td colspan="2" nowrap="nowrap">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td colspan="2" nowrap="nowrap"><table width="379" border="0">
              <tr>
                <td width="132">&nbsp;</td>
                <td width="237">Register Form </td>
              </tr>
            </table>
            <br />
            <table width="400" border="1" style="width: 400px">
              <tbody>
                <tr>
                  <td width="125">&nbsp;Username</td>
                  <td width="180"><input name="txtUsername" type="text" id="txtUsername" /></td>
                </tr>
                <tr>
                  <td>&nbsp;Password</td>
                  <td><input name="txtPassword" type="password" id="txtPassword" /></td>
                </tr>
                <tr>
                  <td>&nbsp;Confirm Password</td>
                  <td><input name="txtConPassword" type="password" id="txtConPassword" /></td>
                </tr>
                <tr>
                  <td>&nbsp;Name</td>
                  <td><input name="txtName" type="text" id="txtName"  /></td>
                </tr>
                <tr>
                  <td>&nbsp;Status</td>
                  <td><select name="ddlStatus" id="ddlStatus">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="boss">Boss</option>
                  </select></td>
                </tr>
              </tbody>
            </table>
            <br />
            <input type="submit" name="Submit" value="Save" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td colspan="2" nowrap="nowrap">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr height="32">
          <!-- Customer Code -->
          <!-- onchange: set dirty bit -->
          <td>&nbsp;</td>
          <td width="325" nowrap="nowrap">&nbsp;</td>
          <td width="7">&nbsp;</td>
          <!-- Customer Name -->
          <!-- onchange: set dirty bit -->
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div></div></div>

  <!-------------------------- Hidden Field --></div>
<table width="1228" border="0">
  <tr>
    <td width="124">&nbsp;</td>
    <td width="916">&nbsp;</td>
    <td width="89">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="HomePage1.php"><img src="image/Home.png"></a>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
