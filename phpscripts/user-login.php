<?php
session_start();

include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_email = $_POST['userEmail'];
    $user_password = $_POST['userPassword'];

    $get_users_query = "SELECT * FROM users_accounts WHERE user_email = '$user_email' AND user_status = 'active'";
    $get_users_result = mysqli_query($con, $get_users_query);
    $fetch_users = mysqli_fetch_assoc($get_users_result);

    if ($get_users_result && mysqli_num_rows($get_users_result) <= 0) {
        $data['status'] = "error";
        $data['message'] = "No user found";
    } else if (empty($user_email) && empty($user_password)) {
        $data['status'] = "error";
        $data['message'] = "Please enter your email and password";
    } else if (empty($user_password)) {
        $data['status'] = "error";
        $data['message'] = "Please enter your password";
    } else if ($user_email != $fetch_users['user_email']) {
        $data['status'] = "error";
        $data['message'] = "Incorrect email";
    } else if (base64_encode($user_password) != $fetch_users['user_password']) {
        $data['status'] = "error";
        $data['message'] = "Incorrect password";
    } else {
        $_SESSION['user_email'] = $user_email;
        $data['user_type'] = $fetch_users['user_type'];
        $data['status'] = "success";
    }
}

echo json_encode($data);