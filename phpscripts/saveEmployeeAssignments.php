<?php
session_start();
include("database-connection.php");

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and validate the ac_id and employees data from the POST request
    $ac_id = isset($_POST['ac_id']) ? (int)$_POST['ac_id'] : 0;
    $employees = isset($_POST['employees']) ? $_POST['employees'] : [];

    // Check if ac_id and employees array are valid
    if ($ac_id <= 0 || empty($employees)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data provided.']);
        exit();
    }

    // Validate that the ac_id exists in agreement_contract
    $ac_check_query = "SELECT ac_id FROM agreement_contract WHERE ac_id = $ac_id LIMIT 1";
    $ac_check_result = mysqli_query($con, $ac_check_query);

    if (mysqli_num_rows($ac_check_result) === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid ac_id provided.']);
        exit();
    }

    // Iterate over each employee to assign them to the branch (ac_id)
    foreach ($employees as $employee_id) {
        $employee_id = (int)$employee_id; // Sanitize employee ID
        
        // Check if the employee_id exists in users_accounts
        $user_check_query = "SELECT user_id FROM users_accounts WHERE user_id = $employee_id LIMIT 1";
        $user_check_result = mysqli_query($con, $user_check_query);

        if (mysqli_num_rows($user_check_result) > 0) {
            // Update user_information table to set assigned_at to the ac_id and employee_status to 'assigned'
            $update_query = "
                UPDATE user_information
                SET assigned_at = $ac_id, employee_status = 'assigned'
                WHERE user_id = $employee_id
            ";
            mysqli_query($con, $update_query);
        } else {
            echo json_encode(['status' => 'error', 'message' => "Employee ID $employee_id not found."]);
            exit();
        }
    }

    // If all assignments are successful, return a success response
    echo json_encode(['status' => 'success', 'message' => 'Employees assigned successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
