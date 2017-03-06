<?php
	include "../connect.php";
	$sql= "select * from daftar_pengajuan a, daftar_dealer b ,kodepos c,channel_h1 d,channel_h2 e,channel_h3 f  where a.kode_dealer = b.kode_dealer and b.id_kodepos = c.id_kodepos and (b.kode_dealer = d.id_channel or b.kode_dealer = e.id_channel or b.kode_dealer = e.id_channel)";
	if(!$_POST['date_awal']=="" && !$_POST['date_akhir']=="")
		$sqltahun = " and waktu_legalisir between '$_POST[date_awal]' and '$_POST[date_akhir]' ";
		else 
		$sqltahun=" ";
	echo '<div class="field-wrap">
		  <div class="table" >
                <table>
                    <tr>
                        <td>
                            Dealer H1
                        </td>
                        <td >
                            Dealer H12
                        </td>
                        
						<td>
                            Dealer H2
                        </td>
						<td>
                            Dealer H23
                        </td>
						<td>
                            Dealer H3
                        </td>
						<td>
                            Dealer H123
                        </td>
						<td>
                            Jumlah Dealer
                        </td>
						<td>
                            Dealer H1 Tetap
                        </td>
						<td>
                            Dealer H1 TA
                        </td>
						<td>
                            Dealer H2 Tetap
                        </td>
						<td>
                            Dealer H2 TA
                        </td>
						<td>
                            Dealer H3 Tetap
                        </td>
						
                    </tr>';
					
	$barish1 = mysql_query("select count(*) from channel_h1 a,daftar_dealer b , daftar_pengajuan c where a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and b.status_dealer = 'Resmi' and c.legalisir_admin is not null ".$sqltahun);
					$barish1_ = mysql_fetch_row($barish1);
					$barish12 = mysql_query("select count(*) from channel_h1 a,channel_h2 b,daftar_dealer c ,daftar_pengajuan d where a.id_channel = b.id_channel and a.id_channel = c.kode_dealer and a.id_channel = d.kode_dealer and d.legalisir_admin is not null and c.status_dealer = 'Resmi' ".$sqltahun);
					$barish12_ = mysql_fetch_row($barish12);
					$barish2 = mysql_query("select count(*) from channel_h2 a,daftar_dealer b, daftar_pengajuan c where a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and b.status_dealer = 'Resmi' and c.legalisir_admin is not null ".$sqltahun);
					$barish2_ = mysql_fetch_row($barish2);
					$barish23 = mysql_query("select count(*) from channel_h2 a,channel_h3 b,daftar_dealer c,daftar_pengajuan d where a.id_channel = b.id_channel and a.id_channel = c.kode_dealer and a.id_channel = d.kode_dealer and d.legalisir_admin is not null and c.status_dealer = 'Resmi' ".$sqltahun);
					$barish23_ = mysql_fetch_row($barish23);
					$barish3 = mysql_query("select count(*) from channel_h3 a,daftar_dealer b,daftar_pengajuan c where a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and b.status_dealer = 'Resmi' and c.legalisir_admin is not null ".$sqltahun);
					$barish3_ = mysql_fetch_row($barish3);
					$barish123 = mysql_query("select count(*) from channel_h1 a,channel_h2 b,channel_h3 c,daftar_dealer d,daftar_pengajuan e where a.id_channel = b.id_channel and e.legalisir_admin is not null and a.id_channel = c.id_channel and a.id_channel = d.kode_dealer and a.id_channel = e.kode_dealer and d.status_dealer = 'Resmi' ".$sqltahun);
					$barish123_ = mysql_fetch_row($barish123);
					$barishtot = mysql_query("select count(*) from daftar_pengajuan a , daftar_dealer b where a.kode_dealer = b.kode_dealer and b.status_dealer = 'Resmi' and a.legalisir_admin is not null ".$sqltahun);
					$barishtot_ = mysql_fetch_row($barishtot);
					$barish1tetap = mysql_query("select count(*) from channel_h1 a,daftar_dealer b,daftar_pengajuan c where c.legalisir_admin is not null and a.id_channel = b.kode_dealer and a.status_channel='Tetap' and b.status_dealer = 'Resmi' ".$sqltahun);
					$barish1tetap_ = mysql_fetch_row($barish1tetap);
					$barish1ta = mysql_query("select count(*) from channel_h1 a,daftar_dealer b, daftar_pengajuan c where c.legalisir_admin is not null and  a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and a.status_channel='Percobaan' and b.status_dealer = 'Resmi' ".$sqltahun);
					$barish1ta_ = mysql_fetch_row($barish1ta);
					$barish2tetap = mysql_query("select count(*) from channel_h2 a ,daftar_dealer b, daftar_pengajuan c where c.legalisir_admin is not null and a.id_channel = b.kode_dealer and a.status_channel='Tetap' and b.status_dealer = 'Resmi' ".$sqltahun);
					$barish2tetap_ = mysql_fetch_row($barish2tetap);
					$barish2ta = mysql_query("select count(*) from channel_h2 a,daftar_dealer b, daftar_pengajuan c where c.legalisir_admin is not null and  a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and a.status_channel='Percobaan' and b.status_dealer = 'Resmi' ".$sqltahun);
					$barish2ta_ = mysql_fetch_row($barish2ta);
					$barish3tetap = mysql_query("select count(*) from channel_h3 a,daftar_dealer b, daftar_pengajuan c where c.legalisir_admin is not null and  a.id_channel = b.kode_dealer and a.id_channel = c.kode_dealer and a.status_channel='Tetap' and b.status_dealer = 'Resmi' ".$sqltahun);
					$barish3tetap_ = mysql_fetch_row($barish3tetap);
									
					
					
					echo "
					<tr>
					<td align=center>";echo "".$barish1_[0];echo"</td>
					<td align=center>";echo "".$barish12_[0];echo"</td>
					<td align=center>";echo "".$barish2_[0];echo"</td>
					<td align=center>";echo "".$barish23_[0];echo"</td>
					<td align=center>";echo "".$barish3_[0];echo"</td>
					<td align=center>";echo "".$barish123_[0];echo"</td>
					<td align=center>";echo "".$barishtot_[0];echo"</td>
					<td align=center>";echo "".$barish1tetap_[0];echo"</td>
					<td align=center>";echo "".$barish1ta_[0];echo"</td>
					<td align=center>";echo "".$barish2tetap_[0];echo"</td>
					<td align=center>";echo "".$barish2ta_[0];echo"</td>
					<td align=center>";echo "".$barish3tetap_[0];echo"</td>
					
					
					</tr>";
					
	
	
	echo '</table>';
?>