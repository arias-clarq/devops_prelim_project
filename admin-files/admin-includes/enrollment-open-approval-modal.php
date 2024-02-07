<!-- Modal when btn open in masterlist is clicked -->
<div class="modal fade text-start" id="OpenStudentApprovalModal<?= $row['studentID'] ?>" tabindex="-1"
    aria-labelledby="OpenStudentApprovalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <form action="../config/enrollment_ctrl.php" method="post">
            <div class="modal-content">
                <?php
                $id = $row['studentID'];
                $studentSql = "SELECT * FROM tbl_student
                INNER JOIN tbl_appointment ON tbl_student.appointmentID = tbl_appointment.appointmentID 
                INNER JOIN tbl_course ON tbl_student.courseID = tbl_course.courseID 
                INNER JOIN tbl_status ON tbl_status.statusID = tbl_student.statusID
                INNER JOIN tbl_student_info ON tbl_student.studentID = tbl_student_info.studentID WHERE tbl_student.studentID = $id";
                $result = $conn->query($studentSql);
                while ($row2 = $result->fetch_assoc()) {
                    $start_time = strtotime($row2['start_time']); // Parse start time
                    ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="OpenStudentApprovalModalLabel">
                            <?= $row2['fName'] . ' ' . $row2['mName'] . ' ' . $row2['lName'] ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 200px;">Title</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Appointment Schedule</td>
                                        <td class="fw-bold">
                                            <?= date('F j, Y', strtotime($row2['date'])) . ' | ' . date('h:i A', $start_time) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Enrollment Status</td>
                                        <td class="fw-bold">
                                            <?= $row2['status'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><input type="text" class="form-control" value="<?= $row2['username'] ?>"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type="password" class="form-control" value="<?= $row2['password'] ?>"
                                                readonly></td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td><input name="fname" type="text" class="form-control"
                                                value="<?= $row2['fName'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Middle Name</td>
                                        <td><input name="mname" type="text" class="form-control"
                                                value="<?= $row2['mName'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td><input name="lname" type="text" class="form-control"
                                                value="<?= $row2['lName'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sex</td>
                                        <td>
                                            <select name="sex" class="form-select">
                                                <option value="Male" <?php if ($row2['sex'] == "Male") {
                                                    echo 'selected';
                                                } ?>>Male</option>
                                                <option value="Female" <?php if ($row2['sex'] == "Female") {
                                                    echo 'selected';
                                                } ?>>Female</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Course</td>
                                        <td>
                                            <select name="course" class="form-select">
                                                <?php
                                                $courseSql = "SELECT * FROM `tbl_course`";
                                                $showCourse = $conn->query($courseSql);
                                                while ($row3 = $showCourse->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row3['courseID'] ?>" <?php if ($row3['courseID'] == $row2['courseID']) {
                                                          echo "selected";
                                                      } ?>>
                                                        <?= $row3['courseName'] ?>
                                                    </option>
                                                <?php }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Year</td>
                                        <td>
                                            <select name="year" class="form-select">
                                                <option value="I" <?php if ($row2['year'] == 'I') {
                                                    echo "selected";
                                                } ?>>I</option>
                                                <option value="II" <?php if ($row2['year'] == 'II') {
                                                    echo "selected";
                                                } ?>>II</option>
                                                <option value="III" <?php if ($row2['year'] == 'III') {
                                                    echo "selected";
                                                } ?>>III</option>
                                                <option value="IV" <?php if ($row2['year'] == 'IV') {
                                                    echo "selected";
                                                } ?>>IV</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Section</td>
                                        <td>
                                            <select name="section" class="form-select">
                                                <option>Select a section...</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Birthdate</td>
                                        <td><input name="bdate" type="date" class="form-control"
                                                value="<?= $row2['bday'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Home Address</td>
                                        <td><input name="home" type="text" class="form-control"
                                                value="<?= $row2['homeAddress'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td><input name="phoneNo" type="text" class="form-control"
                                                value="<?= $row2['phoneNo.'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input name="email" type="text" class="form-control"
                                                value="<?= $row2['email'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Guardian Name</td>
                                        <td><input name="guardianName" type="text" class="form-control"
                                                value="<?= $row2['guardianName'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Guardian Phone Number</td>
                                        <td><input name="guardianPhoneNo" type="text" class="form-control"
                                                value="<?= $row2['guardianPhoneNo'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Guardian Address</td>
                                        <td><input name="GuardianAddress" type="text" class="form-control"
                                                value="<?= $row2['guardianAddress'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Elementary School Name</td>
                                        <td><input name="elem" type="text" class="form-control"
                                                value="<?= $row2['elementary'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Elementary Graduation Year</td>
                                        <td><input name="elem-year" type="text" class="form-control"
                                                value="<?= $row2['elementaryYear'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Junior High School Name</td>
                                        <td><input name="jh" type="text" class="form-control"
                                                value="<?= $row2['juniorHigh'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Junior High Graduation Year</td>
                                        <td><input name="jh-year" type="text" class="form-control"
                                                value="<?= $row2['juniorHighYear'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Senior High School Name</td>
                                        <td><input name="sh" type="text" class="form-control"
                                                value="<?= $row2['seniorHigh'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Senior High Graduation Year</td>
                                        <td><input name="sh-year" type="text" class="form-control"
                                                value="<?= $row2['seniorHighYear'] ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="studentID" value="<?= $row2['studentID'] ?>">
                        <button type="sumbit" name="btn_enroll" class="btn btn-success rounded-pill">Enroll</button>
                        <button type="sumbit" name="btn_reject" class="btn btn-danger rounded-pill">Reject</button>
                    </div>
                <?php } ?>
            </div>
        </form>

    </div>
</div>