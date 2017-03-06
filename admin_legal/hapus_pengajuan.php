<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	
	$id_daftar = $_GET['id'];
	
	$query1 = mysql_query("DELETE FROM daftar_pengajuan WHERE daftar_pengajuan.id_daftar = '$id_daftar'");
?>
<script language=javascript>document.location.href="..";</script>