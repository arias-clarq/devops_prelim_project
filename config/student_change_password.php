<?php
include 'dbcon.php';
session_start();

if (isset($_POST['btn_change_password'])) {

    $current_pass = $_POST['current_password'];
    $new_pass = $_POST['new_password'];
    $retype_pass = $_POST['retype_password'];
    $hidden_studentID = $_POST['hidden_studentID'];

    if ($new_pass === $retype_pass) {

        $check_password = "SELECT password FROM tbl_student WHERE studentID = $hidden_studentID";
        $result =  $conn->query($check_password);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_password = $row['password'];

            if ($current_pass === $stored_password) {
                $update_password_query = "UPDATE tbl_student SET password = '$new_pass' WHERE studentID = $hidden_studentID";
                $result_up_query = $conn->query($update_password_query);

                if ($result_up_query === true) {
                    // echo "Password updated successfully!";
                   

                    $_SESSION['message'] = "Password updated successfully! You are redirected to homepage to restart account. Please login again with your new password.";
                    header("location: ../index.php");
                } else {
                   
                    $_SESSION['message'] = "Error updating password: " . $conn->error;
                    header("location: ../student-portal/studentProfile.php");
                    // echo "Error updating password: " . $conn->error;
                }
            } else {
               
                // echo "Current password is incorrect.";
                $_SESSION['message'] = "Current password is incorrect.";
                header("location: ../student-portal/studentProfile.php");
            }
        }
    } else {
       
        // echo 'New password does not match with retype password. Try again.';
        $_SESSION['message'] = "New password does not match with retype password. Try again.";
        header("location: ../student-portal/studentProfile.php");
    }
}
