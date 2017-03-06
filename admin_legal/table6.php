<?php
	include "../connect.php";
	$sql= "select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.jenis_pengajuan = 'Perpanjangan Dealer Tetap'";
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
	if($_POST['status']=="progress")
		$sqlstatus = " and a.approval_divhead is null ";
	else if($_POST['status']=="acknowledged")
		$sqlstatus = " and a.approval_divhead = 'Setuju' ";
	else
		$sqlstatus = " ";
	$page = ($_POST['page']-1)*10;
	$hasil=mysql_query($sql.$sqltanggal.$sqlkode.$sqlnama.$sqlchannel.$sqlstatus." order by tanggal_pengajuan desc limit ".$page.",10");
	echo '<div class="field-wrap">
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
                    </tr>';
		
	while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['nama_dealer'];echo"</td>
					<td align=center>";if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress"; else echo "Acknowledged"; echo"</td>
					<td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat </a><a href=hapus_pengajuan.php?id=".$baris['id_daftar'].' onclick="return confirm';echo"('Anda Yakin Ingin Menghapus Pengajuan Dealer ".$baris['nama_dealer']." ?')".'">Hapus</a></td></tr>';
	}
	$hitung=mysql_query($sql.$sqltanggal.$sqlkode.$sqlnama.$sqlchannel.$sqlstatus." order by tanggal_pengajuan desc");
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