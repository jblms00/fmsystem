<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dine-In Sales</title>

    <!-- ========= CSS ========= -->
    <link rel="stylesheet" href="assets/css/salesTransactions.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header class="contractheader">
        <div class="container-header">
            <h1 class="title">Delivery Sales</h1>
        </div>
    </header>

    <div class="filter-container">

        <!-- Filters -->
        <div class="filters">
            <label for="filter-franchise">Franchisee:</label>
            <select id="filter-franchise">
                <option value="">All</option>
                <option value="potatoCorner">Potato Corner</option>
                <option value="auntieAnnes">Auntie Anne's</option>
                <option value="macaoImperial">Macao Imperial</option>
            </select>

            <label for="filter-status">Location:</label>
            <select id="filter-status">
                <option value="">All</option>
                <option value="approved">location 1</option>
                <option value="pending">Pending</option>
                <option value="leasing">Leasing</option>
            </select>

            <label for="filter-status">Merchant:</label>
            <select id="filter-status">
                <option value="">All</option>
                <option value="foodpanda">foodpanda</option>
                <option value="grabfood">GrabFood</option>
            </select>


            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date">

            <label for="end-date">End Date:</label>
            <input type="date" id="end-date">


            <button id="btn-generate" class="resetButton">Generate</button>
            <!-- <button id="btn-reset" class="resetButton">Reset</button> -->

            <!-- Encode Sales Report -->
            <button id="btn-encode-salesreport" class="myButton">Encode</button>

            <!-- Upload File Button
            <label for="file-upload" class="myButton">Upload File</label>
            <input type="file" id="file-upload" style="display: none;"> -->


        </div>
    </div>


    </header>

    <div class="container">
        <section id="delivery-section">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Franchisee</th>
                        <th>Net Sales</th>
                        <th>Transaction Type</th>
                        <th>Merchant</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="delivery-row-1">
                        <td><img src="assets/images/PotCor.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="assets/images/foodpanda.png" alt="FoodPanda Logo" class="franchise-logo"></td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-2">
                        <td><img src="assets/images/AuntieAnn.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="assets/images/grabfood.png" alt="GrabFood Logo" class="franchise-logo"></td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-3">
                        <td><img src="assets/images/MacaoImp.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="assets/images/grabfood.png" alt="GrabFood Logo" class="franchise-logo"></td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-1">
                        <td><img src="assets/images/PotCor.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="assets/images/foodpanda.png" alt="FoodPanda Logo" class="franchise-logo"></td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-2">
                        <td><img src="assets/images/AuntieAnn.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="assets/images/grabfood.png" alt="GrabFood Logo" class="franchise-logo"></td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr id="delivery-row-3">
                        <td><img src="assets/images/MacaoImp.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Php XXXXXXXX</td>
                        <td>Delivery</td>
                        <td><img src="assets/images/foodpanda.png" alt="FoodPanda Logo" class="franchise-logo"></td>
                        <td>dd/mm/yyyy</td>
                    </tr>
                </tbody>
            </table>
        </section>

    </div>

</body>





</html>