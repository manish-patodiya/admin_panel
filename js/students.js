$(function () {
    let users_data;
    showTable = (page) => {
        if (page < 1 || !page) {
            page = 1;
        }
        let table = {
            url: "http://localhost/admin_panel/server.php",
            method: "post",
            data: {
                frm_name: "show_students",
                page: page
            },
            dataType: "json",
            success: function (res) {
                $("#users-table tbody").html("")
                users_data = res.users;
                res.users.map(function (data) {
                    let date = new Date((data.time) * 1000);
                    var todate = date.getDate();
                    var tomonth = date.getMonth() + 1;
                    var toyear = date.getFullYear();
                    var original_date = todate + '/' + tomonth + '/' + toyear;
                    $("#users-table").append(`<tr>
                        <td>${data.email}</td>
                        <td>${original_date}</td>
                        <td>                    
                            <a class="btn-update" uid="${data.id}" ><i class="fa fa-edit""></i></a>
                            <a class="btn-delete text-danger" uid="${data.id}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>`);
                    $("#pagination").html("");
                    for (let i = 1; i <= Math.ceil(res.total_page); i++) {
                        let disabled = i == page ? 'disabled' : '';
                        $("#pagination").append(`<li class="page-item ${disabled} text-end" ><a class="page-link" href="#" onclick="showTable(${i})">${i}</a></li>`);
                    }
                })
            },
            error: function (err) {

            }
        }
        $.ajax(table);
    }
    showTable(1);

    $(document).on("click", ".btn-update", function () {
        window.location = "http://localhost/admin_panel/admin/profile.php";
    })

    $(document).on("click", ".btn-delete", function () {
        let id = $(this).attr("uid");
        let user = users_data.filter((e) => {
            return e.id == id
        });
        $("#mdl-delete").modal("show");
        let v = $("#delete_id").val(id);
        console.log(v);
    })

    $("#btn-add").click(function () {
        $("#mdl-add").modal("show");
    });

    $("#frm-edit").submit(function (event) {
        event.preventDefault();
        let edit = {
            url: "http://localhost/admin_panel/server.php",
            method: "post",
            datatype: "json",
            data: $("#frm-edit").serialize(),
            success: function (res) {
                let result = JSON.parse(res);
                $("#mdl-edit").modal('hide');
                $('.modal-backdrop').remove();
                if (result.status == 1) {
                    $("#success-msg").html(result.msg);
                    $("#success-msg").show();
                    showTable();
                    setTimeout(function () {
                        $("#success-msg").hide();
                    }, 3000)
                }
            },
            error: function (err) {

            }
        };
        $.ajax(edit);
    });

    $("#frm-delete").submit(function (event) {
        event.preventDefault();
        let dlt = {
            url: "http://localhost/admin_panel/server.php",
            method: "post",
            datatype: "json",
            data: $("#frm-delete").serialize(),
            success: function (res) {
                let result = JSON.parse(res);
                $("#mdl-delete").modal('hide');
                $('.modal-backdrop').remove();
                if (result.status == 1) {
                    $("#success-msg").html(result.msg);
                    $("#success-msg").show();
                    showTable();
                    setTimeout(function () {
                        $("#success-msg").hide();
                    }, 3000)
                }
            },
            error: function (err) {

            }
        };
        $.ajax(dlt);
    });

    $("#frm-add").submit(function (event) {
        event.preventDefault();
        let err = checkEmail();
        if (!err) {
            $("#regis-err").hide();
            let dlt = {
                url: "http://localhost/admin_panel/server.php",
                method: "post",
                datatype: "json",
                data: $("#frm-add").serialize(),
                success: function (res) {
                    let result = JSON.parse(res);
                    $("#mdl-add").modal('hide');
                    $('.modal-backdrop').remove();
                    if (result.status == 1) {
                        $("#success-msg").html(result.msg);
                        $("#success-msg").show();
                        showTable();
                        setTimeout(function () {
                            $("#success-msg").hide();
                        }, 3000)
                    }
                },
                error: function (err) {

                }
            };
            $.ajax(dlt);
        } else {
            $("#regis-err").html("email already exist!");
            $("#regis-err").show();
        }
    });

    checkEmail = () => {
        let value = $("#email").val();
        let email = {
            url: "http://localhost/admin_panel/server.php",
            data: {
                frm_name: "email",
                email: value,
            },
            method: "post",
            async: false,
            success: function (res) {
                result = JSON.parse(res);
            },
            error: function (err) {
                console.log(err);
            }
        }
        $.ajax(email);
        if (result.status == 1) {
            return result.msg;
        }
    }

    $("#btn-logout").click(function (event) {
        let logout = {
            url: "http://localhost/admin_panel/server.php",
            method: "post",
            datatype: "json",
            data: {
                frm_name: "Logout",
            },
            success: function (res) {
                window.location = "http://localhost/admin_panel/login.php";
            },
            error: function (err) {

            }
        };
        $.ajax(logout);
    });

});