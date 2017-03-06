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
    <title>Upgrade Channel Dealer</title>
    <link href='../css/css.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src='jquery-1.11.3-jquery.min.js'></script>
	

  <body>

    <div class="form">
      

        <div>
        <div id="pdd">   
          <h1>Upgrade Channel Dealer</h1>
          <form id="form-search" method="post">
          <div class="top-row">
          <div class="field-wrap">
            <label>
              Kode Dealer <span class="req">*</span>:
            </label>
		  </div>
		  <div class="field-wrap"><input name="kode_dealer" type="text" value=""/>
          </div>
          </div>
		  
		  
          <button type="submit" class="button button-block"/>Search</button>
		  
		  </form>
          <div class="field-wrap">
		  <div class="table" >
                <table class="result">
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and tanggal_pengajuan between '$awal' and '$akhir' order by tanggal_pengajuan desc");
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['a.approval_divhead']==null) echo "In Progress"; else echo "Acknowledged"; echo"</td>
					<td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='h1')echo"upgrade_dealer_h1.php?id=";else if($baris['channel']=='h2')echo"upgrade_dealer_h2.php?id="; echo ">Upgrade Channel Dealer</a></td></tr>";
					}
                    ?>
                </table>
            </div>
			<a class="button"href="index.php"/>Back</a>
		 
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