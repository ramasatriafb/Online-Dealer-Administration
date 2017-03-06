<?php
if(!isset($_SESSION)) {
     session_start();
}
$id=$_GET['id'];
if($_SESSION['status']=='admin_manager_h2'){
include "../connect.php";
$sql=mysql_fetch_array(mysql_query("select * from daftar_pengajuan a, daftar_dealer b, kodepos c, channel_h3 d where a.id_daftar = '$id' and a.kode_dealer = b.kode_dealer and b.id_kodepos = c.id_kodepos and b.kode_dealer = d.id_channel"));
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
	<script type="text/javascript">
	var htmlobjek;
	$(document).ready(function(){
		$("#status").change(function(){
			$(this).find("option:selected").each(function(){
				if($(this).attr("value")=="sewa"){
					$("#tanggalsewa").fadeIn(500).show();
				}
				else{
					$("#tanggalsewa").fadeOut(500).hide();
				}
			});
		}).change();
		$("#kodepos").change(function(){
		var kodepos = $("#kodepos").val();
		$.ajax({
			url: "ambilpropinsi.php",
			data: "kodepos="+kodepos,
			cache: false,
			success: function(msg){
				$("#propinsi").html(msg);
			}
		});
		$.ajax({
			url: "ambilkabupaten.php",
			data: "kodepos="+kodepos,
			cache: false,
			success: function(msg){
				$("#kabupaten").html(msg);
			}
		});
		$.ajax({
			url: "ambilkelurahan.php",
			data: "kodepos="+kodepos,
			cache: false,
			success: function(msg){
				$("#kelurahan").html(msg);
			}
		});
		$.ajax({
			url: "ambilkecamatan.php",
			data: "kodepos="+kodepos,
			cache: false,
			success: function(msg){
				$("#kecamatan").html(msg);
			}
		});
	  }).change();
	});
	</script>
  
  </head>
  <body>

    <div class="form">
      
      <div>
        <div id="h1">   
          <h1>Rincian Pengajuan</h1>
        
         <form name="edit" action="submit_h3.php?id=<?php echo $id ?>" method="post" onSubmit="validate()">
          
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
              HEPS :
            </label>
		  </div>
		  <div class="field-wrap"><span><?php echo $sql['heps'] ?></span>
          </div>
          </div>

<div class="top-row">
          <div class="field-wrap">
              <label>
              SIUP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['siop'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              TDP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['tdp'] ?>"target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              KTP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><a href="<?php echo $sql['ktp'] ?>"target="_blank">Preview</a>
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
		  <div class="field-wrap"><a href= "<?php echo $sql['ho'] ?>"target="_blank">Preview</a>
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
              Comment <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="comment_manager" type="text" required />
          </div>
          </div>
		  
		        <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select name = "approval_manager"required>
															<option value = "">--Please Select--</option>
															<option value = "Setuju">Setuju</option>
															<option value = "Tidak Setuju">Tidak Setuju</option>
															</select>
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