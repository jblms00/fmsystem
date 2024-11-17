<?php
session_start();
include("database-connection.php");
include("check-login.php");

$user_data = check_login($con);
$logged_in_user = $user_data['user_id'];

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $input = file_get_contents("php://input");
    $transactions = json_decode($input, true);

    foreach ($transactions as $transaction) {
        // Retrieve and escape form data
        $franchise = mysqli_real_escape_string($con, $transaction['franchise']);
        
        // Map franchise ID to lowercase-hyphenated franchise name
        $franchiseNameMap = [
            '11' => 'potato-corner',
            '12' => 'macao-imperial',
            '13' => 'auntie-anne'
        ];
        $franchise = $franchiseNameMap[$franchise] ?? strtolower(str_replace(' ', '-', $franchise));

        // Optional fields
        $location = isset($transaction['location']) ? mysqli_real_escape_string($con, $transaction['location']) : null;
        $productName = isset($transaction['productName']) ? mysqli_real_escape_string($con, $transaction['productName']) : null;

        // Mandatory fields
        $encoderName = mysqli_real_escape_string($con, $transaction['encoderName']);
        $date = mysqli_real_escape_string($con, $transaction['date']);
        $cashCard = isset($transaction['cashCard']) ? mysqli_real_escape_string($con, $transaction['cashCard']) : 0;
        $gCash = isset($transaction['gCash']) ? mysqli_real_escape_string($con, $transaction['gCash']) : 0;
        $paymaya = isset($transaction['paymaya']) ? mysqli_real_escape_string($con, $transaction['paymaya']) : 0;
        $grabFood = isset($transaction['grabFood']) ? mysqli_real_escape_string($con, $transaction['grabFood']) : 0;
        $foodPanda = isset($transaction['foodPanda']) ? mysqli_real_escape_string($con, $transaction['foodPanda']) : 0;
        $totalSales = isset($transaction['totalSales']) ? mysqli_real_escape_string($con, $transaction['totalSales']) : 0;
        $acId = mysqli_real_escape_string($con, $transaction['acId']);
        $services = mysqli_real_escape_string($con, $transaction['services']);
        $grandTotal = isset($transaction['grandTotal']) ? mysqli_real_escape_string($con, $transaction['grandTotal']) : 0;

        // Build the transactions string
        if ($services == "dine-in" || $services == "take-out") {
            $transactionsString = "$cashCard, $gCash, $paymaya, $totalSales";
            $requiredFields = [$cashCard, $gCash, $paymaya, $totalSales];
        } else {
            $transactionsString = "$grabFood, $foodPanda, $totalSales";
            $requiredFields = [$grabFood, $foodPanda, $totalSales];
        }

        // Validate only mandatory fields
        foreach ($requiredFields as $field) {
            if ($field === "" || $field === null) {
                $data['status'] = "error";
                $data['message'] = "Please fill in all required fields.";
                echo json_encode($data);
                exit();
            }
        }

        // Insert the record into the database
        $insert_query = "INSERT INTO sales_report (
            ac_id,
            encoder_id,
            franchisee,
            services,
            transactions,
            grand_total,
            date_added
        ) VALUES (
            '$acId',
            '$logged_in_user',
            '$franchise',
            '$services',
            '$transactionsString',
            '$grandTotal',
            '$date'
        )";

        if (mysqli_query($con, $insert_query)) {
            $data['status'] = "success";
            $data['message'] = "Sales report data saved successfully.";
        } else {
            $data['status'] = "error";
            $data['message'] = "Failed to save report. Please try again later.";
            break;
        }
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method.";
}

echo json_encode($data);
?>
