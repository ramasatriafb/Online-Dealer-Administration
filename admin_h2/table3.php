<?php
	include "../connect.php";
	$sql= "select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.legalisir_admin = 'Complete'";
	if(!$_POST['date_awal']=="" && !$_POST['date_akhir']=="")
		$sqltanggal = " and tanggal_pengajuan between '$_POST[date_awal]' and '$_POST[date_akhir]' ";
	else 
		$sqltanggal=" ";
	if(!$_POST['jenis_pengajuan']=="")
		$sqljenis = " and a.jenis_pengajuan = '$_POST[jenis_pengajuan]' "; 
	else 
		$sqljenis = " ";
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
		$sqlchannel = " and (a.channel = 'h1' or a.channel = 'h3')";
	$page = ($_POST['page']-1)*10;
	$hasil =mysql_query($sql.$sqltanggal.$sqljenis.$sqlkode.$sqlnama.$sqlchannel." and approval_sv = 'Setuju' and approval_manager = 'Setuju' and approval_divhead = 'Setuju' order by tanggal_pengajuan desc limit ".$page.",10");
	echo '<div class="field-wrap">
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
                    </tr>';
	while ($baris = mysql_fetch_array($hasil)){
	echo "
	<tr>
		<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
		<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
		<td align=center>";echo $baris['kode_dealer'];echo"</td>
		<td align=center>";echo $baris['nama_dealer'];echo"</td>
		<td align=center>Acknowledged</td>
		<td align=center>";echo $baris['channel'];echo"</td>
		<td align=center><a href=upgrade_dealer_h2.php?id="; echo $baris['id_daftar']; echo ">Upgrade Channel Dealer</a></td></tr>";
	}
	$hitung=mysql_query($sql.$sqltanggal.$sqljenis.$sqlkode.$sqlnama.$sqlchannel." and approval_sv = 'Setuju' and approval_manager = 'Setuju' and approval_divhead = 'Setuju' and a.legalisir_admin = 'Complete' order by tanggal_pengajuan desc");
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