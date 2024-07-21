<?php
session_start();

include ("database-connection.php");

$data = [];

$sql = "SELECT * FROM expenses";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data['details'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data['details'][] = $row;
    }
    $data['status'] = 'success';
} else {
    $data['status'] = "error";
    $data['message'] = "No data found";
}

echo json_encode($data);
?>