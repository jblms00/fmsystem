<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Unassigned Employees</title>

    <!-- ========= CSS ========= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/unassignedEmployees.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="manpowerheader">
        <div class="container-header">
            <h1 class="title">Unassigned Employees</h1>
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
    <div class="activity">
        <section id="employees-section">
            <span class="text">Recent Activities</span>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="manpowerEmployee-row-1">
                        <td>Maria Santos</td>
                        <td>09123456789</td>
                        <td>Magalang, Pampanga</td>
                        <td><span class="status incomplete">Incomplete Certification</span></td>
                    </tr>
                    <tr id="manpowerEmployee-row-2">
                        <td>Maria Santos</td>
                        <td>09123456789</td>
                        <td>Magalang, Pampanga</td>
                        <td><span class="status incomplete">Incomplete Certification</span></td>
                    </tr>
                    <tr id="manpowerEmployee-row-3">
                        <td>Maria Santos</td>
                        <td>09123456789</td>
                        <td>Magalang, Pampanga</td>
                        <td><span class="status active">Ready for Deployment</span></td>
                    </tr>
                    <tr id="manpowerEmployee-row-3">
                        <td>Maria Santos</td>
                        <td>09123456789</td>
                        <td>Magalang, Pampanga</td>
                        <td><span class="status incomplete">Incomplete Certification</span></td>

                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    <div class="branches">
        <div class="staffed-branches">
            <h1 class="branch-title">Fully Staffed Branches</h1>
            <div id="potatocorner-full-position" class="store">
                <img class="logo" src="assets/images/PotCor.png" alt="Potato Corner">
                <h3 id="store-text">Potato Corner</h3>
            </div>
            <div id="auntieannes-full-position" class="store">
                <img class="logo" src="assets/images/AuntieAnn.png" alt="Auntie Anne's">
                <h3 id="store-text">Auntie Anne's</h3>
            </div>
            <div id="macao-full-position" class="store">
                <img class="logo" src="assets/images/MacaoImp.png" alt="Macao Imperial Tea">
                <h3 id="store-text">Macao Imperial Tea</h3>
            </div>
        </div>
        <div class="understaffed-branches">
            <h1 class="branch-title">Understaffed Branches</h1>
            <div id="potatocorner-under-position" class="store">
                <img class="logo" src="assets/images/PotCor.png" alt="Potato Corner">
                <h3 id="store-text">Potato Corner</h3>
            </div>
            <div id="auntieannes-under-position" class="store">
                <img class="logo" src="assets/images/AuntieAnn.png" alt="Auntie Anne's">
                <h3 id="store-text">Auntie Anne's</h3>
            </div>
            <div id="macao-under-position" class="store">
                <img class="logo" src="assets/images/MacaoImp.png" alt="Macao Imperial Tea">
                <h3 id="store-text">Macao Imperial Tea</h3>
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
</body>

</html>