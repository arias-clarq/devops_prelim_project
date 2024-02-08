<?php
session_start(); // Start the session

include_once("dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["bg"])) {
    $targetDir = "../assets/uploads/";
    $targetFile = $targetDir . basename($_FILES["bg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the image file is an actual image or fake image
    $check = getimagesize($_FILES["bg"]["tmp_name"]);
    if ($check === false) {
        $_SESSION['Success_error'] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["bg"]["size"] > 500000) {
        $_SESSION['Success_error'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedExtensions)) {
        $_SESSION['Success_error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['Success_error'] = "Sorry, your file was not uploaded.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["bg"]["tmp_name"], $targetFile)) {
            // Insert the image file path into the database
            $insertImageSql = "INSERT INTO tbl_background (Bg) VALUES ('$targetFile')"; // Adjust this query according to your database structure
            if ($conn->query($insertImageSql) === TRUE) {
                $_SESSION['Success_message'] = "Background image inserted successfully";
            } else {
                $_SESSION['Success_error'] = "Error inserting background image: " . $conn->error;
            }
        } else {
            $_SESSION['Success_error'] = "Sorry, there was an error uploading your file.";
        }
    }
}

// Close the database connection
$conn->close();

// Redirect to another page
header("Location: ../admin-files/cms.php");
exit();
?>
