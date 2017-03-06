<?php
	include "../connect.php";
	$i=0;
	echo count($_POST['id_daftar']);
	while($i < count($_POST['id_daftar'])){
	$sql= "select * from daftar_pengajuan a, daftar_dealer b where a.kode_dealer = b.kode_dealer ";
	$sqlkode = " and a.id_daftar = '$_POST[id_daftar][$i]' ";
	$hasil=mysql_query($sql.$sqlkode);
	$baris = mysql_fetch_array($hasil);
					echo '
					<td style="width:50px">
						<input type="checkbox" name="cek" id="cek" onClick="fcek()"/>
                        </td>
					<td align=center>';echo $baris['tanggal_pengajuan'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['kode_dealer'];echo"</td>
					<td align=center>";echo $baris['channel'];echo"</td>
					<td align=center><a href=";if($baris['channel']=='H1')echo"rincian_dealer_h1_.php?id=";else if($baris['channel']=='H2')echo"rincian_dealer_h2_.php?id=";else if($baris['channel']=='H3')echo"rincian_dealer_h3_.php?id="; echo $baris['id_daftar']; echo ">Lihat Rincian</a></td></tr><tr>";
					$i++;
	}

?>