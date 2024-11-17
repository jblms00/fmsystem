<?php
session_start();

include ("phpscripts/database-connection.php");
include ("phpscripts/check-login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- ========= CSS ========= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="assets/images/BoxLogo.png" alt="logo">
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
                    <li class="nav-link active" id="dashboard-link">
                        <a href="dashboard-contract">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link" id="franchising-link">
                        <a href="pages/contract/franchiseeAgreement">
                            <i class='bx bx-file icon'></i>
                            <span class="text nav-text">Franchising Agreement</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li>
                    <a href="phpscripts/user-logout.php">
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
            <h1 class="title">Dashboard</h1>
        </div>
    </header>

        <div class="content" id="content-area">
            <div class="container">
                <div class="dash-content">
                    <div class="overview">
                        <div class="greeting">
                            <h2>Hi, <strong>Business Development Officer</strong>!</h2>
                        </div>
                        <div class="boxes-container">
                            
                            <div class="box-group">
                                <h3 class="box-group-title">Franchising Agreement</h3>
                                <a href="#" class="box box1">
                                    <i class='bx bx-folder-open'></i>
                                    <span class="text">Agreement Contract</span>
                                </a>
                                <a href="#" id="dineInSales-link" class="box box2">
                                    <i class='bx bx-food-menu'></i>
                                    <span class="text">Leasing Contract</span>
                                </a>
                            </div>
                            <div class="box-group">
                                <h3 class="box-group-title">Sales Performance</h3>
                                <a href="#" id="takeOutSales-link" class="box box3">
                                    <i class='bx bxs-bar-chart-alt-2'></i>
                                    <span class="text">Sales</span>
                                </a>
                                <a href="#" id="deliverySales-link" class="box box4">
                                    <i class='bx bx-money-withdraw'></i>
                                    <span class="text">Expenses</span>
                                </a>
                            </div>
                            <div class="box-group">
                                <h3 class="box-group-title">Manpower Deployment</h3>
                                <a href="#" class="box box5">
                                    <i class='bx bxs-time-five'></i>
                                    <span class="text">Scheduling</span>
                                </a>
                                <a href="#" class="box box6">
                                    <i class='bx bx-body'></i>
                                    <span class="text">Attendance</span>
                                </a>
                                <a href="#" class="box box6">
                                    <i class='bx bx-user-check'></i>
                                    <span class="text">Certifications</span>
                                </a>
                            </div>
                            <div class="box-group">
                                <h3 class="box-group-title">Inventory</h3>
                                <a href="#" class="box box7">
                                    <i class='bx bx-spreadsheet'></i>
                                    <span class="text">Reports</span>
                                </a>
                                <a href="#" class="box box8">
                                    <i class='bx bx-edit-alt'></i>
                                    <span class="text">New Report</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="assets/js/navbar.js"></script>
    <!-- <script src="assets/js/content.js"></script> -->
</body>

</html>