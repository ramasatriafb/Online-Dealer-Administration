<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	$kode_dealer = $_GET['kode'];
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$channelq = mysql_query("select * from daftar_pengajuan where kode_dealer = '$kode_dealer' and legalisir_admin is not null and (jenis_pengajuan = 'Pengajuan Dealer Baru' or jenis_pengajuan = 'Upgrade Channel') order by tanggal_pengajuan desc");
	while ($channel = mysql_fetch_array($channelq)){
	$query1 = mysql_query("INSERT INTO daftar_pengajuan ( id_admin, kode_dealer, tanggal_pengajuan, jenis_pengajuan, channel, status_channel, jam_pengajuan, nama_sv, nama_manager, nama_divhead ) VALUES ('$_SESSION[id_admin]', '$kode_dealer', '$date', 'Pemberhentian Dealer', '$channel[channel]', null,  '$time', '$channel[nama_sv]', '$channel[nama_manager]', '$channel[nama_divhead]')");
	}
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>