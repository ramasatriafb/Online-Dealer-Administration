<?php
if(!isset($_SESSION)) {
     session_start();
}
if($_SESSION['status']=='admin_h2'){
include "../connect.php"
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Upgrade Channel Dealer</title>
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
            url  : 'table3.php',
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
          <h1>Upgrade Channel Dealer</h1>
          <form id="form-search" method="post">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Periode Pengajuan :
              </label>
            </div>
              <div class="field-wrap">
                <input type="date" name="date_awal" value=""/>
              </div>
              <div class="field-wrap">
              <input type="date" name="date_akhir" value=""/>
            </div>
          </div>
		  
			<div class="top-row">
          <div class="field-wrap">
            <label>
              Jenis Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap">
            
            <select name = "jenis_pengajuan">
<option value = "Pengajuan Dealer Baru">Pengajuan Dealer Baru</option>
             </select>
          </div>
		  </div>
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
                            Tanggal Pengajuan
                        </td>
                        <td >
                            Jenis Pengajuan
                        </td>
                        <td>
                            Kode Dealer
                        </td>
						<td>
                            Nama Dealer
                        </td>
						<td>
                            Status Pengajuan
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and (a.channel = 'h1' or a.channel = 'h3') and approval_sv = 'Setuju' and approval_manager = 'Setuju' and approval_divhead = 'Setuju' and a.legalisir_admin = 'Complete' and a.jenis_pengajuan = 'Pengajuan Dealer Baru' order by tanggal_pengajuan desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress"; else echo "Acknowledged"; echo"</td>
					<td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=upgrade_dealer_h2.php?id="; echo $baris['id_daftar']; echo ">Upgrade Channel Dealer</a></td></tr>";
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and (a.channel = 'h1' or a.channel = 'h3') and approval_sv = 'Setuju' and approval_manager = 'Setuju' and approval_divhead = 'Setuju' and a.legalisir_admin = 'Complete' and a.jenis_pengajuan = 'Pengajuan Dealer Baru' order by tanggal_pengajuan desc");
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