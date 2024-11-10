<?php
session_start();
include("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "
    SELECT
        ac.location AS location,
        ac.franchisee AS franchisee,
        MAX(ic.inventory_id) AS inventory_id,
        ic.datetime_added AS datetime_added
    FROM
        agreement_contract AS ac
    JOIN
        item_inventory AS ic ON ac.franchisee = ic.franchisee
    GROUP BY
        ac.location, ac.franchisee, ic.datetime_added
    ORDER BY
        ic.datetime_added DESC
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
