<?php
include "../sidebar/header_top.php";
include "../sidebar/sidebar.php";
?>
<div id="content">
    <?php include "../sidebar/header.php";?>
    <div class="row">
        <div class="col-md-5 border-right m-1">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px"
                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <a class="fa fa-edit text-dark" href="#!">Change photo</a>
            </div>
            <div class="d-flex flex-column p-3 py-5">
                <div class="row mt-2">
                    <div class="mt-3">
                        <label class="labels">username</label>
                        <input type="text" name="username" class="form-control" placeholder="username">
                    </div>
                    <div class="mt-3">
                        <label class="labels">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="email">
                    </div>
                    <div class="mt-3">
                        <label class="labels">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="passoword">
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3 py-53 my-5 col-md-6 border-right">
            <form method="post">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">First name</label>
                        <input type="text" name="fname" class="form-control" placeholder="first name">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Middle Name</label>
                        <input type="text" name="mname" class="form-control" value="" placeholder="surname">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Surname</label>
                        <input type="text" name="sname" class="form-control" placeholder="middle Name">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="form-group">
                        <label>Gender:</label>
                        <label class="radio-inline mx-4"> <input type="radio" name="gender">Female</label>
                        <label class="radio-inline mx-4"><input type="radio" name="gender">Male</label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <select class=" col form-select " aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">A-positive (A+)</option>
                            <option value="2">A-negative (A-)</option>
                            <option value="3">B-positive (B+)</option>
                            <option value="4">B-negative (B-)</option>
                            <option value="5">AB-positive (AB+)</option>
                            <option value="6">AB-negative (AB-)</option>
                            <option value="7">O-positive (O+)</option>
                            <option value="8">O-negative (O-)</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <label class="labels">Phone no.</label>
                        <input type="text" name="phone" class="form-control" placeholder="enter 10 digits phone no.">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <label class="labels">Date of birth (dd-mm-yy)</label>
                        <input type="text" name="dob" class="form-control" placeholder="Date of birth">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label class="labels">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">State</label>
                        <input type="text" name="state" class="form-control" placeholder="state">
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="Submit">Save
                        Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "../sidebar/footer.php"?>