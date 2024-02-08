<?php
include 'admin-includes/header.php'; ?>

<!-- Page content -->
<div class="main">
    <?php
    // School Profile
    if (isset($_SESSION['success_message'])) {
        // Display the success message
        echo '<div id="successMessage" class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
        // Unset the session variable to clear the message
        unset($_SESSION['success_message']);
    } elseif (isset($_SESSION['Success_error'])) {
        // Display the error message
        echo '<div id="successError" class="alert alert-danger" role="alert">' . $_SESSION['Success_error'] . '</div>';
        // Unset the session variable to clear the message
        unset($_SESSION['Success_error']);
    }

    // Cover Page
    if (isset($_SESSION['Success_message'])) {
        // Display the success message
        echo '<div id="successMessage" class="alert alert-success" role="alert">' . $_SESSION['Success_message'] . '</div>';
        // Unset the session variable to clear the message
        unset($_SESSION['Success_message']);
    } elseif (isset($_SESSION['Success_error'])) {
        // Display the error message
        echo '<div id="successMessage" class="alert alert-danger" role="alert">' . $_SESSION['Success_error'] . '</div>';
        // Unset the session variable to clear the message
        unset($_SESSION['Success_error']);
    }
    // Session Add Card and Images
    if (isset($_SESSION['Card_Add'])) {
        // Display the success message
        echo '<div id="successMessage" class="alert alert-success" role="alert">' .  $_SESSION['Card_Add'] . '</div>';
        // Unset the session variable to clear the message
        unset($_SESSION['Card_Add']);
    } elseif (isset($_SESSION['Not_upload'])) {
        // Display the error message
        echo '<div id="successMessage" class="alert alert-danger" role="alert">' .  $_SESSION['Not_upload'] . '</div>';
        // Unset the session variable to clear the message
        unset($_SESSION['Not_upload']);
    }
    // Session Grid Contents
    if (isset($_SESSION['Grid_success'])) {
        // Display the success message
        echo '<div id="successMessage" class="alert alert-success" role="alert">' .   $_SESSION['Grid_success'] . '</div>';
        // Unset the session variable to clear the message
        unset($_SESSION['Grid_success']);
    } elseif (isset($_SESSION['Grid_error'])) {
        // Display the error message
        echo '<div id="successMessage" class="alert alert-danger" role="alert">' . $_SESSION['Grid_error'] . '</div>';
        // Unset the session variable to clear the message
        unset($_SESSION['Grid_error']);
    }
    ?>

    <div class="container my-2">
        <?php
        if (isset($_SESSION['message'])) {
        ?>
            <div class="alert alert-<?php echo $_SESSION['bg-color']; ?>">
                <strong><?= $_SESSION['message'] ?></strong>
            </div>
        <?php
        }
        unset($_SESSION['message']);
        ?>
    </div>

    <!-- update logo---------------------------------------- -->
    <div class="container-fluid border text-center my-4 p-3">

        <span class="d-block">
            <h2>Update Logo</h2>
        </span>
        <?php
        include_once "../config/dbcon.php";
        $sql = "SELECT * FROM `tbl_logo` WHERE `logoid` = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the logo data
            $row = $result->fetch_assoc();
        ?>
            <span class="d-block">
                <img src=".././uploads/<?php echo $row["Logo"]; ?>" height="200vh" alt="Logo Image">
            </span>
            <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#logoModal">Choose Logo</button>
        <?php include 'admin-includes/cms-logo-modal.php';
        }
        ?>
    </div>

    <!-- \\update logo---------------------------------------- -->

    <!-- school profile---------------------------------------- -->
    <?php
    // Fetch existing school profile data from the database
    $query = "SELECT * FROM school_profile WHERE id = 1";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        $name = $row['name'];
        $location = $row['location'];
        $email = $row['email'];
        $mobile_number = $row['mobile_number'];
        $telephone_number = $row['telephone_number'];
        $description = $row['description'];
    } else {
        // Default values if no data found (you can customize this)
        $name = "";
        $location = "";
        $email = "";
        $mobile_number = "";
        $telephone_number = "";
        $description = "";
    }
    ?>

    <div class="container-fluid border text-center my-4 p-3">
        <h2 class="text-center mb-3">School Profile</h2>
        <div class="row d-flex">
            <div class="col-sm-2 text-center">
                <h6>Category</h6>
            </div>
            <div class="col-sm-10 text-center">
                <h6>Details</h6>
            </div>
        </div>
        <form method="post" action="../config/school_profile.php">
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control mb-2" placeholder="Enter School Name" name="name" id="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Location:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control mb-2" placeholder="Enter School's Location" name="location" id="location" value="<?php echo $location; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Email Address:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control mb-2" placeholder="Enter School's Email Address" name="email" id="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Mobile Number:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control mb-2" placeholder="Enter School's Mobile Number" name="mobile_number" id="mobile_number" value="<?php echo $mobile_number; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Telephone Number:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control mb-2" placeholder="Enter School's Telephone Number" name="telephone_number" id="telephone_number" value="<?php echo $telephone_number; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Description:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control mb-2" placeholder="Enter Description" name="description" id="description" value="<?php echo $description; ?>">
                </div>
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
    <!-- \\school profile---------------------------------------- -->

    <!-- coverpage------------------------------------------------ -->
    <div class="container-fluid border text-center my-4 p-3">
        <div class="container">
            <h2>Cover Page</h2>

            <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#covepageModal">Insert</button>
            <?php include 'admin-includes/cms-coverpage-modal.php'; ?>

            <!-- Dynamically generate cards for each background image -->
            <div class="row row-cols-1 row-cols-md-4 g-4">

                <?php
                $sql_images = "SELECT * FROM `tbl_background`";
                $result_images = $conn->query($sql_images);

                if ($result_images->num_rows > 0) {
                    while ($row_image = $result_images->fetch_assoc()) {
                        $Bg_id = $row_image["Bg_id"]; // Assuming Bg_id is the primary key
                ?>

                        <div class="col">
                            <div class="card h-100 shadow">
                                <img src=".././uploads/<?php echo $row_image["Bg"]; ?>" alt="Background Image" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <form action="../config/add_value.php" method="post">
                                        <input type="text" placeholder="Insert Title" value="<?php echo $row_image['title']; ?>" name="title" class="form-control border-0 mb-3">
                                        <textarea placeholder="Insert Caption" id="" name="description" cols="30" rows="2" class="form-control border-0"><?php echo $row_image['description']; ?></textarea>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="Bg_id" value="<?= $Bg_id ?>">
                                    <button class="btn btn-primary mx-2" type="submit" name="update_value">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                    </button>
                                    </form>

                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCoverModal_<?php echo $Bg_id; ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <?php include 'admin-includes/cms-delete-modal-confirmation/delete-cover-modal.php'; ?>
                                </div>
                            </div>
                        </div>

                    <?php }
                } else { ?>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <i class="fa-solid fa-image fa-10x text-muted"></i>
                        <p>No Added Coverpage.</p>
                    </div>
                    <div class="col-4"></div>
                <?php  } ?>

            </div>
        </div>
    </div>
    <!--\\coverpage ---------------------------- -->


    <!-- cards and images----------------------------------- -->
    <div class="container-fluid border text-center my-4 p-3">
        <h2>Card and Images</h2>
        <div class="container">
            <!-- Form to add new card content -->

            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- Default card -->
                <div class="col">
                    <div class="card shadow">
                        <form method="post" action="../config/add_cardimages.php" enctype="multipart/form-data">
                            <div class="card-body text-center">
                                <label for="title">Upload Image</label>
                                <label for="formFile" class="form-label">Insert File:</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                                <label for="title">Title</label>
                                <input type="text" name="title" placeholder="Insert Title" class="form-control">
                                <label for="caption">Caption</label>
                                <textarea name="caption" placeholder="Insert Caption" id="caption" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                            <div class="card-footer">
                                <!-- Save button for the default card -->
                                <button type="submit" class="btn btn-primary" name="save_card">
                                    <i class="fa-solid fa-add"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                include_once "../config/dbcon.php";

                // Fetch card content from the database
                $sql = "SELECT * FROM tbl_card_images";
                $result = $conn->query($sql);
                // Display card content fetched from the database for other cards
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <img src=".././uploads/<?php echo $row['Image']; ?>" class="card-img-top" alt="...">

                                <div class="card-body">
                                    <form method="post" action="../config/update_cardimages.php">
                                        <input type="text" value="<?php echo $row['Title']; ?>" name="titleUpdate" placeholder="Insert Title" class="form-control border-3 mb-3">
                                        <textarea name="captionUpdate" placeholder="Insert Caption" id="caption" cols="30" rows="2" class="form-control border-3"><?php echo $row['Caption']; ?></textarea>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="hidden_card_id" value="<?php echo $row['card&images_id']; ?>" id="">
                                    <button class="btn btn-primary" type="submit" name="update_title_caption">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                    </button>
                                    </form>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCardImageModal_<?php echo $row['card&images_id']; ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <?php include 'admin-includes/cms-delete-modal-confirmation/delete-card-image-modal.php'; ?>
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
    <!-- \\cards and images----------------------------------- -->

    <!-- grid contents--------------------------------------------- -->
    <?php
    include_once "../config/dbcon.php";

    // Fetch card content from the database
    $sql = "SELECT * FROM tbl_cardcontent";
    $result = $conn->query($sql);
    ?>

    <div class="container-fluid border text-center my-4 p-3">
        <h2>Grid Contents</h2>

        <!-- Form to add new card content -->

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Default card -->
            <div class="col">
                <div class="card h-100 shadow">
                    <form method="post" action="../config/add_cardcontent.php">
                        <div class="card-body text-center">
                            <label for="title">Title</label>
                            <input type="text" name="title" placeholder="Insert Title" class="form-control">
                            <label for="caption">Caption</label>
                            <textarea name="caption" placeholder="Insert Caption" id="caption" cols="30" rows="2" class="form-control"></textarea>
                            <label for="size">Size</label>
                            <input type="number" min="1" max="5" name="size" placeholder="Insert Size" class="form-control">
                            <label for="color">Choose Background Color</label>
                            <input type="color" value="#d9d9d9" name="color" class="form-control form-control-color" id="color" title="Choose your color">
                        </div>
                        <div class="card-footer">
                            <!-- Save button for the default card -->
                            <button type="submit" class="btn btn-primary" name="save">
                                <i class="fa-solid fa-add"></i> Add
                            </button>

                        </div>
                    </form>
                </div>
            </div>

            <?php
            // Display card content fetched from the database for other cards
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>

                    <div class="col">
                        <div class="card h-100 shadow" style="background-color: <?php echo $row['Color']; ?>">
                            <div class="card-body text-center">
                                <form method="post" action="../config/edit_contentcard.php">
                                    <!-- Hidden input field to store CardContent_id -->
                                    <input type="hidden" name="edit_id" value="<?php echo $row['cardcontent_id']; ?>">
                                    <label for="title">Title</label>
                                    <input type="text" value="<?php echo $row['Title']; ?>" class="form-control" name="edit_name">
                                    <label for="caption">Caption</label>
                                    <textarea name="edit_caption" id="caption" cols="30" rows="2" class="form-control"><?php echo $row['Caption']; ?></textarea>
                                    <label for="size">Size</label>
                                    <input type="number" max="5" min="1" value="<?php echo $row['Size']; ?>" class="form-control" name="edit_size">
                                    <label for="color">Choose Background Color</label>
                                    <input type="color" value="<?php echo $row['Color']; ?>" class="form-control form-control-color" id="color" title="Choose your color" name="edit_color">
                            </div>
                            <div class="card-footer">
                                <!-- Save and Delete buttons for each card -->
                                <button type="submit" class="btn btn-primary" name="edit">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                </button>
                                </form>
                               
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGridContentModal_<?php echo $row['cardcontent_id']; ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <?php include 'admin-includes/cms-delete-modal-confirmation/delete-grid-content-modal.php'; ?>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

        </div>

    </div>




    <script>
        // JavaScript to hide the success message after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('successMessage');
            var successError = document.getElementById('successError');

            if (successMessage) {
                setTimeout(function() {
                    fadeOutAndHide(successMessage);
                }, 2000);
            }

            if (successError) {
                setTimeout(function() {
                    fadeOutAndHide(successError);
                }, 2000);
            }

            function fadeOutAndHide(element) {
                var fadeEffect = setInterval(function() {
                    if (!element.style.opacity) {
                        element.style.opacity = 1;
                    }
                    if (element.style.opacity > 0) {
                        element.style.opacity -= 0.1;
                    } else {
                        clearInterval(fadeEffect);
                        element.style.display = 'none';
                    }
                }, 200);
            }
        });
    </script>

    <?php include 'admin-includes/footer.php'; ?>