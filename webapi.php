<?php

    require "connect.php";

    /**
     * Name- callFunc
     * Parameters- none
     */
    function callFunc() {

        $query = "SELECT * FROM datastorage ORDER BY id DESC LIMIT 1";

        $result = mysqli_query($GLOBALS['conn'],$query);

        $row = mysqli_fetch_assoc($result);

        $var=json_encode($row);

        echo $var;//Echoes a JSON object
    }
    callFunc();
?>
