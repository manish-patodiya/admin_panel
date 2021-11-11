<?php
session_start();
include "config/db.php";
include "constants/constant.php";
$form = isset($_POST['frm_name']) ? $_POST['frm_name'] : false;
switch ($form) {
    case 'login':
        login($con);
        break;

    case 'email':
        emailExist($con);
        break;

    case 'mobile':
        mobileExist($con);
        break;

    case 'register':
        register($con);
        break;

    case "Update":
        edit($con);
        break;

    case "Logout":
        logout();
        break;

    case "Delete":
        delete($con);
        break;

    case "show_students":
        showStudentsTable($con);
        break;

    case "show_teachers":
        showTeachersTable($con);
        break;

    case "add_student":
        addStudent($con);
        break;

    case "add_teacher":
        addTeacher($con);
        break;

    case "profile":
        showProfile($con);
        break;

    case "update_profile":
        updateProfile($con);
        break;

    case "change_pass":
        changePass($con);
        break;

}

function emailExist($con)
{
    $email = $_POST['email'];
    $query = "select * from users WHERE role_id=3 AND email='$email'";
    $query_run = mysqli_query($con, $query);
    if (isset($_SESSION['user_details']['uid']) && $_SESSION['user_details']['uid']) {
        $id = $_SESSION['user_details']['uid'];
        $query = "select * from users WHERE id !='$id' AND email='$email'";
        $query_run = mysqli_query($con, $query);
    }
    if (mysqli_fetch_row($query_run) > 0) {
        echo json_encode([
            "status" => 1,
            "msg" => "email already exist!",
        ]);
    } else {
        echo json_encode([
            "status" => 0,
            "msg" => "email not exist!",
        ]);
    }
}

function mobileExist($con)
{

    $mobile = $_POST['mobile'];
    $query = "select * from users WHERE role_id=3 AND mobile='$mobile'";
    $query_run = mysqli_query($con, $query);
    if (isset($_SESSION['user_details']['uid']) && $_SESSION['user_details']['uid']) {
        $id = $_SESSION['user_details']['uid'];
        $query = "select * from users WHERE id !='$id' AND mobile='$mobile'";
        $query_run = mysqli_query($con, $query);
    }
    if (mysqli_fetch_row($query_run) > 0) {
        echo json_encode([
            "status" => 1,
            "msg" => "email already exist!",
        ]);
    } else {
        echo json_encode([
            "status" => 0,
            "msg" => "email not exist!",
        ]);
    }
}

function register($con)
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $password = md5($password);
    $email = $_POST['email'];
    $query = "INSERT INTO `users`(`role_id`,`mobile`,`email`, `password`, `time`) VALUES (3,'$mobile','$email','$password','" . time() . "')";
    $query1 = "INSERT INTO `users_profile`(`user_id`,`first_name`,`last_name`,`udpated_at`) VALUES (LAST_INSERT_ID(),'$fname','$lname','" . time() . "')";
    $query_run = mysqli_query($con, $query);
    $query_run1 = mysqli_query($con, $query1);
    echo json_encode([
        "status" => 1,
        "msg" => "Successfull!",
    ]);
}

function login($con)
{
    $email = $_POST['email'];
    $query = "select * from users WHERE email = '$email' OR mobile='$email'";
    $query_run = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($query_run)) {
        $password = md5($_POST['password']);
        if ($row["password"] == $password) {
            $query1 = "SELECT u.id,u.email,up.first_name,up.last_name FROM users u JOIN users_profile up ON u.id = up.user_id WHERE u.id=$row[id]";
            $query_run1 = mysqli_query($con, $query1);
            $row1 = mysqli_fetch_assoc($query_run1);
            $_SESSION['user_details'] = [
                "uid" => $row1['id'],
                "fname" => $row1['first_name'],
                "lname" => $row1['last_name'],
                "email" => $row['email'],
            ];
            echo json_encode([
                "status" => 1,
                "msg" => "success!",
            ]);
        } else {
            echo json_encode([
                "status" => 0,
                "msg" => "Wrong email or password!",
            ]);
        }
    } else {
        echo json_encode([
            "status" => 0,
            "msg" => "Wrong email or password!",
        ]);
    }
}

function addStudent($con)
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO `users`(`role_id`,`email`, `password`, `time`) VALUES (3,'$email','$password','" . time() . "')";
    mysqli_query($con, $query);
    echo json_encode([
        "status" => 1,
        "msg" => "Row inserted successfully!",
    ]);
}

function addTeacher($con)
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO `users`(`role_id`,`email`, `password`, `time`) VALUES (2,'$email','$password','" . time() . "')";
    mysqli_query($con, $query);
    echo json_encode([
        "status" => 1,
        "msg" => "Row inserted successfully!",
    ]);
}

function edit($con)
{
    $email = $_POST['email'];
    $query = "update `users` set  WHERE email='$email'";
    mysqli_query($con, $query);
    echo json_encode([
        "status" => 1,
        "msg" => "Row updated successfully!",
    ]);
}

function delete($con)
{
    $id = $_POST['id'];
    $query = "delete from users WHERE id='$id'";
    mysqli_query($con, $query);
    echo json_encode([
        "status" => 1,
        "msg" => "Row deleted successfully!",
    ]);
}

function showStudentsTable($con)
{
    $page = $_POST['page'];
    $offset = $page * PERPAGE - PERPAGE;
    $query = "SELECT * from users where role_id=3 limit " . $offset . "," . PERPAGE;
    $query_run = mysqli_query($con, $query);
    $query1 = "SELECT count(*) FROM users WHERE role_id=3";
    $query_run1 = mysqli_query($con, $query1);
    $count = mysqli_fetch_row($query_run1);
    $count = $count[0] / PERPAGE;
    $users = [];
    while ($row = mysqli_fetch_assoc($query_run)) {
        array_push($users, $row);
    }
    echo json_encode([
        "status" => 1,
        "msg" => "Successful",
        "users" => $users,
        "total_page" => $count,
    ]);
}

function showTeachersTable($con)
{
    $page = $_POST['page'];
    $offset = $page * PERPAGE - PERPAGE;
    $query = "SELECT * from users where role_id=2 limit " . $offset . "," . PERPAGE;
    $query_run = mysqli_query($con, $query);
    $query1 = "SELECT count(*) FROM users WHERE role_id=2";
    $query_run1 = mysqli_query($con, $query1);
    $count = mysqli_fetch_row($query_run1);
    $count = $count[0] / PERPAGE;
    $users = [];
    while ($row = mysqli_fetch_assoc($query_run)) {
        array_push($users, $row);
    }
    echo json_encode([
        "status" => 1,
        "msg" => "Successful",
        "users" => $users,
        "total_page" => $count,
    ]);
}

function showProfile($con)
{
    $id = $_SESSION['user_details']['uid'];
    $query = "SELECT u.mobile,u.email,up.first_name,up.last_name,up.dob,up.gender,up.address FROM users u JOIN users_profile up ON u.id = up.user_id WHERE u.id=$id";
    $query_run = mysqli_query($con, $query);
    $user = [];
    if ($row = mysqli_fetch_assoc($query_run)) {
        array_push($user, $row);
    }
    echo json_encode([
        "status" => 1,
        "msg" => "successful",
        "user_details" => $user,
    ]);
}

function updateProfile($con)
{
    $id = $_SESSION['user_details']['uid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    $query = "UPDATE `users` SET `mobile`='$mobile',`email`='$email' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);
    $query1 = "UPDATE `users_profile` SET `first_name`='$fname',`last_name`='$lname',`dob`='$dob',`gender`='$gender',`address`='$address',`udpated_at`='" . time() . "' WHERE user_id='$id'";
    $query_run1 = mysqli_query($con, $query1);
    $_SESSION['user_details'] = [
        "uid" => $id,
        "fname" => $fname,
        "lname" => $lname,
        "email" => $email,
    ];
    echo json_encode([
        "status" => 1,
    ]);
}

function changePass($con)
{
    $id = $_SESSION['user_details']['uid'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE `password` = '$password' AND id='$id'";
    $query_run = mysqli_query($con, $query);
    if (mysqli_num_rows($query_run) > 0) {
        $new_pass = md5($_POST['new_password']);
        $query1 = "UPDATE `users` SET `password`='$new_pass' WHERE id='$id'";
        $query_run1 = mysqli_query($con, $query1);
        echo json_encode([
            "status" => 1,
            "msg" => "Successful",
        ]);
    } else {
        echo json_encode([
            "status" => 0,
            "msg" => "Please enter correct password",
        ]);
    }
}

function logout()
{
    unset($_SESSION['user_details']);
}