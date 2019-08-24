<?php
session_start();
require "connect.php";
$user=($_POST['user']);
$pass=($_POST['pass']);
$name="";

$sql="SELECT * FROM userdb WHERE `user`='$user' && `pass`='$pass'";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$name=$row['user'];
if (strlen($name)>0)
{
    $_SESSION['name']=$name;
    echo "<script>window.location.href='http://192.168.43.171/single_bin.php';</script>";
}

else
{
    echo "<script>alert('You have entered a wrong username/password.');</script>";
    echo "<script>window.location.href='http://192.168.43.171/';</script>";
}
?>