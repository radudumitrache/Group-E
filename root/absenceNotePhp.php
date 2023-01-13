<?php

require_once("connection.php");
global $connectionExeption;
global $conn;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($connectionExeption == ""){

        $studentId = filter_input(INPUT_POST, 'studentId', FILTER_SANITIZE_SPECIAL_CHARS);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
        $notes = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM absences
                                WHERE studentID = :studentID
                                AND date = :date");

        $stmt->bindParam('studentID', $studentId, PDO::PARAM_STR);
        $stmt->bindParam('date', $date, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() >= 1){

            $sql = $conn->prepare("UPDATE absences
                                    SET notes = :notes
                                    WHERE studentID = :studentID
                                    AND date = :date ");
            
            $sql->bindParam('notes', $notes, PDO::PARAM_STR);                                
            $sql->bindParam('studentID', $studentId, PDO::PARAM_STR);
            $sql->bindParam('date', $date, PDO::PARAM_STR);
            $sql->execute();

            if(isset($sql)){

                echo "<script>window.location ='teacherAbsentces-page.php'</script>";

            }
        }else{
            echo 'The student did not found';
        }
    }
}