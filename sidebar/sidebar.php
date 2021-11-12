<div class="flex-column flex-shrink-0 p-3 text-white bg-dark vh-100" id="sidebar">
    <span class="fs-4">Aarambh</span>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item" id="tab-teachers" style="display:none;">
            <a href="<?php echo BASE_URL ?>admin/teachers.php" class="nav-link text-white">
                <i class="fas fa-users"></i>
                Teachers
            </a>
        </li>
        <li class="nav-item" id="tab-students" style="display:none;">
            <a href="<?php echo BASE_URL ?>admin/students.php" class="nav-link text-white">
                <i class="fas fa-users"> </i>
                Students
            </a>
        </li>
        <li class="nav-item" id="tab-exams" style="display:none;">
            <a href="<?php echo BASE_URL ?>admin/exams.php" class="nav-link text-white">
                <i class="fas fa-users"> </i>
                Exams
            </a>
        </li>
    </ul>
    <hr>
</div>