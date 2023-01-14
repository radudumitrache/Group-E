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
  <link rel="stylesheet" href="css/teacherAbsentec-page.css">
  <link rel="icon" href="img/logo.svg">

</head>

<body>

  <div id="container">

    <header>

      <div>
        <a class="logo" href="home-page.php">
          <img src="img/logo.svg" alt="logo">
        </a>
      </div>

      <div class="listContainer">
        <ul class="headerList">
          <li>
            <a class="button1" href="signIn-page.php">
              <button>SignOut</button>
            </a>
          </li>
        </ul>
      </div>

    </header>

    <main class="main">

      <div class="mainContent">
        <a class="button3" href="teacherClasses-page.php">
          <button>Classes</button>
        </a>
        <h1 class="textSettings">Absences</h1>
        <img src="img/teacherClass.svg" alt="">
      </div>

      <div class="mainTable">
          
          <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                if($connectionExeption == ""){

                    $studentId = filter_input(INPUT_POST, 'studentId', FILTER_SANITIZE_SPECIAL_CHARS);

                    $stmt = $conn->prepare("SELECT users.telephone_number, users.email_address, user_name
                                            FROM users,parents,parents_students 
                                            WHERE users.userID = parents.userID 
                                            AND parents.parentID = parents_students.parentID 
                                            AND parents_students.studentID = :studentid");

                    $stmt->bindParam('studentid', $studentId, PDO::PARAM_STR);
                    $stmt->execute();
                    $table = $stmt->setFetchMode(PDO::FETCH_OBJ);

                    if($stmt->rowCount() >= 1){

                        echo "<table class='table'>";

                        echo "<tr>
                                <th>Student ID</th>
                                <th>Student</th>
                                <th>Phone number 1</th>
                                <th>Phone number 2</th>
                                <th>E-mail</th>
                            </tr>";

                        foreach($stmt->fetchall() as $tables){
                            echo 
                            "<tr class='tableTr'>"
                                ."<td>" . $studentId . "</td>"
                                ."<td class='tableLeft'>" . $tables->name . "</td>"
                                ."<td>" . $tables->telephone_number . "</td>"
                                ."<td>" . $tables->telephone_number . "</td>"
                                ."<td>" . $tables->email_address . "</td>"
                            ."</tr>";
                        
                        }

                        echo "</table>";

                    }else{
                    echo '<h2 class="errors"> There is no data in table</h2>';
                    }


                }else{
                    echo '<h2 class="errors"> Server Connection lost </h2>';
                }
            }

          ?>

      </div>
    </main>
  </div>


</body>
</html>