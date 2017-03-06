<?php
	include "../connect.php";
	$sql= "select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer and a.comment_sv is not null and a.approval_sv ='Setuju' and a.comment_manager is not null and a.approval_manager = 'Setuju' and a.comment_divhead is null and a.approval_divhead is null and a.channel= 'h1' and a.nama_divhead='$_SESSION[nama]'";
	$date_awal = $_POST['date_awal'];
	$date_akhir = $_POST['date_akhir'];
	$jenis_pengajuan = $_POST['jenis_pengajuan'];
	$kode_dealer = $_POST['kode_dealer'];
	$nama_dealer = $_POST['nama_dealer'];
	if(!$date_awal=="" && !$date_akhir=="")
		$sqltanggal = " and tanggal_pengajuan between '$date_awal' and '$date_akhir' ";
	else 
		$sqltanggal=" ";
	if(!$jenis_pengajuan=="")
		$sqljenis = " and a.jenis_pengajuan = '$jenis_pengajuan' "; 
	else 
		$sqljenis = " ";
	if(!$kode_dealer=="")
		$sqlkode = " and a.kode_dealer = '$kode_dealer' ";
	else
		$sqlkode = " ";
	if(!$nama_dealer=="")
		$sqlnama = " and b.nama_dealer = '$_POST[nama_dealer]' ";
	else
		$sqlnama = " ";
	
	$page = ($_POST['page']-1)*10;
	$hasil=mysql_query($sql.$sqltanggal.$sqljenis.$sqlkode.$sqlnama."order by tanggal_pengajuan desc limit ".$page.",10");
	 
	echo '<div class="field-wrap">
			<div class="table">
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
                    </tr>';
					
	while ($baris = mysql_fetch_array($hasil)){
		echo '
		<tr>
					<td style="width:50px">
						<input type="checkbox" name="inputcek[]" value="'.$baris['id_daftar'].'" />
        </td>'."
		<td align=center>";echo $baris['tanggal_pengajuan'];echo"</td>
		<td align=center>";echo $baris['jenis_pengajuan'];echo"</td>
		<td align=center>";echo $baris['kode_dealer'];echo"</td>
		<td align=center>";echo $baris['nama_dealer'];echo"</td>
		<td align=center>";if($baris['comment_sv']||$baris['approval_sv']||$baris['comment_manager']||$baris['approval_manager']||$baris['comment_divhead']==null||$baris['approval_divhead']==null) echo "Need Approval"; else echo "Acknowledged"; echo"</td>
		<td align=center>";echo $baris['channel'];echo"</td>
		<td align=center><a href=";if($baris['jenis_pengajuan']=='Pemberhentian Dealer')echo"rincian_dealer.php?id=";else if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat Rincian</a></td></tr>";
		
	}
	$hitung=mysql_query($sql.$sqltanggal.$sqljenis.$sqlkode.$sqlnama." order by tanggal_pengajuan desc");
	$count = 0;
	while ($an = mysql_fetch_array($hitung))
	{
		$count++;
	}
	echo '</table></div></div><div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number" style="width:15%" min="1" name="page" id="page" max="';if(ceil($count/10)==0)echo 1;else echo ceil($count/10); echo'" value="'.$_POST['page'].'"/><span>Dari '.ceil($count/10).' halaman</span>
          </div>
        </div>';
?>