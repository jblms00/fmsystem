<?php
session_start();

include("database-connection.php");
include("check-login.php");

$user_data = check_login($con);
$user_id_logged_in = $user_data['user_id'];

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    // Modify the query to select only active users
    $sql = "SELECT user_id, user_name FROM users_accounts WHERE user_status = 'active'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data['employees'] = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data['employees'][] = $row;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = 'error';
        $data['message'] = 'No employees found';
    }
}

echo json_encode($data);
?>