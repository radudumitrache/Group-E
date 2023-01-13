<?php
    include("databaseConnect.php");
    if (isset($_GET["id"]))
    {
        
        $id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
        $sql="DELETE FROM parents_students where parents_students.studentID= :id;
              DELETE FROM students_exams where students_exams.studentID= :id;
              DELETE FROM events_school_students where events_school_students.student_id= :id;
              DELETE FROM students where students.student_id= :id; 

        ";
        $stmt=null;
        try
        {
            $stmt=$dbhandler->prepare($sql);
            $stmt->bindParam(":id",$id,PDO::PARAM_INT);
            $stmt->execute();
        }
        catch (Exception $e)
        {
                echo $e->getMessage();
        }
        if (isset($stmt))
        {
            $_GET=null;
            $id=0;
            header("Location: adminStudentInfo-page.php");
        }
        else
        {
            echo "smth went wrong";
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
  <link rel="stylesheet" href="css/adminStudentInfo-page.css">
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
        <h1 class="textSettings">Admin</h1>
        <div class="button1" href=""><button>Student works</button></div>
      </div>

      <div class="MainBox">
        <table class="table">
            <tr>
              <th>Student ID</th>
              <th>Name</th>
              <th>Parent</th>
              <th>Phone number</th>
              <th>Email</th>
              <th class="LeftTds">Remove</th>
            </tr>
           <?php
                $sql="SELECT students.studentID,students.student_name,users.user_name,users.telephone_number,users.email_address
                 FROM students,users,parents,parents_students WHERE users.userID=parents.userID AND parents.parentID=parents_students.parentID AND parents_students.studentID=students.studentID";
                $stmt=null;
                try
                {
                    $stmt=$dbhandler->prepare($sql);
                    $stmt->execute();
                    
                }
                catch(Exception $e)
                {
                    echo $e->getMessage();
                }
                if (isset($stmt))
                {
                    $rez=$stmt->fetchall(PDO::FETCH_ASSOC);
                    foreach ($rez as $row)
                    {
                        echo "<tr>";
                        $studentID=$row["studentID"];
                        $student_name=$row["student_name"];
                        $parent_name=$row["user_name"];
                        $telephone_number=$row["telephone_number"];
                        $email=$row["email_address"];
                        
                        echo "<td class='RightTds' id='BottomRow'>$studentID</td>
                              <td id='BottomRow'>$student_name</td>
                              <td id='BottomRow'>$parent_name</td>
                              <td id='BottomRow'>$telephone_number</td>
                              <td id='BottomRow'>$email</td>                 
                              <td class='LeftTds' id='BottomRow'><a href='adminTeacherInfoPage.php?id=$studentID'><button>Remove</button></td>
                                ";
                        
                        echo "</tr>";
            
                    }
                }

            ?>
        </table>
      </div>

    </main>

  </div>

</body>
</html>
