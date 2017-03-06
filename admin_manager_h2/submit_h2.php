<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	$datetime = date('Y-m-d H:i:s');
	$datetime = date('Y-m-d H:i:s');
	$i=0;
	$id = $_POST['inputcek'];
	while($i<count($_POST['inputcek'])){
	
	$sql =mysql_query("UPDATE daftar_pengajuan SET comment_manager ='$_POST[comment_manager]' , approval_manager='$_POST[approval_manager]', waktu_approval_manager='$datetime' WHERE id_daftar='$id[$i]'");
	$i++;
	}
	
	include "email.php";
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>