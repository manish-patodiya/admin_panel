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
                        window.location = BASE_URL + "admin/teachers.php";
                        break;
                    case '2':
                        window.location = BASE_URL + "admin/students.php";
                        break;
                    case '3':
                        window.location = BASE_URL + "admin/exams.php";
                        break;
                }
            },
            error: function (err) {

            }
        };
        $.ajax(role_id);
    };
});