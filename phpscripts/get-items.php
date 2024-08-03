<?php
session_start();

include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['franchisee'])) {
    $franchisee = mysqli_real_escape_string($con, $_POST['franchisee']);

    $sql = "SELECT item_id, item_name FROM items WHERE franchisee = '$franchisee'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data['items'] = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data['items'][] = $row;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = "error";
        $data['message'] = "No items found";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method or missing franchisee parameter";
}

echo json_encode($data);
?>