<?php
session_start();

include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $currentDate = new DateTime();

    $sql = "SELECT ac_id, franchisee, classification, franchise_term, agreement_date, datetime_added 
            FROM agreement_contract 
            WHERE status = 'active'";

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data['notifications'] = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $agreementDate = new DateTime($row['agreement_date']);
            $datetimeAdded = new DateTime($row['datetime_added']);

            $expirationDate = clone $agreementDate;
            $expirationDate->modify("+{$row['franchise_term']} years");

            $daysRemaining = $currentDate->diff($expirationDate)->days;
            $daysSinceAdded = $datetimeAdded->diff($currentDate)->days;

            if ($daysRemaining <= 30) {
                $statusMessage = $daysRemaining > 0 ? "Expiring in $daysRemaining days" : "Expired";

                $data['notifications'][] = [
                    'franchisee' => $row['franchisee'],
                    'classification' => $row['classification'],
                    'days_remaining' => $daysRemaining,
                    'status' => $statusMessage
                ];
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