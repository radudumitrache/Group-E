<?php
    include("databaseConnect.php");
    if (isset($_GET["id"]))
    {
        
        $id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
        $sql="DELETE FROM classes WHERE teacherID=:id;
              DELETE FROM subjects WHERE teacherID=:id;
              DELETE FROM teachers,users FROM teachers,users where teachers.userID=users.userID AND teachers.teacherID= :id";
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
            header("Location: adminTeacherInfoPage.php");
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
        <h1 class="textSettings">Admin</h1>
        <div class="button1" href=""><button>Student works</button></div>
      </div>

      <div class="MainBox">
        <table class="table">
            <tr>
              <th>Teacher ID</th>
              <th>Name</th>
              <th>Class</th>
              <th>Phone</th>
              <th>E-mail</th>
              <th id="RemoveTh">Remove</th>
            </tr>
           <?php
                $sql="SELECT teachers.teacherID,user_name,classID,telephone_number,users.email_address FROM teachers,users,classes WHERE teachers.userID=users.userID AND teachers.teacherID=classes.teacherID";
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
                        $teacherID=$row["teacherID"];
                        $teacher_name=$row["user_name"];
                        $classID=$row["classID"];
                        $telephone=$row["telephone_number"];
                        $email=$row["email_address"];
                        echo "<td>$teacherID</td>
                              <td>$teacher_name</td>
                              <td>$classID</td>
                              <td>$telephone</td>
                              <td>$email</td>                 
                              <td><a href='adminTeacherInfoPage.php?id=$teacherID'><button>Remove</button></td>
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
