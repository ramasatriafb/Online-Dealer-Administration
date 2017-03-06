<?php
	include "../connect.php";
	$sql= "select * from daftar_dealer where status_dealer = 'Resmi' limit 0,10";
	if(!$_POST['kode_dealer']=="")
		$sqlkode = " and a.kode_dealer = '$_POST[kode_dealer]' ";
	else
		$sqlkode = " ";
	if(!$_POST['nama_dealer']=="")
		$sqlnama = " and b.nama_dealer = '$_POST[nama_dealer]' ";
	else
		$sqlnama = " ";
	if(!$_POST['channel']=="")
		$sqlchannel = " and a.channel = '$_POST[channel]' ";
	else
		$sqlchannel = " ";
	
	$page = ($_POST['page']-1)*10;
	$hasil=mysql_query($sql.$sqlkode.$sqlnama.$sqlchannel." limit ".$page.",10");
	echo '<div class="field-wrap">
	<table class="table">
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
                    </tr>';
					
	while ($baris = mysql_fetch_array($hasil)){
						$channelq = mysql_query("select channel from daftar_pengajuan where kode_dealer = '$baris[kode_dealer]' and legalisir_admin is not null and (a.jenis_pengajuan = 'Pengajuan Dealer Baru' or a.jenis_pengajuan = 'Upgrade Channel') order by tanggal_pengajuan desc");
					echo "
					<tr>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";while ($channel = mysql_fetch_array($channelq)) echo $channel['channel']." ";echo"</td>
					<td align=center><a href=hapus_dealer.php?id="; echo $baris['kode_dealer'];echo"&kode=";echo $baris['kode_dealer']; echo ' onclick="return confirm';echo"('Anda Yakin Ingin Memberhentikan Dealer ".$baris['nama_dealer']." ?')";echo'" >Berhentikan Dealer</a></td></tr>';
					}
	
	$hitung=mysql_query($sql.$sqlkode.$sqlnama.$sqlchannel);
	$count = 0;
	while ($an = mysql_fetch_array($hitung))
	{
		$count++;
	}
	echo '</table></div></div><div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number" style="width:15%" min="1" name="page" max="';if(ceil($count/10)==0)echo 1;else echo ceil($count/10); echo'" value="'.$_POST['page'].'"/><span>Dari '.ceil($count/10).' halaman</span>
          </div>
        </div>';
?>