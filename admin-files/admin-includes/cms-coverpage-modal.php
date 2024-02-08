<!-- Modal -->
<div class="modal fade text-start" id="covepageModal" tabindex="-1" aria-labelledby="covepageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="../config/config_bg.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="covepageModalLabel">Insert New Cover Page Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">           
                        <label for="formFile" class="form-label">Insert File:</label>
                        <input class="form-control" type="file" id="formFile" name="bg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
