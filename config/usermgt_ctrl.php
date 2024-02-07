<?php
include_once("dbcon.php");
session_start();
// function to add users
if (isset($_POST["btn_add"])) {
    $username = $_POST['new_username'] . '@admin';
    $password = $_POST['new_password'];

    $addSql = "INSERT INTO `tbl_user`(`username`, `password`) VALUES ('{$username}','$password')";


    $result = $conn->query($addSql);
    if ($result === true) 
    {
        $_SESSION["userMsg"] = "User addition completed successfully.";
        header("location: ../admin-files/users_mgt.php");
    } else 
    {
        echo "Error adding user: " . $conn->error;
    }
}

// function to edit users
if (isset($_POST["btn_edit"])) {
    $id = $_POST["id"];
    $username = $_POST['edit_username'] . '@admin';
    $password = $_POST['edit_password'];

    $editSql = "UPDATE `tbl_user` SET `username`='{$username}',`password`='{$password }' WHERE `userID` = {$id}";


    $result = $conn->query($editSql);
    if ($result === true) 
    {
        $_SESSION["userMsg"] = "User information updated successfully.";
        header("location: ../admin-files/users_mgt.php");
    } else 
    {
        echo "Error adding user: " . $conn->error;
    }
}

// function to delete users
if (isset($_POST["btn_delete"])) {
    $id = $_POST["id"];
    $deleteSql = "DELETE FROM `tbl_user` WHERE `userID` = {$id}";

    $result = $conn->query($deleteSql);
    if ($result === true) 
    {
        $_SESSION["deleteMsg"] = "User deletion completed successfully.";
        header("location: ../admin-files/users_mgt.php");
    } else 
    {
        echo "Error adding user: " . $conn->error;
    }
}