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
    <title>Pemberhentian Dealer</title>
    <link href='../css/css.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src='jquery-1.11.3-jquery.min.js'></script>
	<script type="text/javascript">
    $(document).ready(function()
    {	
        $(document).on('submit', '#form-search', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'tablehapus.php',
            data : data,
            success :  function(data)
            {		
            	$(".result").html(data);
			}
            });
            return false;
        });
    });
    </script>

  <body>

    <div class="form">
	<div align="right">
	  <a style="color:#00F"> Welcome, <?php echo ($_SESSION['nama']) ?></a>
	  <a href="../login/logout.php" onclick="return confirm('Anda Yakin Logout dari Sistem?')">[LogOut]</a></div>
		
        <div>
        <div id="pdd">   
          <h1>Pemberhentian Dealer</h1>
          <form id="form-search" method="post">
          <div class="top-row">
          <div class="field-wrap">
            <label>
              Kode Dealer :
            </label>
		  </div>
		  <div class="field-wrap"><input name="kode_dealer" type="text" value=""/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Nama Dealer :
            </label>
          </div>
		  <div class="field-wrap">
            <input name="nama_dealer" type="text" value=""/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Channel :
            </label>
		  </div>
		  <div class="field-wrap">
            
            <select name = "channel">
															<option value = "">ALL</option>
															<option value = "h1" >H1</option>
															<option value = "h2" >H2</option>
															<option value = "h3" >H3</option>
																									</select>
          </div>
		  </div>
		  
          <button type="submit" class="button button-block"/>Search</button>
          <div class="result">
          <div class="field-wrap">
		  <div class="table" >
                <table>
                    <tr>
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
					$awal = date('Y-m-01');
					$akhir = date('Y-m-t');
					$hasil=mysql_query("select * from daftar_dealer where status_dealer = 'Resmi' limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
						$channelq = mysql_query("select channel from daftar_pengajuan where kode_dealer = '$baris[kode_dealer]' and legalisir_admin is not null and (jenis_pengajuan = 'Pengajuan Dealer Baru' or jenis_pengajuan = 'Upgrade Channel') order by tanggal_pengajuan desc");
					echo "
					<tr>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";while ($channel = mysql_fetch_array($channelq)){ echo $channel['channel']." ";};echo"</td>
					<td align=center><a href=hapus_dealer.php?id="; echo $baris['kode_dealer'];echo"&kode=";echo $baris['kode_dealer']; echo ' onclick="return confirm';echo"('Anda Yakin Ingin Memberhentikan Dealer ".$baris['nama_dealer']." ?')";echo'" >Berhentikan Dealer</a></td></tr>';
					}
					$hitung=mysql_query("select * from daftar_dealer where status_dealer = 'Resmi' limit 0,10");
					$count = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count++;
					}
                    ?>
                </table>
            </div>
            	 
        </div>
        <div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number" style="width:15%" min="1" name="page" max="<?php echo ceil($count/10)?>" value="1" required/><span>Dari <?php echo ceil($count/10) ?> halaman</span>
          </div>
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