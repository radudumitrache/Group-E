<?php
    $host="mysql";
    $dbname="morningstar_01099";
    $user="root";
    $password="qwerty";
    $dsn="mysql:host=$host;dbname=$dbname;charset=utf8";
    try
    {
        $dbhandler= new PDO($dsn,$user,$password);
    }
    catch (Exception $e)
    {
        echo "DB connection error:<br>";
        echo $e->getMessage();
        die();
    }

?>