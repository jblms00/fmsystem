<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/salesReport.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header class="contractheader">
        <div class="container-header">
            <h1 class="title">View Expenses</h1>
        </div>
    </header>

    <div class="container">
        <header class="header-report">Expenses</header>
        <!-- Header section above the table -->
        <header class="header-info">
            <div class="header-section encoder">
                <span class="header-label">Encoder:</span> Encoder's Name
            </div>
            <div class="header-section date">
                <span class="header-label">Date:</span> Date
            </div>
        </header>
        <div class="header-section2">
            <span class="header-label">Franchisee:</span> Franchisee Name
        </div>
        <div class="header-section2">
            <span class="header-label">Location:</span> Location of Franchisee
        </div>
        <!-- Table for Expenses -->
        <table>
            <caption><strong>Franchisor Expenses</strong></caption>
            <thead>
                <tr>
                    <th>Expense Type</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td>Franchise Fees</td>
                    <td>Description</td>
                    <td>Amount</td>
                </tr>

                <!-- Row 2 -->
                <tr>
                    <td>Royalty Fees</td>
                    <td>Description</td>
                    <td>Amount</td>
                </tr>

                <!-- Row 3 -->
                <tr>
                    <td>Agency Fees</td>
                    <td>Description</td>
                    <td>Amount</td>
                </tr>

                <!-- Row 4 -->
                <tr>
                    <td>Other Fees</td>
                    <td>Description</td>
                    <td>Amount</td>
                </tr>

                <!-- Grand Total Row -->
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right;">Grand Total:</td>
                    <td>Grand Total</td>
                </tr>
            </tfoot>

            </tbody>
        </table>

        <!-- Table for Expenses -->
        <table>
            <caption><strong>Leasor Expenses</strong> </caption>

            <thead>
                <tr>
                    <th>Expense Type</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td>Rentals</td>
                    <td>Description</td>
                    <td>Amount</td>
                </tr>

                <!-- Row 2 -->
                <tr>
                    <td>Utilities</td>
                    <td>Description</td>
                    <td>Amount</td>
                </tr>

                <!-- Row 3 -->
                <tr>
                    <td>Maintenance</td>
                    <td>Description</td>
                    <td>Amount</td>
                </tr>

                <!-- Row 4 -->
                <tr>
                    <td>Other Fees</td>
                    <td>Description</td>
                    <td>Amount</td>
                </tr>

                <!-- Grand Total Row -->
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right;">Grand Total:</td>
                    <td>Grand Total</td>
                </tr>
            </tfoot>

            </tbody>
        </table>


        <!-- Table for Expenses -->
        <table>
            <caption><strong>Other Expenses</strong> </caption>

            <thead>
                <tr>
                    <th>Expense Type</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 4 -->
                <tr>
                    <td>Other Fees</td>
                    <td>Description</td>
                    <td>Amount</td>
                </tr>

                <!-- Grand Total Row -->
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right;">Grand Total:</td>
                    <td>Grand Total</td>
                </tr>
            </tfoot>

            </tbody>
        </table>
    </div>

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