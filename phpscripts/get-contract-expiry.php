<?php
session_start();

include("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $currentDate = new DateTime(); // Today's date

    // SQL Query to fetch active contracts with location
    $sql = "SELECT ac_id, franchisee, location, agreement_date, datetime_added 
            FROM agreement_contract 
            WHERE status = 'active'";

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data['notifications'] = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $agreementDate = new DateTime($row['agreement_date']);

            // Calculate the difference in days to determine the remaining days
            $daysRemaining = $currentDate->diff($agreementDate)->days;

            // Check if the contract has expired
            if ($currentDate > $agreementDate) {
                $data['notifications'][] = [
                    'franchisee' => $row['franchisee'],
                    'location' => $row['location'],
                    'days_remaining' => 0,
                    'status' => "Expired"
                ];
            } else {
                // Check if the contract is expiring within the next 30 days
                if ($daysRemaining <= 30) {
                    $statusMessage = "Expiring in " . ($daysRemaining + 1) . " day(s)";
                    $data['notifications'][] = [
                        'franchisee' => $row['franchisee'],
                        'location' => $row['location'],
                        'days_remaining' => $daysRemaining + 1, // Adjust for display
                        'status' => $statusMessage
                    ];
                }
            }
        }

        if (empty($data['notifications'])) {
            $data['status'] = 'no_notifications';
            $data['message'] = 'No contracts expiring within 30 days';
        } else {
            $data['status'] = 'success';
        }
    } else {
        $data['status'] = "error";
        $data['message'] = "No active agreements found";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}

echo json_encode($data);
?>
