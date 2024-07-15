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
    <link rel="stylesheet" href="../../assets/css/chooseBranches.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header class="contractheader">
        <div class="container-header">
            <h2 class="title">Choose Franchisee</h2>
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
    <div class="container">
        <!-- Branch Selection -->
        <div class="form-group-1">
            <label for="branch">LOCATION:</label>
            <div id="branch-buttons">
                <button type="button" id="salesBranch" class="btn-option branch-button" data-value="magalang-pampanga">
                    <img src="../../assets/images/PotCor.png" alt="Potato Corner">
                    <span>Potato Corner</span>
                    <span>Magalang, Pampanga</span>
                </button>

                <button type="button" id="salesBranch" class="btn-option branch-button" data-value="sm-grand-central">
                    <img src="../../assets/images/PotCor.png" alt="Potato Corner">
                    <span>Potato Corner</span>
                    <span>SM Grand Central</span>
                </button>

                <button type="button" id="salesBranch" class="btn-option branch-button"
                    data-value="urdaneta-pangasinan">
                    <img src="../../assets/images/PotCor.png" alt="Potato Corner">
                    <span>Potato Corner</span>
                    <span>Urdaneta, Pangasinan</span>
                </button>

                <button type="button" id="salesBranch" class="btn-option branch-button" data-value="example-location-1">
                    <img src="../../assets/images/PotCor.png" alt="Auntie Anne's">
                    <span>Potato Corner</span>
                    <span>Example Location 1</span>
                </button>

                <button type="button" id="salesBranch" class="btn-option branch-button" data-value="example-location-2">
                    <img src="../../assets/images/PotCor.png" alt="Auntie Anne's">
                    <span>Potato Corner</span>
                    <span>Example Location 2</span>
                </button>

                <button type="button" id="salesBranch" class="btn-option branch-button" data-value="example-location-3">
                    <img src="../../assets/images/PotCor.png" alt="Macao Imperial">
                    <span>Potato Corner</span>
                    <span>Example Location 3</span>
                </button>

                <button type="button" id="salesBranch" class="btn-option branch-button" data-value="example-location-4">
                    <img src="../../assets/images/PotCor.png" alt="Macao Imperial">
                    <span>Potato Corner</span>
                    <span>Example Location 4</span>
                </button>
            </div>
            <input type="hidden" id="branch" name="branch" required>
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
</body>

</html>