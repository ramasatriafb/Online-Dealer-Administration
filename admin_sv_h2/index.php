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
    {	$('#cari').click(function(){
			var date_awal = $("#date_awal").val();
			var date_akhir = $("#date_akhir").val();
			var jenis_pengajuan = $("#jenis_pengajuan").val();
			var kode_dealer = $("#kode_dealer").val();
			var nama_dealer = $("#nama_dealer").val();
			var page = $("#page").val();
			var dataString = 'date_awal='+ date_awal + '&date_akhir='+ date_akhir + '&jenis_pengajuan='+ jenis_pengajuan + '&kode_dealer='+ kode_dealer + '&nama_dealer='+ nama_dealer + '&page='+ page;
            $.ajax({
            type : 'POST',
            url  : 'table1.php',
            data : dataString,
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
    
    
    
  </head>

  <body>

    <div class="form">
       <div align="right">
	<a style="color:#00F"> Welcome, <?php echo ($_SESSION['nama']) ?></a>
	  <a href="../login/logout.php" onclick="return confirm('Anda Yakin Logout dari Sistem?')">[LogOut]</a></div>
			
      <ul class="tab-group">
        <li class="tab active"><a href="#pdd">Entry Data Dealer Baru</a></li>
        
		<li class="tab"><a href="#pdb">Pengajuan Dealer Baru</a></li>
		<li class="tab"><a href="#gp">Ganti Password</a></li>
		
      </ul>
      

      <div class="tab-content">
        <div id="pdd">   
          <h1>Pengajuan Dealer Baru / Upgrade Channel Dealer</h1>
          
          <form id="form-search" method="post" action="submit_h2.php">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Periode Pengajuan :
              </label>
            </div>
              <div class="field-wrap">
                <input type="date" id="date_awal" value=""/>
              </div>
              <div class="field-wrap">
              <input type="date" id="date_akhir" value=""/>
            </div>
          </div>
		  
			<div class="top-row">
          <div class="field-wrap">
            <label>
              Jenis Pengajuan :
            </label>
		  </div>
		  <div class="field-wrap">
            
            <select id = "jenis_pengajuan">
															<option value = "" >ALL</option>
															<option value = "Pengajuan Dealer Baru">Pengajuan Dealer Baru</option>
															<option value = "Upgrade Channel">Upgrade Channel</option>
															<option value = "Pengangkatan Dealer Tetap">Pengangkatan Dealer Tetap</option>
															<option value = "Pemberhentian Dealer">Pemberhentian Dealer </option>
															<option value = "Perpanjangan Masa Percobaan Dealer">Perpanjangan Masa Percobaan Dealer </option>
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
		  <div class="field-wrap"><input id="kode_dealer" type="text" value=""/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Nama Dealer :
            </label>
          </div>
		  <div class="field-wrap">
            <input id="nama_dealer" type="text" value=""/>
          </div>
          </div>
		  <button id="cari" type="button" class="button button-block"/>Search</button>
            
            <div class="top-row">
          <div class="field-wrap">
            <label>
              Comment :
            </label>
          </div>
		  <div class="field-wrap">
            <input id="comment_sv" name="comment_sv" type="text" value=""/>
          </div>
          </div>
		  <div class="top-row">
          <div class="field-wrap">
              <label>
              Persetujuan <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><select id="approval_sv" name = "approval_sv">
																<option value = "Setuju" selected>Setuju</option>
															<option value = "Tidak Setuju">Tidak Setuju</option>
															</select>
          </div>
          </div>
			<button id="send" type="submit" class="button button-block"/>Submit</button>
		   <div class="result">
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.comment_sv is null and a.approval_sv is null and a.comment_manager is null and a.approval_manager is null and a.comment_divhead is null and a.approval_divhead is null and a.channel='h2' and a.nama_sv='$_SESSION[nama]' order by tanggal_pengajuan desc limit 0,10");
					
					while ($baris = mysql_fetch_array($hasil)){
					echo '
					<tr>
					<td style="width:50px">
						<input type="checkbox" name="inputcek[]" value="'.$baris['id_daftar'].'" />
                    </td>
					<td align=center>';echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['comment_sv']||$baris['approval_sv']||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "Need Approval"; else echo "Acknowledged"; echo"</td>
					<td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['jenis_pengajuan']=='Pemberhentian Dealer')echo"rincian_dealer.php?id=";else if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat Rincian</a></td></tr>";

					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.comment_sv is null and a.approval_sv is null and a.comment_manager is null and a.approval_manager is null and a.comment_divhead is null and a.approval_divhead is null and a.channel='h2' order by tanggal_pengajuan desc");
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
          <input type="number"required  style="width:15%" min="1" name="page" id="page" max="<?php echo ceil($count/10)?>" value="1"/><span>Dari <?php echo ceil($count/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>

        </div>
        
        <div id="pdb">   
          <h1>Pengajuan Data Dealer</h1>
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
															<option value = "Pemberhentian Dealer">Pemberhentian Dealer </option>
															<option value = "Perpanjangan Masa Percobaan Dealer">Perpanjangan Masa Percobaan Dealer </option>
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer order by tanggal_pengajuan desc  limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['approval_sv']=='Tidak Setuju'||$baris['approval_manager']=='Tidak Setuju'||$baris['approval_divhead']=='Tidak Setuju') echo "Rejected"; else if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress";else echo "Acknowledged"; echo"</td>
          <td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['jenis_pengajuan']=='Pemberhentian Dealer')echo"rincian_dealer.php?id=";else if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat Rincian</a></td></tr>";
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