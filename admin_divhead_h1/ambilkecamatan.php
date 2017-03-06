<?php
include "../connect.php";
$kodepos = $_GET['kodepos'];
$kecamatan = mysql_query("SELECT kecamatan FROM kodepos WHERE kodepos = '$kodepos'");
$bariskodepos = mysql_fetch_array($kecamatan);
echo $bariskodepos['kecamatan'];
?>