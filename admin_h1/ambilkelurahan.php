<?php
include "../connect.php";
$kodepos = $_GET['kodepos'];
$kelurahan = mysql_query("SELECT kelurahan FROM kodepos WHERE kodepos = '$kodepos'");
while($bariskodepos = mysql_fetch_array($kelurahan)){
	echo '<option value = "'.$bariskodepos['kelurahan'].'">'.$bariskodepos['kelurahan'].'</option>';
}
?>