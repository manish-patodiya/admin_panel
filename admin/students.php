<?php
include "../sidebar/header_top.php";
include "../sidebar/sidebar.php";
?>
<main id="students">
    <?php include "../sidebar/header.php";?>
    <div class="alert alert-success" id="success-msg" style="display:none;"></div>
    <div class="alert alert-danger" id="error-msg" style="display:none;"></div>
    <div class=" shadow-sm bg-white">
        <table id="users-table" class="table  table-responsive w-sm-auto">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Phone no.</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <nav class="nav justify-content-end">
            <ul class="pagination" id="pagination">
            </ul>
        </nav>
    </div>
</main>
<script src="../js/students.js"></script>
<?php include "../modals/add_student_modal.php"?>
<?php include "../sidebar/footer.php"?>