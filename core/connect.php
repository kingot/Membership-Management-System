<?php

$host='localhost';
$userName='root';
$password='';
$db='tein_db';
$mysqli= new mysqli($host, $userName, $password, $db);

if($mysqli->connect_errno){
	die('Sorry, we have some problems');
}



mysqli_connect($host, $userName, $password, $db);




?>