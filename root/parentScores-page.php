<?php
    require_once("connection.php");
    global $connectionExeption;
    global $conn;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset= "UTF-8">
        <title>Morgenster</title>
        <link rel="stylesheet" href="css/parentScores-page.css">
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
        
        <main>
            <div class="MainBox"> <!-- This box contains everything above the table -->
                <div class="AboveContent">
                    <a class="button1" href="parentProfile.php">
                        <button>Profile</button>
                    </a>
                    <h1 class="TextHeading">Scores</h1>
                    <img
                        src="img/studentImg.svg" 
                        title="studentImg" 
                        alt="Image of a Student"
                    >
                </div>
                <form id="ParentNotes" method='POST' action='ParentScores_notes.php'>
                    <div>
                        <label for='InptStudentID'>Student ID</label>
                        <input type='text' name='InptStudentID' id='InptStudentID'>
                    </div>
                    <div>
                        <label for='InptCourse'>Course</label>
                        <input type='text' name='InptCourse' id='InptCourse'>
                    </div>
                    <div>
                        <label for='InptNotes'>Notes</label>
                        <input type='text' name='InptNotes' id='InptNotes'>
                    </div>
                    <input type='submit' name='Submit' id='Submit' value='Send'>
                </form>
                <div class="TableAlign">
                    <?php   
                        if($connectionExeption == ""){
                            $stmt = $conn->prepare("SELECT subjects.subject_name, students_exams.score, students.teacher_notes
                                                    FROM exams
                                                    INNER JOIN subjects ON subjects.subjectID=exams.subjectID
                                                    INNER JOIN students_exams ON exams.examID=students_exams.examID
                                                    INNER JOIN students ON students_exams.studentID=students.studentID;
                                                    ");
                            $stmt->execute();
                            $table = $stmt->setFetchMode(PDO::FETCH_OBJ);
                
                            if($stmt->rowCount() >= 1){
                
                              echo "<table class='Table'>";
                
                              echo "<tr>
                                    <th>Course</th>
                                    <th>Score</th>
                                    <th class='LeftTds'>TeacherNotes</th>
                                 </tr>";
                                 
                                foreach($stmt->fetchall() as $tables){
                                    echo "<form action='ParentScores.php' method='POST'>" .
                                      "<input type='hidden' name='course' value='$tables->subject_name'>" .
                                      "<tr class='tableTr'>"
                                      ."<td class='RightTds' id='BottomRow'>" . $tables->subject_name . "</td>"
                                      ."<td>" . $tables->score . "</td>"
                                      ."<td class='LeftTds'>" . $tables->teacher_notes . "</td></tr>" .
                                      '</form>';
                                }
                    
                                echo "</table>";
                    
                            }else{
                                  echo '<h2 class="errors"> There is no data in table</h2>';
                                }
                    
                        }else{
                                echo '<h2 class="errors"> Server Connection lost </h2>';
                            }
                    
                            
                    ?>
                </div>
            </div>
        </main>
    </body>
</html>