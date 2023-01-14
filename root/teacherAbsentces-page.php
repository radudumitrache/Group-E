<?php

  require_once("connection.php");
  global $connectionExeption;
  global $conn;

  session_start();

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
  <link rel="stylesheet" href="css/teacherClasses-page.css">
  <link rel="icon" href="img/logo.svg">

</head>

<body>

  <header>

    <a class="logo" href="index.php">
      <img src="img/logo.svg" alt="logo">
    </a>

    <div class="listcontainer">

      <ul class="headerList">

        <li>
          <a class="button1" href="index.php">
            <button>Sign out</button>
          </a>
        </li>

      </ul>

    </div>

  </header>

  <main class="main">

    <div class="mainHeader">

      <a class="button3" href="teacherProfile-page.php">
        <button>Profile</button>
      </a>

      <h1>Absences</h1>

      <img src="img/teacherClass.svg" alt="">

    </div>

      <div class="forms">

        <form action="studentContactPhp.php" method="POST" class="form1">

          <label for="">Student ID
            <input type="number" name="studentId" class="studentId">
          </label>

          <input type="submit" value="Contact" class="submits">

        </form>

        <form action="absenceAddPhp.php" method="POST" class="form2">

          <h2>Add</h2>

          <label for="">Student ID
            <input type="number" name="studentId" class="studentId">
          </label>

          <label for="">Date
            <input type="date" name="date" class="studentId">
          </label>

          <label for="">Notes
            <input type="text" name="notes" class="notes">
          </label>

          <input type="submit" value="Change" class="submits">

        </form>

        <form action="absenceNotePhp.php" method="POST" class="form3">

          <h2>Note</h2>

          <label for="">Student ID
              <input type="number" name="studentId" class="studentId">
            </label>

            <label for="">Date
              <input type="date" name="date" class="studentId">
            </label>

            <label for="">Note
              <input type="text" name="note" class="notes">
            </label>

            <input type="submit" value="Change" class="submits">

        </form>

      </div>

      <div class="mainTable">

        <?php
                
          $error = [];
          $isConnect= require_once("connection.php");
          global $connectionExeption;
          global $conn; 

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
              $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
              $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);

              $stmt = $conn->prepare('DELETE FROM absences 
                                      WHERE studentID = :id
                                      AND date = :date');
              $stmt->bindParam('id', $id, PDO::PARAM_STR);
              $stmt->bindParam('date', $date, PDO::PARAM_STR);
              $stmt->execute();
          }
      
              if($connectionExeption == ""){
      
                  if($isConnect){

                          $stmt = $conn->prepare("SELECT studentID, absence_date, justification
                                                  FROM absences");
                          $stmt->execute();
                          $table = $stmt->setFetchMode(PDO::FETCH_OBJ); 

                          if($stmt->rowCount() >= 1){

                              echo "<table class='table'>";

                              echo "<tr>
                                      <th>Student ID</th>
                                      <th>date</th>
                                      <th>Notes</th>
                                      <th>Remove</th>
                                  </tr>";

                              foreach($stmt->fetchall() as $tables){

                                  echo "<form action='teacherAbsentces-page.php' method='POST' class='form'>" .
                                          "<input type='hidden' name='id' value='$tables->studentID'>" . 
                                          "<input type='hidden' name='date' value='$tables->date'>" . 
                                          "<tr>"
                                              ."<td>" . $tables->studentID . "</td>"
                                              ."<td>" . $tables->date . "</td>"
                                              ."<td>" . $tables->notes . "</td>"
                                              ."<td><button type='submit'>Remove</button></td>"
                                        . "</tr>" .
                                      '</form>';

                                  if(!empty($tables->id)){
                                  $ids[] = $tables->id;  
                                  }   
                              }
                              if(isset($ids)){
                                  $_SESSION["id"] = $ids;
                              }

                              echo "</table>";

                          }else{
                              echo '<h2 class="errors"> There is no data in table</h2>';
                              unset($_SESSION["id"]);
                          }

                      }

                  }
                    
        ?>
      </div>
    </div>

  </main>

</body>
</html>
