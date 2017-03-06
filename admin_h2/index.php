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
    <title>Online Dealer Administrasi</title>
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
            url  : 'table1.php',
            data : data,
            success :  function(data)
            {		
            	$(".result").html(data);
			}
            });
            return false;
        });
		$(document).on('submit', '#form-search2', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'table2.php',
            data : data,
            success :  function(data)
            {		
            	$(".result2").html(data);
			}
            });
            return false;
        });
		
    });
    </script>
  </head>

  <body>

    <div class="form">
      <div align="right">
	  <a style="color:#00F"> Welcome, <?php echo ($_SESSION['nama']) ?></a>
	  <a href="../login/logout.php" onclick="return confirm('Anda Yakin Logout dari Sistem?')">[LogOut]</a></div>
		
      <ul class="tab-group">
        <li class="tab active"><a href="#pdb">Pengajuan Dealer Baru</a></li>
        
		<li class="tab"><a href="#pdd">Pengubahan Data Dealer</a></li>
		<li class="tab"><a href="#gp">Ganti Password</a></li>
		
      </ul>
      

      <div class="tab-content">
        <div id="pdb">   
          <h1>Pengajuan Dealer Baru / Upgrade Channel Dealer</h1>
          
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
															<option value = "" >ALL</option>
															<option value = "Pengajuan Dealer Baru">Pengajuan Dealer Baru</option>
															<option value = "Upgrade Channel">Upgrade Channel</option>
															<option value = "Pengangkatan Dealer Tetap">Pengangkatan Dealer Tetap</option>
															<option value = "Pemberhentian Dealer">Pemberhentian Dealer</option>
															<option value = "Perpanjangan Masa Percobaan Dealer">Perpanjangan Masa Percobaan Dealer</option>
															<option value = "Perpanjangan Dealer Tetap">Perpanjangan Dealer Tetap</option>															
														
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
              Status Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap">
            
            <select name = "status">
															<option value = "">ALL</option>
															<option value = "progress">In Progress</option>
															<option value = "acknowledged">Acknowledged</option>
			</select>
          </div>
		  </div>
          <button type="submit" class="button button-block"/>Search</button>
		  <a class="button"href="index2.php"/>Upgrade</a>
		   <a class="button"href="index1.php"/>Create</a>
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.channel = 'H2' order by tanggal_pengajuan desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['approval_sv']=='Tidak Setuju'||$baris['approval_manager']=='Tidak Setuju'||$baris['approval_divhead']=='Tidak Setuju') echo "Rejected"; else if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress";else echo "Acknowledged"; echo"</td>
          <td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['jenis_pengajuan']=='Pemberhentian Dealer')echo"rincian_dealer.php?id=";else if($baris['channel']=='H1')echo"rincian_dealer_h1.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3.php?id="; echo $baris['id_daftar']; echo ">Lihat Rincian</a></td></tr>";
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.channel = 'H2' order by tanggal_pengajuan desc");
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
          <input type="number" style="width:15%" min="1" name="page" max="<?php echo ceil($count/10)?>" value="1"/><span>Dari <?php echo ceil($count/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>

        </div>
        
        <div id="pdd">   
          <h1>Ubah Data Dealer</h1>
          <form id="form-search2" method="post">
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
															<option value = "" >ALL</option>
															<option value = "Pengajuan Dealer Baru">Pengajuan Dealer Baru</option>
															<option value = "Upgrade Channel">Upgrade Channel</option>
															
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
              Status Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap">
            
            <select name = "status">
															<option value = "">ALL</option>
															<option value = "progress">In Progress</option>
															<option value = "acknowledged">Acknowledged</option>
			</select>
          </div>
		  </div>
          <button type="submit" class="button button-block"/>Search</button>
          <div class="result2">
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.channel = 'h2' and a.legalisir_admin is null and (jenis_pengajuan = 'Pengajuan Dealer Baru' or jenis_pengajuan = 'Upgrade Channel') order by tanggal_pengajuan desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['approval_sv']=='Tidak Setuju'||$baris['approval_manager']=='Tidak Setuju'||$baris['approval_divhead']=='Tidak Setuju') echo "Rejected"; else if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress";else echo "Acknowledged"; echo"</td>
          <td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=edit_dealer_h2.php?id="; echo $baris['id_daftar']; echo ">Edit</a> <a href=hapus_dealer_h2.php?id="; echo $baris['id_daftar'];echo"&kode=";echo $baris['kode_dealer']; echo ' onclick="return confirm';echo"('Anda Yakin Ingin Menghapus Pengajuan Dealer ".$baris['nama_dealer']." ?')";echo'" >Hapus</a></td></tr>';
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.channel = 'h2' and a.legalisir_admin is null and (jenis_pengajuan = 'Pengajuan Dealer Baru' or jenis_pengajuan = 'Upgrade Channel') order by tanggal_pengajuan desc");
					$count1 = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count1++;
					}
                    ?>
                </table>
            </div>
        </div>
        <div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number" style="width:15%" min="1" name="page" max="<?php echo ceil($count1/10)?>" value="1"/><span>Dari <?php echo ceil($count1/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>
        
		</div>
        
				<div id="gp">   
		<h1>Ganti Password</h1>         
		 <form name="nambah" method="post"action="submit_ganti.php" method="post" onSubmit="validate()"enctype="multipart/form-data">
        
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Password Lama :
            </label>
		  </div>
		  <div class="field-wrap"><input name="pass_lama"maxlength="20" type="password" required/>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Password Baru :
            </label>
		  </div>
		  <div class="field-wrap"><input name="pass_baru"maxlength="10" type="password" required/>
          </div>
          </div>
		  
		   <div class="top-row">
          <div class="field-wrap">
              <label>
              Konfirmasi :
            </label>
		  </div>
		  <div class="field-wrap"><input name="confirm"maxlength="10" type="password" required/>
          </div>
          </div>
		  
		  
		  <button type="submit" class="button button-block"/>Simpan</button>
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