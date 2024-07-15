<?php
session_start();

include ("database-connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM lease_contract";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data['contract_details'] = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data['contract_details'][] = $row;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = "error";
        $data['message'] = "No data found";
    }
}

echo json_encode($data);
?>