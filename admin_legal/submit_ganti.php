<?php

	include "../connect.php";
	$pass_lama = $_POST['pass_lama'];
$pass_baru = $_POST['pass_baru'];
$confirm = $_POST['confirm'];

$query1 = mysql_query("SELECT password FROM admin WHERE password = '$pass_lama'");
$kode = $_SESSION['username'];
$lama = mysql_num_rows($query1);
echo mysql_error();
if ($lama==0){  ?>
<script>alert('Password Lama Salah!');document.location.href="..";</script>
<?php 
}else if ($pass_baru!=$confirm){
?>
<script>alert('Password Baru Tidak Cocok!');document.location.href="..";</script><?php 
}else{
$update = mysql_query("UPDATE admin SET password = ('$confirm') WHERE user='$kode'");

echo "Password berhasil disimpan
	redirect to main page";
	}
?>
<script language=javascript>document.location.href="..";</script>