<?php
session_start();
if ($_SESSION['token'] !== true) {
    header('location: ../index.php');
}
include_once "../config/dbcon.php";
?>
<?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prelim - exam</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="..\assets\fontawesome\css\all.css">
    <link rel="stylesheet" href="..\assets\fontawesome\css\regular.css">
    <link rel="stylesheet" href="..\assets\custom\student-style.css">
    <link rel="stylesheet" href="..\assets\custom\style-custom.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="studentDashboard.php">
                <?php
    // Fetch the logo data from the database
    $sql = "SELECT * FROM `tbl_logo` WHERE `logoid` = 1"; 
    $result = $conn->query($sql);

    // Check if there's a row in the result
    if ($result->num_rows > 0) {
        // Fetch the logo data
        $row = $result->fetch_assoc();
        ?>
        <img src="../assets/uploads/<?php echo $row["Logo"]; ?>" alt="" height="60">
        <?php
    } 
    
    ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'studentDashboard.php' ? 'active' : '' ?>"
                            href="studentDashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'grades.php' ? 'active' : '' ?>" href="grades.php">E-Grades</a>
                    </li>

                </ul>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-circle-user px-1 fa-lg text-capitalize"></i><?= $_SESSION['student'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="studentProfile.php"><i
                                    class="fa-solid fa-gears px-1"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#LogoutModal"><i
                                    class="fa-solid fa-right-from-bracket px-1"></i>Logout</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="modeToggle">
                                    <label class="form-check-label" for="modeToggle">Dark Mode</label>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- Modal in logout-->
                <div class="modal fade text-start" id="LogoutModal" tabindex="-1" aria-labelledby="LogoutModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body text-center py-5">
                                <h5>Are you sure to logout?</h5>
                                <a type="button" href="../index.php" class="btn btn-success rounded-pill">Yes</a>
                                <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal"
                                    aria-label="Close">No</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
