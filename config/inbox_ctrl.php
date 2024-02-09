<?php
session_start();
include_once("dbcon.php");

if (isset($_POST["btn-submit"])) {
    $status = 1;
    $contact_name = $_POST["contact-name"];
    $contact_email = $_POST["contact-email"];
    $contact_message = $_POST["contact-message"];
    $currentDate = date('Y-m-d H:i:s');
    $captcha = $_POST["captcha"];
    $captcha_code = $_POST["captcha-code"];

    if ($captcha == $captcha_code) {
        $insertSql = "INSERT INTO `tbl_inbox`(`sender`, `email`, `date`, `message`, `status`) VALUES ('{$contact_name}','{$contact_email}','{$currentDate}','{$contact_message}','{$status}')";
        $result = $conn->query($insertSql);
        if ($result === true) {
            $_SESSION["success_msg"] = "Message Successfully sent";
            header("location: ../contactUs.php");
        } else {
            echo 'Error sending message: ' . $conn->error;
        }
    } else {
        $_SESSION['contact-name'] = $contact_name;
        $_SESSION['contact-email'] = $contact_email;
        $_SESSION['contact-message'] = $contact_message;
        $_SESSION["error_msg"] = "Incorrect Captcha please try again.";
        header("location: ../contactUs.php");
    }
}

if (isset($_POST["btn-read"])) {
    $status = 2;
    $id = $_POST["inboxID"];

    $read = "UPDATE `tbl_inbox` SET `status`='{$status}' WHERE `inboxID` = {$id}";
    $result = $conn->query($read);

    if ($result === true) {
        header("location: ../admin-files/inbox.php");
    } else {
        echo 'Error: ' . $conn->error;
    }
}