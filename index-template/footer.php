<?php
// Check if the current page is not 'contactUs.php'
$current_page = basename($_SERVER['PHP_SELF']);
if ($current_page != 'contactUs.php') {
?>
<?php
// Assuming you have a database connection established
include_once("config/dbcon.php");

// Fetch school profile data from the database
$sql = "SELECT * FROM school_profile";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $universityName = $row['name'];
    $location = $row['location'];
    $email = $row['email'];
    $mobileNumber = $row['mobile_number'];
    $ttyNumber = $row['telephone_number'];
}
?>

<footer class="bg-dark text-light p-2 sticky-bottom">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 d-flex">
            <?php
    // Fetch the logo data from the database
    $sql = "SELECT * FROM `tbl_logo` WHERE `logoid` = 1"; 
    $result = $conn->query($sql);

    // Check if there's a row in the result
    if ($result->num_rows > 0) {
        // Fetch the logo data
        $row = $result->fetch_assoc();
        ?>
        <img src="././uploads/<?php echo $row["Logo"]; ?>" alt="" width="40" height="40" style="margin-right: 10px;">
        <?php
    } 
    
    ?>
               
                <h6 class="text-uppercase fw-bold pt-2"><?php echo $universityName ?? "Sample University"; ?></h6>
            </div>
            <!-- contact column -->
            <div class="col-1"></div>
            <div class="col-5">
                <h6 class="text-uppercase fw-bold">Contact</h6>
                <div class="d-flex text-white flex-column bd-highlight mb-3">
                    <!-- Display fetched data -->
                    <div class="p-2 bd-highlight text-capitalize row">
                        <div class="col-1 text-center">
                            <i class="fa-solid fa-school"></i>
                        </div>
                        <div class="col-11">
                            <?php echo $universityName ?? "Sample University"; ?>
                        </div>
                    </div>

                    <div class="p-2 bd-highlight text-capitalize row">
                        <div class="col-1 text-center">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="col-11">
                            <?php echo $location ?? "Arayat, Pampanga"; ?>
                        </div>
                    </div>

                    <div class="p-2 bd-highlight row">
                        <div class="col-1 text-center">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="col-11">
                            <?php echo $email ?? "email@gmail.com"; ?>
                        </div>
                    </div>

                    <div class="p-2 bd-highlight row">
                        <div class="col-1 text-center">
                            <i class="fa-solid fa-mobile"></i>
                        </div>
                        <div class="col-11">
                            <?php echo $mobileNumber ?? "+639471026008"; ?>
                        </div>
                    </div>

                    <div class="p-2 bd-highlight row">
                        <div class="col-1 text-center">
                            <i class="fa-solid fa-tty"></i>
                        </div>
                        <div class="col-11">
                            <?php echo $ttyNumber ?? "(821)-297 4729"; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr>
        <div class="row text-center">
            <p>
                © 2024 Copyright: <?php echo $universityName ?? "Sample University"; ?>
            </p>
        </div>
    </div>
</footer>


<?php
}
?>

</body>

</html>
