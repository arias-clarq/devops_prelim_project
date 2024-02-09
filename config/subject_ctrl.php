<?php
session_start();
include_once("dbcon.php");

if (isset($_POST['btn_addSubject'])) {
    $subject = $_POST['subject'];
    $courseID = $_POST['course'];
    $instructor = $_POST['instructor'];
    $year = $_POST['year'];
    $hours = $_POST['hours'];

    $addSql = "INSERT INTO `tbl_subject`(`subjectName`, `courseID`, `instructor`, `year`, `hours`) VALUES ('{$subject}','{$courseID}','{$instructor}','{$year}','{$hours}')";
    $result = $conn->query($addSql);

    if ($result === true) {
        $_SESSION['addSub_message'] = "Subject successfully added.";
        header("location: ../admin-files/enrollmentSystem.php");
    } else {
        echo "Error adding subject: " . $conn->error;
    }
}

if (isset($_POST['btn_updSubject'])) {
    $subjectID = $_POST['subjectID'];
    $subject = $_POST['subject'];
    $courseID = $_POST['course'];
    $instructor = $_POST['instructor'];
    $year = $_POST['year'];
    $hours = $_POST['hours'];

    $updateSql = "UPDATE `tbl_subject` SET `subjectName`='{$subject}',`courseID`='{$courseID}',`instructor`='{$instructor}',`year`='{$year}',`hours`='{$hours}' WHERE `subjectID` = {$subjectID}";
    $result = $conn->query($updateSql);

    if ($result === true) {
        $_SESSION['updSub_message'] = 'Subject updated successfully.';
        header("location: ../admin-files/enrollmentSystem.php");
    } else {
        echo "Error updating subject: " . $conn->error;
    }
}

if (isset($_POST['btn_delSubject'])) {
    $subjectID = $_POST['subjectID'];

    $deleteSql = "DELETE FROM `tbl_subject` WHERE `subjectID` = {$subjectID}";
    $result = $conn->query($deleteSql);

    $subjectGrade = "DELETE FROM `tbl_grade` WHERE `subjectID` = {$subjectID}";
    $result2 = $conn->query($subjectGrade);
    if ($result2 !== true) {
        echo "Error deleting subject: " . $conn->error;
    }

    if ($result === true) {
        $_SESSION['delSub_message'] = 'Subject is Deleted';
        header("location: ../admin-files/enrollmentSystem.php");
    } else {
        echo "Error deleting subject: " . $conn->error;
    }
}