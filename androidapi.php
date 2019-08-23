<?php

    header("Access-Control-Allow-Origin: *");//Enables Cross-Origin Resource Sharing (CORS)

    require "connect.php";

    /**
     * Name- callFunc
     * Parameters- none
     */
    function callFunc() {

        $query = "SELECT * FROM datastorage ORDER BY id DESC LIMIT 1";

        $result = mysqli_query($GLOBALS['conn'],$query);

        $row = mysqli_fetch_assoc($result);

        $row['sensord']=str_replace(array("\n", "\r"), '', $row['sensord']);//Removes undesired newlines

        $var=json_encode($row);

        echo "[".$var."]";//Echoes a JSON object in the proper format
    }
    callFunc();
?>
