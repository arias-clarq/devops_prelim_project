<?php
include 'index-template/header.php';
?>
<!-- login error messages -->
<div class="container">
    <?php
    if (isset($_SESSION['message'])) {
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>
                <?= $_SESSION['message'] ?>
            </strong>
        </div>
        <?php
    }
    ?>
</div>



<?php
include 'config/dbcon.php';
$sql = "SELECT * FROM tbl_background";
$result = $conn->query($sql);
$imgCounter = 1;

if ($result->num_rows > 0) {
?>
    <!-- carousel -->
    <div class="container-fluid">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <?php
                $rows = $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows into an array
                foreach ($rows as $row) {
                ?>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="<?= $imgCounter ?>"></button>
                <?php $imgCounter++;
                } ?>
            </div>
            <div class="carousel-inner">
                <?php
                foreach ($rows as $index => $row) {
                ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="./uploads/<?php echo $row['Bg']; ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <?php if (!is_null($row['title'])) { ?>
                                <h5><?php echo $row['title']; ?></h5>
                            <?php } ?>
                            <?php if (!is_null($row['description'])) { ?>
                                <p><?php echo $row['description']; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- \\carousel -->

    <!-- cards -->

    <div class="container-fluid d-flex justify-content-center py-5 my-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php
                // SQL query to fetch data from tbl_card_image
                $sql = "SELECT Image, Title, Caption FROM tbl_card_images";

                // Execute the query
                $result = $conn->query($sql);
                // Check if there is data available
                if ($result->num_rows > 0) {
                    // Loop through each row of data
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src=./uploads/<?php echo $row['Image']; ?> class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['Title']; ?></h5>
                                    <p class="card-text"><?php echo $row['Caption']; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- \\cards -->
    <!-- grid content -->

    <div class="container-fluid py-5">
        <div class="row d-flex px-0 mx-0">
            <?php
            include 'config/dbcon.php';
            $sql = "SELECT * FROM tbl_cardcontent";

            // Execute the query
            $result = $conn->query($sql);
            // Check if there is data available
            if ($result->num_rows > 0) {
                // Loop through each row of data
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="p-1 col-sm-<?php echo $row['Size']; ?>">
                        <div class="col p-1" style="margin:1px; background-color: <?php echo $row['Color']; ?> ">
                            <h5><?php echo $row['Title']; ?></h5>
                            <p><?php echo $row['Caption']; ?></p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- \\gridcontent -->


<?php } else { ?>
    <div class="row mx-0 bg-info bg-gradient p-4 text-center text-white d-flex justify-content-center">
        <h1 class="">Welcome</h1>
        <p>Your webpage is ready to be set up. If you are the admin, click start and setup the website through content management section.</p>
        <div class="col-2">
            <button class="btn btn-outline-light align-self-center">Start</button>
        </div>
    </div>
    <div class="row mx-0 p-4">
        <div class="col-sm-4">
            <h4>Content Management System</h4>
            <p>Using a CMS is the ability to easily set up and manage website elements such as carousels, blogs, footers, and more. For example, you can easily create and manage a carousel, which is a slideshow of images or other content, to showcase your services on your website. You can also set up and manage a blog, which allows you to regularly publish new content to your website.</p>
        </div>
        <div class="col-sm-4">
            <h4>Basic Messaging System</h4>
            <p>A basic messaging app can be a valuable tool for students or users to communicate with an administrator or other authorized parties. With this app, users can send messages that will be displayed in an inbox, where they can be reviewed and responded to as needed.</p>
        </div>
        <div class="col-sm-4">
            <h4>Digital Enrollment System</h4>
            <p>Enrollment systems typically include a wide range of features, including student registration, course management, academic records management, and reporting. Students can use the system to select and register for courses</p>
        </div>
    </div>
    <div class="row mx-0 p-4">
        <div class="col-sm-4">
            <div class="alert alert-success" role="alert">
                Status: Complete
            </div>
        </div>
        <div class="col-sm-4">
            <div class="alert alert-danger" role="alert">
                Status: Pending
            </div>
        </div>
        <div class="col-sm-4">
            <div class="alert alert-success" role="alert">
                Status: Complete
            </div>
        </div>
    </div>
<?php } ?>







<?php
session_unset();
include 'index-template/footer.php';
?>