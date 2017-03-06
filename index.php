<?php
if(!isset($_SESSION)) {
     session_start();
}
$koneksi=mysql_connect("localhost","root",""); 
mysql_select_db("oda",$koneksi); 

$query1 ="select status from admin where status='admin'";
$hasil1 =mysql_query($query1);
$hakakses1 = mysql_fetch_array($hasil1);

$query2 ="select status from admin where status='admin_h1'";
$hasil2 =mysql_query($query2);
$hakakses2 = mysql_fetch_array($hasil2);

$query3 ="select status from admin where status='admin_h2'";
$hasil3 =mysql_query($query3);
$hakakses3 = mysql_fetch_array($hasil3);

$query4 ="select status from admin where status='admin_h3'";
$hasil4 =mysql_query($query4);
$hakakses4 = mysql_fetch_array($hasil4);

$query5="select status from admin where status='admin_sv_h1'";
$hasil5=mysql_query($query5);
$hakakses5 = mysql_fetch_array($hasil5);

$query6 ="select status from admin where status='admin_manager_h1'";
$hasil6 =mysql_query($query6);
$hakakses6 = mysql_fetch_array($hasil6);

$query7="select status from admin where status='admin_divhead_h1'";
$hasil7=mysql_query($query7);
$hakakses7 = mysql_fetch_array($hasil7);

$query8="select status from admin where status='admin_sv_h2'";
$hasil8=mysql_query($query8);
$hakakses8 = mysql_fetch_array($hasil8);

$query9="select status from admin where status='admin_sv_h3'";
$hasil9=mysql_query($query9);
$hakakses9 = mysql_fetch_array($hasil9);

$query10="select status from admin where status='admin_manager_h2'";
$hasil10=mysql_query($query10);
$hakakses10 = mysql_fetch_array($hasil10);

$query11="select status from admin where status='admin_manager_h3'";
$hasil11=mysql_query($query11);
$hakakses11 = mysql_fetch_array($hasil11);

$query12="select status from admin where status='admin_divhead_h2'";
$hasil12=mysql_query($query12);
$hakakses12 = mysql_fetch_array($hasil12);

$query13="select status from admin where status='admin_divhead_h3'";
$hasil13=mysql_query($query13);
$hakakses13 = mysql_fetch_array($hasil13);

$status = $_SESSION['status'];

if($status==$hakakses1['status']){
?>
<script language=javascript>document.location.href="admin_legal";</script>
<?php
}else if($status==$hakakses2['status']){
?>
<script language=javascript>document.location.href="admin_h1";</script>
<?php
}else if($status==$hakakses3['status']){
?>
<script language=javascript>document.location.href="admin_h2";</script>
<?php
}else if($status==$hakakses4['status']){
?>
<script language=javascript>document.location.href="admin_h3";</script>
<?php
}else if($status==$hakakses5['status']){
?>
<script language=javascript>document.location.href="admin_sv_h1";</script>
<?php
}else if($status==$hakakses6['status']){
?>
<script language=javascript>document.location.href="admin_manager_h1";</script>
<?php
}else if($status==$hakakses7['status']){
?>
<script language=javascript>document.location.href="admin_divhead_h1";</script>
<?php
}else if($status==$hakakses8['status']){
?>
<script language=javascript>document.location.href="admin_sv_h2";</script>
<?php
}else if($status==$hakakses9['status']){
?>
<script language=javascript>document.location.href="admin_sv_h3";</script>
<?php
}else if($status==$hakakses10['status']){
?>
<script language=javascript>document.location.href="admin_manager_h2";</script>
<?php
}else if($status==$hakakses11['status']){
?>
<script language=javascript>document.location.href="admin_manager_h3";</script>
<?php
}else if($status==$hakakses12['status']){
?>
<script language=javascript>document.location.href="admin_divhead_h2";</script>
<?php
}else if($status==$hakakses13['status']){
?>
<script language=javascript>document.location.href="admin_divhead_h3";</script>
<?php
}else{
?>
<script language=javascript>document.location.href="login";</script>
<?php
}
?>
