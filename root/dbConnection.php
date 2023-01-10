<?php
    $host="mysql";
    $dbname="projectE";
    $user="root";
    $password="qwerty";
    $db="mysql:host=$host;dbname=$dbname;charset=utf8";
    try
    {
        $dbhandler= new PDO($db,$user,$password);
    }
    catch (PDOException $e)
    {
        echo "DB connection error:<br>";
        echo $e->getMessage();
        die();
    }

  ?>  