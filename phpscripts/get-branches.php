<?php
session_start();
include("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $franchisee = mysqli_real_escape_string($con, $_POST['franchisee']);

    $sql = "SELECT ac_id, location FROM agreement_contract WHERE franchisee = '$franchisee' AND status = 'active'";
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
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}

echo json_encode($data);
?>
