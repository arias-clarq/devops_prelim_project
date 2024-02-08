<?php
include 'index-template/header.php';
?>
<!-- login error messages -->


<div class="container-fluid d-flex justify-content-center">
    <?php
    include 'config/dbcon.php';
    $sql = "SELECT * FROM tbl_background";
    $result = $conn->query($sql);
    $imgCounter = 1;

    if ($result->num_rows > 0) {
    ?>
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
    <?php } else { ?>
        <h1 class="my-4">Welcome to homepage</h1>
    <?php } ?>
</div>


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




<?php
session_unset();
include 'index-template/footer.php';
?>