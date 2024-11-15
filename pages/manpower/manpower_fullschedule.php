<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");

$store = $_GET['str'];
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/fullschedule.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Manpower Deployment - Schedule</title>
</head>

<body>

    <?php include '../../navbar.php'; ?>

    <section class="home">

    <header class="contractheader">
            <div class="container-header">
                <h1 class="title">Scheduling</h1>
            </div>
        </header>

        <div class="container">
            <div class="dash-content">
                <div class="overview">
                    <div class="boxes-container">
                        <div class="box-group">
                            <h3 class="box-group-title">Store Schedules</h3>
                            <div class="branch-list" id="branchList">
                                <button type="button" class="box box1 check-employee border-0">
                                    <i class='bx bx-user'></i>
                                    <!-- <span class="text emp-name">Employee Name</span> -->
                                </button>
                            </div>
                        
                        </div>
                        <div class="box-group2" id="employeeDetails">
                        <h1 class="employee-title">Employees</h1>
                            <h1 class="count-title"><span>0</span>/2</h1>
                            <div class="activity">
                                <section id="employees-section">
                                    <table class="content-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Schedule</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- This area contains the side bar
    <div class="schedule_sidebar">
        <h1 class="sidebar-title">Store Schedules</h1>
        <div class="branch-list" id="branchList"></div>
    </div> -->

    <!-- <div class="employee-list">
        <h1 class="employee-title">Employees</h1>
        <h1 class="count-title"><span>0</span>/2</h1>
        <div class="activity">
            <section id="employees-section">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Schedule</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </section>
        </div>
    </div> -->
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
    <script src="../../assets/js/display-store-schedules-script.js"></script>
</body>


</html>