<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	/* function */
	function setButton() {
        $button['search'] = " ค้นหา ";
        $button['expand'] = " ยกเลิก ";
		
		return $button;
	}
	
	function setInitSQL() {
		$_SESSION['SQL'] = $_SESSION['initSQL'];
	}
	
	function setLabel() {
        
		if($_SESSION['table'] == "doctor")
		{
			$label['table'] = "รายชื่อผู้บำบัด";
		}
		else if($_SESSION['table'] == "customer")
		{
			$label['table'] = "รายชื่อผู้ป่วย";
		}
		else if($_SESSION['table'] == "costtype")
		{
			$label['table'] = "ประเภทการจ่ายเงิน";
		}
		else if($_SESSION['table'] == "servicetype")
		{
			$label['table'] = "ประเภทบริการ";
		}
		else if($_SESSION['table'] == "status")
		{
			$label['table'] = "สถานภาพการสมรส";
		}
		else if($_SESSION['table'] == "government")
		{
			$label['table'] = "การรับราชการทหาร";
		}
		else if($_SESSION['table'] == "service")
		{
			$label['table'] = "เลขที่ใบเสร็จรับเงิน";
		}
		$label['search'] = "ค้นหา:";
		return $label;
	}
	
	function setListColumnName(){
		if($_SESSION['table'] == "doctor")
			//$listColumnName = array("DocName", "DocSurName");
			$listColumnName = array("ชื่อหมอ", "นามสกุลหมอ");
		else if($_SESSION['table'] == "customer")
			//$listColumnName = array("CusNo", "CusName", "CusSurname",CustomerNo);
			$listColumnName = array("รหัสผู้ป่วยเก่า", "ชื่อผู้ป่วย", "นามสกุลผู้ป่วย","รหัสผู้ป่วยใหม่");
		else if($_SESSION['table'] == "service")
			//$listColumnName = array("CusName", "InvoiceNo");
			$listColumnName = array("เลขที่ใบเสร็จ", "ชื่อผู้ป่วย");
		
		return $listColumnName;
	}
	
	function setCondition(){
        if($_POST['listColumnName'] == "ชื่อหมอ")
			$strCondition = "(DocName like '%".$_POST['txtSearch']."%')";
		else if($_POST['listColumnName'] == "นามสกุลหมอ")
			$strCondition = "(DocSurName like '%".$_POST['txtSearch']."%')";
		else if($_POST['listColumnName'] == "รหัสผู้ป่วยเก่า")
			$strCondition = "(CusNo like '%".$_POST['txtSearch']."%')";
		else if($_POST['listColumnName'] == "ชื่อผู้ป่วย")
			$strCondition = "(CusName like '%".$_POST['txtSearch']."%')";
		else if($_POST['listColumnName'] == "นามสกุลผู้ป่วย")
			$strCondition = "(CusSurname like '%".$_POST['txtSearch']."%')";
		else if($_POST['listColumnName'] == "รหัสผู้ป่วยใหม่")
			$strCondition = "(CustomerNo like '%".$_POST['txtSearch']."%')";
		else if($_POST['listColumnName'] == "เลขที่ใบเสร็จ")
			$strCondition = "(InvoiceNo like '%".$_POST['txtSearch']."%')";
        
		$_SESSION['SQL'] = 	$_SESSION['SQL']." AND ".$strCondition;
	}
	
	function queryData($DB_MAIN_LINK){
		$sql		=	$_SESSION['SQL']." ORDER BY ".$_SESSION['columnname'][0];
		
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		//$mysqli = new mysqli("localhost", "root", "12345", "ophets");
		$mysqli -> set_charset('utf8');

		if($result = $mysqli->query($sql)){
			$i 			= 	0;
			while($row = $result->fetch_array())
			{
				$data[$i] = $row;
				$i++;		
			}
		}
		
		return $data;
	}
	
 	/* ------------------------------------------------------------------------------------------------ */

	/* set init SQL when page load */
	if(!isset($_POST['btnSearch']) && !isset($_POST['btnExpand'])){
		$_SESSION['table']		 = $_GET['table'];
		$_SESSION['initSQL']	   = $_GET['initSQL'];
		$_SESSION['columnname']	= split(",",$_GET['columnname']);
		$_SESSION['headname'] 	= split(",",$_GET['headname']);
		$mode					  = $_GET['mode'];
		setInitSQL();
	}

	/* set control */
	$button 		 = setButton(); 	
	$label 		  = setLabel();
	$listColumnName = setListColumnName();

	/* when click button */
	if(isset($_POST['btnSearch'])){
		$sqlCondition 	= setCondition();
	 	$listData 		= queryData($DB_MAIN_LINK);
	}
	else if(isset($_POST['btnExpand'])){
		setInitSQL();
	 	$listData 		= queryData($DB_MAIN_LINK);
	}
	else{
		$listData = queryData($DB_MAIN_LINK);
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- include file CSS -->
<link rel="stylesheet" href="jquery-ui-1.9.1.custom/css/redmond/jquery-ui-1.9.1.custom.css" />
<link rel="stylesheet" href="css/style.css" />

<!-- include file jQuery --> 
<script src="jquery-ui-1.9.1.custom/js/jquery-1.8.2.js"></script>
<script src="jquery-ui-1.9.1.custom/js/jquery-ui-1.9.1.custom.js"></script>

<script type="text/javascript" src="jquery-ui-1.9.1.custom/tablesorter/jquery.tablesorter.min.js"></script>
<link rel="stylesheet" href="jquery-ui-1.9.1.custom/tablesorter/themes/blue/style.css" />

<title>List of Value</title>
<script language="javascript">
	$(document).ready(function(){
		$("#table_list").tablesorter(); 
	});
	
	function setSelectedValue(columnName) {
        var txtColumnName = document.getElementById('txtColumnName');
        txtColumnName.value = columnName;
    }
	
	function getListOfValue(rowData) {
        var dataArray = rowData.split(";");
        opener.getListOfValue(dataArray,'<?=$_SESSION['table']?>','<?=$mode?>');
        window.close();
    }
</script>

<style type="text/css">
#div_list{
	height:200px;
	width:80%;
	overflow:scroll;
	overflow-x:auto;
	border:1px dashed White;
	padding-left: 5px;
	padding-right: 5px;
	margin-top: 0;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
} 
#table_list tr:hover td{
	background-color:#ebebfe;	
}
#table_list{	
	font: 13px "Trebuchet MS", Arial, Helvetica, sans-serif;
}
h1 {
	padding: 30px 0 0 45px;
	font-size: 2em;
	letter-spacing: 2px;
	color: #000;
}
body {
                background-image: url(image/sss.jpg);
                background-color: #FFFFFF;
                opacity:1;
            }
			
}
table.tablesorter {
	font-family:arial;
/*	background-color: #CDCDCD;*/
	font-size: 13px;
	width: 100%;
	text-align: left;
}
table.tablesorter thead tr th, table.tablesorter tfoot tr th {
	background-color: #284775;
	border: 1px solid #FFF;
	font-size: 13px;
	padding: 4px 20px 4px 20px;
	color:#FFF !important;
	font-weight:bold;
	text-align:center;
}
table.tablesorter tbody td {
	color: #3D3D3D;
	padding: 4px;
	background-color: #FFF;
	vertical-align: top;
}
</style>
</head>

<body>
<form id="form_list" method="post">
<h1><label><?=$label['table']?></label></h1>

<!-- Table ------->
<div id="div_list">
<table id="table_list" cellpadding="0" cellspacing="1" class="tablesorter">
	
    <!-- column name -->
    <thead>
	<tr>
    	<th></th>
<?php   for($i=0; $i<count($_SESSION['headname']); $i++)
		{
?>	    	<th onClick="javascript:setSelectedValue('<?=$_SESSION['headname'][$i]?>');" style="color:#FFF"><?=$_SESSION['headname'][$i]?></th>
<?php	}
?>
    </tr>
    </thead>
    
    <!-- data -->
<?php
	if(count($listData) > 0){
 		for($i=0; $i<count($listData); $i++)
		{
			$rowData = "";
			for($j=0; $j<count($_SESSION['headname']); $j++)
			{	
				$rowData = $rowData.$listData[$i][$j].";";				
			}
?>          <tr>
            <td align="center"><img src="image/lineSelect.png" onClick="javascript:getListOfValue('<?=$rowData?>');" style="cursor:pointer"></td>
<?php		for($j=0; $j<count($_SESSION['headname']); $j++)
			{	
?>         		<td align="center"><?=$listData[$i][$j]?></td>	
<?php		}
?>          </tr>
<?php	}
	}
	else{
?>			<tr>
				<td align="center" colspan="<?=count($_SESSION['columnname'])+1?>">no data</td>    
			</tr>	
<?php   
	}
?>
</table>
</div>

<p>

<!-- Search ------->
<div align="center">
	<table>
    <tr valign="middle">
   	  <td width="50px" align="left" style="color:#FFF"><?=$label['search']?></td>
            <td><select name="listColumnName">
      			<?php foreach($listColumnName as $data){?>
      			<option value="<?=$data?>"><?=$data?></option>
      			<?php }?>
                </select>
        	</td>
            <td><input name="txtSearch" type="text" size="10" id="txtSearch"></td>
            <td><input name="btnSearch" type="submit" value="<?=$button['search']?>"></td>
            <td><input name="btnExpand" type="submit" value="<?=$button['expand']?>"></td>
	</tr>
	</table>
</div>

</form>

</body>
</html>