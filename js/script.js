$(function () {
    register = () => {
        $("#sec-login").hide();
        $("#sec-register").show();
    }

    login = () => {
        $("#sec-register").hide();
        $("#sec-login").show();
    }

    existEmail = (value) => {
        let result;
        let email = {
            url: "http://localhost/admin_panel/server.php",
            data: {
                frm_name: "email",
                email: value,
            },
            async: false,
            method: "post",
            success: function (res) {
                result = JSON.parse(res);
            },
            error: function (err) {
                console.log(err);
            }
        }
        $.ajax(email);
        if (result.status == 1) {
            return false;
        } else {
            return true;
        }
    }

    existMobile = (value) => {
        let result;
        let username = {
            url: "http://localhost/admin_panel/server.php",
            data: {
                frm_name: "mobile",
                mobile: value,
            },
            async: false,
            method: "post",
            success: function (res) {
                result = JSON.parse(res);
            },
            error: function (err) {
                console.log(err);
            }
        }
        $.ajax(username);
        if (result.status == 1) {
            return false;
        } else {
            return true;
        }
    }

    jQuery.validator.addMethod("emailExist", function (value, element) {
        let has = existEmail(value);
        return this.optional(element) || has;
    }, 'Email already exist!');

    jQuery.validator.addMethod("mobileExist", function (value, element) {
        let has = existMobile(value);
        return this.optional(element) || has;
    }, 'Mobile already exist!');


    jQuery.validator.addMethod("email", function (value, element) {
        return this.optional(element) || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
    }, 'Please enter a valid email address..');

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
                url: "http://localhost/admin_panel/server.php",
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
        }, submitHandler: function (form) {
            let login = {
                url: "http://localhost/admin_panel/server.php",
                data: $("#frm-login").serialize(),
                method: "post",
                success: function (res) {
                    let result = JSON.parse(res);
                    if (result.status == 1) {
                        window.location = "http://localhost/admin_panel/admin/teachers.php";
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






