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
        SELECT ac.location AS branch, ac.franchisee, COUNT(ui.user_id) AS employee_count
        FROM agreement_contract ac
        LEFT JOIN user_information ui 
            ON ac.location = ui.branch AND ac.franchisee = ui.franchisee
        WHERE ac.franchisee = '$franchisee'
        GROUP BY ac.location, ac.franchisee
        HAVING employee_count <= 1;
";

    
    $result = mysqli_query($con, $sql);

    if (!$result) {
        // Log SQL error to file and prevent it from outputting to the response
        error_log("SQL Error: " . mysqli_error($con), 3, "/path/to/php-error.log");
        $data['status'] = 'error';
        $data['message'] = 'A database error occurred. Please check logs for details.';
    } else if (mysqli_num_rows($result) > 0) {
        $data['employees'] = [];
        while ($row = mysqli_fetch_assoc($result)) {    
            $data['employees'][] = $row;
        }
        $data['status'] = 'success';
    } else {
        $data['status'] = 'error';
        $data['message'] = 'No branches found with 0 or 1 employee for the specified franchise.';
    }
} else {
    $data['status'] = 'error';
    $data['message'] = 'Invalid request method';
}

ob_end_clean();  // Clear any unintended output
echo json_encode($data);  // Output the JSON data only
