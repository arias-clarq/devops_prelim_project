<?php
include 'index-template/header.php';
?>

<div class="container my-5">

    <!-- section for appointment schedule -->
    <div class="container-fluid shadow rounded-3 p-3 mb-5">
        <!-- <h1>No appointment schedule available</h1> -->
        <h1>Select your appointment schedule</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>time</th>
                    <th>Slots</th>
                    <th>Action/s</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>cell</td>
                    <td>cell</td>
                    <td>cell</td>
                    <td><input type="radio" name="" id=""></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- section for creating student portal account -->
    <div class="container-fluid shadow rounded-3 p-3 mb-5">
        <h2>I. Create Your Student Portal Account</h2>
        <label for="">Username:</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">@student</span>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="email" class="form-control" id="password" placeholder="enter password">
        </div>
    </div>

    <!-- section for educational attainment -->
    <div class="container-fluid shadow rounded-3 p-3 mb-5">
        <h2>II. Educational Attainment</h2>

        <label for="">Elementary:</label>
        <div class="row g-3 mb-3">
            <div class="col-8">
                <input type="text" class="form-control" placeholder="School Name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Graduation Year">
            </div>
        </div>

        <label for="">Junior High School:</label>
        <div class="row g-3 mb-3">
            <div class="col-8">
                <input type="text" class="form-control" placeholder="School Name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Graduation Year">
            </div>
        </div>

        <label for="">Senior High School:</label>
        <div class="row g-3 mb-3">
            <div class="col-8">
                <input type="text" class="form-control" placeholder="School Name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Graduation Year">
            </div>
        </div>
    </div>

    <!-- section for Enrollment Form -->
    <div class="container-fluid shadow rounded-3 p-3 mb-5">
        <h2>III. Enrollment Form</h2>

        <h5 class="text-center">Student's Personal Information</h5>
        <label for="">Student's Name:</label>
        <div class="row g-3 mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="First name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Middle name">
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col">
                <label for="">Sex</label>
                <select id="" class="form-select">
                    <option selected>Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="col">
                <label for="">Birthdate</label>
                <input type="date" class="form-control">
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col">
                <label for="">Email Address</label>
                <input type="email" placeholder="Enter Active email address" class="form-control">
            </div>
            <div class="col">
                <label for="">Contact Number</label>
                <div class="input-group">
                    <div class="input-group-text">+63</div>
                    <input type="text" class="form-control" id="" placeholder="9XXXXXXXX">
                </div>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col">
                <label for="">Home Address</label>
                <textarea name="" class="form-control" id="" placeholder="Enter full address" cols="30" rows="2"></textarea>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col">
                <label for="">Guardian's Name</label>
                <input type="text" placeholder="Enter Guardian's Full Name" class="form-control">
            </div>
            <div class="col">
                <label for="">Guardian's Contact Number</label>
                <div class="input-group">
                    <div class="input-group-text">+63</div>
                    <input type="text" class="form-control" id="" placeholder="9XXXXXXXX">
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="">Guardian's Home Address</label>
                <textarea name="" class="form-control" id="" placeholder="Enter full address of guardian" cols="30" rows="2"></textarea>
            </div>
        </div>
        <hr>
        <h5 class="text-center">Student's Enrollment</h5>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="">Course you want to enroll</label>
                <select id="" class="form-select">
                    <option selected>Choose...</option>
                    <option>Course 1</option>
                    <option>Course 2</option>
                </select>
            </div>
            <div class="col">
                <label for="">Year level you want to enroll</label>
                <select id="" class="form-select">
                    <option selected>Choose...</option>
                    <option>I</option>
                    <option>II</option>
                    <option>III</option>
                    <option>IV</option>
                </select>
            </div>
        </div>

    </div>

    <!-- section for data privacy -->
    <div class="container-fluid shadow rounded-3 p-3 mb-5">

        <h5>Data Privacy Notice</h5>
        <p>
            Before you submit any personal information to our website, please take a moment to read this data privacy notice. We are committed to protecting your personal information and ensuring that your privacy is respected. We comply with the Data Privacy Act of the Philippines and other applicable data protection laws.
        </p>
        <br>

        <h5>What personal information do we collect?</h5>
        <p>
            We may collect personal information such as your name, email address, phone number, and other details that you provide when you fill out a form or interact with our website.
        </p>
        <br>

        <h5>How do we use your personal information?</h5>
        <p>
            We may use your personal information to provide you with the services or information that you have requested, to respond to your inquiries, and to improve our website and services. We may also use your personal information for other purposes that are compatible with the original purpose of collection or as required by law. </p>
        <br>

        <h5>Do we share your personal information?</h5>
        <p>
            We do not sell, trade, or otherwise transfer your personal information to outside parties unless we provide you with advance notice or as required by law. </p> <br>

        <h5>How do we protect your personal information?</h5>
        <p>
            We implement a variety of security measures to protect your personal information from unauthorized access, use, or disclosure. We use industry-standard encryption technology and other reasonable measures to safeguard your personal information. </p> <br>

        <h5>What are your rights?</h5>
        <p>
            You have the right to access, correct, and delete your personal information that we have collected. You may also withdraw your consent to our processing of your personal information at any time. To exercise your rights, please contact us using the contact details provided on our website. </p> <br>

        <h5>Changes to this notice</h5>
        <p>
            We may update this data privacy notice from time to time. Any changes will be posted on our website, and the revised notice will apply to personal information collected after the date it is posted. </p> <br>

        <h5>Contact us</h5>
        <p>
            If you have any questions or concerns about our data privacy practices, please contact us by clicking this <a href="contactUs.php">link</a>
        </p>
        <br>

        <button class="btn btn-primary">
            Submit
        </button>
    </div>

</div>


<?php
include 'index-template/footer.php';
?>