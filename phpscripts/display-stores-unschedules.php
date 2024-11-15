<?php
session_start();
header('Content-Type: application/json');  // Set content type to JSON

include("database-connection.php");

$data = [];
ob_start();  // Start output buffering to capture any unexpected output

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
        ob_end_clean();
        echo json_encode($data);
        exit();
    }

    $sql = "
    SELECT ac.ac_id, ac.location AS branch, ac.franchisee, COUNT(ui.user_id) AS employee_count
    FROM agreement_contract ac
    LEFT JOIN user_information ui 
        ON ac.ac_id = ui.assigned_at
    WHERE ac.franchisee = '$franchisee'
    GROUP BY ac.ac_id, ac.location, ac.franchisee
    HAVING employee_count <= 1
";

    
    $result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data['employees'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data['employees'][] = [
            'ac_id' => $row['ac_id'],
            'branch' => $row['branch'],
            'franchisee' => $row['franchisee'],
            'employee_count' => $row['employee_count']
        ];
    }
    $data['status'] = 'success';
} else {
    $data['status'] = 'error';
    $data['message'] = 'No branches found with 0 or 1 employee for the specified franchise.';
}

}
echo json_encode($data);

