<?php
	
	ini_set('display_errors', 1);
	error_reporting(~0);

	/*$serverName	  = "localhost";
	$userName	  = "root";
	$userPassword	  = "12345";
	$dbName	  = "ophets";*/
	
	$serverName	  = "localhost";
	$userName	  = "ophets";
	$userPassword	  = "ophets2015";
	$dbName	  = "ophets";
	mysql_query("SET NAMES utf8"); 
	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}

	//*** Reject user not online
	$intRejectTime = 20; // Minute
	$sql = "UPDATE member SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00'  WHERE 1 AND DATE_ADD(LastUpdate, INTERVAL $intRejectTime MINUTE) <= NOW() ";
	$query = mysqli_query($con,$sql);

?>