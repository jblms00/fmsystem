<?php
session_start();
include ("database-connection.php");
include ("check-login.php");

$user_data = check_login($con);
$user_id_logged_in = $user_data['user_id'];

$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "
        SELECT
            ac.location AS location,
            ac.franchisee AS franchisee,
            ic.inventory_id AS inventory_id,
            ic.item_id AS item_id,
            ic.datetime_added AS datetime_added,
            i.item_name AS item_name
        FROM
            agreement_contract AS ac
        JOIN
            item_inventory AS ic ON ac.franchisee = ic.franchisee
        JOIN
            items AS i ON ic.item_id = i.item_id
        WHERE
            1
        GROUP BY
            ac.location, ac.franchisee, ac.datetime_added
        ORDER BY
            ac.location, ac.datetime_added
    ";

    $result = mysqli_query($con, $query);

    if ($result) {
        $reports = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $reports[] = array(
                'franchisee' => $row['franchisee'],
                'location' => $row['location'],
                'datetime_added' => $row['datetime_added'],
                'inventory_id' => $row['inventory_id'],
                'item_id' => $row['item_id'],
                'item_name' => $row['item_name'],
            );
        }

        $data['status'] = 'success';
        $data['reports'] = $reports;
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Failed to fetch reports.';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method.';
}

echo json_encode($data);
?>