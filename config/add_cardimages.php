<?php
session_start();
include_once "../config/dbcon.php";

if (isset($_POST['save_card'])) {
    // Retrieve form data
    $title = $_POST['title'];
    $caption = $_POST['caption'];
    
    // File upload handling
    $target_dir = "../assets/uploads/"; // Directory where images will be uploaded (adjust the path as needed)
    $target_file = $target_dir . basename($_FILES["image"]["name"]); // Path to the uploaded image
    $uploadOk = 1; // Flag to indicate if the file was uploaded successfully
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // Get the file extension

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['Not_upload']= "Sorry, your file was not uploaded.";
        // If upload fails, redirect back with an error message
        $_SESSION['Not_upload'] = 'File upload failed.';
        header("Location: ../admin-files/cms.php");
        exit();
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            // If upload fails, redirect back with an error message
            $_SESSION['Not_upload'] = 'Error uploading file.';
            header("Location: ../admin-files/cms.php");
            exit();
        }
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO tbl_card_images (Title, Caption, Image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $caption, $target_file); // Store the image path in the database

    if ($stmt->execute()) {
        // If insertion successful, set session message
        $_SESSION['Card_Add'] = 'Card content added successfully';
    } else {
        // If insertion fails, set session error message
        $_SESSION['Not_upload'] = 'Error adding card content: ' . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Redirect back to the previous page
    header("Location: ../admin-files/cms.php");
    exit();
} else {
    // If the 'save_card' POST parameter is not set, redirect back to the previous page
    $_SESSION['error'] = 'Save parameter is missing';
    header("Location: ../admin-files/cms.php");
    exit();
}
?>
