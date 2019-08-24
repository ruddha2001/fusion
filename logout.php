<?php
session_start();
$_SESSION['name']="";
session_destroy();
echo "<script>window.location.href='http://192.168.43.171';</script>";
?>