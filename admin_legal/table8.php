<?php
	include "../connect.php";
	$sql= "select * from daftar_dealer b,kodepos c where b.id_kodepos = c.id_kodepos";
	
	
	if(!$_POST['kode_dealer']=="")
		$sqlkode = " and b.kode_dealer = '$_POST[kode_dealer]' ";
	else
		$sqlkode = " ";
	if(!$_POST['kota']=="")
		$sqlkota = " and c.kabupaten = '$_POST[kota]' ";
	else
		$sqlkota = " ";
	
	
	$page = ($_POST['page']-1)*10;
	$hasil=mysql_query($sql.$sqlkode.$sqlkota." order by b.kode_dealer asc limit ".$page.",10");
	echo '<div class="field-wrap">
		  <div class="outer">
		  <div class="inner">
		  <div class="table" >
                <table>
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
                            Alamat
                        </td>
						<td>
                            Nama Pemilik
                        </td>
						<td>
                            No.Kontak
                        </td>
						<td>
                            Kelurahan
                        </td>
						<td>
                            Kecamatan
                        </td>
						<td>
                            Kabupaten/Kotamadya
                        </td>
						<td>
                            Propinsi
                        </td>
						<td>
                            Kode Pos
                        </td>
						<td>
                            Status Tanah
                        </td>
						<td>
                            Penanggung Jawab H1
                        </td>
						<td>
                            No.Fax H1
                        </td>
						<td>
                            Alamat Email Channel H1
                        </td>
						<td>
                            Status H1
                        </td>
						<td>
                            Begin Date H1
                        </td>
						<td>
                            End Date H1
                        </td>
						<td>
                            Penanggung Jawab H2
                        </td>
						<td>
                            No.Fax H2
                        </td>
						<td>
                            Alamat Email Channel H2
                        </td>
						<td>
                            Status H2
                        </td>
						<td>
                            Begin Date H2
                        </td>
						<td>
                            End Date H2
                        </td>
						<td>
                            Penanggung Jawab H3
                        </td>
						<td>
                            No.Fax H3
                        </td>
						<td>
                            Alamat Email Channel H3
                        </td>
						<td>
                            Status H3
                        </td>
						<td>
                            Begin Date H3
                        </td>
						<td>
                            End Date H3
                        </td>
						
                    </tr>
          ';
					
	while ($baris1 = mysql_fetch_array($hasil)){
					$hasilc1=mysql_query("select * from  channel_h1 where id_channel = '$baris1[kode_dealer]' order by id_channel asc limit 0,10");
					$hasilc2=mysql_query("select * from  channel_h2 where id_channel = '$baris1[kode_dealer]' order by id_channel asc limit 0,10");
					$hasilc3=mysql_query("select * from  channel_h3 where id_channel = '$baris1[kode_dealer]' order by id_channel asc limit 0,10");
					$baris2 = mysql_fetch_array($hasilc1);
					$baris3 = mysql_fetch_array($hasilc2);
					$baris4 = mysql_fetch_array($hasilc3);
					$channel = "";
					echo "
					<tr>
					<td align=center>";echo $baris1['kode_dealer'];echo"</td>
					<td align=center>";echo $baris1['nama_dealer'];echo"</td>
					<td align=center>";if(!$baris2['pj']=='')$channel = $channel."H1 ";else if(!$baris3['pj']=='')$channel = $channel."H2 ";else if(!$baris4['pj']=='')$channel = $channel."H3 ";echo $channel;echo"</td>
					<td align=center>";echo $baris1['lokasi'];echo"</td>
					<td align=center>";echo $baris1['owner'];echo"</td>
					<td align=center>";echo $baris1['kontak'];echo"</td>
					<td align=center>";echo $baris1['kelurahan'];echo"</td>
					<td align=center>";echo $baris1['kecamatan'];echo"</td>
					<td align=center>";echo $baris1['kabupaten'];echo"</td>
					<td align=center>";echo $baris1['propinsi'];echo"</td>
					<td align=center>";echo $baris1['kodepos'];echo"</td>
					<td align=center>";echo $baris1['status_tanah'];echo"</td>
					<td align=center>";echo $baris2['pj'] ;echo"</td>
					<td align=center>";echo $baris2['no_fax'];echo"</td>
					<td align=center>";echo $baris2['email'];echo"</td>
					<td align=center>";echo $baris2['status_channel'];echo"</td>
					<td align=center>";echo $baris2['tgl_efektif'];echo"</td>
					<td align=center>";echo $baris2['tgl_akhir'];echo"</td>
					<td align=center>";echo $baris3['pj'];echo"</td>
					<td align=center>";echo $baris3['no_fax'];echo"</td>
					<td align=center>";echo $baris3['email'];echo"</td>
					<td align=center>";echo $baris3['status_channel'];echo"</td>
					<td align=center>";echo $baris3['tgl_efektif'];echo"</td>
					<td align=center>";echo $baris3['tgl_akhir'];echo"</td>
					<td align=center>";echo $baris4['pj'];echo"</td>
					<td align=center>";echo $baris4['no_fax'];echo"</td>
					<td align=center>";echo $baris4['email'];echo"</td>
					<td align=center>";echo $baris4['status_channel'];echo"</td>
					<td align=center>";echo $baris4['tgl_efektif'];echo"</td>
					<td align=center>";echo $baris4['tgl_akhir'];echo"</td>
					<tr>";
	
	}
	
	$hitung=mysql_query("select * from daftar_dealer b,kodepos c where b.id_kodepos = c.id_kodepos order by b.kode_dealer asc");
					$count8 = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count8++;
					}
                    
	echo '</table></div></div></div><div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number" style="width:15%" min="1" name="page" max="';if(ceil($count8/10)==0)echo 1;else echo ceil($count8/10); echo'" value="'.$_POST['page'].'"/><span>Dari '.ceil($count8/10).' halaman</span>
          </div>
        </div>';
?>