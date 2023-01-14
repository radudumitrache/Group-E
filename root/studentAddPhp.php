<?php

require_once("connection.php");
global $connectionExeption;
global $conn;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($connectionExeption == ""){

        $studentId = filter_input(INPUT_POST, 'studentId', FILTER_SANITIZE_SPECIAL_CHARS);
        $classId = filter_input(INPUT_POST, 'classId', FILTER_SANITIZE_SPECIAL_CHARS);
        $notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM students
                                WHERE students.studentID = :studentID
                                AND students.classId = :classId");

        $stmt->bindParam('studentID', $studentId, PDO::PARAM_STR);
        $stmt->bindParam('classId', $classId, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() >= 1){

            $sql = $conn->prepare("UPDATE students_exams
                                    SET exam_notes = :notes
                                    WHERE studentID = :studentID
                                    AND examID IN (
                                            SELECT examID
                                            FROM exams
                                            WHERE subjectID = :classId)");

            $sql->bindParam('notes', $notes, PDO::PARAM_STR);                               
            $sql->bindParam('studentID', $studentId, PDO::PARAM_STR);
            $sql->bindParam('classId', $classId, PDO::PARAM_STR);
            
            $sql->execute();

            if(isset($sql)){

                echo "<script>window.location ='teacherClasses-page.php'</script>";

            }
        }else{
            echo 'The student did not found';
        }
    }
}