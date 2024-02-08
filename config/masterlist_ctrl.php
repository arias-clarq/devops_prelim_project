<?php
session_start();
include_once("dbcon.php");

if (isset($_POST['btn_updMaster'])) {

    $studentID = $_POST['studentID'];
    $username = $_POST['username'];
    $courseID = $_POST['course'];
    $year = $_POST['year'];
    $section = $_POST['section'];

    $updateSql = "UPDATE `tbl_student` 
    SET 
        `username`= '{$username}',
        `section`= '{$section}',
        `year`= '{$year}',
        `courseID`='{$courseID}'
    WHERE `studentID` = {$studentID}";

    $result = $conn->query($updateSql);
    if ($result !== true) {
        echo "Error: " . $conn->error;
    }


    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $bday = $_POST['bday'];
    $home = $_POST['home'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $guardianName = $_POST['guardianName'];
    $guardianPhone = $_POST['guardianPhone'];
    $guardianHome = $_POST['guardianHome'];
    $elem = $_POST['elem'];
    $elem_year = $_POST['elem-year'];
    $jh = $_POST['jh'];
    $jh_year = $_POST['jh-year'];
    $sh = $_POST['sh'];
    $sh_year = $_POST['sh-year'];

    $updateInfoSql = "UPDATE `tbl_student_info` 
    SET 
        `email`='{$email}',
        `fName`='{$fname}',
        `lName`='{$lname}',
        `mName`='{$mname}',
        `sex`='{$sex}',
        `bday`='{$bday}',
        `homeAddress`='{$home}',
        `phoneNo.`='{$phone}',
        `guardianName`='{$guardianName}',
        `guardianPhoneNo`='{$guardianPhone}',
        `guardianAddress`='{$guardianHome}',
        `elementary`='{$elem}',
        `elementaryYear`='{$elem_year}',
        `juniorHigh`='{$jh}',
        `juniorHighYear`='{$jh_year}',
        `seniorHigh`='{$sh}',
        `seniorHighYear`='{$sh_year}' 
    WHERE studentID = {$studentID}";

    $result = $conn->query($updateInfoSql);
    if ($result === true) {
        $_SESSION['updMaster_message'] = "Student Information successfully updated.";
        header("location: ../admin-files/enrollmentSystem.php");
    } else {
        echo "Error updating student information: " . $conn->error;
    }
}

if (isset($_POST["btn_delMaster"])) {
    $studentID = $_POST['studentID'];

    $delStudent = "DELETE FROM `tbl_student` WHERE `studentID` = {$studentID}";
    $result = $conn->query($delStudent);
    if ($result !== true) {
        echo "Error deleting student: " . $conn->error;
    }

    $delStudentInfo = "DELETE FROM `tbl_student_info` WHERE `studentID`  = {$studentID}";
    $result = $conn->query($delStudentInfo);
    if ($result !== true) {
        echo "Error deleting student: " . $conn->error;
    }

    $delStudentGrade = "DELETE FROM `tbl_grade` WHERE `studentID` = {$studentID}";
    $result = $conn->query($delStudentGrade);
    if ($result !== true) {
        echo "Error deleting student: " . $conn->error;
    }

    $_SESSION['delMaster_message'] = "Student Information successfully dropped.";
    header("location: ../admin-files/enrollmentSystem.php");

}