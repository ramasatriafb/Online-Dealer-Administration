<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	$datetime = date('Y-m-d H:i:s');
	
	$sql =mysql_query("UPDATE daftar_pengajuan SET comment_divhead ='$_POST[comment_divhead]' , approval_divhead='$_POST[approval_divhead]', waktu_approval_divhead='$datetime' WHERE id_daftar='$_GET[id]'");
	include "email.php";
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>