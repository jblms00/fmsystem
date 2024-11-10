<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = [];

// Updated query
$query = "
    SELECT 
        sr.*, 
        ua.user_name AS encoder_name,
        ac.franchisee AS franchisee_name
    FROM 
        sales_report sr
    LEFT JOIN 
        users_accounts ua ON sr.encoder_id = ua.user_id
    LEFT JOIN 
        agreement_contract ac ON sr.ac_id = ac.ac_id
    WHERE 
        sr.report_id = '$id'
";

$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        // Format the franchisee name
        switch ($data['franchisee_name']) {
            case "potato-corner":
                $data['franchisee_name'] = "Potato Corner";
                break;
            case "macao-imperial":
                $data['franchisee_name'] = "Macao Imperial";
                break;
            case "auntie-anne":
                $data['franchisee_name'] = "Auntie Anne's";
                break;
        }
    } else {
        $data['error'] = "No record found with ID: $id";
    }
} else {
    $data['error'] = mysqli_error($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/salesReport.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="contractheader">
        <div class="container-header">
            <h1 class="title">View Sales Report</h1>
        </div>
    </header>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../../assets/images/BoxLogo.png" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">NEVADA</span>
                    <span class="profession">Management Group</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="search" placeholder="Search...">
                </li>
                <ul class="menu-links">
                    <li class="nav-link" id="dashboard-link">
                        <a href="../../dashboard">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link" id="franchising-link">
                        <a href="../../pages/contract/franchiseeAgreement">
                            <i class='bx bx-file icon'></i>
                            <span class="text nav-text">Franchising Agreement</span>
                        </a>
                    </li>
                    <li class="nav-link active" id="sales-link">
                        <a href="../../pages/salesPerformance/sales">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Sales Performance</span>
                        </a>
                    </li>
                    <li class="nav-link" id="expenses-link">
                        <a href="../../pages/salesPerformance/expenses">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Expenses</span>
                        </a>
                    </li>
                    <li class="nav-link" id="inventory-link">
                        <a href="../../pages/inventory/inventory2">
                            <i class='bx bx-store-alt icon'></i>
                            <span class="text nav-text">Inventory</span>
                        </a>
                    </li>
                    <li class="nav-link" id="manpower-link">
                        <a href="../../pages/manpower/manpower_dashboard">
                            <i class='bx bx-group icon'></i>
                            <span class="text nav-text">Manpower Deployment</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li>
                    <a href="../../phpscripts/user-logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
    <div class="container">
        <header class="header-report">Sales Report</header>
        <!-- Header section above the table -->
        <header class="header-info">
            <div class="header-section encoder">
                <span class="header-label">Encoder:</span> <?php echo htmlspecialchars($data['encoder_name']); ?>
            </div>
            <div class="header-section date">
            <span class="header-label">Date:</span> <?php echo htmlspecialchars($data['date_added']); ?>
            </div>
        </header>
        <div class="header-section2">
            <span class="header-label">Franchisee:</span> <?php echo htmlspecialchars($data['franchisee_name']); ?>
        </div>
        <!-- Table for Sales Report -->
        <table>
            <caption><strong>Product Name:</strong> <?php echo htmlspecialchars($data['services']); ?></caption>
            <thead>
                <tr>
                    <th>Transaction Type</th>
                    <th>Mode of Payment</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php $transactions = explode(',', $data['transactions']);
                if ($data['services'] === "dine-in" || $data['services'] === "take-out") {
                    ?>
                    <tr>
                        <td rowspan="3"><?php echo ucwords($data['services']) ?></td>
                        <td>Cash/Card</td>
                        <td><?php echo $transactions[0] ?></td>
                    </tr>
                    <tr>
                        <td>GCash</td>
                        <td><?php echo $transactions[1] ?></td>
                    </tr>
                    <tr>
                        <td>Paymaya</td>
                        <td><?php echo $transactions[2] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;">Total <?php echo ucwords($data['services']) ?> Sales:
                        </td>
                        <td><?php echo $transactions[3] ?></td>
                    </tr>
                <?php } else { ?>

                    <!-- Row 3 -->
                    <tr>
                        <td rowspan="2">Delivery</td>
                        <td>GrabFood</td>
                        <td><?php echo $transactions[0] ?></td>
                    </tr>
                    <tr>
                        <td>foodpanda</td>
                        <td><?php echo $transactions[1] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;">Total Delivery Sales:</td>
                        <td><?php echo $transactions[2] ?></td>
                    </tr>
                <?php } ?>
                <!-- Grand Total Row -->
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right;">Grand Total:</td>
                    <td><?php echo $data['grand_total'] ?></td>
                </tr>
            </tfoot>

            </tbody>
        </table>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="../../assets/js/navbar.js"></script>
    <script src="../../assets/js/display-sales-information-script.js"></script>
</body>

</html>
