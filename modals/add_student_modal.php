<div class="modal fade" id="mdl-add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add row here</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" id="frm-add">
                <div class="alert alert-danger" id="regis-err" style="display:none;"></div>
                <div class="modal-body mx-5">

                    <div class="inputvalues text-center">
                        <input name="email" id="email" type="email" placeholder="Enter email address" autocomplete="off"
                            required>
                    </div>

                    <div class="inputvalues text-center">
                        <input name="password" type="text" placeholder="Enter Password" autocomplete="off" required>
                        <input type="hidden" name="frm_name" value="add_student" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>