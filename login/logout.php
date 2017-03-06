<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['status']);


?>
<script>document.location.href="../login/"
</script>
<?
include "index.php";
?>