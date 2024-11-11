<?php
session_start();
include("database-connection.php");
include("check-login.php");
$user_data = check_login($con);
$user_id_logged_in = $user_data['user_id'];

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $franchisee = mysqli_real_escape_string($con, $_POST['franchisee']);
    $branch = mysqli_real_escape_string($con, $_POST['branch']);
    $itemsData = isset($_POST['items']) ? json_decode($_POST['items'], true) : [];
    $notification_id = isset($_POST['notification_id']) ? mysqli_real_escape_string($con, $_POST['notification_id']) : null;

    if (!empty($itemsData)) {
        $allInserted = true;

        foreach ($itemsData as $item) {
            $item_id = mysqli_real_escape_string($con, $item['item_id']);
            $beginning = mysqli_real_escape_string($con, $item['beginning']);
            $delivery = mysqli_real_escape_string($con, $item['delivery']);
            $waste = mysqli_real_escape_string($con, $item['waste']);
            $sold = mysqli_real_escape_string($con, $item['sold']);
            $remarks = mysqli_real_escape_string($con, $item['remarks']);
            $datetime_added = date('Y-m-d H:i:s');

            // Insert data only for the specified branch
            $query = "INSERT INTO `item_inventory` 
                (`item_id`, `franchisee`, `branch`, `delivery`, `beginning`, `waste`, `sold`, `remarks`, `filled_by`, `datetime_added`) 
                VALUES ('$item_id', '$franchisee', '$branch', '$delivery', '$beginning', '$waste', '$sold', '$remarks', '$user_id_logged_in', '$datetime_added')";

            if (!mysqli_query($con, $query)) {
                $allInserted = false;
                $data['status'] = 'error';
                $data['message'] = 'Failed to save data: ' . mysqli_error($con);
                break;
            }
        }

        if ($allInserted) {
            $data['status'] = 'success';
            $data['message'] = 'Data saved successfully.';

            // Delete the notification if the notification_id is provided
            if ($notification_id) {
                $deleteNotificationQuery = "DELETE FROM `notifications` WHERE `notification_id` = '$notification_id'";
                mysqli_query($con, $deleteNotificationQuery);
            }
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'No items data received.';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method.';
}

echo json_encode($data);
?>
