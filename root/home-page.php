<?php
  require_once("connection.php");
  global $connectionExeption;
  global $conn;

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
  <link rel="stylesheet" href="css/home-page.css">
  <link rel="icon" href="img/logo.svg">

</head>

<body>

  <header>

    <a class="logo" href="">
      <img src="img/logo.svg" alt="logo">
    </a>

    <div class="listcontainer">

      <ul class="headerList">

        <li>
          <a class="button1" href="signIn-page.php">
            <button>Sign in</button>
          </a>
        </li>

        <li>
          <a class="button2" href="aboutTeam-page.php">
            <button>About us</button>
          </a>
        </li>

      </ul>

    </div>

  </header>
  <main>
    <div id="imageBanner">
      <div id="textBox">
        <p>
          Welcome to Christian primary school De Morgenster.
           The school is located in the Westenholte district of Zwolle.
            The Morning Star makes you shine; by looking at each individual child,
             we can best meet the needs of that student and there is room for his
              or her talents.  
        </p>
      </div>
    </div>
    <div id="InfoBanner">

        <a href="event1-page.php">
          <div class="InfoBox">

          <?php
            try{
              $stmt = $conn -> prepare("SELECT events_school.photo, events_school.event_date, events_school.event_description 
                                        FROM events_school 
                                        WHERE eventID = 1
                                        ORDER BY eventID 
                                        DESC LIMIT 0,1
                                        ");
              $stmt->execute();
              $stmt->bindColumn(1, $photo1);
              $stmt->bindColumn(2, $date);
              $stmt->bindColumn(3,$description);

              while ($resule = $stmt->fetch()) {
                $_SESSION["date"] = $date;
                $_SESSION["description"] = $description;
              }
            }
            catch(Exception $e){
              echo $e;
            }
              echo '<img src="uploade/'.$photo1.'" title="eventImg" alt="Event 1" id="eventImg" style="width: 300px; height: auto;"';

            $stmtt = $conn->prepare("SELECT event_description
                                    FROM events_school
                                    WHERE eventID = 1");
            $stmtt->execute();
            $pp = $stmtt->setFetchMode(PDO::FETCH_OBJ); 

            foreach($stmtt->fetchAll() as $ps){

              echo '<p>' . $ps->event_description . '</p>';

            }

            ?>
            
          </div>
          <h2 class="overlay">Read more</h2>
        </a>

        <a href="event2-page.php">
          <div class="InfoBox">

          <?php
            try{
              //$stmt = $dbHandler -> prepare("SELECT events_school.photo, events_school.date, events_school.description FROM events_school ORDER BY eventID DESC LIMIT 0,1");
              $stmt = $conn -> prepare("SELECT events_school.photo, events_school.event_date, events_school.event_description 
                                        FROM events_school 
                                        WHERE eventID = 2
                                        ORDER BY eventID 
                                        DESC LIMIT 0,1");
              $stmt->execute();
              $stmt->bindColumn(1, $photo2);
              $stmt->bindColumn(2, $date);
              $stmt->bindColumn(3,$description);

              while ($resule = $stmt->fetch()) {
                $_SESSION["date"] = $date;
                $_SESSION["description"] = $description;
              }
            }
            catch(Exception $e){
              echo $e;
            }

            echo '<img src="uploade/'.$photo2.'" title="eventImg" alt="Event 1" id="eventImg" style="width: 300px; height: auto;"';

            $stmtt = $conn->prepare("SELECT event_description
                                    FROM events_school
                                    WHERE eventID = 2");
            $stmtt->execute();
            $ppp = $stmtt->setFetchMode(PDO::FETCH_OBJ); 

            foreach($stmtt->fetchAll() as $pss){

              echo '<p>' . $pss->event_description . '</p>';

            }

            ?>
            
          </div>
          <h2 class="overlay">Read more</h2>
        </a>

        <a href="event3-page.php">
          <div class="InfoBox">

          <?php
            try{
              //$stmt = $dbHandler -> prepare("SELECT events_school.photo, events_school.date, events_school.description FROM events_school ORDER BY eventID DESC LIMIT 0,1");
              $stmt = $conn -> prepare("SELECT events_school.photo, events_school.event_date, events_school.event_description 
                                        FROM events_school 
                                        WHERE events_school.eventID = 3
                                        ORDER BY eventID 
                                        DESC LIMIT 0,1");
              $stmt->execute();
              $stmt->bindColumn(1, $photo3);
              $stmt->bindColumn(2, $date);
              $stmt->bindColumn(3,$description);

              while ($resule = $stmt->fetch()) {
                $_SESSION["date"] = $date;
                $_SESSION["description"] = $description;
              }
            }
            catch(Exception $e){
              echo $e;
            }

            echo '<img src="uploade/'.$photo3.'" title="eventImg" alt="Event 1" id="eventImg" style="width: 300px; height: auto;"';

            $stmtt = $conn->prepare("SELECT event_description
                                    FROM events_school
                                    WHERE eventID = 3");
            $stmtt->execute();
            $pppp = $stmtt->setFetchMode(PDO::FETCH_OBJ); 

            foreach($stmtt->fetchAll() as $psss){

              echo '<p>' . $psss->event_description . '</p>';

            }
            ?>
            
          </div>
          <h2 class="overlay">Read more</h2>
        </a>

    </div>

  </main>





</body>
</html>
