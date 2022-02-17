<?php
	session_start();			/* for use session */
if(!isset($_SESSION['UserID']))
	{
		echo "Please Login!";
		echo "<br /><a href='index.php'>go to Login page </a>";
		exit();
	}


				$_SESSION['DocNo']		 = $_POST['txtDocNo'];
				$_SESSION['Point']		 = $_POST['txtPoint'];
   			 	$_SESSION['DocName']	   = $_POST['txtDocName'];
   				$_SESSION['DocSurName']	= $_POST['txtDocSurName'];
   				$_SESSION['Address']	  = $_POST['txtAddress'];
				$_SESSION['HomePhone']	=	$_POST['txtHomePhone'];
				$_SESSION['Phone']		=	$_POST['txtPhone'];
				$_SESSION['Birthday']	=	$_POST['txtBirthday'];
				$_SESSION['Age']	=	$_POST['txtAge'];
				$_SESSION['Nation']	=	$_POST['txtNation'];
				$_SESSION['Citizen']	=	$_POST['txtCitizen'];
				$_SESSION['Religion']	=	$_POST['txtReligion'];
				$_SESSION['AddressU']	=	$_POST['txtAddressU'];
				$_SESSION['AddressZ']	=	$_POST['txtAddressZ'];
				$_SESSION['FPoint']	=	$_POST['txtFPoint'];
				$_SESSION['FatherName']	=	$_POST['txtFatherName'];
				$_SESSION['FatherSurname']	=	$_POST['txtFatherSurname'];
				$_SESSION['FJob']	=	$_POST['txtFJob'];
				$_SESSION['MPoint']	=	$_POST['txtMPoint'];
				$_SESSION['MotherName']	=	$_POST['txtMotherName'];
				$_SESSION['MotherSurname']	  	 =	$_POST['txtMotherSurname'];
				$_SESSION['MJob']		 =	$_POST['txtMJob'];
				$_SESSION['DocStatus']	   =	$_POST['txtDocStatus'];
				$_SESSION['GovernmentS']	=	$_POST['txtGovernmentS'];
				$_SESSION['U']	=	$_POST['txtU'];
				$_SESSION['UU']	=	$_POST['txtUU'];
				$_SESSION['UUU']	=	$_POST['txtUUU'];
				$_SESSION['UUUU']	=	$_POST['txtUUUU'];
				$_SESSION['UUUUU']	=	$_POST['txtUUUUU'];
				$_SESSION['UUUUUU']	=	$_POST['txtUUUUUU'];
				$_SESSION['BTb']	=	$_POST['txtBTb'];
				$_SESSION['BTv']	=	$_POST['txtBTv'];
				$_SESSION['BTc']	=	$_POST['txtBTc'];
				$_SESSION['BTx']	=	$_POST['txtBTx'];
				$_SESSION['BTz']	=	$_POST['txtBTz'];
				$_SESSION['Talent']	=	$_POST['txtTalent'];
				$_SESSION['WorkPast']	=	$_POST['txtWorkPast'];
				$_SESSION['WorkPastx']	=	$_POST['txtWorkPastx'];
				$_SESSION['WorkPastz']	=	$_POST['txtWorkPastz'];
				$_SESSION['WorkTime']	=	$_POST['txtWorkTime'];
				$_SESSION['WorkTimex']	  	 =	$_POST['txtWorkTimex'];
				$_SESSION['WorkTimez']		 =	$_POST['txtWorkTimez'];
				$_SESSION['WorkPlace']	   =	$_POST['txtWorkPlace'];
				$_SESSION['WorkPlacex']	=	$_POST['txtWorkPlacex'];
				$_SESSION['WorkPlacez']	=	$_POST['txtWorkPlacez'];
				$_SESSION['Position']	=	$_POST['txtPosition'];
				$_SESSION['Positionx']	=	$_POST['txtPositionx'];
				$_SESSION['Positionz']	=	$_POST['txtPositionz'];
				$_SESSION['CheckIn']	=	$_POST['txtCheckIn'];
				$_SESSION['CheckInx']	=	$_POST['txtCheckInx'];
				$_SESSION['CheckInz']	=	$_POST['txtCheckInz'];
				$_SESSION['CheckOut']	=	$_POST['txtCheckOut'];
				$_SESSION['CheckOutx']	=	$_POST['txtCheckOutx'];
				$_SESSION['CheckOutz']	=	$_POST['txtCheckOutz'];
				$_SESSION['DocProblem']	=	$_POST['txtDocProblem'];
				$_SESSION['DocProblemx']	=	$_POST['txtDocProblemx'];
				$_SESSION['DocProblemz']	=	$_POST['txtDocProblemz'];
				$_SESSION['GradMM']	=	$_POST['txtGradMM'];
				$_SESSION['Day']	=	$_POST['txtDay'];
				$_SESSION['Month']	=	$_POST['txtMonth'];
				$_SESSION['Yearx']	  	 =	$_POST['txtYearx'];
				$_SESSION['Yearz']		 =	$_POST['txtYearz'];
				$_SESSION['Monthz']	   =	$_POST['txtMonthz'];
				$_SESSION['Work']	=	$_POST['txtWork'];
				$_SESSION['Worky']	=	$_POST['txtWorky'];
				$_SESSION['Workx']	=	$_POST['txtWorkx'];
				$_SESSION['Workz']	=	$_POST['txtWorkz'];
				$_SESSION['PlaceM']	=	$_POST['txtPlaceM'];
				$_SESSION['PlaceMx']	=	$_POST['txtPlaceMx'];
				$_SESSION['PlaceMz']	=	$_POST['txtPlaceMz'];
				$_SESSION['PositionM']	=	$_POST['txtPositionM'];
				$_SESSION['PositionMx']	=	$_POST['txtPositionMx'];
				$_SESSION['PositionMz']	=	$_POST['txtPositionMz'];
				$_SESSION['CheckIO']	=	$_POST['txtCheckIO'];
				$_SESSION['CheckIOx']	=	$_POST['txtCheckIOx'];
				$_SESSION['CheckIOz']	=	$_POST['txtCheckIOz'];
				$_SESSION['SalaryM']	=	$_POST['txtSalaryM'];
				$_SESSION['SalaryMx']	=	$_POST['txtSalaryMx'];
				$_SESSION['SalaryMz']	=	$_POST['txtSalaryMz'];
				$_SESSION['Freetime']	=	$_POST['txtFreetime'];
				$_SESSION['Reason']	=	$_POST['txtReason'];
				$_SESSION['WorkBefore']	=	$_POST['txtWorkBefore'];
				$_SESSION['PositionBefore']	=	$_POST['txtPositionBefore'];
				$_SESSION['SalaryBefore']	=	$_POST['txtSalaryBefore'];
				$_SESSION['Study']	=	$_POST['txtStudy'];
				$_SESSION['School']	=	$_POST['txtSchool'];
				$_SESSION['Department']	=	$_POST['txtDepartment'];
				$_SESSION['Dayophets']	=	$_POST['txtDayophets'];
				$_SESSION['Monthophets']	=	$_POST['txtMonthophets'];
				$_SESSION['Yearophets']	=	$_POST['txtYearophets'];
				$_SESSION['Salaryophets']	=	$_POST['txtSalaryophets'];
				$_SESSION['Workingophets']	=	$_POST['txtWorkingophets'];
				$_SESSION['Workingophetsx']	=	$_POST['txtWorkingophetsx'];
				$_SESSION['Workingophetsz']	=	$_POST['txtWorkingophetsz'];
				$_SESSION['photo']	=	$_POST['txtphoto'];
	
	
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
			$loaded	  =	false;					/* load = false : doctor detail is not displayed */
			$editLine	=	-1;						/* edit line start with 0 - n rows */
						
			unset($_SESSION['Point']);		/* clear session */
			unset($_SESSION['DocName']);	
			unset($_SESSION['DocSurName']);
			unset($_SESSION['Address']);
			unset($_SESSION['HomePhone']);
			unset($_SESSION['Phone']);
			unset($_SESSION['Birthday']);
			unset($_SESSION['Age']);
			unset($_SESSION['Nation']);
			unset($_SESSION['Citizen']);
			unset($_SESSION['Religion']);
			unset($_SESSION['AddressU']);
			unset($_SESSION['AddressZ']);
			unset($_SESSION['FPoint']);
			unset($_SESSION['FatherName']);
			unset($_SESSION['FatherSurname']);
			unset($_SESSION['FJob']);
			unset($_SESSION['MPoint']);
			unset($_SESSION['MotherName']);
			unset($_SESSION['MotherSurname']);
			unset($_SESSION['MJob']);
			unset($_SESSION['DocStatus']);
			unset($_SESSION['GovernmentS']);
			unset($_SESSION['U']);
			unset($_SESSION['UU']);
			unset($_SESSION['UUU']);
			unset($_SESSION['UUUU']);
			unset($_SESSION['UUUUU']);
			unset($_SESSION['UUUUUU']);
			unset($_SESSION['BTb']);
			unset($_SESSION['BTv']);
			unset($_SESSION['BTc']);
			unset($_SESSION['BTx']);
			unset($_SESSION['BTz']);
			unset($_SESSION['Talent']);
			unset($_SESSION['WorkPast']);
			unset($_SESSION['WorkPastx']);
			unset($_SESSION['WorkPastz']);
			unset($_SESSION['WorkTime']);
			unset($_SESSION['WorkTimex']);
			unset($_SESSION['WorkTimez']);
			unset($_SESSION['WorkPlace']);
			unset($_SESSION['WorkPlacex']);
			unset($_SESSION['WorkPlacez']);
			unset($_SESSION['Position']);
			unset($_SESSION['Positionx']);
			unset($_SESSION['Positionz']);
			unset($_SESSION['CheckIn']);
			unset($_SESSION['CheckInx']);
			unset($_SESSION['CheckInz']);
			unset($_SESSION['CheckOut']);
			unset($_SESSION['CheckOutx']);
			unset($_SESSION['CheckOutz']);
			unset($_SESSION['DocProblem']);
			unset($_SESSION['DocProblemx']);
			unset($_SESSION['DocProblemz']);
			unset($_SESSION['GradMM']);
			unset($_SESSION['Day']);
			unset($_SESSION['Month']);
			unset($_SESSION['Yearx']);
			unset($_SESSION['Yearz']);
			unset($_SESSION['Monthz']);
			unset($_SESSION['Work']);
			unset($_SESSION['Worky']);
			unset($_SESSION['Workx']);
			unset($_SESSION['Workz']);
			unset($_SESSION['PlaceM']);
			unset($_SESSION['PlaceMx']);
			unset($_SESSION['PlaceMz']);
			unset($_SESSION['PositionM']);
			unset($_SESSION['PositionMx']);
			unset($_SESSION['PositionMz']);
			unset($_SESSION['CheckIO']);
			unset($_SESSION['CheckIOx']);
			unset($_SESSION['CheckIOz']);
			unset($_SESSION['SalaryM']);
			unset($_SESSION['SalaryMx']);
			unset($_SESSION['SalaryMz']);
			unset($_SESSION['Freetime']);
			unset($_SESSION['Reason']);
			unset($_SESSION['WorkBefore']);
			unset($_SESSION['PositionBefore']);
			unset($_SESSION['SalaryBefore']);
			unset($_SESSION['Study']);
			unset($_SESSION['School']);
			unset($_SESSION['Department']);
			unset($_SESSION['Dayophets']);
			unset($_SESSION['Monthophets']);
			unset($_SESSION['Yearophets']);
			unset($_SESSION['Salaryophets']);	
			unset($_SESSION['Workingophets']);
			unset($_SESSION['Workingophetsx']);
			unset($_SESSION['Workingophetsz']);
			unset($_SESSION['photo']);
				
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
		
		/* set new Doctor no */
		if ($stmt = $mysqli->prepare("SELECT MAX(DocNo) FROM doctor")) {
			/* execute the prepared statement */
			$stmt -> 	execute();
			
			/* bind results to variables */
			$stmt-> bind_result($result);

			/* fetch results */
			while ($stmt->fetch()) {
				if (empty($result)) 
					$DocNo		=	"D000";
				else 
					$DocNo		=	$result;
			}
			$No = intval(substr($DocNo,1,3)) + 1;						/* get number after D */
			$DocNo 	= 	"D".str_pad($No, 3, "0", STR_PAD_LEFT);		/* concat D and Number */
			
			/* insert doctor into database */
			if ($stmt = $mysqli -> prepare("INSERT INTO doctor(DocNo,Point,DocName,DocSurName,Address,Phone,HomePhone,Birthday,Age,Nation,Citizen
			,Religion,AddressU,AddressZ,FPoint,FatherName,FatherSurname,FJob,MPoint,MotherName,MotherSurname,MJob,DocStatus,GovernmentS,U,UU,UUU
			,UUUU,UUUUU,UUUUUU,BTb,BTv,BTc,BTx,BTz,Talent,WorkPast,WorkPastx,WorkPastz,WorkTime,WorkTimex,WorkTimez,WorkPlace,WorkPlacex,WorkPlacez
			,Position,Positionx,Positionz,CheckIn,CheckInx,CheckInz,CheckOut,CheckOutx,CheckOutz,DocProblem,DocProblemx,DocProblemz,GradMM
			,Day,Month,Yearx,Yearz,Monthz,Work,Worky,Workx,Workz,PlaceM,PlaceMx,PlaceMz,PositionM,PositionMx,PositionMz,CheckIO,CheckIOx
			,CheckIOz,SalaryM,SalaryMx,SalaryMz,Freetime,Reason,WorkBefore,PositionBefore,SalaryBefore,Study,School,Department,Dayophets
			,Monthophets,Yearophets,Salaryophets,Workingophets,Workingophetsx,Workingophetsz) 
											VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
											,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);")) {
				/* bind parameters to '?' */
				/* i = int , d = double and float, b = blob, s = all other types */	
				$stmt	->	bind_param('ssssssssisssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssdddssssdssssssdsss', $DocNo, 
												    $_POST['txtPoint'], 
												    $_POST['txtDocName'],
												    $_POST['txtDocSurName'],
												    $_POST['txtAddress'],
													$_POST['txtPhone'],
											 	   $_POST['txtHomePhone'],
				
				$_POST['txtBirthday'],
				$_POST['txtAge'],
				$_POST['txtNation'],
				$_POST['txtCitizen'],
				$_POST['txtReligion'],
				$_POST['txtAddressU'],
				$_POST['txtAddressZ'],
				$_POST['txtFPoint'],
				$_POST['txtFatherName'],
				$_POST['txtFatherSurname'],
				$_POST['txtFJob'],
				$_POST['txtMPoint'],
				$_POST['txtMotherName'],
				$_POST['txtMotherSurname'],
				$_POST['txtMJob'],
				$_POST['txtDocStatus'],
				$_POST['txtGovernmentS'],
				$_POST['txtU'],
				$_POST['txtUU'],
				$_POST['txtUUU'],
				$_POST['txtUUUU'],
				$_POST['txtUUUUU'],
				$_POST['txtUUUUUU'],
				$_POST['txtBTb'],
				$_POST['txtBTv'],
				$_POST['txtBTc'],
				$_POST['txtBTx'],
				$_POST['txtBTz'],
				$_POST['txtTalent'],
				$_POST['txtWorkPast'],
				$_POST['txtWorkPastx'],
				$_POST['txtWorkPastz'],
				$_POST['txtWorkTime'],
				$_POST['txtWorkTimex'],
				$_POST['txtWorkTimez'],
				$_POST['txtWorkPlace'],
				$_POST['txtWorkPlacex'],
				$_POST['txtWorkPlacez'],
				$_POST['txtPosition'],
				$_POST['txtPositionx'],
				$_POST['txtPositionz'],
				$_POST['txtCheckIn'],
				$_POST['txtCheckInx'],
				$_POST['txtCheckInz'],
				$_POST['txtCheckOut'],
				$_POST['txtCheckOutx'],
				$_POST['txtCheckOutz'],
				$_POST['txtDocProblem'],
				$_POST['txtDocProblemx'],
				$_POST['txtDocProblemz'],
				$_POST['txtGradMM'],
				$_POST['txtDay'],
				$_POST['txtMonth'],
				$_POST['txtYearx'],
				$_POST['txtYearz'],
				$_POST['txtMonthz'],
				$_POST['txtWork'],
				$_POST['txtWorky'],
				$_POST['txtWorkx'],
				$_POST['txtWorkz'],
				$_POST['txtPlaceM'],
				$_POST['txtPlaceMx'],
				$_POST['txtPlaceMz'],
				$_POST['txtPositionM'],
				$_POST['txtPositionMx'],
				$_POST['txtPositionMz'],
				$_POST['txtCheckIO'],
				$_POST['txtCheckIOx'],
				$_POST['txtCheckIOz'],
				$_POST['txtSalaryM'],
				$_POST['txtSalaryMx'],
				$_POST['txtSalaryMz'],
				$_POST['txtFreetime'],
				$_POST['txtReason'],
				$_POST['txtWorkBefore'],
				$_POST['txtPositionBefore'],
				$_POST['txtSalaryBefore'],
				$_POST['txtStudy'],
				$_POST['txtSchool'],
				$_POST['txtDepartment'],
				$_POST['txtDayophets'],
				$_POST['txtMonthophets'],
				$_POST['txtYearophets'],
				$_POST['txtSalaryophets'],
				$_POST['txtWorkingophets'],
				$_POST['txtWorkingophetsx'],
				$_POST['txtWorkingophetsz']); 
													
				/* execute the prepared statement */
				$stmt -> execute();												
						
				/* insert successfully */
				$mysqli -> commit();	
				$stmt -> close();										
				
				/* set NEW mode and clear variable */
				$mode = "NEW";
				unset($_SESSION['Point']);
				unset($_SESSION['DocName']);	
				unset($_SESSION['DocSurName']);
				unset($_SESSION['Address']);
				unset($_SESSION['Phone']);
			unset($_SESSION['HomePhone']);
			
			unset($_SESSION['Birthday']);
			unset($_SESSION['Age']);
			unset($_SESSION['Nation']);
			unset($_SESSION['Citizen']);
			unset($_SESSION['Religion']);
			unset($_SESSION['AddressU']);
			unset($_SESSION['AddressZ']);
			unset($_SESSION['FPoint']);
			unset($_SESSION['FatherName']);
			unset($_SESSION['FatherSurname']);
			unset($_SESSION['FJob']);
			unset($_SESSION['MPoint']);
			unset($_SESSION['MotherName']);
			unset($_SESSION['MotherSurname']);
			unset($_SESSION['MJob']);
			unset($_SESSION['DocStatus']);
			unset($_SESSION['GovernmentS']);
			unset($_SESSION['U']);
			unset($_SESSION['UU']);
			unset($_SESSION['UUU']);
			unset($_SESSION['UUUU']);
			unset($_SESSION['UUUUU']);
			unset($_SESSION['UUUUUU']);
			unset($_SESSION['BTb']);
			unset($_SESSION['BTv']);
			unset($_SESSION['BTc']);
			unset($_SESSION['BTx']);
			unset($_SESSION['BTz']);
			unset($_SESSION['Talent']);
			unset($_SESSION['WorkPast']);
			unset($_SESSION['WorkPastx']);
			unset($_SESSION['WorkPastz']);
			unset($_SESSION['WorkTime']);
			unset($_SESSION['WorkTimex']);
			unset($_SESSION['WorkTimez']);
			unset($_SESSION['WorkPlace']);
			unset($_SESSION['WorkPlacex']);
			unset($_SESSION['WorkPlacez']);
			unset($_SESSION['Position']);
			unset($_SESSION['Positionx']);
			unset($_SESSION['Positionz']);
			unset($_SESSION['CheckIn']);
			unset($_SESSION['CheckInx']);
			unset($_SESSION['CheckInz']);
			unset($_SESSION['CheckOut']);
			unset($_SESSION['CheckOutx']);
			unset($_SESSION['CheckOutz']);
			unset($_SESSION['DocProblem']);
			unset($_SESSION['DocProblemx']);
			unset($_SESSION['DocProblemz']);
			unset($_SESSION['GradMM']);
			unset($_SESSION['Day']);
			unset($_SESSION['Month']);
			unset($_SESSION['Yearx']);
			unset($_SESSION['Yearz']);
			unset($_SESSION['Monthz']);
			unset($_SESSION['Work']);
			unset($_SESSION['Worky']);
			unset($_SESSION['Workx']);
			unset($_SESSION['Workz']);
			unset($_SESSION['PlaceM']);
			unset($_SESSION['PlaceMx']);
			unset($_SESSION['PlaceMz']);
			unset($_SESSION['PositionM']);
			unset($_SESSION['PositionMx']);
			unset($_SESSION['PositionMz']);
			unset($_SESSION['CheckIO']);
			unset($_SESSION['CheckIOx']);
			unset($_SESSION['CheckIOz']);
			unset($_SESSION['SalaryM']);
			unset($_SESSION['SalaryMx']);
			unset($_SESSION['SalaryMz']);
			unset($_SESSION['Freetime']);
			unset($_SESSION['Reason']);
			unset($_SESSION['WorkBefore']);
			unset($_SESSION['PositionBefore']);
			unset($_SESSION['SalaryBefore']);
			unset($_SESSION['Study']);
			unset($_SESSION['School']);
			unset($_SESSION['Department']);
			unset($_SESSION['Dayophets']);
			unset($_SESSION['Monthophets']);
			unset($_SESSION['Yearophets']);
			unset($_SESSION['Salaryophets']);	
			unset($_SESSION['Workingophets']);
			unset($_SESSION['Workingophetsx']);
			unset($_SESSION['Workingophetsz']);
			unset($_SESSION['photo']);
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
		
		/* update doctor in database */
		if ($stmt = $mysqli -> prepare("UPDATE doctor SET Point = ?, DocName = ?, DocSurName = ?, Address = ?, Phone = ? ,HomePhone = ?,Birthday = ?,Age = ?,Nation = ?,Citizen = ?
			,Religion = ?,AddressU = ?,AddressZ = ?,FPoint = ?,FatherName = ?,FatherSurname = ?,FJob = ?,MPoint = ?,MotherName = ?,MotherSurname = ?,MJob = ?,DocStatus = ?,GovernmentS = ?,U = ?,UU = ?,UUU = ?
			,UUUU = ?,UUUUU = ?,UUUUUU = ?,BTb = ?,BTv = ?,BTc = ?,BTx = ?,BTz = ?,Talent = ?,WorkPast = ?,WorkPastx = ?,WorkPastz = ?,WorkTime = ?,WorkTimex= ?,WorkTimez = ?,WorkPlace = ?,WorkPlacex = ?,WorkPlacez = ?
			,Position = ?,Positionx = ?,Positionz = ?,CheckIn = ?,CheckInx = ?,CheckInz = ?,CheckOut = ?,CheckOutx = ?,CheckOutz = ?,DocProblem = ?,DocProblemx = ?,DocProblemz = ?,GradMM = ?
			,Day = ?,Month = ?,Yearx = ?,Yearz = ?,Monthz = ?,Work = ?,Worky = ?,Workx = ?,Workz = ?,PlaceM = ?,PlaceMx = ?,PlaceMz = ?,PositionM = ?,PositionMx = ?,PositionMz = ?,CheckIO = ?,CheckIOx = ?
			,CheckIOz = ?,SalaryM = ?,SalaryMx = ?,SalaryMz = ?,Freetime = ?,Reason = ?,WorkBefore = ?,PositionBefore = ?,SalaryBefore = ?,Study = ?,School = ?,Department = ?,Dayophets = ?
			,Monthophets = ?,Yearophets = ?,Salaryophets = ?,Workingophets = ?,Workingophetsx = ?,Workingophetsz = ?
					  				    WHERE  DocNo=?")) {

			/* bind parameters to '?' */
			/* i = int , d = double and float, b = blob, s = all other types */
			$stmt -> bind_param('sssssssisssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssdddssssdssssssdssss', $_POST['txtPoint'], 
										  $_POST['txtDocName'],
										  $_POST['txtDocSurName'],
									 	  $_POST['txtAddress'],
				 						  $_POST['txtPhone'],
										  $_POST['txtHomePhone'],
				
				$_POST['txtBirthday'],
				$_POST['txtAge'],
				$_POST['txtNation'],
				$_POST['txtCitizen'],
				$_POST['txtReligion'],
				$_POST['txtAddressU'],
				$_POST['txtAddressZ'],
				$_POST['txtFPoint'],
				$_POST['txtFatherName'],
				$_POST['txtFatherSurname'],
				$_POST['txtFJob'],
				$_POST['txtMPoint'],
				$_POST['txtMotherName'],
				$_POST['txtMotherSurname'],
				$_POST['txtMJob'],
				$_POST['txtDocStatus'],
				$_POST['txtGovernmentS'],
				$_POST['txtU'],
				$_POST['txtUU'],
				$_POST['txtUUU'],
				$_POST['txtUUUU'],
				$_POST['txtUUUUU'],
				$_POST['txtUUUUUU'],
				$_POST['txtBTb'],
				$_POST['txtBTv'],
				$_POST['txtBTc'],
				$_POST['txtBTx'],
				$_POST['txtBTz'],
				$_POST['txtTalent'],
				$_POST['txtWorkPast'],
				$_POST['txtWorkPastx'],
				$_POST['txtWorkPastz'],
				$_POST['txtWorkTime'],
				$_POST['txtWorkTimex'],
				$_POST['txtWorkTimez'],
				$_POST['txtWorkPlace'],
				$_POST['txtWorkPlacex'],
				$_POST['txtWorkPlacez'],
				$_POST['txtPosition'],
				$_POST['txtPositionx'],
				$_POST['txtPositionz'],
				$_POST['txtCheckIn'],
				$_POST['txtCheckInx'],
				$_POST['txtCheckInz'],
				$_POST['txtCheckOut'],
				$_POST['txtCheckOutx'],
				$_POST['txtCheckOutz'],
				$_POST['txtDocProblem'],
				$_POST['txtDocProblemx'],
				$_POST['txtDocProblemz'],
				$_POST['txtGradMM'],
				$_POST['txtDay'],
				$_POST['txtMonth'],
				$_POST['txtYearx'],
				$_POST['txtYearz'],
				$_POST['txtMonthz'],
				$_POST['txtWork'],
				$_POST['txtWorky'],
				$_POST['txtWorkx'],
				$_POST['txtWorkz'],
				$_POST['txtPlaceM'],
				$_POST['txtPlaceMx'],
				$_POST['txtPlaceMz'],
				$_POST['txtPositionM'],
				$_POST['txtPositionMx'],
				$_POST['txtPositionMz'],
				$_POST['txtCheckIO'],
				$_POST['txtCheckIOx'],
				$_POST['txtCheckIOz'],
				$_POST['txtSalaryM'],
				$_POST['txtSalaryMx'],
				$_POST['txtSalaryMz'],
				$_POST['txtFreetime'],
				$_POST['txtReason'],
				$_POST['txtWorkBefore'],
				$_POST['txtPositionBefore'],
				$_POST['txtSalaryBefore'],
				$_POST['txtStudy'],
				$_POST['txtSchool'],
				$_POST['txtDepartment'],
				$_POST['txtDayophets'],
				$_POST['txtMonthophets'],
				$_POST['txtYearophets'],
				$_POST['txtSalaryophets'],
				$_POST['txtWorkingophets'],
				$_POST['txtWorkingophetsx'],
				$_POST['txtWorkingophetsz'],
				$DocNo); 
										  
			/* execute the prepared statement */
			$stmt -> execute();		
			
			/* set NEW mode and clear variable */
			$mode = "NEW";
			unset($_SESSION['Point']);
				unset($_SESSION['DocName']);	
				unset($_SESSION['DocSurName']);
				unset($_SESSION['Address']);
				unset($_SESSION['Phone']);
			unset($_SESSION['HomePhone']);
			
			unset($_SESSION['Birthday']);
			unset($_SESSION['Age']);
			unset($_SESSION['Nation']);
			unset($_SESSION['Citizen']);
			unset($_SESSION['Religion']);
			unset($_SESSION['AddressU']);
			unset($_SESSION['AddressZ']);
			unset($_SESSION['FPoint']);
			unset($_SESSION['FatherName']);
			unset($_SESSION['FatherSurname']);
			unset($_SESSION['FJob']);
			unset($_SESSION['MPoint']);
			unset($_SESSION['MotherName']);
			unset($_SESSION['MotherSurname']);
			unset($_SESSION['MJob']);
			unset($_SESSION['DocStatus']);
			unset($_SESSION['GovernmentS']);
			unset($_SESSION['U']);
			unset($_SESSION['UU']);
			unset($_SESSION['UUU']);
			unset($_SESSION['UUUU']);
			unset($_SESSION['UUUUU']);
			unset($_SESSION['UUUUUU']);
			unset($_SESSION['BTb']);
			unset($_SESSION['BTv']);
			unset($_SESSION['BTc']);
			unset($_SESSION['BTx']);
			unset($_SESSION['BTz']);
			unset($_SESSION['Talent']);
			unset($_SESSION['WorkPast']);
			unset($_SESSION['WorkPastx']);
			unset($_SESSION['WorkPastz']);
			unset($_SESSION['WorkTime']);
			unset($_SESSION['WorkTimex']);
			unset($_SESSION['WorkTimez']);
			unset($_SESSION['WorkPlace']);
			unset($_SESSION['WorkPlacex']);
			unset($_SESSION['WorkPlacez']);
			unset($_SESSION['Position']);
			unset($_SESSION['Positionx']);
			unset($_SESSION['Positionz']);
			unset($_SESSION['CheckIn']);
			unset($_SESSION['CheckInx']);
			unset($_SESSION['CheckInz']);
			unset($_SESSION['CheckOut']);
			unset($_SESSION['CheckOutx']);
			unset($_SESSION['CheckOutz']);
			unset($_SESSION['DocProblem']);
			unset($_SESSION['DocProblemx']);
			unset($_SESSION['DocProblemz']);
			unset($_SESSION['GradMM']);
			unset($_SESSION['Day']);
			unset($_SESSION['Month']);
			unset($_SESSION['Yearx']);
			unset($_SESSION['Yearz']);
			unset($_SESSION['Monthz']);
			unset($_SESSION['Work']);
			unset($_SESSION['Worky']);
			unset($_SESSION['Workx']);
			unset($_SESSION['Workz']);
			unset($_SESSION['PlaceM']);
			unset($_SESSION['PlaceMx']);
			unset($_SESSION['PlaceMz']);
			unset($_SESSION['PositionM']);
			unset($_SESSION['PositionMx']);
			unset($_SESSION['PositionMz']);
			unset($_SESSION['CheckIO']);
			unset($_SESSION['CheckIOx']);
			unset($_SESSION['CheckIOz']);
			unset($_SESSION['SalaryM']);
			unset($_SESSION['SalaryMx']);
			unset($_SESSION['SalaryMz']);
			unset($_SESSION['Freetime']);
			unset($_SESSION['Reason']);
			unset($_SESSION['WorkBefore']);
			unset($_SESSION['PositionBefore']);
			unset($_SESSION['SalaryBefore']);
			unset($_SESSION['Study']);
			unset($_SESSION['School']);
			unset($_SESSION['Department']);
			unset($_SESSION['Dayophets']);
			unset($_SESSION['Monthophets']);
			unset($_SESSION['Yearophets']);
			unset($_SESSION['Salaryophets']);	
			unset($_SESSION['Workingophets']);
			unset($_SESSION['Workingophetsx']);
			unset($_SESSION['Workingophetsz']);
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
	/* 4. when click DELETE */
	else if(isset($_POST['btnDelete_x'])){
		
		/* connect database */
		/* $mysqli = new mysqli($host, $username, $password, $database); */
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		$mysqli -> set_charset('utf8');			/* set character */
		$mysqli -> autocommit(false);			/* start transaction */
		
		if ($stmt = $mysqli->prepare("DELETE FROM doctor WHERE DocNo = ?")){
			/* bind parameters to '?' */
			/* i = int , d = double and float, b = blob, s = all other types */
			$stmt	->	bind_param('s',	$_POST['txtDocNo']); 
				
			/* execute the prepared statement */
			$stmt 	-> 	execute();

			/* delete successfully */		
			$mysqli->commit();
				
			/* set NEW mode and clear variable */
			$mode = "NEW";
			unset($_SESSION['Point']);
				unset($_SESSION['DocName']);	
				unset($_SESSION['DocSurName']);
				unset($_SESSION['Address']);
				unset($_SESSION['Phone']);
			unset($_SESSION['HomePhone']);
			
			unset($_SESSION['Birthday']);
			unset($_SESSION['Age']);
			unset($_SESSION['Nation']);
			unset($_SESSION['Citizen']);
			unset($_SESSION['Religion']);
			unset($_SESSION['AddressU']);
			unset($_SESSION['AddressZ']);
			unset($_SESSION['FPoint']);
			unset($_SESSION['FatherName']);
			unset($_SESSION['FatherSurname']);
			unset($_SESSION['FJob']);
			unset($_SESSION['MPoint']);
			unset($_SESSION['MotherName']);
			unset($_SESSION['MotherSurname']);
			unset($_SESSION['MJob']);
			unset($_SESSION['DocStatus']);
			unset($_SESSION['GovernmentS']);
			unset($_SESSION['U']);
			unset($_SESSION['UU']);
			unset($_SESSION['UUU']);
			unset($_SESSION['UUUU']);
			unset($_SESSION['UUUUU']);
			unset($_SESSION['UUUUUU']);
			unset($_SESSION['BTb']);
			unset($_SESSION['BTv']);
			unset($_SESSION['BTc']);
			unset($_SESSION['BTx']);
			unset($_SESSION['BTz']);
			unset($_SESSION['Talent']);
			unset($_SESSION['WorkPast']);
			unset($_SESSION['WorkPastx']);
			unset($_SESSION['WorkPastz']);
			unset($_SESSION['WorkTime']);
			unset($_SESSION['WorkTimex']);
			unset($_SESSION['WorkTimez']);
			unset($_SESSION['WorkPlace']);
			unset($_SESSION['WorkPlacex']);
			unset($_SESSION['WorkPlacez']);
			unset($_SESSION['Position']);
			unset($_SESSION['Positionx']);
			unset($_SESSION['Positionz']);
			unset($_SESSION['CheckIn']);
			unset($_SESSION['CheckInx']);
			unset($_SESSION['CheckInz']);
			unset($_SESSION['CheckOut']);
			unset($_SESSION['CheckOutx']);
			unset($_SESSION['CheckOutz']);
			unset($_SESSION['DocProblem']);
			unset($_SESSION['DocProblemx']);
			unset($_SESSION['DocProblemz']);
			unset($_SESSION['GradMM']);
			unset($_SESSION['Day']);
			unset($_SESSION['Month']);
			unset($_SESSION['Yearx']);
			unset($_SESSION['Yearz']);
			unset($_SESSION['Monthz']);
			unset($_SESSION['Work']);
			unset($_SESSION['Worky']);
			unset($_SESSION['Workx']);
			unset($_SESSION['Workz']);
			unset($_SESSION['PlaceM']);
			unset($_SESSION['PlaceMx']);
			unset($_SESSION['PlaceMz']);
			unset($_SESSION['PositionM']);
			unset($_SESSION['PositionMx']);
			unset($_SESSION['PositionMz']);
			unset($_SESSION['CheckIO']);
			unset($_SESSION['CheckIOx']);
			unset($_SESSION['CheckIOz']);
			unset($_SESSION['SalaryM']);
			unset($_SESSION['SalaryMx']);
			unset($_SESSION['SalaryMz']);
			unset($_SESSION['Freetime']);
			unset($_SESSION['Reason']);
			unset($_SESSION['WorkBefore']);
			unset($_SESSION['PositionBefore']);
			unset($_SESSION['SalaryBefore']);
			unset($_SESSION['Study']);
			unset($_SESSION['School']);
			unset($_SESSION['Department']);
			unset($_SESSION['Dayophets']);
			unset($_SESSION['Monthophets']);
			unset($_SESSION['Yearophets']);
			unset($_SESSION['Salaryophets']);	
			unset($_SESSION['Workingophets']);
			unset($_SESSION['Workingophetsx']);
			unset($_SESSION['Workingophetsz']);
			unset($_SESSION['photo']);
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
	
	/* ---------------------------------------------------------------------------------------------------------------*/
	/* query Doctor detail */
	if($loaded == true){
		$loaded = false;				/* clear load doctor */

		/* SAVE in NEW mode */
		if($mode == "SAVE_NEW"){
			$_SESSION['DocNo'] 	=	$DocNo;			/* $DocNo from 2. */
			$mode = "EDIT";
		}
		else{
			$_SESSION['DocNo'] 	=	$_POST['txtDocNo'];
		}	
		
		/* connect database */
		/* $mysqli = new mysqli($host, $username, $password, $database); */
		$mysqli = new mysqli("localhost", "ophets", "ophets2015", "ophets");
		$mysqli -> set_charset('utf8');			/* set character */
		
		/* select doctor header */
		if ($stmt = $mysqli->prepare(" SELECT *
									   FROM	  doctor 
									   WHERE  DocNo =  ?")) {
			/* bind parameters to '?' */
			/* i = int , d = double and float, b = blob, s = all other types */
			$stmt	->	bind_param('s',$_SESSION['DocNo']); 
			
			/* execute the prepared statement */
			$stmt 	-> 	execute();

			/* bind results to variables */
			$stmt-> bind_result($result1, $result2, $result3, $result4, $result5, $result6, $result7, $result8, $result9, $result10,
			$result11,$result12,$result13,$result14,$result15,$result16,$result17,$result18,$result19,$result20,$result21,$result22,
			$result23,$result24,$result25,$result26,$result27,$result28,$result29,$result30,$result31,$result32,$result33,$result34,
			$result35,$result36,$result37,$result38,$result39,$result40,$result41,$result42,$result43,$result44,$result45,$result46,
			$result47,$result48,$result49,$result50,$result51,$result52,$result53,$result54,$result55,$result56,$result57,$result58,
			$result59,$result60,$result61,$result62,$result63,$result64,$result65,$result66,$result67,$result68,$result69,$result70,
			$result71,$result72,$result73,$result74,$result75,$result76,$result77,$result78,$result79,$result80,$result81,$result82,
			$result83,$result84,$result85,$result86,$result87,$result88,$result89,$result90,$result91,$result92,$result93,$result94,$result95);
			
			/* fetch values */
			while ($stmt->fetch()) {
				$_SESSION['DocNo']	  	 =	$result1;
				$_SESSION['Point']		 =	$result2;
				$_SESSION['DocName']	   =	$result3;
				$_SESSION['DocSurName']	=	$result4;
				$_SESSION['Address']	   =	$result5;
				$_SESSION['Phone']		 =	$result6;
				$_SESSION['HomePhone']	 =	$result7;
				$_SESSION['Birthday']	  =	$result8;
				$_SESSION['Age']		   =	$result9;
				$_SESSION['Nation']		=	$result10;
				$_SESSION['Citizen']	   =	$result11;
				$_SESSION['Religion']	  =	$result12;
				$_SESSION['AddressU']	=	$result13;
				$_SESSION['AddressZ']	=	$result14;
				$_SESSION['FPoint']	=	$result15;
				$_SESSION['FatherName']	=	$result16;
				$_SESSION['FatherSurname']	=	$result17;
				$_SESSION['FJob']	=	$result18;
				$_SESSION['MPoint']	=	$result19;
				$_SESSION['MotherName']	=	$result20;
				$_SESSION['MotherSurname']	  	 =	$result21;
				$_SESSION['MJob']		 =	$result22;
				$_SESSION['DocStatus']	   =	$result23;
				$_SESSION['GovernmentS']	=	$result24;
				$_SESSION['U']	=	$result25;
				$_SESSION['UU']	=	$result26;
				$_SESSION['UUU']	=	$result27;
				$_SESSION['UUUU']	=	$result28;
				$_SESSION['UUUUU']	=	$result29;
				$_SESSION['UUUUUU']	=	$result30;
				$_SESSION['BTb']	=	$result31;
				$_SESSION['BTv']	=	$result32;
				$_SESSION['BTc']	=	$result33;
				$_SESSION['BTx']	=	$result34;
				$_SESSION['BTz']	=	$result35;
				$_SESSION['Talent']	=	$result36;
				$_SESSION['WorkPast']	=	$result37;
				$_SESSION['WorkPastx']	=	$result38;
				$_SESSION['WorkPastz']	=	$result39;
				$_SESSION['WorkTime']	=	$result40;
				$_SESSION['WorkTimex']	  	 =	$result41;
				$_SESSION['WorkTimez']		 =	$result42;
				$_SESSION['WorkPlace']	   =	$result43;
				$_SESSION['WorkPlacex']	=	$result44;
				$_SESSION['WorkPlacez']	=	$result45;
				$_SESSION['Position']	=	$result46;
				$_SESSION['Positionx']	=	$resul47;
				$_SESSION['Positionz']	=	$result48;
				$_SESSION['CheckIn']	=	$result49;
				$_SESSION['CheckInx']	=	$result50;
				$_SESSION['CheckInz']	=	$result51;
				$_SESSION['CheckOut']	=	$result52;
				$_SESSION['CheckOutx']	=	$result53;
				$_SESSION['CheckOutz']	=	$result54;
				$_SESSION['DocProblem']	=	$result55;
				$_SESSION['DocProblemx']	=	$result56;
				$_SESSION['DocProblemz']	=	$result57;
				$_SESSION['GradMM']	=	$result58;
				$_SESSION['Day']	=	$result59;
				$_SESSION['Month']	=	$result60;
				$_SESSION['Yearx']	  	 =	$result61;
				$_SESSION['Yearz']		 =	$result62;
				$_SESSION['Monthz']	   =	$result63;
				$_SESSION['Work']	=	$result64;
				$_SESSION['Worky']	=	$result65;
				$_SESSION['Workx']	=	$result66;
				$_SESSION['Workz']	=	$result67;
				$_SESSION['PlaceM']	=	$result68;
				$_SESSION['PlaceMx']	=	$result69;
				$_SESSION['PlaceMz']	=	$result70;
				$_SESSION['PositionM']	=	$result71;
				$_SESSION['PositionMx']	=	$result72;
				$_SESSION['PositionMz']	=	$result73;
				$_SESSION['CheckIO']	=	$result74;
				$_SESSION['CheckIOx']	=	$result75;
				$_SESSION['CheckIOz']	=	$result76;
				$_SESSION['SalaryM']	=	$result77;
				$_SESSION['SalaryMx']	=	$result78;
				$_SESSION['SalaryMz']	=	$result79;
				$_SESSION['Freetime']	=	$result80;
				$_SESSION['Reason']	=	$result81;
				$_SESSION['WorkBefore']	=	$result82;
				$_SESSION['PositionBefore']	=	$result83;
				$_SESSION['SalaryBefore']	=	$result84;
				$_SESSION['Study']	=	$result85;
				$_SESSION['School']	=	$result86;
				$_SESSION['Department']	=	$result87;
				$_SESSION['Dayophets']	=	$result88;
				$_SESSION['Monthophets']	=	$result89;
				$_SESSION['Yearophets']	=	$result90;
				$_SESSION['Salaryophets']	=	$result91;
				$_SESSION['Workingophets']	=	$result92;
				$_SESSION['Workingophetsx']	=	$result93;
				$_SESSION['Workingophetsz']	=	$result94;
				$_SESSION['photo']	=	$result95;
				
				
			}
		}
	}	
	
	/* set textbox Doctor No */
	/* display 'NEW' when mode = NEW */
	if($mode == "NEW"){
		$_SESSION['DocNo'] 	= "NEW";
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
	function GoHome(){
		window.open("HomePage.php");
		window.close();
		return false;
	}
	
	//$(function () {
    //          $('#txtBirthday').datepicker({ dateFormat: 'yy/mm/dd' });
    //  });
 
    function getListOfValue(dataArray,table,mode) {	
		/* get value from Doctor list */
       	if (table == "doctor") {
         	document.getElementById('txtDocNo').disabled = false;
     		document.getElementById('txtDocNo').value = dataArray[0];
			setDirtyBit('CLEAR');
			
			setMode(mode);
			document.getElementById('loaded').value = true;
     	}
		else if (table == "status") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtDocStatus').value = dataArray[0];
    	} 
		else if (table == "government") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtGovernmentS').value = dataArray[0];
    	} 
		else if (table == "workophets") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtWorkingophets').value = dataArray[0];
    	} 
		else if (table == "workophetsx") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtWorkingophetsx').value = dataArray[0];
    	} 
		else if (table == "workophetsz") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtWorkingophetsz').value = dataArray[0];
    	} 
		else if (table == "workexp") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtWork').value = dataArray[0];
    	} 
		else if (table == "workexpx") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtWorky').value = dataArray[0];
    	} 
		else if (table == "workexpz") {
			setDirtyBit('DIRTY');			
			document.getElementById('txtWorkx').value = dataArray[0];
    	} 
		formDoctor.submit();
    }

	function openListOfValue(mode, table, initSQL, columnname, headname){
		window.open("listofvalue.php?mode="+mode+"&table="+table+"&initSQL="+initSQL+"&columnname="+columnname+"&headname="+headname,"popup","width=600,height=350");
	}

	function checkDirty(button) {
	 	var DirtyBit = document.getElementById('DirtyBit').value;
     	var strConfirm;

		if (DirtyBit == "DIRTY") {
			if (button == "NEW") {
            	strConfirm = "ยังไม่ได้ทำการจัดเก็บข้อมูล ยืนยันการเพิ่มผู้บำบัดใหม่?";
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
		else if(document.getElementById('txtDocName').value == '' || document.getElementById('txtDocName').value == ' '){
 				alert("กรุณาใส่ชื่อผู้บำบัด");
				document.getElementById('txtDocName').focus();
				return false;
		}
		else if(document.getElementById('txtDocSurName').value == '' || document.getElementById('txtDocSurName').value == ' '){
 				alert("กรุณาใส่นามสกุลผู้บำบัด");
				document.getElementById('txtDocSurName').focus();
				return false;
		}
		else if(document.getElementById('txtAddress').value == '' || document.getElementById('txtAddress').value == ' '){
 				alert("กรุณาใส่ที่อยู่ผู้บำบัด");
				document.getElementById('txtAddress').focus();
				return false;
		}
		else if(document.getElementById('txtPhone').value == '' || document.getElementById('txtPhone').value == ' ' || document.getElementById('txtPhone').value%1 !== 0){
 				alert("กรุณาใส่เบอร์โทรผู้บำบัด");
				document.getElementById('txtPhone').focus();
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
	
	function checkDelete(){	    
  		var txtdocNo = document.getElementById("txtDocNo").value;
 		if (txtdocNo == '' || txtdocNo == "NEW") {
       		alert("กรุณาเลื่อกผู้บำบัดที่ต้องการลบ");
			return false;
		}
   		else {
			if (confirm("ยืนยันการลบผู้บำบัดหมายเลข "+txtdocNo)){
				setMode('DELETE');
				setDirtyBit('CLEAR');
				return true;
			}
			else{
				return false;
			}
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
textarea {
//    border: none;
//    background-color: transparent;
   resize: none;
//    outline: none;
      opacity: 1;
}
#main {
    position: relative;
    margin: 0 auto;
    width: 1500px;
    text-align: left;
    color: #050505;
	
}
body {
                background-image: url(image/sss.jpg);
                background-color: #FFFFFF;
                opacity:1;
				width: 1870px;
				height:1900px;
            }
			#middle {
    background: #FBFBF5 url(images/middle.gif) repeat-y;
	border:solid;
}
#header {   
			 	height: 134px;
				color: #FFFFFF;
   			 	background: #034E85 url(images/header.jpg) no-repeat;
				border:none;	
			}
			h1 {
	padding: 30px 0 0 45px;
	font-size: 2.5em;
	letter-spacing: 2px;
	color: #000;
}
</style>

<title>Doctor Form</title>
</head>

<body>
<form id="formDoctor" name="formDoctor" method="post" action="">
<div id="main">
	<div id="้header">
    <h1>&nbsp;</h1>
    <!-------------------------- Menu -->
	<table width="100%" border="none" cellpadding="0" cellspacing="0">
    <tr>
        <!-------------------------- NEW -->
	    <!-- onclick: set mode = NEW, set dirty bit -->
		<td align="center" class="border">
        	<input name="btnNew" type="image" src="image/btnNew.png" 
             onclick="javascript: if (checkDirty('NEW')) { setMode('NEW'); setDirtyBit('CLEAR'); return true;} else { return false;}" />
	        <div class="text_menu"><label><?=$label['lbNew']?></label></div>
        </td>
        <!-------------------------- EDIT -->
        <!-- onclick: open doctor list -->
        <td align="center" class="border">
        	<input name="btnEdit" type="image" src="image/btnEdit.png" 
             onclick="javascript: if(checkDirty('EDIT')){ 
             openListOfValue('EDIT','doctor','Select DocNo, DocName, DocSurName From doctor WHERE (1=1)','DocNo, DocName, DocSurName','หมายเลข, ชื่อ, นามสกุล');  	 			        	   return false; } 
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
        <!-------------------------- DELETE -->
        <!-- onclick: check before delete -->
        <td align="center" class="border">
        	<input name="btnDelete" type="image" src="image/btnDelete.png" onclick="javascript: return checkDelete();" />
	        <div class="text_menu"><label><?=$label['lbDelete']?></label></div>
        </td>
        <td width="100%" align="right"><h1>ประวัติ ผู้บำบัด</h1></td>
    </tr>
    </table>
	</div>

    <!-------------------------- Header -->
    <div id="middle" style="height:1900px" >
    <div id="middle2">
    <div id="middle3">
      <table width="1870" border="0" cellpadding="0" cellspacing="0">
        <tr height="32">
          <!-- doctor No: read only -->
          <td width="166"><label>
            <?=$label['lbDocNo']?>
          </label>
            :</td>
          <td width="1157"><input name="txtDocNo" type="text" class="disabled" id="txtDocNo"
                       value="<?=$_SESSION['DocNo']?>" size="10" readonly="readonly"; /></td>
          <td width="547">&nbsp;</td>
        </tr>
        <tr height="32">
          <!-- Doctor Name -->
          <!-- onchange: set dirty bit -->
          <td width="166"><label>
            <?=$label['lbName']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtPoint" type="text" id="txtPoint" mexlength="10"
        				   onchange="javascript: setDirtyBit('DIRTY');"  
				           value="<?=$_SESSION['Point']?>" size="8" />
            <input name="txtDocName" type="text" id="txtDocName" mexlength="50"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['DocName']?>" size="15" /> 
            -
            <input name="txtDocSurName" type="text" id="txtDocSurName" mexlength="50"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['DocSurName']?>" size="20" /></td>
          <td rowspan="5" nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbAddress']?>
          </label>
:</td>
          <td nowrap="nowrap"><input name="txtAddress" type="text" id="txtAddress" mexlength="50"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['Address']?>" size="60" /></td>
          </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbHPhone']?>
          </label>
:</td>
          <td nowrap="nowrap"><input name="txtHomePhone" type="text" id="txtHomePhone" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['HomePhone']?>" size="8" />
  <?=$label['lbCPhone']?>
:
<input name="txtPhone" type="text" id="txtPhone" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Phone']?>" size="8" /></td>
          </tr>
        <tr height="32">
          <td><p>&nbsp;</p></td>
          <td nowrap="nowrap">&nbsp;</td>
          </tr>
        <tr height="32">
          <td height="46"><p>&nbsp;</p></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbAddress1']?>
            </label>
            :</td>
          <td nowrap="nowrap"><input name="txtAddressU" type="text" id="txtAddressU" mexlength="50"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['AddressU']?>" size="60" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbAddress2']?>
          </label>
:</td>
          <td nowrap="nowrap"><input name="txtAddressZ" type="text" id="txtAddressZ" mexlength="50"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['AddressZ']?>" size="60" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbBirthday']?>
          </label>
:</td>
          <td nowrap="nowrap"><input name="txtBirthday" type="text" id="txtBirthday" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Birthday']?>" size="8" />
            <label>
              <?=$label['lbAge']?>
            </label>
:
<input name="txtAge" type="text" id="txtAge" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Age']?>" size="8" />
<?=$label['lbYear']?></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbThai1']?>
          </label>
:
<label>
  <input name="txtNation" type="text" id="txtNation" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Nation']?>" size="8" />
  <?=$label['lbThai2']?>
</label>
:
<input name="txtCitizen" type="text" id="txtCitizen" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Citizen']?>" size="8" />
<?=$label['lbThai3']?>
:
<input name="txtReligion" type="text" id="txtReligion" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Religion']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbDad']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtFPoint" type="text" id="txtFPoint" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['FPoint']?>" size="8" />
            <input name="txtFatherName" type="text" id="txtFatherName" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['FatherName']?>" size="8" />
            <input name="txtFatherSurname" type="text" id="txtFatherSurname" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['FatherSurname']?>" size="8" />
            <label>
              <?=$label['lbJob']?>
            </label>
:
<input name="txtFJob" type="text" id="txtFJob" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['FJob']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbMom']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtMPoint" type="text" id="txtMPoint" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['MPoint']?>" size="8" />
            <input name="txtMotherName" type="text" id="txtMotherName" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['MotherName']?>" size="8" />
            <input name="txtMotherSurname" type="text" id="txtMotherSurname" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['MotherSurname']?>" size="8" />
            <label>
              <?=$label['lbJob']?>
            </label>
:
<input name="txtMJob" type="text" id="txtMJob" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['MJob']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbStatus']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtDocStatus" type="text" id="txtDocStatus" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['DocStatus']?>" size="10" />
            <input type="image" name="btnGetCustomer" src="image/btnSearch.png" width="20px" 
                 onclick = "javascript: openListOfValue('','status','Select DocStatus From status WHERE (1=1)','DocStatus','สถานภาพการสมรส');
                 						return false;"/></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbSod']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtGovernmentS" type="text" id="txtGovernmentS" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['GovernmentS']?>" size="10" />
            <input type="image" name="btnGetCustomer2" src="image/btnSearch.png" width="20px" 
                 onclick = "javascript: openListOfValue('','government','Select GovernmentS From government WHERE (1=1)','GovernmentS','การรับราชการทหาร');
                 						return false;"/></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbGrade']?>
          </label>
            :</td>
          <td nowrap="nowrap">&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbU1']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtU" type="text" id="txtU" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['U']?>" size="8" />
            <label>
              <?=$label['lbBT']?>
            </label>
:
<input name="txtBTb" type="text" id="txtBTb" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['BTb']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbU2']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtUU" type="text" id="txtUU" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['UU']?>" size="8" />
            <label>
              <?=$label['lbBT']?>
            </label>
:
<input name="txtBTv" type="text" id="txtBTv" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['BTv']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbU3']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtUUU" type="text" id="txtUUU" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['UUU']?>" size="8" />
            <label>
              <?=$label['lbBT']?>
            </label>
:
<input name="txtBTc" type="text" id="txtBTc" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['BTc']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbU4']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtUUUU" type="text" id="txtUUUU" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['UUUU']?>" size="8" />
            <label>
              <?=$label['lbBT']?>
            </label>
:
<input name="txtBTx" type="text" id="txtBTx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['BTx']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbU5']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtUUUUU" type="text" id="txtUUUUU" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['UUUUU']?>" size="8" />
            <label>
              <?=$label['lbBT']?>
            </label>
:
<input name="txtBTz" type="text" id="txtBTz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['BTz']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbU6']?>
          </label>
            :</td>
          <td nowrap="nowrap"><input name="txtUUUUUU" type="text" id="txtUUUUUU" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['UUUUUU']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbTalent']?>
            </label>
            :</td>
          <td nowrap="nowrap"><input name="txtTalent" type="text" id="txtTalent" mexlength="50"
        				   onchange="javascript: setDirtyBit('DIRTY');" 
				           value="<?=$_SESSION['Talent']?>" size="60" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbPast']?>
            </label>
            :</td>
          <td nowrap="nowrap"><input name="txtWorkPast" type="text" id="txtWorkPast" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkPast']?>" size="30" />
            <label>
              <?=$label['lbTime1']?>
              </label>
            :
  <input name="txtWorkTime" type="text" id="txtWorkTime" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkTime']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><input name="txtWorkPastx" type="text" id="txtWorkPastx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkPastx']?>" size="30" />
            <label>
              <?=$label['lbTime1']?>
            </label>
:
<input name="txtWorkTimex" type="text" id="txtWorkTimex" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkTimex']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><input name="txtWorkPastz" type="text" id="txtWorkPastz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkPastz']?>" size="30" />
            <label>
              <?=$label['lbTime1']?>
            </label>
:
<input name="txtWorkTimez" type="text" id="txtWorkTimez" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkTimez']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td><label>
            <?=$label['lbPast1']?>
          </label>
            :</td>
          <td nowrap="nowrap">&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbPastM']?>
          </label>
:</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbPlaceM']?>
          </label>
:
<input name="txtWorkPlace" type="text" id="txtWorkPlace" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkPlace']?>" size="30" />
<label>
  <?=$label['lbMM']?>
</label>
:
<input name="txtPosition" type="text" id="txtPosition" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Position']?>" size="8" />
<label>
  <?=$label['lbCheckIn']?>
</label>
:
<input name="txtCheckIn" type="text" id="txtCheckIn" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['CheckIn']?>" size="8" />
<label>
  <?=$label['lbCheckOut']?>
</label>
:
<input name="txtCheckOut" type="text" id="txtCheckOut" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['CheckOut']?>" size="8" />
<label>
  <?=$label['lbProblemM']?>
</label>
:
<input name="txtDocProblem" type="text" id="txtDocProblem" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['DocProblem']?>" size="30" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbPlaceM']?>
          </label>
:
<input name="txtWorkPlacex" type="text" id="txtWorkPlacex" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkPlacex']?>" size="30" />
<label>
  <?=$label['lbMM']?>
</label>
:
<input name="txtPositionx" type="text" id="txtPositionx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Positionx']?>" size="8" />
<label>
  <?=$label['lbCheckIn']?>
</label>
:
<input name="txtCheckInx" type="text" id="txtCheckInx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['CheckInx']?>" size="8" />
<label>
  <?=$label['lbCheckOut']?>
</label>
:
<input name="txtCheckOutx" type="text" id="txtCheckOutx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['CheckOutx']?>" size="8" />
<label>
  <?=$label['lbProblemM']?>
</label>
:
<input name="txtDocProblemx" type="text" id="txtDocProblemx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['DocProblemx']?>" size="30" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbPlaceM']?>
          </label>
:
<input name="txtWorkPlacez" type="text" id="txtWorkPlacez" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkPlacez']?>" size="30" />
<label>
  <?=$label['lbMM']?>
</label>
:
<input name="txtPositionz" type="text" id="txtPositionz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Positionz']?>" size="8" />
<label>
  <?=$label['lbCheckIn']?>
</label>
:
<input name="txtCheckInz" type="text" id="txtCheckInz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['CheckInz']?>" size="8" />
<label>
  <?=$label['lbCheckOut']?>
</label>
:
<input name="txtCheckOutz" type="text" id="txtCheckOutz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['CheckOutz']?>" size="8" />
<label>
  <?=$label['lbProblemM']?>
</label>
:
<input name="txtDocProblemz" type="text" id="txtDocProblemz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['DocProblemz']?>" size="30" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbGraMM']?>
          </label>
:
<input name="txtGradMM" type="text" id="txtGradMM" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['GradMM']?>" size="90" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbFinish']?>
          </label>
            <label>
              <?=$label['lbDay']?>
            </label>
            <input name="txtDay" type="text" id="txtDay" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Day']?>" size="8" />
            <?=$label['lbMonth']?>
            <input name="txtMonth" type="text" id="txtMonth" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Month']?>" size="8" />
            <?=$label['lbYear1']?>
            <input name="txtYearx" type="text" id="txtYearx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Yearx']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbEXP']?>
          </label>
:
<input name="txtYearz" type="text" id="txtYearz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Yearz']?>" size="8" />
<?=$label['lbYear']?>

<input name="txtMonthz" type="text" id="txtMonthz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Monthz']?>" size="8" />
<?=$label['lbMonth']?></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap">
          <label>
            <?=$label['lbWork']?>
          </label>
:


<input name="txtWork" type="text" id="txtWork" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Work']?>" size="30" />
<label>
  <?=$label['lbOther']?>
</label>
:
<input name="txtWorkz" type="text" id="txtWorkz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Workz']?>" size="30" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbEXPO']?>
          </label>
:</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbPlaceM']?>
          </label>
:
<input name="txtPlaceM" type="text" id="txtPlaceM" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['PlaceM']?>" size="8" />
<label>
  <?=$label['lbMM']?>
</label>
:
<input name="txtPositionM" type="text" id="txtPositionM" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['PositionM']?>" size="8" />
<label>
  <?=$label['lbCheckIO']?>
</label>
:
<input name="txtCheckIO" type="text" id="txtCheckIO" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['CheckIO']?>" size="8" />
<label>
  <?=$label['lbSalary']?>
</label>
:
<input name="txtSalaryM" type="text" id="txtSalaryM" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['SalaryM']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbPlaceM']?>
          </label>
:
<input name="txtPlaceMx" type="text" id="txtPlaceMx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['PlaceMx']?>" size="8" />
<label>
  <?=$label['lbMM']?>
</label>
:
<input name="txtPositionMx" type="text" id="txtPositionMx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['PositionMx']?>" size="8" />
<label>
  <?=$label['lbCheckIO']?>
</label>
:
<input name="txtCheckIOx" type="text" id="txtCheckIOx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['CheckIOx']?>" size="8" />
<label>
  <?=$label['lbSalary']?>
</label>
:
<input name="txtSalaryMx" type="text" id="txtSalaryMx" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['SalaryMx']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbPlaceM']?>
          </label>
:
<input name="txtPlaceMz" type="text" id="txtPlaceMz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['PlaceMz']?>" size="8" />
<label>
  <?=$label['lbMM']?>
</label>
:
<input name="txtPositionMz" type="text" id="txtPositionMz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['PositionMz']?>" size="8" />
<label>
  <?=$label['lbCheckIO']?>
</label>
:
<input name="txtCheckIOz" type="text" id="txtCheckIOz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['CheckIOz']?>" size="8" />
<label>
  <?=$label['lbSalary']?>
</label>
:
<input name="txtSalaryMz" type="text" id="txtSalaryMz" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['SalaryMz']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td colspan="3"><label>
            <?=$label['lbStatusB']?>
            </label>
            :</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lb1']?>
            <?=$label['lbWang']?>
          </label>
            <label>
              <?=$label['lbTT']?>
            </label>
:
<input name="txtFreetime" type="text" id="txtFreetime" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Freetime']?>" size="8" />
<label>
  <?=$label['lbSWang']?>
</label>
:
<input name="txtReason" type="text" id="txtReason" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Reason']?>" size="70" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><?=$label['lb2']?>
            <label>
              <?=$label['lbWorkM']?>
            </label>
:
<input name="txtWorkBefore" type="text" id="txtWorkBefore" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['WorkBefore']?>" size="30" />
<label>
  <?=$label['lbMM']?>
</label>
:
<input name="txtPositionBefore" type="text" id="txtPositionBefore" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['PositionBefore']?>" size="8" />
<label>
  <?=$label['lbSalary']?>
</label>
:
<input name="txtSalaryBefore" type="text" id="txtSalaryBefore" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['SalaryBefore']?>" size="8" />
<?=$label['lbBaht']?></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><?=$label['lb3']?>
            <label>
              <?=$label['lbStu']?>
            </label>
:
<input name="txtStudy" type="text" id="txtStudy" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Study']?>" size="30" />
<label>
  <?=$label['lbStuP']?>
</label>
:
<input name="txtSchool" type="text" id="txtSchool" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['School']?>" size="30" />
<label>
  <?=$label['lbStuD']?>
</label>
:
<input name="txtDepartment" type="text" id="txtDepartment" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Department']?>" size="30" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td colspan="3"><label>
            <?=$label['lbStatusBB']?>
          </label>
            :</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbStart']?>
            <?=$label['lbDay']?>
          </label>
            <input name="txtDayophets" type="text" id="txtDayophets" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Dayophets']?>" size="8" />
            <?=$label['lbMonth']?>
            <input name="txtMonthophets" type="text" id="txtMonthophets" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Monthophets']?>" size="8" />
            <?=$label['lbYear1']?>
            <input name="txtYearophets" type="text" id="txtYearophets" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Yearophets']?>" size="8" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap"><label>
            <?=$label['lbSalaryA']?>
          </label>
:
<input name="txtSalaryophets" type="text" id="txtSalaryophets" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Salaryophets']?>" size="8" />
<?=$label['lbBaht']?></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        <tr height="32">
          <td>&nbsp;</td>
          <td nowrap="nowrap">
          	<label>
            <?=$label['lbWorkF']?>
            </label>
            :
            <input name="txtWorkingophets" type="text" id="txtWorkingophets" mexlength="10"
        					 onchange="javascript: setDirtyBit('DIRTY');" 
				           	 value="<?=$_SESSION['Workingophets']?>" size="30" /></td>
          <td nowrap="nowrap">&nbsp;</td>
        </tr>
        </table>
      <table width="1729" border="0" cellpadding="0" cellspacing="0">
        <tr>
	    <td width="554">&nbsp;</td>
	    <td width="823">&nbsp;</td>
	    <td width="352"><p>&nbsp;</p>
	      <p>&nbsp;</p>
	      <p>
	        <a href="HomePage.php"><img src="image/Home.png"></a>
	        </p>
	      <p>&nbsp;</p>
	      <p>&nbsp;</p>
	      <p>&nbsp;</p>
	      <p>&nbsp;</p>
	      <p>&nbsp;</p>
        </td>
      </tr>
  </table>
    </div>      
    </div>
	</div><a href="logout.php">Logout</a>

    <!-------------------------- Hidden Field -->
	<input name="DirtyBit" id="DirtyBit" type="hidden" value="<?=$DirtyBit?>" />
    <input name="mode" id="mode" type="hidden" value="<?=$mode?>" />

    <input name="loaded" id="loaded" type="hidden" value="<?=$loaded?>" /> 

</div>   
</form>
</body>
</html>
