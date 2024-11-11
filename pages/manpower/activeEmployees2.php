<?php
session_start();

include("../../phpscripts/database-connection.php");
include("../../phpscripts/check-login.php");
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
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/activeEmployees3.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

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
                    <li class="nav-link">
                        <a href="../../dashboard">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../../pages/contract/franchiseeAgreement">
                            <i class='bx bx-file icon'></i>
                            <span class="text nav-text">Franchising Agreement</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../../pages/salesPerformance/sales">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Sales Performance</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../../pages/salesPerformance/expenses">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Expenses</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../../pages/inventory/inventory2">
                            <i class='bx bx-store-alt icon'></i>
                            <span class="text nav-text">Inventory</span>
                        </a>
                    </li>
                    <li class="nav-link active">
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

    <section class="home">

        <header class="contractheader">
            <div class="container-header">
                <h1 class="title">Employees - Active Today</h1>
            </div>
        </header>

        <div class="filter-container">
            <!-- Filters -->
           
            <div class="title-container">
                <img class="current-store-logo" src="../../assets/images/PotCor.png" alt="Potato Corner">
                <h2 class="current-store-name">POTATO CORNER</h2>
             </div>

            <div class="search-bar-container">
                <input type="text" placeholder="Search..." id="search" class="search-bar">
            </div>

            <div class="info-bar">
                    <span>Total Active Employees: Number of Active Employees*</span>
                    <span>Date: Current Date*</span>
            </div>
        </div>
        <div class="container">
            <section id="franchise-section">
                <h2>Branch Location</h2>
                <h3 class="employee-list-title">Employee List:</h3> <!-- Added Employee List Heading -->
                <div class="filters">
                    <!-- Filters can go here if you have them -->

                </div>
                <table class="content-table" id="agreementContractTbl">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Franchisee</th>
                            <th scope="col">Shift Timing</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <!-- HARDCODED EXAMPLE -->
                    <!-- <tbody>
                        <tr>
                            <td>Maria Santos</td>
                            <td>09123456789</td>
                            <td>Magalang, Pampanga</td>
                            <td><span class="shift-timing">09:00–04:00pm</span></td>
                            <td><span class="status checked-in">Checked-in</span></td>
                        </tr>
                    </tbody> -->

                </table>
            </section>

            <section id="leasing-section">
                <h2>Branch Location</h2>
                <h3 class="employee-list-title">Employee List:</h3>
                <div class="filters">
                    <!-- Filters can go here if you have them -->
                </div>
                <table class="content-table" id="leasingContractTbl">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Franchisee</th>
                            <th scope="col">Shift Timing</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </section>
    </section>




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
    <script src="../../assets/js/notification-contract-script.js"></script>
</body>

</html>