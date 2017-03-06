<?php
if(!isset($_SESSION)) {
     session_start();
}
if($_SESSION['status']=='admin_divhead_h2'){
include "../connect.php";
$sql=mysql_fetch_array(mysql_query("select * from daftar_pengajuan a, daftar_dealer b, kodepos c, channel_h2 d where a.id_daftar = '$_GET[id]' and a.kode_dealer = b.kode_dealer and b.id_kodepos = c.id_kodepos and b.kode_dealer = d.id_channel"));
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
		  <div class="top-row" <?php if($sql['status_tanah']=='Milik Sendiri') echo'style="visibility:hidden"' ?> id="tanggalsewa">
            <div class="field-wrap">
              <label>
                Tanggal Akhir Sewa <span class="req">*</span>:
              </label>
            </div>
              <div class="field-wrap">
              <span name="akhir_sewa"><?php echo $sql['akhir_sewa'] ?></span>
			  </div>
          </div>
          <div class="top-row">
          <div class="field-wrap">
          <label>
          
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
              No. SP3D <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['no_sp3d'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              SIUP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['siop'] ?>" target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              TDP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['tdp'] ?>" target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              KTP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['ktp'] ?>" target="_blank">Preview</a>
          </div>
          </div>

		  <div class="top-row">
          <div class="field-wrap">
              <label>
              NPWP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['npwp'] ?>" target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              HO<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['ho'] ?>" target="_blank">Preview</a>
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Akte Pendirian<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['akte'] ?>" target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Surat Domisili<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['surat_domisili'] ?>" target="_blank">Preview</a>
          </div>
          </div>
		      <div class="top-row">
          <div class="field-wrap">
              <label>
              Admin Super Visor Tujuan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['sv'] ?></span>
          </div>
          </div>
          		  
			<div class="top-row">
          <div class="field-wrap">
              <label>
              Admin Manager Tujuan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['manager'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Admin Division Head Tujuan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['divhead'] ?></span>
          </div>
          </div>

	 
        </div>
 <div class="top-row">
          <div class="field-wrap">
              <label>
              No. SP3D <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['no_sp3d'] ?></span>
          </div>
          </div> 
		  
		  <a class="button"href="index.php"/>Back</a>
		       
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