<?php
if(!isset($_SESSION)) {
     session_start();
}
	$kode_dealer = $_GET['kode'];
	include "../connect.php";
	$date = date('Y-m-d');
	$time = date('H:i:s');
	$datetime = date('Y-m-d H:i:s');
	$query1 = mysql_query("INSERT INTO daftar_pengajuan ( id_admin, kode_dealer, tanggal_pengajuan, jenis_pengajuan, channel, status_channel, nama_sv, nama_manager, nama_divhead, jam_pengajuan ) VALUES ('$_SESSION[id_admin]', '$kode_dealer', '$date', 'Upgrade Channel', 'H2', '$_POST[status_channel]', '$_POST[sv]', '$_POST[manager]', '$_POST[divhead]', '$time')");
	$query3 = mysql_query("INSERT INTO channel_h2 (id_channel, pj, no_telp, no_fax, email, tgl_efektif, tgl_akhir, status_channel, status_bintang, waktucreate, waktumodify) VALUES ('$kode_dealer', '$_POST[pj]', '$_POST[no_telp]', '$_POST[no_fax]', '$_POST[email]', '$_POST[tgl_efektif]', '$_POST[tgl_akhir]', '$_POST[status_channel]', '$_POST[status_bintang]', '$datetime', '$datetime')");
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>