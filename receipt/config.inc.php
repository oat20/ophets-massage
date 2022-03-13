<?php
$cf_https = (isset($_SERVER['HTTPS']) == "on") ? "https://" : "http://";
if($_SERVER['HTTP_HOST'] == 'localhost' or $_SERVER['HTTP_HOST'] == '127.0.0.1'){
		$cf_livesite = $cf_https.$_SERVER['HTTP_HOST']."/www/ophets-massage/";
	}else{
		$cf_livesite = $cf_https.$_SERVER['HTTP_HOST']."/ophets/";
	}
?>