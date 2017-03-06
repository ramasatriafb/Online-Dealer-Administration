<?php
include "../connect.php";
$kodepos = $_GET['kodepos'];
$kabupaten = mysql_query("SELECT kabupaten FROM kodepos WHERE kodepos = '$kodepos'");
$bariskodepos = mysql_fetch_array($kabupaten);
echo $bariskodepos['kabupaten'];
?>