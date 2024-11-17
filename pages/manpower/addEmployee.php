<?php
session_start();

include("../../phpscripts/database-connection.php");
include("../../phpscripts/check-login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/addEmployee.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
    <?php include '../../navbar.php'; ?>

    <section class="home">
    <header class="contractheader">
        <div class="container-header">
            <h1 class="title">Add Employee</h1>
        </div>
    </header>
    <div class="content">
        <form id="addEmployeeForm">
            <div class="form-section">
                <h3>Personal Information</h3>
                <div class="form-group">
                    <label for="employeeName">Employee Name <span class="text-danger">*</span></label>
                    <input type="text" id="employeeName" name="employeeName" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="address">Address <span class="text-danger">*</span></label>
                    <input type="text" id="address" name="address" required>
                </div>
            </div>
            <div class="form-section">
                <h3>Contact Information</h3>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile <span class="text-danger">*</span></label>
                    <input type="text" id="mobile" name="mobile" required>
                </div>
            </div>
            <div class="form-section">
                <h3>Employee Information</h3>
                <div class="form-group">
                    <label for="franchisee">Franchisee</label>
                    <select id="franchisee" name="franchisee" required>
                        <option value="" disabled selected>Select Franchisee</option>
                        <option value="potato-corner">Potato Corner</option>
                        <option value="auntie-anne">Auntie Anne's</option>
                        <option value="macao-imperial">Macao Imperial</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <select id="branch" name="branch" required>
                        <option value="" disabled selected>Select Branch</option>

                    </select>
                </div>
                <label for="shift">Shift</label>
                <select class="form-select" id="shift" name="shift">
                    <option selected disabled>Open this select menu</option>
                    <option value="Morning Shift">Morning Shift</option>
                    <option value="Afternoon Shift">Afternoon Shift</option>
                    <option value="Full Time">Full Time</option>
                </select>
            </div>
            <div class="form-section">
                <h3>Certification Information</h3>
                <div id="certificationContainer">
                    <div class="certification-row">
                        <input type="text" placeholder="Certification/ID Name" name="certificationName[]" >
                        <input type="date" name="expiryDate[]" >
                        <button type="button"><i class='bx bx-upload'></i> Upload</button>
                    </div>
                </div>
                <div class="add-cert-btn">
                    <i class='bx bx-plus-circle'></i> Add more certificates
                </div>
            </div>
            <div class="save-btn">
                <button type="button" class="add-employee">Save</button>
            </div>
        </form>
    </div>
    <!-- Modal ERROR HERE IT MAKES THE EMPLOYEE BUT DOES NOT EXIT THE PAGE-->
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
    <script src="../../assets/js/manage-employee-script.js"></script>
</body>

</html>