<?php
    include ("dblink.php");

    $err = [];

    if(isset($_POST['submitPic1'])){
        if (!isset($_FILES['eventImage1']) || !$_FILES["eventImage1"]['size']) {
            $err[] = "Forgot photo!";
        }

        if(count($err) > 0){
            foreach($err as $error){
                echo "<script>alert('$error')</script>";
            }
            die();
        }

        if(count($err) == 0){
            $goodfilestype = ["image/png", "image/jpeg", "image/jpg", "image/gif"];

            $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
            $uploadFileType = finfo_file($fileinfo, $_FILES['eventImage1']['tmp_name']);

            if(in_array($uploadFileType, $goodfilestype)){

                $types = explode("/", $_FILES["eventImage1"]["type"]);
                $image_1 = md5(uniqid()) . "." . $types[1];
                $folder_1 = "img/upload/event_parent_1/" . $image_1;
                
                if (move_uploaded_file($_FILES["eventImage1"]['tmp_name'], $folder_1))
                 echo "<script>alert('Successfully added picture')</script>";
                else 
                 echo "error";

            }else{
                echo "<script>alert('Invalid type of the file. Must be png or jpeg or jpg or gif.')</script>";
            }
        }
    }

    if(isset($_POST['submitPic2'])){
        if (!isset($_FILES['eventImage2']) || !$_FILES["eventImage2"]['size']) {
            $err[] = "Forgot photo!";
        }

        if(count($err) > 0){
            foreach($err as $error){
                echo "<script>alert('$error')</script>";
            }
        }

        if(count($err) == 0){
            $goodfilestype = ["image/png", "image/jpeg", "image/jpg", "image/gif"];

            $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
            $uploadFileType = finfo_file($fileinfo, $_FILES['eventImage2']['tmp_name']);

            if(in_array($uploadFileType, $goodfilestype)){

                $types = explode("/", $_FILES["eventImage2"]["type"]);
                $image_2 = md5(uniqid()) . "." . $types[1];

                
                $folder = "./img/upload/event_parent_2/" . $image_2;
                $rs = move_uploaded_file($_FILES["eventImage2"]['tmp_name'], $folder);

                move_uploaded_file($_FILES["eventImage2"]["tmp_name"], "upload/". $_FILES["eventImage2"]["name"]);

                echo "<script>alert('Successfully added picture')</script>";

            }else{
                echo "<script>alert('Invalid type of the file. Must be png or jpeg or jpg or gif.')</script>";
            }
        }
    }

    $textEvent_1 = filter_input(INPUT_POST, 'eventDescribe1', FILTER_SANITIZE_SPECIAL_CHARS);
    $textEvent_2 = filter_input(INPUT_POST, 'eventDescribe2', FILTER_SANITIZE_SPECIAL_CHARS);


    if(isset($_POST['submitText1'])){
        if(empty($textEvent_1)){
             $err[] = "Invalid note";
        }else{
            echo "<script>alert('Successfully added note')</script>";
        }

        if(count($err) > 0){
            foreach($err as $error){
                echo "<script>alert('$error')</script>";
            }
        }

        if(count($err) == 0){

            $myfile = fopen("description/description1.txt", "w") or die("<script>alert('Unable to upload note into file')</script>");
            fwrite($myfile, $textEvent_1);
            fclose($myfile);

        }
    }

    if(isset($_POST['submitText2'])){
        
        if(empty($textEvent_2)){
            $err[] = "Invalid note";
        }else{
            echo "<script>alert('Successfully added note')</script>";
        }
       
        if(count($err) > 0){
            foreach($err as $error){
                echo "<script>alert('$error')</script>";
            }
        }

        if(count($err) == 0){

            $myfile = fopen("description/description2.txt", "w") or die("<script>alert('Unable to upload note into file')</script>");
            fwrite($myfile, $textEvent_2);
            fclose($myfile);

        }
    }

    




?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="description" content="Are you worry about your children future? Register at our school and we show them the future">
  <meta name="keywords" content="Morgenster, school, children, learn, study, Emmen, Netherlands">
  <meta name="author" content="Yourname">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Morgenster</title>
  <link rel="stylesheet" href="css/adminEvent-parent.css">
  <link rel="icon" href="img/logo.svg">

</head>

<body>

  <header>

    <a class="logo" href="home-page.php">
      <img src="img/logo.svg" alt="logo">
    </a>

    <div class="listcontainer">

      <ul class="headerList">

        <li>
          <a class="button1" href="home-page.php">
            <button>Sign out</button>
          </a>
        </li>

      </ul>

    </div>

  </header>

  <div class="main">

  <h1 id="form_title">Admin</h1>

  <form  class="event_form" action="admin_event_parent.php" method="POST" enctype="multipart/form-data">

    <div class="textEdit">
        <p class="uploadPicture">
            <label for="title">Event 1 picture - ParentEvent</label>
            <label id="file" for="file_upload"></label>
            <input type="file" name="eventImage1">
            <input type="submit" name="submitPic1" value="Submit">
        </p>

        <p class="uploadPicture">
            <label for="title">Event 2 picture - ParentEvent</label>
            <label id="file" for="file_upload"></label>
            <input type="file" name="eventImage2">
            <input type="submit" name="submitPic2" value="Submit">
        </p>

        <div class="textUpload">
            <p>
                <label for="title">Event 1 text - ParentEvent</label>
                <input type="textarea" name="eventDescribe1" placeholder="Input text">
                <input type="submit" name="submitText1" value="Submit">
            </p>

            <p>
                <label for="title">Event 2 text - ParentEvent</label>
                <input type="textarea" name="eventDescribe2" placeholder="Input text">
                <input type="submit" name="submitText2" value="Submit">
            </p>
        </div>
    </div>

  
  </form>
  
</div>

</body>
</html>