<?php
include 'student-includes/header.php';
?>

<div class="container shadow py-5 text-center mt-2">
    <?php
    // Fetch the logo data from the database
    $sql = "SELECT * FROM `school_profile` WHERE `id` = 1";
    $result = $conn->query($sql);

    // Check if there's a row in the result
    if ($result->num_rows > 0) {
        // Fetch the logo data
        $row = $result->fetch_assoc();
    ?>
        <h1 class="text-capitalize">Welcome to <?= $row['name'] ?></h1>
    <?php  } ?>

    <p>Digital Enrollment System</p>
</div>

<?php
include 'student-includes/footer.php';
?>