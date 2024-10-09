<?php
session_start();

include("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $currentDate = new DateTime(); // Today's date

    // SQL Query to fetch active contracts
    $sql = "SELECT ac_id, franchisee, classification, agreement_date, datetime_added 
            FROM agreement_contract 
            WHERE status = 'active'";

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data['notifications'] = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $agreementDate = new DateTime($row['agreement_date']);

            if ($currentDate > $agreementDate) {
                $data['notifications'][] = [
                    'franchisee' => $row['franchisee'],
                    'classification' => $row['classification'],
                    'days_remaining' => 0,
                    'status' => "Expired"
                ];
            } else {
                $daysRemaining = $currentDate->diff($agreementDate)->days;

                if ($daysRemaining <= 30) {
                    $statusMessage = "Expiring in $daysRemaining days";
                    $data['notifications'][] = [
                        'franchisee' => $row['franchisee'],
                        'classification' => $row['classification'],
                        'days_remaining' => $daysRemaining,
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