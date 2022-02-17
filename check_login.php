<?php
	session_start();

	require_once("connect.php");
	
	$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);	

	$strSQL = "SELECT * FROM member WHERE Username = '".$strUsername."' 
	and Password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	
	if($strUsername == "") {                    
echo "คุณยังไม่ได้กรอกชื่อผู้ใช้ครับ";
} else if($strPassword == "") {        
echo "คุณยังไม่ได้กรอกรหัสผ่านครับ";
} else {                                               
include("connect.php");           

}
	if(!$objResult)
	{
		echo "Username and Password Incorrect!";
		echo "<br /><a href='index.php'>Back</a>";
		exit();
	}
	else
	{
		if($objResult["LoginStatus"] == "1")
		{
			echo "'".$strUsername."' Exists login!";
			
			echo "<br> Go to <a href='logout.php'>Logout</a>";
			
		}
		else
		{
			//*** Update Status Login
			$sql = "UPDATE member SET LoginStatus = '1' , LastUpdate = NOW() WHERE UserID = '".$objResult["UserID"]."' ";
			$query = mysqli_query($con,$sql);

			//*** Session
			$_SESSION["UserID"] = $objResult["UserID"];
			session_write_close();

			//*** Go to Main page
			if($objResult["status_user"] == "admin")
		{
			echo "<meta http-equiv='refresh' content='1;URL=HomePage1.php'>";
		}
		else if($objResult["status_user"] == "user")
		{
			echo "<meta http-equiv='refresh' content='1;URL=HomePage.php'>";
		}
		else
		{
			echo "<meta http-equiv='refresh' content='1;URL=HomePage2.php'>";	
		}
			//header("location:Homepage1.php");
		}
			
	}
	mysqli_close($con);
?>
