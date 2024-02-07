<!-- Modal delete in subjects enrollment system -->
<div class="modal fade text-start" id="DeleteSubjectModal<?= $row['subjectID'] ?>" tabindex="-1"
    aria-labelledby="DeleteSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteSubjectModalLabel">Confirm Delete</h5>
            </div>
            <form action="../config/subject_ctrl.php" method="post">
                <div class="modal-body text-center">
                    <h5>Are you sure to delete the subject?</h5>
                    <input type="hidden" name="subjectID" value="<?= $row['subjectID'] ?>">
                    <button class="btn btn-success rounded-pill" name="btn_delSubject">Yes</button>
                    <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">No</button>
                </div>
            </form>
        </div>
    </div>
</div>