<?php
	mysql_connect("localhost","ophets","ophets2015");
	//mysql_connect("localhost","root","12345");
	mysql_select_db("ophets");
	
	if(trim($_POST["txtUsername"]) == "")
	{
		echo "Please input Username!";
		exit();	
	}
	
	if(trim($_POST["txtPassword"]) == "")
	{
		echo "Please input Password!";
		exit();	
	}	
		
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "Password not Match!";
		exit();
	}
	
	if(trim($_POST["txtName"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}	
	
	$strSQL = "SELECT * FROM member WHERE username = '".trim($_POST['txtUsername'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		
		$strSQL = "INSERT INTO member (username,password,name,status_user) VALUES ('".$_POST["txtUsername"]."', 
		'".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["ddlStatus"]."')";
		$objQuery = mysql_query($strSQL);
		
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='index.php'>Login page</a>";
		
		echo "<br> Go to <a href='logout.php'>Logout</a>";
		
		echo "<br> Go to <a href='Homepage1.php'>Homepage</a>";
		
	}

	mysql_close();
?>
