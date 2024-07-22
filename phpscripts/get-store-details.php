<?php
session_start();

include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $sql = "
        SELECT 
            ua.user_id, 
            ua.user_name,
            ui.user_shift
        FROM 
            user_information ui
        LEFT JOIN 
            users_accounts ua ON ui.user_id = ua.user_id
        WHERE 
            ui.assigned_at = '$id'
    ";

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data['employees'] = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data['employees'][] = $row;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = 'error';
        $data['message'] = 'No data found';
    }
}

echo json_encode($data);
?>