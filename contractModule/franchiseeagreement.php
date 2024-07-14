<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Franchise Contracts</title>
        
        <!-- ========= CSS ========= -->
        <link rel="stylesheet" href="/public/css/franchise agreement.css">

        <!-- ===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header class="contractheader">
        <div class="container-header">
            <h1 class="title">Contracts</h1>
        </div>
    </header>

    

    <div class="filter-container">

        <!-- Filters -->
        <div class="filters">
            <label for="filter-franchise">Franchisee:</label>
            <select id="filter-franchise">
                <option value="">All</option>
                <option value="magalang">Potato Corner</option>
                <option value="urdaneta">Auntie Anne's</option>
                <option value="sm-grand">Macao Imperial</option>
            </select>

            <label for="filter-status">Status:</label>
            <select id="filter-status">
                <option value="">All</option>
                <option value="approved">Active</option>
                <option value="pending">Expired</option>
                <option value="leasing">Draft</option>
            </select>

            <button id="btn-reset" class="resetButton">Reset</button>

            

                <!-- New Document Button -->
                <button id="btn-new-document" class="myButton">New Document</button>
       
                <!-- Upload File Button -->
                <label for="file-upload" class="myButton">Upload File</label>
                <input type="file" id="file-upload" style="display: none;">
       
           

        </div>
    </div>

        
    </header>

    <div class="container">
        <section id="franchise-section">
            <h2>Agreement Contract</h2>
            <div class="filters">
                <!-- Filters can go here if you have them -->

            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Franchisee</th>
                        <th>Location</th>
                        <th>Agreement</th>
                        <th>Status</th>
                        <th>Days to Expire</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="franchise-row-1">
                        <td><img src="/public/images/PotCor.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Magalang, Pampanga</td>
                        <td>Agreement contract</td>
                        <td><span class="status active">Active</span></td>
                        <td><span class="days-to-expire warning">90 Days</span></td>
                    </tr>
                    <tr id="franchise-row-2">
                        <td><img src="/public/images/AuntieAnn.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Urdaneta, Pangasinan</td>
                        <td>Agreement contract</td>
                        <td><span class="status expired">Expired</span></td>
                        <td><span class="days-to-expire soon">0 Days</span></td>
                    </tr>
                    <tr id="franchise-row-3">
                        <td><img src="/public/images/MacaoImp.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>SM Grand Central</td>
                        <td>Leasing contract</td>
                        <td><span class="status draft">Draft</span></td>
                        <td><span class="days-to-expire safe">900 Days</span></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="leasing-section">
            <h2>Leasing Contract</h2>
            <div class="filters">
                <!-- Filters can go here if you have them -->
            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Franchisee</th>
                        <th>Location</th>
                        <th>Agreement</th>
                        <th>Status</th>
                        <th>Days to Expire</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="leasing-row-1">
                        <td><img src="/public/images/PotCor.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Magalang, Pampanga</td>
                        <td>Agreement contract</td>
                        <td>Approved</td>
                        <td>30 Days</td>
                    </tr>
                    <tr id="leasing-row-2">
                        <td><img src="/public/images/AuntieAnn.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Urdaneta, Pangasinan</td>
                        <td>Agreement contract</td>
                        <td>N/A</td>
                        <td></td>
                    </tr>
                    <tr id="leasing-row-3">
                        <td><img src="/public/images/MacaoImp.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>SM Grand Central</td>
                        <td>Leasing contract</td>
                        <td>90 Days</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </section>


        <!-- Notification Area -->
        <div id="notification-area">
            <h2>Notifications</h2>
            <ul id="notification-list">
                <!-- List of notifications will go here -->
                <li>
                    <h3>Potato Corner</h3>
                    <h4>Agreement Contract</h4>
                    <span class="notification-details">Expiring in 90 days</span>
                </li>
                <li>
                    <h3>Auntie Anne's</h3>
                    <h4>Agreement Contract</h4>
                    <span class="notification-details">Expired</span>
                </li>
                <!-- Add more notification items as needed -->
                
            </ul>
        </div>

        

    </div>

</body>





</html>