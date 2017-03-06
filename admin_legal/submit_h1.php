<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
		$id_daftar = $_GET['id'];
	$kode_dealer = $_GET['kode'];
	$datetime = date('Y-m-d H:i:s');
	$date = date('Y-m-d');
	$time = date('H:i:s');
	
	
	$sql5 =mysql_query("UPDATE daftar_pengajuan SET legalisir_admin ='Complete',waktu_legalisir='$date' WHERE id_daftar='$id_daftar'");
	$sql3 =mysql_query("UPDATE daftar_dealer SET status_dealer ='Resmi' WHERE kode_dealer='$kode_dealer'");
	$querry = mysql_query("select tgl_efektif,tgl_akhir from channel_h1 where id_channel ='$kode_dealer'");
	$baris = mysql_fetch_array($querry);
	$sql6 =mysql_query("INSERT INTO sp3d ( kode_dealer, no_sp3d, tgl_efektif, tgl_akhir) VALUES ( '$kode_dealer', '$_POST[no_sp3d]', '$baris[tgl_efektif]', '$baris[tgl_akhir]')");
	$querry2 = mysql_fetch_array(mysql_query("select status_channel from daftar_pengajuan where id_daftar ='$id_daftar'"));
	$sql4 =mysql_query("UPDATE channel_h1 SET no_sp3d ='$_POST[no_sp3d]' WHERE id_channel='$kode_dealer'");
	
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>