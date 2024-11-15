<?php
session_start();
include("database-connection.php");

// Initialize variables
$data = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $employeeIds = isset($_POST['employees']) ? $_POST['employees'] : [];
    $assignedAt = isset($_POST['assigned_at']) ? $_POST['assigned_at'] : '';
    $store = isset($_POST['store']) ? $_POST['store'] : '';

    error_log("Assign Employees Debug - START");
    error_log("POST data: " . print_r($_POST, true));
    error_log("Employee IDs: " . print_r($employeeIds, true));
    error_log("Assigned At (ac_id): " . $assignedAt);
    error_log("Store: " . $store);

    if (empty($employeeIds) || empty($assignedAt)) {
        $data['status'] = "error";
        $data['message'] = "Invalid input.";
        echo json_encode($data);
        exit();
    }

    // Retrieve branch location
    $branchQuery = "SELECT location FROM agreement_contract WHERE ac_id = '$assignedAt'";
    $branchResult = mysqli_query($con, $branchQuery);
    if (!$branchResult || mysqli_num_rows($branchResult) === 0) {
        $data['status'] = "error";
        $data['message'] = "Branch not found for the provided assigned_at value.";
        error_log("Branch Query Failed: " . mysqli_error($con));
        echo json_encode($data);
        exit();
    }
    $branchRow = mysqli_fetch_assoc($branchResult);
    $branch = $branchRow['location'];

    // Check employee count
    $countQuery = "SELECT COUNT(*) AS count FROM user_information WHERE assigned_at = '$assignedAt'";
    $countResult = mysqli_query($con, $countQuery);
    if (!$countResult) {
        $data['status'] = "error";
        $data['message'] = "Error counting current assignments.";
        error_log("Employee Count Query Failed: " . mysqli_error($con));
        echo json_encode($data);
        exit();
    }
    $countRow = mysqli_fetch_assoc($countResult);
    $currentCount = intval($countRow['count']);

    if ($currentCount >= 2) {
        $data['status'] = "error";
        $data['message'] = "Maximum assignments (2) reached.";
        echo json_encode($data);
        exit();
    }

    // Update employees
    $all_success = true;
    foreach ($employeeIds as $employeeId) {
        try {
            $employeeId = intval($employeeId);
            $update_query = "
                UPDATE user_information 
                SET assigned_at = '$assignedAt', employee_status = 'assigned', franchisee = '$store', branch = '$branch'
                WHERE user_id = $employeeId
            ";
            if (!mysqli_query($con, $update_query)) {
                throw new Exception(mysqli_error($con));
            }
        } catch (Exception $e) {
            $all_success = false;
            $data['status'] = "error";
            $data['message'] = "Database error on employee ID $employeeId: " . $e->getMessage();
            error_log("Update Query Failed: " . $e->getMessage());
            break;
        }
    }

    if ($all_success) {
        $data['status'] = "success";
        $data['message'] = "Employees assigned successfully.";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>
