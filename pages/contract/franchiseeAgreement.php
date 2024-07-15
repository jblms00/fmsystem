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

    <title>Franchise Contracts</title>

    <!-- ========= CSS ========= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/franchise agreement.css">
    <link rel="stylesheet" href="../../assets/css/navbar.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header class="contractheader">
        <div class="container-header">
            <h1 class="title">Contracts</h1>
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
                    <li class="nav-link active" id="franchising-link">
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
    <div class="filter-container">
        <!-- Filters -->
        <div class="filters">
            <label for="filter-franchise">Franchisee:</label>
            <select id="filter-franchise">
                <option value="">All</option>
                <option value="magalang">Potato Corner</option>
                <option value="urdaneta">Auntie Anne's</option>
                <option value="sm-grand">Macao Imperial</option>
            </select>

            <label for="filter-status">Status:</label>
            <select id="filter-status">
                <option value="">All</option>
                <option value="approved">Active</option>
                <option value="pending">Expired</option>
                <option value="leasing">Draft</option>
            </select>

            <button id="btn-reset" class="resetButton">Reset</button>



            <!-- New Document Button -->
            <a href="documentTypeSelection" class="myButton">New Document</a>

            <!-- Upload File Button -->
            <label for="file-upload" class="myButton">Upload File</label>
            <input type="file" id="file-upload" style="display: none;">
        </div>
    </div>
    <div class="container">
        <section id="franchise-section">
            <h2>Agreement Contract</h2>
            <div class="filters">
                <!-- Filters can go here if you have them -->

            </div>
            <table class="table table-responsive content-table" id="agreementContractTbl">
                <thead>
                    <tr>
                        <th scope="col">Franchisee</th>
                        <th scope="col">Location</th>
                        <th scope="col">Agreement</th>
                        <th scope="col">Status</th>
                        <th scope="col">Days to Expire</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </section>

        <section id="leasing-section">
            <h2>Leasing Contract</h2>
            <div class="filters">
                <!-- Filters can go here if you have them -->
            </div>
            <table class="content-table" id="leasingContractTbl">
                <thead>
                    <tr>
                        <th>Franchisee</th>
                        <th>Location</th>
                        <th>Agreement</th>
                        <th>Status</th>
                        <th>Days to Expire</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </section>

        <!-- Notification Area -->
        <div id="notification-area">
            <h2>Notifications</h2>
            <ul id="notification-list">
                <!-- List of notifications will go here -->
                <li>
                    <h3>Potato Corner</h3>
                    <h4>Agreement Contract</h4>
                    <span class="notification-details">Expiring in 90 days</span>
                </li>
                <li>
                    <h3>Auntie Anne's</h3>
                    <h4>Agreement Contract</h4>
                    <span class="notification-details">Expired</span>
                </li>
                <!-- Add more notification items as needed -->
            </ul>
        </div>
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
    <!-- <script src="../../assets/js/content.js"></script> -->
    <script src="../../assets/js/leasing-contract-script.js"></script>
    <script src="../../assets/js/agreement-contract-script.js"></script>
</body>

</html>