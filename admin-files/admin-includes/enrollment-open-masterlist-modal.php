<!-- Modal when btn open in masterlist is clicked -->
<div class="modal fade text-start" id="OpenStudentMasterlistModal<?= $row['studentID'] ?>" tabindex="-1" aria-labelledby="OpenStudentMasterlistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="OpenStudentMasterlistModalLabel">
                    <!-- Name of student displayed here --> Juan Mallari
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
                                <td>Username</td>
                                <td><input type="text" class="form-control form-control-plaintext" value="<?= $row['username'] ?>"></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" class="form-control" value="<?= $row['fName'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><input type="text" class="form-control" value="<?= $row['mName'] ?>"></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" class="form-control" value="<?= $row['lName'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Sex</td>
                                <td>
                                    <select name="sex" class="form-select">
                                        <option value="Male" <?php if ($row['sex'] == "Male") {
                                                                    echo 'selected';
                                                                } ?>>Male</option>
                                        <option value="Female" <?php if ($row['sex'] == "Female") {
                                                                    echo 'selected';
                                                                } ?>>Female</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Course</td>
                                <td>
                                    <select name="" id="" class="form-select">
                                        <option value="<?= $row['courseID'] ?>"><?= $row['courseName'] ?></option>
                                        <?php
                                        // while($row['courseName']){
                                        // On going: under construction
                                        // }

                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Year</td>
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
                            </tr>
                            <tr>
                                <td>Section</td>
                                <td>
                                <select name="section" class="form-select">
                                                <option>Select a section...</option>
                                                <option value="A"<?php if ($row['section'] == 'A') {
                                                                echo "selected";
                                                            } ?>>A</option>
                                                <option value="B" <?php if ($row['section'] == 'B') {
                                                                echo "selected";
                                                            } ?>>B</option>
                                                <option value="C" <?php if ($row['section'] == 'C') {
                                                                echo "selected";
                                                            } ?>>C</option>
                                                <option value="D" <?php if ($row['section'] == 'D') {
                                                                echo "selected";
                                                            } ?>>D</option>
                                            </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Birthdate</td>
                                <td><input type="text" class="form-control" value="<?= $row['bday'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Home Address</td>
                                <td><input type="text" class="form-control" value="<?= $row['homeAddress'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><input type="text" class="form-control" value="<?= $row['phoneNo.'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" class="form-control" value="<?= $row['email'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Guardian Name</td>
                                <td><input type="text" class="form-control" value="<?= $row['guardianName'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Guardian Phone Number</td>
                                <td><input type="text" class="form-control" value="<?= $row['guardianPhoneNo'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Guardian Address</td>
                                <td><input type="text" class="form-control" value="<?= $row['guardianAddress'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Elementary School Name</td>
                                <td><input type="text" class="form-control" value="<?= $row['elementary'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Elementary Graduation Year</td>
                                <td><input type="text" class="form-control" value="<?= $row['elementaryYear'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Junior High School Name</td>
                                <td><input type="text" class="form-control" value="<?= $row['juniorHigh'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Junior High Graduation Year</td>
                                <td><input type="text" class="form-control" value="<?= $row['juniorHighYear'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Senior High School Name</td>
                                <td><input type="text" class="form-control" value="<?= $row['seniorHigh'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Senior High Graduation Year</td>
                                <td><input type="text" class="form-control" value="<?= $row['seniorHighYear'] ?>"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success rounded-pill">Update</button>
                <button class="btn btn-danger rounded-pill">Drop</button>
            </div>

        </div>
    </div>
</div>