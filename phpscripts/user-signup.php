<?php
session_start();

include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullName = mysqli_real_escape_string($con, $_POST['fullName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = base64_encode(mysqli_real_escape_string($con, $_POST['password']));
    $confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);
    $acceptTermsConditions = isset($_POST['acceptTermsConditions']) ? $_POST['acceptTermsConditions'] : '';

    if (empty($fullName) && empty($email) && empty($password) && empty($confirmPassword)) {
        $data['status'] = "error";
        $data['message'] = "All fields are required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data['status'] = "error";
        $data['message'] = "Invalid email format";
    } else if ($password !== base64_encode($confirmPassword)) {
        $data['status'] = "error";
        $data['message'] = "Passwords does not match";
    } else {
        $check_email_query = "SELECT user_email FROM users_accounts WHERE user_email = '$email'";
        $check_email_result = mysqli_query($con, $check_email_query);

        if (mysqli_num_rows($check_email_result) > 0) {
            $data['status'] = "error";
            $data['message'] = "Email already used";
        } else {
            $create_acc_query = "INSERT INTO users_accounts (user_id, user_name, user_email, user_password, user_type, user_status, date_created) VALUES (NULL,'$fullName','$email','$password','user','active',NOW())";
            $create_acc_result = mysqli_query($con, $create_acc_query);

            if ($create_acc_result) {
                $data['status'] = "success";
            } else {
                $data['status'] = "error";
                $data['message'] = "Failed to create account. Please try again later.";
            }
        }
    }
}

echo json_encode($data);
