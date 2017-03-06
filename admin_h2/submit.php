<?php
if(!isset($_SESSION)) {
     session_start();
}
	$kode_dealer = $_POST['kode_dealer'];
	include "../connect.php";
	if(!file_exists("../files/".$kode_dealer)){
	mkdir("../files/".$kode_dealer);
	}
	$allowed_ext = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf');
	if(isset($_FILES['siop']['name'])){
	$file_name_siop = $_FILES['siop']['name'];
	$file_ext_siop = strtolower(end(explode('.', $file_name_siop)));
	$file_tmp_siop = $_FILES['siop']['tmp_name'];
	$lokasi_siop = '../files/'.$kode_dealer.'/siop.'.$file_ext_siop;
	move_uploaded_file($file_tmp_siop, $lokasi_siop);
	}
	if(isset($_FILES['tdp']['name'])){
	$file_name_tdp = $_FILES['tdp']['name'];
	$file_ext_tdp = strtolower(end(explode('.', $file_name_tdp)));
	$file_tmp_tdp = $_FILES['tdp']['tmp_name'];
	$lokasi_tdp = '../files/'.$kode_dealer.'/tdp.'.$file_ext_tdp;
	move_uploaded_file($file_tmp_tdp, $lokasi_tdp);
	}
	if(isset($_FILES['ktp']['name'])){
	$file_name_ktp = $_FILES['ktp']['name'];
	$file_ext_ktp = strtolower(end(explode('.', $file_name_ktp)));
	$file_tmp_ktp = $_FILES['ktp']['tmp_name'];
	$lokasi_ktp = '../files/'.$kode_dealer.'/ktp.'.$file_ext_ktp;
	move_uploaded_file($file_tmp_ktp, $lokasi_ktp);
	}
	if(isset($_FILES['npwp']['name'])){
	$file_name_npwp = $_FILES['npwp']['name'];
	$file_ext_npwp = strtolower(end(explode('.', $file_name_npwp)));
	$file_tmp_npwp = $_FILES['npwp']['tmp_name'];

	$lokasi_npwp = '../files/'.$kode_dealer.'/npwp.'.$file_ext_npwp;
	move_uploaded_file($file_tmp_npwp, $lokasi_npwp);
	}
	if(isset($_FILES['ho']['name'])){
	$file_name_ho = $_FILES['ho']['name'];
	$file_ext_ho = strtolower(end(explode('.', $file_name_ho)));
	$file_tmp_ho = $_FILES['ho']['tmp_name'];
	$lokasi_ho = '../files/'.$kode_dealer.'/ho.'.$file_ext_ho;
	move_uploaded_file($file_tmp_ho, $lokasi_ho);
	}
	if(isset($_FILES['akte']['name'])){
	$file_name_akte = $_FILES['akte']['name'];
	$file_ext_akte = strtolower(end(explode('.', $file_name_akte)));
	$file_tmp_akte = $_FILES['akte']['tmp_name'];
	$lokasi_akte = '../files/'.$kode_dealer.'/akte.'.$file_ext_akte;
	move_uploaded_file($file_tmp_akte, $lokasi_akte);
	}
	if(isset($_FILES['surat_domisili']['name'])){
	$file_name_surat_domisili = $_FILES['surat_domisili']['name'];
	$file_ext_surat_domisili = strtolower(end(explode('.', $file_name_surat_domisili)));
	$file_tmp_surat_domisili = $_FILES['surat_domisili']['tmp_name'];
	$lokasi_surat_domisili = '../files/'.$kode_dealer.'/surat_domisili.'.$file_ext_surat_domisili;
	move_uploaded_file($file_tmp_surat_domisili, $lokasi_surat_domisili);
	}
	$date = date('Y-m-d');
	$time = date('H:i:s');
	$id_channel = $_POST['kode_dealer'];
	$datetime = date('Y-m-d H:i:s');
	$idkodepos = mysql_fetch_array(mysql_query("select id_kodepos from kodepos where kelurahan = '$_POST[kelurahan]'"));
	$id_admin = mysql_fetch_array(mysql_query("select id_admin from admin where user = '$_SESSION[username]'"));
	$query1 = mysql_query("INSERT INTO daftar_pengajuan ( id_admin, kode_dealer, tanggal_pengajuan, jenis_pengajuan, channel, status_channel, nama_sv, nama_manager, nama_divhead, jam_pengajuan ) VALUES ('$id_admin[id_admin]', '$_POST[kode_dealer]', '$date', 'Pengajuan Dealer Baru', 'H2', '$_POST[status_channel]', '$_POST[sv]', '$_POST[manager]', '$_POST[divhead]', '$time')");
	$query2 = mysql_query("INSERT INTO daftar_dealer ( kode_dealer, nama_dealer, id_kodepos, lokasi, owner, kontak, status_tanah, akhir_sewa, status_dealer, siop, tdp, ktp, npwp, ho, akte, surat_domisili, waktucreate) VALUES ('$_POST[kode_dealer]', '$_POST[nama_dealer]', '$idkodepos[id_kodepos]', '$_POST[lokasi]', '$_POST[owner]', '$_POST[kontak]', '$_POST[status_tanah]', '$_POST[akhir_sewa]','Pengajuan','$lokasi_siop', '$lokasi_tdp', '$lokasi_ktp', '$lokasi_npwp', '$lokasi_ho', '$lokasi_akte', '$lokasi_surat_domisili','$datetime')");
	$query3 = mysql_query("INSERT INTO channel_h2 (id_channel, pj, no_telp, no_fax, email, tgl_efektif, tgl_akhir, status_channel, status_bintang, waktucreate, waktumodify) VALUES ('$id_channel', '$_POST[pj]', '$_POST[no_telp]', '$_POST[no_fax]', '$_POST[email]', '$_POST[tgl_efektif]', '$_POST[tgl_akhir]', '$_POST[status_channel]', '$_POST[status_bintang]', '$datetime', '$datetime')");
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>