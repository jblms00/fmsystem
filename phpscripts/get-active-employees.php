<?php
session_start();

include("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $str = $_POST['str'];

    $branch = '';
    if ($str == "PotatoCorner") {
        $branch = "potato-corner";
    } else if ($str == "AuntieAnne") {
        $branch = "auntie-anne";
    } else if ($str == "MacaoImperial") {
        $branch = "macao-imerial";
    }

    $data['str'] = $str;
    $data['branch'] = $branch;

    $sql = "SELECT 
                ua.user_id, 
                ua.user_name, 
                ua.user_phone_number, 
                ui.assigned_at, 
                ui.employee_status, 
                ui.branch, 
                ui.user_shift 
            FROM users_accounts ua 
            LEFT JOIN user_information ui 
            ON ua.user_id = ui.user_id 
            WHERE ui.franchisee = '$branch'
            AND ua.user_status = 'active'
            AND ui.employee_status = 'assigned'";

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $employees = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $branch = $row['branch'];
            if (!isset($employees[$branch])) {
                $employees[$branch] = [
                    'branch' => $branch,
                    'employees' => []
                ];
            }

            $status_class = $row['employee_status'] === 'checked-in' ? 'checked-in' : 'checked-out-grayed';
            $employees[$branch]['employees'][] = [
                'name' => $row['user_name'],
                'phone' => $row['user_phone_number'],
                'shift' => $row['user_shift'],
                'status' => ucwords(str_replace('-', ' ', $row['employee_status'])),
                'status_class' => $status_class
            ];
        }
        $data['status'] = 'success';
        $data['data'] = array_values($employees);
    } else {
        $data['status'] = 'error';
        $data['message'] = 'No employees found';
    }
}

echo json_encode($data);
?>