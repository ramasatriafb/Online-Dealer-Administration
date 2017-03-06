<?php
session_start();

//sambungkan ke database
$koneksi=mysql_connect("localhost","root",""); 

//memilih database yang akan dipakai
mysql_select_db("oda",$koneksi); 

//mengambil data dari form login
$username=$_POST['username'];
$password=$_POST['password'];

//query untuk mengambil data yang sesuai
$query="select * from admin where user='$username' and password='$password'";
$hasil=mysql_query($query);
$hakakses = mysql_fetch_array($hasil);
$cek=mysql_num_rows($hasil);
if ($cek==1){
$_SESSION['status']=$hakakses['status'];
$_SESSION['username']=$username;
$_SESSION['nama']=$hakakses['nama'];
$_SESSION['id_admin']=$hakakses['id_admin'];
?>
<script language=javascript>alert("Selamat Datang <?php echo $_SESSION['nama'] ?>");document.location.href="../";</script> 
<?php
}else{
?>
<script>alert("Password dan Username Salah!");document.location.href="../"</script> 
<?php

}
?>