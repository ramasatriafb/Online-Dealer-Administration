<?php
	include "../connect.php";
	$sql= "select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer ";
	
	if(!$_POST['kode_dealer']=="")
		$sqlkode = " and a.kode_dealer = '$_POST[kode_dealer]' ";
	else
		$sqlkode = " ";
	if(!$_POST['nama_dealer']=="")
		$sqlnama = " and b.nama_dealer = '$_POST[nama_dealer]' ";
	else
		$sqlnama = " ";
	
	
	$page = ($_POST['page']-1)*10;
	$hasil=mysql_query($sql.$sqlkode.$sqlnama." order by a.kode_dealer desc limit ".$page.",10");
	echo '<div class="result">
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
           ';
		
	while ($baris = mysql_fetch_array($hasil)){
					echo '
					<tr>
					<td style="width:50px">
						<input type="checkbox" name="cek" id="cek" onClick="fcek()"/>
                        </td>
					<td align=center>';echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat Rincian</a></td></tr>";
					}
					
	$hitung=mysql_query($sql.$sqlkode.$sqlnama." order by tanggal_pengajuan desc");
	$count4 = 0;
	while ($an = mysql_fetch_array($hitung))
	{
		$count4++;
	}
	echo '</table></div></div><div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number" style="width:15%" min="1" name="page" max="';if(ceil($count4/10)==0)echo 1;else echo ceil($count4/10); echo'" value="'.$_POST['page'].'"/><span>Dari '.ceil($count4/10).' halaman</span>
          </div>
        </div>';
?>