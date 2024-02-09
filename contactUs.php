<?php
include 'index-template/header.php';
?>

<div class="container my-5 rounded shadow">
    <!-- contactus message -->
    <div class="container">
        <?php
        if (isset($_SESSION["success_msg"])) {
            ?>
            <div class="alert alert-success alert-dismissible text-center">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>
                    <?= $_SESSION["success_msg"] ?>
                </strong>
            </div>
            <?php
        } else if (isset($_SESSION["error_msg"])) { ?>
                <div class="alert alert-danger alert-dismissible text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>
                    <?= $_SESSION["error_msg"] ?>
                    </strong>
                </div>
        <?php }
        unset($_SESSION["success_msg"]);
        unset($_SESSION["error_msg"]);
        ?>
    </div>
    <div class="row">
        <div class="col-7 py-3 ">
            <form action="config/inbox_ctrl.php" method="post">
                <h2>Contact Us!</h2>
                <label for="">Name:</label>
                <div class="input-group mb-2">
                    <input type="text" value="<?php if (isset($_SESSION['contact-name'])) { echo $_SESSION['contact-name']; }?>" class="form-control" name="contact-name" placeholder="Enter your Name" id="">
                </div>
                <label for="">Email Address:</label>
                <div class="input-group mb-2">
                    <input type="email" value="<?php if (isset($_SESSION['contact-email'])) { echo $_SESSION['contact-email']; }?>" class="form-control" name="contact-email" placeholder="youremail@email.com">
                </div>
                <label for="">Message:</label>
                <div class="input-group mb-2">
                    <textarea name="contact-message" cols="30" rows="4"
                        placeholder="Enter your message" class="form-control"><?php if (isset($_SESSION['contact-message'])) { echo $_SESSION['contact-message']; }?></textarea>
                </div>
                <div class="row form-row mb-2">
                    <div class="col-6">
                        <label for="captcha">Captcha:</label>
                        <div class="fw-bold" id="captcha"></div>
                        <input type="hidden" id="captcha-hidden" name="captcha" class="form-control-plaintext" readonly>
                    </div>

                    <!-- script for preventing copy action -->
                    <script>
                        var captcha = document.getElementById("captcha");

                        document.addEventListener('copy', function (event) {
                            // Prevent default copy behavior
                            event.preventDefault();
                            captcha.textContent = "Copying is disabled";
                            captcha.style.color = "#f00";
                        });
                    </script>

                    <div class="col-6">
                        <label for="">Code:</label>
                        <input type="text" value="" name="captcha-code" class="form-control"
                            placeholder="Enter Captcha Code">
                    </div>
                </div>
                <div class="row mx-0">
                    <button type="submit" name="btn-submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>

        <?php
        include_once("config/dbcon.php");

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
        <div class="col-5 bg-gradient-custom rounded-end d-flex justify-content-end align-items-end">
            <div class="d-flex text-white flex-column bd-highlight mb-3 ">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-school"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <?php echo $universityName; ?>
                    </div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <?php echo $location; ?>
                    </div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-envelope"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <?php echo $email; ?>
                    </div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-mobile"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <?php echo $mobileNumber; ?>
                    </div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-tty"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <?php echo $ttyNumber; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Generate a random string for the captcha
$captcha_length = 7; // Adjust the length of the captcha as needed
$captcha_string = generateRandomString($captcha_length);

// Function to generate a random string
function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters_length = strlen($characters);
    $random_string = '';
    for ($i = 0; $i < $length; $i++) {
        $random_string .= $characters[rand(0, $characters_length - 1)];
    }
    return $random_string;
}

// Set the generated captcha string as the value of the input field
echo "<script>document.getElementById('captcha-hidden').value = '" . $captcha_string . "';</script>";
echo "<script>document.getElementById('captcha').textContent = '" . $captcha_string . "';</script>";
?>


<?php
include 'index-template/footer.php';
?>