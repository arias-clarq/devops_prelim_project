<?php
session_start();
include_once "../config/dbcon.php";

if(isset($_POST['btn_delete'])) {
    // Check if cardcontent_id is set
    if(isset($_POST['hidden_id_grid'])) {
        $cardcontent_id = $_POST['hidden_id_grid'];
        
        // Prepare the SQL statement to delete the background image
        $sql_delete = "DELETE FROM tbl_cardcontent WHERE cardcontent_id = ?";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bind_param("i", $cardcontent_id);
        
        // Execute the SQL statement
        if ($stmt->execute()) {
            // If deletion successful, set session message
            $_SESSION['message'] = 'Grid Content deleted successfully';
            $_SESSION['bg-color'] = 'success';
        } else {
            // If deletion fails, set session error message
            $_SESSION['error'] = 'Error deleting Grid Content: ' . $stmt->error;
        }
        
        // Close statement
        $stmt->close();
        
        // Redirect back to the previous page
        header("Location: ../admin-files/cms.php");
        exit();
    } else {
        // If cardcontent_id is not set, redirect back to the previous page with an error message
        $_SESSION['error'] = 'cardcontent_id is missing';
        header("Location: ../admin-files/cms.php");
        exit();
    }
} else {
    // If the 'btn_delete' POST parameter is not set, redirect back to the previous page
    $_SESSION['error'] = 'Delete button parameter is missing';
    header("Location: ../admin-files/cms.php");
    exit();
}
?>
