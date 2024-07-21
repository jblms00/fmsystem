<?php
session_start();

include ("database-connection.php");
$data = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employeeId = $_POST['id'];

    if ($employeeId) {
        $sql = " SELECT ui.*, ua.*
                 FROM user_information ui
                 LEFT JOIN users_accounts ua ON ui.user_id = ua.user_id
                 WHERE ui.user_id = '$employeeId'
        ";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $data['employee'] = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data['employee'][] = $row;
            }
            $data['status'] = 'success';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Employee not found';
        }
    } else {
        $data['status'] = 'error';
        $data['message'] = 'No employee ID provided';
    }
}

echo json_encode($data);
?>