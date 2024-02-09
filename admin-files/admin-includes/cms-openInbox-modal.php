<!-- Modal -->
<div class="modal fade text-start" id="OpenInboxModal<?= $row['inboxID'] ?>" tabindex="-1"
    aria-labelledby="OpenInboxModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="OpenInboxModalLabel">Message</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    show message here
                </div>
            </div>
            <div class="modal-footer">
                <form action="../config/inbox_ctrl.php" method="post">
                    <button name="btn-read" type="sumbit" class="btn btn-danger rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                    <input type="hidden" name="inboxID" value="<?= $row['inboxID'] ?>">
                </form>
            </div>
        </div>
    </div>
</div>