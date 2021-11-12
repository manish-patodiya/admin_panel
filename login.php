<?php
session_start();
include "constants/constant.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>
    .inputvalues input {
        border: 2px solid;
    }

    .error {
        color: red;
    }
    </style>
    <script>
    const BASE_URL = "<?php echo BASE_URL; ?>";
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?php if (isset($_SESSION['user_details']) && $_SESSION['user_details']['uid']) {?>
    <script src="js/roles.js"></script>
    <?php }?>
</head>

<body class="bg-light">
    <section style="display: block;" id="sec-login">
        <div class="container h-100">
            <div class=" row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 my-5">
                    <div class="card bg-light text-dark shadow" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class=" pb-5">
                                <h1 class="fas fa-lock"></h1>
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-black-50 mb-5">Please enter your login and password!</p>
                                <div class="alert alert-danger" id="login-err" style="display: none;"></div>
                                <form method="post" autocomplete="off" id="frm-login">
                                    <div class="form-outline mb-2 inputvalues" style="text-align:left">
                                        <label class="form-label">Email/Mobile</label>
                                        <input type="text" name="email" class="form-control" required />
                                    </div>

                                    <div class="form-outline form-white mb-2 inputvalues" style="text-align:left">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control " required />
                                    </div>
                                    <input type="hidden" name="frm_name" value="login">

                                    <p class="small mb-3 pb-lg-2 text-end"><a class="text-dark-50" href="#!">Forgot
                                            password?</a>
                                    </p>

                                    <button class="btn btn-dark btn-lg px-5 form-control" type="submit">Login</button>
                                </form>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="#" onclick="register()"
                                        class="text-50 fw-bold">Register Here</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section style="display: none;" id="sec-register">
        <div class="mask d-flex align-items-center h-100 ">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5 my4">
                        <div class="card bg-light text-dark shadow" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form method="post" autocomplete="off" id="frm-register">

                                    <div class="row">
                                        <div class="col form-outline mb-2 inputvalues">
                                            <label class="form-label">First name</label>
                                            <input name="fname" type="text" class="form-control" />
                                        </div>

                                        <div class="col form-outline mb-2 inputvalues">
                                            <label class="form-label">Last name</label>
                                            <input name="lname" type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-outline mb-2 inputvalues">
                                        <label class="form-label">Phone no.</label>
                                        <input name="mobile" type="number" class="form-control" />
                                    </div>

                                    <div class="form-outline mb-2 inputvalues">
                                        <label class="form-label">Your Email </label>
                                        <input name="email" type="text" class="form-control" />
                                    </div>

                                    <div class="form-outline mb-2 inputvalues">
                                        <label class=" form-label">Password</label>
                                        <input name="password" type="password" class="form-control" id="password" />
                                    </div>

                                    <div class="form-outline mb-3 inputvalues">
                                        <label class="form-label">Confirm password</label>
                                        <input name="cpassword" type="password" class="form-control" />
                                    </div>
                                    <input name="frm_name" type="hidden" value="register">

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn-lg btn-dark form-control">Register</button>
                                    </div>
                                    <p class="text-center text-dark mt-5 mb-0">Have already an account? <a href="#"
                                            class="fw-bold" onclick="login()"><u>Login here</u></a></p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="js/validation_functions.js"></script>
    <script src="js/script.js"></script>

</body>

</html>