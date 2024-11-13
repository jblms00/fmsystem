<?php
session_start();
include("../../phpscripts/database-connection.php");
include("../../phpscripts/check-login.php");

$store = isset($_GET['str']) ? $_GET['str'] : '';
$branch_id = isset($_GET['branch_id']) ? (int)$_GET['branch_id'] : 0;

$data = [];

// Fetch employees specifically assigned to the selected branch
if ($branch_id > 0) {
    $sql = "
        SELECT ua.user_id, ua.user_name, ua.user_phone_number, ui.employee_status
        FROM users_accounts ua
        JOIN user_information ui ON ua.user_id = ui.user_id
        WHERE ui.assigned_at = $branch_id
    ";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data['employees'][] = $row;
        }
    } else {
        $data['message'] = 'No employees assigned to this branch.';
    }
}
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
                                <section id="employees-section-unsched">
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
                            <!-- Add the new button here -->
                            <?php
                            // Replace `SelectedBranch` and `1` with dynamic values for branch_id and branch_name if available
                            $branch_name = isset($store) ? htmlspecialchars($store) : "Selected Branch";
                            $branch_id = isset($_GET['branch_id']) ? (int)$_GET['branch_id'] : 1;
                            ?>
                            <div class="text-end mt-3">
                                <a href="manpower_assign.php?branch=<?php echo urlencode($branch_name); ?>&branch_id=<?php echo $branch_id; ?>" class="btn btn-primary">Assign Manpower</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="../../assets/js/display-store-unschedules-script.js"></script>
</body>


</html>