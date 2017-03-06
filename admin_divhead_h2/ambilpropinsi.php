<?php
include "../connect.php";
$kodepos = $_GET['kodepos'];
$propinsi = mysql_query("SELECT propinsi FROM kodepos WHERE kodepos = '$kodepos'");
$bariskodepos = mysql_fetch_array($propinsi);
echo $bariskodepos['propinsi'];
?>