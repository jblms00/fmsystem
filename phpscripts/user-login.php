<?php
session_start();
include("database-connection.php");

$data = []; // Prepare response data

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_email = trim($_POST['userEmail']); // Sanitize inputs
    $user_password = trim($_POST['userPassword']);

    // Input validation
    if (empty($user_email) || empty($user_password)) {
        $data = [
            'status' => "error",
            'message' => "Please enter your email and password."
        ];
    } else {
        // Query database
        $get_users_query = "SELECT * FROM users_accounts WHERE user_email = ? AND user_status = 'active'";
        $stmt = $con->prepare($get_users_query);
        $stmt->bind_param("s", $user_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $fetch_users = $result->fetch_assoc();

        if ($result && $result->num_rows > 0) {
            // Password comparison using base64_encode()
            if (base64_encode($user_password) === $fetch_users['user_password']) {
                // Successful login
                $_SESSION['user_email'] = $fetch_users['user_email'];
                $_SESSION['user_type'] = $fetch_users['user_type']; // Critical for role handling
                $_SESSION['user_name'] = $fetch_users['user_name'];

                $data = [
                    'status' => "success",
                    'message' => "Login successful.",
                    'user_type' => $fetch_users['user_type']
                ];
            } else {
                $data = [
                    'status' => "error",
                    'message' => "Incorrect password."
                ];
            }
        } else {
            $data = [
                'status' => "error",
                'message' => "No user found with this email."
            ];
        }

        $stmt->close();
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($data);
exit; // Stop script execution after sending response
?>
