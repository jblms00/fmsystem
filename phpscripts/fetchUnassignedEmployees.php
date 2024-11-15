<?php
session_start();
include ("database-connection.php");


// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ac_id = isset($_POST['ac_id']) ? (int)$_POST['ac_id'] : 0;

    $sql = "
        SELECT ua.user_id, ua.user_name, ua.user_phone_number, ua.user_address,
               IFNULL(ui.employee_status, 'unassigned') AS employee_status
        FROM users_accounts ua
        LEFT JOIN user_information ui ON ua.user_id = ui.user_id
        WHERE (ui.assigned_at = 0 AND ui.employee_status = 'unassigned')
           OR ui.user_id IS NULL
    ";

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $employees = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $employees[] = $row;
        }
        echo json_encode(['status' => 'success', 'data' => $employees]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No unassigned employees found.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
