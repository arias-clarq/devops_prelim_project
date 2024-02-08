<?php
include_once("dbcon.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $telephone_number = $_POST['telephone_number'];
    $description = $_POST['description'];

    // Construct the update query based on the provided fields
    $updateSql = "UPDATE school_profile SET";

    $updateFields = [];

    if (!empty($name)) {
        $updateFields[] = " name = '$name'";
    }

    if (!empty($location)) {
        $updateFields[] = " location = '$location'";
    }

    if (!empty($email)) {
        $updateFields[] = " email = '$email'";
    }

    if (!empty($mobile_number)) {
        $updateFields[] = " mobile_number = '$mobile_number'";
    }

    if (!empty($telephone_number)) {
        $updateFields[] = " telephone_number = '$telephone_number'";
    }

    if (!empty($description)) {
        $updateFields[] = " description = '$description'";
    }

    // Check if any fields are provided for update
    if (!empty($updateFields)) {
        // Combine update fields into the update query
        $updateSql .= implode(", ", $updateFields);

        // Specify the condition for the update
        $updateSql .= " WHERE id = 1";

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare($updateSql);

        if ($stmt->execute()) {
            // Set a session variable with the success message
            $_SESSION['success_message'] = "School Profile updated successfully";
        } else {
            $_SESSION['success_error']= "Error updating record: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();

    // Redirect to another page
    header("Location: ../admin-files/cms.php");
    exit();
}
?>
