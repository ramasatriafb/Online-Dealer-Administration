<?php
if(!isset($_SESSION)) {
     session_start();
}
include "../connect.php";
	$date = date('Y-m-d');
$time = date('H:i:s');
$datetime = date('Y-m-d H:i:s');

$query1 = mysql_query("INSERT INTO log_skkm (waktu_log,nama_user,aktivitas) VALUES ('$datetime','$_SESSION[nama]','Login')");



?>


