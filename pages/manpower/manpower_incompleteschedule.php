<?php
session_start();

include("../../phpscripts/database-connection.php");
include("../../phpscripts/check-login.php");

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
    <link rel="stylesheet" href="../../assets/css/manpower.css" type="text/css">
    <title>Manpower Deployment - Schedule</title>
</head>

<body>
    <!-- This area contains the blue header on top -->
    <div class="header">
        <h1 class="headertext"> &emsp; Scheduling</h1>
    </div>

    <!-- This area contains the side bar -->
    <div class="schedule_sidebar">
        <h1 class="sidebar-title">Store Schedules</h1>
        <div class="branch-list" id="branchList"></div>
    </div>
    <div class="employee-list">
        <h1 class="employee-title">Employees</h1>
        <h1 class="count-title">0/2</h1>

        <div class="activity">
            <section id="employees-section-unsched">
                <table class="content-table">
                    <tbody></tbody>
                </table>
            </section>
        </div>

        <!-- <div class="input-field assign-btn d-none">
            <a class="btn btn-primary assign-emp">Assign
                Employee</a>
        </div> -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="assignModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Checkbox</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Location</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
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
    <script src="../../assets/js/display-store-unschedules-script.js"></script>
</body>


</html>