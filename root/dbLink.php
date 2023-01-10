<?php
        try{
          $dbHandler = new PDO ("mysql:host=mysql; dbname=morningstar_01099; charset=utf8", "root", "qwerty");
        }
        catch(Exception $ex){
          echo $ex;
        }
?>