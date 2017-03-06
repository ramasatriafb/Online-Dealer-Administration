<?php
	include '../config.php';
	$data = mysql_query("select * from daftar_pengajuan a, daftar_dealer b, kodepos c where a.kode_dealer = b.kode_dealer and b.id_kodepos = c.id_kodepos and a.id_daftar='$id[$i]'");
?>
<html>
<head>
	<title>DAFTAR PERPANJANGAN DEALER</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body><div align="left">
<h1> Main Dealer : M2Z - PT MITRA PINASTHIKA MULIA-SBY</h1>
<h1> No.Surat : ............</h1>
<h1> Tahun : 2015</h1></div>

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
        </tr>
        <?php while($hasil = mysql_fetch_array($data)){ ?>
        <tr id="rowHover">
        	<td width="10%" align="center"><?php echo $hasil['kodepegawai']; ?></td>
            <td width="25%" id="column_padding"><?php echo $hasil['namapegawai']; ?></td>
            <td width="10%" id="column_padding"><?php echo $hasil['jeniskelamin']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>