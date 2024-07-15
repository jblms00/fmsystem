<?php

function check_login($con)
{
    if (isset($_SESSION['user_email'])) {
        $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;

        $query = "SELECT * FROM users_accounts WHERE user_email = '$user_email' AND user_status = 'active' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: ./");
    die;
}
