<?php
if(!isset($_SESSION)) {
     session_start();
}
if(isset($_SESSION['status'])&&$_SESSION['status']=='admin_h2'){
include "../connect.php";
$sql=mysql_fetch_array(mysql_query("select * from daftar_pengajuan a,daftar_dealer b, kodepos c where a.id_daftar = '$_GET[id]' and a.kode_dealer = b.kode_dealer and b.id_kodepos = c.id_kodepos"));
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
          <h1>Upgrade Channel Dealer</h1>
        <form name="edit" action="submit2.php?kode=<?php echo $sql['kode_dealer'] ?>" method="post" onSubmit="validate()"  enctype="multipart/form-data">
          
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
		  <div class="field-wrap"><span name="nama_dealer"><?php echo $sql['nama_dealer'] ?></span>
          </div>
          </div>

          <div class="top-row">
          <div class="field-wrap">
              <label>
              Kode Pos <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kodepos" name="kodepos"><?php echo $sql['kodepos'] ?></span>
          </div>
          </div>
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Propinsi <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="propinsi"><?php echo $sql['propinsi'] ?></span>
          </div>
          </div>
          
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kabupaten/Kota Madya <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kabupaten"><?php echo $sql['kabupaten'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kelurahan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kelurahan" name="kelurahan" ><?php echo $sql['kelurahan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kecamatan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span id="kecamatan"><?php echo $sql['kecamatan'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Lokasi Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span name="lokasi"><?php echo $sql['lokasi'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Owner/Pemilik/Direktur <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span name="owner"><?php echo $sql['owner'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Kontak <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><span name="kontak"><?php echo $sql['kontak'] ?></span>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Tanah <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap">
          <span name="status_tanah" id="status"><?php echo $sql['status_tanah'] ?></span>
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
		  <div class="field-wrap"><input name="pj" type="text" required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No. Telp Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input size="15" name="no_telp" type="number"required  />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              No Fax :
            </label>
		  </div>
		  <div class="field-wrap"><input size="15" name="no_fax" type="number" />
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
		  <div class="field-wrap"><input name="tgl_efektif" type="date"required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Akhir Efektif Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="tgl_akhir" type="date"required />
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status Channel <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select name = "status_channel"required>
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
		  <div class="field-wrap"><input name="divhead" type="text" list="divheadlist" required />
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