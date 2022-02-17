<?php
session_start(); 
$ses_userid =$_SESSION[ses_userid];             
$ses_username = $_SESSION[ses_username];        
if($ses_userid <> session_id() or $ses_username ==""){
echo "Please Login to system<br />";
}
 
if($_SESSION[ses_status] != "user") {
echo "This page for Admin only!";
echo "<a href=index.php>Back</a>";
exit();
}
?>