<?php
if(!isset($_SESSION)) {
     session_start();
}
if($_SESSION['status']=='admin'){
include "../connect.php";
$sql=mysql_fetch_array(mysql_query("select * from daftar_dealer b, kodepos c, channel_h1 d where b.kode_dealer = '$_GET[id]' and b.id_kodepos = c.id_kodepos and b.kode_dealer = d.id_channel"));
$sql2=mysql_fetch_array(mysql_query("select * from daftar_dealer b, kodepos c, channel_h2 d where b.kode_dealer = '$_GET[id]' and b.id_kodepos = c.id_kodepos and b.kode_dealer = d.id_channel"));
$sql3=mysql_fetch_array(mysql_query("select * from daftar_dealer b, kodepos c, channel_h3 d where b.kode_dealer = '$_GET[id]' and b.id_kodepos = c.id_kodepos and b.kode_dealer = d.id_channel"));
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Rincian Data Dealer</title>
    <link href='../css/css.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery-1.11.3-jquery.min.js"></script>
  </head>
  <body>

    <div class="form">
      
      <div>
        <div id="h1">   
          <h1>Rincian Pengajuan</h1>
        <form name="edit" action="hapus_dealer.php?id=<?php echo $id ?>&kode=<?php echo $sql['kode_dealer'] ?>" method="post">
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Kode Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['kode_dealer'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['nama_dealer'] ?></span>
          </div>
          </div>

          <div class="top-row">
          <div class="field-wrap">
              <label>
              Kode Pos <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['kodepos'] ?></span>
          </div>	  
          </div>
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Propinsi <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['propinsi'] ?></span>
          </div>
          </div>
          
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kabupaten/Kota Madya <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['kabupaten'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kelurahan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['kelurahan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kecamatan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['kecamatan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Lokasi Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['lokasi'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Owner/Pemilik/Direktur <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['owner'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Kontak <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['kontak'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Tanah <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap">
          <span><?php echo $sql['status_tanah'] ?></span>
          
          </div>
          </div>
		  <div class="top-row" id="tanggalsewa">
            <div class="field-wrap">
              <label>
                Tanggal Akhir Sewa <span class="req">*</span>:
              </label>
            </div>
              <div class="field-wrap">
              <span><?php echo $sql['akhir_sewa'] ?></span>            </div>
          </div>
          <div class="top-row">
          <div class="field-wrap">
          <label>
          Channel H1 :
          </label>
          </div>
          <div class="field-wrap">
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Penanggung Jawab <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['pj'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Telp Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['no_telp'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No Fax :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['no_fax'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Alamat Email <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['email'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Efektif Diangkat <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['tgl_efektif'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Akhir Efektif Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['tgl_akhir'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Channel <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['status_channel'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Bintang :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['status_bintang'] ?></span>
          </div>
          </div>
		  
		  
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              CBO :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['cbo'] ?></span>
          </div>
          </div>
	<div class="top-row">
          <div class="field-wrap">
              <label>
              SIOP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql['siop'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              TDP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql['tdp'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              KTP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql['ktp'] ?>"target="_blank">Preview</a>
          </div>
          </div>

		  <div class="top-row">
          <div class="field-wrap">
              <label>
              NPWP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql['npwp'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              HO<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql['ho'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Akte Pendirian<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql['akte'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Surat Domisili<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql['surat_domisili'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['tanggal_pengajuan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['jam_pengajuan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Comment Super Vicer :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['comment_sv'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan Super Vicer :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['approval_sv'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Super Visor :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['nama_sv'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Persetujuan Super Visor :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['waktu_approval_sv'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Comment Manager:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['comment_manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan Manager :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['approval_manager'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Manager :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['nama_manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Persetujuan Manager :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['waktu_approval_manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Comment Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['comment_divhead'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['approval_divhead'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['nama_divhead'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Persetujuan Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['waktu_approval_divhead'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Legalisir Admin :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['legalisir_admin'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Legalisir Admin :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['waktu_legalisir'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No.SP3D :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['no_sp3d'] ?></span>
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
          <label>
          Channel H2 :
          </label>
          </div>
          <div class="field-wrap">
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Penanggung Jawab <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['pj'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Telp Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['no_telp'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No Fax :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['no_fax'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Alamat Email <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['email'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Efektif Diangkat <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['tgl_efektif'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Akhir Efektif Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['tgl_akhir'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Channel <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['status_channel'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Bintang :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['status_bintang'] ?></span>
          </div>
          </div>
		  
		  
	<div class="top-row">
          <div class="field-wrap">
              <label>
              SIOP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql2['siop'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              TDP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql2['tdp'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              KTP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql2['ktp'] ?>"target="_blank">Preview</a>
          </div>
          </div>

		  <div class="top-row">
          <div class="field-wrap">
              <label>
              NPWP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql2['npwp'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              HO<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql2['ho'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Akte Pendirian<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql2['akte'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Surat Domisili<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql2['surat_domisili'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['tanggal_pengajuan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['jam_pengajuan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Comment Super Visor :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['comment_sv'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan Super Visor :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['approval_sv'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Super Vicer :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['nama_sv'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Persetujuan Super Vicer :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['waktu_approval_sv'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Comment Manager:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['comment_manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan Manager :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['approval_manager'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Manager :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['nama_manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Persetujuan Manager :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['waktu_approval_manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Comment Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['comment_divhead'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['approval_divhead'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['nama_divhead'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Persetujuan Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['waktu_approval_divhead'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Legalisir Admin :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['legalisir_admin'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Legalisir Admin :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['waktu_legalisir'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No.SP3D :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql2['no_sp3d'] ?></span>
          </div>
          </div>
          <div class="top-row">
          <div class="field-wrap">
          <label>
          Channel H3 :
          </label>
          </div>
          <div class="field-wrap">
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Penanggung Jawab <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['pj'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Telp Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['no_telp'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No Fax :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['no_fax'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Alamat Email <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['email'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Efektif Diangkat <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['tgl_efektif'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Akhir Efektif Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['tgl_akhir'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Channel <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['status_channel'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Bintang :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['status_bintang'] ?></span>
          </div>
          </div>
		  
		  
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              HEPS :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['heps'] ?></span>
          </div>
          </div>
	<div class="top-row">
          <div class="field-wrap">
              <label>
              SIOP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql3['siop'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              TDP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql3['tdp'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              KTP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql3['ktp'] ?>"target="_blank">Preview</a>
          </div>
          </div>

		  <div class="top-row">
          <div class="field-wrap">
              <label>
              NPWP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql3['npwp'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              HO<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql3['ho'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Akte Pendirian<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql3['akte'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Surat Domisili<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href = "<?php echo $sql3['surat_domisili'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['tanggal_pengajuan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['jam_pengajuan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Comment Super Visor :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['comment_sv'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan Super Visor :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['approval_sv'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Super Vicer :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['nama_sv'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Persetujuan Super Vicer :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['waktu_approval_sv'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Comment Manager:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['comment_manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan Manager :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['approval_manager'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Manager :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['nama_manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Persetujuan Manager :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['waktu_approval_manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Comment Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['comment_divhead'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['approval_divhead'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['nama_divhead'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Persetujuan Division Head :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['waktu_approval_divhead'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Legalisir Admin :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['legalisir_admin'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Waktu Legalisir Admin :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['waktu_legalisir'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No.SP3D :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql3['no_sp3d'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Alasan Pemberhentian :
            </label>
		  </div>
		  <div class="field-wrap"><input name="alasan" type="text" required/>
          </div>
          </div>
          <button type="submit" class="button button-block"/>Simpan</button>
					<a class="button"href="index.php"/>Back</a>
		 
		  </form>
        </div>        
      </div><!-- tab-content -->
</div> <!-- /form -->
<script src='js/jquery.min.js'></script>
<script src="js/index.js"></script>
  </body>
</html>
<?php 
}else{
?>
<script>document.location.href="../"</script>
<?php 
}
?>