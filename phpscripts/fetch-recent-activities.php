<?php
session_start();

include ("database-connection.php");

$data = [];

$sql = "
    SELECT ua.user_name, n.activity_type, n.datetime 
    FROM notifications n 
    LEFT JOIN users_accounts ua ON n.user_id = ua.user_id 
    ORDER BY n.datetime DESC 
    LIMIT 5
";

$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            'name' => $row['user_name'],
            'activity' => $row['activity_type'],
            'date' => $row['datetime']
        ];
    }
}

echo json_encode($data);
?>