<?php
session_start();

include ("database-connection.php");

$data = [];

$query = "
    SELECT n.notification_id, n.user_id, n.activity_type, n.datetime AS notification_datetime,
           a.franchisee, a.location, a.datetime_added
    FROM notifications n
    LEFT JOIN agreement_contract a ON n.user_id = a.ac_id
    ORDER BY n.datetime DESC
";

$result = mysqli_query($con, $query);

if ($result) {
    $notifications = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $notifications[] = [
            'datetime' => $row['notification_datetime'],
            'franchisee' => $row['franchisee'],
            'location' => $row['location'],
            'activity_type' => $row['activity_type']
        ];
    }

    if (!empty($notifications)) {
        $data['status'] = 'success';
        $data['notifications'] = $notifications;
    } else {
        $data['status'] = 'error';
        $data['message'] = 'No notifications found.';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Failed to retrieve notifications.';
}

echo json_encode($data);
?>