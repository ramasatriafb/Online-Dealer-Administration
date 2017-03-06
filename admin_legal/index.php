<?php
if(!isset($_SESSION)) {
     session_start();
}
if(isset($_SESSION['username'])){
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
    });
	$(document).ready(function()
    {	
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
	$(document).ready(function()
    {	
        $(document).on('submit', '#form-search3', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'table3.php',
            data : data,
            success :  function(data)
            {		
            	$(".result3").html(data);
			}
            });
            return false;
        });
    });
    $(document).ready(function()
    {	
        $(document).on('submit', '#form-search4', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'table4.php',
            data : data,
            success :  function(data)
            {		
            	$(".result4").html(data);
			}
            });
            return false;
        });
    });
	;$(document).ready(function()
    {	
        $(document).on('submit', '#form-search5', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'table5.php',
            data : data,
            success :  function(data)
            {		
            	$(".result5").html(data);
			}
            });
            return false;
        });
    });
    $(document).ready(function()
    {	
        $(document).on('submit', '#form-search6', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'table6.php',
            data : data,
            success :  function(data)
            {		
            	$(".result6").html(data);
			}
            });
            return false;
        });
    });
    $(document).ready(function()
    {	
        $(document).on('submit', '#form-search7', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'table7.php',
            data : data,
            success :  function(data)
            {		
            	$(".result7").html(data);
			}
            });
            return false;
        });
    });
    $(document).ready(function()
    {	
        $(document).on('submit', '#form-search8', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'table8.php',
            data : data,
            success :  function(data)
            {		
            	$(".result8").html(data);
			}
            });
            return false;
        });
    });
    $(document).ready(function()
    {	
        $(document).on('submit', '#form-search9', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'table9.php',
            data : data,
            success :  function(data)
            {		
            	$(".result9").html(data);
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
        <li class="tab active"><a href="#pdd">Daftar Pengajuan Baru</a></li>
        
		<li class="tab"><a href="#pdb">Pengubahan Data Dealer</a></li>
		<li class="tab"><a href="#evaluasi">Evaluasi Dealer</a></li>
		<li class="tab"><a href="#monitoring">Monitoring</a></li>
		<li class="tab"><a href="#adduser">Penambahan User</a></li>
		
		
      </ul>
      

      <div class="tab-content">
	  <div id="pdd">   
          <h1>Entry Data Dealer Baru</h1>
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
					
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.comment_sv is not null and a.approval_sv = 'Setuju' and a.comment_manager is not null and a.approval_manager ='Setuju' and a.comment_divhead is not null and a.approval_divhead ='Setuju' and a.legalisir_admin is null and a.jenis_pengajuan <>'Pemberhentian Dealer' order by tanggal_pengajuan desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['approval_sv']=='Tidak Setuju'||$baris['approval_manager']=='Tidak Setuju'||$baris['approval_divhead']=='Tidak Setuju') echo "Rejected"; else if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress";else echo "Acknowledged"; echo"</td>
          <td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"rincian_dealer_h1.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3.php?id="; echo $baris['id_daftar']; echo ">Tambahkan No. SP3D</a></td></tr>";
					
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and tanggal_pengajuan between '$awal' and '$akhir' and a.comment_sv is not null and a.approval_sv ='Setuju' and a.comment_manager is not null and a.approval_manager  ='Setuju' and a.comment_divhead is not null and a.approval_divhead ='Setuju' and a.legalisir_admin is null order by tanggal_pengajuan desc");
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
          <input type="number"required  style="width:15%" min="0" name="page" max="<?php echo ceil($count/10)?>" value="1"/><span>Dari <?php echo ceil($count/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>

        </div>
        <div id="pdb">   
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
															<option value = "Pengangkatan Dealer Tetap">Pengangkatan Dealer Tetap</option>
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.jenis_pengajuan <>'Pemberhentian Dealer' order by tanggal_pengajuan desc limit 0,10");
					
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['approval_sv']=='Tidak Setuju'||$baris['approval_manager']=='Tidak Setuju'||$baris['approval_divhead']=='Tidak Setuju') echo "Rejected"; else if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress";else echo "Acknowledged"; echo"</td>
          <td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"edit_dealer_h1.php?id=";else if($baris['channel']=='H2')echo"edit_dealer_h2.php?id=";else if($baris['channel']=='H3')echo"edit_dealer_h3.php?id="; echo $baris['id_daftar']; echo ">Lihat Rincian</a></td></tr>";
					
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer order by tanggal_pengajuan desc");
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
          <input type="number"required  style="width:15%" min="0" name="page" max="<?php echo ceil($count1/10)?>" value="1"/><span>Dari <?php echo ceil($count1/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>
        </div>
		
				<div id="evaluasi">   
          <h1>Pengangkatan Dealer Tetap</h1>
           
          <form id="form-search3" method="post">
		  <ul class="tab-group2">
        <li class="tab"><a href="#evaluasi">Penggangkatan Dealer Tetap</a></li>
        
		<li class="tab"><a href="#pd">Pemberhentian Dealer</a></li>
		<li class="tab"><a href="#mp">Perpanjangan Masa Percobaan Dealer</a></li>
		<li class="tab"><a href="#dt">Perpanjangan Dealer Tetap</a></li>
		
      </ul>
          
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
		  <a class="button"href="angkat_dealer.php"/>Create</a>
		  
		  
          <div class="result3">
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.jenis_pengajuan = 'Pengangkatan Dealer Tetap' order by tanggal_pengajuan desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['approval_sv']=='Tidak Setuju'||$baris['approval_manager']=='Tidak Setuju'||$baris['approval_divhead']=='Tidak Setuju') echo "Rejected"; else if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress";else echo "Acknowledged"; echo"</td>
          <td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat </a><a href=hapus_pengajuan.php?id=".$baris['id_daftar'].' onclick="return confirm';echo"('Anda Yakin Ingin Menghapus Pengajuan Dealer ".$baris['nama_dealer']." ?')".'">Hapus</a></td></tr>';
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.jenis_pengajuan = 'Pengangkatan Dealer Tetap' order by tanggal_pengajuan");
				$count3 = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count3++;
					}
                    ?>
                </table>
            </div>
        </div>
        <div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number"required  style="width:15%" min="0" name="page" max="<?php echo ceil($count3/10)?>" value="1"/><span>Dari <?php echo ceil($count3/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>
        </div>
		<div id="pd">   
          <h1>Pemberhentian Dealer</h1>
           
          <form id="form-search4" method="post">
		  <ul class="tab-group2">
        <li class="tab"><a href="#evaluasi">Penggangkatan Dealer Tetap</a></li>
        
		<li class="tab"><a href="#pd">Pemberhentian Dealer</a></li>
		<li class="tab"><a href="#mp">Perpanjangan Masa Percobaan Dealer</a></li>
		<li class="tab"><a href="#dt">Perpanjangan Dealer Tetap</a></li>
		
      </ul>
          
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
		  <a class="button"href="berhenti_dealer.php"/>Create</a>
		  
		  
         <div class="result4">
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and jenis_pengajuan = 'Pemberhentian Dealer' order by tanggal_pengajuan desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['approval_sv']=='Tidak Setuju'||$baris['approval_manager']=='Tidak Setuju'||$baris['approval_divhead']=='Tidak Setuju') echo "Rejected"; else if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress";else echo "Acknowledged"; echo"</td>
          <td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";echo"rincian_dealer.php?id="; echo $baris['id_daftar']; echo ">Lihat </a><a href=hapus_pengajuan.php?id=".$baris['id_daftar'].' onclick="return confirm';echo"('Anda Yakin Ingin Menghapus Pengajuan Dealer ".$baris['nama_dealer']." ?')".'">Hapus</a></td></tr>';
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.tanggal_pengajuan between '$awal' and '$akhir' and jenis_pengajuan = 'Pemberhentian Dealer' order by tanggal_pengajuan desc");
			$count4 = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count4++;
					}
                    ?>
              
                   
                </table>
            </div>
        </div>
        <div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number"required  style="width:15%" min="0" name="page" max="<?php echo ceil($count3/10)?>" value="1"/><span>Dari <?php echo ceil($count3/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>
        </div>
		<div id="mp">   
          <h1>Perpanjangan Masa Percobaan Dealer</h1>
           
          <form id="form-search5" method="post">
		  <ul class="tab-group2">
        <li class="tab"><a href="#evaluasi">Penggangkatan Dealer Tetap</a></li>
        
		<li class="tab"><a href="#pd">Pemberhentian Dealer</a></li>
		<li class="tab"><a href="#mp">Perpanjangan Masa Percobaan Dealer</a></li>
		<li class="tab"><a href="#dt">Perpanjangan Dealer Tetap</a></li>
		
      </ul>
          
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
		  <a class="button"href="coba_dealer.php"/>Create</a>
		  
		  
           <div class="result5">
          <div class="field-wrap">
		  <div class="table" >
                <table>
                    <tr>
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.jenis_pengajuan = 'Perpanjangan Masa Percobaan Dealer' order by tanggal_pengajuan desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['approval_sv']=='Tidak Setuju'||$baris['approval_manager']=='Tidak Setuju'||$baris['approval_divhead']=='Tidak Setuju') echo "Rejected"; else if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress";else echo "Acknowledged"; echo"</td>
          <td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat </a><a href=hapus_pengajuan.php?id=".$baris['id_daftar'].' onclick="return confirm';echo"('Anda Yakin Ingin Menghapus Pengajuan Dealer ".$baris['nama_dealer']." ?')".'">Hapus</a></td></tr>';
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.jenis_pengajuan = 'Perpanjangan Masa Percobaan Dealer' and tanggal_pengajuan between '$awal' and '$akhir' order by tanggal_pengajuan desc");
			$count5 = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count5++;
					}
                    ?>
              
                   
                </table>
            </div>
        </div>
        <div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number"required  style="width:15%" min="0" name="page" max="<?php echo ceil($count3/10)?>" value="1"/><span>Dari <?php echo ceil($count3/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>
        </div>
		<div id="dt">   
          <h1>Perpanjangan Dealer Tetap</h1>
           
          <form id="form-search6" method="post">
		  <ul class="tab-group2">
        <li class="tab"><a href="#evaluasi">Penggangkatan Dealer Tetap</a></li>
        
		<li class="tab"><a href="#pd">Pemberhentian Dealer</a></li>
		<li class="tab"><a href="#mp">Perpanjangan Masa Percobaan Dealer</a></li>
		<li class="tab"><a href="#dt">Perpanjangan Dealer Tetap</a></li>
		
      </ul>
          
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
		  <a class="button"href="perpanjang_dealer.php"/>Create</a>
		  
		  
          
          <div class="result6">
          <div class="field-wrap">
		  <div class="table" >
                <table>
                    <tr>
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.jenis_pengajuan = 'Perpanjangan Dealer Tetap' order by tanggal_pengajuan desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['approval_sv']=='Tidak Setuju'||$baris['approval_manager']=='Tidak Setuju'||$baris['approval_divhead']=='Tidak Setuju') echo "Rejected"; else if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress";else echo "Acknowledged"; echo"</td>
          <td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat </a><a href=hapus_pengajuan.php?id=".$baris['id_daftar'].' onclick="return confirm';echo"('Anda Yakin Ingin Menghapus Pengajuan Dealer ".$baris['nama_dealer']." ?')".'">Hapus</a></td></tr>';
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.jenis_pengajuan = 'Perpanjangan Dealer Tetap' order by tanggal_pengajuan desc");
			$count6 = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count6++;
					}
                    ?>
              
                   
                </table>
            </div>
        </div>
        <div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number"required  style="width:15%" min="0" name="page" max="<?php echo ceil($count3/10)?>" value="1"/><span>Dari <?php echo ceil($count3/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>
        </div>
		
		
		
		<div id="monitoring">   
          <h1>Jumlah Dealer</h1>
          <form id="form-search7" method="post">
		  <ul class="tab-group2">
        <li class="tab"><a href="#monitoring">Jumlah Dealer</a></li>
        
		<li class="tab"><a href="#dd">Detail Dealer</a></li>
		<li class="tab"><a href="#hd">History Dealer</a></li>
		
          
		  
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
		  
		  <button type="submit" class="button button-block"/>Search</button>
		  
		   <div class="result7">
		  <div class="field-wrap">
		  <div class="table" >
                <table>
                    <tr>
                        <td>
                            Dealer H1
                        </td>
                        <td >
                            Dealer H12
                        </td>
                        
						<td>
                            Dealer H2
                        </td>
						<td>
                            Dealer H23
                        </td>
						<td>
                            Dealer H3
                        </td>
						<td>
                            Dealer H123
                        </td>
						<td>
                            Jumlah Dealer
                        </td>
						<td>
                            Dealer H1 Tetap
                        </td>
						<td>
                            Dealer H1 TA
                        </td>
						<td>
                            Dealer H2 Tetap
                        </td>
						<td>
                            Dealer H2 TA
                        </td>
						<td>
                            Dealer H3 Tetap
                        </td>
						
                    </tr>
                       <?php
					$awal = date('Y-m-01');
					$akhir = date('Y-m-t');
					$barish1 = mysql_query("select count(*) from channel_h1 a,daftar_dealer b , daftar_pengajuan c where a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and b.status_dealer = 'Resmi' and c.legalisir_admin is not null");
					$barish1_ = mysql_fetch_row($barish1);
					$barish12 = mysql_query("select count(*) from channel_h1 a,channel_h2 b,daftar_dealer c ,daftar_pengajuan d where a.id_channel = b.id_channel and a.id_channel = c.kode_dealer and a.id_channel = d.kode_dealer and d.legalisir_admin is not null and c.status_dealer = 'Resmi'");
					$barish12_ = mysql_fetch_row($barish12);
					$barish2 = mysql_query("select count(*) from channel_h2 a,daftar_dealer b, daftar_pengajuan c where a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and b.status_dealer = 'Resmi' and c.legalisir_admin is not null");
					$barish2_ = mysql_fetch_row($barish2);
					$barish23 = mysql_query("select count(*) from channel_h2 a,channel_h3 b,daftar_dealer c,daftar_pengajuan d where a.id_channel = b.id_channel and a.id_channel = c.kode_dealer and a.id_channel = d.kode_dealer and d.legalisir_admin is not null and c.status_dealer = 'Resmi'");
					$barish23_ = mysql_fetch_row($barish23);
					$barish3 = mysql_query("select count(*) from channel_h3 a,daftar_dealer b,daftar_pengajuan c where a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and b.status_dealer = 'Resmi' and c.legalisir_admin is not null");
					$barish3_ = mysql_fetch_row($barish3);
					$barish123 = mysql_query("select count(*) from channel_h1 a,channel_h2 b,channel_h3 c,daftar_dealer d,daftar_pengajuan e where a.id_channel = b.id_channel and e.legalisir_admin is not null and a.id_channel = c.id_channel and a.id_channel = d.kode_dealer and a.id_channel = e.kode_dealer and d.status_dealer = 'Resmi'");
					$barish123_ = mysql_fetch_row($barish123);
					$barishtot = mysql_query("select count(*) from daftar_pengajuan a , daftar_dealer b where a.kode_dealer = b.kode_dealer and b.status_dealer = 'Resmi' and a.legalisir_admin is not null");
					$barishtot_ = mysql_fetch_row($barishtot);
					$barish1tetap = mysql_query("select count(*) from channel_h1 a,daftar_dealer b,daftar_pengajuan c where c.legalisir_admin is not null and a.id_channel = b.kode_dealer and a.status_channel='Tetap' and b.status_dealer = 'Resmi'");
					$barish1tetap_ = mysql_fetch_row($barish1tetap);
					$barish1ta = mysql_query("select count(*) from channel_h1 a,daftar_dealer b, daftar_pengajuan c where c.legalisir_admin is not null and  a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and a.status_channel='Percobaan' and b.status_dealer = 'Resmi'");
					$barish1ta_ = mysql_fetch_row($barish1ta);
					$barish2tetap = mysql_query("select count(*) from channel_h2 a ,daftar_dealer b, daftar_pengajuan c where c.legalisir_admin is not null and a.id_channel = b.kode_dealer and a.status_channel='Tetap' and b.status_dealer = 'Resmi'");
					$barish2tetap_ = mysql_fetch_row($barish2tetap);
					$barish2ta = mysql_query("select count(*) from channel_h2 a,daftar_dealer b, daftar_pengajuan c where c.legalisir_admin is not null and  a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and a.status_channel='Percobaan' and b.status_dealer = 'Resmi'");
					$barish2ta_ = mysql_fetch_row($barish2ta);
					$barish3tetap = mysql_query("select count(*) from channel_h3 a,daftar_dealer b, daftar_pengajuan c where c.legalisir_admin is not null and  a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and a.status_channel='Tetap' and b.status_dealer = 'Resmi'");
					$barish3tetap_ = mysql_fetch_row($barish3tetap);
					
					
					
					echo "
					<tr>
					<td align=center>";echo "".$barish1_[0];echo"</td>
					<td align=center>";echo "".$barish12_[0];echo"</td>
					<td align=center>";echo "".$barish2_[0];echo"</td>
					<td align=center>";echo "".$barish23_[0];echo"</td>
					<td align=center>";echo "".$barish3_[0];echo"</td>
					<td align=center>";echo "".$barish123_[0];echo"</td>
					<td align=center>";echo "".$barishtot_[0];echo"</td>
					<td align=center>";echo "".$barish1tetap_[0];echo"</td>
					<td align=center>";echo "".$barish1ta_[0];echo"</td>
					<td align=center>";echo "".$barish2tetap_[0];echo"</td>
					<td align=center>";echo "".$barish2ta_[0];echo"</td>
					<td align=center>";echo "".$barish3tetap_[0];echo"</td>
					
					
					</tr>";
					
                    ?>
                   
              
                </table>
            </div>
			</div>
            
        </div>
        </form>

        </div>
		
				<div id="dd">   
          <h1>Detail Dealer</h1>
           <form id="form-search8" method="post">
		  <ul class="tab-group2">
        <li class="tab"><a href="#monitoring">Jumlah Dealer</a></li>
        
		<li class="tab"><a href="#dd">Detail Dealer</a></li>
		<li class="tab"><a href="#hd">History Dealer</a></li>
		
          
          <div class="top-row">
          <div class="field-wrap">
            <label>
              Kode Dealer :
            </label>
		  </div>
		  <div class="field-wrap"><input name="kode_dealer"required type="text" value=""/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Kabupaten/Kota <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="kota" type="text" list="kotalist" required />
          <datalist id="kotalist">
          <?php
		  $listkota=mysql_query("select distinct kabupaten from kodepos");
		  while ($bariskota = mysql_fetch_array($listkota)){
			  echo '<option value = "';echo $bariskota['kabupaten'];echo '" >';echo $bariskota['kabupaten'];echo "</option>
			  ";
		  }
          ?></datalist>
          </div>
          </div>
		  
		  
		  <button type="submit" class="button button-block"/>Search</button>
		  

		   <div class="result8">
		  <div class="field-wrap">
		  <div class="outer">
		  <div class="inner">
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
                            Alamat
                        </td>
						<td>
                            Nama Pemilik
                        </td>
						<td>
                            No.Kontak
                        </td>
						<td>
                            Kelurahan
                        </td>
						<td>
                            Kecamatan
                        </td>
						<td>
                            Kabupaten/Kotamadya
                        </td>
						<td>
                            Propinsi
                        </td>
						<td>
                            Kode Pos
                        </td>
						<td>
                            Status Tanah
                        </td>
						<td>
                            Penanggung Jawab H1
                        </td>
						<td>
                            No.Fax H1
                        </td>
						<td>
                            Alamat Email Channel H1
                        </td>
						<td>
                            Status H1
                        </td>
						<td>
                            Begin Date H1
                        </td>
						<td>
                            End Date H1
                        </td>
						<td>
                            Penanggung Jawab H2
                        </td>
						<td>
                            No.Fax H2
                        </td>
						<td>
                            Alamat Email Channel H2
                        </td>
						<td>
                            Status H2
                        </td>
						<td>
                            Begin Date H2
                        </td>
						<td>
                            End Date H2
                        </td>
						<td>
                            Penanggung Jawab H3
                        </td>
						<td>
                            No.Fax H3
                        </td>
						<td>
                            Alamat Email Channel H3
                        </td>
						<td>
                            Status H3
                        </td>
						<td>
                            Begin Date H3
                        </td>
						<td>
                            End Date H3
                        </td>
						
                    </tr>
                     <?php
					$awal = date('Y-m-01');
					$akhir = date('Y-m-t');
					
					$hasilkp=mysql_query("select * from daftar_dealer b,kodepos c where b.id_kodepos = c.id_kodepos order by b.kode_dealer asc limit 0,10");
					
					
					while ($baris1 = mysql_fetch_array($hasilkp)){
					$hasilc1=mysql_query("select * from  channel_h1 where id_channel = '$baris1[kode_dealer]' order by id_channel asc limit 0,10");
					$hasilc2=mysql_query("select * from  channel_h2 where id_channel = '$baris1[kode_dealer]' order by id_channel asc limit 0,10");
					$hasilc3=mysql_query("select * from  channel_h3 where id_channel = '$baris1[kode_dealer]' order by id_channel asc limit 0,10");
					$baris2 = mysql_fetch_array($hasilc1);
					$baris3 = mysql_fetch_array($hasilc2);
					$baris4 = mysql_fetch_array($hasilc3);
					$channel = "";
					echo "
					<tr>
					<td align=center>";echo $baris1['kode_dealer'];echo"</td>
					<td align=center>";echo $baris1['nama_dealer'];echo"</td>
					<td align=center>";if(!$baris2['pj']=='')$channel = $channel."H1 ";else if(!$baris3['pj']=='')$channel = $channel."H2 ";else if(!$baris4['pj']=='')$channel = $channel."H3 ";echo $channel;echo"</td>
					<td align=center>";echo $baris1['lokasi'];echo"</td>
					<td align=center>";echo $baris1['owner'];echo"</td>
					<td align=center>";echo $baris1['kontak'];echo"</td>
					<td align=center>";echo $baris1['kelurahan'];echo"</td>
					<td align=center>";echo $baris1['kecamatan'];echo"</td>
					<td align=center>";echo $baris1['kabupaten'];echo"</td>
					<td align=center>";echo $baris1['propinsi'];echo"</td>
					<td align=center>";echo $baris1['kodepos'];echo"</td>
					<td align=center>";echo $baris1['status_tanah'];echo"</td>
					<td align=center>";echo $baris2['pj'] ;echo"</td>
					<td align=center>";echo $baris2['no_fax'];echo"</td>
					<td align=center>";echo $baris2['email'];echo"</td>
					<td align=center>";echo $baris2['status_channel'];echo"</td>
					<td align=center>";echo $baris2['tgl_efektif'];echo"</td>
					<td align=center>";echo $baris2['tgl_akhir'];echo"</td>
					<td align=center>";echo $baris3['pj'];echo"</td>
					<td align=center>";echo $baris3['no_fax'];echo"</td>
					<td align=center>";echo $baris3['email'];echo"</td>
					<td align=center>";echo $baris3['status_channel'];echo"</td>
					<td align=center>";echo $baris3['tgl_efektif'];echo"</td>
					<td align=center>";echo $baris3['tgl_akhir'];echo"</td>
					<td align=center>";echo $baris4['pj'];echo"</td>
					<td align=center>";echo $baris4['no_fax'];echo"</td>
					<td align=center>";echo $baris4['email'];echo"</td>
					<td align=center>";echo $baris4['status_channel'];echo"</td>
					<td align=center>";echo $baris4['tgl_efektif'];echo"</td>
					<td align=center>";echo $baris4['tgl_akhir'];echo"</td>
					<tr>";
					}
					$hitung=mysql_query("select * from daftar_dealer b,kodepos c where b.id_kodepos = c.id_kodepos order by b.kode_dealer asc");
					$count8 = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count8++;
					}
                    ?>
                   
              
                </table>
            </div>
			</div>
			</div>
			</div>
            <div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number" required style="width:15%" min="0" name="page" max="<?php echo ceil($count8/10)?>" value="1"/><span>Dari <?php echo ceil($count8/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>

        </div>
		
				<div id="hd">   
          <h1>History Dealer</h1>
           <form id="form-search9" method="post">
		  <ul class="tab-group2">
        <li class="tab"><a href="#monitoring">Jumlah Dealer</a></li>
        
		<li class="tab"><a href="#dd">Detail Dealer</a></li>
		<li class="tab"><a href="#hd">History Dealer</a></li>
		
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
		  
			
		  
		  <button type="submit" class="button button-block"/>Search</button>
		 
		   <div class="result9">
		  <div class="outer">
		  <div class="inner">
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
                            Alamat
                        </td>
						<td>
                            Nama Pemilik
                        </td>
						<td>
                            No.Kontak
                        </td>
						<td>
                            Kelurahan
                        </td>
						<td>
                            Kecamatan
                        </td>
						<td>
                            Kabupaten/Kotamadya
                        </td>
						<td>
                            Propinsi
                        </td>
						<td>
                            Kode Pos
                        </td>
						<td>
                            Status Tanah
                        </td>
						<td>
                            Penanggung Jawab H1
                        </td>
						<td>
                            No.Fax H1
                        </td>
						<td>
                            Alamat Email Channel H1
                        </td>
						<td>
                            Status H1
                        </td>
						<td>
                            Begin Date H1
                        </td>
						<td>
                            End Date H1
                        </td>
						<td>
                            Penanggung Jawab H2
                        </td>
						<td>
                            No.Fax H2
                        </td>
						<td>
                            Alamat Email Channel H2
                        </td>
						<td>
                            Status H2
                        </td>
						<td>
                            Begin Date H2
                        </td>
						<td>
                            End Date H2
                        </td>
						<td>
                            Penanggung Jawab H3
                        </td>
						<td>
                            No.Fax H3
                        </td>
						<td>
                            Alamat Email Channel H3
                        </td>
						<td>
                            Status H3
                        </td>
						<td>
                            Begin Date H3
                        </td>
						<td>
                            End Date H3
                        </td>
						
                    </tr>
                     <?php
					$awal = date('Y-m-01');
					$akhir = date('Y-m-t');
					
					
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b,kodepos c,channel_h1 d,channel_h2 e,channel_h3 f where a.kode_dealer = b.kode_dealer and b.id_kodepos = c.id_kodepos and (b.kode_dealer = d.id_channel or b.kode_dealer = e.id_channel or b.kode_dealer = e.id_channel) order by a.kode_dealer asc ");
					$count9 = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count9++;
					}
                    ?>         
              
                </table>
            </div>
			</div>
			</div>
            <div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number" required style="width:15%" min="0" name="page" max="<?php echo ceil($count9/10)?>" value="1"/><span>Dari <?php echo ceil($count9/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>

        </div>

		
		<div id="adduser">   
          <h1>Menambah User</h1>
          <form name="nambah" action="submit_user.php" method="post" onSubmit="validate()"enctype="multipart/form-data">
         <div class="top-row">
          <div class="field-wrap">
              <label>
              Username :
            </label>
		  </div>
		  <div class="field-wrap"><input name="user"maxlength="20" type="text" required/>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Password :
            </label>
		  </div>
		  <div class="field-wrap"><input name="password"maxlength="10" type="password" required/>
          </div>
          </div>
          
          <div class="top-row">
          <div class="field-wrap">
              <label>
              Nama Lengkap :
            </label>
		  </div>
		  <div class="field-wrap"><input name="nama" maxlength="30" type="text" required/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Status <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select name = "status" required>
															<option value = "admin_h1">Admin Channel H1</option>
															<option value = "admin_h2">Admin Channel H2</option>
															<option value = "admin_h3">Admin Channel H3</option>
															<option value = "admin_sv_h1">Admin Super Visor H1</option>
															<option value = "admin_sv_h2">Admin Super Visor H2</option>
															<option value = "admin_sv_h3">Admin Super Visor H3</option>
															<option value = "admin_manager_h1">Admin Manager H1</option>
															<option value = "admin_manager_h2">Admin Manager H2</option>
															<option value = "admin_manager_h3">Admin Manager H3</option>
															<option value = "admin_divhead_h1">Admin Division Head H1</option>
															<option value = "admin_divhead_h2">Admin Division Head H1</option>
															<option value = "admin_divhead_h3">Admin Division Head H3</option>
														</select>
          </div>
          </div>
		  
		  <button type="submit" class="button button-block"/>Simpan</button>
          </form>
		  <form name="nambah" action="submit_ganti.php" method="post" onSubmit="validate()"enctype="multipart/form-data">
        
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
			
        </div>
      </div><!-- tab-content -->
      
</div> <!-- /form -->
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