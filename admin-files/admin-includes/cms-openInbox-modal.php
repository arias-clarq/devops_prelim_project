<!-- Modal -->
<div class="modal fade text-start" id="OpenInboxModal<?= $row['inboxID'] ?>" tabindex="-1" aria-labelledby="OpenInboxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-3">

            <div class="modal-header py-2 bg-info bg-gradient text-white d-flex justify-content-end">

                <div class="col-4 text-end">
                    <small class="text-light"><?= $formattedDate ?></small>
                </div>
            </div>

            <div class="modal-body">
                <div class="row mx-0">
                    <div class="col-1">
                        <i class="fa-solid fa-circle-user fa-3x"></i>
                    </div>
                    <div class="col">
                        <h6 class="pt-2 mb-0 text-capitalize"><?= $row['sender'] ?></h6>
                        <small class="text-muted"><?= $row['email'] ?></small>
                       
                    </div>
                </div>
                <hr>
                <div class="mb-3 px-4 ">
                    <?php echo $row['message'] ?>
                </div>
            </div>
            <div class="modal-footer">
                <form action="../config/inbox_ctrl.php" method="post">
                    <button name="btn-read" type="sumbit" class="btn btn-danger rounded-pill" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <input type="hidden" name="inboxID" value="<?= $row['inboxID'] ?>">
                </form>
            </div>
        </div>
    </div>
</div>