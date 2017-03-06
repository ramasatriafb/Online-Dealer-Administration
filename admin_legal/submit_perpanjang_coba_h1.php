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
	
	$sql5 =mysql_query("INSERT INTO daftar_pengajuan ( id_admin, kode_dealer, tanggal_pengajuan, jenis_pengajuan, channel, status_channel, jam_pengajuan, nama_sv, nama_manager, nama_divhead, perpanjangan ) VALUES ('$_SESSION[id_admin]', '$kode_dealer', '$date', 'Perpanjangan Masa Percobaan Dealer', 'H1', 'Percobaan', '$time', '$_GET[sv]', '$_GET[manager]', '$_GET[divhead]', '$_POST[tgl_akhir]')");
	
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>