<?php

require_once("connection.php");
global $connectionExeption;
global $conn;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($connectionExeption == ""){

        $studentId = filter_input(INPUT_POST, 'studentId', FILTER_SANITIZE_SPECIAL_CHARS);
        $classId = filter_input(INPUT_POST, 'classId', FILTER_SANITIZE_SPECIAL_CHARS);
        $scores = filter_input(INPUT_POST, 'scores', FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM students
                                WHERE students.studentID = :studentID
                                AND students.classId = :classId");

        $stmt->bindParam('studentID', $studentId, PDO::PARAM_STR);
        $stmt->bindParam('classId', $classId, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() >= 1){

            $sql = $conn->prepare("UPDATE exams
                                    SET score = :score
                                    WHERE exams.examID IN (
                                        SELECT students_exams.examID
                                        FROM students_exams
                                        WHERE studentID IN (
                                            SELECT students.studentID
                                            FROM students
                                            WHERE students.studentID = :studentID
                                            AND students.classId = :classId))");
                                            
            $sql->bindParam('studentID', $studentId, PDO::PARAM_STR);
            $sql->bindParam('classId', $classId, PDO::PARAM_STR);
            $sql->bindParam('score', $scores, PDO::PARAM_STR);
            $sql->execute();

            if(isset($sql)){

                echo "<script>window.location ='teacherClasses-page.php'</script>";

            }
        }else{
            echo 'The student did not found';
        }
    }
}