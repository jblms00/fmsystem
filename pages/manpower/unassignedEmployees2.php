<?php
session_start();

include ("../../phpscripts/database-connection.php");
include ("../../phpscripts/check-login.php");

$store = isset($_GET['str']) ? $_GET['str'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$franchisee = "";
if ($store === "potatoCorner") {
    $franchisee = "potato-corner";
} elseif ($store === "auntieAnne") {
    $franchisee = "auntie-anne";
} elseif ($store === "macaoImperial") {
    $franchisee = "macao-imperial";
}

$data = [];
$sql = "
    SELECT ua.user_id, ua.user_name, ua.user_phone_number, ua.user_address,
           IFNULL(ui.employee_status, 'unassigned') AS employee_status,
           IFNULL(ui.certificate_status, 'No branch assignment') AS certificate_status
    FROM users_accounts ua
    LEFT JOIN user_information ui ON ua.user_id = ui.user_id
    WHERE (ui.assigned_at = 0 AND ui.employee_status = 'unassigned') 
       OR ui.user_id IS NULL
";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data['employees'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data['employees'][] = $row;
    }
    $data['status'] = 'success';
} else {
    $data['status'] = 'error';
    $data['message'] = 'No unassigned employees found';
}
?>

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

    <?php include '../../navbar.php'; ?>

    <section class="home">
        <header class="manpowerheader">
            <div class="container-header">
                <h1 class="title">Unassigned Employees</h1>
            </div>
        </header>

        <div class="container">
             <div class="activity">
           
            <section id="employees-section">
                <span class="text">Unassigned Employee</span>
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
                        <?php
                        if ($data['status'] === 'success') {
                            foreach ($data['employees'] as $employee) {
                                $certificateStatus = empty($employee['certificate_status']) ? 'No branch assignment' : 'Ready for Deployment';
                                $alertClass = empty($employee['certificate_status']) ? 'alert-warning' : 'alert-success';
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($employee['user_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($employee['user_phone_number']) . "</td>";
                                echo "<td>" . htmlspecialchars($employee['user_address']) . "</td>";
                                echo "<td><div class='alert $alertClass p-0 m-auto w-50' role='alert'>$certificateStatus</div></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>" . htmlspecialchars($data['message']) . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        
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
    <script src="../../assets/js/assign-employee-script.js"></script>
</body>

</html>