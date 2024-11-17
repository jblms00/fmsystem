<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");

$expenses_query = "SELECT SUM(expense_amount) AS total_expenses FROM expenses";
$expenses_result = mysqli_query($con, $expenses_query);

$sales_query = "SELECT SUM(grand_total) AS total_sales FROM sales_report";
$sales_result = mysqli_query($con, $sales_query);

$totalExpenses = 0;
$totalSales = 0;

if ($expenses_result || $sales_result) {
    $sales_row = mysqli_fetch_assoc($sales_result);
    $expenses_row = mysqli_fetch_assoc($expenses_result);

    $totalSales = $sales_row['total_sales'];
    $totalExpenses = $expenses_row['total_expenses'];
} else {
    $error = "Database query failed: " . mysqli_error($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Expenses</title>

    <!-- ========= CSS ========= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/expenses.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <?php include '../../navbar.php'; ?>

    <section class="home">
        <header class="contractheader">
            <div class="container-header">
                <h1 class="title">Expenses</h1>
            </div>
        </header>
        <div class="container">
            <div class="dash-content">
                <div class="overview">
                    <div class="title">
                        <i class='bx bxs-tachometer'></i>
                        <span class="text">Dashboard</span>
                    </div>
                    <div class="boxes">
                        <a href="totalExpenses" class="box box1">
                            <span class="text1"><?php echo number_format($totalExpenses, 2) ?></span>
                            <span class="text">Total Expenses</span>
                        </a>
                        <a href="chooseFranchisee" class="box box2">
                            <span class="text1"><?php echo number_format($totalSales, 2) ?></span>
                            <span class="text">Total Sales</span>
                        </a>
                        <div class="box box3">
                            <span class="text1"><?php echo number_format($totalSales - $totalExpenses, 2) ?></span>
                            <span class="text">Profit</span>
                        </div>
                    </div>
                </div>
                <div class="activity">
                    <div class="title">
                        <i class='bx bx-time-five'></i>
                        <span class="text">Analytics</span>
                    </div>
                    <!-- <div class="activity-data">
                        <div class="data names">
                            <span class="data-title">Name</span>
                            <span class="data-list">Julia</span>
                            <span class="data-list">Brian</span>
                            <span class="data-list">Matteo</span>
                            <span class="data-list">Matthew</span>
                        </div>
                        <div class="data names">
                            <span class="data-title">Activity</span>
                            <span class="data-list">Added Controllable Expense</span>
                            <span class="data-list">Added Non-Controllable Expense</span>
                            <span class="data-list">Added Controllable Expense</span>
                            <span class="data-list">Added Non-Controllable Expense</span>
                        </div>
                        <div class="data names">
                            <span class="data-title">Date</span>
                            <span class="data-list">05/27/24</span>
                            <span class="data-list">05/27/24</span>
                            <span class="data-list">05/27/24</span>
                            <span class="data-list">05/27/24</span>
                        </div> -->
                    </div>
                </div>
            </div>


        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="../../assets/js/navbar.js"></script>
</body>

</html>