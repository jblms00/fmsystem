<?php
function check_login($con)
{
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];

        $query = "SELECT * FROM users_accounts WHERE user_email = ? AND user_status = 'active' LIMIT 1";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $user_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            return $user_data; // Return user data, including user_type
        }
    }

    header("Location: ./login.php");
    exit;
}
