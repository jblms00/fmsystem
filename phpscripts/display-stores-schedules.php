<?php
session_start();

include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $str = mysqli_real_escape_string($con, $_POST['str']);

    if ($str === "potatoCorner") {
        $franchisee = "potato-corner";
    } else if ($str === "auntieAnne") {
        $franchisee = "auntie-anne";
    } else if ($str === "macaoImperial") {
        $franchisee = "macao-imperial";
    } else {
        $data['status'] = 'error';
        $data['message'] = 'Invalid franchisee specified';
        echo json_encode($data);
        exit();
    }

    $sql = "
        SELECT ua.user_id, ua.user_name, ui.assigned_at, ui.franchisee, ui.branch
        FROM users_accounts ua
        LEFT JOIN user_information ui ON ua.user_id = ui.user_id
        WHERE ui.franchisee = '$franchisee' AND ui.employee_status = 'assigned'
        GROUP BY ui.assigned_at, ui.franchisee, ui.branch
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
        $data['message'] = 'No employees found';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

echo json_encode($data);
?>