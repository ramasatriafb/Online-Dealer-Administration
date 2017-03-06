<?php
	include "../connect.php";
	$sql= "select * from kodepos where";
	if(!$_POST['kodepos']=="")
		$sqlkodepos = " and kodepos = '$_POST[kodepos]' "; 
	else 
		$sqlkodepos = " ";
	if(!$_POST['kelurahan']=="")
		$sqlkelurahan = " and kelurahan = '$_POST[kode_dealer]' ";
	else
		$sqlkelurahan = " ";
	if(!$_POST['kecamatan']=="")
		$sqlkecamatan = " and kecamatan = '$_POST[nama_dealer]' ";
	else
		$sqlkecamatan = " ";
	if(!$_POST['kabupaten']=="")
		$sqlkabupaten = " and kabupaten = '$_POST[channel]' ";
	else
		$sqlkabupaten = " ";
	$page = ($_POST['page']-1)*10;	
	$hasil=mysql_query($sql.$sqlkodepos.$sqlkelurahan.$sqlkecamatan.$sqlkabupaten." limit ".$page.",10");
	echo '<div class="field-wrap">
		  <div class="table" >
                <table>
                    <tr>
                        <td>
                            Kodepos
                        </td>
                        <td >
                            Kelurahan
                        </td>
                        <td>
                            Kecamatan
                        </td>
						<td>
                            Kabupaten / Kotamadya
                        </td>
						<td>
                            Propinsi
                        </td>
						<td>
                            Action
                        </td>
                    </tr>';
					
	while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['kodepos'];echo"</td>
					<td align=center>";echo $baris['kelurahan'];echo"</td>
					<td align=center>";echo $baris['kecamatan'];echo"</td>
					<td align=center>";echo $baris['kabupaten'];echo"</td>
					<td align=center>";echo $baris['propinsi'];echo'</td>
					<td align=center><a href="" onclick="'.'return select_kodepos("'.$baris['kodepos'].'");>Pilih</a></td></tr>';
	
	}
	$hitung=mysql_query($sql.$sqlkodepos.$sqlkelurahan.$sqlkecamatan.$sqlkabupaten);
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