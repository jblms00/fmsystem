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

    <title>Dine-In Sales</title>

    <!-- ========= CSS ========= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/salesTransactions.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header class="contractheader">
        <div class="container-header">
            <h1 class="title">Delivery Sales</h1>
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
    <div class="filter-container">

        <!-- Filters -->
        <div class="filters">
            <label for="filter-franchise">Franchisee:</label>
            <select id="filter-franchise">
                <option value="">All</option>
                <option value="potatoCorner">Potato Corner</option>
                <option value="auntieAnnes">Auntie Anne's</option>
                <option value="macaoImperial">Macao Imperial</option>
            </select>

            <label for="filter-status">Location:</label>
            <select id="filter-status">
                <option value="">All</option>
                <option value="approved">location 1</option>
                <option value="pending">Pending</option>
                <option value="leasing">Leasing</option>
            </select>

            <label for="filter-status">Merchant:</label>
            <select id="filter-status">
                <option value="">All</option>
                <option value="foodpanda">foodpanda</option>
                <option value="grabfood">GrabFood</option>
            </select>


            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date">

            <label for="end-date">End Date:</label>
            <input type="date" id="end-date">


            <button id="btn-generate" class="resetButton">Generate</button>
            <!-- <button id="btn-reset" class="resetButton">Reset</button> -->

            <!-- Encode Sales Report -->
            <button id="btn-encode-salesreport" class="myButton">Encode</button>

            <!-- Upload File Button
            <label for="file-upload" class="myButton">Upload File</label>
            <input type="file" id="file-upload" style="display: none;"> -->


        </div>
    </div>


    </header>

    <div class="container">
        <section id="delivery-section">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Franchisee</th>
                        <th>Net Sales</th>
                        <th>Transaction Type</th>
                        <th>Merchant</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="delivery-row-1">
                        <td><img src="../../assets/images/PotCor.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="../../assets/images/foodpanda.png" alt="FoodPanda Logo" class="franchise-logo">
                        </td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-2">
                        <td><img src="../../assets/images/AuntieAnn.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="../../assets/images/grabfood.png" alt="GrabFood Logo" class="franchise-logo"></td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-3">
                        <td><img src="../../assets/images/MacaoImp.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="../../assets/images/grabfood.png" alt="GrabFood Logo" class="franchise-logo"></td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-1">
                        <td><img src="../../assets/images/PotCor.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="../../assets/images/foodpanda.png" alt="FoodPanda Logo" class="franchise-logo">
                        </td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-2">
                        <td><img src="../../assets/images/AuntieAnn.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="../../assets/images/grabfood.png" alt="GrabFood Logo" class="franchise-logo"></td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-3">
                        <td><img src="../../assets/images/MacaoImp.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="../../assets/images/foodpanda.png" alt="FoodPanda Logo" class="franchise-logo">
                        </td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                </tbody>
            </table>
        </section>

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