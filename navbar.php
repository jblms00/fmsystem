<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ========= CSS ========= -->
        <link rel="stylesheet" href="/public/css/navbar.css">

        <!-- ===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    </head>

    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="/public/images/BoxLogo.png" alt="logo">
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
                        <li class="nav-link active" id="dashboard-link">
                            <a href="#">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-link" id="franchising-link">
                            <a href="#">
                                <i class='bx bx-file icon'></i>
                                <span class="text nav-text">Franchising Agreement</span>
                            </a>
                        </li>
                        <li class="nav-link" id="sales-link">
                            <a href="#">
                                <i class='bx bx-bar-chart-alt-2 icon'></i>
                                <span class="text nav-text">Sales Performance</span>
                            </a>
                        </li>
                        <li class="nav-link" id="expenses-link">
                            <a href="#">
                                <i class='bx bx-wallet icon'></i>
                                <span class="text nav-text">Expenses</span>
                            </a>
                        </li>
                        <li class="nav-link" id="inventory-link">
                            <a href="#">
                                <i class='bx bx-store-alt icon'></i>
                                <span class="text nav-text">Inventory</span>
                            </a>
                        </li>
                        <li class="nav-link" id="manpower-link">
                            <a href="#">
                                <i class='bx bx-group icon'></i>
                                <span class="text nav-text">Manpower Deployment</span>
                            </a>
                        </li>
                    </ul>
                </div>
        
                <div class="bottom-content">
                    <li>
                        <a href="#">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
        
            </div>

        </nav>

        <section class="home">
            <div class="content" id="content-area">
                <!-- Content will be loaded here dynamically -->
            </div>
        </section>

        <script src="/public/js/navbar.js"></script>
        <script src="/public/js/content.js"></script>
        
        

    </body>

</html>