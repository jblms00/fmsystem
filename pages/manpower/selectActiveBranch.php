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
    <link rel="stylesheet" href="../../assets/css/selectActiveBranch.css" type="text/css">
    <title>Manpower Deployment - Schedule</title>
</head>

<body>
    <!-- This area contains the blue header on top -->
    <div class="header">
        <h1 class="headertext"> &emsp; Employees - Active Today</h1>
    </div>

    <div class="store-types">
        <h1 class="branch-title">Select a Branch</h1>
        <a href="activeEmployees?str=PotatoCorner" id="potatocorner-full-position" class="store">
            <img class="logo" src="../../assets/images/PotCor.png" alt="Potato Corner">
            <h3 id="store-text">Potato Corner</h3>
        </a>
        <a href="activeEmployees?str=AuntieAnne" id="auntieannes-full-position" class="store">
            <img class="logo" src="../../assets/images/AuntieAnn.png" alt="Auntie Anne's">
            <h3 id="store-text">Auntie Anne's</h3>
        </a>
        <a href="activeEmployees?str=MacaoImperial" id="macao-full-position" class="store">
            <img class="logo" src="../../assets/images/MacaoImp.png" alt="Macao Imperial Tea">
            <h3 id="store-text">Macao Imperial Tea</h3>
        </a>

    </div>
</body>

</html>