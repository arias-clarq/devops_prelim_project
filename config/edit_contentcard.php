<?php
session_start();
include_once "../config/dbcon.php";

if (isset($_POST['edit'])) {
    // Retrieve form data
    $title = $_POST['edit_name'];
    $caption = $_POST['edit_caption'];
    $size = $_POST['edit_size'];
    $color = $_POST['edit_color'];
    $id = $_POST['edit_id'];


    // Prepare the SQL statement
    $sql = "UPDATE tbl_cardcontent SET Title=?, Caption=?, Size=?, Color=? WHERE CardContent_id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssssi", $title, $caption, $size, $color, $id);

        // Execute the statement
        if ($stmt->execute()) {
            // If update successful, set session message
            $_SESSION['message'] = 'Card content updated successfully';
            $_SESSION['bg-color'] = 'success';
        } else {
            // If update fails, set session error message
            $_SESSION['error'] = 'Error updating card content: ' . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // If preparing the statement fails, set session error message
        $_SESSION['error'] = 'Error preparing update statement: ' . $conn->error;
    }

    // Redirect back to the previous page
    header("Location: ../admin-files/cms.php");
    exit();
} else {
    // If the 'edit' POST parameter is not set, redirect back to the previous page
    $_SESSION['error'] = 'Edit parameter is missing';
    header("Location: ../admin-files/cms.php");
    exit();
}
?>
