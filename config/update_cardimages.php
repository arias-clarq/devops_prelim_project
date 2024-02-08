<?php
session_start();

include_once "../config/dbcon.php";
if(isset($_POST['update_title_caption'])){
    $title = $_POST['titleUpdate'];
    $caption = $_POST['captionUpdate'];
    $hidden_id = $_POST['hidden_card_id'];

    $sql = "UPDATE tbl_card_images set Title = ?, Caption = ? Where `card&images_id` = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $caption, $hidden_id); // Store the image path in the database

    if ($stmt->execute()) {
        // If insertion successful, set session message
        $_SESSION['Card_Add'] = 'Card content updated successfully';
    } else {
        // If insertion fails, set session error message
        $_SESSION['Not_upload'] = 'Error updating card content: ' . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Redirect back to the previous page
    header("Location: ../admin-files/cms.php");
    exit();
}
