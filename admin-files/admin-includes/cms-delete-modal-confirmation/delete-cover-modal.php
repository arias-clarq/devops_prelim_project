<!-- Modal -->
<div class="modal fade" id="deleteCoverModal_<?php echo $Bg_id; ?>" tabindex="-1" aria-labelledby="deleteCoverModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center py-5">
                <h5 class="mb-4">Are you sure you want to delete this Cover Image?</h5>
                <form method="post" action="../config/delete_coverpage.php">
                    <input type="hidden" name="hidden_id_img" value="<?php echo $Bg_id; ?>">
                    <button type="submit" name="btn_delete" class="btn btn-success rounded-pill">Confirm</button>
                    <button type="button" class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal" aria-label="Close">No</button>
                </form>
            </div>
        </div>
    </div>
</div>