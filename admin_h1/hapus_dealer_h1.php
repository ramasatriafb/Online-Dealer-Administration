<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	
	$id_daftar = $_GET['id'];
	$kode_dealer = $_GET['kode'];
	
	$query1 = mysql_query("DELETE FROM daftar_pengajuan WHERE daftar_pengajuan.id_daftar = '$id_daftar'");
	$query3 = mysql_query("DELETE FROM channel_h1 WHERE channel_h1.id_channel = '$kode_dealer'");
	echo "Data berhasil dihapus
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>