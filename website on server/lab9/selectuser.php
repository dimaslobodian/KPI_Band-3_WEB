<?php
if (isset($_POST["name"])) {
    require_once 'connect.php';
    $name = $_POST["name"];
    $sql = "SELECT * FROM cUsers WHERE Name='$name'";
    $check_user = sqlsrv_query($conn, $sql);
    $user = sqlsrv_fetch_array($check_user);

    if(isset($user)){
        echo 'Пользователь с логином <em>'.$name.'</em> уже есть!';
        /* return error_log('sdf') */
    }else{
        echo 'Пользователя с логином <em>'.$name.'</em> нет!';
    }
}
?>