<?php
session_start();
include_once "../config/dbcon.php";

if (isset($_POST['save'])) {
    // Retrieve form data
    $title = $_POST['title'];
    $caption = $_POST['caption'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    // Assuming you're storing the image path in the database, you'll need to handle file upload separately

    // Prepare the SQL statement
    $sql = "INSERT INTO tbl_cardcontent (Title, Caption, Size, Color) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $caption, $size, $color);

    if ($stmt->execute()) {
        // If insertion successful, set session message
        $_SESSION['Grid_success'] = 'Card content added successfully';
    } else {
        // If insertion fails, set session error message
        $_SESSION['Grid_error'] = 'Error adding card content: ' . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Redirect back to the previous page
    header("Location: ../admin-files/cms.php");
    exit();
} else {
    // If the 'save' POST parameter is not set, redirect back to the previous page
    $_SESSION['error'] = 'Save parameter is missing';
    header("Location: ../admin-files/cms.php");
    exit();
}
?>
