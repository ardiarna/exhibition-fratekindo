<?php 
header('Access-Control-Allow-Origin: *');
$server = "localhost";
$user	= "root";
$pass	= "root";
$db 	= "t49403_ufeapp";
$con = mysqli_connect($server, $user, $pass, $db);
$con->set_charset("utf8");

?>