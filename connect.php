<?php
    $servername="localhost";
    $username="aniruddha";
    $password="Password2019";
    $dbname="ruddha";

    //Connecting to the MySQL Server
    $conn=mysqli_connect($servername,$username,$password,$dbname);

    //Checking the connection
    if (!$conn)
    {
        die("Connection Failed: ".mysqli_connect_error());
    }

?>
