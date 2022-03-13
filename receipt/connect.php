<?php
date_default_timezone_set('Asia/Bangkok');

	ini_set('short_open_tag', 'on');
	error_reporting(E_ALL & ~E_NOTICE);

	$serverName	  = "localhost";

	if($_SERVER['HTTP_HOST'] == 'localhost' or $_SERVER['HTTP_HOST'] == '127.0.0.1'){
		$userName	  = "root";
		$userPassword	  = "12345678";
	}else{
		$userName	  = "ophets";
		$userPassword	  = "ophets2015";
	}

	$dbName	  = "ophets";
	 
	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_query($con, "SET SESSION sql_mode=''");
	mysqli_set_charset($con, "utf8");

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