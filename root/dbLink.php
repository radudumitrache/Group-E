<?php
        try{
          $dbHandler = new PDO ("mysql:host=mysql; dbname=morningstar_0111; charset=utf8", "root", "qwerty");
        }
        catch(Exception $ex){
          echo $ex;
        }
?>