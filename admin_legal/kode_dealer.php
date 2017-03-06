<?php
if(!isset($_SESSION)) {
     session_start();
}
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
			var kode_dealer = $("#kode_dealer").val();
			var nama_dealer = $("#nama_dealer").val();
			var page = $("#page").val();
			var dataString = 'kode_dealer='+ kode_dealer + '&nama_dealer='+ nama_dealer + '&page='+ page;
			$.ajax({
            type : 'POST',
            url  : 'table10.php',
            data : dataString,
            success :  function(data)
            {		
            	$(".result").html(data);
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
	
    function select_kode_dealer()
	{
		targetitem = document.getElementsByName("inputcek[]");
		top.close();
		return false;
	}
    </script>
    
    
  </head>

  <body>

    <div class="form">
    <div class="tab-content">
	  <div id="pdd">   
          <h1>Daftar Dealer</h1>
          
          <form id="form-search" method="post">
           <div class="top-row">
          <div class="field-wrap">
            <label>
              Kode Dealer :
            </label>
		  </div>
		  <div class="field-wrap"><input id="kode_dealer" name="kode_dealer" type="text" value=""/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Nama Dealer :
            </label>
          </div>
		  <div class="field-wrap">
            <input id="nama_dealer" name="nama_dealer" type="text" value=""/>
          </div>
          </div>
          <button id="cari" type="button" class="button button-block"/>Search</button>
          <button id="submit" type="button" class="button button-block" onclick="select_kode_dealer()"/>Submit</button>
           <div class="result">
		  <div class="field-wrap">
		  <div class="table" >
                <table>
                    <tr>
						<td style="width:50px">
						<input type="checkbox" name="cek" id="cek" onClick="fcek()"/>
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
					$hasil=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.channel = '$_GET[channel]' order by a.kode_dealer desc limit 0,10");
					while ($baris = mysql_fetch_array($hasil)){
					echo '
					<tr>
					<td style="width:50px">
						<input type="checkbox" name="inputcek[]" value="'.$baris['id_daftar'].'" />
                        </td>
					<td align=center>';echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat Rincian</a></td></tr>";
					}
					$hitung=mysql_query("select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.channel = '$_GET[channel]' order by a.kode_dealer desc");
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
          <input id="page" type="number" required style="width:25%" min="1" name="page" max="<?php echo ceil($count/10)?>" value="1"/><span>Dari <?php echo ceil($count/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>

        </div>
      
</div> <!-- /form -->
    
   <script src='../js/jquery.min.js'></script>
    <script src="js/index.js"></script>

    
    
    
  </body>
</html>