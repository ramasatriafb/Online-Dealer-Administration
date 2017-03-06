<?php
if(!isset($_SESSION)) {
     session_start();
}
if($_SESSION['status']=='admin'){
include "../connect.php"
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Perpanjangan Dealer Tetap</title>
    <link href='../css/css.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src='jquery-1.11.3-jquery.min.js'></script>
	<script type="text/javascript">
    $(document).ready(function()
    {	$("#kode_dealer").focus(function(){
			var kode_dealer = $("#kode_dealer");
			var dataString = 'id_daftar='+ kode_dealer;
			$.ajax({
            type : 'POST',
            url  : 'tableperpanjangdealer.php',
            data : dataString,
            success :  function(data)
            {		
            	$(".result").append(data);
			}
            });
            return false;
	});
    });
	 function fcek(){
			 var checkboxes = document.getElementsByName("inputcek[]");
			 if (document.getElementById("cek").checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
	}
	</script>

  <body>

    <div class="form">
	<div align="right">
	  <a style="color:#00F"> Welcome, <?php echo ($_SESSION['nama']) ?></a>
	  <a href="../login/logout.php" onclick="return confirm('Anda Yakin Logout dari Sistem?')">[LogOut]</a></div>
		
        <div>
        <div id="pdd">   
          <h1>Perpanjangan Dealer Tetap</h1>
          <form id="form-search" method="post" action="submit_perpanjang_dealer_tetap.php">
          
		  <div class="top-row">
		  <div class="field-wrap">
		  <label>
		  Daftar Dealer yang akan diperpanjang :
		  </label>
		  </div>
		  <div class="field-wrap">
          </div>
		</div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Tanggal Akhir Efektif Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="tgl_akhir" type="date" required/>
          </div>
          </div>
		
		 <div class="top-row">
		  <div class="field-wrap">
		  <label>
		 No. Surat :
		  </label>
		  </div>
		  <div class="field-wrap"><input name="no_surat" type="text" value="" required/>
          </div>
		  </div>
          <button type="submit" class="button button-block"/>Submit & Print</button>
          <div class="field-wrap">
		  <div class="table" >
                <table>
                    <tr>
					<td style="width:50px">
						<input type="checkbox" name="cek" id="cek" onClick="fcek()"/>
                        </td>
                        
                        <td>
                            Tanggal Pengajuan
                        </td>
                        <td>
                            Kode Dealer
                        </td>
						<td>
                            Nama Dealer
                        </td>
						<td>
                            Channel
                        </td>
						<td>
                            Action
                        </td>
                    </tr>
                    <?php
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and (a.jenis_pengajuan = 'Pengajuan Dealer Baru' or a.jenis_pengajuan = 'Upgrade Channel') and a.legalisir_admin is not null and a.status_channel = 'Tetap' order by tanggal_pengajuan desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo '
					<tr>
					<td style="width:50px">
						<input type="checkbox" name="inputcek[]" value="'.$baris['id_daftar'].'" />
                        </td>
					<td align=center>';echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat Rincian</a></td></tr>";
					}
					?>
                </table>
            </div>
        </div>
        </form>
      </div><!-- tab-content -->
      
</div> <!-- /form -->
</div>
    <script src='../js/jquery.min.js'></script>

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