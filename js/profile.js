$(function () {
    $("#btn-edit-profile").click(function () {
        $("#card-profile").hide();
        $("#change-photo").show();
        $("#btn-edit-profile").hide();
        $("#change-photo").show();
        $("#btn-back").show();
        $("#card-edit-profile").show();
    });

    $("#btn-change-pass").click(function () {
        $("#mdl-change-pass").modal("show");
    });

    showProfile = () => {
        let profile = {
            url: BASE_URL + "server.php",
            data: {
                frm_name: "profile",
            },
            dataType: "json",
            method: "post",
            success: function (res) {
                if (res.status = 1) {
                    res.user_details[0]['first_name'] ? $("#fname").html(res.user_details[0]['first_name']) : false;
                    res.user_details[0]['last_name'] ? $("#lname").html(res.user_details[0]['last_name']) : false;
                    res.user_details[0]['email'] ? $("#email").html(res.user_details[0]['email']) : false;
                    res.user_details[0]['dob'] ? $("#dob").html(res.user_details[0]['dob']) : false;
                    res.user_details[0]['gender'] ? $("#gender").html(res.user_details[0]['gender']) : false;
                    res.user_details[0]['mobile'] != 0 ? $("#mobile").html(res.user_details[0]['mobile']) : false;
                    res.user_details[0]['address'] ? $("#address").html(res.user_details[0]['address']) : false;

                    $("#i-fname").val(res.user_details[0]['first_name']);
                    $("#i-lname").val(res.user_details[0]['last_name']);
                    $("#i-dob").val(res.user_details[0]['dob']);
                    $("#i-email").val(res.user_details[0]['email']);
                    $("input[name=gender][value=" + res.user_details[0]['gender'] + "]").prop('checked', true);
                    $("#i-mobile").val(res.user_details[0]['mobile']);
                    $("#i-address").val(res.user_details[0]['address']);
                }
            },
            error: function (err) {
                console.log(err);
            }
        }
        $.ajax(profile);
    }
    showProfile();

    existEmail = (value) => {
        let result;
        let email = {
            url: BASE_URL + "server.php",
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
            url: BASE_URL + "server.php",
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

    $("#frm-update").validate({
        rules: {
            fname: {
                required: true,
                minlength: 2,
            },
            lname: {
                required: true,
                minlength: 2,
            },
            email: {
                required: true,
                email: true,
                // emailExist: true
            },
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                // mobileExist: true
            },
        }, messages: {
            // message
        }, submitHandler: function (form) {
            let register = {
                url: BASE_URL + "server.php",
                data: $("#frm-update").serialize(),
                method: "post",
                dataType: "json",
                success: function (res) {
                    window.location.reload();
                },
                error: function (err) {
                    console.log(err);
                }
            }
            $.ajax(register);
        }
    });

    $("#frm-change-pass").validate({
        rules: {
            password: {
                required: true,
            },
            new_password: {
                required: true,
                minlength: 6,
                maxlength: 20,
            },
            cpassword: {
                required: true,
                equalTo: "#new_pass",
            },
        }, messages: {
            password: {
                required: "Current password must be required"
            },
            cpassword: {
                equalTo: "Password does not match",
            },
        }, submitHandler: function (form) {
            let changepass = {
                url: BASE_URL + "server.php",
                data: $("#frm-change-pass").serialize(),
                method: "post",
                dataType: "json",
                success: function (res) {
                    if (res.status == 1) {
                        window.location.reload();
                    } else {
                        $("#pass-err").html(res.msg);
                        $("#pass-err").show();
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            }
            $.ajax(changepass);
        }
    });

})
