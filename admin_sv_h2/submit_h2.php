<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	$datetime = date('Y-m-d H:i:s');
	$i=0;
	$id = $_POST['inputcek'];
	while($i<count($_POST['inputcek'])){
	$sql =mysql_query("UPDATE daftar_pengajuan SET comment_sv ='$_POST[comment_sv]' , approval_sv='$_POST[approval_sv]',waktu_approval_sv='$datetime' WHERE id_daftar='$id[$i]'");
	$i++;
	}
	include "email.php";
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>