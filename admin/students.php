<?php
include "../sidebar/header_top.php";
include "../sidebar/sidebar.php";
?>
<div id="content">
    <?php include "../sidebar/header.php";?>
    <section class="content-header px-2 my-3">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Students Table</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
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
</div>
<script src="../js/students.js"></script>
<?php include "../modals/add_student_modal.php"?>
<?php include "../sidebar/footer.php"?>