<!-- Modal delete in slots enrollment -->
<div class="modal fade text-start" id="DeleteSlotModal<?= $row['appointmentID'] ?>" tabindex="-1"
    aria-labelledby="DeleteSlotModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteSlotModalLabel">Confirm Delete</h5>
            </div>
            <form action="../config/appointment_ctrl.php" method="post">
                <div class="modal-body text-center">
                    <h5>Are you sure to delete the slot?</h5>
                    <input type="hidden" name="appointmentID" value="<?= $row['appointmentID'] ?>">
                    <button type="submit" name="deleteSlots" class="btn btn-success rounded-pill">Yes</button>
                    <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">No</button>
                </div>
            </form>

        </div>
    </div>
</div>