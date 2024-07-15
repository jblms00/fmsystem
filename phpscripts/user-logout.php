<?php
session_start();
include ("database-connection.php");

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];

    $get_user_query = "SELECT * FROM users_accounts WHERE user_email = '$user_email'";
    $get_user_result = mysqli_query($con, $get_user_query);

    if ($get_user_result) {
        session_destroy();
        header("Location: ../");
        exit;
    }
}
