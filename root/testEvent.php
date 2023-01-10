<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $err=[];
    if(empty($_POST["eventName"])){
        $err[] = "Forgot event title!";
    }

    if(empty($_POST["eventDescribe"])){
        $err[] = "Forgot event description!";
    }

    if(empty($_POST["eventDate"])){
        $err[] = "Forgot event date!";
    }

    if(!isset($_FILES['eventImage']) || !$_FILES["eventImage"]['size']){
        $err[] = "Forgot event photo!";
    }
}
?>