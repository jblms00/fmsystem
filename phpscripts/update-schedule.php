<?php
session_start();

include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = mysqli_real_escape_string($con, $_POST['user_id']);
    $newShift = mysqli_real_escape_string($con, $_POST['new_shift']);

    $sql = "UPDATE user_information SET user_shift = '$newShift' WHERE user_id = '$userId'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $data['status'] = 'success';
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Error updating schedule';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>