<!-- Modal when btn open in masterlist is clicked -->
<div class="modal fade text-start" id="OpenStudentMasterlistModal<?=$row['studentID']?>" tabindex="-1" aria-labelledby="OpenStudentMasterlistModalLabel" aria-hidden="true">
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
                                <td><input type="text" class="form-control form-control-plaintext" value="juan@student"></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Sex</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Course</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Section</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Birthdate</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Home Address</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Guardian Name</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Guardian Phone Number</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Guardian Address</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Elementary School Name</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Elementary Graduation Year</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Junior High School Name</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Junior High Graduation Year</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Senior High School Name</td>
                                <td><input type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Senior High Graduation Year</td>
                                <td><input type="text" class="form-control" value=""></td>
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