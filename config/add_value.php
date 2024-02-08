<?php
session_start();
include_once "../config/dbcon.php";

if (isset($_POST['update_value']) && isset($_POST['Bg_id'])) {
    // Retrieve the Bg_id from the form
    $bg_id = $_POST['Bg_id'];

    //add title and description
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Prepare the SQL statement
    $sql = "UPDATE tbl_background SET Value = 1, title = ?, description = ? WHERE Bg_id = ?";
    
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $description, $bg_id); // "i" indicates an integer parameter

    if ($stmt->execute()) {
        // If update successful, set session message
        $_SESSION['message'] = 'Update Success';
        $_SESSION['bg-color'] = 'success';
    } else {
        // If update fails, set session error message
        $_SESSION['error'] = 'Error updating value: ' . $stmt->error;
    }

    // Redirect back to the previous page
    header("Location: ../admin-files/cms.php");
    exit(); // Stop script execution after redirection
} else {
    // If the 'update_value' or 'Bg_id' POST parameters are not set, redirect back to the previous page
    $_SESSION['error'] = 'Bg_id or update value is missing';
    header("Location: ../admin-files/cms.php");
    exit();
}
?>
