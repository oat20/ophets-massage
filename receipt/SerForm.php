<?php
session_start();
require_once '../config.inc.php';
require_once '../connect.php';
require_once './function.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once './css.inc.php';?>
    <title>Service Form</title>
</head>
<body>
    <?php echo page_navbar("", "./index.php");?>
    <?php require_once './js.inc.php';?>
</body>
</html>