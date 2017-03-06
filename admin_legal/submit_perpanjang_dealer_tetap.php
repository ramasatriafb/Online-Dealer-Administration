<?php
if(!isset($_SESSION)) {
     session_start();
}
echo'
<html>
<head>
	<title>DAFTAR PERPANJANGAN DEALER</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body><div align="left">
<p>Main Dealer : M2Z - PT MITRA PINASTHIKA MULIA-SBY</p>
<p> No.Surat : '.$_POST['no_surat'].' </p>
<p> Tahun :  '.date("Y").' </p></div>

	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
        	<th rowspan="1">No</th>
            <th>Kode Dealer</th>
            <th>Nama Dealer</th>
            <th>Propinsi</th>
            <th>Kabupaten/Kota Madya</th>
            <th>Alamat Dealer</th>
            <th>Pemilik</th>
            <th>Channel</th>
        </tr>';
	include "../connect.php";
	$date = date('Y-m-d');
	$time = date('H:i:s');
	$datetime = date('Y-m-d H:i:s');
	$i=0;
	$id = $_POST['inputcek'];
	while($i<count($_POST['inputcek'])){
	$query = mysql_fetch_array(mysql_query("select * from daftar_pengajuan where id_daftar='$id[$i]'"));
	$data = mysql_fetch_array(mysql_query("select * from daftar_pengajuan a, daftar_dealer b, kodepos c where a.kode_dealer = b.kode_dealer and b.id_kodepos = c.id_kodepos and a.id_daftar='$id[$i]'"));
					echo "
					<tr>
					<td align=center>";echo $i+1;echo"</td>
					<td align=center>";echo $data['kode_dealer'];echo"</td>
					<td align=center>";echo $data['nama_dealer'];echo"</td>
					<td align=center>";echo $data['propinsi'];echo"</td>
					<td align=center>";echo $data['kabupaten'];echo"</td>
					<td align=center>";echo $data['lokasi'];echo"</td>
					<td align=center>";echo $data['owner'];echo"</td>
					<td align=center>";echo $data['channel'];echo"</td></tr>";
	
	$sql =mysql_query("INSERT INTO daftar_pengajuan ( id_admin, kode_dealer, tanggal_pengajuan, jenis_pengajuan, channel, status_channel, jam_pengajuan, nama_sv, nama_manager, nama_divhead, perpanjangan ) VALUES ('$_SESSION[id_admin]', '$query[kode_dealer]', '$date', 'Perpanjangan Dealer Tetap', '$query[channel]', 'Tetap', '$time', '$query[nama_sv]', '$query[nama_manager]', '$query[nama_divhead]', '$_POST[tgl_akhir]')");
	$i++;
	}
echo'</table>
<p><i>Note : Main Dealer menjamin kebenaran data yang tercantum diatas </i></p>
<p>'.date("d M Y").'<br><br><br><br><br>
<u>Suwito Mawarwati</u><br>
Presiden Direktur
</p>
<script>
window.load = print_d();
function print_d(){
	window.print();
}
</script>
</body>
</html>';
?>