<div class="modal fade" id="mdl-delete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete row</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" id="frm-delete">
                <div class="modal-body mx-5">

                    <div class="inputvalues">
                        <input name="id" type="hidden" id="delete_id">
                        <h5>are you sure???</h5>
                        <input type="hidden" name="frm_name" value="Delete" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>