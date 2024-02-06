<?php
include 'student-includes/header.php';
?>

<div class="container-fluid my-4 p-4">
    <div class="container shadow py-3">
        <h1>Basic Profile</h1>
        <!-- navpill-custom-pc -->
        <div class="row mx-0  p-3">
            <div class="col-3 navpill-custom-pc text-center">
                <i class="fa-regular fa-circle-user px-1 fa-10x"></i>
                <br>

                <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Personal Information</button>
                    <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">Guardian Information</button>
                    <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">Educational Background</button>
                    <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">Change Password</button>
                </div>

            </div>
            <div class="col px-3">
                <div class="nav navpill-custom-hr-ver nav-pills mt-3" id="v-pills-tab" role="tablist">

                    <button class="nav-link active btn btn-sm text-uppercase fw-bold px-1" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true"><small>Personal Info</small></button>

                    <button class="nav-link btn btn-sm text-uppercase fw-bold px-1" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false"><small>Guardian Info</small></button>

                    <button class="nav-link btn btn-sm text-uppercase fw-bold px-1" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false"><small>Educ Background</small></button>

                    <button class="nav-link btn btn-sm text-uppercase fw-bold px-1" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false"><small>Password</small></button>

                </div>
                <hr class="navpill-custom-hr-ver">
                <div class=" py-4">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- personal information -->
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                            <div class="d-flex flex-row">
                                <p class="fw-bold px-1">Username:</p>
                                <p>jul@student</p>
                            </div>
                            <div class="row px-2 mb-3">
                                <div class="col-md-12 col-lg-4 px-1">
                                    <p class="fw-bold mb-0"><small>First Name:</small></p>
                                    <input type="text" class="form-control" readonly value="Juliana">
                                </div>
                                <div class="col-md-12 col-lg-4 px-1">
                                    <p class="fw-bold mb-0"><small>Middle Name:</small></p>
                                    <input type="text" class="form-control" readonly value="Simbulan">
                                </div>
                                <div class="col-md-12 col-lg-4 px-1">
                                    <p class="fw-bold mb-0"><small>Last Name:</small></p>
                                    <input type="text" class="form-control" readonly value="Paguinto">
                                </div>
                            </div>
                            <div class="row px-2 mb-3">
                                <div class="col-md-12 col-lg-4 px-1">
                                    <p class="fw-bold mb-0"><small>Phone Number:</small></p>
                                    <input type="text" class="form-control" readonly value="09471026008">
                                </div>
                                <div class="col-md-12 col-lg-8 px-1">
                                    <p class="fw-bold mb-0"><small>Email Address:</small></p>
                                    <input type="text" class="form-control" readonly value="hcc@gmail.com">
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <div class="col px-1">
                                    <p class="fw-bold mb-0"><small>Sex:</small></p>
                                    <input type="text" class="form-control" readonly value="Female">
                                </div>
                                <div class="col px-1">
                                    <p class="fw-bold mb-0"><small>Birthdate:</small></p>
                                    <input type="text" class="form-control" readonly value="04-26-2003">
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <div class="col px-1">
                                    <p class="mb-0 fw-bold"><small>Home Address:</small></p>
                                    <input type="text" class="form-control" readonly value="123 Jaan lAng sta ana pampanga">
                                </div>
                            </div>
                        </div>
                        <!-- \\personal information -->
                        <!-- guardian information -->
                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                            <div class="d-flex flex-row mb-3">
                                <div class="col px-1">
                                    <p class="mb-0 fw-bold"><small>Guardian Name:</small></p>
                                    <input type="text" class="form-control" readonly value="nanay mo">
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <div class="col px-1">
                                    <p class="mb-0 fw-bold"><small>Guardian Contact Number:</small></p>
                                    <input type="text" class="form-control" readonly value="09471026008">
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <div class="col px-1">
                                    <p class="mb-0 fw-bold"><small>Guardian Home Address:</small></p>
                                    <input type="text" class="form-control" readonly value="123 Jaan lAng sta ana pampanga">
                                </div>
                            </div>
                        </div>
                        <!-- educational background -->
                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                            <div class="row px-2 mb-3">
                                <div class="col-md-12 col-lg-8 px-1">
                                    <p class="fw-bold mb-0"><small>Elementary School Name:</small></p>
                                    <input type="text" class="form-control" readonly value="central">
                                </div>
                                <div class="col-md-12 col-lg-4 px-1">
                                    <p class="fw-bold mb-0"><small>Elementary Graduation Year:</small></p>
                                    <input type="text" class="form-control" readonly value="2015">
                                </div>
                            </div>
                            <div class="row px-2 mb-3">
                                <div class="col-md-12 col-lg-8 px-1">
                                    <p class="fw-bold mb-0"><small>Junior High School Name:</small></p>
                                    <input type="text" class="form-control" readonly value="AI">
                                </div>
                                <div class="col-md-12 col-lg-4 px-1">
                                    <p class="fw-bold mb-0"><small>Junior High Graduation Year:</small></p>
                                    <input type="text" class="form-control" readonly value="2019">
                                </div>
                            </div>
                            <div class="row px-2 mb-3">
                                <div class="col-md-12 col-lg-8 px-1">
                                    <p class="fw-bold mb-0"><small>Senior High School Name:</small></p>
                                    <input type="text" class="form-control" readonly value="Adelle">
                                </div>
                                <div class="col-md-12 col-lg-4 px-1">
                                    <p class="fw-bold mb-0"><small>Senior High Graduation Year:</small></p>
                                    <input type="text" class="form-control" readonly value="2021">
                                </div>
                            </div>
                        </div>
                        <!-- change password -->
                        <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                            <h4>Change Password</h4>
                            <div class="d-flex flex-row mb-3">
                                <div class="col px-1">
                                    <p class="mb-0 fw-bold"><small>Current Password:</small></p>
                                    <input type="password" class="form-control" value="">
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <div class="col px-1">
                                    <p class="mb-0 fw-bold"><small>New Password:</small></p>
                                    <input type="password" class="form-control" value="">
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <div class="col px-1">
                                    <p class="mb-0 fw-bold"><small>Re-type New Password:</small></p>
                                    <input type="password" class="form-control" value="">
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <div class="col px-1 d-flex justify-content-end">
                                    <button class="btn btn-primary">Change Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

</div>

<?php
include 'student-includes/footer.php';
?>