<?php
// Check if session is started; start session if not
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Retrieve user role from session, defaulting to 'guest' if not set
$userRole = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : 'guest';

// Get the current page's script name

$currentPage = basename($_SERVER['PHP_SELF']);
echo "<script>console.log('Current Page: $currentPage');</script>";
?>


<!-- navbar.php -->
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

                <!-- Conditional Dashboard Link -->
                <li class="nav-link <?php echo ($currentPage === 'dashboard' || $currentPage === 'dashboard-inventory' || $currentPage === 'dashboard-contract' || $currentPage === 'dashboard-sales' || $currentPage === 'dashboard-manpower') ? 'active' : ''; ?>" id="dashboard-link">
                    <a href="<?php 
                        echo ($userRole == 'admin') 
                            ? '../../dashboard' 
                            : (($userRole == 'inventory') 
                                ? '../../dashboard-inventory' 
                                : (($userRole == 'business_development') 
                                    ? '../../dashboard-contract' 
                                    : (($userRole == 'sales') 
                                        ? '../../dashboard-sales' 
                                        : (($userRole == 'manpower') 
                                            ? '../../dashboard-manpower' 
                                            : '../../dashboard'))));
                    ?>">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- Franchising Link -->
                <?php if ($userRole == 'admin' || $userRole == 'business_development') : ?>
                <li class="nav-link <?php echo ($currentPage === 'franchiseeAgreement.php') ? 'active' : ''; ?>" id="franchising-link">
                    <a href="../../pages/contract/franchiseeAgreement">
                        <i class='bx bx-file icon'></i>
                        <span class="text nav-text">Franchising Agreement</span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- Sales Performance Link -->
                <?php if ($userRole == 'admin' || $userRole == 'sales') : ?>
                <li class="nav-link <?php echo ($currentPage === 'sales.php') ? 'active' : ''; ?>" id="sales-link">
                    <a href="../../pages/salesPerformance/sales">
                        <i class='bx bx-bar-chart-alt-2 icon'></i>
                        <span class="text nav-text">Sales Performance</span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- Expenses Link -->
                <?php if ($userRole == 'admin' || $userRole == 'sales') : ?>
                <li class="nav-link <?php echo ($currentPage === 'expenses.php') ? 'active' : ''; ?>" id="expenses-link">
                    <a href="../../pages/salesPerformance/expenses">
                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">Expenses</span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- Inventory Link -->
                <?php if ($userRole == 'admin' || $userRole == 'inventory') : ?>
                <li class="nav-link <?php echo ($currentPage === 'inventory2.php') ? 'active' : ''; ?>" id="inventory-link">
                    <a href="../../pages/inventory/inventory2">
                        <i class='bx bx-store-alt icon'></i>
                        <span class="text nav-text">Inventory</span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- Manpower Link -->
                <?php if ($userRole == 'admin' || $userRole == 'manpower') : ?>
                <li class="nav-link <?php echo ($currentPage === 'manpower_dashboard.php') ? 'active' : ''; ?>" id="manpower-link">
                    <a href="../../pages/manpower/manpower_dashboard">
                        <i class='bx bx-group icon'></i>
                        <span class="text nav-text">Manpower Deployment</span>
                    </a>
                </li>
                <?php endif; ?>
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
