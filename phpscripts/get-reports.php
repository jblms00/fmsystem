<?php
session_start();
include("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "
    SELECT
        ic.branch AS location,
        ic.franchisee AS franchisee,
        ic.inventory_id AS inventory_id,
        ic.datetime_added AS datetime_added
    FROM
        item_inventory AS ic
    WHERE
        ic.branch IS NOT NULL 
        AND (ic.delivery IS NOT NULL OR ic.beginning IS NOT NULL OR ic.waste IS NOT NULL OR ic.sold IS NOT NULL)
    GROUP BY
        ic.branch, ic.franchisee, ic.datetime_added
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
