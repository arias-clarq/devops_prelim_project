<?php include 'admin-includes/header.php'; ?>

<!-- Page content -->
<div class="main">

    <div class="container-fluid border text-center my-4 p-3">
        <h2>Enrollment Scheduling Appointment</h2>

        <div class="container table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Slots</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="date" name="" id="appointmentDate" class="form-control">
                        </td>
                        <td>
                            <input type="time" name="" id="startTime" class="form-control">
                        </td>
                        <td></td>
                        <td>
                            <input type="number" name="" id="" class="form-control">
                        </td>
                        <td><button class="btn btn-success rounded-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="Add"><i class="fa-solid fa-plus"></i></button></td>
                    </tr>
                    <tr>
                        <td>
                            <p>February 23, 2024 | Friday</p>
                        </td>
                        <td>
                            <p>12:21 PM</p>
                        </td>
                        <td>
                            <p>01:21 PM</p>
                        </td>
                        <td>
                            <p>0</p>
                        </td>
                        <td><button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#DeleteSlotModal"><i class="fa-solid fa-trash"></i></button></td>
                        <?php include 'admin-includes/deletes-modal.php'; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid border text-center my-4 p-3">
        <h2>Student Approval Request</h2>

        <div class="container table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#OpenStudentApprovalModal">Open</button>
                            <?php include 'admin-includes\enrollment-open-approval-modal.php'; ?>
                        </td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid border text-center my-4 p-3">
        <h2>Masterlist</h2>

        <div class="container table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th>Username</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>
                            <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#OpenStudentMasterlistModal">Open</button>
                            <?php include 'admin-includes\enrollment-open-masterlist-modal.php'; ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid border text-center my-4 p-3">
        <h2>Subjects</h2>

        <div class="container table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subjects</th>
                        <th>Course</th>
                        <th>Instructor</th>
                        <th>Year</th>
                        <th>Hours</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="" id="" class="form-control">
                        </td>
                        <td>
                            <!-- not sure with this one, i think pili lang mga subjects dito -->
                            <select name="" id="" class="form-select" aria-placeholder="Select course...">
                                <option value="">Devops 02</option>
                                <option value="">Subject2</option>
                                <option value="">Subject3</option>
                                <option value="">Subject4</option>
                            </select>
                        </td>

                        <td>
                            <input type="text" name="" id="" class="form-control">
                        </td>
                        <td>
                            <select name="" id="" class="form-select" aria-placeholder="Select year level...">
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="" id="" class="form-control" placeholder="Type no. of hours">
                        </td>
                        <td><button class="btn btn-success rounded-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="Add"><i class="fa-solid fa-plus"></i></button></td>
                    </tr>
                    <!-- the following are the ADDED subjects, and they are editable -->
                    <tr>
                        <td>
                            <input type="text" name="" value="DEVOPS 02" id="" class="form-control">
                        </td>
                        <td>
                            <select name="" id="" class="form-select">
                                <option value="">Devops 02</option>
                                <option value="">Subject2</option>
                                <option value="">Subject3</option>
                                <option value="">Subject4</option>
                            </select>
                        </td>

                        <td>
                            <input type="text" name="" id="" value="Mr Ronnie Sangil" class="form-control">
                        </td>
                        <td>
                            <select name="" id="" class="form-select">
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="" id="" value="1" class="form-control">
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm  my-1 rounded-pill">Update</button>
                            <button class="btn btn-danger btn-sm  my-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#DeleteSubjectModal">Delete</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the current date
        var currentDate = new Date().toISOString().split('T')[0];

        // Set the minimum date for the appointmentDate input
        document.getElementById('appointmentDate').min = currentDate;

        // Set the maximum date for the appointmentDate input to the end of the current year
        var endOfYear = new Date(new Date().getFullYear(), 11, 31).toISOString().split('T')[0];
        document.getElementById('appointmentDate').max = endOfYear;

        // Set the time range for the startTime input between 8 am and 5 pm
        document.getElementById('startTime').min = '08:00';
        document.getElementById('startTime').max = '17:00';
    });
</script>

<?php include 'admin-includes/footer.php'; ?>