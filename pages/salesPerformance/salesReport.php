<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = [];

// Updated query
$query = "
    SELECT 
        sr.*, 
        ua.user_name AS encoder_name,
        ac.franchisee AS franchisee_name
    FROM 
        sales_report sr
    LEFT JOIN 
        users_accounts ua ON sr.encoder_id = ua.user_id
    LEFT JOIN 
        agreement_contract ac ON sr.ac_id = ac.ac_id
    WHERE 
        sr.report_id = '$id'
";

$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        // Format the franchisee name
        switch ($data['franchisee_name']) {
            case "potato-corner":
                $data['franchisee_name'] = "Potato Corner";
                break;
            case "macao-imperial":
                $data['franchisee_name'] = "Macao Imperial";
                break;
            case "auntie-anne":
                $data['franchisee_name'] = "Auntie Anne's";
                break;
        }
    } else {
        $data['error'] = "No record found with ID: $id";
    }
} else {
    $data['error'] = mysqli_error($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/salesReport.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
    <?php include '../../navbar.php'; ?>

    <section class="home">
        <header class="contractheader">
            <div class="container-header">
                <h1 class="title">View Sales Report</h1>
            </div>
        </header>
        <div class="container">
            <header class="header-report">Sales Report</header>
            <!-- Header section above the table -->
            <header class="header-info">
                <div class="header-section encoder">
                    <span class="header-label">Encoder:</span> <?php echo htmlspecialchars($data['encoder_name']); ?>
                </div>
                <div class="header-section date">
                <span class="header-label">Date:</span> <?php echo htmlspecialchars($data['date_added']); ?>
                </div>
            </header>
            <div class="header-section2">
                <span class="header-label">Franchisee:</span> <?php echo htmlspecialchars($data['franchisee_name']); ?>
            </div>
            <!-- Table for Sales Report -->
            <table>
                 <caption>Daily Sales Report: <strong><?php echo date("l, F d", strtotime($data['date_added'])); ?></strong> </caption>

                <thead>
                    <tr>
                        <th>Transaction Type</th>
                        <th>Mode of Payment</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $transactions = explode(',', $data['transactions']);
                    if ($data['services'] === "dine-in" || $data['services'] === "take-out") {
                        ?>
                        <tr>
                            <td rowspan="3"><?php echo ucwords($data['services']) ?></td>
                            <td>Cash/Card</td>
                            <td>₱ <?php echo number_format($transactions[0], 2); ?></td>

                        </tr>
                        <tr>
                            <td>GCash</td>
                            <td>₱ <?php echo number_format($transactions[1], 2); ?></td>

                        </tr>
                        <tr>
                            <td>Paymaya</td>
                            <td>₱ <?php echo number_format($transactions[2], 2); ?></td>

                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right;">Others:
                            </td>
                            <td>₱ <?php echo number_format($transactions[3], 2); ?></td>
                        </tr>
                    <?php } else { ?>

                        <!-- Row 3 -->
                        <tr>
                            <td rowspan="2">Delivery</td>
                            <td>GrabFood</td>
                            <td>₱ <?php echo number_format($transactions[0], 2); ?></td>
                        </tr>
                        <tr>
                            <td>foodpanda</td>
                            <td>₱ <?php echo number_format($transactions[1], 2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right;">Others:</td>
                            <td>₱ <?php echo number_format($transactions[2], 2); ?></td>
                        </tr>
                    <?php } ?>
                    <!-- Grand Total Row -->
                <tfoot>
                    <tr>
                        <td colspan="2" style="text-align: right;">Grand Total:</td>
                        <td>₱ <?php echo number_format($data['grand_total'], 2); ?></td>
                    </tr>
                </tfoot>

                </tbody>
            </table>
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
    <script src="../../assets/js/display-sales-information-script.js"></script>
</body>

</html>
