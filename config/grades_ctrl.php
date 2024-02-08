<?php
session_start();
include_once("dbcon.php");

if (isset($_POST['btn_save_grades'])) {
    $studentID = $_POST['studentID'];
    $subjectID = $_POST['subjectID'];
    $prelims = $_POST['prelims'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];

    // echo 'studentID: '.$studentID.'subjectID: '.$subjectID.'prelims: '.$prelims.'midterm: '.$midterm.'finals: '.$finals.' ';

    $sqlDuplicate = "SELECT * FROM tbl_grade WHERE studentID = $studentID AND subjectId = $subjectID";
    $res_sqlDuplicate = $conn->query($sqlDuplicate);
    if ($res_sqlDuplicate->num_rows > 0) {

        // Assuming your table name is tbl_grade
        $updateGradesSql = "UPDATE tbl_grade 
                        SET prelims = '{$prelims}', midterm = '{$midterm}', finals = '{$finals}'
                        WHERE studentID = {$studentID} and subjectID = '{$subjectID}'";

        if ($conn->query($updateGradesSql) === TRUE) {
            echo "Grades updated successfully";
            header("location: ../admin-files/viewGrades.php?sID=$studentID");
            // You can redirect or perform other actions after successful update
        } else {
            echo "Error updating grades: " . $conn->error;
        }
    } else {
        $sql_insert_grade = "INSERT INTO `tbl_grade`(`studentID`,`subjectID`,`prelims`, `midterm`, `finals`) VALUES ('{$studentID}','{$subjectID}','{$prelims}','{$midterm}','{$finals}')";
        $result_sql_insert_grade = $conn->query($sql_insert_grade);

        if ($result_sql_insert_grade !== false) {
            $_SESSION['addSub_message'] = "Grade successfully added.";
            echo 'add success';
            header("location: ../admin-files/viewGrades.php?sID=$studentID");
            exit(); // Make sure to exit after header redirection
        } else {
            echo "Error adding subject: " . $conn->error;
        }
    }
}

