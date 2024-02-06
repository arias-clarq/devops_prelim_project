<?php
include 'index-template/header.php';
?>

<div class="container mt-5 rounded shadow">
    <div class="row">
        <div class="col-7 py-3 ">
            <h2>Contact Us!</h2>
            <label for="">Name:</label>
            <div class="input-group mb-2">
                <input type="text" class="form-control" name="contact-name" placeholder="Enter your Name" id="">
            </div>
            <label for="">Email Address:</label>
            <div class="input-group mb-2">
                <input type="email" class="form-control" name="contact-email" placeholder="youremail@email.com" id="">
            </div>
            <label for="">Message:</label>
            <div class="input-group mb-2">
                <textarea name="contact-message" id="" cols="30" rows="10" placeholder="Enter your message" class="form-control"></textarea>
            </div>
            <div class="row form-row mb-2">
                <div class="col-6">
                    <label for="">Captcha:</label>
                    <input type="text" value="s4mPl3" readonly class="form-control-plaintext">
                </div>
                <div class="col-6">
                    <label for="">Code:</label>
                    <input type="text" value="" class="form-control" placeholder="Enter Captcha Code">
                </div>
            </div>
            <div class="row mx-0">
                <button class="btn btn-primary">Send</button>
            </div>
        </div>
        <div class="col-5 bg-gradient-custom rounded-end d-flex justify-content-end align-items-end">
            <div class="d-flex text-white flex-column bd-highlight mb-3 ">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-school"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight"> sample university</div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight"> Arayat, Pampanga</div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-envelope"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight">  email@gmail.com</div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-mobile"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight">  +639471026008</div>
                </div>
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"><i class="fa-solid fa-tty"></i></div>
                    <div class="p-2 flex-grow-1 bd-highlight"> (821)-297 4729</div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'index-template/footer.php';
?>