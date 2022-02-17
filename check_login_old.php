<?php
//session_start(); 
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

$username = $_POST[username];

$password = $_POST[password];

if($username == "") {                    
echo "คุณยังไม่ได้กรอกชื่อผู้ใช้ครับ";
} else if($password == "") {        
echo "คุณยังไม่ได้กรอกรหัสผ่านครับ";
} else {                                               
include("db.php");           
$check_log =
mysql_query("select * from member where username ='$username' and password ='$password' ");                           
$num = mysql_num_rows($check_log);

if($num <=0) {                                                           
echo "Username หรือ Password อาจจะผิดกรุณา Login ใหม่อีกครั้ง <br /><a href='index.php'>Back</a>";
} else {
while ($data = mysql_fetch_array($check_log) ) {

if($data[status_user]==admin){                       
echo "Hi Welcome Back Admin<br />";           
$_SESSION[ses_userid] = session_id();           
$_SESSION[ses_username] = $username;      
$_SESSION[ses_status] = "admin";                      
echo "<meta http-equiv='refresh' content='1;URL=HomePage1.php'>";

echo "waiting..............................";
}elseif($data[status_user]==user){                              
$_SESSION[ses_userid] = session_id();                      
$_SESSION[ses_username] = $username;
$_SESSION[ses_status] = "user";
echo "<meta http-equiv='refresh' content='1;URL=HomePage.php'>";
echo "<br /> Waiting User..............................";
}else{
echo "You Are Boss";
$_SESSION[ses_userid] = session_id();
$_SESSION[ses_username] = $username;
$_SESSION[ses_status] = "boss";
echo "<meta http-equiv='refresh' content='1;URL=HomePage2.php'>";
echo "<br /> Waiting Boss..............................";
}
}
}
}
?>