<?php
session_start();
require_once '../config.inc.php';
require_once '../connect.php';
require_once '../function.php';
require_once './function.inc.php';

$_SESSION['InvoiceNo'] 	 = $_POST['txtInvoiceNo'];
	$_SESSION['BookNo'] 		= $_POST['txtBookNo'];
	$_SESSION['Date']	  	  = $_POST['txtDate'];
    $_SESSION['CusName']       = $_REQUEST['txtCusName'];
	$_SESSION['CustomerNo']	= $_REQUEST['txtCustomerNo'];
	$_SESSION['Service']   	   = $_POST['txtService'];
	$_SESSION['ServiceNo']   	 = $_POST['txtServiceNo'];
    $_SESSION['Hour']	  	  = $_POST['txtCusHour'];
	$_SESSION['Min']	   	   = $_POST['txtMin'];
	$_SESSION['Cost']	  	  = $_POST['txtCost'];
	$_SESSION['CostType']  	  = $_POST['txtCostType'];
	$_SESSION['DocName']   	   = $_POST['txtDocName'];
	$_SESSION['DocNo']   	     = $_POST['txtDocNo'];
	$_SESSION['Age']   	   	   = $_REQUEST['txtAge'];

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
			//unset($_SESSION['CusName']);
			//unset($_SESSION['CustomerNo']);	
			unset($_SESSION['Service']);
			unset($_SESSION['ServiceNo']);
			unset($_SESSION['Hour']);
			unset($_SESSION['Min']);	
			unset($_SESSION['DocName']);
			unset($_SESSION['DocNo']);
			unset($_SESSION['Cost']);
			unset($_SESSION['CostType']);
			//unset($_SESSION['Age']);
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


/* set invoice date */
	if(isset($_POST['txtDate'])){		
		$_SESSION['Date'] 	= 	$_POST['txtDate'];	
	}
	else{
		$_SESSION['Date'] 	= 	date('Y-m-d');		/* set current date */
	}
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* set service type */
	if(isset($_POST['txtService'])){		
		$_SESSION['Service'] 	= 	$_POST['txtService'];	
	}
	else{
		$_SESSION['Service'] 	= 	"3";		/* set current date */
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
    <?php require_once './css.inc.php';?>
    <title>Service Form</title>
</head>
<body>
    <?php echo page_navbar("", "./index.php");?>

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ออกใบเสร็จ</h3>
            </div>
            <form id="formInvoice" name="formInvoice" method="post" action="">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label>
                                <?=$label['lbInvoiceNo']?>
                                </label>
                                <input name="txtInvoiceNo" type="text" class="form-control disabled" id="txtInvoiceNo"
                                    value="<?=$_SESSION['InvoiceNo']?>" size="8" readonly="readonly"; />
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                            <label>
          <?=$label['lbInvoiceDate']?>
          </label>
          <input name="txtDate" type="text" class="form-control disabled" id="txtDate"
             value="<?=$_SESSION['Date']?>" size="8" readonly="readonly"; />
             </div>
                        </div>
                        <!-- col -->
                    </div>
                    <!-- row -->
					<div class="form-group">
						<label>รหัสคนไข้</label>
						<input type="text" name="txtCustomerNo" id="txtCustomerNo" value="<?=$_SESSION['CustomerNo']?>" class="form-control" readonly>
					</div>
                    <div class="form-group">
                        <label><?=$label['lbCusName']?>
          </label>
        <input name="txtCusName" type="text" id="txtCusName" class="form-control"
				           	 value="<?php echo $_SESSION['CusName'];?>" size="15" readonly>
                    </div>
                    <div class="form-group">
                        <label><?=$label['lbCost']?></label>
								<select name="txtCostType" class="form-control" required>
									<option value=""></option>
									<?php
									$sql_costtype = mysqli_query($con, "select id, CostType from costtype order by id");
									while($rs_costtype = mysqli_fetch_assoc($sql_costtype)):
									echo '<option value="'.$rs_costtype['CostType'].'">'.$rs_costtype['CostType'].'</option>';
									endwhile;
									?>
								</select>
                    </div>
                    <div class="form-group">
                        <label>
          <?=$label['lbSerType']?>
        </label>
								<select name="txtServiceNo" class="form-control" onchange="getServicetype(this)" required>
									<option value=""></option>
									<?php
									$sql_servicetype = mysqli_query($con, "select * from servicetype");
									while($rs_servicetype = mysqli_fetch_assoc($sql_servicetype)):
										echo '<option value="'.$rs_servicetype['id'].'" data-service="'.$rs_servicetype['Service'].'">'.$rs_servicetype['Service'].'</option>';
									endwhile;
									?>
								</select>
                    </div>
                    <div class="form-group">
                        <label>
          <?=$label['lbTime']?>
        </label>
        <div class="row">
            <div class="col-xs-6">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">ชั่วโมง</span>
                <select name="txtHour" id="txtHour" 
        					 onchange="javascript: calExtendedPrice(); setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Hour']?>" class="form-control">
                  <option value = 1<?=$_SESSION['Hour'] == 1 ? ' selected="selected"' : '';?> >1</option>
                             <option value = 2<?=$_SESSION['Hour'] == 2 ? ' selected="selected"' : '';?> >2</option>
                  <option value = 3<?=$_SESSION['Hour'] == 3 ? ' selected="selected"' : '';?> >3</option>
                             <option value = 4<?=$_SESSION['Hour'] == 4 ? ' selected="selected"' : '';?> >4</option>
                             <option value = 0<?=$_SESSION['Hour'] == 0 ? ' selected="selected"' : '';?> >0</option>
           
							 </select>
                             </div>
            </div>
            <!-- col -->
            <div class="col-xs-6">
                <div class="input-group">
                    <span class="input-group-addon">นาที</span>
                <select name="txtMin" id="txtMin" 
        					 onchange="javascript: calExtendedPrice(); setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Min']?>" class="form-control"> 
                  <option value = 15<?=$_SESSION['Min'] == 15 ? ' selected="selected"' : '';?> >15</option>
                             <option value = 30<?=$_SESSION['Min'] == 30 ? ' selected="selected"' : '';?> >30</option>
                  <option value = 45<?=$_SESSION['Min'] == 45 ? ' selected="selected"' : '';?> >45</option>
                             <option value = 0<?=$_SESSION['Min'] == 0 ? ' selected="selected"' : '';?> >00</option>
           
							 </select>          
                             </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->
                    </div>
                    <div class="form-group">
                        <label><?=$label['lbAmountDue']?>
          </label>
          <input name="txtCost" type="text" id="txtCost" class="form-control disabled money" readonly="readonly" size="17"
                 value="<?php if($_SESSION['Cost'] != '') {print number_format($_SESSION['Cost'],2);}
				 			  else{print number_format(0.0,2);} ?>"  
                 onchange="javascript: calExtendedPrice();" />
                    </div>
                    <div class="form-group">
                        <label>
          <?=$label['lbDocName']?>
        </label>
								<select name="txtDocNo" class="form-control" onchange="getDocname(this)" required>
									<option value=""></option>
									<?php
									$sql_doctor = mysqli_query($con, "SELECT DocNo,
										DocName,
										concat(DocName,' ',DocSurName) as fullname
										FROM doctor
									");
									while($rs_doctor = mysqli_fetch_assoc($sql_doctor)):
										echo '<option value="'.$rs_doctor['DocNo'].'" data-docname="'.$rs_doctor['DocName'].'">'.$rs_doctor['fullname'].'</option>';
									endwhile;
									?>
								</select>
                    </div>

                    <!-------------------------- Hidden Field -->
	<input name="DirtyBit" id="DirtyBit" type="hidden" value="<?=$DirtyBit?>" />
    <input name="mode" id="mode" type="hidden" value="<?=$mode?>" />
    <input name="loaded" id="loaded" type="hidden" value="<?=$loaded?>" />
    
    <input name="txtBookNo" id="txtBookNo" type="hidden" value="<?=$_SESSION['BookNo']?>" />
    <input name="txtDocName" id="txtDocName" type="hidden" value="<?=$_SESSION['DocNo']?>" />
    <input name="txtAge" id="txtAge" type="hidden" value="<?=floor($_SESSION['Age'])?>" />
    <input name="txtService" id="txtService" type="hidden">
                </div>
                <!-- body -->
                <div class="panel-footer text-right">
                    <button type="button" class="btn btn-danger btn-lg"><i class="fa fa-floppy-disk fa-fw"></i> ออกใบเสร็จ</button>
                </div>
            </form>
        </div>

    </div>

    <?php require_once './js.inc.php';?>
    <script>
        function setDirtyBit(DirtyBit){
		document.getElementById('DirtyBit').value = DirtyBit;
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

	function getServicetype(obj) {
		var serviceType = obj.options[obj.selectedIndex].getAttribute('data-service');
		document.getElementById("txtService").value = serviceType;
	}

	function getDocname(obj) {
		var serviceType = obj.options[obj.selectedIndex].getAttribute('data-docname');
		alert(serviceType);
		document.getElementById("txtDocName").value = serviceType;
	}
    </script>
</body>
</html>