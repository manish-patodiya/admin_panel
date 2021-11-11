<?php
include "../sidebar/header_top.php";
include "../sidebar/sidebar.php";
?>
<main class="p-3 bg-light">
    <section class="content-header px-2 ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-outline-dark" id="btn-edit-profile">Edit Profile</a>
                    <a class="btn btn-outline-dark" href="" id="btn-back" style="display:none">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-outline-dark " target="__blank" id="btn-change-pass">Change Password</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header px-2 ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-4 mb-3">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="200px">
                                <a class="h3 fa fa-camera cursor-pointer text-dark" id="change-photo"
                                    style="display:none"></a>
                                <div class=" mt-3">
                                    <h4 class="mb-3">
                                        <?php echo $_SESSION['user_details']['fname'] . " " . $_SESSION['user_details']['lname']; ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 " id="card-profile">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-9 text-secondary" id="fname">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Last Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id=lname>
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="email">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">DOB</h6>
                                </div>
                                <div class="col-sm-9 text-secondary " id="dob">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary " id="gender">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary " id="mobile">
                                    N/A
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary " id="address">
                                    N/A
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-8" id="card-edit-profile" style="display:none">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <form method="post" autocomplete="off" id="frm-update">
                                <div class="row my-3">
                                    <div class="col-3 m-auto">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-9 text-secondary">
                                        <input type="text" name="fname" class="form-control" id="i-fname">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-sm-3 m-auto">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="lname" class="form-control" id="i-lname">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-sm-3 m-auto">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="email" class="form-control" id="i-email">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-sm-3 m-auto">
                                        <h6 class="mb-0">DOB</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="dob" type="date" id="i-dob">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-sm-3 m-auto">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <label class="radio-inline me-5"><input type="radio" name="gender"
                                                value="male">Male</label>
                                        <label class="radio-inline me-5"><input type="radio" name="gender"
                                                value="female">Female</label>
                                        <label class="radio-inline "> <input type="radio" name="gender"
                                                value="other">other</label>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-sm-3 m-auto">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="mobile" class="form-control mobile" id="i-mobile">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-sm-3 m-auto">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address" class="form-control" id="i-address">
                                    </div>
                                </div>
                                <input type="hidden" name="frm_name" value="update_profile">
                                <button type="submit" class="btn btn-dark float-end">Save
                                    changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</main>
<script src="../js/profile.js"></script>
<?php include "../sidebar/footer.php";?>
<?php include "../modals/change_pass_modal.php";?>