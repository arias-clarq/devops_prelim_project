<!-- Modal delete in inbox -->
<div class="modal fade text-start" id="DeleteInboxModal<?= $row['inboxID'] ?>" tabindex="-1"
    aria-labelledby="DeleteInboxModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteInboxModalLabel">Confirm Delete</h5>
            </div>
            <div class="modal-body text-center">
                <h5>Are you sure to delete the message?</h5>
                <form action="../config/inbox_ctrl.php" method="post">
                    <input type="hidden" name="inboxID" value="<?= $row['inboxID'] ?>">
                    <button name="btn-delete" type="submit" class="btn btn-success rounded-pill">Yes</button>

                    <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">No</button>
                </form>
            </div>
        </div>
    </div>
</div>