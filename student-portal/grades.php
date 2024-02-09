<?php
include 'student-includes/header.php';
?>
<div class="container border my-4 p-4">
    <h1>E-grades</h1>
    <div class="container">
        <div class="row">
            <?php
            $studentSql = "SELECT * 
                        FROM tbl_student
                        INNER JOIN tbl_course ON tbl_student.courseID = tbl_course.courseID 
                        INNER JOIN tbl_status ON tbl_status.statusID = tbl_student.statusID
                        INNER JOIN tbl_student_info ON tbl_student.studentID = tbl_student_info.studentID";
            $result = $conn->query($studentSql);
            $row = $result->fetch_assoc();
            ?>
            <div class="col">
                <div class="d-flex flex-row">
                    <p class="fw-bold px-2">Name:</p>
                    <p class="text-capitalize">
                        <?= $_SESSION['student'] ?>
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
            <?php
            if ($row['statusID'] == 1) { ?>
                <div class="col">
                    <p class="fw-bold">Status: <button class="btn btn-warning">PENDING</button></p>
                </div>
            <?php } else if ($row['statusID'] == 2) { ?>
                    <div class="col">
                        <p class="fw-bold">Status: <button class="btn btn-success">Enrolled</button></p>
                    </div>
            <?php } ?>
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
                    <?php
                    $studentID = $_SESSION['studentID'];
                    $gradeSql = "SELECT * FROM `tbl_grade` 
                        INNER JOIN tbl_student ON tbl_grade.studentID = tbl_student.studentID
                        INNER JOIN tbl_subject ON tbl_grade.subjectID = tbl_subject.subjectID WHERE tbl_grade.studentID = {$studentID}";
                    $result = $conn->query($gradeSql);
                    while($row = $result->fetch_assoc()){
                    ?>
                    <tr class="text-center">
                        <td><?=$row['subjectName']?></td>
                        <td><?=$row['instructor']?></td>
                        <td><?php if($row['prelims'] <= 0){ echo 'TBA';}else{
                            if(substr($row['prelims'], -3) == '.00'){
                                echo substr($row['prelims'], 0, -3);
                            }else{
                                echo $row['prelims'];
                            }
                        }?>
                        </td>
                        <td><?php if($row['midterm'] <= 0){ echo 'TBA';}else{
                            if(substr($row['midterm'], -3) == '.00'){
                                echo substr($row['midterm'], 0, -3);
                            }else{
                                echo $row['midterm'];
                            }
                        }?></td>
                        <td><?php if($row['finals'] <= 0){ echo 'TBA';}else{
                            if(substr($row['finals'], -3) == '.00'){
                                echo substr($row['finals'],0,-3);
                            }else{
                                echo $row['finals'];
                            }
                            }?></td>
                        <?php
                        $prelim = $row['prelims'];
                        $midterm = $row['midterm'];
                        $finals = $row['finals'];

                        if($prelim > 0 && $midterm > 0 && $finals > 0){
                            $average = ($prelim + $midterm + $finals) / 3;
                            $flag = true;
                        }else{
                            $average = 0;
                            $flag = false;
                        }
                        ?>
                        <td><?php if($average <= 0){ echo 'TBA';}else{echo number_format($average, 2);}?></td>
                        <td>
                            <?php 
                            if(($average >= 75 && $average <= 100) && $flag == true){ 
                                echo "PASSED";
                            }else if($average == 0){
                                echo 'TBA';
                            }else if(($average < 75) && $flag == true){
                                echo 'FAILED';
                            }
                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'student-includes/footer.php';
?>