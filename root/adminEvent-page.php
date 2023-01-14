<?php session_start();?>

 <?php
    include("connection.php");

    include("testEvent.php");

      if(!empty($e)){
        foreach ($e as $i) {
          echo $i;
          echo "<br>";
        }
      }
      //In order for the home page to receive the events all of the three activities have to be defined
      if (empty($err) AND $_SERVER["REQUEST_METHOD"] == "POST") {
        try{
          $eventName = filter_input(INPUT_POST, "eventName", FILTER_SANITIZE_SPECIAL_CHARS);
          $eventDescribe = filter_input(INPUT_POST, "eventDescribe", FILTER_SANITIZE_SPECIAL_CHARS);
          $eventDate = filter_input(INPUT_POST, "eventDate", FILTER_SANITIZE_SPECIAL_CHARS);

          // rename filename 
          $types = explode("/", $_FILES["eventImage"]["type"]);
          $eventImage = md5(uniqid()) . "." . $types[1];
          
          // move file to folder
          $folder = "./uploade/" . $eventImage;
          $rs = move_uploaded_file($_FILES["eventImage"]['tmp_name'], $folder);
          
          // if move file success, insert data to database
          if ($rs) {
            $stmt = $conn -> prepare("INSERT INTO events_school (event_name, photo, events_school.event_description, events_school.event_date) VALUES (:eventName, :eventImage, :eventDescribe, :eventDate)");

            $stmt->bindParam(":eventName", $eventName, PDO::PARAM_STR);
            $stmt->bindParam(":eventImage", $eventImage, PDO::PARAM_STR);
            $stmt->bindParam(":eventDescribe", $eventDescribe, PDO::PARAM_STR);
            $stmt->bindParam(":eventDate", $eventDate, PDO::PARAM_STR);

            $stmt ->execute();
            $stmt ->rowCount();
            $conn = NULL;
          }
          
        }
        catch(Exception $ex){
          echo $ex;
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
  <link rel="stylesheet" href="css/adminEvent-page.css">
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

  <form  class="event_form" action="adminEvent-page.php" method="POST" enctype="multipart/form-data">

    <div >
        <label for="title">Event 1 Title - MainPage</label><br/>
        <input type="text" name="eventName" placeholder="Title text">

        <label for="start">&nbsp;&nbsp;&nbsp;Start date:</label>
        <input type="date" id="start" name="eventDate" value="2020-01-01"min="2000-01-01" max="2050-12-31"><br/>
       
        <label for="text">Event 1 Text - MainPage</label><br/>
        <input type="textarea" name="eventDescribe" placeholder="Input text">

        <label id="file" for="file_upload">&nbsp;&nbsp;&nbsp;Choose file</label>
        <input type="file" name="eventImage"><br/>

        <input type="submit" name="submit" value="Submit"><br/>
    </div>
  
  </form>

  <form class="event_form"  action="adminEvent-page.php" method="POST" enctype="multipart/form-data">

    <div >
        <label for="title">Event 2 Title - MainPage</label><br/>
        <input type="text" name="eventName" placeholder="Title text">

        <label for="start">&nbsp;&nbsp;&nbsp;Start date:</label>
        <input type="date" id="start" name="eventDate" value="2020-01-01"min="2000-01-01" max="2050-12-31"><br/>
       
        <label for="text">Event 2 Text - MainPage</label><br/>
        <input type="textarea" name="eventDescribe" placeholder="Input text">

        <label id="file" for="file_upload">&nbsp;&nbsp;&nbsp;Choose file</label>
        <input type="file" name="eventImage"><br/>

        <input type="submit" name="submit" value="Submit"><br/>
    </div>
  
  </form>

  <form  class="event_form" action="adminEvent-page.php" method="POST" enctype="multipart/form-data">

    <div >
        <label for="title">Event 3 Title - MainPage</label><br/>
        <input type="text" name="eventName" placeholder="Title text">

        <label for="start">&nbsp;&nbsp;&nbsp;Start date:</label>
        <input type="date" id="start" name="eventDate" value="2020-01-01"min="2000-01-01" max="2050-12-31"><br/>
       
        <label for="text">Event 3 Text - MainPage</label><br/>
        <input type="textarea" name="eventDescribe" placeholder="Input text">

        <label id="file" for="file_upload">&nbsp;&nbsp;&nbsp;Choose file</label>
        <input type="file" name="eventImage"><br/>

        <input type="submit" name="submit" value="Submit"><br/>
    </div>
  
  </form>
</div>

</body>
</html>
