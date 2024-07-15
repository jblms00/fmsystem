<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = [];

if ($id) {
    $id = mysqli_real_escape_string($con, $id);

    $query = "SELECT * FROM agreement_contract WHERE ac_id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
        } else {
            $data['error'] = "No record found with ID: $id";
        }
    } else {
        $data['error'] = "Database query failed: " . mysqli_error($con);
    }
} else {
    $data['error'] = "ID not provided in the URL.";
}

function formatFranchiseeName($name)
{
    return strtoupper(str_replace('-', ' ', $name));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Document Franchise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/franchiseeDetails.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="contractheader">
        <div class="container-header">
            <h1 class="title">Franchisee Details</h1>
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
    <div class="container">
        <!-- Your content for the new document franchise page -->
        <div class="franchise-details">
            <div class="contract-content">
                <div class="contract-title">FRANCHISE AGREEMENT</div>
                <div class="contract-subtitle">
                    <?php echo strtoupper(str_replace('-', ' ', $data['franchisee'])); ?>
                </div>
                <!-- Other contract details and content here -->
                <div class="detail-item">
                    <span>Franchise Term:</span>
                    <p><?php echo $data['franchise_term']; ?> years</p>
                </div>
                <div class="detail-item">
                    <span>Agreement Date:</span>
                    <p><?php echo $data['agreement_date']; ?></p>
                </div>
                <div class="detail-item">
                    <span>Location:</span>
                    <p><?php echo $data['location']; ?></p>
                </div>
                <div class="detail-item">
                    <span>Rights Granted:</span>
                    <ul>
                        <?php
                        $franchiseeName = strtoupper(str_replace('-', ' ', $data['franchisee']));

                        $rightsMap = [
                            'non-exclusive' => 'Non-exclusive right to operate a ' . $franchiseeName . ' outlet',
                            'use-trademarks' => 'Right to use the trademark ' . $franchiseeName . ' and other proprietary marks',
                            'sell-products' => 'Right to sell proprietary products of ' . $franchiseeName . ' at the approved location',
                        ];

                        $rightsGranted = explode(',', $data['rights_granted']);

                        foreach ($rightsGranted as $right) {
                            if (isset($rightsMap[$right])) {
                                echo '<li>' . $rightsMap[$right] . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>

                <div class="detail-item">
                    <span>Franchise Fee:</span>
                    <p>PHP <?php echo number_format($data['franchise_fee'], 2); ?></p>
                </div>

                <div class="detail-item">
                    <span>Franchise Package:</span>
                    <p>PHP <?php echo number_format($data['franchise_package'], 2); ?></p>
                </div>
                <div class="detail-item">
                    <span>Bond:</span>
                    <p>PHP <?php echo number_format($data['bond'], 2); ?></p>
                </div>
                <div class="detail-item">
                    <span>Notary Public:</span>
                    <p><?php echo $data['notarization_fr']; ?></p>
                </div>
            </div>

        </div>
        <div class="button-group">
            <a href="editDocumentFranchise<?php echo $id; ?>" class=" text-decoration-none myButton">Edit Details</a>
            <a href="editDocumentFranchise<?php echo $id; ?>" class=" text-decoration-none myButton">Print Contract</a>
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
    <script src="../../assets/js/agreement-contract-script.js"></script>
</body>

</html>