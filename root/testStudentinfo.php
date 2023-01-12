<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $err=[];

    if (empty($_POST["dis_studenID"])) {
        $err[] = "Forgot student ID!";
    }

    if(empty($_POST["dis_F_phone"])){
        $err[] = "Forgot phone number!";
    }

    if(empty($_POST["dis_F_email"])){
        $err[] = "Forgot email address!";
    }

     if(empty($_POST["dis_address"])){
        $err[] = "Forgot address!";
    }
}
?>