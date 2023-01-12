<?php

require_once("connection.php");
global $connectionExeption;
global $conn;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($connectionExeption == ""){

        $studentId = filter_input(INPUT_POST, 'studentId', FILTER_SANITIZE_SPECIAL_CHARS);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
        $note = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("INSERT INTO absences (studentID, date, notes)
                                VALUES (?, ?, ?)");
        $stmt->execute([$studentId, $date, $note]);

        echo "<script>window.location ='teacherAbsentces-page.php'</script>";

    }
}