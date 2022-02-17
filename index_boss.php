<?php
session_start(); //เปิด session
$ses_userid =$_SESSION[ses_userid];             //สร้าง session สำหรับเก็บค่า ID
$ses_username = $_SESSION[ses_username];        //สร้าง session สำหรับเก็บค่า username
//ตรวจสอบว่าทำการ Login เข้าสู่ระบบมารึยัง
if($ses_userid <> session_id() or $ses_username ==""){
echo "Please Login to system<br />";
}
 
//ตรวจสอบสถานะว่าใช่ admin รึเปล่า ถ้าไม่ใช่ให้หยุดอยู่แค่นี้
if($_SESSION[ses_status] != "boss") {
echo "This page for Admin only!";
echo "<a href=index.php>Back</a>";
exit();
}
?>