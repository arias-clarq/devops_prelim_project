<?php
include 'student-includes/header.php';
?>
<div class="container border my-4 p-4">
    <h1>E-grades</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-row">
                    <p class="fw-bold px-2">Name:</p>
                    <p class="text-capitalize"> Juan Dela Cruz</p>
                </div>
                <div class="d-flex flex-row">
                    <p class="fw-bold px-2">Course:</p>
                    <p class="text-uppercase">BS Computer Engineering</p>
                </div>
            </div>
            <div class="col">
                <div class="d-flex flex-row">
                    <p class="fw-bold px-2">Year:</p>
                    <p class="text-uppercase"> iii </p>
                </div>
                <div class="d-flex flex-row">
                    <p class="fw-bold px-2">Section:</p>
                    <p class="text-uppercase"> A </p>
                </div>
            </div>
            <div class="col">
                <p class="fw-bold">Status: <button class="btn btn-primary">Enrolled</button></p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead>
                    <tr class="text-center">
                        <th>Subject</th>
                        <th>Instructor</th>
                        <th style="width: 10%;">Prelim</th>
                        <th style="width: 10%;">Midterm</th>
                        <th style="width: 10%;">Finals</th>
                        <th style="width: 10%;">Average</th>
                        <th style="width: 10%;">Remarks</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>DEVOPS 02</td>
                        <td>Mr. Ronnie Sangil</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" class="form-control-plaintext" name="" id=""></td>
                        <td>
                            <p class="text-uppercase">passed</p>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'student-includes/footer.php';
?>