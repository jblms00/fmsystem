<?php
session_start();

include ("database-connection.php");

$data = [];

// Get current date
$current_date = date('Y-m-d');

// Example query to fetch contracts with datetime_added
$select_query = "SELECT ac_id, franchise_term, datetime_added FROM agreement_contract";

$result = mysqli_query($con, $select_query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contract_id = $row['ac_id'];
        $franchise_term = $row['franchise_term'];
        $datetime_added = $row['datetime_added'];

        // Check if datetime_added is set and different from current date
        if ($datetime_added && substr($datetime_added, 0, 10) !== $current_date) {
            // Update franchise_term and datetime_added
            $update_query = "UPDATE agreement_contract SET franchise_term = franchise_term - 1, datetime_added = NOW() WHERE id = $contract_id";

            if (mysqli_query($con, $update_query)) {
                $data['status'] = "success";
                $data['message'] = "Franchise terms updated successfully for the day.";
            } else {
                $data['status'] = "error";
                $data['message'] = "Database error: " . mysqli_error($con);
                break; // Exit loop on error
            }
        } else {
            $data['status'] = "success";
            $data['message'] = "Franchise terms already updated for today.";
        }
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Database error: " . mysqli_error($con);
}

echo json_encode($data);
?>