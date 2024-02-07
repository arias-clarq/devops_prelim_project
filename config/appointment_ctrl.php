<?php
session_start();
include_once("dbcon.php");

if (isset($_POST['addAppointment'])) {
    $date = $_POST['appointmentDate'];
    $currentDate = date('Y-m-d');
    $startTime = $_POST['startTime'];
    $slots = $_POST['slots'];

    if($date <= $currentDate) {
        $_SESSION['delete_message'] = 'Set Appointment date ahead than the current date and time';
        header("location: ../admin-files/enrollmentSystem.php");
        exit();
    }

    $addSql = "INSERT INTO `tbl_appointment`(`date`, `start_time`, `slots`) VALUES ('{$date}','{$startTime}','{$slots}')";
    $result = $conn->query($addSql);

    if($result === true){
        $_SESSION['success_message'] = 'Appointment successfully added.';
        header("location: ../admin-files/enrollmentSystem.php");
    }else{
        echo "Error adding appointment: " . $conn->error;
    }
}

if (isset($_POST['deleteSlots'])) {
    $id = $_POST['appointmentID'];

    $deleteSql = "DELETE FROM `tbl_appointment` WHERE `appointmentID` = '{$id}'";
    $result = $conn->query($deleteSql);

    if($result === true){
        $_SESSION['delete_message'] = 'The Appointment slot is deleted';
        header("location: ../admin-files/enrollmentSystem.php");
    }else{
        echo "Error Deleting slots : " . $conn->error;
    }
}