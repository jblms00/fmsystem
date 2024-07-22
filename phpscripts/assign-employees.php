<?php
session_start();

include ("database-connection.php");

// Initialize variables
$data = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $employeeIds = isset($_POST['employees']) ? $_POST['employees'] : [];
    $assignedAt = isset($_POST['assigned_at']) ? $_POST['assigned_at'] : '';
    $store = isset($_POST['store']) ? $_POST['store'] : '';

    if (empty($employeeIds) || empty($assignedAt)) {
        $data['status'] = "error";
        $data['message'] = "Invalid input.";
    } else {
        // Sanitize IDs
        $employeeIds = array_map('intval', $employeeIds);

        // Retrieve the branch associated with the assigned_at value
        $branchQuery = "
            SELECT location
            FROM agreement_contract
            WHERE ac_id = '$assignedAt'
        ";
        $branchResult = mysqli_query($con, $branchQuery);

        if ($branchResult && mysqli_num_rows($branchResult) > 0) {
            $branchRow = mysqli_fetch_assoc($branchResult);
            $branch = $branchRow['location'];
        } else {
            $data['status'] = "error";
            $data['message'] = "Branch not found for the provided assigned_at value.";
            echo json_encode($data);
            exit();
        }

        // Check the current number of assigned employees for the given assigned_at value
        $countQuery = "
            SELECT COUNT(*) AS count
            FROM user_information
            WHERE assigned_at = '$assignedAt'
        ";
        $countResult = mysqli_query($con, $countQuery);
        $countRow = mysqli_fetch_assoc($countResult);
        $currentCount = intval($countRow['count']);

        if ($currentCount >= 2) {
            $data['status'] = "error";
            $data['message'] = "Maximum number of assignments (2) reached for this branch.";
            echo json_encode($data);
            exit();
        }

        // Prepare update queries
        $all_success = true;
        foreach ($employeeIds as $employeeId) {
            // Sanitize employee ID
            $employeeId = intval($employeeId);

            // Prepare update query for each employee
            $update_query = "
                UPDATE user_information 
                SET assigned_at = '$assignedAt', employee_status = 'assigned', franchisee = '$store', branch = '$branch'
                WHERE user_id = $employeeId
            ";

            if (!mysqli_query($con, $update_query)) {
                $all_success = false;
                $data['status'] = "error";
                $data['message'] = "Database error: " . mysqli_error($con);
                break;
            }
        }

        if ($all_success) {
            $data['status'] = "success";
            $data['message'] = "Employees assigned and updated successfully.";
        }
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>