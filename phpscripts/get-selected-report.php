<?php
session_start();
include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $franchisee = isset($_POST['franchisee']) ? mysqli_real_escape_string($con, $_POST['franchisee']) : '';
    $location = isset($_POST['location']) ? mysqli_real_escape_string($con, $_POST['location']) : '';
    $datetime_added = isset($_POST['datetime_added']) ? mysqli_real_escape_string($con, $_POST['datetime_added']) : '';



    if ($franchisee && $location && $datetime_added) {
        $date = new DateTime($datetime_added);
        $formatted_datetime = $date->format('Y-m-d H:i:s');

        $query = "
            SELECT
                i.item_id,
                i.item_name,
                i.uo,
                ic.beginning,
                ic.delivery,
                ic.waste,
                ic.sold,
                ic.remarks,
                ic.filled_by
            FROM
                item_inventory AS ic
            LEFT JOIN
                items AS i ON ic.item_id = i.item_id
            WHERE
                ic.franchisee = '$franchisee'
                AND ic.branch = '$location'
                AND ic.datetime_added = '$formatted_datetime'
        ";

        $result = mysqli_query($con, $query);

        if ($result) {
            $items = [];
            $filled_by = null;
            while ($row = mysqli_fetch_assoc($result)) {
                $items[] = [
                    'item_id' => $row['item_id'],
                    'item_name' => $row['item_name'],
                    'uo' => $row['uo'],
                    'beginning' => $row['beginning'],
                    'delivery' => $row['delivery'],
                    'waste' => $row['waste'],
                    'sold' => $row['sold'],
                    'remarks' => $row['remarks'],
                ];
                $filled_by = $row['filled_by'];
            }

            if ($filled_by !== null) {
                $user_query = "
                    SELECT user_name
                    FROM users_accounts
                    WHERE user_id = '$filled_by'
                    LIMIT 1
                ";
                $user_result = mysqli_query($con, $user_query);
                if ($user_result) {
                    $user = mysqli_fetch_assoc($user_result);
                    $data['user'] = $user;
                } else {
                    $data['user'] = null;
                }
            } else {
                $data['user'] = null;
            }

            $data['status'] = 'success';
            $data['items'] = $items;
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to fetch report details.';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Invalid or missing parameters.';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method.';
}

echo json_encode($data);
?>