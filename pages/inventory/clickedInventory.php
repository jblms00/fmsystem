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
    <!-- ========= CSS ========= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <!-- <link rel="stylesheet" href="../../assets/css/inventory.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/inventory2.css"> -->
    <link rel="stylesheet" href="../../assets/css/clickedInventory.css">
    

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Inventory Module</title>
</head>

<body>

    <?php include '../../navbar.php'; ?>

    <section class="home">
        <header class="contractheader">
            <div class="container-header">
                <h1 class="title">Inventory</h1>
            </div>
        </header>
            <div class="container">
                <h2 class="subheadertext">Daily Ending Inventory</h2>
                <div class="regularText">Franchisee: <span id="franchisee"></span></div>
                <div class="regularText">Filled By: <span id="filledBy"></span></div>
                <div class="regularText">Location: <span id="branch"></span></div>
                <div class="regularText">Date: <span id="date"></span></div>
                <div class="filters">
                    <button id="Download">Download</button>
                </div>
                <div class="content">
                    <table id="clickedInventory2Tbl">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>UOM</th>
                                <th>Beginning</th>
                                <th>Delivery</th>
                                <th>Waste</th>
                                <th>OnHand</th>
                                <th>Ending</th>
                                <th>Sold</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be dynamically inserted here -->
                        </tbody>
                    </table>
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
    <script src="../../assets/js/navbar.js"></script>
    <script src="../../assets/js/report-script.js"></script>
</body>

</html>