<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = [];
$franchiseFormattedMap = [
    'potato-corner' => 'Potato Corner',
    'auntie-anne' => 'Auntie Anne\'s',
    'macao-imperial' => 'Macao Imperial Tea'
];

if ($id) {
    $id = mysqli_real_escape_string($con, $id);

    $query = "SELECT expenses.*, users_accounts.user_name 
              FROM expenses 
              LEFT JOIN users_accounts ON expenses.encoder_id = users_accounts.user_id 
              WHERE expenses.ex_id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            if (isset($data['franchisee'])) {
                $data['franchisee'] = isset($franchiseFormattedMap[$data['franchisee']]) ? $franchiseFormattedMap[$data['franchisee']] : $data['franchisee'];
            }
        } else {
            $data['error'] = "No record found with ID: $id";
        }
    } else {
        $data['error'] = "Database query failed: " . mysqli_error($con);
    }
} else {
    $data['error'] = "ID not provided in the URL.";
}
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
                    <li class="nav-link" id="sales-link">
                        <a href="../../pages/salesPerformance/sales">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Sales Performance</span>
                        </a>
                    </li>
                    <li class="nav-link active" id="expenses-link">
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
        <header class="header-report">Expenses</header>
        <!-- Header section above the table -->
        <header class="header-info">
            <div class="header-section encoder">
                <span class="header-label">Encoder:</span> <?php echo htmlspecialchars($data['user_name']); ?>
            </div>
            <div class="header-section date">
                <span class="header-label">Date:</span> <?php echo htmlspecialchars($data['date_added']); ?>
            </div>
        </header>
        <div class="header-section2">
            <span class="header-label">Franchisee:</span> <?php echo htmlspecialchars($data['franchisee']); ?>
        </div>
        <div class="header-section2">
            <span class="header-label">Location:</span> <?php echo htmlspecialchars($data['location']); ?>
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