<?php
session_start();

include ("database-connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dashFranchise = $_POST['dashFranchise'];
    $dashServices = $_POST['dashServices'];

    $data['dashFranchise'] = $dashFranchise;
    $data['dashServices'] = $dashServices;

    if ($dashServices !== "all") {
        $sql = "SELECT * FROM sales_report WHERE franchisee = '$dashFranchise' AND services = '$dashServices'";
    } else {
        $sql = "SELECT * FROM sales_report WHERE franchisee = '$dashFranchise'";
    }

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data['sales_info'] = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data['sales_info'][] = $row;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = "error";
        $data['message'] = "No data found";
    }
}

echo json_encode($data);
?>