<?php include 'admin-includes/header.php'; ?>

<!-- Page content -->
<div class="main">

    <div class="container-fluid border my-4 p-3">
        <h1>Class List</h1>

        <div class="container mb-3">
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="">Course</label>
                        <select name="" id="" class="form-select">
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
                        <select name="" id="" class="form-select">
                            <option selected>Select a Year</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Section</label>
                        <select name="" id="" class="form-select">
                            <option selected>Select a Section</option>
                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">C</option>
                            <option value="">D</option>
                        </select>
                    </div>
                    <div class="col align-self-end">
                        <button class="btn btn-primary" type="submit" name="btn_class_filter_submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        $class_studentSql = "SELECT * 
                        FROM tbl_student
                        INNER JOIN tbl_course ON tbl_student.courseID = tbl_course.courseID 
                        INNER JOIN tbl_status ON tbl_status.statusID = tbl_student.statusID
                        INNER JOIN tbl_student_info ON tbl_student.studentID = tbl_student_info.studentID 
                        WHERE tbl_student.statusID = 2";
        $result = $conn->query($class_studentSql);
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
                    <?php while ($row = $result->fetch_assoc()) {

                    ?>
                        <tr>
                            <td class="text-capitalize"><?=$row['lName'].', '.$row['fName'].' '.$row['mName']?></td>
                            <td><?=$row['username']?></td>
                            <td><?=$row['courseName']?></td>
                            <td><?=$row['year']?></td>
                            <td><?=$row['section']?></td>
                            <form action="" method="get">
                            <td><a type="button" href="viewGrades.php?sID=<?=$row['studentID']?>" class="btn btn-primary">View Grades</a></td>
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



</div>

<?php include 'admin-includes/footer.php'; ?>