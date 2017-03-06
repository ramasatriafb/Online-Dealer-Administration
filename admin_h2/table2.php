<?php
	include "../connect.php";
	$sql= "select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.channel = 'h2' and a.legalisir_admin is null";
	if(!$_POST['date_awal']=="" && !$_POST['date_akhir']=="")
		$sqltanggal = " and tanggal_pengajuan between '$_POST[date_awal]' and '$_POST[date_akhir]' ";
	else 
		$sqltanggal=" ";
	if(!$_POST['jenis_pengajuan']=="")
		$sqljenis = " and a.jenis_pengajuan = '$_POST[jenis_pengajuan]' "; 
	else 
		$sqljenis = "and (jenis_pengajuan = 'Pengajuan Dealer Baru' or jenis_pengajuan = 'Upgrade Channel')";
	if(!$_POST['kode_dealer']=="")
		$sqlkode = " and a.kode_dealer = '$_POST[kode_dealer]' ";
	else
		$sqlkode = " ";
	if(!$_POST['nama_dealer']=="")
		$sqlnama = " and b.nama_dealer = '$_POST[nama_dealer]' ";
	else
		$sqlnama = " ";
	if($_POST['status']=="progress")
		$sqlstatus = " and a.approval_divhead is null ";
	else if($_POST['status']=="acknowledged")
		$sqlstatus = " and a.approval_divhead = 'Setuju' ";
	else
		$sqlstatus = " ";
		$page = ($_POST['page']-1)*10;
	$hasil=mysql_query($sql.$sqltanggal.$sqljenis.$sqlkode.$sqlnama.$sqlstatus." order by tanggal_pengajuan desc limit ".$page.",10");
	echo '<div class="field-wrap">
	<table class="table">
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
		<td align=center>";if($baris['comment_sv']==null||$baris['approval_sv']==null||$baris['comment_manager']==null||$baris['approval_manager']==null||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "In Progress"; else echo "Acknowledged"; echo"</td>
		<td align=center>";echo $baris['channel'];echo"</td>
		<td align=center><a href=edit_dealer_h2.php?id="; echo $baris['id_daftar']; echo ">Edit</a> <a href=hapus_dealer_h2.php?id="; echo $baris['id_daftar'];echo"&kode=";echo $baris['kode_dealer']; echo ' onclick="return confirm';echo"('Anda Yakin Ingin Menghapus Pengajuan Dealer ".$baris['nama_dealer']." ?')";echo'" >Hapus</a></td></tr>';
	}
	$hitung=mysql_query($sql.$sqltanggal.$sqljenis.$sqlkode.$sqlnama.$sqlstatus." order by tanggal_pengajuan desc");
	$count1 = 0;
	while ($an = mysql_fetch_array($hitung))
	{
		$count1++;
	}
	echo '</table></div></div><div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number" style="width:15%" min="1" name="page" max="';if(ceil($count1/10)==0)echo 1;else echo ceil($count1/10); echo'" value="'.$_POST['page'].'"/><span>Dari '.ceil($count1/10).' halaman</span>
          </div>
        </div>';
?>