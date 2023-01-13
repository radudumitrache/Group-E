<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="description" content="Are you worry about your children future? Register at our school and we show them the future">
  <meta name="keywords" content="Morgenster, school, children, learn, study, Emmen, Netherlands">
  <meta name="author" content="Yourname">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Morgenster</title>
  <link rel="stylesheet" href="css/teacherMessagesPage.css">
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
            <a class="button1" href="home-page.php">
              <button>SignOut</button>
            </a>
          </li>
        </ul>
      </div>

    </header>

    <main>

      <div id="mainContent">
        <div class="button1" href="home-page.php"><button>Profile</button></div>
        <h1 class="textSettings">Messages</h1>
        <img src="img/teacherImg.svg" title="teacherImg" alt="teacherImg">
      </div>

      <div class="MainBox">
        <table class="table">
            <tr>
              <th>Course</th>
              <th>Student ID</th>
              <th>Student Name</th>
              <th id="MessagesTh">Messages</th>
            </tr>
           <?php
             include("connection.php");

              $sql="SELECT `classID`,'parent_notes','studentID','studentName' FROM 'Messages' where 'teacherID' = :userID";
              $stmt=null;
              try
              {
                $stmt=$conn->prepare($sql);
                if (isset($_SESSION["teacherID"]))
                  $stmt->bindParam(":userID",$_SESSION["teacherID"],PDO::PARAM_INT);
                else 
                  throw new Exception("database error");
                $stmt->execute();
              }
              catch (Exception $e)
              {
                $message=$e->getMessage();
                echo "<script>alert($message)</script>";
              }
              if (isset($stmt))
              {
                $rez=$stmt->fetchall(PDO::FETCH_ASSOC);

                for ($i=0; $i<$stmt->rowCount()-1; $i++)
                {
                  $classID=$rez[$i]["classID"];
                  $parent_notes=$rez[$i]["parent_notes"];
                  $studentID=$rez[$i]["studentID"];
                  $studentName=$rez[$i]["studentName"];
                  echo "<tr>";
                  echo "<td class='LeftTds'>$classID</td>
                        <td>$studentID</td>
                        <td>$studentName</td>
                        <td class='RightTds'>$parentName</td>
                  
                  ";
                  echo "</tr>";
                }
                $last=$stmt->rowCount()-1;
                $classID=$rez[$last]["classID"];
                $parent_notes=$rez[$last]["parent_notes"];
                $studentID=$rez[$last]["studentID"];
                $studentName=$rez[$last]["studentName"];
                echo "<tr>";
                  echo "<td class='LeftTds' id='BottomRow'>$classID</td>
                        <td id='BottomRow'>$studentID</td>
                        <td id='BottomRow'>$studentName</td>
                        <td class='RightTds' id='BottomRow'>$parentName</td>
                  ";
                  echo "</tr>";
              } 
            ?>
        </table>
      </div>

    </main>

  </div>

</body>
</html>
