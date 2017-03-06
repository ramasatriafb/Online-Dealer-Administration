<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	$datetime = date('Y-m-d H:i:s');
	$i=0;
	$id = $_POST['inputcek'];
	while($i<count($_POST['inputcek'])){
	
	$sql =mysql_query("UPDATE daftar_pengajuan SET comment_divhead ='$_POST[comment_divhead]' , approval_divhead='$_POST[approval_divhead]', waktu_approval_divhead='$datetime' WHERE id_daftar='$id[$i]'");
	$querry2 = mysql_fetch_array(mysql_query("select * from daftar_pengajuan where id_daftar ='$id[$i]' and perpanjangan is not null"));
	$sql1 =mysql_query("UPDATE channel_h1 SET tgl_akhir = '$querry2[perpanjangan]' WHERE id_channel='$querry2[kode_dealer]'");
	$querry3 = mysql_fetch_array(mysql_query("select * from daftar_pengajuan where id_daftar ='$id[$i]' and status_channel is not null"));
	$sql4 =mysql_query("UPDATE channel_h1 SET status_channel = '$querry3[status_channel]' WHERE id_channel='$querry3[kode_dealer]'");
	$sql5 =mysql_query("UPDATE daftar_pengajuan SET status_channel = '$querry3[status_channel]' WHERE kode_dealer='$querry3[kode_dealer]' and channel='$querry3[channel]' ");
	$querry4 = mysql_fetch_array(mysql_query("select * from daftar_pengajuan where id_daftar ='$id[$i]' and jenis_pengajuan='Pemberhentian Dealer'"));
	$sql2 =mysql_query("UPDATE daftar_dealer SET status_dealer ='Berhenti' WHERE kode_dealer='$querry4[kode_dealer]'");
	$i++;
	}
	include "email.php";
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>