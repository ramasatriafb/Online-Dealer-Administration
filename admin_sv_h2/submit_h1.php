<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	$sql =mysql_query("UPDATE daftar_pengajuan SET comment_sv ='$_POST[comment_sv]' , approval_sv='$_POST[approval_sv]' WHERE id_daftar='$_GET[id]'");
	include "email.php";
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>