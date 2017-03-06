<?php
if(!isset($_SESSION)) {
     session_start();
}
if($_SESSION['status']=='admin_h2'){
include "../connect.php";
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Create Data Dealer</title>
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
      
      
        <div id="h1">   
          <h1>Form Pengajuan Dealer Baru</h1>
          
          <form name="pengajuan" action="submit.php" method="post" onSubmit="validate()"enctype="multipart/form-data">
          
<div class="top-row">
          <div class="field-wrap">
              <label>
              Kode Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="kode_dealer" type="text" required />
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="nama_dealer" type="text" required />
          </div>
          </div>

          <div class="top-row">
          <div class="field-wrap">
              <label>
              Kode Pos <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input id="kodepos" name = "kodepos" type="text" onClick='targetitem = document.forms[0].kodepos; dataitem = window.open("kodepos.php", "dataitem", "toolbar=no,menubar=no,scrollbars=yes"); dataitem.targetitem = targetitem' required />
          </div>
          </div>
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Propinsi <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="propinsi"></span>
          </div>
          </div>
          
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kabupaten/Kota Madya <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kabupaten"></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kelurahan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select id="kelurahan" name = "kelurahan" required >
          <option value = "">--Please Select--</option>
          </select>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kecamatan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kecamatan"></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Lokasi Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="lokasi" type="text" required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Owner/Pemilik/Direktur <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="owner" type="text" required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Kontak <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="kontak" type="number" maxlength="15" required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Tanah <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap">
          <select id="status" name = "status_tanah" required>													
		  <option value = "Milik Sendiri">Milik Sendiri</option>
		  <option value = "Sewa">Sewa</option>																												</select>
          </div>
          </div>
		  <div class="top-row" id="tanggalsewa">
            <div class="field-wrap">
              <label>
                Akhir Sewa <span class="req">*</span>:
              </label>
            </div>
              <div class="field-wrap">
              <input type="date" name="akhir_sewa" id="akhir_sewa" value=""/>
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
		  <div class="field-wrap"><input name="pj" type="text" required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Telp Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="no_telp" type="number" maxlength="15" required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No Fax :
            </label>
		  </div>
		  <div class="field-wrap"><input name="no_fax" type="text" maxlength="15"/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Alamat Email <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="email" type="email" required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Efektif Diangkat <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="tgl_efektif" type="date" required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Akhir Efektif Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="tgl_akhir" type="date" required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Channel <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select name = "status_channel" required>
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
		  <div class="field-wrap"><select name = "status_bintang">
															<option value = "">--Please Select--</option>
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
              SIUP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="siop"value = "1000000" onchange="ValidateSingleInput(this);" />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              TDP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="tdp"value = "1000000" onchange="ValidateSingleInput(this);" />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              KTP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="ktp"value = "1000000" onchange="ValidateSingleInput(this);" />
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              NPWP<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="npwp"value = "1000000" onchange="ValidateSingleInput(this);" />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              HO<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="ho"value = "1000000" onchange="ValidateSingleInput(this);" />
          </div>
          </div>
		  
		  		  
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Akte Pendirian<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="akte"value = "1000000" onchange="ValidateSingleInput(this);" />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Surat Domisili<span class="req">(MAX 1MB)</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input type="file"name="surat_domisili"value = "1000000" onchange="ValidateSingleInput(this);" />
          </div>
          </div>
		  
            <div class="top-row">
          <div class="field-wrap">
              <label>
              Admin Super Visor Tujuan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="sv" type="text"  list="svlist" required />
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
		  <div class="field-wrap"><input name="manager" type="text" list="managerlist" required />
          <datalist id="managerlist">
          <?php
		  $listmanager=mysql_query("select nama from admin where status = 'admin_manager_h2'");
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
		  <div class="field-wrap"><input name="divhead" type="text" list="divheadlist" required />
          <datalist id="divheadlist">
          <?php
		  $listdivhead=mysql_query("select nama from admin where status = 'admin_divhead_h2'");
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