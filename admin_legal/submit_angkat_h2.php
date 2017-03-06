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
	$id_admin = mysql_fetch_array(mysql_query("select id_admin from admin where user = '$_SESSION[username]'"));
	$sql4 =mysql_query("UPDATE channel_h2 SET no_sp3d ='$_POST[no_sp3d]' WHERE id_channel='$kode_dealer'");
	$sql5 =mysql_query("INSERT INTO daftar_pengajuan ( id_admin, kode_dealer, tanggal_pengajuan, jenis_pengajuan, channel, status_channel, nama_sv, nama_manager, nama_divhead, jam_pengajuan, perpanjangan ) VALUES ('$id_admin', '$kode_dealer', '$date', 'Pengangkatan Dealer Tetap', 'H2', 'Tetap', '$_POST[sv]', '$_POST[manager]', '$_POST[divhead]', '$time', '$_POST[tgl_akhir]')");
	$querry = mysql_query("select tgl_efektif,tgl_akhir from channel_h2 where id_channel ='$kode_dealer'");
	$baris = mysql_fetch_array($querry);
	$sql6 =mysql_query("INSERT INTO sp3d ( kode_dealer, no_sp3d, tgl_efektif, tgl_akhir) VALUES ( '$kode_dealer', '$_POST[no_sp3d]', '$baris[tgl_efektif]', '$baris[tgl_akhir]')");
	
	
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>