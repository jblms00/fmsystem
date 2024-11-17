<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");
$user_data = check_login($con);

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
    <link rel="stylesheet" href="../../assets/css/encodeSales.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body data-user-name="<?php echo $user_data['user_name']; ?>">
    
    <?php include '../../navbar.php'; ?>

    <section class="home">
        <header class="contractheader">
            <div class="container-header">
                <h1 class="title">Sales - Encode of Daily Sales</h1>
            </div>
        </header>

        <div class="container">
            <header>Encode Sales</header>
            <!-- Franchisee Details Form -->
            <form class="expense-form">
                <div class="details franchisee">
                    <p class="title">Franchisee Details</p>
                    <div class="fields">
                        <div class="input-field">
                            <label>Franchisee</label>
                            <input type="text" class="input-franchise-name" placeholder="Enter Franchisee Name" disabled>
                        </div>
                        <!-- <div class="input-field">
                            <label>Location</label>
                            <input type="text" class="input-location" placeholder="Enter Location" disabled>
                        </div> -->
                        <div class="input-field">
                            <label>Name</label>
                            <input type="text" class="input-encoders-name" placeholder="Enter Encoder's Name" disabled>
                        </div>
                        <div class="input-field">
                            <label>Date</label>
                            <input type="date" class="input-date" disabled>
                        </div>
                    </div>

                    <div class=" form-group">
                        <button type="button" class="myButton save-encoded-sales">Save</button>
                    </div>
                </div>
            </form>
            <!-- Transactions Form -->
            <div class="transaction-forms-container">
                <div class="details transactions transaction-form p-4">
                    <p class="fw-semibold">Transactions</p>
                    <div class="fields mb-3">
                        <!-- <div class="input-field transactions">
                            <label>Product Name</label>
                            <input type="text" class="input-product-name" placeholder="Enter Product Name"
                                style="width: 100%">
                        </div> -->
                    </div>
                    <div class="sales-sections" id="salesSectionForm"></div>
                </div>
            </div>
            <!-- <div class="form-group2">
                <button type="button" class="myButton add-transaction-btn">Add Transaction</button>
            </div> -->
            <!-- Grand Total Form -->
            <form class="grandtotal-form m-auto" style="width: 40%;">
                <div class="details franchisee">
                    <span class="title">Grand Total:</span>

                    <div class="fields">
                        <div class="input-field grandtotal">
                            <input type="number" class="input-grand-total" placeholder="Grand Total" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal -->
        <div class="modal-overlay" id="modalOverlay">
            <div class="modal-box" id="modalBox">
                <div class="modal-body">
                    <p id="modalMessage"></p>
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
    <script src="../../assets/js/encoded-sales-script.js"></script>
</body>

</html>