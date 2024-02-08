<?php include 'admin-includes/header.php'; ?>

<!-- Page content -->
<div class="main">

    <div class="container-fluid border my-4 p-3">
        <h1>Class List</h1>

        <div class="container mb-3">
            <form action="" method="get">
                <div class="row">
                    <div class="col">
                        <label for="">Course</label>
                        <select name="courseID" id="" class="form-select">
                            <option selected>Select a Course</option>
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
                    </div>

                    <div class="col">
                        <label for="">Year</label>
                        <select name="year" id="" class="form-select">
                            <option selected>Select a Year</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Section</label>
                        <select name="section" id="" class="form-select">
                            <option selected>Select a Section</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="col align-self-end">
                        <button class="btn btn-primary" type="submit" name="btn_class_filter_submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        // Check if the filter form has been submitted
        if (isset($_GET['btn_class_filter_submit'])) {
            $courseID = $_GET['courseID'];
            $year = $_GET['year'];
            $section = $_GET['section'];

            $search_students = "SELECT * 
                                FROM tbl_student
                                INNER JOIN tbl_course ON tbl_student.courseID = tbl_course.courseID 
                                INNER JOIN tbl_status ON tbl_status.statusID = tbl_student.statusID
                                INNER JOIN tbl_student_info ON tbl_student.studentID = tbl_student_info.studentID 
                                WHERE tbl_student.statusID = 2";

            // Add conditions based on selected filters
            if (!empty($courseID)) {
                $search_students .= " AND tbl_student.courseID = '$courseID'";
            }
            if (!empty($year)) {
                $search_students .= " AND tbl_student.year = '$year'";
            }
            if (!empty($section)) {
                $search_students .= " AND tbl_student.section = '$section'";
            }

            $result = $conn->query($search_students);

            
        } else {
            // If the form has not been submitted, fetch all students
            $class_studentSql = "SELECT * 
                                FROM tbl_student
                                INNER JOIN tbl_course ON tbl_student.courseID = tbl_course.courseID 
                                INNER JOIN tbl_status ON tbl_status.statusID = tbl_student.statusID
                                INNER JOIN tbl_student_info ON tbl_student.studentID = tbl_student_info.studentID 
                                WHERE tbl_student.statusID = 2";
            $result = $conn->query($class_studentSql);
        }
        ?>

        <div class="container table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are results to display
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td class="text-capitalize"><?= $row['lName'] . ', ' . $row['fName'] . ' ' . $row['mName'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['courseName'] ?></td>
                                <td><?= $row['year'] ?></td>
                                <td><?= $row['section'] ?></td>
                                <td><a type="button" href="viewGrades.php?sID=<?= $row['studentID'] ?>" class="btn btn-primary">View Grades</a></td>
                            </tr>
                        <?php
                        } ?>
                        <tr><td colspan="6" class="text-center text-muted"><small>End of Results.</small></td></tr>
                 <?php   } else {
                        echo '<tr><td colspan="6" class="text-center text-muted"><small>No Results Found.</small></td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include 'admin-includes/footer.php'; ?>