<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");

$eatType = isset($_GET['tp']) ? mysqli_real_escape_string($con, $_GET['tp']) : 'All';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Choose Franchisee</title>

    <!-- ========= CSS ========= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/chooseFranchisee.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <?php include '../../navbar.php'; ?>

    <section class="home">
    <header class="contractheader">
        <div class="container-header">
            <h2 class="title">Choose Franchisee</h2>
        </div>
    </header>
    <div class="container">
        <!-- Franchise Selection -->
        <div class="form-group-1">
            <label for="franchise">FRANCHISEE:</label>
            <div id="franchise-buttons">
                <a href="chooseBranches?tp=<?php echo $eatType; ?>/franchise=PotatoCorner"
                    class="btn-option franchise-button text-decoration-none" data-value="potato-corner">
                    <img src="../../assets/images/PotCor.png" alt="Potato Corner">
                    <span>Potato Corner</span>
                </a>
                <a href="chooseBranches?tp=<?php echo $eatType; ?>/franchise=AuntieAnne"
                    class="btn-option franchise-button text-decoration-none" data-value="auntie-annes">
                    <img src="../../assets/images/AuntieAnn.png" alt="Auntie Anne's">
                    <span>Auntie Anne's</span>
                </a>
                <a href="chooseBranches?tp=<?php echo $eatType; ?>/franchise=MacaoImperial"
                    class="btn-option franchise-button text-decoration-none" data-value="macao-imperial">
                    <img src="../../assets/images/MacaoImp.png" alt="Macao Imperial">
                    <span>Macao Imperial</span>
                </a>
            </div>
            <input type="hidden" id="franchise" name="franchise" required>
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
</body>

</html>