<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Certification</title>

    <!-- ========= CSS ========= -->
    <link rel="stylesheet" href="assets/css/manpower_certification.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header class="employeeheader">
        <div class="container-header">
            <h1 class="title">Certification Tracking</h1>
        </div>
    </header>

    <div class="filter-container">

        <label for="file-upload" class="myButton">Add Certification</label>
        <input type="file" id="file-upload" style="display: none;">



    </div>

    <div class="container">
        <section id="employee-section">
            <h2>Agreement Contract</h2>
            <div class="filters">
                <!-- Filters can go here if you have them -->

            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Franchise</th>
                        <th>Location</th>
                        <th>Certificate Type</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="employee-row-1">
                        <td>Firstname, Lastname</td>
                        <td><img src="assets/images/PotCor.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Magalang, Pampanga</td>
                        <td>Certificate Type</td>
                        <td>Date</td>
                    </tr>
                    <tr id="employee-row-2">
                        <td>Firstname, Lastname</td>
                        <td><img src="assets/images/AuntieAnn.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>Urdaneta, Pangasinan</td>
                        <td>Certificate Type</td>
                        <td>Date</td>
                    </tr>
                    <tr id="employee-row-3">
                        <td>Firstname, Lastname</td>
                        <td><img src="assets/images/MacaoImp.png" alt="PotCor Logo" class="franchise-logo"></td>
                        <td>SM Grand Central</td>
                        <td>Certificate Type</td>
                        <td>Date</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

</body>

</html>