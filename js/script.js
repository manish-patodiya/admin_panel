$(function () {
    register = () => {
        $("#sec-login").hide();
        $("#sec-register").show();
    }

    login = () => {
        $("#sec-register").hide();
        $("#sec-login").show();
    }

    $("#frm-register").validate({
        rules: {
            fname: {
                required: true,
                minlength: 2,
            },
            lname: {
                required: true,
                minlength: 2,
            },
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                mobileExist: true
            },
            email: {
                required: true,
                email: true,
                emailExist: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 20,
            },
            cpassword: {
                required: true,
                equalTo: "#password",
            },
        }, messages: {
            cpassword: {
                equalTo: "Password does not match",
            }
        }, submitHandler: function (form) {
            let register = {
                url: BASE_URL + "server.php",
                data: $("#frm-register").serialize(),
                method: "post",
                success: function (res) {
                    let result = JSON.parse(res);
                    window.location.reload();
                },
                error: function (err) {
                    console.log(err);
                }
            }
            $.ajax(register);
        }
    });


    $("#frm-login").validate({
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        submitHandler: function (form) {
            let login = {
                url: BASE_URL + "server.php",
                data: $("#frm-login").serialize(),
                method: "post",
                success: function (res) {
                    let result = JSON.parse(res);
                    if (result.status == 1) {
                        window.location.reload();
                    } else {
                        $("#login-err").html(result.msg);
                        $("#login-err").show();
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            }
            $.ajax(login);
        }
    });
});






