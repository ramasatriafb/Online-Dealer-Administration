<?php
if(!isset($_SESSION)) {
     session_start();
}
	include "../connect.php";
	$id_daftar = $_GET['id'];
	$kode_dealer = $_GET['kode'];
	if(!file_exists("../files/".$kode_dealer)){
	mkdir("../files/".$kode_dealer);
	}
	$allowed_ext = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf');
	if(isset($_FILES['siop']['name'])){
	$file_name_siop = $_FILES['siop']['name'];
	$file_ext_siop = strtolower(end(explode('.', $file_name_siop)));
	$file_tmp_siop = $_FILES['siop']['tmp_name'];
	$lokasi_siop = '../files/'.$kode_dealer.'/siop.'.$file_ext_siop;
	unlink('delete.txt');
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
	$datetime = date('Y-m-d H:i:s');
	
	$idkodepos = mysql_fetch_array(mysql_query("select id_kodepos from kodepos where kelurahan = '$_POST[kelurahan]'"));
	$id_admin = mysql_fetch_array(mysql_query("select id_admin from admin where user = '$_SESSION[username]'"));
	
	$update_sv =mysql_query("UPDATE daftar_pengajuan SET approval_sv = NULL,comment_sv= NULL WHERE id_daftar='$id_daftar'");
	
	$update_manager =mysql_query("UPDATE daftar_pengajuan SET approval_manager = NULL,comment_manager= NULL WHERE id_daftar='$id_daftar'");
	
	$update_divhead =mysql_query("UPDATE daftar_pengajuan SET approval_divhead = NULL,comment_divhead= NULL WHERE id_daftar='$id_daftar'");
	
	$sql1 =mysql_query("UPDATE daftar_pengajuan SET tanggal_pengajuan='$date',nama_sv='$_POST[sv]', nama_manager='$_POST[manager]', nama_divhead='$_POST[divhead]', status_channel='$_POST[status_channel]' WHERE id_daftar='$id_daftar'");
	echo $sql1;
	$sql2 = "UPDATE daftar_dealer SET nama_dealer='$_POST[nama_dealer]',id_kodepos='$idkodepos[id_kodepos]',lokasi='$_POST[lokasi]',owner='$_POST[owner]',kontak='$_POST[kontak]',status_tanah='$_POST[status_tanah]',akhir_sewa='$_POST[akhir_sewa]'";
	echo $_POST['nama_dealer'];
	$isi1 = mysql_query("UPDATE channel_h1 SET pj='$_POST[pj]',no_telp='$_POST[no_telp]',no_fax='$_POST[no_fax]',email='$_POST[email]',tgl_efektif='$_POST[tgl_efektif]',tgl_akhir='$_POST[tgl_akhir]',status_channel='$_POST[status_channel]',status_bintang='$_POST[status_bintang]', cbo='$_POST[cbo]',waktumodify='$datetime' WHERE id_channel='$kode_dealer'");
	if(isset($_FILES['siop']['name'])) $isi2 = ",siop='$lokasi_siop'";else $isi2 = " ";
	if(isset($_FILES['tdp']['name'])) $isi3 = ",tdp='$lokasi_tdp'";else $isi3 = " ";
	if(isset($_FILES['ktp']['name'])) $isi4 = ",ktp='$lokasi_ktp'";else $isi4 = " ";
	if(isset($_FILES['npwp']['name'])) $isi5 = ",npwp='$lokasi_npwp'";else $isi5 = " ";
	if(isset($_FILES['ho']['name'])) $isi6 = ",ho='$lokasi_ho'";else $isi6 = " ";
	if(isset($_FILES['akte']['name'])) $isi7 = ",akte='$lokasi_akte'";else $isi7 = " ";
	if(isset($_FILES['surat_domisili']['name'])) $isi8 = ",surat_domisili='$lokasi_surat_domisili'";else $isi8 = " ";
	$isi9 = ",waktumodify='$datetime' WHERE kode_dealer = '$kode_dealer'";
	$sql3 =mysql_query($sql2.$isi2.$isi3.$isi4.$isi5.$isi6.$isi7.$isi8.$isi9);
	echo "Data berhasil disimpan
	redirect to main page";
?>
<script language=javascript>document.location.href="..";</script>