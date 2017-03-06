<?php
if(!isset($_SESSION)) {
     session_start();
}
$id=$_GET['id'];
if($_SESSION['status']=='admin_h2'){
include "../connect.php";
$sql=mysql_fetch_array(mysql_query("select * from daftar_pengajuan a, daftar_dealer b, kodepos c, channel_h2 d where a.id_daftar = '$id' and a.kode_dealer = b.kode_dealer and b.id_kodepos = c.id_kodepos and b.kode_dealer = d.id_channel"));
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Ubah Data Dealer</title>
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
					document.getElementById('akhir_sewa').setAttribute('required','required');
				}
				else{
					$("#tanggalsewa").fadeOut(500).hide();
					document.getElementById('akhir_sewa').removeAttribute('required');
				}
			});
		}).change();
		$("#kodepos").focus(function(){
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
	var _validFileExtensions = [".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx", ".pdf"];
	function ValidateSingleInput(oInput) {
		if (oInput.type == "file") {
			var sFileName = oInput.value;
			var sFileSize = oInput.files[0];
			var blnValid = false;
			if (sFileName.length > 0 && sFileSize.size < 1000000) {
				for (var j = 0; j < _validFileExtensions.length; j++) {
					var sCurExtension = _validFileExtensions[j];
					if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
						blnValid = true;
						break;
					}
				}
				 
				if (!blnValid) {
					alert("Maaf File Yang Anda Inputkan Tidak Sesuai Format Yang Diijinkan");
					oInput.value = "";
					return false;
				}
			}
			else{
				alert("Maaf File Yang Anda Inputkan Terlalu Besar ");oInput.value = "";return false;
			}
		}
		return true;
	}
	</script>
  </head>
  <body>

    <div class="form">
      
      <div>
        <div id="h1">   
          <h1>Ubah Data Dealer</h1>
        <form name="edit" action="submit_h2.php?id=<?php echo $id ?>&kode=<?php echo $sql['kode_dealer'] ?>" method="post" onSubmit="validate()">
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Kode Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span name="kode_dealer"><?php echo $sql['kode_dealer'] ?></span>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="nama_dealer" type="text"required value="<?php echo $sql['nama_dealer'] ?>"/>
          </div>
          </div>

          <div class="top-row">
          <div class="field-wrap">
              <label>
              Kode Pos <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input id="kodepos" name = "kodepos" type="text" onClick='targetitem = document.forms[0].kodepos; dataitem = window.open("kodepos.php", "dataitem", "toolbar=no,menubar=no,scrollbars=yes"); dataitem.targetitem = targetitem' value="<?php echo $sql['kodepos'] ?>" required />
          </div>
          </div>
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Propinsi <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="propinsi" value="<?php echo $sql['propinsi'] ?>"></span>
          </div>
          </div>
          
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kabupaten/Kota Madya <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kabupaten" value="<?php echo $sql['kabupaten'] ?>"></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kelurahan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select id="kelurahan" name="kelurahan"required>
		  <option selected="selected"><?php echo $sql['kelurahan'] ?></option>
		  </select>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kecamatan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kecamatan" value="<?php echo $sql['kecamatan'] ?>"></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Lokasi Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="lokasi" type="text"required value="<?php echo $sql['lokasi'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Owner/Pemilik/Direktur <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="owner" type="text"required value="<?php echo $sql['owner'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Kontak <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="kontak" type="number"required value="<?php echo $sql['kontak'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Tanah <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap">
          <select name="status_tanah" id="status"required>
          <option <?php if($sql['status_tanah']=='Milik Sendiri') echo "selected=selected"; ?> value = "Milik Sendiri">Milik Sendiri</option>
		  <option <?php if($sql['status_tanah']=='Sewa') echo "selected=selected"; ?> value = "Sewa">Sewa</option>
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
              <input name="akhir_sewa" id="akhir_sewa" type="date" <?php if($sql['status_tanah']=='Sewa') echo "required"?> value="<?php echo $sql['akhir_sewa'] ?>"/>            
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
		  <div class="field-wrap"><input name="pj" type="text"required value="<?php echo $sql['pj'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Telp Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="no_telp" type="number"required value="<?php echo $sql['no_telp'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No Fax :
            </label>
		  </div>
		  <div class="field-wrap"><input name="no_fax" type="number" value="<?php echo $sql['no_fax'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Alamat Email <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="email" type="email"required value="<?php echo $sql['email'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Efektif Diangkat <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="tgl_efektif" type="date"required value="<?php echo $sql['tgl_efektif'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Akhir Efektif Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="tgl_akhir" type="date"required value="<?php echo $sql['tgl_akhir'] ?>"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Channel <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select name="status_channel"required>
		  <option <?php if($sql['status_channel']=='Percobaan') echo "selected=selected"; ?> value = "Percobaan">Percobaan</option>
		  <option <?php if($sql['status_channel']=='Tetap') echo "selected=selected"; ?> value = "Tetap">Tetap</option>
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
        	<option <?php if($sql['status_bintang']=='*') echo "selected=selected"; ?> value = "*">*</option>
			<option <?php if($sql['status_bintang']=='**') echo "selected=selected"; ?> value = "**">**</option>
			<option <?php if($sql['status_bintang']=='***') echo "selected=selected"; ?> value = "***">***</option>
			<option <?php if($sql['status_bintang']=='****') echo "selected=selected"; ?> value = "****">****</option>
			<option <?php if($sql['status_bintang']=='*****') echo "selected=selected"; ?> value = "*****">*****</option>
			</select>												
		  </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              SIOP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="siop"value = "1000000"onchange="ValidateSingleInput(this);"/><a href="<?php echo $sql['siop'] ?>" target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              TDP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="tdp"value = "<?php echo $sql['tdp'] ?>"onchange="ValidateSingleInput(this);"/><a href="<?php echo $sql['tdp'] ?>" target="_blank">Preview</a>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              KTP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="ktp"value = "<?php echo $sql['ktp'] ?>"onchange="ValidateSingleInput(this);"/><a href="<?php echo $sql['ktp'] ?>" target="_blank">Preview</a>
          </div>
          </div>

		  <div class="top-row">
          <div class="field-wrap">
              <label>
              NPWP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="npwp"value = "<?php echo $sql['npwp'] ?>"onchange="ValidateSingleInput(this);"/>
<a href="<?php echo $sql['npwp'] ?>" target="_blank">Preview</a>          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              HO<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="ho"value = "<?php echo $sql['ho'] ?>"onchange="ValidateSingleInput(this);"/>
<a href="<?php echo $sql['ho'] ?>" target="_blank">Preview</a>          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Akte Pendirian<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="akte"value = "<?php echo $sql['akte'] ?>"onchange="ValidateSingleInput(this);"/>
<a href="<?php echo $sql['akte'] ?>" target="_blank">Preview</a>          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Surat Domisili<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="surat_domisili"value = "<?php echo $sql['surat_domisili'] ?>"onchange="ValidateSingleInput(this);"/><a href="<?php echo $sql['surat_domisili'] ?>" target="_blank">Preview</a>
          </div>
          </div>
		  
		    <div class="top-row">
          <div class="field-wrap">
              <label>
              Admin Super Visor Tujuan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="sv" type="text"  list="svlist" value="<?php echo $sql['nama_sv'] ?>" required />
          <datalist id="svlist">
          <?php
		  $listsv=mysql_query("select nama from admin where status = 'admin_sv_h2'");
		  while ($barissv = mysql_fetch_array($listsv)){
			  echo '<option value = "';echo $barissv['nama'];echo '" >';echo $barissv['nama'];echo "</option>
			  ";
		  }
          ?></datalist>
          </div>
          </div>
          		  
			<div class="top-row">
          <div class="field-wrap">
              <label>
              Admin Manager Tujuan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="manager" type="text" list="managerlist" value="<?php echo $sql['nama_manager'] ?>" required />
          <datalist id="managerlist">
          <?php
		  $listmanager=mysql_query("select nama from admin where status = 'admin_manager'");
		  while ($barismanager = mysql_fetch_array($listmanager)){
			  echo '<option value = "';echo $barismanager['nama'];echo '" >';echo $barismanager['nama'];echo "</option>
			  ";
		  }
          ?></datalist>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Admin Division Head Tujuan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="divhead" type="text" list="divheadlist" value="<?php echo $sql['nama_divhead'] ?>" required />
          <datalist id="divheadlist">
          <?php
		  $listdivhead=mysql_query("select nama from admin where status = 'admin_divhead'");
		  while ($barisdivhead = mysql_fetch_array($listdivhead)){
			  echo '<option value = "';echo $barisdivhead['nama'];echo '" >';echo $barisdivhead['nama'];echo "</option>
			  ";
		  }
          ?></datalist>
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