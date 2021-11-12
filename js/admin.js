$(function () {
    {
        let role_id = {
            url: BASE_URL + "server.php",
            method: "post",
            dataType: "json",
            data: {
                frm_name: "role",
            },
            success: function (res) {
                switch (res.role_id) {
                    case '1':
                        $("#tab-teachers").show();
                        $("#tab-students").show();
                        $("#tab-exams").show();
                        break;
                    case '2':
                        $("#tab-students").show();
                        $("#tab-exams").show();
                        break;
                    case '3':
                        $("#tab-exams").show();
                        break;
                }
            },
            error: function (err) {

            }
        };
        $.ajax(role_id);
    };

    $("#btn-logout").click(function (event) {
        let logout = {
            url: BASE_URL + "server.php",
            method: "post",
            dataType: "json",
            data: {
                frm_name: "Logout",
            },
            success: function (res) {
                window.location = BASE_URL + "login.php";;
            },
            error: function (err) {

            }
        };
        $.ajax(logout);
    });


});