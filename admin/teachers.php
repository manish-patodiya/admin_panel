<?php
include "../sidebar/header_top.php";
include "../sidebar/sidebar.php";
?>
<main>
    <?php include "../sidebar/header.php";?>
    <div class="alert alert-success" id="success-msg" style="display:none;"></div>
    <div class="alert alert-danger" id="error-msg" style="display:none;"></div>
    <div class="shadow-sm bg-white">
        <table id="users-table" class="table table-responsive w-sm-auto">
            <thead>
                <tr>
                    <th>Email Address</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <nav class="nav justify-content-end mx-3">
            <ul class="pagination" id="pagination">
            </ul>
        </nav>
    </div>
</main>
<script src="../js/teachers.js"></script>
<?php include "../modals/add_teacher_modal.php"?>
<?php include "../sidebar/footer.php"?>