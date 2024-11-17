<?php
session_start();
include("database-connection.php");

$data = [];

// Check if the request is to resolve a notification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['notification_id'])) {
    $notification_id = intval($_POST['notification_id']);

    if ($notification_id) {
        $query = "DELETE FROM notifications WHERE notification_id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $notification_id);

        if (mysqli_stmt_execute($stmt)) {
            $data['status'] = 'success';
            $data['message'] = 'Notification resolved successfully.';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to resolve notification.';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Invalid notification ID.';
    }

    echo json_encode($data);
    exit();
}

// Default behavior: Fetch notifications
$query = "
    SELECT n.notification_id, n.user_id, n.activity_type, n.datetime AS notification_datetime,
           a.ac_id, a.franchisee, a.location, a.datetime_added
    FROM notifications n
    LEFT JOIN agreement_contract a ON n.user_id = a.ac_id
    ORDER BY n.datetime DESC
";

$result = mysqli_query($con, $query);

if ($result) {
    $notifications = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $notifications[] = [
            'notification_id' => $row['notification_id'],
            'ac_id' => $row['ac_id'],
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
