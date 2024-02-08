<?php
session_start();
include_once("dbcon.php");

if (isset($_POST['btn_submit'])) {
    $appointmentID = $_POST['appointmentID'];
    $username = $_POST['username'] . '@student';
    $password = $_POST['password'];
    $courseID = $_POST['course'];
    $status = 1;
    $year = $_POST['year'];

    $checkUserQuery = "SELECT EXISTS(SELECT 1 FROM `tbl_student` WHERE `username` = '{$username}') AS user_exists";
    $checkUserResult = $conn->query($checkUserQuery);
    $checkUser = $checkUserResult->fetch_assoc();

    if ($checkUser['user_exists'] > 0) {
        //retain infomation
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['course'] = $_POST['course'];
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['fName'] = $_POST['fName'];
        $_SESSION['lName'] = $_POST['lName'];
        $_SESSION['mName'] = $_POST['mName'];
        $_SESSION['sex'] = $_POST['sex'];
        $_SESSION['bdate'] = $_POST['bdate'];
        $_SESSION['homeAddress'] = $_POST['homeAddress'];
        $_SESSION['contact'] = $_POST['contact'];
        $_SESSION['guardianName'] = $_POST['guardianName'];
        $_SESSION['guardianNo'] = $_POST['guardianNo'];
        $_SESSION['guardianHomeAddress'] = $_POST['guardianHomeAddress'];
        $_SESSION['elem'] = $_POST['elem'];
        $_SESSION['elem-year'] = $_POST['elem-year'];
        $_SESSION['jh'] = $_POST['jh'];
        $_SESSION['jh-year'] = $_POST['jh-year'];
        $_SESSION['sh'] = $_POST['sh'];
        $_SESSION['sh-year'] = $_POST['sh-year'];

        $_SESSION['exists_message'] = "Username already exist";

        header("location: ../enroll.php");
    } else {
        $enrollSql = "INSERT INTO `tbl_student`( `username`, `password`, `courseID`, `year`, `appointmentID`, `statusID`) 
        VALUES ('{$username}','{$password}','{$courseID}','{$year}','{$appointmentID}','{$status}')";

        $result = $conn->query($enrollSql);

        if ($result === true) {
            $studentID = $conn->insert_id;

            $email = $_POST['email'];
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            $mName = $_POST['mName'];
            $sex = $_POST['sex'];
            $bdate = $_POST['bdate'];
            $homeAddress = $_POST['homeAddress'];
            $contact = $_POST['contact'];
            $guardianName = $_POST['guardianName'];
            $guardianNo = $_POST['guardianNo'];
            $guardianHomeAddress = $_POST['guardianHomeAddress'];
            $elem = $_POST['elem'];
            $elem_year = $_POST['elem-year'];
            $jh = $_POST['jh'];
            $jh_year = $_POST['jh-year'];
            $sh = $_POST['sh'];
            $sh_year = $_POST['sh-year'];

            $studentInfo = "INSERT INTO `tbl_student_info`(`studentID`, `email`, `fName`, `lName`, `mName`, `sex`, `bday`, `homeAddress`, `phoneNo.`, `guardianName`, `guardianPhoneNo`, `guardianAddress`, `elementary`, `elementaryYear`, `juniorHigh`, `juniorHighYear`, `seniorHigh`, `seniorHighYear`) 
            VALUES (
            '{$studentID}',
            '{$email}',
            '{$fName}',
            '{$lName}',
            '{$mName}',
            '{$sex}',
            '{$bdate}',
            '{$homeAddress}',
            '{$contact}',
            '{$guardianName}',
            '{$guardianNo}',
            '{$guardianHomeAddress}',
            '{$elem}',
            '{$elem_year}',
            '{$jh}',
            '{$jh_year}',
            '{$sh}',
            '{$sh_year}')";

            $result2 = $conn->query($studentInfo);
            if ($result2 === true) {

                $_SESSION['message'] = "Your Submission is awaiting for approval, you can proceed to the registrar to enroll your application and account";
                header("location: ../enroll.php");
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if (isset($_POST['btn_enroll'])) {

    $studentID = $_POST['studentID'];
    $availableSubSql = "SELECT *, (SELECT COUNT(*) FROM tbl_subject WHERE courseID = s.courseID AND year = s.year) AS subject_exists FROM tbl_student s WHERE studentID = {$studentID};";

    $result = $conn->query($availableSubSql);
    $row = $result->fetch_assoc();

    if ($row['subject_exists'] <= 0) {
        $_SESSION['noCourse_message'] = 'No Subject Course Available';
        header("location: ../admin-files/enrollmentSystem.php");
        exit();
    }


    $status = 2;
    $section = $_POST['section'];
    $year = $_POST['year'];
    $courseID = $_POST['course'];

    $updateSql = "UPDATE `tbl_student` 
    SET 
        `section`= '{$section}',
        `year`= '{$year}',
        `courseID`='{$courseID}',
        `statusID`='{$status}' 
    WHERE `studentID` = {$studentID}";

    $result = $conn->query($updateSql);
    if ($result !== true) {
        echo "Error: " . $conn->error;
    }

    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $bdate = $_POST['bdate'];
    $home = $_POST['home'];
    $phoneNo = $_POST['phoneNo'];
    $guardianName = $_POST['guardianName'];
    $guardianPhoneNo = $_POST['guardianPhoneNo'];
    $GuardianAddress = $_POST['GuardianAddress'];
    $elem = $_POST['elem'];
    $elem_year = $_POST['elem-year'];
    $jh = $_POST['jh'];
    $jh_year = $_POST['jh-year'];
    $sh = $_POST['sh'];
    $sh_year = $_POST['sh-year'];

    $updateInfoSql = "UPDATE `tbl_student_info` 
    SET 
        `email`='{$email}',
        `fName`='{$fname}',
        `lName`='{$lname}',
        `mName`='{$mname}',
        `sex`='{$sex}',
        `bday`='{$bdate}',
        `homeAddress`='{$home}',
        `phoneNo.`='{$phoneNo}',
        `guardianName`='{$guardianName}',
        `guardianPhoneNo`='{$guardianPhoneNo}',
        `guardianAddress`='{$GuardianAddress}',
        `elementary`='{$elem}',
        `elementaryYear`='{$elem_year}',
        `juniorHigh`='{$jh}',
        `juniorHighYear`='{$jh_year}',
        `seniorHigh`='{$sh}',
        `seniorHighYear`='{$sh_year}' 
    WHERE studentID = {$studentID}";
    $result = $conn->query($updateInfoSql);
    if ($result === true) {

        $getCourseSub = "SELECT subjectID FROM `tbl_subject` WHERE courseID = {$courseID}";
        $getSubResult = $conn->query($getCourseSub);
        while ($row2 = $getSubResult->fetch_assoc()) {
            $subjectID = $row2["subjectID"];
            $addGradeSub = "INSERT INTO `tbl_grade`(`studentID`, `subjectID`) 
            VALUES (
            '{$studentID}',
            '{$subjectID}'
            )";
            $conn->query($addGradeSub);
        }

        $_SESSION['enrolled_message'] = 'Student successfully enrolled';
        header("location: ../admin-files/enrollmentSystem.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_POST['btn_reject'])) {
    $studentID = $_POST['studentID'];

    $reject1 = "DELETE FROM tbl_student_info WHERE `studentID` = {$studentID}";
    $result = $conn->query($reject1);
    if ($result !== true) {
        echo "Error: " . $conn->error;
    }

    $reject2 = "DELETE FROM tbl_student WHERE `studentID` = {$studentID}`";
    $result = $conn->query($reject2);
    if ($result !== true) {
        echo "Error: " . $conn->error;
    }

    $_SESSION['noCourse_message'] = 'Student Approval is Rejected';
    header("location: ../admin-files/enrollmentSystem.php");

}