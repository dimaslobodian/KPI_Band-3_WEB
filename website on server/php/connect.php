<?php
$serverName = "DESKTOP-035M40Q";
        $connectionOptions = array("Database"=>"BMX_SHOP");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false){
            echo "No connection to MsSQL Server";
        }