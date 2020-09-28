<?php 

$host = '127.0.0.1';
$dbname = 'bitmedia';
$user = 'mysql';
$password = 'mysql';

$connect = new mysqli($host, $user, $password, $dbname);

if($connect){
	echo 'Подключено';
}

?>