<?php
if(!isset($_SESSION)) {
     session_start();
}
if(isset($_SESSION['status'])&&$_SESSION['status']=='admin'){
include "../connect.php";
$sql=mysql_fetch_array(mysql_query("select * from daftar_pengajuan a, daftar_dealer b, kodepos c, channel_h1 d where a.id_daftar = '$_GET[id]' and a.kode_dealer = b.kode_dealer and b.id_kodepos = c.id_kodepos and b.kode_dealer = d.id_channel"));
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Upgrade Channel Dealer</title>
    <link href='../css/css.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript">
	var htmlobjek;
	$(document).ready(function(){
		$("#status").change(function(){
			$(this).find("option:selected").each(function(){
				if($(this).attr("value")=="Sewa"){
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
          <h1>Upgrade Channel Dealer</h1>
        <form name="edit" action="submit2_h1.php" method="post" onSubmit="validate()">
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Kode Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="kode_dealer" type="number" disabled="disabled" value="<?php echo $sql['kode_dealer'] ?>"/>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="nama_dealer" type="text" disabled="disabled"value="<?php echo $sql['nama_dealer'] ?>"/>
          </div>
          </div>

          <div class="top-row">
          <div class="field-wrap">
              <label>
              Kode Pos <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input id="kodepos" name="kodepos" type="text" list="datalist" required disabled="disabled"value="  <?php echo $sql['kodepos'] ?>"/>
		  <datalist id="datalist">
          <?php
		  $listkodepos=mysql_query("select distinct kodepos from kodepos order by kodepos");
		  while ($bariskodepos = mysql_fetch_array($listkodepos)){
			  echo "<option value = ";echo $bariskodepos['kodepos'];echo " >";echo $bariskodepos['kodepos'];echo "</option>
			  ";
		  }
          ?></datalist>
          </div>	  
		  
          </div>
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Propinsi <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="propinsi" disabled="disabled"value="<?php echo $sql['propinsi'] ?>"></span>
          </div>
          </div>
          
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kabupaten/Kota Madya <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kabupaten" disabled="disabled"value="<?php echo $sql['kabupaten'] ?>"></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kelurahan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select id="kelurahan" name="kelurahan" disabled="disabled"value="<?php echo $sql['kelurahan'] ?>"/>
		  <option value = "">--Please Select--</option>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kecamatan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kecamatan" disabled="disabled"value="<?php echo $sql['kecamatan'] ?>"></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Lokasi Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="lokasi" type="text"disabled="disabled"value="<?php echo $sql['lokasi'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Owner/Pemilik/Direktur <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="owner" type="text" disabled="disabled"value="<?php echo $sql['owner'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Kontak <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="kontak" type="number" disabled="disabled"value="<?php echo $sql['kontak'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Tanah <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap">
          <select name="status_tanah"disabled="disabled">
		  <option selected="selected"><?php echo $sql['status_tanah'] ?></option>
          <option value = "Milik Sendiri">Milik Sendiri</option>
		  <option value = "Sewa">Sewa</option>
		  </select>
          </div>
          </div>
		  <div class="top-row" id="tanggalsewa">
            <div class="field-wrap">
              <label>
                Tanggal Akhir Sewa <span class="req">*</span>:
              </label>
            </div>
              <div class="field-wrap">
              <input name="akhir_sewa" type="date" disabled="disabled"value="<?php echo $sql['akhir_sewa'] ?>"/>            
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
		  <div class="field-wrap"><input name="pj" type="text" disabled="disabled" value="<?php echo $sql['pj'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Telp Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="no_telp" type="number"disabled="disabled" value="<?php echo $sql['no_telp'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No Fax :
            </label>
		  </div>
		  <div class="field-wrap"><input name="no_fax" type="number" disabled="disabled"value="<?php echo $sql['no_fax'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Alamat Email <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="email" type="email" disabled="disabled"value="<?php echo $sql['email'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Efektif Diangkat <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="tgl_efektif" type="date" value="<?php echo $sql['tgl_efektif'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Akhir Efektif Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="tgl_akhir" type="date" value="<?php echo $sql['tgl_akhir'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Channel <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select name="status_channel">
		  <option selected="selected"><?php echo $sql['status_channel'] ?></option>
		  <option value = "Percobaan">Percobaan</option>
		  <option value = "Tetap">Tetap</option>
		 </select>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Bintang :
            </label>
		  </div>
		  <div class="field-wrap"><select name="status_bintang">
		  <option selected="selected"><?php echo $sql['status_bintang'] ?></option>
          <option value = "*">*</option>
		  <option value = "**">**</option>
		  <option value = "***">***</option>
		   <option value = "****">****</option>
		   <option value = "*****">*****</option>
			</select>												
		  </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. SP3D <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="no_sp3d" type="text" value="<?php echo $sql['no_sp3d'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              CBU :
            </label>
		  </div>
		  <div class="field-wrap"><select name="cbo"disabled="disabled">
			<option selected="selected"><?php echo $sql['cbo'] ?></option>
			<option>Yes</option>
			<option>No</option>
			</select>
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              SIUP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="siop"value = "<?php echo $sql['siop'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              TDP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="tdp"value = "<?php echo $sql['tdp'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              KTP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="ktp"value = "<?php echo $sql['ktp'] ?>"/>
          </div>
          </div>

		  <div class="top-row">
          <div class="field-wrap">
              <label>
              NPWP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="npwp"value = "<?php echo $sql['npwp'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              HO<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="ho"value = "<?php echo $sql['ho'] ?>"/>
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Akte Pendirian<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="akte"value = "<?php echo $sql['akte'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Surat Domisili<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="surat_domisili"value = "<?php echo $sql['surat_domisili'] ?>"/>
          </div>
          </div>
		            <button type="submit" class="button button-block"/>Simpan</button>
					<a class="button"href="index2.php"/>Back</a>
		 
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