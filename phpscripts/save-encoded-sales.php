<?php
session_start();
include ("database-connection.php");
include ("check-login.php");

$user_data = check_login($con);
$logged_in_user = $user_data['user_id'];

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $input = file_get_contents("php://input");
    $transactions = json_decode($input, true);

    foreach ($transactions as $transaction) {
        $franchise = mysqli_real_escape_string($con, $transaction['franchise']);
        $location = mysqli_real_escape_string($con, $transaction['location']);
        $encoderName = mysqli_real_escape_string($con, $transaction['encoderName']);
        $date = mysqli_real_escape_string($con, $transaction['date']);
        $productName = mysqli_real_escape_string($con, $transaction['productName']);
        $cashCard = isset($transaction['cashCard']) ? mysqli_real_escape_string($con, $transaction['cashCard']) : '';
        $gCash = isset($transaction['gCash']) ? mysqli_real_escape_string($con, $transaction['gCash']) : '';
        $paymaya = isset($transaction['paymaya']) ? mysqli_real_escape_string($con, $transaction['paymaya']) : '';
        $grabFood = isset($transaction['grabFood']) ? mysqli_real_escape_string($con, $transaction['grabFood']) : '';
        $foodPanda = isset($transaction['foodPanda']) ? mysqli_real_escape_string($con, $transaction['foodPanda']) : '';
        $totalSales = mysqli_real_escape_string($con, $transaction['totalSales']);
        $acId = mysqli_real_escape_string($con, $transaction['acId']);
        $services = mysqli_real_escape_string($con, $transaction['services']);
        $grandTotal = mysqli_real_escape_string($con, $transaction['grandTotal']);

        // Build the transactions string based on selected service type
        if ($services == "dine-in" || $services == "take-out") {
            $transactionsString = "$cashCard, $gCash, $paymaya, $totalSales";
            $requiredFields = [
                $cashCard,
                $gCash,
                $paymaya,
                $totalSales
            ];

            $data['cashCard'] = $cashCard;
            $data['paymaya'] = $paymaya;
        } else {
            $transactionsString = "$grabFood, $foodPanda, $totalSales";
            $requiredFields = [
                $grabFood,
                $foodPanda,
                $totalSales
            ];
        }

        $data['totalSales'] = $totalSales;

        foreach ($requiredFields as $field) {
            if (empty($field) || $totalSales == 0) {
                $data['status'] = "error";
                $data['message'] = "Please fill in all required fields.";
                echo json_encode($data);
                exit();
            }
        }

        $data['transactions'] = $transactions;

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
            '$franchise',
            '$logged_in_user',
            '$services',
            '$transactionsString',
            '$grandTotal',
            '$date'
        )";

        if (mysqli_query($con, $insert_query)) {
            $data['status'] = "success";
            $data['message'] = "Sales report data saved successfully";
        } else {
            $data['status'] = "error";
            $data['message'] = "Failed to save report. Please try again later.";
            break; // Exit the loop on the first error
        }
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Invalid request method";
}

echo json_encode($data);
?>