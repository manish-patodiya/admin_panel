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


jQuery.validator.addMethod("email", function (value, element) {
    return this.optional(element) || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
}, 'Please enter a valid email address..');

jQuery.validator.addMethod("emailExist", function (value, element) {
    let has = existEmail(value);
    return this.optional(element) || has;
}, 'Email already exist!');

jQuery.validator.addMethod("mobileExist", function (value, element) {
    let has = existMobile(value);
    return this.optional(element) || has;
}, 'Mobile already exist!');
