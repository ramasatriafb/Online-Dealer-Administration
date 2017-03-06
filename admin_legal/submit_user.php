<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	$query1 = mysql_query("INSERT INTO admin ( user, password, status, nama) VALUES ('$_POST[user]','$_POST[password]','$_POST[status]','$_POST[nama]')");
	
echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>