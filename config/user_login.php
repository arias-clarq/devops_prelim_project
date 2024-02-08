<?php
session_start();
include_once("dbcon.php");
$username = $_POST["username"];
$password = $_POST["password"];

if (strpos($username, "@admin") !== false) {

    $userSql = "SELECT * FROM `tbl_user` WHERE username = '{$username}' AND password = '{$password}'";
    $result = $conn->query($userSql);

    if ($result->num_rows > 0) {
        // activate token
        $_SESSION['token'] = true;

        //get userID
        $row = $result->fetch_assoc();
        $userID = $row["userID"];
        $_SESSION['userID'] = $userID;

        header("location: ../admin-files/cms.php");
    } else {
        $_SESSION['message'] = 'Incorrect Username or Password';
        header('location: ../index.php');
    }

} else if (strpos($username, "@student") !== false) {

    $checkStatus = "SELECT * FROM `tbl_student` WHERE `username` = '{$username}' OR `password` = '{$password}'";
    $checkStatusResult = $conn->query($checkStatus);
    $row = $checkStatusResult->fetch_assoc();

    if ($row['statusID'] == 2) {
        // activate token
        $_SESSION['token'] = true;
        $userSql = "SELECT * FROM `tbl_student` WHERE username = '{$username}' AND password = '{$password}'";
        $result = $conn->query($userSql);
        //get userID
        $row2 = $result->fetch_assoc();
        $studentID = $row2["studentID"];


        if ($result ->num_rows > 0) {
            $_SESSION['studentID'] = $studentID;

            $studentSql = "SELECT * FROM `tbl_student` INNER JOIN tbl_student_info ON tbl_student.studentID = tbl_student_info.studentID WHERE tbl_student.studentID = {$studentID}";
            $result2 = $conn->query($studentSql);
            $row2 = $result2->fetch_assoc();
            $user = $row2["lName"] . ', ' . $row2["fName"] . ' ' . $row2["mName"];

            if ($result2->num_rows > 0) {
                $_SESSION['student'] = $user;
                header("location: ../student-portal/studentDashboard.php");
            }
        } else {
            $_SESSION['message'] = 'Incorrect Username or Password';
            header('location: ../index.php');
        }

    } else {
        $_SESSION['message'] = 'You are not yet enrolled, visit the registar or the accounting for your approval';
        header('location: ../index.php');
    }

}
