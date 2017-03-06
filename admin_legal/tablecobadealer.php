<?php
	include "../connect.php";
	$sql= "select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.legalisir_admin = 'Complete' and (a.jenis_pengajuan = 'Pengajuan Dealer Baru' or a.jenis_pengajuan = 'Upgrade Channel') and a.status_channel = 'Percobaan'";
	if(!$_POST['date_awal']=="" && !$_POST['date_akhir']=="")
		$sqltanggal = " and tanggal_pengajuan between '$_POST[date_awal]' and '$_POST[date_akhir]' ";
	else 
		$sqltanggal=" ";
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
	$hasil=mysql_query($sql.$sqltanggal.$sqlkode.$sqlnama.$sqlchannel." order by tanggal_pengajuan desc limit ".$page.",10");
	echo '<div class="field-wrap">
	<table class="table">
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
                    </tr>';
					
	while ($baris = mysql_fetch_array($hasil)){
		echo "
		<tr>
		<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
		<td align=center>";echo $baris['kode_dealer'];echo"</td>
		<td align=center>";echo $baris['nama_dealer'];echo"</td>
		<td align=center>";echo "Acknowledged"; echo"</td>
		<td align=center>";echo $baris['channel'];echo"</td>
		<td align=center><a href=";if($baris['channel']=='H1')echo"angkat_h1.php?id=";else if($baris['channel']=='H2')echo"angkat_h2.php?id=";else if($baris['channel']=='H3')echo"angkat_h3.php?id="; echo $baris['id_daftar']; echo ">Angkat Dealer</a></td></tr>";
	}
	
	$hitung=mysql_query($sql.$sqltanggal.$sqlkode.$sqlnama.$sqlchannel." order by tanggal_pengajuan desc");
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