<?php include 'admin-includes/header.php'; ?>

<?php


if (isset($_GET['sID'])) {
    $GET_studentID = $_GET['sID'];
    $class_studentSql = "SELECT * 
                        FROM tbl_student
                        INNER JOIN tbl_course ON tbl_student.courseID = tbl_course.courseID 
                        INNER JOIN tbl_status ON tbl_status.statusID = tbl_student.statusID
                        INNER JOIN tbl_student_info ON tbl_student.studentID = tbl_student_info.studentID 
                        WHERE tbl_student.studentID = $GET_studentID";
    $result = $conn->query($class_studentSql);

    ?>

    <!-- Page content -->
    <div class="main">
        <div class="container-fluid border my-4 p-4">
            <h1>E-grades</h1>
            <div class="container">
                <?php while ($row = $result->fetch_assoc()) {

                    ?>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-row">
                                <p class="fw-bold px-2">Name:</p>
                                <p class="text-capitalize">
                                    <?= $row['lName'] . ', ' . $row['fName'] . ' ' . $row['mName'] ?>
                                </p>
                            </div>
                            <div class="d-flex flex-row">
                                <p class="fw-bold px-2">Course:</p>
                                <p class="text-uppercase">
                                    <?= $row['courseName'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-row">
                                <p class="fw-bold px-2">Year:</p>
                                <p class="text-uppercase">
                                    <?= $row['year'] ?>
                                </p>
                            </div>
                            <div class="d-flex flex-row">
                                <p class="fw-bold px-2">Section:</p>
                                <p class="text-uppercase">
                                    <?= $row['section'] ?>
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">

                        <table class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Subject</th>
                                    <th>Instructor</th>
                                    <th style="width: 10%;">Prelim</th>
                                    <th style="width: 10%;">Midterm</th>
                                    <th style="width: 10%;">Finals</th>
                                    <th style="width: 10%;">Average</th>
                                    <th style="width: 10%;">Remarks</th>
                                    <th style="width: 10%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $studentCourseID = $row['courseID'];
                                $studentYear = $row['year'];
                                $studentID = $row['studentID'];

                                $sql_subject = "SELECT * FROM tbl_subject WHERE courseID = '$studentCourseID' AND year = '$studentYear'";
                                $resultSubjects = $conn->query($sql_subject);

                                while ($row2 = $resultSubjects->fetch_assoc()) { ?>
                                    <form action="../config/grades_ctrl.php" method="post">
                                        <tr class="text-center">
                                            <td>
                                                <?= $row2['subjectName'] ?>
                                            </td>
                                            <td>
                                                <?= $row2['instructor'] ?>
                                            </td>

                                            <td> <input type="number" class="form-control" name="prelims"> </td>
                                            <td> <input type="number" class="form-control" name="midterm"> </td>
                                            <td> <input type="number" class="form-control" name="finals"> </td>

                                            <td><input type="number" class="form-control-plaintext" name=""></td>
                                            <td>
                                                <p class="text-uppercase">passed</p>
                                            </td>
                                            <td>
                                                <button class="btn btn-success" type="submit" name="btn_save_grades">Save</button>
                                                <!-- hidden -->
                                                <input type="text" name="studentID" value="<?= $row['studentID'] ?>">
                                                <input type="text" name="subjectID" value="<?= $row2['subjectID'] ?>">
                                            </td>
                                        </tr>
                                    </form>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            <?php }
} ?>
    </div>
</div>


<?php include 'admin-includes/footer.php'; ?>