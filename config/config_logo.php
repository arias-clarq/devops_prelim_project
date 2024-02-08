<?php
session_start(); // Start the session

include_once("dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["logo"])) {
    $targetDir = "../assets/uploads/";
    $targetFile = $targetDir . basename($_FILES["logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the image file is an actual image or fake image
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
    if ($check === false) {
        $_SESSION['Success_error'] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $_SESSION['Success_error'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["logo"]["size"] > 500000) {
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
        // Fetch the old logo path from the database
        $selectOldImageSql = "SELECT logo FROM tbl_logo WHERE logoid = 1";
        $result = $conn->query($selectOldImageSql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $oldImageFile = $row["logo"];

            // Delete the previous image file
            if (file_exists($oldImageFile)) {
                unlink($oldImageFile);
            }
        }

        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) {
            // Update the image file path in the database
            $updateImageSql = "UPDATE tbl_logo SET logo = '$targetFile' WHERE logoid = 1";
            if ($conn->query($updateImageSql) === TRUE) {
                $_SESSION['Success_message'] = "Logo updated successfully";
            } else {
                $_SESSION['Success_error'] = "Error updating image: " . $conn->error;
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
