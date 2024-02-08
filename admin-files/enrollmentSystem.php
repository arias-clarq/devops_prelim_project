<?php include 'admin-includes/header.php'; ?>

<!-- Page content -->
<div class="main">
    <!-- Enrollment Scheduling Appointment start-->
    <div class="container-fluid border text-center my-4 p-3">
        <h2>Enrollment Scheduling Appointment</h2>
        <!-- appointment controler response messages -->
        <div class="container">
            <?php
            if (isset($_SESSION['success_message'])) {
                ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>
                        <?= $_SESSION['success_message'] ?>
                    </strong>
                </div>
                <?php
            } else if (isset($_SESSION['delete_message'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>
                        <?= $_SESSION['delete_message'] ?>
                        </strong>
                    </div>
                <?php
            }
            unset($_SESSION['success_message']);
            unset($_SESSION['delete_message']);
            ?>
        </div>
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
                    <form action="../config/appointment_ctrl.php" method="post">
                        <tr>
                            <td>
                                <input type="date" name="appointmentDate" class="form-control">
                            </td>
                            <td>
                                <input type="time" name="startTime" id="startTime" class="form-control"
                                    oninput="calculateEndTime()">
                            </td>
                            <td>
                                <input type="time" name="endTime" id="endTime" class="form-control" readonly>
                            </td>
                            <td>
                                <input type="number" name="slots" class="form-control">
                            </td>
                            <td>
                                <button class="btn btn-success rounded-circle" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Add" type="submit" name="addAppointment">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                    </form>

                    <script>
                        function calculateEndTime() {
                            // Get the start time input value
                            var startTimeInput = document.getElementById('startTime').value;

                            // If start time is not empty
                            if (startTimeInput) {
                                // Parse the start time to get hours and minutes
                                var parts = startTimeInput.split(':');
                                var hours = parseInt(parts[0], 10);
                                var minutes = parseInt(parts[1], 10);

                                // Calculate the end time by adding an hour to the start time
                                var endTime = new Date();
                                endTime.setHours(hours + 1);
                                endTime.setMinutes(minutes);

                                // Format the end time to HH:mm format
                                var formattedEndTime = ('0' + endTime.getHours()).slice(-2) + ':' + ('0' + endTime.getMinutes()).slice(-2);

                                // Set the value of the end time input
                                document.getElementById('endTime').value = formattedEndTime;
                            }
                        }
                    </script>

                    <?php
                    $AppointmentSql = "SELECT * FROM `tbl_appointment`";
                    $showAppointments = $conn->query($AppointmentSql);
                    while ($row = $showAppointments->fetch_assoc()) {
                        $start_time = strtotime($row['start_time']); // Parse start time
                        $end_time = strtotime('+1 hour', $start_time); // Add an hour to the start time
                        ?>
                        <tr>
                            <td>
                                <p>
                                    <?= date('F j, Y', strtotime($row['date'])) ?> |
                                    <?= date('l', strtotime($row['date'])) ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?= date('h:i A', $start_time) ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?= date('h:i A', $end_time) ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?= $row['slots'] ?>
                                </p>
                            </td>
                            <td><button class="btn btn-danger rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#DeleteSlotModal<?= $row['appointmentID'] ?>"><i
                                        class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php include 'admin-includes/deletes-modal/appointment.php'; ?>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- Enrollment Scheduling Appointment end-->

    <!-- Student Approval Request start -->
    <div class="container-fluid border text-center my-4 p-3">
        <h2>Student Approval Request</h2>
        <!-- approval controler response messages -->
        <div class="container">
            <?php
            if (isset($_SESSION['enrolled_message'])) {
                ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>
                        <?= $_SESSION['enrolled_message'] ?>
                    </strong>
                </div>
                <?php
            } else if (isset($_SESSION['noCourse_message'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>
                        <?= $_SESSION['noCourse_message'] ?>
                        <?php if (isset($_SESSION['updSub_message'])) {
                            echo $_SESSION['updSub_message'];
                        } ?>
                        </strong>
                    </div>
                <?php
            }
            unset($_SESSION['noCourse_message']);
            unset($_SESSION['enrolled_message']);
            ?>
        </div>
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
                    <?php
                    $approval_studentSql = "SELECT * 
                        FROM tbl_student
                        INNER JOIN tbl_appointment ON tbl_student.appointmentID = tbl_appointment.appointmentID 
                        INNER JOIN tbl_course ON tbl_student.courseID = tbl_course.courseID 
                        INNER JOIN tbl_status ON tbl_status.statusID = tbl_student.statusID
                        INNER JOIN tbl_student_info ON tbl_student.studentID = tbl_student_info.studentID 
                        WHERE tbl_student.statusID = 1";
                    $result = $conn->query($approval_studentSql);

                    while ($row = $result->fetch_assoc()) {
                        $start_time = strtotime($row['start_time']); // Parse start time
                        ?>
                        <tr>
                            <td>
                                <?= date('F j, Y', strtotime($row['date'])) ?>
                            </td>
                            <td>
                                <?= date('h:i A', $start_time) ?>
                            </td>
                            <td>
                                <?= $row['username'] ?>
                            </td>
                            <td>
                                <?= $row['lName'] . ', ' . $row['fName'] . ' ' . $row['mName'] ?>
                            </td>
                            <td>
                                <?= $row['courseName'] ?>
                            </td>
                            <td>
                                <?= $row['year'] ?>
                            </td>
                            <td>
                                <?= $row['status'] ?>
                            </td>
                            <td>
                                <button class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#OpenStudentApprovalModal<?= $row['studentID'] ?>">Open</button>
                                <?php include 'admin-includes/enrollment-open-approval-modal.php'; ?>
                            </td>

                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Student Approval Request end -->

    <!-- Masterlist start -->
    <div class="container-fluid border text-center my-4 p-3">
        <h2>Masterlist</h2>
        <!-- masterlist controler response messages -->
        <div class="container">
            <?php
            if (isset($_SESSION['updMaster_message'])) {
                ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>
                        <?= $_SESSION['updMaster_message'] ?>
                    </strong>
                </div>
                <?php
            } else if (isset($_SESSION['delMaster_message'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>
                        <?= $_SESSION['delMaster_message'] ?>
                        </strong>
                    </div>
                <?php
            }
            unset($_SESSION['updMaster_message']);
            unset($_SESSION['delMaster_message']);
            ?>
        </div>
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
                    <?php
                    $masterlist_studentSql = "SELECT * 
                        FROM tbl_student
                        INNER JOIN tbl_appointment ON tbl_student.appointmentID = tbl_appointment.appointmentID 
                        INNER JOIN tbl_course ON tbl_student.courseID = tbl_course.courseID 
                        INNER JOIN tbl_status ON tbl_status.statusID = tbl_student.statusID
                        INNER JOIN tbl_student_info ON tbl_student.studentID = tbl_student_info.studentID 
                        WHERE tbl_student.statusID = 2";
                    $result = $conn->query($masterlist_studentSql);

                    while ($row = $result->fetch_assoc()) {
                        $start_time = strtotime($row['start_time']); // Parse start time
                        ?>
                        <tr>
                            <td>
                                <?= $row['username'] ?>
                            </td>
                            <td>
                                <?= $row['lName'] . ', ' . $row['fName'] . ' ' . $row['mName'] ?>
                            </td>
                            <td>
                                <?= $row['courseName'] ?>
                            </td>
                            <td>
                                <?= $row['year'] ?>
                            </td>
                            <td>
                                <?= $row['section'] ?>
                            </td>
                            <td>
                                <?= $row['status'] ?>
                            </td>
                            <td>
                                <button class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#OpenStudentMasterlistModal<?= $row['studentID'] ?>">Open</button>
                                <?php include 'admin-includes\enrollment-open-masterlist-modal.php'; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Masterlist end -->

    <!-- Subjects start -->
    <div class="container-fluid border text-center my-4 p-3">
        <h2>Subjects</h2>
        <!-- subject controler response messages -->
        <div class="container">
            <?php
            if (isset($_SESSION['addSub_message']) || isset($_SESSION['updSub_message'])) {
                ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>
                        <?php if (isset($_SESSION['addSub_message'])) {
                            echo $_SESSION['addSub_message'];
                        } ?>
                        <?php if (isset($_SESSION['updSub_message'])) {
                            echo $_SESSION['updSub_message'];
                        } ?>
                    </strong>
                </div>
                <?php
            } else if (isset($_SESSION['delSub_message'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>
                        <?= $_SESSION['delSub_message'] ?>
                        </strong>
                    </div>
                <?php
            }
            unset($_SESSION['delSub_message']);
            unset($_SESSION['addSub_message']);
            unset($_SESSION['updSub_message']);
            ?>
        </div>
        <div class="container table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subjects</th>
                        <th>Course</th>
                        <th>Instructor</th>
                        <th style="width: 100px;">Year</th>
                        <th style="width: 100px;">Hours</th>
                        <th style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="../config/subject_ctrl.php" method="post">
                        <tr>
                            <td>
                                <input type="text" name="subject" class="form-control" placeholder="Type a subject">
                            </td>
                            <td>
                                <select name="course" class="form-select">
                                    <option selected>Select a course...</option>
                                    <?php
                                    $courseSql = "SELECT * FROM `tbl_course`";
                                    $showCourse = $conn->query($courseSql);
                                    while ($row = $showCourse->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $row['courseID'] ?>">
                                            <?= $row['courseName'] ?>
                                        </option>
                                    <?php }
                                    ?>
                                </select>
                            </td>

                            <td>
                                <input type="text" name="instructor" class="form-control">
                            </td>
                            <td>
                                <select name="year" class="form-select">
                                    <option selected>Select a year level...</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" min="1" name="hours" id="" class="form-control"
                                    placeholder="Type no. of hours">
                            </td>
                            <td><button type="submit" class="btn btn-success rounded-circle" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Add" name="btn_addSubject"><i
                                        class="fa-solid fa-plus"></i></button></td>
                        </tr>
                    </form>
                    <!-- the following are the ADDED subjects, and they are editable -->
                    <?php
                    $subjectSql = 'SELECT * FROM `tbl_subject` INNER JOIN tbl_course WHERE tbl_subject.courseID = tbl_course.courseID';
                    $showSubject = $conn->query($subjectSql);

                    while ($row = $showSubject->fetch_assoc()) {
                        ?>
                        <tr>
                            <form action="../config/subject_ctrl.php" method="post">
                                <td>
                                    <input type="text" name="subject" value="<?= $row['subjectName'] ?>" id=""
                                        class="form-control">
                                </td>
                                <td>
                                    <select name="course" class="form-select">
                                        <?php
                                        $courseSql = "SELECT * FROM `tbl_course`";
                                        $showCourse = $conn->query($courseSql);
                                        while ($row2 = $showCourse->fetch_assoc()) {
                                            ?>
                                            <option value="<?= $row2['courseID'] ?>" <?php if ($row2['courseID'] == $row['courseID']) {
                                                  echo "selected";
                                              } ?>>
                                                <?= $row2['courseName'] ?>
                                            </option>
                                        <?php }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="instructor" value="<?= $row['instructor'] ?>"
                                        class="form-control">
                                </td>
                                <td>
                                    <select name="year" class="form-select">
                                        <option value="I" <?php if ($row['year'] == 'I') {
                                            echo "selected";
                                        } ?>>I</option>
                                        <option value="II" <?php if ($row['year'] == 'II') {
                                            echo "selected";
                                        } ?>>II</option>
                                        <option value="III" <?php if ($row['year'] == 'III') {
                                            echo "selected";
                                        } ?>>III</option>
                                        <option value="IV" <?php if ($row['year'] == 'IV') {
                                            echo "selected";
                                        } ?>>IV</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="hours" id="" value="<?= $row['hours'] ?>"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="hidden" name="subjectID" value="<?= $row['subjectID'] ?>">
                                    <button type="submit" class="btn btn-success btn-sm  my-1 rounded-pill"
                                        name="btn_updSubject">Update</button>
                                    <button type="button" class="btn btn-danger btn-sm  my-1 rounded-pill"
                                        data-bs-toggle="modal"
                                        data-bs-target="#DeleteSubjectModal<?= $row['subjectID'] ?>">Delete</button>
                                    <?php include 'admin-includes/deletes-modal/subjects.php'; ?>
                                </td>
                            </form>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Subjects end -->


</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
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