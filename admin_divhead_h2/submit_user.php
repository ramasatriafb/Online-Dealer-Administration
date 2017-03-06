<?php
include "../connect.php";



$query1 = mysql_query("SELECT password FROM admin WHERE password = $_POST[pwd_lama]");
$kode = $_SESSION['username'];
$lama = mysql_num_rows($query1);
echo mysql_error();

if ($lama==0){  ?>
<script>alert('Password Lama Salah!');document.location.href="submit_user.php"</script><?php 
}else if ($pwd_baru!=$confirm){
?>
<script>alert('Password Baru Tidak Cocok!');document.location.href="submit_user.php"</script><?php 
}else{
$update = mysql_query("UPDATE admin SET password = md5('$_POST[confirm]') WHERE id_admin='$kode'");
echo "<script>alert('Password Sudah Diubah')</script>";?><script>document.location.href="submit_user.php"</script><?php
}

?>
