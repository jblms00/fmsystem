<?php
session_start();
include ("database-connection.php");

$data = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Validate required fields
    if (empty($_POST['selectedFranchise']) || empty($_POST['franchiseLocation']) || empty($_POST['encoderName']) || empty($_POST['dateToday']) || empty($_POST['selectedExpense'])) {
        $data['status'] = 'error';
        $data['message'] = 'All fields are required!';
    } else {
        // Sanitize and escape input data
        $selectedFranchise = mysqli_real_escape_string($con, $_POST['selectedFranchise']);
        $franchiseLocation = mysqli_real_escape_string($con, $_POST['franchiseLocation']);
        $encoderName = mysqli_real_escape_string($con, $_POST['encoderName']);
        $dateToday = mysqli_real_escape_string($con, $_POST['dateToday']);
        $selectedExpense = mysqli_real_escape_string($con, $_POST['selectedExpense']);
        $expenseType = isset($_POST['expenseType']) ? mysqli_real_escape_string($con, $_POST['expenseType']) : '';
        $amount = isset($_POST['amount']) ? mysqli_real_escape_string($con, $_POST['amount']) : '';
        $description = isset($_POST['description']) ? mysqli_real_escape_string($con, $_POST['description']) : '';
        $otherDetails = isset($_POST['otherDetails']) ? mysqli_real_escape_string($con, $_POST['otherDetails']) : '';
        
        // Insert data into the database
        $query = "INSERT INTO expenses 
                  (encoder_id, franchisee, location, expense_catergory, expense_type, expense_purpose, expense_amount, expense_description, date_added) 
                  VALUES 
                  ('$encoderName', '$selectedFranchise', '$franchiseLocation', '$selectedExpense', '$expenseType', '$otherDetails', '$amount', '$description', '$dateToday')";

        if (mysqli_query($con, $query)) {
            $data['status'] = 'success';
            $data['message'] = 'Expense details saved successfully!';
        } else {
            $data['status'] = 'error';
            $data['message'] = 'Failed to save. Please try again later';
        }
    }

    echo json_encode($data);
}
?>